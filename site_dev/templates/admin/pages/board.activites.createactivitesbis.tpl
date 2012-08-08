<div id="main">
	<h6>Activités / Website / Insérer une extension de rendez-vous</h6>
	<br /><hr /><br />




	<h1>Insérer une extension de rendez-vous</h1><br />

	Insérer <strong>une extension de rendez-vous (Conférences, ateliers, séminaires, évènements, cafés...)</strong> de l'INREES.

	<br /><br />


	<form id="action_online_form" method="post" action="http://admin.inrees.com/adm/requetesAdmin.php?createactivitesbis=1">
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:575px;">
		<tr><td style="text-align:right;">Rendez-vous :</td><td style="text-align:left;">
		<select style="width:275px;" name="idid" id="idid" size="1">
				<?php
				$requete = "SELECT agendadetails_id, agendadetails_titre, agendaactivites_nomsing FROM in_agendadetails, in_agendaactivites WHERE in_agendaactivites.agendaactivites_id = in_agendadetails.agendadetails_activites ORDER BY agendadetails_activites ASC, agendadetails_id DESC" ;
				$result = mysql_query($requete) ;
				while ($row = mysql_fetch_array ($result) ) 
					{
						echo '<option value="'.$row['agendadetails_id'].'">'.$row['agendaactivites_nomsing'].' - '.$row['agendadetails_titre'].'</option>' ;
					}
				?>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;">Choix du lieu :</td><td style="text-align:left;">
		<select style="width:175px;" name="locaux" id="locaux" size="1">
				<?php
				$requete = "SELECT locaux_id, locaux_resume FROM in_agendalocaux ORDER BY locaux_resume ASC" ;
				$result = mysql_query($requete) ;
				while ($row = mysql_fetch_array ($result) ) 
					{
						echo '<option value="'.$row['locaux_id'].'">'.$row['locaux_resume'].'</option>' ;
					}
				?>
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
		<option value="50">50</option>
		</select>
		
		<input style="width:250px;" name="Fsecondes" type="hidden" value="00" />
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;">prixpublic :</td><td style="text-align:left;"><input style="width:35px;" type="text" maxlength="5" name="prixpublic" value="0000" /> € (en centimes)</td></tr>
		<tr><td style="text-align:right;">prixmembres :</td><td style="text-align:left;"><input style="width:35px;" type="text" maxlength="5" name="prixmembres" value="0000" /> € (en centimes)</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;">Stock (sur internet) :</td><td style="text-align:left;"><input style="width:35px;" maxlength="5" type="text" name="stock" /></td></tr>
		<tr><td style="text-align:right;">Disponibles (sur place) :</td><td style="text-align:left;"><input style="width:35px;" maxlength="5" type="text" name="dispos" /></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
		<select style="width:75px;" name="actif" id="actif" size="1">
		<option value="yes">Oui (1)</option>
		<option value="no">Non (0)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
		<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
		</table><br /><br />
		
		</fieldset>
	</form>


	<br /><br /><br />
</div>