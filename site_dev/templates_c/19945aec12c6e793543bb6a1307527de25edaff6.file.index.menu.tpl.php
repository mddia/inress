<?php /* Smarty version Smarty-3.1.7, created on 2012-05-13 11:35:24
         compiled from "templates/index.menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20563434284faf805ceaebf5-99469703%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '19945aec12c6e793543bb6a1307527de25edaff6' => 
    array (
      0 => 'templates/index.menu.tpl',
      1 => 1332797619,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20563434284faf805ceaebf5-99469703',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.7',
  'unifunc' => 'content_4faf805cecce4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4faf805cecce4')) {function content_4faf805cecce4($_smarty_tpl) {?><div id="menu">
	<div id="conscience"><a onclick="displayUnderDiv('conscience');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="autourMort"><a onclick="displayUnderDiv('autourMort');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="psychologies"><a onclick="displayUnderDiv('psychologies');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="santeBienEtre"><a onclick="displayUnderDiv('santeBienEtre');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="planete"><a onclick="displayUnderDiv('planete');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="sciences"><a onclick="displayUnderDiv('sciences');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="spiritualites"><a onclick="displayUnderDiv('spiritualites');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="culturePhilo"><a onclick="displayUnderDiv('culturePhilo');" style="display: block; width: 100%; height: 100%;"></a></div>
	<div id="myInrees"><a onclick="displayUnderDiv('myInrees');" style="display: block; width: 100%; height: 100%;"></a></div>
</div>
<div id="parent">
	<!--onglet conscience-->
	<div id="conscienceContent" class="slideDown">
		<div style="width: 990px;height: 299px">
			<div class="content" style="width:350px">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://www.inrees.com/themes/Conscience-Reves">Accueil « CONSCIENCE »</a>
					</li>
				</ul>
				<<?php ?>?php
					//On récupère la date
					$actualTime = time();
					//On soustrait 50 jours
					$limitDate = $actualTime - 12960000;
					$limitTimestamp = date("Y-m-d-H-i-s", $limitDate);
					//On regarde l'article qui sera en top
					$sql0="SELECT * FROM 2emag_articles WHERE articles_idtheme = '1' AND articles_timestamp > '$limitTimestamp' AND articles_actif = '1' AND articles_online = '1' ORDER BY articles_stats DESC LIMIT 1 ";
					$query0=mysql_query($sql0);
					$data = mysql_fetch_assoc($query0);
					//Récupération de l'id non voulue
					$topId = $data['articles_id'];
					
					//Affichage des vignettes
					$query=mysql_query("SELECT * FROM 2emag_articles WHERE articles_top != '1' AND articles_actif = '1' AND articles_online = '1' AND articles_idtheme = '1' AND articles_id != '$topId' ORDER BY articles_timestamp DESC LIMIT 3");
					while($row=mysql_fetch_array($query)) {
						$chaine = $row['articles_minidesc'];
						$max=60;
						if(strlen($chaine)>=$max) {
							$chaine=substr($chaine,0,$max);
							$espace=strrpos($chaine," ");
							$chaine=substr($chaine,0,$espace)."...";
						}
						//Affichage under
						echo '<div style="height:80px;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><img align="left" alt="'.$row['articles_titre'].'" src="http://medias.inrees.com/img/photos/'.$row['articles_photodir'].'.jpg" height="75" style="margin-right:8px"/></a><a class="linkmymenu" href="http://www.inrees.com/articles/'.$row['articles_url'].'/">'.$row['articles_titre'].'</a><div class="linkmymenu">'.$chaine.'</div></div>';
					}
				?<?php ?>>
			</div>
			<div class="content" style="width:290px">
				<ul class="content" style="width:290px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://www.inrees.com/articles/tous/0/0/1">On en parle</a>
					</li>
				</ul>
				<<?php ?>?php
					//sql
					$sql="SELECT * FROM 2emag_articles WHERE articles_idtheme = '1' AND articles_timestamp > '$limitTimestamp' AND articles_actif = '1' AND articles_online = '1' ORDER BY articles_stats DESC LIMIT 1 ";
					$query=mysql_query($sql);
					while($row=mysql_fetch_array($query)){

						$chaine = $row['articles_minidesc'];
						$max=60;
						if(strlen($chaine)>=$max) {
							$chaine=substr($chaine,0,$max);
							$espace=strrpos($chaine," ");
							$chaine=substr($chaine,0,$espace)."...";
						}
						//Affichage under
						echo '<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><img alt="'.$row['articles_titre'].'" src="http://medias.inrees.com/img/magazine/home_'.$row['articles_photodir'].'.jpg" width="290" /></a><br /><a class="linkmymenu" href="http://www.inrees.com/articles/'.$row['articles_url'].'/" class="spacemenu">'.$row['articles_titre'].'</a><br /><span class="linkmymenu">'.$chaine.'</span><br />';
					}
				?<?php ?>>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://www.inrees.com/articles/tous/0/0/1">Top articles</a>
					</li>
					<<?php ?>?php
					//Listage des articles sur le sujet
					$sql = mysql_query("SELECT * FROM 2emag_articles WHERE articles_actif = '1' AND articles_idtheme = '1' AND articles_online = '1' AND TO_DAYS(NOW()) - TO_DAYS(articles_timestamp) < 365 ORDER BY articles_stats DESC LIMIT 8");
					while($row = mysql_fetch_array($sql) ) {
						echo '<li class="topArticles">
						<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/">'.$row['articles_titre'].'</a>
						</li>';
					}
					?<?php ?>>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet mort-->
	<div id="mortContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Conscience</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Conscience</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet psychologies-->
	<div id="psychologiesContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Psychologies</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Psychologies</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet santé bien etre-->
	<div id="santeBienEtreContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Santé & Bien-être</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Santé & Bien-être</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet planete-->
	<div id="planeteContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Planète</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Planète</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet sciences-->
	<div id="sciencesContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Sciences</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Sciences</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet spiritualites-->
	<div id="spiritualitesContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Spiritualités</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Spiritualités</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet culturePhilo-->
	<div id="culturePhiloContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="pictureContent">
				<ul class="content" style="width:350px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Culture / Philo</a></li>
				</ul>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/recouvAme.jpg" alt="Le recouvrement d’âme">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Le-recouvrement-d-ame-Chaman/">Le recouvrement d’âme</a>
					<div class="linkmymenu">Dans le chamanisme, l’âme assure l’intégrité énergétique...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/medit2.jpg" alt="12 séances guidées de méditation <br />avec Fabrice Midal">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/12-seances-guidees-de-meditation-Midal/">
					12 séances guidées de méditation
					<br>
					avec Fabrice Midal
					</a>
					<div class="linkmymenu">«&nbsp;Méditer, c’est comme rentrer à la maison. Et nous en...</div>
				</div>
				<div style="height:80px;">
					<a href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
						<img align="left" height="75" style="margin-right:8px" src="http://medias.inrees.com/img/photos/TT1.jpg" alt="Le Nobel de littérature 2011 : <br />un poète mystique?">
					</a>
					<a class="linkmymenu" href="http://www.inrees.com/articles/Nobel-litterature-2011-Transtromer-poete-mystique/">
					Le Nobel de littérature 2011 :
					<br>
					un poète mystique?
					</a>
					<div class="linkmymenu">Le 10 décembre à Oslo, le Suédois Tomas Tranströmer recevra...</div>
				</div>
			</div>
			<div class="content">
				<ul class="content" style="width: 250px;">
					<li style="border-bottom:1px solid white;margin-bottom:10px;">
						<a class="white" href="http://localhost/articles/tous/0/0/1">A la une</a>
					</li>
				</ul>
			</div>
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/articles/tous/0/0/1">Culture / Philo</a></li>

					<li><a href="http://localhost/articles/tous/0/0/1">A la une du magazine</a></li>
					<!--<li><a href="http://localhost/articles/tous/0/10/1">En couverture</a></li> -->
					<li><a href="http://localhost/articles/tous/0/3/1">Dossiers</a></li>
					<li><a href="http://localhost/articles/tous/0/5/1">Entretiens</a></li>
					<li><a href="http://localhost/articles/tous/0/4/1">Bonnes feuilles</a></li>
					<li><a href="http://localhost/articles/tous/0/6/1">Coin du psy</a></li>
					<li><a href="http://localhost/articles/tous/0/7/1">Témoignages</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
	<!--onglet myInrees-->
	<div id="myInreesContent" class="slideDown">
		<div style="width: 990px;height: 275px">
			<div class="content" style="width:250px">
				<ul class="content" style="width:250px">
					<li style="border-bottom:1px solid white;margin-bottom:10px;"><a class="white" href="http://localhost/Extraordinaire">My Inrees</a></li>
					<li><a href="http://localhost/Extraordinaire">Manuel de l'extraordinaire</a></li>
					<li><a href="http://localhost/livres">Livres</a></li>
					<li><a href="http://localhost/films">Films</a></li>
					<li><a href="http://localhost/dictionnaire">Dictionnaire</a></li>
				</ul>
			</div>
		</div>
		<div class="closeDiv" id="closeDiv">
			<a onclick="resetMenu()" style="display: block; width: 100%; height: 100%;"></a>
		</div>
	</div>
</div><?php }} ?>