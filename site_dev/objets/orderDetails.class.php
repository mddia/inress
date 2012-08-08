<?php
	//objet orderDetails
	class orderDetails {
		
		//Vars
		private $pdo;
		private $id;
		private $orderId;
		private $itemId;
		private $quantity;
		private $deliveryAddressId;
		private $shippingId;
		
		//__construct
		public function __construct($pdo, $id) {
			//Vars
			$this->pdo = $pdo;
			//Vérif
			if ($id != 0) {
				$this->id = $id;
				//Query
				$query = $this->pdo->prepare("SELECT orderId, itemId, quantity, deliveryAddressId, shippingId FROM in_ordersdetails WHERE id = '$this->id'");
				$query->execute();
				$data = $query->fetch(PDO::FETCH_ASSOC);
				//Vars
				$this->orderId = $data['orderId'];
				$this->itemId = $data['itemId'];
				$this->quantity = $data['quantity'];
				$this->deliveryAddressId = $data['deliveryAddressId'];
				$this->shippingId = $data['shippingId'];
			}
		}
		
		//getDetails
		public function getDetails() {
			//Item
			$product = new products($this->pdo, $this->itemId);
			$item = $product->getDetails();
			//On regarde si c'est un abonnement
			if ($item['subscription'] == 1) {
				$startMag = $this->getStartMag($item['idProduit']);
			}
			else {
				$startMag = 0;
			}
			//Array
			$details = array(
				'id' => $this->id,
				'orderId' => $this->orderId,
				'itemId' => $this->itemId,
				'item' => $item,
				'startMag' => $startMag,
				'quantity' => $this->quantity,
				'addressId' => $this->deliveryAddressId,
				'shippingId' => $this->shippingId,
			);
			
			//Return
			return $details;
		}
		
		//getStartMag
		private function getStartMag($aboId) {
			//Query
			$query = $this->pdo->prepare("SELECT in_abonnements.startMag FROM in_abonnements JOIN in_ordersdetails ON in_ordersdetails.orderId = in_abonnements.orderId WHERE in_ordersdetails.deliveryAddressId = '$this->deliveryAddressId' AND in_ordersdetails.itemId = '$this->itemId' AND in_abonnements.aboId = '$aboId' AND in_abonnements.orderId = '$this->orderId' ORDER BY in_abonnements.startMag ASC LIMIT 1");
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
	}
?>