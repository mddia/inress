<div id="tabs">
	<ul>
		<li {if ($cat == 'general')}id="activetab"{/if}><a href="admin.php?cat=general"><span>General</span></a></li>
		<li {if ($cat == 'membres')}id="activetab"{/if}><a href="admin.php?cat=membres"><span>Abonnés</span></a></li>
		<li {if ($cat == 'messagerie')}id="activetab"{/if}><a href="admin.php?cat=messagerie"><span>Messagerie</span></a></li>
		<li {if ($cat == 'activites')}id="activetab"{/if}><a href="admin.php?cat=activites"><span>Evènements</span></a></li>
		<li {if ($cat == 'partenaires')}id="activetab"{/if}><a href="admin.php?cat=partenaires"><span>Partenaires</span></a></li>
		<li {if ($cat == 'website')}id="activetab"{/if}><a href="admin.php?cat=website"><span>Website</span></a></li>
		<li {if ($cat == 'boutique')}id="activetab"{/if}><a href="admin.php?cat=boutique"><span>Boutique</span></a></li>
		<li {if ($cat == 'budget')}id="activetab"{/if}><a href="admin.php?cat=budget"><span>Budget</span></a></li>
		<li {if ($cat == 'reseau')}id="activetab"{/if}><a href="admin.php?cat=reseau"><span>Réseau</span></a></li>
		<li><a target="_blank" href="//192.168.1.16"><span>Disk Station</span></a></li>
	</ul>
</div>