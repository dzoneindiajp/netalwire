(function ($) {



// Preloader Image

	$(document).ready(function() {

		$('#loader').fadeOut('slow',function(){$(this).remove();});

	}); 



// Sticky Header 

  $(window).scroll(function() {

		if($('.header').length){

			var mainHeader = $('.header').height();

			var windowpos = $(window).scrollTop();

			if (windowpos >= mainHeader) {

				$('.header-sticky').addClass('sticked');

				

			} else {

				$('.header-sticky').removeClass('sticked');

				

			}

		}

   });		  

// Respoonsive Menu		  

  	$( ".navbar-nav li" ).click(function(event) {

        // stop bootstrap.js to hide the parents

        event.stopPropagation();

        // hide the open children

        $( this ).find(".sub-menu").removeClass('open');

        // add 'open' class to all parents with class 'dropdown-submenu'

		$( this ).parents(".sub-menu").addClass('open');
		
		$( this ).parents(".sub-menu-menu").addClass('open');

        // this is also open (or was)

        $( this ).toggleClass('open');

	});

	

// Scrool Function Back to  Top And Transparent Header

   $(window).scroll(function() {    

		var scroll = $(window).scrollTop();

		if(scroll >= 100) {

			$('.scroll-top').fadeIn(300);

			$(".header-fixed").addClass("fix");

			$(".header-transparent").addClass("transparency");

		} else {

			$('.scroll-top').fadeOut(300);

			$(".header-fixed").removeClass("fix");

			$(".header-transparent").removeClass("transparency");

		}

  });

// Scrool Function Back to  Top   

  $('.scroll-top').click(function(){ 

	 $("html, body").animate({ scrollTop: 0 }, 600); 

	 return false; 

  });

 

  // Main Menu Switch		  

$('.website-information-toggle').on('click',function(event){

	$('.website-information-toggle i').toggleClass("fa-plus fa-minus");	  

	$('.website-information-wrapper').toggleClass('active');	  

	$(this).toggleClass('active');	

	event.preventDefault();

});	

	

//Animated	

	 new WOW().init();	 





// Slider Carousel

$('.slider-carousel').slick({ 		

	arrows: false,

	dots: false,

	slidesToShow: 1,

	slidesToScroll: 1,

	infinite: true,

	swipe: false,

	fade: true,

	cssEase: "cubic-bezier(0.7, 0, 0.3, 1)",

	touchThreshold: 100,

	pauseOnHover: false,

	touchMove: true,

	draggable: true,

	autoplay: true,

	pauseOnHover: false,

	speed: 500,

	autoplaySpeed: 8e3,

	prevArrow: '<div class="slick-prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>',

	nextArrow: '<div class="slick-next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>',

});



var TxtType = function(el, toRotate, period) {

	this.toRotate = toRotate;

	this.el = el;

	this.loopNum = 0;

	this.period = parseInt(period, 10) || 2000;

	this.txt = '';

	this.tick();

	this.isDeleting = false;

};



TxtType.prototype.tick = function() {

	var i = this.loopNum % this.toRotate.length;

	var fullTxt = this.toRotate[i];



	if (this.isDeleting) {

	this.txt = fullTxt.substring(0, this.txt.length - 1);

	} else {

	this.txt = fullTxt.substring(0, this.txt.length + 1);

	}



	this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';



	var that = this;

	var delta = 200 - Math.random() * 100;



	if (this.isDeleting) { delta /= 2; }



	if (!this.isDeleting && this.txt === fullTxt) {

	delta = this.period;

	this.isDeleting = true;

	} else if (this.isDeleting && this.txt === '') {

	this.isDeleting = false;

	this.loopNum++;

	delta = 500;

	}



	setTimeout(function() {

	that.tick();

	}, delta);

};



window.onload = function() {

	var elements = document.getElementsByClassName('typewrite');

	for (var i=0; i<elements.length; i++) {

		var toRotate = elements[i].getAttribute('data-type');

		var period = elements[i].getAttribute('data-period');

		if (toRotate) {

		  new TxtType(elements[i], JSON.parse(toRotate), period);

		}

	}

	// INJECT CSS

	var css = document.createElement("style");

	css.type = "text/css";

	css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";

	document.body.appendChild(css);

};


// Load Login/Signup popup


$(".footer .map_marker").hover((function() {
	var e = $(this).attr("id");
	e = e.replace("map_", ""), $(".footer #" + e).toggleClass("hover")
}));
$(".footer .map_text_link").hover((function() {
	var e = $(this).attr("id");
	$(".footer #map_" + e).toggleClass("hover")
}));

// 
$('.search a').click(function(){ 
	$( '.aside-searchbox' ).toggleClass('open');
	$( '.aside-mailbox' ).removeClass('open');
 });

 $('.envelope a').click(function(){ 
	$( '.aside-mailbox' ).toggleClass('open');
	$( '.aside-searchbox' ).removeClass('open');
 });
 
	

}(jQuery));