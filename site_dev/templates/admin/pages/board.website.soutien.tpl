<div id="main">
	<h6>Activités / Intervenants</h6>
	<br /><hr /><br />

	<h1>Gestion des intervenants</h1><br />

	Gestion des intervenants

	<br /><br />

	<form method="post" action="actions.php">	
		<input type="hidden" name="formName" value="editIntervenant" />
		<fieldset>
			<legend>Données à remplir</legend>
			<br />
				
			<table style="width:590px;">
			<tr><td style="text-align:right;">Photoname (95x95) :</td><td style="text-align:left;"><input style="width:150px;" name="photo" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;"><strong>Nom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" value="{$soutien.nom}" /></td></tr>
			<tr><td style="text-align:right;"><strong>Prénom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="prenom" type="text" value="{$soutien.prenom}" /></td></tr>
			<tr><td style="text-align:right;">Texte intro :</td><td style="text-align:left;"><textarea style="width:350px;height:150px;" name="intro" type="text" value="{$soutien.intro}"></textarea></td></tr>
			<tr><td style="text-align:right;">Citation :</td><td style="text-align:left;"><textarea style="width:350px;height:75px;" name="citation" type="text" value="{$soutien.citation}"></textarea></td></tr>
			<tr><td style="text-align:right;"><strong>URL (réf. internet) :</strong></td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" value="{$soutien.url}" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Profession FR :</td><td style="text-align:left;"><input style="width:250px;" name="professionFR" type="text" value="{$soutien.professionFR}" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table><br /><br /><br />
		
		</fieldset>
	</form>
	<br /><br /><br />
</div>