<?php /* Smarty version Smarty-3.1.7, created on 2012-05-14 00:35:59
         compiled from "templates/panier.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5859046994fb0374fc02463-36249710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f7405ef7efc806d9b4cdcc519ee6ba9c6c4b7e13' => 
    array (
      0 => 'templates/panier.tpl',
      1 => 1332797614,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5859046994fb0374fc02463-36249710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'cartValue' => 0,
    'fullCart' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb0374fc7cd6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb0374fc7cd6')) {function content_4fb0374fc7cd6($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Votre panier - <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	</head>
	<body>
		<!-- Top ToolBar -->
		<div id="toolBar">
			<?php echo $_smarty_tpl->getSubTemplate ('index.topBar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		<div>
			<div class="container">
				<div class="ban">
					<?php echo $_smarty_tpl->getSubTemplate ('index.navBar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			
				<!-- Menu -->
				<div id="_body" style="margin-top: 25px;">
					<?php echo $_smarty_tpl->getSubTemplate ('index.menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>   <!--// _id body-->
				<!-- / MENU -->
				<div class="home" style="min-height: 600px;">
					<div class="repererb"></div>
					<div class="magThemes" style="margin-bottom:15px;">
					</div>
					<div class="mbig" style="background-color: ;">
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg'); margin-bottom: 50px;">
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Votre panier</h1>
						</div>
						<div id="orderBlock" style="background-color: #F3F5F7; width: 300px; margin: auto; margin-bottom: 10px; padding: 10px; text-align: justify; display: none; border: 1px solid #666666; overflow: auto;"></div>
						<div style="background-color: #F3F5F7; width: 300px; margin: auto; padding: 10px;">
							<!-- Vérification que le panier est rempli -->
							<?php if (($_smarty_tpl->tpl_vars['cartValue']->value!=0)){?>
							<span style="font-weight: bold;">Voici le récapitulatif de votre commande :</span><br />
								<br />
								<div id="panier">
									<table>
										<?php  $_smarty_tpl->tpl_vars['cart'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cart']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['fullCart']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cart']->key => $_smarty_tpl->tpl_vars['cart']->value){
$_smarty_tpl->tpl_vars['cart']->_loop = true;
?>
											<tr>
												<th style="font-weight: normal; text-align: left; width: 200px;">
													- <?php echo $_smarty_tpl->tpl_vars['cart']->value['item']['title'];?>

												</th>
												<th style="font-weight: bold; width: 24px; text-align: left;">
													x<?php echo $_smarty_tpl->tpl_vars['cart']->value['quantity'];?>

												</th>
												<th><a onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['cart']->value['itemId'];?>
,1)"><img src="images/icons/delete.png" alt="Remove" style="margin-bottom: -4px; cursor: pointer;" title="Réduire quantité de 1" /></a><a onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['cart']->value['itemId'];?>
,1)"><img src="images/icons/add.png" alt="Add" style="margin-bottom: -4px; cursor: pointer;" title="Augmenter quantité de 1" /></a><a onclick="deleteFromCart(<?php echo $_smarty_tpl->tpl_vars['cart']->value['itemId'];?>
,1)"><img src="images/icons/bin_empty.png" alt="Delete" style="margin-bottom: -3px; cursor: pointer;" title="Supprimer du panier" /></a></th>
											</tr>
										<?php } ?>
									</table>
								</div>
								<!-- <table style="margin-top: 20px; width: 290px;">
									<tr>
										<th style="text-align: right;">
											<form action="">
												Possédez-vous un code promo : <input type="text" name="promoCode" id="promoCode" /> <input type="button" value="Go" onclick="getPromoCode()" />
											</form>
										</th>
									</tr>
								</table>
								<span id="promoSpace"></span>-->
								<table style="margin-top: 8px; border-top: 1px dotted black; width: 290px;">
									<tr>
										<th style="text-align: right;">
											Montant total : <span id="cartValue"><?php echo $_smarty_tpl->tpl_vars['cartValue']->value;?>
</span> €
										</th>
									</tr>
								</table>
								<table style="margin-top: 8px;width: 290px;">
									<tr>
										<th style="text-align: right;">
											<input type="button" value="Valider ma commande" onClick="finalizeOrder();" />
										</th>
									</tr>
								</table>
								<!--<a style="cursor: pointer;" onclick="checkCartContent();">[Vérification du contenu]</a>-->
							<?php }else{ ?>
								<div style="text-align: justify;">
									Aucun produit ne se trouve actuellement dans votre panier.<br />
									<br />
								</div>
								<div style="text-align: right;">
									<a href="Boutique">Retourner à la boutique</a>
								</div>
							<?php }?>
						</div>
					</div>
					<div class="mbonus">
						Présentation habituelle..
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }} ?>