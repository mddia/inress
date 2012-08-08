<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	/* Traitement selon le formulaire émetteur */
	switch ($_POST['formName']) {
	
		//checkLogged
		case "checkLogged":
			if (isset($_COOKIE["INREES_ID"])) {
				$logged = 1;
			}
			else {
				$logged = 0;
			}
			//Transmission de l'information
			echo json_encode($logged);
			break;
		
		//recordOrder
		case "recordOrder":
			$order = new order($pdo, $smarty, 0);
			$order->record();
			break;
			
		//recordItemDelivery
		case "recordItemDelivery":
			$order = new order($pdo, $smarty, 0);
			$order->recordItemDelivery($_POST['itemId'], $_POST['delivery']);
			break;
			
		//reaboUser
		case "reaboUser":
			$abonnement = new abonnement($pdo, $_COOKIE["INREES_ID"]);
			$abonnement->reaboUser($_POST['aboFreq'], $_POST['aboTypeId']);
			break;
		
		//aboUser
		case "aboUser":
			$userId = $_COOKIE["INREES_ID"];
			//traitement du numéro du magazine
			$magazine = new magazine($pdo);
			$actual = $magazine->getLast();
			
			//Vérif du choix utilisateur
			if ($_POST['startMag'] == 'actual') {
				$startMag = $actual;
			}
			else {
				$startMag = $actual+1;
			}
			//Validation de la commande
			$abonnement = new abonnement($pdo, $userId);
			$abonnement->aboUser(0, $_POST['aboFreq'], $startMag, $_POST['addressId'], $_POST['aboTypeId']);
			break;
		//aboFriend
		case "aboFriend":
			//NOUVELLE VERSION
			$adminOrder = new adminOrder($pdo, $smarty, $_SESSION['orderId']);
			//Récupération infos objet
			$products = new products($pdo, $_POST['itemId']);
			$details = $products->getDetails();
			$aboId = $details['idProduit'];
			$aboFreq = $details['aboFreq'];
			$eaboFreq = $details['eaboFreq'];
			//getLastMag
			$magazine = new magazine($pdo);
			$startMag = $magazine->getLast($aboId);
			$magReceived = 0;
			$isGift = 1;
			//Enregistrement du produit
			$adminOrder->addItem($_POST['itemId'], 1, 0);
			//Enregistrement de l'abo
			$adminOrder->recordAbo($_COOKIE['INREES_ID'], $aboId, $aboFreq, $eaboFreq, $startMag, $magReceived, $isGift);
			//Enregistrement de la procédure de nouvel abo et update shipping address
			$adminOrder->recordAwaitingUser($_POST['email'], $_POST['firstName'], $_POST['name'], $_POST['address1'], $_POST['address2'], 0, $_POST['zipCode'], $_POST['city']);
			break;
		//loggedUserReservation
		case "loggedUserReservation":
			//Création de l'utilisateur
			$user = new user($pdo, 0, $_COOKIE["INREES_ID"]);
			$userDetails = $user->getDetails();
			//Enregistrement de la réservation
			$reservation = new reservation($pdo);
			$reservation->record($_POST['itemId'], $userDetails['id'], $userDetails['firstName'], $userDetails['name'], $userDetails['email'], $_POST['seats']);
			break;
		//invitedUserReservation
		case "invitedUserReservation":
			//Enregistrement de la réservation
			$reservation = new reservation($pdo);
			$reservation->record($_POST['ItemId'], 0, $_POST['firstName'], $_POST['name'], $_POST['email'], $_POST['seats']);
			break;
			
		//listAddresses
		case "listAddresses":
			$user = new user($pdo, 0, $_COOKIE["INREES_ID"]);
			$addresses = $user->listAllAddresses();
			//Transmission de l'information
			echo json_encode($addresses);
			break;
			
		//listPaymentTypes
		case 'listPaymentTypes':
			$order = new order($pdo, $smarty, 0);
			$types = $order->listPaymentTypes();
			//Transmission de l'information
			echo json_encode($types);
			break;
			
		//listCountries
		case "listCountries":
			$address = new address($pdo, 0);
			$countries = $address->listCountries();
			//Transmission de l'information
			echo json_encode($countries);
			break;
			
		//listCountries
		case "listStates":
			$address = new address($pdo, 0);
			$states = $address->listStates();
			//Transmission de l'information
			echo json_encode($states);
			break;
			
		//listDeliveries
		case "listDeliveries":
			$delivery = new delivery($pdo, 0);
			$list = $delivery->listAll();
			//Transmission de l'information
			echo json_encode($list);
			break;
	}
?>
