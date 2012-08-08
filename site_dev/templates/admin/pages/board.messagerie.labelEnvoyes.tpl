<div id="main">
	<h6>Messagerie / Messages envoyés</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie : {$thisLabel.name}</h1><br />


	Liste de <strong>toutes les réponses envoyés</strong> du label <strong>{$thisLabel.name}</strong>.

	<br /><br />

	<h3>Boite de réception - {$answerMessagesCount} {if ($displayType == 'last')}derniers {/if}messages envoyés</h3><br />


	<table cellspacing="1" style="width:875px;">
		<thead>
		<tr>
			<th style="width:50px;">
				<strong>ID</strong> 
				<a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&orderby=id&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:350px;">
				<strong>Titre</strong> 
				<a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&orderby=name&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:225px;">
				<strong>Destinataire</strong> 
				<a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&orderby=dest&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:180px;">
				<strong>Réponse</strong> 
				<a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&orderby=rep&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
			<th style="width:70px;">
				<strong>Date</strong> 
				<a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&orderby=date&limit=1">
					<img src="http://admin.inrees.com/adm/images/arrow_white_trans.gif" width="7" height="13" />
				</a>
			</th>
		</tr>
		</thead>
		<tbody>
			{if ($answerMessagesCount != '0')}
				{foreach from=$answerMessages item='message'}
					<tr class="row10green">
						<td>{$message.id}</td>
						<td>
							<a href="admin.php?cat=messagerie&scat=message&id={$message.messageId}">
								<strong>{$message.objet}</strong><br />
							</a>
						</td>
						<td>
							{$message.firstName} {$message.name}<br />
						</td>
						<td>
							<strong>{$message.moderateur.firstName} {$message.moderateur.name}</strong><br />
						</td>
						<td>{$message.timestamp|date_format:$config.date}</td>
					</tr>
				{/foreach}
			{/if}
			{if ($displayType == 'all')}
				<tr>
					<td colspan="5">
						<center><a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}"> >>> REDUIRE L'AFFICHAGE <<< </center>
					</td>
				</tr>
			{elseif ($displayType == 'last')}
				<tr>
					<td colspan="5">
						<center><a href="admin.php?cat=messagerie&scat=labelEnvoyes&id={$thisLabel.name}&limit=1"> >>> AFFICHER TOUS LES MESSAGES <<< </center>
					</td>
				</tr>
			{/if}
		</tbody>
	</table>
	<br /><br /><br />
</div>