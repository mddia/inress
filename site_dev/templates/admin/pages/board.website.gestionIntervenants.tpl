<div id="main">
	<h6>Activités / Intervenants</h6>
	<br /><hr /><br />

	<h1>Gestion des intervenants</h1><br />

	Gestion des intervenants

	<br /><br />

	<form method="post" action="actions.php">	
		<input type="hidden" name="formName" value="addIntervenant" />
		<fieldset>
			<legend>Données à remplir</legend>
			<br />
				
			<table style="width:590px;">
			<tr><td style="text-align:right;">Photoname (95x95) :</td><td style="text-align:left;"><input style="width:150px;" name="photo" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;"><strong>Nom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="nom" type="text" /></td></tr>
			<tr><td style="text-align:right;"><strong>Prénom :</strong></td><td style="text-align:left;"><input style="width:250px;" name="prenom" type="text" /></td></tr>
			<tr><td style="text-align:right;">Texte intro :</td><td style="text-align:left;"><textarea style="width:350px;height:150px;" name="intro" type="text"></textarea></td></tr>
			<tr><td style="text-align:right;">Citation :</td><td style="text-align:left;"><textarea style="width:350px;height:75px;" name="citation" type="text"></textarea></td></tr>
			<tr><td style="text-align:right;"><strong>URL (réf. internet) :</strong></td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Profession FR :</td><td style="text-align:left;"><input style="width:250px;" name="professionFR" type="text" /></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table><br /><br /><br />
		
		</fieldset>
	</form>
		
	<h1>Intervenants</h1><br />
	
	<table cellspacing="1" style="width:825px;">
		<thead>
			<tr>
				<th><strong>Nom</strong></th>
				<th><strong>Prénom</strong></th>
				<th><strong>Edit</strong></th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$soutiens item='soutien'}
				<tr class="{cycle values='row1, row2'}">
					<td>{$soutien.nom}</td>
					<td>
						{$soutien.prenom}
					</td>
					<td style="text-align: center;">
						<a href="admin.php?cat=website&scat=soutien&id={$soutien.id}">
							<img title="Editer commande" alt="Editer commande" src="http://admin.inrees.com/adm/images/iconEdit.gif">
						</a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>

	<br /><br /><br />
</div>