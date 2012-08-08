<div id="main">
	<h1>Commande n°{$order.id}</h1><br />

	Module destiné à gérer les commandes INREES.
	<br /><br />
	<div id="boardContent">
		<h3>Détails de la commande</h3><br />
		{if ($order.refund != 0)}
			<strong style="color: red;">Cette commande a été remboursée de {$order.refundValue} € le {$order.refund|date_format:$config.date} à {$order.refund|date_format:$config.hours}</strong><br /><br />
		{/if}
		<table cellspacing="1" style="width:500px; margin-bottom: 10px;">
			<thead>
				<tr>
					<th>Facturée à</th>
					<th>Prix</th>
					<th>Envoi</th>
					{if ($order.sent == 0) OR ($order.paid == 0)}
						{if ($order.refund == 0)}
							<th>Actions</th>
						{/if}
					{/if}
				</tr>
			</thead>
			<tbody>
				<tr class="row1">
					<td>
						<a href="admin.php?cat=membres&scat=membres&id={$order.user.id}">
							<font style="text-transform:uppercase;">{$order.user.nom}</font> {$order.user.prenom}
						</a>
					</td>
					<td>
						{if ($order.refund != '0')}
							<strong>{$order.newValue} €</strong><br />
							<strong style="color: red;">
								{$order.refundValue} € remboursés
							</strong>
						{else}
							<strong>{$order.value} €</strong>
						{/if}						
					</td>
					<td>
						{if ($order.sent == 0)}
							En attente d'envoi
						{elseif ($order.sent == 1)}
							<em><font color="green">Envoyée</font></em>
						{else}
							<em><font color="green">Envoyée le {$order.sent|date_format:$config.date}</font></em>
						{/if}
					</td>
					{if ($order.sent == 0) OR ($order.paid == 0)}
						{if ($order.refund == 0)}
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
							</td>
						{/if}
					{/if}
				</tr>
			</tbody>
		</table>
		{if ($order.paid == 1)}
			<table cellspacing="1" style="width:500px; margin-bottom: 10px;">
				<thead>
					<tr>
						<th style="width: 250px;">Mode de paiement</th>
						<th>Transaction</th>
					</tr>
				</thead>
				<tbody>
					<tr class="row1">
						<td>
							{if ($order.paymentType != '') AND ($order.paymentType != '0')}
								{$order.paymentType}
							{else}
								<i>Mode de paiement inconnu</i>
							{/if}
						</td>
						<td>
							{if ($order.transactionNumber != '')}
								#{$order.transactionNumber}
							{else}
								<i>Pas de numéro de transaction</i>
							{/if}
						</td>
					</tr>
				</tbody>
			</table>
		{/if}
		<table style="width: 500px;">
			<thead>
				<tr>
					<th style="width: 250px;">Expédiée à</th>
					<th>Produits</th>
					<th>Mode de livraison</th>
				</tr>
			</thead>
			<tbody>			
				{foreach from=$order.addresses item='address'}
					<tr class="{cycle values='row1, row2'}">
						<td>
							<strong>
								{$address.firstName} {$address.name}
							</strong><br />
							{$address.address1}<br />
							{$address.zipCode} {$address.city}<br />
							<strong>{$address.country.name}</strong><br />
						</td>
						<td>
							{foreach from=$order.deliveries item='delivery'}
								{if ($delivery.addressId) == ($address.id)}
									- {$delivery.item.title} {if ($delivery.quantity != 1)}<strong>(x {$delivery.quantity})</strong>{/if} <br />
								{/if}
							{/foreach}
						</td>
						<td style="text-align: center;">
							<strong>
								{$address.delivery.name}
							</strong>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>		

		<br /><br />
		<a onClick="preciseBill({$order.id});"><strong>Voir la facture</strong></a>
			
		<br /><br /><br />
	</div>
</div>