<?php
	//FICHIER DE CONFIGURATION
	session_start();
	
	//Define timezone
	date_default_timezone_set('Europe/Paris');
	
	//Requires
	require('functions/class.load.php');
	require('inc.smarty.php');
	require('../inc.constants.php');
	
	//Appel des objets
	require('html2pdf.class.php');
	
	//Connexion BDD
	$databaseConnection = new databaseConnection();
	$pdo = $databaseConnection->returnPDO();
?>