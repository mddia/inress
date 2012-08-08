<?php
$website_title = "Institut de Recherche sur les Expériences Extraordinaires";
$website_desc = "";

include('/FICHIERS POUR TEST/_top_2.php') ;
?>

<script src="http://www.inrees.com/includes/js/jquery.jcarousel.min.js" ></script>
<script src="http://www.inrees.com/includes/js/jquery.cycle.all.min.js"></script>
<script src="http://www.inrees.com/includes/js/jquery.pngFix.pack.js" ></script>
<style><!--
/*_____________JCAROUSEL____________*/
.jcarousel-skin-tango .jcarousel-container {background: #F0F6F9;}
.jcarousel-skin-tango .jcarousel-direction-rtl {direction: rtl;}
.jcarousel-skin-tango .jcarousel-container-horizontal {width: 990px;padding: 0px 0px;}
.jcarousel-skin-tango .jcarousel-clip-horizontal {width:  990px;height: 285px;}
.jcarousel-skin-tango .jcarousel-item {width: 990px;height: 285px;}
.jcarousel-skin-tango .jcarousel-item-horizontal {margin-left: 0;margin-right: 0px;}
.jcarousel-skin-tango .jcarousel-direction-rtl .jcarousel-item-horizontal {margin-left: 10px;margin-right: 0;}
.jcarousel-skin-tango .jcarousel-item-placeholder {background: #fff;color: #000;}
/*_____boutons_____*/
.jcarousel-skin-tango .jcarousel-next-horizontal {position: absolute;top: 230px;right:90px;width:26px;height:26px;cursor: pointer;background:url(http://medias.inrees.com/img/graphics/fl-next.png) 0px 0px no-repeat;z-index: 3}
.jcarousel-skin-tango .jcarousel-next-horizontal:hover {background:url(http://medias.inrees.com/img/graphics/fl-next.png) 0px -26px no-repeat;}
.jcarousel-skin-tango .jcarousel-next-horizontal:active {background-position: 0px 0;}
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-next-disabled-horizontal:active {cursor: default;background-position: -50px 0;}
/*___prev____*/
.jcarousel-skin-tango .jcarousel-prev-horizontal {position: absolute;top: 230px;left:840px;width:26px;height:26px;cursor: pointer;background:url(http://medias.inrees.com/img/graphics/fl-prev.png) 0px 0px no-repeat;z-index: 3}
.jcarousel-skin-tango .jcarousel-prev-horizontal:hover {background:url(http://medias.inrees.com/img/graphics/fl-prev.png) 0px -26px no-repeat;}
.jcarousel-skin-tango .jcarousel-prev-horizontal:active {background-position: 0px 0;}
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:hover,
.jcarousel-skin-tango .jcarousel-prev-disabled-horizontal:active {cursor: default;background-position: -50px 0;}

div#container_controls{ position: absolute;z-index: 2;border: 1px none red;width: 330px;height: 46px;margin-left:660px;margin-top:239px; background-color:#031b2b; opacity : 0.0; filter : alpha(opacity=00);}

div#text{ position: absolute;z-index: 2;top:16px;width:990px;height: 125px;border: 1px none red;background-repeat: no-repeat;cursor: pointer;}
div.jcarousel-control{ position: absolute;z-index: 3;margin-left:750px; margin-top:240px;border: 1px none red;}/*pager*/
.carre{cursor: pointer;border: 1px none gray;background:url(http://medias.inrees.com/img/graphics/rond2.png) no-repeat;float: left;width: 9px;height: 9px;margin-right: 4px;}-->
</style>
<script>
next= new Image();
next.src="http://medias.inrees.com/img/graphics/banner/next_banner.png"
prev= new Image();
prev.src="http://medias.inrees.com/img/graphics/banner/prev_banner.png"
//image
x= new Image();
x.src="http://medias.inrees.com/img/graphics/v4/banner/banner_01.jpg"
y= new Image();
y.src="http://medias.inrees.com/img/graphics/v4/banner/banner_02.jpg"
z= new Image();
z.src="http://medias.inrees.com/img/graphics/v4/banner/banner_03.jpg"
a= new Image();
a.src="http://medias.inrees.com/img/graphics/v4/banner/banner_04.jpg"
b= new Image();
b.src="http://medias.inrees.com/img/graphics/v4/banner/banner_05.jpg"
//text
a= new Image();
a.src="http://medias.inrees.com/img/graphics/v4/banner/banner_text_01.png"
b= new Image();
b.src="http://medias.inrees.com/img/graphics/v4/banner/banner_text_02.png"
c= new Image();
c.src="http://medias.inrees.com/img/graphics/v4/banner/banner_text_03.png"
d= new Image();
d.src="http://medias.inrees.com/img/graphics/v4/banner/banner_text_04.png"
e= new Image();
e.src="http://medias.inrees.com/img/graphics/v4/banner/banner_text_05.png"

function mycarousel_initCallback(carousel) {
    jQuery('.jcarousel-control div').bind('click', function() {  //pager
        carousel.scroll(jQuery.jcarousel.intval(jQuery(this).attr("x")), false);
       // carousel.startAuto(0);
        return false;
    })
       jQuery('.jcarousel-control div').hover(function() {   //pager
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    })

    jQuery('#mycarousel-next').bind('click', function() {
        carousel.next();
 $("#text").hide().css({background:"url('http://medias.inrees.com/img/graphics/v4/banner/banner_text_0"+i+".png')", backgroundRepeat:"no-repeat"})


        return false;
    })

    jQuery('#mycarousel-prev').bind('click', function() {
        carousel.prev();
        return false;
    })

    // Disable autoscrolling if the user clicks the prev or next button.
   carousel.buttonNext.bind('click', function() {
       // carousel.startAuto(0);
    })
     carousel.buttonPrev.bind('click', function() {
      //  carousel.startAuto(0);
    })

    // Pause autoscrolling if the user moves with the cursor over the clip.
    carousel.clip.hover(function() {
        carousel.stopAuto();
       // $("#container_controls, .jcarousel-control").fadeIn()
    }, function() {
        carousel.startAuto();
            //  $("#container_controls, .jcarousel-control").hide()
    })

         jQuery('#text').hover(function() { //pause when hover text div
        carousel.stopAuto();
    }, function() {
        carousel.startAuto();
    })

}

function itemFirstInCallback_function(carousel, item, i, state){
   // alert( item.childNodes[0].src  )
//alert(i)
/*  if( i > $("#mycarousel img").length ) {
    i=1;
 }*/

$("#text").hide()
}

function onAfterAnimation_callback2(carousel, item, i, state){}


links=["http://www.inrees.com/Conferences/Jean-Yves-Leloup-apocalypse/","http://www.inrees.com/videos/201/"];

function itemFirstInCallback_function2(carousel, item, i, state){
k=i-1;

$("#text_a").attr("href", links[k])
$(".jcarousel-item-"+i+" a").attr("href", links[k])

$("#text").fadeIn("slow").css({background:"url('http://medias.inrees.com/img/graphics/v4/banner/banner_text_0"+i+".png')"})


$("div.carre:eq("+k+")").css({background:"url(http://medias.inrees.com/img/graphics/rond1.png)"}).siblings().css({background:"url(http://medias.inrees.com/img/graphics/rond2.png)"})

}


$(function(){
    // $(document).pngFix();

     function onAfter(curr,next,opts) {
	var caption1 = (opts.currSlide + 1) + '/' + opts.slideCount;
	$('span#cycle_counter').html(caption1);

    // $('div#text_cycle').html($(this).children().attr("text"));
     // $("div#text_cycle span#"+(opts.currSlide + 1)).fadeIn(100).siblings().hide()
}

    $('#cycle').cycle({
    fx:     'fade',
    speed:  200,
    next:   '#next2',
    prev:   '#prev2',
    after:onAfter,
    timeout: 0
});


	jQuery("#mycarousel").jcarousel({
		scroll: 1,
		initCallback: mycarousel_initCallback,
		itemFirstInCallback: {
			onBeforeAnimation: itemFirstInCallback_function,
			onAfterAnimation: itemFirstInCallback_function2
		},
		itemVisibleInCallback: {
		onBeforeAnimation: null,
		onAfterAnimation: null
		},
		itemLastInCallback:null,
		wrap:"last",
		//size:3,
		auto:4,
		animation:200,
    });

})</script>



<!--<div class="reperer" style="height:5px;"></div> -->



<div id="mycarousel" class="jcarousel-skin-tango" width="990" height="285" style="width: 990px; height: 285px;overflow: hidden">

<div id="container_controls"></div>

<div class="jcarousel-control" >
     <div class="carre" x="1"></div>
     <div class="carre" x="2"></div>
     <!--<div class="carre" x="3"></div> -->
     <!--<div class="carre" x="4"></div> -->
     <!--<div class="carre" x="5"></div> -->
</div>

<ul>
<li><a><img width="990" height="285" src="http://medias.inrees.com/img/graphics/v4/banner/banner_01.jpg" alt="" /></a></li>
<li><a><img width="990" height="285" src="http://medias.inrees.com/img/graphics/v4/banner/banner_02.jpg" alt="" /></a></li>
</ul>

<div id="mycarousel-prev"></div>
<div id="mycarousel-next"></div>

<a id="text_a" ><div id="text" style="display: none"></div></a>
</div>










<div class="repererb"></div>

<?php
include('/home/inrees/www/includes/themes-search.php') ;
?>


<div class="mbig">




<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:150px;margin-right:150px;">En ce moment sur INREES.com</h1></div>
<!--borderbot-->
<div class=" bulle20" style="height:250px;"><?php


$requete12 = "SELECT * FROM in_videos WHERE videos_top = '1' ";
$result12 = mysql_query($requete12);
$res77 = mysql_num_rows($result12);


////////////////////////////////// VIGNETTE 1   A ENELEVER DES THEMATIQUES

$x = 1 ;

if($res77 >= 1) {
$requete12 ="SELECT * FROM 2emag_articles, 2emag_themes, 2emag_themesDetails, 2emag_rubriques WHERE rubriques_id = articles_idrub AND themes_id = themesDetails_idtheme AND articles_idtheme = themesDetails_id AND articles_actif = '1' AND articles_online = '1' AND articles_idrub != '3' AND articles_idrub != '23' AND articles_idrub != '5' AND articles_blog = '0' ORDER BY articles_timestamp DESC LIMIT 4 " ;
} else {
$requete12 ="SELECT * FROM 2emag_articles, 2emag_themes, 2emag_themesDetails, 2emag_rubriques WHERE rubriques_id = articles_idrub AND themes_id = themesDetails_idtheme AND articles_idtheme = themesDetails_id AND articles_actif = '1' AND articles_online = '1' AND articles_idrub != '3' AND articles_idrub != '23' AND articles_idrub != '5' AND articles_top != '1' AND articles_mitop != '1' AND articles_bot != '1' AND articles_blog = '0' ORDER BY articles_timestamp DESC LIMIT 4 " ;
}

$result12 = mysql_query($requete12);
while($row = mysql_fetch_array($result12) )
{
		if($x == 1)
		{ // <div style="background-color:#2995c6;position:absolute;top:780px;padding:3px;max-width:120px;"><a class="white" href="#"><strong>'.$row['themesDetails_titre'].' » </strong></a></div>
			echo '<div class="thblocsL" style="height:215px;">' ;
			$id51=$row['articles_id'];
		}
		if($x == 2)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
			$id52=$row['articles_id'];
		}
		if($x == 3)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
			$id53=$row['articles_id'];
		}
		if($x == 4)
		{
			echo '<div class="thblocsR" style="height:215px;">' ;
			$id54=$row['articles_id'];
		}
		
		
	   
	   
	    $chaine = $row['articles_minidesc'];
		$max=60;
		
		if(strlen($chaine)>=$max)
		{
			$chaine=substr($chaine,0,$max);
			$espace=strrpos($chaine," ");
			$chaine=substr($chaine,0,$espace)."...";
		}
	
	
	//echo '<div><a class="darkbluegrey" href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><font style="font-family:INREESwebFontregular;font-size:14px;">'.$row['articles_minititre'].' »</font></a></div>' ;
	
	
	if($chaine != 0)
	{
		echo '<div style="width:147px;height:98px; background:url(\'http://medias.inrees.com/img/photos/'.$row['articles_photodir'].'.jpg\')"><a style="display:block;width:147px;height:98px;" href="http://www.inrees.com/articles/'.$row['articles_url'].'/">
		<img style="margin-top:5px;" src="http://medias.inrees.com/img/graphics/videoYT3.png" width="147" /></a></div>' ;
	}
	else
	{
		$themesDetails_color = $row['themesDetails_color'] ;
		
		// margin-top:75px; '.$row['themesDetails_minititre'].'
		echo '<div style=" background-color:#'.$themesDetails_color.'; position:absolute; margin-top:72px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase; font-family:INREESwebFontBold;">
		<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/'.$row['articles_url'].'/">'.$row['articles_minititre'].'</a></div>';
		
		echo '<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/">
	<img src="http://medias.inrees.com/img/photos/'.$row['articles_photodir'].'.jpg" style="margin-top:5px;" width="147" /></a>' ;
	}
	
	
	
	
	echo '
	<div class="padtitle"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><strong>'.strip_tags($row['articles_titre']).'</strong></a></div>
	<div class="gray" style="margin-top:2px;">'.$chaine.'</div>
	
	</div>';
	$x++;
}
?>
<div class="bulle10" style="width:630px;float:left;">

<!--<a href="http://www.inrees.com/articles/tous/0/0/1" class="button_gray noline"><span>Les nouveaux articles</span></a> -->

<div class="clear"></div>
<div class="bulle20" style="padding:10px;padding-top:10px;padding-bottom:10px;margin-top:15px; background-color:#f3f5f7;float:left;width:610px;">


<!--<div style="margin-left:5px;font-family:INREESwebFontBold;font-size:11px;float:left; padding:3px; padding-right:8px; padding-left:8px; background-color:#7387ac; color:white; margin-right:7px;">EN BREF</div>  -->

<div style="padding-top:3px;float:left;"><span class="gray"><a class="darkbluegrey" href="#">Dans l'actualité</a> : </span>



<?php $zzz=""; $d=mysql_query("SELECT tags_tag, COUNT(articlestags_tag) as total FROM 2emag_articles, 2emag_articlestags, in_tags WHERE tags_id = articlestags_tag AND articles_id = articlestags_idarticle AND TO_DAYS(NOW()) - TO_DAYS(articles_timestamp) < 50 GROUP BY tags_id ORDER BY total DESC LIMIT 7 ");
while($dRow=mysql_fetch_array($d)){ $zzz .= '<a '; $zzz .= ' href="rechercher.php?r='.$dRow["tags_tag"].'"><strong>'.$dRow["tags_tag"].'</strong></a> &#8226; '; } echo substr($zzz,0,-8) ; ?></div>

</div>



</div></div>







<div class="clear"></div>
<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontCond;font-size:25px; background-color:#fbfbfc;margin-left:185px;margin-right:185px;">On en parle à l'INREES</h1></div>




<div class="twoL bulle20" style="height:340px;">
<?php





if($res77 >= 1)
{



$linktext = "Voir la vidéo" ;



$requete12 = "SELECT * FROM in_videos WHERE videos_actif = '1' AND videos_online = '1' AND videos_top = '1' ORDER BY videos_id DESC LIMIT 1";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
	echo '<div class="bulle10" style="float:left;width:305px;">
	<a class="darkbluegrey" href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><span class="tith2">Vidéo : '.$row['videos_description'].'</span></a>
	</div>' ;
	
	echo '<div class=" bulle4" style="height:310px;">
	<div style="width:305px;float:left;height:270px;">' ;
	
	$link = "http://www.inrees.com/videos/".$row['videos_id']."/" ;
			
			$chaine = $row['videos_sst'];
			$max=80;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
	echo '<div style="height:250px;">
	<div style="width:305px;height:170px; background:url(\'http://medias.inrees.com/img/videos/home_'.$row['videos_id'].'.jpg\')"><a style="display:block;width:305px;height:170px;" href="http://www.inrees.com/videos/'.$row['videos_id'].'/">
	<img style="width:305px;height:170px;" src="http://medias.inrees.com/img/graphics/videoYT.png" /></a></div>
	
	
	<div class="padtitle"><a href="http://www.inrees.com/videos/'.$row['videos_id'].'/"><strong class="big">'.$row['videos_titre'].'</strong></a>' ;
	
	if(!empty($actifmini) )
	{
		echo '<br /><strong class="mini">'.$actifmini.'</strong>' ;
	}
	
	echo '</div>
	<div class="bulle14 gray">'.$chaine.'</div>
	
	</div>' ;
}

echo '</div>
<a href="'.$link.'" class="button_gray noline"><span>'.$linktext.'</span></a>
</div>
' ;






}
else
{




// DOSSIERS / PRATIQUE / TEMOIGNAGES / GRAND ENTRETIEN banni du haut...

$requete12 = "SELECT * FROM 2emag_articles, 2emag_rubriques, 2emag_themesDetails WHERE themesDetails_id = articles_idtheme AND rubriques_id = articles_idrub AND articles_top = '1' ORDER BY articles_id DESC LIMIT 1";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
	$id55 = $row['articles_id'] ;
	
	$titrerub = $row['rubriques_titre'] ;
	$idrubr = $row['rubriques_id'] ;
	
	$thematik = $row['themesDetails_titre'] ;
	$thematiknumber = $row['articles_idtheme'] ;
	
	$themesDetails_color = $row['themesDetails_color'] ;
	?>
	<div class="bulle10" style="float:left;width:305px; text-align:center;">
	<a class="darkbluegrey" href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><?php echo $row['articles_minititre'] ; ?> »</span></a></div>
	<?php
	echo '<div class=" bulle4" style="height:310px;">
	<div style="width:305px;float:left;height:270px;">' ;


			$chaine = $row['articles_minidesc'];
			$max=120 - strlen($row['articles_titre']);
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
	echo '<div style="height:250px;">' ;
	
	
	echo '<div style="font-family:INREESwebFontBold; background-color:#'.$themesDetails_color.'; position:absolute; margin-top:15px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
	<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_titre'].'</a></div>';
	
	// width:305px;height:170px;
	echo '<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/">
	<img style="width:297px;height:162px; padding:4px; border:1px solid #dfe0d6;" src="http://medias.inrees.com/img/magazine/home_'.$row['articles_photodir'].'.jpg" /></a>
	<div class="padtitle" style="text-align:center;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.$row['articles_titre'].'</font></a>' ;
	
	if(!empty($actifmini) )
	{
		echo '<br /><strong class="mini">'.$actifmini.'</strong>' ;
	}
	
	echo '</div>
	<div class="bulle14 gray" style="text-align:center;padding-left:3px;padding-right:3px;">'.$chaine.'</div>
	
	</div>' ;
	
	echo '</div>
	<div style="margin-left:112px;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/" class="button_gray noline"><span>Lire la suite</span></a></div>
	</div>' ;
}


}
?>
</div>



<div class="twoR bulle20" style="height:340px;">

<?php
$xyz = 1 ; // 1 = dans le magazine actif

if($xyz == 1)
{
?>



<div class="" style="float:left;width:305px; padding-bottom:5px; margin-bottom:5px; text-align:center;"><span class="darkbluegrey"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">
<?php
$requete12 = "SELECT * FROM admin_messages WHERE messages_id = '24' ";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
	echo $row['messages_text'] ;
}
?> »
</span></span></div>



<div class=" bulle4" style="height:310px;">

<div style="width:305px;float:left;height:270px;">


<?php
$requete12 = "SELECT * FROM 2emag_articles, 2emag_rubriques, 2emag_themesDetails WHERE themesDetails_id = articles_idtheme AND rubriques_id = articles_idrub AND articles_actif = '1' AND 
articles_id != '$id51' AND articles_id != '$id52' AND articles_id != '$id53' AND articles_id != '$id54' AND articles_top != '1' AND articles_bot != '1' AND TO_DAYS(NOW()) - TO_DAYS(articles_timestamp) < 100 ORDER BY articles_stats DESC LIMIT 3";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
			$thematiknumber = $row['themesDetails_id'];
			$thematik = $row['themesDetails_titre'];
			
			$themesDetails_color = $row['themesDetails_color'];
			
			
			$chaine = $row['articles_minidesc'];
			$max=55;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
?>
<div style="width:305px;float:left;">

<a href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/">
<img style="width:110px;margin-bottom:8px; margin-right:8px; margin-bottom:8px;" src="http://medias.inrees.com/img/photos/<?php echo $row['articles_photodir'] ; ?>.jpg" align="left" /></a>

<!--<div style="width:70px; height:70px; margin-bottom:8px; margin-right:8px; margin-bottom:8px; background:url('http://medias.inrees.com/img/photos/<?php echo $row['articles_photodir'] ; ?>.jpg'); float:left;"></div> -->





<div style=""><a href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/"><strong><?php echo $row['articles_titre'] ; ?></strong></a></div>


<!--<?php
echo '<div style="float:left;width:185px;"><div style=" background-color:#'.$themesDetails_color.'; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase; margin-bottom:5px; float:left;"><a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/'.$row['articles_url'].'/">'.$row['themesDetails_minititre'].'</a></div></div>'; ?> -->


<div style="margin-top:5px;margin-bottom:15px;" class="gray">
<?php echo $chaine ; ?></div>




</div>
<?php
}
?>

</div>

<!--Plus d'articles <?php echo $thematik ; ?> -->
<div><a href="http://www.inrees.com/articles/tous/0/0/1" class="button_gray noline"><span>Tous les articles</span></a></div>


<!--<a href="http://www.inrees.com/articles/tous/0/0/1" class="button_gray noline"><span>Tous</span></a><a href="http://www.inrees.com/Abonnement" class="button_blue noline white"><span>Je m'abonne</span></a>
 --></div>

<?php
}
?>


</div>








<div class="clear"></div>





<!--<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontregular;font-size:22px; background-color:#fbfbfc;margin-left:175px;margin-right:175px;">Les dernières vidéos</h1></div>




<div class=" bulle20" style="height:260px;"><?php // text-align:center;

//////////////////////////////////////////////////////////////////////// 1
$x = 1 ;
$requete12="SELECT themesDetails_minititre, themesDetails_id, themesDetails_color, agendaactivites_urlactiv, agendadetails_maphoto, agendadetails_theme, agendadetailsplus_dateD, agendadetails_id, agendadetails_theme, agendadetails_url, agendadetails_titre, agendadetails_sst FROM in_agendadetails, in_agendadetailsplus, in_podcasts, in_agendaactivites, 2emag_themesDetails WHERE themesDetails_id = agendadetails_theme AND in_agendadetails.agendadetails_activites = in_agendaactivites.agendaactivites_id AND in_agendadetails.agendadetails_id = in_podcasts.podcasts_idagenda AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateD < '$date' AND agendadetails_stats > '4000' AND agendadetails_id != '$id1bis' AND podcasts_actif = 'yes' GROUP BY agendadetails_id ORDER BY agendadetailsplus_dateF DESC LIMIT 4";
//echo $requete12 ;
$result12 = mysql_query($requete12);
while($row = mysql_fetch_array($result12) )
{
		if($x == 1)
		{ // <div style="background-color:#2995c6;position:absolute;top:780px;padding:3px;max-width:120px;"><a class="white" href="#"><strong>'.$row['themesDetails_titre'].' » </strong></a></div>
			echo '<div class="thblocsL" style="height:215px;">' ;
		}
		if($x == 2)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
		}
		if($x == 3)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
		}
		if($x == 4)
		{
			echo '<div class="thblocsR" style="height:215px;">' ;
		}
		
			$id1 = $row['agendadetails_id'];
			
			$chaine = $row['agendadetails_sst'];
			$max=70;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
		$themesDetails_color = $row['themesDetails_color'] ;
		
		// margin-top:75px;
		echo '<div style="font-family:INREESwebFontBold;background-color:#'.$themesDetails_color.'; position:absolute; margin-top:72px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
		<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/podcasts/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_minititre'].'</a></div>';
		
	
	
	echo '
	<a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">
	<img src="http://medias.inrees.com/img/photos/'.$row['agendadetails_maphoto'].'.jpg" style="margin-top:5px;" width="147" /></a>
	
	<div class="padtitle"><a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><strong>'.$row['agendadetails_titre'].'</strong></a></div>
	<div class="gray" style="margin-top:2px;">'.$chaine.'</div>
	
	</div>';
	$x++;
}
?>

<a href="http://www.inrees.com/podcasts/tous/0/0/1" class="button_gray noline"><span>Tous les podcasts</span></a>

</div>

<div class="clear"></div> -->











<div class="clear"></div>

<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:180px;margin-right:180px; background-color:#fbfbfc;">L'INREES vous conseille...</h1></div>














<div class="twoL  bulle20" style="padding-top:0px;margin-top:0px;">
<?php
$x = 1 ;
$dateDuJour = date('Y-m-d');

$sql="SELECT * FROM in_livres WHERE livres_selection >= '2' AND livres_actif = 'yes' AND livres_datesortie < '$dateDuJour' ORDER BY livres_datesortie DESC LIMIT 3";
//echo $sql ;
$livres = mysql_query($sql);
while($row=mysql_fetch_array($livres) )
{
	if($x == 1)
	{
		$idididlivvvre1 = $row['livres_id'] ;
	}
	if($x == 2)
	{
		$idididlivvvre2 = $row['livres_id'] ;
	}
	if($x == 3)
	{
		$idididlivvvre3 = $row['livres_id'] ;
	}
	
	$x++;
	
}

$sql="SELECT * FROM in_livres, 2emag_themesDetails WHERE livres_theme = themesDetails_id AND livres_id = '$idididlivvvre1' OR livres_theme = themesDetails_id AND livres_id = '$idididlivvvre2' OR livres_theme = themesDetails_id AND livres_id = '$idididlivvvre3' ORDER BY rand() LIMIT 1";
//echo $sql ;
$livres = mysql_query($sql);
echo '<div class="bulle10" style="text-align:center;">
<span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/livres">3 nouveaux livres »</a></span></div>' ;
while($row=mysql_fetch_array($livres) )
{
	$id = $row['livres_id'] ;
	$auteurs = $row['livres_auteur'] ; 
	
	echo '
	<div style="float:left;height:150px;margin-right:10px;">
	<a href="http://www.inrees.com/livres/'.$row['livres_url'].'/"><img src="http://medias.inrees.com/img/livres/couv_'.$row['livres_id'].'.jpg" height="135" /></a>
	</div>
	
	<div style="float:left;padding-top:5px;height:150px;">
	<div style="margin-bottom:2px;width:190px;float:left;"><a href="http://www.inrees.com/livres/'.$row['livres_url'].'/"><strong>'.$row['livres_titre'].'</strong></a></div>
	<div class="gray" style="margin-bottom:10px;max-width:190px;">' ;
	
	
        $chaine = $row['livres_description'];
		$max=70;

		if(strlen($chaine)>=$max)
		{
			$chaine=substr($chaine,0,$max);
			$espace=strrpos($chaine," ");
			$chaine=substr($chaine,0,$espace)."...";
		}
	
	
	// Les auteurs
	$auteur = '';
	$requete15 = "SELECT * FROM in_soutien, in_livresauteurs WHERE in_soutien.soutien_id = in_livresauteurs.livresauteurs_idauteur AND livresauteurs_idlivre = '$id' " ;
	$result15 = mysql_query($requete15);
	$res155 = mysql_num_rows($result15);
	while ($row15 = mysql_fetch_array ($result15) )
	{
		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '<a href="soutien.php?url='.$row15['soutien_url'].'">' ;
		}

		$auteur .= $row15['soutien_prenom'].' '.$row15['soutien_nom'] ;

		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '</a>' ;
		}

		$auteur .= ', ' ;
	}
		$auteur = substr($auteur,0,-2) ;
		$auteur = 'Par '.$auteur.' '.$auteurs.'<br />' ;
		if(strlen($auteur)> 60) { $auteur = "" ; }

	echo $auteur.'
	</div>' ;
	
	
	
	
	
	echo '
	<div style="max-width:190px;"><span class="gray">'.$chaine.'</span></div>' ;
	
	
	$themesDetails_color = $row['themesDetails_color'];
	echo '<div style="float:left;width:195px;"><div style="font-family:INREESwebFontBold;background-color:#'.$themesDetails_color.'; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase; margin-top:5px; float:left;"><a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/livres/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_minititre'].'</a></div></div>';

	
	
	echo '</div>' ;
}

echo '
<div class="clear"></div>' ;


$livres = mysql_query("SELECT * FROM in_livres WHERE livres_id != '$id' AND livres_selection >= '2' AND livres_actif = 'yes' AND livres_datesortie < '$dateDuJour' ORDER BY livres_datesortie DESC LIMIT 2");
while($row=mysql_fetch_array($livres) )
{
	$id = $row['livres_id'] ;
	
	// Les auteurs
	$auteur = '';
	$requete15 = "SELECT * FROM in_soutien, in_livresauteurs WHERE in_soutien.soutien_id = in_livresauteurs.livresauteurs_idauteur AND livresauteurs_idlivre = '$id' " ;
	$result15 = mysql_query($requete15);
	$res155 = mysql_num_rows($result15);
	while ($row15 = mysql_fetch_array ($result15) )
	{
		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '<a href="soutien.php?url='.$row15['soutien_url'].'">' ;
		}

		$auteur .= $row15['soutien_prenom'].' '.$row15['soutien_nom'] ;

		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '</a>' ;
		}

		$auteur .= ', ' ;
	}
		$auteur = substr($auteur,0,-2) ;
	
	// '.$chaine.'
	
echo '<div class="proghop classement" ';
	if($x == 2 || $x== 4)
	{
		echo ' style="background-color:#F3F5F7;" ' ;
	}
	echo '><a href="http://www.inrees.com/livres/'.$row['livres_url'].'/"><strong>'.$row['livres_titre'].'</strong></a></div>' ;
	
	$x++;
}
?>
<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;"><a href="http://www.inrees.com/livres" class="button_gray noline"><span>Tous les livres</span></a></div>

</div>
<div class="twoR  bulle20" style="padding-top:0px;margin-top:0px;">
<?php
$x = 1;
$sql="SELECT * FROM in_films WHERE films_actif = 'yes' AND films_selection >= '2' ORDER BY films_datesortiecinema DESC LIMIT 3";
$livres = mysql_query($sql);
while($row=mysql_fetch_array($livres) )
{
	if($x == 1)
	{
		$idididlivvvre1 = $row['films_id'] ;
	}
	if($x == 2)
	{
		$idididlivvvre2 = $row['films_id'] ;
	}
	if($x == 3)
	{
		$idididlivvvre3 = $row['films_id'] ;
	}
	
	$x++;
}

$sql="SELECT * FROM in_films, in_filmsgenreCat WHERE films_idgenre = filmsgenreCat_id AND films_id = '$idididlivvvre1' OR films_idgenre = filmsgenreCat_id AND films_id = '$idididlivvvre2' OR films_idgenre = filmsgenreCat_id AND films_id = '$idididlivvvre3' ORDER BY rand() LIMIT 1";
$livres = mysql_query($sql);
echo '<div class="bulle10" style="text-align:center;"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/films">3 nouveaux films »</a></span></div>' ;
while($row=mysql_fetch_array($livres) )
{
	$id = $row['films_id'] ;
	$auteurs = $row['films_realisateur'] ; 
	$idrea = $row['films_idrealisateur'] ; 
	
	echo '
	<div style="float:left;height:150px;padding-right:10px;">
	<a href="http://www.inrees.com/films/'.$row['films_url'].'/"><img src="http://medias.inrees.com/img/films/aff_'.$row['films_id'].'.jpg" height="135" /></a>
	</div>
	
	<div style="float:left;padding-top:5px;height:150px;">
	<a href="http://www.inrees.com/films/'.$row['films_url'].'/"><strong>'.$row['films_titre'].'</strong></a>
	<br /><div class="gray" style="margin-bottom:10px;max-width:140px;">' ;
	
	
        $chaine = $row['films_description'];
		$max=50;

		if(strlen($chaine)>=$max)
		{
			$chaine=substr($chaine,0,$max);
			$espace=strrpos($chaine," ");
			$chaine=substr($chaine,0,$espace)."...";
		}
	
	
	// Les auteurs
	$auteur = '';
	$requete15 = "SELECT * FROM in_soutien WHERE soutien_id = '$idrea' " ;
	$result15 = mysql_query($requete15);
	$res155 = mysql_num_rows($result15);
	while ($row15 = mysql_fetch_array ($result15) )
	{
		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '<a href="soutien.php?url='.$row15['soutien_url'].'">' ;
		}

		$auteur .= $row15['soutien_prenom'].' '.$row15['soutien_nom'] ;

		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '</a>' ;
		}

		$auteur .= ', ' ;
	}
		$auteur = substr($auteur,0,-2) ;

	echo 'Par '.$auteur.' '.$auteurs.'<br />
	</div>' ;
	
	
		//echo '<div style="float:left;width:205px;"><div style=" background-color:#'.$themesDetails_color.'; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase; margin-bottom:5px; float:left;"><a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/livres/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_minititre'].'</a></div></div>';

	
	
	echo '
	<div style="max-width:140px;"><span class="gray">'.$chaine.'</span></div>' ;
	
	
	echo '<div style="float:left;width:185px;"><div style="font-family:INREESwebFontBold;background-color:#a5bbc8; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase; margin-top:5px; float:left;"><a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/films/tous/'.$row['filmsgenreCat_id'].'/0/1">'.$row['filmsgenreCat_titre'].'</a></div></div>';
	
	
	echo '
	</div>' ;
}

echo '<div class="clear"></div>' ;


$livres = mysql_query("SELECT * FROM in_films WHERE films_id != '$id' AND films_actif = 'yes' ORDER BY films_datesortiecinema DESC LIMIT 2");
while($row=mysql_fetch_array($livres) )
{
	$id = $row['films_id'] ;
	$auteurs = $row['films_realisateur'] ; 
	$idrea = $row['films_idrealisateur'] ; 

	// Les auteurs
	$auteur = '';
	$requete15 = "SELECT * FROM in_soutien WHERE soutien_id = '$idrea' " ;
	$result15 = mysql_query($requete15);
	$res155 = mysql_num_rows($result15);
	while ($row15 = mysql_fetch_array ($result15) )
	{
		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '<a href="soutien.php?url='.$row15['soutien_url'].'">' ;
		}

		$auteur .= $row15['soutien_prenom'].' '.$row15['soutien_nom'] ;

		if($row15['soutien_actif'] == 'yes')
		{
		//$auteur .= '</a>' ;
		}

		$auteur .= ', ' ;
	}
		$auteur = substr($auteur,0,-2) ;
	
	// '.$chaine.'
	
echo '<div class="proghop classement" ';
	if($x == 2 || $x== 4)
	{
		echo ' style="background-color:#F3F5F7;" ' ;
	}
	echo '><a href="http://www.inrees.com/films/'.$row['films_url'].'/"><strong>'.$row['films_titre'].'</strong></a></div>' ;
	
	$x++;
}
?>
<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;"><a href="http://www.inrees.com/films" class="button_gray noline"><span>Les nouveaux films</span></a></div>

</div>
<div class="clear"></div>


















<!--<div class="clear"></div>
<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontregular;font-size:22px; background-color:#fbfbfc;margin-left:175px;margin-right:175px;">Pour aller plus loin...</h1></div>








<div class="twoL bulle20" style="height:350px;">
<?php
// DOSSIERS / PRATIQUE / TEMOIGNAGES / GRAND ENTRETIEN banni du haut...

$requete12 = "SELECT * FROM 2emag_articles, 2emag_rubriques, 2emag_themesDetails WHERE themesDetails_id = articles_idtheme AND rubriques_id = articles_idrub AND articles_top = '1' ORDER BY articles_id DESC LIMIT 1";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
	$titrerub = $row['rubriques_titre'] ;
	$idrubr = $row['rubriques_id'] ;
	
	$thematik = $row['themesDetails_titre'] ;
	$thematiknumber = $row['articles_idtheme'] ;
	?>
	<div class="bulle10" style="float:left;width:305px; text-align:center;">
	<a class="darkbluegrey" href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><?php echo $row['articles_minititre'] ; ?> »</span></a></div>
	<?php
	echo '<div class=" bulle4" style="height:310px;">
	<div style="width:305px;float:left;height:270px;">' ;


			$chaine = $row['articles_minidesc'];
			$max=80;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
	echo '<div style="height:250px;">' ;
	
	
	echo '<div style="font-family:INREESwebFontBold; background-color:#'.$themesDetails_color.'; position:absolute; margin-top:15px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
	<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_titre'].'</a></div>';
	
	// width:305px;height:170px;
	echo '<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/">
	<img style="width:297px;height:162px; padding:4px; border:1px solid #dfe0d6;" src="http://medias.inrees.com/img/magazine/home_'.$row['articles_photodir'].'.jpg" /></a>
	<div class="padtitle" style="text-align:center;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.$row['articles_titre'].'</font></a>' ;
	
	if(!empty($actifmini) )
	{
		echo '<br /><strong class="mini">'.$actifmini.'</strong>' ;
	}
	
	echo '</div>
	<div class="bulle14 gray" style="text-align:center;padding-left:3px;padding-right:3px;">'.$chaine.'</div>
	
	</div>' ;
	
	echo '</div>
	<div style="margin-left:111px;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/" class="button_gray noline"><span>Lire la suite</span></a></div>
	</div>' ;
}
?></div>


<div class="twoR  bulle30" style="padding-top:0px;margin-top:0px;">
<div class="bulle10" style="text-align:center;"><h2 style="font-family:INREESwebFontregular;font-size:20px;">Les conseils du jour »</h2></div>




<div class=" bulle4" style="height:125px;">

<div style="width:305px;float:left;height:110px;">


<?php
$requete12 = "SELECT * FROM 2emag_articles, 2emag_rubriques, 2emag_themesDetails WHERE themesDetails_id = articles_idtheme AND rubriques_id = articles_idrub AND articles_actif = '1' AND articles_mitop = '1' ORDER BY articles_stats DESC LIMIT 1";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
			$thematiknumber = $row['themesDetails_id'];
			$thematik = $row['themesDetails_titre'];
			
			$themesDetails_color = $row['themesDetails_color'];
			
			
			$chaine = $row['articles_minidesc'];
			$max=55;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
?>
<div style="width:305px;float:left;">

<a href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/">
<img style="width:110px;margin-bottom:8px; margin-right:8px; margin-bottom:8px;" src="http://medias.inrees.com/img/photos/<?php echo $row['articles_photodir'] ; ?>.jpg" align="left" /></a>







<div style=""><a href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/"><strong><?php echo $row['articles_titre'] ; ?></strong></a></div>





<div style="margin-top:5px;margin-bottom:15px;" class="gray">
<?php echo $chaine ; ?></div>




</div>
<?php
}
?>

</div>

<?php
$x=1;
$livres = mysql_query("SELECT * FROM in_agendadetails, in_agendadetailsplus, in_agendaactivites WHERE agendaactivites_id = agendadetails_activites AND agendadetails_id = agendadetailsplus_idagenda AND agendadetailsplus_actif = 'yes' AND agendadetails_online = '1' AND TO_DAYS(NOW()) - TO_DAYS(agendadetailsplus_dateD) < 500 GROUP BY agendadetails_id ORDER BY agendadetails_stats DESC LIMIT 5");
while($row=mysql_fetch_array($livres) )
{
			$chaine = $row['agendadetails_titre'];
			$max=45;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
	echo '<div class="proghop classement" ';
	if($x == 2 || $x== 4)
	{
		echo ' style="background-color:#F3F5F7;" ' ;
	}
	//<div style="padding-right:5px;display:inline;"><strong class="darkbluegrey">'.$x.'</strong></div>
	echo '><a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><strong>'.$row['agendadetails_titre'].'</strong></a></div>' ;

	$x++;
}
?>




</div>
<div class="bulletop10" style="width:630px;float:left;padding-bottom:5px;"><a href="http://www.inrees.com/livres" class="button_gray noline"><span>Tous les livres</span></a></div>

</div>
<div class="clear"></div> -->










































<div class="bulle10"  style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:180px;margin-right:180px; background-color:#fbfbfc;">Les évènements INREES</h1></div>


<div class="twoL bulle30" style="height:340px;">

<?php
$query=mysql_query("SELECT * FROM in_agendadetails, in_agendadetailsplus, in_agendaactivites, 2emag_themesDetails WHERE themesDetails_id = agendadetails_theme AND in_agendaactivites.agendaactivites_id = in_agendadetails.agendadetails_activites AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateF > '$date' AND agendadetailsplus_ventes < agendadetailsplus_stock AND agendadetailsplus_actif = 'yes' AND agendadetails_online = '1' AND agendadetails_activites != '12' ORDER BY agendadetailsplus_dateD ASC LIMIT 1");
while($row=mysql_fetch_array($query))
{
	echo '<div class="bulle10" style="text-align:center;"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">Bientôt à l\'INREES »</a></span></div>' ;
	
	echo '<div class=" bulle20" style="height:330px;">
<div style="width:305px;float:left;height:290px;">' ;
	
	
	$urlconf = 'http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/';
	$idevents = $row['agendadetails_id'];
	
	$thematiknumber = $row['agendadetails_theme'];
	$agendadetails_desctop = $row['agendadetails_desctop'];	
			
			$chaine = $row['agendadetails_sst'];
			$max=90;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
			
			$agenda_dateD = $row['agendadetailsplus_dateD'] ;
			$resACTannee3 = substr($agenda_dateD, 0, 4) ;
			$resACTmois3 = substr($agenda_dateD, 5, 2) ;
			$resACTjour3 = substr($agenda_dateD, 8, 2) ;
			$resACTheure3 = substr($agenda_dateD, 11, 2) ;
			$resACTmin3 = substr($agenda_dateD, 14, 2) ;

//		$themesDetails_color = $row['themesDetails_color'] ;
//		echo '<div style=" background-color:#'.$themesDetails_color.'; position:absolute; margin-top:85px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
//		<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_titre'].'</a></div>';

	echo '
	<a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">
	<img style="width:305px;height:170px; background-color:#003399; margin-bottom:3px;" src="http://medias.inrees.com/img/agenda/169_'.$row['agendadetails_id'].'.jpg" /></a>
	<div class="padtitle" style="text-align:center;"><a class="nounder" href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.$row['agendadetails_titre'].'</font></a></div>
	<div style="text-align:center;"><strong>'.$tab_jours[date('w', mktime(0,0,0,$resACTmois3,$resACTjour3,$resACTannee3))].' '.$resACTjour3.' '.$tab_mois[date('n', mktime(0,0,0,$resACTmois3,$resACTjour3,$resACTannee3))].' '.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'</strong></div>
	<div style="margin-top:5px;margin-bottom:15px;text-align:center;" class="gray">'.strip_tags($chaine).'
	</div>' ;
}


if(mysql_num_rows($query) == 0)
{
	
$query=mysql_query("SELECT * FROM in_agendadetails, in_agendadetailsplus, in_agendaactivites, 2emag_themesDetails WHERE themesDetails_id = agendadetails_theme AND in_agendaactivites.agendaactivites_id = in_agendadetails.agendadetails_activites AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_actif = 'yes' AND agendadetails_online = '1' AND agendadetails_activites = '1' AND agendadetails_activites != '12' ORDER BY agendadetailsplus_dateD DESC LIMIT 1");
while($row=mysql_fetch_array($query))
{
	echo '<div class="bulle10" style="text-align:center;"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">Dernièrement à l\'INREES »</a></span></div>' ;
	
	echo '<div class=" bulle20" style="height:330px;">
<div style="width:305px;float:left;height:290px;">' ;
	
	
	$urlconf = 'http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/';
	
	$idevents = $row['agendadetails_id'];
	
	$thematiknumber = $row['agendadetails_theme'];
	$agendadetails_desctop = $row['agendadetails_desctop'];	
	
	
	$idlast = $row['agendadetails_id'];	
			
			$chaine = $row['agendadetails_sst'];
			$max=90;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
			
			$agenda_dateD = $row['agendadetailsplus_dateD'] ;
			$resACTannee3 = substr($agenda_dateD, 0, 4) ;
			$resACTmois3 = substr($agenda_dateD, 5, 2) ;
			$resACTjour3 = substr($agenda_dateD, 8, 2) ;
			$resACTheure3 = substr($agenda_dateD, 11, 2) ;
			$resACTmin3 = substr($agenda_dateD, 14, 2) ;

		
//		$themesDetails_color = $row['themesDetails_color'] ;
//		echo '<div style="font-family:INREESwebFontBold;background-color:#'.$themesDetails_color.'; position:absolute; margin-top:125px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
//		<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/Evenements/tous/'.$row['themesDetails_id'].'/1">'.$row['themesDetails_titre'].'</a></div>';

	
	echo '
	<a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">
	<img style="width:305px;height:170px; background-color:#003399; margin-bottom:3px;" src="http://medias.inrees.com/img/agenda/169_'.$row['agendadetails_id'].'.jpg" /></a>
	<div class="padtitle" style="text-align:center;"><a class="nounder" href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.$row['agendadetails_titre'].'</font></a></div>
	<div style="text-align:center;"><strong>'.$tab_jours[date('w', mktime(0,0,0,$resACTmois3,$resACTjour3,$resACTannee3))].' '.$resACTjour3.' '.$tab_mois[date('n', mktime(0,0,0,$resACTmois3,$resACTjour3,$resACTannee3))].' '.$resACTannee3.' à '.$resACTheure3.'h'.$resACTmin3.'</strong></div>
	<div style="margin-top:5px;margin-bottom:15px;text-align:center;" class="gray">'.strip_tags($chaine).'
	</div>' ;
}
	
	
}

echo '</div>
<div style="margin-left:73px;"><a href="http://www.inrees.com/Evenements/programme" class="button_gray noline"><span>Découvrir le programme</span></a></div>
</div>
' ;
?>

</div>
<div class="twoR bulle30" style="height:340px;">


<?php
$requete12 = "SELECT * FROM 2emag_articles, in_agendaArticles WHERE agendaArticles_idarticle = articles_id AND articles_actif = '1' AND agendaArticles_idagenda = '$idevents' AND articles_mitop = '0' ORDER BY rand() LIMIT 3";
$result12 = mysql_query($requete12);
$res12 = mysql_num_rows($result12);

$requete13 = "SELECT * FROM 2emag_articles, in_agendaArticles WHERE agendaArticles_idarticle = articles_id AND articles_actif = '1' AND agendaArticles_idagenda = '$idevents' AND articles_mitopE = '1' ORDER BY agendaArticles_id ASC LIMIT 1";
$result13 = mysql_query($requete13);
$res13 = mysql_num_rows($result13);
?>

<div class="bulle4" style="height:320px;">

<div style="width:305px;float:left;height:280px;">


<div class="bulle10" style="text-align:center;"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/Evenements/tous/0/1">A revivre en vidéo »</a></span></div>

<?php
echo '<div class=" bulle20" style="height:330px;">
<div style="width:305px;float:left;height:290px;">' ;

$query=mysql_query("SELECT videos_myinrees, agendaactivites_urlactiv, agendadetails_maphoto, agendadetails_theme, agendadetailsplus_dateD, agendadetails_id, agendadetails_theme, agendadetails_url, agendadetails_titre, agendadetails_sst, agendadetails_presentation, videos_id FROM in_agendadetails, in_agendadetailsplus, in_videos, in_agendaactivites WHERE 

in_agendadetails.agendadetails_activites = in_agendaactivites.agendaactivites_id AND in_agendadetails.agendadetails_id = in_videos.videos_idagenda AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND videos_actif = '1' AND videos_online = '1' AND videos_myinrees = '1' AND agendadetails_id != '$idlast'  AND TO_DAYS(NOW()) - TO_DAYS(agendadetailsplus_dateD) < 120

GROUP BY videos_id

ORDER BY agendadetailsplus_dateF DESC LIMIT 1");
while($row=mysql_fetch_array($query))
{
	$id1bis = $row['agendadetails_id'];
			
			$chaine = $row['agendadetails_presentation'];
			$max=150;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	

	$url = 'http://www.inrees.com/videos/'.$row['videos_id'].'/';
	echo '
	<div style="width:305px;height:170px; background:url(\'http://medias.inrees.com/img/videos/home_'.$row['videos_id'].'.jpg\')"><a style="display:block;width:305px;height:170px;" href="http://www.inrees.com/videos/'.$row['videos_id'].'/">
	<img style="width:305px;height:170px;" src="';
	
		if($row['videos_myinrees'] == 1) {
			echo 'http://medias.inrees.com/img/graphics/videoYT4.png';
		}
		else
		{
			echo 'http://medias.inrees.com/img/graphics/videoYT.png';
		} 
	
	echo '" /></a></div>
	<div class="padtitle" style="text-align:center; margin-top:7px;"><a class="nounder" href="http://www.inrees.com/videos/'.$row['videos_id'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.strip_tags($row['agendadetails_titre']).'</font></a></div>
	<div style="margin-top:5px;margin-bottom:15px;text-align:center;" class="gray">'.$chaine.'
	</div>' ;
}

echo '</div>
<div style="margin-left:73px;"><a href="http://www.inrees.com/Evenements/tous/0/1" class="button_gray noline"><span>Revivre nos évènements</span></a></div>
</div>' ;
?>

</div></div></div>














<div class="clear"></div>
<div class="bulle10" style="margin-top:10px;"><a class="darkbluegrey" href="http://www.inrees.com/podcasts/tous/0/0/1"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;">Réécouter nos évènements en podcasts »</span></a></div>


<div class=" bulle20" style="height:270px;"><?php // text-align:center;

//////////////////////////////////////////////////////////////////////// 1
$x = 1 ;
$requete12="SELECT themesDetails_minititre, themesDetails_id, themesDetails_color, agendaactivites_urlactiv, agendadetails_maphoto, agendadetails_theme, agendadetailsplus_dateD, agendadetails_id, agendadetails_theme, agendadetails_url, agendadetails_titre, agendadetails_sst FROM in_agendadetails, in_agendadetailsplus, in_podcasts, in_agendaactivites, 2emag_themesDetails WHERE themesDetails_id = agendadetails_theme AND in_agendadetails.agendadetails_activites = in_agendaactivites.agendaactivites_id AND in_agendadetails.agendadetails_id = in_podcasts.podcasts_idagenda AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateD < '$date' AND agendadetails_stats > '4000' AND agendadetails_id != '$id1bis' AND podcasts_actif = 'yes' AND agendadetails_id != '$id1bis' GROUP BY agendadetails_id ORDER BY agendadetailsplus_dateF DESC LIMIT 4";
//echo $requete12 ;
$result12 = mysql_query($requete12);
while($row = mysql_fetch_array($result12) )
{
		if($x == 1)
		{ // <div style="background-color:#2995c6;position:absolute;top:780px;padding:3px;max-width:120px;"><a class="white" href="#"><strong>'.$row['themesDetails_titre'].' » </strong></a></div>
			echo '<div class="thblocsL" style="height:215px;">' ;
		}
		if($x == 2)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
		}
		if($x == 3)
		{
			echo '<div class="thblocsM" style="height:215px;">' ;
		}
		if($x == 4)
		{
			echo '<div class="thblocsR" style="height:215px;">' ;
		}
		
			$id1 = $row['agendadetails_id'];
			
			$chaine = $row['agendadetails_sst'];
			$max=70;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
		$themesDetails_color = $row['themesDetails_color'] ;
		
		// margin-top:75px;
		echo '<div style="font-family:INREESwebFontBold;background-color:#'.$themesDetails_color.'; position:absolute; margin-top:72px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
		<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/podcasts/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_minititre'].'</a></div>';
		
	
	
	echo '
	<a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">
	<img src="http://medias.inrees.com/img/photos/'.$row['agendadetails_maphoto'].'.jpg" style="margin-top:5px;" width="147" /></a>
	
	<div class="padtitle"><a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><strong>'.$row['agendadetails_titre'].'</strong></a></div>
	<div class="gray" style="margin-top:2px;">'.$chaine.'</div>
	
	</div>';
	$x++;
}
?>

<!--<a href="http://www.inrees.com/articles/tous/0" class="button_gray noline"><span>Tous les évènements</span></a> -->
<a href="http://www.inrees.com/podcasts/tous/0/0/1" class="button_gray noline"><span>Tous les podcasts</span></a>

</div>





<div class="clear"></div>

<div class="bulle10" style="text-align:center; background:url('http://medias.inrees.com/img/graphics/v4/trait-mid.jpg')">
<h1 style="font-family:INREESwebFontCond;font-size:25px;margin-left:135px;margin-right:135px; background-color:#fbfbfc;">A ne pas manquer sur INREES.com</h1></div>


<div class="twoL bulle30">
<?php
$requete12 = "SELECT * FROM 2emag_articles, 2emag_rubriques, 2emag_themesDetails WHERE themesDetails_id = articles_idtheme AND rubriques_id = articles_idrub AND articles_bot = '1' ORDER BY articles_id DESC LIMIT 1";
$result12 = mysql_query($requete12);
while ($row = mysql_fetch_array($result12) )
{
	$titrerub = $row['rubriques_titre'] ;
	$idrubr = $row['rubriques_id'] ;
	
	$thematik = $row['themesDetails_titre'] ;
	$thematiknumber = $row['articles_idtheme'] ;
	?>
	<div class="bulle10" style="float:left;width:305px;text-align:center;">
	<a class="darkbluegrey" href="http://www.inrees.com/articles/<?php echo $row['articles_url'] ; ?>/"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><?php echo $row['articles_minititre'] ; ?> »</span></a></div>
	<?php
	echo '<div class=" bulle4" style="height:310px;">
	<div style="width:305px;float:left;height:270px;">' ;


			$chaine = $row['articles_minidesc'];
			$max=80;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}
	
	echo '<div style="height:250px;">' ;
	
	//themesDetails_titre'.$row['articles_minititre'].'
	$themesDetails_color = $row['themesDetails_color'];
	echo '<div style="font-family:INREESwebFontBold;background-color:#'.$themesDetails_color.'; position:absolute; margin-top:15px; padding:3px; font-size:10px; color:#fff;padding-left:6px;padding-right:6px; text-transform:uppercase;">
	<a style="display:block;" class="onetitlewhiteno" href="http://www.inrees.com/articles/tous/'.$row['themesDetails_id'].'/0/1">'.$row['themesDetails_titre'].'</a></div>';
	
	// width:305px;height:170px;
	echo '<a href="http://www.inrees.com/articles/'.$row['articles_url'].'/">
	<img style="width:297px;height:162px; padding:4px; border:1px solid #dfe0d6;" src="http://medias.inrees.com/img/magazine/home_'.$row['articles_photodir'].'.jpg" /></a>
	<div class="padtitle" style="text-align:center;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/"><font style="font-family:INREESwebFontregular;font-size:21px;">'.$row['articles_titre'].'</font></a>' ;
	
	if(!empty($actifmini) )
	{
		echo '<br /><strong class="mini">'.$actifmini.'</strong>' ;
	}
	
	echo '</div>
	<div class="bulle14 gray" style="text-align:center;padding-left:3px;padding-right:3px;">'.$chaine.'</div>
	
	</div>' ;
	
	echo '</div>
	<div style="margin-left:111px;"><a href="http://www.inrees.com/articles/'.$row['articles_url'].'/" class="button_gray noline"><span>Lire la suite</span></a></div>
	</div>' ;
}
?>

</div>


<div class="twoR bulle30">

<div class="bulle10" style="text-align:center;"><span class="tith2" style="font-family:INREESwebFontregular;font-size:20px;"><a class="darkbluegrey" href="http://www.inrees.com/Evenements/programme">Ça s'est passé à l'INREES »</a></span></div>

<div class=" bulle4" style="height:310px;">

<div style="width:305px;float:left;height:270px;">


<?php
$query=mysql_query("SELECT * FROM in_agendadetails, in_agendadetailsplus, in_agendaactivites, in_podcasts WHERE

podcasts_idagenda = agendadetails_id AND in_agendaactivites.agendaactivites_id = in_agendadetails.agendadetails_activites AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateF < '$date' AND agendadetails_activites = '1' AND agendadetails_id < '$id1' AND TO_DAYS(NOW()) - TO_DAYS(agendadetailsplus_dateF) < '500' OR 

podcasts_idagenda = agendadetails_id AND in_agendaactivites.agendaactivites_id = in_agendadetails.agendadetails_activites AND in_agendadetails.agendadetails_id = in_agendadetailsplus.agendadetailsplus_idagenda AND agendadetailsplus_dateF < '$date' AND agendadetails_activites = '1' AND agendadetails_id < '$id1' AND agendadetails_stats > '2500' 

GROUP BY agendadetails_id ORDER BY rand() LIMIT 2");
while($row=mysql_fetch_array($query))
{
			$chaine = $row['agendadetails_sst'];
			$max=60;
			if(strlen($chaine)>=$max)
			{
				$chaine=substr($chaine,0,$max);
				$espace=strrpos($chaine," ");
				$chaine=substr($chaine,0,$espace)."...";
			}

	echo '
	<div style="height:110px;width:305px;float:left;"><a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/">
	<img style="width:147px;height:98px; background-color:#003399; margin-bottom:8px; margin-right:8px; margin-bottom:8px;" src="http://medias.inrees.com/img/agenda/affiche_'.$row['agendadetails_id'].'.jpg" align="left" /></a>
	<a href="http://www.inrees.com/'.$row['agendaactivites_urlactiv'].'/'.$row['agendadetails_url'].'/"><strong>'.$row['agendadetails_titre'].'</strong></a>
	<div style="margin-top:5px;margin-bottom:15px;" class="gray">'.$chaine.'</div></div>' ;
}

?>

</div>

<a href="http://www.inrees.com/Evenements/revivre" class="button_gray noline"><span>Plus d'évènements</span></a>
</div>

</div>





<!--<div class="twoR bulle30">

	<?php
	$livres = mysql_query("SELECT * FROM in_concours WHERE concours_actif = '1' AND concours_alaune = '1' ORDER BY concours_id DESC LIMIT 1");
	while($row=mysql_fetch_array($livres) )
	{
		$id = $row['concours_id'];
		$titre = $row['concours_titre'];
		
		$linktext = "En savoir plus" ;
	}
	?>
	<div class="bulle10" style="float:left;width:305px;">
	<a class="darkbluegrey" href="<?php echo $link ; ?>"><span class="tith2">Jeux concours</span></a></div>
	<div class="borderbot bulle4" style="height:310px;">
	<div style="width:305px;float:left;height:270px;">
	<div style="height:250px;">
	<a href="<?php echo $link ; ?>">
	<img style="width:305px;height:170px;" src="http://medias.inrees.com/img/concours/home_<?php echo $id ; ?>.jpg" /></a>
	<div class="padtitle"><a href="<?php echo $link ; ?>"><strong class="big"><?php echo $titre ; ?></strong></a>
	<br /><strong class="mini">En partenariat avec Mama Editions</strong>
	</div>
	<div class="bulle14 gray">xxx</div>
	
	</div>
	</div>
	<a href="<?php echo $link ; ?>" class="button_gray noline"><span><?php echo $linktext ; ?></span></a>
	</div>
	
</div> -->
























</div>



<div class="mbonus">

<?php
include('/FICHIERS POUR TEST/includes/pub_300x250.php');
include('/FICHIERS POUR TEST/includes/newsletter-INREES.php');

include('/FICHIERS POUR TEST/includes/abo-INREES.php');

include('/FICHIERS POUR TEST/includes/bientot-INREES.php');

//include('/FICHIERS POUR TEST/includes/pub_300x250.php');

include('/FICHIERS POUR TEST/includes/facebook-INREES.php');

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
include('/FICHIERS POUR TEST/includes/videos-INREES.php');
//include('/FICHIERS POUR TEST/includes/mag-INREES.php');

include('/FICHIERS POUR TEST/includes/twitter-INREES.php');
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


<?php  include('/FICHIERS POUR TEST/_bot_index.php'); include('/FICHIERS POUR TEST/_bot.php'); ?>
