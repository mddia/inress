<div id="main">
	<h6>Activités / Website / Edition des locaux / {$lieu.resume}</h6>
	<br /><hr /><br />

	<h1>{$lieu.resume}</h1><br />

	Editer les locaux de l'INREES.
	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="updateLocaux" />
		<input type="hidden" name="id" value="{$lieu.id}" />
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr><td style="text-align:right;">Nom :</td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" value="{$lieu.resume}" /></td></tr>
				<tr><td style="text-align:right;">Adresse (ligne 1) :</td><td style="text-align:left;"><input style="width:250px;" name="adresse" type="text" value="{$lieu.adresse}" /></td></tr>	
				<tr><td style="text-align:right;">Adresse (ligne 2) :</td><td style="text-align:left;"><input style="width:250px;" name="adressebis" type="text" value="{$lieu.adressebis}" /></td></tr>
				<tr><td style="text-align:right;">Remarques :</td><td style="text-align:left;"><input style="width:250px;" name="remarques" type="text" value="{$lieu.remarques}" /></td></tr>
				<tr><td style="text-align:right;">Code Postal :</td><td style="text-align:left;"><input style="width:250px;" name="postal" type="text" value="{$lieu.postal}" /></td></tr>
				<tr><td style="text-align:right;">Ville :</td><td style="text-align:left;"><input style="width:250px;" name="ville" type="text" value="{$lieu.ville}" /></td></tr>
				<tr><td style="text-align:right;">Google Map :</td><td style="text-align:left;"><input style="width:250px;" name="map" type="text" value="{$lieu.map}" /> <a target="_blank" href="http://maps.google.fr/maps?hl=fr&tab=wl">Go to Google map</a></td></tr>
				
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>				

				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br /><br />
</div>