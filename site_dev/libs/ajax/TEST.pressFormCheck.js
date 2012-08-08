function checkPressForm() {
	var pressEmail = $('#pressEmail').val();
	var pressPhone = $('#pressPhone').val();
	//V�rification de l'email et/ou du phone
	var validationError = 0;
	//V�rif
	if (pressEmail == '' && pressPhone == '') {
		//On indique les champs invalides
		$('#pressEmail').css('border-color', 'red');
		$('#pressPhone').css('border-color', 'red');
		
		//Cr�ation du message d'erreur
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
			
				//Cr�ation du message d'erreur
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
		
		//Cr�ation d'un message de confirmation
		if (validationError == 0) {
			//On r�cup�re toutes les informations des variables
			var name = $('#name').val();
			var firstName = $('#firstName').val();
			var address = $('#address').val();
			var addressDetails = $('#addressDetails').val();
			var city = $('#city').val();
			var zipCode = $('#zipCode').val();
			var country = $('#country').val();
			var media = $('#media').val();
			
			//Cr�ation du message contenu dans l'email
			var finalEmail = 'Un journaliste demande � recevoir un magazine, voici le d�tail :<br /><br />Nom :'+name+'<br />Pr�nom : '+firstName+'<br />Email : '+pressEmail+'<br />N� de t�l�phone : '+pressPhone+'<br />Adresse : '+address+'<br />Compl�ment d\'adresse : '+addressDetails+'<br />Ville : '+city+'<br />Code postal : '+zipCode+'<br />Pays : '+country+'<br />M�dia : '+media;
			
			//Requ�te ajax
			$.ajax({
				type: "POST",
				url: "pressEmailNotification.php",
				data: "message="+finalEmail,
				success: function() {					
					//On regarde si des informations sont manquantes
					if (name == '' || firstName == '' || address == '' || addressDetails == '' || city == '' || zipCode == '' || country == '') {
						//Cr�ation du message de notice
						var noticeMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: #ff8432; font-weight: normal;"><tr><td style="border: 1px solid orange; background-color: #fff9d5; width: 326px; padding: 5px;">Votre requ�te a �t� enregistr�e, cependant certaines informations restent manquantes pour que nous puissions vous faire parvenir le magazine, merci de compl�ter le formulaire</td></tr></table>';
						
						//Affichage du message
						$('#noticeMessage').html(noticeMessage);
						
						//On met en surbrillance les champs concern�s
						checkContent('name', name);
						checkContent('firstName', firstName);
						checkContent('address', address);
						checkContent('addressDetails', addressDetails);
						checkContent('city', city);
						checkContent('zipCode', zipCode);
						checkContent('country', country);
					}
					else {
						//On efface les messages de notice �ventuels
						$('#noticeMessage').html('');
						
						//Cr�ation du message de confirmation
						var confirmationMessage = '<table style="margin-left: 30px; font-size: 13px; text-align: center; color: green; font-weight: normal;"><tr><td style="border: 1px solid green; background-color: #b0ffa0; width: 326px; padding: 5px;">Votre requ�te a �t� enregistr�e, nous y donnerons suite dans les plus brefs d�lais.</td></tr></table>';
						
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