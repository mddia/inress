<div id="main">
	<h6>Activités / {$event.titre}</h6>
	<br /><hr /><br />

	<h1>Modifier {$event.titre} (#{$event.id})</h1><br />

	Modifier {$event.titre}

	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="createActivite" />
		<fieldset>
				<legend>Données à remplir</legend>

		<table style="width:575px;">
			<tr>
				<td style="text-align:right;">Choix de l'activité :</td>
				<td style="text-align:left;">
					<select style="width:175px;" name="activites" id="activites" size="1">
						{foreach from=$eventTypes item='type'}
							{if ($type.actif == 1)}
								<option value="{$type.id}" {if ($event.activites == $type.id)}selected="selected"{/if}>{$type.nomsing}</option>
							{/if}
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;"><font color="red">Choix du thème :</font></td>
				<td style="text-align:left;">
					<select style="width:175px;" name="theme" id="theme" size="1">
						{foreach from=$themes item='theme'}
							<option value="{$theme.id}" {if ($event.theme == $theme.id)}selected="selected"{/if}>{$theme.titre}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr>
				<td style="text-align:right;">Choix du lieu :</td>
				<td style="text-align:left;">
					<select style="width:175px;" name="locaux" id="locaux" size="1">
						{foreach from=$locaux item='lieu'}
							<option value="{$lieu.id}" {if ($event.locaux == $lieu.id)}selected="selected"{/if}>{$lieu.resume}</option>
						{/foreach}
					</select>
				</td>
			</tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;vertical-align:top;">Choix des intervenants :</td><td style="text-align:left;">
			<select style="width:175px;" name="intervenants[]" size="1">
				{foreach from=$supports item='support'}
					<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
				{/foreach}
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				{foreach from=$supports item='support'}
					<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
				{/foreach}
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				{foreach from=$supports item='support'}
					<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
				{/foreach}
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				{foreach from=$supports item='support'}
					<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
				{/foreach}
			</select>
			<br />
			<select style="width:175px;" name="intervenants[]" size="1">
				<option selected="selected" value="0">(aucun)</option>
				{foreach from=$supports item='support'}
					<option value="{$support.id}">{$support.nom} {$support.prenom}</option>
				{/foreach}
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">URL (internet) :</td><td style="text-align:left;"><input style="width:250px;" name="url" type="text" value="{$event.url}" /></td></tr>
			<tr><td style="text-align:right;"><strong>Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="titre" type="text" value="{$event.titre}" /></td></tr>
			<tr><td style="text-align:right;"><strong>Sous-Titre :</strong></td><td style="text-align:left;"><input style="width:250px;" name="sst" type="text" value="{$event.sst}" /></td></tr>
			<tr><td style="text-align:right;">Présentation :</td><td style="text-align:left;"><textarea style="width:250px;" name="presentation" type="text">{$event.presentation}</textarea></td></tr>
			<tr><td style="text-align:right;">Online :</td><td style="text-align:left;">
			<select style="width:75px;" name="online" size="1">
			<option value="1">Oui (1)</option>
			<option value="0">Non (0)</option>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">Date de début :</td><td style="text-align:left;">
			{$event.dateD|date_format:$config.date}
			</td></tr>
			<tr><td style="text-align:right;">Date de fin :</td><td style="text-align:left;">
			{$event.dateF|date_format:$config.date}
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			
			<tr><td style="text-align:right;">Disponibles (sur place) :</td><td style="text-align:left;"><input style="width:35px;" maxlength="5" type="text" name="dispos" value="{$event.dispos}"/></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

			<tr><td style="text-align:right;">Actif :</td><td style="text-align:left;">
			<select style="width:75px;" name="actif" id="actif" size="1">
			<option value="1">Oui (1)</option>
			<option value="0">Non (0)</option>
			</select>
			</td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
			<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>


			<!--<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>-->
		</table>
		<br /><br />
		
		</fieldset>
	</form>


	<br /><br /><br />
</div>