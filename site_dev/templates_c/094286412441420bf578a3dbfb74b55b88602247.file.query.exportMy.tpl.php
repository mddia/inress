<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 14:45:01
         compiled from "templates/admin/pages/query.exportMy.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18960491544fbb8a4d27bfc5-12689135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '094286412441420bf578a3dbfb74b55b88602247' => 
    array (
      0 => 'templates/admin/pages/query.exportMy.tpl',
      1 => 1335490293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18960491544fbb8a4d27bfc5-12689135',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'myPayants' => 0,
    'my' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb8a4d2d5cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb8a4d2d5cf')) {function content_4fbb8a4d2d5cf($_smarty_tpl) {?><table cellspacing="1" style="width:100%;">
	<thead>
		<tr>
			<th style="text-align: left;">ID</th>
			<th style="text-align: left;">Nom</th>
			<th style="text-align: left;">Prénom</th>
			<th style="text-align: left;">Adresse 1</th>
			<th style="text-align: left;">Adresse 2</th>
			<th style="text-align: left;">Adresse 3</th>
			<th style="text-align: left;">Postal</th>
			<th style="text-align: left;">Ville</th>
			<th style="text-align: left;">Pays</th>
		</tr>
	</thead>
	<tbody>
		<?php  $_smarty_tpl->tpl_vars['my'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['my']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myPayants']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['my']->key => $_smarty_tpl->tpl_vars['my']->value){
$_smarty_tpl->tpl_vars['my']->_loop = true;
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['user']['id'];?>
</td>
				<td><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['name'];?>
</span></td>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['firstName'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['address1'];?>
</td>
				<td><?php if (($_smarty_tpl->tpl_vars['my']->value['address']['address2']!='0')){?><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['address2'];?>
<?php }?></td>
				<td><?php if (($_smarty_tpl->tpl_vars['my']->value['address']['address3']!='0')){?><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['address3'];?>
<?php }?></td>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['zipCode'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['city'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['my']->value['address']['country']['name'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>