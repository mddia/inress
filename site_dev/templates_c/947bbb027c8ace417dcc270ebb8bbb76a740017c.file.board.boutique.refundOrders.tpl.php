<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 02:01:54
         compiled from "templates/admin/pages/board.boutique.refundOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1257395384fafb2cd8a2884-89250135%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '947bbb027c8ace417dcc270ebb8bbb76a740017c' => 
    array (
      0 => 'templates/admin/pages/board.boutique.refundOrders.tpl',
      1 => 1338422512,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1257395384fafb2cd8a2884-89250135',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fafb2cd91ff9',
  'variables' => 
  array (
    'refundOrdersCount' => 0,
    'refundOrders' => 0,
    'order' => 0,
    'delivery' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fafb2cd91ff9')) {function content_4fafb2cd91ff9($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Boutique / Commandes remboursées</h6>
	<br /><hr /><br />

	<h1>Commandes remboursées</h1><br />

	Affichages de toutes les commandes remboursées
	<br /><br />
	<div id="boardContent">
		<h3>Liste des <?php echo $_smarty_tpl->tpl_vars['refundOrdersCount']->value;?>
 commande(s) remboursées</h3><br />
		<br /><hr /><br />
		<table cellspacing="1" style="width:100%;">
			<thead>
				<tr>
					<th style="width:225px;">
						<strong>Facturé à</strong>
					</th>
					<th>
						<strong>Commandes</strong>
					</th>
					<th style="width:75px;">
						<strong>Montant</strong>
					</th>
					<th>
						Remboursement
					</th>
					<th>
						<strong>Action</strong>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['refundOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
						<td>
							<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['user']['id'];?>
">
								<font style="text-transform:uppercase;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['order']->value['user']['nom'];?>
</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['order']->value['user']['prenom'];?>
</font>
							</a>
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['deliveries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
?>
								<strong><?php echo $_smarty_tpl->tpl_vars['delivery']->value['item']['title'];?>
</strong><br />
								<?php if (($_smarty_tpl->tpl_vars['delivery']->value['item']['subscription']==1)){?>
									<?php if (($_smarty_tpl->tpl_vars['delivery']->value['startMag']!='0')){?>
										<i><?php echo $_smarty_tpl->tpl_vars['delivery']->value['startMag'];?>
</i>
									<?php }?>
								<?php }?>
								(quantité : <strong><?php echo $_smarty_tpl->tpl_vars['delivery']->value['quantity'];?>
</strong>)<br />
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<?php echo $_smarty_tpl->tpl_vars['order']->value['newValue'];?>
 €<br />
							<strong style="color: red;">
								<?php echo $_smarty_tpl->tpl_vars['order']->value['refundValue'];?>
 € remboursés
							</strong>
						</td>
						<td style="color: red; text-align: center;">
							<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['refund'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

						</td>
						<td style="text-align: center;">
							<a href="admin.php?cat=boutique&scat=macommande&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Voir commande" title="Voir commande" />
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>		
	</div>
</div><?php }} ?>