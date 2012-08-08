<div id="main">
	<h6>Magazine / Magazine en ligne / Modifier un article</h6>
	<br /><hr /><br />
	<h1>Modifier un article dans le Magazine en ligne</h1><br />
	Modifier un <strong>article dans le Magazine en ligne</strong> de l'INREES.
	<br /><br />
	<form id="action_online_form" method="post" action="actions.php">
		<input type="hidden" name="formName" value="editMagArticle" />
		<input type="hidden" name="articleId" value="{$article.id}" />
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:875px;">
		<tr><td style="text-align:right;">Date (de publication) :</td><td style="text-align:left;">
		
		<select style="width:40px;" name="jours" size="1">
		<option {if ($article.jour == "01")}selected="selected"{/if} value="01">01</option>
		<option {if ($article.jour == "02")}selected="selected"{/if} value="02">02</option>
		<option {if ($article.jour == "03")}selected="selected"{/if} value="03">03</option>
		<option {if ($article.jour == "04")}selected="selected"{/if} value="04">04</option>
		<option {if ($article.jour == "05")}selected="selected"{/if} value="05">05</option>
		<option {if ($article.jour == "06")}selected="selected"{/if} value="06">06</option>
		<option {if ($article.jour == "07")}selected="selected"{/if} value="07">07</option>
		<option {if ($article.jour == "08")}selected="selected"{/if} value="08">08</option>
		<option {if ($article.jour == "09")}selected="selected"{/if} value="09">09</option>
		<option {if ($article.jour == "10")}selected="selected"{/if} value="10">10</option>
		<option {if ($article.jour == "11")}selected="selected"{/if} value="11">11</option>
		<option {if ($article.jour == "12")}selected="selected"{/if} value="12">12</option>
		<option {if ($article.jour == "13")}selected="selected"{/if} value="13">13</option>
		<option {if ($article.jour == "14")}selected="selected"{/if} value="14">14</option>
		<option {if ($article.jour == "15")}selected="selected"{/if} value="15">15</option>
		<option {if ($article.jour == "16")}selected="selected"{/if} value="16">16</option>
		<option {if ($article.jour == "17")}selected="selected"{/if} value="17">17</option>
		<option {if ($article.jour == "18")}selected="selected"{/if} value="18">18</option>
		<option {if ($article.jour == "19")}selected="selected"{/if} value="19">19</option>
		<option {if ($article.jour == "20")}selected="selected"{/if} value="20">20</option>
		<option {if ($article.jour == "21")}selected="selected"{/if} value="21">21</option>
		<option {if ($article.jour == "22")}selected="selected"{/if} value="22">22</option>
		<option {if ($article.jour == "23")}selected="selected"{/if} value="23">23</option>
		<option {if ($article.jour == "24")}selected="selected"{/if} value="24">24</option>
		<option {if ($article.jour == "25")}selected="selected"{/if} value="25">25</option>
		<option {if ($article.jour == "26")}selected="selected"{/if} value="26">26</option>
		<option {if ($article.jour == "27")}selected="selected"{/if} value="27">27</option>
		<option {if ($article.jour == "28")}selected="selected"{/if} value="28">28</option>
		<option {if ($article.jour == "29")}selected="selected"{/if} value="29">29</option>
		<option {if ($article.jour == "30")}selected="selected"{/if} value="30">30</option>
		<option {if ($article.jour == "31")}selected="selected"{/if} value="31">31</option>
		</select>
		 
		<select style="width:140px;" name="mois" size="1">
		<option {if ($article.mois == "01")}selected="selected"{/if} value="01">01 - Janvier</option>
		<option {if ($article.mois == "02")}selected="selected"{/if} value="02">02 - Février</option>
		<option {if ($article.mois == "03")}selected="selected"{/if} value="03">03 - Mars</option>
		<option {if ($article.mois == "04")}selected="selected"{/if} value="04">04 - Avril</option>
		<option {if ($article.mois == "05")}selected="selected"{/if} value="05">05 - Mai</option>
		<option {if ($article.mois == "06")}selected="selected"{/if} value="06">06 - Juin</option>
		<option {if ($article.mois == "07")}selected="selected"{/if} value="07">07 - Juillet</option>
		<option {if ($article.mois == "08")}selected="selected"{/if} value="08">08 - Aout</option>
		<option {if ($article.mois == "09")}selected="selected"{/if} value="09">09 - Septembre</option>
		<option {if ($article.mois == "10")}selected="selected"{/if} value="10">10 - Octobre</option>
		<option {if ($article.mois == "11")}selected="selected"{/if} value="11">11 - Novembre</option>
		<option {if ($article.mois == "12")}selected="selected"{/if} value="12">12 - Décembre</option>
		</select>
		 
		<select style="width:60px;" name="annee" size="1">
		<option {if ($article.annee == "2007")}selected="selected"{/if} value="2007">2007</option>
		<option {if ($article.annee == "2008")}selected="selected"{/if} value="2008">2008</option>
		<option {if ($article.annee == "2009")}selected="selected"{/if} value="2009">2009</option>
		<option {if ($article.annee == "2010")}selected="selected"{/if} value="2010">2010</option>
		<option {if ($article.annee == "2011")}selected="selected"{/if} value="2011">2011</option>
		<option {if ($article.annee == "2012")}selected="selected"{/if} value="2012">2012</option>
		</select>
		 à 
		<select style="width:40px;" name="heures" size="1">
		<option {if ($article.heure == "01")}selected="selected"{/if}  value="01">01</option>
		<option {if ($article.heure == "02")}selected="selected"{/if}  value="02">02</option>
		<option {if ($article.heure == "03")}selected="selected"{/if}  value="03">03</option>
		<option {if ($article.heure == "04")}selected="selected"{/if}  value="04">04</option>
		<option {if ($article.heure == "05")}selected="selected"{/if}  value="05">05</option>
		<option {if ($article.heure == "06")}selected="selected"{/if}  value="06">06</option>
		<option {if ($article.heure == "07")}selected="selected"{/if}  value="07">07</option>
		<option {if ($article.heure == "08")}selected="selected"{/if}  value="08">08</option>
		<option {if ($article.heure == "09")}selected="selected"{/if}  value="09">09</option>
		<option {if ($article.heure == "10")}selected="selected"{/if}  value="10">10</option>
		<option {if ($article.heure == "11")}selected="selected"{/if}  value="11">11</option>
		<option {if ($article.heure == "12")}selected="selected"{/if}  value="12">12</option>
		<option {if ($article.heure == "13")}selected="selected"{/if}  value="13">13</option>
		<option {if ($article.heure == "14")}selected="selected"{/if}  value="14">14</option>
		<option {if ($article.heure == "15")}selected="selected"{/if}  value="15">15</option>
		<option {if ($article.heure == "16")}selected="selected"{/if}  value="16">16</option>
		<option {if ($article.heure == "17")}selected="selected"{/if}  value="17">17</option>
		<option {if ($article.heure == "18")}selected="selected"{/if}  value="18">18</option>
		<option {if ($article.heure == "19")}selected="selected"{/if}  value="19">19</option>
		<option {if ($article.heure == "20")}selected="selected"{/if}  value="20">20</option>
		<option {if ($article.heure == "21")}selected="selected"{/if}  value="21">21</option>
		<option {if ($article.heure == "22")}selected="selected"{/if}  value="22">22</option>
		<option {if ($article.heure == "23")}selected="selected"{/if}  value="23">23</option>
		<option {if ($article.heure == "00")}selected="selected"{/if}  value="00">00</option>
		</select>
		 h 
		<input style="width:25px;" name="minutes" type="text" value="{$article.minute}" />
		
		<input style="width:250px;" name="secondes" type="hidden" value="00" />
		</td></tr>
		
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;vertical-align:top;">Rubrique :</td><td style="text-align:left;">
		<select style="width:225px;" name="idrub" size="1">
			{foreach from=$rubriques|@orderby:"id" item='rubrique'}
				<option value="{$rubrique.id}" {if ($rubrique.id) == ($article.idrub)}selected="selected"{/if}>{$rubrique.titre}</option>
			{/foreach}
		</select>
		</td></tr>
		<tr><td style="text-align:right;vertical-align:top;">Thème :</td><td style="text-align:left;">
		<select style="width:225px;" name="idtheme" size="1">
			{foreach from=$themes|@orderby:"ordre" item='theme'}
				<option value="{$theme.id}" {if ($theme.id) == ($article.idtheme)}selected="selected"{/if}>{$theme.titre}</option>
			{/foreach}
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;">Photo (directory) :</td><td style="text-align:left;"><input style="width:225px;" name="photoname" type="text" /></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;"><strong>Mini-titre :</strong></td><td style="text-align:left;"><input style="width:225px;" name="minititre" type="text" value="{$article.minititre}" /></td></tr>
		<tr><td style="text-align:right;"><strong>Titre :</strong></td><td style="text-align:left;"><input style="width:225px;" name="titre" type="text" value="{$article.titre}" /></td></tr>
		<tr><td style="text-align:right;"><strong>Description :</strong></td><td style="text-align:left;"><textarea style="width:420px;height:75px;" name="desc" type="text" />{$article.minidesc}</textarea></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;"><strong>HTML :</strong></td><td style="text-align:left;"><textarea style="width:420px;height:360px;" name="html" type="text">{$article.html}</textarea></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;">URL (sur internet) :</td><td style="text-align:left;"><input style="width:225px;" name="url" type="text" value="{$article.url}" /></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;">Rédacteur :</td><td style="text-align:left;">
		<select style="width:175px;" name="idredac" size="1">
				<option value="0">0 === INREES</option>
				{foreach from=$supports|@orderby:"id" item='support'}
					<option value="{$support.id}" {if ($support.id) == ($article.idredacteur)}selected="selected"{/if}>{$support.nom} {$support.prenom}</option>
				{/foreach}
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		
		<tr><td style="text-align:right;">Blog :</td><td style="text-align:left;">
		<select style="width:75px;" name="blog" id="blog" size="1">
		<option value="0" {if ($article.blog == '0')}selected="selected"{/if}>Non (0)</option>
		<option value="1" {if ($article.blog == '1')}selected="selected"{/if}>Oui (1)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">My Inrees ?</td><td style="text-align:left;">
		<select style="width:75px;" name="myinrees" id="myinrees" size="1">
		<option value="0" {if ($article.myinrees == '0')}selected="selected"{/if}>Non (0)</option>
		<option value="1" {if ($article.myinrees == '1')}selected="selected"{/if}>Oui (1)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
		<select style="width:75px;" name="actif" size="1">
		<option value="0" {if ($article.actif == '0')}selected="selected"{/if}>Non (0)</option>
		<option value="1" {if ($article.actif == '1')}selected="selected"{/if}>Oui (1)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;" valign="top">Online ?</td><td style="text-align:left;">
		<select style="width:75px;" name="online" id="online" size="1">
		<option value="0" {if ($article.online == '0')}selected="selected"{/if}>Non (0)</option>
		<option value="1" {if ($article.online == '0')}selected="selected"{/if}>Oui (1)</option>
		</select><br /><br />
		<a target="_blank" href="http://www3.inrees.com/includes/magazine/ajoutArticle.php"><strong>Ajouter l'article complet</strong></a>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;"><strong>Tags :</strong></td><td style="text-align:left;"><input style="width:225px;" name="tag1" type="text" /></td></tr>
		<tr><td style="text-align:right;"><strong>Tags :</strong></td><td style="text-align:left;"><input style="width:225px;" name="tag2" type="text" /></td></tr>
		<tr><td style="text-align:right;"><strong>Tags :</strong></td><td style="text-align:left;"><input style="width:225px;" name="tag3" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag4" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag5" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag6" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag7" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag8" type="text" /></td></tr>
		<tr><td style="text-align:right;">Tags :</td><td style="text-align:left;"><input style="width:225px;" name="tag9" type="text" /></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		
		<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Enregistrer modifications" /></td></tr>
		</table><br /><br /><br />
		
		</fieldset>
	</form>
	<br /><br /><br />
</div>