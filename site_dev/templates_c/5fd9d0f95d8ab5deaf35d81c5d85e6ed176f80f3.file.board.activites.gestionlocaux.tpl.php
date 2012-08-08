<?php /* Smarty version Smarty-3.1.7, created on 2012-05-27 18:34:40
         compiled from "templates/admin/pages/board.activites.gestionlocaux.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11612066284fbf54e6c1f763-79496834%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5fd9d0f95d8ab5deaf35d81c5d85e6ed176f80f3' => 
    array (
      0 => 'templates/admin/pages/board.activites.gestionlocaux.tpl',
      1 => 1338134471,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11612066284fbf54e6c1f763-79496834',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf54e6c5f11',
  'variables' => 
  array (
    'locaux' => 0,
    'lieu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf54e6c5f11')) {function content_4fbf54e6c5f11($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">
	<h6>Website / Activités / Liste des rendez-vous</h6>
	<br /><hr /><br />

	<h1>Gestion des locaux</h1><br />

	Gestion des locaux où est intervenu l'INREES.

	<br /><br />

	<h3>Liste des lieux de rendez-vous :</h3><br />

		<table cellspacing="1" style="width:650px;">
			<thead>
				<tr>
					<th style="width:150px;">NOM</th>
					<th>ADRESSE</th>
					<th>MAP</th>
					<th style="width:50px;">EDIT</th>
				</tr>
			</thead>
			<tbody>
				<?php  $_smarty_tpl->tpl_vars['lieu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lieu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locaux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lieu']->key => $_smarty_tpl->tpl_vars['lieu']->value){
$_smarty_tpl->tpl_vars['lieu']->_loop = true;
?>
					<tr class="<?php echo smarty_function_cycle(array('values'=>'row1,row2'),$_smarty_tpl);?>
">
						<td>
							<strong>
								<a href="admin.php?cat=activites&scat=activites&scat=locaux&id=<?php echo $_smarty_tpl->tpl_vars['lieu']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
</a>
							</strong>
						</td>
						<td>
							<?php echo $_smarty_tpl->tpl_vars['lieu']->value['adresse'];?>
<br />
							<?php if (($_smarty_tpl->tpl_vars['lieu']->value['adressebis']!='')){?><?php echo $_smarty_tpl->tpl_vars['lieu']->value['adressebis'];?>
<br /><?php }?>
							<?php if (($_smarty_tpl->tpl_vars['lieu']->value['remarques']!='')){?><?php echo $_smarty_tpl->tpl_vars['lieu']->value['remarques'];?>
<br /><?php }?>
							<?php echo $_smarty_tpl->tpl_vars['lieu']->value['postal'];?>
 <?php echo $_smarty_tpl->tpl_vars['lieu']->value['ville'];?>

						</td>
						<td>
							<a href="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['map'];?>
" target="_blank">Map</a>
						</td>
						<td>
							<a href="admin.php?cat=activites&scat=activites&scat=locaux&id=<?php echo $_smarty_tpl->tpl_vars['lieu']->value['id'];?>
">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif">
							</a> 
							<a onClick="deleteLocaux(<?php echo $_smarty_tpl->tpl_vars['lieu']->value['id'];?>
)">
								<img src="http://admin.inrees.com/adm/images/icon_annuler.gif">
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>


	<br /><br />

	<h3>Ajouter un nouveau lieu :</h3><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addLocaux" />
		<fieldset>
				<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr><td style="text-align:right;">Nom :</td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" /></td></tr>
				<tr><td style="text-align:right;">Adresse (ligne 1) :</td><td style="text-align:left;"><input style="width:250px;" name="adresse" type="text" /></td></tr>	
				<tr><td style="text-align:right;">Adresse (ligne 2) :</td><td style="text-align:left;"><input style="width:250px;" name="adressebis" type="text" /></td></tr>
				<tr><td style="text-align:right;">Remarques :</td><td style="text-align:left;"><input style="width:250px;" name="remarques" type="text" /></td></tr>
				<tr><td style="text-align:right;">Code Postal :</td><td style="text-align:left;"><input style="width:250px;" name="postal" type="text" /></td></tr>
				<tr><td style="text-align:right;">Ville :</td><td style="text-align:left;"><input style="width:250px;" name="ville" type="text" /></td></tr>
				<tr><td style="text-align:right;">Google Map :</td><td style="text-align:left;"><input style="width:250px;" name="map" type="text" /> <a target="_blank" href="http://maps.google.fr/maps?hl=fr&tab=wl">Go to Google map</a></td></tr>
				
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

				

				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br />
</div><?php }} ?>