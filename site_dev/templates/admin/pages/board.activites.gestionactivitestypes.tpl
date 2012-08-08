<div id="main">
	<h6>Activités / Website / Liste des types d'activités</h6>
	<br /><hr /><br />




	<h1>Les types d'activités</h1><br />

	Liste des <strong>types d'activités (Conférences, ateliers, évènements...)</strong> de l'INREES.

	<br /><br />


	<h3>Liste des toutes les activités</h3><br />

	<table cellspacing="1" style="width:390px;">
		<thead>
		<tr>
			<th><strong>ID</strong></th>
			<th><strong>Activités</strong></th>
			<th><strong>Actif</strong></th>
			<th style="width:50px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$eventTypes item='type'}
				<tr class="{cycle values='row1,row2'}">
					<td>{$type.id}</td>
					<td>
						<strong>
							<a href="admin.php?cat=activites&scat=activites&scat=activitestypes&id={$type.id}">{$type.nompluriel}</a>
						</strong>
					</td>
					<td>{$type.actif}</td>
					<td>
						<a href="admin.php?cat=activites&scat=activites&scat=activitestypes&id={$type.id}">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif">
						</a> 
						<a onClick="deleteActivityType({$type.id})">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif">
						</a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>



	<br /><br />




	<h3>Insérer un nouveau type d'activité</h3><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addActivityType" />
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:575px;">
		<tr><td style="text-align:right;">Nom singulier :</td><td style="text-align:left;"><input style="width:250px;" name="nomsing" type="text" /></td></tr>
		<tr><td style="text-align:right;">Nom pluriel :</td><td style="text-align:left;"><input style="width:250px;" name="nompl" type="text" /></td></tr>
		<tr><td style="text-align:right;">Description :</td><td style="text-align:left;"><textarea style="width:250px;" name="desc"></textarea></td></tr>
		<tr><td style="text-align:right;">URL :</td><td style="text-align:left;"><input style="width:250px;" name="URL" type="text" /></td></tr>
		<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
		<select style="width:75px;" name="actif" id="actif" size="1">
		<option value="1">Oui (1)</option>
		<option value="0">Non (0)</option>
		</select>
		</td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

		<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
		</table><br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br /><br />
</div>