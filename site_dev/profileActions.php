<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	/* Traitement selon le formulaire émetteur */
	switch ($_GET['formName']) {
	
		//addAddress
		case "addAddress":
			echo 'debug : '.$_COOKIE['INREES_ID'];
			//Cration profil
			$profile = new profile($pdo, $_COOKIE['INREES_ID']);
			$profile->addAddress($_GET['name'], $_GET['firstName'], $_GET['address1'], $_GET['address2'], $_GET['address3'], $_GET['city'], $_GET['zipCode'], $_GET['country']);
			break;
	}
?>
