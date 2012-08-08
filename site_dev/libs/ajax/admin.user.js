//recordUserAddress
function recordUserAddress(userId) {
	//Récupération des variables
	var name = $('#name').val();
	var firstName = $('#firstName').val();
	var address1 = $('#address1').val();
	var address2 = $('#address2').val();
	var zipCode = $('#zipCode').val();
	var city = $('#city').val();
	var country = $('#country').val();
	var state = $('#state').val();
	
	//On n'éxécute la requête que lorsque les champs sont valides
	if (name != '' && firstName != '' && address1 != '' && zipCode != '' && city != '') {
		//Traitement Ajax
		$.ajax({
			//ajaxStart: load(),
			type: "POST",
			url: "actions.php",
			data: "formName=recordUserAddress&name="+name+"&firstName="+firstName+"&address1="+address1+"&address2="+address2+"&zipCode="+zipCode+"&city="+city+"&userId="+userId+"&country="+country+"&state="+state,
			success: function() {
				location.reload();
			}
		});
	}
}

//displayStates
function displayStates() {
	//CSS
	$('#statesLabel').css('display', 'block');
	$('#state').css('display', 'block');
}

//hideStates
function hideStates() {
	//CSS
	$('#statesLabel').css('display', 'none');
	$('#state').css('display', 'none');
}

//updateUserRoutage
function updateUserRoutage(userId) {
	//Récupération des variables
	var emailbis = 0;
	var newsletteractif = $('#newsletteractif').val();
	var frequence = $('#frequence').val();
	var routage = $('#routage').val();
	
	//Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateUserRoutage&emailbis="+emailbis+"&newsletteractif="+newsletteractif+"&frequence="+frequence+"&routage="+routage+"&userId="+userId,
		success: function() {
			location.reload();
		}
	});
}

//setAddressAsDefault
function setAddressAsDefault(addressId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=setAddressAsDefault&addressId="+addressId,
		success: function(result) {
			location.reload();
		}
	});
}

//deleteAddress
function deleteAddress(addressId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 135px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Cette adresse sera supprimée définitivement.<br />Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					//ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteAddress&addressId="+addressId,
					success: function() {
						location.reload();
					}
				});
			});
		}
	});
}