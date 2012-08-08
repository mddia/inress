<?php


$website_title = "La communauté INREES";
$website_desc = "";

$topmenu = 'magazine' ;
include($_SERVER['DOCUMENT_ROOT'].'/_top.php') ;
//include('FICHIERS POUR TEST/_top_2.php');
?>

<script>$(function(){

$("#hover01").hover(
  function () {
    $("#list01").css({display:"block"});
  },
  function () {
     $("#list01").css({display:"none"});
  }
)

})</script>

<script type="text/javascript" src="includes/js/TEST.communityFormCheck.js"></script>

<div class="repererb"></div>





<div class="mbig">




<!-- -->

<div style="text-align:center; background:url(http://medias.inrees.com/img/graphics/v4/trait-mid.jpg)">

<div class="abcdzEF gray"  style="font-family:INREESwebFontregular;font-size:11px;margin-left:220px;margin-right:220px; background-color:#fbfbfc;">
<a class="onetitlewhite2" style="text-transform:uppercase;" href="#">Communauté</a>

</div>
</div>

<div class="clear"></div>




<h1 style="font-family:INREESwebFontregular;font-size:28px; background-color:#fbfbfc; text-align:center;">La communauté INREES</h1>


<h2 style="text-align:center;">Rejoindre la communauté</h2><br />

<div style="background: url(http://medias.inrees.com/img/graphics/degrade_soutiens-ap.png); width: 620px; min-height: 150px; margin-left: 0px; margin-top: 0px; border: 1px none green">

<h2>Ils ont participé aux évènements INREES</h2><br />
<?php
$soutttien = 'Mais aussi : ';
$x = 1 ;
$date = date('Y-m-d');
echo '<div style="margin-bottom:25px;">';
$query=mysql_query("SELECT * FROM in_soutien, in_agendadetails, in_agendadetailsplus, in_agendaintervenants WHERE in_soutien.soutien_id = in_agendaintervenants.agendaintervenants_soutienid AND in_agendaintervenants.agendaintervenants_idagenda = in_agendadetails.agendadetails_id AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateD < '$date' AND soutien_vip > '3' AND soutien_title < '3' AND soutien_actif = 'yes' GROUP BY soutien_id ORDER BY rand() ASC LIMIT 12");
while($row=mysql_fetch_array($query))
{ // 315
	if($x < 7)
	{
echo '<div style="float:left;width:300px;text-align:left;margin-bottom:8px;margin-right:3px;margin-left:0px;"><a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/"><img align="left" style="margin-right:8px;margin-bottom:5px;" src="http://medias.inrees.com/img/soutien/'.$row['soutien_id'].'.jpg" width="75"   class="photo22c" /></a><div style="margin-top:3px;"><strong><a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/">'.$row['soutien_prenom'].' '.$row['soutien_nom'].'</a><br /><span class="mini">'.ucfirst($row['soutien_profession_fr']).'</span></strong><div style="margin-top:10px;" class="mini gray">';

        $chaine = $row['soutien_texte'];
		$max=60;
		
		if(strlen($chaine)>=$max)
		{
			$chaine=substr($chaine,0,$max);
			$espace=strrpos($chaine," ");
			$chaine=substr($chaine,0,$espace)."...";
		}

echo $chaine.'</div></div></div>';

	}
	else
	{
		$soutttien .= '<a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/"><strong>'.$row['soutien_prenom'].' '.$row['soutien_nom'].'</strong></a>, ';
	}
	
	$x++;
}
if(mysql_num_rows($query) > 3) { echo substr($soutttien,0,-2).'...' ; } echo '</div>
<div style="clear:both;"></div>';
?>
</div>

<h2>Vous souhaitez participer à la future communauté de l'INREES ?</h2>

<div style="margin-top: 30px; margin-left: 40px; background-color: #E6EBF7;  width: 400px; padding: 10px; font-weight: bold;">
	<br />
	Merci de complétez ces quelques informations :<br />
	<br />
	<span id="confirmationMessage"></span>
	<span id="errorMessage"></span>
	<span id="emailMessage"></span>
	<form name="requeteCommunaute" id="requeteCommunaute">
		<table style="margin-left: 30px;">
			<tr>
				<td style="width: 150px; color: #51657C; font-weight: bold;">Nom :</td>
				<td style="width: 140px;">
					<input type="text" style="width: 180px;" name="name" id="name" />
				</td>
			</tr>
			<tr>
				<td style="width: 150px; color: #51657C; font-weight: bold;">Prénom :</td>
				<td style="width: 140px;">
					<input type="text" style="width: 180px" name="firstName" id="firstName" />
				</td>
			</tr>
			<tr>
				<td style="width: 150px; color: #51657C; font-weight: bold;">Adresse email :</td>
				<td style="width: 140px;">
					<input type="text" style="width: 180px" name="email" id="email" />
				</td>
			</tr>
		</table>
		<br />
		<table style="margin-left: 30px;">
			<tr>
				<td style="width: 290px; color: #51657C; font-weight: bold;">
					Vos motivations en quelque mots :
				</td>
			</tr>
			<tr>
				<td style="width: 290px; color: #51657C; font-weight: bold;">
					<textarea id="motivations" style="width: 336px; resize: none; border: 1px solid #AFC1CD;"></textarea>
				</td>
			</tr>
			<tr>
				<td>
					<input type="button" class="submit" value="Envoyer" style="margin-top: 20px; float: right;" id="submitButton" onClick="checkCommunityForm()" />
				</td>
			</tr>
		</table>
	</form>
</div>


</div>
<div class="mbonus">

<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/pub_300x250.php');
include($_SERVER['DOCUMENT_ROOT'].'/includes/newsletter-INREES.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/abo-INREES.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/bientot-INREES.php');

//include($_SERVER['DOCUMENT_ROOT'].'/includes/pub_300x250.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/facebook-INREES.php');

?>



<!--<div class="bonusdiv bulle14" style="background-color:#dfe4ef;">
<div class="bulle10"><h2>Vu sur le net</h2></div>

<div class="bulle10"><object height="187px" width="280px">
<param name="movie" value="http://www.youtube.com/v/d5mK7dzyUkM?fs=1&amp;hl=fr_FR" />
<param name="allowFullScreen" value="true" />
<param name="allowscriptaccess" value="always" />
<embed type="application/x-shockwave-flash" src="http://www.youtube.com/v/d5mK7dzyUkM?fs=1&amp;hl=fr_FR" allowscriptaccess="always" allowfullscreen="true" height="187px" width="280px"></embed>
</object></div>

<div class="bulle10"><a href="/video/36847/beastie-boys-fillon-morano-dark-vador"><strong>Titre de la vidéo</strong></a></div>
<div><span class="gray">...</span></div>

</div> -->





<?php
include($_SERVER['DOCUMENT_ROOT'].'/includes/videos-INREES.php');
//include($_SERVER['DOCUMENT_ROOT'].'/includes/mag-INREES.php');

include($_SERVER['DOCUMENT_ROOT'].'/includes/twitter-INREES.php');
?>





<?php
// AND videosplus_dateD > '$agenda_dateD' 
$sql77 = "SELECT * FROM in_soutien WHERE soutien_actif = 'yes' AND soutien_vip >= '4' AND soutien_title >= '2' ORDER BY rand() LIMIT 1 " ;
$query77=mysql_query($sql77);
if(mysql_num_rows($query77) > 0)
{
	echo '<div class="bonusdiv bulle14" style="background-color:#dfe4ef;">
	<div class="bulle10"><h2>Ils nous soutiennent...</h2></div>' ;

while($row=mysql_fetch_array($query77))
{
			$agenda_dateD = $row['videosplus_dateD'];
			$invite = "";
			
			
			$chaine = $row['soutien_texte'];
			$max=60;
	
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}


echo '<div style="margin-bottom:15px; height:80px;">
<a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/">
<img class="photoL3" src="http://medias.inrees.com/img/soutien/'.$row['soutien_id'].'.jpg" width="75" align="left" /></a>
<div style="margin-top:3px; margin-bottom:5px;"><a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/"><strong>'.$row['soutien_prenom'].' '.$row['soutien_nom'].'</strong></a></div>
<span class="gray">'.$chaine.'</span></div>' ;
}

}

// AND videosplus_dateD > '$agenda_dateD' 
$x=1;
$sql77 = "SELECT * FROM in_soutien WHERE soutien_actif = 'yes' AND soutien_vip >= '4' AND soutien_title >= '2' ORDER BY rand() LIMIT 10 " ;
$query77=mysql_query($sql77);
if(mysql_num_rows($query77) > 0)
{

while($row=mysql_fetch_array($query77))
{
			$agenda_dateD = $row['videosplus_dateD'];
			$invite = "";
			
			
			$chaine = $row['soutien_texte'];
			$max=60;
	
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}

if($x < 5 ) {
echo '<a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/">
<img style="margin-right:4px;" class="photoL3" src="http://medias.inrees.com/img/soutien/'.$row['soutien_id'].'.jpg" width="50" /></a>' ;
} else {
echo '<a href="http://www.inrees.com/soutien/'.$row['soutien_url'].'/">
<img style="margin-right:0px;" class="photoL3" src="http://medias.inrees.com/img/soutien/'.$row['soutien_id'].'.jpg" width="50" /></a>' ;
}


$x++;
if($x == 6) { $x = 1 ; }

}
	echo '</div>' ;

}
?>
</div>

<?php
include($_SERVER['DOCUMENT_ROOT'].'/_bot.php') ;
?>
