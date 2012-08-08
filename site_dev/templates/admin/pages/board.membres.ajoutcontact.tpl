<div id="main">
	<h6>Membres / Administration / Ajouter un nouveau membre</h6>
	<br /><hr /><br />



	<h1>Ajouter un nouveau contact</h1><br />


	Inscrivez l'adresse email du nouveau contact de l'INREES, puis validez l'inscription.
	<br /><br />

	<form method="post" action="actions.php">
		<table>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td align="right"><strong>Prénom :</strong></td>
				<td align="left"><input style="width:250px;" name="firstName" type="text" value="" /></td>
			</tr>
			<tr>
				<td align="right"><strong>Nom :</strong></td>
				<td align="left"><input style="width:250px;" name="name" type="text" value="" /></td>
			</tr>
			<tr>
				<td align="right"><strong>Email :</strong></td>
				<td align="left"><input style="width:250px;" name="email" type="text" value="" /></td>
			</tr>
			<tr>
				<td align="right">Presse :</td><td align="left">
					<select style="width:75px;" name="presse" size="1">
						<option value="0" selected="selected">Non</option>
						<option value="1">Oui</option>
					</select>
				</td>
			</tr>
			<tr><td colspan="2"></td></tr>
			<tr><td colspan="2"></td></tr>
			<tr><td colspan="2"></td></tr>
			<tr><td colspan="2"></td></tr>
			<tr>
				<td align="right"></td>
				<td align="left">
					<input type="hidden" name="formName" value="addNewEmail" />
					<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider l'inscription" />
				</td>
			</tr>
		</table>
		<br /><br />
	</form>

	<br /><br /><br />
</div>