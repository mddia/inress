function checkCommunityForm() {
	var name = $('#name').val();
	var firstName = $('#firstName').val();
	var email = $('#email').val();
	var motivations = $('#motivations').val();
	
	//Vérification des erreurs
	var validationError = 0;
	var emailError = 0;
	//Vérif
	if (name == '' || firstName == '' || email == '' || motivations == '') {
		//On indique les champs invalides
		checkContent('name', name);
		checkContent('firstName', firstName);
		checkContent('email', email);
		checkContent('motivations', motivations);
		
		//Création du message d'erreur
		var errorMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: red; font-weight: normal;"><tr><td style="border: 1px solid red; background-color: pink; width: 326px; padding: 5px;">Merci de remplir les champs suivants</td></tr></table>';
		
		//Affichage du message
		$('#errorMessage').html(errorMessage);
				
		//Validation
		validationError = 1;
	}
	else {
		//Validation
		validationError = 0;
	}

	//On regarde si le format d'email est valide
	if (email != '') {
		if (validateEmail(email) == false) {
			//On indique le champs invalide
			$('#email').css('border-color', 'red');
		
			//Création du message d'erreur
			var errorMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: red; font-weight: normal;"><tr><td style="border: 1px solid red; background-color: pink; width: 326px; padding: 5px;">Cette adresse email est invalide</td></tr></table>';
			
			//Affichage du message
			$('#emailMessage').html(errorMessage);
			
			//Validation
			emailError = 1;
		}
		else {
			//On restaure les champs qui auraient pu etre en rouge
			$('#email').css('border-color', '#AFC1CD');
			
			//On retire les message d'erreur
			$('#emailMessage').html('');
			
			//Validation
			emailError = 0;
		}
	}
	
	//On traite si no errors
	if (validationError == 0 && emailError == 0) {
		//Création du message contenu dans l'email
		var finalEmail = 'Un membre demande à rejoindre la communauté, voici le détail :<br /><br />Nom :'+name+'<br />Prénom : '+firstName+'<br />Email : '+email+'<br />Motivations : '+motivations;
		
		//Requête ajax
		$.ajax({
			type: "POST",
			url: "communityEmailNotification.php",
			data: "message="+finalEmail,
			success: function() {
				//Création du message de confirmation
				var confirmationMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: green; font-weight: normal;"><tr><td style="border: 1px solid green; background-color: #b0ffa0; width: 326px; padding: 5px;">Merci de votre intérêt pour l\'INREES. Nous ne manquerons pas de vous recontacter pour vous informer des nouveautés.</td></tr></table>';
				
				//On retire les message d'erreur eventuellement restants
				$('#emailMessage').html('');
				$('#errorMessage').html('');
				
				//Affichage du message
				$('#confirmationMessage').html(confirmationMessage);
				
				//On fait disparaitre le formulaire
				$('#requeteCommunaute').fadeOut();
			}
		});
	}
}

//function checkContent
function checkContent(field, value) {
	if (value == '') {
		$('#'+field).css('border-color', 'red');
	}
	else {
		$('#'+field).css('border-color', '#AFC1CD');
	}
}

//Valide le format d'une adresse email
function validateEmail(email) {
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
	if(reg.test(email)) {
		return true;
	}
	else {
		return false;
	}
}