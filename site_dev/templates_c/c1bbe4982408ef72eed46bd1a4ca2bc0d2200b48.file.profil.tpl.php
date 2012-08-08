<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 12:09:20
         compiled from "templates/profil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16934655794fc74350a9d2b3-12920677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c1bbe4982408ef72eed46bd1a4ca2bc0d2200b48' => 
    array (
      0 => 'templates/profil.tpl',
      1 => 1332797617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16934655794fc74350a9d2b3-12920677',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'addresses' => 0,
    'address' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc74350b1dda',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc74350b1dda')) {function content_4fc74350b1dda($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_orderby')) include 'smarty/libs/plugins/modifier.orderby.php';
?><?php echo $_smarty_tpl->getSubTemplate ('inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Mon profil - <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
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
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Vos adresses</h1>
						</div>
						<div style="margin-top: 30px;" id="addressesList">
							<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['addresses']->value,"-defaultAddress"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
								- <?php echo $_smarty_tpl->tpl_vars['address']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['name'];?>
 : <?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>
 <?php if (($_smarty_tpl->tpl_vars['address']->value['defaultAddress'])==1){?><span style="font-weight: bold;">(Adresse par défaut)</span><?php }else{ ?><a onClick="setDefault(<?php echo $_smarty_tpl->tpl_vars['address']->value['id'];?>
);">[setDefault]</a><?php }?><br />
							<?php } ?>
						</div>
						<div style="margin-top: 30px; padding: 10px; background-color: #EEEEEE;">
							Ajouter une adresse :<br />
							<br />
							<label>Prénom : </label><input type="text" name="addressFirstName" id="addressFirstName" /><br />
							<label>Nom : </label><input type="text" name="addressName" id="addressName" /><br />
							<label>Addresse : </label><input type="text" name="address1" id="address1" /><br />
							<label>Addresse 2 : </label><input type="text" name="address2" id="address2" /><br />
							<label>Addresse 3 : </label><input type="text" name="address3" id="address3" /><br />
							<label>City : </label><input type="text" name="addressCity" id="addressCity" /><br />
							<label>zipCode : </label><input type="text" name="addressZipCode" id="addressZipCode" /><br />
							<label>country : </label><input type="text" name="addressCountry" id="addressCountry" /><br />
							<br />
							<input type="button" value="Ajouter" onClick="addAddress();" /><br />
							<br />
						</div>
					</div>
					<div class="mbonus">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }} ?>