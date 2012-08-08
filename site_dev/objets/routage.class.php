<?php
	//Objet routage
	
	class routage {
	
		//Vars
		private $pdo;
		private $smarty;
		
		//__construct
		public function __construct($pdo, $smarty) {
			//Vars
			$this->pdo = $pdo;
			$this->smarty = $smarty;
		}
		
		//getBasicInfos
		public function getBasicInfos() {
			//Magazine unroot
			$magazine = new magazine($this->pdo);
			$unroot = $magazine->listUnroot();
		
			//Inside infos
			//$myPayants = $this->getMyInreesUsers(0);
			//$myGratuits = $this->getMyInreesUsers(1);
			//$allMy = $myPayants['count']+$myGratuits['count'];
			//$needRoutage = $this->checkRoutage();
			
			//array
			$routage = array(
				/*'myPayants' => $myPayants,
				'myGratuits' => $myGratuits,
				'allMy' => $allMy,
				'needRoutage' => $needRoutage,*/
				'unroot' => $unroot,
			);			
			//smarty assign
			$this->smarty->assign('routage', $routage);
		}
		
		//getMyInreesUsers
		public function getMyInreesUsers($gratuit, $aboId, $magId) {
			//Myinreesgratuit 0/1 ?
			if ($gratuit == 0) {
				$sql = "SELECT in_abonnements.userId, in_abonnements.shippingAddress FROM in_abonnements LEFT JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_orders.paid = '1' AND in_abonnements.startMag <= '$magId' AND in_abonnements.maxMag >= '$magId' AND in_abonnements.aboId = '$aboId' ORDER BY in_abonnements.shippingAddress ASC";
			}
			elseif ($gratuit == 1) {
				$sql = "SELECT id FROM in_emails WHERE myinreesgratuit = '1' ORDER BY in_emails.nom ASC";
			}
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			//Array
			$emails = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Gestion addresse livraison
				if ($gratuit == 0) {
					$address = new address($this->pdo, $data['shippingAddress']);
					$AD = $address->getDetails();
					//Variable userId
					$details['id'] = $data['userId'];
				}
				elseif ($gratuit == 1) {
					$AD = 0;
					//Traitement
					$user = new user($this->pdo, 0, $data['id']);
					$details = $user->getDetails();
				}
				//Array
				$emails[] = array(
					'user' => $details,
					'address' => $AD,
				);
			}
			//Final array
			$final = array(
				'count' => $count,
				'data' => $emails
			);
			//return
			return $final;
		}
		
		//getHistory
		public function getHistory($gratuit, $aboId, $magId) {
			//Queries
			if ($gratuit == 0) {
				$sql = "SELECT in_emails.id, in_abonnements.shippingAddress FROM in_emails LEFT JOIN in_emailsmagenvoi ON in_emailsmagenvoi.emailId = in_emails.id LEFT JOIN in_abonnements ON in_abonnements.userId = in_emailsmagenvoi.emailId LEFT JOIN in_orders ON in_abonnements.orderId = in_orders.id WHERE in_orders.paid = '1' AND in_abonnements.startMag <= '$magId' AND in_abonnements.maxMag >= '$magId' AND in_emails.myinreesgratuit = '0' AND in_emailsmagenvoi.magId = '$magId' AND in_abonnements.aboId = '$aboId' ORDER BY in_emails.nom ASC";
			}
			elseif ($gratuit == 1) {
				$sql = "SELECT in_emails.id FROM in_emails LEFT JOIN in_emailsmagenvoi ON in_emailsmagenvoi.emailId = in_emails.id WHERE in_emails.myinreesgratuit = '1' AND in_emailsmagenvoi.magId = '$magId' AND in_emailsmagenvoi.aboId = '$aboId' ORDER BY in_emails.nom ASC";
			}
			
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			//Array
			$emails = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Gestion addresse livraison
				if ($gratuit == 0) {
					$address = new address($this->pdo, $data['shippingAddress']);
					$AD = $address->getDetails();
				}
				elseif ($gratuit == 1) {
					$AD = 0;
				}
				//Traitement
				$user = new user($this->pdo, 0, $data['id']);
				$details = $user->getDetails();
				//Array
				$emails[] = array(
					'user' => $details,
					'address' => $AD,
				);
			}
			//Final array
			$final = array(
				'count' => $count,
				'data' => $emails
			);
			//return
			return $final;
		}
		
		//checkRoutage
		private function checkRoutage() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_emailsmagenvoi WHERE magId = '$this->lastMag'");
			$query->execute();
			$count = $query->rowCount();
			//return
			return $count;
		}
	}
?>