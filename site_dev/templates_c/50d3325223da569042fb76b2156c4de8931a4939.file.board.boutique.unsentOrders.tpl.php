<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 11:27:45
         compiled from "templates/admin/pages/board.boutique.unsentOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:942889014fae8bd90b4144-30631200%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '50d3325223da569042fb76b2156c4de8931a4939' => 
    array (
      0 => 'templates/admin/pages/board.boutique.unsentOrders.tpl',
      1 => 1338456449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '942889014fae8bd90b4144-30631200',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae8bd91fd1e',
  'variables' => 
  array (
    'unsentOrdersCount' => 0,
    'unsentOrders' => 0,
    'order' => 0,
    'delivery' => 0,
    'allTypes' => 0,
    'type' => 0,
    'byDeliveryUnsent' => 0,
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae8bd91fd1e')) {function content_4fae8bd91fd1e($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Boutique / Commandes à envoyer</h6>
	<br /><hr /><br />


	<h1>Gestion des commandes</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	
	<div id="boardContent">
	
		<h3>Liste des <?php echo $_smarty_tpl->tpl_vars['unsentOrdersCount']->value;?>
 commandes effectuées à envoyer</h3><br />
		Afficher par : <a id="orderedByUserButton" class="bold" onClick="switchThirdDisplay('orderedByUser', 'orderedByItem', 'orderedByDelivery')">Utilisateur</a> | <a id="orderedByItemButton" onClick="switchThirdDisplay('orderedByItem', 'orderedByUser', 'orderedByDelivery')">Famille de produits</a> | <a id="orderedByDeliveryButton" onClick="switchThirdDisplay('orderedByDelivery', 'orderedByUser', 'orderedByItem')">Facturation / Envoi</a><br />
		<br />
		<!-- AFFICHAGE PAR UTILISATEUR -->
		<div id="orderedByUser">
			<table cellspacing="1" style="width:100%;">
				<thead>
					<tr>
						<th style="width:225px;">
							<strong>Facturé à</strong> 
							<a href="admin.php?cat=website&scat=gestioncommandes&limit=1&orderby=name">
								<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
							</a>
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
							<strong>Règlement</strong> 
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
 $_from = $_smarty_tpl->tpl_vars['unsentOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
								<a href="admin.php?cat=boutique&scat=macommande&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
									<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Editer commande" title="Editer commande" /></a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<a href="admin.php?cat=query&scat=unsentOrders" target="_blank" class="buttonplusred" style="float: right; margin-top: 10px; margin-right: 5px; padding-bottom: 10px;">
				Exporter les étiquettes
			</a>
		</div>
		
		<!-- AFFICHAGE PAR FAMILLE D'OBJET -->
		<div id="orderedByItem" class="hidden">
			<select name="productsFamily">
				<option value="0">Choisir</option>
				<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['allTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
					<?php if (($_smarty_tpl->tpl_vars['type']->value['active']=='1')){?><option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" onClick="displayFamilyProducts('unsent', <?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
); showMeThatOrder('unsent', <?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</option><?php }?>
				<?php } ?>
			</select>
			<br /><br />
			<div id="whereIdisplay">
				
			</div>
		</div>
		
		<!-- AFFICHAGE PAR FACTURATION / ENVOI -->
		<div id="orderedByDelivery" class="hidden">
			<table cellspacing="1" style="width:100%;">
				<thead>
					<tr>
						<th style="width: 160px;">
							<strong>Facturé à</strong>
						</th>
						<th style="width:225px;">
							<strong>Adresse de livraison</strong> 
						</th>
						<th>
							<strong>Contenu du colis</strong>
						</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['delivery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['delivery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['byDeliveryUnsent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['delivery']->key => $_smarty_tpl->tpl_vars['delivery']->value){
$_smarty_tpl->tpl_vars['delivery']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td>
								<font style="text-transform:uppercase;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['delivery']->value['user']['nom'];?>
</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['delivery']->value['user']['prenom'];?>
</font>
							</td>
							<td>
								<font style="text-transform:uppercase;font-weight:bold;"><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['name'];?>
</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['firstName'];?>
</font><br />
								<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address1'];?>
<br />
								<?php if (($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='0')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address2']!='undefined')){?>
									<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address2'];?>
<br />
								<?php }?>
								<?php if (($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='0')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='')&&($_smarty_tpl->tpl_vars['delivery']->value['address']['address3']!='undefined')){?>
									<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['address3'];?>
<br />
								<?php }?>
								<?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['zipCode'];?>
 <?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['city'];?>
<br />
								<strong><?php echo $_smarty_tpl->tpl_vars['delivery']->value['address']['country']['name'];?>
</strong>
							</td>
							<td>
								<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['delivery']->value['items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
									<strong><?php echo $_smarty_tpl->tpl_vars['item']->value['details']['title'];?>
</strong><br />
									<?php if (($_smarty_tpl->tpl_vars['item']->value['details']['subscription']==1)){?>
										<?php if (($_smarty_tpl->tpl_vars['item']->value['startMag']!='0')){?>
											<i><strong>Envoyer</strong> <?php echo $_smarty_tpl->tpl_vars['item']->value['startMag'];?>
</i> 
										<?php }else{ ?>
											<i>Pas de mag à envoyer</i><br />
										<?php }?>
									<?php }?>
									(quantité : <strong><?php echo $_smarty_tpl->tpl_vars['item']->value['quantity'];?>
</strong>)<br />
								<?php } ?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<a href="admin.php?cat=query&scat=unsentOrders" target="_blank" class="buttonplusred" style="float: right; margin-top: 10px; margin-right: 5px; padding-bottom: 10px;">
				Exporter les étiquettes
			</a>
		</div>
		<br /><br /><br />
	</div>
</div><?php }} ?>