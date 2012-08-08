<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 05:18:29
         compiled from "templates/admin/pages/board.reseau.newThread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4303139734fc6cb2ee37d01-37347132%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2df8802bf7f44597a35bd8c30a8eca330c4715db' => 
    array (
      0 => 'templates/admin/pages/board.reseau.newThread.tpl',
      1 => 1338434305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4303139734fc6cb2ee37d01-37347132',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc6cb2ee6fc6',
  'variables' => 
  array (
    'SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc6cb2ee6fc6')) {function content_4fc6cb2ee6fc6($_smarty_tpl) {?><div id="main">
	<h6>Réseau / Index</h6>
	<br /><hr /><br />

	<h1>Réseau de discussions</h1>

	<h3>Créer un nouveau fil de discussion</h3><br />
	
	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addNewThread" />
		<input type="hidden" name="modId" value="<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['id'];?>
" />
		<table style="width: 800px; text-align: center;">
			<thead>
				<tr>
					<th>Intitulé</th>
					<th>Contenu</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td><strong>Objet de la discussion</strong></td>
					<td>
						<input type="text" name="topic" style="width: 400px;" />
					</td>
				</tr>
				<tr class="row2">
					<td><strong>Message</strong></td>
					<td>
						<textarea name="message" style="width: 500px; height: 140px;"></textarea>
					</td>
				</tr>
				<tr class="row2">
					<td></td>
					<td>
						<input type="submit" value="Envoyer" style="cursor: pointer;" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div><?php }} ?>