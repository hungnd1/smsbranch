//========== Begin Doc Ready ===========
$(document).ready(function() {
	
	// Make embedded videos responsive
	$("main").fitVids();
	
	//Fix z-index youtube video embedding
	$('iframe').each(function(){
		var url = $(this).attr("src");
		$(this).attr("src",url+"?wmode=transparent");
	});
	
	// Dealership details print button
	$('.print-details').click(function(){
		 window.print();
	});
	
	// Mean Menu
	$('#nav').meanmenu({
		meanScreenWidth: "860",
		meanMenuContainer: '.mean-menu',
		meanMenuOpen: 'Show Menu <i class="icon-menu"></i>',
		meanMenuClose: 'Close Menu <i class="icon-cross"></i>'						  
	});
	
	// Cookie notice
	$(function() {	   
  		if($.cookie('cookie') != 'true'){	   
	  		$('#cookie-popin').show();	   
	  		$(".cookie-close").click(function() {
				$('#cookie-popin').hide();
				$.cookie('cookie', "true", { expires: 7, path: '/' });
	  		});
	    } else {
  			$('#cookie-popin').hide();	  
  		}
	});
	
	// Initialise responsive tabs
	$('.resp-tabs').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true,   // 100% fit in a container
			closed: 'accordion', // Start closed if in accordion view
			tabidentify: 'hor_1', // The tab groups identifier
			activate: function (event) { // Callback function if tab is switched
				var $tab = $(this);
				var $info = $('#tabInfo');
				var $name = $('span', $info);
				$name.text($tab.text());
				$info.show();
			}
			
			
	});
	
	// Force open finance tab
	if(window.location.href.indexOf("finance") > -1) {
		$(".tab-controls li.finance").addClass("resp-tab-active").siblings().removeClass("resp-tab-active");
		$(".resp-tab-content.finance").addClass("resp-tab-content-active").siblings().removeClass("resp-tab-content-active");
	}
	
	
	// Add class to similar cars
	$('#Similar_RepeaterUpdatePanel').addClass('carousel');		
	
	// Initialize Owl Carousel
	$('.carousel').owlCarousel({
		loop:true,
		responsiveClass:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:true,
		responsive:{
			0:{
				items:1,
				nav:false,
				dots:true
			},
			550:{
				items:2,
				nav:false,
				dots:true
			},
			700:{
				items:3,
				nav:false,
				dots:true
			},
			1000:{
				items:4,
				nav:false,
				dots:true
			}
		}
	});
	
	// Used Search Dropdown
    $("#search-dropdown-link").click(function() {
		$("#search-dropdown-link").toggleClass("open");
        $("#search-dropdown").slideToggle(800);	
     });
	
	// Add sticky class to nav when it hits top of viewport	
	$('#results-controls.sticky, #sticky-nav, #sticky-item').waypoint('sticky', {
	  offset: function() {
    	return +$("#header").outerHeight();
  	  }
	});
	
	// Sticky Used Nav
	var headerHeight = jQuery('#header').height();	

	$('#sticky-nav a[href*=#], a.enquire-drop, a.call-drop').click( function( event ) {
		var clicked = $(this);
		var offset = ( $( this.hash ) ) ? 0 : 200;
		if( $( this.hash ).offset() ) {
			var scrollTo = $( this.hash ).offset().top - Math.max( headerHeight + 30 , 0 ) + offset;
			scrollTo = ( scrollTo <= offset ) ? 120 : scrollTo;
			$( 'html, body' ).stop().animate( {
				scrollTop : scrollTo
			}, 500, function(){
					$('#sticky-nav li').removeClass('active');
					clicked.parent().addClass('active');
				});
		}
		event.preventDefault();
	});
	
	// Toggle list/grid view in used results
	function toggleListGrid() {
		if ( $.cookie('grid-view') ){
			$('body').addClass('grid-view');
			$('.grid-view .used-list-vehicle').matchHeight({
				byRow: true,
			});
		}
		$('.grid-toggle').click(function() {
			$.cookie('grid-view', 'true');	
			$('body').addClass('grid-view');
			$('.grid-view .used-list-vehicle').matchHeight({
				byRow: true,
			});
			return false;
		});	
		$('.list-toggle').click(function() {
			$.removeCookie('grid-view');
			$('body').removeClass('grid-view');
			$('.used-list-vehicle').removeAttr("style")
			return false;
		});	
	}
	toggleListGrid();

	// Hide COG validation asterisks when forms are submitted and apply a class to the element insted
	$("form").submit(function() {
		$("input.invalid, textarea.invalid, select.invalid").removeClass("invalid");					  
		$('span[id$="_Validation"]:visible').hide().prev("input, textarea, select").addClass("invalid");
		if ($(".invalid").length) {
			$("html, body").animate({
				scrollTop: $(".invalid:first").offset().top - 150
			}, 1500);
		}
		
	});
	
	// Remember state of cash/monthly price toggle
	$("#payment-type li a").click(function() {
		$("#payment-type select:hidden").val('-1');
		var paymentTypeTab = $("#payment-type").tabs("option", "active");
		$.cookie("paymentTypeTab", paymentTypeTab, {path: "/"}); 
	});
	if ($.cookie("paymentTypeTab")) {
		$("#payment-type").tabs( "option", "active", $.cookie("paymentTypeTab") );
	}
	
	// Remember window scroll position when finance is updated
	$('#COGWebzationSubmit_V1_WZButton, #COGCodeWeaverSubmit_V1_CWButton').click(function(){
		$.cookie('window', $(window).scrollTop(), {path: '/'}); 
	});		
	if ($.cookie('window') && $.cookie('window') > 0){
		$('html,body').scrollTop($.cookie('window'));
		$('.finance').trigger('click');
		$.removeCookie('window', { path: '/' });
	}
	
	// Remember window scroll position for cog forms
	$('#Enquiry_Type_Enquiry_Type').click(function(){
		$.cookie('window', $(window).scrollTop(), {path: '/'}); 
	});		
	if ($.cookie('window') && $.cookie('window') > 0){
		$('html,body').scrollTop($.cookie('window'));
		$.removeCookie('window', { path: '/' });
	}
	
	// Match height function
	$('.location .widget').matchHeight({
        byRow: false,
    });
	$('.cta-box.match').matchHeight({
        byRow: true,
    });	
	$('.offers-list .match').matchHeight({
        byRow: true,
    });	
	$('.shortlist .used-list-vehicle, classic-cars .used-list-vehicle').matchHeight({
        byRow: true,
    });	
	$('.grid-view .used-list-vehicle').matchHeight({
  byRow: true,
 });
	$('#used-details-tabs li[aria-controls="tab_item-1"]').click();
//========== End Doc Ready ===========
});




