<?php
	//Chargement du fichier de config
	require("inc.config.php");

	//Check if email is set
	if (array_key_exists('userEmail', $_GET) AND $_GET['userEmail'] != '' ) {
		//recover abo
		$recoverAbo = new recoverAbo($pdo, $smarty);
		$recoverAbo->display($_GET['userEmail']);
	}
	else {
		//Redirection
		header('location: index.php');
		exit();
	}
?>