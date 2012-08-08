<?php /* Smarty version Smarty-3.1.7, created on 2012-06-07 13:05:41
         compiled from "templates/admin/pages/board.membres.fusionInfos.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9639749814fcea776ad9de5-75135308%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eebe74e0657801948fc52e2e8f11abe2bd1446be' => 
    array (
      0 => 'templates/admin/pages/board.membres.fusionInfos.tpl',
      1 => 1339067139,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9639749814fcea776ad9de5-75135308',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fcea776b286f',
  'variables' => 
  array (
    'userToDelete' => 0,
    'userToKeep' => 0,
    'infos' => 0,
    'basic' => 0,
    'address' => 0,
    'abo' => 0,
    'order' => 0,
    'config' => 0,
    'message' => 0,
    'mag' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fcea776b286f')) {function content_4fcea776b286f($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Membres / Liste des membres / <<?php ?>?php echo $id ; ?<?php ?>></h6>
	<br /><hr /><br />

	<h1>Fusionner deux comptes INREES</h1><br />

	Module pour fusionner deux comptes INREES.
	<br /><br />
	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="fusionUsers" />
		<fieldset>
			<legend>Récapitulatif de la fusion</legend>
		
			<table><tr><td style="width: 80px;"></td><td>
				<br /><br />
				<strong><font style="font-size:14px;">Compte à supprimer :</font></strong><br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong><?php echo $_smarty_tpl->tpl_vars['userToDelete']->value['id'];?>
</strong> - <span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['userToDelete']->value['nom'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['userToDelete']->value['prenom'];?>
</span>
				<br /><br /><br />
				<strong><font style="font-size:14px;">Compte à garder :</font></strong> <br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong><?php echo $_smarty_tpl->tpl_vars['userToKeep']->value['id'];?>
</strong> - <span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['userToKeep']->value['nom'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['userToKeep']->value['prenom'];?>
</span>
				<br /><br /><br />
				</td></tr>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Clé</th>
						<th>Nouvelle valeur</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['basic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['basic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['basics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['basic']->key => $_smarty_tpl->tpl_vars['basic']->value){
$_smarty_tpl->tpl_vars['basic']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td><?php echo $_smarty_tpl->tpl_vars['basic']->value['key'];?>
</td>
							<td><?php echo $_smarty_tpl->tpl_vars['basic']->value['value'];?>
</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Adresse(s)</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['addresses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
</strong>
								<?php if (($_smarty_tpl->tpl_vars['address']->value['country']['id']=='172')){?>
									<br /><strong><?php echo $_smarty_tpl->tpl_vars['address']->value['state']['name'];?>
</strong>
								<?php }?>
								<br />
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Abonnement(s)</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['abo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['abo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['abonnements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['abo']->key => $_smarty_tpl->tpl_vars['abo']->value){
$_smarty_tpl->tpl_vars['abo']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td>									
								<strong>
								<?php echo $_smarty_tpl->tpl_vars['abo']->value['name'];?>

								</strong><br />
								Mag n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['startMag'];?>
 à n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['maxMag'];?>

								<br />
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Commandes</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['orders']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td <?php if (($_smarty_tpl->tpl_vars['order']->value['paid']=='0')){?>class="red"<?php }?>>									
								<strong>
									<a href="admin.php?cat=boutique&scat=macommande&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
									[n° <?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
]</a></strong> le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>
 (<?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
€)
								</strong>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Messages</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td>									
								<strong>
									<a href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
									[n° <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
]</a></strong> le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>

							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Magazines routés</th>
					</tr>
				</thead>
				<tbody>
					<?php  $_smarty_tpl->tpl_vars['mag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['infos']->value['rootMags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mag']->key => $_smarty_tpl->tpl_vars['mag']->value){
$_smarty_tpl->tpl_vars['mag']->_loop = true;
?>
						<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
							<td>									
								<?php echo $_smarty_tpl->tpl_vars['mag']->value['abonnement'];?>
 - <strong>n° <?php echo $_smarty_tpl->tpl_vars['mag']->value['magId'];?>
</strong>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<br /><br />
			<table>
				<tr>
					<td></td>
					<td align="left">
						<input type="hidden" name="userToDelete" value="<?php echo $_smarty_tpl->tpl_vars['userToDelete']->value['id'];?>
" />
						<input type="hidden" name="userToKeep" value="<?php echo $_smarty_tpl->tpl_vars['userToKeep']->value['id'];?>
" />
						<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider la fusion" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<br /><br /><br />
</div><?php }} ?>