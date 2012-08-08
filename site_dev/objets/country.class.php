<?php
	//Objet country
	class country {
	
		//Variable
		private $pdo;
		private $id;
		private $name;
		private $paysOrigins;
		private $actif;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;			
			//Vérif
			if ($id != 0) {
				//Vars
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name, paysOrigins, actif FROM in_pays WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->name = $data['name'];
				$this->paysOrigins = $data['paysOrigins'];
				$this->actif = $data['actif'];
			}
		}
		
		//getDetails
		public function getDetails() {
			//Array
			$details = array(
				'id' => $this->id,
				'name' => $this->name,
				'paysOrigins' => $this->paysOrigins,
				'actif' => $this->actif,
			);
			//return
			return $details;
		}
	}
?>