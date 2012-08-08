<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:47:25
         compiled from "templates/admin/pages/board.messagerie.handleLabels.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7085768134fb385bd5d1589-43715201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b69f7ea831b47efef1bb13970ab31c50bf21a001' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.handleLabels.tpl',
      1 => 1334007804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7085768134fb385bd5d1589-43715201',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'labels' => 0,
    'label' => 0,
    'moderateur' => 0,
    'objet' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb385bd64bf6',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb385bd64bf6')) {function content_4fb385bd64bf6($_smarty_tpl) {?><div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Options / Gestion des libellés</h6>
	<br /><hr /><br />
	<h1>Gestion des libellés</h1><br />
	
	<h3>Créer un libellé</h3>
	<br />
	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width: 200px;">Nom</th>
				<th style="width: 230px;">Couleur arrière-plan</th>
				<th style="width: 120px;">Couleur texte</th>
				<th style="width: 200px;">Aperçu</th>
				<th style="width: 100px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row6red" style="height: 40px;">
				<td style="width: 200px;">
					<input type="text" id="labelName" onkeyup="updatePreviewValue()" style="text-align: center;" maxlength="255" />
				</td>
				<td style="width: 230px;">
					<div onClick="changePreviewBckg('ff0000')" class="colorSquare" style="background-color: #ff0000; border: 1px dotted #536482; margin-left: 20px;"></div>
					<div onClick="changePreviewBckg('008000')" class="colorSquare" style="background-color: #008000; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('ffa500')" class="colorSquare" style="background-color: #ffa500; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('8551a1')" class="colorSquare" style="background-color: #8551a1; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('4b5d9f')" class="colorSquare" style="background-color: #4b5d9f; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('fa794b')" class="colorSquare" style="background-color: #fa794b; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('88e77b')" class="colorSquare" style="background-color: #88e77b; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('5cd1f7')" class="colorSquare" style="background-color: #5cd1f7; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('ffffff')" class="colorSquare" style="background-color: #ffffff; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('000000')" class="colorSquare" style="background-color: #000000; border: 1px dotted #536482;"></div>
				</td>
				<td style="width: 120px;">
					<div onClick="changePreviewColor('ffffff')" class="colorSquare" style="background-color: #ffffff; border: 1px dotted #536482; margin-left: 40px;"></div>
					<div onClick="changePreviewColor('000000')" class="colorSquare" style="background-color: #000000; border: 1px dotted #536482;"></div>
				</td>
				<td style="width: 200px;">
					<input type="text" id="labelPreview" style="background-color: #FFFFFF; border: 0px dotted #536482; text-align: center; font-weight: bold;" disabled="disabled"></input>
				</td>
				<td style="width: 100px;">
					<input type="hidden" id="labelHiddenName" value="" />
					<input type="hidden" id="labelHiddenBckg" value="FFFFFF" />
					<input type="hidden" id="labelHiddenColor" value="000000" />
					<input type="button" class="confirm" value="Enregistrer" style="cursor: pointer; margin: 5px;" onClick="createLabel();" />
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	
	<h3>Libellés disponibles</h3><br />

	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width:150px;">Libellé</th>
				<th style="width:325px;">Utilisateurs associés</th>
				<th style="width:325px;">Objet associé</th>
				<th style="width:100px;">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>
				<tr class='row6red'>
					<td style="color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['color'];?>
; background-color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['background'];?>
;"><strong><?php echo $_smarty_tpl->tpl_vars['label']->value['name'];?>
</strong></td>
					<td>						
						<?php  $_smarty_tpl->tpl_vars['moderateur'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['moderateur']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['label']->value['moderateur']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['moderateur']->key => $_smarty_tpl->tpl_vars['moderateur']->value){
$_smarty_tpl->tpl_vars['moderateur']->_loop = true;
?>
							<strong><?php echo $_smarty_tpl->tpl_vars['moderateur']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['moderateur']->value['name'];?>
</strong> (<a style="cursor: pointer;" onClick="removeUserLink(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['moderateur']->value['id'];?>
)">supprimer</a>)<br />
						<?php } ?>
					</td>
					<td>						
						<?php  $_smarty_tpl->tpl_vars['objet'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['objet']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['label']->value['objet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['objet']->key => $_smarty_tpl->tpl_vars['objet']->value){
$_smarty_tpl->tpl_vars['objet']->_loop = true;
?>
							<strong><?php echo $_smarty_tpl->tpl_vars['objet']->value['titre'];?>
</strong> (<a style="cursor: pointer;" onClick="removeTopicLink(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['objet']->value['id'];?>
)">supprimer</a>)<br />
						<?php } ?>						
					</td>
					<td>
						<strong>
							<a onClick="addUserToLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
)" style="cursor: pointer;">
								<img src="images/icons/user_add.png" alt="Associer un utilisateur" title="Associer un utilisateur" /></a>
							<a onClick="addTopicToLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
)" style="cursor: pointer;">
								<img src="images/icons/tag_blue_add.png" alt="Associer un objet" title="Associer un objet" /></a>
							<a onClick="deleteLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
)" style="cursor: pointer;">
								<img src="images/icons/bin_closed.png" alt="Supprimer le libellé" title="Supprimer le libellé" /></a>
						</strong>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div><?php }} ?>