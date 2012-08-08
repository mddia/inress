<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 10:26:19
         compiled from "templates/admin/pages/board.budget.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10741941054fb2ddbdbbe0a6-60109941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8fe5121c53c124df41b0ab67838e1ed25c9f8f69' => 
    array (
      0 => 'templates/admin/pages/board.budget.leftMenu.tpl',
      1 => 1337675171,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10741941054fb2ddbdbbe0a6-60109941',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb2ddbdbff0f',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb2ddbdbff0f')) {function content_4fb2ddbdbff0f($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Rentrées</li>
		<li><a href="admin.php?cat=budget&scat=rentrees"><span>Journal des rentrées</span></a></li>
		<hr />
		<li><a href="admin.php?cat=budget&scat=ajoutrent"><span>Ajouter une rentrée</span></a></li>
		<li><a href="admin.php?cat=budget&scat=ajoutrentx"><span>Ajouter une facture (rentrée)</span></a></li>
	</ul>
</div><?php }} ?>