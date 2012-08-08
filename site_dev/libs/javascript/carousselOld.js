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


links=["http://localhost/boutique_articles.php?idProduit=49","http://localhost/Conferences/Jean-Yves-Leloup-apocalypse/"];

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
       // size:3,
        auto:4,
        animation:200
    });

})