<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 04:49:18
         compiled from "templates/admin/pages/board.reseau.thread.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10211615964fc6d7b9ece147-55140447%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c875f56c50cf08bb2925630ffa839da6b17f7b10' => 
    array (
      0 => 'templates/admin/pages/board.reseau.thread.tpl',
      1 => 1338432450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10211615964fc6d7b9ece147-55140447',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc6d7b9f0f6a',
  'variables' => 
  array (
    'thread' => 0,
    'message' => 0,
    'config' => 0,
    'SESSION' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc6d7b9f0f6a')) {function content_4fc6d7b9f0f6a($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Réseau / Index</h6>
	<br /><hr /><br />

	<h1>Réseau de discussions</h1>

	<h3>Fil de discussion : "<?php echo $_smarty_tpl->tpl_vars['thread']->value['topic'];?>
" (#<?php echo $_smarty_tpl->tpl_vars['thread']->value['id'];?>
)</h3><br />
	
	Derniers messages :<br /><br/>
	
	<table style="width: 800px;">
		<thead>
			<tr>
				<th>Modérateur</th>
				<th>Messages</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['thread']->value['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
					<td>
						<strong><?php echo $_smarty_tpl->tpl_vars['message']->value['moderateur']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['message']->value['moderateur']['name'];?>
</strong>
					</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['message']->value['content'];?>

					</td>
					<td>
						Le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<br /><br />
	Répondre :
	<br /><br />
	<form method="POST" action="actions.php">
		<input type="hidden" name="formName" value="addThreadAnswer" />
		<input type="hidden" name="threadId" value="<?php echo $_smarty_tpl->tpl_vars['thread']->value['id'];?>
" />
		<input type="hidden" name="modId" value="<?php echo $_smarty_tpl->tpl_vars['SESSION']->value['moderateur']['id'];?>
" />
		<table style="width: 800px; text-align: center;">
			<thead>
				<tr>
					<th>Messages</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<textarea name="message" style="width: 500px; height: 140px;"></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Envoyer" style="cursor: pointer;" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div><?php }} ?>