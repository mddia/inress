<?php
	//Objet video
	class video {
		
		//Vars
		private $pdo;
		private $id;
		private $idAgenda;
		private $myinrees;
		private $stats;
		private $url;
		private $titre;
		private $sst;
		private $timestamp;
		private $theme;
		private $titreTheme;
		private $dureeS;
		private $actif;
		private $site;
		
		//__construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//if $id != 0 => vars
			if ($id != 0) {
				$this->id = $id;
				//PDO
				$query = $this->pdo->prepare("SELECT id, idagenda, myinrees, stats, url, titre, sst, timestamp, theme, dureeS, actif, site FROM in_videos WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				//Création array
				$videos = array();
				//Transmission vars
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Récupération des infos variables
				$theme = new theme($this->pdo, $data['theme']);
				$themeDetails = $theme->getDetails();
				//Vars
				$this->id = $data['id'];
				$this->idagenda = $data['idagenda'];
				$this->myinrees = $data['myinrees'];
				$this->stats = $data['stats'];
				$this->url = $data['url'];
				$this->titre = stripslashes($data['titre']);
				$this->sst = $data['sst'];
				$this->timestamp = $data['timestamp'];
				$this->theme = $data['theme'];
				$this->titreTheme = $themeDetails['titre'];
				$this->dureeS = $data['dureeS'];
				$this->actif = $data['actif'];
				$this->site = $data['site'];
			}
		}
		
		//add
		public function add($myinrees, $confassign, $theme, $url, $titre, $sst, $timestamp, $dureeS, $actif) {
			//query
			$query = $this->pdo->prepare("INSERT INTO in_videos VALUES('' , '$confassign', '$myinrees', '0', '$url', '$titre', '$sst', '$timestamp', '$theme', '$dureeS', '$actif', '')");
			$query->execute();
			//lastInsertId
			$this->id = $this->pdo->lastInsertId();			
		}
		
		//getDetails
		public function getDetails() {
			//Array
			$video = array(
				'id' => $this->id,
				'idagenda' => $this->idagenda,
				'myinrees' => $this->myinrees,
				'stats' => $this->stats,
				'url' => $this->url,
				'titre' => $this->titre,
				'sst' => $this->sst,
				'timestamp' => $this->timestamp,
				'theme' => $this->theme,
				'titreTheme' => $this->titre,
				'dureeS' => $this->dureeS,
				'actif' => $this->actif,
				'site' => $this->site,
			);
			//return
			return $video;
		}
		
		//addtag
		public function addtag($id) {
			$query = $this->pdo->prepare("INSERT INTO in_videostags VALUES('' , '$this->id', '$id')");
			$query->execute();
		}
		
		
		
		//editView
		public function editView($message) {
			header('location: admin.php?cat=website&scat=videos&id='.$this->id.'&m='.$message);
			exit;
		}
	}
?>