//Parents affiché
var parentDiv = 0;

//Affichage des divs sélectionnés
function displayUnderDiv(divName) {
	if ($('#'+divName).hasClass("selected")) {
		slideUpMenu();
		parentDiv = 0;
	}
	else {
		//On cache tout ce qui a pu être ouvert
		resetAllButtons();
		hideAllUnderDivs();
		//On affiche ce qui doit l'être
		if (parentDiv == 0) {
			$('#parent').slideDown();
			parentDiv = 1;
		}
		$('#'+divName+'Content').fadeIn();
		$('#'+divName).addClass('selected');
	}
}

//On remonte le div parent
function slideUpMenu() {
	$('#parent').slideUp();
	parentDiv = 0;
	hideAllUnderDivs();
	resetAllButtons();
}

//On cache tous les divs
function hideAllUnderDivs() {
	//On cache tous les divs concernés
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
	/*$('#mycarousel').css('width', '990px');
	$('#mycarousel').css('height', '285px');
	//Reset des divs et boutons
	hideAllUnderDivs();
	resetAllButtons();*/
	slideUpMenu()
}