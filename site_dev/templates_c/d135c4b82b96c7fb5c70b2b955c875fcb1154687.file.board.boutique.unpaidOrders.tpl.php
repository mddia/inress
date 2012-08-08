<?php /* Smarty version Smarty-3.1.7, created on 2012-05-12 18:09:31
         compiled from "templates/admin/pages/board.boutique.unpaidOrders.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9637053044fae8b3bab3761-37897098%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd135c4b82b96c7fb5c70b2b955c875fcb1154687' => 
    array (
      0 => 'templates/admin/pages/board.boutique.unpaidOrders.tpl',
      1 => 1336578093,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9637053044fae8b3bab3761-37897098',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'unpaidOrdersCount' => 0,
    'unpaidOrders' => 0,
    'order' => 0,
    'delivery' => 0,
    'allTypes' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae8b3bb6dfb',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae8b3bb6dfb')) {function content_4fae8b3bb6dfb($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Boutique / Commandes non payées</h6>
	<br /><hr /><br />


	<h1>Gestion des commandes</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	
	<div id="boardContent">
	
		<h3>Liste des <?php echo $_smarty_tpl->tpl_vars['unpaidOrdersCount']->value;?>
 commandes effectuées non réglées</h3><br />
		Afficher par : <a id="orderedByUserButton" class="bold" onClick="switchDisplay('orderedByUser', 'orderedByItem')">Utilisateur</a> | <a id="orderedByItemButton" onClick="switchDisplay('orderedByUser', 'orderedByItem')">Famille de produits</a><br />
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
 $_from = $_smarty_tpl->tpl_vars['unpaidOrders']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
" onClick="displayFamilyProducts('unpaid', <?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
); showMeThatOrder('unpaid', <?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['type']->value['name'];?>
</option><?php }?>
				<?php } ?>
			</select>
			<br /><br />
			<div id="whereIdisplay">
				
			</div>
		</div>
		<br /><br /><br />
	</div>
</div><?php }} ?>