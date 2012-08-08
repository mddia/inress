//Affichage 
function displaySquareBan() {
	alert('go !');
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=getBanType",
		success: function(type) {
			
			//Eval du contenu
			var banType = eval('('+type+')');
			
			//Création de l'affichage
			var content = '<h2>Gestion bannière</h2>Template utilisé actuellement :<br /><br /><div class="banTemplateIcon"><img src="images/interface/banTemplate1.png" /></div>';
			
			if (banType == 1) {
				content = content+'<div class="tick"><img src="images/icons/tick.png" title="Template actif" /></div>';
			}
			
			content = content+'<div class="banTemplateIcon"><img src="images/interface/banTemplate3.png" /></div>';
			
			if (banType == 3) {
				content = content+'<div class="tick"><img src="images/icons/tick.png" title="Template actif" /></div>';
			}
			
			content = content+'<div class="banTemplateIcon"><img src="images/interface/banTemplate6.png" /></div>';
			
			if (banType == 6) {
				content = content+'<div class="tick"><img src="images/icons/tick.png" title="Template actif" /></div>';
			}
			
			//Modification du template
			content = content+'<div style="float: left; clear: both; margin-top: 10px;"><br /><span class="bold">Mettre à jour la bannière :</span><br /><br /><span class="bold">Choix du template : </span> <a onclick="displayBanForm(1)">1 Vignette</a> <a onclick="displayBanForm(3)">3 Vignettes</a> <a onclick="displayBanForm(6)">6 Vignettes</a><br /><br /><div id="banForm"></div></div>';
			
			//Affichage du résultat avec animation
			$('#boardContent').html(content);			
			
			//On retire le chargement
			unload();
		}
	});
}

function displayBanForm(banType) {
	//Création du formulaire de template
	if (banType == 1) {
		var content = '<label>Url de l\'image (990 x 348) : </label> <input type="text" id="banSquare1" /> -->Url du lien <input type="text" id="url1" /><br /><br />';
	}
	
	if (banType == 3) {
		var content = '<label>Url de la grande image (660 x 348) : </label> <input type="text" id="banSquare1" /> -->Url du lien <input type="text" id="url1" /><br /><br /><label>Url de la petit image 1 (330 x 174) : </label> <input type="text" id="banSquare2" /> -->Url du lien <input type="text" id="url2" /><br /><br /><label>Url de la petite image 2 (328 x 172) : </label> <input type="text" id="banSquare3" /> -->Url du lien <input type="text" id="url3" /><br /><br />';
	}
	
	if (banType == 6) {
		var content = '<label>Url de la grande image (495 x 348) : </label> <input type="text" id="banSquare1" /> -->Url du lien <input type="text" id="url1" /><br /><br /><label>Url de l\'image moyenne 1 (250 x 174) : </label> <input type="text" id="banSquare2" /> -->Url du lien <input type="text" id="url2" /><br /><br /><label>Url de l\'image moyenne 2 (250 x 174) : </label> <input type="text" id="banSquare3" /> -->Url du lien <input type="text" id="url3" /><br /><br /><label>Url de la petit image 1 (245 x 116) : </label> <input type="text" id="banSquare4" /> -->Url du lien <input type="text" id="url4" /><br /><br /><label>Url de la petite image 2 (245 x 116) : </label> <input type="text" id="banSquare5" /> -->Url du lien <input type="text" id="url5" /><br /><br /><label>Url de la petite image 3 (245 x 116) : </label> <input type="text" id="banSquare6" /> -->Url du lien <input type="text" id="url6" /><br /><br />';
	}
	
	//Bouton d'enregistrement
	content = content + '<input type="button" value="Enregistrer" onClick="updateBan('+banType+')" />';
	
	//Affichage du résultat avec animation
	$('#banForm').html(content);		
}

//updateBan
function updateBan(banType) {
	if (banType == 1) {
		var bansquare1 = $('#banSquare1').val();
		var url1 = $('#url1').val();
		var bansquare2 = 0;
		var url2 = 0;
		var bansquare3 = 0;
		var url3 = 0;
		var bansquare4 = 0;
		var url4 = 0;
		var bansquare5 = 0;
		var url5 = 0;
		var bansquare6 = 0;
		var url6 = 0;
	}
	
	if (banType == 3) {
		var bansquare1 = $('#banSquare1').val();
		var url1 = $('#url1').val();
		var bansquare2 = $('#banSquare2').val();
		var url2 = $('#url2').val();
		var bansquare3 = $('#banSquare3').val();
		var url3 = $('#url3').val();
		var bansquare4 = 0;
		var url4 = 0;
		var bansquare5 = 0;
		var url5 = 0;
		var bansquare6 = 0;
		var url6 = 0;
	}
	
	if (banType == 6) {
		var bansquare1 = $('#banSquare1').val();
		var url1 = $('#url1').val();
		var bansquare2 = $('#banSquare2').val();
		var url2 = $('#url2').val();
		var bansquare3 = $('#banSquare3').val();
		var url3 = $('#url3').val();
		var bansquare4 = $('#banSquare4').val();
		var url4 = $('#url4').val();
		var bansquare5 = $('#banSquare5').val();
		var url5 = $('#url5').val();
		var bansquare6 = $('#banSquare6').val();
		var url6 = $('#url6').val();
	}
	
	//debug
	//alert("formName=updateBan&banType="+banType+"&bansquare1="+bansquare1+"&url1="+url1+"bansquare2="+bansquare2+"&url2="+url2+"bansquare3="+bansquare3+"&url3="+url3+"bansquare4="+bansquare4+"&url4="+url4+"bansquare5="+bansquare5+"&url5="+url5+"bansquare6="+bansquare6+"&url6="+url6);
	
	//Ajax
	$.ajax({
		ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=updateBan&banType="+banType+"&bansquare1="+bansquare1+"&url1="+url1+"&bansquare2="+bansquare2+"&url2="+url2+"&bansquare3="+bansquare3+"&url3="+url3+"&bansquare4="+bansquare4+"&url4="+url4+"&bansquare5="+bansquare5+"&url5="+url5+"&bansquare6="+bansquare6+"&url6="+url6,
		success: function(type) {
			//On retire le chargement
			unload();
			
			alert('Bannière mise à jour');
			
			displaySquareBan();
		}
	});
}