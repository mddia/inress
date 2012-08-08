function displayProducts() {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listProducts",
		success: function(products) {
			//Eval du contenu
			var list = eval('('+products+')');
			
			//Listage des catégories
			var fullList = '<table class="listTable"><tr><th>id</th><th>Produit</th><th>Type de produit</th><th>Prix public</th><th>Prix membres</th><th>Actions</th></tr>';
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				//Transmission du contenu
				fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].title + '</td><td>' + list[i].titreProduit + '</td><td>' + list[i].prixPublic + ' €</td><td>' + list[i].prixAbonne + ' €</td><td><a onClick="displayProductEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier le produit" /></a><a onClick="deleteProduct('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer le produit" /></a></td></tr>';
			}
			fullList = fullList+'</table>';
			
			//Formulaire d'ajout d'un type de produits
			var productsForm = '<label>Nom du produit : </label><input type="text" name="productName" id="productName" /><br /><br /><span id="productTypeSelectZone"></span><br /><br /><label>Prix public : </label><input type="text" name="prixPublic" id="prixPublic" style="width: 26px; margin-right: 15px;" /> <label>Prix abonnés : </label><input type="text" name="prixMembres" id="prixMembres" style="width: 26px;" /><br /><br /><label>Poids (grammes - <strong>si envoi postal</strong>) : </label><input type="text" name="weight" id="weight" style="width: 46px;" value="0" /><br /><br /><label>Abo fréquence (si abonnement) : </label><input type="text" name="aboFreq" id="aboFreq" style="width: 26px;" /><br /><br /><label>eAbo durée (en jours - <strong>si eabo</strong>) : </label><input type="text" name="eaboFreq" id="eaboFreq" style="width: 26px;" /><br /><br /><label>Id évènement (si le produit est lié à un événement) : </label><input type="text" id="eventId" name="eventId" style="width: 40px" /> <a href="admin.php?cat=activites&scat=listeactivites" target="_blank">Trouver l\'ID d\'un évènement</a><br /><br /><label>Description : </label><br /><textarea id="productDescription"></textarea><br /><br /><input type="button" value="Enregistrer" onclick="addProduct()" style="cursor: pointer;" />';
			
			//Création de l'affichage
			var content = '<div class="listDivLeft"><h2>Produits</h2><br />'+fullList+'</div><div class="formDivRight" id="editProductForm"><h2>Ajouter un produit</h2><br />'+productsForm+'</div>';
			
			//Affichage du résultat avec animation
			$('#boardContent').html(content);
			
			//Complete
			displayProductsType('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'un produit
function addProduct() {
	//Récupération des contenus de variables
	var productName = $('#productName').val();
	var productTypeId = $('#productTypeSelect').val();
	var productDescription = $('#productDescription').val();
	var prixPublic = $('#prixPublic').val();
	var prixMembres = $('#prixMembres').val();
	var aboFreq = $('#aboFreq').val();
	var eaboFreq = $('#eaboFreq').val();
	var weight = $('#weight').val();
	var eventId = $('#eventId').val();
	
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addProduct&productTypeId="+productTypeId+"&name="+productName+"&description="+productDescription+"&prixPublic="+prixPublic+"&prixMembres="+prixMembres+"&aboFreq="+aboFreq+"&eaboFreq="+eaboFreq+"&weight="+weight+"&eventId="+eventId,
		success: function() {
			displayProducts();
			displayProductsType('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function deleteProduct(productId) {
	//On demande confirmation avant de supprimer l'objet
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Souhaitez-vous vraiment supprimer ce produit ?<br /><br /><input type="button" class="confirm simplemodal-close" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteProduct&productId="+productId,
					success: function() {
						displayProducts();
						displayProductsType('form');
						
						//On retire le chargement
						unload();
					}
				});
			});
		}
	});
	
}

//Affichage du formulaire d'edit de categorie
function displayProductEdit(productId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnProductDetails&productId="+productId,
		success: function(result) {
			//Eval du contenu
			var product = eval('('+result+')');
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier un produit</h2><label>Nom du produit : </label><input type="text" name="productName" id="productName" value="'+product.title+'" /><br /><br /><span id="productTypeSelectZone">Type de produits associé : <span class="bold">'+product.titreProduit+'</span> (<a onclick="displayProductsType(\'form\');">modifier</a>)<input type="hidden" name="productTypeSelect" id="productTypeSelect" value="0" /></span><br /><br /><label>Prix public : </label><input type="text" name="prixPublic" id="prixPublic" value="'+product.prixPublic+'" style="width: 26px; margin-right: 15px;" /> <label>Prix membres : </label><input type="text" name="prixMembres" id="prixMembres" value="'+product.prixAbonne+'" style="width: 26px;" /><br /><br /><label>Poids (grammes - <strong>si envoi postal</strong>) : </label><input type="text" name="weight" id="weight" style="width: 46px;" value="'+product.poids+'" /><br /><br /><label>Abo fréquence (si abonnement) : </label><input type="text" name="aboFreq" id="aboFreq" value="'+product.aboFreq+'" style="width: 26px;" /><br /><br /><label>eAbo durée (en jours - <strong>si eabo</strong>) : </label><input type="text" name="eaboFreq" id="eaboFreq" style="width: 26px;" value="'+product.eaboFreqJours+'" /><br /><br /><label>Description : </label><br /><textarea id="productDescription">'+product.description+'</textarea><br /><br /><input type="button" value="Enregistrer" onclick="editProduct('+product.id+')" style="cursor: pointer;" />';
			
			//Affichage du nouveau formulaire
			$('#editProductForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la catégorie
function editProduct(productId) {
	//Récupération des contenus de variables
	var productName = $('#productName').val();
	var productTypeId = $('#productTypeSelect').val();
	var productDescription = $('#productDescription').val();
	var prixPublic = $('#prixPublic').val();
	var prixMembres = $('#prixMembres').val();
	var aboFreq = $('#aboFreq').val();
	var eaboFreq = $('#eaboFreq').val();
	var weight = $('#weight').val();
	
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editProduct&productId="+productId+"&newName="+productName+"&newProductTypeId="+productTypeId+"&newDescription="+productDescription+"&prixPublic="+prixPublic+"&prixMembres="+prixMembres+"&aboFreq="+aboFreq+"&eaboFreq="+eaboFreq+"&weight="+weight,
		success: function(result) {
			displayProducts();
			displayProductsType('form');
			
			//On retire le chargement
			unload();
		}
	});
}