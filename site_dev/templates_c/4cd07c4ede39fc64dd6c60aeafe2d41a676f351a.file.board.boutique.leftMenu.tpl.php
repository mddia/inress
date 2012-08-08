<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 14:45:31
         compiled from "templates/admin/pages/board.boutique.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4001620974fae89cac3f023-81009097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4cd07c4ede39fc64dd6c60aeafe2d41a676f351a' => 
    array (
      0 => 'templates/admin/pages/board.boutique.leftMenu.tpl',
      1 => 1336913126,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4001620974fae89cac3f023-81009097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fae89cac8ce8',
  'variables' => 
  array (
    'unsentOrdersCount' => 0,
    'unfinishedOrdersCount' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fae89cac8ce8')) {function content_4fae89cac8ce8($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu(); return false;" href="#">
	</a>
</div>
<div id="menu">
	<ul>
		<li class="header">Liste des commandes</li>
		<li><a href="admin.php?cat=boutique&scat=unpaidOrders"><span>Gestion des commandes</span></a></li>
		<li><a href="admin.php?cat=boutique&scat=unsentOrders"><span class="<?php if (($_smarty_tpl->tpl_vars['unsentOrdersCount']->value!=0)){?>zmenu<?php }else{ ?>zmenugr<?php }?>">Commandes à envoyer<?php if (($_smarty_tpl->tpl_vars['unsentOrdersCount']->value!=0)){?> [<?php echo $_smarty_tpl->tpl_vars['unsentOrdersCount']->value;?>
]<?php }?></span></a></li>
		<li><a href="admin.php?cat=boutique&scat=sentOrders"><span>Commandes envoyées</span></a></li>
		<hr />
		<li><a href="admin.php?cat=boutique&scat=addOrder"><span>Insérer une nouvelle commande</span></a></li>
		<hr />
		<li><a href="admin.php?cat=boutique&scat=unfinishedOrders"><span class="<?php if (($_smarty_tpl->tpl_vars['unfinishedOrdersCount']->value!=0)){?>zmenu<?php }?>">Commandes non-abouties<?php if (($_smarty_tpl->tpl_vars['unfinishedOrdersCount']->value!=0)){?> [<?php echo $_smarty_tpl->tpl_vars['unfinishedOrdersCount']->value;?>
]<?php }?></span></a></li>
		<li><a href="admin.php?cat=boutique&scat=refundOrders"><span>Commandes remboursées</span></a></li>
		<li class="header">Gestion des produits</li>
		<li><a onClick="displayCategories('list');"><span>Catégories de produits</span></a></li>
		<li><a onClick="displayFamilies('list');"><span>Familles de produits</span></a></li>
		<li><a onClick="displayProductsType('list');"><span>Type de produits</span></a></li>
		<li><a onClick="displayProducts();"><span>Produits</span></a></li>
		<li class="header">
			Magazine
		</li>
		<li>
			<a href="admin.php?cat=boutique&scat=handleMags">
				<span>
					Gestion des magazines
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=boutique&scat=routageList">
				<span>
					Gestion du routage
				</span>
			</a>
		</li>
	</ul>
</div><?php }} ?>