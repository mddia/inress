<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 14:45:01
         compiled from "templates/admin/query.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17561276044fbb8a4d21b412-42391101%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fa0aee41ec75242f584e465c5752aa348cde11de' => 
    array (
      0 => 'templates/admin/query.tpl',
      1 => 1334746002,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17561276044fbb8a4d21b412-42391101',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb8a4d26878',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb8a4d26878')) {function content_4fbb8a4d26878($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Requêtes - <?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	</head>
	<body>
		<?php echo $_smarty_tpl->getSubTemplate ("admin/pages/".($_smarty_tpl->tpl_vars['cat']->value).".".($_smarty_tpl->tpl_vars['scat']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</body>
</html><?php }} ?>