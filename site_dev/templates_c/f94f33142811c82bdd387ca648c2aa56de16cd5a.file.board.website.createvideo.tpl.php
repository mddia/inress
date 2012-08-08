<?php /* Smarty version Smarty-3.1.7, created on 2012-07-06 12:50:23
         compiled from "templates/admin/pages/board.website.createvideo.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16808278734ff6c2ef10ba59-24858252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f94f33142811c82bdd387ca648c2aa56de16cd5a' => 
    array (
      0 => 'templates/admin/pages/board.website.createvideo.tpl',
      1 => 1334007810,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16808278734ff6c2ef10ba59-24858252',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'supports' => 0,
    'support' => 0,
    'themes' => 0,
    'theme' => 0,
    'date' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4ff6c2ef33b39',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff6c2ef33b39')) {function content_4ff6c2ef33b39($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_orderby')) include 'smarty/libs/plugins/modifier.orderby.php';
?><div id="main">
<a name="maincontent"></a>


<h6>Website / Podcasts / Insérer une nouvelle video</h6>
<br /><hr /><br />



<h1>Insérer une nouvelle video</h1><br />
<br />
<br />
<form id="action_online_form" method="post" action="actions.php">
	<input type="hidden" name="formName" value="createVideo" />
	<fieldset>
		<legend>Données à remplir</legend>
		<table style="width:575px;">
			<tr>
				<td style="text-align:right;"></td><td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant (principal) :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant" size="1">
						<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['supports']->value,"id"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
" <?php if (($_smarty_tpl->tpl_vars['support']->value['id']=='50')){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
						<?php } ?>
					</select> 
					<a href="admin.php?cat=website&scat=createsoutien">Insérer un soutien</a>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant2" size="1">
						<option value="0">(aucun)</option>
						<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['supports']->value,"id"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant3" size="1">
						<option value="0">(aucun)</option>
						<?php  $_smarty_tpl->tpl_vars['support'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['support']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['supports']->value,"id"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['support']->key => $_smarty_tpl->tpl_vars['support']->value){
$_smarty_tpl->tpl_vars['support']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['support']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['support']->value['nom'];?>
 <?php echo $_smarty_tpl->tpl_vars['support']->value['prenom'];?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;">
					<font color="red">Choix du thème :</font>
				</td>
				<td style="text-align:left;">
					<select style="width:175px;" name="theme" id="theme" size="1">
						<?php  $_smarty_tpl->tpl_vars['theme'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['theme']->_loop = false;
 $_from = smarty_modifier_orderby($_smarty_tpl->tpl_vars['themes']->value,"ordre"); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['theme']->key => $_smarty_tpl->tpl_vars['theme']->value){
$_smarty_tpl->tpl_vars['theme']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['theme']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['theme']->value['titre'];?>
</option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;">URL (sur internet) :</td>
				<td style="text-align:left;">
					<input style="width:250px;" name="url" type="text" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><strong>Titre :</strong></td>
				<td style="text-align:left;">
					<input style="width:250px;" name="titre" type="text" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><strong>Sous-Titre :</strong></td>
				<td style="text-align:left;"><input style="width:250px;" name="sst" type="text" /></td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>					
			<tr>
				<td style="text-align:right;">Date (de publication) :</td>
				<td style="text-align:left;">		
					<select style="width:40px;" name="jours" size="1">
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="01")){?>selected="selected"<?php }?> value="01">01</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="02")){?>selected="selected"<?php }?> value="02">02</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="03")){?>selected="selected"<?php }?> value="03">03</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="04")){?>selected="selected"<?php }?> value="04">04</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="05")){?>selected="selected"<?php }?> value="05">05</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="06")){?>selected="selected"<?php }?> value="06">06</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="07")){?>selected="selected"<?php }?> value="07">07</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="08")){?>selected="selected"<?php }?> value="08">08</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="09")){?>selected="selected"<?php }?> value="09">09</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="10")){?>selected="selected"<?php }?> value="10">10</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="11")){?>selected="selected"<?php }?> value="11">11</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="12")){?>selected="selected"<?php }?> value="12">12</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="13")){?>selected="selected"<?php }?> value="13">13</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="14")){?>selected="selected"<?php }?> value="14">14</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="15")){?>selected="selected"<?php }?> value="15">15</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="16")){?>selected="selected"<?php }?> value="16">16</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="17")){?>selected="selected"<?php }?> value="17">17</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="18")){?>selected="selected"<?php }?> value="18">18</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="19")){?>selected="selected"<?php }?> value="19">19</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="20")){?>selected="selected"<?php }?> value="20">20</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="21")){?>selected="selected"<?php }?> value="21">21</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="22")){?>selected="selected"<?php }?> value="22">22</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="23")){?>selected="selected"<?php }?> value="23">23</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="24")){?>selected="selected"<?php }?> value="24">24</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="25")){?>selected="selected"<?php }?> value="25">25</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="26")){?>selected="selected"<?php }?> value="26">26</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="27")){?>selected="selected"<?php }?> value="27">27</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="28")){?>selected="selected"<?php }?> value="28">28</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="29")){?>selected="selected"<?php }?> value="29">29</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="30")){?>selected="selected"<?php }?> value="30">30</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['jour']=="31")){?>selected="selected"<?php }?> value="31">31</option>
					</select>
					 
					<select style="width:140px;" name="mois" size="1">
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="01")){?>selected="selected"<?php }?> value="01">01 - Janvier</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="02")){?>selected="selected"<?php }?> value="02">02 - Février</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="03")){?>selected="selected"<?php }?> value="03">03 - Mars</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="04")){?>selected="selected"<?php }?> value="04">04 - Avril</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="05")){?>selected="selected"<?php }?> value="05">05 - Mai</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="06")){?>selected="selected"<?php }?> value="06">06 - Juin</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="07")){?>selected="selected"<?php }?> value="07">07 - Juillet</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="08")){?>selected="selected"<?php }?> value="08">08 - Aout</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="09")){?>selected="selected"<?php }?> value="09">09 - Septembre</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="10")){?>selected="selected"<?php }?> value="10">10 - Octobre</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="11")){?>selected="selected"<?php }?> value="11">11 - Novembre</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['mois']=="12")){?>selected="selected"<?php }?> value="12">12 - Décembre</option>
					</select>
					 
					<select style="width:60px;" name="annee" size="1">
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2007")){?>selected="selected"<?php }?> value="2007">2007</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2008")){?>selected="selected"<?php }?> value="2008">2008</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2009")){?>selected="selected"<?php }?> value="2009">2009</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2010")){?>selected="selected"<?php }?> value="2010">2010</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2011")){?>selected="selected"<?php }?> value="2011">2011</option>
					<option <?php if (($_smarty_tpl->tpl_vars['date']->value['annee']=="2012")){?>selected="selected"<?php }?> value="2012">2012</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;">Durée (en secondes) :</td>
				<td style="text-align:left;">
					<input style="width:150px;" name="dureeS" type="text" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td><td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;">Actif :</td>
				<td style="text-align:left;">
					<select style="width:75px;" name="actif" id="actif" size="1">
						<option selected="selected" value="0">Non (0)</option>
						<option value="1">Oui (1)</option>
					</select>
					</td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;">
				</td>
			</tr>						
			<tr>
				<td style="text-align:right;">
					MY INREES :
				</td>
				<td style="text-align:left;">
					<select style="width:75px;" name="myinrees" id="myinrees" size="1">
						<option value="1">Oui (1)</option>
						<option value="0" selected="selected">Non (0)</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">
					Assigner cette vidéo à une conférence :
				</td>
				<td style="text-align:left;">
					<select style="width:275px;" name="confassign" size="1">
						<option selected="selected" value="0">====== Aucune conférence assignée =====</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;">
					<strong>Ajouter tags :</strong>
				</td>
				<td style="text-align:left;">
					<?php echo $_smarty_tpl->getSubTemplate ('modules/tags.input.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Tags associés :</td>
				<td style="text-align:left;"><?php echo $_smarty_tpl->getSubTemplate ('modules/tags.display.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>				
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;">
					<input class="button2" type="submit" id="action_online" name="action_online" value="Valider" />
				</td>
			</tr>
		</table>
		<br /><br /><br />	
	</fieldset>
</form>
<br />
<br />
<br />
</div><?php }} ?>