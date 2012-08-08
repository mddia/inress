<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 11:44:49
         compiled from "templates/admin/pages/board.partenaires.partner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:436893564fc73d9125a9e8-96883336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a1716f1cb4dda950052b66c53826bd5b78ee562d' => 
    array (
      0 => 'templates/admin/pages/board.partenaires.partner.tpl',
      1 => 1334770407,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '436893564fc73d9125a9e8-96883336',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'partner' => 0,
    'countries' => 0,
    'country' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc73d912fa88',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc73d912fa88')) {function content_4fc73d912fa88($_smarty_tpl) {?><div id="main">
	<h6>Magazine / Edition des partenaires / <?php echo $_smarty_tpl->tpl_vars['partner']->value['nom'];?>
</h6>
	<br /><hr /><br />
	<h1><?php echo $_smarty_tpl->tpl_vars['partner']->value['nom'];?>
</h1><br />

	Editer un partenaire de l'INREES.
	<br /><br />

	<h3>Informations principales / <a href="admin.php?cat=partenaires&scat=partnerCommandBon&id=<?php echo $_smarty_tpl->tpl_vars['partner']->value['id'];?>
">Diffusion</a></h3><br />

	<table style="width:875px;">
		<form id="action_online_form" method="post" action="actions.php">
			<thead>
				<tr>
					<th colspan="2">Informations</th>
				</tr>
			</thead>
			<tbody>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				<tr>
					<td style="width:275px;text-align:right;"><font style="color:red;">Titre :</font></td><td style="text-align:left;"><input style="width:175px;" name="titre" type="text" maxlength="50" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['nom'];?>
" /></td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Description :</td><td style="text-align:left;"><input style="width:275px;" name="description" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['desc'];?>
" /></td>
				</tr>
				<tr>
					<td style="text-align:right;">Type de partenaire :</td>				
					<td style="text-align:left;">
						<select style="width:175px;" name="descid" size="1">
							<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>

				<tr>
					<td style="text-align:right;">Site :</td>
					<td style="text-align:left;">
						<input style="width:175px;" name="site" type="text" maxlength="255" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['site'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse postale :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['adresse'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse 2 :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse2" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['adresse2'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse 3 :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse3" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['adresse3'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Code postal :</font>
					</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="postal" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['postal'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Ville :</font>
					</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="ville" type="text" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['ville'];?>
" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Pays :</font>
					</td>
					<td style="text-align:left;">
						<select name="pays">
							<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['country']->value['id']==$_smarty_tpl->tpl_vars['partner']->value['pays'])){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;">
						<input class="button2" type="submit" value="Valider" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
				<tr>
					<td style="text-align:right;">Actif site :</td>
					<td style="text-align:left;">
						<select style="width:175px;" name="actifsite" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['partner']->value['actifsite']=='1')){?> selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['partner']->value['actifsite']=='0')){?> selected="selected"<?php }?>  value="0">Non</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
			</tbody>
			<input type="hidden" name="formName" value="updatePartner" />
			<input type="hidden" name="partnerId" value="<?php echo $_smarty_tpl->tpl_vars['partner']->value['id'];?>
" />
		</form>
	</table>


			<br /><br />
			<a class="buttonplus" href="admin.php?cat=partenaires&scat=bonDepot&id=<?php echo $_smarty_tpl->tpl_vars['partner']->value['id'];?>
">Créer un bon de commande</a> 
			<!--<a class="buttonplus" target="_blank" href="admin.php?cat=budget&scat=ajoutrentx&id=<?php echo $_smarty_tpl->tpl_vars['partner']->value['id'];?>
">Créer une facture</a> -->
	<br /><br />
		
		
	<h3>Personnes à contacter chez <?php echo $_smarty_tpl->tpl_vars['partner']->value['nom'];?>
</h3><br />

	<table cellspacing="1" style="width:720px;">
		<thead>
		<tr>
			<th>Nom / Prénom</th>
			<th>Contact</th>
			<th>edit</th>
		</tr>
		</thead>
	</table>
	<br /><br /><br /><hr /><br />
</div><?php }} ?>