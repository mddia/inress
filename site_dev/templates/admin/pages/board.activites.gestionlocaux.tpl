<div id="main">
	<h6>Website / Activités / Liste des rendez-vous</h6>
	<br /><hr /><br />

	<h1>Gestion des locaux</h1><br />

	Gestion des locaux où est intervenu l'INREES.

	<br /><br />

	<h3>Liste des lieux de rendez-vous :</h3><br />

		<table cellspacing="1" style="width:650px;">
			<thead>
				<tr>
					<th style="width:150px;">NOM</th>
					<th>ADRESSE</th>
					<th>MAP</th>
					<th style="width:50px;">EDIT</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$locaux item='lieu'}
					<tr class="{cycle values='row1,row2'}">
						<td>
							<strong>
								<a href="admin.php?cat=activites&scat=activites&scat=locaux&id={$lieu.id}">{$lieu.resume}</a>
							</strong>
						</td>
						<td>
							{$lieu.adresse}<br />
							{if ($lieu.adressebis != "")}{$lieu.adressebis}<br />{/if}
							{if ($lieu.remarques != "")}{$lieu.remarques}<br />{/if}
							{$lieu.postal} {$lieu.ville}
						</td>
						<td>
							<a href="{$lieu.map}" target="_blank">Map</a>
						</td>
						<td>
							<a href="admin.php?cat=activites&scat=activites&scat=locaux&id={$lieu.id}">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif">
							</a> 
							<a onClick="deleteLocaux({$lieu.id})">
								<img src="http://admin.inrees.com/adm/images/icon_annuler.gif">
							</a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>


	<br /><br />

	<h3>Ajouter un nouveau lieu :</h3><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addLocaux" />
		<fieldset>
				<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr><td style="text-align:right;">Nom :</td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" /></td></tr>
				<tr><td style="text-align:right;">Adresse (ligne 1) :</td><td style="text-align:left;"><input style="width:250px;" name="adresse" type="text" /></td></tr>	
				<tr><td style="text-align:right;">Adresse (ligne 2) :</td><td style="text-align:left;"><input style="width:250px;" name="adressebis" type="text" /></td></tr>
				<tr><td style="text-align:right;">Remarques :</td><td style="text-align:left;"><input style="width:250px;" name="remarques" type="text" /></td></tr>
				<tr><td style="text-align:right;">Code Postal :</td><td style="text-align:left;"><input style="width:250px;" name="postal" type="text" /></td></tr>
				<tr><td style="text-align:right;">Ville :</td><td style="text-align:left;"><input style="width:250px;" name="ville" type="text" /></td></tr>
				<tr><td style="text-align:right;">Google Map :</td><td style="text-align:left;"><input style="width:250px;" name="map" type="text" /> <a target="_blank" href="http://maps.google.fr/maps?hl=fr&tab=wl">Go to Google map</a></td></tr>
				
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

				

				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br />
</div>