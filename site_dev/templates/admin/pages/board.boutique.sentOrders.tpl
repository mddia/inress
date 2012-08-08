<div id="main">
	<h6>Boutique / Commandes envoyées</h6>
	<br /><hr /><br />


	<h1>Gestion des commandes</h1><br />

	Module destiné à gérer les commandes de la boutique INREES.
	<br /><br />
	<div id="boardContent">
	<h3>Liste des {$sentOrdersCount} commandes envoyées</h3><br />

		<table cellspacing="1" style="width:100%;">
			<thead>
			<tr>
				<th style="width:225px;">
					<strong>Facturée à</strong> 
					<a href="admin.php?cat=website&scat=gestioncommandes&limit=1&orderby=name">
						<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
					</a>
				</th>
				<th style="width:215px;">
					<strong>Expédiée à</strong>
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
					<strong>Envoi</strong> 
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
				{foreach from=$sentOrders item='order'}
					<tr class="{cycle values='row1, row2'}">
						<td>
							<a href="admin.php?cat=membres&scat=membres&id={$order.user.id}">
								<font style="text-transform:uppercase;font-weight:bold;">{$order.user.nom}</font> 
								<font style="text-transform:lowercase;text-transform:capitalize;">{$order.user.prenom}</font>
							</a>
						</td>
						<td>
							{foreach from=$order.addresses item='address'}
								<strong>
									{$address.firstName} {$address.name}
								</strong><br />
								{$address.address1}<br />
								{$address.zipCode} {$address.city}<br />
								<strong>{$address.country.name}</strong><br />
								<br />
							{/foreach}
						</td>
						<td>
							{foreach from=$order.deliveries item='delivery'}
								<strong>{$delivery.item.title}</strong><br />
								{if ($delivery.item.subscription == 1)}
									{if ($delivery.startMag != '0')}
										<i>{$delivery.startMag}<strong> envoyé</strong></i> 
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
							{if ($order.sent == 0)}
								<span style="color: red;">
									Non-envoyée
								</span>
							{elseif ($order.sent == 1)}
								<span style="color: green;">
									Envoyée
								</span>
							{else}
								<span style="color: green;">
									Envoyée le {$order.sent|date_format:$config.date}
								</span>
							{/if}
						</td>
						<td style="text-align: center;">
							{if ($order.sent == 0)}<a onClick="setOrderAsSent({$order.id});">
								<img src="http://admin.inrees.com/adm/images/icon_envoi-mail.gif" alt="Valider envoi" title="Valider envoi" /></a>
							{/if}
							{if ($order.paid == 0)}<a onClick="setOrderAsPaid({$order.id});">
								<img src="images/icons/money.png" alt="Valider paiement" title="Valider paiement" /></a>
							{/if}
							<a href="admin.php?cat=boutique&scat=macommande&id={$order.id}">
								<img src="http://admin.inrees.com/adm/images/iconEdit.gif" alt="Editer commande" title="Editer commande" /></a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
			
		<br /><br /><br />
	</div>
</div>