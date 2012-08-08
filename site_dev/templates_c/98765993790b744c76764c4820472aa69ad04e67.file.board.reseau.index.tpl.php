<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 15:44:34
         compiled from "templates/admin/pages/board.reseau.index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18580893834fc6c96a4c1de7-42539557%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '98765993790b744c76764c4820472aa69ad04e67' => 
    array (
      0 => 'templates/admin/pages/board.reseau.index.tpl',
      1 => 1338990273,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18580893834fc6c96a4c1de7-42539557',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc6c96a4cf13',
  'variables' => 
  array (
    'threads' => 0,
    'i' => 0,
    'thread' => 0,
    'SESSION' => 0,
    'message' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc6c96a4cf13')) {function content_4fc6c96a4cf13($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Réseau / Index</h6>
	<br /><hr /><br />

	<h1>Réseau de discussions</h1>
	<br />
	| 
	<?php  $_smarty_tpl->tpl_vars['thread'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thread']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['threads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thread']->key => $_smarty_tpl->tpl_vars['thread']->value){
$_smarty_tpl->tpl_vars['thread']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['thread']->key;
?>
		<a class="<?php if (($_smarty_tpl->tpl_vars['i']->value==0)){?>bold<?php }?>" onClick="displayThread(<?php if (($_smarty_tpl->tpl_vars['i']->value!=0)){?><?php echo $_smarty_tpl->tpl_vars['thread']->value['id'];?>
<?php }else{ ?>0<?php }?>)" id="threadLink<?php if (($_smarty_tpl->tpl_vars['i']->value!=0)){?><?php echo $_smarty_tpl->tpl_vars['thread']->value['id'];?>
<?php }else{ ?>0<?php }?>"><?php echo $_smarty_tpl->tpl_vars['thread']->value['topic'];?>
</a> | 
	<?php } ?>
	<br /><br /><br />
	<input type="hidden" name="displayedThread" id="displayedThread" value="0" />
	<?php  $_smarty_tpl->tpl_vars['thread'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['thread']->_loop = false;
 $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['threads']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['thread']->key => $_smarty_tpl->tpl_vars['thread']->value){
$_smarty_tpl->tpl_vars['thread']->_loop = true;
 $_smarty_tpl->tpl_vars['i']->value = $_smarty_tpl->tpl_vars['thread']->key;
?>
		<div id="thread<?php if (($_smarty_tpl->tpl_vars['i']->value!=0)){?><?php echo $_smarty_tpl->tpl_vars['thread']->value['id'];?>
<?php }else{ ?>0<?php }?>" class="<?php if (($_smarty_tpl->tpl_vars['i']->value!=0)){?>hidden<?php }?>">
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
								<textarea name="message" style="width: 500px; height: 80px;"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Envoyer" style="cursor: pointer;" />
							</td>
						</tr>
					</tbody>
				</table>
			</form><br /><br />
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
		</div>
	<?php } ?>
</div><?php }} ?>