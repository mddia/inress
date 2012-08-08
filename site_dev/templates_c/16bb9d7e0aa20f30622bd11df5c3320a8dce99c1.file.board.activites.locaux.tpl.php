<?php /* Smarty version Smarty-3.1.7, created on 2012-05-26 13:07:16
         compiled from "templates/admin/pages/board.activites.locaux.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15028050554fc0b7bdcaab50-02141621%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16bb9d7e0aa20f30622bd11df5c3320a8dce99c1' => 
    array (
      0 => 'templates/admin/pages/board.activites.locaux.tpl',
      1 => 1338030363,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15028050554fc0b7bdcaab50-02141621',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc0b7bdd0110',
  'variables' => 
  array (
    'lieu' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc0b7bdd0110')) {function content_4fc0b7bdd0110($_smarty_tpl) {?><div id="main">
	<h6>Activités / Website / Edition des locaux / <?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
</h6>
	<br /><hr /><br />

	<h1><?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
</h1><br />

	Editer les locaux de l'INREES.
	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="updateLocaux" />
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['id'];?>
" />
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr><td style="text-align:right;">Nom :</td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
" /></td></tr>
				<tr><td style="text-align:right;">Adresse (ligne 1) :</td><td style="text-align:left;"><input style="width:250px;" name="adresse" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['adresse'];?>
" /></td></tr>	
				<tr><td style="text-align:right;">Adresse (ligne 2) :</td><td style="text-align:left;"><input style="width:250px;" name="adressebis" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['adressebis'];?>
" /></td></tr>
				<tr><td style="text-align:right;">Remarques :</td><td style="text-align:left;"><input style="width:250px;" name="remarques" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['remarques'];?>
" /></td></tr>
				<tr><td style="text-align:right;">Code Postal :</td><td style="text-align:left;"><input style="width:250px;" name="postal" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['postal'];?>
" /></td></tr>
				<tr><td style="text-align:right;">Ville :</td><td style="text-align:left;"><input style="width:250px;" name="ville" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['ville'];?>
" /></td></tr>
				<tr><td style="text-align:right;">Google Map :</td><td style="text-align:left;"><input style="width:250px;" name="map" type="text" value="<?php echo $_smarty_tpl->tpl_vars['lieu']->value['map'];?>
" /> <a target="_blank" href="http://maps.google.fr/maps?hl=fr&tab=wl">Go to Google map</a></td></tr>
				
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>				

				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br /><br />
</div><?php }} ?>