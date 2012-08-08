<div id="main">
	<h6>Réseau / Index</h6>
	<br /><hr /><br />

	<h1>Réseau de discussions</h1>

	<h3>Créer un nouveau fil de discussion</h3><br />
	
	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="addNewThread" />
		<input type="hidden" name="modId" value="{$SESSION.moderateur.id}" />
		<table style="width: 800px; text-align: center;">
			<thead>
				<tr>
					<th>Intitulé</th>
					<th>Contenu</th>
				</tr>
			</thead>
			<tbody>
				<tr class="row2">
					<td><strong>Objet de la discussion</strong></td>
					<td>
						<input type="text" name="topic" style="width: 400px;" />
					</td>
				</tr>
				<tr class="row2">
					<td><strong>Message</strong></td>
					<td>
						<textarea name="message" style="width: 500px; height: 140px;"></textarea>
					</td>
				</tr>
				<tr class="row2">
					<td></td>
					<td>
						<input type="submit" value="Envoyer" style="cursor: pointer;" />
					</td>
				</tr>
			</tbody>
		</table>
	</form>
</div>