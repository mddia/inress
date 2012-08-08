<?php /* Smarty version Smarty-3.1.7, created on 2012-05-22 13:08:20
         compiled from "templates/admin/pages/board.budget.rentree.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16428583424fbb71a2cdca36-04556635%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '474c483a06c1fa058b15cc5ac8e87c28f14a61f1' => 
    array (
      0 => 'templates/admin/pages/board.budget.rentree.tpl',
      1 => 1337684898,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16428583424fbb71a2cdca36-04556635',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fbb71a3151fb',
  'variables' => 
  array (
    'rentree' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fbb71a3151fb')) {function content_4fbb71a3151fb($_smarty_tpl) {?><div id="main">
	<h6>Budget / Edition une rentree / <<?php ?>?php echo $titre ; ?<?php ?>></h6>
	<br /><hr /><br />
	<h1><?php echo $_smarty_tpl->tpl_vars['rentree']->value['titre'];?>
 (#<?php echo $_smarty_tpl->tpl_vars['rentree']->value['id'];?>
)</h1><br />

	Editer une rentree de l'INREES.
	<br /><br />


	<form method="post">

	<table>
		<tr><td style="text-align:right;">Date (rentree) :</td><td style="text-align:left;">
		<select style="width:50px;" name="Djours" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="01")){?> selected="selected"<?php }?> value="01">01</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="02")){?> selected="selected"<?php }?> value="02">02</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="03")){?> selected="selected"<?php }?> value="03">03</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="04")){?> selected="selected"<?php }?> value="04">04</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="05")){?> selected="selected"<?php }?> value="05">05</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="06")){?> selected="selected"<?php }?> value="06">06</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="07")){?> selected="selected"<?php }?> value="07">07</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="08")){?> selected="selected"<?php }?> value="08">08</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="09")){?> selected="selected"<?php }?> value="09">09</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="10")){?> selected="selected"<?php }?> value="10">10</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="11")){?> selected="selected"<?php }?> value="11">11</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="12")){?> selected="selected"<?php }?> value="12">12</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="13")){?> selected="selected"<?php }?> value="13">13</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="14")){?> selected="selected"<?php }?> value="14">14</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="15")){?> selected="selected"<?php }?> value="15">15</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="16")){?> selected="selected"<?php }?> value="16">16</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="17")){?> selected="selected"<?php }?> value="17">17</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="18")){?> selected="selected"<?php }?> value="18">18</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="19")){?> selected="selected"<?php }?> value="19">19</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="20")){?> selected="selected"<?php }?> value="20">20</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="21")){?> selected="selected"<?php }?> value="21">21</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="22")){?> selected="selected"<?php }?> value="22">22</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="23")){?> selected="selected"<?php }?> value="23">23</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="24")){?> selected="selected"<?php }?> value="24">24</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="25")){?> selected="selected"<?php }?> value="25">25</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="26")){?> selected="selected"<?php }?> value="26">26</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="27")){?> selected="selected"<?php }?> value="27">27</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="28")){?> selected="selected"<?php }?> value="28">28</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="29")){?> selected="selected"<?php }?> value="29">29</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="30")){?> selected="selected"<?php }?> value="30">30</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="31")){?> selected="selected"<?php }?> value="31">31</option>
		</select>
		 
		<select style="width:150px;" name="Dmois" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="01")){?> selected="selected"<?php }?> value="01">01 - Janvier</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="02")){?> selected="selected"<?php }?> value="02">02 - Février</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="03")){?> selected="selected"<?php }?> value="03">03 - Mars</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="04")){?> selected="selected"<?php }?> value="04">04 - Avril</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="05")){?> selected="selected"<?php }?> value="05">05 - Mai</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="06")){?> selected="selected"<?php }?> value="06">06 - Juin</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="07")){?> selected="selected"<?php }?> value="07">07 - Juillet</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="08")){?> selected="selected"<?php }?> value="08">08 - Aout</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="09")){?> selected="selected"<?php }?> value="09">09 - Septembre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="10")){?> selected="selected"<?php }?> value="10">10 - Octobre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="11")){?> selected="selected"<?php }?> value="11">11 - Novembre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="12")){?> selected="selected"<?php }?> value="12">12 - Décembre</option>
		</select>
		 
		<select style="width:75px;" name="Dannee" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2009")){?> selected="selected"<?php }?> value="2009">2009</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2010")){?> selected="selected"<?php }?> value="2010">2010</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2011")){?> selected="selected"<?php }?> value="2011">2011</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2012")){?> selected="selected"<?php }?> value="2012">2012</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">Date (encaiss.) :</td><td style="text-align:left;">
		<select style="width:50px;" name="Ejours" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="00")){?> selected="selected"<?php }?> value="00">00</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="01")){?> selected="selected"<?php }?> value="01">01</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="02")){?> selected="selected"<?php }?> value="02">02</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="03")){?> selected="selected"<?php }?> value="03">03</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="04")){?> selected="selected"<?php }?> value="04">04</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="05")){?> selected="selected"<?php }?> value="05">05</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="06")){?> selected="selected"<?php }?> value="06">06</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="07")){?> selected="selected"<?php }?> value="07">07</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="08")){?> selected="selected"<?php }?> value="08">08</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="09")){?> selected="selected"<?php }?> value="09">09</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="10")){?> selected="selected"<?php }?> value="10">10</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="11")){?> selected="selected"<?php }?> value="11">11</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="12")){?> selected="selected"<?php }?> value="12">12</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="13")){?> selected="selected"<?php }?> value="13">13</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="14")){?> selected="selected"<?php }?> value="14">14</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="15")){?> selected="selected"<?php }?> value="15">15</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="16")){?> selected="selected"<?php }?> value="16">16</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="17")){?> selected="selected"<?php }?> value="17">17</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="18")){?> selected="selected"<?php }?> value="18">18</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="19")){?> selected="selected"<?php }?> value="19">19</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="20")){?> selected="selected"<?php }?> value="20">20</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="21")){?> selected="selected"<?php }?> value="21">21</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="22")){?> selected="selected"<?php }?> value="22">22</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="23")){?> selected="selected"<?php }?> value="23">23</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="24")){?> selected="selected"<?php }?> value="24">24</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="25")){?> selected="selected"<?php }?> value="25">25</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="26")){?> selected="selected"<?php }?> value="26">26</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="27")){?> selected="selected"<?php }?> value="27">27</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="28")){?> selected="selected"<?php }?> value="28">28</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="29")){?> selected="selected"<?php }?> value="29">29</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="30")){?> selected="selected"<?php }?> value="30">30</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Djour']=="31")){?> selected="selected"<?php }?> value="31">31</option>
		</select>
		 
		<select style="width:150px;" name="Emois" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="00")){?> selected="selected"<?php }?> value="01">00 - ...</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="01")){?> selected="selected"<?php }?> value="01">01 - Janvier</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="02")){?> selected="selected"<?php }?> value="02">02 - Février</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="03")){?> selected="selected"<?php }?> value="03">03 - Mars</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="04")){?> selected="selected"<?php }?> value="04">04 - Avril</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="05")){?> selected="selected"<?php }?> value="05">05 - Mai</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="06")){?> selected="selected"<?php }?> value="06">06 - Juin</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="07")){?> selected="selected"<?php }?> value="07">07 - Juillet</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="08")){?> selected="selected"<?php }?> value="08">08 - Aout</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="09")){?> selected="selected"<?php }?> value="09">09 - Septembre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="10")){?> selected="selected"<?php }?> value="10">10 - Octobre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="11")){?> selected="selected"<?php }?> value="11">11 - Novembre</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dmois']=="12")){?> selected="selected"<?php }?> value="12">12 - Décembre</option>
		</select>
		 
		<select style="width:75px;" name="Eannee" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="0000")){?> selected="selected"<?php }?> value="0000">0000</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2009")){?> selected="selected"<?php }?> value="2009">2009</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2010")){?> selected="selected"<?php }?> value="2010">2010</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2011")){?> selected="selected"<?php }?> value="2011">2011</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['Dannee']=="2012")){?> selected="selected"<?php }?> value="2012">2012</option>
		</select>
		</td></tr>
	<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
	<tr><td align="right">Titre / Description :</td><td align="left">
	<input style="width:250px;" name="titre" type="text" value="<?php echo $_smarty_tpl->tpl_vars['rentree']->value['titre'];?>
" /></td></tr>
	<tr><td align="right"><strong>Prix HT :</strong></td><td align="left">
	<input style="width:35px;" name="pht1" type="text" value="<?php echo $_smarty_tpl->tpl_vars['rentree']->value['HT'];?>
" /> € (en centimes)</td></tr>
	<tr><td align="right">TVA :</td><td align="left">
	<select style="width:175px;" name="tva" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['tva']==0)){?> selected="selected"<?php }?>value="0">Pas de TVA</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['tva']==210)){?> selected="selected"<?php }?>value="210">2,10 (Presse)</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['tva']==550)){?> selected="selected"<?php }?>value="550">5,50 (Livres)</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['tva']==1960)){?> selected="selected"<?php }?>value="1960">19,60</option>
	</select>
	</td></tr>
	<tr><td colspan="2"></td></tr>

	<tr><td align="right"><strong>Prix TTC :</strong></td><td align="left">
	<input style="width:35px;" name="prix" type="text" value="<?php echo $_smarty_tpl->tpl_vars['rentree']->value['prix'];?>
" /> € (en centimes)</td></tr>
	<tr><td align="right">Mode :</td><td align="left">
	<select style="width:175px;" name="mode" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['mode']=="Cheque")){?> selected="selected"<?php }?>value="Chèque">Chèque</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['mode']=="Remise de cheques")){?> selected="selected"<?php }?>value="Remise de chèques">Remise de chèques</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['mode']=="Carte Bancaire")){?> selected="selected"<?php }?>value="Carte Bancaire">Carte Bancaire</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['mode']=="Prelevement")){?> selected="selected"<?php }?>value="Prélèvement">Prélèvement</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['mode']=="Virement")){?> selected="selected"<?php }?> value="Virement">Virement</option>
	</select>
	</td></tr>
	<tr><td align="right">Validé :</td><td align="left">
	<select style="width:175px;" name="valid" size="1">
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['valid']==0)){?> selected="selected"<?php }?>value="0">Non-validé</option>
		<option <?php if (($_smarty_tpl->tpl_vars['rentree']->value['valid']==1)){?> selected="selected"<?php }?>value="1">Validé</option>
	</select>
	</td></tr>
	<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
	<tr><td align="right"><input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider l'inscription" /></td><td align="left"></td></tr>
	</table>
	</form>

	<br /><br /><br />
</div><?php }} ?>