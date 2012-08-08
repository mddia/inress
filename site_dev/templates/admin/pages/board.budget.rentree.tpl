<div id="main">
	<h6>Budget / Edition une rentree / <?php echo $titre ; ?></h6>
	<br /><hr /><br />
	<h1>{$rentree.titre} (#{$rentree.id})</h1><br />

	Editer une rentree de l'INREES.
	<br /><br />


	<form method="post">

	<table>
		<tr><td style="text-align:right;">Date (rentree) :</td><td style="text-align:left;">
		<select style="width:50px;" name="Djours" size="1">
		<option {if ($rentree.Djour == "01")} selected="selected"{/if} value="01">01</option>
		<option {if ($rentree.Djour == "02")} selected="selected"{/if} value="02">02</option>
		<option {if ($rentree.Djour == "03")} selected="selected"{/if} value="03">03</option>
		<option {if ($rentree.Djour == "04")} selected="selected"{/if} value="04">04</option>
		<option {if ($rentree.Djour == "05")} selected="selected"{/if} value="05">05</option>
		<option {if ($rentree.Djour == "06")} selected="selected"{/if} value="06">06</option>
		<option {if ($rentree.Djour == "07")} selected="selected"{/if} value="07">07</option>
		<option {if ($rentree.Djour == "08")} selected="selected"{/if} value="08">08</option>
		<option {if ($rentree.Djour == "09")} selected="selected"{/if} value="09">09</option>
		<option {if ($rentree.Djour == "10")} selected="selected"{/if} value="10">10</option>
		<option {if ($rentree.Djour == "11")} selected="selected"{/if} value="11">11</option>
		<option {if ($rentree.Djour == "12")} selected="selected"{/if} value="12">12</option>
		<option {if ($rentree.Djour == "13")} selected="selected"{/if} value="13">13</option>
		<option {if ($rentree.Djour == "14")} selected="selected"{/if} value="14">14</option>
		<option {if ($rentree.Djour == "15")} selected="selected"{/if} value="15">15</option>
		<option {if ($rentree.Djour == "16")} selected="selected"{/if} value="16">16</option>
		<option {if ($rentree.Djour == "17")} selected="selected"{/if} value="17">17</option>
		<option {if ($rentree.Djour == "18")} selected="selected"{/if} value="18">18</option>
		<option {if ($rentree.Djour == "19")} selected="selected"{/if} value="19">19</option>
		<option {if ($rentree.Djour == "20")} selected="selected"{/if} value="20">20</option>
		<option {if ($rentree.Djour == "21")} selected="selected"{/if} value="21">21</option>
		<option {if ($rentree.Djour == "22")} selected="selected"{/if} value="22">22</option>
		<option {if ($rentree.Djour == "23")} selected="selected"{/if} value="23">23</option>
		<option {if ($rentree.Djour == "24")} selected="selected"{/if} value="24">24</option>
		<option {if ($rentree.Djour == "25")} selected="selected"{/if} value="25">25</option>
		<option {if ($rentree.Djour == "26")} selected="selected"{/if} value="26">26</option>
		<option {if ($rentree.Djour == "27")} selected="selected"{/if} value="27">27</option>
		<option {if ($rentree.Djour == "28")} selected="selected"{/if} value="28">28</option>
		<option {if ($rentree.Djour == "29")} selected="selected"{/if} value="29">29</option>
		<option {if ($rentree.Djour == "30")} selected="selected"{/if} value="30">30</option>
		<option {if ($rentree.Djour == "31")} selected="selected"{/if} value="31">31</option>
		</select>
		 
		<select style="width:150px;" name="Dmois" size="1">
		<option {if ($rentree.Dmois == "01")} selected="selected"{/if} value="01">01 - Janvier</option>
		<option {if ($rentree.Dmois == "02")} selected="selected"{/if} value="02">02 - Février</option>
		<option {if ($rentree.Dmois == "03")} selected="selected"{/if} value="03">03 - Mars</option>
		<option {if ($rentree.Dmois == "04")} selected="selected"{/if} value="04">04 - Avril</option>
		<option {if ($rentree.Dmois == "05")} selected="selected"{/if} value="05">05 - Mai</option>
		<option {if ($rentree.Dmois == "06")} selected="selected"{/if} value="06">06 - Juin</option>
		<option {if ($rentree.Dmois == "07")} selected="selected"{/if} value="07">07 - Juillet</option>
		<option {if ($rentree.Dmois == "08")} selected="selected"{/if} value="08">08 - Aout</option>
		<option {if ($rentree.Dmois == "09")} selected="selected"{/if} value="09">09 - Septembre</option>
		<option {if ($rentree.Dmois == "10")} selected="selected"{/if} value="10">10 - Octobre</option>
		<option {if ($rentree.Dmois == "11")} selected="selected"{/if} value="11">11 - Novembre</option>
		<option {if ($rentree.Dmois == "12")} selected="selected"{/if} value="12">12 - Décembre</option>
		</select>
		 
		<select style="width:75px;" name="Dannee" size="1">
		<option {if ($rentree.Dannee == "2009")} selected="selected"{/if} value="2009">2009</option>
		<option {if ($rentree.Dannee == "2010")} selected="selected"{/if} value="2010">2010</option>
		<option {if ($rentree.Dannee == "2011")} selected="selected"{/if} value="2011">2011</option>
		<option {if ($rentree.Dannee == "2012")} selected="selected"{/if} value="2012">2012</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">Date (encaiss.) :</td><td style="text-align:left;">
		<select style="width:50px;" name="Ejours" size="1">
		<option {if ($rentree.Djour == "00")} selected="selected"{/if} value="00">00</option>
		<option {if ($rentree.Djour == "01")} selected="selected"{/if} value="01">01</option>
		<option {if ($rentree.Djour == "02")} selected="selected"{/if} value="02">02</option>
		<option {if ($rentree.Djour == "03")} selected="selected"{/if} value="03">03</option>
		<option {if ($rentree.Djour == "04")} selected="selected"{/if} value="04">04</option>
		<option {if ($rentree.Djour == "05")} selected="selected"{/if} value="05">05</option>
		<option {if ($rentree.Djour == "06")} selected="selected"{/if} value="06">06</option>
		<option {if ($rentree.Djour == "07")} selected="selected"{/if} value="07">07</option>
		<option {if ($rentree.Djour == "08")} selected="selected"{/if} value="08">08</option>
		<option {if ($rentree.Djour == "09")} selected="selected"{/if} value="09">09</option>
		<option {if ($rentree.Djour == "10")} selected="selected"{/if} value="10">10</option>
		<option {if ($rentree.Djour == "11")} selected="selected"{/if} value="11">11</option>
		<option {if ($rentree.Djour == "12")} selected="selected"{/if} value="12">12</option>
		<option {if ($rentree.Djour == "13")} selected="selected"{/if} value="13">13</option>
		<option {if ($rentree.Djour == "14")} selected="selected"{/if} value="14">14</option>
		<option {if ($rentree.Djour == "15")} selected="selected"{/if} value="15">15</option>
		<option {if ($rentree.Djour == "16")} selected="selected"{/if} value="16">16</option>
		<option {if ($rentree.Djour == "17")} selected="selected"{/if} value="17">17</option>
		<option {if ($rentree.Djour == "18")} selected="selected"{/if} value="18">18</option>
		<option {if ($rentree.Djour == "19")} selected="selected"{/if} value="19">19</option>
		<option {if ($rentree.Djour == "20")} selected="selected"{/if} value="20">20</option>
		<option {if ($rentree.Djour == "21")} selected="selected"{/if} value="21">21</option>
		<option {if ($rentree.Djour == "22")} selected="selected"{/if} value="22">22</option>
		<option {if ($rentree.Djour == "23")} selected="selected"{/if} value="23">23</option>
		<option {if ($rentree.Djour == "24")} selected="selected"{/if} value="24">24</option>
		<option {if ($rentree.Djour == "25")} selected="selected"{/if} value="25">25</option>
		<option {if ($rentree.Djour == "26")} selected="selected"{/if} value="26">26</option>
		<option {if ($rentree.Djour == "27")} selected="selected"{/if} value="27">27</option>
		<option {if ($rentree.Djour == "28")} selected="selected"{/if} value="28">28</option>
		<option {if ($rentree.Djour == "29")} selected="selected"{/if} value="29">29</option>
		<option {if ($rentree.Djour == "30")} selected="selected"{/if} value="30">30</option>
		<option {if ($rentree.Djour == "31")} selected="selected"{/if} value="31">31</option>
		</select>
		 
		<select style="width:150px;" name="Emois" size="1">
		<option {if ($rentree.Dmois == "00")} selected="selected"{/if} value="01">00 - ...</option>
		<option {if ($rentree.Dmois == "01")} selected="selected"{/if} value="01">01 - Janvier</option>
		<option {if ($rentree.Dmois == "02")} selected="selected"{/if} value="02">02 - Février</option>
		<option {if ($rentree.Dmois == "03")} selected="selected"{/if} value="03">03 - Mars</option>
		<option {if ($rentree.Dmois == "04")} selected="selected"{/if} value="04">04 - Avril</option>
		<option {if ($rentree.Dmois == "05")} selected="selected"{/if} value="05">05 - Mai</option>
		<option {if ($rentree.Dmois == "06")} selected="selected"{/if} value="06">06 - Juin</option>
		<option {if ($rentree.Dmois == "07")} selected="selected"{/if} value="07">07 - Juillet</option>
		<option {if ($rentree.Dmois == "08")} selected="selected"{/if} value="08">08 - Aout</option>
		<option {if ($rentree.Dmois == "09")} selected="selected"{/if} value="09">09 - Septembre</option>
		<option {if ($rentree.Dmois == "10")} selected="selected"{/if} value="10">10 - Octobre</option>
		<option {if ($rentree.Dmois == "11")} selected="selected"{/if} value="11">11 - Novembre</option>
		<option {if ($rentree.Dmois == "12")} selected="selected"{/if} value="12">12 - Décembre</option>
		</select>
		 
		<select style="width:75px;" name="Eannee" size="1">
		<option {if ($rentree.Dannee == "0000")} selected="selected"{/if} value="0000">0000</option>
		<option {if ($rentree.Dannee == "2009")} selected="selected"{/if} value="2009">2009</option>
		<option {if ($rentree.Dannee == "2010")} selected="selected"{/if} value="2010">2010</option>
		<option {if ($rentree.Dannee == "2011")} selected="selected"{/if} value="2011">2011</option>
		<option {if ($rentree.Dannee == "2012")} selected="selected"{/if} value="2012">2012</option>
		</select>
		</td></tr>
	<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
	<tr><td align="right">Titre / Description :</td><td align="left">
	<input style="width:250px;" name="titre" type="text" value="{$rentree.titre}" /></td></tr>
	<tr><td align="right"><strong>Prix HT :</strong></td><td align="left">
	<input style="width:35px;" name="pht1" type="text" value="{$rentree.HT}" /> € (en centimes)</td></tr>
	<tr><td align="right">TVA :</td><td align="left">
	<select style="width:175px;" name="tva" size="1">
		<option {if ($rentree.tva == 0)} selected="selected"{/if}value="0">Pas de TVA</option>
		<option {if ($rentree.tva == 210)} selected="selected"{/if}value="210">2,10 (Presse)</option>
		<option {if ($rentree.tva == 550)} selected="selected"{/if}value="550">5,50 (Livres)</option>
		<option {if ($rentree.tva == 1960)} selected="selected"{/if}value="1960">19,60</option>
	</select>
	</td></tr>
	<tr><td colspan="2"></td></tr>

	<tr><td align="right"><strong>Prix TTC :</strong></td><td align="left">
	<input style="width:35px;" name="prix" type="text" value="{$rentree.prix}" /> € (en centimes)</td></tr>
	<tr><td align="right">Mode :</td><td align="left">
	<select style="width:175px;" name="mode" size="1">
		<option {if ($rentree.mode == "Cheque")} selected="selected"{/if}value="Chèque">Chèque</option>
		<option {if ($rentree.mode == "Remise de cheques")} selected="selected"{/if}value="Remise de chèques">Remise de chèques</option>
		<option {if ($rentree.mode == "Carte Bancaire")} selected="selected"{/if}value="Carte Bancaire">Carte Bancaire</option>
		<option {if ($rentree.mode == "Prelevement")} selected="selected"{/if}value="Prélèvement">Prélèvement</option>
		<option {if ($rentree.mode == "Virement")} selected="selected"{/if} value="Virement">Virement</option>
	</select>
	</td></tr>
	<tr><td align="right">Validé :</td><td align="left">
	<select style="width:175px;" name="valid" size="1">
		<option {if ($rentree.valid == 0)} selected="selected"{/if}value="0">Non-validé</option>
		<option {if ($rentree.valid == 1)} selected="selected"{/if}value="1">Validé</option>
	</select>
	</td></tr>
	<tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr><tr><td colspan="2"></td></tr>
	<tr><td align="right"><input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider l'inscription" /></td><td align="left"></td></tr>
	</table>
	</form>

	<br /><br /><br />
</div>