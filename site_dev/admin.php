<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Cr�ation gestion admin
	$admin = new admin($pdo, $smarty);
	$admin->setUp();
?>