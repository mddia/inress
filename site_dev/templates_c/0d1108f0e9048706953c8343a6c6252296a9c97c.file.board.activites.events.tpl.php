<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 02:17:08
         compiled from "templates/admin/pages/board.activites.events.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11403629454fc41345bc07b6-03146865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d1108f0e9048706953c8343a6c6252296a9c97c' => 
    array (
      0 => 'templates/admin/pages/board.activites.events.tpl',
      1 => 1338250618,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11403629454fc41345bc07b6-03146865',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc41345ce0ca',
  'variables' => 
  array (
    'event' => 0,
    'eventTypes' => 0,
    'type' => 0,
    'themes' => 0,
    'theme' => 0,
    'locaux' => 0,
    'lieu' => 0,
    'supports' => 0,
    'support' => 0,
    'config' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc41345ce0ca')) {function content_4fc41345ce0ca($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
?><div id="main">
	<h6>Activités / <?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
</h6>
	<br /><hr /><br />

	<h1>Modifier <?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
 (#<?php echo $_smarty_tpl->tpl_vars['event']->value['id'];?>
)</h1><br />

	Modifier <?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>


	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="createActivite" />
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:575px;">
			<tr>
				<td style="text-align:right;">Choix de l'activité :</td>
				<td style="text-align:left;">
					<select style="width:175px;" name="activites" id="activites" size="1">
						<?php  $_smarty_tpl->tpl_vars['type'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['type']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['eventTypes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['type']->key => $_smarty_tpl->tpl_vars['type']->value){
$_smarty_tpl->tpl_vars['type']->_loop = true;
?>
							<?php if (($_smarty_tpl->tpl_vars['type']->value['actif']==1)){?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['event']->value['activites']==$_smarty_tpl->tpl_vars['type']->value['id'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['type']->value['nomsing'];?>
</option>
							<?php }?>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><font color="red">Choix du thème :</font></td>
				<td style="text-align:left;">
					<select style="width:175px;" name="theme" id="theme" size="1">
						<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['themes']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['event']->value['theme']==$_smarty_tpl->tpl_vars['theme']->value['id'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['theme']->value['titre'];?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Choix du lieu :</td>
				<td style="text-align:left;">
					<select style="width:175px;" name="locaux" id="locaux" size="1">
						<?php  $_smarty_tpl->tpl_vars['lieu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['lieu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locaux']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['lieu']->key => $_smarty_tpl->tpl_vars['lieu']->value){
$_smarty_tpl->tpl_vars['lieu']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['event']->value['locaux']==$_smarty_tpl->tpl_vars['lieu']->value['id'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;vertical-align:top;">Choix des intervenants :</td><td style="text-align:left;">
			<select style="width:175px;" name="intervenants[]" size="1">
				<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
				<?php } ?>
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
				<?php } ?>
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
				<?php } ?>
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
				<?php } ?>
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['supports']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
					<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
				<?php } ?>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">URL (internet) :</td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['url'];?>
" /></td></tr>
			<tr><td style="text-align:right;"><strong>Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="titre" type="text" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['titre'];?>
" /></td></tr>
			<tr><td style="text-align:right;"><strong>Sous-Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="sst" type="text" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['sst'];?>
" /></td></tr>
			<tr><td style="text-align:right;">Présentation :</td><td style="text-align:left;"><textarea style="width:250px;" name="presentation" type="text"><?php echo $_smarty_tpl->tpl_vars['event']->value['presentation'];?>
</textarea></td></tr>
			<tr><td style="text-align:right;">Online :</td><td style="text-align:left;">
			<select style="width:75px;" name="online" size="1">
			<option value="1">Oui (1)</option>
			<option value="0">Non (0)</option>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">Date de début :</td><td style="text-align:left;">
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateD'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

			</td></tr>
			<tr><td style="text-align:right;">Date de fin :</td><td style="text-align:left;">
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['event']->value['dateF'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Disponibles (sur place) :</td><td style="text-align:left;"><input style="width:35px;" maxlength="5" type="text" name="dispos" value="<?php echo $_smarty_tpl->tpl_vars['event']->value['dispos'];?>
"/></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
			<select style="width:75px;" name="actif" id="actif" size="1">
			<option value="1">Oui (1)</option>
			<option value="0">Non (0)</option>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>


			<!--<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>-->
		</table>
		<br /><br />
		
		</fieldset>
	</form>


	<br /><br /><br />
</div><?php }} ?>