<?php
	//Class partner
	class partner {
		
		//Vars
		private $pdo;
		private $id;
		private $descid;
		private $url;
		private $nom;
		private $desc;
		private $descV;
		private $postal;
		private $ville;
		private $pays;
		private $adresse;
		private $adresse2;
		private $adresse3;
		private $site;
		private $actifsite;
		
		//__construct
		public function __construct($pdo, $id) {
			//Attribution
			$this->pdo = $pdo;
			//Vérif si id != 0
			if ($id != 0) {
				//Var
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT descid, url, nom, desc_, descV, postal, ville, pays, adresse, adresse2, adresse3, site, actifsite FROM in_partenaires WHERE id = '$this->id' LIMIT 1");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission Variables
				$this->descid = $data['descid'];
				$this->url = $data['url'];
				$this->nom = stripslashes($data['nom']);
				$this->desc = stripslashes($data['desc_']);
				$this->descV = $data['descV'];
				$this->postal = $data['postal'];
				$this->ville = stripslashes($data['ville']);
				$this->pays = $data['pays'];
				$this->adresse = stripslashes($data['adresse']);
				$this->adresse2 = stripslashes($data['adresse2']);
				$this->adresse3 = stripslashes($data['adresse3']);
				$this->site = $data['site'];
				$this->actifsite = $data['actifsite'];
			}
		}
		
		//getDetails
		public function getDetails() {
			//Création array
			$partner = array(
				'id' => $this->id,
				'descid' => $this->descid,
				'url' => $this->url,
				'nom' => $this->nom,
				'desc' => $this->desc,
				'descV' => $this->descV,
				'postal' => $this->postal,
				'ville' => $this->ville,
				'pays' => $this->pays,
				'adresse' => $this->adresse,
				'adresse2' => $this->adresse2,
				'adresse3' => $this->adresse3,
				'site' => $this->site,
				'actifsite' => $this->actifsite,
			);
			//Return
			return $partner;
		}
		
		//update
		public function update($titre, $description, $site, $adresse, $adresse2, $adresse3, $postal, $ville, $pays, $actifsite) {
			//Secure datas
			$content = new content($titre);
			$titre = $content->secure();
			$content = new content($description);
			$description = $content->secure();
			$content = new content($adresse);
			$adresse = $content->secure();
			$content = new content($adresse2);
			$adresse2 = $content->secure();
			$content = new content($adresse3);
			$adresse3 = $content->secure();
			$content = new content($ville);
			$ville = $content->secure();
			//Query
			$query = $this->pdo->prepare("UPDATE in_partenaires SET nom = '$titre', desc_ = '$description', adresse = '$adresse', adresse2 = '$adresse2', adresse3 = '$adresse3', postal = '$postal', ville = '$ville', pays = '$pays', actifsite = '$actifsite' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//redirect
		public function redirect() {
			header('location: admin.php?cat=partenaires&scat=partner&id='.$this->id);
			exit;
		}
	}
?>