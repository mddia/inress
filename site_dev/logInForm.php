<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Vérification de l'identification
	$logIn = new logIn($pdo, $_GET['email'], $_GET['password']);
	$logIn->check();
	json_encode($logIn->returnStatus());
?>