<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 03:29:35
         compiled from "templates/admin/pages/board.reseau.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18848209914fc6c96a47ea96-60073534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '894a1b5674f8e80df074ed7517ec1e82b11de068' => 
    array (
      0 => 'templates/admin/pages/board.reseau.leftMenu.tpl',
      1 => 1338427772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18848209914fc6c96a47ea96-60073534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc6c96a4afe9',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc6c96a4afe9')) {function content_4fc6c96a4afe9($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Fils de discussion</li>
		<li><a href="admin.php?cat=reseau&scat=newThread"><span>Nouvelle discussion</span></a></li>
		<hr />
		<li><a href="admin.php?cat=reseau&scat=index"><span>Liste des discussions</span></a></li>
	</ul>
</div><?php }} ?>