<div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Recherche / Recherche avancée</h6>
	<br /><hr /><br />
	<h1>Recherche</h1><br />
	
	<h3>Recherche avancée</h3>
	<br />
	<table cellspacing="1" style="width: 650px; text-align: center;">
		<thead>
			<tr>
				<th>Critère de recherche</th>
				<th>Contenu de la recherche</th>
			</tr>
		</thead>
		<tbody>
			<form method="POST" action="admin.php?cat=messagerie&scat=advancedSearch">
				<input type="hidden" name="search" value="1" />
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Nom / prénom
					</td>
					<td style="width: 200px;">
						<input type="text" name="name" maxlength="255" />
					</td>
				</tr>
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Objet
					</td>
					<td style="width: 200px;">
						<select name="topic">
							<option value="0">Choisir</option>
							<option value="T">Témoignage</option>
							{foreach from=$topics item='topic'}
								<option value="{$topic.id}">{$topic.titre}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Contenu du message
					</td>
					<td style="width: 200px;">
						<input type="text" name="content" maxlength="255" />
					</td>
				</tr>
				<tr style="height: 40px;">
					<td style="width: 230px;">
						
					</td>
					<td style="width: 200px;">
						<input type="submit" value="Lancer la recherche" style="cursor: pointer;" />
					</td>
				</tr>
			</form>
		</tbody>
	</table>
	<br /><br />
	<table cellspacing="1" style="width: 650px; text-align: center;">
		<thead>
			<tr>
				<th>Critère de recherche</th>
				<th>Contenu de la recherche</th>
			</tr>
		</thead>
		<tbody>
			<form method="POST" action="admin.php?cat=messagerie&scat=advancedSearch">
				<input type="hidden" name="search" value="2" />
				<tr class="row2" style="height: 40px;">
					<td style="width: 230px;">
						Tags
					</td>
					<td style="width: 200px;">
						<select name="tag">
							{foreach from=$tags item='tag'}
								<option value="{$tag.id}">{$tag.name}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr style="height: 40px;">
					<td style="width: 230px;">
						
					</td>
					<td style="width: 200px;">
						<input type="submit" value="Lancer la recherche" style="cursor: pointer;" />
					</td>
				</tr>
			</form>
		</tbody>
	</table>
	<br /><br /><br />
	{if ($search == '1') OR ($search == '2')}
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
			{foreach from=$messages item='message'}
				<tr class="row6red">
					<td>{$message.id}</td>
					<td>
						<a href="admin.php?cat=messagerie&scat=message&id={$message.id}">
							<strong>
								{if ($message.tem == 0)}{$message.objet}{else}Témoignage{/if}<br />
							</strong>
							<i>{$message.preview}</i>
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
		</tbody>
	</table>
	<br /><br /><br />
	{/if}
</div>