<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 17:58:35
         compiled from "templates/admin/pages/board.content.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8838521244fae88ab6d6d71-78794986%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '583f213171490ad4a33436e4aaa328a980af5390' => 
    array (
      0 => 'templates/admin/pages/board.content.tpl',
      1 => 1334007801,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8838521244fae88ab6d6d71-78794986',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab6f3fc',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab6f3fc')) {function content_4fae88ab6f3fc($_smarty_tpl) {?><div id="acp">
	<div class="panel">
		<span class="corners-top"><span></span></span>
		<div id="content">
			<?php echo $_smarty_tpl->getSubTemplate ("admin/pages/board.".($_smarty_tpl->tpl_vars['cat']->value).".leftMenu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<?php echo $_smarty_tpl->getSubTemplate ("admin/pages/board.".($_smarty_tpl->tpl_vars['cat']->value).".".($_smarty_tpl->tpl_vars['scat']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		<span class="corners-bottom"><span></span></span>
	</div>
</div><?php }} ?>