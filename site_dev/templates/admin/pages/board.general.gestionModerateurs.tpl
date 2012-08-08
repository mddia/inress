<div id="main">
	<a name="maincontent"></a>
	<h6>Général / Gestion des modérateurs</h6>
	<br /><hr /><br />
	<h1>Gestion des modérateurs</h1><br />
	Liste des modérateurs.
	<br /><br />
	
	<table cellspacing="1" style="width: 900px;">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nom</th>
				<th>Pseudo</th>
				<th>email</th>
				<th>Niveau d'acces</th>
				<th>actif</th>
				<th>Responsabilités</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$moderateurs item='mod'}
				<tr class="{cycle values='row1, row2'}" >
					<td>{$mod.id}</td>
					<td>{$mod.name} {$mod.firstName}</td>
					<td>{$mod.pseudo}</td>
					<td>{$mod.email}</td>
					<td>{$mod.acces}</td>
					<td>{$mod.actif}</td>
					<td>{$mod.responsabilites}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	
	<br /><br />
	
	Ajouter un modérateur
	<br /><br />
	
	<form action="actions.php" method="POST">
		<input type="hidden" name="formName" value="addModerateur" />
		<table cellspacing="1" style="width: 900px; text-align: center;">
			<thead>
				<tr>
					<th>Nom / Prénom</th>
					<th>Pseudo</th>
					<th>email</th>
					<th>Niveau d'acces</th>
					<th>actif</th>
					<th>Responsabilités</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td>
						Nom : <br /><input type="text" name="name" /><br />
						Prénom : <br /><input type="text" name="firstName" />
					</td>
					<td>
						<input type="text" name="pseudo" />
					</td>
					<td>
						<input type="text" name="email" />
					</td>
					<td>
						<select name="acces">
							<option value="0">0 - Elevé</option>
							<option value="1">1 - Fort</option>
							<option value="2">2 - Normal</option>
							<option value="3">3 - Basic</option>
						</select>
					</td>
					<td>
						<select name="actif">
							<option value="1">1 - Oui</option>
							<option value="0">0 - Non</option>
						</select>
					</td>
					<td>
						<input type="text" name="responsabilites" />
					</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<input type="submit" value="Enregistrer" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>