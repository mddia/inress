<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 13:32:04
         compiled from "templates/admin/pages/board.general.gestionModerateurs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:131474134fc4a95a6d74d6-17067216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5cc8431395fd59867d7b9616fdf43b21fd6761e' => 
    array (
      0 => 'templates/admin/pages/board.general.gestionModerateurs.tpl',
      1 => 1338291123,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '131474134fc4a95a6d74d6-17067216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc4a95a72820',
  'variables' => 
  array (
    'moderateurs' => 0,
    'mod' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc4a95a72820')) {function content_4fc4a95a72820($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<a name="maincontent"></a>
	<h6>Général / Gestion des modérateurs</h6>
	<br /><hr /><br />
	<h1>Gestion des modérateurs</h1><br />
	Liste des modérateurs.
	<br /><br />
	
	<table cellspacing="1" style="width: 900px;">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>email</th>
				<th>Niveau d'acces</th>
				<th>actif</th>
				<th>Responsabilités</th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['mod'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mod']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['moderateurs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mod']->key => $_smarty_tpl->tpl_vars['mod']->value){
$_smarty_tpl->tpl_vars['mod']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
" >
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['id'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['mod']->value['firstName'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['pseudo'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['email'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['acces'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['actif'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['mod']->value['responsabilites'];?>
</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	
	<br /><br />
	
	Ajouter un modérateur
	<br /><br />
	
	<form action="actions.php" method="POST">
		<input type="hidden" name="formName" value="addModerateur" />
		<table cellspacing="1" style="width: 900px; text-align: center;">
			<thead>
				<tr>
					<th>Nom / Prénom</th>
					<th>Pseudo</th>
					<th>email</th>
					<th>Niveau d'acces</th>
					<th>actif</th>
					<th>Responsabilités</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td>
						Nom : <br /><input type="text" name="name" /><br />
						Prénom : <br /><input type="text" name="firstName" />
					</td>
					<td>
						<input type="text" name="pseudo" />
					</td>
					<td>
						<input type="text" name="email" />
					</td>
					<td>
						<select name="acces">
							<option value="0">0 - Elevé</option>
							<option value="1">1 - Fort</option>
							<option value="2">2 - Normal</option>
							<option value="3">3 - Basic</option>
						</select>
					</td>
					<td>
						<select name="actif">
							<option value="1">1 - Oui</option>
							<option value="0">0 - Non</option>
						</select>
					</td>
					<td>
						<input type="text" name="responsabilites" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<input type="submit" value="Enregistrer" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div><?php }} ?>