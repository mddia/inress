<div id="main">
	<h6>Boutique / Commandes non-abouties</h6>
	<br /><hr /><br />

	<h1>Commandes non-abouties</h1><br />

	Affichages de toutes les commandes arrêtées avant la fin du processus
	<br /><br />
	<div id="boardContent">
		<h3>Liste des {$unfinishedOrdersCount} commande(s) non-abouties</h3><br />
		<br /><hr /><br />
		<table cellspacing="1" style="width:100%;">
			<thead>
				<tr>
					<th style="width:225px;">
						<strong>Facturé à</strong>
					</th>
					<th>
						<strong>Commandes</strong>
					</th>
					<th style="width:75px;">
						<strong>Montant</strong>
					</th>
					<th>
						<strong>Règlement</strong>
					</th>
					<th>
						<strong>Action</strong>
					</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$unfinishedOrders item='order'}
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
							{$order.value} €
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
							<a onClick="recallForOrder({$order.id});">
								<img src="images/icons/email_go.png" alt="Envoyer un rappel" title="Envoyer un rappel" />
							</a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>		
	</div>
</div>