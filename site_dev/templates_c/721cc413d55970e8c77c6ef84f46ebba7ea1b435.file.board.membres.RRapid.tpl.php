<?php /* Smarty version Smarty-3.1.7, created on 2012-05-14 11:12:07
         compiled from "templates/admin/pages/board.membres.RRapid.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7974099464fb0cc6769e4b3-70193651%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '721cc413d55970e8c77c6ef84f46ebba7ea1b435' => 
    array (
      0 => 'templates/admin/pages/board.membres.RRapid.tpl',
      1 => 1334007802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7974099464fb0cc6769e4b3-70193651',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb0cc676cb22',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb0cc676cb22')) {function content_4fb0cc676cb22($_smarty_tpl) {?><div id="main">
	<h6>Membres / Administration / Recherche</h6>
<br /><hr /><br />


<h1>Recherche rapide</h1><br />


<form name="searchform">Recherche rapide :
	<input type="text" id="subscriberLiveSearch" style="width:295px;" onKeyUp="actionSearch('subscriber')" />
	</form><br /><br /><hr />
	<div id="LSResult"><div id="LSShadow"></div></div>
</div><?php }} ?>