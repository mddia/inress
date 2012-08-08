<?php
	//Objet abonnement le 17/01/2012
	
	class abonnement {
		//Variables
		private $pdo;
		private $userId;
		//Abonnement le plus récent
		private $aboCount = 0;
		private $id = 0;
		private $firstSub = 0;
		private $lastSub = 0;
		private $subLimit = 0;
		private $maxMag = 0;
		
		//__construct
		public function __construct($pdo, $userId) {
			$this->pdo = $pdo;
			$this->userId = $userId;
		}
		
		//getValues
		public function getValues($aboId) {
			//Création variable
			$magazine = new magazine($this->pdo);
			$lastMag = $magazine->getLast($aboId);
			$underMag = $lastMag-1;
			//Query
			$query = $this->pdo->prepare("SELECT in_abonnements.id, in_abonnements.firstSub, in_abonnements.lastSub, in_abonnements.subLimit, in_abonnements.maxMag, in_abonnements.aboId, in_abonnements.renouv, in_abonnements.isGift FROM in_abonnements JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_abonnements.userId = '$this->userId' AND in_abonnements.maxMag >= '$underMag' AND in_orders.paid = '1' AND in_abonnements.aboId = '$aboId' ORDER BY maxMag DESC LIMIT 1");
			$query->execute();
			$this->aboCount = $query->rowCount();
			//Si il y a déjà des abonnements on liste le contenu
			if ($this->aboCount != 0) {
				//Listage des résulats
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Transmission aux variables objet
				$this->id = $data['id'];
				$this->firstSub = $data['firstSub'];
				$this->lastSub = $data['lastSub'];
				$this->subLimit = $data['subLimit'];
				$this->maxMag = $data['maxMag'];
				///Transmission array
				$values = array(
					'isSubscriber' => $this->aboCount,
					'id' => $this->id,
					'userId' => $this->userId,
					'firstSub' => $this->firstSub,
					'lastSub' => $this->lastSub,
					'subLimit' => $this->subLimit,
					'maxMag' => $this->maxMag,
					'aboId' => $data['aboId'],
					'renouv' => $data['renouv'],
					'isGift' => $data['isGift'],
				);
			}
			else {
				//Mag
				$magazine = new magazine($this->pdo);
				$startMag = $magazine->getLast($aboId);
				//Array
				$values = array(
					'isSubscriber' => $this->aboCount,
					'maxMag' => $startMag,
				);
			}
			//Return values
			return $values;
		}
		
		//function reaboUser !! NECESSITE $_SESSION['orderId'] !!
		public function reaboUser($aboFreq, $aboTypeId) {
			if (array_key_exists('orderId', $_SESSION) AND $_SESSION['orderId'] != 0) {
				//On récupère les valeurs de l'abonnement en cours
				$this->getValues();
				//On créé les variables requises
				$orderId = $_SESSION['orderId'];
				$lastSub = time();
				$newSubLimit = $this->subLimit+31536000;
				$newStartMag = $this->maxMag+1;
				$newMaxMag = $this->maxMag+$aboFreq;
				//On regarde l'adresse par défaut de l'utilisateur
				$user = new user($this->pdo, 0, $this->userId);
				$shippingAddress = $user->getDefaultAddress();
				//Query
				$query = $this->pdo->prepare("INSERT INTO in_abonnements VALUES('', '$orderId', '$this->userId', '$this->firstSub', '$lastSub', '$newSubLimit', '$newStartMag', '$newMaxMag', '$shippingAddress', '$aboTypeId', '1', '0', '0', '0')");
				$query->execute();
			}
			else {
				echo 'Erreur, pas de numéro de commande reçu.';
			}
		}
		
		//function aboUser !! NECESSITE $_SESSION['orderId'] !!
		public function aboUser($gift, $aboFreq, $chosenStartMag, $addressId, $aboTypeId) {
			if (array_key_exists('orderId', $_SESSION) AND $_SESSION['orderId'] != 0) {
				//On créé les variables requises
				$orderId = $_SESSION['orderId'];
				$lastSub = time();
				$newSubLimit = $lastSub+31536000;
				//On récupère le dernier n° du magazine
				$magazine = new magazine($this->pdo);
				//On regarde si un magazine de départ a été défini
				if ($chosenStartMag == 0) {
					$start = $magazine->getLast();
					$startMag = $start+1;
					$newMaxMag = $start+$aboFreq;
					$sendMag = 0;
				}
				else {
					$start = $chosenStartMag;
					$underMag = $start-1;
					$startMag = $chosenStartMag;
					$newMaxMag = $underMag+$aboFreq;
					//On regarde si il faut envoyer le magazine ou non
					$actualMag = $magazine->getLast();
					if ($actualMag == $chosenStartMag) {
						$sendMag = 1;
					}
					else {
						$sendMag = 0;
					}
				}
				//On regarde l'adresse par défaut de l'utilisateur 
				if ($addressId == 0) {
					$user = new user($this->pdo, 0, $this->userId);
					$shippingAddress = $user->getDefaultAddress();
				}
				else {
					$shippingAddress = $addressId;
				}
				//Query
				$query = $this->pdo->prepare("INSERT INTO in_abonnements VALUES('', '$orderId', '$this->userId', '$lastSub', '$lastSub', '$newSubLimit', '$startMag', '$newMaxMag', '$shippingAddress', '$aboTypeId', '0', '0', '$sendMag', '$gift')");
				$query->execute();
			}
			else {
				echo 'Erreur, pas de numéro de commande reçu.';
			}
		}
	}


?>