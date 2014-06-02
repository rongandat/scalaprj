<?php
/*
Plugin Name: iMaginem Widget Set
Plugin URI: http://www.imaginemthemes.com/plugins/mthemeshortcodes
Description: Imaginem Themes Widget Set.
Version: 2.0.0
Author: iMaginem
Author URI: http://www.imaginemthemes.com
*/

define('MTHEME_WIDGET_PREFIX', "THEME");
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/twitter/widget.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/sidebar-gallery.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/recent.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/popular.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/social.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/flickr.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/address.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/video.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/portfolio-related-list.php');
require_once ( plugin_dir_path( __FILE__ ) . 'widgets/portfolio-type.php');
?>