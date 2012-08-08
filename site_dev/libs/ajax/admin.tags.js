$().ready(function() {
	//Fonction d'autocompletion des tags de recherche
	$("#tagsInput").autocomplete({
		source: "ajaxActions.php?formName=listTags",
		minLength: 2,
		select: function(event, ui) {
			//Créations du bloc de tag
			var tag = '<div class="tagDiv" style="padding: 6px; border: 1px solid #666666; background-color: #EEEEEE; border-radius: 5px; min-width: 40px; margin: 2px; text-align: center; float: left; overflow: hidden;" id="tag'+ui.item.id+'"><div>'+ui.item.name+'</div><div class="tagIconDiv"><a onClick="removeTag('+ui.item.id+');"><img src="http://admin.inrees.com/adm/images/icon_annuler.gif" alt="[X]" style="margin-bottom: -4px;" /></a></div></div><input type="hidden" name="tag[]" value="'+ui.item.id+'" id="hiddenTag'+ui.item.id+'" />';
			//Transmission
			$("#tagsField").append(tag);
		}
	}).data('autocomplete')._renderItem = function(ul, item) {
		return $( '<li style="background-color: #EEEEEE; list-style: none; width: 250px;"></li>' )
		.data( "item.autocomplete", item )
		.append( "<a class='tagLink' style='padding: 5px; cursor: pointer;'>" + item.name + "</a>" )
		.appendTo( ul );
	};
});

//removeTag
function removeTag(id) {
	$("#tag"+id).remove();
	$("#hiddenTag"+id).remove();
	//<input type="hidden" name="tag[]" value="'+ui.item.name+'" id="hiddenTag'+ui.item.id'" />
}