<div id="main">
	<h6>Boutique / Commandes à envoyer</h6>
	<br /><hr /><br />


	<h1>Gestion des commandes</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	
	<div id="boardContent">
	
		<h3>Liste des {$unsentOrdersCount} commandes effectuées à envoyer</h3><br />
		Afficher par : <a id="orderedByUserButton" class="bold" onClick="switchThirdDisplay('orderedByUser', 'orderedByItem', 'orderedByDelivery')">Utilisateur</a> | <a id="orderedByItemButton" onClick="switchThirdDisplay('orderedByItem', 'orderedByUser', 'orderedByDelivery')">Famille de produits</a> | <a id="orderedByDeliveryButton" onClick="switchThirdDisplay('orderedByDelivery', 'orderedByUser', 'orderedByItem')">Facturation / Envoi</a><br />
		<br />
		<!-- AFFICHAGE PAR UTILISATEUR -->
		<div id="orderedByUser">
			<table cellspacing="1" style="width:100%;">
				<thead>
					<tr>
						<th style="width:225px;">
							<strong>Facturé à</strong> 
							<a href="admin.php?cat=website&scat=gestioncommandes&limit=1&orderby=name">
								<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
							</a>
						</th>
						<th>
							<strong>Commandes</strong>
						</th>
						<th style="width:75px;">
							<strong>Montant</strong> 
							<a href="admin.php?cat=website&scat=gestioncommandes&orderby=montant">
								<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
							</a>
						</th>
						<th>
							<strong>Règlement</strong> 
							<a href="admin.php?cat=website&scat=gestioncommandes&orderby=reglement">
								<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
							</a>
						</th>
						<th style="width:55px;">
							<strong>Edit</strong>
						</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$unsentOrders item='order'}
						<tr class="{cycle values='row1, row2'}">
							<td>
								<a href="admin.php?cat=membres&scat=membres&id={$order.user.id}">
									<font style="text-transform:uppercase;font-weight:bold;">{$order.user.nom}</font> 
									<font style="text-transform:lowercase;text-transform:capitalize;">{$order.user.prenom}</font>
								</a>
							</td>
							<td>
								{foreach from=$order.deliveries item='delivery'}
									<strong>{$delivery.item.title}</strong><br />
									{if ($delivery.item.subscription == 1)}
										{if ($delivery.startMag != '0')}
											<i><strong>Envoyer</strong> {$delivery.startMag}</i> 
										{else}
											<i>Pas de mag à envoyer</i><br />
										{/if}
									{/if}
									(quantité : <strong>{$delivery.quantity}</strong>)<br />
								{/foreach}
							</td>
							<td style="text-align: center;">
								{if ($order.refund != '0')}
									{$order.newValue} €<br />
									<strong style="color: red;">
										{$order.refundValue} € remboursés
									</strong>
								{else}
									{$order.value} €
								{/if}
							</td>
							<td style="text-align: center;">
								{if ($order.paid == 0)}
									<span style="color: red;">
										Non-payée
									</span>
								{elseif ($order.paid == 1)}
									<span style="color: green;">
										Payée
									</span>
								{/if}
							</td>
							<td style="text-align: center;">
								{if ($order.sent == 0)}<a onClick="setOrderAsSent({$order.id});">
									<img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" alt="Valider envoi" title="Valider envoi" /></a>
								{/if}
								{if ($order.paid == 0)}<a onClick="setOrderAsPaid({$order.id});">
									<img src="images/icons/money.png" alt="Valider paiement" title="Valider paiement" /></a>
								{else}
									<a onClick="refundOrder({$order.id}, {$order.value});">
										<img src="images/icons/money_delete.png" alt="Rembourser commande" title="Rembourser commande" /></a>
								{/if}
								<a href="admin.php?cat=boutique&scat=macommande&id={$order.id}">
									<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Editer commande" title="Editer commande" /></a>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<a href="admin.php?cat=query&scat=unsentOrders" target="_blank" class="buttonplusred" style="float: right; margin-top: 10px; margin-right: 5px; padding-bottom: 10px;">
				Exporter les étiquettes
			</a>
		</div>
		
		<!-- AFFICHAGE PAR FAMILLE D'OBJET -->
		<div id="orderedByItem" class="hidden">
			<select name="productsFamily">
				<option value="0">Choisir</option>
				{foreach from=$allTypes item='type'}
					{if ($type.active == '1')}<option value="{$type.id}" onClick="displayFamilyProducts('unsent', {$type.id}); showMeThatOrder('unsent', {$type.id});">{$type.name}</option>{/if}
				{/foreach}
			</select>
			<br /><br />
			<div id="whereIdisplay">
				
			</div>
		</div>
		
		<!-- AFFICHAGE PAR FACTURATION / ENVOI -->
		<div id="orderedByDelivery" class="hidden">
			<table cellspacing="1" style="width:100%;">
				<thead>
					<tr>
						<th style="width: 160px;">
							<strong>Facturé à</strong>
						</th>
						<th style="width:225px;">
							<strong>Adresse de livraison</strong> 
						</th>
						<th>
							<strong>Contenu du colis</strong>
						</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$byDeliveryUnsent item='delivery'}
						<tr class="{cycle values='row1, row2'}">
							<td>
								<font style="text-transform:uppercase;font-weight:bold;">{$delivery.user.nom}</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;">{$delivery.user.prenom}</font>
							</td>
							<td>
								<font style="text-transform:uppercase;font-weight:bold;">{$delivery.address.name}</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;">{$delivery.address.firstName}</font><br />
								{$delivery.address.address1}<br />
								{if ($delivery.address.address2 != '0') AND ($delivery.address.address2 != '') AND ($delivery.address.address2 != 'undefined')}
									{$delivery.address.address2}<br />
								{/if}
								{if ($delivery.address.address3 != '0') AND ($delivery.address.address3 != '') AND ($delivery.address.address3 != 'undefined')}
									{$delivery.address.address3}<br />
								{/if}
								{$delivery.address.zipCode} {$delivery.address.city}<br />
								<strong>{$delivery.address.country.name}</strong>
							</td>
							<td>
								{foreach from=$delivery.items item='item'}
									<strong>{$item.details.title}</strong><br />
									{if ($item.details.subscription == 1)}
										{if ($item.startMag != '0')}
											<i><strong>Envoyer</strong> {$item.startMag}</i> 
										{else}
											<i>Pas de mag à envoyer</i><br />
										{/if}
									{/if}
									(quantité : <strong>{$item.quantity}</strong>)<br />
								{/foreach}
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<a href="admin.php?cat=query&scat=unsentOrders" target="_blank" class="buttonplusred" style="float: right; margin-top: 10px; margin-right: 5px; padding-bottom: 10px;">
				Exporter les étiquettes
			</a>
		</div>
		<br /><br /><br />
	</div>
</div>