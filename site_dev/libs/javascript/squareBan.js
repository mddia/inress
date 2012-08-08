//magnify block
function magnify(divId) {
	//On annule les animations antérieures qui ne seraient pas finies
	stopAllAnimations(divId);
	//On assombrit les carrés concernés
	shadowSquare(divId);
}

//Restore block
function restore(divId) {
	$('#banSquare'+divId).css({ opacity: 1 });
}

//function restoreAll;
function restoreAll() {
	//On annule toutes les animations en cours
	stopAllAnimations();
	//On restore tous les div
	$('#banSquare1').css({ opacity: 1 });
	$('#banSquare2').css({ opacity: 1 });
	$('#banSquare3').css({ opacity: 1 });
	$('#banSquare4').css({ opacity: 1 });
	$('#banSquare5').css({ opacity: 1 });
	$('#banSquare6').css({ opacity: 1 });
}

//Function shadowSquare
function shadowSquare(divId) {
	if (divId != 1) {
		$('#banSquare1').fadeTo("slow", 0.3);
	}
	if (divId != 2) {
		$('#banSquare2').fadeTo("slow", 0.3);
	}
	if (divId != 3) {
		$('#banSquare3').fadeTo("slow", 0.3);
	}
	if (divId != 4) {
		$('#banSquare4').fadeTo("slow", 0.3);
	}
	if (divId != 5) {
		$('#banSquare5').fadeTo("slow", 0.3);
	}
	if (divId != 6) {
		$('#banSquare6').fadeTo("slow", 0.3);
	}
}

//function
function stopAllAnimations(divId) {
	$('#banSquare1').stop();
	$('#banSquare2').stop();
	$('#banSquare3').stop();
	$('#banSquare4').stop();
	$('#banSquare5').stop();
	$('#banSquare6').stop();
}