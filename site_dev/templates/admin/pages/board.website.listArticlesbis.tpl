<div id="main">
	<h6>Magazine / Magazine en ligne / Liste des articles non-programmés</h6>
	<br /><hr /><br />
	<h1>Liste des articles en ligne</h1><br />
	Gestion des <strong>articles</strong> du magazine en ligne de l'INREES.
	<br /><br />
	<h3>Liste des articles en ligne</h3><br />
	
	<table cellspacing="1" width="100%">
		<thead>
			<tr>
				<th>
					<strong>Thème</strong> <a href="admin.php?cat=website&scat=listOfflineArticles&orderby=theme"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th style="width:140px;">
					<strong>Rubrique</strong> <a href="admin.php?cat=website&scat=listOfflineArticles&orderby=rub>"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th>
					<strong>Titre</strong> <a href="admin.php?cat=website&scat=listOfflineArticles&orderby=name"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th style="width:105px;">
					<strong>Auteur</strong> <a href="admin.php?cat=website&scat=listOfflineArticles&orderby=auteur"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th style="width:50px;">
					<strong>Actif</strong> <a href="admin.php?cat=website&scat=listOfflineArticles&orderby=actif"><img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" /></a>
				</th>
				<th style="width:65px;"><strong>Edit</strong></th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$articles item='article'}
				<tr class="row1">
					<td>
						<font style="font-size:10px;"><strong>{$article.titreTheme}</strong></font>
					</td>
					<td align="center">
						<font style="font-size:10px;">{$article.rubriqueTitre}</font>
					</td>
					<td>
						<a href="admin.php?cat=website&scat=magarticle&id={$article.id}">
							<strong>{$article.titre}</strong><br />{$article.minidesc|truncate:120:"...":true}
						</a>
						<br />
					</td>
					<td align="center">
						<font style="font-size:10px;">{$article.prenomRedacteur} <strong>{$article.nomRedacteur}</strong></font>
					</td>
					<td align="center">
						{if ($article.actif == '1')}
							<strong><font color="green">Oui</font></strong>
						{elseif ($article.actif == '0')}
							<strong><font color="red">Non</font></strong>
						{else}
							<em>incorrect</em>
						{/if}
						{if ($article.online == '1')}
							<br /><font style="font-size:9px;" color="green">Online</font>
						{else}
							<br /><font style="font-size:9px;" color="red">Offline</font>
						{/if}
						{if ($article.blog == '1')}
							<font style="font-size:9px;" color="purple">+Blog</font>
						{/if}
						<br />
						{if ($article.myinrees == '1')}
							<font style="font-size:9px;font-weight:bold;" color="blue">+My</font>
						{/if}
					</td>
					<td align="center">
						<a href="admin.php?cat=website&scat=magarticle&id={$article.id}" title="Editer l'article"><img src="http://admin.inrees.com/adm/images/iconEdit.gif" width="16" height="16"></a>
						<a href="javascript:supprimerMagArticle({$article.id})"><img src="http://admin.inrees.com/adm/images/icon_annuler.gif" width="16" height="16"></a>
						<br />{$article.id}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br /><br /><br />
</div>