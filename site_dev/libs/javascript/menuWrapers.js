$(document).ready(function () {
	alignWrapers();
});

function alignWrapers() {
	//Mesures
	var width = $(window).width();
	//On calcule la bordure
	var border = ((width-990)/2)-15;
	//Alignement
	$('#leftWrap').css('margin-left', border);
	$('#rightWrap').css('margin-right', border);
}