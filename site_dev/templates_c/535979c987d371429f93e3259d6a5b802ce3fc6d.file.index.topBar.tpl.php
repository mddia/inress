<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 11:35:24
         compiled from "templates/index.topBar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11797785114faf805ce70689-94773443%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '535979c987d371429f93e3259d6a5b802ce3fc6d' => 
    array (
      0 => 'templates/index.topBar.tpl',
      1 => 1332797610,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11797785114faf805ce70689-94773443',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'inreesId' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4faf805ce7e74',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faf805ce7e74')) {function content_4faf805ce7e74($_smarty_tpl) {?><div class="toolBarFrame">
	<div class="toolBarContent">
		<?php if (($_smarty_tpl->tpl_vars['inreesId']->value)==0){?>
			<a href="#">Créer votre compte »</a> | <a href="Login">Connectez-vous »</a>
		<?php }else{ ?>
			<a href="Profil">Voir mon profil</a> | <a href="logOut.php">Déconnexion</a>
		<?php }?>
		 | [RECHERCHER]
	</div>
</div><?php }} ?>