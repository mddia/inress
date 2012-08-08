<?php
	class activites {
	
		//Vars
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Attribution variables
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//** ACTIVITES **//
		//create
		public function create($activites, $online, $theme, $url, $titre, $sst, $presentation) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO `in_agendadetails` (`activites` , `online` , `theme`, `url` , `titre` , `sst` , `presentation`) VALUES ('$activites', '$online', '$theme', '$url', '$titre', '$sst', '$presentation')");
			$query->execute();
			//Get last id
			$id = $this->pdo->lastInsertId();
			//Return
			return $id;
		}
		
		//createPlus
		public function createPlus($eventId, $locaux, $dateD, $dateF, $dispos, $actif) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO `in_agendadetailsplus` (`idagenda` , `locaux` , `dateD` , `dateF` , `dispos` , `actif`) VALUES ('$eventId', '$locaux', '$dateD', '$dateF', '$dispos', '$actif')");
			$query->execute();
		}
		
		//addIntervenant
		public function addIntervenant($eventId, $intervenant) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO `in_agendaintervenants` VALUES ('', '$intervenant', '$eventId')");
			$query->execute();
		}
		
		//goToActivite
		public function goToActivite($id) {
			//Redirection
			header('location: admin.php?cat=activites&scat=events&id='.$id);
		}
		
		//listEvents
		public function listEvents() {
			//Define time
			$now = time();
			//Arrays
			$eventsToCome = array();
			$doneEvents = array();
			
			//Query : eventsToCome
			$query = $this->pdo->prepare("SELECT in_agendadetailsplus.id FROM in_agendadetailsplus JOIN in_agendadetails ON in_agendadetailsplus.idagenda = in_agendadetails.id WHERE $now < in_agendadetailsplus.dateD ORDER BY in_agendadetailsplus.id DESC");
			$query->execute();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$activite = new activite($this->pdo, $data['id']);
				$eventsToCome[] = $activite->getDetails();
			}
			
			//Query : doneEvents
			$query = $this->pdo->prepare("SELECT in_agendadetailsplus.id FROM in_agendadetailsplus JOIN in_agendadetails ON in_agendadetailsplus.idagenda = in_agendadetails.id WHERE $now > in_agendadetailsplus.dateD ORDER BY in_agendadetailsplus.id DESC");
			$query->execute();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$activite = new activite($this->pdo, $data['id']);
				$doneEvents[] = $activite->getDetails();
			}
			
			//Smarty
			$this->smarty->assign('eventsToCome', $eventsToCome);
			$this->smarty->assign('doneEvents', $doneEvents);
		}
		
		//listSpecificEvents
		public function listSpecificEvents($id) {
			//Define time
			$now = time();
			//Arrays
			$eventsToCome = array();
			$doneEvents = array();
			
			//Query : eventsToCome
			$query = $this->pdo->prepare("SELECT in_agendadetailsplus.id FROM in_agendadetailsplus JOIN in_agendadetails ON in_agendadetailsplus.idagenda = in_agendadetails.id WHERE in_agendadetails.activites = '$id' AND $now < in_agendadetailsplus.dateD ORDER BY in_agendadetailsplus.id DESC");
			$query->execute();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$activite = new activite($this->pdo, $data['id']);
				$eventsToCome[] = $activite->getDetails();
			}
			
			//Query : doneEvents
			$query = $this->pdo->prepare("SELECT in_agendadetailsplus.id FROM in_agendadetailsplus JOIN in_agendadetails ON in_agendadetailsplus.idagenda = in_agendadetails.id WHERE in_agendadetails.activites = '$id' AND $now > in_agendadetailsplus.dateD ORDER BY in_agendadetailsplus.id DESC");
			$query->execute();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$activite = new activite($this->pdo, $data['id']);
				$doneEvents[] = $activite->getDetails();
			}
			
			//Smarty
			$this->smarty->assign('eventsToCome', $eventsToCome);
			$this->smarty->assign('doneEvents', $doneEvents);
		}
		
		//** ACTIVITES TYPE **//
		
		//listActivitesTypes
		public function listActivitesTypes() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_agendaactivites ORDER BY id ASC");
			$query->execute();
			//Création array
			$types = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$types[] = $this->getTypeDetails($data['id']);
			}
			//Smarty
			$this->smarty->assign('eventTypes', $types);
		}
		
		//getTypeDetails
		public function getTypeDetails($id) {
			//Query
			$query = $this->pdo->prepare("SELECT nomsing, nompluriel, tot, description, urlactiv, actif FROM in_agendaactivites WHERE id = '$id'");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Transmission array
			$type = array(
				'id' => $id,
				'nomsing' => $data['nomsing'],
				'nompluriel' => $data['nompluriel'],
				'tot' => $data['tot'],
				'description' => $data['description'],
				'urlactiv' => $data['urlactiv'],
				'actif' => $data['actif'],
			);
			//Return
			return $type;
		}
		
		//updateActivityType
		public function updateActivityType($id, $nomsing, $nompluriel, $description, $urlactiv) {
			//Query
			$query = $this->pdo->prepare("UPDATE in_agendaactivites SET nomsing = '$nomsing', nompluriel = '$nompluriel', description = '$description', urlactiv = '$urlactiv' WHERE id = '$id'");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=activites&scat=activitestypes&id='.$id);
			exit();
		}
		
		//addActivityType
		public function addActivityType($nomsing, $nompluriel, $description, $urlactiv, $actif) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_agendaactivites VALUES('', '$nomsing', '$nompluriel', '', '$description', '$urlactiv', '$actif')");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=gestionactivitestypes');
			exit();
		}
		
		//deleteActivityType
		public function deleteActivityType($id) {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_agendaactivites WHERE id = '$id' LIMIT 1");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=gestionactivitestypes');
			exit();
		}
		
		//** LOCAUX **//
		
		//listLocaux
		public function listLocaux() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_agendalocaux ORDER BY id ASC");
			$query->execute();
			//Création array
			$locaux = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$locaux[] = $this->getLocauxDetails($data['id']);
			}
			//Smarty
			$this->smarty->assign('locaux', $locaux);
		}
		
		//getLocauxDetails
		public function getLocauxDetails($id) {
			//Query
			$query = $this->pdo->prepare("SELECT resume, adresse, adressebis, remarques, ville, postal, map FROM in_agendalocaux WHERE id = '$id'");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Transmission array
			$lieu = array(
				'id' => $id,
				'resume' => $data['resume'],
				'adresse' => $data['adresse'],
				'adressebis' => $data['adressebis'],
				'remarques' => $data['remarques'],
				'ville' => $data['ville'],
				'postal' => $data['postal'],
				'map' => $data['map'],
			);
			//Return
			return $lieu;
		}
		
		//addLocaux
		public function addLocaux($resume, $adresse, $adressebis, $remarques, $ville, $postal, $map) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_agendalocaux VALUES('', '$resume', '$adresse', '$adressebis', '$remarques', '$ville', '$postal', '$map')");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=gestionlocaux');
			exit();
		}
		
		//updateLocaux
		public function updateLocaux($id, $resume, $adresse, $adressebis, $remarques, $ville, $postal, $map) {
			//Query
			$query = $this->pdo->prepare("UPDATE in_agendalocaux SET resume = '$resume', adresse = '$adresse', adressebis = '$adressebis', remarques = '$remarques', ville = '$ville', postal = '$postal', map = '$map' WHERE id = '$id'");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=activites&scat=locaux&id='.$id);
			exit();
		}
		
		//deleteActivityType
		public function deleteLocaux($id) {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_agendalocaux WHERE id = '$id' LIMIT 1");
			$query->execute();
			//Redirection
			header('location: admin.php?cat=activites&scat=gestionlocaux');
			exit();
		}
	}
?>