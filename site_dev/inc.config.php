<?php
	//FICHIER DE CONFIGURATION
	session_start();
	
	//Initialisation du panier
	if (!array_key_exists('cart', $_SESSION)) {
		$_SESSION['cart'] = array();
		$_SESSION['cartValue'] = 0;
		$_SESSION['cartValueSave'] = 0;
		$_SESSION['promoValue'] = 0;
		$_SESSION['orderId'] = 0;
	}
	
	//Define timezone
	date_default_timezone_set('Europe/Paris');

	//Appel des modules
	require('inc.smarty.php');
	require('inc.constants.php');
	
	//Appel function class.load
	require('functions/class.load.php');
	
	//Activation de la session
	if (isset($_COOKIE["INREES_ID"])) {
		$smarty->assign('inreesId', $_COOKIE['INREES_ID']);
		// $smarty->assign('userName', $_COOKIE['nom']);
		// $smarty->assign('userFirstName', $_COOKIE['prenom']);
		$smarty->assign('COOKIE', $_COOKIE);
	}
	else {
		$smarty->assign('inreesId', 0);
	}
	
	//Connexion BDD
	$databaseConnection = new databaseConnection();
	$pdo = $databaseConnection->returnPDO();
?>