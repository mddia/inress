<div id="main">
	<h6>Réseau / Index</h6>
	<br /><hr /><br />

	<h1>Réseau de discussions</h1>
	<br />
	| 
	{foreach from=$threads item='thread' key=i}
		<a class="{if ($i == 0)}bold{/if}" onClick="displayThread({if ($i != 0)}{$thread.id}{else}0{/if})" id="threadLink{if ($i != 0)}{$thread.id}{else}0{/if}">{$thread.topic}</a> | 
	{/foreach}
	<br /><br /><br />
	<input type="hidden" name="displayedThread" id="displayedThread" value="0" />
	{foreach from=$threads item='thread' key=i}
		<div id="thread{if ($i != 0)}{$thread.id}{else}0{/if}" class="{if ($i != 0)}hidden{/if}">
			Répondre :
			<br /><br />
			<form method="POST" action="actions.php">
				<input type="hidden" name="formName" value="addThreadAnswer" />
				<input type="hidden" name="threadId" value="{$thread.id}" />
				<input type="hidden" name="modId" value="{$SESSION.moderateur.id}" />
				<table style="width: 800px; text-align: center;">
					<thead>
						<tr>
							<th>Messages</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<textarea name="message" style="width: 500px; height: 80px;"></textarea>
							</td>
						</tr>
						<tr>
							<td>
								<input type="submit" value="Envoyer" style="cursor: pointer;" />
							</td>
						</tr>
					</tbody>
				</table>
			</form><br /><br />
			<table style="width: 800px;">
				<thead>
					<tr>
						<th>Modérateur</th>
						<th>Messages</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$thread.messages item='message'}
						<tr class="{cycle values='row1, row2'}">
							<td>
								<strong>{$message.moderateur.firstName} {$message.moderateur.name}</strong>
							</td>
							<td>
								{$message.content}
							</td>
							<td>
								Le {$message.timestamp|date_format:$config.date} à {$message.timestamp|date_format:$config.hours}
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
	{/foreach}
</div>