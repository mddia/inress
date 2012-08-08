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
		{foreach from=$myPayants.data item='my'}
			<tr>
				<td>{$my.user.id}</td>
				<td><span style="text-transform: uppercase;">{$my.address.name}</span></td>
				<td>{$my.address.firstName}</td>
				<td>{$my.address.address1}</td>
				<td>{if ($my.address.address2 != '0')}{$my.address.address2}{/if}</td>
				<td>{if ($my.address.address3 != '0')}{$my.address.address3}{/if}</td>
				<td>{$my.address.zipCode}</td>
				<td>{$my.address.city}</td>
				<td>{$my.address.country.name}</td>
			</tr>
		{/foreach}
	</tbody>
</table>