<?php /* Smarty version Smarty-3.1.7, created on 2012-05-31 12:09:34
         compiled from "templates/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9187853424fc7435eb9de97-08797696%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '81a0270564c79ee7a1c4f40d2a5e8bcfac7e3570' => 
    array (
      0 => 'templates/login.tpl',
      1 => 1332797616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9187853424fc7435eb9de97-08797696',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4fc7435ebee76',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4fc7435ebee76')) {function content_4fc7435ebee76($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $_smarty_tpl->tpl_vars['TITLE']->value;?>
</title>
	</head>
	<body>
		<div id="leftWrap" style="width: 15px; height: 322px; float: left; margin-top: 129px;"></div>
		<div id="rightWrap" style="width: 15px; height: 322px; float: right; margin-top: 129px;"></div>
		<!-- Top ToolBar -->
		<div id="toolBar">
			<?php echo $_smarty_tpl->getSubTemplate ('index.topBar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		</div>
		<div>
			<div class="container">
				<div class="ban">
					<?php echo $_smarty_tpl->getSubTemplate ('index.navBar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>
			
				<!-- Menu -->
				<div id="_body" style="margin-top: 25px;">
					<?php echo $_smarty_tpl->getSubTemplate ('index.menu.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

				</div>   <!--// _id body-->
				<!-- / MENU -->
				<div class="home">
					<div id="mycarousel" class="jcarousel-skin-tango" style="width:  990px;height: 285px; overflow: hidden;">
						<div id="container_controls"></div>
						<div class="jcarousel-control" >
							 <div class="carre" x="1"></div>
							 <div class="carre" x="2"></div>
						</div>
						<ul>
							<li><a><img width="990" height="285" src="http://medias.inrees.com/img/graphics/v4/banner/banner_01.jpg" alt="" /></a></li>
							<li><a><img width="990" height="285" src="http://medias.inrees.com/img/graphics/v4/banner/banner_02.jpg" alt="" /></a></li>
						</ul>
						<div id="mycarousel-prev"></div>
						<div id="mycarousel-next"></div>
						<a id="text_a" >
							<div id="text" style="display: none"></div>
						</a>
					</div>
					<div class="repererb"></div>
					<div class="mbig" style="background-color: ;">
						<h1>Connexion</h1>
						<h3>Connnectez-vous à votre compte et rejoignez la communauté INREES.com</h3><br />

						<div class="bonusdivlarge bulle20" style="float:left;width:600px;">
							<div class="registrer">
								<div class="ajax_icon_cont" id="ajax_icon_cont_login01">
									<div id="ajax_icon_login01" class="ajax_icon">
									</div>
								</div>
								<div id="infoBlock"></div>
								<div style="width:350px;float:left;">
									<form name="loginForm">
										<h3>E-mail</h3>
										<input type="text" name="email" id="emailInput" class="text" />
										<br /><br />
										<h3>Mot de passe</h3>
										<input type="password" name="password" id="passwordInput" class="text" />
										<br />
										<a href="reset">
											<strong>Mot de passe oublié ?</strong>
										</a>
										<br /><br />
										<input class="submit" type="button" value="Envoyer" onClick="checkUser(0);" />
										<div style="text-align:right;"></div>
									</form>
								</div>

								<div style="width:230px;margin-top:10px;float:left;" class="gray">
									<h5>
										<a href="reset">Vous avez oublié vos identifiants ?</a>
									</h5>
									Suivez la procèdure de réinitialisation<br />de votre compte <a href="reset"><strong>en cliquant ici »</strong></a>
								</div>
							</div>
						</div>


						Nouveau sur INREES.com ? <a href="registrer"><strong>Créer votre compte (gratuit) »</strong></a>
					</div>
					<div class="mbonus">
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid3.png')">
							<h1 style="font-family:INREESwebFontregular;font-size:16px; background-color:#f3f5f7;margin-left:33px;margin-right:33px;">
								Inscrivez-vous à la <font class="gray">Newsletter</font>
							</h1>
						</div>
						<form id="form_newsletter"  action="http://localhost/inscription-newsletter" method="post" >
							<div style="float:left;width:193px;margin-top:5px;margin-right:7px;height:34px;">
								<input type="text"  class="textn" name="email_newsletter"  id="email_newsletter" onfocus="this.value == this.defaultValue &amp;&amp; (this.value = '');" value="Newsletters INREES : inscrivez-vous !" />
							</div>
							<div style="float:left;height:34px;">
								<input class="submitn" type="submit"  value="S'inscrire »" />
							</div>
						</form>
						<div class="clear"></div>
						<div style="margin:0px; padding:0px; height:63px;">
							<a href="http://localhost/Abonnement"><img src="http://medias.inrees.com/img/graphics/v4/button-abonnement.jpg" /></a>
						</div>
						<div class="bulle4"><img src="http://medias.inrees.com/img/graphics/v4/button-abonnement-sh.jpg" /></div>
						<div class="bonusdiv bulle14">
							<div class="bulle10"><h2>Pour seulement 30€/an</h2></div>
							<ul>
								<li style=" list-style:disc; margin-left:25px;padding-bottom:5px;"><strong>Un abonnement à <a href="http://localhost/Abonnement">« inexploré »</a></strong><br />(4 numéros /an)</li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Des <a href="http://localhost/Abonnement">réductions</a> sur tous les évènements</strong></li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Un accès aux <a href="http://localhost/Abonnement">vidéos et podcasts</a> des conférences</strong></li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Un accès aux <a href="http://localhost/Abonnement">articles des précèdents magazine</a></strong></li>
								<li style=" list-style:disc; margin-left:25px;">Et plus encore sur INREES.com</li>
							</ul>
							<br />
							<a href="http://localhost/Abonnement"><strong>5 bonnes raisons de s'abonner »</strong></a>
						</div>
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid3.png')">
							<h1 style="font-family:INREESwebFontregular;font-size:16px; background-color:#f3f5f7;margin-left:33px;margin-right:33px;">
								Restez connecté avec <font class="gray">l'INREES</font>
							</h1>
						</div>
						<div class="bulle10">
							<script type="text/javascript" src="http://static.ak.connect.facebook.com/js/api_lib/v0.4/FeatureLoader.js.php/fr_FR">
							</script>
							<script type="text/javascript">FB.init("7c0c2a475273c651d2f169ef471398a5");</script>
							<fb:fan profile_id="135097866516826" stream="" connections="10" width="300">
							</fb:fan>
						</div>
						<a target="_blank" href="http://twitter.com/INREES">
							<img style="margin-bottom:10px;" src="http://medias.inrees.com/img/graphics/v4/actu-twitter.jpg" border="0" />
						</a>
						<script src="http://widgets.twimg.com/j/2/widget.js"></script>
						<script>
							new TWTR.Widget({
							  version: 2,
							  type: 'faves',
							  rpp: 7,
							  interval: 5000,
							  title: '<span style="font-size:15px;">Suivez l\'INREES sur Twitter</span>',
							  subject: '',
							  width: 'auto',
							  height: 260,
							  theme: {
								shell: {
								  background: '#dfe4ef',
								  color: '#51657c'
								},
								tweets: {
								  background: '#ffffff',
								  color: '#3c5a76',
								  links: '#1277d7'
								}
							  },
							  features: {
								scrollbar: true,
								loop: false,
								live: true,
								hashtags: false,
								timestamp: false,
								avatars: false,
								behavior: 'all'
							  }
							}).render().setUser('INREES').start();
						</script>
					</div>
					<div class="bothLike" style="margin-top:0px;">
						<div class="twoL bulle30">
							<div class="bulle10" style="text-align:center;">
								<h2 style="font-family:INREESwebFontregular;font-size:20px;">Top articles »</h2>
							</div>
						</div>
						<div class="twoR bulle30">
							<div class="bulle10" style="text-align:center;">
								<h2 style="font-family:INREESwebFontregular;font-size:20px;">Top évènements »</h2>
							</div>				
						</div>
						<div class="twoR bulle30">
							<div class="bulle10" style="text-align:center;">
								<h2 style="font-family:INREESwebFontregular;font-size:20px;">Magazine »</h2>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="both" style="margin-top:50px;">
						<div style="width:170px;float:left;padding-left:28px;">
							<strong>Aide</strong>
							<br /><br />
							<a class="darkblue" href="http://localhost/faq">FAQ</a><br />
							<a class="darkblue" href="http://localhost/contact">Contact</a><br /><br />
						</div>
						<div style="width:170px;float:left;padding-left:28px;">
							<a class="darkblue" href="http://localhost/"><strong>INREES</strong></a>
							<br /><br />
							<a class="darkblue" href="http://localhost/soutiens">Ils soutiennent l'INREES...</a><br /><br />
							<a class="darkblue" href="http://localhost/decouvrir/1">Découvrir l'INREES</a><br />
							<a class="darkblue" href="http://localhost/decouvrir/3">Qui sommes-nous ?</a><br />
							<a class="darkblue" href="http://localhost/decouvrir/2">Le Réseau de l'INREES</a><br />
						</div>
						<div style="width:170px;float:left;padding-left:28px;">
							<a class="darkblue" href="http://localhost/Evenements/programme"><strong>Evènements</strong></a>
							<br /><br />
							<a class="darkblue" href="http://localhost/Evenements/programme">Le programme complet</a><br />
							<a class="darkblue" href="http://localhost/Evenements/revivre">Revivre nos évènements</a><br />
						</div>
						<div style="width:170px;float:left;padding-left:28px;">
							<a class="darkblue" href="http://localhost/magazine"><strong>Magazine</strong></a>
							<br /><br />
							<a class="darkblue" href="http://localhost/magazine">A la une du dernier numéro</a><br />
							<a class="darkblue" href="http://localhost/articles/tous/0/0/1">Tous les articles</a>
							<br /><br />
							<a class="darkblue" href="http://localhost/Trouver-Magazine-Librairies">Où trouver le magazine<br />près de chez vous ?</a><br />
						</div>
						<div style="width:170px;float:left;padding-left:28px;">
							<strong>Nous suivre</strong>
							<br /><br />
							<a class="darkblue" target="_blank" href="http://www.facebook.com/home.php?#!/pages/INREES/135097866516826">Facebook</a><br />
							<a class="darkblue" target="_blank" href="http://twitter.com/INREES">Twitter</a><br />
							<a class="darkblue" target="_blank" href="http://localhost/Flux-RSS">Flux RSS</a>
						</div>
						<div style="width:940px;float:left;text-align:center;padding-top:20px;padding-bottom:30px;padding-left:25px;padding-right:25px;">
							<span class="gray">L'INREES offre aux soignants, à la communauté scientifique, ainsi qu'au grand public la possibilité de porter avec rigueur, méthode et ouverture un regard neuf sur les expériences humaines d'apparence inexplicables, parfois qualifié de <strong>« surnaturel »</strong> ou de <strong>« paranormal »</strong>.</span><br /><br />

							<span class="gray">Copyright © 2007 - 2011 INREES<br />Tous droits réservés - <a class="darkblue" href="http://localhost/mentions-legales">Mentions légales</a></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }} ?>