<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Traitement objet
	$smarty->assign('fullCart', $_SESSION['cart']);
	$smarty->assign('cartValue', $_SESSION['cartValue']);
	
	//Affichage du template
	$smarty->display('panier.tpl');
?>