<?php
	//Objet user le 18/01/2012
	class user {
		
		//Attribution variables
		private $pdo;
		private $id;
		private $email;
		private $sqlAction = 0;
		
		//__construct
		public function __construct($pdo, $email, $id) {
			$this->pdo = $pdo;
			$this->email = $email;
			$this->id = $id;
		}
		
		//check
		public function check() {
			$query = $this->pdo->query("SELECT id FROM in_emails WHERE email = '$this->email'");
			$query->execute();
			$count = $query->rowCount();
			//Si l'utilisateur est inscrit on récupère sont id
			if ($count != 0) {
				$data = $query->fetch(PDO::FETCH_ASSOC);
				$this->id = $data['id'];
			}
			else {
				$this->id = 0;
			}
			//Return
			return $this->id;
		}
		
		//register
		public function register($civility, $name, $firstName) {
			//Variables
			$time = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_emails VALUES('', '1', '$time', '1', '$this->email', '', '0', '0', '0', '', '0', '', '$civility', '$name', '$firstName', '0', '', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '85ce1a0822f4d9f070e93a87b82400f9', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
			$query->execute();
			//Attribution
			$this->id = $this->pdo->lastInsertId();
			
			//return
			return $this->id;
		}
		
		//recordNew
		public function registerNew($email, $civility, $name, $firstName, $password){
			//Conversion du mdp
			$md5Pass = md5($password);
			//Time
			$time = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_emails VALUES('', '1', '$time', '1', '$email', '', '0', '0', '0', '', '0', '', '$civility', '$name', '$firstName', '0', '', '0', '0', '0', 0, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', 0, '$md5Pass', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
			$query->execute();
			//Attribution
			$this->id = $this->pdo->lastInsertId();
		}
		
		//recoverAbo
		public function recoverAbo($aboId, $addressId) {
			//Vérif que l'user est connu
			if ($this->id != 0) {
				//On update l'adresse de l'utilisateur
				$query = $this->pdo->prepare("UPDATE in_addresses SET userId = '$this->id', defaultAddress = '1' WHERE id = '$addressId' LIMIT 1");
				$query->execute();
				//On update l'abonnement de l'utilisateur
				$query = $this->pdo->prepare("UPDATE in_abonnements SET userId = '$this->id' WHERE id = '$aboId' LIMIT 1");
				$query->execute();
				//Return
				return 1;
			}
			else {
				echo '<strong>ERREUR :</strong> l\'utilisateur n\'est pas défini dans user.class.php :: recoverAbo';
				return 0;
			}
		}
		
		
		//addAddress
		public function addAddress($civility, $name, $firstName, $address1, $address2, $address3, $city, $zipCode, $country, $state, $defaultAddress) {
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_addresses VALUES('', '$this->id', '$civility', '$name', '$firstName', '$address1', '$address2', '$address3', '$city', '$zipCode', '$country', '$state', '$defaultAddress')");
			$query->execute();
		}
		
		//getDefaultAddress
		public function getDefaultAddress() {
			//Query
			$query = $this->pdo->query("SELECT id FROM in_addresses WHERE id = '$this->id' AND defaultAddress = '1'");
			$query->execute();
			//Attribution variable
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Return
			return $data['id'];
		}
		
		//listAllAddresses
		public function listAllAddresses() {
			//Query
			$query = $this->pdo->query("SELECT id, name, firstName, address1, address2, address3, city, zipCode, defaultAddress, country, state FROM in_addresses WHERE userId = '$this->id' ORDER BY id ASC");
			$query->execute();
			//Création array
			$addresses = array();
			//Attribution variable
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Détails
				$country = new country($this->pdo, $data['country']);
				$cDetails = $country->getDetails();
				if ($data['state'] != 0 AND $data['state'] != '') {
					$state = new state($this->pdo, $data['state']);
					$sDetails = $state->getDetails();
				}
				else {
					$sDetails = 0;
				}
				//Array
				$addresses[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
					'firstName' => $data['firstName'],
					'address1' => $data['address1'],
					'address2' => $data['address2'],
					'address3' => $data['address3'],
					'city' => $data['city'],
					'zipCode' => $data['zipCode'],
					'default' => $data['defaultAddress'],
					'country' => $cDetails,
					'state' => $sDetails,
				);
			}
			//Return
			return $addresses;
		}
		
		//updateRoutage
		public function updateRoutage($emailbis, $newsletteractif, $frequence, $routage) {
			//Query
			$query = $this->pdo->prepare("UPDATE in_emails SET emailbis = '$emailbis', actif = '$newsletteractif', frequence = '$frequence', actifpost = '$routage' WHERE id = '$this->id'");
			$query->execute();
		}
		
		//getName
		public function getName() {
			//Query
			$query = $this->pdo->query("SELECT prenom, nom FROM in_emails WHERE id = '$this->id'");
			$query->execute();
			//Attribution variable
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Variables
			$userName = $data['prenom'].' '.$data['nom'];
			//Return
			return $userName;
		}
		
		//listAllAbonnements
		public function listAllAbonnements() {
			//query
			$query = $this->pdo->prepare("SELECT in_abonnements.id FROM in_abonnements JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_orders.paid = 1 AND in_abonnements.userId = '$this->id' ORDER BY id DESC");
			$query->execute();
			//Array
			$abos = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$abonnements = new abonnements($this->pdo, $data['id']);
				$abos[] = $abonnements->getDetails();
			}
			//return
			return $abos;
		}
		
		//checkAbo
		public function checkAbo($aboId) {
			//query
			$query = $this->pdo->prepare("SELECT in_abonnements.id, in_abonnements.subLimit, in_abonnements.maxMag FROM in_abonnements JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_orders.paid = 1 AND in_abonnements.userId = '$this->id' AND in_abonnements.aboId = '$aboId' ORDER BY id DESC LIMIT 1");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$count = $query->rowCount();
			//Vérif
			if ($count != 0) {
				//Création array
				$abo = array(
					'id' => $data['id'],
					'subLimit' => $data['subLimit'],
					'maxMag' => $data['maxMag'],
				);
			}
			else {
				$abo = 0;
			}
			//Final array
			$data = array(
				'count' => $count,
				'abo' => $abo,
			);
			//Return
			return $data;
		}
		
		//listReceivedMags()
		public function listReceivedMags() {
			//query
			$query = $this->pdo->prepare("SELECT magId, aboId FROM in_emailsmagenvoi WHERE emailId = '$this->id' ORDER BY magId DESC");
			$query->execute();
			//Array
			$received = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Traitement abonnement
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Boucle
				$received[] = array(
					'aboTitle' => $details['title'],
					'numero' => $data['magId'],
				);
			}
			//return
			return $received;
		}
		
		//listReceivedMessages
		public function listReceivedMessages() {
			//query
			$query = $this->pdo->prepare("SELECT id, timestamp FROM admin_contact WHERE idemail = '$this->id' ORDER BY id DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Array
			$received = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Boucle
				$received[] = array(
					'id' => $data['id'],
					'timestamp' => $data['timestamp'],
				);
			}
			//Final array
			$final = array(
				'count' => $count,
				'data' => $received,
			);
			//return
			return $final;
		}
		
		//listReceivedOrders
		public function listReceivedOrders() {
			//query
			$query = $this->pdo->prepare("SELECT id, value, timestamp, paid FROM in_orders WHERE userId = '$this->id' ORDER BY id DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Array
			$received = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Boucle
				$received[] = array(
					'id' => $data['id'],
					'value' => $data['value'],
					'timestamp' => $data['timestamp'],
					'paid' => $data['paid'],
				);
			}
			//Final array
			$final = array(
				'count' => $count,
				'data' => $received,
			);
			//return
			return $final;
		}
		
		//isModerateur
		private function isModerateur() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM admin_moderateurs WHERE idemail = '$this->id'");
			$query->execute();
			$count = $query->rowCount();
			//Return
			return $count;
		}
		
		//getDetails
		public function getDetails() {
			//Query
			$query = $this->pdo->prepare("SELECT nouveau, nouveaudate, langue, email, emailbis, noemail, profilactif, commvip, pseudo, avatar, photo, civilite, nom, prenom, idlivraisonDefaut, societe, telephone, telfix, mobileOK, motivationcat, profession, professions, experiences, parole, datenaissance, parrainage, parrainageok, diversdesc, vippresse, decouvert, pourquoi, validite, magmax, myinrees, myinreesgratuit, mylastconnex, password, clef, actif, frequence, actifpost, selection, cb, vip, mben, mbendesc, remarques, skype, twitter FROM in_emails WHERE id = '$this->id'");
			
			$query->execute();
			
			//Attribution variable
			$data = $query->fetch(PDO::FETCH_ASSOC);
			
			//On récupère les adresses de l'utilisateur
			$addresses = $this->listAllAddresses();
			
			//Abonnements
			$abonnements = $this->listAllAbonnements();
			
			//receivedMags
			$receivedMags = $this->listReceivedMags();
			
			//receivedMessages
			$receivedMessages = $this->listReceivedMessages();
			
			//receivedOrders
			$receivedOrders = $this->listReceivedOrders();
			
			//isModerateur
			$moderateur = $this->isModerateur();
			
			//Création array
			$details = array(
				'id' => $this->id,
				'nouveau' => $data['nouveau'],
				'nouveaudate' => $data['nouveaudate'],
				'langue' => $data['langue'],
				'email' => $data['email'],
				'emailbis' => $data['emailbis'],
				'noemail' => $data['noemail'],
				'profilactif' => $data['profilactif'],
				'commvip' => $data['commvip'],
				'pseudo' => $data['pseudo'],
				'avatar' => $data['avatar'],
				'photo' => $data['photo'],
				'civilite' => $data['civilite'],
				'nom' => stripslashes($data['nom']),
				'prenom' => stripslashes($data['prenom']),
				'addresses' => $addresses,
				'abonnements' => $abonnements,
				'receivedMags' => $receivedMags,
				'receivedMessages' => $receivedMessages,
				'receivedOrders' => $receivedOrders,
				'idlivraisonDefaut' => $data['idlivraisonDefaut'],
				'societe' => stripslashes($data['societe']),
				'telephone' => $data['telephone'],
				'telfix' => $data['telfix'],
				'mobileOK' => $data['mobileOK'],
				'motivationcat' => $data['motivationcat'],
				'profession' => $data['profession'],
				'professions' => $data['professions'],
				'experiences' => $data['experiences'],
				'parole' => $data['parole'],
				'datenaissance' => $data['datenaissance'],
				'parrainage' => $data['parrainage'],
				'parrainageok' => $data['parrainageok'],
				'diversdesc' => $data['diversdesc'],
				'vippresse' => $data['vippresse'],
				'decouvert' => $data['decouvert'],
				'pourquoi' => $data['pourquoi'],
				'validite' => $data['validite'],
				'magmax' => $data['magmax'],
				'myinrees' => $data['myinrees'],
				'myinreesgratuit' => $data['myinreesgratuit'],
				'mylastconnex' => $data['mylastconnex'],
				'password' => $data['password'],
				'clef' => $data['clef'],
				'actif' => $data['actif'],
				'frequence' => $data['frequence'],
				'actifpost' => $data['actifpost'],
				'select' => $data['selection'],
				'cb' => $data['cb'],
				'vip' => $data['vip'],
				'mben' => $data['mben'],
				'mbendesc' => $data['mbendesc'],
				'remarques' => $data['remarques'],
				'skype' => $data['skype'],
				'twitter' => $data['twitter'],
				'moderateur' => $moderateur,
			);
			
			//Return
			return $details;
		}
		
		//getExport
		public function exportAll() {
			//Query
			$query = $this->pdo->prepare("SELECT id, nom, prenom, email, selection, actif, cb FROM in_emails ORDER BY nom ASC");
			$query->execute();
			//Array
			$users = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Vars
				$userId = $data['id'];
				$now = time();
				//Traitement manquant other queries
				$query2 = $this->pdo->prepare("SELECT country, zipCode FROM in_addresses WHERE userId = '$userId' AND defaultAddress = '1' LIMIT 1");
				$query2->execute();
				$count = $query2->rowCount();
				//Vérif
				if ($count != 0) {
					$result = $query2->fetch(PDO::FETCH_ASSOC);
					//Get country
					$countryObject = new country($this->pdo, $result['country']);
					$details = $countryObject->getDetails();
					$country = $details['name'];
					$zipCode = $result['zipCode'];
				}
				else {
					//Vars
					$country = 'PaysInconnu';
					$zipCode = '00000';
				}
				//Traitement des myInrees
				$query3 = $this->pdo->prepare("SELECT id FROM in_abonnements WHERE userId = '$userId' AND lastSub < '$now' AND subLimit > '$now' LIMIT 1");
				$query3->execute();
				$myInrees = $query3->rowCount();
				//Transmission array
				$users[] = array(
					'id' => $data['id'],
					'name' => $data['nom'],
					'firstName' => $data['prenom'],
					'email' => $data['email'],
					'selection' => $data['selection'],
					'actif' => $data['actif'],
					'cb' => $data['cb'],
					'country' => $country,
					'zipCode' => $zipCode,
					'myInrees' => $myInrees,
				);
			}
			//Final return
			return $users;
		}
		
		//delete
		public function delete() {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_emails WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//redirect
		public function goToAdminPage() {
			//Redirection
			header('location: admin.php?cat=membres&scat=membres&id='.$this->id.'&details=adresses');
			exit;
		}
		
		//validateFusion
		public function validateFusion() {
			//Content
			echo 'Fusion effectuée avec succès - <a href="admin.php?cat=membres&scat=membres&id='.$this->id.'&details=adresses">Retour à la fiche utilisateur</a>';
		}
		
		//checkBasicFusionInfos
		public function checkBasicFusionInfos($userId, $key, $firstKey) {
			//Basic infos
			$user = new user($this->pdo, 0, $userId);
			$deleteDetails = $user->getDetails();
			$keepUser = new user($this->pdo, 0, $this->id);
			$keepDetails = $keepUser->getDetails();
			//vérif
			if ($keepDetails[$key] == '' OR $keepDetails[$key] == '0') {
				$this->sqlAction = 1;
				//firstKey ?
				if ($firstKey == 1) {
					$value = $key." = '".$deleteDetails[$key]."'";
				}
				else {
					$value = ", ".$key." = '".$deleteDetails[$key]."'";
				}
			}
			else {
				//firstKey ?
				if ($firstKey == 1) {
					$value = 'nouveau = 0';
				}
				else {
					$value = '';
				}
			}
			//Return
			return $value;
		}
		
		//displayBasicFusionInfos
		public function displayBasicFusionInfos($userId, $key) {
			//Basic infos
			$user = new user($this->pdo, 0, $userId);
			$deleteDetails = $user->getDetails();
			$keepDetails = $this->getDetails();
			//vérif
			if (($keepDetails[$key] == '') OR ($keepDetails[$key] == '0')) {
				//Différents
				if ($keepDetails[$key] != $deleteDetails[$key]) {
					$value = $deleteDetails[$key];
				}
				else {
					$value = "Inchangée";
				}
			}
			else {
				$value = "Inchangée";
			}
			//Array
			$return = array(
				'key' => $key,
				'value' => $value,
			);
			//Return
			return $return;
		}
		
		//fusionWith
		public function fusionWith($userId) {
			//Vérifs basic infos
			$email = $this->checkBasicFusionInfos($userId, 'email', 1);
			$nom = $this->checkBasicFusionInfos($userId, 'nom', 0);
			$prenom = $this->checkBasicFusionInfos($userId, 'prenom', 0);
			$societe = $this->checkBasicFusionInfos($userId, 'societe', 0);
			$telephone = $this->checkBasicFusionInfos($userId, 'telephone', 0);
			//Création requête
			if ($this->sqlAction == 1) {
				//SQL
				$sql = "UPDATE in_emails SET ".$email.$nom.$prenom.$societe.$telephone." WHERE id = '$this->id' LIMIT 1";
				$query = $this->pdo->prepare($sql);
				$query->execute();
			}
			//Update addresses
			$query = $this->pdo->prepare("UPDATE in_addresses SET userId = '$this->id', defaultAddress = '0' WHERE userId = '$userId'");
			$query->execute();
			//Update abonnements
			$query = $this->pdo->prepare("UPDATE in_abonnements SET userId = '$this->id' WHERE userId = '$userId'");
			$query->execute();
			//Update orders
			$query = $this->pdo->prepare("UPDATE in_orders SET userId = '$this->id' WHERE userId = '$userId'");
			$query->execute();
			//Update in_emailsmagenvoi
			$query = $this->pdo->prepare("UPDATE in_emailsmagenvoi SET emailId = '$this->id' WHERE emailId = '$userId'");
			$query->execute();
			//Update admin_contact
			$query = $this->pdo->prepare("UPDATE admin_contact SET idemail = '$this->id' WHERE idemail = '$userId'");
			$query->execute();
			//Delete old user
			$user = new user($this->pdo, 0, $userId);
			$user->delete();
		}
		
		//getFusionInfosWith
		public function getFusionInfosWith($userId) {
			//Vérif basic infos
			$basics = array();
			$basics[] = $this->displayBasicFusionInfos($userId, 'email');
			$basics[] = $this->displayBasicFusionInfos($userId, 'nom');
			$basics[] = $this->displayBasicFusionInfos($userId, 'prenom');
			$basics[] = $this->displayBasicFusionInfos($userId, 'societe');
			$basics[] = $this->displayBasicFusionInfos($userId, 'telephone');
			//Adresses
			$query = $this->pdo->prepare("SELECT id FROM in_addresses WHERE userId = '$userId'");
			$query->execute();
			//Array
			$addresses = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$address = new address($this->pdo, $data['id']);
				//Transmission
				$addresses[] = $address->getDetails();
			}
			
			//Abonnements
			$query = $this->pdo->prepare("SELECT in_abonnements.startMag, in_abonnements.maxMag, in_abonnements.aboId FROM in_abonnements JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_abonnements.userId = '$userId' AND in_orders.paid = 1");
			$query->execute();
			//Array
			$abonnements = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Transmission
				$abonnements[] = array(
					'startMag' => $data['startMag'],
					'maxMag' => $data['maxMag'],
					'name' => $details['title'],
				);
			}
			
			//Orders
			$query = $this->pdo->prepare("SELECT id, value, timestamp, paid FROM in_orders WHERE userId = '$userId'");
			$query->execute();
			//Array
			$orders = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Array
				$orders[] = array(
					'id' => $data['id'],
					'value' => $data['value'],
					'timestamp' => $data['timestamp'],
					'paid' => $data['paid'],
				);
			}
			
			//rootMags
			$query = $this->pdo->prepare("SELECT magId, aboId FROM in_emailsmagenvoi WHERE emailId = '$userId'");
			$query->execute();
			//Array
			$rootMags = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Création objet
				$productsType = new productsType($this->pdo, $data['aboId']);
				$details = $productsType->getDetails();
				//Transmission
				$rootMags[] = array(
					'magId' => $data['magId'],
					'abonnement' => $details['title'],
				);
			}
			
			//messages
			$query = $this->pdo->prepare("SELECT id, timestamp FROM admin_contact WHERE idemail = '$userId'");
			$query->execute();
			//Array
			$messages = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Array
				$messages[] = array(
					'id' => $data['id'],
					'timestamp' => $data['timestamp'],
				);
			}
			
			//Final array
			$infos = array(
				'basics' => $basics,
				'addresses' => $addresses,
				'abonnements' => $abonnements,
				'orders' => $orders,
				'rootMags' => $rootMags,
				'messages' => $messages,
			);
			
			//Return
			return $infos;
		}
	}
?>