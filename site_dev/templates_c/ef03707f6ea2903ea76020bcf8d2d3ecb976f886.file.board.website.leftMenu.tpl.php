<?php /* Smarty version Smarty-3.1.7, created on 2012-06-06 16:27:01
         compiled from "templates/admin/pages/board.website.leftMenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2095091604fb0d021d69eb7-74987944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ef03707f6ea2903ea76020bcf8d2d3ecb976f886' => 
    array (
      0 => 'templates/admin/pages/board.website.leftMenu.tpl',
      1 => 1338992784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2095091604fb0d021d69eb7-74987944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fb0d021dac10',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fb0d021dac10')) {function content_4fb0d021dac10($_smarty_tpl) {?><div id="toggle">
	<a id="toggle-handle" accesskey="m" title="Hide or display the side menu" onclick="switchMenu()" href="#">
	</a>
</div>
<div id="menu">
	<ul>		
		<li class="header">
			Soutien
		</li>		
		<li><a href="admin.php?cat=website&scat=gestionIntervenants"><span>Gestion des intervenants</span></a></li>
		<li class="header">
			Podcasts
		</li>
		<li>
			<a href="admin.php?cat=website&amp;scat=createpodcasts">
				<span>
					Insérer un nouveau podcasts
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=website&amp;scat=listepodcasts">
				<span>
					Liste de tous les podcasts
				</span>
			</a>
		</li>
		<li class="header">
			Vidéos
		</li>
		<li>
			<a href="admin.php?cat=website&amp;scat=createvideo">
				<span>
					Insérer une nouvelle vidéo
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=website&amp;scat=listevideos">
				<span>
					Liste de toutes les vidéos
				</span>
			</a>
		</li>
		<li class="header">
			Articles
		</li>
		<li>
			<a href="admin.php?cat=website&scat=ajoutArticle">
				<span>
					Ajouter un nouvel article
				</span>
			</a>
		</li>
		<hr />
		<li>
			<a href="admin.php?cat=website&scat=listOfflineArticles">
				<span>
					Articles offline
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=website&scat=listArticlesbb">
				<span>
					Articles bientôt en ligne
				</span>
			</a>
		</li>
		<li>
			<a href="admin.php?cat=website&scat=listArticlesbis">
				<span class="zmenugrz">
					Liste de tous les articles (online)
				</span>
			</a>
		</li>
	</ul>
</div><?php }} ?>