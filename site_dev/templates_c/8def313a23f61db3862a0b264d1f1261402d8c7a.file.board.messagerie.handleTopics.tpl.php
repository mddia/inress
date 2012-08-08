<?php /* Smarty version Smarty-3.1.7, created on 2012-05-16 12:47:32
         compiled from "templates/admin/pages/board.messagerie.handleTopics.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5102138704fb385c46b37f9-89113168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8def313a23f61db3862a0b264d1f1261402d8c7a' => 
    array (
      0 => 'templates/admin/pages/board.messagerie.handleTopics.tpl',
      1 => 1334007804,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5102138704fb385c46b37f9-89113168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'topics' => 0,
    'topic' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb385c46fa96',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb385c46fa96')) {function content_4fb385c46fa96($_smarty_tpl) {?><div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Options / Gestion des objets</h6>
	<br /><hr /><br />
	<h1>Gestion des objets</h1><br />
	
	<h3>Ajouter un objet</h3>
	<br />
	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width: 200px;">Nom</th>
				<th style="width: 100px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row6red" style="height: 40px;">
				<td style="width: 200px;">
					<input type="text" id="topicName" style="text-align: center;" maxlength="255" />
				</td>
				<td style="width: 100px;">
					<input type="button" class="confirm" value="Enregistrer" style="cursor: pointer; margin: 5px;" onClick="createTopic();" />
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	
	<h3>objets disponibles</h3><br />

	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width:150px;">Objet</th>
				<th style="width:100px;">Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['topic'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['topic']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['topics']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['topic']->key => $_smarty_tpl->tpl_vars['topic']->value){
$_smarty_tpl->tpl_vars['topic']->_loop = true;
?>
				<tr class='row6red'>
					<td><strong><?php echo $_smarty_tpl->tpl_vars['topic']->value['titre'];?>
</strong></td>
					<td>
						<strong>
							<a onClick="deleteTopic(<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
)" style="cursor: pointer;">
								<img src="images/icons/bin_closed.png" alt="Supprimer l'objet" title="Supprimer l'objet" /></a>
							<a onClick="editTopic(<?php echo $_smarty_tpl->tpl_vars['topic']->value['id'];?>
, '<?php echo $_smarty_tpl->tpl_vars['topic']->value['titre'];?>
')" style="cursor: pointer;">
								<img src="images/icons/pencil.png" alt="Editer l'objet" title="Editer l'objet" /></a>
						</strong>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div><?php }} ?>