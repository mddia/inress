<div id="main">
	<h6>Membres / Administration / Routage du magazine</h6>
	<br /><hr /><br />


	<h1>Routage du magazine</h1><br />

	Module destiné à sélectionner les personnes qui ont reçu le dernier magazine par le routage. 
	<br /><br />
	<div id="boardContent">
		<h3>Historique des routages</h3>
		<br />
		Magazine routé : 
		<select name="numero" id="numero">
			<option value="0">Choisir</option>
			{foreach from=$magazines item='magazine'}
				<option value="{$magazine.numero}" onClick="updateSelectAboId({$magazine.aboId})">{$magazine.abo} n°{$magazine.numero}</option>
			{/foreach}
		</select><br />
		<input type="hidden" id="aboId" name="aboId" value="0" />
		<br />
		<input type="button" value="Exporter abonnés routés" style="cursor: pointer;" onClick="getRootHistory(0);" /> 
		<input type="button" value="Exporter gratuits routés" style="cursor: pointer;" onClick="getRootHistory(1);" /> 
		<br /><br />
		
		<h3>Routage(s) à venir :</h3>	
		<br />
		<table cellspacing="1" style="width:650px; margin-top: 10px; text-align: center;">
			<thead>
				<tr>
					<th style="width: 250px; text-align: center;">Abonnement</th>
					<th style="width: 80px; text-align: center;">Numéro</th>
					<th style="width: 200px;">Destinataires</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				{foreach from=$routage.unroot item='root'}
					<tr class="{cycle values='row1, row2'}">
						<td><strong>{$root.abo}</strong></td>
						<td>{$root.numero}</td>
						<td><strong>{$root.myPayants.count} abonnés</strong><br /><i>(+ {$root.myGratuits.count} gratuits)</i></td>
						<td>
							<a target="_blank" href="admin.php?cat=query&scat=exportMy&aboId={$root.aboId}&numero={$root.numero}">
								<img src="images/icons/user_go.png" alt="Exporter abonnés" title="Exporter abonnés" /></a> 
							<a target="_blank" href="admin.php?cat=query&scat=exportMyGratuits&aboId={$root.aboId}&numero={$root.numero}">
								<img src="images/icons/award_star_gold_1.png" alt="Exporter Gratuits" title="Exporter Gratuits" /></a> 
							<a target="_blank" href="admin.php?cat=query&scat=exportMySQL&aboId={$root.aboId}&numero={$root.numero}">
								<img src="images/icons/database_go.png" alt="Exporter SQL" title="Exporter SQL" /></a>
						</td>
					</tr>
				{/foreach}
			</tbody>
		</table>
		<br /><br /><br />		
	</div>
</div>