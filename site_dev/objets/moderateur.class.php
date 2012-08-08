<?php
	//Class moderateur
	
	class moderateur {
		
		//Variables
		private $pdo;
		private $id;
		private $idemail;
		private $firstName;
		private $name;
		private $pseudo;
		private $responsabilites;
		private $email;
		private $password;
		private $acces;
		private $actif;
		private $timestamp;
		private $infomembres;
		private $notifmembres;
		private $notifmessagerie;
		private $notifactivites;
		private $notifprosante;
		private $notifreseau;
		private $notifsecretariat;
		private $utpseudo;
		private $notifboutique;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attribution
			$this->pdo = $pdo;			
			//Vérif
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT idemail, firstName, name, pseudo, responsabilites, email, acces, actif FROM admin_moderateurs WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Assignation variables
				$this->idemail = $data['idemail'];
				$this->firstName = $data['firstName'];
				$this->name = $data['name'];
				$this->pseudo = $data['pseudo'];
				$this->responsabilites = $data['responsabilites'];
				$this->email = $data['email'];
				$this->acces = $data['acces'];
				$this->actif = $data['actif'];
			}
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM admin_moderateurs ORDER BY id ASC");
			$query->execute();
			//Création array
			$moderateurs = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$modo = new moderateur($this->pdo, $data['id']);
				$moderateurs[] = $modo->getDetails();
			}
			//return
			return $moderateurs;
		}
		
		//getDetails
		public function getDetails() {
			//Création array
			$moderateur = array(
				'id' => $this->id,
				'idemail' => $this->idemail,
				'firstName' => $this->firstName,
				'name' => $this->name,
				'pseudo' => $this->pseudo,
				'responsabilites' => $this->responsabilites,
				'email' => $this->email,
				'acces' => $this->acces,
				'actif' => $this->actif,
			);
			//return
			return $moderateur;
		}
		
		//checkLogIn
		public function checkLogIn($email, $password) {
			//Conversion
			$md5Pass = md5($password);
			//Query
			$query = $this->pdo->prepare("SELECT id FROM admin_moderateurs WHERE email = '$email' AND password = '$md5Pass'");
			$query->execute();
			$result = $query->rowCount();
			//Assignation si présence
			if ($result != 0) {
				//Transmission des infos modérateur
				$data = $query->fetch(PDO::FETCH_ASSOC);
				$this->__construct($this->pdo, $data['id']);
				$this->assignSession();
				//Redirection
				header('location: admin.php');
				exit;
			}
		}
		
		//assignSession
		public function assignSession() {
			$_SESSION['moderateur']['id'] = $this->id;
			$_SESSION['moderateur']['firstName'] = $this->firstName;
			$_SESSION['moderateur']['name'] = $this->name;
			$_SESSION['moderateur']['email'] = $this->email;
			$_SESSION['moderateur']['pseudo'] = $this->pseudo;
			$_SESSION['moderateur']['responsabilites'] = $this->responsabilites;
			$_SESSION['moderateur']['acces'] = $this->acces;
			$_SESSION['moderateur']['idemail'] = $this->idemail;
		}
		
		//getLinkedLabels
		public function getLinkedLabels() {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT labelId FROM admin_modolabelslinks WHERE userId = '$this->id'");
			$query->execute();
			//Création array
			$myLabels = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$label = new label($this->pdo, $data['labelId']);
				$labelDetails = $label->getDetails();
				//getLabelledMessages
				$messagerie = new messagerie($this->pdo, 0);
				$labelledMessages = $messagerie->listLabelledMessages($data['labelId']);
				
				//Transmission array
				$myLabels[] = array(
					'details' => $labelDetails,
					'messages' => $labelledMessages,
				);
			}
			//Return
			return $myLabels;
		}
		
		//getLinkedLabels
		public function getMailBoxDetails($target) {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT admin_labelslink.messageId FROM admin_labelslink JOIN admin_modolabelslinks ON admin_labelslink.labelId = admin_modolabelslinks.labelId WHERE admin_modolabelslinks.userId = '$this->id' AND admin_labelslink.messageId NOT IN (SELECT messageId FROM admin_contactreponses) ORDER BY admin_labelslink.messageId DESC");
			$query->execute();
			//count
			$count = $query->rowCount();
			//Création array
			$mailBox = array();
			//On  boucle si count != 0
			if ($count != 0) {
				//Vérif target
				if ($target == 'received') {
					//Boucle
					while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
						//Création d'un adminMessage
						$adminMessage = new adminMessage($this->pdo, $data['messageId']);
						$details = $adminMessage->getDetails();
						//On vérifie que le message n'est pas supprimé
						if ($details['corbeille'] == 0) {
							$mailBox[] = $details;
						}
						else {
							$count = $count-1;
						}
					}
				}
				elseif ($target == 'trash') {
					//Boucle
					while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
						//Création d'un adminMessage
						$adminMessage = new adminMessage($this->pdo, $data['messageId']);
						$details = $adminMessage->getDetails();
						//On vérifie que le message n'est pas supprimé
						if ($details['corbeille'] == 1) {
							$mailBox[] = $details;
						}
						else {
							$count = $count-1;
						}
					}
				}
			}
			//Ajout des infos
			$result = array(
				'count' => $count,
				'mailBox' => $mailBox,
			);
			//Return
			return $result;
		}
		
		//add
		public function add($firstName, $name, $pseudo, $responsabilites, $email, $acces, $actif) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO `admin_moderateurs` (`firstName` , `name` , `pseudo` , `responsabilites` , `email` , `password` , `acces` , `actif`) VALUES ('$firstName', '$name', '$pseudo', '$responsabilites', '$email', '	5f4dcc3b5aa765d61d8327deb882cf99', '$acces', '$actif')");
			$query->execute();
		}
	}
?>