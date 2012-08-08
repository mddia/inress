<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 16:48:11
         compiled from "templates/admin/pages/board.website.gestionIntervenants.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16988758924fcf690e51d652-97737712%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e80cc50d79227bf6ba8b21b07692e8669ab8ef5a' => 
    array (
      0 => 'templates/admin/pages/board.website.gestionIntervenants.tpl',
      1 => 1338994012,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16988758924fcf690e51d652-97737712',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fcf690e57879',
  'variables' => 
  array (
    'soutiens' => 0,
    'soutien' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fcf690e57879')) {function content_4fcf690e57879($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Activités / Intervenants</h6>
	<br /><hr /><br />

	<h1>Gestion des intervenants</h1><br />

	Gestion des intervenants

	<br /><br />

	<form method="post" action="actions.php">	
		<input type="hidden" name="formName" value="addIntervenant" />
		<fieldset>
			<legend>Données à remplir</legend>
			<br />
				
			<table style="width:590px;">
			<tr><td style="text-align:right;">Photoname (95x95) :</td><td style="text-align:left;"><input style="width:150px;" name="photo" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;"><strong>Nom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" /></td></tr>
			<tr><td style="text-align:right;"><strong>Prénom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="prenom" type="text" /></td></tr>
			<tr><td style="text-align:right;">Texte intro :</td><td style="text-align:left;"><textarea style="width:350px;height:150px;" name="intro" type="text"></textarea></td></tr>
			<tr><td style="text-align:right;">Citation :</td><td style="text-align:left;"><textarea style="width:350px;height:75px;" name="citation" type="text"></textarea></td></tr>
			<tr><td style="text-align:right;"><strong>URL (réf. internet) :</strong></td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Profession FR :</td><td style="text-align:left;"><input style="width:250px;" name="professionFR" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table><br /><br /><br />
		
		</fieldset>
	</form>
		
	<h1>Intervenants</h1><br />
	
	<table cellspacing="1" style="width:825px;">
		<thead>
			<tr>
				<th><strong>Nom</strong></th>
				<th><strong>Prénom</strong></th>
				<th><strong>Edit</strong></th>
			</tr>
		</thead>
		<tbody>
			<?php  $_smarty_tpl->tpl_vars['soutien'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['soutien']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['soutiens']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['soutien']->key => $_smarty_tpl->tpl_vars['soutien']->value){
$_smarty_tpl->tpl_vars['soutien']->_loop = true;
?>
				<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
					<td><?php echo $_smarty_tpl->tpl_vars['soutien']->value['nom'];?>
</td>
					<td>
						<?php echo $_smarty_tpl->tpl_vars['soutien']->value['prenom'];?>

					</td>
					<td style="text-align: center;">
						<a href="admin.php?cat=website&scat=soutien&id=<?php echo $_smarty_tpl->tpl_vars['soutien']->value['id'];?>
">
							<img title="Editer commande" alt="Editer commande" src="http://admin.inrees.com/adm/images/iconEdit.gif">
						</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>

	<br /><br /><br />
</div><?php }} ?>