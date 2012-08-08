<div id="main">
	<h6>Membres / Administration / Gestion des magazine</h6>
	<br /><hr /><br />


	<h1>Créer un routage magazine</h1><br />

	Module destiné à gérer les magazines de l'INREES.
	<br /><br />
	<div id="boardContent">
	
		<h3>Ajouter un magazine</h3><br />
		Ajouter un nouveau magazine pour l'INREES<br />
		<table cellspacing="1" style="width:850px; margin-top: 10px;">
			<thead>
				<tr>
					<th>Abonnement</th>
					<th>Numéro</th>
					<th>Titre</th>
					<th>Actif</th>
					<th>Online</th>
					<th>Disponibilité</th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				<tr>
					<td>
						<select name="aboId" id="aboId">
							{foreach from=$abos item='abo'}
								<option value="{$abo.id}">{$abo.title}</option>
							{/foreach}
						</select>
					</td>
					<td><input type="text" name="numero" id="numero" style="text-align: center; width: 30px;" /></td>
					<td><input type="text" name="titre" id="titre" style="text-align: center;" /></td>
					<td>
						<select name="actif" id="actif">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</td>
					<td>
						<select name="online" id="online">
							<option value="0">Non</option>
							<option value="1">Oui</option>
						</select>
					</td>
					<td>
						<input type="text" name="JJ" id="JJ" style="text-align: center; width: 20px;" value="JJ" maxlength="2" /> / 
						<input type="text" name="MM" id="MM" style="text-align: center; width: 20px;" value="MM" maxlength="2"  /> / 
						<input type="text" name="AAAA" id="AAAA" style="text-align: center; width: 40px;" value="AAAA" maxlength="4"  />
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><input type="button" value="Enregistrer" onClick="recordNewMag();" style="cursor: pointer;" /></td>
				</tr>
			</tbody>
		</table>
		<br /><br />
		<h3>Liste des magazines</h3><br />
		Magazines déjà enregistrés<br />
		<table cellspacing="1" style="width:850px; margin-top: 10px;">
			<thead>
				<tr>
					<th>Abonnement</th>
					<th>Numéro</th>
					<th>Titre</th>
					<th>Actif</th>
					<th>Online</th>
					<th>Disponibilité</th>
					<th>Date de routage</th>
				</tr>
			</thead>
			<tbody style="text-align: center;">
				{foreach from=$mags item='mag'}
					<tr class="{cycle values='row1, row2'}">
						<td><strong>{$mag.abo.title}</strong></td>
						<td><strong>{$mag.numero}</strong></td>
						<td>{$mag.titre}</td>
						<td>
							<select name="actif">
								<option {if ($mag.actif == '0')}selected="selected"{/if} value="0">Non</option>
								<option {if ($mag.actif == '1')}selected="selected"{/if} value="1">Oui</option>
							</select>
						</td>
						<td>
							<select name="online">
								<option {if ($mag.online == '0')}selected="selected"{/if} value="0">Non</option>
								<option {if ($mag.online == '1')}selected="selected"{/if} value="1">Oui</option>
							</select>
						</td>
						<td>
							{if ($mag.dateSortie != '0')}
								{$mag.dateSortie|date_format:$config.date}
							{else}
								<strong style="color: red;">Inconnue</strong>
							{/if}
						</td>
						<td>
							
							{if ($mag.routage != '0')}
								{$mag.routage|date_format:$config.date}
							{else}
								<strong>Non routé</strong>
							{/if}
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		<br /><br />
	</div>
</div>