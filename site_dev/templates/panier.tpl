{include file='inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		{include file='inc.css.tpl'}
		{include file='inc.javascript.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Votre panier - {$TITLE}</title>
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
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg'); margin-bottom: 50px;">
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Votre panier</h1>
						</div>
						<div id="orderBlock" style="background-color: #F3F5F7; width: 300px; margin: auto; margin-bottom: 10px; padding: 10px; text-align: justify; display: none; border: 1px solid #666666; overflow: auto;"></div>
						<div style="background-color: #F3F5F7; width: 300px; margin: auto; padding: 10px;">
							<!-- Vérification que le panier est rempli -->
							{if ($cartValue != 0)}
							<span style="font-weight: bold;">Voici le récapitulatif de votre commande :</span><br />
								<br />
								<div id="panier">
									<table>
										{foreach from=$fullCart item='cart'}
											<tr>
												<th style="font-weight: normal; text-align: left; width: 200px;">
													- {$cart.item.title}
												</th>
												<th style="font-weight: bold; width: 24px; text-align: left;">
													x{$cart.quantity}
												</th>
												<th><a onclick="removeFromCart({$cart.itemId},1)"><img src="images/icons/delete.png" alt="Remove" style="margin-bottom: -4px; cursor: pointer;" title="Réduire quantité de 1" /></a><a onclick="addToCart({$cart.itemId},1)"><img src="images/icons/add.png" alt="Add" style="margin-bottom: -4px; cursor: pointer;" title="Augmenter quantité de 1" /></a><a onclick="deleteFromCart({$cart.itemId},1)"><img src="images/icons/bin_empty.png" alt="Delete" style="margin-bottom: -3px; cursor: pointer;" title="Supprimer du panier" /></a></th>
											</tr>
										{/foreach}
									</table>
								</div>
								<!-- <table style="margin-top: 20px; width: 290px;">
									<tr>
										<th style="text-align: right;">
											<form action="">
												Possédez-vous un code promo : <input type="text" name="promoCode" id="promoCode" /> <input type="button" value="Go" onclick="getPromoCode()" />
											</form>
										</th>
									</tr>
								</table>
								<span id="promoSpace"></span>-->
								<table style="margin-top: 8px; border-top: 1px dotted black; width: 290px;">
									<tr>
										<th style="text-align: right;">
											Montant total : <span id="cartValue">{$cartValue}</span> €
										</th>
									</tr>
								</table>
								<table style="margin-top: 8px;width: 290px;">
									<tr>
										<th style="text-align: right;">
											<input type="button" value="Valider ma commande" onClick="finalizeOrder();" />
										</th>
									</tr>
								</table>
								<!--<a style="cursor: pointer;" onclick="checkCartContent();">[Vérification du contenu]</a>-->
							{else}
								<div style="text-align: justify;">
									Aucun produit ne se trouve actuellement dans votre panier.<br />
									<br />
								</div>
								<div style="text-align: right;">
									<a href="Boutique">Retourner à la boutique</a>
								</div>
							{/if}
						</div>
					</div>
					<div class="mbonus">
						Présentation habituelle..
					</div>
				</div>
			</div>
		</div>
	</body>
</html>