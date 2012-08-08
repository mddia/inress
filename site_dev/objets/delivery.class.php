<?php
	//Objet delivery
	class delivery {
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $name;
		private $limitWeight;
		private $tarif;
		private $active;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name, limitWeight, tarif, active FROM in_deliveries WHERE id = $this->id");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->name = $data['name'];
				$this->tarif = $data['tarif'];
				$this->limitWeight = $data['limitWeight'];
				$this->active = $data['active'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name, limitWeight, tarif, active FROM in_deliveries ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$list[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'limitWeight' => $data['limitWeight'],
					'tarif' => $data['tarif'],
					'active' => $data['active'],
				);
			}
			//Return
			return $list;
		}
		
		//listUnderWeight
		public function listUnderWeight($weight) {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, name, limitWeight, tarif, active FROM in_deliveries WHERE limitWeight >= '$weight' ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$list[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'limitWeight' => $data['limitWeight'],
					'tarif' => $data['tarif'],
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
				$query = $this->pdo->prepare("UPDATE in_deliveries SET active = '1' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_deliveries SET active = '0' WHERE id = $this->id LIMIT 1");
			}
			//Execution de la requête
			$query->execute();
		}
		
		//Ajout d'un mode de livraison
		public function add($name, $tarif, $limitWeight) {
			//Secure
			$content = new content($name);
			$catName = $content->secure();
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_deliveries VALUES('', '$name', '$limitWeight', '$tarif', '0')");
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_deliveries WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			$details = array(
				'id' => $this->id,
				'name' => $this->name,
				'limitWeight' => $this->limitWeight,
				'tarif' => $this->tarif,
				'active' => $this->active,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM
		public function changeName($name, $tarif, $limitWeight) {
			//Secure
			$content = new content($name);
			$name = $content->secure();
			
			//requête
			$query = $this->pdo->prepare("UPDATE in_deliveries SET name = '$name', tarif = '$tarif', limitWeight = '$limitWeight' WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
	}
?>