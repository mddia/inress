<?php
	//Chargement du fichier de config
	require("inc.config.php");

	//Traitement bannière
	$banniere = new banniere($pdo);
	
	//Assignation smarty
	$smarty->assign('ban', $banniere->getBan());
	
	//Affichage du template
	$smarty->display('index.tpl');
?>