//Traitement Ajax
function displayDeliveries(actionType) {
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listDeliveries",
		success: function(deliveries) {
			//Eval du contenu
			var list = eval('('+deliveries+')');
			
			if (actionType == 'form') {
				//Création du select
				var select = '<select name="categorySelect" id="categorySelect">';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					select = select + '<option value="'+list[i].id+'">'+list[i].name+'</option>';
				}
				//Clôture du select
				select = select + '</select>';
				
				//Transmission de l'affichage
				var content = '<label>Catégorie associée : </label>'+select;
				
				//Affichage final
				$('#selectSlot').html(content);
			}
			else if (actionType == 'list') {
				//Listage des catégories
				var fullList = '<table class="listTable"><tr><th>id</th><th>Mode de livraison</th><th>Limite (grammes)</th><th>Tarif</th><th>Active</th><th>Actions</th></tr>';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					//Si la rubrique est active on change l'icône d'action correspondante
					if (list[i].active == 0) {
						var activIcon = '<img src="images/icons/accept.png" alt="Activer mode de livraison" title="Activer mode de livraison">';
					}
					else {
						var activIcon = '<img src="images/icons/delete.png" alt="Désactiver mode de livraison" title="Désactiver mode de livraison">';
					}
					//Transmission du contenu
					fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].name + '</td><td>' + list[i].limitWeight + '</td><td>'+list[i].tarif+'€</td><td>' + list[i].active + '</td><td><a onClick="displayDeliveryEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier le mode de livraison" /></a><a onClick="updateDeliveryVisibility('+list[i].id+')">'+activIcon+'</a><a onClick="deleteDelivery('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer le mode de livraison" /></a></td></tr>';
				}
				fullList = fullList+'</table>';
				
				//Création de l'affichage
				var content = '<h2>Mode de livraison</h2>'+fullList+'<div id="deliveryForm"><h2>Ajouter un mode de livraison</h2><label>Nom du mode de livraison : </label><input type="text" name="deliveryName" id="deliveryName" /><br /><label>Tarif : </label><input type="text" name="tarif" id="tarif" style="width: 20px;" /> €<br /><label>Limite de poids (grammes) : </label><input type="text" name="limit" id="limit" style="width: 60px;" /><br /><input type="button" value="Enregistrer" onclick="addDelivery()" class="formButton" /></div>';
				
				//Affichage du résultat avec animation
				$('#boardContent').html(content);
			}
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'une catégorie
function addDelivery() {
	//Récupération des contenus de variables
	var deliveryName = $('#deliveryName').val();
	var tarif = $('#tarif').val();
	var limit = $('#limit').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addDelivery&deliveryName="+deliveryName+"&tarif="+tarif+"&limit="+limit,
		success: function() {
			displayDeliveries('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de le mode de livraison
function deleteDelivery(deliveryId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=deleteDelivery&deliveryId="+deliveryId,
		success: function() {
			displayDeliveries('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de le mode de livraison
function updateDeliveryVisibility(deliveryId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateDeliveryVisibility&deliveryId="+deliveryId,
		success: function() {
			displayDeliveries('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Affichage du formulaire d'edit de livraison
function displayDeliveryEdit(deliveryId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnDeliveryDetails&deliveryId="+deliveryId,
		success: function(result) {
			//Eval du contenu
			var delivery = eval('('+result+')');
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier un mode de livraison</h2><br /><label>Nom du mode de livraison : </label><input type="text" name="deliveryNewName" id="deliveryNewName" value="'+delivery.name+'" /><br /><label>Tarif : </label><input type="text" name="tarif" id="tarif" style="width: 20px;" value="'+delivery.tarif+'" /> €<br /><input type="button" value="Enregistrer" onclick="editDelivery('+delivery.id+')" class="formButton" /><br /><br /><br /><a onclick="displayDeliveries(\'list\')" style="font-size: 13px;">Ajouter un mode de livraison</a>';
			
			//Affichage du nouveau formulaire
			$('#deliveryForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de le mode de livraison
function editDelivery(deliveryId) {
	//récupération du nouveau nom
	var deliveryNewName = $('#deliveryNewName').val();
	var newTarif = $('#tarif').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editDeliveryName&deliveryId="+deliveryId+"&newName="+deliveryNewName+"&tarif="+newTarif,
		success: function() {
			displayDeliveries('list');
			
			//On retire le chargement
			unload();
		}
	});
}