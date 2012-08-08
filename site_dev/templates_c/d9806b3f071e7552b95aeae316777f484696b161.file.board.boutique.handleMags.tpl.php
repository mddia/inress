<?php /* Smarty version Smarty-3.1.7, created on 2012-05-15 13:51:15
         compiled from "templates/admin/pages/board.boutique.handleMags.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3616986144fb243338a9057-01397211%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd9806b3f071e7552b95aeae316777f484696b161' => 
    array (
      0 => 'templates/admin/pages/board.boutique.handleMags.tpl',
      1 => 1335483566,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3616986144fb243338a9057-01397211',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'abos' => 0,
    'abo' => 0,
    'mags' => 0,
    'mag' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb24333959ed',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb24333959ed')) {function content_4fb24333959ed($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Membres / Administration / Gestion des magazine</h6>
	<br /><hr /><br />


	<h1>Créer un routage magazine</h1><br />

	Module destiné à gérer les magazines de l'INREES.
	<br /><br />
	<div id="boardContent">
	
		<h3>Ajouter un magazine</h3><br />
		Ajouter un nouveau magazine pour l'INREES<br />
		<table cellspacing="1" style="width:850px; margin-top: 10px;">
			<thead>
				<tr>
					<th>Abonnement</th>
					<th>Numéro</th>
					<th>Titre</th>
					<th>Actif</th>
					<th>Online</th>
					<th>Disponibilité</th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				<tr>
					<td>
						<select name="aboId" id="aboId">
							<?php  $_smarty_tpl->tpl_vars['abo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['abo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['abos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['abo']->key => $_smarty_tpl->tpl_vars['abo']->value){
$_smarty_tpl->tpl_vars['abo']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['abo']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['abo']->value['title'];?>
</option>
							<?php } ?>
						</select>
					</td>
					<td><input type="text" name="numero" id="numero" style="text-align: center; width: 30px;" /></td>
					<td><input type="text" name="titre" id="titre" style="text-align: center;" /></td>
					<td>
						<select name="actif" id="actif">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</td>
					<td>
						<select name="online" id="online">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</td>
					<td>
						<input type="text" name="JJ" id="JJ" style="text-align: center; width: 20px;" value="JJ" maxlength="2" /> / 
						<input type="text" name="MM" id="MM" style="text-align: center; width: 20px;" value="MM" maxlength="2"  /> / 
						<input type="text" name="AAAA" id="AAAA" style="text-align: center; width: 40px;" value="AAAA" maxlength="4"  />
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="button" value="Enregistrer" onClick="recordNewMag();" style="cursor: pointer;" /></td>
				</tr>
			</tbody>
		</table>
		<br /><br />
		<h3>Liste des magazines</h3><br />
		Magazines déjà enregistrés<br />
		<table cellspacing="1" style="width:850px; margin-top: 10px;">
			<thead>
				<tr>
					<th>Abonnement</th>
					<th>Numéro</th>
					<th>Titre</th>
					<th>Actif</th>
					<th>Online</th>
					<th>Disponibilité</th>
					<th>Date de routage</th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				<?php  $_smarty_tpl->tpl_vars['mag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mag']->key => $_smarty_tpl->tpl_vars['mag']->value){
$_smarty_tpl->tpl_vars['mag']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
						<td><strong><?php echo $_smarty_tpl->tpl_vars['mag']->value['abo']['title'];?>
</strong></td>
						<td><strong><?php echo $_smarty_tpl->tpl_vars['mag']->value['numero'];?>
</strong></td>
						<td><?php echo $_smarty_tpl->tpl_vars['mag']->value['titre'];?>
</td>
						<td>
							<select name="actif">
								<option <?php if (($_smarty_tpl->tpl_vars['mag']->value['actif']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
								<option <?php if (($_smarty_tpl->tpl_vars['mag']->value['actif']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
							</select>
						</td>
						<td>
							<select name="online">
								<option <?php if (($_smarty_tpl->tpl_vars['mag']->value['online']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
								<option <?php if (($_smarty_tpl->tpl_vars['mag']->value['online']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
							</select>
						</td>
						<td>
							<?php if (($_smarty_tpl->tpl_vars['mag']->value['dateSortie']!='0')){?>
								<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mag']->value['dateSortie'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

							<?php }else{ ?>
								<strong style="color: red;">Inconnue</strong>
							<?php }?>
						</td>
						<td>
							
							<?php if (($_smarty_tpl->tpl_vars['mag']->value['routage']!='0')){?>
								<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['mag']->value['routage'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

							<?php }else{ ?>
								<strong>Non routé</strong>
							<?php }?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
		<br /><br />
	</div>
</div><?php }} ?>