<?php
	//Objet families
	class families {
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $catId;
		private $catName;
		private $name;
		private $active;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT id, catId, name, active FROM in_produitsfamilles WHERE id = $this->id");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->catId = $data['catId'];
				$this->name = $data['name'];
				$this->active = $data['active'];
				//On récupère les infos de la categorie
				$categories = new categories($this->pdo, $this->catId);
				$catDetails = $categories->getDetails();
				$this->catName = $catDetails['name'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, catId, name, active FROM in_produitsfamilles ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Récupération des infos catégorie
				$categories = new categories($this->pdo, $data['catId']);
				$catDetails = $categories->getDetails();
				$this->catName = $catDetails['name'];
				//Array
				$list[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'catId' => $catDetails['id'],
					'catName' => $catDetails['name'],
					'active' => $data['active'],
				);
			}
			//Return
			return $list;
		}
		
		//update visibility (active)
		public function updateVisibility() {
			//On regarde si la catégorie est active ou non
			if ($this->active == 0) {
				$query = $this->pdo->prepare("UPDATE in_produitsfamilles SET active = '1' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produitsfamilles SET active = '0' WHERE id = $this->id LIMIT 1");
			}
			//Execution de la requête
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function add($familyName, $catId) {		
			//Secure
			$content = new content($familyName);
			$familyName = $content->secure();
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_produitsfamilles VALUES('', '$catId', '$familyName', '0')");
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_produitsfamilles WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			$details = array(
				'id' => $this->id,
				'name' => $this->name,
				'catId' => $this->catId,
				'catName' => $this->catName,
				'active' => $this->active,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM DE la famille
		public function changeName($name, $catId) {		
			//Secure
			$content = new content($name);
			$name = $content->secure();
			
			//requête en fonction de catId
			if ($catId == 0) {
				$query = $this->pdo->prepare("UPDATE in_produitsfamilles SET name = '$name' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produitsfamilles SET name = '$name', catId = '$catId' WHERE id = $this->id LIMIT 1");
			}
			//Execution requete
			$query->execute();
		}
	}
?>