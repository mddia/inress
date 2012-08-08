<?php
	//Objet user le 18/01/2012
	class user {
		
		//Attribution variables
		private $pdo;
		private $id;
		private $email;
		
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
			$query = $this->pdo->query("SELECT id, name, firstName, address1, address2, address3, city, zipCode, defaultAddress, country FROM in_addresses WHERE userId = '$this->id' ORDER BY id ASC");
			$query->execute();
			//Création array
			$addresses = array();
			//Attribution variable
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Détails
				$country = new country($this->pdo, $data['country']);
				$cDetails = $country->getDetails();
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
			$query = $this->pdo->prepare("SELECT id FROM admin_contact WHERE idemail = '$this->id' ORDER BY id DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Array
			$received = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//adminMessage
				$adminMessage = new adminMessage($this->pdo, $data['id']);
				$messageDetails = $adminMessage->getDetails();
				//Boucle
				$received[] = array(
					'id' => $data['id'],
					'timestamp' => $messageDetails['timestamp'],
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
			$query = $this->pdo->prepare("SELECT id FROM in_orders WHERE userId = '$this->id' ORDER BY id DESC");
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
		
		//getDetails
		public function getDetails() {
			//Query
			$query = $this->pdo->prepare("SELECT nouveau, nouveaudate, langue, email, emailbis, noemail, profilactif, commvip, pseudo, avatar, photo, civilite, nom, prenom, idlivraisonDefaut, societe, telephone, telfix, mobileOK, motivationcat, profession, professions, experiences, parole, datenaissance, parrainage, parrainageok, diversdesc, vippresse, decouvert, pourquoi, validite, magmax, myinrees, myinreesgratuit, mylastconnex, password, clef, actif, frequence, actifpost, _select, cb, vip, mben, mbendesc, remarques, skype, twitter FROM in_emails WHERE id = '$this->id'");
			
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
				'select' => $data['_select'],
				'cb' => $data['cb'],
				'vip' => $data['vip'],
				'mben' => $data['mben'],
				'mbendesc' => $data['mbendesc'],
				'remarques' => $data['remarques'],
				'skype' => $data['skype'],
				'twitter' => $data['twitter'],
			);
			
			//Return
			return $details;
			//print_r($details);
		}
		
		//redirect
		public function goToAdminPage() {
			//Redirection
			header('location: admin.php?cat=membres&scat=membres&id='.$this->id.'&details=adresses');
			exit;
		}
	}
?>