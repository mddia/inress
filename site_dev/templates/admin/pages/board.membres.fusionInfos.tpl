<div id="main">
	<h6>Membres / Liste des membres / <?php echo $id ; ?></h6>
	<br /><hr /><br />

	<h1>Fusionner deux comptes INREES</h1><br />

	Module pour fusionner deux comptes INREES.
	<br /><br />
	<form method="post" action="actions.php">
		<input type="hidden" name="formName" value="fusionUsers" />
		<fieldset>
			<legend>Récapitulatif de la fusion</legend>
		
			<table><tr><td style="width: 80px;"></td><td>
				<br /><br />
				<strong><font style="font-size:14px;">Compte à supprimer :</font></strong><br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong>{$userToDelete.id}</strong> - <span style="text-transform: uppercase;">{$userToDelete.nom}</span> {$userToDelete.prenom}</span>
				<br /><br /><br />
				<strong><font style="font-size:14px;">Compte à garder :</font></strong> <br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong>{$userToKeep.id}</strong> - <span style="text-transform: uppercase;">{$userToKeep.nom}</span> {$userToKeep.prenom}</span>
				<br /><br /><br />
				</td></tr>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Clé</th>
						<th>Nouvelle valeur</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.basics item='basic'}
						<tr class="{cycle values='row1, row2'}">
							<td>{$basic.key}</td>
							<td>{$basic.value}</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Adresse(s)</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.addresses item='address'}
						<tr class="{cycle values='row1, row2'}">
							<td>									
								<strong>
								{$address.firstName} {$address.name}
								</strong><br />
								{$address.address1}<br />
								{$address.zipCode} {$address.city}<br />
								<strong>{$address.country.name}</strong>
								{if ($address.country.id == '172')}
									<br /><strong>{$address.state.name}</strong>
								{/if}
								<br />
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Abonnement(s)</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.abonnements item='abo'}
						<tr class="{cycle values='row1, row2'}">
							<td>									
								<strong>
								{$abo.name}
								</strong><br />
								Mag n°{$abo.startMag} à n°{$abo.maxMag}
								<br />
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Commandes</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.orders item='order'}
						<tr class="{cycle values='row1, row2'}">
							<td {if ($order.paid == '0')}class="red"{/if}>									
								<strong>
									<a href="admin.php?cat=boutique&scat=macommande&id={$order.id}">
									[n° {$order.id}]</a></strong> le {$order.timestamp|date_format:$config.date} à  {$order.timestamp|date_format:$config.hours} ({$order.value}€)
								</strong>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Messages</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.messages item='message'}
						<tr class="{cycle values='row1, row2'}">
							<td>									
								<strong>
									<a href="admin.php?cat=messagerie&scat=message&id={$message.id}">
									[n° {$message.id}]</a></strong> le {$message.timestamp|date_format:$config.date} à  {$message.timestamp|date_format:$config.hours}
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br />
			<table cellspacing="1" style="width:675px; margin-top: 10px;">
				<thead>
					<tr>
						<th>Magazines routés</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$infos.rootMags item='mag'}
						<tr class="{cycle values='row1, row2'}">
							<td>									
								{$mag.abonnement} - <strong>n° {$mag.magId}</strong>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
			<br /><br />
			<table>
				<tr>
					<td></td>
					<td align="left">
						<input type="hidden" name="userToDelete" value="{$userToDelete.id}" />
						<input type="hidden" name="userToKeep" value="{$userToKeep.id}" />
						<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider la fusion" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<br /><br /><br />
</div>