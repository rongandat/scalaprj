jQuery(document).ready(function($){
	"use strict";

	// cache container
	var $filterContainer = $('#gridblock-container');
	var AjaxPortfolio;
	var portfolio_height;
	var portfolio_width;
	var half_width;
	var image_height;
	var slideshow_active;
	var AutoStart;
	var ajax_image_height;
	var ajax_window_height;
	var $data;

	$('#gridblock-filters a').first().addClass('is-active');
	
	function PrettyPhotoLightbox() {
		jQuery("a[rel^='prettyPhoto']").prettyPhoto({
			opacity: 0.9,
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			default_width: 700,
			default_height: 444,
			overlay_gallery: false,
			show_title: false,
			social_tools: false
		});
	}
	
	function HoverEffect() {
		//Ajax Hover
		jQuery("div.gridblock-element").hover(
		function () {
			var GotImage = $(this).find(".preload-image");
			if (GotImage.is(':visible')) {
				portfolio_height=jQuery(this).height()-10;
				portfolio_width=jQuery(this).width();

				jQuery(this).find("span.ajax-image-hover")
				.css({ "display":"block", "left":"0", "height": ""+portfolio_height+"px", "width": ""+portfolio_width+"px"})
				.stop().animate({"top": "0","opacity" : "1"}, "normal");
			}
		},
		function () {
			jQuery(this).find("span.ajax-image-hover").stop().animate({"top": "10px","opacity" : "0"}, "fast");
		});

		//Thumbnails shortcode hover
		jQuery("div.thumbnails-shortcode ul li").hover(
		function () {

			var GotImage = $(this).find(".displayed-image");
			if (GotImage.is(':visible')) {
				portfolio_height=$(this).find("img.displayed-image").height();
				portfolio_width=$(this).find("img.displayed-image").width();

				jQuery(this).find(".gridblock-image-icon")
				.css({"display":"block", "top": "0", "left":"0" , "height" : portfolio_height + "px"})
				.stop().animate({"opacity" : "1"}, "normal");
			}
		},
		function () {
			jQuery(this).find(".gridblock-image-icon").stop().animate({"opacity" : "0"}, "fast");
		});

	}

	HoverEffect();
	PrettyPhotoLightbox();
	
});

jQuery(window).bind("load", function(e) {
	var AutoStart=false;
	var SlideStarted=false;
	jQuery('.ajax-next').addClass('ajax-nav-disabled').css('cursor','default');
	jQuery('.ajax-prev').addClass('ajax-nav-disabled').css('cursor','default');

});

(function($){
$(window).load(function(){

	// cache container
	var $filterContainer = $('#gridblock-container');
	var AjaxPortfolio;
	var portfolio_height;
	var portfolio_width;
	var half_width;
	var image_height;
	var slideshow_active;
	var AutoStart;
	var ajax_image_height;
	var ajax_window_height;
	var $data;
		
	var ajaxLoading=0;
	var SlideStarted=false;

    //variables to confirm window height and width
    var lastWindowHeight = $(window).height();
    var lastWindowWidth = $(window).width();

	//Detect Orientaiton change
	window.onload = orientationchange;
	window.onorientationchange = orientationchange;
	jQuery(window).bind("resize", orientationchange);
	function orientationchange() {
		isotopeInit();
	}

    $(window).resize(function() {

        //confirm window was actually resized
        if($(window).height()!=lastWindowHeight || $(window).width()!=lastWindowWidth){

            //set this windows size
            lastWindowHeight = $(window).height();
            lastWindowWidth = $(window).width();

            //call my function
            if ($.fn.isotope) {
            	$filterContainer.isotope( 'reLayout' );
        	}

           	ajax_image_height=jQuery('.displayed-image').height();
			$('.ajax-image-selector').css({"height" : ajax_image_height + "px"});

        }
    });

		//Filterables hover
		jQuery(".gridblock-grid-element,.gridblock-element").hover(
		function () {

			var GotImage = jQuery(this).find(".displayed-image");
			if (GotImage.is(':visible')) {

				portfolio_height=jQuery(this).height()-10;
				portfolio_width=jQuery(this).width();
				half_width=jQuery(this).width() / 2 ;

				image_height = jQuery(this).find(".displayed-image:visible").height();
				slideshow_active = jQuery(this).find(".flexslider");

				jQuery(this).find("span.boxtitle-hover")
				.stop().animate({"bottom": "0","opacity" : "1"}, "fast");

				jQuery(this).find("span.gridblock-image-hover")
				.css({"display":"block","left":"0", "height": ""+image_height+"px", "width": ""+half_width+"px"})
				.stop().animate({"top": "0","opacity" : "1"}, "fast");

				jQuery(this).find("span.gridblock-link-hover")
				.css({"display":"block","right":"0", "height": ""+image_height+"px", "width": ""+half_width+"px"})
				.stop().animate({"top": "0","opacity" : "1"}, "fast");

				jQuery(this).find("span.gridblock-link-hover a")
				.css({"display":"block","right":"0", "height": ""+image_height+"px", "width": ""+half_width+"px"});

				jQuery(this).find("span.gridblock-background-hover")
				.css({"display":"block","right":"0", "height": ""+image_height+"px", "width": ""+portfolio_width+"px"})
				.stop().animate({"top": "0","opacity" : "0.8"}, "normal");
			}
		},
		function () {
			jQuery(this).find("span.gridblock-image-hover,span.gridblock-link-hover")
			.stop().animate({"top": "10","opacity" : "0"}, "normal");
			jQuery(this).find("span.gridblock-background-hover")
			.stop().animate({"top": "0","opacity" : "0"}, "normal");
			jQuery(this).find("span.boxtitle-hover")
			.stop().animate({"bottom": "10px","opacity" : "0"}, "fast");
		});

	// Toggle - Show and Hide displayed portfolio showcase item
	jQuery("a.ajax-hide").click(
	function () {
		if ( jQuery(".ajax-gridblock-window").is(':animated') || jQuery(".ajax-gridblock-image-wrap").is(':animated') ) return;
		if (SlideStarted==false) {
			jQuery('.gridblock-ajax').eq(0).trigger('click');
		}
		jQuery('.ajax-gridblock-window').slideUp();
		$('.ajax-gallery-navigation').fadeOut();
	});
	
	AjaxPortfolio = function(e) {
		// Initialize
	    var page = 1;
	    var loading = true;
		var loaded = false;
	    var $window = jQuery(window);
	    var $content = jQuery("body #ajax-gridblock-wrap");
	    var $contentData = jQuery("body #ajax-gridblock-content");
		var total = jQuery('#gridblock-container .gridblock-ajax').length;
		var index;
		var nextStatus=true;
		var prevStatus=true;
		
		var isiPhone = navigator.userAgent.toLowerCase().indexOf("iphone");
		var isiPad = navigator.userAgent.toLowerCase().indexOf("ipad");
		var isiPod = navigator.userAgent.toLowerCase().indexOf("ipod");

		var deviceAgent = navigator.userAgent.toLowerCase();
		var isIOS = deviceAgent.match(/(iphone|ipod|ipad)/);
		var ua = navigator.userAgent.toLowerCase();
		var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");

		var altTotal=total-1;


	jQuery(".gridblock-ajax").click(function(){
	
		AutoStart=false;
		SlideStarted=true;

		ajax_image_height=jQuery('.displayed-image').height();
		$('.ajax-image-selector').css({"height" : ajax_image_height + "px"});

		$('.ajax-gallery-navigation').fadeIn();
		$('span.ajax-loading').show();
		//Get this index
		index=jQuery(".gridblock-ajax").index(this);
		//Store the navigation ID as the current element
		jQuery('.ajax-gallery-navigation').attr('id', index);
		
		//Get postID from rel attribute of link
		var postID = jQuery(this).attr("rel");
		//Grab the current displayed ID
		var DisplayedID = jQuery('.ajax-gallery-navigation').attr("rel");
		
		// Compare clicked and Displayed ID. Acts as Gatekeeper
		if (postID!=DisplayedID) {

			// Remove previous displayed set class
			jQuery('div').removeClass("gridblock-displayed");
		
			//Add portfolio post ID to attribute
			jQuery('.ajax-gallery-navigation').attr('rel', postID);
		
			//Add the class to currently viewing
			jQuery( '[data-portfolio=portfolio-'+postID+']').addClass('gridblock-displayed');


			var filtered_total = $('#gridblock-container div').not('.isotope-hidden').length;
			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $next_portfolio = $got_current.nextAll("div:not(.isotope-hidden)").first();
			var $prev_portfolio = $got_current.prevAll("div:not(.isotope-hidden)").first();

			if ($next_portfolio.length) {
				$('.ajax-next').removeClass('ajax-nav-disabled').css('cursor','pointer');
			} else {
				$('.ajax-next').addClass('ajax-nav-disabled').css('cursor','default');
			}
			if ($prev_portfolio.length) {
				$('.ajax-prev').removeClass('ajax-nav-disabled').css('cursor','pointer');
			} else {
				$('.ajax-prev').addClass('ajax-nav-disabled').css('cursor','default');
			}

			var sitewide = $('.top-menu-wrap').width();
			// If iphone then scroll to Ajax nav bar - otherwise top of page
			if(sitewide==470 || sitewide==758) {
				jQuery('html, body').stop().animate({
				    scrollTop: jQuery(".ajax-gridblock-block-wrap").offset().top - 20
				}, 1000);
			} else {
				jQuery('html, body').stop().animate({
				    scrollTop: jQuery(".ajax-gridblock-block-wrap").offset().top - 200
				}, 1000);
			}
			

				jQuery('#ajax-gridblock-loading').show();

				jQuery.ajax({
	                type       : "GET",
	                data       : { thepostID: postID },
	                dataType   : "html",
	                url        : mtheme_uri + "/includes/ajax-loader.php",
	                beforeSend : function(){
						ajax_window_height = $('#ajax-gridblock-content').height();
						$('.ajax-gridblock-window').css({'height': ajax_window_height + 'px'});
	                },
	                success    : function(data){
						loaded = true;
						jQuery('#ajax-gridblock-loading').hide();
						jQuery("#ajax-gridblock-content").remove();
						$('span.ajax-loading').hide();
	                    $data = $(data);

	                    if($data.length){

	                        $content.append($data);
							$('.ajax-gridblock-window').css({'height': 'auto'});
	                        jQuery('.ajax-gridblock-window').slideDown(500, function(){
								jQuery(".ajax-gridblock-image-wrap").fadeTo(100, 1);
								jQuery(".ajax-gridblock-data, .ajax-gridblock-contents-wrap").fadeIn();
	                            loading = false;
	                        });
							jQuery('.ajax-gridblock-image-wrap img').bind('load', function() {
								jQuery('.ajax-gridblock-image-wrap img').fadeTo(100, 1);
								//$('.ajax-portfolio-image-wrap').css({'background': 'none'});
							});

								jQuery("#flex1").flexslider({
									slideshow: false,
									pauseOnAction: true,
									pauseOnHover: true,
									controlsContainer: "flexslider-container1",
									before: function(){
										jQuery('.flexslider-container-page,.ajax-gridblock-image-wrap').css('background-image','none');
									}
								});
								
							
	                    } else {
	                        jQuery('#ajax-gridblock-loading').hide();
	                    }
	                },
	                error     : function(jqXHR, textStatus, errorThrown) {
	                    jQuery('#ajax-gridblock-loading').hide();
	                    alert(jqXHR + " :: " + textStatus + " :: " + errorThrown);
	                }
	        	});

			return false;
			}
		});
	
	}
	
	function AjaxNavigation() {

		// Next Clicked
		$('.ajax-next').click(function(){
			
			if ( $(".ajax-gridblock-window").is(':animated') || $(".ajax-gridblock-image-wrap").is(':animated') ) return;

			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $next_portfolio = $got_current.nextAll("div:not(.isotope-hidden)").first();
			
			if ($next_portfolio.length) {
				$next_portfolio.find(".gridblock-ajax").trigger('click');
			}
			
			return false;

		});

		// Clicked Prev	

		$('.ajax-prev').click(function(){
			
			if ( $(".ajax-gridblock-window").is(':animated') || $(".ajax-gridblock-image-wrap").is(':animated') ) return;

			var $got_current = $filterContainer.find(".gridblock-displayed");
			var $prev_portfolio = $got_current.prevAll("div:not(.isotope-hidden)").first();

			$prev_portfolio.find(".gridblock-ajax").trigger('click');
			
			return false;
		});	
	}
	
	
	function isotopeInit() {
		// initialize isotope
		if ($.fn.isotope) {
			$filterContainer.isotope({
			animationEngine : 'jquery',
			layoutMode : 'fitRows',
			  masonry: {
			    gutterWidth: 0
			  }
			});
		}
	}
	function isotopeClicks() {
		// filter items when filter link is clicked
		$('#gridblock-filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  var filter_title = $(this).attr('data-title');
		  $filterContainer.isotope({ filter: selector });

		  $('#gridblock-filters a').removeClass('is-active');
		  $(this).addClass('is-active');

			$('.gridblock-filter-wrap h2').text(filter_title);
			// Set index to zero and disable prev
			$('.ajax-gallery-navigation').attr('id', '-1');
			$('.ajax-prev').css('cursor','default');

		  return false;
		});
	}


	AjaxPortfolio();
	AjaxNavigation();
	isotopeInit();
	isotopeClicks();
})
})(jQuery);
