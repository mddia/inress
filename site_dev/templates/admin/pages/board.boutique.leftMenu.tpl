<div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Liste des commandes</li>
		<li><a href="admin.php?cat=boutique&scat=unpaidOrders"><span>Gestion des commandes</span></a></li>
		<li><a href="admin.php?cat=boutique&scat=unsentOrders"><span class="{if ($unsentOrdersCount != 0)}zmenu{else}zmenugr{/if}">Commandes à envoyer{if ($unsentOrdersCount != 0)} [{$unsentOrdersCount}]{/if}</span></a></li>
		<li><a href="admin.php?cat=boutique&scat=sentOrders"><span>Commandes envoyées</span></a></li>
		<hr />
		<li><a href="admin.php?cat=boutique&scat=addOrder"><span>Insérer une nouvelle commande</span></a></li>
		<hr />
		<li><a href="admin.php?cat=boutique&scat=unfinishedOrders"><span class="{if ($unfinishedOrdersCount != 0)}zmenu{/if}">Commandes non-abouties{if ($unfinishedOrdersCount != 0)} [{$unfinishedOrdersCount}]{/if}</span></a></li>
		<li><a href="admin.php?cat=boutique&scat=refundOrders"><span>Commandes remboursées</span></a></li>
		<li class="header">Gestion des produits</li>
		<li><a onClick="displayCategories('list');"><span>Catégories de produits</span></a></li>
		<li><a onClick="displayFamilies('list');"><span>Familles de produits</span></a></li>
		<li><a onClick="displayProductsType('list');"><span>Type de produits</span></a></li>
		<li><a onClick="displayProducts();"><span>Produits</span></a></li>
		<li class="header">
			Magazine
		</li>
		<li>
			<a href="admin.php?cat=boutique&scat=handleMags">
				<span>
					Gestion des magazines
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=boutique&scat=routageList">
				<span>
					Gestion du routage
				</span>
			</a>
		</li>
	</ul>
</div>