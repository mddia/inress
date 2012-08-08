<?php
	//Objet categories
	class categories {
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $name;
		private $active;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name, active FROM in_produitscategories WHERE id = $this->id");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->name = $data['name'];
				$this->active = $data['active'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name, active FROM in_produitscategories ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$list[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
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
				$query = $this->pdo->prepare("UPDATE in_produitscategories SET active = '1' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_produitscategories SET active = '0' WHERE id = $this->id LIMIT 1");
			}
			//Execution de la requête
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function add($catName) {
			//Secure
			$content = new content($catName);
			$catName = $content->secure();
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_produitscategories VALUES('', '$catName', '0')");
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_produitscategories WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			$details = array(
				'id' => $this->id,
				'name' => $this->name,
				'active' => $this->active,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM
		public function changeName($name) {
			//Secure
			$content = new content($name);
			$name = $content->secure();
			
			//requête
			$query = $this->pdo->prepare("UPDATE in_produitscategories SET name = '$name' WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
	}
?>