<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 15:11:36
         compiled from "templates/admin/pages/query.unsentOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:883338284fc4cb08d907f4-93652402%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49c65cbb022bdcc30b1075b1ac54005041ff066f' => 
    array (
      0 => 'templates/admin/pages/query.unsentOrders.tpl',
      1 => 1336645579,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '883338284fc4cb08d907f4-93652402',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'byDeliveryUnsent' => 0,
    'delivery' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc4cb08e208f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc4cb08e208f')) {function content_4fc4cb08e208f($_smarty_tpl) {?><strong>Module d'étiquettes pour les commandes à envoyer</strong>
<br /><br />
<table cellspacing="1" style="width:100%;">
	<thead>
		<tr>
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
		<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['byDeliveryUnsent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
?>
			<tr>
				<td><span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['name'];?>
</span></td>
				<td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['firstName'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address1'];?>
</td>
				<td>
					<?php if (($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='0')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='undefined')){?>
						<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address2'];?>

					<?php }?>
				</td>
				<td>
					<?php if (($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='0')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='undefined')){?>
						<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address3'];?>

					<?php }?>
				</td>
				<td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['zipCode'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['city'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['country']['name'];?>
</td>
			</tr>
		<?php } ?>
	</tbody>
</table><?php }} ?>