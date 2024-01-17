
$( document ).ready(function() {
  //alert('OK');
 

  fetchEvents();

  function fetchEvents() {
    $.ajax({
			url:"<?php echo URL;?>dashboard/fetchevents",
			method:"POST",
			data:{action:"fetchEvents"},
			success:function(data){
        //alert(data);
			 $('.fetchevents').html(data);
			 
			}
		 })
  }

  $('#myModal').modal('hide')
  setTimeout(function() {$('#myModal').modal('hide');}, 15000);  
   
$(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('#toTop').fadeIn();
        $('.mainNavi').addClass('bg-white').fadeIn();
        $('.mainNavi').addClass('mainNaviBox').fadeIn();
        /*$('.navbar').addClass('bg-white').fadeIn();*/
        /*$('.navbar').removeClass('pt-5').fadeIn();*/
    } else {
        $('#toTop').fadeOut();
        $('.mainNavi').removeClass('bg-white').fadeIn();
        $('.mainNavi').removeClass('mainNaviBox').fadeIn();
        /*$('.navbar').removeClass('bg-white').fadeIn();*/
        /*$('.navbar').addClass('pt-5').fadeIn();*/
    }
});

$("#toTop").click(function () {
  $("html, body").animate({scrollTop: 0}, 3000);
});

$('#recipeCarousel').carousel({
  interval: 10000
});
$('#recipeCarousel2').carousel({
  interval: 10000
});
$('.recipeCarousel .carousel-item').each(function(){
    var next = $(this).next();
	 //alert(next);
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<4;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
      }
});
$('.recipeCarousel2 .carousel-item').each(function(){
    var next = $(this).next();
	 //alert(next);
    if (!next.length) {
    next = $(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));

    for (var i=0;i<1;i++) {
        next=next.next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }

        next.children(':first-child').clone().appendTo($(this));
      }
});
AOS.init();


});

