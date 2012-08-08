<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 01:07:39
         compiled from "templates/admin/inc.javascript.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17578266184fae88ab61b426-28409271%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3ab1030990b1e89770e5567cae9526d349148a3a' => 
    array (
      0 => 'templates/admin/inc.javascript.tpl',
      1 => 1338937658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17578266184fae88ab61b426-28409271',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab638b1',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab638b1')) {function content_4fae88ab638b1($_smarty_tpl) {?><script type="text/javascript" src="libs/javascript/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="libs/javascript/jquery-ui-1.8.16.min.js"></script>
<script type="text/javascript" src="libs/javascript/jquery.simplemodal.1.4.1.min.js"></script>
<script type="text/javascript" src="libs/ajax/admin.squareBan.js"></script>
<script type="text/javascript" src="libs/ajax/admin.categories.js"></script>
<script type="text/javascript" src="libs/ajax/admin.families.js"></script>
<script type="text/javascript" src="libs/ajax/admin.products.js"></script>
<script type="text/javascript" src="libs/ajax/admin.productsType.js"></script>
<script type="text/javascript" src="libs/ajax/admin.delivery.js"></script>
<script type="text/javascript" src="libs/ajax/admin.promoCodes.js"></script>
<script type="text/javascript" src="libs/ajax/admin.tags.js"></script>
<script type="text/javascript" src="libs/ajax/admin.labels.js"></script>
<script type="text/javascript" src="libs/ajax/admin.topics.js"></script>
<script type="text/javascript" src="libs/ajax/admin.orders.js"></script>
<script type="text/javascript" src="libs/ajax/admin.messages.js"></script>
<script type="text/javascript" src="libs/ajax/admin.user.js"></script>
<script type="text/javascript" src="libs/ajax/admin.testimony.js"></script>
<script type="text/javascript" src="libs/ajax/admin.addOrder.js"></script>


<script type="text/javascript">

//displayThread
function displayThread(threadId) {
	//Vars
	var actualDisplay = $('#displayedThread').val();
	//Display change
	$('#displayedThread').val(threadId)
	//CSS
	$('#threadLink'+actualDisplay).removeClass('bold');
	$('#threadLink'+threadId).addClass('bold');
	$('#thread'+actualDisplay).addClass('hidden');
	$('#thread'+threadId).removeClass('hidden');
}

//findFusionUser
function findFusionUser() {
	//Autocomplete
	$("#userName").autocomplete({
		source: "ajaxActions.php?formName=listSubscribers&limit=5",
		minLength: 2,
		select: function(event, ui) {
			//Création variable
			var userName = '<strong>'+ui.item.id+'</strong> - <span style="text-transform: uppercase;">'+ui.item.nom+'</span> '+ui.item.prenom;
			//Transmission
			$('#fusionUserId').val(ui.item.id);
			$('#userNameDisplay').html(userName+' (<a onClick="resetFusionField();">changer</a>)');
			$('#userNameInput').html('');
			//Display de la barre d'adresses de l'utilisateur en fonction du boxCount
		}
	}).data('autocomplete')._renderItem = function(ul, item) {
		return $('<li style="background-color: #FFFFFF; width: 155px; list-style: none; border-bottom: 1px solid red;"></li>')
		.data( "item.autocomplete", item )
		.append( "<a style='font-size: 13px;'><div style='width: 155px; float: left; background-color: #FFFFFF; padding: 5px; border-left: 1px solid #536482; border-right: 1px solid #536482;'>"+item.nom+" "+item.prenom+" ("+item.id+")</div></a>" )
		.appendTo( ul );
	};
}

//resetFusionField
function resetFusionField() {
	//New display
	$('#userNameInput').html('<input type="text" name="userName" id="userName" style="border: 0px; background-color: transparent; border-bottom: 2px solid #536482;" onKeyUp="findFusionUser()" autocomplete="off" />');
	$('#userNameDisplay').html('');
	//Reset vars
	$('#fusionUserId').val(0);
}

//deleteUser
function deleteUser(id) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Attention<br /><br />Cette action est irréversible</strong><br /><br />Souhaitez-vous vraiment supprimer cet utilisateur ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					//ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteUser&id="+id,
					success: function() {
						$(location).attr('href', 'admin.php?cat=membres&scat=RRapid');
					}
				});
			});
		}
	});
}

//deleteActivityType
function deleteActivityType(id) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Attention<br /><br />Cette action est irréversible</strong><br /><br />Souhaitez-vous vraiment supprimer ce type d\'activité ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					//ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteActivityType&id="+id,
					success: function() {
						location.reload();
					}
				});
			});
		}
	});
}

//deleteLocaux
function deleteLocaux(id) {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Attention<br /><br />Cette action est irréversible</strong><br /><br />Souhaitez-vous vraiment supprimer ces locaux ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					//ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteLocaux&id="+id,
					success: function() {
						location.reload();
					}
				});
			});
		}
	});
}

//switchDisplay
function switchThirdDisplay(div1, div2, div3) {
	//On regarde si le div1 est caché
	if ( $('#'+div1+'Button').hasClass("bold") ) {}
	else {
		//Nouvel affichage
		$('#'+div1).removeClass("hidden");
		$('#'+div2).addClass("hidden");
		$('#'+div3).addClass("hidden");
		//Boutons
		$('#'+div1+'Button').addClass("bold");
		$('#'+div2+'Button').removeClass("bold");
		$('#'+div3+'Button').removeClass("bold");
	}
}

//displayFamilyProducts
function displayFamilyProducts(target, familyId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=displayFamilyProducts&target="+target+"&familyId="+familyId,
		success: function(result) {
			//Eval du contenu
			var list = eval('('+result+')');
			
			//content
			var content = '';
			var td = 1;
			
			//Boucle
			for (var i = 0; i < list.length ; i++ ) {
				if (td == 1) {
					content = content+'<tr class="row1">';
					td = 2;
				}
				else {
					content = content+'<tr class="row2">';
					td = 1;
				}
				content = content+'<td><a href="admin.php?cat=membres&scat=membres&id='+list[i].user.id+'"><font style="text-transform:uppercase;font-weight:bold;">'+list[i].user.nom+'</font> <font style="text-transform:lowercase;text-transform:capitalize;">'+list[i].user.prenom+'</font></a></td><td><span id="orderDetailsField'+list[i].id+'"></span></td><td style="text-align: center;">'+list[i].value+' €</td><td style="text-align: center;">';
				
				//Vérif paid
				if (list[i].paid == 0) {
					content = content+'<span style="color: red;">Non-payé</span>';
				}
				else if (list[i].paid == 1) {
					content = content+'<span style="color: green;">Payé</span>';
				}
				
				//Suite content
				content = content+'</td><td style="text-align: center;">';
				
				//Vérif actions
				if (list[i].sent == 0) {
					content = content+'<a onClick="setOrderAsSent('+list[i].id+');"><img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" alt="Valider envoi" title="Valider envoi" /></a> ';
				}
				if (list[i].paid == 0) {
					content = content+'<a onClick="setOrderAsPaid('+list[i].id+');"><img src="images/icons/money.png" alt="Valider paiement" title="Valider paiement" /></a>';
				}
				
				//suite content
				content = content+'<a href="admin.php?cat=boutique&scat=macommande&id='+list[i].id+'"><img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Editer commande" title="Editer commande" /></a></td></tr>';
			}
			
			//Frame
			var frame = '<table cellspacing="1" style="width:100%;"><thead><tr><th style="width:225px;"><strong>Facturé à</strong></th><th><strong>Commandes</strong></th><th style="width:75px;"><strong>Montant</strong></th><th><strong>Règlement</strong></th><th style="width:55px;"><strong>Edit</strong></th></tr></thead><tbody>'+content+'</tbody></table>';
			
			//Transmission html
			$('#whereIdisplay').html(frame);
		}
	});
}

//showMeThatOrder
function showMeThatOrder(target, familyId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=displayFamilyProducts&target="+target+"&familyId="+familyId,
		success: function(result) {
			//Eval du contenu
			var order = eval('('+result+')');
			
			//Boucle
			for (var i = 0; i < order.length ; i++ ) {
				sendOrderToDisplay(order[i].id);
			}
		}
	});
}

//sendOrderToDisplay
function sendOrderToDisplay(orderId) {
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=getOrderDetails&orderId="+orderId,
		success: function(result) {
			//Eval du contenu
			var order = eval('('+result+')');
			
			//Var			
			var content = '';
			
			//Boucle
			for (var i = 0; i < order.deliveries.length ; i++ ) {
				//Incrémentation
				content = content+'<strong>'+order.deliveries[i].item.title+'</strong><br />(quantité : <strong>'+order.deliveries[i].quantity+'</strong>)<br />';
			}
			
			//Transmission html
			$('#orderDetailsField'+orderId).html(content);
		}
	});
}

//switchDisplay
function switchDisplay(div1, div2) {
	//On regarde si le div1 est caché
	if ( $('#'+div1).hasClass("hidden") ) {
		//On retire la classe hidden
		$('#'+div1).removeClass("hidden");
		//On cache le div2
		$('#'+div2).addClass("hidden");
		//On inverse l'affichage des boutons
		$('#'+div1+'Button').addClass("bold");
		$('#'+div2+'Button').removeClass("bold");
	}
	else {
		//On retire la classe hidden
		$('#'+div2).removeClass("hidden");
		//On cache le div2
		$('#'+div1).addClass("hidden");
		//On inverse l'affichage des boutons
		$('#'+div2+'Button').addClass("bold");
		$('#'+div1+'Button').removeClass("bold");
	}
}

//getRootHistory(target)
function getRootHistory(gratuit) {
	//magId
	var numero = $('#numero').val();
	var aboId = $('#aboId').val();
	//Vérif
	if (numero != 0) {
		window.open('admin.php?cat=query&scat=getHistory&numero='+numero+'&aboId='+aboId+'&gratuit='+gratuit);
	}
	else {
		$('#numero').css('border', '1px solid red');
	}
}

//updateSelectAboId
function updateSelectAboId(aboId) {
	$('#aboId').val(aboId);
}

//recordNewMag
function recordNewMag() {
	//Récupération des variables
	var aboId = $('#aboId').val();
	var numero = $('#numero').val();
	var titre = $('#titre').val();
	var actif = $('#actif').val();
	var online = $('#online').val();
	var JJ = $('#JJ').val();
	var MM = $('#MM').val();
	var AAAA = $('#AAAA').val();
	//Traitement Ajax
	$.ajax({
		//ajaxStart: load(),
		type: "POST",
		url: "actions.php",
		data: "formName=recordNewMag&numero="+numero+"&titre="+titre+"&actif="+actif+"&online="+online+"&aboId="+aboId+"&JJ="+JJ+"&MM="+MM+"&AAAA="+AAAA,
		success: function(result) {
			//alert(result);
			location.reload();
		}
	});
}

//listRoutage
function listRoutage() {
	$('<div style="background-color: #EEEEEE; border: 1px solid #CCCCCC; width: 280px; height: 150px; text-align: center; padding: 10px;"><strong>Attention<br /><br />Cette action est irréversible</strong><br /><br />Souhaitez-vous vraiment mettre à jour la liste de routage ?<br /><br /><input type="button" class="confirm" value="Mettre à jour" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;" /></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on éxécute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					//ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=updateRoutage",
					success: function() {
						//location.reload();
						$(location).attr('href', 'admin.php?cat=boutique&scat=routageList');
					}
				});
			});
		}
	});
}

//actionSearch Subscriber
function actionSearch(target) {
	//Recherche en fonction de la target
	if (target == 'subscriber') {
		//Keyword
		var keyword = $("#subscriberLiveSearch").val();
		//Vérif
		if (keyword != '') {
			//Traitement Ajax
			$.ajax({
				ajaxStart: load(),
				type: "GET",
				url: "ajaxActions.php",
				data: "formName=listSubscribers&term="+keyword,
				success: function(retour) {
					//Eval du contenu
					var item = eval('('+retour+')');
					
					//Création variable
					var content = '';
					
					//Boucle
					for (var i = 0; i < item.length ; i++ ){
						content = content + "<a href='admin.php?cat=membres&scat=membres&id="+item[i].id+"'>"+item[i].prenom+" "+item[i].nom+" - "+item[i].email+" - ("+item[i].id+")</a><br />"
					}
					
					//Transmission
					$("#LSShadow").html(content);
				}
			});
		}
		else {
			//Réinitialisation html
			$("#LSShadow").html('');
		}
	}
	else if (target == 'partner') {
		//Keyword
		var keyword = $("#partnerLiveSearch").val();
		//Vérif
		if (keyword != '') {
			//Traitement Ajax
			$.ajax({
				ajaxStart: load(),
				type: "GET",
				url: "ajaxActions.php",
				data: "formName=listPartners&term="+keyword,
				success: function(retour) {
					//Eval du contenu
					var item = eval('('+retour+')');
					
					//Création variable
					var content = '';
					
					//Boucle
					for (var i = 0; i < item.length ; i++ ){
						content = content + "<a href='admin.php?cat=partenaires&scat=partner&id="+item[i].id+"'><strong>- "+item[i].nom+"</strong></a><br />"
					}
					
					//Transmission
					$("#LSShadow").html(content);
				}
			});
		}
		else {
			//Réinitialisation html
			$("#LSShadow").html('');
		}
	}
}

<!-- Load ajax pour admin -->
function load() {
	//Mesures
	var width = $(window).width();
	var height = $(window).height();
	//New width
	var left = (width / 2) - 150;
	var top = (height / 2) - 50;
	//CSS
	$('#loadAjax').css('top', top+'px');
	$('#loadAjax').css('left', left+'px');
	//Apparition
	$('#loadAjax').fadeIn('fast');
}

function unload() {
	$('#loadAjax').fadeOut('fast');
}

<!-- switchMenu -->
function switchMenu() {
	//On regarde si le menu est affiché or not
	if ($('#menu').hasClass('visible')) {
		var menuState = 'visible';
	}
	else {
		var menuState = 'hidden';
	}
	//Boucle de vérification
	switch (menuState) {
	// hide
	case 'visible':
		//On agrandit la zone de contenu
		$('#main').css('width', '93%');
		//Gestion menu
		$('#menu').removeClass('visible')
		$('#menu').addClass('hidden')
		$('#menu').css('display', 'none');
		$('#toggle').css('width', '20px');
		$('#toggle').css('left', '0');
		//Changement icone
		$('#toggle-handle').css('background-image', 'url(http://admin.inrees.com/adm/images/toggle.gif)');
		$('#toggle-handle').css('background-repeat', 'no-repeat');
		$('#toggle-handle').css('background-position', '100% 50%');
		break;
	// show
	case 'hidden':
		//On agrandit la zone de contenu
		$('#main').css('width', '76%');
		//Gestion menu
		$('#menu').removeClass('hidden')
		$('#menu').addClass('visible')
		$('#menu').css('display', 'block');
		$('#toggle').css('width', '5%');
		$('#toggle').css('left', '185px');
		//Changement icone
		$('#toggle-handle').css('background-image', 'url(http://admin.inrees.com/adm/images/toggle.gif)');
		$('#toggle-handle').css('background-repeat', 'no-repeat');
		$('#toggle-handle').css('background-position', '0% 50%');
		break;
	}
}

//supprimerMagArticle
function supprimerMagArticle(id) {
	//Boite de confirmation
	$('<div class="modal" style="width: 320px; height: 120px; text-align: center; background-color: #EEEEEE; border: 2px solid #536482; padding: 10px;"><strong>Attention</strong><br /><br />Cet article sera supprimÃ© dÃ©finitivement. Souhaitez-vous continuer ?<br /><br /><input type="button" class="confirm" value="Supprimer" style="cursor: pointer; margin: 5px;" /><input type="button" class="simplemodal-close" value="Annuler" style="cursor: pointer; margin: 5px;"/></div>').modal({
		overlayClose: true,
		onShow: function () {
			//Click sur confirm on execute Ajax
			$('.confirm').click(function () {
				//Traitement Ajax
				$.ajax({
					ajaxStart: load(),
					type: "POST",
					url: "actions.php",
					data: "formName=deleteMagArticle&articleId="+id,
					success: function() {
						//Reload page
						location.reload();
					},
				});
			});
		}
	});
}

</script>


<style>
.colorSquare {
	width: 12px;
	height: 12px;
	float: left;
	margin: 2px;
	cursor: pointer;
}

.label {
	padding: 3px;
	min-width: 10px;
	float: left;
	margin: 3px 3px 0px 0px;
	color: #000000;
}
</style>
<?php }} ?>