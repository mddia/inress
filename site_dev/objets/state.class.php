<?php
	//Objet state
	class state {
	
		//Variable
		private $pdo;
		private $id;
		private $name;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;			
			//Vérif
			if ($id != 0) {
				//Vars
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name FROM in_paysetats WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->name = $data['name'];
			}
		}
		
		//getDetails
		public function getDetails() {
			//Array
			$details = array(
				'id' => $this->id,
				'name' => $this->name,
			);
			//return
			return $details;
		}
	}
?>