<div id="main">
	<a name="maincontent"></a>
	<h6>Messagerie / Options / Gestion des libellés</h6>
	<br /><hr /><br />
	<h1>Gestion des libellés</h1><br />
	
	<h3>Créer un libellé</h3>
	<br />
	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width: 200px;">Nom</th>
				<th style="width: 230px;">Couleur arrière-plan</th>
				<th style="width: 120px;">Couleur texte</th>
				<th style="width: 200px;">Aperçu</th>
				<th style="width: 100px;">Action</th>
			</tr>
		</thead>
		<tbody>
			<tr class="row6red" style="height: 40px;">
				<td style="width: 200px;">
					<input type="text" id="labelName" onkeyup="updatePreviewValue()" style="text-align: center;" maxlength="255" />
				</td>
				<td style="width: 230px;">
					<div onClick="changePreviewBckg('ff0000')" class="colorSquare" style="background-color: #ff0000; border: 1px dotted #536482; margin-left: 20px;"></div>
					<div onClick="changePreviewBckg('008000')" class="colorSquare" style="background-color: #008000; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('ffa500')" class="colorSquare" style="background-color: #ffa500; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('8551a1')" class="colorSquare" style="background-color: #8551a1; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('4b5d9f')" class="colorSquare" style="background-color: #4b5d9f; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('fa794b')" class="colorSquare" style="background-color: #fa794b; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('88e77b')" class="colorSquare" style="background-color: #88e77b; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('5cd1f7')" class="colorSquare" style="background-color: #5cd1f7; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('ffffff')" class="colorSquare" style="background-color: #ffffff; border: 1px dotted #536482;"></div>
					<div onClick="changePreviewBckg('000000')" class="colorSquare" style="background-color: #000000; border: 1px dotted #536482;"></div>
				</td>
				<td style="width: 120px;">
					<div onClick="changePreviewColor('ffffff')" class="colorSquare" style="background-color: #ffffff; border: 1px dotted #536482; margin-left: 40px;"></div>
					<div onClick="changePreviewColor('000000')" class="colorSquare" style="background-color: #000000; border: 1px dotted #536482;"></div>
				</td>
				<td style="width: 200px;">
					<input type="text" id="labelPreview" style="background-color: #FFFFFF; border: 0px dotted #536482; text-align: center; font-weight: bold;" disabled="disabled"></input>
				</td>
				<td style="width: 100px;">
					<input type="hidden" id="labelHiddenName" value="" />
					<input type="hidden" id="labelHiddenBckg" value="FFFFFF" />
					<input type="hidden" id="labelHiddenColor" value="000000" />
					<input type="button" class="confirm" value="Enregistrer" style="cursor: pointer; margin: 5px;" onClick="createLabel();" />
				</td>
			</tr>
		</tbody>
	</table>
	<br />
	
	<h3>Libellés disponibles</h3><br />

	<table cellspacing="1" style="width: 900px; text-align: center;">
		<thead>
			<tr>
				<th style="width:150px;">Libellé</th>
				<th style="width:325px;">Utilisateurs associés</th>
				<th style="width:325px;">Objet associé</th>
				<th style="width:100px;">Actions</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$labels item='label'}
				<tr class='row6red'>
					<td style="color: #{$label.color}; background-color: #{$label.background};"><strong>{$label.name}</strong></td>
					<td>						
						{foreach from=$label.moderateur item='moderateur'}
							<strong>{$moderateur.firstName} {$moderateur.name}</strong> (<a style="cursor: pointer;" onClick="removeUserLink({$label.id}, {$moderateur.id})">supprimer</a>)<br />
						{/foreach}
					</td>
					<td>						
						{foreach from=$label.objet item='objet'}
							<strong>{$objet.titre}</strong> (<a style="cursor: pointer;" onClick="removeTopicLink({$label.id}, {$objet.id})">supprimer</a>)<br />
						{/foreach}						
					</td>
					<td>
						<strong>
							<a onClick="addUserToLabel({$label.id})" style="cursor: pointer;">
								<img src="images/icons/user_add.png" alt="Associer un utilisateur" title="Associer un utilisateur" /></a>
							<a onClick="addTopicToLabel({$label.id})" style="cursor: pointer;">
								<img src="images/icons/tag_blue_add.png" alt="Associer un objet" title="Associer un objet" /></a>
							<a onClick="deleteLabel({$label.id})" style="cursor: pointer;">
								<img src="images/icons/bin_closed.png" alt="Supprimer le libellé" title="Supprimer le libellé" /></a>
						</strong>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
</div>