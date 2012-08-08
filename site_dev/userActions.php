<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	/* Traitement selon le formulaire émetteur */
	switch ($_GET['formName']) {
	
		//addUserAddress
		case "addUserAddress":
			$userId = $_COOKIE["INREES_ID"];
			$user = new user($pdo, 0, $userId);
			$user->addAddress($civility, $_GET['name'], $_GET['firstName'], $_GET['address1'], $_GET['address2'], 0, $_GET['city'], $_GET['zipCode'], $_GET['country'], $_GET['state'], 0);
			break;
	}
?>
