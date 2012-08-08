<?php /* Smarty version Smarty-3.1.7, created on 2012-05-26 12:18:11
         compiled from "templates/admin/pages/board.activites.gestionactivitestypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4326861354fbf510117fa74-18178559%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '832d2d137d02a6c393057585e66bfbb6307534c7' => 
    array (
      0 => 'templates/admin/pages/board.activites.gestionactivitestypes.tpl',
      1 => 1338027487,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4326861354fbf510117fa74-18178559',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf51011b654',
  'variables' => 
  array (
    'eventTypes' => 0,
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf51011b654')) {function content_4fbf51011b654($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Activités / Website / Liste des types d'activités</h6>
	<br /><hr /><br />




	<h1>Les types d'activités</h1><br />

	Liste des <strong>types d'activités (Conférences, ateliers, évènements...)</strong> de l'INREES.

	<br /><br />


	<h3>Liste des toutes les activités</h3><br />

	<table cellspacing="1" style="width:390px;">
		<thead>
		<tr>
			<th><strong>ID</strong></th>
			<th><strong>Activités</strong></th>
			<th><strong>Actif</strong></th>
			<th style="width:50px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
</td>
					<td>
						<strong>
							<a href="admin.php?cat=activites&scat=activites&scat=activitestypes&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value['nompluriel'];?>
</a>
						</strong>
					</td>
					<td><?php echo $_smarty_tpl->tpl_vars['type']->value['actif'];?>
</td>
					<td>
						<a href="admin.php?cat=activites&scat=activites&scat=activitestypes&id=<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif">
						</a> 
						<a onClick="deleteActivityType(<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
)">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif">
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>



	<br /><br />




	<h3>Insérer un nouveau type d'activité</h3><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addActivityType" />
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:575px;">
		<tr><td style="text-align:right;">Nom singulier :</td><td style="text-align:left;"><input style="width:250px;" name="nomsing" type="text" /></td></tr>
		<tr><td style="text-align:right;">Nom pluriel :</td><td style="text-align:left;"><input style="width:250px;" name="nompl" type="text" /></td></tr>
		<tr><td style="text-align:right;">Description :</td><td style="text-align:left;"><textarea style="width:250px;" name="desc"></textarea></td></tr>
		<tr><td style="text-align:right;">URL :</td><td style="text-align:left;"><input style="width:250px;" name="URL" type="text" /></td></tr>
		<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
		<select style="width:75px;" name="actif" id="actif" size="1">
		<option value="1">Oui (1)</option>
		<option value="0">Non (0)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
		</table><br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br /><br />
</div><?php }} ?>