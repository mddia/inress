<?php
	//On définit une constante pour Smarty
	define('SMARTY_DIR', 'smarty/libs/');
	require(SMARTY_DIR.'Smarty.class.php');
	
	//On appelle l'objet Smarty et on le configure
	$smarty = new Smarty();
	$smarty->template_dir = 'templates';
	$smarty->compile_dir = 'templates_c';
	$smarty->config_dir = 'configs';
	
	//Config du format de date
	$config['date'] = '%d/%m/%Y';
	$config['hours'] = '%Hh%M';
	$smarty->assign('config', $config);
?>