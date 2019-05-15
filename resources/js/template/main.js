 AOS.init({
 	duration: 800,
 	easing: 'slide',
 	once: true
 });

 jQuery(document).ready(function($) {
 	"use strict";

 	var random= Math.floor(Math.random() * 6) + 1;
 	$("#hero").css('background-image', "url(images/photos/" + random + ".jpg)");
 	

 	var softScroll = function() {
 		$('a[href*="#"]').on('click', function(e) {
 			e.preventDefault()

 			$('html, body').animate(
 			{
 				scrollTop: $($(this).attr('href')).offset().top,
 			},
 			500,
 			'linear'
 			)

 			var id = $(this).attr('href');

 			$('.site-menu li').removeClass('active');
 			$(".site-menu li a[href=" + id + "]").parent().addClass('active');

 			$('.site-nav-wrap li').removeClass('active');
 			$(".site-nav-wrap li a[href=" + id + "]").parent().addClass('active');
 		})
 	};
 	softScroll();

	// Get the navbar
	var navbar = document.getElementById("navbar");

	// Get the offset position of the navbar
	var aboutPosition = document.getElementById("about").offsetTop;

	window.onscroll = function() {
		if (window.pageYOffset >= aboutPosition) {
			navbar.classList.add("sticky")
		} else {
			navbar.classList.remove("sticky");
		}
	};

	var siteMenuClone = function() {

		$('.js-clone-nav').each(function() {
			var $this = $(this);
			$this.clone().attr('class', 'site-nav-wrap').appendTo('.site-mobile-menu-body');
 			softScroll();

		});


		setTimeout(function() {

			var counter = 0;
			$('.site-mobile-menu .has-children').each(function(){
				var $this = $(this);

				$this.prepend('<span class="arrow-collapse collapsed">');

				$this.find('.arrow-collapse').attr({
					'data-toggle' : 'collapse',
					'data-target' : '#collapseItem' + counter,
				});

				$this.find('> ul').attr({
					'class' : 'collapse',
					'id' : 'collapseItem' + counter,
				});

				counter++;

			});

		}, 1000);

		$('body').on('click', '.arrow-collapse', function(e) {
			var $this = $(this);
			if ( $this.closest('li').find('.collapse').hasClass('show') ) {
				$this.removeClass('active');
			} else {
				$this.addClass('active');
			}
			e.preventDefault();  

		});

		$(window).resize(function() {
			var $this = $(this),
			w = $this.width();

			if ( w > 768 ) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		})

		$('body').on('click', '.js-menu-toggle', function(e) {
			var $this = $(this);
			e.preventDefault();

			if ( $('body').hasClass('offcanvas-menu') ) {
				$('body').removeClass('offcanvas-menu');
				$this.removeClass('active');
			} else {
				$('body').addClass('offcanvas-menu');
				$this.addClass('active');
			}
		}) 

		// click outisde offcanvas
		$(document).mouseup(function(e) {
			var container = $(".site-mobile-menu");
			if (!container.is(e.target) && container.has(e.target).length === 0) {
				if ( $('body').hasClass('offcanvas-menu') ) {
					$('body').removeClass('offcanvas-menu');
				}
			}
		});
	}; 
	siteMenuClone();

	var siteCountDown = function() {
		$('#date-countdown').countdown('2019/06/09 08:30:00', function(event) {
			var $this = $(this).html(event.strftime('Faltam '
				+ '<span class="countdown-block"><span class="label">%-w semana%!w:s;</span>, </span>'
				+ '<span class="countdown-block"><span class="label">%-d dia%!d:s;</span>, </span>'
				+ '<span class="countdown-block"><span class="label">%-H hora%!H:s;</span>, </span>'
				+ '<span class="countdown-block"><span class="label">%-M minuto%!M:s;</span> e </span>'
				+ '<span class="countdown-block"><span class="label">%-S segundo%!S:s;</span></span>'));
		});

	};
	siteCountDown();
});