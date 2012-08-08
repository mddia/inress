<?php
	//Objet order le 15/12/2011	
	class order {
		
		//Déclaration variables
		private $pdo;
		private $smarty;
		private $id;
		private $userId;
		private $value;
		private $discard;
		private $timestamp;
		private $paid;
		private $paymentType;
		private $transactionNumber;
		private $refund;
		private $refundValue;
		private $sent;
		
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
				//Traitement
				$this->paymentType = $this->getPaymentName($data['paymentType']);
				//Vars
				$this->userId = $data['userId'];
				$this->value = $data['value'];
				$this->discard = $data['discard'];
				$this->timestamp = $data['timestamp'];
				$this->paid = $data['paid'];
				$this->transactionNumber = $data['transactionNumber'];
				$this->refund = $data['refund'];
				$this->refundValue = $data['refundValue'];
				$this->sent = $data['sent'];
			}
		}
		
		//getPaymentName
		private function getPaymentName($paymentId) {
			//Query
			$query = $this->pdo->prepare("SELECT name FROM in_paymenttype WHERE id = '$paymentId'");
			$query->execute();
			$data = $query->fetch(PDO::FETCH_ASSOC);
			//Return
			return $data['name'];
		}
		
		//record
		public function record() {
			//On créé les variables
			$userId = $_COOKIE['INREES_ID'];
			$value = $_SESSION['cartValue'];
			$discard = 0;
			$timestamp = time();
			//Query
			$query = $this->pdo->prepare("INSERT INTO in_orders VALUES('', '$userId', '$value', '$discard', '$timestamp', '0', '0', '0', '0', '0', '0')");
			$query->execute();
			//Récupération de la dernière id
			$orderId = $this->pdo->lastInsertId();
			//Enregistrement des produits
			foreach ($_SESSION['cart'] as $index => &$cart) {
				//Variables
				$itemId = $cart['itemId'];
				$quantity = $cart['quantity'];
				//On vérifie que l'objet N'EST PAS UN ABONNEMENT
				$products = new products($this->pdo, $itemId);
				$pDetails = $products->getDetails();
				//Requetes
				//if ($pDetails['subscription'] == 0) {
					$query = $this->pdo->prepare("INSERT INTO in_ordersdetails VALUES('', '$orderId', '$itemId', '$quantity', '0', '0')");
					$query->execute();
				//}
			}
			//On transmet le numéro de commande en session
			$_SESSION['orderId'] = $orderId;
			//on enregistre la commande dans la table des commandes non-abouties
			$query = $this->pdo->prepare("INSERT INTO in_ordersunfinished VALUES('', '$orderId', '0')");
			$query->execute();
		}
		
		//listItemsToSend
		public function listItemsToSend() {
			//Création des variables de traitement
			$envoiPostal = 0;
			$items = array();
			//Listage des produits avec envoiPostal
			foreach ($_SESSION['cart'] as $index => &$cart) {
				//Variables
				$itemId = $cart['itemId'];
				$quantity = $cart['quantity'];
				//On vérifie que l'objet N'EST PAS UN ABONNEMENT
				$products = new products($this->pdo, $itemId);
				$details = $products->getDetails();
				//Requetes
				if ($details['envoiPostal'] == 1 AND $details['subscription'] == 0) {
					//++
					$envoiPostal = $envoiPostal+1;
					//Items
					$items[] = $details;
				}
			}
			//Final array
			$data = array(
				'count' => $envoiPostal,
				'items' => $items,
			);
			//Return
			return $data; 
		}
		
		//recordItemDelivery
		public function recordItemDelivery($itemId, $delivery) {
			//Variables
			$orderId = $_SESSION['orderId'];
			//Query
			$query = $this->pdo->prepare("UPDATE in_ordersdetails SET deliveryAddressId = '$delivery' WHERE orderId = '$orderId' AND itemId = '$itemId' LIMIT 1");
			$query->execute();
		}
		
		//getDeliveries
		public function getDeliveries() {
			//Variables
			$return = array();
			//Query
			$query = $this->pdo->prepare("SELECT DISTINCT deliveryAddressId, shippingId FROM in_ordersdetails WHERE orderId = '$this->id' AND deliveryAddressId != '0'");
			$query->execute();
			$count = $query->rowCount();
			//Création array
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Get shipping infos
				$delivery = new delivery($this->pdo, $data['shippingId']);
				//Address
				$address = new address($this->pdo, $data['deliveryAddressId']);
				$addressDetails = $address->getDetails();
				$addressDetails['delivery'] = $delivery->getDetails();
				$return[] = $addressDetails;
			}
			//Return
			return $return;
		}
		
		//setAsSent
		public function setAsSent() {
			//Time
			$time = time();
			//Query
			$query = $this->pdo->prepare("UPDATE in_orders SET sent = '$time' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//setAsSent
		public function setAsPaid($paymentType, $transactionNumber) {
			//Query
			$query = $this->pdo->prepare("UPDATE in_orders SET paid = '1', paymentType = '$paymentType', transactionNumber = '$transactionNumber' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//getWeight
		public function getWeight($id) {
			//Création variable
			$orderId = $_SESSION['orderId'];
			$weight = 0;
			//Query
			$query = $this->pdo->prepare("SELECT in_produitsdetails.poids, in_ordersdetails.quantity FROM in_produitsdetails JOIN in_ordersdetails ON in_ordersdetails.itemId = in_produitsdetails.id WHERE in_ordersdetails.orderId = '$orderId' AND in_ordersdetails.deliveryAddressId = '$id'");
			$query->execute();
			
			//Création array
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$weight = $weight+($data['quantity']*$data['poids']); 
			}
			//Return
			return $weight;
		}
		
		//getDetails
		public function getDetails() {
			//Traitement
			$user = new user($this->pdo, 0, $this->userId);
			$userDetails = $user->getDetails();
			$deliveries = $this->getFullDeliveries();
			$addresses = $this->getDeliveries();
			//array
			$order = array(
				'id' => $this->id,
				'userId' => $this->userId,
				'user' => $userDetails,
				'value' => $this->value,
				'discard' => $this->discard,
				'timestamp' => $this->timestamp,
				'paid' => $this->paid,
				'paymentType' => $this->paymentType,
				'transactionNumber' => $this->transactionNumber,
				'sent' => $this->sent,
				'refund' => $this->refund,
				'refundValue' => $this->refundValue,
				'newValue' => $this->value-$this->refundValue,
				'deliveries' => $deliveries,
				'addresses' => $addresses,
			);
			//Return
			return $order;
		}
		
		//getFullDeliveries
		public function getFullDeliveries() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_ordersdetails WHERE orderId= '$this->id'");
			$query->execute();
			//Création array
			$details = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//orderDetails
				$orderDetails = new orderDetails($this->pdo, $data['id']);
				$deliveries = $orderDetails->getDetails();
				//Transmission
				$details[] = $deliveries;
			}
			//Return
			return $details;
		}
		
		//listOrders
		public function listAll($target) {
			//Define query according to $target
			switch($target) {
				case 'unpaid':
					$sql = "SELECT id FROM in_orders WHERE paid = 0 AND in_orders.refundValue != in_orders.value AND id NOT IN(SELECT orderId FROM in_ordersunfinished) ORDER BY id DESC";
					break;
				case 'sent':
					$sql = "SELECT id FROM in_orders WHERE sent != 0 AND paid = 1 AND in_orders.refundValue != in_orders.value ORDER BY sent DESC";
					break;
				case 'unsent':
					$sql = "SELECT id FROM in_orders WHERE sent = 0 AND paid = 1 AND in_orders.refundValue != in_orders.value ORDER BY id DESC";
					break;
			}
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			//Création array
			$orders = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$order = new order($this->pdo, $this->smarty, $data['id']);
				$orders[] = $order->getDetails();
			}
			//orderByDelivery
			$this->orderByDelivery($target);
			//Return
			return $orders;
		}
		
		//countOrders
		public function countAll($target) {
			//Define query according to $target
			switch($target) {
				case 'unpaid':
					$sql = "SELECT id FROM in_orders WHERE paid = 0 AND in_orders.refundValue != in_orders.value AND id NOT IN(SELECT orderId FROM in_ordersunfinished) ORDER BY id DESC";
					break;
				case 'sent':
					$sql = "SELECT id FROM in_orders WHERE sent != 0 AND paid = 1 AND in_orders.refundValue != in_orders.value ORDER BY sent DESC";
					break;
				case 'unsent':
					$sql = "SELECT id FROM in_orders WHERE sent = 0 AND paid = 1 AND in_orders.refundValue != in_orders.value ORDER BY id DESC";
					break;
			}
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			$count = $query->rowCount();
			//Attribution du compteur en smarty
			switch($target) {
				case 'unpaid':
					$this->smarty->assign('unpaidOrdersCount', $count);
					break;
				case 'sent':
					$this->smarty->assign('sentOrdersCount', $count);
					break;
				case 'unsent':
					$this->smarty->assign('unsentOrdersCount', $count);
					break;
			}
		}
		
		//listUnfinished
		public function listUnfinished() {
			//Query
			$query = $this->pdo->prepare("SELECT orderId FROM in_ordersunfinished WHERE rappel = '0' ORDER BY id DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Création array
			$orders = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$order = new order($this->pdo, $this->smarty, $data['orderId']);
				$orders[] = $order->getDetails();
			}
			//Smarty
			$this->smarty->assign('unfinishedOrdersCount', $count);
			$this->smarty->assign('unfinishedOrders', $orders);
		}
		
		//countUnfinished
		public function countUnfinished() {
			//Query
			$query = $this->pdo->prepare("SELECT orderId FROM in_ordersunfinished WHERE rappel = '0' ORDER BY id DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Smarty
			$this->smarty->assign('unfinishedOrdersCount', $count);
		}
		
		//listRefund
		public function listRefund() {
			//Query
			$query = $this->pdo->prepare("SELECT id FROM in_orders WHERE refund != '0' ORDER BY refund DESC");
			$query->execute();
			//Count
			$count = $query->rowCount();
			//Création array
			$orders = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$order = new order($this->pdo, $this->smarty, $data['id']);
				$orders[] = $order->getDetails();
			}
			//Smarty
			$this->smarty->assign('refundOrdersCount', $count);
			$this->smarty->assign('refundOrders', $orders);
		}
		
		//findItemInOrder
		public function findItemInOrder($target, $familyId) {
			//Listage des requêtes en fonction de target
			switch($target) {
				case 'unpaid':
					$sql = "SELECT DISTINCT in_orders.id FROM in_orders LEFT JOIN in_ordersdetails ON in_orders.id = in_ordersdetails.orderId LEFT JOIN in_produitsdetails ON in_ordersdetails.itemId = in_produitsdetails.id LEFT JOIN in_produits ON in_produitsdetails.idProduit = in_produits.id WHERE in_produits.familyId = '$familyId' AND in_orders.paid = 0 AND in_orders.sent = 0 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
				case 'unsent':
					$sql = "SELECT DISTINCT in_orders.id FROM in_orders LEFT JOIN in_ordersdetails ON in_orders.id = in_ordersdetails.orderId LEFT JOIN in_produitsdetails ON in_ordersdetails.itemId = in_produitsdetails.id LEFT JOIN in_produits ON in_produitsdetails.idProduit = in_produits.id WHERE in_produits.familyId = '$familyId' AND in_orders.paid = 1 AND in_orders.sent = 0 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
				case 'sent':
					$sql = "SELECT DISTINCT in_orders.id FROM in_orders LEFT JOIN in_ordersdetails ON in_orders.id = in_ordersdetails.orderId LEFT JOIN in_produitsdetails ON in_ordersdetails.itemId = in_produitsdetails.id LEFT JOIN in_produits ON in_produitsdetails.idProduit = in_produits.id WHERE in_produits.familyId = '$familyId' AND in_orders.paid = 1 AND in_orders.sent = 1 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
			}
			//Query
			$query = $this->pdo->prepare($sql);
			$query->execute();
			//Création array
			$orders = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//getDetails
				$order = new order($this->pdo, $this->smarty, $data['id']);
				$orders[] = $order->getDetails();
			}
			//return
			return $orders;
		}
		
		//orderByItem
		public function orderByDelivery($target) {
			//Listage des produits en fonction de target
			switch($target) {
				case 'unpaid':
					$sql = "SELECT DISTINCT in_ordersdetails.deliveryAddressId, in_orders.userId, in_orders.id FROM in_ordersdetails JOIN in_orders ON in_orders.id = in_ordersdetails.orderId WHERE in_orders.paid = 0 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
				case 'unsent':
					$sql = "SELECT DISTINCT in_ordersdetails.deliveryAddressId, in_orders.userId, in_orders.id FROM in_ordersdetails JOIN in_orders ON in_orders.id = in_ordersdetails.orderId WHERE in_orders.paid = 1 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
				case 'sent':
					$sql = "SELECT DISTINCT in_ordersdetails.deliveryAddressId, in_orders.userId, in_orders.id FROM in_ordersdetails JOIN in_orders ON in_orders.id = in_ordersdetails.orderId WHERE in_orders.paid = 1 AND in_orders.sent = 1 AND in_orders.refundValue != in_orders.value ORDER BY in_orders.id ASC";
					break;
			}
			//Excution requete
			$query = $this->pdo->prepare($sql);
			$query->execute();
			//Création array
			$addresses = array();
			//Boucle de traitement
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				//Assignation Var
				$deliveryAddressId = $data['deliveryAddressId'];
				//Création objet
				$address = new address($this->pdo, $deliveryAddressId);
				$AD = $address->getDetails();
				//user infos
				$user = new user($this->pdo, 0, $data['userId']);
				$userDetails = $user->getDetails();
				//Query en fonction de $target
				switch($target) {
					case 'unpaid':
						//On récupère le nom des acheteurs, le numero et l'adresse de livraison de chaque produit
						$sql = "SELECT in_ordersdetails.itemId, in_ordersdetails.quantity FROM in_ordersdetails JOIN in_orders ON in_ordersdetails.orderId = in_orders.id WHERE in_ordersdetails.deliveryAddressId = '$deliveryAddressId' AND in_orders.paid = '0' AND in_orders.sent = '0' AND in_orders.refundValue != in_orders.value ORDER BY in_ordersdetails.id DESC";
						break;
					case 'unsent':
						//On récupère le nom des acheteurs, le numero et l'adresse de livraison de chaque produit pour
						$sql = "SELECT in_ordersdetails.itemId, in_ordersdetails.quantity FROM in_ordersdetails JOIN in_orders ON in_ordersdetails.orderId = in_orders.id WHERE in_ordersdetails.deliveryAddressId = '$deliveryAddressId' AND in_orders.paid = '1' AND in_orders.sent = '0' AND in_orders.refundValue != in_orders.value ORDER BY in_ordersdetails.id DESC";
						break;
					case 'sent':
						//On récupère le nom des acheteurs, le numero et l'adresse de livraison de chaque produit pour
						$sql = "SELECT in_orders.userId, in_ordersdetails.itemId, in_ordersdetails.quantity FROM in_ordersdetails JOIN in_orders ON in_ordersdetails.orderId = in_orders.id WHERE in_ordersdetails.deliveryAddressId = '$deliveryAddressId' AND in_orders.paid = '1' AND in_orders.refundValue != in_orders.value AND in_orders.refund = 0 ORDER BY in_ordersdetails.id DESC";
						break;
				}
				$query2 = $this->pdo->prepare($sql);
				$query2->execute();
				//Création array
				$items = array();
				//Boucle 
				while ($result = $query2->fetch(PDO::FETCH_ASSOC)) {
					//Récupération des infos user
					$products = new products($this->pdo, $result['itemId']);
					$productsDetails = $products->getDetails();
					//On regarde si le produit est à envoyer ou non
					if (($productsDetails['event']) != 1 AND ($productsDetails['envoiPostal'] == 1)) {
						//On regarde si c'est un abonnement
						if ($productsDetails['subscription'] == 1) {
							$aboId = $productsDetails['idProduit'];
							$itemId = $productsDetails['id'];
							$orderId = $data['id'];
							$deliveryAddressId = $data['deliveryAddressId'];
							//getStartMag
							$startMag = $this->getStartMag($deliveryAddressId, $itemId, $aboId, $orderId);
						}
						else {
							$startMag = 0;
						}
						//Transmission array
						$items[] = array(
							'details' => $productsDetails,
							'startMag' => $startMag,
							'quantity' => $result['quantity'],
						);
					}
				}
				//Transmission array items
				$addresses[] = array(
					'user' => $userDetails,
					'address' => $AD,
					'items' => $items,
				);
			}
			//Smarty en fonction de target
			switch($target) {
				case 'unpaid':
					$this->smarty->assign('byDeliveryUnpaid', $addresses);
					break;
				case 'unsent':
					$this->smarty->assign('byDeliveryUnsent', $addresses);
					break;
				case 'sent':
					$this->smarty->assign('byDeliverySent', $addresses);
					break;
			}
		}
		
		//getStartMag
		private function getStartMag($deliveryAddressId, $itemId, $aboId, $orderId) {
			//Query
			$query = $this->pdo->prepare("SELECT in_abonnements.startMag FROM in_abonnements JOIN in_ordersdetails ON in_ordersdetails.orderId = in_abonnements.orderId WHERE in_ordersdetails.deliveryAddressId = '$deliveryAddressId' AND in_ordersdetails.itemId = '$itemId' AND in_abonnements.aboId = '$aboId' AND in_abonnements.orderId = '$orderId' ORDER BY in_abonnements.startMag ASC LIMIT 1");
			$query->execute();
			//Attribution
			$data = $query->fetch(PDO::FETCH_ASSOC);
			$magNumber = $data['startMag'];
			//Vérif si il y a un numéro
			if ($magNumber != '') {
				//On récupère les infos du magazine
				$query0 = $this->pdo->prepare("SELECT titre FROM in_magazine WHERE numero = '$magNumber' AND aboId = '$aboId' LIMIT 1");
				$query0->execute();
				//Attribution
				$result = $query0->fetch(PDO::FETCH_ASSOC);
				//Définition du mag
				if (array_key_exists('titre', $result) AND $result['titre'] != '') {
					$startMag = $result['titre'];
				}
				else {
					$startMag = 0;
				}
			}
			else {
				$startMag = 0;
			}
			//return
			return $startMag;
		}
		
		//sendRecall
		public function sendRecall() {
			//ENVOI EMAIL RAPPEL
			//Mise à jour de la BDD
			$query = $this->pdo->prepare("UPDATE in_ordersunfinished SET rappel = '1' WHERE orderId = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//refund
		public function refund($refundValue) {
			//Timestamp
			$time = time();
			//Mise à jour de la BDD
			$query = $this->pdo->prepare("UPDATE in_orders SET refund = '$time', refundValue = '$refundValue' WHERE id = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//updateOrderShipping
		public function updateOrderShipping($addressId, $shippingId) {
			//Update query
			$query = $this->pdo->prepare("UPDATE in_ordersdetails SET shippingId = '$shippingId' WHERE deliveryAddressId = '$addressId'");
			$query->execute();
			//Mise à jour du prix de la commande
			$delivery = new delivery($this->pdo, $shippingId);
			$details = getDetails();
			//On vérifie que session orderIdexist
			/*if (array_key_exists('orderId', $_SESSION) AND $_SESSION['orderId']) {
				$_SESSION['orderId'] = $_SESSION['orderId']+$details['tarif'];
			}*/
		}
		
		//isFrenchDelivery
		public function isFrenchDelivery() {
			//Query
			$query = $this->pdo->prepare("SELECT in_ordersdetails.deliveryAddressId FROM in_ordersdetails JOIN in_addresses ON in_ordersdetails.deliveryAddressId = in_addresses.id WHERE in_ordersdetails.orderId = '$this->id' AND in_addresses.country = '61'");
			$query->execute();
			$count = $query->rowCount();
			//return
			return $count;
		}
		
		//validate
		public function validate() {
			//Query
			$query = $this->pdo->prepare("DELETE FROM in_ordersunfinished WHERE orderId = '$this->id' LIMIT 1");
			$query->execute();
		}
		
		//listPaymentTypes
		public function listPaymentTypes() {
			//Query
			$query = $this->pdo->prepare("SELECT id, name FROM in_paymenttype WHERE actif = 1 ORDER BY name ASC");
			$query->execute();
			//Array
			$types = array();
			//Boucle
			while ($data = $query->fetch(PDO::FETCH_ASSOC)) {
				$types[] = array(
					'id' => $data['id'],
					'name' => $data['name'],
				);
			}
			//Return
			return $types;
		}
	}
?>