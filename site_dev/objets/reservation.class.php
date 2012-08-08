<?php
	//Objet reservation le 26/01/2012	
	class reservation {
		
		//Déclaration variables
		private $pdo;
		
		//__construct
		public function __construct($pdo) {
			$this->pdo = $pdo;
		}
		
		//record
		public function record($itemId, $userId, $firstName, $name, $email, $seats) {
			//Get eventId with itemId
			$query0 = $this->pdo->prepare("SELECT eventId FROM in_produitsdetails WHERE id = '$itemId'");
			$query0->execute();
			$data = $query0->fetch(PDO::FETCH_ASSOC);
			$eventId = $data['eventId'];
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_reservations VALUES('', '$itemId', '$eventId', '$userId', '$firstName', '$name', '$email', '$seats')");
			$query->execute();
		}
	}
?>