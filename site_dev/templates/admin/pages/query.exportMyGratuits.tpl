<table cellspacing="1" style="width:100%;">
	<thead>
		<tr>
			<th style="text-align: left;">ID</th>
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
		{foreach from=$myGratuits.data item='my'}
			<tr>
				{foreach from=$my.user.addresses item='address'}
					{if ($address.default == '1')}
						<td>{$my.user.id}</td>
						<td><span style="text-transform: uppercase;">{$my.user.nom}</span></td>
						<td>{$my.user.prenom}</td>
						<td>{$address.address1}</td>
						<td>{if ($address.address2 != '0')}{$address.address2}{/if}</td>
						<td>{if ($address.address3 != '0')}{$address.address3}{/if}</td>
						<td>{$address.zipCode}</td>
						<td>{$address.city}</td>
						<td>{$address.country.name}</td>
					{/if}
				{/foreach}
			</tr>
		{/foreach}
	</tbody>
</table>