<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 23:55:13
         compiled from "templates/admin/pages/board.membres.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17935885374fb02dc17485d6-30733873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd57ded455953e660668ff172d8616230cf21c459' => 
    array (
      0 => 'templates/admin/pages/board.membres.leftMenu.tpl',
      1 => 1335258931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17935885374fb02dc17485d6-30733873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb02dc177fcf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb02dc177fcf')) {function content_4fb02dc177fcf($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">
			Recherche
		</li>
		<li>
			<a href="admin.php?cat=membres&amp;scat=RRapid">
				<span>
					Recherche rapide
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=membres&amp;scat=rechercherid">
				<span>
					Rechercher un ID
				</span>
			</a>
		</li>
		<li class="header">
			Gestion des contacts
		</li>
		<li>
			<a href="admin.php?cat=membres&amp;scat=ajoutcontact">
				<span>
					Ajouter un nouvel email
				</span>
			</a>
		</li>
	</ul>
</div><?php }} ?>