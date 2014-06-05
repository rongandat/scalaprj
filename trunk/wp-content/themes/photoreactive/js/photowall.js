jQuery(window).bind("load", function() {
    jQuery('.photowall-item').css('opacity', '1');
});
jQuery(document).ready(function($) {
    var $wallContainer = $('#photowall-container');
    var $wallWrap = $('.photowall-wrap');

    //variables to confirm window height and width
    var wall_lastWindowHeight = $(window).height();
    var wall_lastWindowWidth = $(window).width();

    $(window).resize(function() {

        //confirm window was actually resized
        if ($(window).height() != wall_lastWindowHeight || $(window).width() != wall_lastWindowWidth) {

            //set this windows size
            wall_lastWindowHeight = $(window).height();
            wall_lastWindowWidth = $(window).width();

            //call my function
            photoWallInit();
            $(".photowall-content-wrap").css({"display": "block", "height": "100%", "width": "100%"});

        }
    });

    photoWallInit();

    function photoWallInit() {
        // initialize isotope photowall-container
        if ($.fn.isotope) {

            var photow_window_width = $(window).width();
            var wallContainer_w = $("#photowall-container").width();

//			number_of_columns = 4;
//			$('.photowall-item').css('width','24.9%');
//			$('.photowall-wrap').css('marginLeft','321px');
            number_of_columns = 3;
            $('.photowall-item').css('width', '33.2%');
            $('.photowall-wrap').css('marginLeft', '0');

            if (photow_window_width < 1300) {
                number_of_columns = 3;
                $('.photowall-item').css('width', '33.2%');
                $('.photowall-wrap').css('marginLeft', '0');
            }

            if (photow_window_width < 1000) {
                number_of_columns = 2;
                $('.photowall-item').css('width', '49.9%');
                $('.photowall-wrap').css('marginLeft', '0');
            }

            if (photow_window_width < 500) {
                number_of_columns = 1;
                $('.photowall-item').css('width', '99.9%');
                $('.photowall-wrap').css('marginLeft', '0');
                $('.photowall-wrap').css('marginRight', '1px');
            }

            //console.log(photow_window_width);

            $wallContainer.isotope({
                animationEngine: 'best-available',
                resizable: false, // disable normal resizing
                masonry: {
                    gutterWidth: 0,
                    columnWidth: wallContainer_w / number_of_columns
                }
            });
        }
    }

    $(window).load(function() {
        photoWallInit();
    });

});