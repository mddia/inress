<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 00:06:41
         compiled from "templates/admin/pages/board.general.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3520939724fae88ab7056c7-26966677%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0408ba8e07d12df2f6aa5ec84de31ff9e45d1b08' => 
    array (
      0 => 'templates/admin/pages/board.general.leftMenu.tpl',
      1 => 1338933999,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3520939724fae88ab7056c7-26966677',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab71330',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab71330')) {function content_4fae88ab71330($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" title="Afficher/Cacher menu" onclick="switchMenu();"></a>
</div>
<div id="menu" class="visible">
	<ul>
		<li class="header">Index</li>
		<li>
			<a href="admin.php?cat=general&scat=gestionModerateurs">
				<span>Gestion des modérateurs</span>
			</a>
		</li>
		<li class="header">Exports</li>
		<li>
			<a href="admin.php?cat=query&scat=exportAllEmails" target="_blank">
				<span>Exporter tous les emails</span>
			</a>
		</li>
	</ul>
</div><?php }} ?>