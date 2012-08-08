//checkRecoverAbo
function checkRecoverAbo() {
	//Récupération des variables
	var name = $('#name').val();
	var firstName = $('#firstName').val();
	var email = $('#email').val();
	var password = $('#password').val();
	var passwordConfirm = $('#passwordConfirm').val();
	var aboId = $('#aboId').val();
	var addressId = $('#addressId').val();
	var civility = $('#civility').val();
	var verif = 1;
	//Suppression des message éventuels
	$('#messageField').html('');
	//Check vars & fields
	if (password == '') {
		//Affichage bordure en rouge
		$('#password').css('border-color', 'red');
		//Display message
		var message = '<div style="border: 1px solid orange; padding: 5px; font-weight: bold; color: orange; margin-bottom: 5px;">Merci de remplir le champs "Mot de passe"</div>';
		$('#messageField').append(message);
		//On désactive verif
		verif = 0;
	}
	else {
		$('#password').css('border-color', '#AFC1CD');
	}
	if (passwordConfirm == '') {
		//Affichage bordure en rouge
		$('#passwordConfirm').css('border-color', 'red');
		//Display message
		var message = '<div style="border: 1px solid orange; padding: 5px; font-weight: bold; color: orange; margin-bottom: 5px;">Merci de remplir le champs "Confirmer mot de passe"</div>';
		$('#messageField').append(message);
		//On désactive verif
		verif = 0;
	}
	else {
		$('#passwordConfirm').css('border-color', '#AFC1CD');
	}
	//Comparaison des mots de passes entrées
	if (password != passwordConfirm) {
		//Changement des bordures
		$('#password').css('border-color', 'red');
		$('#passwordConfirm').css('border-color', 'red');
		//Display message
		var message = '<div style="border: 1px solid orange; padding: 5px; font-weight: bold; color: orange; margin-bottom: 5px;">Les champs "Mot de passe" et "Confirmer mot de passe" sont différents</div>';
		$('#messageField').append(message);
		//On désactive verif
		verif = 0;
	}
	//Vérification de la longueur du mot de passe
	if (password.length < 6 || passwordConfirm.length < 6) {
		//Display message
		var message = '<div style="border: 1px solid orange; padding: 5px; font-weight: bold; color: orange; margin-bottom: 5px;">Votre mot de passe est trop court (6 caractères minimum)</div>';
		$('#messageField').append(message);
		//On désactive verif
		verif = 0;
	}
	//Si tout est bon on poursuit
	if (verif != 0) {
		//Traitement Ajax
		$.ajax({
			type: "POST",
			url: "actions.php",
			data: "formName=userRecoverRecord&civility="+civility+"&name="+name+"&firstName="+firstName+"&email="+email+"&password="+password+"&aboId="+aboId+"&addressId="+addressId,
			success: function(result) {
				$(location).attr('href',"profil.php");
			},
		});
	}
}