//findOrderUser
function findOrderUser() {
	//Autocomplete
	$("#userName").autocomplete({
		source: "ajaxActions.php?formName=listSubscribers&limit=5",
		minLength: 2,
		select: function(event, ui) {
			//Création variable
			var userName = '<span style="text-transform: uppercase;">'+ui.item.nom+'</span> '+ui.item.prenom+' ('+ui.item.id+')';
			//Transmission
			$('#orderUserId').val(ui.item.id);
			$('#userNameDisplay').html('<strong>'+userName+'</strong> (<a onClick="resetUserField();">changer</a>)');
			//Display de la barre d'adresses de l'utilisateur en fonction du boxCount
			var box = $('#boxesCount').val();
			//boucle
			for (var i = 1; i <= box ; i++ ) {
				listUserAddresses(ui.item.id, i);
			}
			//Show sublit button
			$('#submitField').removeClass('hidden');
		}
	}).data('autocomplete')._renderItem = function(ul, item) {
		return $('<li style="background-color: #FFFFFF; width: 155px; list-style: none; border-bottom: 1px solid red;"></li>')
		.data( "item.autocomplete", item )
		.append( "<a style='font-size: 13px;'><div style='width: 155px; float: left; background-color: #FFFFFF; padding: 5px; border-left: 1px solid #536482; border-right: 1px solid #536482;'>"+item.nom+" "+item.prenom+" ("+item.id+")</div></a>" )
		.appendTo( ul );
	};
}

//resetUserField
function resetUserField() {
	//New display
	$('#userNameDisplay').html('<input type="text" name="userName" id="userName" style="border: 0px; background-color: transparent; border-bottom: 2px solid #536482;" onKeyUp="findOrderUser()" />');
	//Reset vars
	$('#orderUserId').val(0);
	//Reset address select en fonction du boxCount
	var box = $('#boxesCount').val();
	//boucle
	for (var i = 1; i <= box ; i++ ) {
		$('#userAddressSelect-'+i).html('<i>Veuillez sélectionner un utilisateur</i>');
	}
	//Hide submit button
	$('#submitField').addClass('hidden');
}

//updateQuantity
function updateQuantity(itemId, boxId) {
	//On récupère la nouvelle qty
	var newQty = $('#quantityFieldItem'+itemId+'-'+boxId).val();
	//On récupère l'ancienne quantité
	var oldQty = $('#item'+itemId+'Quantity-'+boxId).val();
	//Check amount
	if ((newQty >= 1) && (oldQty != newQty)) {
		//On récupère la valeur du produit
		var value = $('#item'+itemId+'Price-'+boxId).val();
		//On calcul l'ancienne somme
		var oldCost = value*oldQty;
		//On calcul la nouvelle somme
		var newCost = value*newQty;
		//On retire au total de la commande l'ancien montant et on ajoute le nouveau
		var actualValue = $('#orderValue').val();
		var boxValue = $('#boxValue-'+boxId).val();
		var tempValue = eval(actualValue-oldCost);
		var tempBoxValue = eval(boxValue-oldCost);
		var newValue = eval(tempValue)+eval(newCost);
		var newBoxValue = eval(tempBoxValue)+eval(newCost);
		//Transmission value
		$('#orderValue').val(newValue);
		$('#boxValue-'+boxId).val(newBoxValue);
		$('#orderValueSpan').html(newValue);
		$('#item'+itemId+'Quantity-'+boxId).val(newQty);
	}
	else if ((newQty == 0) && (newQty != '') && (oldQty != newQty)) {
		//On demande confirmation avant de supprimer l'objet
		$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Souhaitez-vous vraiment supprimer ce produit ?<br /><br /><input type="button" class="confirm simplemodal-close" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="cancel simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
			overlayClose: true,
			onShow: function () {
				//Click sur confirm
				$('.confirm').click(function () {
					//On supprime la ligne
					removeItemLine(itemId, boxId);
				});
				//Click sur annuler
				$('.cancel').click(function () {
					//On récupère l'ancienne quantité
					var oldQty = $('#item'+itemId+'Quantity-'+boxId).val();
					//On remet la valeur précédente
					$('#quantityFieldItem'+itemId+'-'+boxId).val(oldQty);
				});
			}
		});
	}
}

//displayMagList
function displayMagList(aboId, itemId, boxId) {
	//Traitement ajax, récupération des 3 derniers mag et du mag à venir	
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=displayMagList&aboId="+aboId,
		success: function(result) {
			//Eval du contenu
			var mag = eval('('+result+')');
			
			//Select
			var select = '<select name="item'+itemId+'Select-'+boxId+'" id="item'+itemId+'-abo'+aboId+'-'+boxId+'">';
			
			//Boucle
			for (var i = 0; i < mag.length; i++) {
				if (mag[i].numero > 0) {
					//Remplissage select avec verif
					if (mag[i].last == 1) {
						select = select + '<option selected="selected" value="'+mag[i].numero+'">'+mag[i].numero+'</option>';
					}
					else {
						select = select + '<option value="'+mag[i].numero+'">'+mag[i].numero+'</option>';
					}
				}
			}
			
			//Clôture select
			select = select + '</select>';
			
			//Transmission
			$('#magList'+itemId+'-'+boxId).html(select);
		}
	});
}

//displayGiftAddress
function displayGiftAddress(itemId, boxId) {
	//Vérif
	if ($('#giftAddress'+itemId+'-'+boxId).hasClass('hidden')) {
		//On affiche les champs d'adresse
		$('#giftAddress'+itemId+'-'+boxId).removeClass('hidden');
	}
	else {
		//On cache les champs d'adresse
		$('#giftAddress'+itemId+'-'+boxId).addClass('hidden');
	}
}

//listOrderItems
function listOrderItems(boxId) {
	//Autocomplete
	$("#productsField-"+boxId).autocomplete({
		source: "ajaxActions.php?formName=listItems&limit=5",
		minLength: 2,
		select: function(event, ui) {
			//Création du contenu
			var content = '<tr id="itemLine'+ui.item.id+'-'+boxId+'"><td style="width: 280px; line-height: 175%;">';
			//Abo ? Event ?
			if (ui.item.abo != 0) {
				//On affiche la mention abonnement
				content = content + '<strong>Abonnement</strong> - '+ui.item.title+'<br />Magazine de départ : <span id="magList'+ui.item.id+'-'+boxId+'"></span><br /><input type="checkbox" style="margin-right: 2px; cursor: pointer;" name="receivedMagItem'+ui.item.id+'-'+boxId+'" id="receivedMagItem'+ui.item.id+'-'+boxId+'" /> <i>Cocher si mag déjà reçu</i><br /><input type="checkbox" style="margin-right: 2px; cursor: pointer;" name="isGiftItem'+ui.item.id+'-'+boxId+'" id="isGiftItem'+ui.item.id+'-'+boxId+'" onClick="displayGiftAddress('+ui.item.id+', '+boxId+');" /> <i>Cocher si c\'est un cadeau</i><div id="giftAddress'+ui.item.id+'-'+boxId+'" class="hidden"><table style="margin-top: 10px; font-size: 12px; width: 245px;"><tr><td style="text-align: right;"><strong>Adresse du</strong></td><td><strong>bénéficiaire : </strong></td></tr><tr><td>Adresse email</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-email"/></td></tr><tr><td>Prénom</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-firstName"/></td></tr><tr><td>Nom</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-name"/></td></tr><tr><td>Adresse 1</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-address1"/></td></tr><tr><td>Adresse 2</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-address2"/></td></tr><tr><td>Adresse 3</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-address3"/></td></tr><tr><td>Code postale</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-zipCode"/></td></tr><tr><td>Ville</td><td><input type="text" name="giftAddress'+ui.item.id+'-'+boxId+'-city"/></td></tr></table></div>';
			}
			else if (ui.item.event != 0) {
				content = content + '<strong>Événement</strong> - ' + ui.item.title;
			}
			else {
				content = content + '<strong>Produit</strong> - ' + ui.item.title;
			}
			//Clôture
			content = content + '</td><td><strong>'+ui.item.prix+' €</strong></td><td>x <input type="text" value="1" style="width: 10px;" onKeyUp="updateQuantity('+ui.item.id+', '+boxId+')" id="quantityFieldItem'+ui.item.id+'-'+boxId+'" /></td><td><a onClick="removeItemLine('+ui.item.id+', '+boxId+')"><img src="images/icons/bin_closed.png" title="Retirer l\'objet" style="margin-bottom: -5px;" /></a></td><input type="hidden" name="itemId-'+boxId+'[]" value="'+ui.item.id+'" /><input type="hidden" name="item'+ui.item.id+'Quantity-'+boxId+'" id="item'+ui.item.id+'Quantity-'+boxId+'" value="1" /><input type="hidden" name="item'+ui.item.id+'Price-'+boxId+'" id="item'+ui.item.id+'Price-'+boxId+'" value="'+ui.item.prix+'" /><input type="hidden" name="item'+ui.item.id+'Abo-'+boxId+'" id="item'+ui.item.id+'Abo-'+boxId+'" value="'+ui.item.abo+'" /><input type="hidden" name="item'+ui.item.id+'Event-'+boxId+'" id="item'+ui.item.id+'Event-'+boxId+'" value="'+ui.item.event+'" /></tr>';
			//Transmission
			$('#productsList-'+boxId).append(content);
			//Update du prix de la commande
			var actualValue = $('#orderValue').val();
			var newValue = eval(actualValue)+eval(ui.item.prix);
			var boxValue = $('#boxValue-'+boxId).val();
			var newBoxValue = eval(boxValue)+eval(ui.item.prix);
			//Transmission values
			$('#orderValue').val(newValue);
			$('#orderValueSpan').html(newValue);
			$('#boxValue-'+boxId).val(newBoxValue);
			//Affichage du mag de départ
			if (ui.item.abo != 0) {
				displayMagList(ui.item.idProduit, ui.item.id, boxId);
			}
		}
	}).data('autocomplete')._renderItem = function(ul, item) {
		return $('<li style="background-color: #FFFFFF; width: 155px; list-style: none; border-bottom: 1px solid red;"></li>')
		.data( "item.autocomplete", item )
		.append( "<a style='font-size: 13px;'><div style='width: 146px; float: left; background-color: #FFFFFF; padding: 5px; border-left: 1px solid #536482; border-right: 1px solid #536482;'>"+item.title+"</div></a>" )
		.appendTo( ul );
	};
}

//removeItemLine
function removeItemLine(itemId, boxId) {
	//On récupère le prix unitaire et la quantité
	var price = $('#item'+itemId+'Price-'+boxId).val();
	var quantity = $('#item'+itemId+'Quantity-'+boxId).val();
	//On multiplie les deux variables
	var cost = price*quantity;
	//On retranche la somme à la commande & ) boxValue
	var actualValue = $('#orderValue').val();
	var newValue = eval(actualValue)-eval(cost);
	var boxValue = $('#boxValue-'+boxId).val();
	var newBoxValue = eval(boxValue)-eval(cost);
	//Transmission value
	$('#orderValue').val(newValue);
	$('#orderValueSpan').html(newValue);
	$('#boxValue-'+boxId).val(newBoxValue);
	//Supppression de la ligne
	$('#itemLine'+itemId+'-'+boxId).remove();
}

//displayOrderUserAddresses
function listUserAddresses(userId, target) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listUserAddresses&userId="+userId,
		success: function(result) {
			//Eval du contenu
			var address = eval('('+result+')');
			
			//Création select addresses
			var select = '<select name="userAddress-'+target+'" id="userAddress-'+target+'">';
			
			//Boucle
			for (var i = 0; i < address.length ; i++ ){
				//Boucle select
				select = select + '<option value="'+address[i].id+'">'+address[i].firstName+' '+address[i].name+' - '+address[i].address1+', '+address[i].zipCode+' '+address[i].city+'</option>';
			}
			
			//Clôture
			select = select + '</select>';
			
			//Transmission en fonction du nombre de boxes affichées et de la target
			$('#userAddressSelect-'+target).html(select);
		},
	});
}

//addDeliveryBox
function addDeliveryBox() {
	//On récupère le nombre de boxes de base
	var box = $('#boxesCount').val();
	var newBoxCount = eval(box)+eval(1);
	//Création newBox
	var newBox = '<table id="deliveryBox-'+newBoxCount+'" cellspacing="1" style="width: 800px; margin-bottom: 10px;"><thead><tr><th style="width:400px;"><strong>Contenu de la commande</strong></th><th><strong>Adresse de livraison</strong><a onClick="removeDeliveryBox('+newBoxCount+');" style="float: right;"><img src="images/icons/delete.png" alt="Supprimer cette adresse de livraison" title="Supprimer cette adresse de livraison" style="margin-bottom: -4px;" /></a></th></tr></thead><tbody><tr class="row1"><td style="padding: 10px;"><strong>Ajouter un produit :</strong> <input type="text" name="productsField-'+newBoxCount+'" id="productsField-'+newBoxCount+'" onKeyUp="listOrderItems('+newBoxCount+');" /><br /><br /><table><span id="productsList-'+newBoxCount+'"></span></table></td><td>Adresse de livraison : <span id="userAddressSelect-'+newBoxCount+'"><i>Veuillez sélectionner un utilisateur</i></span></td></tr></tbody><input type="hidden" name="boxValue-'+newBoxCount+'" id="boxValue-'+newBoxCount+'" value="0" /></table>';
	
	//Transmission newBox
	$('#otherAddressesSpan').append(newBox);
	
	//Affichage des adresses de l'utilisateur
	var userId = $('#orderUserId').val();
	//Vérif
	if (userId != 0) {
		listUserAddresses(userId, newBoxCount);
	}
	
	//Update du boxes
	$('#boxesCount').val(newBoxCount);
}

//removeDeliveryBox
function removeDeliveryBox(boxId) {
	//On récupère la valeur de la box
	var actualValue = $('#orderValue').val();
	var boxValue = $('#boxValue-'+boxId).val();
	var newValue = eval(actualValue)-eval(boxValue);
	//Transmission value
	$('#orderValue').val(newValue);
	$('#orderValueSpan').html(newValue);
	//Supppression de la ligne
	$('#deliveryBox-'+boxId).remove();
}