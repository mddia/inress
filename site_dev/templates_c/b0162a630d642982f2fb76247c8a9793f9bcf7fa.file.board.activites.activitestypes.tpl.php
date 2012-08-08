<?php /* Smarty version Smarty-3.1.7, created on 2012-05-25 13:25:40
         compiled from "templates/admin/pages/board.activites.activitestypes.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3922981224fbf65e80f7ae3-13035186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0162a630d642982f2fb76247c8a9793f9bcf7fa' => 
    array (
      0 => 'templates/admin/pages/board.activites.activitestypes.tpl',
      1 => 1337944300,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3922981224fbf65e80f7ae3-13035186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf65e814a75',
  'variables' => 
  array (
    'type' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf65e814a75')) {function content_4fbf65e814a75($_smarty_tpl) {?><div id="main">
	<h6>Activités / Website / Edition des rendez-vous / <?php echo $_smarty_tpl->tpl_vars['type']->value['nompluriel'];?>
</h6>
	<br /><hr /><br />

	<h1><?php echo $_smarty_tpl->tpl_vars['type']->value['nompluriel'];?>
</h1><br />

	Editer les types d'activités de l'INREES.
	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="updateActivityType" />
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['id'];?>
" />
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr>
					<td style="text-align:right;">Nom singulier :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="nomsing" type="text" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['nomsing'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">Nom pluriel :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="nompl" type="text" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['nompluriel'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">Description :</td>
					<td style="text-align:left;">
						<textarea style="width:250px;" name="desc"><?php echo $_smarty_tpl->tpl_vars['type']->value['description'];?>
</textarea>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">URL :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="urlactiv" type="text" value="<?php echo $_smarty_tpl->tpl_vars['type']->value['urlactiv'];?>
" />
					</td>
				</tr>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>


				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br />
	<a href="http://admin.inrees.com/adm/index.php?cat=website&scat=gestionactivitestypes">Retourner sur la liste des types d'activités</a>

	<br /><br /><br />
</div><?php }} ?>