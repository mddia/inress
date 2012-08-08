<div id="main">
	<h6>Magazine / Edition des partenaires / {$partner.nom}</h6>
	<br /><hr /><br />
	<h1>{$partner.nom}</h1><br />

	Editer un partenaire de l'INREES.
	<br /><br />

	<h3>Informations principales / <a href="admin.php?cat=partenaires&scat=partnerCommandBon&id={$partner.id}">Diffusion</a></h3><br />

	<table style="width:875px;">
		<form id="action_online_form" method="post" action="actions.php">
			<thead>
				<tr>
					<th colspan="2">Informations</th>
				</tr>
			</thead>
			<tbody>
				<tr><td style="text-align:right;"></td><td style="text-align:left;"></td></tr>
				<tr>
					<td style="width:275px;text-align:right;"><font style="color:red;">Titre :</font></td><td style="text-align:left;"><input style="width:175px;" name="titre" type="text" maxlength="50" value="{$partner.nom}" /></td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Description :</td><td style="text-align:left;"><input style="width:275px;" name="description" type="text" value="{$partner.desc}" /></td>
				</tr>
				<tr>
					<td style="text-align:right;">Type de partenaire :</td>				
					<td style="text-align:left;">
						<select style="width:175px;" name="descid" size="1">
							<option></option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>

				<tr>
					<td style="text-align:right;">Site :</td>
					<td style="text-align:left;">
						<input style="width:175px;" name="site" type="text" maxlength="255" value="{$partner.site}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse postale :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse" type="text" value="{$partner.adresse}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse 2 :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse2" type="text" value="{$partner.adresse2}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">Adresse 3 :</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="adresse3" type="text" value="{$partner.adresse3}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Code postal :</font>
					</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="postal" type="text" value="{$partner.postal}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Ville :</font>
					</td>
					<td style="text-align:left;">
						<input style="width:375px;" name="ville" type="text" value="{$partner.ville}" />
					</td>
				</tr>
				<tr>
					<td style="width:275px;text-align:right;">
						<font style="color:red;">Pays :</font>
					</td>
					<td style="text-align:left;">
						<select name="pays">
							{foreach from=$countries item='country'}
								<option value="{$country.id}" {if ($country.id == $partner.pays)}selected="selected"{/if}>{$country.name}</option>
							{/foreach}
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;">
						<input class="button2" type="submit" value="Valider" />
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
				<tr>
					<td style="text-align:right;">Actif site :</td>
					<td style="text-align:left;">
						<select style="width:175px;" name="actifsite" size="1">
								<option {if ($partner.actifsite == '1')} selected="selected"{/if} value="1">Oui</option>
								<option {if ($partner.actifsite == '0')} selected="selected"{/if}  value="0">Non</option>
						</select>
					</td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
				<tr>
					<td style="text-align:right;"></td>
					<td style="text-align:left;"></td>
				</tr>
			</tbody>
			<input type="hidden" name="formName" value="updatePartner" />
			<input type="hidden" name="partnerId" value="{$partner.id}" />
		</form>
	</table>


			<br /><br />
			<a class="buttonplus" href="admin.php?cat=partenaires&scat=bonDepot&id={$partner.id}">Créer un bon de commande</a> 
			<!--<a class="buttonplus" target="_blank" href="admin.php?cat=budget&scat=ajoutrentx&id={$partner.id}">Créer une facture</a> -->
	<br /><br />
		
		
	<h3>Personnes à contacter chez {$partner.nom}</h3><br />

	<table cellspacing="1" style="width:720px;">
		<thead>
		<tr>
			<th>Nom / Prénom</th>
			<th>Contact</th>
			<th>edit</th>
		</tr>
		</thead>
	</table>
	<br /><br /><br /><hr /><br />
</div>