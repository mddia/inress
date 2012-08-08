<?php
	//objet rubrique
	
	class rubrique {
		
		//vars
		private $pdo;
		private $id;
		private $titre;
		private $titreind;
		private $ordre;
		private $titreall;
		
		//_construct
		public function __construct($pdo, $id) {
			//Atribution variables
			$this->pdo = $pdo;
			//If id != 0
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT id, titre, titreind, ordre, titreall FROM 2emag_rubriques WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->titre = $data['titre'];
				$this->titreind = $data['titreind'];
				$this->ordre = $data['ordre'];
				$this->titreall = $data['titreall'];
			}
		}
		
		//getDetails()
		public function getDetails() {
			//Array
			$rub = array(
				'id' => $this->id,
				'titre' => $this->titre,
				'titreind' => $this->titreind,
				'ordre' => $this->ordre,
				'titreall' => $this->titreall,
			);
			//Return
			return $rub;
		}
	}
?>