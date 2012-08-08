<div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Administration</li>
		<li><a href="admin.php?cat=activites&scat=createactivites"><span>Insérer un nouveau rendez-vous</span></a></li>
		<hr />
		<li><a href="admin.php?cat=activites&scat=listeactivites"><span>Liste des rendez-vous</span></a></li>
		<li><a href="admin.php?cat=activites&scat=gestionactivitestypes"><span>Gestion des types d'activité</span></a></li>
		<li><a href="admin.php?cat=activites&scat=gestionlocaux"><span>Gestion des locaux</span></a></li>
		<li><a href="admin.php?cat=website&scat=gestionIntervenants"><span>Gestion des intervenants</span></a></li>
		<li class="header">Liste des évènements</li>
		{foreach from=$eventTypes item='type'}
			{if ($type.actif == 1)}
				<li>
					<a href="admin.php?cat=activites&scat=activites&scat=listeEV&id={$type.id}"><span>{$type.nompluriel}</span></a>
				</li>
			{/if}
		{/foreach}
	</ul>
</div>