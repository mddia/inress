<?php
	//objet soutien
	
	class soutien {
		
		//vars
		private $pdo;
		private $id;
		private $prenom;
		private $nom;
		private $intro;
		private $citation;
		private $url;
		private $professionFR;
		private $photo;
		
		//_construct
		public function __construct($pdo, $id) {
			//Atribution variables
			$this->pdo = $pdo;
			$this->id = $id;
			
			//If id != 0
			if ($id != 0) {
				//Query
				$query = $this->pdo->prepare("SELECT id, prenom, nom, texte, citation, url, profession_fr, photo FROM in_soutien WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->prenom = $data['prenom'];
				$this->nom = $data['nom'];
				$this->intro = $data['texte'];
				$this->citation = $data['citation'];
				$this->url = $data['url'];
				$this->professionFR = $data['profession_fr'];
				$this->photo = $data['photo'];
			}
			else {
				$this->prenom = 'INREES';
				$this->nom = '';
			}
		}
		
		//getDetails()
		public function getDetails() {
			//Array
			$soutien = array(
				'id' => $this->id,
				'prenom' => $this->prenom,
				'nom' => $this->nom,
				'intro' => $this->intro,
				'citation' => $this->citation,
				'url' => $this->url,
				'professionFR' => $this->professionFR,
				'photo' => $this->photo,
			);
			//Return
			return $soutien;
		}
		
		//add
		public function add($prenom, $nom, $intro, $citation, $url, $professionFR, $photo) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_soutien ('prenom', 'nom', 'texte', 'citation', 'url', 'profession_fr', 'photo') VALUES ('$prenom', '$nom', '$intro', '$citation', '$url', '$professionFR', '$photo')");
			$query->execute();
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_soutien ORDER BY nom ASC");
			$query->execute();
			//Array
			$all = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//objet
				$soutien = new soutien($this->pdo, $data['id']);
				$all[] = $soutien->getDetails();
			}
			//Return
			return $all;
		}
	}
?>