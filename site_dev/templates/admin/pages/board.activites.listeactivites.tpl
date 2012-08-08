<div id="main">
	<h6>Activités / Website / Liste des rendez-vous</h6>
	<br /><hr /><br />

	<h1>Liste des rendez-vous</h1><br />

	Liste de <strong>toutes les activités (conférences, ateliers, évènements...)</strong> de l'INREES.

	<br /><br />


	<h3>Les prochaines rendez-vous</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th>ID</th>
			<th style="width:95px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th><strong>Evènement</strong></th>
			<th style="width:65px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$eventsToCome item='event'}
				<tr class="{cycle values='row1, row2'}">
					<td style="text-align: center;">{$event.id}</td>
					<td>{$event.dateD|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id={$event.id}">
							<strong>{$event.titre}</strong>
						</a>
					</td>
					<td>{$event.activitesName}</td>
					<td>
						<a target="_blank" href="http://www.inrees.com/{$event.activitesName}/{$event.url}/" title="Voir évènement">
							<img src="http://admin.inrees.com/adm/images/icon_info.gif" width="16" height="16"></a> 
						<a href="admin.php?admin.php?cat=activites&scat=events&id={$event.id}" title="Editer le profil">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="16" height="16"></a> 
						<a href="javascript:supprimerActivites({$event.id})">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="16" height="16"></a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>

	<br /><br />

	<h3>Les anciens rendez-vous</h3><br />

	<table cellspacing="1" style="width:825px;">
		<thead>
		<tr>
			<th>ID</th>
			<th style="width:100px;"><strong>Date</strong></th>
			<th><strong>Thèmes</strong></th>
			<th><strong>Evènement</strong></th>
			<th style="width:50px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$doneEvents item='event'}
				<tr class="{cycle values='row1, row2'}">
					<td style="text-align: center;">{$event.id}</td>
					<td>{$event.dateD|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=activites&scat=events&id={$event.id}">
							{$event.titre}
						</a>
					</td>
					<td>{$event.activitesName}</td>
					<td>
						<a target="_blank" href="http://www.inrees.com/{$event.activitesName}/{$event.url}/" title="Voir évènement">
							<img src="http://admin.inrees.com/adm/images/icon_info.gif" width="12" height="12"></a> 
						<a href="admin.php?admin.php?cat=activites&scat=events&id={$event.id}" title="Editer le profil">
							<img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="12" height="12"></a> 
						<a href="javascript:supprimerActivites({$event.id})">
							<img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="12" height="12"></a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>

	<br /><br /><br />
</div>