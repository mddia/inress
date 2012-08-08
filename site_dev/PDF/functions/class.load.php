<?php
	//Fonction de chargement de classe, en autoload
	
	function loadClass($class) {
        require '../'.CLASS_PATH.$class.'.class.php';
    }
	
	spl_autoload_register('loadClass');
?>