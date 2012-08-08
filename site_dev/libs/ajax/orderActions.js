//Fonction de listage des produits du panier
function finalizeOrder() {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=checkLogged",
		success: function(returnValue) {
		
			//Eval du contenu
			var result = eval('('+returnValue+')');
			
			//Si result == 1 utilisateur loggé
			if (result == 1) {
				order(1);
			}
			else {
				order(0);
			}
		}
	});
}


//Function order
function order(step) {
	//On demande à l'utilisateur de s'identifier
	if (step == 0) {
		var content = '<h3>Avant de valider votre commande merci de vous identifier :</h3><br /><div id="infoBlock"></div><form name="loginForm"><h3>E-mail</h3><input type="text" name="email" id="emailInput" class="text" /><br /><br /><h3>Mot de passe</h3><input type="password" name="password" id="passwordInput" class="text" /><br /><a href="reset"><strong>Mot de passe oublié ?</strong></a><br /><br /><input class="submit" type="button" value="Envoyer" onClick="checkUser(1);" /><div style="text-align:right;"></div></form>';
		
		//Affichage div et transmission du contenu
		$('#orderBlock').css('display', 'block');
		$('#orderBlock').html(content);
	}
	else if (step == 1) {
		//On enregistre la commande
		$.ajax({
			//ajaxStart: load(),
			type: "POST",
			url: "orderActions.php",
			data: "formName=recordOrder",
			success: function() {
				//Passage à l'étape suivante
				order(2);
			}
		});
	}
	else if (step == 2) {
		//On regarde le nombre d'abonnements
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=checkCart",
			success: function(returnValue) {
				//Eval du contenu
				var result = eval('('+returnValue+')');
				//Vérification
				if (result.aboDiff != 0) {
					//Création de la variable content
					var content = '<h3>Merci de compléter les informations concernant le ou les abonnements de votre commande :</h3><br />';
					for (var n = 0; n < result.aboDiff; n++) {
					
						var j = eval(n+1);
					
						//On boucle en fonction du nombre d'abonnements par article
						for (var i = 0; i < result.abonnements[n].nbreAbo; i++) {
						
							var y = eval(i+1);
							
							//Abonné ou non ?
							if (result.abonnements[n].isSubscriber == 1) {
								var aboStatus = '<input type="radio" onclick="userReabo('+j+', '+y+', '+result.abonnements[n].newMaxMag+'); greyRadios('+j+', '+y+', '+result.abonnements[n].aboTypeId+');" name="aboStatus'+j+'-'+y+'" id="userAboRadio'+j+'-'+y+'-'+result.abonnements[n].aboTypeId+'" /> <strong>Me réabonner</strong><br />';
							}
							else {
								var aboStatus = '<input type="radio" onclick="userAbo('+j+', '+y+', '+result.abonnements[n].actualMag+'); greyRadios('+j+', '+y+', '+result.abonnements[n].aboTypeId+');" name="aboStatus'+j+'-'+y+'" id="userAboRadio'+j+'-'+y+'-'+result.abonnements[n].aboTypeId+'" /> <strong>M\'abonner</strong><br />';
							}
							
							//Incrémentation du contenu
							content = content+'<strong>Abonnement : "'+result.abonnements[n].title+' ('+y+')"</strong><br /><br />'+aboStatus+'<input type="radio" onclick="friendAbo('+j+','+y+'); ungreyRadios('+j+', '+y+', '+result.abonnements[n].aboTypeId+');" name="aboStatus'+j+'-'+y+'" id="friendAboRadio'+j+'-'+y+'-'+result.abonnements[n].aboTypeId+'" /> <strong>Abonner un(e) ami(e)</strong><br /><div id="aboField'+j+'-'+y+'" style="border: 1px solid #CCCCCC; padding: 5px; display: none; text-align: justify; margin-top: 10px"></div><br /><br />';
						}
						
					}
					//Ajout du boutton d'enregistrement
					content = content+'<input type="button" value="Enregistrer" onClick="recordAbo()" />';
					//Affichage div et transmission du contenu
					$('#orderBlock').css('display', 'block');
					$('#orderBlock').html(content);
				}
				else {
					order(3);
				}
			}
		});
	}
	else if (step == 3) {
		//On regarde le nombre de réservations
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=checkCart",
			success: function(returnValue) {
				//Eval du contenu
				var result = eval('('+returnValue+')');
				
				if (result.resQuantity != 0) {
					//Création de la variable content
					var content = '<h3>Merci de compléter les informations concernant vos réservations :</h3><br />';
					//On boucle tant qu'il y a des infos à recevoir
					for (var i = 0; i < result.eventQty ; i++ ) {
						content = '<h3>'+content+result.reservations[i].Event+'</h3><br />';
						
						//Singulier, pluriel ?
						if (result.reservations[i].nbrePlace == 1) {
							var form = '<input type="radio" name="resa'+i+'" onClick="hideResaForm('+i+')" id="keepName'+i+'" checked /> Je réserve cette place au nom de <span id="userNameSpan'+i+'" class="bold"></span><br /><input type="radio" name="resa'+i+'" onClick="displayChangeNameForm('+i+', '+result.reservations[i].nbrePlace+')" id="changeName'+i+'" /> Je réserve cette place à un autre nom<br /><div id="changeReservationName'+i+'" style="border: 1px solid #CCCCCC; padding: 5px; display: none; text-align: justify; margin-top: 10px"></div><br />';
						}
						else {
							var form = '<input type="radio" name="resa'+i+'" onClick="hideResaForm('+i+')" id="keepName'+i+'" checked /> Je réserve ces '+result.reservations[i].nbrePlace+' places au nom de <span id="userNameSpan'+i+'" class="bold"></span><br /><input type="radio" name="resa'+i+'"  onClick="displayChangeNameForm('+i+', '+result.reservations[i].nbrePlace+')" id="changeName'+i+'" /> Je réserve ces '+result.reservations[i].nbrePlace+' places à des noms différents<br /><div id="changeReservationName'+i+'" style="border: 1px solid #CCCCCC; padding: 5px; display: none; text-align: justify; margin-top: 10px"></div><br />';
						}
						
						//Ajout du formulaire
						content = content+form;
					}
					
					//Ajout du formulaire
					content = content+'<input type="button" value="Continuer" onClick="checkReservations()" />';
					
					//Affichage div et transmission du contenu
					$('#orderBlock').css('display', 'block');
					$('#orderBlock').html(content);
				
					for (var z = 0; z < result.eventQty ; z++ ) {
						//display userName
						displayUserName(z);
					}
				}
				else {
					order(4);
				}
			}
		});
	}
	else if (step == 4) {
		//on regarde si il y a des produits "solides" dans le panier
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=listItemsToSendCount",
			success: function(returnValue) {
				
				//Eval du contenu
				var postal = eval('('+returnValue+')');
				
				//Si il y a des envois postaux
				if (postal != 0) {
					var content = '<h3>Adresse de livraison :</h3><br /><span id="addresses"></span><a onClick="order(5);" style="font-weight: bold; cursor: pointer; font-size: 11px;">Vous souhaitez faire livrer vos achats à des adresses différentes ?</a><br /><br /><input type="button" value="Enregistrer" onClick="recordDeliveryAddresses(0)" />';
		
					//Affichage div et transmission du contenu
					$('#orderBlock').css('display', 'block');
					$('#orderBlock').html(content);
					
					listAddresses(0, 0);
					//listDeliveries();
				}
				//sinon on passe au paiement
				else {
					order(7);
				}
			}
		});
		
		
	}
	else if (step == 5) {
		//Afichage des produits "solides" du panier pour définir les adresses
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=listCart",
			success: function(returnValue) {
				
				//Eval du contenu
				var cart = eval('('+returnValue+')');
				
				//Content
				var content = '<table>';
				
				//Boucle
				for (var i = 0; i < cart.length ; i++ ) {
					if ((cart[i].item.envoiPostal != 0) && (cart[i].item.subscription != 1)) {
						content = content+'<tr><td style="width: 200px; margin-right: 5px; border: 1px solid grey; font-weight: bold; text-align: left;">'+cart[i].item.title+'</td><td style="font-weight: bold; width: 36px; border: 1px solid grey; margin-right: 5px; text-align: center;">x'+cart[i].quantity+'</td><td style="border: 1px solid grey;"><span id="addresses'+i+'-1"></span></td></tr>';
					}
				}
				
				content = content+'</table><br /><input type="button" value="Enregistrer" onClick="recordDeliveryAddresses(1)" />';
				
				//CSS
				$('#orderBlock').css('width', '500px');
				//Affichage div et transmission du contenu
				$('#orderBlock').html(content);
				
				//Boucle d'affichage des adresses de livraison
				for (var u = 0; u < cart.length ; u++ ) {
					if (cart[u].item.envoiPostal != 0) {
						listAddresses(u, 1);
					}
				}
			}
		});
	}
	//Listage des modes de livraison
	else if (step == 6) {
		//On regarde le nombre d'adresses associées à la commande
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=getOrderDeliveries",
			success: function(returnValue) {
				
				//Eval du contenu
				var list = eval('('+returnValue+')');
				
				//Variables
				var content = '<strong>Mode de livraison de votre commande : </strong><br /><br />';
				
				//Boucle
				for (var x = 0; x < list.length; x++) {
					//Eval
					var i = eval(x+1);
				
					//Incrément de la boucle
					content = content + i + ' - '+list[x].firstName+' '+list[x].name+', '+list[x].address1+'<br /><span id="shippingSelectSpan'+x+'"></span><br /><br />';
				}
				
				//Clôture
				content = content+'<input type="button" value="Enregistrer" onClick="recordShippingIds()" />';
				
				//Transmission
				$('#orderBlock').html(content);
				
				//Chargement des modes de livraison
				loadShippingTypes();
			}
		});
	}
	//Récap commande
	else if (step == 7) {
		var content = '<h3>Détail complet de la commande, affichage lors du design final.</h3><br />Contenu ici.<br /><br /><input type="button" value="Payer la commande" onClick="order(8)" />';
		
		//Affichage div et transmission du contenu
		$('#orderBlock').html(content);
	}
	//Paiement commande
	else if (step == 8) {
		//On regarde le nombre d'adresses associées à la commande
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=isFrenchDelivery",
			success: function(recturnValue) {
				//Eval
				result = eval('('+recturnValue+')');
				//Traitement
				var content = '<h3>Mode de paiement</h3><i style="font-size: 13px;">Sélectionnez le mode de paiement</i><br /><br /><a style="cursor: pointer; font-size: 15px; font-weight: bold;" onClick="payOrder(\'CB\')">Carte bleue</a><br />';
				//Chèque ?
				if (result != 0) {
					content = content+'<a style="cursor: pointer; font-size: 15px; font-weight: bold;" onClick="payOrder(\'CHK\')">Chèque</a><br />';
				}
				//Affichage div et transmission du contenu
				$('#orderBlock').html(content);
			}
		});
	}
}

//payOrder
function payOrder(type) {
	//Vérif
	if (type == 'CB') {
		//Création contenu
		var content = '<h3>Paiement par Carte bleue</h3><br /><br />Merci de renseigner vos informations bancaire :<br />N° de carte : <input type="text" name="cardNumber" id="cardNumber" />';
	}
	else if (type == 'CHK') {
		//On retire l'élément temporaire de la  commande
		validateOrder();
		//Création contenu
		var content = '<h3>Paiement par Chèque</h3><br /><br />Merci de faire parvenir votre chèque rue Saint-Jacques, 75014 Paris';
	}
	//Affichage div et transmission du contenu
	$('#orderBlock').html(content);
}

//validateOrder
function validateOrder() {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=validateOrder",
		success: function() {}
	});
}

//recordShippingIds
function recordShippingIds() {
	//On regarde le nombre d'adresses associées à la commande
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=getOrderDeliveries",
		success: function(returnValue) {
		
			//Eval du contenu
			var list = eval('('+returnValue+')');
			
			//Boucle
			for (var x = 0; x < list.length; x++) {
				//Récupération de la valeur de chaque shipping / adresses
				var shippingId = $('#shippingSelect'+x).val();
				var addressId = list[x].id;
				//Mise à jour du mode de livraison par adresse
				updateOrderShipping(addressId, shippingId);
			}
			
			//Poursuite de la commande
			order(7);
		}
	});
}

//updateOrderShipping
function updateOrderShipping(addressId, shippingId) {
	//On regarde le nombre d'adresses associées à la commande
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=updateOrderShipping&addressId="+addressId+"&shippingId="+shippingId,
		success: function() {}
	});
}

//loadShippingTypes()
function loadShippingTypes() {
	//On regarde le nombre d'adresses associées à la commande
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=getOrderDeliveries",
		success: function(returnValue) {
		
			//Eval du contenu
			var list = eval('('+returnValue+')');
			
			//On boucle
			for (var x = 0; x < list.length; x++) {
				//Eval
				var i = eval(x+1);
				
				//On récupère le poids pour chaque adresse
				var id = list[x].id;
				
				//On récupère le poids en fonction des produits par adresse
				getOrderWeight(id, x);
			}
		}
	});
}

//getOrderWeight
function getOrderWeight(id, x) {

	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=getOrderWeight&id="+id,
		success: function(returnValue) {
			//Eval du contenu
			var weight = eval('('+returnValue+')');
			//Listage des modes de livraisons possible en fonction du poids
			displayShippingTypes(weight, x);
		}
	});
}

//displayShippingTypes(weight)
function displayShippingTypes(weight, x) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=getShippingTypes&weight="+weight,
		success: function(returnValue) {
		
			//Eval du contenu
			var list = eval('('+returnValue+')');
			
			//Vérif
			if (list.length != 0) {
				//Var select
				var select = '<select id="shippingSelect'+x+'" name="shippingSelect'+x+'">';
				
				//Boucle
				for (var i = 0; i < list.length; i++) {
					select = select+'<option value="'+list[i].id+'">'+list[i].name+' - '+list[i].tarif+'€</option>';
				}
				
				//clôture
				select = select+'</option>';
			}
			else {
				select = '<strong>Votre commande est trop volumineuse, merci de nous contacter.</strong><input type="hidden" name="shippingSelect'+x+'" id="shippingSelect'+x+'" value="0" />';
			}
			
			//Transmission
			$('#shippingSelectSpan'+x).html(select);
		}
	});
}

//removeSubFromOrder suppression d'un abo après validation de la commande
function removeSubFromOrder(subId) {
	//alert('Supprimer ?');
}

//recordDelivery
function recordDeliveryAddresses(multi) {
	if (multi == 0) {
		var delivery = $('#addressesSelect').val();
		
		//On regarde le nombre de réservations
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=listCart",
			success: function(returnValue) {
				
				//Eval du contenu
				var cart = eval('('+returnValue+')');
				
				//Boucle
				for (var i = 0; i < cart.length ; i++ ) {
					var itemId = cart[i].itemId;
					
					//Enregistrement de l'adresse de livraison
					recordItemDelivery(itemId, delivery);
				}
				//Poursuite processus
				order(6);
			}
		});
	}
	else {
		//On regarde le nombre de réservations
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=listCart",
			success: function(returnValue) {
				
				//Eval du contenu
				var cart = eval('('+returnValue+')');
				
				//Boucle
				for (var i = 0; i < cart.length ; i++ ) {
					if (cart[i].item.envoiPostal != 0) {
						var delivery = $('#addressesSelect'+i+'-1').val();
						var itemId = cart[i].itemId;
					
						//Enregistrement de l'adresse de livraison
						recordItemDelivery(itemId, delivery);
					}
				}
				//Poursuite processus
				order(6);
			}
		});
	}
}

//recordItemDelivery
function recordItemDelivery(itemId, delivery) {
	//On regarde le nombre de réservations
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=recordItemDelivery&itemId="+itemId+"&delivery="+delivery,
	});
}

//ungreyRadios
function ungreyRadios(a, b, c) {
	//is Selected ?
	var title = $("#userAboRadio"+a+"-"+b+"-"+c).attr("title");
	
	if (title == 'abonnement') {
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "cartActions.php",
			data: "formName=checkCart",
			success: function(returnValue) {
				
				//Eval du contenu
				var result = eval('('+returnValue+')');
				//Vérification
				if (result.aboDiff != 0) {
					
					for (var n = 0; n < result.aboDiff; n++) {
					
						var j = eval(n+1);
					
						//On boucle en fonction du nombre d'abonnements par article
						for (var i = 0; i < result.abonnements[n].nbreAbo; i++) {
						
							var y = eval(i+1);							
							var h = result.abonnements[n].aboTypeId;
							
							//Si le radio n'est pas celui sélectionné on grise les autres
							if ((a != j || b != y) && (c == h)) {
								$('#userAboRadio'+j+'-'+y+'-'+h).removeAttr('disabled');
							}
							else {
								$('#userAboRadio'+j+'-'+y+'-'+h).removeAttr('title');
							}
						}
						
					}
				}
			}
		});
	}
}

//Grey radios
function greyRadios(a, b, c) {
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=checkCart",
		success: function(returnValue) {
			
			//Eval du contenu
			var result = eval('('+returnValue+')');
			//Vérification
			if (result.aboDiff != 0) {
				
				for (var n = 0; n < result.aboDiff; n++) {
				
					var j = eval(n+1);
					var h = result.abonnements[n].aboTypeId;
				
					//On boucle en fonction du nombre d'abonnements par article
					for (var i = 0; i < result.abonnements[n].nbreAbo; i++) {
					
						var y = eval(i+1);
						
						//Si le radio n'est pas celui sélectionné on grise les autres
						if ((a != j || b != y) && (c == h)) {
							$('#userAboRadio'+j+'-'+y+'-'+h).attr('disabled', 'disabled');
						}
						else {
							$('#userAboRadio'+j+'-'+y+'-'+h).attr('title', 'abonnement');
						}
					}
					
				}
			}
		}
	});
}

//Function listAddresses
function listAddresses(y, z) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=listAddresses",
		success: function(addresses) {
			//Eval du contenu
			var list = eval('('+addresses+')');
			
			//On boucle si il y a au moins une adresse
			if (list.length != 0) {
				//Création du select
				if (y == 0 && z == 0) {
					var select = '<select name="addressesSelect" id="addressesSelect" style="width: 250px;">';
				}
				else {
					var select = '<select name="addressesSelect'+y+'-'+z+'" id="addressesSelect'+y+'-'+z+'" style="width: 250px;">';
				}
				//Boucle
				for (var i = 0; i < list.length ; i++ ) {
					select = select + '<option value="'+list[i].id+'">'+list[i].firstName+' '+list[i].name+' - '+list[i].address1+', '+list[i].zipCode+' '+list[i].city+'</option>';
				}
				//Clôture du select
				select = select + '</select><br /><input type="button" value="Ajouter une adresse" onClick="displayAddressAdder('+y+', '+z+')" style="padding: 5px; border-color: #CC0056; border-radius: 5px; margin-top: 5px; margin-bottom: 5px; background-color: pink; font-size: 12px; font-weight: bold;" /><div id="addressAdder'+y+'-'+z+'" style="display: none; border: 1px solid #CCCCCC; padding: 5px; display: none; text-align: justify; margin-top: 5px;"><div id="errorField'+y+'-'+z+'" style="border: 1px solid #e45b00; padding: 5px; color: #e45b00; font-weight: bold; display: none; margin-bottom: 5px; text-align: center;">Merci de remplir tous les champs</div><table><tr><td><label for="civility'+y+'-'+z+'">Civilité : </label></td><td><select name="civility'+y+'-'+z+'" id="civility'+y+'-'+z+'"><option value="Monsieur">Monsieur</option><option value="Madame">Madame</option><option value="Mademoiselle">Mademoiselle</option></select></td></tr><tr><td><label for="firstName'+y+'-'+z+'">Prénom : </label></td><td><input type="text" name="firstName'+y+'-'+z+'" id="firstName'+y+'-'+z+'" /></td></tr><tr><td><label for="name'+y+'-'+z+'">Nom : </label></td><td><input type="text" name="name'+y+'-'+z+'" id="name'+y+'-'+z+'" /></td></tr><tr><td><label for="address1-'+y+'-'+z+'">Adresse 1 : </label></td><td><input type="text" name="address1-'+y+'-'+z+'" id="address1-'+y+'-'+z+'" /></td></tr><tr><td><label for="address2-'+y+'-'+z+'">Adresse 2 : </label></td><td><input type="text" name="address2-'+y+'-'+z+'" id="address2-'+y+'-'+z+'" /></td></tr><tr><td><label for="zipCode'+y+'-'+z+'">Code postal : </label></td><td><input type="text" name="zipCode'+y+'-'+z+'" id="zipCode'+y+'-'+z+'" /></td></tr><tr><td><label for="city'+y+'-'+z+'">Ville</label></td><td><input type="text" name="city'+y+'-'+z+'" id="city'+y+'-'+z+'" /></td></tr><tr><td><label for="country'+y+'-'+z+'">Pays : </label></td><td><span id="countrySelectSpan'+y+'-'+z+'"></span></td></tr><tr><td><label for="state'+y+'-'+z+'" style="display: none;" id="statesField'+y+'-'+z+'">État : </label></td><td><span id="stateSelectSpan'+y+'-'+z+'" style="display: none;"></span></td></tr></table><br /><input type="button" value="Annuler" onClick="hideAddressAdder('+y+', '+z+');" /> <input type="button" value="Enregistrer l\'adresse" onClick="recordNewAddress('+y+', '+z+');" /></div><br />';
			}
			else {
				var select = 'Vous n\'avez enregistré aucune adresse.<br /><input type="button" value="Ajouter une adresse" onClick="displayAddressAdder('+y+', '+z+')" style="padding: 5px; border-color: #CC0056; border-radius: 5px; margin-top: 5px; margin-bottom: 5px; background-color: pink; font-size: 12px; font-weight: bold;" /><div id="addressAdder'+y+'-'+z+'" style="display: none; border: 1px solid #CCCCCC; padding: 5px; display: none; text-align: justify; margin-top: 5px;"><div id="errorField'+y+'-'+z+'" style="border: 1px solid #e45b00; padding: 5px; color: #e45b00; font-weight: bold; display: none; margin-bottom: 5px; text-align: center;">Merci de remplir tous les champs</div><table><tr><td><label for="civility'+y+'-'+z+'">Civilité : </label></td><td><select name="civility'+y+'-'+z+'" id="civility'+y+'-'+z+'"><option value="Monsieur">Monsieur</option><option value="Madame">Madame</option><option value="Mademoiselle">Mademoiselle</option></select></td></tr><tr><td><label for="firstName'+y+'-'+z+'">Prénom : </label></td><td><input type="text" name="firstName'+y+'-'+z+'" id="firstName'+y+'-'+z+'" /></td></tr><tr><td><label for="name'+y+'-'+z+'">Nom : </label></td><td><input type="text" name="name'+y+'-'+z+'" id="name'+y+'-'+z+'" /></td></tr><tr><td><label for="address1-'+y+'-'+z+'">Adresse 1 : </label></td><td><input type="text" name="address1-'+y+'-'+z+'" id="address1-'+y+'-'+z+'" /></td></tr><tr><td><label for="address2-'+y+'-'+z+'">Adresse 2 : </label></td><td><input type="text" name="address2-'+y+'-'+z+'" id="address2-'+y+'-'+z+'" /></td></tr><tr><td><label for="zipCode'+y+'-'+z+'">Code postal : </label></td><td><input type="text" name="zipCode'+y+'-'+z+'" id="zipCode'+y+'-'+z+'" /></td></tr><tr><td><label for="city'+y+'-'+z+'">Ville</label></td><td><input type="text" name="city'+y+'-'+z+'" id="city'+y+'-'+z+'" /></td></tr><tr><td><label for="country'+y+'-'+z+'">Pays : </label></td><td><span id="countrySelectSpan'+y+'-'+z+'"></span></td></tr><tr><td><label for="state'+y+'-'+z+'" style="display: none;" id="statesField'+y+'-'+z+'">État : </label></td><td><span id="stateSelectSpan'+y+'-'+z+'" style="display: none;"></span></td></tr></table><br /><input type="button" value="Annuler" onClick="hideAddressAdder('+y+', '+z+');" /> <input type="button" value="Enregistrer l\'adresse" onClick="recordNewAddress('+y+', '+z+');" /></div><br />'
			}
			
			//Transmission HTML
			if (y == 0 && z == 0) {
				//Affichage final
				$('#addresses').html(select);
			}
			else {
				$('#addresses'+y+'-'+z).html(select);
			}
			
			//Chargement du select pays
			loadCountrySelect(y, z);
			loadStateSelect(y, z);
		}
	});
}

//loadCountrySelect
function loadCountrySelect(y, z) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=listCountries",
		success: function(addresses) {
			//Eval du contenu
			var list = eval('('+addresses+')');
			
			//Création du select
			if (y == 0 && z == 0) {
				var select = '<select name="countrySelect" id="countrySelect" style="width: 142px; border: 1px solid #AFC1CD; color: #5E7990; padding: 2px;">';
			}
			else {
				var select = '<select name="countrySelect'+y+'-'+z+'" id="countrySelect'+y+'-'+z+'" style="width: 142px; border: 1px solid #AFC1CD; color: #5E7990; padding: 2px;">';
			}
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				if (list[i].id == 172) {
					select = select + '<option value="'+list[i].id+'" onClick="showFormStates('+y+', '+z+')">'+list[i].name+'</option>';
				}
				else {
					select = select + '<option value="'+list[i].id+'" onClick="hideFormStates('+y+', '+z+')">'+list[i].name+'</option>';
				}
			}
			//Clôture du select
			select = select + '</select>';
		
			//Transmission du select dans le formulaire
			$('#countrySelectSpan'+y+'-'+z).html(select);
		}
	});
}

//loadCountrySelect
function loadStateSelect(y, z) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=listStates",
		success: function(addresses) {
			//Eval du contenu
			var list = eval('('+addresses+')');
			
			//Création du select
			if (y == 0 && z == 0) {
				var select = '<select name="stateSelect" id="stateSelect" style="width: 142px; border: 1px solid #AFC1CD; color: #5E7990; padding: 2px;">';
			}
			else {
				var select = '<select name="stateSelect'+y+'-'+z+'" id="staterySelect'+y+'-'+z+'" style="width: 142px; border: 1px solid #AFC1CD; color: #5E7990; padding: 2px;">';
			}
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				select = select + '<option value="'+list[i].id+'">'+list[i].name+'</option>';
			}
			//Clôture du select
			select = select + '</select>';
		
			//Transmission du select dans le formulaire
			$('#stateSelectSpan'+y+'-'+z).html(select);
		}
	});
}

//showFormStates
function showFormStates(y, z) {
	//CSS
	$('#statesField'+y+'-'+z).css('display', 'block');
	$('#stateSelectSpan'+y+'-'+z).css('display', 'block');
}

//hideFormStates
function hideFormStates(y, z) {
	//CSS
	$('#statesField'+y+'-'+z).css('display', 'none');
	$('#stateSelectSpan'+y+'-'+z).css('display', 'none');
}

//recordNewAddress
function recordNewAddress(y, z) {
	//Récupération des variables
	var civility = $('#civility'+y+'-'+z).val();
	var name = $('#name'+y+'-'+z).val();
	var firstName = $('#firstName'+y+'-'+z).val();
	var email = $('#email'+y+'-'+z).val();
	var address1 = $('#address1-'+y+'-'+z).val();
	var address2 = $('#address2-'+y+'-'+z).val();
	var zipCode = $('#zipCode'+y+'-'+z).val();
	var city = $('#city'+y+'-'+z).val();
	var country = $('#country'+y+'-'+z).val();
	var state = $('#state'+y+'-'+z).val();
	
	//Vérification des champs de texte de l'adresse
	checkField('name', name, y, z);
	checkField('firstName', firstName, y, z);
	checkField('email', email, y, z);
	checkField('address1-', address1, y, z);
	checkField('zipCode', zipCode, y, z);
	checkField('city', city, y, z);
	
	//On n'éxécute la requête que lorsque les champs sont valides
	if (name != '' && firstName != '' && email != '' && address1 != '' && zipCode != '' && city != '') {
		//On cache le message d'erreur eventuel
		$('#errorField'+y+'-'+z).css('display', 'none');
		//Traitement Ajax
		$.ajax({
			//ajaxStart: load(),
			type: "GET",
			url: "userActions.php",
			data: "formName=addUserAddress&civility="+civility+"&name="+name+"&firstName="+firstName+"&email="+email+"&address1="+address1+"&address2="+address2+"&zipCode="+zipCode+"&city="+city+"&country="+country+"&state="+state,
			success: function() {
				//alert("formName=addUserAddress&civility="+civility+"&name="+name+"&firstName="+firstName+"&email="+email+"&address1="+address1+"&address2="+address2+"&zipCode="+zipCode+"&city="+city+"&country="+country);
				listAddresses(y, z);
			}
		});
	}
	else {
		//Création du message d'erreur
		var message = '<div id="errorField'+y+'-'+z+'" style="border: 1px solid orange; padding: 10px; color: orange; font-weight: bold; display: none;">Merci de remplir tous les champs</div>';
		//Transmission / Affichage
		$('#errorField'+y+'-'+z).css('display', 'block');
		$('#errorField'+y+'-'+z).html();
	}
}

//function checkFields
function checkField(fieldName, value, y, z) {
	if (value == '') {
		$('#'+fieldName+y+'-'+z).css('border-color', 'red');
	}
	else {
		$('#'+fieldName+y+'-'+z).css('border-color', '#AFC1CD');
	}
}

//displayAddressAdder
function displayAddressAdder(y, z) {
	$('#addressAdder'+y+'-'+z).css('display', 'block');
}

//hideAddressAdder
function hideAddressAdder(y, z) {
	$('#addressAdder'+y+'-'+z).css('display', 'none');
}

//Function listDeliveries
function listDeliveries() {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=listDeliveries",
		success: function(deliveries) {
			//Eval du contenu
			var list = eval('('+deliveries+')');
			
			//Création du select
			var select = '<select name="deliveriesSelect" id="deliveriesSelect" style="width: 250px;">';
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				select = select + '<option value="'+list[i].id+'">'+list[i].name+' - '+list[i].tarif+'€</option>';
			}
			//Clôture du select
			select = select + '</select>';
			
			//Affichage final
			$('#deliveries').html(select);
		}
	});
}

//recordAbo
function recordAbo() {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=checkCart",
		success: function(returnValue) {
			//Eval du contenu
			var result = eval('('+returnValue+')');
			
			//Vérification
			if (result.aboDiff != 0) {
				//Création de la variable content
				var content = '<h3>Merci de compléter les informations concernant le ou les abonnements de votre commande :</h3><br />';
				for (var n = 0; n < result.aboDiff; n++) {
				
					var j = eval(n+1);
				
					//On boucle en fonction du nombre d'abonnements par article
					for (var i = 0; i < result.abonnements[n].nbreAbo; i++) {
					
						//aboFreq
						var aboFreq = result.abonnements[n].aboFreq;
					
						var y = eval(i+1);
						
						
						
						//On regarde le type d'abonnement
						var aboType = $('#aboType'+j+'-'+y).val();
						var aboTypeId = result.abonnements[n].aboTypeId;
						var itemId = result.abonnements[n].itemId;
						
						//Action en fonction du type d'abonnement
						if (aboType == 'reabo') {
							//recordReabo
							recordReabo(aboFreq, aboTypeId);
						}
						else if (aboType == 'newAbo') {
							//On récupère l'adresse de livraison
							var addressId = $('#addressesSelect'+j+'-'+y).val();
							
							//on regarde le numéro de départ
							if ($('#selectActualMag'+j+'-'+y).is(':checked')) {
								var startMag = 'actual';
							}
							else {
								var startMag = 'next';
							}
							
							//recordNewAbo
							recordNewAbo(addressId, startMag, aboFreq, aboTypeId);
						}
						else if (aboType == 'friendabo') {
							//On récupère les variables
							var civility = $('#civility'+j+'-'+y).val();
							var name = $('#name'+j+'-'+y).val();
							var firstName = $('#firstName'+j+'-'+y).val();
							var email = $('#email'+j+'-'+y).val();
							var address1 = $('#address1-'+j+'-'+y).val();
							var address2 = $('#address2-'+j+'-'+y).val();
							var zipCode = $('#zipCode'+j+'-'+y).val();
							var city = $('#city'+j+'-'+y).val();
							var country = $('#country'+j+'-'+y).val();
							var state = $('#state'+j+'-'+y).val();
							
							//recordFriendAbo();
							recordFriendAbo(civility, name, firstName, email, address1, address2, zipCode, city, country, state, itemId);
						}
						
					}
					
				}
			}
			//Passage à l'étape suivante :
			order(3);
		}
	});
}

//recordNewAbo
function recordNewAbo(addressId, startMag, aboFreq, aboTypeId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=aboUser&aboFreq="+aboFreq+"&startMag="+startMag+"&addressId="+addressId+"&aboTypeId="+aboTypeId,
		success: function() {}
	});
}

//recordFriendAbo
function recordFriendAbo(civility, name, firstName, email, address1, address2, zipCode, city, country, state, itemId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=aboFriend&civility="+civility+"&name="+name+"&firstName="+firstName+"&email="+email+"&address1="+address1+"&address2="+address2+"&zipCode="+zipCode+"&city="+city+"&country="+country+"&state="+state+"&itemId="+itemId,
		success: function() {
			order(3);
		}
	});
}

//recordReabo
function recordReabo(aboFreq, aboTypeId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "orderActions.php",
		data: "formName=reaboUser&aboFreq="+aboFreq+"&aboTypeId="+aboTypeId,
		success: function() {}
	});
}

//userReabo
function userReabo(y, z, limit) {
	//Création contenu
	var content = '<input type="hidden" name="aboType'+y+'-'+z+'" id="aboType'+y+'-'+z+'" value="reabo" />Votre abonnement sera prolongé jusqu\'au mag n°<strong>'+limit+'</strong><br />';
	//CSS
	$('#aboField'+y+'-'+z).css('display', 'block');
	//Transmission html
	$('#aboField'+y+'-'+z).html(content);
}

//userAbo
function userAbo(y, z, actualMag) {
	//nextMag
	var nextMag = eval(actualMag+1);
	
	//Création contenu
	var content = '<input type="hidden" name="aboType'+y+'-'+z+'" id="aboType'+y+'-'+z+'" value="newAbo" /><strong>Adresse de destination : </strong><br /><span id="addresses'+y+'-'+z+'"></span><br /><br /><strong>Quand voulez-vous commencer l\'abonnement ?</strong><br />- <input type="radio" name="startMag'+y+'-'+z+'" id="selectActualMag'+y+'-'+z+'" checked /> n°'+actualMag+' (Magazine actuel)<br />- <input type="radio" name="startMag'+y+'-'+z+'" id="selectNextMag'+y+'-'+z+'" /> n°'+nextMag+' (Prochain magazine)<br />';
	//listage adresses
	listAddresses(y, z);
	//CSS
	$('#aboField'+y+'-'+z).css('display', 'block');
	//Transmission html
	$('#aboField'+y+'-'+z).html(content);
}

//friendAbo
function friendAbo(y,z) {
	//Création contenu avec formulaire
	var content = '<input type="hidden" name="aboType'+y+'-'+z+'" id="aboType'+y+'-'+z+'" value="friendabo" /><strong>Veuillez indiquer ses coordonnées :</strong><br /><br /><table><tr><td><label for="civility'+y+'-'+z+'">Civilité : </label></td><td><select name="civility'+y+'-'+z+'" id="civility'+y+'-'+z+'"><option value="Monsieur">Monsieur</option><option value="Madame">Madame</option><option value="Mademoiselle">Mademoiselle</option></select></td></tr><tr><td><label for="firstName'+y+'-'+z+'">Prénom : </label></td><td><input type="text" name="firstName'+y+'-'+z+'" id="firstName'+y+'-'+z+'" /></td></tr><tr><td><label for="name'+y+'-'+z+'">Nom : </label></td><td><input type="text" name="name'+y+'-'+z+'" id="name'+y+'-'+z+'" /></td></tr><tr><td><label for="email'+y+'-'+z+'">Adresse email : </label></td><td><input type="text" name="email'+y+'-'+z+'" id="email'+y+'-'+z+'" /></td></tr><tr><td><label for="address1-'+y+'-'+z+'">Adresse 1 : </label></td><td><input type="text" name="address1-'+y+'-'+z+'" id="address1-'+y+'-'+z+'" /></td></tr><tr><td><label for="address2-'+y+'-'+z+'">Adresse 2 : </label></td><td><input type="text" name="address2-'+y+'-'+z+'" id="address2-'+y+'-'+z+'" /></td></tr><tr><td><label for="zipCode'+y+'-'+z+'">Code postal : </label></td><td><input type="text" name="zipCode'+y+'-'+z+'" id="zipCode'+y+'-'+z+'" /></td></tr><tr><td><label for="city'+y+'-'+z+'">Ville</label></td><td><input type="text" name="city'+y+'-'+z+'" id="city'+y+'-'+z+'" /></td></tr><tr><td><label for="country'+y+'-'+z+'">Pays : </label></td><td><span id="countrySelectSpan'+y+'-'+z+'"></span></td></tr><tr><td><label for="state'+y+'-'+z+'" style="display: none;" id="statesField'+y+'-'+z+'">État : </label></td><td><span id="stateSelectSpan'+y+'-'+z+'" style="display: none;"></span></td></tr></table>';
	//CSS
	$('#aboField'+y+'-'+z).css('display', 'block');
	//Transmission html
	$('#aboField'+y+'-'+z).html(content);
	//Affichage du select des pays et des etats
	loadCountrySelect(y, z);
	loadStateSelect(y, z);
}

//getUserName
function displayUserName(i) {
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=getUserName",
		success: function(result) {
			//Eval du contenu
			var userName = eval('('+result+')');
			//Insertion dans les espaces prévus pour ça
			$('#userNameSpan'+i).html(userName);
		}
	});
}

//displayChangeNameForm
function displayChangeNameForm(i, places) {
	//creation variable
	var resaForm = '<input type="hidden" name="visibleResaFields'+i+'" id="visibleResaFields'+i+'" value="0" />';
	//Boucle
	for (var y = 0; y < places; y++) {
		//Calcul numéro
		var z = eval(y+1);
		//On affiche ou non ?
		if (z == 1) {
			var resaDiv = '<div id="resaField'+z+'-'+i+'">';
			var select = '<tr><td><label for="seatsNumber'+z+'-'+i+'">Nombre de places : </td><td><span id="seatsNumberSpan'+z+'-'+i+'"></span></td></tr>';
		}
		else {
			var resaDiv = '<div id="resaField'+z+'-'+i+'" style="display: none;">';
			var select = '<input type="hidden" name="seatsNumber'+z+'-'+i+'" id="seatsNumber'+z+'-'+i+'" value="1" />';
		}
		//Création formulaire
		resaForm = resaForm+resaDiv+'<strong>Réservation n°'+z+'</strong><br /><br ><table><tr><td><label for="firstName'+z+'-'+i+'">Prénom : </label></td><td><input type="text" name="firstName'+z+'-'+i+'" id="firstName'+z+'-'+i+'" /></td></tr><tr><td><label for="name'+z+'-'+i+'">Nom : </label></td><td><input type="text" name="name'+z+'-'+i+'" id="name'+z+'-'+i+'" /></td></tr><tr><td><label for="email'+z+'-'+i+'">Adresse email : </label></td><td><input type="text" name="email'+z+'-'+i+'" id="email'+z+'-'+i+'" /></td></tr>'+select+'</table><br /></div>';
	}
	//Transmission de l'affichage
	$('#changeReservationName'+i).css('display','block');
	$('#changeReservationName'+i).html(resaForm);
	
	//Affichage des select seatsNumber
	displaySeatsNumber(i, places);
}

//displaySeatsNumber
function displaySeatsNumber(i, places) {
	//limit select
	var limit = places;
	//Boucle d'affichage
	for (var y = 0; y < places; y++) {
		//Calcul numéro
		var z = eval(y+1);
		//Création du select
		var select = '<select name="seatsNumber'+z+'-'+i+'" id="seatsNumber'+z+'-'+i+'" onChange="updateResaFields('+z+', '+i+', '+places+')">';
		
		//Boucle du select
		for (var h = 0; h < limit; h++) {
			//Evals
			var k = eval(h+1);
			
			//select++
			if (k == places) {
				select = select + '<option value="'+k+'" selected>'+k+'</option>';
			}
			else {
				select = select + '<option value="'+k+'">'+k+'</option>';
			}
		}
		
		//Fin select
		select = select + '</select>';
		
		//Display
		$('#seatsNumberSpan'+z+'-'+i).html(select);
		
		//update visibleResaFields'+z+'-'+i+'
		var origin = 1;
		$('#visibleResaFields'+i).val(origin);
		
		//limit--
		limit--;
	}
}

//updateResaFields
function updateResaFields(z, i, places) {
	//save
	var zz = z;
	//Valeur du select
	var value = $('#seatsNumber'+z+'-'+i).val();
	//Diff
	var diff = eval(places-value);
	
	//Boucle d'affichage du nombre de places restantes
	for (var o = 0; o < diff; o++) {
		//Eval upgrade
		z++
		//CSS
		$('#resaField'+z+'-'+i).css('display', 'block');
	}
	
	//o++
	o++
	//update
	$('#visibleResaFields'+i).val(o);
	
	//On regarde si il n'y a pas de div affichés alors qu'ils ne le devraient pas
	var newDiff = eval(places-z);
	
	//Vérif
	if (newDiff != 0) {
		//New var
		var upperDiff = places;
		//Boucle
		for (var f = 0; f < newDiff; f++) {
			//CSS
			$('#resaField'+upperDiff+'-'+i).css('display', 'none');
			//--
			upperDiff--;
		}
	}
}

//hideResaForm
function hideResaForm(i) {
	//CSS
	$('#changeReservationName'+i).css('display','none');
}

//checkReservations
function checkReservations() {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=checkCart",
		success: function(returnValue) {
			//Eval du contenu
			var result = eval('('+returnValue+')');
			//Boucle de vérification
			for (var i = 0; i < result.eventQty ; i++ ) {
				
				//keepName
				if ($('#keepName'+i).is(':checked')) {
					var keepName = 'on';
				}
				else {
					var keepName = 'off';
				}
				
				//itemId & nbre de places
				var itemId = result.reservations[i].EventId;
				var seats = result.reservations[i].nbrePlace;
				
				//Vérification l'utilisateur reserve-t-il les places à son nom ?
				if (keepName == 'on') {
					//Inscription de l'utilisateur directement en base réservations
					recordUserReservation(itemId,'loggedUser',0,0,0,seats);
				}
				else {
					//On regarde le nombre de resaFields affichés
					var visibles = $('#visibleResaFields'+i).val();
					
					//Boucle pour faire une inscription par place de l'événement
					for (var y = 0; y < visibles; y++) {
						//Calcul numéro
						var z = eval(y+1);
						//Récupération des variables du formulaire
						var firstName = $('#firstName'+z+'-'+i).val();
						var name = $('#name'+z+'-'+i).val();
						var email = $('#email'+z+'-'+i).val();
						var seatsNumber = $('#seatsNumber'+z+'-'+i).val();
						//Inscription de l'invité en base réservations
						recordUserReservation(itemId,'invitedUser',firstName,name,email,seatsNumber);
					}
				}
			}
			//Poursuite commande
			order(4);
		}
	});
}

//recordUserReservation
function recordUserReservation(itemId,userType,firstName,name,email,seats) {
	//Action en fonction de l'userType
	if (userType == 'loggedUser') {
		//Traitement Ajax
		$.ajax({
			//ajaxStart: load(),
			type: "POST",
			url: "orderActions.php",
			data: "formName=loggedUserReservation&itemId="+itemId+"&seats="+seats,
		});
	}
	else {
		//Traitement Ajax
		$.ajax({
			//ajaxStart: load(),
			type: "POST",
			url: "orderActions.php",
			data: "formName=invitedUserReservation&itemId="+itemId+"&seats="+seats+"&firstName="+firstName+"&name="+name+"&email="+email,
		});
	}
}