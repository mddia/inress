<div id="main">
	<h6>Messagerie / Index</h6>
	<br /><hr /><br />

	<img style="margin-right:75px;" align="right" src="http://admin.inrees.com/adm/images/enveloppe.png" width="100" height="100" />
	<h1>Messagerie de l'INREES</h1><br />

	<h3>Statistiques - <font class="error">{$awaitingMessagesCount} messages en attente</font></h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">DESCRIPTION</th>
				<th style="width:100px;">Messages</th>
			</tr>
		</thead>
		<tbody>
			<!--if($count> 0) "<tr class='row5red'>" else "<tr class='row9green'>"-->
			<tr class='row5red'>
				<td><strong>Boite de réception</strong></td>
				<td><strong>{$awaitingMessagesCount}</strong></td>
			</tr>
			<tr class='row6red'>
				<td>Dernier message en attente depuis...</td>
				<td><?php echo $datecompare ; ?> jour(s)</td>
			</tr>
		</tbody>
	</table>

	<br />

	<h3>Statistiques sur tous les messages reçus</h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">Date</th>
				<th style="width:100px;">Messages</th>
				<th style="width:100px;">MOY. /J</th>
			</tr>
		</thead>
		<tbody>
			<tr class='row2'>
				<td><strong>Aujourd'hui</strong></td>
				<td><strong><?php echo $res11 ; ?></strong></td>
				<td><strong><?php echo $res11 ; ?> m/j</strong></td>
			</tr>
			<tr class='row1'>
				<td>En [$mois] (Ce mois-ci)</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row1'>
				<td>En [$mois-1]</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row1'>
				<td>En [$mois-2]</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
			<tr class='row2'>
				<td><strong>Total depuis 3 mois</strong></td>
				<td><strong>[$count]</strong></td>
				<td><strong>[$average] m/j</strong></td>
			</tr>
			<tr class='row4'>
				<td>Total depuis la création</td>
				<td>[$count]</td>
				<td>[$average] m/j</td>
			</tr>
		</tbody>
	</table>

	<br />

	<h3>Statistiques sur les messages envoyés ces 150 derniers jours</h3><br />

	<table cellspacing="1" style="width:450px;">
		<thead>
			<tr>
				<th style="width:350px;">Modérateurs</th>
				<th style="width:100px;">Messages</th>
				<th style="width:100px;">%</th>
			</tr>
		</thead>
		<tbody>		
			<tr class='row1'>
				<td>
					<strong>[$firstName] [$name]</strong>
				</td>
				<td>
					<strong>[$total]</strong>
				</td>
				<td>
					[$?] %
				</td>
			</tr>
			<tr class='row4'>
				<td>	
					Tous les professionnels de santé
				</td>
				<td>
					[$total]
				</td>
				<td>
					[$?] %
				</td>
			</tr>
		</tbody>
	</table>
</div>