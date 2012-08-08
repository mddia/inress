<?php
	//Objet adminOrder = new version of orders 08/05/2012
	
	class adminOrder {
		
		//Variables
		private $pdo;
		private $smarty;
		private $id = 0;
		private $userId;
		private $value;
		private $discard;
		private $timestamp;
		private $paid;
		private $paymentType;
		private $transactionNumber;
		private $sent;
		private $lastAboId = 0;
		private $lastInsertItem = 0;
		private $refund;
		private $refundValue;
		
		//__construct
		public function __construct($pdo, $smarty, $id) {
			$this->pdo = $pdo;
			$this->smarty = $smarty;
			//if $id != 0
			if ($id != 0) {
				//Vars
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT userId, value, discard, timestamp, paid, paymentType, transactionNumber, refund, refundValue, sent FROM in_orders WHERE id = '$this->id'");
				$query->execute();
				//Attribution
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->userId = $data['userId'];
				$this->value = $data['value'];
				$this->discard = $data['discard'];
				$this->timestamp = $data['timestamp'];
				$this->paid = $data['paid'];
				$this->paymentType = $data['paymentType'];
				$this->transactionNumber = $data['transactionNumber'];
				$this->refund = $data['refund'];
				$this->refundValue = $data['refundValue'];
				$this->sent = $data['sent'];
			}
		}
		
		//record
		public function record($userId, $value) {
			//On créé les variables
			$discard = 0;
			$timestamp = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_orders VALUES('', '$userId', '$value', '$discard', '$timestamp', '0', '0', '0', '0', '0', '0')");
			$query->execute();
			//Récupération de la dernière id
			$this->id = $this->pdo->lastInsertId();
			$this->userId = $userId;
		}
		
		//addItem
		public function addItem($itemId, $quantity, $deliveryAddressId) {
			//On vérifie que le numéro de commande a été assigné
			if ($this->id != 0) {
				//Requetes
				$query = $this->pdo->prepare("INSERT INTO in_ordersdetails VALUES('', '$this->id', '$itemId', '$quantity', '$deliveryAddressId')");
				$query->execute();
				//lastInsertItem
				$this->lastInsertItem = $this->pdo->lastInsertId();
			}
			else {
				//Affichage message d'erreur (utile pour Ajax)
				echo '<strong>ERREUR : </strong>L\'id de la commande n\'est pas défini.';
			}
		}
		
		//recordAbo
		public function recordAbo($userId, $aboId, $aboFreq, $eaboFreq, $startMag, $magReceived, $isGift) {
			//On regarde si l'utilisateur est déjà abonné à ce magazine
			$user = new user($this->pdo, 0, $userId);
			$userAbo = $user->checkAbo($aboId);
			//On définit le maxMag / en soustrayant 1 pour inclure le startMag
			$maxMag = $startMag+($aboFreq-1);
			$now = time();
			$subLimit = $now+$eaboFreq;
			//Vérif
			if ($userAbo['count'] == 0) {
				//Pas d'abonnement précédent
				$renouv = 0;
			}
			else {
				//Prendre la suite de l'abonnement
				$renouv = 1;
			}
			//Sql si gift ou non
			if ($isGift == 1) {
				$sql = "INSERT INTO in_abonnements VALUES('', '$this->id', '0', '$now', '$now', '$subLimit', '$startMag', '$maxMag', '0', '$aboId', '$renouv', '0', '0', '$isGift')";
			}
			else {
				$sql = "INSERT INTO in_abonnements VALUES('', '$this->id', '$userId', '$now', '$now', '$subLimit', '$startMag', '$maxMag', '0', '$aboId', '$renouv', '0', '0', '$isGift')";
			}
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			//get $aboId
			$this->lastAboId = $this->pdo->lastInsertId();
		}
		
		//recordAwaitingUser
		public function recordAwaitingUser($email, $prenom, $nom, $address1, $address2, $address3, $zipCode, $city) {
			//Création de l'adresse en table d'adresse
			$query = $this->pdo->prepare("INSERT INTO in_addresses VALUES('', '0', '', '$nom', '$prenom', '$address1', '$address2', '$address3', '$city', '$zipCode', '', '', '')");
			$query->execute();
			//Get newly added Id
			$addressId = $this->pdo->lastInsertId();
			//Update de l'abonnement inséré juste avant
			$query = $this->pdo->prepare("UPDATE in_abonnements SET shippingAddress = '$addressId' WHERE id = '$this->lastAboId' LIMIT 1");
			$query->execute();
			//Update de l'adresse de livraison du dernier objet inscrit (abonnement)
			$query = $this->pdo->prepare("UPDATE in_ordersdetails SET deliveryAddressId = '$addressId' WHERE id = '$this->lastInsertItem' LIMIT 1");
			$query->execute();
			//Insertion de la procédure de récupération
			$query = $this->pdo->prepare("INSERT INTO in_aborecover VALUES('', '$email', '$prenom', '$nom', '$this->lastAboId', '$addressId')");
			$query->execute();
			//À CODER
			//+> ENVOI EMAIL SI EMAIL IL Y A
		}
		
		//redirect
		public function redirect() {
			header('location: admin.php?cat=boutique&scat=macommande&id='.$this->id);
			exit();
		}
	}
?>