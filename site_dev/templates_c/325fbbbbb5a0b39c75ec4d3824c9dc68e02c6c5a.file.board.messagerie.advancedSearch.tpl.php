<?php /* Smarty version Smarty-3.1.7, created on 2012-06-04 11:15:16
         compiled from "templates/admin/pages/board.messagerie.advancedSearch.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11679819974fb385f6c85af7-92250228%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325fbbbbb5a0b39c75ec4d3824c9dc68e02c6c5a' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.advancedSearch.tpl',
      1 => 1338801296,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11679819974fb385f6c85af7-92250228',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb385f6d4010',
  'variables' => 
  array (
    'topics' => 0,
    'topic' => 0,
    'tags' => 0,
    'tag' => 0,
    'search' => 0,
    'messages' => 0,
    'message' => 0,
    'label' => 0,
    'labels' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb385f6d4010')) {function content_4fb385f6d4010($_smarty_tpl) {?><div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Recherche / Recherche avancée</h6>
	<br /><hr /><br />
	<h1>Recherche</h1><br />
	
	<h3>Recherche avancée</h3>
	<br />
	<table cellspacing="1" style="width: 650px; text-align: center;">
		<thead>
			<tr>
				<th>Critère de recherche</th>
				<th>Contenu de la recherche</th>
			</tr>
		</thead>
		<tbody>
			<form method="POST" action="admin.php?cat=messagerie&scat=advancedSearch">
				<input type="hidden" name="search" value="1" />
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Nom / prénom
					</td>
					<td style="width: 200px;">
						<input type="text" name="name" maxlength="255" />
					</td>
				</tr>
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Objet
					</td>
					<td style="width: 200px;">
						<select name="topic">
							<option value="0">Choisir</option>
							<option value="T">Témoignage</option>
							<?php  $_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->key => $_smarty_tpl->tpl_vars['topic']->value){
$_smarty_tpl->tpl_vars['topic']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['topic']->value['titre'];?>
</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Contenu du message
					</td>
					<td style="width: 200px;">
						<input type="text" name="content" maxlength="255" />
					</td>
				</tr>
				<tr style="height: 40px;">
					<td style="width: 230px;">
						
					</td>
					<td style="width: 200px;">
						<input type="submit" value="Lancer la recherche" style="cursor: pointer;" />
					</td>
				</tr>
			</form>
		</tbody>
	</table>
	<br /><br />
	<table cellspacing="1" style="width: 650px; text-align: center;">
		<thead>
			<tr>
				<th>Critère de recherche</th>
				<th>Contenu de la recherche</th>
			</tr>
		</thead>
		<tbody>
			<form method="POST" action="admin.php?cat=messagerie&scat=advancedSearch">
				<input type="hidden" name="search" value="2" />
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Tags
					</td>
					<td style="width: 200px;">
						<select name="tag">
							<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value){
$_smarty_tpl->tpl_vars['tag']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['tag']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['tag']->value['name'];?>
</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr style="height: 40px;">
					<td style="width: 230px;">
						
					</td>
					<td style="width: 200px;">
						<input type="submit" value="Lancer la recherche" style="cursor: pointer;" />
					</td>
				</tr>
			</form>
		</tbody>
	</table>
	<br /><br /><br />
	<?php if (($_smarty_tpl->tpl_vars['search']->value=='1')||($_smarty_tpl->tpl_vars['search']->value=='2')){?>
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
			<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
<?php }else{ ?>Témoignage<?php }?><br />
							</strong>
							<i><?php echo $_smarty_tpl->tpl_vars['message']->value['preview'];?>
</i>
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
		</tbody>
	</table>
	<br /><br /><br />
	<?php }?>
</div><?php }} ?>