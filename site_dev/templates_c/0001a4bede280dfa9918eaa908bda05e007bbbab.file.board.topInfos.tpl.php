<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 17:58:35
         compiled from "templates/admin/pages/board.topInfos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17872197914fae88ab64a810-14525612%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0001a4bede280dfa9918eaa908bda05e007bbbab' => 
    array (
      0 => 'templates/admin/pages/board.topInfos.tpl',
      1 => 1334007808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17872197914fae88ab64a810-14525612',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SESSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab66780',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab66780')) {function content_4fae88ab66780($_smarty_tpl) {?><!-- Logo INREES -->
<a href="index.php">
	<img style="position:absolute;left:175px;top:0px;" src="http://admin.inrees.com/adm/images/admin-logo.jpg" />
</a>
<!-- Left Log Bar -->
<div id="page-header">
	<h1>INREES - Administration Control Panel</h1>
	<p><font color="#F3F3F3">Bienvenue <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>
 • <a href="adminExit.php">Se déconnecter</a>
	<br /></font>
	</p>
</div><?php }} ?>