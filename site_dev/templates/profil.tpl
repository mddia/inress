{include file='inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		{include file='inc.css.tpl'}
		{include file='inc.javascript.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Mon profil - {$TITLE}</title>
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
				</div>   <!--// _id body-->
				<!-- / MENU -->
				<div class="home" style="min-height: 600px;">
					<div class="repererb"></div>
					<div class="magThemes" style="margin-bottom:15px;">
					</div>
					<div class="mbig" style="background-color: ;">
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Vos adresses</h1>
						</div>
						<div style="margin-top: 30px;" id="addressesList">
							{foreach from=$addresses|@orderby:"-defaultAddress" item='address'}
								- {$address.firstName} {$address.name} : {$address.address1} {if ($address.defaultAddress) == 1}<span style="font-weight: bold;">(Adresse par défaut)</span>{else}<a onClick="setDefault({$address.id});">[setDefault]</a>{/if}<br />
							{/foreach}
						</div>
						<div style="margin-top: 30px; padding: 10px; background-color: #EEEEEE;">
							Ajouter une adresse :<br />
							<br />
							<label>Prénom : </label><input type="text" name="addressFirstName" id="addressFirstName" /><br />
							<label>Nom : </label><input type="text" name="addressName" id="addressName" /><br />
							<label>Addresse : </label><input type="text" name="address1" id="address1" /><br />
							<label>Addresse 2 : </label><input type="text" name="address2" id="address2" /><br />
							<label>Addresse 3 : </label><input type="text" name="address3" id="address3" /><br />
							<label>City : </label><input type="text" name="addressCity" id="addressCity" /><br />
							<label>zipCode : </label><input type="text" name="addressZipCode" id="addressZipCode" /><br />
							<label>country : </label><input type="text" name="addressCountry" id="addressCountry" /><br />
							<br />
							<input type="button" value="Ajouter" onClick="addAddress();" /><br />
							<br />
						</div>
					</div>
					<div class="mbonus">
						
					</div>
				</div>
			</div>
		</div>
	</body>
</html>