<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 14:18:42
         compiled from "templates/admin/pages/board.activites.listeEV.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8024688874fc3f2ee806834-41816528%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '324d04edd49f4d2f0b1dc4a8e2596eb6c6f3060b' => 
    array (
      0 => 'templates/admin/pages/board.activites.listeEV.tpl',
      1 => 1338250618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8024688874fc3f2ee806834-41816528',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc3f2ee8602c',
  'variables' => 
  array (
    'theme' => 0,
    'eventsToCome' => 0,
    'event' => 0,
    'config' => 0,
    'doneEvents' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc3f2ee8602c')) {function content_4fc3f2ee8602c($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Activités / <?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
 / Liste des <?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
</h6>
	<br /><hr /><br />

	<h1>Liste des <?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
</h1><br />

	Récapitulatif de tout(e)s les <?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
 organisé(e)s depuis la création de l'INREES.
	<br /><br />


	<h3><?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
 à venir</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th style="width:125px;"><strong>Réservations</strong></th>
			<th style="width:125px;"><strong>Site</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventsToCome']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
				<tr>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateD'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
">
							<strong><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
</strong>
						</a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['event']->value['dispos'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['event']->value['url'];?>
</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br /><br />

	<h3><?php echo $_smarty_tpl->tpl_vars['theme']->value['nompluriel'];?>
 terminé(e)s</h3><br />


	<table cellspacing="1" style="width:820px;">
		<thead>
		<tr>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th style="width:55px;"><strong>Réservations</strong></th>
			<th style="width:95px;"><strong>CA</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['doneEvents']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateD'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>

						</a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['event']->value['dispos'];?>
</td>
					<td></td>
				</tr>
			<?php } ?>
		</tbody>
	</table>


	<br /><br /><br />
</div><?php }} ?>