<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 13:21:02
         compiled from "templates/admin/pages/board.budget.rentrees.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11389112914fbb4e22092c17-10895737%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97b70872e7a85d092608086ecb595438e77e5c30' => 
    array (
      0 => 'templates/admin/pages/board.budget.rentrees.tpl',
      1 => 1337685660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11389112914fbb4e22092c17-10895737',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb4e2219843',
  'variables' => 
  array (
    'rentrees' => 0,
    'rentree' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb4e2219843')) {function content_4fbb4e2219843($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Membres / Administration / Liste de toutes les Rentrees</h6>
	<br /><hr /><br />


	<h1>Liste de toutes les Rentrees</h1><br />
	
	<h3>Liste des rentrees</h3><br />

	<table cellspacing="1" style="width:100%;">
		<thead>
		<tr>
			<th style="width:30px;"><strong>id</strong></th>
			<th style="width:105px;"><strong>Date</strong></th>
			<th style="width:105px;"><strong>Encaiss</strong></th>
			<th style="width:90px;"><strong>Prix</strong></th>
			<th><strong>Description</strong></th>
			<th style="width:75px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['rentree'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['rentree']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rentrees']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['rentree']->key => $_smarty_tpl->tpl_vars['rentree']->value){
$_smarty_tpl->tpl_vars['rentree']->_loop = true;
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['rentree']->value['id'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rentree']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['rentree']->value['encaiss'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['rentree']->value['prix'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['rentree']->value['titre'];?>
</td>
					<td>
						<a href="admin.php?cat=budget&scat=rentree&id=<?php echo $_smarty_tpl->tpl_vars['rentree']->value['id'];?>
">
							<img width="14px" height="14px" src="http://admin.inrees.com/adm/images/iconEdit.gif" />
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<br /><br />


	<!--<table style="margin-left:430px;width:125px;">
		<thead>
		<tr>
			<th style="width:90px;">Total</th>
		</tr>
		</thead>
		<tbody>
		<tr class="row2">
			<td align="right"><<?php ?>?php echo '<strong>'.substr($prixtotal,0,-2).'.'.substr($prixtotal,-2,2).'€</strong>' ; ?<?php ?>> (BUG)</td>
		</tr>
	</table>-->
	<br /><br /><br />


</div><?php }} ?>