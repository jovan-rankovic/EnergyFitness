 /* jQuery Pre loader
  -----------------------------------------------*/
$(window).load(function(){
    $('.preloader').fadeOut(1000); // set duration in brackets    
});

/* HTML document is loaded. DOM is ready. 
-------------------------------------------*/
$(document).ready(function() {

  /* Template navigation
  -----------------------------------------------*/
    $('.main-navigation').onePageNav({
        scrollThreshold: 0.2, // Adjust if Navigation highlights too early or too late
        scrollOffset: 75, //Height of Navigation Bar
        filter: ':not(.external)',
        changeHash: true
    });

    /* Navigation visible on Scroll */
    mainNav();
    $(window).scroll(function () {
        mainNav();
    });

    function mainNav() {
        var top = (document.documentElement && document.documentElement.scrollTop) || document.body.scrollTop;
        if (top > 40) $('.sticky-navigation').stop().animate({
            "opacity": '1',
            "top": '0'
        });
        else $('.sticky-navigation').stop().animate({
            "opacity": '0',
            "top": '-75'
        });
    }

   /* Hide mobile menu after clicking on a link
    -----------------------------------------------*/
    $('.navbar-collapse a').click(function(){
        $(".navbar-collapse").collapse('hide');
    });

  /*  smoothscroll
  ----------------------------------------------*/
   $(function() {
        $('.navbar-default a, #welcome a, #about a').bind('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 49
            }, 1000);
            event.preventDefault();
        });
    });

 /* Parallax section
    -----------------------------------------------*/
  function initParallax() {
    $('#welcome').parallax("100%", 0.1);
    $('#about').parallax("100%", 0.3);
    $('#trainers').parallax("100%", 0.2);
    $('#contact').parallax("100%", 0.3);
    $('#blog').parallax("100%", 0.1);
    $('#prices').parallax("100%", 0.2);
    $('#map').parallax("100%", 0.2);

  }
  initParallax();

  /* WOW
  -------------------------------*/
  new WOW({ mobile: false }).init();

  // User image update
  $("#profile-image").on("click", function() {
    $("#imgUser").click();
  });

});

 // Google Maps API

 function initMap() {

     var uluru = {lat: 40.7430478, lng: -73.9967095};
     var map = new google.maps.Map(document.querySelector('#map'), {
         zoom: 15,
         scrollwheel: false,
         center: uluru,
         styles: [
             {
                 "featureType": "road.highway",
                 "elementType": "geometry",
                 "stylers": [
                     { "saturation": -100 },
                     { "lightness": -8 },
                     { "gamma": 1.18 }
                 ]
             }, {
                 "featureType": "road.arterial",
                 "elementType": "geometry",
                 "stylers": [
                     { "saturation": -100 },
                     { "gamma": 1 },
                     { "lightness": -24 }
                 ]
             }, {
                 "featureType": "poi",
                 "elementType": "geometry",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "administrative",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "transit",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "road",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "administrative",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "landscape",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }, {
                 "featureType": "poi",
                 "stylers": [
                     { "saturation": -100 }
                 ]
             }
         ]
     });

     var marker = new google.maps.Marker({
         position: uluru,
         map: map
     });
 }

 // Log in/Sign up modal

 $(window, document, undefined).ready(function() {
     $('.input').blur(function() {
         var $this = $(this);
         if ($this.val())
             $this.addClass('used');
         else
             $this.removeClass('used');
     });
 });

 $('#tab1').on('click' , function(){
     $('#tab1').addClass('login-shadow');
     $('#tab2').removeClass('signup-shadow');
 });

 $('#tab2').on('click' , function(){
     $('#tab2').addClass('signup-shadow');
     $('#tab1').removeClass('login-shadow');
 });