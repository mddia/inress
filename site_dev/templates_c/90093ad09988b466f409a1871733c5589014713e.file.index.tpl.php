<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 11:35:24
         compiled from "templates/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13776643254faf805cd8a3e7-56200329%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '90093ad09988b466f409a1871733c5589014713e' => 
    array (
      0 => 'templates/index.tpl',
      1 => 1332797617,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13776643254faf805cd8a3e7-56200329',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'TITLE' => 0,
    'ban' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4faf805ce01a9',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faf805ce01a9')) {function content_4faf805ce01a9($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ('inc.doctype.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<head>
		<?php echo $_smarty_tpl->getSubTemplate ('inc.head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<?php echo $_smarty_tpl->getSubTemplate ('inc.javascript.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

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

				</div>
				<!-- / MENU -->
				<div class="home">
					<!-- # Bannière 2012 # -->
					<div style="width: 990px; height: 348px; overflow: hidden; background-color: #000000; cursor: pointer;">
						<?php if (($_smarty_tpl->tpl_vars['ban']->value['banType'])==1){?>
							<?php echo $_smarty_tpl->getSubTemplate ('index.banniere.1.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<?php }elseif(($_smarty_tpl->tpl_vars['ban']->value['banType'])==3){?>
							<?php echo $_smarty_tpl->getSubTemplate ('index.banniere.3.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<?php }elseif(($_smarty_tpl->tpl_vars['ban']->value['banType'])==6){?>
							<?php echo $_smarty_tpl->getSubTemplate ('index.banniere.6.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

						<?php }?>
					</div>
					<div class="repererb"></div>
					<div class="magThemes" style="margin-bottom:15px;">
						<div style="float:right;">
							<form style="top:-3px; position:relative;" action="rechercher.php" method="get">
								<input type="text" onblur="if (this.value == '') {this.value = 'Chercher sur inrees.com';}" onfocus="if(this.value== 'Chercher sur inrees.com' ){this.value='';}" title="recherche" maxlength="255" value="Chercher sur inrees.com" style="width:210px;" name="r" /> <input type="Submit" value="Ok" />
							</form>
						</div>
						Autour de la mort | Rêves & Conscience | 6e sens | Psychologies | Santé & bien-être | Nature | Sciences | Spiritualités | Réflexions
					</div>
					<div class="mbig" style="background-color: ;">
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
							<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">En ce moment sur INREES.com</h1>
						</div>
						<!--borderbot-->
						<div class=" bulle20" style="height:250px;">
							<div class="bulle10" style="width:630px;float:left;">
								<div class="clear"></div>
								<div class="bulle20" style="padding:10px;padding-top:10px;padding-bottom:10px;margin-top:15px; background-color:#f3f5f7;float:left;width:610px;">
									<div style="padding-top:3px;float:left;">
										<span class="gray"><a class="darkbluegrey" href="revuedeweb/1">Revue de web</a> : </span> &#8226; <a href="revuedeweb/1"><strong>Plus... »</strong></a>	
									</div>
								</div>
							</div>
							<div class="clear"></div>
							<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
								<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:185px;margin-right:185px;">
									On en parle à l'INREES
								</h1>
							</div>
							<div class="twoL bulle20" style="height:340px;">
								<div class="bulle10" style="float:left;width:305px; text-align:center;">
									<a class="darkbluegrey" href="http:///articles//">
										<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"> »</span>
									</a>
								</div>
								<div class=" bulle4" style="height:310px;">
									<div style="width:305px;float:left;height:270px;">
										<div style="height:250px;">
											<div style="font-family:INREESwebFontBold; background-color:#; position:absolute; margin-top:15px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
												<a style="display:block;" class="onetitlewhiteno" href="articles/tous//0/1"></a>
											</div>
											<a href="articles//">
												<img style="width:297px;height:162px; padding:4px; border:1px solid #dfe0d6;" src="http://medias.inrees.com/img/magazine/home_.jpg" />
											</a>
											<div class="padtitle" style="text-align:center;">
												<a href="articles//">
													<font style="font-family:INREESwebFontregular;font-size:21px;"></font>
												</a>
											</div>
											<div class="bulle14 gray" style="text-align:center;padding-left:3px;padding-right:3px;"></div>
										</div>
									</div>
									<div style="margin-left:112px;">
										<a href="articles//" class="button_gray noline">
											<span>Lire la suite</span>
										</a>
									</div>
								</div>
							</div>
							<div class="twoR bulle20" style="height:340px;">
								<div class="" style="float:left;width:305px; padding-bottom:5px; margin-bottom:5px; text-align:center;">
									<span class="darkbluegrey">
										<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"> »
										</span>
									</span>
								</div>
								<div class=" bulle4" style="height:310px;">
									<div style="width:305px;float:left;height:270px;">
									</div>
									<div>
										<a href="articles/tous/0/0/1" class="button_gray noline"><span>Tous les articles</span>
										</a>
									</div>
								</div>
							</div>
							<div class="clear"></div>
							<div class="clear"></div>
							<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
								<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:180px;margin-right:180px; background-color:#fbfbfc;">L'INREES vous conseille...</h1>
							</div>
							<div class="twoL  bulle20" style="padding-top:0px;margin-top:0px;">
								<div class="bulle10" style="text-align:center;">
									<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">
										<a class="darkbluegrey" href="livres">3 nouveaux livres »</a>
									</span>
								</div>
								<div class="clear"></div>
								<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;">
									<a href="livres" class="button_gray noline">
										<span>Tous les livres</span>
									</a>
								</div>
							</div>
							<div class="twoR  bulle20" style="padding-top:0px;margin-top:0px;">					
								<div class="bulle10" style="text-align:center;">
									<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">
										<a class="darkbluegrey" href="films">3 nouveaux films »</a>
									</span>
								</div>
								<div class="clear"></div>
								<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;">
									<a href="films" class="button_gray noline">
										<span>Les nouveaux films</span>
									</a>
								</div>
							</div>
							<div class="clear"></div>
							<div class="twoL bulle20" style="height:350px;"></div>
							<div class="twoR  bulle30" style="padding-top:0px;margin-top:0px;">
								<div class="bulle10" style="text-align:center;">
									<h2 style="font-family:INREESwebFontregular;font-size:20px;">Les conseils du jour »</h2>
								</div>
								<div class=" bulle4" style="height:125px;">
									<div style="width:305px;float:left;height:110px;"></div>
									<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;">
										<a href="http://'.$_SERVER['HTTP_HOST'].'/livres" class="button_gray noline"><span>Tous les livres</span></a>
									</div>
								</div>
								<div class="clear"></div>
								<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
									<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:180px;margin-right:180px; background-color:#fbfbfc;">
										Les évènements INREES
									</h1>
								</div>
								<div class="twoL bulle30" style="height:340px;">
								</div>
								<div style="margin-left:73px;">
									<a href="Evenements/programme" class="button_gray noline">
										<span>Découvrir le programme</span>
									</a>
								</div>
							</div>
						</div>
						<div class="twoR bulle30" style="height:340px;">
							<div class="bulle4" style="height:320px;">
								<div style="width:305px;float:left;height:280px;">
									<div class="bulle10" style="text-align:center;">
										<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">
											<a class="darkbluegrey" href="http://localhostEvenements/tous/0/1">A revivre en vidéo »</a>
										</span>
									</div>
									<div class=" bulle20" style="height:330px;">
										<div style="width:305px;float:left;height:290px;">
											<br />
										</div>
										<div style="margin-left:73px;">
											<a href="Evenements/tous/0/1" class="button_gray noline"><span>Revivre nos évènements</span></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="clear"></div>
						<div class="bulle10" style="margin-top:10px;">
							<a class="darkbluegrey" href="podcasts/tous/0/0/1">
								<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">Réécouter nos évènements en podcasts »</span>
							</a>
						</div>
						<div class=" bulle20" style="height:270px;">
							<a href="podcasts/tous/0/0/1" class="button_gray noline"><span>Tous les podcasts</span></a>
						</div>
						<div class="clear"></div>
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
							<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:135px;margin-right:135px; background-color:#fbfbfc;">
								A ne pas manquer sur INREES.com
							</h1>
						</div>
						<div class="twoL bulle30">
						</div>
						<div class="twoR bulle30">
							<div class="bulle10" style="text-align:center;">
								<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">
									<a class="darkbluegrey" href="Evenements/programme">Ça s'est passé à l'INREES »</a>
								</span>
							</div>
							<div class=" bulle4" style="height:310px;">
								<div style="width:305px;float:left;height:270px;">
								</div>
								<a href="Evenements/revivre" class="button_gray noline">
									<span>Plus d'évènements</span>
								</a>
							</div>
						</div>
					</div>
					<div class="mbonus">
						<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid3.png')">
							<h1 style="font-family:INREESwebFontregular;font-size:16px; background-color:#f3f5f7;margin-left:33px;margin-right:33px;">
								Inscrivez-vous à la <font class="gray">Newsletter</font>
							</h1>
						</div>
						<form id="form_newsletter"  action="inscription-newsletter" method="post" >
							<div style="float:left;width:193px;margin-top:5px;margin-right:7px;height:34px;">
								<input type="text"  class="textn" name="email_newsletter"  id="email_newsletter" onfocus="this.value == this.defaultValue &amp;&amp; (this.value = '');" value="Newsletters INREES : inscrivez-vous !" />
							</div>
							<div style="float:left;height:34px;">
								<input class="submitn" type="submit"  value="S'inscrire »" />
							</div>
						</form>
						<div class="clear"></div>
						<div style="margin:0px; padding:0px; height:63px;">
							<a href="Abonnement"><img src="http://medias.inrees.com/img/graphics/v4/button-abonnement.jpg" /></a>
						</div>
						<div class="bulle4"><img src="http://medias.inrees.com/img/graphics/v4/button-abonnement-sh.jpg" /></div>
						<div class="bonusdiv bulle14">
							<div class="bulle10"><h2>Pour seulement 30€/an</h2></div>
							<ul>
								<li style=" list-style:disc; margin-left:25px;padding-bottom:5px;"><strong>Un abonnement à <a href="Abonnement">« inexploré »</a></strong><br />(4 numéros /an)</li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Des <a href="Abonnement">réductions</a> sur tous les évènements</strong></li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Un accès aux <a href="Abonnement">vidéos et podcasts</a> des conférences</strong></li>
								<li style=" list-style:disc; margin-left:25px;"><strong>Un accès aux <a href="Abonnement">articles des précèdents magazine</a></strong></li>
								<li style=" list-style:disc; margin-left:25px;">Et plus encore sur INREES.com</li>
							</ul>
							<br />
							<a href="Abonnement"><strong>5 bonnes raisons de s'abonner »</strong></a>
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
						<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

					</div>
				</div>
			</div>
		</div>
	</body>
</html><?php }} ?>