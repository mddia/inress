<div id="main">
	<h6>Membres / Liste des membres / <?php echo $id ; ?></h6>
	<br /><hr /><br />

	<h1>Fusionner deux comptes INREES</h1><br />

	Module pour fusionner deux comptes INREES.
	<br /><br />
	<form method="post" action="admin.php?cat=membres&scat=fusionInfos">
		<input type="hidden" name="userToDelete" value="{$user.id}" />
		<fieldset>
			<legend>Données à remplir</legend>
		
			<table><tr><td style="width: 80px;"></td><td>
				<strong><font class="red">Etes-vous certain de vouloir fusionner ces deux comptes ?</font></strong>
				<br /><br />
				<strong><font style="font-size:14px;">Compte à supprimer :</font></strong><br /><br />
				<span style="font-size: 12px; margin-left: 20px;"><strong>{$user.id}</strong> - <span style="text-transform: uppercase;">{$user.nom}</span> {$user.prenom}</span>
				<br /><br /><br />
				<strong><font style="font-size:14px;">Compte à garder :</font></strong> 
				<span id="userNameInput">
					<input type="text" name="userName" id="userName" style="border: 0px; background-color: transparent; border-bottom: 2px solid #536482;" onKeyUp="findFusionUser()" autocomplete="off" />
				</span>
				<input type="hidden" name="userToKeep" id="fusionUserId" value="0" /><br /><br />
				<span style="font-size: 12px; margin-left: 20px;" id="userNameDisplay"></span>
				<br /><br /><br />
				</td></tr>
				<tr>
					<td></td>
					<td align="left">
						<input class="button2 bigbutton" type="submit" id="action_online" name="action_online" value="Valider" />
					</td>
				</tr>
			</table>
		</fieldset>
	</form>

	<br /><br /><br />
</div>