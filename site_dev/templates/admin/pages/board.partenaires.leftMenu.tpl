<div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu()" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">
			commandes
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=detailsCommand">
				<span>Gestion des commandes</span>
			</a>
		</li>	
		<li class="header">
			Diffusion
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCommandBon">
				<span class="zmenu">
					Liste des bons de livraison [$]
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCommandBonAttentePay">
				<span class="zmenu">
					Paiements en attente [$]
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCommandpartner">
				<span>
					Suivi des points de vente
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCommandBonTop">
				<span>
					Top stats
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCommandSelect">
				<span>
					Sélection par produit
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=telephone">
				<span>
					Téléphone
				</span>
			</a>
		</li>
		<li class="header">Liste des partenaires</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=partSearch">
				<span>
					Rechercher un partenaire
				</span>
			</a>
		</li>
		<hr />
		<li>
			<a href="admin.php?cat=partenaires&scat=listePartenaires&descid='.$row['partenairesDesc_id'].'">
				<span>'.$row['partenairesDesc_titre'].'</span>
			</a>
		</li>
		<hr />
		<li>
			<a href="admin.php?cat=partenaires&scat=createpartner">
				<span>
					Ajouter un partenaire
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listePartenaires">
				<span>
					Liste de tous les partenaires
				</span>
			</a>
		</li>
		<li class="header">
			Publicités
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=createCamp">
				<span>
					Ajouter une nouvelle campagne
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCamp">
				<span>
					Liste des campagnes
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=partenaires&scat=listCampWeb">
				<span>
					Liste des campagnes Web
				</span>
			</a>
		</li>
		<hr />
		<li>
			<a href="admin.php?cat=partenaires&scat=listTarifs">
				<span>
					Liste des tarifs
				</span>
			</a>
		</li>
	</ul>
</div>