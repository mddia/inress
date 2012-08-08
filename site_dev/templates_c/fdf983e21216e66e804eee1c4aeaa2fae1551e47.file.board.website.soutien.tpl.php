<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 16:58:43
         compiled from "templates/admin/pages/board.website.soutien.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6125353774fcf6db13abd68-65598052%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf983e21216e66e804eee1c4aeaa2fae1551e47' => 
    array (
      0 => 'templates/admin/pages/board.website.soutien.tpl',
      1 => 1338994704,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6125353774fcf6db13abd68-65598052',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fcf6db13e69e',
  'variables' => 
  array (
    'soutien' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fcf6db13e69e')) {function content_4fcf6db13e69e($_smarty_tpl) {?><div id="main">
	<h6>Activités / Intervenants</h6>
	<br /><hr /><br />

	<h1>Gestion des intervenants</h1><br />

	Gestion des intervenants

	<br /><br />

	<form method="post" action="actions.php">	
		<input type="hidden" name="formName" value="editIntervenant" />
		<fieldset>
			<legend>Données à remplir</legend>
			<br />
				
			<table style="width:590px;">
			<tr><td style="text-align:right;">Photoname (95x95) :</td><td style="text-align:left;"><input style="width:150px;" name="photo" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;"><strong>Nom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['nom'];?>
" /></td></tr>
			<tr><td style="text-align:right;"><strong>Prénom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="prenom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['prenom'];?>
" /></td></tr>
			<tr><td style="text-align:right;">Texte intro :</td><td style="text-align:left;"><textarea style="width:350px;height:150px;" name="intro" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['intro'];?>
"></textarea></td></tr>
			<tr><td style="text-align:right;">Citation :</td><td style="text-align:left;"><textarea style="width:350px;height:75px;" name="citation" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['citation'];?>
"></textarea></td></tr>
			<tr><td style="text-align:right;"><strong>URL (réf. internet) :</strong></td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['url'];?>
" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Profession FR :</td><td style="text-align:left;"><input style="width:250px;" name="professionFR" type="text" value="<?php echo $_smarty_tpl->tpl_vars['soutien']->value['professionFR'];?>
" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table><br /><br /><br />
		
		</fieldset>
	</form>
	<br /><br /><br />
</div><?php }} ?>