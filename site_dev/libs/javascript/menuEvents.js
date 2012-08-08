//Affichage des divs sélectionnés
function displayUnderDiv(divName) {
	//On cache tout ce qui a pu être ouvert
	$('#mycarousel').css('width', '0px');
	$('#mycarousel').css('height', '0px');
	resetAllButtons();
	hideAllUnderDivs();
	//On affiche ce qui doit l'être
	$('#parent').show();
	$('#'+divName+'Content').fadeIn();
	$('#'+divName).addClass('selected');
}

//On cache tous les divs
function hideAllUnderDivs() {
	//On cache tous les divs concernés
	$('#parent').hide();
	$('#autourMortContent').hide();
	$('#conscienceContent').hide();
	$('#psychologiesContent').hide();
	$('#santeBienEtreContent').hide();
	$('#planeteContent').hide();
	$('#sciencesContent').hide();
	$('#spiritualitesContent').hide();
	$('#culturePhiloContent').hide();
	$('#myInreesContent').hide();
}

//On réinitialise tous les boutons
function resetAllButtons() {
	$('#autourMort').removeClass('selected');
	$('#conscience').removeClass('selected');
	$('#psychologies').removeClass('selected');
	$('#santeBienEtre').removeClass('selected');
	$('#planete').removeClass('selected');
	$('#sciences').removeClass('selected');
	$('#spiritualites').removeClass('selected');
	$('#culturePhilo').removeClass('selected');
	$('#myInrees').removeClass('selected');
}

//Reset all
function resetMenu() {
	//Affichage du carousel
	$('#mycarousel').css('width', '990px');
	$('#mycarousel').css('height', '285px');
	//Reset des divs et boutons
	hideAllUnderDivs();
	resetAllButtons();
}