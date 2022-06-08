(function($) {

	"use strict";

	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	var carousel = function() {
		$('.featured-carousel').owlCarousel({
		loop:true,
		autoplay: true,
		margin:30,
		animateOut: 'fadeOut',
		animateIn: 'fadeIn',
		nav:true,
		dots: false,
		autoplayHoverPause: true,
		items: 1,
			responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:6		
			}
		}
		});

	};
	carousel();

})(jQuery);