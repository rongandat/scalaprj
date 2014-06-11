//jQuery('.loading').height(jQuery(window).height());
jQuery(document).ready(function($) {
    "use strict";
    var deviceAgent = navigator.userAgent.toLowerCase();
    var isIOS = deviceAgent.match(/(iphone|ipod|ipad)/);
    var ua = navigator.userAgent.toLowerCase();
    var isAndroid = ua.indexOf("android") > -1; //&& ua.indexOf("mobile");
    var curr_menu_item;
    var percent;


    if (isIOS || isAndroid) {
        $('.fullpage-block').css('background-attachment', 'scroll');
    }

    

    $('#register-form-post').submit(function() {
        register();
        return false;
    });

    $('#register-form-post').on('change', '#country', function() {
        var country = $(this).val();
        var parent = $('#state').parents('.input-box');
        if (country == 'US') {

            var stateObj = JSON.parse(states);
            var html = '<label for="state">State:</label><span class="label_select"><select id="state" name="state">';
            $.each(stateObj, function(index, value) {
                html += '<option value="' + value.id + '">' + value.text + '</option>';
            });
            html += '</span></select>';
            parent.html(html);
        } else {
            $('#state').remove();
            parent.html('<label for="state">State:</label><input type="text" name="state" id="state">');
        }
    });


    $('#menu-show-btn').click(function() {
        if ($('.responsive-menu-wrap').is(':hidden')) {
            $('.responsive-menu-wrap').show();
            $('.responsive-menu-wrap').css('height', '100%');
        } else {
            $('.responsive-menu-wrap').hide();
        }

    });


    $(window).resize(function() {
//        resizeMenu()
    });

    $(".fitVids").fitVids();

    $('.login-btn').click(function() {
        if ($('.login-scroll').is(':hidden')) {
            showLoginPopup();
        } else
            hideLoginPopup();
    });

    $('.register-show-popup').click(function() {
        showRegisterPopup();
    });

    $('#register-form .close-popup').click(function() {
        hideRegisterPopup();
    });

    $('#register-success-form .close-popup').click(function() {
        $('#register-success-form').hide();
    });

    $('.menu-item-has-children').click(function() {
        var e = $(this).children('.sub-menu');
        if (e.is(':hidden'))
            e.show();
        else
            e.hide()
//        resizeMenu()
    });

//    $('.register-suggest').click(function() {
//        hideLoginPopup();
//        showRegisterPopup();
//    });

    $('#login-form').submit(function() {
        loginForm();
        return false;
    })

    function loginForm() {
        var login_form = $('#login-form').serialize();
        login_form += '&action=cya_login';
         $('#login-form .error').remove();
        $.ajax({
            url: site_url + '/catalog/cya_ajax.php',
            data: login_form,
            type: 'POST',
            dataType: 'JSON',
            success: function(jsonObj) {
                if (jsonObj.type == 1) {
                    window.location = site_url + '/catalog';
                } else {
                    $('#login-form h2').after('<div class="error">' + jsonObj.content + '</div>')
                }
            },
            error: function() {
                t.loadNextTrack();
            }
        });
    }

    /**
     * showLoginPopup
     */
    function showLoginPopup() {
        $('.login-scroll').removeClass('hidden');
    }
    /**
     * hideLoginPopup
     */
    function hideLoginPopup() {
        $('.login-scroll').addClass('hidden');
    }



    /**
     * register
     */
    function register() {
        $('div.error').html('');
        var error = validateRegister();
        if (error.length > 0) {
            $('div.error').html('<ul>' + error + '</ul>');
            return false;
        }

        var register_form = $('#register-form-post').serialize();
        register_form += '&action=cya_register';

        $.ajax({
            url: site_url + '/catalog/cya_ajax.php',
            data: register_form,
            type: 'POST',
            dataType: 'JSON',
            success: function(jsonObj) {
                if (jsonObj.type == 1) {
                    $('#register-form-wrp').hide();
                    $('#register-success-form').show();
                } else {
                    $.each(jsonObj.message, function(index, value) {
                        error += '<li>' + value + '</li>';
                    });
                    $('div.error').html('<ul>' + error + '</ul>');
                }
            },
            error: function() {
                t.loadNextTrack();
            }
        });

    }


    function validateRegister() {
        var firstname = $('#firstname').val();
        var lastname = $('#lastname').val();
        var title = $('#title').val();
        var email_address = $('#email_address').val();
        var website = $('#website').val();
        var company = $('#company').val();
        var customers_group = $('#customers_group').val();
        var country = $('#country').val();
        var street_address = $('#street_address').val();
        var postcode = $('#postcode').val();
        var city = $('#city').val();
        var telephone = $('#telephone').val();
        var password = $('#password').val();
        var confirmation = $('#confirmation').val();

        var error = '';
        if (firstname.length == 0) {
            error += '<li>First name is required.</li>';
        }
        if (lastname.length == 0) {
            error += '<li>Last name is required.</li>';
        }
        if (title.length == 0) {
            error += '<li>Title/Position is required.</li>';
        }
        if (email_address.length == 0) {
            error += '<li>Email is required.</li>';
        }
        if (website.length == 0) {
            error += '<li>Website is required.</li>';
        }
        if (company.length == 0) {
            error += '<li>Company Name is required.</li>';
        }
        if (customers_group.length == 0) {
            error += '<li>Business is required.</li>';
        }
        if (country.length == 0) {
            error += '<li>Country is required.</li>';
        }
        if (street_address.length == 0) {
            error += '<li>Street is required.</li>';
        }
        if (postcode.length == 0) {
            error += '<li>Post Code is required.</li>';
        }
        if (city.length == 0) {
            error += '<li>City is required.</li>';
        }
        if (telephone.length == 0) {
            error += '<li>Telephone Number is required.</li>';
        }
        if (password.length == 0) {
            error += '<li>Password is required.</li>';
        }
        if (confirmation.length == 0) {
            error += '<li>Password Confirmation is required.</li>';
        }

        if (password != confirmation) {
            error += '<li>The Password Confirmation must match your Password.</li>';
        }
        return error;
    }

    /**
     * showRegisterPopup
     */
    function showRegisterPopup() {
        $('#register-form').show();
    }
    /**
     * hideRegisterPopup
     */
    function hideRegisterPopup() {
        $('#register-form').hide();
    }

    function footer_layout_trigger() {
        // Hide the footer if browser height is low
        var window_height = $(window).height();

        var logo_height = $('.logo').height();

        var menu_locate = $('.mainmenu-navigation');
        var menu_pos = menu_locate.position();
        var menu_height = menu_locate.height();
        var menu_base = menu_height + menu_pos.top;

        var footer_locate = $('.menu-toggle-wrap');
        var footer_height = footer_locate.height();
        var footer_pos = footer_locate.position();
        var footer_top = footer_pos.top;

        var space_remaining = (window_height - menu_base) - 60;

        if (space_remaining < footer_height) {
            $('.menu-toggle-wrap').removeClass('menu-toggle-wrap-fixed').addClass('menu-scroll-mode');
            //$('.mainmenu-navigation').addClass('menu-scroll-mode');
        }

        if (space_remaining > footer_height) {
            $('.menu-toggle-wrap').addClass('menu-toggle-wrap-fixed').removeClass('menu-scroll-mode');
            //$('.mainmenu-navigation').removeClass('menu-scroll-mode');
        }

        $(".header-elements-wrap").getNiceScroll().resize();
    }

    $(window).resize(function() {
        footer_layout_trigger();
    });

    $(".header-elements-wrap").niceScroll({
        cursorwidth: 4,
        cursorborder: 0,
        cursorcolor: "#ffffff",
        touchbehavior: false,
        autohidemode: false
    });

    footer_layout_trigger();

    $('.homemenu ul.sf-menu').superfish({
        animation: {opacity: 'show', top: '0'}, // an object equivalent to first parameter of jQuery’s .animate() method. Used to animate the submenu open
        animationOut: {opacity: 'hide', top: '-20'}, // fade-in and slide-down animation
        speed: 'slow',
        disableHI: false,
        delay: 1000,
        autoArrows: true,
        dropShadows: true,
        onInit: function() {
//            $(".homemenu ul.sub-menu").css('display', 'none');
        },
        onHide: function() {
            footer_layout_trigger();
        },
        onShow: function() {
            footer_layout_trigger();
        },
        onBeforeShow: function() {
        },
        onBeforeHide: function() {
        }
    });

    curr_menu_item = $(".responsive-mobile-menu .current-menu-item a").eq(0).text();
    if (curr_menu_item) {
        $(".mobile-menu-selected").text(curr_menu_item);
    }
    $(".mobile-menu-toggle").click(function() {
        $(".responsive-mobile-menu").slideToggle('slow');

    });

    //Filterables
    $(function() {
        $('#gridblock-filters').hide();
        $('#gridblock-filter-select').click(function() {
            $('#gridblock-filters').slideToggle();
        });
        $('#gridblock-filters a').click(function(e) {
            $('.gridblock-filter-select-text').text($(this).text());
            $('#gridblock-filters').slideUp();
            $(this).addClass('current');
            e.preventDefault();
        })
    });

    //Sidebar toggle function
    $(".menu-toggle-off").live('click', function() {
        $('.footer-widget-wrap,.fullscreenslideshow-audio,.navigation-wrapper').fadeOut();
        $(".container-wrapper,#slidecaption").fadeOut();
        $('.photowall-wrap').css('visibility', 'hidden');
        $(".background-fill").fadeOut('slow');
        $(".main-menu-wrap,.top-bar-wrap").stop().fadeTo('slow', 0);
        $('.menu-toggle-wrap').removeClass('menu-toggle-off');
        $('.menu-toggle-wrap').addClass('menu-toggle-on');
        $('.background-slideshow-controls').show();
        $('.header-elements-wrap').addClass('header-elements-wrap-disable');
        $('.menu-toggle-wrap').addClass('menu-toggle-wrap-fixed');
    });

    //Sidebar toggle function
    $(".menu-toggle-on").live('click', function() {
        $(".main-menu-wrap,.top-bar-wrap").stop().fadeTo('fast', 1);
        $('.fullscreenslideshow-audio,.navigation-wrapper').fadeIn();
        $(".container-wrapper,#slidecaption,.photowall-wrap").fadeIn('slow');
        $(".background-fill").fadeIn('slow');
        $('.menu-toggle-wrap').removeClass('menu-toggle-on');
        $('.menu-toggle-wrap').addClass('menu-toggle-off');
        $('.background-slideshow-controls').hide();
        $('.photowall-wrap').css('opacity', '1');
        $('.header-elements-wrap').removeClass('header-elements-wrap-disable');
        $('.footer-widget-wrap').fadeIn();

        $('.photowall-wrap').css('visibility', 'visible');

        var $filterContainer = $('#gridblock-container');
        if ($.fn.isotope) {
            $filterContainer.isotope({
                animationEngine: 'jquery',
                layoutMode: 'fitRows',
                masonry: {
                    gutterWidth: 0
                }
            });
        }
        footer_layout_trigger();
    });


    //Portfolio Hover effects
    $(".gototop,.hrule.top a").click(function() {
        $('html, body').animate({scrollTop: 0}, 'slow');
        return false;
    });

    // Responsive dropdown list triggered on Mobile platforms
    $('#top-select-menu').bind('change', function() { // bind change event to select
        var url = $(this).val(); // get selected value
        if (url != '') { // require a URL
            window.location = url; // redirect
        }
        return false;
    });

    //Switch the "Open" and "Close" state per click then slide up/down (depending on open/close state)
    $(".toggle-shortcode").click(function() {
        $(this).toggleClass("active").next().slideToggle("fast");
        return false;
    });

    $(".service-item").hover(
            function() {
                $(this).children('.icon-large').animate({
                    top: -10
                }, 300);
            },
            function() {
                $(this).children('.icon-large').animate({
                    top: 0
                }, 300);
            });

    $("#main-gridblock-carousel .preload").hover(
            function() {
                $(this).stop().fadeTo("fast", 0.6);
            },
            function() {
                $(this).stop().fadeTo("fast", 1);
            });

    $(".gridblock-image-holder").hover(
            function() {
                $(this).stop().fadeTo("fast", 0.6);
            },
            function() {
                $(this).stop().fadeTo("fast", 1);
            });

    $(".thumbnail-image").hover(
            function() {
                $(this).stop().fadeTo("fast", 0.6);
            },
            function() {
                $(this).stop().fadeTo("fast", 1);
            });

    $(".pictureframe").hover(
            function() {
                $(this).stop().fadeTo("fast", 0.6);
            },
            function() {
                $(this).stop().fadeTo("fast", 1);
            });

    $(".filter-image-holder").hover(
            function() {
                $(this).stop().fadeTo("fast", 0.6);
            },
            function() {
                $(this).stop().fadeTo("fast", 1);
            });

    //Tool Tip
    $('.qtips').tipsy({gravity: 'e'});
    $('.ntips').tipsy({gravity: 's'});
    $('.etips').tipsy({gravity: 'e'});
    $('.stips').tipsy({gravity: 's'});

    $("#popularposts_list li:even,#recentposts_list li:even").addClass('even');
    $("#popularposts_list li:odd,#recentposts_list li:odd").addClass('odd');

    $(".cart_table_item:even").addClass('even');
    $(".cart_table_item:odd").addClass('odd');

    $(".close_notice").click(function() {
        $(this).parent('.noticebox').fadeOut();
    });
    //Skill Bar
    if ($.fn.waypoint) {
        $('.skillbar').waypoint(function() {
            $('.skillbar').each(function() {
                percent = $(this).attr('data-percent');
                percent = percent + '%';
                $(this).find('.skillbar-bar').animate({
                    width: percent
                }, 1500);
            });
        }, {offset: 'bottom-in-view'});

        $('.is-animated').waypoint(function() {
            $(this).removeClass('is-animated').addClass('element-animate')
        }, {offset: 'bottom-in-view'});
    }

    // fade in #back-top
    $(function() {
        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('#goto-top').fadeIn();
            } else {
                $('#goto-top').fadeOut();
            }
        });

        // scroll body to 0px on click
        $('#goto-top').click(function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
    });

    // WooCommerce Codes
    // Thumnail hover for secondary image
    $('.header-elements-wrap').hover(function() {
        $(this).addClass('header-element-underpaint');
    }, function() {
        $(this).removeClass('header-element-underpaint');
    });


    // WooCommerce Codes
    // Thumnail hover for secondary image
    $('ul.products li.mtheme-hover-thumbnail a:first-child').hover(function() {
        var woo_secondary_thumanil = $(this).find('.mtheme-secondary-thumbnail-image').attr('src');
        if (woo_secondary_thumanil !== undefined) {
            $(this).children('.wp-post-image').removeClass('woo-thumbnail-fadeInDown').addClass('woo-thumbnail-fadeOutUp');
            $(this).children('.mtheme-secondary-thumbnail-image').removeClass('woo-thumbnail-fadeOutUp').addClass('woo-thumbnail-fadeInDown');
        }
    }, function() {
        var woo_secondary_thumanil = $(this).find('.mtheme-secondary-thumbnail-image').attr('src');
        if (woo_secondary_thumanil !== undefined) {
            $(this).children('.wp-post-image').removeClass('woo-thumbnail-fadeOutUp').addClass('woo-thumbnail-fadeInDown');
            $(this).children('.mtheme-secondary-thumbnail-image').removeClass('woo-thumbnail-fadeInDown').addClass('woo-thumbnail-fadeOutUp');
        }
    });


    var woocommerce_ordering = $(".woocommerce-page .woocommerce-ordering select");
    if ((woocommerce_ordering).length) {
        var woocommerce_ordering_curr = $(".woocommerce-ordering select option:selected").text();
        var woocommerce_ordering_to_ul = woocommerce_ordering
                .clone()
                .wrap("<div></div>")
                .parent().html()
                .replace(/select/g, "ul")
                .replace(/option/g, "li")
                .replace(/value/g, "data-value");

        $('.woocommerce-ordering')
                .prepend('<div class="mtheme-woo-order-selection-wrap"><div class="mtheme-woo-order-selected-wrap"><span class="mtheme-woo-order-selected">' + woocommerce_ordering_curr + '</span><i class="icon-reorder"></i></div><div class="mtheme-woo-order-list">' + woocommerce_ordering_to_ul + '</div></div>');
    }

    $(function() {
        //$('.woocommerce-page .woocommerce-ordering select').hide();
        $('.mtheme-woo-order-selected-wrap').click(function() {
            $('.mtheme-woo-order-list ul').slideToggle();
        });
        $('.mtheme-woo-order-list ul li').click(function(e) {

            //Set value
            var selected_option = $(this).data('value');
            $(".woocommerce-page .woocommerce-ordering select").val(selected_option).trigger('change');

            $('.mtheme-woo-order-selected').text($(this).text());
            $('.mtheme-woo-order-list').slideUp();
            $(this).addClass('current');
            e.preventDefault();
        })
    });

});

(function($) {
    
    $(window).load(function() {
        $('#photowall-container').removeClass('loading');
        function footer_layout_trigger() {
            // Hide the footer if browser height is low
            var window_height = $(window).height();

            var logo_height = $('.logo').height();

            var menu_locate = $('.mainmenu-navigation');
            var menu_pos = menu_locate.position();
            var menu_height = menu_locate.height();
            var menu_base = menu_height + menu_pos.top;

            var footer_locate = $('.menu-toggle-wrap');
            var footer_height = footer_locate.height();
            var footer_pos = footer_locate.position();
            var footer_top = footer_pos.top;

            var space_remaining = (window_height - menu_base) - 60;

            if (space_remaining < footer_height) {
                $('.menu-toggle-wrap').removeClass('menu-toggle-wrap-fixed');
                $('.mainmenu-navigation').addClass('menu-scroll-mode');
            }
            if (space_remaining > footer_height) {
                $('.menu-toggle-wrap').addClass('menu-toggle-wrap-fixed');
                $('.mainmenu-navigation').removeClass('menu-scroll-mode');
            }
        }

    })
})(jQuery);

//WooCommerce Codes
(function($) {
    $(window).load(function() {
        // The slider being synced must be initialized first
        if ($.fn.flexslider) {
            $('#mtheme-flex-carousel').flexslider({
                animation: "slide",
                controlNav: false,
                directionNav: false,
                animationLoop: false,
                slideshow: false,
                itemWidth: 100,
                asNavFor: '#mtheme-flex-slider'
            });

            $('#mtheme-flex-slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: true,
                slideshow: true,
                sync: "#mtheme-flex-carousel"
            });
        }
    })
})(jQuery);

/**
 * resizeMenu
 */
function resizeMenu() {
    var height = jQuery(window).height();

    var wall_lastWindowWidth = jQuery(window).width();
    if (wall_lastWindowWidth < 900) {
        return false;
    }

    var height_image = 100;
    var body_height = 0;
    var min_height = jQuery('#menu-main-menu').height();
    body_height = jQuery('.global-container-wrapper').outerHeight() + 1;
//    if (jQuery('#photowall-container').length){
//        body_height = jQuery('#photowall-container').height();
//    }
    if (height < body_height)
        height = body_height;
    var height_menu = height - 150;
    jQuery('.responsive-menu-wrap').css('height', height + 'px');
    if (height_menu > (min_height + height_image))
        jQuery('.responsive-mobile-menu').css('height', (height_menu - height_image) + 'px');
    else
        jQuery('.responsive-mobile-menu').css('height', height_menu + 'px');
}