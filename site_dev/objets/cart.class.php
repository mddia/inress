<?php
	//Objet Cart le 29/12/2011	
	class cart {
		
		//Déclaration variables
		private $pdo;
		
		//__construct
		public function __construct($pdo) {
			$this->pdo = $pdo;
		}
		
		//addItem
		public function addItem($itemId) {
			//Infos produit :
			$product = new products($this->pdo, $itemId);
			$details = $product->getDetails();
			//On regarde si le produit existe déjà dans le panier
			$exist = 0;
			//Boucle de vérification
			foreach ($_SESSION['cart'] as &$cart) {
				if (array_key_exists('itemId', $cart) AND $cart['itemId'] == $itemId) {
					//$cart['quantity'] = $cart['quantity']+1;
					$cart['quantity'] = $cart['quantity']+1;
					//On update la variable pour indiquer que le produit est déjà en base de données
					$exist = 1;
				}
			}
			if ($exist == 0) {
				//Transmission array
				$_SESSION['cart'][] = array(
					'itemId' => $details['id'],
					'item' => $details,
					'price' => $details['prixPublic'], //Sera choisi selon l'etat de connexion, myyinrees ou non
					'quantity' => 1,
				);
			}
			//On met à jour le prix
			$_SESSION['cartValue'] = $_SESSION['cartValue']+$details['prixPublic'];
		}
		
		//remeoveItem
		public function removeItem($itemId) {
			//Infos produit :
			$product = new products($this->pdo, $itemId);
			$details = $product->getDetails();
			//On regarde si le produit existe déjà dans le panier
			$exist = 0;
			//Boucle de vérification
			foreach ($_SESSION['cart'] as $index => &$cart) {
				if (array_key_exists('itemId', $cart) AND $cart['itemId'] == $itemId) {
					$cart['quantity']--;
					//Si la quantité est égale à 0 on supprime l'entrée
					if ($cart['quantity'] == 0) {
						unset($_SESSION['cart'][$index]);
					}
					//On update la variable pour indiquer que le produit est déjà dans l'array session
					$exist = 1;
				}
			}
			if (!$exist) {
				//Transmission array
				$_SESSION['cart'][] = array(
					'itemId' => $details['id'],
					'item' => $details,
					'price' => $details['prixPublic'], //Sera choisi selon l'etat de connexion, myyinrees ou non
					'quantity' => 1,
				);
			}
			//On met à jour le prix
			$_SESSION['cartValue'] = $_SESSION['cartValue']-$details['prixPublic'];
		}
		
		//deleteItem
		public function deleteItem($itemId) {
			//Infos produit :
			$product = new products($this->pdo, $itemId);
			$details = $product->getDetails();
			//Quantity
			$quantity = 0;
			//Boucle de vérification
			foreach ($_SESSION['cart'] as $index => &$cart) {
				//Mise à jour de la quantité
				$quantity = $cart['quantity'];
				if (array_key_exists('itemId', $cart) AND $cart['itemId'] == $itemId) {
					//Suppression du panier
					unset($_SESSION['cart'][$index]);
				}
			}
			//On met à jour le prix
			$_SESSION['cartValue'] = $_SESSION['cartValue']-($details['prixPublic']*$quantity);
		}
		
		//checkContent (only if user connected !)
		public function checkContent() {
			if (array_key_exists('cart', $_SESSION)) {
				//Utilisateur				
				$userId = $_COOKIE['INREES_ID'];
				
				//Cration des variables de vérification de l'abonnement et des résas
				$magazine = new magazine($this->pdo);
				
				$aboSum = array();
				$abo = 0;
				$aboQty = 0;
				$resa = array();
				$eventQty = 0;
				$resaQty = 0;
				
				//Boucle de vérification des abonnements
				foreach ($_SESSION['cart'] as $index => &$cart) {
					if (array_key_exists('subscription', $cart['item']) AND $cart['item']['subscription'] == '1') {
						//On récupère l'aboFreq de l'abonnement
						$products = new products($this->pdo, $cart['itemId']);
						$details = $products->getDetails();
						$aboFreq = $details['aboFreq'];
						
						//On get le last mag de l'abonnement
						$actualMag = $magazine->getLast($details['idProduit']);
						
						$abonnement = new abonnement($this->pdo, $userId);
						$aboValues = $abonnement->getValues($details['idProduit']);
						
						$aboSum[] = array(
							'id' => $cart['itemId'],
							'itemId' => $cart['itemId'],
							'title' => $cart['item']['title'],
							'nbreAbo' => $cart['quantity'],
							'aboFreq' => $aboFreq,
							'actualMag' => $actualMag,
							'maxMag' => $aboValues['maxMag'],
							'newMaxMag' => $aboValues['maxMag']+$aboFreq,
							'isSubscriber' => $aboValues['isSubscriber'],
							'aboTypeId' => $details['idProduit'],
						);
						$abo = $abo+$cart['quantity'];
						$aboQty = $aboQty+1;
					}
				}
				
				//Boucle de vérification des réservations
				foreach ($_SESSION['cart'] as $index => &$cart) {
					
					if (array_key_exists('event', $cart['item']) AND $cart['item']['event'] == '1') {
						$resa[] = array(
							'EventId' => $cart['itemId'],
							'Event' => $cart['item']['title'],
							'nbrePlace' => $cart['quantity'],
						);
						$resaQty = $resaQty+$cart['quantity'];
						$eventQty =  $eventQty+1;
					}
				}
				
				//Création d'un array qui résume le contenu du panier
				$cartResult = array(
					'aboDiff' => $aboQty,
					'aboQuantity' => $abo,
					'abonnements' => $aboSum,
					'eventQty' => $eventQty,
					'resQuantity' => $resaQty,
					'reservations' => $resa,
				);
				//Transmission de l'array
				return $cartResult;
			}
		}
	}
?>