<?php /* Smarty version Smarty-3.1.7, created on 2012-05-14 00:35:35
         compiled from "templates/boutique.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15456929954fb03737d33988-49443557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e21224127804c43a289c23ef911b0a7d27b2949c' => 
    array (
      0 => 'templates/boutique.tpl',
      1 => 1332797604,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15456929954fb03737d33988-49443557',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'items' => 0,
    'item' => 0,
    'cartValue' => 0,
    'fullCart' => 0,
    'cart' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb03737de1dc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb03737de1dc')) {function content_4fb03737de1dc($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_orderby')) include 'smarty/libs/plugins/modifier.orderby.php';
?><?php echo $_smarty_tpl->getSubTemplate ('inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Boutique - <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
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
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Boutique INREES</h1>
						</div>
						<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['items']->value,"idProduit"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
							<div class="itemBox">
								<span class="itemType"><?php echo $_smarty_tpl->tpl_vars['item']->value['titreProduit'];?>
</span><br /><?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
<br />
								<br />								
								<?php if (($_smarty_tpl->tpl_vars['item']->value['prixPublic']!=$_smarty_tpl->tpl_vars['item']->value['prixAbonne'])){?>
									Prix public : <span class="itemPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['prixPublic'];?>
 €</span><br />
									Prix abonné : <span class="itemPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['prixAbonne'];?>
 €</span><br />
								<?php }else{ ?>
									Prix : <span class="itemPrice"><?php echo $_smarty_tpl->tpl_vars['item']->value['prixPublic'];?>
 €</span><br /><br >
								<?php }?>
								<br />
								<div class="itemDescription">
									<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>

								</div>
								<input type="button" value="Ajouter au panier" onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
,0)" />
							</div>
						<?php } ?>
					</div>
					<div class="mbonus">
						<h2>Votre panier</h2>
						<br />
						<div style="border: 1px dotted gray;padding: 4px" id="panier">
							<?php if (($_smarty_tpl->tpl_vars['cartValue']->value!=0)){?>
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
								<table style="margin-top: 8px; border-top: 1px dotted black; width: 290px;">
									<tr>
										<th style="text-align: right;">
											Montant total : <span id="cartValue"><?php echo $_smarty_tpl->tpl_vars['cartValue']->value;?>
</span> €
										</th>
									</tr>
								</table>
								<table style="margin-top: 14px; width: 290px;">
									<tr>
										<th style="text-align: right;">
											<a href="Panier">Voir mes achats  >></a>
										</th>
									</tr>
								</table>
							<?php }else{ ?>
								Votre panier est vide.
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }} ?>