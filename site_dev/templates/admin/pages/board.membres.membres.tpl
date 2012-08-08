<div id="main">

	<h6>Membres / Liste des membres / {$user.id}</h6>
	<br /><hr /><br />


	<h1 {if ($user.myinreesgratuit == 1)}style="color:green;"{/if}><font style="text-transform:uppercase;">{$user.nom}</font> {$user.prenom} ({$user.id} ---> {$user.email})</h1><br />


	Editer un membre de l'INREES.
	<br /><br />

	<form>
		<fieldset>
			<legend>Données à remplir</legend>

			<table style="width:675px;">
				<tr><td style="text-align:right;"></td><td style="text-align:left;">
				<a href="admin.php?cat=membres&scat=membres&id={$user.id}"><strong>Infos</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id={$user.id}&details=adresses"><strong>Adresses</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id={$user.id}&details=my"><strong>Abonnement</strong></a> |
				<a href="admin.php?cat=membres&scat=membres&id={$user.id}&details=routage">Routage</a> |
				<a href="admin.php?cat=membres&scat=membres&id={$user.id}&details=operations"><strong>Opérations</strong></a>
				</td></tr>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				
				<!-- SI DETAILS NON DEFINIS -->
				{if ($GET.details == '0')}
					{if ($user.email == '0')}
						<tr>
							<td style="text-align:right;">Email :</td>
							<td style="text-align:left;">
							<input style="width:250px;" name="email" type="hidden" value="{$user.email}" />
							{if ($user.noemail == 1)}
								<strong>Ce membre n'a pas d'email</strong><br />
								<a href="admin.php?cat=membres&scat=emailChange&id={$user.id}">Changer cet email</a>
							{/if}
							</td>
						</tr>
					{else}
						<tr>
							<td style="text-align:right;">Email :</td>
							<td style="text-align:left;">
							{if ($user.clef == 1)}
								<strong>{$user.email} - <font style="color:red;">COMPTE ACTIF</font></strong><br />
								<em style="color:red;">Merci de faire attention avant de modifier ou supprimer des données</em><br />
								<a href="admin.php?cat=membres&scat=emailChange&id={$user.id}">Changer cet email</a>
								<input style="width:250px;" name="email" type="hidden" value="{$user.email}" />
							{else}
								<input style="width:250px;" name="email" type="text" value="{$user.email}" />
							{/if}
							</td>
						</tr>
					{/if}
					<tr>
						<td style="text-align:right;">Password :</td><td style="text-align:left;">
							<strong>
								{if ($user.clef == 0)}
									non-créé
								{elseif ($user.clef == 1)}
									déjà créé
								{/if}
							</strong> 
							<a href="javascript:clePassMY('.{$user.id}.')" title="Réinitialiser ce compte">
								<img src="http://admin.inrees.com/adm/images/icon_remb.gif" width="14px" height="14px" />
							</a>
							(bouton valid compte non abouti)
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>			
					<tr>
						<td style="text-align:right;">Civilité :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="civilite" size="1">
									<option value=""></option>
									<option {if ($user.civilite == 'Monsieur')}selected="selected"{/if} value="Monsieur">Monsieur</option>
									<option {if ($user.civilite == 'Madame')}selected="selected"{/if} value="Madame">Madame</option>
									<option {if ($user.civilite == 'Mademoiselle')}selected="selected"{/if} value="Mademoiselle">Mademoiselle</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Nom :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="nom" type="text" value="{$user.nom}" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Prénom :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="prenom" type="text" value="{$user.prenom}" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">
							<font style="color:red;">Société :</font>
						</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="societe" type="text" value="{$user.societe}" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td style="text-align:right;">Téléphone fixe :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="telfix" type="text" value="{$user.telfix}" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Téléphone portable :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="telephone" type="text" value="{$user.telephone}" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Informations sur le mobile ?</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="mobileOK" size="1">
								<option {if ($user.mobileOK == '1')}selected="selected"{/if} value="1">Oui</option>
								<option {if ($user.mobileOK == '0')}selected="selected"{/if} value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					
					<tr>
						<td style="text-align:right;">Bénévole ?</td><td style="text-align:left;">
							<select style="width:175px;" name="ben" size="1">
								<option {if ($user.mben == '1')}selected="selected"{/if} value="1">Oui, actif</option>
								<option {if ($user.mben == '2')}selected="selected"{/if} value="2">Oui, en attente</option>
								<option {if ($user.mben == '0')}selected="selected"{/if} value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Bénévole (description) :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="mbendesc" type="text" value="{$user.mbendesc}" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					
					
					<tr>
						<td style="text-align:right;"><strong>RP ou VIP :</strong></td>
						<td style="text-align:left;">
							<select style="width:175px;" name="vip" size="1">
								<option {if ($user.vip == '1')}selected="selected"{/if} value="1">Oui</option>
								<option {if ($user.vip != '1')}selected="selected"{/if} value="0">Non</option>
							</select> 
							<a href="admin.php?cat=membres&scat=ajoutGratuit&emailget={$user.email}">Transformer en abonné gratuit</a>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Presse :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="PRESSE" size="1">
								<option {if ($user.vippresse == '1')}selected="selected"{/if} value="1">Oui</option>
								<option {if ($user.vippresse != '1')}selected="selected"{/if} value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>			
					
					<tr>
						<td style="text-align:right;">Liaison partner :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="newpartner" size="1">
								<option value="0" selected="selected">===== NO PARTNER =====</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Contact bureau (Tél.) :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="contactbureau" type="text" value="" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Fonction bureau :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="fonctionbureau" type="text" value="" />
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td align="right">Remarques :</td>
						<td align="left">
							<textarea style="width:250px;" name="remarques" type="text">{$user.remarques}</textarea><br />
							<em>(non-visible par l'utilisateur)</em>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr>
						<td style="text-align:right;">Profession (secteur) :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="professions" id="theme" size="1">
								<option {if ($user.professions == '0')}selected="selected"{/if} value="0">=== inconnu ===</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Profession :</td>
						<td style="text-align:left;">
							<input style="width:250px;" name="profession" type="text" value="{$user.profession}" />
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Date de naissance :</td>
						<td style="text-align:left;">
							{$user.datenaissance|date_format:$config.date}
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>	
		
					<tr>
						<td style="text-align:right;">Découvert :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="decouvert" id="theme" size="1">
								<option selected="selected" value="0">=== inconnu ===</option>
							</select>
						</td>
					</tr>
					<tr>
						<td style="text-align:right;">Pourquoi :</td>
						<td style="text-align:left;">
							<textarea style="width:250px;" name="pourquoi" type="text">{$user.pourquoi}</textarea>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
					<tr>
						<td style="text-align:right;">Avez-vous vécu une expérience :</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="experiences" size="1">
								<option {if ($user.experiences == '1')}selected="selected"{/if} value="1">Oui</option>
								<option {if ($user.experiences == '0')}selected="selected"{/if} value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
		
					<tr>
						<td style="text-align:right;">Sites web :</td>
						<td style="text-align:left;">
						
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>

					<tr>
						<td style="text-align:right;">Etes-vous présent sur Twitter ?</td>
						<td style="text-align:left;">
							<select style="width:175px;" name="facebook" size="1">
								<option {if ($user.twitter == '1')}selected="selected"{/if} value="1">Oui</option>
								<option {if ($user.twitter == '0')}selected="selected"{/if} value="0">Non</option>
							</select>
						</td>
					</tr>
					<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				{elseif ($GET.details == 'adresses')}
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Adresse(s)</th>
								<th>Informations</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$user.addresses item='address'}
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
									<td style="text-align: center;">
										{if ($address.default == '1')}
											<strong>Adresse par défaut</strong><br />
										{/if}
									</td>
									<td style="text-align: center;">
										{if ($address.default == '0')}
											<a onClick="setAddressAsDefault({$address.id});">
												<img src="images/icons/award_star_gold_1.png" alt="Définir comme adresse par défaut" title="Définir comme adresse par défaut" /></a>
										{/if}
										<a onClick="deleteAddress({$address.id});">
											<img src="images/icons/bin_closed.png" alt="Supprimer l'adresse" title="Supprimer l'adresse" /></a>
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px; border-bottom: 0px;">
						<thead>
							<tr>
								<th>Ajouter une adresse</th>
							</tr>
						</thead>
					</table>
					<table cellspacing="1" style="width:675px; border-top: 0px;">
						<tbody>
							<tr>
								<td><strong>Nom</strong></td>
								<td><input type="text" name="name" id="name" value="{$user.nom}" /></td>
							</tr>
							<tr>
								<td><strong>Prénom</strong></td>
								<td><input type="text" name="firstName" id="firstName" value="{$user.prenom}" /></td>
							</tr>
							<tr>
								<td><strong>Adresse 1</strong></td>
								<td><input type="text" name="address1" id="address1" /></td>
							</tr>
							<tr>
								<td><strong>Adresse 2</strong></td>
								<td><input type="text" name="address2" id="address12" /></td>
							</tr>
							<tr>
								<td><strong>Ville</strong></td>
								<td><input type="text" name="city" id="city" /></td>
							</tr>
							<tr>
								<td><strong>Code postale</strong></td>
								<td><input type="text" name="zipCode" id="zipCode" /></td>
							</tr>
							<tr>
								<td><strong>Pays</strong></td>
								<td>
									<select name="country" id="country" style="width: 160px;">
										{foreach from=$countries item='country'}
											<option value="{$country.id}" {if ($country.id == 61)}selected{/if} onClick="{if ($country.id == 172)}displayStates();{else}hideStates(){/if}">{$country.name}</option>
										{/foreach}
									</select>
								</td>
							</tr>
							<tr>
								<td><strong id="statesLabel" style="display: none;">État</strong></td>
								<td>
									<select name="state" id="state" style="width: 160px; display: none;">
										{foreach from=$states item='state'}
											<option value="{$state.id}">{$state.name}</option>
										{/foreach}
									</select>
								</td>
							</tr>
							<tr>
								<td></td>
								<td><input type="button" style="cursor: pointer;" value="Enregistrer l'adresse" onClick="recordUserAddress({$user.id})" /></td>
							</tr>
						</tbody>
					</table>
				{elseif ($GET.details == 'my')}
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Abonnement(s) en cours</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$user.abonnements item='abo'}
								{if ($abo.actual == 1)}
									<tr class="{cycle values='row1, row2'}">
										<td>
											<strong>
											{$abo.title}<br />
											</strong>
												n°{$abo.startMag} au n°{$abo.maxMag}
											<div style="float: right; text-align: center; margin-top: -12px; margin-right: 5px;">
												{if ($abo.isGift != 0)}
													<img src="images/icons/gift.png" alt="Abo cadeau" title="Cet abonnement est un cadeau" style="margin-bottom: -3px;" /><br />
												{/if}
												{if ($abo.subLimit != 0)}
													<font color="blue" style="font-size:9px; font-weight:bold; cursor: default;" title="Avantages My INREES jusqu'au {$abo.subLimit|date_format:$config.date}">+My</font>
												{/if}
											</div>
										</td>
									</tr>
								{/if}
							{/foreach}
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Abonnement(s)</th>
								<th>Adresse(s) d'envoi</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$user.abonnements item='abo'}
								<tr class="{cycle values='row1, row2'}">
									<td>
										<strong>
											{$abo.title}<br />
										</strong>
										n°{$abo.startMag} au n°{$abo.maxMag} 
										{if ($abo.isGift != 0)}
											<img src="images/icons/gift.png" alt="Abo cadeau" title="Cet abonnement est un cadeau" style="margin-bottom: -3px;" /> 
										{/if}
										{if ($abo.subLimit != 0)}
											<font color="blue" style="font-size:9px; font-weight:bold; cursor: default;" title="Avantages My INREES jusqu'au {$abo.subLimit|date_format:$config.date}">+My</font>
										{/if}
									</td>
									<td>
										<strong>
										{$abo.address.firstName} {$abo.address.name}
										</strong><br />
										{$abo.address.address1}<br />
										{$abo.address.zipCode} {$abo.address.city}<br />
										<strong>{$abo.address.country.name}</strong>
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Magazines reçus</th>
							</tr>
						</thead>
						<tbody>
							{foreach from=$user.receivedMags item='mag'}
								{if ($abo.actual == 1)}
									<tr class="{cycle values='row1, row2'}">
										<td>
											<strong>{$mag.aboTitle}</strong><br />
											Mag n°{$mag.numero}
										</td>
									</tr>
								{/if}
							{/foreach}
						</tbody>
					</table>
				{elseif ($GET.details == 'routage')}
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<tr>
							<td style="text-align:right;">Newsletter actif</td>
							<td style="text-align:left;">
								<select style="width:175px;" name="newsletteractif" id="newsletteractif" size="1">
									<option {if ($user.actif == 1)}selected="selected"{/if} value="1">Oui</option>
									<option {if ($user.actif == 0)}selected="selected"{/if} value="0">Non</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;">Newsletter fréquence</td>
							<td style="text-align:left;">
								<select style="width:175px;" name="frequence" id="frequence" size="1">
									<option {if ($user.frequence == 1)}selected="selected"{/if} value="1">Mensuel</option>
									<option {if ($user.frequence == 0)}selected="selected"{/if} value="0">Toutes les newsletters</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"></td>
							<td style="text-align:left;"></td>
						</tr>
						<tr>
							<td style="text-align:right;">Routage postaux</td>
							<td style="text-align:left;">
								<select style="width:175px;" id="routage" name="routage" size="1">
									<option {if ($user.actifpost == 1)}selected="selected"{/if} value="1">Oui</option>
									<option {if ($user.actifpost == 0)}selected="selected"{/if} value="0">Non</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="text-align:right;"></td>
							<td style="text-align:left;"><br />
								<input type="button" value="Enregistrer" style="cursor: pointer;" onClick="updateUserRoutage({$user.id})" />
							</td>
						</tr>
					</table>
				{elseif ($GET.details == 'operations')}
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Commandes</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row1">
								<td>
									<i>A effectué {$user.receivedOrders.count} commande(s)</i>
								</td>
							</tr>
							{foreach from=$user.receivedOrders.data item='order'}
								<tr class="{cycle values='row2, row1'}">
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
					<table cellspacing="1" style="width:675px; margin-top: 10px;">
						<thead>
							<tr>
								<th>Messages</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row1">
								<td>
									<i>Nous a contacté {$user.receivedMessages.count} fois</i>
								</td>
							</tr>
							{foreach from=$user.receivedMessages.data item='message'}
								<tr class="{cycle values='row2, row1'}">
									<td>									
										<strong>
											<a href="admin.php?cat=messagerie&scat=message&id={$message.id}">
											[n° {$message.id}]</a></strong> le {$message.timestamp|date_format:$config.date} à  {$message.timestamp|date_format:$config.hours}
									</td>
								</tr>
							{/foreach}
						</tbody>
					</table>
				{/if}				
		</table>
		<br />
			{if ($user.moderateur != 0)}
				<strong>CE COMPTE NE PEUX PAS ETRE SUPPRIMÉ OU FUSIONNÉ (MODÉRATEUR)</strong>
			{else}
				<a class="buttonplusred" href="admin.php?cat=membres&scat=fusion&id={$user.id}">Fusionner les données de ce compte</a>
				<a class="buttonplusred" onClick="deleteUser({$user.id})">Supprimer ce compte</a>
			{/if}
		<br /><br />
		</fieldset>
	</form><br />

	<!--<a class="buttonplusred" href="admin.php?cat=membres&scat=fusion&id={$user.id}">Fusionner les données de ce compte</a>
	<a class="buttonplusred" href="javascript:SupprimerCompteEmail('{$user.id}')">Supprimer ce compte</a>-->
	<br /><br /><br />
</div>