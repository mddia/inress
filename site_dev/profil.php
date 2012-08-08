<?php
	//Chargement du fichier de config
	require("inc.config.php");

	//Traitement des adresses si l'user est connect�
	if (isset($_COOKIE["INREES_ID"])) {
		//Cr�ation profil
		$profile = new profile($pdo, $_COOKIE["INREES_ID"]);
		$addresses = $profile->listAddresses();
		
		//Asignation & affichage du template
		$smarty->assign('addresses', $addresses);
		$smarty->display('profil.tpl');
	}
	else {
		header('location: Accueil');
		exit;
	}
?>