<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:45:54
         compiled from "templates/admin/pages/board.messagerie.testimonies.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12130836704fb385622ccde0-03653941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ef601718317d1331b6d84451c167aec17cc7ce6' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.testimonies.tpl',
      1 => 1335212077,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12130836704fb385622ccde0-03653941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'testimoniesCount' => 0,
    'testimonies' => 0,
    'message' => 0,
    'label' => 0,
    'labels' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb38562373d4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb38562373d4')) {function content_4fb38562373d4($_smarty_tpl) {?><div id="main">
	<h6>Messagerie / Témoignages</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Témoignages</h1><br />


	Liste de tous les témoignages envoyés.

	<br /><br />
	<h3><?php echo $_smarty_tpl->tpl_vars['testimoniesCount']->value;?>
 témoignages archivés</h3><br />
	
	<table cellspacing="1" style="width:100%;">
		<thead>
			<tr>
				<th style="width:50px;">
					<strong>ID</strong>
				</th>
				<th>
					<strong>Titre</strong>
				</th>
				<th style="width:225px;">
					<strong>Expéditeur</strong>
				</th>
				<th style="width:180px;">
					<strong>Date / Statut</strong>
				</th>
				<th style="width:120px;">
					<strong>Edit</strong>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if (($_smarty_tpl->tpl_vars['testimoniesCount']->value!='0')){?>
				<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['testimonies']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
					<tr class="row6red">
						<td><?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
</td>
						<td>
							<a href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
								<strong>
									<?php if (($_smarty_tpl->tpl_vars['message']->value['tem']==0)){?><?php echo $_smarty_tpl->tpl_vars['message']->value['objet'];?>
<?php }else{ ?>Témoignage<?php }?>
								</strong>
							</a>
						</td>
						<td>
							<strong>
								<font style="text-transform:capitalize;"><?php echo $_smarty_tpl->tpl_vars['message']->value['firstName'];?>
</font>
								<font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['message']->value['name'];?>
</font>
							<strong>
						</td>
						<td>
							<font class="error">
								<strong>Non-répondu</strong><br />
								depuis <?php echo $_smarty_tpl->tpl_vars['message']->value['passedTime'];?>
 jour(s)
							</font>
							<br />
							<font color="green" id="labelZone<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
								<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['message']->value['labels']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>
									<div class="label" style="background-color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['background'];?>
; color: #<?php echo $_smarty_tpl->tpl_vars['label']->value['color'];?>
;" id="label-<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
-<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
">
										<?php echo $_smarty_tpl->tpl_vars['label']->value['name'];?>
 
										<a style="cursor: pointer;" onClick="removeLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
);">
											<img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" />
										</a>
									</div>
								<?php } ?>
							</font>
						</td>
						<td>
							<select>
								<option style="font-style: italic;">Transmettre à</option>
								<?php  $_smarty_tpl->tpl_vars['label'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['label']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['labels']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['label']->key => $_smarty_tpl->tpl_vars['label']->value){
$_smarty_tpl->tpl_vars['label']->_loop = true;
?>
									<option onClick="addLabel(<?php echo $_smarty_tpl->tpl_vars['label']->value['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
);"><?php echo $_smarty_tpl->tpl_vars['label']->value['name'];?>
</option>
								<?php } ?>
							</select>
							<br /><br />
							<a style="font-style: italic; cursor: pointer; font-weight: bold;" onClick="deleteMessage(<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
)"><img src="images/icons/bin_closed.png" alt="Supprimer le message" title="Supprimer le message" /></a>
						</td>
					</tr>
				<?php } ?>
			<?php }?>
		</tbody>
	</table>
	<br /><br /><br />
</div><?php }} ?>