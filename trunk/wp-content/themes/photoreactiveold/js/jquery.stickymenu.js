/*
 * jQuery Sticky Menu by Imaginem
 * Licensed under the MIT license (http://www.opensource.org/licenses/mit-license.php)
*/
jQuery(document).ready(function($){

	"use strict";
	
	var deviceAgent = navigator.userAgent.toLowerCase();
	var isIOS = deviceAgent.match(/(iphone|ipod|ipad)/);
	var ua = navigator.userAgent.toLowerCase();
	var isAndroid = ua.indexOf("android") > -1;

	var max_menu_width = 650;
	var min_window_height = 600;
	var sticky_navigation_offset_top = 61;
	
	var menubar_h = $('.top-menu-wrap').height();
	var logo_top = $('.logo').css('paddingTop');
	
	if (isIOS==null || isAndroid==null) {
		var sticky_navigation = function(){
			var scroll_top = $(window).scrollTop();
			if (scroll_top > sticky_navigation_offset_top) {
				$('.container-wrapper').css({'margin-top':'83px'});
				$('.stickymenu-zone').addClass('stickymenu-active');
			} else {
				sticky_navigation_reset();
			}   
		};
		var sticky_navigation_reset = function(){
			$('.container-wrapper').css({'margin-top':'0'});
			$('.stickymenu-zone').removeClass('stickymenu-active'); 
		};
		var sticky_navigation_init = function(){
			// run our function on load
			var windowHeight = $(window).height();
			var menuLength = $('.top-menu-wrap').width();
			if (menuLength > max_menu_width && windowHeight > min_window_height ) {
				sticky_navigation();
			}
		};
		$(window).scroll(function() {
			var windowHeight = $(window).height();
			sticky_navigation_init();
			if ( windowHeight < min_window_height ) {
				$('.container-outer').css({'margin-top':'0'});
			}
		});
		$(window).resize(function() {
			var windowHeight = $(window).height();
			var menuLength = $('.top-menu-wrap').width();
			if (menuLength < max_menu_width ) {
				sticky_navigation_reset();
			}
		});
	}
});