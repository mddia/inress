<?php
	//Objet magazineArticle le 15/02/2012	
	class magazineArticle {
		
		//Attribution variables
		private $pdo;
		//Vars article
		private $id;
		private $myinrees;
		private $blog;
		private $stats;
		private $timestamp;
		private $jour;
		private $mois;
		private $annee;
		private $heure;
		private $minute;
		private $photodir;
		private $photocopy;
		private $idrub;
		private $rubriqueTitre;
		private $idtheme;
		private $titreTheme;
		private $url;
		private $minititre;
		private $titre;
		private $minidesc;
		private $htmlgratuit;
		private $html;
		private $idredacteur;
		private $nomRedacteur;
		private $prenomRedacteur;
		private $redacteur;
		private $fav;
		private $actif;
		private $online;
		private $top;
		private $bot;
		private $website;
		private $idmag;
		
		//__construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			//If $id != 0
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT id, myinrees, blog, stats, timestamp, photodir, photocopy, idrub, idtheme, url, minititre, titre, minidesc, htmlgratuit, html, idredacteur, redacteur, fav, actif, online, top, bot, website, idmag FROM 2emag_articles WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Récupération des infos variables
				$theme = new theme($this->pdo, $data['idtheme']);
				$themeDetails = $theme->getDetails();
				$rubrique = new rubrique($this->pdo, $data['idrub']);
				$rubriqueDetails = $rubrique->getDetails();
				$soutien = new soutien($this->pdo, $data['idredacteur']);
				$soutienDetails = $soutien->getDetails();
				//Récupération des informations timestamp
				$this->timestamp = $data['timestamp'];
				$time = date("d-m-Y-H-i", $this->timestamp);
				$date = explode("-", $time);
				//Variables date
				$this->jour = $date[0];
				$this->mois = $date[1];
				$this->annee = $date[2];
				$this->heure = $date[3];
				$this->minute = $date[4];
				//Attributions variables
				$this->id = $data['id'];
				$this->myinrees = $data['myinrees'];
				$this->blog = $data['blog'];
				$this->stats = $data['stats'];
				$this->photodir = $data['photodir'];
				$this->photocopy = $data['photocopy'];
				$this->idrub = $data['idrub'];
				$this->rubriqueTitre = $rubriqueDetails['titre'];
				$this->idtheme = $data['idtheme'];
				$this->titreTheme = $themeDetails['titre'];
				$this->url = $data['url'];
				$this->minititre = stripslashes($data['minititre']);
				$this->titre = stripslashes($data['titre']);
				$this->minidesc = stripslashes($data['minidesc']);
				$this->htmlgratuit = stripslashes($data['htmlgratuit']);
				$this->html = stripslashes($data['html']);
				$this->idredacteur = $data['idredacteur'];
				$this->nomRedacteur = $soutienDetails['nom'];
				$this->prenomRedacteur = $soutienDetails['prenom'];
				$this->redacteur = $data['redacteur'];
				$this->fav = $data['fav'];
				$this->actif = $data['actif'];
				$this->online = $data['online'];
				$this->top = $data['top'];
				$this->bot = $data['bot'];
				$this->website = $data['website'];
				$this->idmag = $data['idmag'];				
			}
		}
		
		//add
		public function add($myinrees, $blog, $stats, $timestamp, $photodir, $photocopy, $idrub, $idtheme, $url, $minititre, $titre, $minidesc, $htmlgratuit, $html, $idredacteur, $redacteur, $fav, $actif, $online, $top, $bot, $website, $idmag) {
			//Preparation des variables
			$content = new content($minititre);
			$minititre = $content->secure();
			$content = new content($titre);
			$titre = $content->secure();
			$content = new content($minidesc);
			$minidesc = $content->secure();
			$content = new content($htmlgratuit);
			$htmlgratuit = $content->secure();
			$content = new content($html);
			$html = $content->secure();
			
			//Query
			$query = $this->pdo->prepare("INSERT INTO 2emag_articles VALUES ('', '$myinrees', '$blog', '$stats', '$timestamp', '$photodir', '', '$idrub', '$idtheme', '$url', '$minititre', '$titre', '$minidesc', '$htmlgratuit', '$html', '$idredacteur', '$redacteur', '$fav', '$actif', '$online', '$top', '$bot', '$website', '$idmag')");
			$query->execute();
			
			//Récupération insertId
			$this->id = $this->pdo->lastInsertId();
		}
		
		//update
		public function update($myinrees, $blog, $stats, $timestamp, $photodir, $photocopy, $idrub, $idtheme, $url, $minititre, $titre, $minidesc, $htmlgratuit, $html, $idredacteur, $redacteur, $fav, $actif, $online, $top, $bot, $website, $idmag) {
			//Preparation des variables
			$content = new content($minititre);
			$minititre = $content->secure();
			$content = new content($titre);
			$titre = $content->secure();
			$content = new content($minidesc);
			$minidesc = $content->secure();
			$content = new content($htmlgratuit);
			$htmlgratuit = $content->secure();
			$content = new content($html);
			$html = $content->secure();
			
			//Query
			$query = $this->pdo->prepare("UPDATE 2emag_articles SET myinrees = '$myinrees', blog = '$blog', stats = '$stats', timestamp = '$timestamp', photodir = '$photodir', idrub = '$idrub', idtheme = '$idtheme', url = '$url', minititre = '$minititre', titre = '$titre', minidesc = '$minidesc', htmlgratuit = '$htmlgratuit', html = '$html', idredacteur = '$idredacteur', redacteur = '$redacteur', fav = '$fav', actif = '$actif', online = '$online', top = '$top', bot = '$bot', website = '$website', idmag = '$idmag' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//delete
		public function delete() {
			//query
			$query = $this->pdo->prepare("DELETE FROM 2emag_articles WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//getDetails()
		public function getDetails() {
			//Array
			$article = array(
				'id' => $this->id,
				'myinrees' => $this->myinrees,
				'blog' => $this->blog,
				'stats' => $this->stats,
				'timestamp' => $this->timestamp,
				'jour' => $this->jour,
				'mois' => $this->mois,
				'annee' => $this->annee,
				'heure' => $this->heure,
				'minute' => $this->minute,
				'photodir' => $this->photodir,
				'photocopy' => $this->photocopy,
				'idrub' => $this->idrub,
				'rubriqueTitre' => $this->rubriqueTitre,
				'idtheme' => $this->idtheme,
				'titreTheme' => $this->titreTheme,
				'url' => $this->url,
				'minititre' => $this->minititre,
				'titre' => $this->titre,
				'minidesc' => $this->minidesc,
				'htmlgratuit' => $this->htmlgratuit,
				'html' => $this->html,
				'idredacteur' => $this->idredacteur,
				'nomRedacteur' => $this->nomRedacteur,
				'prenomRedacteur' => $this->prenomRedacteur,
				'redacteur' => $this->redacteur,
				'fav' => $this->fav,
				'actif' => $this->actif,
				'online' => $this->online,
				'top' => $this->top,
				'bot' => $this->bot,
				'website' => $this->website,
				'idmag' => $this->idmag
			);
			//Return
			return $article;
		}
		
		//editView
		public function editView($message) {
			header('location: admin.php?cat=magazine&scat=magarticle&id='.$this->id.'&m='.$message);
			exit;
		}
	}
?>