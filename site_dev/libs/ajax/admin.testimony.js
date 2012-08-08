//displayTestimony
function displayTestimony(messageId) {
	//Traitement Ajax = : tem => 1
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=setMessageAsTestimony&messageId="+messageId,
		success: function(result) {
			//alert(result);
			//Affichage du cadre de témoignage
			$("#testimonyForm").css('display', 'block');
			//On cache le bouton témoignage & on change le titre
			$("#testimonyLink").html('');
			$("#messageTopic").html('Témoignage');
		}
	});
}

//unsetTestimony
function unsetTestimony(messageId) {
	//Traitement Ajax = : tem => 1
	$.ajax({
		type: "POST",
		url: "actions.php",
		data: "formName=unsetTestimony&messageId="+messageId,
		success: function(result) {
			location.reload();
		}
	});
}