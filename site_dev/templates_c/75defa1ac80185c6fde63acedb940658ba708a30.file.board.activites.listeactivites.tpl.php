<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 02:45:18
         compiled from "templates/admin/pages/board.activites.listeactivites.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11476434724fbf54ec085d42-47415556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '75defa1ac80185c6fde63acedb940658ba708a30' => 
    array (
      0 => 'templates/admin/pages/board.activites.listeactivites.tpl',
      1 => 1338425117,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11476434724fbf54ec085d42-47415556',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf54ec0cfc4',
  'variables' => 
  array (
    'eventsToCome' => 0,
    'event' => 0,
    'config' => 0,
    'doneEvents' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf54ec0cfc4')) {function content_4fbf54ec0cfc4($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Activités / Website / Liste des rendez-vous</h6>
	<br /><hr /><br />

	<h1>Liste des rendez-vous</h1><br />

	Liste de <strong>toutes les activités (conférences, ateliers, évènements...)</strong> de l'INREES.

	<br /><br />


	<h3>Les prochaines rendez-vous</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th>ID</th>
			<th style="width:95px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th><strong>Evènement</strong></th>
			<th style="width:65px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['event'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['event']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventsToCome']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['event']->key => $_smarty_tpl->tpl_vars['event']->value){
$_smarty_tpl->tpl_vars['event']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
					<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateD'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
">
							<strong><?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
</strong>
						</a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['event']->value['activitesName'];?>
</td>
					<td>
						<a target="_blank" href="http://www.inrees.com/<?php echo $_smarty_tpl->tpl_vars['event']->value['activitesName'];?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value['url'];?>
/" title="Voir évènement">
							<img src="http://admin.inrees.com/adm/images/icon_info.gif" width="16" height="16"></a> 
						<a href="admin.php?admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
" title="Editer le profil">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="16" height="16"></a> 
						<a href="javascript:supprimerActivites(<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
)">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="16" height="16"></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br /><br />

	<h3>Les anciens rendez-vous</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th>ID</th>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th><strong>Evènement</strong></th>
			<th style="width:50px;"><strong>Edit</strong></th>
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
					<td style="text-align: center;"><?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
</td>
					<td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateD'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
">
							<?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>

						</a>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['event']->value['activitesName'];?>
</td>
					<td>
						<a target="_blank" href="http://www.inrees.com/<?php echo $_smarty_tpl->tpl_vars['event']->value['activitesName'];?>
/<?php echo $_smarty_tpl->tpl_vars['event']->value['url'];?>
/" title="Voir évènement">
							<img src="http://admin.inrees.com/adm/images/icon_info.gif" width="12" height="12"></a> 
						<a href="admin.php?admin.php?cat=activites&scat=events&id=<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
" title="Editer le profil">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="12" height="12"></a> 
						<a href="javascript:supprimerActivites(<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
)">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="12" height="12"></a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br /><br /><br />
</div><?php }} ?>