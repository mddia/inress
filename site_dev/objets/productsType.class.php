<?php
	//Objet productsType
	class productsType {
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $familyId;
		private $familyName;
		private $title;
		private $remarqueInrees;
		private $active;
		private $url = 0;
		private $creationTime;
		private $creationTimeInfo;
		private $event;
		private $subscription;
		private $envoiPostal;
		private $eabo;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT id, familyId, title, remarqueInrees, active, url, creationTime, envoiPostal, eabo FROM in_produits WHERE id = $this->id");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->familyId = $data['familyId'];
				$this->title = $data['title'];
				$this->remarqueInrees = $data['remarqueInrees'];
				$this->active = $data['active'];
				$this->url = $data['url'];
				$this->envoiPostal = $data['envoiPostal'];
				$this->eabo = $data['eabo'];
				//Event and subscriptions
				$families = new families($this->pdo, $this->familyId);
				$famDetails = $families->getDetails();
				$catId = $famDetails['catId'];
				//Vérif
				if ($catId == 1) {
					$this->event = 0;
					$this->subscription = 0;
				}
				elseif ($catId == 2) {
					$this->event = 0;
					$this->subscription = 1;
				}
				else {
					$this->event = 1;
					$this->subscription = 0;
				}
				
				
				//Récupération du moment de création
				$this->creationTime = $data['creationTime'];
				$time = new time($this->creationTime);
				$this->creationTimeInfo = $time->convert();
				//On récupère les infos de la famille associée
				$families = new families($this->pdo, $this->familyId);
				$familyDetails = $families->getDetails();
				$this->familyName = $familyDetails['name'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, familyId, title, url, active, creationTime, envoiPostal, eabo FROM in_produits ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Récupération des infos catégorie
				$families = new families($this->pdo, $data['familyId']);
				$familyDetails = $families->getDetails();
				//Récupération du moment de création
				$time = new time($data['creationTime']);
				$creationTimeInfo = $time->convert();
				//Event and subscriptions
				$families = new families($this->pdo, $data['familyId']);
				$famDetails = $families->getDetails();
				$catId = $famDetails['catId'];
				//Vérif
				if ($catId == 1) {
					$event = 0;
					$subscription = 0;
				}
				elseif ($catId == 2) {
					$event = 0;
					$subscription = 1;
				}
				else {
					$event = 1;
					$subscription = 0;
				}
				
				//Array
				$list[] = array(
					'id' => $data['id'],
					'familyId' => $data['familyId'],
					'familyName' => $familyDetails['name'],
					'title' => $data['title'],
					'active' => $data['active'],
					'url' => $data['url'],
					'creationTime' => $data['creationTime'],
					'creationTimeInfo' => $creationTimeInfo,
					'event' => $event,
					'subscription' => $subscription,
					'envoiPostal' => $data['envoiPostal'],
					'eabo' => $data['eabo'],
				);
			}
			//Return
			return $list;
		}
		
		//Ajout d'un type de produits
		public function add($name, $familyId, $remarques, $url) {
			//Secure
			$content = new content($name);
			$name = $content->secure();
			//Secure
			$content = new content($remarques);
			$remarques = $content->secure();
			
			//Création des variables auto
			$creationTime = time();
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_produits VALUES('', '$url', '0', '0', '$familyId', '$name', '$remarques', '$creationTime', '0', '0', '0', '0', '0')");
			$query->execute();
			
			echo "INSERT INTO in_produits VALUES('', '$url', '0', '0', '$familyId', '$name', '$remarques', '$creationTime', '0', '0', '0', '0', '0')";
		}
		
		//update visibility (active)
		public function updateVisibility() {
			//On regarde si la catégorie est active ou non
			if ($this->active == 0) {
				$query = $this->pdo->prepare("UPDATE in_produits SET active = '1' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produits SET active = '0' WHERE id = $this->id LIMIT 1");
			}
			//Execution de la requête
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_produits WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			$details = array(
				'id' => $this->id,
				'familyId' => $this->familyId,
				'familyName' => $this->familyName,
				'title' => $this->title,
				'remarqueInrees' => $this->remarqueInrees,
				'active' => $this->active,
				'url' => $this->url,
				'creationTime' => $this->creationTime,
				'event' => $this->event,
				'subscription' => $this->subscription,
				'envoiPostal' => $this->envoiPostal,
				'eabo' => $this->eabo,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM DU type de produit
		public function changeName($title, $familyId, $remarque, $newUrl, $event, $subscription) {
			//Secure
			$content = new content($title);
			$title = $content->secure();
			//Secure 2
			$content = new content($remarque);
			$remarque = $content->secure();
			
			//requête en fonction de catId
			if ($familyId == 0) {
				$query = $this->pdo->prepare("UPDATE in_produits SET title = '$title', remarqueInrees = '$remarque', url = '$newUrl', event = '$event', subscription = '$subscription' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produits SET title = '$title', remarqueInrees = '$remarque', url = '$newUrl', familyId = '$familyId', event = '$event', subscription = '$subscription' WHERE id = $this->id LIMIT 1");
			}
			//Execution requete
			$query->execute();
		}
	}
?>