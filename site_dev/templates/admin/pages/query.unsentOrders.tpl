<strong>Module d'étiquettes pour les commandes à envoyer</strong>
<br /><br />
<table cellspacing="1" style="width:100%;">
	<thead>
		<tr>
			<th style="text-align: left;">Nom</th>
			<th style="text-align: left;">Prénom</th>
			<th style="text-align: left;">Adresse 1</th>
			<th style="text-align: left;">Adresse 2</th>
			<th style="text-align: left;">Adresse 3</th>
			<th style="text-align: left;">Postal</th>
			<th style="text-align: left;">Ville</th>
			<th style="text-align: left;">Pays</th>
		</tr>
	</thead>
	<tbody>
		{foreach from=$byDeliveryUnsent item='delivery'}
			<tr>
				<td><span style="text-transform: uppercase;">{$delivery.address.name}</span></td>
				<td>{$delivery.address.firstName}</td>
				<td>{$delivery.address.address1}</td>
				<td>
					{if ($delivery.address.address2 != '0') AND ($delivery.address.address2 != '') AND ($delivery.address.address2 != 'undefined')}
						{$delivery.address.address2}
					{/if}
				</td>
				<td>
					{if ($delivery.address.address3 != '0') AND ($delivery.address.address3 != '') AND ($delivery.address.address3 != 'undefined')}
						{$delivery.address.address3}
					{/if}
				</td>
				<td>{$delivery.address.zipCode}</td>
				<td>{$delivery.address.city}</td>
				<td>{$delivery.address.country.name}</td>
			</tr>
		{/foreach}
	</tbody>
</table>