<?php
	//Objet tag
	
	class tag {
	
		//Vars
		private $pdo;
		private $id;
		private $name;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;
			//Vérif
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT name FROM in_tags WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->name = $data['name'];
			}
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_tags ORDER BY name ASC");
			$query->execute();
			//Array
			$tags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Objet
				$tag = new tag($this->pdo, $data['id']);
				//Transmission array
				$tags[] = $tag->getDetails();
			}
			//Return
			return $tags;
		}
		
		//getDetails
		public function getDetails() {
			//Array
			$tag = array(
				'id' => $this->id,
				'name' => $this->name,
			);
			//return
			return $tag;
		}
	}
?>