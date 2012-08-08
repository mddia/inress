<?php
	//Objet products
	class products{
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $idProduit;
		private $titreProduit;
		private $title;
		private $description;
		private $prixAbonne;
		private $prixPublic;
		private $aboFreq;
		private $event;
		private $subscription;
		private $envoiPostal;
		private $eabo;
		private $eaboFreq;
		private $eventId;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT idProduit, title, description, prixAbonne, prixPublic, aboFreq, eaboFreq, poids, eventId FROM in_produitsdetails WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->idProduit = $data['idProduit'];
				$this->title = stripslashes($data['title']);
				$this->description = stripslashes($data['description']);
				$this->prixAbonne = $data['prixAbonne'];
				$this->prixPublic = $data['prixPublic'];
				$this->aboFreq = $data['aboFreq'];
				$this->eaboFreq = $data['eaboFreq'];
				$this->poids = $data['poids'];
				//On récupère les infos du type de produits
				$productsType = new productsType($this->pdo, $this->idProduit);
				$details = $productsType->getDetails();
				$this->titreProduit = stripslashes($details['title']);
				//On regarde si il appartient à un évènement ou un abonnement
				$this->event = $details['event'];
				$this->subscription = $details['subscription'];
				$this->envoiPostal = $details['envoiPostal'];
				$this->eabo = $details['eabo'];
				$this->eventId = $data['eventId'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, idProduit, title, description, prixAbonne, prixPublic, aboFreq, eaboFreq, poids, eventId FROM in_produitsdetails ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//On récupère les infos du type de produits
				$productsType = new productsType($this->pdo, $data['idProduit']);
				$typeDetails = $productsType->getDetails();
				//Array
				$list[] = array(
					'id' => $data['id'],
					'idProduit' => $data['idProduit'],
					'titreProduit' => $typeDetails['title'],
					'title' => $data['title'],
					'description' => $data['description'],
					'prixAbonne' => $data['prixAbonne'],
					'prixPublic' => $data['prixPublic'],
					'aboFreq' => $data['aboFreq'],
					'eaboFreq' => $data['eaboFreq'],
					'poids' => $data['poids'],
					'eventId' => $data['eventId'],
				);
			}
			//Return
			return $list;
		}
		
		//Ajout d'un type de produits
		public function add($name, $productTypeId, $description, $prixPublic, $prixAbonne, $aboFreq, $eaboFreq, $weight, $eventId) {
			echo 'PM : '.$prixMembres.'<br />';
			//Secure
			$content = new content($name);
			$name = $content->secure();
			//Secure
			$content = new content($description);
			$description = $content->secure();
			
			//Update de eaboFreq (nombre de jours x secondes) => timestamp
			$eaboFreq = $eaboFreq*86400;
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_produitsdetails VALUES('', '$productTypeId', '$name', '$description', '0', '$prixAbonne', '$prixPublic', '$weight', '0', '$aboFreq', '0', '0', '0', '0', '$eaboFreq', '$eventId')");
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_produitsdetails WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			//eaboFreq => jours
			$eaboFreqJours = $this->eaboFreq/86400;
			//Array
			$details = array(
				'id' => $this->id,
				'idProduit' => $this->idProduit,
				'titreProduit' => $this->titreProduit,
				'title' => $this->title,
				'description' => $this->description,
				'prixAbonne' => $this->prixAbonne,
				'prixPublic' => $this->prixPublic,
				'aboFreq' => $this->aboFreq,
				'event' => $this->event,
				'subscription' => $this->subscription,
				'envoiPostal' => $this->envoiPostal,
				'eabo' => $this->eabo,
				'eaboFreq' => $this->eaboFreq,
				'eaboFreqJours' => $eaboFreqJours,
				'poids' => $this->poids,
				'eventId' => $this->eventId,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM DU produit
		public function changeName($title, $productTypeId, $description, $prixPublic, $prixMembres, $aboFreq, $eaboFreq, $weight) {
			//Secure
			$content = new content($title);
			$title = $content->secure();
			//Secure 2
			$content = new content($description);
			$description = $content->secure();
			
			//eaboFreq*86400
			$eaboFreq = $eaboFreq*86400;
			
			//requête en fonction de catId
			if ($productTypeId == 0) {
				$query = $this->pdo->prepare("UPDATE in_produitsdetails SET title = '$title', description = '$description', prixPublic = '$prixPublic',  prixAbonne = '$prixMembres', aboFreq = '$aboFreq', eaboFreq = '$eaboFreq', poids = '$weight' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produitsdetails SET title = '$title', description = '$description', idProduit = '$productTypeId', prixAbonne = '$prixPublic',  prixMembres = '$prixMembres', aboFreq = '$aboFreq', eaboFreq = '$eaboFreq', poids = '$weight' WHERE id = $this->id LIMIT 1");
			}
			//Execution requete
			$query->execute();
		}
	}
?>