<?php
	//Objet abonnements
	
	class abonnements {
		//Variables
		private $pdo;
		private $id;
		
		//__construct
		public function __construct($pdo, $id) {
			$this->pdo = $pdo;
			$this->id = $id;
		}
		
		//getDetails
		public function getDetails() {
			//Query
			$query = $this->pdo->prepare("SELECT orderId, userId, lastSub, subLimit, startMag, maxMag, shippingAddress, aboId, renouv, sendLetter, sendMag, isGift FROM in_abonnements WHERE id = '$this->id'");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//AboId
			$productsType = new productsType($this->pdo, $data['aboId']);
			$pDetails = $productsType->getDetails();
			//Address
			$address = new address($this->pdo, $data['shippingAddress']);
			$AddDetails = $address->getDetails();
			//Is Actual Mag ?
			$magazine = new magazine($this->pdo);
			$actualMag = $magazine->getLast($data['aboId']);
			if ($data['maxMag'] >= $actualMag) {
				$actual = 1;				
			}
			else {
				$actual = 0;
			}
			//Attribution
			$abo = array(
				'id' => $this->id,
				'lastSub' => $data['lastSub'],
				'subLimit' => $data['subLimit'],
				'startMag' => $data['startMag'],
				'maxMag' => $data['maxMag'],
				'address' => $AddDetails,
				'isGift' => $data['isGift'],
				'aboId' => $data['aboId'],
				'title' => $pDetails['title'],
				'actual' => $actual,
			);
			//return
			return $abo;
		}
		
		//listAll kind of abos
		public function listAll() {
			//Query
			$query = $this->pdo->prepare("SELECT in_produits.title, in_produits.id FROM in_produits LEFT JOIN in_produitsfamilles ON in_produits.familyId = in_produitsfamilles.id LEFT JOIN in_produitscategories ON in_produitsfamilles.catId = in_produitscategories.id WHERE in_produitscategories.id = '2' ORDER BY in_produits.id ASC");
			$query->execute();
			//Array
			$abos = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//transmission array
				$abos[] = array(
					'id' => $data['id'],
					'title' => $data['title'],
				);
			}
			//return
			return $abos;
		}
	}	
?>