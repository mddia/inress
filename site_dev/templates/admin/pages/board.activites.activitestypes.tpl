<div id="main">
	<h6>Activités / Website / Edition des rendez-vous / {$type.nompluriel}</h6>
	<br /><hr /><br />

	<h1>{$type.nompluriel}</h1><br />

	Editer les types d'activités de l'INREES.
	<br /><br />


	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="updateActivityType" />
		<input type="hidden" name="id" value="{$type.id}" />
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:575px;">
				<tr>
					<td style="text-align:right;">Nom singulier :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="nomsing" type="text" value="{$type.nomsing}" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">Nom pluriel :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="nompl" type="text" value="{$type.nompluriel}" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">Description :</td>
					<td style="text-align:left;">
						<textarea style="width:250px;" name="desc">{$type.description}</textarea>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;">URL :</td>
					<td style="text-align:left;">
						<input style="width:250px;" name="urlactiv" type="text" value="{$type.urlactiv}" />
					</td>
				</tr>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>


				<tr><td style="text-align:right;"></td><td style="text-align:left;"><input class="button2" type="submit" id="action_online" name="action_online" value="Valider" /></td></tr>
			</table>
			<br /><br /><br />
		
		</fieldset>
	</form>

	<br /><br />
	<a href="http://admin.inrees.com/adm/index.php?cat=website&scat=gestionactivitestypes">Retourner sur la liste des types d'activités</a>

	<br /><br /><br />
</div>