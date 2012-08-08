<?php
	//Objet messageTopic
	
	class messageTopic {
		
		//Vars
		private $pdo;
		private $id;
		private $titre;
		private $minititre;
		private $ordre;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attribution variables
			$this->pdo= $pdo;
			//Vérif
			if ($id != 0) {
				//Attribution
				$this->id = $id;
				$this->pdo = $pdo;
				//Query
				$query = $this->pdo->prepare("SELECT titre, minititre, ordre FROM admin_contactobjets WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission vars
				$this->titre = stripslashes($data['titre']);
				$this->minititre = stripslashes($data['minititre']);
				$this->ordre = $data['ordre'];
			}
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM admin_contactobjets ORDER BY ordre ASC");
			$query->execute();
			//Création array
			$topics = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$messageTop = new messageTopic($this->pdo, $data['id']);
				$topics[] = $messageTop->getDetails();
			}
			//return
			return $topics;
		}
		
		//create
		public function create($name) {
			//Traitement
			$content = new content($name);
			$name = $content->secure();
			//Query
			$query = $this->pdo->prepare("INSERT INTO admin_contactobjets VALUES('', '$name', '', '')");
			$query->execute();
		}
		
		//getDetails()
		public function getDetails() {
			//Création array
			$topic = array(
				'id' => $this->id,
				'titre' => $this->titre,
				'minititre' => $this->minititre,
				'ordre' => $this->ordre,
			);
			//Return
			return $topic;
		}
		
		//editName
		public function editName($newName) {
			//Traitement
			$content = new content($newName);
			$newName = $content->secure();
			//Query
			$query = $this->pdo->prepare("UPDATE admin_contactobjets SET titre = '$newName' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//delete
		public function delete() {
			//Query
			$query = $this->pdo->prepare("DELETE FROM admin_contactobjets WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//getLabels
		public function getLinkedLabels() {
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT labelId FROM admin_contactobjetslabelslinks WHERE objetId = '$this->id'");
			$query->execute();
			//Création array
			$labels = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {			
				//Transmission array
				$labels[] = array(
					'id' => $data['labelId'],
				);
			}
			//return
			return $labels;
		}
	}
?>