<div id="main">
<a name="maincontent"></a>


<h6>Website / Podcasts / Modifier un podcast</h6>
<br /><hr /><br />



<h1>Modifier un podcast</h1><br />

<form id="action_online_form" method="post" action="actions.php">
	<input type="hidden" name="formName" value="createPodcast" />
	<fieldset>
		<legend>Données à remplir</legend>
		<table style="width:575px;">
			<tr>
				<td style="text-align:right;"></td><td style="text-align:left;"></td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant (principal) :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant" size="1">
						{foreach from=$supports|@orderby:"id" item='support'}
							<option value="{$support.id}" {if ($support.id == '50')}selected="selected"{/if}>{$support.nom} {$support.prenom}</option>
						{/foreach}
					</select> 
					<a href="admin.php?cat=website&scat=createsoutien">Insérer un soutien</a>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant2" size="1">
						<option value="0">(aucun)</option>
						{foreach from=$supports|@orderby:"id" item='support'}
							<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;vertical-align:top;">Choix de l'intervenant :</td><td style="text-align:left;">
					<select style="width:175px;" name="intervenant3" size="1">
						<option value="0">(aucun)</option>
						{foreach from=$supports|@orderby:"id" item='support'}
							<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
						{/foreach}
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
						{foreach from=$themes|@orderby:"ordre" item='theme'}
							<option value="{$theme.id}">{$theme.titre}</option>
						{/foreach}
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
					<input style="width:250px;" name="url" type="text" value="{$podcast.url}" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><strong>Titre :</strong></td>
				<td style="text-align:left;">
					<input style="width:250px;" name="titre" type="text" value="{$podcast.titre}" />
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><strong>Sous-Titre :</strong></td>
				<td style="text-align:left;"><input style="width:250px;" name="sst" type="text" value="{$podcast.sst}" /></td>
			</tr>
			<tr>
				<td style="text-align:right;"></td>
				<td style="text-align:left;"></td>
			</tr>					
			<tr>
				<td style="text-align:right;">Date (de publication) :</td>
				<td style="text-align:left;">		
					<select style="width:40px;" name="jours" size="1">
					<option {if ($date.jour == "01")}selected="selected"{/if} value="01">01</option>
					<option {if ($date.jour == "02")}selected="selected"{/if} value="02">02</option>
					<option {if ($date.jour == "03")}selected="selected"{/if} value="03">03</option>
					<option {if ($date.jour == "04")}selected="selected"{/if} value="04">04</option>
					<option {if ($date.jour == "05")}selected="selected"{/if} value="05">05</option>
					<option {if ($date.jour == "06")}selected="selected"{/if} value="06">06</option>
					<option {if ($date.jour == "07")}selected="selected"{/if} value="07">07</option>
					<option {if ($date.jour == "08")}selected="selected"{/if} value="08">08</option>
					<option {if ($date.jour == "09")}selected="selected"{/if} value="09">09</option>
					<option {if ($date.jour == "10")}selected="selected"{/if} value="10">10</option>
					<option {if ($date.jour == "11")}selected="selected"{/if} value="11">11</option>
					<option {if ($date.jour == "12")}selected="selected"{/if} value="12">12</option>
					<option {if ($date.jour == "13")}selected="selected"{/if} value="13">13</option>
					<option {if ($date.jour == "14")}selected="selected"{/if} value="14">14</option>
					<option {if ($date.jour == "15")}selected="selected"{/if} value="15">15</option>
					<option {if ($date.jour == "16")}selected="selected"{/if} value="16">16</option>
					<option {if ($date.jour == "17")}selected="selected"{/if} value="17">17</option>
					<option {if ($date.jour == "18")}selected="selected"{/if} value="18">18</option>
					<option {if ($date.jour == "19")}selected="selected"{/if} value="19">19</option>
					<option {if ($date.jour == "20")}selected="selected"{/if} value="20">20</option>
					<option {if ($date.jour == "21")}selected="selected"{/if} value="21">21</option>
					<option {if ($date.jour == "22")}selected="selected"{/if} value="22">22</option>
					<option {if ($date.jour == "23")}selected="selected"{/if} value="23">23</option>
					<option {if ($date.jour == "24")}selected="selected"{/if} value="24">24</option>
					<option {if ($date.jour == "25")}selected="selected"{/if} value="25">25</option>
					<option {if ($date.jour == "26")}selected="selected"{/if} value="26">26</option>
					<option {if ($date.jour == "27")}selected="selected"{/if} value="27">27</option>
					<option {if ($date.jour == "28")}selected="selected"{/if} value="28">28</option>
					<option {if ($date.jour == "29")}selected="selected"{/if} value="29">29</option>
					<option {if ($date.jour == "30")}selected="selected"{/if} value="30">30</option>
					<option {if ($date.jour == "31")}selected="selected"{/if} value="31">31</option>
					</select>
					 
					<select style="width:140px;" name="mois" size="1">
					<option {if ($date.mois == "01")}selected="selected"{/if} value="01">01 - Janvier</option>
					<option {if ($date.mois == "02")}selected="selected"{/if} value="02">02 - Février</option>
					<option {if ($date.mois == "03")}selected="selected"{/if} value="03">03 - Mars</option>
					<option {if ($date.mois == "04")}selected="selected"{/if} value="04">04 - Avril</option>
					<option {if ($date.mois == "05")}selected="selected"{/if} value="05">05 - Mai</option>
					<option {if ($date.mois == "06")}selected="selected"{/if} value="06">06 - Juin</option>
					<option {if ($date.mois == "07")}selected="selected"{/if} value="07">07 - Juillet</option>
					<option {if ($date.mois == "08")}selected="selected"{/if} value="08">08 - Aout</option>
					<option {if ($date.mois == "09")}selected="selected"{/if} value="09">09 - Septembre</option>
					<option {if ($date.mois == "10")}selected="selected"{/if} value="10">10 - Octobre</option>
					<option {if ($date.mois == "11")}selected="selected"{/if} value="11">11 - Novembre</option>
					<option {if ($date.mois == "12")}selected="selected"{/if} value="12">12 - Décembre</option>
					</select>
					 
					<select style="width:60px;" name="annee" size="1">
					<option {if ($date.annee == "2007")}selected="selected"{/if} value="2007">2007</option>
					<option {if ($date.annee == "2008")}selected="selected"{/if} value="2008">2008</option>
					<option {if ($date.annee == "2009")}selected="selected"{/if} value="2009">2009</option>
					<option {if ($date.annee == "2010")}selected="selected"{/if} value="2010">2010</option>
					<option {if ($date.annee == "2011")}selected="selected"{/if} value="2011">2011</option>
					<option {if ($date.annee == "2012")}selected="selected"{/if} value="2012">2012</option>
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
					<input style="width:150px;" name="dureeS" type="text" value="{$podcast.dureeS}" />
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
					Assigner ce podcast à une conférence :
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
					<strong>Tags :</strong>
				</td>
				<td style="text-align:left;">
					<input style="width:250px;" name="tags[]" type="text" id="tag1" />
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




<br /><br /><br />
</div>