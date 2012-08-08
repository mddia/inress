function displayProductsType(actionType) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listProductsType",
		success: function(productsType) {
			//Eval du contenu
			var list = eval('('+productsType+')');
			
			if (actionType == 'form') {
				//Création du select
				var select = '<select name="productTypeSelect" id="productTypeSelect">';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					select = select + '<option value="'+list[i].id+'">'+list[i].title+'</option>';
				}
				//Clôture du select
				select = select + '</select>';
				
				//Transmission de l'affichage
				var content = '<label>Type de produit associé : </label>'+select;
				
				//Affichage final
				$('#productTypeSelectZone').html(content);
			}
			else if (actionType == 'list') {
				//Listage des catégories
				var fullList = '<table class="listTable"><tr><th>id</th><th>Type de produit</th><th>Famille</th><th>Actif</th><th>Url</th><th>Actions</th><th>Structure</th><th>Date de création</th></tr>';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					//Si la rubrique est active on change l'icône d'action correspondante
					if (list[i].active == 0) {
						var activIcon = '<img src="images/icons/delete.png" alt="Actif" title="Rendre actif" />';
					}
					else {
						var activIcon = '<img src="images/icons/accept.png" alt="Inactif" title="Rendre inactif" />';
					}
					//Détection structure
					if (list[i].event == 1) {
						var structure = 'Evènement';
					}
					else if (list[i].subscription == 1) {
						var structure = 'Abonnement';
					}
					else {
						var structure = 'Objet';
					}
					//Transmission du contenu
					fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].title + '</td><td>' + list[i].familyName + '</td><td><a onClick="updateProductTypeVisibility('+list[i].id+')">'+activIcon+'</a></td><td>'+list[i].url+'</td><td><a onClick="displayProductTypeEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier le type de produit" /></a><a onClick="deleteProductType('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer le type de produits" /></a></td><td>'+structure+'</td><td>'+list[i].creationTimeInfo+'</td></tr>';
				}
				fullList = fullList+'</table>';
				
				//Formulaire d'ajout d'un type de produits
				var productsForm = '<label>Nom du type de produit : </label><input type="text" name="productTypeName" id="productTypeName" /><br /><br /><span id="familySelectZone"></span><br /><br /><label>Url du produit : </label><input type="text" name="productTypeUrl" id="productTypeUrl" /><br /><br /><label>Remarque INREES : </label><br /><textarea id="productTypeDescription"></textarea><br /><br /><input type="button" value="Enregistrer" onclick="addProductType()" />';
				
				//Création de l'affichage
				var content = '<div class="listDivLeft"><h2>Types de produits</h2><br />'+fullList+'</div><div class="formDivRight" id="editProductTypeForm"><h2>Ajouter un type de produits</h2><br />'+productsForm+'</div>';
				
				//Affichage du résultat avec animation
				$('#boardContent').html(content);
				
				//Complete
				displayFamilies('form');
			}
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'une catégorie
function addProductType() {
	//Récupération des contenus de variables
	var productTypeName = $('#productTypeName').val();
	var familyId = $('#familySelect').val();
	var productTypeDescription = $('#productTypeDescription').val();
	var productTypeUrl = $('#productTypeUrl').val();
	
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addProductType&familyId="+familyId+"&name="+productTypeName+"&remarque="+productTypeDescription+"&url="+productTypeUrl,
		success: function() {
			displayProductsType('list');
			displayFamilies('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function deleteProductType(productTypeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=deleteProductType&productTypeId="+productTypeId,
		success: function() {
			displayProductsType('list');
			displayFamilies('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function updateProductTypeVisibility(productTypeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateProductTypeVisibility&productTypeId="+productTypeId,
		success: function() {
			displayProductsType('list');
			displayFamilies('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Affichage du formulaire d'edit de categorie
function displayProductTypeEdit(productTypeId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnProductTypeDetails&productTypeId="+productTypeId,
		success: function(result) {
			//Eval du contenu
			var productType = eval('('+result+')');
			
			//On définit en fonction de la structure
			if (productType.event == 1) {
				var structure = 'Structure : <input type="radio" name="structure" id="objectStructure" /> Objet <input type="radio" name="structure" id="eventStructure" checked /> Evènement <input type="radio" name="structure" id="subscriptionStructure" /> Abonnement ';
			}
			else if (productType.subscription == 1) {
				var structure = 'Structure : <input type="radio" name="structure" id="objectStructure" /> Objet <input type="radio" name="structure" id="eventStructure" /> Evènement <input type="radio" name="structure" id="subscriptionStructure" checked /> Abonnement ';
			}
			else {
				var structure = 'Structure : <input type="radio" name="structure" id="objectStructure" checked /> Objet <input type="radio" name="structure" id="eventStructure" /> Evènement <input type="radio" name="structure" id="subscriptionStructure" /> Abonnement ';
			}
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier un type de produits</h2><label>Modifier un type de produit : </label><input type="text" name="productTypeName" id="productTypeName" value="'+productType.title+'" /><br /><br /><span id="familySelectZone">Famille associée : <span class="bold">'+productType.familyName+'</span> (<a onclick="displayFamilies(\'form\')">modifier</a>)<input type="hidden" id="familySelect" value="0" /></span><br /><br /><label>Url du produit : </label><input type="text" name="productTypeUrl" id="productTypeUrl" value="'+productType.url+'" /><br /><br />'+structure+'<br /><br /><label>Remarque INREES : </label><br /><textarea id="productTypeDescription">'+productType.remarqueInrees+'</textarea><br /><br /><input type="button" value="Enregistrer les modifications" onclick="editProductType('+productType.id+')" />';
			
			//Affichage du nouveau formulaire
			$('#editProductTypeForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la catégorie
function editProductType(productTypeId) {
	//récupération du nouveau nom
	var productTypeName = $('#productTypeName').val();
	var familyProductTypeId = $('#familySelect').val();
	var productTypeDescription = $('#productTypeDescription').val();
	var productTypeUrl = $('#productTypeUrl').val();
	//Structure
	if ($('#objectStructure').is(':checked')) {
		var event = 0;
		var subscription = 0;
	}
	else if ($('#eventStructure').is(':checked')) {
		var event = 1;
		var subscription = 0;
	}
	else {
		var event = 0;
		var subscription = 1;
	}
	
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editProductType&productTypeId="+productTypeId+"&newName="+productTypeName+"&newFamilyId="+familyProductTypeId+"&newRemarque="+productTypeDescription+"&newUrl="+productTypeUrl+"&newEvent="+event+"&newSubscription="+subscription,
		success: function() {
			displayProductsType('list');
			displayFamilies('form');
			
			//On retire le chargement
			unload();
		}
	});
}