<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 11:35:24
         compiled from "templates/inc.javascript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12681814294faf805ce511c2-87960891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51495515e1ac5a5c87ec1a883b6b180e0cbc00f4' => 
    array (
      0 => 'templates/inc.javascript.tpl',
      1 => 1336519901,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12681814294faf805ce511c2-87960891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4faf805ce5f41',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faf805ce5f41')) {function content_4faf805ce5f41($_smarty_tpl) {?><!-- Javascript -->
<script type="text/javascript" src="libs/javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="libs/javascript/jquery-ui-1.8.16.min.js"></script>
<script type="text/javascript" src="libs/javascript/jquery.simplemodal.1.4.1.min.js"></script>
<script type="text/javascript" src="libs/javascript/menuEvents.js"></script>
<script type="text/javascript" src="libs/javascript/menuWrapers.js"></script>
<script type="text/javascript" src="libs/javascript/squareBan.js"></script>
<!-- Ajax -->
<script type="text/javascript" src="libs/ajax/cartActions.js"></script>
<script type="text/javascript" src="libs/ajax/orderActions.js"></script>
<script type="text/javascript" src="libs/ajax/user.recoverAbo.js"></script>


<script type="text/javascript">
//function addAddress
function addAddress() {
	var name = $('#addressName').val();
	var firstName = $('#addressFirstName').val();
	var address1 = $('#address1').val();
	var address2 = $('#address2').val();
	var address3 = $('#address3').val();
	var city = $('#addressCity').val();
	var zipCode = $('#addressZipCode').val();
	var country = $('#addressCountry').val();
	//alert("formName=addAddress&name="+name+"&firstName="+firstName+"&address1="+address1+"&address2="+address2+"&address3="+address3+"&city="+city+"&zipCode="+zipCode+"&country="+country);
	
	//Traitement ajax
	$.ajax({
		type: "GET",
		url: "profileActions.php",
		data: "formName=addAddress&name="+name+"&firstName="+firstName+"&address1="+address1+"&address2="+address2+"&address3="+address3+"&city="+city+"&zipCode="+zipCode+"&country="+country,
		success: function(result) {
			//Affichage de la nouvelle adresse
			$('#addressesList').append('- '+firstName+' '+name+' : '+address1);
		}
	});
}

//Function checkUser
function checkUser(type) {
	var email = $('#emailInput').val();
	var password = $('#passwordInput').val();
	//Traitement ajax
	$.ajax({
		type: "GET",
		url: "logInForm.php",
		data: "email="+email+"&password="+password,
		success: function(result) {
			if (result == '1') {
				$('#infoBlock').html('Connexion réussie');
				$('#infoBlock').addClass('loginNote');
				$('#infoBlock').removeClass('loginError');
				if (type == 0) {
					//Redirection de l'utilisateur
					$(location).attr('href',"Accueil").delay(1000);
				}
				else if (type == 1) {
					order(1);
				}
			}
			else {
				$('#infoBlock').html('Erreur de connexion');
				$('#infoBlock').addClass('loginError');
				$('#infoBlock').removeClass('loginNote');
			}
		}
	});
}
</script>
<?php }} ?>