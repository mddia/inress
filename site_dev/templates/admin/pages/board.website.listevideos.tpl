<div id="main">
	<h6>Website / videos / Liste de toutes les vidéos</h6>
	<br /><hr /><br />


	<h1>Liste de toutes les vidéos</h1><br />

	Liste de <strong>toutes les vidéos</strong> présentes sur le site de l'INREES.


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
			{foreach from=$videos item='video'}
				<tr class="row2">
					<td>{$video.timestamp|date_format:$config.date}</td>
					<td>
						<a href="admin.php?cat=website&scat=videos&id={$video.id}">
							<strong>{$video.titre}</strong><br />{$video.sst}
						</a>
					</td>
					<td>$soutiens</td>
					<td>
						{if ($video.actif == '1')}
							<font color="green">oui</font><br />
						{elseif ($video.actif == '0')}
							<font color="red">non</font><br />
						{else}
							<em>incorrect</em><br />
						{/if}
					</td>
					<td>
						<a href="admin.php?cat=website&scat=videos&id={$video.id}" title="Editer le video"><img src="http://admin.inrees.com/adm/images/iconEdit.gif"></a>
						<a href="javascript:supprimervideos({$video.id})"><img src="http://admin.inrees.com/adm/images/icon_annuler.gif"></a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br /><br /><br />
</div>