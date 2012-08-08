<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Création gestion admin
	$admin = new admin($pdo, $smarty);
	$admin->setUp();
?>