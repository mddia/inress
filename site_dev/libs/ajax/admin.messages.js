//deleteMessage
function deleteMessage(messageId) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 120px; text-align: center; padding: 10px;"><strong>Attention</strong><br /><br />Ce message sera transféré vers la corbeille. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				$.ajax({
					type: "POST",
					url: "actions.php",
					data: "formName=deleteMessage&messageId="+messageId,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

//removeTagFromMessage
function removeTagFromMessage(messageId, tagId) {
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=removeTagFromMessage&messageId="+messageId+"&tagId="+tagId,
		success: function() {
			//Reload page
			$('#tag'+tagId).remove();
		},
	});
}