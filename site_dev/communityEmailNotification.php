<?php
	//Headers
	$headers = 'MIME-Version: 1.0'."\n";
	$headers .= 'From: "Communauté INREES"<contact@inrees.com>'."\n";
	$headers .= 'Content-Type: text/html; charset="utf-8"'."\n";
	$headers .= 'Content-Transfer-Encoding: 8bit'."\n";
	$headers .= 'Reply-To: contact@inrees.com'."\n";
	
	$topic = 'Un membre veut rejoindre la communauté';
	
	$email = 'slilli@inrees.com';
	//$email = 'vincent.tartar@gmail.com';
	
	$message = $_POST['message'];
	
	//Envoie de l'email
	mail($email, $topic, $message, $headers);
?>