<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 11:27:38
         compiled from "templates/admin/pages/board.boutique.macommande.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8056508164fae8fb9abe2a2-50363656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d89472f5056a025aaea2bdc7f2ea901a94c8722' => 
    array (
      0 => 'templates/admin/pages/board.boutique.macommande.tpl',
      1 => 1338456403,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8056508164fae8fb9abe2a2-50363656',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae8fb9b99f7',
  'variables' => 
  array (
    'order' => 0,
    'config' => 0,
    'address' => 0,
    'delivery' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae8fb9b99f7')) {function content_4fae8fb9b99f7($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h1>Commande n°<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
</h1><br />

	Module destiné à gérer les commandes INREES.
	<br /><br />
	<div id="boardContent">
		<h3>Détails de la commande</h3><br />
		<?php if (($_smarty_tpl->tpl_vars['order']->value['refund']!=0)){?>
			<strong style="color: red;">Cette commande a été remboursée de <?php echo $_smarty_tpl->tpl_vars['order']->value['refundValue'];?>
 € le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['refund'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['refund'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>
</strong><br /><br />
		<?php }?>
		<table cellspacing="1" style="width:500px; margin-bottom: 10px;">
			<thead>
				<tr>
					<th>Facturée à</th>
					<th>Prix</th>
					<th>Envoi</th>
					<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)||($_smarty_tpl->tpl_vars['order']->value['paid']==0)){?>
						<?php if (($_smarty_tpl->tpl_vars['order']->value['refund']==0)){?>
							<th>Actions</th>
						<?php }?>
					<?php }?>
				</tr>
			</thead>
			<tbody>
				<tr class="row1">
					<td>
						<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['user']['id'];?>
">
							<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['order']->value['user']['nom'];?>
</font> <?php echo $_smarty_tpl->tpl_vars['order']->value['user']['prenom'];?>

						</a>
					</td>
					<td>
						<?php if (($_smarty_tpl->tpl_vars['order']->value['refund']!='0')){?>
							<strong><?php echo $_smarty_tpl->tpl_vars['order']->value['newValue'];?>
 €</strong><br />
							<strong style="color: red;">
								<?php echo $_smarty_tpl->tpl_vars['order']->value['refundValue'];?>
 € remboursés
							</strong>
						<?php }else{ ?>
							<strong><?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
 €</strong>
						<?php }?>						
					</td>
					<td>
						<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)){?>
							En attente d'envoi
						<?php }elseif(($_smarty_tpl->tpl_vars['order']->value['sent']==1)){?>
							<em><font color="green">Envoyée</font></em>
						<?php }else{ ?>
							<em><font color="green">Envoyée le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['sent'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</font></em>
						<?php }?>
					</td>
					<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)||($_smarty_tpl->tpl_vars['order']->value['paid']==0)){?>
						<?php if (($_smarty_tpl->tpl_vars['order']->value['refund']==0)){?>
							<td style="text-align: center;">
								<?php if (($_smarty_tpl->tpl_vars['order']->value['sent']==0)){?><a onClick="setOrderAsSent(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
									<img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" alt="Valider envoi" title="Valider envoi" /></a>
								<?php }?>
								<?php if (($_smarty_tpl->tpl_vars['order']->value['paid']==0)){?><a onClick="setOrderAsPaid(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
									<img src="images/icons/money.png" alt="Valider paiement" title="Valider paiement" /></a>
								<?php }else{ ?>
									<a onClick="refundOrder(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
);">
										<img src="images/icons/money_delete.png" alt="Rembourser commande" title="Rembourser commande" /></a>
								<?php }?>
							</td>
						<?php }?>
					<?php }?>
				</tr>
			</tbody>
		</table>
		<?php if (($_smarty_tpl->tpl_vars['order']->value['paid']==1)){?>
			<table cellspacing="1" style="width:500px; margin-bottom: 10px;">
				<thead>
					<tr>
						<th style="width: 250px;">Mode de paiement</th>
						<th>Transaction</th>
					</tr>
				</thead>
				<tbody>
					<tr class="row1">
						<td>
							<?php if (($_smarty_tpl->tpl_vars['order']->value['paymentType']!='')&&($_smarty_tpl->tpl_vars['order']->value['paymentType']!='0')){?>
								<?php echo $_smarty_tpl->tpl_vars['order']->value['paymentType'];?>

							<?php }else{ ?>
								<i>Mode de paiement inconnu</i>
							<?php }?>
						</td>
						<td>
							<?php if (($_smarty_tpl->tpl_vars['order']->value['transactionNumber']!='')){?>
								#<?php echo $_smarty_tpl->tpl_vars['order']->value['transactionNumber'];?>

							<?php }else{ ?>
								<i>Pas de numéro de transaction</i>
							<?php }?>
						</td>
					</tr>
				</tbody>
			</table>
		<?php }?>
		<table style="width: 500px;">
			<thead>
				<tr>
					<th style="width: 250px;">Expédiée à</th>
					<th>Produits</th>
					<th>Mode de livraison</th>
				</tr>
			</thead>
			<tbody>			
				<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['addresses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
						<td>
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
						</td>
						<td>
							<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['order']->value['deliveries']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
?>
								<?php if (($_smarty_tpl->tpl_vars['delivery']->value['addressId'])==($_smarty_tpl->tpl_vars['address']->value['id'])){?>
									- <?php echo $_smarty_tpl->tpl_vars['delivery']->value['item']['title'];?>
 <?php if (($_smarty_tpl->tpl_vars['delivery']->value['quantity']!=1)){?><strong>(x <?php echo $_smarty_tpl->tpl_vars['delivery']->value['quantity'];?>
)</strong><?php }?> <br />
								<?php }?>
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<strong>
								<?php echo $_smarty_tpl->tpl_vars['address']->value['delivery']['name'];?>

							</strong>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>		

		<br /><br />
		<a onClick="preciseBill(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);"><strong>Voir la facture</strong></a>
			
		<br /><br /><br />
	</div>
</div><?php }} ?>