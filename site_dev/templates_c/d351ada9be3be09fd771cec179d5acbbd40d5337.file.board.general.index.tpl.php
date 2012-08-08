<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 17:58:35
         compiled from "templates/admin/pages/board.general.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4243083214fae88ab724936-96235347%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd351ada9be3be09fd771cec179d5acbbd40d5337' => 
    array (
      0 => 'templates/admin/pages/board.general.index.tpl',
      1 => 1334007801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4243083214fae88ab724936-96235347',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'SESSION' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab741fe',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab741fe')) {function content_4fae88ab741fe($_smarty_tpl) {?><div id="main">
	<a name="maincontent"></a>
	<h6>Général / Index</h6>
	<br /><hr /><br />
	<h1>Bienvenue sur le module de l'INREES</h1><br />
	Bienvenue <strong><?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['name'];?>
</strong> sur le module d'administration de l'INREES.<br /><br /><br />
</div><?php }} ?>