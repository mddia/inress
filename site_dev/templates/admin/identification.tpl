{include file='../inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{$TITLE} - Accès privé</title>
	</head>
	<body>
		<br />
		<br />
		<center>
			<strong>Accès privé</strong><br />
			<form action="admin.php?cat=identification&scat=check" method="post">
				<table>
					<tr>
						<td align="right">Identifiant : </td>
						<td><input name="email" type="text" value=""></td>
					</tr>
					<tr>
						<td align="right">Password : </td>
						<td><input name="password" type="password" value=""></td>
					</tr>
					<tr>
						<td align="right"></td>
						<td><input name="confirm" type="submit" value="Valider"></td></tr>
				</table>
			</form>
		</center>
	</body>
</html>