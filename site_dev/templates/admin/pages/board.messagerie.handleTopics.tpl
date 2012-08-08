<div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Options / Gestion des objets</h6>
	<br /><hr /><br />
	<h1>Gestion des objets</h1><br />
	
	<h3>Ajouter un objet</h3>
	<br />
	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width: 200px;">Nom</th>
				<th style="width: 100px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row6red" style="height: 40px;">
				<td style="width: 200px;">
					<input type="text" id="topicName" style="text-align: center;" maxlength="255" />
				</td>
				<td style="width: 100px;">
					<input type="button" class="confirm" value="Enregistrer" style="cursor: pointer; margin: 5px;" onClick="createTopic();" />
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	
	<h3>objets disponibles</h3><br />

	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width:150px;">Objet</th>
				<th style="width:100px;">Actions</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$topics item='topic'}
				<tr class='row6red'>
					<td><strong>{$topic.titre}</strong></td>
					<td>
						<strong>
							<a onClick="deleteTopic({$topic.id})" style="cursor: pointer;">
								<img src="images/icons/bin_closed.png" alt="Supprimer l'objet" title="Supprimer l'objet" /></a>
							<a onClick="editTopic({$topic.id}, '{$topic.titre}')" style="cursor: pointer;">
								<img src="images/icons/pencil.png" alt="Editer l'objet" title="Editer l'objet" /></a>
						</strong>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>