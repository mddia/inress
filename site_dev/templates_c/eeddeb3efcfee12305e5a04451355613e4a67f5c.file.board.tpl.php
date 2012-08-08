<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 17:58:35
         compiled from "templates/admin/board.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12621636544fae88ab54aae9-44885725%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eeddeb3efcfee12305e5a04451355613e4a67f5c' => 
    array (
      0 => 'templates/admin/board.tpl',
      1 => 1330663772,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12621636544fae88ab54aae9-44885725',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae88ab59cb8',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae88ab59cb8')) {function content_4fae88ab59cb8($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('admin/inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('admin/inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Administration - <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	</head>
	<body>
		<div id="wrap">
			<?php echo $_smarty_tpl->getSubTemplate ('admin/pages/board.topInfos.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			<!--  -->
			<div id="page-body">
				<?php echo $_smarty_tpl->getSubTemplate ('admin/pages/board.menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				<?php echo $_smarty_tpl->getSubTemplate ("admin/pages/board.content.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
				
			</div>
			<?php echo $_smarty_tpl->getSubTemplate ('admin/pages/board.footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
	</body>
</html><?php }} ?>