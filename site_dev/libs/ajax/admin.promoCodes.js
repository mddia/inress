//Traitement Ajax
function displayPromoCodes(actionType) {
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listPromoCodes",
		success: function(promoCodes) {
		
			//Eval du contenu
			var list = eval('('+promoCodes+')');
			
			if (actionType == 'form') {
				//Création du select
				var select = '<select name="promoCodeSelect" id="promoCodeSelect">';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					select = select + '<option value="'+list[i].id+'">'+list[i].code+'</option>';
				}
				//Clôture du select
				select = select + '</select>';
				
				//Transmission de l'affichage
				var content = '<label>Codes promo : </label>'+select;
				
				//Affichage final
				$('#selectSlot').html(content);
			}
			else if (actionType == 'list') {
				//Listage des catégories
				var fullList = '<table class="listTable"><tr><th>id</th><th>Code</th><th>Réduction </th><th>Limite</th><th>Active</th><th>Actions</th></tr>';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					//Si la rubrique est active on change l'icône d'action correspondante
					if (list[i].active == 0) {
						var activIcon = '<img src="images/icons/accept.png" alt="Activer code promo" title="Activer code promo">';
					}
					else {
						var activIcon = '<img src="images/icons/delete.png" alt="Désactiver code promo" title="Désactiver code promo">';
					}
					//Transmission du contenu
					fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].code + '</td><td>' + list[i].reduction + ' €</td><td>'+list[i].limited+'</td><td>' + list[i].active + '</td><td><a onClick="displayPromoCodeEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier le code promo" /></a><a onClick="updatePromoCodeVisibility('+list[i].id+')">'+activIcon+'</a><a onClick="deletePromoCode('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer le code promo" /></a></td></tr>';
				}
				fullList = fullList+'</table>';
				
				//Création de l'affichage
				var content = '<h2>Code promo</h2>'+fullList+'<div id="deliveryForm"><h2>Ajouter un code promo</h2><label>Intitulé du code promo : </label><input type="text" name="promoCodeName" id="promoCodeName" /><br /><label>Réduction : </label><input type="text" name="reduction" id="reduction" style="width: 30px;" /> €<br /><label>Utilisations possibles (0 = illimité) : </label><input type="text" name="limited" id="limited" style="width: 60px;" /><br /><input type="button" value="Enregistrer" onclick="addPromoCode()" class="formButton" /></div>';
				
				//Affichage du résultat avec animation
				$('#boardContent').html(content);
			}
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'une catégorie
function addPromoCode() {
	//Récupération des contenus de variables
	var promoCodeName = $('#promoCodeName').val();
	var reduction = $('#reduction').val();
	var limited = $('#limited').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addPromoCode&promoCodeName="+promoCodeName+"&reduction="+reduction+"&limited="+limited,
		success: function() {
			displayPromoCodes('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de le mode de livraison
function deletePromoCode(codeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=deletePromoCode&codeId="+codeId,
		success: function() {
			displayPromoCodes('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de le mode de livraison
function updatePromoCodeVisibility(codeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updatePromoCodeVisibility&codeId="+codeId,
		success: function() {
			displayPromoCodes('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Affichage du formulaire d'edit de livraison
function displayPromoCodeEdit(codeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnPromoCodeDetails&codeId="+codeId,
		success: function(result) {
			//Eval du contenu
			var list = eval('('+result+')');
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier un code promo</h2><br /><label>Nom du code : </label><input type="text" name="promoCodeNewName" id="promoCodeNewName" value="'+list.code+'" /><br /><label>Réduction : </label><input type="text" name="reduction" id="reduction" style="width: 20px;" value="'+list.reduction+'" /> €<br /><label>Utilisations possibles (0 = illimité) : </label><input type="text" name="limited" id="limited" value="'+list.limited+'" style="width: 40px;" /><br /><input type="button" value="Enregistrer" onclick="editPromoCode('+list.id+')" class="formButton" /><br /><br /><br /><a onclick="displayPromoCodes(\'list\')" style="font-size: 13px;">Ajouter un code promo</a>';
			
			//Affichage du nouveau formulaire
			$('#deliveryForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de le mode de livraison
function editPromoCode(codeId) {
	//récupération du nouveau nom
	var promoCodeNewName = $('#promoCodeNewName').val();
	var reduction = $('#reduction').val();
	var limited = $('#limited').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editPromoCodeName&codeId="+codeId+"&newName="+promoCodeNewName+"&reduction="+reduction+"&limited="+limited,
		success: function() {
			displayPromoCodes('list');
			
			//On retire le chargement
			unload();
		}
	});
}