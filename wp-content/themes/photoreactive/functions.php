<?php
/**
 * @Functions
 * 
 */
?>
<?php
/* ------------------------------------------------------------------------- */
/* Theme name settings which is shared to some functions */
/* ------------------------------------------------------------------------- */
// Theme Title
$mtheme_ThemeTitle = "Photoreactive";
// Theme Name
$mtheme_themename = "Photoreactive";
$mtheme_themefolder = "photoreactive";
// Notifier Info
$mtheme_notifier_name = "Photoreactive";
$mtheme_notifier_url = "";
// Theme name in short
$mtheme_shortname = "mtheme_p2";
if (!defined('MTHEME')) {
    define('MTHEME', $mtheme_shortname);
}
if (!defined('MTHEME_NAME')) {
    define('MTHEME_NAME', $mtheme_themename);
}

// Stylesheet path
$mtheme_theme_path = get_template_directory_uri();
// Theme Options Thumbnail
$mtheme_theme_icon = $mtheme_theme_path . '/images/options/thumbnail.jpg';
// Minimum contents area
if (!isset($content_width)) {
    $content_width = 756;
}
define('MTHEME_MIN_CONTENT_WIDTH', $content_width);
// Maximum contents area
define('MTHEME_MAX_CONTENT_WIDTH', "1040");
define('MTHEME_FULLPAGE_WIDTH', "1200");
define('MTHEME_IMAGE_QUALITY', "100");
// Max Sidebar Count
define('MTHEME_MAX_SIDEBARS', "50");
// Demo Status
define('MTHEME_DEMO_STATUS', "0");
// Theme build mode flag. Disables default enqueue font.
define('MTHEME_BUILDMODE', "0");
//Switch off Plugin scripts
define('MTHEME_PLUGIN_SCRIPT_LOAD', "0");
//Session start if demo is switched On
if (MTHEME_DEMO_STATUS) {
    if (!isset($_SESSION))
        session_start();
}

// Flush permalinks on Theme Switch
function mtheme_rewrite_flush() {
    flush_rewrite_rules();
}

add_action('after_switch_theme', 'mtheme_rewrite_flush');
remove_action('init', 'mtheme_shortcode_plugin_script_style_loader');
/* ------------------------------------------------------------------------- */
/* Constants */
/* ------------------------------------------------------------------------- */
$mtheme_theme_path = get_template_directory_uri();
$mtheme_template_path = get_template_directory();
define('MTHEME_PARENTDIR', $mtheme_template_path);
define('MTHEME_FRAMEWORK', MTHEME_PARENTDIR . '/framework/');
define('MTHEME_FRAMEWORK_PLUGINS', MTHEME_FRAMEWORK . 'plugins/');
define('MTHEME_OPTIONS_ROOT', MTHEME_FRAMEWORK . 'options/');
define('MTHEME_FRAMEWORK_ADMIN', MTHEME_FRAMEWORK . 'admin/');
define('MTHEME_FRAMEWORK_FUNCTIONS', MTHEME_FRAMEWORK . 'functions/');
define('MTHEME_FUNCTIONS', MTHEME_PARENTDIR . '/functions/');
define('MTHEME_SHORTCODEGEN', MTHEME_FRAMEWORK . 'shortcodegen/');
define('MTHEME_SHORTCODES', MTHEME_SHORTCODEGEN . 'shortcodes/');
define('MTHEME_INCLUDES', MTHEME_PARENTDIR . '/includes/');
define('MTHEME_WIDGETS', MTHEME_PARENTDIR . '/widgets/');
define('MTHEME_IMAGES', MTHEME_PARENTDIR . '/images/');
define('MTHEME_PATH', $mtheme_theme_path);
define('MTHEME_FONTJS', $mtheme_theme_path . '/js/font/');

define('MTHEME_ROOT', get_template_directory_uri());
define('MTHEME_CSS', get_template_directory_uri() . '/css');
define('MTHEME_STYLESHEET', get_stylesheet_directory_uri());
define('MTHEME_JS', get_template_directory_uri() . '/js');

/* ------------------------------------------------------------------------- */
/* Right Click Disable
  /*------------------------------------------------------------------------- */

function mtheme_disable_rightclick() {
    if (of_get_option('rightclick_disable')) {
        ?> 
        <script>
            /* <![CDATA[ */
            var message = "<?php echo stripslashes_deep(of_get_option('rightclick_disabletext')); ?>";
            function clickIE4() {
                if (event.button == 2) {
                    alert(message);
                    return false;
                }
            }
            function clickNS4(e) {
                if (document.layers || document.getElementById && !document.all) {
                    if (e.which == 2 || e.which == 3) {
                        alert(message);
                        return false;
                    }
                }
            }
            if (document.layers) {
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown = clickNS4;
            } else if (document.all && !document.getElementById) {
                document.onmousedown = clickIE4;
            }
            document.oncontextmenu = new Function("alert(message);return false")
            /* ]]> */
        </script>
        <?php
    }
}

add_action('wp_footer', 'mtheme_disable_rightclick');

/* ------------------------------------------------------------------------- */
/* Helper Variable for Javascript
  /*------------------------------------------------------------------------- */

function mtheme_uri_path_script() {
    ?>
    <script type="text/javascript">
        var mtheme_uri = "<?php echo get_template_directory_uri(); ?>";
    </script>
    <?php
}

add_action('wp_head', 'mtheme_uri_path_script');

/* ------------------------------------------------------------------------- */
/* Load Theme Options */
/* ------------------------------------------------------------------------- */
require_once(MTHEME_OPTIONS_ROOT . 'options-caller.php');

/* ------------------------------------------------------------------------- */
/* Theme Setup */
/* ------------------------------------------------------------------------- */

function mtheme_setup() {
    //Add Background Support
    add_theme_support('custom-background');

    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support('automatic-feed-links');

    // Register Menu
    register_nav_menu('top_menu', 'Main Menu');
    /* ------------------------------------------------------------------------- */
    /* Internationalize for easy localizing */
    /* ------------------------------------------------------------------------- */
    load_theme_textdomain('mthemelocal', get_template_directory() . '/languages');
    $locale = get_locale();
    $locale_file = get_template_directory() . "/languages/$locale.php";
    if (is_readable($locale_file)) {
        require_once( $locale_file );
    }

    /* ------------------------------------------------------------------------- */
    /* Enable shortcodes to Text Widgets */
    /* ------------------------------------------------------------------------- */
    add_filter('widget_text', 'do_shortcode');
    /*
     * This theme styles the visual editor to resemble the theme style and column width.
     */
    add_editor_style(array('css/editor-style.css'));
    /* ------------------------------------------------------------------------- */
    /* Add Post Thumbnails */
    /* ------------------------------------------------------------------------- */
    add_theme_support('post-thumbnails');
    // This theme supports Post Formats.
    add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio'));
    set_post_thumbnail_size(150, 150, true); // default thumbnail size
    add_image_size('blog-post', MTHEME_MIN_CONTENT_WIDTH, 300, true); // Blog post cropped
    add_image_size('blog-full', MTHEME_FULLPAGE_WIDTH, '', true); // Blog post images
    add_image_size('gridblock-related', 120, 64, true); // Sidebar Related image
    add_image_size('gridblock-tiny', 160, 160, true); // Sidebar Thumbnails
    add_image_size('gridblock-small', 480, 342, true); // Portfolio Small
    add_image_size('gridblock-medium', 500, 356, true); // Portfolio Medium
    add_image_size('gridblock-large', 600, 428, true); // Portfolio Large
    add_image_size('gridblock-full', MTHEME_FULLPAGE_WIDTH, '', true); // Portfolio Full
    add_image_size('gridblock-ajax', 924, '', true); // Fullsize
    add_image_size('admin-thumbnail', 50, '', true); // Admin Thumbnail

    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list'));
}

add_action('after_setup_theme', 'mtheme_setup');

/* ----------------------- */
/* Demo Panel Action 	 */
/* ----------------------- */
add_action('mtheme_demo_panel', 'mtheme_demo_panel_display');

function mtheme_demo_panel_display() {
    if (MTHEME_DEMO_STATUS) {
        require ( get_template_directory() . '/framework/demopanel/demo-panel.php');
    }
}

add_action('mtheme_get_sidebar_choice', 'mtheme_sidebar_choice');

function mtheme_sidebar_choice() {
    //Get the sidebar choice
    global $mtheme_sidebar_choice, $post;
    if (isSet($post->ID)) {
        $mtheme_sidebar_choice = get_post_meta($post->ID, MTHEME . '_sidebar_choice', true);
    }
    $site_layout_width = of_get_option('general_theme_page');
    if (MTHEME_DEMO_STATUS) {
        if (isSet($_SESSION['demo_layout'])) {
            if ($_SESSION['demo_layout'] == "boxed") {
                $site_layout_width = "boxed";
            } else {
                $site_layout_width = "fullwidth";
            }
        }
    }
}

add_action('mtheme_background_overlays', 'mtheme_background_overlays_display');

function mtheme_background_overlays_display() {
    if (!wp_is_mobile()) {
        echo '<div class="pattern-overlay"></div>';
    }
    if (!mtheme_is_fullscreen_post()) {
        echo '<div class="background-fill"></div>';
    }
    if (mtheme_is_fullscreen_post()) {
        if (post_password_required(get_the_ID())) {
            echo '<div class="background-fill"></div>';
        }
    }
}

function mtheme_footer_scripts() {
    echo stripslashes_deep(of_get_option('footer_scripts'));
}

add_action('wp_footer', 'mtheme_footer_scripts');
/* ------------------------------------------------------------------------- */
/* Enqueue Scripts
  /*------------------------------------------------------------------------- */
require_once (MTHEME_FRAMEWORK_FUNCTIONS . 'framework-functions.php');

function mtheme_function_scripts_styles() {
    /* ------------------------------------------------------------------------- */
    /* Register Scripts and Styles
      /*------------------------------------------------------------------------- */
    // JPlayer Script and Style
    wp_register_script('jPlayerJS', MTHEME_JS . '/html5player/jquery.jplayer.min.js', array('jquery'), null, true);
    wp_register_style('css_jplayer', MTHEME_ROOT . '/css/html5player/jplayer.dark.css', array('MainStyle'), false, 'screen');

    // Touch Swipe
    wp_register_script('TouchSwipe', MTHEME_JS . '/jquery.touchSwipe.min.js', array('jquery'), null, true);

    // Dark Theme
    wp_register_style('DarkStyle', MTHEME_STYLESHEET . '/style_dark.css', array('MainStyle'), false, 'screen');

    // Carousel Fred
    wp_register_script('caroufred', MTHEME_JS . '/caroufred/jquery.carouFredSel-6.2.1-packed.js', array('jquery'), null, true);

    // Donut Chart
    wp_register_script('DonutChart', MTHEME_JS . '/jquery.donutchart.js', array('jquery'), null, true);

    // Appear ( Unused )
    wp_register_script('AppearJS', MTHEME_JS . '/jquery.appear.js', array('jquery'), null, true);

    // WayPoint
    wp_register_script('WayPointsJS', MTHEME_JS . '/waypoints/waypoints.min.js', array('jquery'), null, true);

    //Backrground image strecher
    wp_register_script('Background_image_stretcher', MTHEME_JS . '/jquery.backstretch.min.js', array('jquery'), null, true);

    // FlexSlider Script and Styles
    wp_register_script('flexislider', MTHEME_JS . '/flexislider/jquery.flexslider.js', array('jquery'), '', true);
    wp_register_style('flexislider_css', MTHEME_ROOT . '/css/flexislider/flexslider-page.css', array('MainStyle'), false, 'screen');

    // contactFormScript
    wp_register_script('contactform', MTHEME_JS . '/contact.js', array('jquery'), null, true);

    // Google Maps Loader
    wp_register_script('GoogleMaps', 'http://maps.google.com/maps/api/js?sensor=false', array('jquery'), null, false);

    // iSotope
    wp_register_script('isotope', MTHEME_JS . '/jquery.isotope.min.js', array('jquery'), null, true);

    // Tubular
    wp_register_script('tubular', MTHEME_JS . '/jquery.tubular.1.0.js', array('jquery'), null, true);

    // PhotoWall INIT
    wp_register_script('photowall_INIT', MTHEME_JS . '/photowall.js', array('jquery'), null, true);

    // Kenburns
    wp_register_script('kenburns_JS', MTHEME_JS . '/kenburns/jquery.slideshowify.js', array('jquery'), null, true);
    // Kenburns INIT
    wp_register_script('kenburns_INIT', MTHEME_JS . '/kenburns/kenburns.init.js', array('jquery'), null, true);
    // jQTransmit
    wp_register_script('jQTransmit_JS', MTHEME_JS . '/kenburns/jquery.transit.min.js', array('jquery'), null, true);

    // Supersized
    wp_register_script('supersized_JS', MTHEME_JS . '/supersized/supersized.3.2.7.min.js', array('jquery'), null, true);
    wp_register_script('supersized_shutter_JS', MTHEME_JS . '/supersized/supersized.shutter.js', array('jquery'), null, true);
    wp_register_style('supersized_CSS', MTHEME_CSS . '/supersized/supersized.css', array('MainStyle'), false, 'screen');

    // Mobile Menu Script
    wp_register_style('MobileMenuCSS', MTHEME_CSS . '/menu/mobile-menu.css', array('MainStyle'), false, 'screen');

    // Responsive Style
    wp_register_style('ResponsiveCSS', MTHEME_CSS . '/responsive.css', array('MainStyle'), false, 'screen');

    // Custom Style
    wp_register_style('CustomStyle', MTHEME_STYLESHEET . '/custom.css', array('MainStyle'), false, 'screen');

    // Dynamic Styles
    wp_register_style('Dynamic_CSS', MTHEME_CSS . '/dynamic_css.php', array('MainStyle'), false, 'screen');

    /* ------------------------------------------------------------------------- */
    /* Start Loading
      /*------------------------------------------------------------------------- */
    /* Common Scripts */
    global $is_IE; //WordPress-specific global variable
    wp_enqueue_script('jquery');
    if ($is_IE) {
        wp_enqueue_script('excanvas', MTHEME_JS . '/excanvas.js', array('jquery'), null, true);
    }
    wp_enqueue_script('superfish', MTHEME_JS . '/menu/superfish.js', array('jquery'), null, true);
    wp_enqueue_script('qtips', MTHEME_JS . '/jquery.tipsy.js', array('jquery'), null, true);
    wp_enqueue_script('prettyPhoto', MTHEME_JS . '/jquery.prettyPhoto.js', array('jquery'), null, true);
    wp_enqueue_script('twitter', MTHEME_JS . '/jquery.tweet.js', array('jquery'), null, true);
    wp_enqueue_script('EasingScript', MTHEME_JS . '/jquery.easing.min.js', array('jquery'), null, true);
    wp_enqueue_script('portfolioloader', MTHEME_JS . '/page-elements.js', array('jquery'), null, true);
    wp_enqueue_script('nice_scroll', MTHEME_JS . '/jquery.nicescroll.min.js', array('jquery'), null, true);
    //wp_enqueue_script( 'stickymenu', MTHEME_JS . '/jquery.stickymenu.js', array( 'jquery' ), null,true );
    wp_enqueue_script('fitVids', MTHEME_JS . '/jquery.fitvids.js', array('jquery'), null, true);
    wp_enqueue_script('WayPointsJS');
    wp_enqueue_script('hoverIntent');
    if ($is_IE) {
        wp_enqueue_script('ResponsiveJQIE', MTHEME_JS . '/css3-mediaqueries.js', array('jquery'), null, true);
    }
    wp_enqueue_script('custom', MTHEME_JS . '/common.js', array('jquery'), null, true);

    /* Common Styles */
    wp_enqueue_style('MainStyle', MTHEME_STYLESHEET . '/style.css', false, 'screen');

    wp_enqueue_style('fontAwesome', MTHEME_CSS . '/font-awesome/css/font-awesome.min.css', array('MainStyle'), false, 'screen');
    if (!MTHEME_BUILDMODE) {
        if (of_get_option('default_googlewebfonts')) {
            
        }
    }
    wp_enqueue_style('PrettyPhoto', MTHEME_CSS . '/prettyPhoto.css', array('MainStyle'), false, 'screen');
    wp_enqueue_style('navMenuCSS', MTHEME_CSS . '/menu/superfish.css', array('MainStyle'), false, 'screen');
    //*** End of Common Script and Style Loads **//
    wp_enqueue_style('MobileMenuCSS');

    // Conditional Load Flexslider
    if (is_archive() || is_single() || is_search() || is_home() || is_page_template('template-bloglist.php') || is_page_template('template-bloglist-small.php') || is_page_template('template-bloglist_fullwidth.php') || is_page_template('template-gallery-posts.php')) {
        wp_enqueue_script('flexislider');
        wp_enqueue_style('flexislider_css');
    }
    if (is_single()) {
        wp_enqueue_script('flexislider');
        wp_enqueue_style('flexislider_css');
        wp_enqueue_script('TouchSwipe');
        wp_enqueue_script('caroufred');
    }
    // Conditional Load jPlayer
    if (is_archive() || is_single() || is_search() || is_home() || is_page_template('template-fullscreen-home.php') || is_page_template('template-bloglist.php') || is_page_template('template-bloglist-small.php') || is_page_template('template-bloglist_fullwidth.php') || is_page_template('template-video-posts.php') || is_page_template('template-audio-posts.php')) {
        wp_enqueue_script('jPlayerJS');
        wp_enqueue_style('css_jplayer');
    }
    // Conditional Load Contact Form
    if (is_page_template('template-contact.php')) {
        wp_enqueue_script('contactform');
    }

    // Load Theme Dark Style
    if (!MTHEME_DEMO_STATUS) {
        if (of_get_option('general_theme_style') == "dark") {
            wp_enqueue_style('DarkStyle');
        }
    }

    if (MTHEME_DEMO_STATUS) {
        if (isset($_GET['demo_theme_style']))
            $_SESSION['demo_theme_style'] = $_GET['demo_theme_style'];
        if (isset($_SESSION['demo_theme_style']))
            $demo_theme_style = $_SESSION['demo_theme_style'];
        if (isset($_SESSION['demo_theme_style']) && $_SESSION['demo_theme_style'] == "dark") {
            wp_enqueue_style('DarkStyle');
        }
    }

    // Load Dynamic Styles last to over-ride all
    require_once ( MTHEME_PARENTDIR . '/css/dynamic_css.php' );
    wp_add_inline_style('ResponsiveCSS', $dynamic_css);

    //$mtheme_current_post_type = get_post_type( get_the_ID() );
    if (mtheme_is_fullscreen_post()) {

        $featured_page = mtheme_get_active_fullscreen_post();

        if (post_password_required($featured_page)) {
            wp_enqueue_script('Background_image_stretcher');
        } else {

            $custom = get_post_custom($featured_page);
            if (isSet($custom[MTHEME . "_fullscreen_type"][0])) {
                $fullscreen_type = $custom[MTHEME . "_fullscreen_type"][0];
            }
            if (isSet($fullscreen_type)) {
                switch ($fullscreen_type) {

                    case "photowall" :
                        wp_enqueue_script('Background_image_stretcher');
                        wp_enqueue_script('photowall_INIT');
                        wp_enqueue_script('isotope');

                        break;

                    case "kenburns" :
                        wp_enqueue_script('kenburns_JS');
                        wp_enqueue_script('jQTransmit_JS');
                        wp_enqueue_script('kenburns_INIT');
                        wp_enqueue_style('supersized_CSS');
                        break;

                    case "slideshow" :
                    case "Slideshow-plus-captions" :
                        wp_enqueue_script('supersized_JS');
                        wp_enqueue_script('supersized_shutter_JS');
                        wp_enqueue_style('supersized_CSS');
                        wp_enqueue_script('TouchSwipe');
                        break;

                    case "video" :
                        if (isSet($custom[MTHEME . "_youtubevideo"][0])) {
                            wp_enqueue_script('Background_image_stretcher');
                            wp_enqueue_script('tubular');
                        }
                        if (isSet($custom[MTHEME . "_vimeovideo"][0])) {
                            wp_add_inline_style('MainStyle', "body{height:1px;}");
                        }
                        break;

                    default:

                        break;
                }
            }
        }
    } else {

        // Background slideshow or image
        $bg_choice = get_post_meta(get_the_id(), MTHEME . '_meta_background_choice', true);
        // Load scripts based on Background Image / Slideshow Choice
        if (is_archive() || is_search())
            $bg_choice = "default";
        switch ($bg_choice) {
            case "featured_image" :
            case "custom_url" :
            case "options_image" :
                wp_enqueue_script('Background_image_stretcher');
                break;

            case "options_slideshow" :
            case "image_attachments" :
            case "fullscreen_post" :
                //Defined in Theme framework Functions
                wp_enqueue_script('supersized_JS');
                wp_enqueue_script('supersized_shutter_JS');
                wp_enqueue_style('supersized_CSS');
                wp_enqueue_script('TouchSwipe');
                break;
            default :
                wp_enqueue_script('Background_image_stretcher');
        }
    }

    // Conditional Load jQueries
    if (mtheme_got_shortcode('tabs') || mtheme_got_shortcode('accordion')) {
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-tabs');
        wp_enqueue_script('jquery-ui-accordion');
    }

    if (mtheme_got_shortcode('portfoliogrid') || is_post_type_archive() || is_tax()) {
        wp_enqueue_script('isotope');
    }
    //Counter
    if (mtheme_got_shortcode('counter')) {
        wp_enqueue_script('DonutChart');
    }
    //Caraousel
    if (mtheme_got_shortcode('workscarousel')) {
        wp_enqueue_script('TouchSwipe');
        wp_enqueue_script('caroufred');
    }
    if (mtheme_got_shortcode('map')) {
        wp_enqueue_script('GoogleMaps');
    }

    if (mtheme_got_shortcode('woocommerce_featured_slideshow') || mtheme_got_shortcode('flexislideshow') || mtheme_got_shortcode('recent_blog_slideshow') || mtheme_got_shortcode('recent_portfolio_slideshow') || mtheme_got_shortcode('portfoliogrid') || mtheme_got_shortcode('testimonials')) {
        wp_enqueue_script('flexislider');
        wp_enqueue_style('flexislider_css');
    }

    if (mtheme_got_shortcode('audioplayer')) {
        wp_enqueue_script('jPlayerJS');
        wp_enqueue_style('css_jplayer');
    }

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('mtheme-ie', get_template_directory_uri() . '/css/ie.css', array('MainStyle'), '2013-08-27');

    // Embed a font Link
    if (of_get_option('custom_font_embed') <> "") {
        echo stripslashes_deep(of_get_option('custom_font_embed'));
    }
    if (of_get_option('custom_font_css') <> "") {
        $custom_font_css = stripslashes_deep(of_get_option('custom_font_css'));
        wp_add_inline_style('MainStyle', $custom_font_css);
    }

    // ******* Load Responsive and Custom Styles

    wp_enqueue_style('ResponsiveCSS');
    wp_enqueue_style('CustomStyle');

    // ******* No more styles will be loaded after this line
    // Load Fonts
    // This enqueue method through the function prevent any double loading of fonts.
    $heading_font = mtheme_enqueue_font("heading_font");
    wp_enqueue_style($heading_font['name'], $heading_font['url'], array('MainStyle'), null, 'screen');

    $page_headings = mtheme_enqueue_font("page_headings");
    wp_enqueue_style($page_headings['name'], $page_headings['url'], array('MainStyle'), null, 'screen');

    $menu_font = mtheme_enqueue_font("menu_font");
    wp_enqueue_style($menu_font['name'], $menu_font['url'], array('MainStyle'), null, 'screen');

    $supersized_title_font = mtheme_enqueue_font("super_title");
    wp_enqueue_style($supersized_title_font['name'], $supersized_title_font['url'], array('MainStyle'), null, 'screen');
}

add_action('wp_enqueue_scripts', 'mtheme_function_scripts_styles');

// Pagination for Custom post type singular portfoliogallery
add_filter('redirect_canonical', 'mtheme_disable_redirect_canonical');

function mtheme_disable_redirect_canonical($redirect_url) {
    if (is_singular('portfoliogallery'))
        $redirect_url = false;
    return $redirect_url;
}

add_filter('option_posts_per_page', 'mtheme_tax_filter_posts_per_page');

function mtheme_tax_filter_posts_per_page($value) {
    return (is_tax('types')) ? 1 : $value;
}

// Add to Body Class
function mtheme_body_class($classes) {
    if (!is_multi_author())
        $classes[] = 'single-author';

    if (is_active_sidebar('sidebar-2') && !is_attachment() && !is_404())
        $classes[] = 'sidebar';

    $skin_style = of_get_option('general_theme_style');
    $classes[] = $skin_style;
    if (MTHEME_DEMO_STATUS) {
        $classes[] = 'demo';
    }

    return $classes;
}

add_filter('body_class', 'mtheme_body_class');

//@ Page Menu
function mtheme_page_menu_args($args) {
    $args['show_home'] = true;
    return $args;
}

add_filter('wp_page_menu_args', 'mtheme_page_menu_args');
/* ------------------------------------------------------------------------- */
/* Excerpt Lenght */
/* ------------------------------------------------------------------------- */

function mtheme_excerpt_length($length) {
    return 80;
}

add_filter('excerpt_length', 'mtheme_excerpt_length');

/**
 * Creates a nicely formatted and more specific title element text for output
 */
function mtheme_wp_title($title, $sep) {
    global $paged, $page; //WordPress-specific global variable

    if (is_feed())
        return $title;

    // Add the site name.
    $title .= get_bloginfo('name');

    // Add the site description for the home/front page.
    $site_description = get_bloginfo('description', 'display');
    if ($site_description && ( is_home() || is_front_page() ))
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ($paged >= 2 || $page >= 2)
        $title = "$title $sep " . sprintf(__('Page %s', 'mthemelocal'), max($paged, $page));

    return $title;
}

add_filter('wp_title', 'mtheme_wp_title', 10, 2);

/**
 * Registers widget areas.
 */
function mtheme_widgets_init() {
    // Default Sidebar
    register_sidebar(array(
        'name' => 'Default Sidebar',
        'id' => 'default_sidebar',
        'description' => __('Default sidebar selected for pages, blog posts and archives.', 'mthemelocal'),
        'before_widget' => '<div class="sidebar-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Social Header Sidebar
    register_sidebar(array(
        'name' => 'Social Footer',
        'id' => 'social_footer',
        'description' => __('For social widget to display social icons.', 'mthemelocal'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Default Portfolio Sidebar
    register_sidebar(array(
        'name' => 'Default Portfolio Sidebar',
        'id' => 'portfolio_sidebar',
        'description' => __('Default sidebar for portfolio pages.', 'mthemelocal'),
        'before_widget' => '<div class="sidebar-widget"><aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Dynamic Sidebar
    for ($sidebar_count = 1; $sidebar_count <= MTHEME_MAX_SIDEBARS; $sidebar_count++) {

        if (of_get_option('theme_sidebar' . $sidebar_count) <> "") {
            register_sidebar(array(
                'name' => of_get_option('theme_sidebar' . $sidebar_count),
                'description' => of_get_option('theme_sidebardesc' . $sidebar_count),
                'id' => 'sidebar_' . $sidebar_count . '',
                'before_widget' => '<div class="sidebar-widget"><aside id="%1$s" class="widget %2$s">',
                'after_widget' => '</aside></div>',
                'before_title' => '<h3>',
                'after_title' => '</h3>',
            ));
        }
    }
}

add_action('widgets_init', 'mtheme_widgets_init');
/* ------------------------------------------------------------------------- */
/* Load Admin */
/* ------------------------------------------------------------------------- */
require_once (MTHEME_FRAMEWORK . 'admin/admin_setup.php');
/* ------------------------------------------------------------------------- */
/* Core Libraries */
/* ------------------------------------------------------------------------- */

function mtheme_load_core_libaries() {
    require_once (MTHEME_FRAMEWORK . 'admin/tgm/class-tgm-plugin-activation.php');
    require_once (MTHEME_FRAMEWORK . 'admin/tgm/tgm-init.php');
    require_once (MTHEME_FRAMEWORK_FUNCTIONS . 'post-pagination.php');
}

/* ------------------------------------------------------------------------- */
/* Theme Specific Libraries */
/* ------------------------------------------------------------------------- */

function mtheme_load_theme_metaboxes() {
    require_once (MTHEME_FRAMEWORK . 'metaboxgen/metaboxgen.php');
    require_once (MTHEME_FRAMEWORK . 'metaboxes/page-metaboxes.php');
    require_once (MTHEME_FRAMEWORK . 'metaboxes/portfolio-metaboxes.php');
    require_once (MTHEME_FRAMEWORK . 'metaboxes/fullscreen-metaboxes.php');
    require_once (MTHEME_FRAMEWORK . 'metaboxes/post-metaboxes.php');
}

/* ------------------------------------------------------------------------- */
/* Load Constants : Core Libraries : Update Notifier */
/* ------------------------------------------------------------------------- */
mtheme_load_core_libaries();
mtheme_load_theme_metaboxes();

if (MTHEME_DEMO_STATUS) {
    require (get_template_directory() . "/framework/demopanel/demo_loader.php");
}



// If WooCommerce Plugin is active.
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) {

    add_action('admin_init', 'mtheme_update_woocommerce_images');

    function mtheme_update_woocommerce_images() {
        global $pagenow;
        if (is_admin() && isset($_GET['activated']) && 'themes.php' == $pagenow) {
            update_option('shop_catalog_image_size', array('width' => 400, 'height' => '', 0));
            update_option('shop_single_image_size', array('width' => 550, 'height' => '', 0));
            update_option('shop_thumbnail_image_size', array('width' => 150, 'height' => '', 0));
        }
    }

    add_theme_support('woocommerce');

    add_action('woocommerce_before_shop_loop_item_title', 'mtheme_woocommerce_template_loop_second_product_thumbnail', 11);

    // Display the second thumbnail on Hover
    function mtheme_woocommerce_template_loop_second_product_thumbnail() {
        global $product, $woocommerce;

        $attachment_ids = $product->get_gallery_attachment_ids();

        if ($attachment_ids) {
            $secondary_image_id = $attachment_ids['0'];
            echo wp_get_attachment_image($secondary_image_id, 'shop_catalog', '', $attr = array('class' => 'mtheme-secondary-thumbnail-image attachment-shop-catalog woo-thumbnail-fadeOutUp'));
        }
    }

    add_filter('post_class', 'mtheme_product_has_many_images');

    // Add pif-has-gallery class to products that have a gallery
    function mtheme_product_has_many_images($classes) {
        global $product;

        $post_type = get_post_type(get_the_ID());

        if ($post_type == 'product') {

            $attachment_ids = $product->get_gallery_attachment_ids();
            if ($attachment_ids) {
                $secondary_image_id = $attachment_ids['0'];
                $classes[] = 'mtheme-hover-thumbnail';
            }
        }

        return $classes;
    }

    // Remove sidebars from Woocommerce generated pages
    remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

    //Remove Star rating from archives
    //remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );

    add_filter('woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url');

    function woo_custom_breadrumb_home_url() {
        return home_url() . '/shop/';
    }

    function mtheme_woocommerce_category_add_to_products() {

        $product_cats = wp_get_post_terms(get_the_ID(), 'product_cat');

        if ($product_cats && !is_wp_error($product_cats)) {

            $single_cat = array_shift($product_cats);

            echo '<h4 itemprop="name" class="product_category_title"><span>' . $single_cat->name . '</span></h4>';
        }
    }

    add_action('woocommerce_single_product_summary', 'mtheme_woocommerce_category_add_to_products', 2);
    add_action('woocommerce_before_shop_loop_item_title', 'mtheme_woocommerce_category_add_to_products', 12);

    function mtheme_remove_cart_button_from_products_arcvhive() {
        remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
    }

    //add_action('init','mtheme_remove_cart_button_from_products_arcvhive');

    function mtheme_remove_archive_titles() {
        return false;
    }

    add_filter('woocommerce_show_page_title', 'mtheme_remove_archive_titles');

    add_action('wp_enqueue_scripts', 'mtheme_remove_woocommerce_styles', 99);

    function mtheme_remove_woocommerce_styles() {
        remove_action('wp_head', array($GLOBALS['woocommerce'], 'generator'));
        wp_dequeue_style('woocommerce_prettyPhoto_css');
        wp_dequeue_script('prettyPhoto-init');
    }

    // Display 8 products per page.
    add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'), 20);
}

function register_form_sortcode() {
    $conuntriesJson = file_get_contents(get_site_url() . '/catalog/get_country.php');
    $stateJson = file_get_contents(get_site_url() . '/catalog/get_state.php');
    ?>
    <div class="register-form-sc">

        <div id="register-form-wrp">
            <div class="header">
                <p>Register your account below.
                    Please note that you will not be able to access until the administrator approves your account.</p>
                <p>If you have any questions, please feel free to call us at 310-929-7211</p>
            </div>
            <div class="content">
                <div class="error"></div>
                <form action="" method="post" id="register-form-post">
                    <div class="content-left">
                        <h3 class="float-left personal">Your Personal Detals</h3>
                        <p class="float-left">* Required information</p>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="firstname" id="firstname" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="title">Title/Position:</label>
                            <input type="text" name="title" id="title" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="email_address">Email:</label>
                            <input type="text" name="email_address" id="email_address" value=""> <i>*</i>
                            <p>Not accepted: yahoo, aol, msn, hotmail, comcast</p>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="website">Website:</label>
                            <input type="text" name="website" id="website" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <h3>Company Details</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="company">Company Name:</label>
                            <input type="text" name="company" id="company" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="customers_group">Business:</label>

                            <span class="label_select">
                                <select id="customers_group" name="customers_group">
                                    <option value="">Select Here</option>
                                    <option value="12">Retail Store (independent)</option>
                                    <option value="13">Department Store</option>
                                    <option value="14">Contract - Hospitality</option>
                                    <option value="20">Trade Showroom</option>
                                    <option value="21">Architect</option>
                                    <option value="26">Interior Designer</option>
                                </select>
                            </span><i>*</i><div class="clear"></div>

                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="st">Sales Territory:</label>
                            <input type="text" name="st" id="st" value="">
                        </div>
                        <div class="clear"></div>
                        <h3>Your Address</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="country">Country:</label>
                            <span class="label_select">
                                <select id="country" name="country">
                                    <?php $conuntries = json_decode($conuntriesJson) ?>
                                    <?php $states = json_decode($stateJson) ?>
                                    <?php foreach ($conuntries as $code => $name): ?>
                                        <option value="<?php echo $code ?>" <?php echo ($code == 'US') ? 'selected' : '' ?>><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </span><i>*</i><div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="street_address">Street:</label>
                            <input type="text" name="street_address" id="street_address" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="postcode">Post Code:</label>
                            <input type="text" name="postcode" id="postcode" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="state">State:</label>
                            <span class="label_select">
                                <select id="state" name="state">
                                    <?php foreach ($states as $state): ?>
                                        <option value="<?php echo $state->id ?>" ><?php echo $state->text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <script>
                        var states = '<?php echo $stateJson ?>';
                    </script>
                    <div class="content-right">
                        <h3>Your Contact Info</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="telephone">Telephone Number:</label>
                            <input type="text" name="telephone" id="telephone" value="">
                            <label for="customers_telephone_ext">Ext.</label>
                            <input type="text" name="customers_telephone_ext" id="customers_telephone_ext" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="fax">Fax Number:</label>
                            <input type="text" name="fax" id="fax" value="">
                        </div>
                        <div class="clear"></div>
                        <h3>Your Password</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="password">Password:</label>
                            <input type="password" name="password" id="password" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="confirmation">Password Confirmation:</label>
                            <input type="password" name="confirmation" id="confirmation" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="other_option">Referral:</label>
                            <span class="label_select">
                                <select id="other_option" name="other_option">
                                    <option value="Advertisement">Advertisement</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Internet Search">Internet Search</option>
                                    <option value="Other">Other</option>
                                </select>
                            </span>
                            <i>*</i>
                            <div class="clear">
                                <label for="other_option_text">&nbsp;</label>
                                <input type="text" value="" id="other_option_text" style="display: none" name="other_option_text" class="text uni">
                            <div class="clear">
                            </div>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <button name="register-btn" id="register-btn" type="submit">Register</button> 
                </form>
                <div class="clear"></div>
            </div>

        </div>
        <div id="register-success-form" style="display: none;">
            <div class="header">
                <h3 class="thanks">Thank you, and one more thing!</h3>
                <p class="msg">You will not be able to access the catalog until the administrator approves your account. 
                    usually we approve accounts within the hour. </p>
                <p>We just sent you an email with your account details and if you do not seem to receive this email, please check your spam folder and 
                    make sure that info@scalaluxury.com is in your "save sender list"!</p>
                <p>Note: If you have used an email address against our recommendation by AOL, Comcast, Hotmail or MSN you will probably not receive 
                    the approval email, in which case you should email us directly or call us at 310-929-7211
                </p>
            </div>
        </div>
    </div>
    <?php
}

add_shortcode('register_form', 'register_form_sortcode');
?>