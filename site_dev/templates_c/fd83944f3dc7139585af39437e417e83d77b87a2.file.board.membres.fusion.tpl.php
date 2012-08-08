<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 03:32:40
         compiled from "templates/admin/pages/board.membres.fusion.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8831065684fc488ef9030f2-04285796%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd83944f3dc7139585af39437e417e83d77b87a2' => 
    array (
      0 => 'templates/admin/pages/board.membres.fusion.tpl',
      1 => 1338946342,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8831065684fc488ef9030f2-04285796',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc488ef944da',
  'variables' => 
  array (
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc488ef944da')) {function content_4fc488ef944da($_smarty_tpl) {?><div id="main">
	<h6>Membres / Liste des membres / <<?php ?>?php echo $id ; ?<?php ?>></h6>
	<br /><hr /><br />

	<h1>Fusionner deux comptes INREES</h1><br />

	Module pour fusionner deux comptes INREES.
	<br /><br />
	<form method="post" action="admin.php?cat=membres&scat=fusionInfos">
		<input type="hidden" name="userToDelete" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
" />
		<fieldset>
			<legend>Données à remplir</legend>
		
			<table><tr><td style="width: 80px;"></td><td>
				<strong><font class="red">Etes-vous certain de vouloir fusionner ces deux comptes ?</font></strong>
				<br /><br />
				<strong><font style="font-size:14px;">Compte à supprimer :</font></strong><br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong><?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</strong> - <span style="text-transform: uppercase;"><?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
</span> <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
</span>
				<br /><br /><br />
				<strong><font style="font-size:14px;">Compte à garder :</font></strong> 
				<span id="userNameInput">
					<input type="text" name="userName" id="userName" style="border: 0px; background-color: transparent; border-bottom: 2px solid #536482;" onKeyUp="findFusionUser()" autocomplete="off" />
				</span>
				<input type="hidden" name="userToKeep" id="fusionUserId" value="0" /><br /><br />
				<span style="font-size: 12px; margin-left: 20px;" id="userNameDisplay"></span>
				<br /><br /><br />
				</td></tr>
				<tr>
					<td></td>
					<td align="left">
						<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<br /><br /><br />
</div><?php }} ?>