<?php
	session_start();
	//debug reset Cart
	$_SESSION['cart'] = array();
	$_SESSION['cartValue'] = 0;
	$_SESSION['cartValueSave'] = 0;
	$_SESSION['promoValue'] = 0;
	$_SESSION['orderId'] = 0;
	//Destroy
	session_destroy();
?>