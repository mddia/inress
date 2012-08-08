function checkPressForm() {
	var pressEmail = $('#pressEmail').val();
	var pressPhone = $('#pressPhone').val();
	//Vérification de l'email et/ou du phone
	var validationError = 0;
	//Vérif
	if (pressEmail == '' && pressPhone == '') {
		//On indique les champs invalides
		$('#pressEmail').css('border-color', 'red');
		$('#pressPhone').css('border-color', 'red');
		
		//Création du message d'erreur
		var errorMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: red; font-weight: normal;"><tr><td style="border: 1px solid red; background-color: pink; width: 326px; padding: 5px;">Merci de remplir au moins l\'un des champs suivants</td></tr></table>';
		
		//Affichage du message
		$('#errorMessage').html(errorMessage);
				
		//Validation
		validationError = 1;
	}
	else {
		//On regarde si le format d'email est valide
		if (pressEmail != '') {
			if (validateEmail(pressEmail) == false) {
				//On indique le champs invalide
				$('#pressEmail').css('border-color', 'red');
				$('#pressPhone').css('border-color', '#AFC1CD');
			
				//Création du message d'erreur
				var errorMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: red; font-weight: normal;"><tr><td style="border: 1px solid red; background-color: pink; width: 326px; padding: 5px;">Cette adresse email est invalide</td></tr></table>';
				
				//Affichage du message
				$('#errorMessage').html(errorMessage);
				
				//Validation
				validationError = 1;
			}
			else {
				//On restaure les champs qui auraient pu etre en rouge
				$('#pressEmail').css('border-color', '#AFC1CD');
				$('#pressPhone').css('border-color', '#AFC1CD');
				
				//On retire les message d'erreur
				$('#errorMessage').html('');
				
				//Validation
				validationError = 0;
			}
		}
		if (pressPhone != '') {
			//On restaure les champs qui auraient pu etre en rouge
			$('#pressPhone').css('border-color', '#AFC1CD');
			
			//On retire les message d'erreur
			$('#errorMessage').html('');
				
			//Validation
			validationError = 0;
		}
		
		//Création d'un message de confirmation
		if (validationError == 0) {
			//On récupère toutes les informations des variables
			var name = $('#name').val();
			var firstName = $('#firstName').val();
			var address = $('#address').val();
			var addressDetails = $('#addressDetails').val();
			var city = $('#city').val();
			var zipCode = $('#zipCode').val();
			var country = $('#country').val();
			var media = $('#media').val();
			
			//Création du message contenu dans l'email
			var finalEmail = 'Un journaliste demande à recevoir un magazine, voici le détail :<br /><br />Nom :'+name+'<br />Prénom : '+firstName+'<br />Email : '+pressEmail+'<br />N° de téléphone : '+pressPhone+'<br />Adresse : '+address+'<br />Complément d\'adresse : '+addressDetails+'<br />Ville : '+city+'<br />Code postal : '+zipCode+'<br />Pays : '+country+'<br />Média : '+media;
			
			//Requête ajax
			$.ajax({
				type: "POST",
				url: "pressEmailNotification.php",
				data: "message="+finalEmail,
				success: function() {					
					//On regarde si des informations sont manquantes
					if (name == '' || firstName == '' || address == '' || addressDetails == '' || city == '' || zipCode == '' || country == '') {
						//Création du message de notice
						var noticeMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: #ff8432; font-weight: normal;"><tr><td style="border: 1px solid orange; background-color: #fff9d5; width: 326px; padding: 5px;">Votre requête a été enregistrée, cependant certaines informations restent manquantes pour que nous puissions vous faire parvenir le magazine, merci de compléter le formulaire</td></tr></table>';
						
						//Affichage du message
						$('#noticeMessage').html(noticeMessage);
						
						//On met en surbrillance les champs concernés
						checkContent('name', name);
						checkContent('firstName', firstName);
						checkContent('address', address);
						checkContent('addressDetails', addressDetails);
						checkContent('city', city);
						checkContent('zipCode', zipCode);
						checkContent('country', country);
					}
					else {
						//On efface les messages de notice éventuels
						$('#noticeMessage').html('');
						
						//Création du message de confirmation
						var confirmationMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: green; font-weight: normal;"><tr><td style="border: 1px solid green; background-color: #b0ffa0; width: 326px; padding: 5px;">Votre requête a été enregistrée, nous y donnerons suite dans les plus brefs délais.</td></tr></table>';
						
						//Affichage du message
						$('#confirmationMessage').html(confirmationMessage);
						
						//On fait disparaitre le formulaire
						$('#requetePresse').fadeOut();
					}
				}
			});
		}
	}
}

//function checkContent
function checkContent(field, value) {
	if (value == '') {
		$('input#'+field).css('border-color', 'orange');
	}
	else {
		$('input#'+field).css('border-color', '#AFC1CD');
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