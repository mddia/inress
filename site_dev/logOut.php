<?php
	//Page de logOut
	//Suppression des cookies
   setcookie("INREES_ID", "", time()-3600, "");
   setcookie("prenom", "", time()-3600, "");
   setcookie("nom", "", time()-3600, "");
   
   //Redirection de l'utilisateur
   header("Location:".$_SERVER['HTTP_REFERER']." ");
?>