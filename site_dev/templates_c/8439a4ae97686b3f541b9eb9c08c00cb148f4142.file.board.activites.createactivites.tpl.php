<?php /* Smarty version Smarty-3.1.7, created on 2012-05-28 23:33:32
         compiled from "templates/admin/pages/board.activites.createactivites.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14628279104fbf481e19c847-75931549%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8439a4ae97686b3f541b9eb9c08c00cb148f4142' => 
    array (
      0 => 'templates/admin/pages/board.activites.createactivites.tpl',
      1 => 1338240795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14628279104fbf481e19c847-75931549',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbf481e1f7b4',
  'variables' => 
  array (
    'eventTypes' => 0,
    'type' => 0,
    'themes' => 0,
    'theme' => 0,
    'locaux' => 0,
    'lieu' => 0,
    'supports' => 0,
    'support' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbf481e1f7b4')) {function content_4fbf481e1f7b4($_smarty_tpl) {?><div id="main">
	<h6>Activités / Website / Insérer un nouveau rendez-vous</h6>
	<br /><hr /><br />




	<h1>Insérer un nouveau rendez-vous</h1><br />

	Insérer un <strong>nouveau rendez-vous (Conférences, ateliers, séminaires, évènements, cafés...)</strong> de l'INREES.

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
"><?php echo $_smarty_tpl->tpl_vars['type']->value['nomsing'];?>
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
"><?php echo $_smarty_tpl->tpl_vars['theme']->value['titre'];?>
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
"><?php echo $_smarty_tpl->tpl_vars['lieu']->value['resume'];?>
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

			<tr><td style="text-align:right;">URL (internet) :</td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" /></td></tr>
			<tr><td style="text-align:right;"><strong>Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="titre" type="text" /></td></tr>
			<tr><td style="text-align:right;"><strong>Sous-Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="sst" type="text" /></td></tr>
			<tr><td style="text-align:right;">Présentation :</td><td style="text-align:left;"><textarea style="width:250px;" name="presentation" type="text"></textarea></td></tr>
			<tr><td style="text-align:right;">Online :</td><td style="text-align:left;">
			<select style="width:75px;" name="online" size="1">
			<option value="1">Oui (1)</option>
			<option value="0">Non (0)</option>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">Date de début :</td><td style="text-align:left;">
			<select style="width:40px;" name="Djours" size="1">
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select>
			 
			<select style="width:140px;" name="Dmois" size="1">
			<option value="01">01 - Janvier</option>
			<option value="02">02 - Février</option>
			<option value="03">03 - Mars</option>
			<option value="04">04 - Avril</option>
			<option value="05">05 - Mai</option>
			<option value="06">06 - Juin</option>
			<option value="07">07 - Juillet</option>
			<option value="08">08 - Aout</option>
			<option value="09">09 - Septembre</option>
			<option value="10">10 - Octobre</option>
			<option value="11">11 - Novembre</option>
			<option value="12">12 - Décembre</option>
			</select>
			 
			<select style="width:60px;" name="Dannee" size="1">
			<option value="2009">2009</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			</select>
			<br /> à 
			<select style="width:40px;" name="Dheures" size="1">
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="00">00</option>
			</select>
			 h 
			<select style="width:40px;" name="Dminutes" size="1">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
			<option value="50">50</option>
			</select>
			
			<input style="width:250px;" name="Dsecondes" type="hidden" value="00" />
			</td></tr>
			<tr><td style="text-align:right;">Date de fin :</td><td style="text-align:left;">
			<select style="width:40px;" name="Fjours" size="1">
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select>
			 
			<select style="width:140px;" name="Fmois" size="1">
			<option value="01">01 - Janvier</option>
			<option value="02">02 - Février</option>
			<option value="03">03 - Mars</option>
			<option value="04">04 - Avril</option>
			<option value="05">05 - Mai</option>
			<option value="06">06 - Juin</option>
			<option value="07">07 - Juillet</option>
			<option value="08">08 - Aout</option>
			<option value="09">09 - Septembre</option>
			<option value="10">10 - Octobre</option>
			<option value="11">11 - Novembre</option>
			<option value="12">12 - Décembre</option>
			</select>
			 
			<select style="width:60px;" name="Fannee" size="1">
			<option value="2009">2009</option>
			<option value="2010">2010</option>
			<option value="2011">2011</option>
			<option value="2012">2012</option>
			</select>
			<br /> à 
			<select style="width:40px;" name="Fheures" size="1">
			<option value="01">01</option>
			<option value="02">02</option>
			<option value="03">03</option>
			<option value="04">04</option>
			<option value="05">05</option>
			<option value="06">06</option>
			<option value="07">07</option>
			<option value="08">08</option>
			<option value="09">09</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="00">00</option>
			</select>
			 h 
			<select style="width:40px;" name="Fminutes" size="1">
			<option value="00">00</option>
			<option value="15">15</option>
			<option value="30">30</option>
			<option value="45">45</option>
			</select>
			
			<input style="width:250px;" name="Fsecondes" type="hidden" value="00" />
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">prixpublic :</td><td style="text-align:left;"><input style="width:35px;" type="text" maxlength="5" name="prixpublic" value="0000" /> € (en centimes)</td></tr>
			<tr><td style="text-align:right;">prixmembres :</td><td style="text-align:left;"><input style="width:35px;" type="text" maxlength="5" name="prixmembres" value="0000" /> € (en centimes)</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Disponibles (sur place) :</td><td style="text-align:left;"><input style="width:35px;" maxlength="5" type="text" name="dispos" /></td></tr>
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


			<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
		</table>
		<br /><br />
		
		</fieldset>
	</form>


	<br /><br /><br />
</div><?php }} ?>