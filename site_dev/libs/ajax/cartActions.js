//Fonction de listage des produits du panier
function listCart(type) {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=listCart",
		success: function(cart) {
		
			//alert(cart);
			
			//Eval du contenu
			var item = eval('('+cart+')');
		
			//Var carDisplay
			var cartDisplay = '<table>';
			
			//Var emptyVerif
			var emptyVerif = 0;
			
			//alert('itemLength : '+item.length);
			
			for (var i = 0; i < item.length ; i++ ){
				cartDisplay = cartDisplay+'<tr><th style="font-weight: normal; text-align: left; width: 200px;">- '+item[i].item.title+'</th><th style="font-weight: bold; width: 24px; text-align: left;">x'+item[i].quantity+'</th><th><a onclick="removeFromCart('+item[i].itemId+','+type+')"><img src="images/icons/delete.png" alt="Remove" style="margin-bottom: -4px; cursor: pointer;" title="Réduire quantité de 1" /></a><a onclick="addToCart('+item[i].itemId+','+type+')"><img src="images/icons/add.png" alt="Add" style="margin-bottom: -4px; cursor: pointer;" title="Augmenter quantité de 1" /></a><a onclick="deleteFromCart('+item[i].itemId+','+type+')"><img src="images/icons/bin_empty.png" alt="Delete" style="margin-bottom: -3px; cursor: pointer;" title="Supprimer du panier" /></a></th></tr>';
				
				//On vérifie que le panier contient au moins un produit
				if (item[i].quantity != 0) {
					emptyVerif = emptyVerif+1;
				}
			}
			
			//on referme le tableau selon le type d'affichage voulu
			if (type == 0) {
				cartDisplay = cartDisplay+'</table><table style="margin-top: 8px; border-top: 1px dotted black; width: 290px;"><tr><th style="text-align: right;">Montant total : <span id="cartValue"></span> €</th></tr></table><table style="margin-top: 14px; width: 290px;"><tr><th style="text-align: right;"><a href="Panier">Voir mes achats  >></a></th></tr></table>';
			}
			else {
				cartDisplay = cartDisplay+'</table>';
			}
			
			//Affichage du panier
			if (emptyVerif == 0) {
				$('#panier').html('Votre panier est vide.');
			}
			else {
				$('#panier').html(cartDisplay);
			}
		}
	});
}

//Affichage de la valeur du panier
function displayValue() {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=displayValue",
		success: function(value) {
			$('#cartValue').html(value);
			
			//alert('displayValue : '+value);
		}
	});
}

//Ajout d'un produit
function addToCart(itemId,type) {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=addToCart&itemId="+itemId,
		success: function() {
			//Listage du panier
			listCart(type);
			//Affichage du montant total
			displayValue();
		}
	});
}

//Retrait d'un produit
function removeFromCart(itemId,type) {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=removeFromCart&itemId="+itemId,
		success: function(cart) {
			//Listage du panier
			listCart(type);
			//Affichage du montant total
			displayValue();
		}
	});
}

//suppression d'un produit du panier
function deleteFromCart(itemId,type) {
	//Traitement
	$.ajax({
		//ajaxStart: load(),
		type: "GET",
		url: "cartActions.php",
		data: "formName=deleteFromCart&itemId="+itemId,
		success: function(cart) {
			//Listage du panier
			listCart(type);
			//Affichage du montant total
			displayValue();
		}
	});
}

//getPromoCode
function getPromoCode() {
	var code = $('#promoCode').val();
	//Traitement
	$.ajax({
		type: "GET",
		url: "cartActions.php",
		data: "formName=checkPromoCode&code="+code,
		success: function(promo) {
			if (promo != 0) {
				var promoTable = '<table style="margin-top: 20px; width: 290px;"><tr><th style="text-align: right; font-weight: bold; color: green;">Réduction exclusive : -'+promo+' €</th></tr></table>';
				//Affichage de la promo
				$('#promoSpace').html(promoTable);
			}
			//On réinitialise le code
			$('#promoCode').val('');
			//Affichage du montant total
			displayValue();
		}
	});
}

//checkCartContent()
function checkCartContent() {
	//Traitement
	$.ajax({
		type: "GET",
		url: "cartActions.php",
		data: "formName=checkCartContent",
		success: function(result) {
			alert(result);
		}
	});
}