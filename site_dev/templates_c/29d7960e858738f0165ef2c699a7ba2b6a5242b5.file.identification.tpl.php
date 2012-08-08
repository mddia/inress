<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 11:35:40
         compiled from "templates/admin/identification.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19864228624faf806cdaab17-98221346%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29d7960e858738f0165ef2c699a7ba2b6a5242b5' => 
    array (
      0 => 'templates/admin/identification.tpl',
      1 => 1330662623,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19864228624faf806cdaab17-98221346',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4faf806cde2b0',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faf806cde2b0')) {function content_4faf806cde2b0($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('../inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
 - Accès privé</title>
	</head>
	<body>
		<br />
		<br />
		<center>
			<strong>Accès privé</strong><br />
			<form action="admin.php?cat=identification&scat=check" method="post">
				<table>
					<tr>
						<td align="right">Identifiant : </td>
						<td><input name="email" type="text" value=""></td>
					</tr>
					<tr>
						<td align="right">Password : </td>
						<td><input name="password" type="password" value=""></td>
					</tr>
					<tr>
						<td align="right"></td>
						<td><input name="confirm" type="submit" value="Valider"></td></tr>
				</table>
			</form>
		</center>
	</body>
</html><?php }} ?>