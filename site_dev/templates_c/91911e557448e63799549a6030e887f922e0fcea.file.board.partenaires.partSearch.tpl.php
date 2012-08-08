<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 11:44:38
         compiled from "templates/admin/pages/board.partenaires.partSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4598495884fc73d864a6cc1-94679900%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91911e557448e63799549a6030e887f922e0fcea' => 
    array (
      0 => 'templates/admin/pages/board.partenaires.partSearch.tpl',
      1 => 1334007808,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4598495884fc73d864a6cc1-94679900',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc73d864cfe5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc73d864cfe5')) {function content_4fc73d864cfe5($_smarty_tpl) {?><div id="main">
	<h6>Partenaires / Recherche</h6>
	<br /><hr /><br />

	<h1>Rechercher un partenaire</h1><br />


	Rechercher un partenaire de l'INREES.
	<br /><br />

	<form action="" name="searchform" method="post">
		<input type="text" id="partnerLiveSearch" style="width:295px;" onKeyUp="actionSearch('partner')" />
	</form><br /><br /><hr />
	<div id="LSResult"><div id="LSShadow"></div></div>

	<br /><br /><br />
</div><?php }} ?>