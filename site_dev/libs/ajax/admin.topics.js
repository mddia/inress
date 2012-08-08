//createTopic
function createTopic() {
	//Récupération des variables
	var name = $("#topicName").val();
	//Vérif que les trois champs sont remplis
	if (name != '') {
		//Adaptation du symbole &
		var newName = name.replace('&', '%26');
		//Traitement Ajax
		$.ajax({
			ajaxStart: load(),
			type: "POST",
			url: "actions.php",
			data: "formName=createTopic&name="+newName,
			success: function(result) {
				//Reload page
				location.reload();
				//alert(result);
			},
		});
	}
}

//editTopic
function editTopic(topicId, topicName) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 340px; height: 140px; text-align: center; padding: 10px; overflow: auto;"><strong>Objet : '+topicName+'</strong><br /><br />Nouveau nom de l\'objet :<br /><br /><input type="text" name="newName" id="newName" style="text-align: center;" /><br /><br /><input type="button" class="confirm" value="Enregistrer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Récupération nouveau nom
				var newName = $("#newName").val();
				//adaptation signe &
				var finalName = newName.replace('&', '%26');
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=editTopic&topicId="+topicId+"&newName="+finalName,
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

//deleteTopic
function deleteTopic(topicId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Cet objet sera supprimé définitivement. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=deleteTopic&topicId="+topicId,
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