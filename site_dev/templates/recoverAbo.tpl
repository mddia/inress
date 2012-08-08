{include file='inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		{include file='inc.css.tpl'}
		{include file='inc.javascript.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>{$TITLE}</title>
	</head>
	<body>
		<!-- Top ToolBar -->
		<div id="toolBar">
			{include file='index.topBar.tpl'}
		</div>
		<div>
			<div class="container">
				<div class="ban">
					{include file='index.navBar.tpl'}
				</div>
			
				<!-- Menu -->
				<div id="_body" style="margin-top: 25px;">
					{include file='index.menu.tpl'}
				</div>
				<!-- / MENU -->
				<div class="home">
					<div class="repererb"></div>
					<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
						<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">
							Inscription à l'INREES
						</h1>
					</div>
					<div style="width: 500px; margin: auto; margin-top: 50px; text-align: center;">
						Merci de terminer votre inscription afin de profiter pleinement des avantages myInrees.
						<div style="min-height: 30px; margin-top: 10px;" id="messageField"></div>
						<table style="margin: auto; text-align: left; margin-top: 10px;">
							<tr>
								<td style="width: 180px;">Civilité</td>
								<td>
									<select name="civility" id="civility" style="border: 1px solid #AFC1CD; color: #5E7990; padding: 2px; width: 142px;">
										<option value="Monsieur">Monsieur</option>
										<option value="Madame">Madame</option>
										<option value="Mademoiselle">Mademoiselle</option>
									</select>	
								</td>
							</tr>
							<tr>
								<td style="width: 180px;">Nom</td>
								<td><input type="text" name="name" id="name" value="{$recover.name}" /></td>
							</tr>
							<tr>
								<td>Prénom</td>
								<td><input type="text" name="firstName" id="firstName" value="{$recover.firstName}" /></td>
							</tr>
							<tr>
								<td>Adresse email</td>
								<td><input type="email" name="email" id="email" value="{$recover.email}" /></td>
							</tr>
							<tr>
								<td>Mot de passe</td>
								<td><input type="password" name="password" id="password" /></td>
							</tr>
							<tr>
								<td>Confirmer mot de passe</td>
								<td><input type="password" name="passwordConfirm" id="passwordConfirm" /></td>
							</tr>
							<tr>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td></td>
								<input type="hidden" name="aboId" id="aboId" value="{$recover.aboId}" />
								<input type="hidden" name="addressId" id="addressId" value="{$recover.addressId}" />
								<td style="text-align: right;">
									<input type="button" value="Enregistrer" onClick="checkRecoverAbo();" />
								</td>
							</tr>
						</table>
					</div>
					<div class="both" style="margin-top:50px;">
						{include file="footer.tpl"}
					</div>
				</div>
			</div>
		</div>
	</body>
</html>