<?php /* Smarty version Smarty-3.1.7, created on 2012-05-29 11:02:01
         compiled from "templates/admin/pages/board.membres.membres.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7180795574fb02dc61c1463-72511645%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6f2025660afa1acad7316a58c0245ae1cdeceff' => 
    array (
      0 => 'templates/admin/pages/board.membres.membres.tpl',
      1 => 1338282120,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7180795574fb02dc61c1463-72511645',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb02dc64c8be',
  'variables' => 
  array (
    'user' => 0,
    'GET' => 0,
    'config' => 0,
    'address' => 0,
    'countries' => 0,
    'country' => 0,
    'states' => 0,
    'state' => 0,
    'abo' => 0,
    'mag' => 0,
    'order' => 0,
    'message' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb02dc64c8be')) {function content_4fb02dc64c8be($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'smarty/libs/plugins/modifier.date_format.php';
if (!is_callable('smarty_function_cycle')) include 'smarty/libs/plugins/function.cycle.php';
?><div id="main">

	<h6>Membres / Liste des membres / <?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
</h6>
	<br /><hr /><br />


	<h1 <?php if (($_smarty_tpl->tpl_vars['user']->value['myinreesgratuit']==1)){?>style="color:green;"<?php }?>><font style="text-transform:uppercase;"><?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
</font> <?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
 (<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
 ---> <?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
)</h1><br />


	Editer un membre de l'INREES.
	<br /><br />

	<form>
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:675px;">
				<tr><td style="text-align:right;"></td><td style="text-align:left;">
				<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
"><strong>Infos</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&details=adresses"><strong>Adresses</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&details=my"><strong>Abonnement</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&details=routage">Routage</a> |
				<a href="admin.php?cat=membres&scat=membres&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
&details=operations"><strong>Opérations</strong></a>
				</td></tr>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				
				<!-- SI DETAILS NON DEFINIS -->
				<?php if (($_smarty_tpl->tpl_vars['GET']->value['details']=='0')){?>
					<?php if (($_smarty_tpl->tpl_vars['user']->value['email']=='0')){?>
						<tr>
							<td style="text-align:right;">Email :</td>
							<td style="text-align:left;">
							<input style="width:250px;" name="email" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" />
							<?php if (($_smarty_tpl->tpl_vars['user']->value['noemail']==1)){?>
								<strong>Ce membre n'a pas d'email</strong><br />
								<a href="admin.php?cat=membres&scat=emailChange&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Changer cet email</a>
							<?php }?>
							</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td style="text-align:right;">Email :</td>
							<td style="text-align:left;">
							<?php if (($_smarty_tpl->tpl_vars['user']->value['clef']==1)){?>
								<strong><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
 - <font style="color:red;">COMPTE ACTIF</font></strong><br />
								<em style="color:red;">Merci de faire attention avant de modifier ou supprimer des données</em><br />
								<a href="admin.php?cat=membres&scat=emailChange&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Changer cet email</a>
								<input style="width:250px;" name="email" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" />
							<?php }else{ ?>
								<input style="width:250px;" name="email" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
" />
							<?php }?>
							</td>
						</tr>
					<?php }?>
					<tr>
						<td style="text-align:right;">Password :</td><td style="text-align:left;">
							<strong>
								<?php if (($_smarty_tpl->tpl_vars['user']->value['clef']==0)){?>
									non-créé
								<?php }elseif(($_smarty_tpl->tpl_vars['user']->value['clef']==1)){?>
									déjà créé
								<?php }?>
							</strong> 
							<a href="javascript:clePassMY('.<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
.')" title="Réinitialiser ce compte">
								<img src="http://admin.inrees.com/adm/images/icon_remb.gif" width="14px" height="14px" />
							</a>
							(bouton valid compte non abouti)
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>			
					<tr>
						<td style="text-align:right;">Civilité :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="civilite" size="1">
									<option value=""></option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['civilite']=='Monsieur')){?>selected="selected"<?php }?> value="Monsieur">Monsieur</option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['civilite']=='Madame')){?>selected="selected"<?php }?> value="Madame">Madame</option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['civilite']=='Mademoiselle')){?>selected="selected"<?php }?> value="Mademoiselle">Mademoiselle</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Nom :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="nom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Prénom :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="prenom" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">
							<font style="color:red;">Société :</font>
						</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="societe" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['societe'];?>
" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td style="text-align:right;">Téléphone fixe :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="telfix" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['telfix'];?>
" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Téléphone portable :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="telephone" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['telephone'];?>
" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Informations sur le mobile ?</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="mobileOK" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['mobileOK']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['mobileOK']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					
					<tr>
						<td style="text-align:right;">Bénévole ?</td><td style="text-align:left;">
							<select style="width:175px;" name="ben" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['mben']=='1')){?>selected="selected"<?php }?> value="1">Oui, actif</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['mben']=='2')){?>selected="selected"<?php }?> value="2">Oui, en attente</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['mben']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Bénévole (description) :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="mbendesc" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['mbendesc'];?>
" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					
					
					<tr>
						<td style="text-align:right;"><strong>RP ou VIP :</strong></td>
						<td style="text-align:left;">
							<select style="width:175px;" name="vip" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['vip']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['vip']!='1')){?>selected="selected"<?php }?> value="0">Non</option>
							</select> 
							<a href="admin.php?cat=membres&scat=ajoutGratuit&emailget=<?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
">Transformer en abonné gratuit</a>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Presse :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="PRESSE" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['vippresse']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['vippresse']!='1')){?>selected="selected"<?php }?> value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>			
					
					<tr>
						<td style="text-align:right;">Liaison partner :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="newpartner" size="1">
								<option value="0" selected="selected">===== NO PARTNER =====</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Contact bureau (Tél.) :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="contactbureau" type="text" value="" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Fonction bureau :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="fonctionbureau" type="text" value="" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td align="right">Remarques :</td>
						<td align="left">
							<textarea style="width:250px;" name="remarques" type="text"><?php echo $_smarty_tpl->tpl_vars['user']->value['remarques'];?>
</textarea><br />
							<em>(non-visible par l'utilisateur)</em>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr>
						<td style="text-align:right;">Profession (secteur) :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="professions" id="theme" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['professions']=='0')){?>selected="selected"<?php }?> value="0">=== inconnu ===</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Profession :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="profession" type="text" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['profession'];?>
" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Date de naissance :</td>
						<td style="text-align:left;">
							<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['user']->value['datenaissance'],$_smarty_tpl->tpl_vars['config']->value['date']);?>

						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>	
		
					<tr>
						<td style="text-align:right;">Découvert :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="decouvert" id="theme" size="1">
								<option selected="selected" value="0">=== inconnu ===</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Pourquoi :</td>
						<td style="text-align:left;">
							<textarea style="width:250px;" name="pourquoi" type="text"><?php echo $_smarty_tpl->tpl_vars['user']->value['pourquoi'];?>
</textarea>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr>
						<td style="text-align:right;">Avez-vous vécu une expérience :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="experiences" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['experiences']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['experiences']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
					<tr>
						<td style="text-align:right;">Sites web :</td>
						<td style="text-align:left;">
						
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td style="text-align:right;">Etes-vous présent sur Twitter ?</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="facebook" size="1">
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['twitter']=='1')){?>selected="selected"<?php }?> value="1">Oui</option>
								<option <?php if (($_smarty_tpl->tpl_vars['user']->value['twitter']=='0')){?>selected="selected"<?php }?> value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				<?php }elseif(($_smarty_tpl->tpl_vars['GET']->value['details']=='adresses')){?>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Adresse(s)</th>
								<th>Informations</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['address'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['address']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['addresses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['address']->key => $_smarty_tpl->tpl_vars['address']->value){
$_smarty_tpl->tpl_vars['address']->_loop = true;
?>
								<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
									<td>									
										<strong>
										<?php echo $_smarty_tpl->tpl_vars['address']->value['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['name'];?>

										</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['address']->value['address1'];?>
<br />
										<?php echo $_smarty_tpl->tpl_vars['address']->value['zipCode'];?>
 <?php echo $_smarty_tpl->tpl_vars['address']->value['city'];?>
<br />
										<strong><?php echo $_smarty_tpl->tpl_vars['address']->value['country']['name'];?>
</strong>
										<?php if (($_smarty_tpl->tpl_vars['address']->value['country']['id']=='172')){?>
											<br /><strong><?php echo $_smarty_tpl->tpl_vars['address']->value['state']['name'];?>
</strong>
										<?php }?>
										<br />
									</td>
									<td style="text-align: center;">
										<?php if (($_smarty_tpl->tpl_vars['address']->value['default']=='1')){?>
											<strong>Adresse par défaut</strong><br />
										<?php }?>
									</td>
									<td style="text-align: center;">
										<?php if (($_smarty_tpl->tpl_vars['address']->value['default']=='0')){?>
											<a onClick="setAddressAsDefault(<?php echo $_smarty_tpl->tpl_vars['address']->value['id'];?>
);">
												<img src="images/icons/award_star_gold_1.png" alt="Définir comme adresse par défaut" title="Définir comme adresse par défaut" /></a>
										<?php }?>
										<a onClick="deleteAddress(<?php echo $_smarty_tpl->tpl_vars['address']->value['id'];?>
);">
											<img src="images/icons/bin_closed.png" alt="Supprimer l'adresse" title="Supprimer l'adresse" /></a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px; border-bottom: 0px;">
						<thead>
							<tr>
								<th>Ajouter une adresse</th>
							</tr>
						</thead>
					</table>
					<table cellspacing="1" style="width:675px; border-top: 0px;">
						<tbody>
							<tr>
								<td><strong>Nom</strong></td>
								<td><input type="text" name="name" id="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['nom'];?>
" /></td>
							</tr>
							<tr>
								<td><strong>Prénom</strong></td>
								<td><input type="text" name="firstName" id="firstName" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['prenom'];?>
" /></td>
							</tr>
							<tr>
								<td><strong>Adresse 1</strong></td>
								<td><input type="text" name="address1" id="address1" /></td>
							</tr>
							<tr>
								<td><strong>Adresse 2</strong></td>
								<td><input type="text" name="address2" id="address12" /></td>
							</tr>
							<tr>
								<td><strong>Ville</strong></td>
								<td><input type="text" name="city" id="city" /></td>
							</tr>
							<tr>
								<td><strong>Code postale</strong></td>
								<td><input type="text" name="zipCode" id="zipCode" /></td>
							</tr>
							<tr>
								<td><strong>Pays</strong></td>
								<td>
									<select name="country" id="country" style="width: 160px;">
										<?php  $_smarty_tpl->tpl_vars['country'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['country']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['country']->key => $_smarty_tpl->tpl_vars['country']->value){
$_smarty_tpl->tpl_vars['country']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['country']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['country']->value['id']==61)){?>selected<?php }?> onClick="<?php if (($_smarty_tpl->tpl_vars['country']->value['id']==172)){?>displayStates();<?php }else{ ?>hideStates()<?php }?>"><?php echo $_smarty_tpl->tpl_vars['country']->value['name'];?>
</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td><strong id="statesLabel" style="display: none;">État</strong></td>
								<td>
									<select name="state" id="state" style="width: 160px; display: none;">
										<?php  $_smarty_tpl->tpl_vars['state'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['state']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['states']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['state']->key => $_smarty_tpl->tpl_vars['state']->value){
$_smarty_tpl->tpl_vars['state']->_loop = true;
?>
											<option value="<?php echo $_smarty_tpl->tpl_vars['state']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['state']->value['name'];?>
</option>
										<?php } ?>
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="button" style="cursor: pointer;" value="Enregistrer l'adresse" onClick="recordUserAddress(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)" /></td>
							</tr>
						</tbody>
					</table>
				<?php }elseif(($_smarty_tpl->tpl_vars['GET']->value['details']=='my')){?>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Abonnement(s) en cours</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['abo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['abo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['abonnements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['abo']->key => $_smarty_tpl->tpl_vars['abo']->value){
$_smarty_tpl->tpl_vars['abo']->_loop = true;
?>
								<?php if (($_smarty_tpl->tpl_vars['abo']->value['actual']==1)){?>
									<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
										<td>
											<strong>
											<?php echo $_smarty_tpl->tpl_vars['abo']->value['title'];?>
<br />
											</strong>
												n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['startMag'];?>
 au n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['maxMag'];?>

											<div style="float: right; text-align: center; margin-top: -12px; margin-right: 5px;">
												<?php if (($_smarty_tpl->tpl_vars['abo']->value['isGift']!=0)){?>
													<img src="images/icons/gift.png" alt="Abo cadeau" title="Cet abonnement est un cadeau" style="margin-bottom: -3px;" /><br />
												<?php }?>
												<?php if (($_smarty_tpl->tpl_vars['abo']->value['subLimit']!=0)){?>
													<font color="blue" style="font-size:9px; font-weight:bold; cursor: default;" title="Avantages My INREES jusqu'au <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['abo']->value['subLimit'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
">+My</font>
												<?php }?>
											</div>
										</td>
									</tr>
								<?php }?>
							<?php } ?>
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Abonnement(s)</th>
								<th>Adresse(s) d'envoi</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['abo'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['abo']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['abonnements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['abo']->key => $_smarty_tpl->tpl_vars['abo']->value){
$_smarty_tpl->tpl_vars['abo']->_loop = true;
?>
								<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
									<td>
										<strong>
											<?php echo $_smarty_tpl->tpl_vars['abo']->value['title'];?>
<br />
										</strong>
										n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['startMag'];?>
 au n°<?php echo $_smarty_tpl->tpl_vars['abo']->value['maxMag'];?>
 
										<?php if (($_smarty_tpl->tpl_vars['abo']->value['isGift']!=0)){?>
											<img src="images/icons/gift.png" alt="Abo cadeau" title="Cet abonnement est un cadeau" style="margin-bottom: -3px;" /> 
										<?php }?>
										<?php if (($_smarty_tpl->tpl_vars['abo']->value['subLimit']!=0)){?>
											<font color="blue" style="font-size:9px; font-weight:bold; cursor: default;" title="Avantages My INREES jusqu'au <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['abo']->value['subLimit'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
">+My</font>
										<?php }?>
									</td>
									<td>
										<strong>
										<?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['firstName'];?>
 <?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['name'];?>

										</strong><br />
										<?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['address1'];?>
<br />
										<?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['zipCode'];?>
 <?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['city'];?>
<br />
										<strong><?php echo $_smarty_tpl->tpl_vars['abo']->value['address']['country']['name'];?>
</strong>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Magazines reçus</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['mag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['receivedMags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mag']->key => $_smarty_tpl->tpl_vars['mag']->value){
$_smarty_tpl->tpl_vars['mag']->_loop = true;
?>
								<?php if (($_smarty_tpl->tpl_vars['abo']->value['actual']==1)){?>
									<tr class="<?php echo smarty_function_cycle(array('values'=>'row1, row2'),$_smarty_tpl);?>
">
										<td>
											<strong><?php echo $_smarty_tpl->tpl_vars['mag']->value['aboTitle'];?>
</strong><br />
											Mag n°<?php echo $_smarty_tpl->tpl_vars['mag']->value['numero'];?>

										</td>
									</tr>
								<?php }?>
							<?php } ?>
						</tbody>
					</table>
				<?php }elseif(($_smarty_tpl->tpl_vars['GET']->value['details']=='routage')){?>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<tr>
							<td style="text-align:right;">Newsletter actif</td>
							<td style="text-align:left;">
								<select style="width:175px;" name="newsletteractif" id="newsletteractif" size="1">
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['actif']==1)){?>selected="selected"<?php }?> value="1">Oui</option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['actif']==0)){?>selected="selected"<?php }?> value="0">Non</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;">Newsletter fréquence</td>
							<td style="text-align:left;">
								<select style="width:175px;" name="frequence" id="frequence" size="1">
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['frequence']==1)){?>selected="selected"<?php }?> value="1">Mensuel</option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['frequence']==0)){?>selected="selected"<?php }?> value="0">Toutes les newsletters</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"></td>
							<td style="text-align:left;"></td>
						</tr>
						<tr>
							<td style="text-align:right;">Routage postaux</td>
							<td style="text-align:left;">
								<select style="width:175px;" id="routage" name="routage" size="1">
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['actifpost']==1)){?>selected="selected"<?php }?> value="1">Oui</option>
									<option <?php if (($_smarty_tpl->tpl_vars['user']->value['actifpost']==0)){?>selected="selected"<?php }?> value="0">Non</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"></td>
							<td style="text-align:left;"><br />
								<input type="button" value="Enregistrer" style="cursor: pointer;" onClick="updateUserRoutage(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)" />
							</td>
						</tr>
					</table>
				<?php }elseif(($_smarty_tpl->tpl_vars['GET']->value['details']=='operations')){?>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Commandes</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row1">
								<td>
									<i>A effectué <?php echo $_smarty_tpl->tpl_vars['user']->value['receivedOrders']['count'];?>
 commande(s)</i>
								</td>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['order'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['order']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['receivedOrders']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['order']->key => $_smarty_tpl->tpl_vars['order']->value){
$_smarty_tpl->tpl_vars['order']->_loop = true;
?>
								<tr class="<?php echo smarty_function_cycle(array('values'=>'row2, row1'),$_smarty_tpl);?>
">
									<td <?php if (($_smarty_tpl->tpl_vars['order']->value['paid']=='0')){?>class="red"<?php }?>>									
										<strong>
											<a href="admin.php?cat=boutique&scat=macommande&id=<?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
">
											[n° <?php echo $_smarty_tpl->tpl_vars['order']->value['id'];?>
]</a></strong> le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['order']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>
 (<?php echo $_smarty_tpl->tpl_vars['order']->value['value'];?>
€)
										</strong>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Messages</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row1">
								<td>
									<i>Nous a contacté <?php echo $_smarty_tpl->tpl_vars['user']->value['receivedMessages']['count'];?>
 fois</i>
								</td>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['user']->value['receivedMessages']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
								<tr class="<?php echo smarty_function_cycle(array('values'=>'row2, row1'),$_smarty_tpl);?>
">
									<td>									
										<strong>
											<a href="admin.php?cat=messagerie&scat=message&id=<?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
">
											[n° <?php echo $_smarty_tpl->tpl_vars['message']->value['id'];?>
]</a></strong> le <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['date']);?>
 à  <?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['message']->value['timestamp'],$_smarty_tpl->tpl_vars['config']->value['hours']);?>

									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				<?php }?>				
		</table>
		<br />
			<?php if (($_smarty_tpl->tpl_vars['user']->value['moderateur']!=0)){?>
				<strong>CE COMPTE NE PEUX PAS ETRE SUPPRIMÉ OU FUSIONNÉ (MODÉRATEUR)</strong>
			<?php }else{ ?>
				<a class="buttonplusred" href="admin.php?cat=membres&scat=fusion&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Fusionner les données de ce compte</a>
				<a class="buttonplusred" onClick="deleteUser(<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
)">Supprimer ce compte</a>
			<?php }?>
		<br /><br />
		</fieldset>
	</form><br />

	<!--<a class="buttonplusred" href="admin.php?cat=membres&scat=fusion&id=<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">Fusionner les données de ce compte</a>
	<a class="buttonplusred" href="javascript:SupprimerCompteEmail('<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
')">Supprimer ce compte</a>-->
	<br /><br /><br />
</div><?php }} ?>