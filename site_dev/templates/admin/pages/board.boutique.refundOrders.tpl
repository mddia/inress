<div id="main">
	<h6>Boutique / Commandes remboursées</h6>
	<br /><hr /><br />

	<h1>Commandes remboursées</h1><br />

	Affichages de toutes les commandes remboursées
	<br /><br />
	<div id="boardContent">
		<h3>Liste des {$refundOrdersCount} commande(s) remboursées</h3><br />
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
						Remboursement
					</th>
					<th>
						<strong>Action</strong>
					</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$refundOrders item='order'}
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
										<i>{$delivery.startMag}</i>
									{/if}
								{/if}
								(quantité : <strong>{$delivery.quantity}</strong>)<br />
							{/foreach}
						</td>
						<td style="text-align: center;">
							{$order.newValue} €<br />
							<strong style="color: red;">
								{$order.refundValue} € remboursés
							</strong>
						</td>
						<td style="color: red; text-align: center;">
							{$order.refund|date_format:$config.date}
						</td>
						<td style="text-align: center;">
							<a href="admin.php?cat=boutique&scat=macommande&id={$order.id}">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Voir commande" title="Voir commande" />
							</a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>		
	</div>
</div>