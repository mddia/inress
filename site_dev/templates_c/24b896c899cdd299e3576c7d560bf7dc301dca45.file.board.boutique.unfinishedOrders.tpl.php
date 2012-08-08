<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 18:48:12
         compiled from "templates/admin/pages/board.boutique.unfinishedOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15637888084fae8bd528e4e6-67843287%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24b896c899cdd299e3576c7d560bf7dc301dca45' => 
    array (
      0 => 'templates/admin/pages/board.boutique.unfinishedOrders.tpl',
      1 => 1336841245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15637888084fae8bd528e4e6-67843287',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae8bd5319fb',
  'variables' => 
  array (
    'unfinishedOrdersCount' => 0,
    'unfinishedOrders' => 0,
    'order' => 0,
    'delivery' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae8bd5319fb')) {function content_4fae8bd5319fb($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Boutique / Commandes non-abouties</h6>
	<br /><hr /><br />

	<h1>Commandes non-abouties</h1><br />

	Affichages de toutes les commandes arrêtées avant la fin du processus
	<br /><br />
	<div id="boardContent">
		<h3>Liste des <?php echo $_smarty_tpl->tpl_vars['unfinishedOrdersCount']->value;?>
 commande(s) non-abouties</h3><br />
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
						<strong>Règlement</strong>
					</th>
					<th>
						<strong>Action</strong>
					</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['unfinishedOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
										<i><strong>Envoyer</strong> <?php echo $_smarty_tpl->tpl_vars['delivery']->value['startMag'];?>
</i> 
									<?php }else{ ?>
										<i>Pas de mag à envoyer</i><br />
									<?php }?>
								<?php }?>
								(quantité : <strong><?php echo $_smarty_tpl->tpl_vars['delivery']->value['quantity'];?>
</strong>)<br />
							<?php } ?>
						</td>
						<td style="text-align: center;">
							<?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
 €
						</td>
						<td style="text-align: center;">
							<?php if (($_smarty_tpl->tpl_vars['order']->value['paid']==0)){?>
								<span style="color: red;">
									Non-payée
								</span>
							<?php }elseif(($_smarty_tpl->tpl_vars['order']->value['paid']==1)){?>
								<span style="color: green;">
									Payée
								</span>
							<?php }?>
						</td>
						<td style="text-align: center;">
							<a onClick="recallForOrder(<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
);">
								<img src="images/icons/email_go.png" alt="Envoyer un rappel" title="Envoyer un rappel" />
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>		
	</div>
</div><?php }} ?>