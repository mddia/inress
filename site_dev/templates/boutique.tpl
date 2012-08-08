{include file='inc.doctype.tpl'}
	<head>
		{include file='inc.head.tpl'}
		{include file='inc.css.tpl'}
		{include file='inc.javascript.tpl'}
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Boutique - {$TITLE}</title>
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
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">Boutique INREES</h1>
						</div>
						{foreach from=$items|@orderby:"idProduit" item='item'}
							<div class="itemBox">
								<span class="itemType">{$item.titreProduit}</span><br />{$item.title}<br />
								<br />								
								{if ($item.prixPublic != $item.prixAbonne)}
									Prix public : <span class="itemPrice">{$item.prixPublic} €</span><br />
									Prix abonné : <span class="itemPrice">{$item.prixAbonne} €</span><br />
								{else}
									Prix : <span class="itemPrice">{$item.prixPublic} €</span><br /><br >
								{/if}
								<br />
								<div class="itemDescription">
									{$item.description}
								</div>
								<input type="button" value="Ajouter au panier" onclick="addToCart({$item.id},0)" />
							</div>
						{/foreach}
					</div>
					<div class="mbonus">
						<h2>Votre panier</h2>
						<br />
						<div style="border: 1px dotted gray;padding: 4px" id="panier">
							{if ($cartValue != 0)}
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
								<table style="margin-top: 8px; border-top: 1px dotted black; width: 290px;">
									<tr>
										<th style="text-align: right;">
											Montant total : <span id="cartValue">{$cartValue}</span> €
										</th>
									</tr>
								</table>
								<table style="margin-top: 14px; width: 290px;">
									<tr>
										<th style="text-align: right;">
											<a href="Panier">Voir mes achats  >></a>
										</th>
									</tr>
								</table>
							{else}
								Votre panier est vide.
							{/if}
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>