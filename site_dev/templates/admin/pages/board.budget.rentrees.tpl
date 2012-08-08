<div id="main">
	<h6>Membres / Administration / Liste de toutes les Rentrees</h6>
	<br /><hr /><br />


	<h1>Liste de toutes les Rentrees</h1><br />
	
	<h3>Liste des rentrees</h3><br />

	<table cellspacing="1" style="width:100%;">
		<thead>
		<tr>
			<th style="width:30px;"><strong>id</strong></th>
			<th style="width:105px;"><strong>Date</strong></th>
			<th style="width:105px;"><strong>Encaiss</strong></th>
			<th style="width:90px;"><strong>Prix</strong></th>
			<th><strong>Description</strong></th>
			<th style="width:75px;"><strong>Edit</strong></th>
		</tr>
		</thead>
		<tbody>
			{foreach from=$rentrees item='rentree'}
				<tr>
					<td>{$rentree.id}</td>
					<td>{$rentree.timestamp|date_format:$config.date}</td>
					<td>{$rentree.encaiss|date_format:$config.date}</td>
					<td>{$rentree.prix}</td>
					<td>{$rentree.titre}</td>
					<td>
						<a href="admin.php?cat=budget&scat=rentree&id={$rentree.id}">
							<img width="14px" height="14px" src="http://admin.inrees.com/adm/images/iconEdit.gif" />
						</a>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br /><br />


	<!--<table style="margin-left:430px;width:125px;">
		<thead>
		<tr>
			<th style="width:90px;">Total</th>
		</tr>
		</thead>
		<tbody>
		<tr class="row2">
			<td align="right"><?php echo '<strong>'.substr($prixtotal,0,-2).'.'.substr($prixtotal,-2,2).'€</strong>' ; ?> (BUG)</td>
		</tr>
	</table>-->
	<br /><br /><br />


</div>