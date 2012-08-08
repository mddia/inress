<?php
	//Headers
	$headers = 'MIME-Version: 1.0'."\n";
	$headers .= 'From: "Demande presse INREES"<contact@inrees.com>'."\n";
	$headers .= 'Content-Type: text/html; charset="utf-8"'."\n";
	$headers .= 'Content-Transfer-Encoding: 8bit'."\n";
	$headers .= 'Reply-To: contact@inrees.com'."\n";
	
	$topic = 'Un journaliste demande un magazine';
	
	$email = 'slilli@inrees.com';
	
	$message = $_POST['message'];
	
	//Envoie de l'email
	mail($email, $topic, $message, $headers);
?>