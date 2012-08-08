<?php
	//objet theme
	
	class theme {
		
		//vars
		private $pdo;
		private $id;
		private $url;
		private $idtheme;
		private $titre;
		private $minititre;
		private $ordre;
		private $stats;
		private $color;
		
		//_construct
		public function __construct($pdo, $id) {
			//Atribution variables
			$this->pdo = $pdo;
			//If id != 0
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT id, url, idtheme, titre, minititre, ordre, stats, color FROM 2emag_themesdetails WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission variables
				$this->url = $data['url'];
				$this->idtheme = $data['idtheme'];
				$this->titre = $data['titre'];
				$this->minititre = $data['minititre'];
				$this->ordre = $data['ordre'];
				$this->stats = $data['stats'];
				$this->color = $data['color'];
			}
		}
		
		//listAll
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM 2emag_themesdetails ORDER BY titre ASC");
			$query->execute();
			//Array
			$themes = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Objet
				$theme = new theme($this->pdo, $data['id']);
				//Array
				$themes[] = $theme->getDetails();
			}
			//Return
			return $themes;
		}
		
		//getDetails()
		public function getDetails() {
			//Array
			$theme = array(
				'id' => $this->id,
				'url' => $this->url,
				'idtheme' => $this->idtheme,
				'titre' => $this->titre,
				'minititre' => $this->minititre,
				'ordre' => $this->ordre,
				'stats' => $this->stats,
				'color' => $this->color,
			);
			//Return
			return $theme;
			print_r($theme);
		}
	}
?>