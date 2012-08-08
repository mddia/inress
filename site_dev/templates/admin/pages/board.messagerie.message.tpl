<div id="main">
	<h6>Messagerie / Boite de réception / Message n°{$message.id}</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie</h1><br />


	Fiches descriptives des différents messages.
	<br /><br />
	<h3>Message n°{$message.id}</h3><br />

	<table cellspacing="1" style="max-width:850px;">
		<thead>
		<tr>
			<th style="width:275px;"><strong>Détails</strong> </th>
			<th style="width:575px;"><strong>Message</strong> </th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td valign="top">
					<strong style="font-size:14px;">Expéditeur :</strong><br /><br /><br />
				
					<a href="admin.php?cat=membres&scat=membres&id={$message.idemail}">
						<strong style="font-size:13px;" >
							<font style="text-transform:capitalize;">{$message.firstName}</font> 
							<font style="text-transform:uppercase;">{$message.name}</font>
						</strong>
					</a>
					<br /><br />
					Email : 
					<a href="admin.php?cat=membres&scat=membres&id={$message.idemail}">
						<strong>{$message.email}</strong>
					</a>
					<br />
					<!--Localisation : <br />
					Téléphones : <br />-->
					Compte/Password : 
					<font color="green">Actif (???)</font>
					<!--<font color="red">Non-créé</font>-->
					{if ($message.myinrees == 1)}
						<br /><br />
						<font color="blue"><strong>Abonné INREES</strong></font>
					{/if}
					{if ($message.otherMessagesCount != 0)}
						<br /><br /><br />
						Nous a contacté : <strong>{$message.otherMessagesCount} fois</strong>
						<br />
						Autres messages : 
						<!-- Boucle -->
						{foreach from=$message.otherMessages item='otherMessage'}
							<a href="admin.php?cat=messagerie&scat=message&id={$otherMessage.id}"><strong>N°{$otherMessage.id}</strong></a>,
						{/foreach}
					{/if}
					<!--
					<br /><br /><strong style="color:orange;">PRESSE</strong><br /><br />-->
					<br /><br />
					Libellés : 
					<br />
					<div id="labelZone{$message.id}">
						{foreach from=$message.labels item='label'}
							<div class="label" style="background-color: #{$label.background}; color: #{$label.color};" id="label-{$message.id}-{$label.id}">
								{$label.name} 
								<a style="cursor: pointer;" onClick="removeLabel({$label.id}, {$message.id});">
									<img src="http://admin.inrees.com/adm/images/icon_delete.gif" alt="X" style="margin-bottom: -1px; width: 12px; height: 12px;" />
								</a>
							</div>
						{/foreach}
					</div>
					
					<!--<br /><br /><font style="color:magenta;">A déjà été orienté<br />par un professionnel de santé</font><br /><br />
					
					<br /><br />
					
					<img style="max-width:150px; max-height:150px; position:absolute;" src="http://admin.inrees.com/adm/photos/'.$photomembre.'" />-->
					<br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
				</td>
				<td valign="top">
					<strong style="font-size:14px;">Sujet : <span id="messageTopic">{if ($message.tem == 0)}{$message.objet}{else}Témoignage{/if}</span></strong>
					<br /><br />
					Reçu le : {$message.timestamp|date_format:$config.date}<br />
					Status : <strong>{if ($answersCount == 0)}Sans réponse (depuis {$message.passedTime} jours){elseif ($answersCount == 1)}Déjà répondu (1 réponse){else}Déjà répondu ({$answersCount} réponses){/if}</strong><br />
					<br />
					<div style="border: 1px solid #CCCCCC; padding: 5px;">
						<select>
							<option style="font-style: italic;">Transmettre à</option>
							{foreach from=$labels item='label'}
								<option onClick="addLabel({$label.id}, {$message.id});">{$label.name}</option>
							{/foreach}
						</select>
						<span id="testimonyLink"><strong>{if ($message.tem == 0)} | <a onClick="displayTestimony({$message.id})" style="cursor: pointer;" />Témoignage</a>{/if}</strong></span>{if ($message.labelsCount != '0')} | <a onClick="deleteMessage({$message.id})">Supprimer</a>{/if}
					</div>
					<br />
					<hr />
					<br />					
					{$message.message}<br />
					<br />
					<br />
					<strong>{$message.firstName} {$message.name}</strong><br />
					<br />
					<hr />
					<br />
					<form action="actions.php" method="post" {if ($message.tem == 0)}style="display: none;"{/if} id="testimonyForm" >
						<input type="hidden" name="formName" value="updateTestimony" />
						<input type="hidden" name="messageId" value="{$message.id}" />
						<table>
							<tr>
								<td align="right" style="font-size:11px;" valign="top">Note du témoignage :</td>
								<td style="font-size:11px;">
									<select style="width:175px;" name="note" size="1">
										<option {if ($message.teminterest == '0')}selected="selected"{/if} value="0">
											0 - Non défini
										</option>
										<option {if ($message.teminterest == '1')}selected="selected"{/if} value="1">
											1 - Pas intéressant !
										</option>
										<option {if ($message.teminterest == '2')}selected="selected"{/if} value="2">
											2 - Assez intéressant...
										</option>
										<option {if ($message.teminterest == '3')}selected="selected"{/if} value="3">
											3 - Très intéressant !
										</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align="right" style="font-size:11px;" valign="top">Tags :</td>
								<td style="font-size:11px;">
									{include file='modules/tags.input.tpl'}
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right"></td>
								<td style="font-size:11px;">
									{foreach from=$message.tags item='tag'}
										<div id="tag{$tag.id}" class="tagDiv" style="padding: 6px; border: 1px solid rgb(102, 102, 102); background-color: rgb(238, 238, 238); border-radius: 5px 5px 5px 5px; min-width: 40px; margin: 2px; text-align: center; float: left; overflow: hidden;">
											<div>{$tag.name}</div>
											<div class="tagIconDiv">
												<a onclick="removeTagFromMessage({$message.id}, {$tag.id});">
													<img style="margin-bottom: -4px;" alt="[X]" src="http://admin.inrees.com/adm/images/icon_annuler.gif">
												</a>
											</div>
										</div>
									{/foreach}
									{include file='modules/tags.display.tpl'}
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right">Témoignage déjà utilisé :</td>
								<td style="font-size:11px;">
									<select style="width:175px;" name="used" size="1">
										<option {if ($message.temut == '0')}selected="selected"{/if} value="0">Non</option>
										<option {if ($message.temut == '1')}selected="selected"{/if} value="1">Oui</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" align="right"></td>
								<td style="font-size:11px;">
									<input style="width:175px;" name="usedfor" type="text" value="{$message.temutprq}" maxlength="255"/><br />
									<em>(Précisez où ce témoignage a été utilisé)</em>
								</td>
							</tr>
							<tr>
								<td style="font-size:11px;" style="text-align:right;"></td>
								<td style="font-size:11px;" style="text-align:left;"></td>
							</tr>
							<tr>
								<td style="font-size:11px;" style="text-align:right;">
									<div style="text-align:right;">
										<input class="button2" type="submit" id="action_online" name="action_online" value="Valider" />
									</div>
								</td>
								<td style="font-size:11px;" style="text-align:left;">
									<a onClick="unsetTestimony({$message.id});">
										<strong>Annuler le témoignage</strong>
									</a>
								</td>
							</tr>
						</table>
						<br /><br />
					</form>
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	{if ($answersCount != 0)}
		<h3>Réponses :</h3><br />	
		{foreach from=$answers item='answer'}
			<table cellspacing="1" style="width:850px;">
				<thead>
					<tr>
						<th style="width:275px;"><strong>Détails</strong> </th>
						<th style="width:575px;"><strong>Message</strong> </th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td valign="top">
							<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
							<strong style="font-size:13px;"><font style="text-transform:capitalize;">{$answer.moderateur.firstName}</font> 
							<font style="text-transform:uppercase;">{$answer.moderateur.name}</font></strong>
							<br /><br />
							Email : {$answer.moderateur.email}</a>
							<br /><br />
							{$answer.moderateur.responsabilites}<br />
							INREES<br />
							www.inrees.com
							<br /><br /><br /><br />
						</td>
						<td valign="top">
							<strong style="font-size:14px;">Sujet : Réponse à "{$answer.objet}"</strong>
							<br /><br />
							Envoyé le : {$answer.timestamp|date_format:$config.date}<br />
							À : {$message.firstName} {$message.name} ({$message.email})<br />
							<br /><hr /><br />
							{$answer.message}<br />
							<br />
							<br />
							{$answer.moderateur.firstName} {$answer.moderateur.name}<br />
							{$answer.moderateur.responsabilites}<br />
							INREES<br />
							www.inrees.com<br />
							<br /><hr /><br />
							<br /><br />
						</td>
					</tr>
				</tbody>
			</table>
			<br /><br />
		{/foreach}
	{/if}
	<!-- FORMULAIRES DE REPONSE -->
	{if ($reponse == 0)}
		<br />
		<a class="buttonplus" href="admin.php?cat=messagerie&scat=message&id={$message.id}&reponse=1#rep">
			Répondre au message
		</a>
	{elseif ($reponse == 1)}
		<a id="rep"></a>
		<h3>Réponse</h3><br />
		<table cellspacing="1" style="width:850px;">
			<thead>
				<tr>
					<th style="width:275px;"><strong>Détails</strong> </th>
					<th style="width:575px;"><strong>Message</strong> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td valign="top">
						<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
						<strong style="font-size:13px;"><font style="text-transform:capitalize;">{$SESSION.moderateur.firstName}</font> 
						<font style="text-transform:uppercase;">{$SESSION.moderateur.name}</font></strong>
						<br /><br />
						Email : {$SESSION.moderateur.email}</a>
						<br /><br />
						{$SESSION.moderateur.responsabilites} Web<br />
						INREES<br />
						www.inrees.com
						<br /><br /><br /><br />
					</td>
					<td valign="top">
						<strong style="font-size:14px;">Sujet : Réponse à "{$message.objet}"</strong>
						<br /><br />
						Envoyé à : {$message.email}<br />
						<br /><hr /><br />
							<form action="admin.php?cat=messagerie&scat=message&id={$message.id}&reponse=2#rep" method="post">
								<textarea style="width:500px;height:250px;" name="message" value=""></textarea>
							
								<br /><br />
								<!--<input style="width:15px;" name="pseudoactif" type="checkbox" /> <em>Cochez cette case pour utiliser votre pseudo</em>
								<br /><br />-->
								<font style="font-size:13px;"><font style="text-transform:capitalize;">{$SESSION.moderateur.firstName}</font> 
								<font style="text-transform:uppercase;">{$SESSION.moderateur.name}</font>
								<br />
								{$SESSION.moderateur.responsabilites}<br />
								INREES<br />
								www.inrees.com
								</font>
								<br /><br /><hr /><br />
								<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Prévisualiser votre message" />
							</form>
						<br /><br />
					</td>
				</tr>
			</tbody>
		</table>
	{elseif ($reponse == 2)}
		<a id="rep"></a>
		<h3>Nouvelle réponse</h3><br />
		<table cellspacing="1" style="width:850px;">
			<thead>
				<tr>
					<th style="width:275px;"><strong>Détails</strong> </th>
					<th style="width:575px;"><strong>Message</strong> </th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td valign="top">
						<strong style="font-size:14px;">Réponse :</strong><br /><br /><br />
						<strong style="font-size:13px;"><font style="text-transform:capitalize;">{$SESSION.moderateur.firstName}</font> 
						<font style="text-transform:uppercase;">{$SESSION.moderateur.name}</font></strong>
						<br /><br />
						Email : {$SESSION.moderateur.email}</a>
						<br /><br />
						{$SESSION.moderateur.responsabilites}<br />
						INREES<br />
						www.inrees.com
						<br /><br /><br /><br />
					</td>
					<td valign="top">
						<strong style="font-size:14px;">Sujet : Réponse à "{$message.objet}"</strong>
						<br /><br />
						Envoyé à : {$message.firstName} {$message.name} ({$message.email})<br />
						<br /><hr /><br />
						<form action="actions.php?" method="post">
							{$POST.message}
							<br /><br /><hr /><br />
							<input type="hidden" name="message" value="{$POST.message}" />
							<input type="hidden" name="messageId" value="{$message.id}" />
							<input type="hidden" name="formName" value="sendAnswer" />
							<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Envoyer le message" />
							<br /><br />
						</form>
					</td>
				</tr>
			</tbody>
		</table>
	{/if}
	<br />
	<br />
</div>