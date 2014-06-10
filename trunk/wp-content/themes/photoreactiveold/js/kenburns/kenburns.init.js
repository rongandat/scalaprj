jQuery(document).ready(function($){

	//Detect Orientaiton change
	window.onload = orientationchange;
	window.onorientationchange = orientationchange;
	jQuery(window).bind("resize", orientationchange);
	function orientationchange() {
		slideshowify();
	}


	function slideshowify() {
		$('.slideshowifier').remove();
		if ($.fn.slideshowify) {
			jQuery('#kenburns-container img').slideshowify();
		}
	}

	$(window).load(function() {
		if ($.fn.slideshowify) {
			jQuery('.kenburns-preloader').remove();
			jQuery('#kenburns-container img').slideshowify();
		}
	});
	
});