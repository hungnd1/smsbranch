// Preload large image files after the page has finished loading
function preloader() {
}
function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
addLoadEvent(preloader);

function function_name(home_id) {

	$('.home').removeClass('home_active');
	$('#home'+home_id).addClass("home_active");
}

//========== Begin Doc Ready ===========
$(document).ready(function() {
	
	$('.ie8 #full-image, .ie7 #full-image, .ie8 #full-slider, .ie7 #full-slider').css('height', $(window).height()+'px');
	
	// Change active link on group home
	$("#brands ul li").on('mouseenter', function() {
		$("#brands ul li").removeClass("child-active");
		$(this).addClass("child-active");
	});
	
	// Change link and background image on group home
	$('#brands ul li a.aston-martin').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("aston-martin");
	   	$('#full-image a').attr("href", "/aston-martin")
	});
	
	$('#brands ul li a.bentley').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("bentley");
	   	$('#full-image a').attr("href", "/bentley")
	});
	
	$('#brands ul li a.bugatti').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("bugatti");
	   	$('#full-image a').attr("href", "/bugatti")
	});
	
	$('#brands ul li a.ferrari').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("ferrari");
	   	$('#full-image a').attr("href", "/ferrari")
	});
	
	$('#brands ul li a.lamborghini').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("lamborghini");
	   	$('#full-image a').attr("href", "/lamborghini")
	});
	
	$('#brands ul li a.maserati').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("maserati");
	   	$('#full-image a').attr("href", "/maserati")
	});
	
	$('#brands ul li a.rolls-royce').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("rolls-royce");
	   	$('#full-image a').attr("href", "/rolls-royce")
	});
	
	$('#brands ul li a.audi').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("audi");
	   	$('#full-image a').attr("href", "/audi")
	});
	
	$('#brands ul li a.bmw').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("bmw");
	   	$('#full-image a').attr("href", "/bmw")
	});
	
	$('#brands ul li a.mini').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("mini");
	   	$('#full-image a').attr("href", "/mini")
	});
	
	$('#brands ul li a.lotus').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("lotus");
	   	$('#full-image a').attr("href", "/lotus")
	});
	
	$('#brands ul li a.classic-cars').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("classic-cars");
	   	$('#full-image a').attr("href", "/classic-cars")
	});
	
	$('#brands ul li a.luxury-hire').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("luxury-hire");
	   	$('#full-image a').attr("href", "/luxury-hire")
	});
	
	$('#brands ul li a.chauffeur').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("chauffeur");
	   	$('#full-image a').attr("href", "/chauffeur")
	});
	
	$('#brands ul li a.ecurie').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("ecurie");
	   	$('#full-image a').attr("href", "/ecurie")
	});
	
	$('#brands ul li a.bac').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("bac");
	   	$('#full-image a').attr("href", "/bac")
	});
	
	$('#brands ul li a.used-box').on('mouseenter', function(){
		$('#full-image').removeClass();
	   	$('#full-image').addClass("used-box");
	   	$('#full-image a').attr("href", "/approved-used/")
	});
	
	// Fade in selected elements on the homepage when view
	$(function(){
	$(window).bind("resize",function(){
		console.log($(this).width())
		if($(this).width() <900){
			$('#full-image').removeClass();
			$('#full-image a').removeAttr("href");
			$("#brands ul li").removeClass("child-active");
		}
	})
	})

	// Footer show/hide
	function footerShowHide() {
		$("#footer-toggle, #slide-footer, #footer-blackout").toggleClass('open');
		$('#slide-footer').css({bottom: "-" + $('#slide-footer').height()});
		if ( $("#footer-toggle").hasClass('open') ){
			$('#footer-blackout').show().fadeTo(800, 0.7);
			$('#slide-footer').animate({
				bottom: 0
			}, 800 );
		} else {
			$('#footer-blackout').fadeTo(800, 0, function() {
				$('#footer-blackout').hide();
			});
			$('#slide-footer').animate({
				bottom: "-" + $('#slide-footer').height()
			}, 800 );
		}	
	}
	$('#footer-toggle, #footer-blackout').click(footerShowHide);
	
	// Brand select show/hide
	function brandSelectShowHide() {
		$("#brand-dropdown-link, #brand-select, #brand-blackout").toggleClass("open");
		$("#brand-dropdown").slideToggle();	
		if ( $("#brand-dropdown-link").hasClass("open") ){
			$('#brand-blackout').show().fadeTo(800, 0.7);
		} else {
			$('#brand-blackout').fadeTo(800, 0, function() {
				$('#brand-blackout').hide();
			});
		}	
	}
	$('#brand-dropdown-link, #brand-blackout').click(brandSelectShowHide);
	
	// Contact select show/hide
	function contactSelectShowHide() {
		$("#contact-dropdown-link, #contact-select, #contact-blackout").toggleClass("open");
		$("#contact-dropdown").slideToggle();	
		if ( $("#contact-dropdown-link").hasClass("open") ){
			$('#contact-blackout').show().fadeTo(800, 0.7);
		} else {
			$('#contact-blackout').fadeTo(800, 0, function() {
				$('#contact-blackout').hide();
			});
		}	
	}
	$('#contact-dropdown-link, #contact-blackout').click(contactSelectShowHide);
	
//========== End Doc Ready ===========
});



