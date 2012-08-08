<div id="main">
	<h6>Messagerie / Témoignages</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Témoignages</h1><br />


	Liste de tous les témoignages envoyés.

	<br /><br />
	<h3>{$testimoniesCount} témoignages archivés</h3><br />
	
	<table cellspacing="1" style="width:100%;">
		<thead>
			<tr>
				<th style="width:50px;">
					<strong>ID</strong>
				</th>
				<th>
					<strong>Titre</strong>
				</th>
				<th style="width:225px;">
					<strong>Expéditeur</strong>
				</th>
				<th style="width:180px;">
					<strong>Date / Statut</strong>
				</th>
				<th style="width:120px;">
					<strong>Edit</strong>
				</th>
			</tr>
		</thead>
		<tbody>
			{if ($testimoniesCount != '0')}
				{foreach from=$testimonies item='message'}
					<tr class="row6red">
						<td>{$message.id}</td>
						<td>
							<a href="admin.php?cat=messagerie&scat=message&id={$message.id}">
								<strong>
									{if ($message.tem == 0)}{$message.objet}{else}Témoignage{/if}
								</strong>
							</a>
						</td>
						<td>
							<strong>
								<font style="text-transform:capitalize;">{$message.firstName}</font>
								<font style="text-transform:uppercase;">{$message.name}</font>
							<strong>
						</td>
						<td>
							<font class="error">
								<strong>Non-répondu</strong><br />
								depuis {$message.passedTime} jour(s)
							</font>
							<br />
							<font color="green" id="labelZone{$message.id}">
								{foreach from=$message.labels item='label'}
									<div class="label" style="background-color: #{$label.background}; color: #{$label.color};" id="label-{$message.id}-{$label.id}">
										{$label.name} 
										<a style="cursor: pointer;" onClick="removeLabel({$label.id}, {$message.id});">
											<img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" />
										</a>
									</div>
								{/foreach}
							</font>
						</td>
						<td>
							<select>
								<option style="font-style: italic;">Transmettre à</option>
								{foreach from=$labels item='label'}
									<option onClick="addLabel({$label.id}, {$message.id});">{$label.name}</option>
								{/foreach}
							</select>
							<br /><br />
							<a style="font-style: italic; cursor: pointer; font-weight: bold;" onClick="deleteMessage({$message.id})"><img src="images/icons/bin_closed.png" alt="Supprimer le message" title="Supprimer le message" /></a>
						</td>
					</tr>
				{/foreach}
			{/if}
		</tbody>
	</table>
	<br /><br /><br />
</div>