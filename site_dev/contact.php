<?php
	//Chargement du fichier de config
	require("inc.config.php");
	
	//Vérif etape
	if (array_key_exists('etape', $_GET) AND $_GET['etape'] != '') {
		$smarty->assign('etape', $_GET['etape']);
	}
	else {
		$smarty->assign('etape', 1);
	}
	
	//listMessageTopics
	$messageTopic = new messageTopic($pdo, 0);
	$list = $messageTopic->listAll();
	$smarty->assign('topics', $list);
	
	//Affichage du template
	$smarty->display('contact.tpl');
?>