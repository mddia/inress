<?php
	//Objet activite
	class activite {
		
		//Vars
		private $pdo;
		private $id = 0;
		private $dateD;
		private $dateF;
		private $locaux;
		private $fraisint;
		private $fraisdivers;
		private $benefsupp;
		private $actif;
		private $dispos;
		private $dateLanc;
		private $dateComm;
		private $refConf;
		private $linkinvit;
		private $linkinvittext;
		private $linkdesc;
		private $stats;
		private $activites;
		private $url;
		private $theme;
		private $titre;
		private $sst;
		private $presentation;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;
			//Vérif
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT in_agendadetailsplus.dateD, in_agendadetailsplus.dateF, in_agendadetailsplus.locaux, in_agendadetailsplus.fraisint, in_agendadetailsplus.fraisdivers, in_agendadetailsplus.benefsupp, in_agendadetailsplus.actif, in_agendadetailsplus.dispos, in_agendadetailsplus.dateLanc, in_agendadetailsplus.dateComm, in_agendadetailsplus.refConf, in_agendadetailsplus.linkinvit, in_agendadetailsplus.linkinvittext, in_agendadetailsplus.linkdesc, in_agendadetails.stats, in_agendadetails.activites, in_agendadetails.url, in_agendadetails.theme, in_agendadetails.titre, in_agendadetails.sst, in_agendadetails.presentation FROM in_agendadetailsplus JOIN in_agendadetails ON in_agendadetailsplus.idagenda = in_agendadetails.id WHERE in_agendadetailsplus.id = '$id'");
				$query->execute();
				//Attribution variables
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission
				$this->dateD = $data['dateD'];
				$this->dateF = $data['dateF'];
				$this->locaux = $data['locaux'];
				$this->fraisint = $data['fraisint'];
				$this->fraisdivers = $data['fraisdivers'];
				$this->benefsupp = $data['benefsupp'];
				$this->actif = $data['actif'];
				$this->dispos = $data['dispos'];
				$this->dateLanc = $data['dateLanc'];
				$this->dateComm = $data['dateComm'];
				$this->refConf = $data['refConf'];
				$this->linkinvit = $data['linkinvit'];
				$this->linkinvittext = $data['linkinvittext'];
				$this->linkdesc = $data['linkdesc'];
				$this->stats = $data['stats'];
				$this->activites = $data['activites'];
				$this->url = $data['url'];
				$this->theme = $data['theme'];
				$this->titre = stripslashes($data['titre']);
				$this->sst = $data['sst'];
				$this->presentation = stripslashes($data['presentation']);
			}
		}
		
		//getDetails
		public function getDetails() {
			//themeName
			$query = $this->pdo->prepare("SELECT nomsing FROM in_agendaactivites WHERE id = '$this->activites'");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Array
			$activite = array(
				'id' => $this->id,
				'dateD' => $this->dateD,
				'dateF' => $this->dateF,
				'locaux' => $this->locaux,
				'fraisint' => $this->fraisint,
				'fraisdivers' => $this->fraisdivers,
				'benefsupp' => $this->benefsupp,
				'actif' => $this->actif,
				'dispos' => $this->dispos,
				'dateLanc' => $this->dateLanc,
				'dateComm' => $this->dateComm,
				'refConf' => $this->refConf,
				'linkinvit' => $this->linkinvit,
				'linkinvittext' => $this->linkinvittext,
				'linkdesc' => $this->linkdesc,
				'stats' => $this->stats,
				'activites' => $this->activites,
				'activitesName' => $data['nomsing'],
				'url' => $this->url,
				'theme' => $this->theme,
				'titre' => $this->titre,
				'sst' => $this->sst,
				'presentation' => $this->presentation,
			);
			//Return
			return $activite;
		}
	}
?>