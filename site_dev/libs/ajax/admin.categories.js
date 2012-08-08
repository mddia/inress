//Traitement Ajax
function displayCategories(actionType) {
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listCategories",
		success: function(categories) {
			//Eval du contenu
			var list = eval('('+categories+')');
			
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
				var fullList = '<table class="listTable"><tr><th>id</th><th>Catégorie</th><th>Active</th><th>Actions</th></tr>';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					//Si la rubrique est active on change l'icône d'action correspondante
					if (list[i].active == 0) {
						var activIcon = '<img src="images/icons/accept.png" alt="Activer catégorie" title="Activer catégorie">';
					}
					else {
						var activIcon = '<img src="images/icons/delete.png" alt="Désctiver catégorie" title="Désctiver catégorie">';
					}
					//Transmission du contenu
					fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].name + '</td><td>' + list[i].active + '</td><td><a onClick="displayCategoryEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier la catégorie" /></a><a onClick="updateCategoryVisibility('+list[i].id+')">'+activIcon+'</a><a onClick="deleteCategory('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer la catégorie" /></a></td></tr>';
				}
				fullList = fullList+'</table>';
				
				//Création de l'affichage
				var content = '<h2>Catégories</h2><br />'+fullList+'<div id="catForm"><h2>Ajouter une catégorie</h2><br /><label>Nom de la catégorie : </label><input type="text" name="categoryName" id="categoryName" /><br /><br /><input type="button" value="Enregistrer" onclick="addCategory()" class="formButton" /></div>';
				
				//Affichage du résultat avec animation
				$('#boardContent').html(content);
			}
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'une catégorie
function addCategory() {
	//Récupération des contenus de variables
	var catName = $('#categoryName').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addCategory&catName="+catName,
		success: function() {
			displayCategories('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function deleteCategory(catId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=deleteCategory&catId="+catId,
		success: function() {
			displayCategories('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function updateCategoryVisibility(catId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateCategoryVisibility&catId="+catId,
		success: function() {
			displayCategories('list');
			
			//On retire le chargement
			unload();
		}
	});
}

//Affichage du formulaire d'edit de categorie
function displayCategoryEdit(catId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnCategoryDetails&catId="+catId,
		success: function(result) {
			//Eval du contenu
			var cat = eval('('+result+')');
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier une catégorie</h2><br /><label>Nom de la catégorie : </label><input type="text" name="categoryNewName" id="categoryNewName" value="'+cat.name+'" /><br /><input type="button" value="Enregistrer" onclick="editCategory('+cat.id+')" class="formButton" /><br /><br /><br /><a onclick="displayCategories(\'list\')" style="font-size: 13px;">Ajouter une catégorie</a>';
			
			//Affichage du nouveau formulaire
			$('#catForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la catégorie
function editCategory(catId) {
	//récupération du nouveau nom
	var catNewName = $('#categoryNewName').val();
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editCategoryName&catId="+catId+"&newName="+catNewName,
		success: function() {
			displayCategories('list');
			
			//On retire le chargement
			unload();
		}
	});
}