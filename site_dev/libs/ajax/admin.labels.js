//updatePreviewValue()
function updatePreviewValue() {
	var labelName = $("#labelName").val();
	$("#labelPreview").val(labelName);
	$("#labelHiddenName").val(labelName);
}

//changePreviewBckg
function changePreviewBckg(color) {
	$("#labelPreview").css('background-color', '#'+color);
	$("#labelHiddenBckg").val(color);
}
//changePreviewColor
function changePreviewColor(color) {
	$("#labelPreview").css('color', '#'+color);
	$("#labelHiddenColor").val(color);
}

//createLabel
function createLabel() {
	//Récupération des variables
	var name = $("#labelHiddenName").val();
	var bckg = $("#labelHiddenBckg").val();
	var color = $("#labelHiddenColor").val();
	//Vérif que les trois champs sont remplis
	if ((name != '') && (bckg != '') && (color != '')) {
		//Replace du &
		var newName = name.replace('&', '%26');
		//Traitement Ajax
		$.ajax({
			ajaxStart: load(),
			type: "POST",
			url: "actions.php",
			data: "formName=createLabel&name="+newName+"&bckg="+bckg+"&color="+color,
			success: function(result) {
				//Reload page
				location.reload();
			},
		});
	}
}

//addLabel
function addLabel(labelId, messageId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=addLabel&labelId="+labelId+"&messageId="+messageId,
		success: function(result) {
			/*//Eval
			var list = eval('('+result+')');
			//Création du label
			var label = '';
			//Boucle
			for (var i = 0; i < list.length; i++) {
				label = label+'<div style="background-color: #'+list[i].background+'; padding: 3px; min-width: 10px; float: left; margin: 3px 3px 0px 0px; color: #'+list[i].color+';" id="label-'+messageId+'-'+labelId+'">'+list[i].name+' <a style="cursor: pointer;" onClick="removeLabel('+labelId+', '+messageId+');"><img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" /></a></div>';
			}
			//Transmission
			$("#labelZone"+messageId).html(label);*/
			
			//Reload page
			location.reload();
		},
	});	
}

//removeLabel
function removeLabel(labelId, messageId) {
	//Traitement Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=removeLabel&labelId="+labelId+"&messageId="+messageId,
		success: function(result) {
			/*//Eval
			var list = eval('('+result+')');
			//Création du label
			var label = '';
			//Boucle
			for (var i = 0; i < list.length; i++) {
				label = label+'<div style="background-color: #'+list[i].background+'; padding: 3px; min-width: 10px; float: left; margin: 3px 3px 0px 0px; color: #'+list[i].color+';" id="label-'+messageId+'-'+labelId+'">'+list[i].name+' <a style="cursor: pointer;" onClick="removeLabel('+labelId+', '+messageId+');"><img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" /></a></div>';
			}
			//Transmission
			$("#labelZone"+messageId).html(label);*/
			
			//Reload page
			location.reload();
		},
	});	
}

//deleteLabel
function deleteLabel(labelId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Ce libellé sera supprimé définitivement. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=deleteLabel&labelId="+labelId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//removeUserLink
function removeUserLink(labelId, userId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Cet utilisateur sera dissocié du libellé. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=removeUserLink&labelId="+labelId+"&userId="+userId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//removeTopicLink
function removeTopicLink(labelId, topicId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Cet objet sera dissocié du libellé. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=removeTopicLink&labelId="+labelId+"&topicId="+topicId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//listAllModerateurs
function listAllModerateurs() {
	//Traitement Ajax
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=listAllModerateurs",
		success: function(result) {
			//Eval du contenu
			var list = eval('('+result+')');
			
			//Création du select
			var select = '<select name="moderateurSelect" id="moderateurSelect">';
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				select = select + '<option value="'+list[i].id+'">'+list[i].firstName+' '+list[i].name+'</option>';
			}
			//Clôture du select
			select = select + '</select>';
			
			//Affichage final
			$('#moderateurSelectSpan').html(select);
		},
	});
}

//addUserToLabel
function addUserToLabel(labelId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Associer un utilisateur</strong><br /><br />Quel utilisateur souhaitez-vous associer à ce label ?<br /><br /><span id="moderateurSelectSpan"></span><br /><br /><input type="button" class="confirm" value="Associer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;"/></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Affichage de la liste des modérateurs
			listAllModerateurs();
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//On récupère l'id de lutilisateur sélectionné
				var userId = $('#moderateurSelect').val();
				//Traitement Ajax
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=addUserToLabel&labelId="+labelId+"&userId="+userId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//listAllTopics
function listAllTopics() {
	//Traitement Ajax
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=listAllTopics",
		success: function(result) {
			//Eval du contenu
			var list = eval('('+result+')');
			
			//Création du select
			var select = '<select name="topicSelect" id="topicSelect">';
			//Boucle
			for (var i = 0; i < list.length ; i++ ){
				select = select + '<option value="'+list[i].id+'">'+list[i].titre+'</option>';
			}
			//Clôture du select
			select = select + '</select>';
			
			//Affichage final
			$('#topicsSelectSpan').html(select);
		},
	});
}

//addTopicToLabel
function addTopicToLabel(labelId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Associer un utilisateur</strong><br /><br />Quel utilisateur souhaitez-vous associer à ce label ?<br /><br /><span id="topicsSelectSpan"></span><br /><br /><input type="button" class="confirm" value="Associer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;"/></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Affichage de la liste des modérateurs
			listAllTopics();
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//On récupère l'id de lutilisateur sélectionné
				var topicId = $('#topicSelect').val();
				//Traitement Ajax
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=addTopicToLabel&labelId="+labelId+"&topicId="+topicId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}