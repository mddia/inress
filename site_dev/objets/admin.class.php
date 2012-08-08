<?php
	//Class admin le 14/02/2012
	
	class admin {
		
		//Attribution variables
		private $pdo;
		private $smarty;
		private $cat;
		private $scat;
		private $identification = 0;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Assign variables
			$this->pdo = $pdo;
			$this->smarty = $smarty;
			//CHECK IF LOGGED
			$this->checkSession();
			//Assignation des variables $cat & $scat si besoin
			//$cat
			if (array_key_exists('cat', $_GET) AND $_GET['cat'] != '') {
				$this->cat = $_GET['cat'];
				$smarty->assign('cat', $_GET['cat']);
			}
			else {
				$this->cat = 'general';
				$smarty->assign('cat', 'general');
			}
			//$scat
			if (array_key_exists('scat', $_GET) AND $_GET['scat'] != '') {
				$this->scat = $_GET['scat'];
				$smarty->assign('scat', $_GET['scat']);
			}
			else {
				$this->scat = 'index';
				$smarty->assign('scat', 'index');
			}
		}
		
		//checkSession
		private function checkSession() {
			//In case cat is not declared
			if (!array_key_exists('cat', $_GET)) {
				$_GET['cat'] = 'general';
			}
			//On regarde is cat != identification
			if (array_key_exists('cat', $_GET) AND $_GET['cat'] != 'identification') {
				//Vérif
				if (!array_key_exists('moderateur', $_SESSION) OR $_SESSION['moderateur']['id'] == '') {
					header('location: admin.php?cat=identification');
					exit;
				}
				else {
					$this->identification = time();
					$this->smarty->assign('SESSION', $_SESSION);
				}
			}
			elseif (array_key_exists('scat', $_GET) AND $_GET['scat'] == 'check') {
				//Vérification des informations fournies
				$moderateur = new moderateur($this->pdo, 0);
				$moderateur->checkLogIn($_POST['email'], $_POST['password']);
			}
		}
		
		//setUp() => traite les données en fonction des catégories
		public function setUp() {
			switch ($this->cat) {
				//general
				case 'general':
					//scat check
					switch ($this->scat) {
						//gestionModerateurs
						case 'gestionModerateurs':
							//Listage des moderateurs
							$moderateur = new moderateur($this->pdo, 0);
							$modos = $moderateur->listAll();
							//Smarty
							$this->smarty->assign('moderateurs', $modos);
							break;
					}
					break;
				//reseau
				case 'reseau':
					//Traitement global
					$adminThread = new adminThread($this->pdo, 0);
					$threads = $adminThread->listAll();
					//Smarty
					$this->smarty->assign('threads', $threads);
					switch ($this->scat) {
						//thread
						case 'thread':
							//Infos
							$adminThread = new adminThread($this->pdo, $_GET['id']);
							$details = $adminThread->getDetails();
							//Smarty
							$this->smarty->assign('thread', $details);
							break;
					}
					break;
				//activites
				case 'activites':
					//Création objet
					$activites = new activites($this->pdo, $this->smarty);
					$activites->listActivitesTypes();
					//scat check
					switch ($this->scat) {
						//gestionactivitestypes
						case 'createactivites':
							//listLocaux /Intervenants / categories
							$activites->listLocaux();
							$theme = new theme($this->pdo, 0);
							$themes = $theme->listAll();
							$this->getSupport();
							$this->smarty->assign('themes', $themes);
							break;
						//gestionactivitestypes
						case 'activitestypes':
							//getDetails
							$type = $activites->getTypeDetails($_GET['id']);
							//Smarty
							$this->smarty->assign('type', $type);
							break;
						//gestionlocaux
						case 'gestionlocaux':
							//liste des locaux
							$activites->listLocaux();
							break;
						//locaux
						case 'locaux':
							//Détails locaux
							$lieu = $activites->getLocauxDetails($_GET['id']);
							//Smarty
							$this->smarty->assign('lieu', $lieu);
							break;
						//listeactivites
						case 'listeactivites':
							$activites->listEvents();
							break;
						//listeEV
						case 'listeEV':
							//Détails theme
							$details = $activites->getTypeDetails($_GET['id']);
							$activites->listSpecificEvents($_GET['id']);
							//Smarty
							$this->smarty->assign('theme', $details);
							break;
						//events
						case 'events':
						//listLocaux /Intervenants / categories
							$activites->listLocaux();
							$theme = new theme($this->pdo, 0);
							$themes = $theme->listAll();
							$this->getSupport();
							$this->smarty->assign('themes', $themes);
							$activite = new activite($this->pdo, $_GET['id']);
							$event = $activite->getDetails();
							//Smarty
							$this->smarty->assign('event', $event);
							break;
					}
					break;
				//messagerie
				case 'messagerie':
					//Listages de base
					$messagerie = new messagerie($this->pdo, $this->smarty);
					$messagerie->listAwaitingMessages();
					$messagerie->listUnlabelledMessages();
					$messagerie->listDeletedMessages();
					$messagerie->listTestimonies();
					//labels
					$label = new label($this->pdo, 0);
					$this->smarty->assign('labels', $label->listAll());
					//Listage des labels qui me concernent
					$moderateur = new moderateur($this->pdo, $_SESSION['moderateur']['id']);
					$myLabels = $moderateur->getLinkedLabels();
					$mailBox = $moderateur->getMailBoxDetails('received');
					$trashBox = $moderateur->getMailBoxDetails('trash');
					//Smarty assignation des labels spéciaux
					$this->smarty->assign('myLabels', $myLabels);
					$this->smarty->assign('mailBoxCount', $mailBox['count']);
					$this->smarty->assign('mailBox', $mailBox['mailBox']);
					$this->smarty->assign('trashBoxCount', $trashBox['count']);
					$this->smarty->assign('trashBox', $trashBox['mailBox']);
					//scat check
					switch ($this->scat) {
						//handleTopics
						case 'handleTopics':
							$messageTopic = new messageTopic($this->pdo, 0);
							$topics = $messageTopic->listAll();
							$label = new label($this->pdo, 0);
							$labels = $label->listAll();
							$this->smarty->assign('topics', $topics);
							$this->smarty->assign('labels', $labels);
							break;
						//advancedSearch
						case 'advancedSearch':
							$messageTopic = new messageTopic($this->pdo, 0);
							$topics = $messageTopic->listAll();
							$this->smarty->assign('topics', $topics);
							$tag = new tag($this->pdo, 0);
							$tags = $tag->listAll();
							$this->smarty->assign('tags', $tags);
							//Check for research
							if (array_key_exists('search', $_POST) AND $_POST['search'] == '1') {
								$this->smarty->assign('search', 1);
								$messageSearch = new messageSearch($this->pdo, $this->smarty);
								$messageSearch->find($_POST['name'], $_POST['topic'], $_POST['content']);
							}
							else if (array_key_exists('search', $_POST) AND $_POST['search'] == '2') {
								$this->smarty->assign('search', 2);
								$messageSearch = new messageSearch($this->pdo, $this->smarty);
								$messageSearch->findByTag($_POST['tag']);
							}
							else {
								$this->smarty->assign('search', 0);
							}
							break;
						//message
						case 'message':
							if (array_key_exists('id', $_GET)) {
								//Objet
								$adminMessage = new adminMessage($this->pdo, $_GET['id']);
								$details = $adminMessage->getDetails();
								$answers = $adminMessage->getAnswers($this->smarty);
								//Réponse ?
								if (array_key_exists('reponse', $_GET) AND $_GET['reponse'] != '') {
									if ($_GET['reponse'] == 1) {
										$reponse = 1;
									}
									elseif ($_GET['reponse'] == 2) {
										$reponse = 2;
										//Traitement du contenu
										$_POST['message'] = nl2br($_POST['message']);
										$_POST['message'] = stripslashes($_POST['message']);
										$this->smarty->assign('POST', $_POST);
									}
									else {
										$reponse = 0;
									}
								}
								else {
									$reponse = 0;
								}
								//Assign
								$this->smarty->assign('message', $details);
								$this->smarty->assign('answers', $answers);
								$this->smarty->assign('reponse', $reponse);
							}
							else {
								header('location: admin.php?cat=messagerie');
							}
							break;
						//envoyes
						case 'envoyes':
							if (array_key_exists('limit', $_GET) AND $_GET['limit'] == 1) {
								$messagerie->listSentMessages('all', 0);
							}
							else {
								$messagerie->listSentMessages('last', 0);
							}
							break;
						//mySentBox
						case 'mySentBox':
							if (array_key_exists('limit', $_GET) AND $_GET['limit'] == 1) {
								$messagerie->listSentMessages('all', $_SESSION['moderateur']['id']);
							}
							else {
								$messagerie->listSentMessages('last', $_SESSION['moderateur']['id']);
							}
							break;
						//labelEnvoyes
						case 'labelEnvoyes':
							//Réponses envoyés au messages de ce label
							if (array_key_exists('limit', $_GET) AND $_GET['limit'] == 1) {
								$messagerie->listSentLabelledMessages($_GET['id'], 'all');
							}
							else {
								$messagerie->listSentLabelledMessages($_GET['id'], 'last');
							}
							//Infos labels
							$thisLabel = new label($this->pdo, $_GET['id']);
							$this->smarty->assign('thisLabel', $thisLabel->getDetails());
							break;
						//labelAttente
						case 'labelAttente':
							//On récupère les messages concernés par le label
							$awaitingLabelledMessages = $messagerie->listLabelledMessages($_GET['id']);
							$this->smarty->assign('awaitingLabelledMessages', $awaitingLabelledMessages);
							//Infos labels
							$thisLabel = new label($this->pdo, $_GET['id']);
							$this->smarty->assign('thisLabel', $thisLabel->getDetails());
							break;
					}
					break;
				//createpodcasts
				case 'website':
					//scat check
					switch ($this->scat) {
						//soutien
						case 'soutien':
							$soutien = new soutien($this->pdo, $_GET['id']);
							$details = $soutien->getDetails();
							$this->smarty->assign('soutien', $details);
							break;
						//gestionIntervenants
						case 'gestionIntervenants':
							$soutien = new soutien($this->pdo, 0);
							$all = $soutien->listAll();
							//Smarty
							$this->smarty->assign('soutiens', $all);
							break;
						//ajoutArticle
						case 'ajoutArticle':
							$this->getDate();
							$this->getMagRubs();
							$this->getMagThemes();
							$this->getSupport();
							break;
						//listOfflineArticles
						case 'listOfflineArticles':
							$this->listArticles(0, 0);
							break;
						//listArticlesbb
						case 'listArticlesbb':
							$this->listArticles(1, 0);
							break;
						//listArticlesbb
						case 'listArticlesbis':
							$this->listArticles(1, 1);
							break;
						//magarticle
						case 'magarticle':
							//If ake
							if (array_key_exists('id', $_GET) AND $_GET['id'] != '') {
								$magazineArticle = new magazineArticle($this->pdo, $_GET['id']);
								//getDetails
								$details = $magazineArticle->getDetails();
								$this->getMagRubs();
								$this->getMagThemes();
								$this->getSupport();
								//Assign
								$this->smarty->assign('article', $details);
							}
							break;
						//createpodcasts
						case 'createpodcasts':
							$this->getDate();
							$this->getMagThemes();
							$this->getSupport();
							break;
						//createpodcasts
						case 'createvideo':
							$this->getDate();
							$this->getMagThemes();
							$this->getSupport();
							break;
						//listepodcasts
						case 'listepodcasts':
							$this->listPodcasts();
							break;
						//listevideos
						case 'listevideos':
							$this->listvideos();
							break;
						//podcasts
						case 'podcasts':
							//If ake
							if (array_key_exists('id', $_GET) AND $_GET['id'] != '') {
								$podcast = new podcast($this->pdo, $_GET['id']);
								//getDetails
								$details = $podcast->getDetails();
								$this->getDate();
								$this->getMagThemes();
								$this->getSupport();
								//Assign
								$this->smarty->assign('podcast', $details);
							}
							break;
						//videos
						case 'videos':
							//If ake
							if (array_key_exists('id', $_GET) AND $_GET['id'] != '') {
								$video = new video($this->pdo, $_GET['id']);
								//getDetails
								$details = $video->getDetails();
								$this->getDate();
								$this->getMagThemes();
								$this->getSupport();
								//Assign
								$this->smarty->assign('video', $video);
							}
							break;
					}
					break;
				//membres
				case 'membres':
					//Listage des pays
					$address = new address($this->pdo, 0);
					$countries = $address->listCountries();
					$states = $address->listStates();
					$this->smarty->assign('countries', $countries);
					$this->smarty->assign('states', $states);
					//scat check
					switch ($this->scat) {
						//membres
						case 'membres':
							//Création objet user
							$user = new user($this->pdo, 0, $_GET['id']);
							$userDetails = $user->getDetails();
							$this->smarty->assign('user', $userDetails);
							//Get details
							if (!array_key_exists('details', $_GET)) {
								$_GET['details'] = 0;
							}
							//Smarty
							$this->smarty->assign('GET', $_GET);
							break;
						//fusion
						case 'fusion':
							//Création objet user
							$user = new user($this->pdo, 0, $_GET['id']);
							$userDetails = $user->getDetails();
							$this->smarty->assign('user', $userDetails);
							break;
						//fusionInfos
						case 'fusionInfos':
							$user = new user($this->pdo, 0, $_POST['userToKeep']);
							$infos = $user->getFusionInfosWith($_POST['userToDelete']);
							$userDetails = $user->getDetails();
							$user2 = new user($this->pdo, 0, $_POST['userToDelete']);
							$user2Details = $user2->getDetails();
							$this->smarty->assign('infos', $infos);
							$this->smarty->assign('userToKeep', $userDetails);
							$this->smarty->assign('userToDelete', $user2Details);
							break;
					}
					break;
				//partenaires
				case 'partenaires':
					//scat check
					switch ($this->scat) {
						//partner
						case 'partner':
							//list countries
							$address = new address($this->pdo, 0);
							$countries = $address->listCountries();
							$this->smarty->assign('countries', $countries);
							//Création objet partner
							$partner = new partner($this->pdo, $_GET['id']);
							$partnerDetails = $partner->getDetails();
							$this->smarty->assign('partner', $partnerDetails);
							break;
					}
					break;
				//boutique
				case 'boutique':
					//listage des count commandes
					$order = new order($this->pdo, $this->smarty, 0);
					$order->countAll('unpaid');
					$order->countAll('unsent');
					$order->countAll('sent');					
					$order->countUnfinished();
					$families = new families($this->pdo, 0);
					$allTypes = $families->listAll();
					//Transmission Smarty
					$this->smarty->assign('allTypes', $allTypes);
					//scat check
					switch ($this->scat) {
						//unpaidOrders
						case 'unpaidOrders':
							$unpaid = $order->listAll('unpaid');
							$this->smarty->assign('unpaidOrders', $unpaid);
							break;
						//unsentOrders
						case 'unsentOrders':
							$unsent = $order->listAll('unsent');
							$this->smarty->assign('unsentOrders', $unsent);
							break;
						//sentOrders
						case 'sentOrders':
							$sent = $order->listAll('sent');
							$this->smarty->assign('sentOrders', $sent);
							break;
						//unfinishedOrders
						case 'unfinishedOrders':
							$order->listUnfinished();
							break;
						//refundOrders
						case 'refundOrders':
							$order->listRefund();
							break;
						//macommande
						case 'macommande':
							if (array_key_exists('id', $_GET) AND $_GET['id'] != '') {
								$orderId = $_GET['id'];
								//Création objet partner
								$myOrder = new order($this->pdo, $this->smarty, $orderId);
								$orderDetails = $myOrder->getDetails();
								//Smarty assign
								$this->smarty->assign('order', $orderDetails);
							}
							break;
						//handleMags
						case 'handleMags':
							//Traitements
							$magazine = new magazine($this->pdo);
							$mags = $magazine->listAll();
							//On récupère les différents abonnements
							$abonnements = new abonnements($this->pdo, 0);
							$abos = $abonnements->listAll();
							//Smarty
							//$this->smarty->assign('lastMag', $lastMag);
							//$this->smarty->assign('nextMag', $nextMag);
							$this->smarty->assign('mags', $mags);
							$this->smarty->assign('abos', $abos);
							break;
						//routageList
						case 'routageList':
							//get basic routage infos
							$routage = new routage($this->pdo, $this->smarty);
							$routage->getBasicInfos();
							//Mags
							$magazine = new magazine($this->pdo);
							$allMags = $magazine->listRoot();
							$this->smarty->assign('magazines', $allMags);
							break;
					}
					break;
				//budget
				case 'budget':
					//Traitement global
					$budget = new budget($this->pdo, $this->smarty);
					//Array
					$today = array(
						'jour' => date("d"),
						'mois' => date("m"),
						'annee' => date("Y"),
					);
					//Smartyy
					$this->smarty->assign('today', $today);
					//scat check
					switch ($this->scat) {
						//rentree
						case 'rentrees':
							$budget->listAllRentrees();
						break;
						//rentree
						case 'rentree':
							$budget->getRentreeDetails($_GET['id']);
						break;
					}
					break;
				//queries
				case 'query':
					//switch scat
					switch($this->scat) {
						case 'exportAllEmails':
							//Objet
							$user = new user($this->pdo, 0, 0);
							$users = $user->exportAll();
							//Smarty
							$this->smarty->assign('users', $users);
							break;
						case 'exportMy':
							$routage = new routage($this->pdo, $this->smarty);
							$myPayants = $routage->getMyInreesUsers(0, $_GET['aboId'], $_GET['numero']);
							//Smarty
							$this->smarty->assign('myPayants', $myPayants);
							break;
						case 'exportMyGratuits':
							$routage = new routage($this->pdo, $this->smarty);
							$myGratuits = $routage->getMyInreesUsers(1, $_GET['aboId'], $_GET['numero']);
							//Smarty
							$this->smarty->assign('myGratuits', $myGratuits);
							break;
						case 'exportMySQL':
							$routage = new routage($this->pdo, $this->smarty);
							$myPayants = $routage->getMyInreesUsers(0, $_GET['aboId'], $_GET['numero']);
							$myGratuits = $routage->getMyInreesUsers(1, $_GET['aboId'], $_GET['numero']);
							$productsType = new productsType($this->pdo, $_GET['aboId']);
							$details = $productsType->getDetails();
							$timestamp = time();
							//Smarty
							$this->smarty->assign('myPayants', $myPayants);
							$this->smarty->assign('myGratuits', $myGratuits);
							$this->smarty->assign('aboId', $_GET['aboId']);
							$this->smarty->assign('aboTitle', $details['title']);
							$this->smarty->assign('numero', $_GET['numero']);
							$this->smarty->assign('timestamp', $timestamp);
							break;
						//getHistory
						case 'getHistory':
							$routage = new routage($this->pdo, $this->smarty);
							$history = $routage->getHistory($_GET['gratuit'], $_GET['aboId'], $_GET['numero']);
							$productsType = new productsType($this->pdo, $_GET['aboId']);
							$details = $productsType->getDetails();
							//Smarty
							$this->smarty->assign('history', $history);
							$this->smarty->assign('aboTitle', $details['title']);
							$this->smarty->assign('numero', $_GET['numero']);
							$this->smarty->assign('gratuit', $_GET['gratuit']);
							break;
						case 'unsentOrders':
							//listage des commandes
							$order = new order($this->pdo, $this->smarty, 0);
							$unsent = $order->listAll('unsent');
							break;
					}
					break;
			}
			//Affichage du template en fonction de l'identification
			if ($this->identification == 0) {
				$this->smarty->display('admin/identification.tpl');
			}
			elseif ($this->cat == 'query') {
				$this->smarty->display('admin/query.tpl');
			}
			else {
				$this->smarty->display('admin/board.tpl');
			}
		}
		
		//** FONCTIONS DE TRAITEMENT INTERNE **//
		
		// get Date and send to smarty
		private function getDate() {
			//Get Date
			$jour = date("d") ;
			$mois = date("m") ;
			$annee = date("Y") ;
			$heure = date("H") ;
			$minute = date("i") ;
			
			//Transmission to array
			$date = array(
				'jour' => $jour,
				'mois' => $mois,
				'annee' => $annee,
				'heure' => $heure,
				'minute' => $minute,
			);
			
			//Assignation smarty
			$this->smarty->assign('date', $date);
		}
		
		//get 2emag_rubriques and send to smarty
		private function getMagRubs() {
			//PDO
			$query = $this->pdo->prepare("SELECT id, titre, titreind, ordre, titreall FROM 2emag_rubriques ORDER BY id ASC");
			$query->execute();
			//Création array
			$rubriques = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$rubriques[] = array(
					'id' => $data['id'],
					'titre' => $data['titre'],
					'titreind' => $data['titreind'],
					'ordre' => $data['ordre'],
					'titreall' => $data['titreall'],
				);
			}
			//Smarty
			$this->smarty->assign('rubriques', $rubriques);
		}
		
		//get 2emag_themes and send to smarty
		private function getMagThemes() {
			//PDO
			$query = $this->pdo->prepare("SELECT id, url, idtheme, titre, minititre, stats, color FROM 2emag_themesdetails ORDER BY ordre ASC");
			$query->execute();
			//Création array
			$themes = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$themes[] = array(
					'id' => $data['id'],
					'url' => $data['url'],
					'idtheme' => $data['idtheme'],
					'titre' => $data['titre'],
					'minititre' => $data['minititre'],
					'stats' => $data['stats'],
					'color' => $data['color'],
				);
			}
			//Smarty
			$this->smarty->assign('themes', $themes);
		}
		
		//get soutiens and send to smarty
		private function getSupport() {
			//PDO
			$query = $this->pdo->prepare("SELECT id, nom, prenom FROM in_soutien ORDER BY nom ASC");
			$query->execute();
			//Création array
			$supports = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$supports[] = array(
					'id' => $data['id'],
					'nom' => $data['nom'],
					'prenom' => $data['prenom'],
				);
			}
			//Smarty
			$this->smarty->assign('supports', $supports);
		}
		
		//get soutiens and send to smarty
		private function listArticles($online, $actif) {
			//Gestion order
			if (array_key_exists('orderby', $_GET) AND $_GET['orderby'] != '') {
				switch($_GET["orderby"]) {
					case 'name':
						$orderby = "titre ASC";
						break;
					case 'name2':
						$orderby = "titre DESC";
						break;
					case 'theme':
						$orderby = "idtheme ASC";
						break;
					case 'theme2':
						$orderby = "idtheme DESC";
						break;
					case 'rub':
						$orderby = "idrub ASC";
						break;
					case 'rub2':
						$orderby = "idrub DESC";
						break;
					case 'auteur':
						$orderby = "idredacteur ASC";
						break;
					case 'auteur2':
						$orderby = "idredacteur DESC";
						break;
					case 'actif':
						$orderby = "actif ASC";
						break;
					case 'actif2':
						$orderby = "actif DESC";
						break;
				}
			}
			else {
				$orderby = "timestamp DESC" ;
			}
			//PDO
			$query = $this->pdo->prepare("SELECT id FROM 2emag_articles WHERE online = '$online' AND actif = '$actif' ORDER BY $orderby");
			$query->execute();
			//Création array
			$articles = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$magazineArticle = new magazineArticle($this->pdo, $data['id']);
				$magDetails = $magazineArticle->getDetails();
				//Transmission array
				$articles[] = $magDetails;
			}
			//Smarty
			$this->smarty->assign('articles', $articles);
		}
		
		//listpodcasts
		public function listPodcasts() {
			//Création orderby
			$orderby = 'timestamp DESC';
			//PDO
			$query = $this->pdo->prepare("SELECT id FROM in_podcasts ORDER BY $orderby");
			$query->execute();
			//Création array
			$podcasts = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$podcast = new podcast($this->pdo, $data['id']);
				$details = $podcast->getDetails();
				//Array
				$podcasts[] = $details;
			}
			//Smarty
			$this->smarty->assign('podcasts', $podcasts);
		}
		
		//listpodcasts
		public function listVideos() {
			//Création orderby
			$orderby = 'timestamp DESC';
			//PDO
			$query = $this->pdo->prepare("SELECT id FROM in_videos ORDER BY $orderby");
			$query->execute();
			//Création array
			$videos = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$video = new video($this->pdo, $data['id']);
				$details = $video->getDetails();
				//Array
				$videos[] = $details;
			}
			//Smarty
			$this->smarty->assign('videos', $videos);
		}
	}
?>