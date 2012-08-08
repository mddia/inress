<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Traitement objet
	$shop = new shop($pdo);
	$smarty->assign('items', $shop->listitems());
	//On assigne des valeurs au panier si jamais il y a déjà des produits
	$smarty->assign('fullCart', $_SESSION['cart']);
	$smarty->assign('cartValue', $_SESSION['cartValue']);
	
	//Affichage du template
	$smarty->display('boutique.tpl');
?>