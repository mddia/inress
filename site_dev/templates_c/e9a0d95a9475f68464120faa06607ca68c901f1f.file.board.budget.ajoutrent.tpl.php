<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 12:19:30
         compiled from "templates/admin/pages/board.budget.ajoutrent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8163340034fbb4ff7dc2857-04007658%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e9a0d95a9475f68464120faa06607ca68c901f1f' => 
    array (
      0 => 'templates/admin/pages/board.budget.ajoutrent.tpl',
      1 => 1337681919,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8163340034fbb4ff7dc2857-04007658',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb4ff7f05fa',
  'variables' => 
  array (
    'today' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb4ff7f05fa')) {function content_4fbb4ff7f05fa($_smarty_tpl) {?><div id="main">
	<h6>Budget / Comptabilité / Ajouter une rentrée</h6>
	<br /><hr /><br />



	<h1>Comptabilité</h1><br />


	<h2>Ajouter une rentrée</h2><br />

	Inscrivez les informations concernant la rentrée.
	<br /><br />

	<form method="post" action="actions.php">
		<input name="statut" type="hidden" value="1" />
		<input type="hidden" name="formName" value="ajoutRent" />
		<table>
			<tr>
				<td style="text-align:right;">Date (facture) :</td>
				<td style="text-align:left;">
					<select style="width:50px;" name="Djours" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="01")){?>selected="selected"<?php }?> value="01">01</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="02")){?>selected="selected"<?php }?> value="02">02</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="03")){?>selected="selected"<?php }?> value="03">03</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="04")){?>selected="selected"<?php }?> value="04">04</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="05")){?>selected="selected"<?php }?> value="05">05</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="06")){?>selected="selected"<?php }?> value="06">06</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="07")){?>selected="selected"<?php }?> value="07">07</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="08")){?>selected="selected"<?php }?> value="08">08</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="09")){?>selected="selected"<?php }?> value="09">09</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="10")){?>selected="selected"<?php }?> value="10">10</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="11")){?>selected="selected"<?php }?> value="11">11</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="12")){?>selected="selected"<?php }?> value="12">12</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="13")){?>selected="selected"<?php }?> value="13">13</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="14")){?>selected="selected"<?php }?> value="14">14</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="15")){?>selected="selected"<?php }?> value="15">15</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="16")){?>selected="selected"<?php }?> value="16">16</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="17")){?>selected="selected"<?php }?> value="17">17</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="18")){?>selected="selected"<?php }?> value="18">18</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="19")){?>selected="selected"<?php }?> value="19">19</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="20")){?>selected="selected"<?php }?> value="20">20</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="21")){?>selected="selected"<?php }?> value="21">21</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="22")){?>selected="selected"<?php }?> value="22">22</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="23")){?>selected="selected"<?php }?> value="23">23</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="24")){?>selected="selected"<?php }?> value="24">24</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="25")){?>selected="selected"<?php }?> value="25">25</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="26")){?>selected="selected"<?php }?> value="26">26</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="27")){?>selected="selected"<?php }?> value="27">27</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="28")){?>selected="selected"<?php }?> value="28">28</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="29")){?>selected="selected"<?php }?> value="29">29</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="30")){?>selected="selected"<?php }?> value="30">30</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="31")){?>selected="selected"<?php }?> value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Dmois" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="01")){?>selected="selected"<?php }?> value="01">01 - Janvier</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="02")){?>selected="selected"<?php }?> value="02">02 - Février</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="03")){?>selected="selected"<?php }?> value="03">03 - Mars</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="04")){?>selected="selected"<?php }?> value="04">04 - Avril</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="05")){?>selected="selected"<?php }?> value="05">05 - Mai</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="06")){?>selected="selected"<?php }?> value="06">06 - Juin</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="07")){?>selected="selected"<?php }?> value="07">07 - Juillet</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="08")){?>selected="selected"<?php }?> value="08">08 - Aout</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="09")){?>selected="selected"<?php }?> value="09">09 - Septembre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="10")){?>selected="selected"<?php }?> value="10">10 - Octobre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="11")){?>selected="selected"<?php }?> value="11">11 - Novembre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="12")){?>selected="selected"<?php }?> value="12">12 - Décembre</option>
					</select>
			 
					<select style="width:75px;" name="Dannee" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2009")){?>selected="selected"<?php }?> value="2009">2009</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2010")){?>selected="selected"<?php }?> value="2010">2010</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2011")){?>selected="selected"<?php }?> value="2011">2011</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2012")){?>selected="selected"<?php }?> value="2012">2012</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2013")){?>selected="selected"<?php }?> value="2013">2013</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2014")){?>selected="selected"<?php }?> value="2014">2014</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2015")){?>selected="selected"<?php }?> value="2015">2015</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Date (encaiss.) :</td><td style="text-align:left;">
					<select style="width:50px;" name="Ejours" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="00")){?>selected="selected"<?php }?> value="00">00</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="01")){?>selected="selected"<?php }?> value="01">01</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="02")){?>selected="selected"<?php }?> value="02">02</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="03")){?>selected="selected"<?php }?> value="03">03</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="04")){?>selected="selected"<?php }?> value="04">04</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="05")){?>selected="selected"<?php }?> value="05">05</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="06")){?>selected="selected"<?php }?> value="06">06</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="07")){?>selected="selected"<?php }?> value="07">07</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="08")){?>selected="selected"<?php }?> value="08">08</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="09")){?>selected="selected"<?php }?> value="09">09</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="10")){?>selected="selected"<?php }?> value="10">10</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="11")){?>selected="selected"<?php }?> value="11">11</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="12")){?>selected="selected"<?php }?> value="12">12</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="13")){?>selected="selected"<?php }?> value="13">13</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="14")){?>selected="selected"<?php }?> value="14">14</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="15")){?>selected="selected"<?php }?> value="15">15</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="16")){?>selected="selected"<?php }?> value="16">16</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="17")){?>selected="selected"<?php }?> value="17">17</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="18")){?>selected="selected"<?php }?> value="18">18</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="19")){?>selected="selected"<?php }?> value="19">19</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="20")){?>selected="selected"<?php }?> value="20">20</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="21")){?>selected="selected"<?php }?> value="21">21</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="22")){?>selected="selected"<?php }?> value="22">22</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="23")){?>selected="selected"<?php }?> value="23">23</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="24")){?>selected="selected"<?php }?> value="24">24</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="25")){?>selected="selected"<?php }?> value="25">25</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="26")){?>selected="selected"<?php }?> value="26">26</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="27")){?>selected="selected"<?php }?> value="27">27</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="28")){?>selected="selected"<?php }?> value="28">28</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="29")){?>selected="selected"<?php }?> value="29">29</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="30")){?>selected="selected"<?php }?> value="30">30</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['jour']=="31")){?>selected="selected"<?php }?> value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Emois" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="00")){?>selected="selected"<?php }?> value="01">00 - ...</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="01")){?>selected="selected"<?php }?> value="01">01 - Janvier</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="02")){?>selected="selected"<?php }?> value="02">02 - Février</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="03")){?>selected="selected"<?php }?> value="03">03 - Mars</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="04")){?>selected="selected"<?php }?> value="04">04 - Avril</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="05")){?>selected="selected"<?php }?> value="05">05 - Mai</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="06")){?>selected="selected"<?php }?> value="06">06 - Juin</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="07")){?>selected="selected"<?php }?> value="07">07 - Juillet</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="08")){?>selected="selected"<?php }?> value="08">08 - Aout</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="09")){?>selected="selected"<?php }?> value="09">09 - Septembre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="10")){?>selected="selected"<?php }?> value="10">10 - Octobre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="11")){?>selected="selected"<?php }?> value="11">11 - Novembre</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['mois']=="12")){?>selected="selected"<?php }?> value="12">12 - Décembre</option>
					</select>
					 
					<select style="width:75px;" name="Eannee" size="1">
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2009")){?>selected="selected"<?php }?> value="2009">2009</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2010")){?>selected="selected"<?php }?> value="2010">2010</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2011")){?>selected="selected"<?php }?> value="2011">2011</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2012")){?>selected="selected"<?php }?> value="2012">2012</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2013")){?>selected="selected"<?php }?> value="2013">2013</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2014")){?>selected="selected"<?php }?> value="2014">2014</option>
						<option <?php if (($_smarty_tpl->tpl_vars['today']->value['annee']=="2015")){?>selected="selected"<?php }?> value="2015">2015</option>
					</select>
				</td>
			</tr>

			<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
			<tr><td align="right">Titre / Description :</td><td align="left">
				<input style="width:250px;" name="titre" type="text" value="" />
			</td></tr>
			<tr><td colspan="2"></td></tr>

			<tr style="display:none;"><td align="right"><!--<strong>Prix HT :</strong> --></td><td align="left">
				<input style="width:35px;" name="pht1" type="text" value="0" />.<input style="width:25px;" name="pht2" type="text" value="00" /> € (en centimes)</td>
			</tr>
		<tr style="display:none;"><td align="right"><!--TVA : --></td><td align="left">
		<select style="width:175px;" name="tva" size="1">
			<option value="0">Pas de TVA</option>
			<option value="210">2,10 (Presse)</option>
			<option value="550">5,50 (Livres)</option>
			<option value="1960">19,60</option>
		</select>
		</td></tr>
		<tr style="display:none;"><td colspan="2"></td></tr>

		<tr><td align="right"><strong>Prix TTC :</strong></td><td align="left">
		<input style="width:35px;" name="prix" type="text" value="0" />.<input style="width:25px;" name="prix2" type="text" value="00" /> € (en centimes)</td></tr>
		<tr><td align="right">Mode :</td><td align="left">
		<select style="width:175px;" name="mode" size="1">
			<option value="Cheque">Chèque</option>
			<option value="Remise de cheques">Remise de chèques</option>
			<!--<option value="Carte Bancaire">Carte Bancaire</option> -->
			<option value="Prelevement">Prélèvement</option>
			<option value="Virement">Virement</option>
		</select>
		</td></tr>
		<tr><td colspan="2"></td></tr>

		<tr><td align="right">Validé :</td><td align="left">
		<select style="width:175px;" name="valid" size="1">
			<option selected="selected" value="0">Non-validé</option>
			<option value="1">Validé</option>
		</select><br /><em>Attention : vérifier l'encaissement via la feuille de compte avant !</em>
		</td></tr>


		<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td></td><td>
		<strong style="color:blue;">ATTENTION: Ces rentrées ne génèrent pas de factures<br />
		<em>(Seulement pour les mouvements bancaires sans factures)</em></strong>
		</td></tr>
		<tr><td align="right"><input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider l'inscription" /></td><td align="left"></td></tr>
		</table>
	</form>

	<br /><br /><br />
</div><?php }} ?>