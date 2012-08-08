<div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu()" href="#"></a>
</div>
<div id="menu">
	<ul>
		<li class="header">
			Recherche
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=advancedSearch">
				<span>
					Recherche avancée
				</span>
			</a>
		</li>
		<li class="header">
			Boîte de réception générale
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=attente">
				<span class="{if ($awaitingMessagesCount != '0')}zmenu{else}zmenugr{/if}">
					Boîte de réception	<strong>[{$awaitingMessagesCount}]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=unlabelled">
				<span class="{if ($unlabelledMessagesCount != '0')}zmenu{else}zmenugr{/if}">
					Boîte de réception (non-red.) <strong>[{$unlabelledMessagesCount}]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=envoyes">
				<span>
					Messages envoyés
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=corbeille">
				<span>
					Corbeille
				</span>
			</a>
		</li>
		<li class="header">
			Boîte personnelle - {$SESSION.moderateur.firstName} {$SESSION.moderateur.name}
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=myMailBox">
				<span class="{if ($mailBoxCount != '0')}zmenu{else}zmenugr{/if}">
					Boîte de réception<strong> [{$mailBoxCount}]</strong>
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=mySentBox">
				<span>
					Messages envoyés
				</span>
			</a>
		</li>
		<li class="header">
			Vos libellés
		</li>
		{foreach from=$myLabels item='label'}			
			<li>
				<a href="admin.php?cat=messagerie&scat=labelAttente&id={$label.details.id}">
					<span class="{if ($label.messages.count != '0')}zmenu{else}zmenugr{/if}">
						{$label.details.name} <strong>[{$label.messages.count}]</strong>
					</span>
				</a>
			</li>
		{/foreach}
		<li class="header">
			Témoignages
		</li>		
		<li>
			<a href="admin.php?cat=messagerie&scat=testimonies">
				<span>
					Archives <strong>[{$testimoniesCount}]</strong>
				</span>
			</a>
		</li>
		<li class="header">
			Options de messagerie
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=handleLabels">
				<span>
					Gestion des libellés
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=messagerie&scat=handleTopics">
				<span>
					Gestion des objets
				</span>
			</a>
		</li>
	</ul>
</div>