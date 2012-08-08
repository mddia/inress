<div id="main">
	<h6>Boutique / Ajout d'une commande</h6>
	<br /><hr /><br />

	<h1>Ajout d'une commande</h1><br />

	Module destiné à ajouter directement une commande pour un utilisateur.
	<br /><br />
	<div id="boardContent">
		<br /><hr /><br />
		<form action="actions.php" method="POST">
			<input type="hidden" name="formName" value="recordOrderFromAdmin" />
			Facturation à : <span id="userNameDisplay"><input type="text" name="userName" id="userName" style="border: 0px; background-color: transparent; border-bottom: 2px solid #536482;" onKeyUp="findOrderUser()" autocomplete="off" /></span>
			<input type="hidden" name="orderUserId" id="orderUserId" value="0" /><br />
			<br />
			<input type="hidden" name="boxesCount" id="boxesCount" value="1" />
			<table cellspacing="1" style="width: 800px; margin-bottom: 10px;">
				<thead>
					<tr>
						<th style="width:400px;">
							<strong>Contenu de la commande</strong> 
						</th>
						<th>
							<strong>Adresse de livraison</strong>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr class="row1">
						<td style="padding: 10px;">
							<strong>Ajouter un produit :</strong> <input type="text" name="productsField-1" id="productsField-1" onKeyUp="listOrderItems(1);" /><br />
							<br />
							<table>
								<span id="productsList-1"></span>
							</table>
						</td>
						<td>
							Adresse de livraison : <span id="userAddressSelect-1"><i>Veuillez sélectionner un utilisateur</i></span>
						</td>
					</tr>
				</tbody>
				<input type="hidden" name="boxValue-1" id="boxValue-1" value="0" />
			</table>
			<span id="otherAddressesSpan"></span>
			<div style="width: 800px; text-align: right; ">
				<a onClick="addDeliveryBox()" style="padding: 5px; border: 1px solid #CCCCCC; font-weight: bold;">
					Ajouter adresse 
					<img src="images/icons/add.png" alt="Ajouter une nouvelle adresse de destination" title="Ajouter une nouvelle adresse de destination" style="margin-bottom: -3px; margin-left: 5px;" />
				</a>
			</div>
			<table cellspacing="1" style="width: 800px; margin-top: 20px;">
				<tbody>
					<tr class="row1">
						<td style="padding: 5px; text-align: right; font-weight: bold; font-size: 14px;">
							TOTAL DE LA COMMANDE
						</td>
						<td style="text-align: center; width: 150px; font-weight: bold; font-size: 15px;">
							<span id="orderValueSpan">0</span> €
							<input type="hidden" value="0" name="orderValue" id="orderValue" />
						</td>
					</tr>
				</tbody>
			</table>
			<div style="width: 800px; text-align: right; margin-top: 5px" class="hidden" id="submitField">
				<input type="submit" value="Valider commande" style="cursor: pointer;" />
			</div>
		</form>
	</div>
</div>