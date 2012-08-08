function displayFamilies(actionType) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=listFamilies",
		success: function(families) {
			//Eval du contenu
			var list = eval('('+families+')');
			
			if (actionType == 'form') {
				//Création du select
				var select = '<select name="familySelect" id="familySelect">';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					select = select + '<option value="'+list[i].id+'">'+list[i].name+'</option>';
				}
				//Clôture du select
				select = select + '</select>';
				
				//Transmission de l'affichage
				var content = '<label>Famille associée : </label>'+select;
				
				//Affichage final
				$('#familySelectZone').html(content);
			}
			else if (actionType == 'list') {
				//Listage des catégories
				var fullList = '<table class="listTable"><tr><th>id</th><th>Famille</th><th>Catégorie</th><th>Active</th><th>Actions</th></tr>';
				//Boucle
				for (var i = 0; i < list.length ; i++ ){
					//Si la rubrique est active on change l'icône d'action correspondante
					if (list[i].active == 0) {
						var activIcon = '<img src="images/icons/accept.png" alt="Activer famille" title="Activer famille">';
					}
					else {
						var activIcon = '<img src="images/icons/delete.png" alt="Désctiver famille" title="Désctiver famille">';
					}
					//Transmission du contenu
					fullList = fullList + '<tr><td>' + list[i].id + '</td><td>' + list[i].name + '</td><td>' + list[i].catName + '</td><td>' + list[i].active + '</td><td><a onClick="displayFamilyEdit('+list[i].id+')"><img src="images/icons/pencil.png" alt="Edit" title="Modifier la famille" /></a><a onClick="updateFamilyVisibility('+list[i].id+')">'+activIcon+'</a><a onClick="deleteFamily('+list[i].id+')"><img src="images/icons/bin_empty.png" alt="X" title="Supprimer la famille" /></a></td></tr>';
				}
				fullList = fullList+'</table>';
				
				//Création de l'affichage
				var content = '<h2>Familles</h2><br />'+fullList+'<div id="familyForm"><h2>Ajouter une famille</h2><br /><label>Nom de la famille : </label><input type="text" name="familyName" id="familyName" /><br /><br /><span id="selectSlot"></span><br /><br /><input type="button" value="Enregistrer" onclick="addFamily()" class="formButton" /></div>';
				
				//Affichage du résultat avec animation
				$('#boardContent').html(content);
				
				//Complete
				displayCategories('form');
			}
			
			//On retire le chargement
			unload();
		}
	});
}

//Ajout d'une catégorie
function addFamily() {
	//Récupération des contenus de variables
	var familyName = $('#familyName').val();
	var catId = $('#categorySelect').val()
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addFamily&familyName="+familyName+"&catId="+catId,
		success: function() {
			displayFamilies('list');
			displayCategories('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function deleteFamily(familyId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=deleteFamily&familyId="+familyId,
		success: function() {
			displayFamilies('list');
			displayCategories('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la visibilité de la catégorie
function updateFamilyVisibility(familyId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateFamilyVisibility&familyId="+familyId,
		success: function() {
			displayFamilies('list');
			displayCategories('form');
			
			//On retire le chargement
			unload();
		}
	});
}

//Affichage du formulaire d'edit de categorie
function displayFamilyEdit(familyId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=returnFamilyDetails&familyId="+familyId,
		success: function(result) {
			//Eval du contenu
			var family = eval('('+result+')');
			
			//Création du nouveau formulaire
			var editForm = '<h2>Modifier une Famille</h2><label>Nom de la famille : </label><input type="text" name="familyNewName" id="familyNewName" value="'+family.name+'" /><br /><br /><span id="selectSlot">Catégorie associée : <span class="bold">'+family.catName+'</span> (<a onclick="displayCategories(\'form\')">modifier</a>)<input type="hidden" name="categorySelect" id="categorySelect" value="0" /></span><br /><input type="button" value="Enregistrer" onclick="editFamily('+family.id+')" class="formButton" /><br /><br /><br /><a onclick="displayFamilies()" style="font-size: 13px;">Ajouter une famille</a>';
			
			//Affichage du nouveau formulaire
			$('#familyForm').html(editForm);
			
			//On retire le chargement
			unload();
		}
	});
}

//Mise à jour de la catégorie
function editFamily(familyId) {
	//récupération du nouveau nom
	var familyNewName = $('#familyNewName').val();
	var newCategoryId = $('#categorySelect').val();
	
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=editFamilyName&familyId="+familyId+"&newName="+familyNewName+'&newCatId='+newCategoryId,
		success: function() {
			displayFamilies('list');
			displayCategories('form');
			
			//On retire le chargement
			unload();
		}
	});
}