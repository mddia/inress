<?php
	//Objet promoCode
	class promoCode {
		//Transmissions variables
		private $pdo;
		private $id = 0;
		private $code;
		private $reduction;
		private $limited;
		private $active;
		
		//Construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//Reflexivité si besoin
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT code, reduction, limited, active FROM in_promocodes WHERE id = $this->id");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->code = $data['code'];
				$this->reduction = $data['reduction'];
				$this->limited = $data['limited'];
				$this->active = $data['active'];
			}
		}
		
		//list All
		public function listAll() {
			//Déclaration array
			$list = array();
			//Query
			$query = $this->pdo->prepare("SELECT id, code, reduction, limited, active FROM in_promocodes ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$list[] = array(
					'id' => $data['id'],
					'code' => $data['code'],
					'reduction' => $data['reduction'],
					'limited' => $data['limited'],
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
			$query = $this->pdo->prepare("SELECT id, code, reduction, limited, active FROM in_promocodes WHERE limitedWeight >= '$weight' ORDER BY id ASC");
			$query->execute();
			//Listage des résulats
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$list[] = array(
					'id' => $data['id'],
					'code' => $data['code'],
					'reduction' => $data['reduction'],
					'limited' => $data['limited'],
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
				$query = $this->pdo->prepare("UPDATE in_promocodes SET active = '1' WHERE id = $this->id LIMIT 1");
			}
			else {
				$query = $this->pdo->prepare("UPDATE in_promocodes SET active = '0' WHERE id = $this->id LIMIT 1");
			}
			//Execution de la requête
			$query->execute();
		}
		
		//Ajout d'un mode de livraison
		public function add($code, $reduction, $limited) {
			//Secure
			$content = new content($code);
			$catName = $content->secure();
			
			//Requête
			$query = $this->pdo->prepare("INSERT INTO in_promocodes VALUES('', '$code', '$reduction', '$limited', '0')");
			$query->execute();
		}
		
		//Ajout d'une catégorie
		public function delete() {
			//Requête
			$query = $this->pdo->prepare("DELETE FROM in_promocodes WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
		
		//get Details
		public function getDetails() {
			$details = array(
				'id' => $this->id,
				'code' => $this->code,
				'reduction' => $this->reduction,
				'limited' => $this->limited,
				'active' => $this->active,
			);
			//return
			return $details;
		}
		
		//METTRE A JOUR LE NOM
		public function changeName($code, $reduction, $limited) {
			//Secure
			$content = new content($name);
			$name = $content->secure();
			
			//requête
			$query = $this->pdo->prepare("UPDATE in_promocodes SET code = '$code', reduction = '$reduction', limited = '$limited' WHERE id = $this->id LIMIT 1");
			$query->execute();
		}
	}
?>