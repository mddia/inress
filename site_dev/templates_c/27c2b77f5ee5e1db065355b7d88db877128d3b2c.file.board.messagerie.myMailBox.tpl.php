<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:46:20
         compiled from "templates/admin/pages/board.messagerie.myMailBox.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1768788264fb3857cdc8435-19878774%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '27c2b77f5ee5e1db065355b7d88db877128d3b2c' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.myMailBox.tpl',
      1 => 1334011958,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1768788264fb3857cdc8435-19878774',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'mailBoxCount' => 0,
    'mailBox' => 0,
    'message' => 0,
    'label' => 0,
    'labels' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb3857ce6b60',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb3857ce6b60')) {function content_4fb3857ce6b60($_smarty_tpl) {?><div id="main">
	<h6>Messagerie personnalles / Messages en attente</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie</h1><br />


	Liste de <strong>tous les messages sans réponses</strong> depuis le formulaire de contact du site de l'INREES.

	<br /><br />
	<h3><a href="admin.php?cat=messagerie&scat=unlabelled">Boite de réception</a> - <font class="error"><?php echo $_smarty_tpl->tpl_vars['mailBoxCount']->value;?>
 messages en attente</font></h3><br />
	
	<table cellspacing="1" style="width:100%;">
		<thead>
			<tr>
				<th style="width:50px;">
					<strong>ID</strong>
					<a href="admin.php?cat=messagerie&scat=attente&orderby=id">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th>
					<strong>Titre</strong>
					<a href="admin.php?cat=messagerie&scat=attente&orderby=name">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:225px;">
					<strong>Expéditeur</strong>
					<a href="admin.php?cat=messagerie&scat=attente&orderby=exp">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:180px;">
					<strong>Date / Statut</strong>
					<a href="admin.php?cat=messagerie&scat=attente&orderby=date">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:120px;">
					<strong>Edit</strong>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php if (($_smarty_tpl->tpl_vars['mailBoxCount']->value!='0')){?>
				<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mailBox']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
							</a><br />
							<i><?php echo $_smarty_tpl->tpl_vars['message']->value['preview'];?>
</i>
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