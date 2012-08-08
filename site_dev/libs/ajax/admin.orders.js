//setOrderAsSent
function setOrderAsSent(orderId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />La commande sera enregistrée comme envoyée. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Valider envoi" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=setOrderAsSent&orderId="+orderId,
					success: function(result) {
						//Reload page
						location.reload();
						//alert(result);
					},
				});
			});
		}
	});
}

//setOrderAsPaid
function setOrderAsPaid(orderId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 340px; height: 190px; text-align: center; padding: 10px;"><strong style="font-size: 15px;">Attention</strong><br /><br />La commande sera enregistrée comme payée. Merci de remplir les champs requis.<br /><br />Moyen de paiement : <span id="paymentTypeSpan"></span><br /><br />N° de transaction : <input type="text"name="transactionNumber" id="transactionNumber" style="text-align: center;" /><br /></br><input type="button" class="confirm" value="Valider paiement" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Listage des moyens de paiement
			listPaymentTypes();
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Récupération du moyen de paiement + n° de transaction
				var paymentType = $('#paymentType').val();
				var transactionNumber = $('#transactionNumber').val();
				//Query Ajax
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=setOrderAsPaid&orderId="+orderId+"&paymentType="+paymentType+"&transactionNumber="+transactionNumber,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//listPaymentTypes
function listPaymentTypes() {
	//Ajax
	$.ajax({
		type: "POST",
		url: "orderActions.php",
		data: "formName=listPaymentTypes",
		success: function(result) {
			//Eval du contenu
			var type = eval('('+result+')');
			//Création select
			var select = '<select name="paymentType" id="paymentType">';
			//Boucle
			for (var i = 0; i < type.length; i++) {
				select = select + '<option value="'+type[i].id+'">'+type[i].name+'</option>';
			}
			//Fermeture select
			select = select + '</select>';
			//Transmission
			$('#paymentTypeSpan').html(select);
		},
	});
}

//recallForOrder
function recallForOrder(orderId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Un email de rappel va être envoyé. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Envoyer email" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=recallForOrder&orderId="+orderId,
					success: function(result) {
						//Reload page
						location.reload();
						//alert(result);
					},
				});
			});
		}
	});
}

//refundOrder
function refundOrder(orderId, value) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 160px; text-align: center; padding: 10px;"><strong style="font-size: 15px;">Attention</strong><br /><br />La commande sera considérée comme remboursée. (<strong>Montant : '+value+' €</strong>)<br /><br />Montant remboursé : <input type="text" id="refundValue" name="refundValue" style="width: 40px;" /> €<br /><br /><input type="button" class="confirm" value="Valider remboursement" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Récupération du montant remboursé
				var refundValue = $('#refundValue').val();
				//Query Ajax
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=refundOrder&orderId="+orderId+"&refundValue="+refundValue,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//preciseBill
function preciseBill(orderId) {
	//Traitement Ajax, on récupère les informations concernant la commande
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=getOrderDetails&orderId="+orderId,
		success: function(result) {
			//Eval du contenu
			var order = eval('('+result+')');
			
			//Petite boucle
			var content = '<strong>Facturation à :</strong><br /><br /><table><tr><td>Prénom</td><td><input type="text" name="firstName" id="firstName" value="'+order.user.prenom+'" /></td></tr><tr><td>Nom</td><td><input type="text" name=name" id="name" value="'+order.user.nom+'" /></td></tr></table><br /><br /><input type="button" class="confirm" value="Valider informations" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" />';
			//Transmission de la modal box
			$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 440px; height: 160px; text-align: center; padding: 10px;">'+content+'</div>').modal({
				overlayClose: true,
				onShow: function () {
				//Click sur confirm on transmet les variables
					$('.confirm').click(function () {
						//Récupération des variables
						var name = $('#name').val();
						var firstName = $('#firstName').val();
						//Redirection
						$(location).attr('href',"PDF/generateBill.php?orderId="+orderId+"&name="+name+"&firstName="+firstName);
					});
				}
			});
		},
	});
	/*$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong style="font-size: 15px;">Attention</strong><br /><br />La commande sera considérée comme remboursée.<br /></br><input type="button" class="confirm" value="Valider remboursement" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Récupération du moyen de paiement + n° de transaction
				var paymentType = $('#paymentType').val();
				var transactionNumber = $('#transactionNumber').val();
				//Query Ajax
				
			});
		}
	});*/
}