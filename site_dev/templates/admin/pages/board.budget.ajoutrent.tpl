<div id="main">
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
						<option {if ($today.jour == "01")}selected="selected"{/if} value="01">01</option>
						<option {if ($today.jour == "02")}selected="selected"{/if} value="02">02</option>
						<option {if ($today.jour == "03")}selected="selected"{/if} value="03">03</option>
						<option {if ($today.jour == "04")}selected="selected"{/if} value="04">04</option>
						<option {if ($today.jour == "05")}selected="selected"{/if} value="05">05</option>
						<option {if ($today.jour == "06")}selected="selected"{/if} value="06">06</option>
						<option {if ($today.jour == "07")}selected="selected"{/if} value="07">07</option>
						<option {if ($today.jour == "08")}selected="selected"{/if} value="08">08</option>
						<option {if ($today.jour == "09")}selected="selected"{/if} value="09">09</option>
						<option {if ($today.jour == "10")}selected="selected"{/if} value="10">10</option>
						<option {if ($today.jour == "11")}selected="selected"{/if} value="11">11</option>
						<option {if ($today.jour == "12")}selected="selected"{/if} value="12">12</option>
						<option {if ($today.jour == "13")}selected="selected"{/if} value="13">13</option>
						<option {if ($today.jour == "14")}selected="selected"{/if} value="14">14</option>
						<option {if ($today.jour == "15")}selected="selected"{/if} value="15">15</option>
						<option {if ($today.jour == "16")}selected="selected"{/if} value="16">16</option>
						<option {if ($today.jour == "17")}selected="selected"{/if} value="17">17</option>
						<option {if ($today.jour == "18")}selected="selected"{/if} value="18">18</option>
						<option {if ($today.jour == "19")}selected="selected"{/if} value="19">19</option>
						<option {if ($today.jour == "20")}selected="selected"{/if} value="20">20</option>
						<option {if ($today.jour == "21")}selected="selected"{/if} value="21">21</option>
						<option {if ($today.jour == "22")}selected="selected"{/if} value="22">22</option>
						<option {if ($today.jour == "23")}selected="selected"{/if} value="23">23</option>
						<option {if ($today.jour == "24")}selected="selected"{/if} value="24">24</option>
						<option {if ($today.jour == "25")}selected="selected"{/if} value="25">25</option>
						<option {if ($today.jour == "26")}selected="selected"{/if} value="26">26</option>
						<option {if ($today.jour == "27")}selected="selected"{/if} value="27">27</option>
						<option {if ($today.jour == "28")}selected="selected"{/if} value="28">28</option>
						<option {if ($today.jour == "29")}selected="selected"{/if} value="29">29</option>
						<option {if ($today.jour == "30")}selected="selected"{/if} value="30">30</option>
						<option {if ($today.jour == "31")}selected="selected"{/if} value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Dmois" size="1">
						<option {if ($today.mois == "01")}selected="selected"{/if} value="01">01 - Janvier</option>
						<option {if ($today.mois == "02")}selected="selected"{/if} value="02">02 - Février</option>
						<option {if ($today.mois == "03")}selected="selected"{/if} value="03">03 - Mars</option>
						<option {if ($today.mois == "04")}selected="selected"{/if} value="04">04 - Avril</option>
						<option {if ($today.mois == "05")}selected="selected"{/if} value="05">05 - Mai</option>
						<option {if ($today.mois == "06")}selected="selected"{/if} value="06">06 - Juin</option>
						<option {if ($today.mois == "07")}selected="selected"{/if} value="07">07 - Juillet</option>
						<option {if ($today.mois == "08")}selected="selected"{/if} value="08">08 - Aout</option>
						<option {if ($today.mois == "09")}selected="selected"{/if} value="09">09 - Septembre</option>
						<option {if ($today.mois == "10")}selected="selected"{/if} value="10">10 - Octobre</option>
						<option {if ($today.mois == "11")}selected="selected"{/if} value="11">11 - Novembre</option>
						<option {if ($today.mois == "12")}selected="selected"{/if} value="12">12 - Décembre</option>
					</select>
			 
					<select style="width:75px;" name="Dannee" size="1">
						<option {if ($today.annee == "2009")}selected="selected"{/if} value="2009">2009</option>
						<option {if ($today.annee == "2010")}selected="selected"{/if} value="2010">2010</option>
						<option {if ($today.annee == "2011")}selected="selected"{/if} value="2011">2011</option>
						<option {if ($today.annee == "2012")}selected="selected"{/if} value="2012">2012</option>
						<option {if ($today.annee == "2013")}selected="selected"{/if} value="2013">2013</option>
						<option {if ($today.annee == "2014")}selected="selected"{/if} value="2014">2014</option>
						<option {if ($today.annee == "2015")}selected="selected"{/if} value="2015">2015</option>
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Date (encaiss.) :</td><td style="text-align:left;">
					<select style="width:50px;" name="Ejours" size="1">
						<option {if ($today.jour == "00")}selected="selected"{/if} value="00">00</option>
						<option {if ($today.jour == "01")}selected="selected"{/if} value="01">01</option>
						<option {if ($today.jour == "02")}selected="selected"{/if} value="02">02</option>
						<option {if ($today.jour == "03")}selected="selected"{/if} value="03">03</option>
						<option {if ($today.jour == "04")}selected="selected"{/if} value="04">04</option>
						<option {if ($today.jour == "05")}selected="selected"{/if} value="05">05</option>
						<option {if ($today.jour == "06")}selected="selected"{/if} value="06">06</option>
						<option {if ($today.jour == "07")}selected="selected"{/if} value="07">07</option>
						<option {if ($today.jour == "08")}selected="selected"{/if} value="08">08</option>
						<option {if ($today.jour == "09")}selected="selected"{/if} value="09">09</option>
						<option {if ($today.jour == "10")}selected="selected"{/if} value="10">10</option>
						<option {if ($today.jour == "11")}selected="selected"{/if} value="11">11</option>
						<option {if ($today.jour == "12")}selected="selected"{/if} value="12">12</option>
						<option {if ($today.jour == "13")}selected="selected"{/if} value="13">13</option>
						<option {if ($today.jour == "14")}selected="selected"{/if} value="14">14</option>
						<option {if ($today.jour == "15")}selected="selected"{/if} value="15">15</option>
						<option {if ($today.jour == "16")}selected="selected"{/if} value="16">16</option>
						<option {if ($today.jour == "17")}selected="selected"{/if} value="17">17</option>
						<option {if ($today.jour == "18")}selected="selected"{/if} value="18">18</option>
						<option {if ($today.jour == "19")}selected="selected"{/if} value="19">19</option>
						<option {if ($today.jour == "20")}selected="selected"{/if} value="20">20</option>
						<option {if ($today.jour == "21")}selected="selected"{/if} value="21">21</option>
						<option {if ($today.jour == "22")}selected="selected"{/if} value="22">22</option>
						<option {if ($today.jour == "23")}selected="selected"{/if} value="23">23</option>
						<option {if ($today.jour == "24")}selected="selected"{/if} value="24">24</option>
						<option {if ($today.jour == "25")}selected="selected"{/if} value="25">25</option>
						<option {if ($today.jour == "26")}selected="selected"{/if} value="26">26</option>
						<option {if ($today.jour == "27")}selected="selected"{/if} value="27">27</option>
						<option {if ($today.jour == "28")}selected="selected"{/if} value="28">28</option>
						<option {if ($today.jour == "29")}selected="selected"{/if} value="29">29</option>
						<option {if ($today.jour == "30")}selected="selected"{/if} value="30">30</option>
						<option {if ($today.jour == "31")}selected="selected"{/if} value="31">31</option>
					</select>
			 
					<select style="width:150px;" name="Emois" size="1">
						<option {if ($today.mois == "00")}selected="selected"{/if} value="01">00 - ...</option>
						<option {if ($today.mois == "01")}selected="selected"{/if} value="01">01 - Janvier</option>
						<option {if ($today.mois == "02")}selected="selected"{/if} value="02">02 - Février</option>
						<option {if ($today.mois == "03")}selected="selected"{/if} value="03">03 - Mars</option>
						<option {if ($today.mois == "04")}selected="selected"{/if} value="04">04 - Avril</option>
						<option {if ($today.mois == "05")}selected="selected"{/if} value="05">05 - Mai</option>
						<option {if ($today.mois == "06")}selected="selected"{/if} value="06">06 - Juin</option>
						<option {if ($today.mois == "07")}selected="selected"{/if} value="07">07 - Juillet</option>
						<option {if ($today.mois == "08")}selected="selected"{/if} value="08">08 - Aout</option>
						<option {if ($today.mois == "09")}selected="selected"{/if} value="09">09 - Septembre</option>
						<option {if ($today.mois == "10")}selected="selected"{/if} value="10">10 - Octobre</option>
						<option {if ($today.mois == "11")}selected="selected"{/if} value="11">11 - Novembre</option>
						<option {if ($today.mois == "12")}selected="selected"{/if} value="12">12 - Décembre</option>
					</select>
					 
					<select style="width:75px;" name="Eannee" size="1">
						<option {if ($today.annee == "2009")}selected="selected"{/if} value="2009">2009</option>
						<option {if ($today.annee == "2010")}selected="selected"{/if} value="2010">2010</option>
						<option {if ($today.annee == "2011")}selected="selected"{/if} value="2011">2011</option>
						<option {if ($today.annee == "2012")}selected="selected"{/if} value="2012">2012</option>
						<option {if ($today.annee == "2013")}selected="selected"{/if} value="2013">2013</option>
						<option {if ($today.annee == "2014")}selected="selected"{/if} value="2014">2014</option>
						<option {if ($today.annee == "2015")}selected="selected"{/if} value="2015">2015</option>
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
</div>