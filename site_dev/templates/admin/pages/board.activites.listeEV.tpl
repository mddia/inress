<div id="main">
	<h6>Activités / {$theme.nompluriel} / Liste des {$theme.nompluriel}</h6>
	<br /><hr /><br />

	<h1>Liste des {$theme.nompluriel}</h1><br />

	Récapitulatif de tout(e)s les {$theme.nompluriel} organisé(e)s depuis la création de l'INREES.
	<br /><br />


	<h3>{$theme.nompluriel} à venir</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th style="width:125px;"><strong>Réservations</strong></th>
			<th style="width:125px;"><strong>Site</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$eventsToCome item='event'}
				<tr>
					<td>{$event.dateD|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id={$event.id}">
							<strong>{$event.titre}</strong>
						</a>
					</td>
					<td>{$event.dispos}</td>
					<td>{$event.url}</td>
				</tr>
			{/foreach}
		</tbody>
	</table>

	<br /><br />

	<h3>{$theme.nompluriel} terminé(e)s</h3><br />


	<table cellspacing="1" style="width:820px;">
		<thead>
		<tr>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th style="width:55px;"><strong>Réservations</strong></th>
			<th style="width:95px;"><strong>CA</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$doneEvents item='event'}
				<tr class="{cycle values='row1, row2'}">
					<td>{$event.dateD|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id={$event.id}">
							{$event.titre}
						</a>
					</td>
					<td>{$event.dispos}</td>
					<td></td>
				</tr>
			{/foreach}
		</tbody>
	</table>


	<br /><br /><br />
</div>