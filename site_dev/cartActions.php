<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	/* Traitement selon le formulaire émetteur */
	switch ($_GET['formName']) {
	
		//listItemsToSend
		case 'listItemsToSend':
			$orderId = $_SESSION['orderId'];
			$order = new order($pdo, $smarty, $orderId);
			$envoiPostal = $order->listItemsToSend();
			//Transmission du contenu
			echo json_encode($envoiPostal);
			break;
			
		//listItemsToSendCount
		case 'listItemsToSendCount':
			$orderId = $_SESSION['orderId'];
			$order = new order($pdo, $smarty, $orderId);
			$envoiPostal = $order->listItemsToSend();
			//Transmission du contenu
			echo json_encode($envoiPostal['count']);
			break;
			
		//listCart
		case "listCart":
			//Transmission du contenu du panier
			echo json_encode($_SESSION['cart']);
			//print_r($_SESSION['cart']);
		break;
	
		//displayValue
		case "displayValue":
			//Transmission du contenu du panier
			echo json_encode($_SESSION['cartValue']);
		break;
			
		//Add to cart
		case "addToCart":
			$cart = new cart($pdo);
			$cart->addItem($_GET['itemId']);
			break;
			
		//Remove from cart
		case "removeFromCart":
			$cart = new cart($pdo);
			$cart->removeItem($_GET['itemId']);
			break;
			
		//Delete From cart
		case "deleteFromCart":
			$cart = new cart($pdo);
			$cart->deleteItem($_GET['itemId']);
			break;
			
		//checkPromoCode
		case "checkPromoCode":
			//On fait une sauvegarde du montant du panier
			if ($_SESSION['cartValueSave'] == 0) {
				$_SESSION['cartValueSave'] = $_SESSION['cartValue'];
			}
			//Vérif temporaire
			if ($_GET['code'] == 'INREES2012') {
				//traitement
				$_SESSION['promoValue'] = 15;
				$_SESSION['cartValue'] = $_SESSION['cartValueSave'] - $_SESSION['promoValue'];
			}
			elseif ($_GET['code'] == 'MEGAINREES2012') {
				//traitement
				$_SESSION['promoValue'] = 50;
				$_SESSION['cartValue'] = $_SESSION['cartValueSave'] - $_SESSION['promoValue'];
			}
			else {
				$_SESSION['promoValue'] = 0;
			}
			//Transmission de la promo
			echo json_encode($_SESSION['promoValue']);
			break;
			
		//checkCartContent
		case "checkCart":
			$cart = new cart($pdo);
			$content = $cart->checkContent();
			//Transmission du nombre d'abonnements
			echo json_encode($content);
			break;
			
		//recordItemDelivery
		case "recordItemDelivery":
			$order = new order($pdo, $smarty, 0);
			$order->recordItemDelivery($_GET['itemId'], $_GET['delivery']);
			break;
			
		//updateOrderShipping
		case "updateOrderShipping":
			$order = new order($pdo, $smarty, $_SESSION['orderId']);
			$order->updateOrderShipping($_GET['addressId'], $_GET['shippingId']);
			break;
			
		//isFrenchDelivery
		case "isFrenchDelivery":
			$order = new order($pdo, $smarty, $_SESSION['orderId']);
			$result = $order->isFrenchDelivery();
			//Transmission du nombre d'abonnements
			echo json_encode($result);
			break;
			
		//validateOrder
		case "validateOrder":
			$order = new order($pdo, $smarty, $_SESSION['orderId']);
			$order->validate();
			break;
			
		//getOrderDeliveries
		case "getOrderDeliveries":
			$order = new order($pdo, $smarty, $_SESSION['orderId']);
			$deliveries = $order->getDeliveries();
			//Transmission
			echo json_encode($deliveries);
			break;
			
		//getOrderWeight
		case "getOrderWeight":
			$order = new order($pdo, $smarty, 0);
			$weight = $order->getWeight($_GET['id']);
			//Transmission
			echo json_encode($weight);
			break;
			
		//getShippingTypes
		case "getShippingTypes":
			$delivery = new delivery($pdo, 0);
			$list = $delivery->listUnderWeight($_GET['weight']);
			//Transmission
			echo json_encode($list);
			break;
	}
?>
