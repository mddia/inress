<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 11:27:32
         compiled from "templates/admin/pages/board.boutique.sentOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4296279184fae8f0168cfd2-27831436%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6d9ec535aee1901bbef7204374fa1ea5bb8ef975' => 
    array (
      0 => 'templates/admin/pages/board.boutique.sentOrders.tpl',
      1 => 1338422459,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4296279184fae8f0168cfd2-27831436',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae8f0176e02',
  'variables' => 
  array (
    'sentOrdersCount' => 0,
    'sentOrders' => 0,
    'order' => 0,
    'address' => 0,
    'delivery' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae8f0176e02')) {function content_4fae8f0176e02($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Boutique / Commandes envoyées</h6>
	<br /><hr /><br />


	<h1>Gestion des commandes</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	<div id="boardContent">
	<h3>Liste des <?php echo $_smarty_tpl->tpl_vars['sentOrdersCount']->value;?>
 commandes envoyées</h3><br />

		<table cellspacing="1" style="width:100%;">
			<thead>
			<tr>
				<th style="width:225px;">
					<strong>Facturée à</strong> 
					<a href="admin.php?cat=website&scat=gestioncommandes&limit=1&orderby=name">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:215px;">
					<strong>Expédiée à</strong>
				</th>
				<th>
					<strong>Commandes</strong>
				</th>
				<th style="width:75px;">
					<strong>Montant</strong> 
					<a href="admin.php?cat=website&scat=gestioncommandes&orderby=montant">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th>
					<strong>Envoi</strong> 
					<a href="admin.php?cat=website&scat=gestioncommandes&orderby=reglement">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:55px;">
					<strong>Edit</strong>
				</th>
			</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sentOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['addresses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
								<strong>
									<?php echo $_smarty_tpl->tpl_vars['address']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['name'];?>

								</strong><br />
								<?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>
<br />
								<?php echo $_smarty_tpl->tpl_vars['address']->value['zipCode'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
<br />
								<strong><?php echo $_smarty_tpl->tpl_vars['address']->value['country']['name'];?>
</strong><br />
								<br />
							<?php } ?>
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
<strong> envoyé</strong></i> 
									<?php }else{ ?>
										<i>Pas de mag à envoyer</i><br />
									<?php }?>
								<?php }?>
								(quantité : <strong><?php echo $_smarty_tpl->tpl_vars['delivery']->value['quantity'];?>
</strong>)<br />
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<?php if (($_smarty_tpl->tpl_vars['order']->value['refund']!='0')){?>
								<?php echo $_smarty_tpl->tpl_vars['order']->value['newValue'];?>
 €<br />
								<strong style="color: red;">
									<?php echo $_smarty_tpl->tpl_vars['order']->value['refundValue'];?>
 € remboursés
								</strong>
							<?php }else{ ?>
								<?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
 €
							<?php }?>
						</td>
						<td style="text-align: center;">
							<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)){?>
								<span style="color: red;">
									Non-envoyée
								</span>
							<?php }elseif(($_smarty_tpl->tpl_vars['order']->value['sent']==1)){?>
								<span style="color: green;">
									Envoyée
								</span>
							<?php }else{ ?>
								<span style="color: green;">
									Envoyée le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['sent'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

								</span>
							<?php }?>
						</td>
						<td style="text-align: center;">
							<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)){?><a onClick="setOrderAsSent(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
								<img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" alt="Valider envoi" title="Valider envoi" /></a>
							<?php }?>
							<?php if (($_smarty_tpl->tpl_vars['order']->value['paid']==0)){?><a onClick="setOrderAsPaid(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
								<img src="images/icons/money.png" alt="Valider paiement" title="Valider paiement" /></a>
							<?php }?>
							<a href="admin.php?cat=boutique&scat=macommande&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Editer commande" title="Editer commande" /></a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
			
		<br /><br /><br />
	</div>
</div><?php }} ?>