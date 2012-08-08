<div id="main">
	<h6>Website / Podcasts / Liste de tous les podcasts</h6>
	<br /><hr /><br />


	<h1>Liste de tous les podcasts</h1><br />

	Liste de <strong>tous les podcasts</strong> présents sur le site de l'INREES.


	<br /><br />

	<table cellspacing="1" style="width:850px;">
		<thead>
			<tr>
				<th>
					<strong>Date</strong> 
					<a href="admin.php?cat=website&scat=listesoutien&orderby=timestamp"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th>
					<strong>Titre</strong> <a href="admin.php?cat=website&scat=listesoutien&orderby=name"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th>
					<strong>Intervenant</strong> <a href="admin.php?cat=website&scat=listesoutien&orderby=intervenant"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th style="width:50px;"><strong>Actif</strong> <a href="admin.php?cat=website&scat=listesoutien&orderby=actif"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a></th>
				<th style="width:50px;"><strong>Edit</strong></th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$podcasts item='podcast'}
				<tr class="row2">
					<td>{$podcast.timestamp|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=website&scat=podcasts&id={$podcast.id}">
							<strong>{$podcast.titre}</strong><br />{$podcast.sst}
						</a>
					</td>
					<td>$soutiens</td>
					<td>
						{if ($podcast.actif == '1')}
							<font color="green">oui</font><br />
						{elseif ($podcast.actif == '0')}
							<font color="red">non</font><br />
						{else}
							<em>incorrect</em><br />
						{/if}
					</td>
					<td>
						<a href="admin.php?cat=website&scat=podcasts&id={$podcast.id}" title="Editer le podcast"><img src="http://admin.inrees.com/adm/images/iconEdit.gif"></a>
						<a href="javascript:supprimerPodcasts({$podcast.id})"><img src="http://admin.inrees.com/adm/images/icon_annuler.gif"></a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br /><br /><br />
</div>