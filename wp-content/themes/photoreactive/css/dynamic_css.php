<?php
//declare dynamic_css string
//String will be populated with classes will be fetched from functions.php and added to script CSS using WP function add style
$dynamic_css='';
$theme_imagepath =  get_template_directory_uri() . '/images/';
//  Background Pattern
$general_background_image=of_get_option('general_background_image');
// Set backgrounf if it's not fullscreen
if ($general_background_image) {
	//$dynamic_css .= 'body {background-image: url('. $general_background_image.'); background-size:cover;}';
	}

//Background Overlay
$background_overlay=of_get_option('general_background_overlay');
if ( $background_overlay ) { 
	$dynamic_css .= '.pattern-overlay { background: transparent url('.$theme_imagepath. 'overlays/'.$background_overlay.'.png) repeat; } ';
} else { 
	$dynamic_css .= '.pattern-overlay {background:none;}'; 
}

$heading_classes='
h1,
h2,
h3,
h4,
h5,
h6,
.sidebar h3';

$page_heading_classes='
.entry-content h1,
.entry-content h2,
.entry-content h3,
.entry-content h4,
.entry-content h5,
.entry-content h6,
ul#portfolio-tiny h4,
ul#portfolio-small h4, ul#portfolio-large h4,
.entry-post-title h2
';
//Font
if (of_get_option('default_googlewebfonts')) {
	$dynamic_css .= mtheme_apply_font ( "heading_font" , $heading_classes );
	$dynamic_css .= mtheme_apply_font ( "page_headings" , $page_heading_classes );
	$dynamic_css .= mtheme_apply_font ( "menu_font" , ".mainmenu-navigation .homemenu ul li, .mainmenu-navigation .homemenu ul li a" );
	$dynamic_css .= mtheme_apply_font ( "super_title" , ".slideshow_title" );
}
//Logo
$logo_width=of_get_option('logo_width');
if ($logo_width) {
	$dynamic_css .= '.logo img { width: '.$logo_width.'px; }';
}
$logo_topmargin=of_get_option('logo_topmargin');
if ($logo_topmargin) {
	$dynamic_css .= '.logo { margin-top: '.$logo_topmargin.'px; }';
}
$logo_bottommargin=of_get_option('logo_bottommargin');
if ($logo_bottommargin) {
	$dynamic_css .= '.logo { margin-bottom: '.$logo_bottommargin.'px; }';
}
$logo_leftmargin=of_get_option('logo_leftmargin');
if ($logo_leftmargin) {
	$dynamic_css .= '.logo { margin-left: '.$logo_leftmargin.'px; }';
}
$responsive_logo_width = of_get_option('responsive_logo_width');
if ($responsive_logo_width) {
	$dynamic_css .= '.logo-mobile .logoimage { width: '.$responsive_logo_width.'px; }';
	$dynamic_css .= '.logo-mobile .logoimage { height: auto; }';
}
$responsive_logo_topmargin = of_get_option('responsive_logo_topmargin');
if ($responsive_logo_topmargin) {
	$dynamic_css .= '.logo-mobile .logoimage { top: '.$responsive_logo_topmargin.'px; }';
}

$background_opacity = of_get_option('background_opacity');
$background_opacity_percent = $background_opacity/100;
if ( isSet($background_opacity) )  {
	$dynamic_css .= '.pattern-overlay { opacity: '.$background_opacity_percent.'; }';
}

//Accents
$accent_color=of_get_option('accent_color');
$accent_color_rgb=mtheme_hex2RGB($accent_color,true);
$slideshow_transbar_rgb=mtheme_hex2RGB($accent_color,true);

if ($accent_color) {
$accent_change_color = "
.entry-content .toggle-shortcode,
.pricing-table .pricing_highlight .pricing-price,
#commentform .required,
.portfolio-share li a,
.gridblock-four h4 a:hover,
.gridblock-three h4 a:hover,
.gridblock-two h4 a:hover,
.gridblock-one h4 a:hover,
.gridblock-list h4 a:hover
";
$woo_accent_change_color = "
.woocommerce ul.products li.product h3:hover,
.woocommerce-page ul.products li.product h3:hover,
.woocommerce-breadcrumb a,
.woocommerce .product_meta a
";

$accent_change_background = "
.menu-toggle:hover,
#gridblock-filters a:hover,
#gridblock-filters li a:hover,
#gridblock-filters li a:hover span,
.photowall-content-wrap,
.gridblock-displayed .gridblock-selected-icon,
.skillbar-title,
.skillbar-bar,
.homemenu li.current-menu-item:after, .homemenu li.current-menu-ancestor:after
";
$woo_accent_change_background = "
.woocommerce span.onsale, .woocommerce-page span.onsale,
.woocommerce ul.products li.product .price .from,
.woocommerce-page ul.products li.product .price .from,
.woocommerce ul.products li.product .price del,
.woocommerce-page ul.products li.product .price del,
.mtheme-woo-order-list ul li:hover
";

$accent_change_border = "
.menu-toggle:hover:after,
#gridblock-filter-select:hover,
ul#thumb-list li.current-thumb,
ul#thumb-list li.current-thumb:hover,
.home-step:hover .step-element img,
.home-step-wrap li,
.gridblock-element:hover,
.gridblock-grid-element:hover,
.gridblock-displayed:hover,
.ui-tabs .ui-tabs-nav .ui-state-active a,
.ui-tabs .ui-tabs-nav .ui-state-active a:hover,
.entry-content blockquote,
#gridblock-filters li .is-active,
#gridblock-filters li a:focus,
#gridblock-filters a:focus,
#gridblock-filters li .is-active,
#gridblock-filters li .is-active:hover,
.mtheme-woo-order-selected:hover
";

	$dynamic_css .= mtheme_change_class($accent_change_color,"color",$accent_color,'');
	$dynamic_css .= mtheme_change_class($woo_accent_change_color,"color",$accent_color,'important');

	$dynamic_css .= mtheme_change_class($accent_change_background,"background-color",$accent_color,'');
	$dynamic_css .= mtheme_change_class($woo_accent_change_background,"background-color",$accent_color,'important');

	$dynamic_css .= mtheme_change_class($accent_change_border,"border-color",$accent_color,'');
	$dynamic_css .= ".gridblock-background-hover {
		background: -moz-linear-gradient(left,  rgba(".$accent_color_rgb.",1) 0%, rgba(".$accent_color_rgb.",0.35) 100%);
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(".$accent_color_rgb.",1)), color-stop(100%,rgba(".$accent_color_rgb.",0.35)));
		background: -webkit-linear-gradient(left,  rgba(".$accent_color_rgb.",1) 0%,rgba(".$accent_color_rgb.",0.35) 100%);
		background: -o-linear-gradient(left,  rgba(".$accent_color_rgb.",1) 0%,rgba(".$accent_color_rgb.",0.35) 100%);
		background: -ms-linear-gradient(left,  rgba(".$accent_color_rgb.",1) 0%,rgba(".$accent_color_rgb.",0.35) 100%);
		background: linear-gradient(to right,  rgba(".$accent_color_rgb.",1) 0%,rgba(".$accent_color_rgb.",0.35) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$accent_color_rgb."', endColorstr='#59".$accent_color_rgb."',GradientType=1 );
	}";
	$dynamic_css .= "#progress-bar {background:".$accent_color.";}";

	$dynamic_css .= ".wp-accordion h3.ui-state-active { border-left-color:".$accent_color.";}";
	$dynamic_css .= ".calltype-line-right .callout { border-right-color:".$accent_color.";}";
	$dynamic_css .= ".calltype-line-left .callout { border-left-color:".$accent_color.";}";
	$dynamic_css .= ".calltype-line-top .callout { border-top-color:".$accent_color.";}";
	$dynamic_css .= ".calltype-line-bottom .callout { border-bottom-color:".$accent_color.";}";
}

// Menu colors

$menu_bg_fill=of_get_option('menu_bg_fill');
$menu_bg_fill_rgb=mtheme_hex2RGB($menu_bg_fill,true);
if ($menu_bg_fill) {
	$menu_opacity_percent = of_get_option('menu_opacity_percent')/100;
	$dynamic_css .= '.header-elements-wrap { background: rgba('.$menu_bg_fill_rgb.','.$menu_opacity_percent.'); }';
	$dynamic_css .= '.mobile-menu-toggle { background: '.$menu_bg_fill.'; }';
}
$menu_bg_hoverfill=of_get_option('menu_bg_hoverfill');
$menu_bg_hoverfill_rgb=mtheme_hex2RGB($menu_bg_hoverfill,true);
if ($menu_bg_hoverfill) {
	$menu_hoveropacity_percent = of_get_option('menu_hoveropacity_percent')/100;
	$dynamic_css .= '.header-element-underpaint { background-color: rgba('.$menu_bg_hoverfill_rgb.','.$menu_hoveropacity_percent.'); }';
} else {
	$dynamic_css .= '.header-element-underpaint { background-color: rgba(0,0,0,0.6); }';
}

$menu_title_color=of_get_option('menu_title_color');
if ($menu_title_color) {
	$dynamic_css .= mtheme_change_class('.mainmenu-navigation .homemenu ul li a, .mobile-menu-selected',"color",$menu_title_color,'');
}

$menu_titlelinkhover_color=of_get_option('menu_titlelinkhover_color');
if ($menu_titlelinkhover_color) {
	$dynamic_css .= mtheme_change_class('.mainmenu-navigation .homemenu ul li a:hover',"color",$menu_titlelinkhover_color,'');
}

$menusubcat_linkcolor=of_get_option('menusubcat_linkcolor');
if ($menusubcat_linkcolor) {
	$dynamic_css .= mtheme_change_class('.mainmenu-navigation .homemenu ul ul li a',"color",$menusubcat_linkcolor,'');
}

$menusubcat_linkhovercolor=of_get_option('menusubcat_linkhovercolor');
if ($menusubcat_linkhovercolor) {
	$dynamic_css .= mtheme_change_class('.mainmenu-navigation .homemenu ul ul li:hover>a ',"color",$menusubcat_linkhovercolor,'');
}

// Slideshow Color

$slideshow_title=of_get_option('slideshow_title');
if ($slideshow_title) {
	$dynamic_css .= mtheme_change_class( '.slideshow_title', "color",$slideshow_title,'' );
}
$slideshow_captiontxt=of_get_option('slideshow_captiontxt');
if ($slideshow_captiontxt) {
	$dynamic_css .= mtheme_change_class( '#slidecaption .slideshow_caption', "color",$slideshow_captiontxt,'' );
}
$slideshow_buttontxt=of_get_option('slideshow_buttontxt');
if ($slideshow_buttontxt) {
	$dynamic_css .= mtheme_change_class( '.slideshow_content_link a, .static_slideshow_content_link a', "color",$slideshow_buttontxt,'' );
}
$slideshow_buttonborder=of_get_option('slideshow_buttonborder');
if ($slideshow_buttonborder) {
	$dynamic_css .= mtheme_change_class( '.slideshow_content_link a, .static_slideshow_content_link a', "border-color",$slideshow_buttonborder,'' );
}
$slideshow_buttonhover_text=of_get_option('slideshow_buttonhover_text');
if ($slideshow_buttonhover_text) {
	$dynamic_css .= mtheme_change_class( '.slideshow_content_link a:hover, .static_slideshow_content_link a:hover', "color",$slideshow_buttonhover_text,'' );
}
$slideshow_buttonhover_bg=of_get_option('slideshow_buttonhover_bg');
if ($slideshow_buttonhover_bg) {
	$dynamic_css .= mtheme_change_class( '.slideshow_content_link a:hover, .static_slideshow_content_link a:hover', "background-color",$slideshow_buttonhover_bg,'' );
	$dynamic_css .= mtheme_change_class( '.slideshow_content_link a:hover, .static_slideshow_content_link a:hover', "border-color",$slideshow_buttonhover_bg,'' );
}
$slideshow_captionbg=of_get_option('slideshow_captionbg');
$slideshow_captionbg_rgb=mtheme_hex2RGB($slideshow_captionbg,true);
if ($slideshow_captionbg) {
	$dynamic_css .= "#slidecaption {
background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(".$slideshow_captionbg_rgb.",0.55) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(".$slideshow_captionbg_rgb.",0.55)));
background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(".$slideshow_captionbg_rgb.",0.55) 100%);
background: -o-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(".$slideshow_captionbg_rgb.",0.55) 100%);
background: -ms-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(".$slideshow_captionbg_rgb.",0.55) 100%);
background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(".$slideshow_captionbg_rgb.",0.55) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='".$slideshow_captionbg."', endColorstr='".$slideshow_captionbg."',GradientType=0 );
}";
}
$slideshow_transbar=of_get_option('slideshow_transbar');
$slideshow_transbar_rgb=mtheme_hex2RGB($slideshow_transbar,true);
if ($slideshow_transbar) {
	$dynamic_css .= "
	#progress-bar {
	background:".$slideshow_transbar.";
	}
	";
}
$slideshow_currthumbnail=of_get_option('slideshow_currthumbnail');
if ($slideshow_currthumbnail) {
	$dynamic_css .= mtheme_change_class( 'ul#thumb-list li.current-thumb', "border-color",$slideshow_currthumbnail,'');
}


$general_bgcolor = of_get_option('general_background_color');
if ($general_bgcolor) {
	$dynamic_css .= mtheme_change_class( 'body',"background-color", $general_bgcolor,'' );
}
$page_background=of_get_option('page_background');
$page_background_rgb=mtheme_hex2RGB($page_background,true);
$page_opacity = of_get_option('page_opacity');
$page_opacity_percent = $page_opacity/100;
if ($page_background) {
	$dynamic_css .= '.container-wrapper { background:rgba('. $page_background_rgb .','.$page_opacity_percent.'); }';
}

$page_headingcolor=of_get_option('page_headingcolor');
if ($page_headingcolor) {
	$dynamic_css .= mtheme_change_class( '.entry-title h1,.entry-title h2', "color",$page_headingcolor,'' );
}
$page_contentscolor=of_get_option('page_contentscolor');
if ($page_contentscolor) {
	$dynamic_css .= mtheme_change_class( '.entry-content,.entry-content .pullquote-left,.entry-content .pullquote-right,.entry-content .pullquote-center', "color",$page_contentscolor,'' );
}
$page_contentsheading=of_get_option('page_contentsheading');
if ($page_contentsheading) {
$content_headings = '
.entry-content h1,
.entry-content h2,
.entry-content h3,
.entry-content h4,
.entry-content h5,
.entry-content h6
';
	$dynamic_css .= mtheme_change_class( $content_headings, "color",$page_contentsheading,'' );
}

$fullscreen_toggle_color = of_get_option('fullscreen_toggle_color');
if ($fullscreen_toggle_color) {
	$dynamic_css .= mtheme_change_class( '.menu-toggle',"color", $fullscreen_toggle_color,'' );
}
$fullscreen_toggle_bg = of_get_option('fullscreen_toggle_bg');
if ($fullscreen_toggle_bg) {
	$dynamic_css .= mtheme_change_class( '.menu-toggle',"background-color", $fullscreen_toggle_bg,'' );
	$dynamic_css .= mtheme_change_class( '.menu-toggle:after',"border-color", $fullscreen_toggle_bg,'' );
}

$fullscreen_toggle_hovercolor = of_get_option('fullscreen_toggle_hovercolor');
if ($fullscreen_toggle_hovercolor) {
	$dynamic_css .= mtheme_change_class( '.menu-toggle:hover',"color", $fullscreen_toggle_hovercolor,'' );
}

$fullscreen_toggle_hoverbg = of_get_option('fullscreen_toggle_hoverbg');
if ($fullscreen_toggle_hoverbg) {
	$dynamic_css .= mtheme_change_class( '.menu-toggle:hover',"background-color", $fullscreen_toggle_hoverbg,'' );
	$dynamic_css .= mtheme_change_class( '.menu-toggle:hover:after',"border-color", $fullscreen_toggle_hoverbg,'' );
}

$footer_copyrightbg=of_get_option('footer_copyrightbg');
$footer_copyrightbg_rgb=mtheme_hex2RGB($footer_copyrightbg,true);
if ($footer_copyrightbg) {
	$dynamic_css .= '#copyright { background:rgba('. $footer_copyrightbg_rgb .',0.8); }';
}
$footer_copyrighttext=of_get_option('footer_copyrighttext');
if ($footer_copyrighttext) {
	$dynamic_css .= mtheme_change_class( '#copyright', "color",$footer_copyrighttext,'' );
}


$sidebar_headingcolor=of_get_option('sidebar_headingcolor');
if ($sidebar_headingcolor) {
	$dynamic_css .= mtheme_change_class( '.sidebar h3', "color",$sidebar_headingcolor,'' );
}
$sidebar_linkcolor=of_get_option('sidebar_linkcolor');
if ($sidebar_linkcolor) {
	$dynamic_css .= mtheme_change_class( '#recentposts_list .recentpost_info .recentpost_title, #popularposts_list .popularpost_info .popularpost_title,.sidebar a', "color",$sidebar_linkcolor,'' );
}
$sidebar_textcolor=of_get_option('sidebar_textcolor');
if ($sidebar_textcolor) {
	$dynamic_css .= mtheme_change_class( '.contact_address_block .about_info, #footer .contact_address_block .about_info, #recentposts_list p, #popularposts_list p,.sidebar-widget ul#recentcomments li,.sidebar', "color",$sidebar_textcolor,'' );
}
$sidebar_bgcolor=of_get_option('sidebar_bgcolor');
$sidebar_bgcolor_rgb=mtheme_hex2RGB($sidebar_bgcolor,true);
if ($sidebar_bgcolor) {
	$dynamic_css .= '.sidebar-wrap, .sidebar-wrap-single {
	background: -moz-linear-gradient(top,  rgba('.$sidebar_bgcolor_rgb.',0.05) 0%, rgba(0,0,0,0) 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba('.$sidebar_bgcolor_rgb.',0.05)), color-stop(100%,rgba(0,0,0,0))); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top,  rgba('.$sidebar_bgcolor_rgb.',0.05) 0%,rgba(0,0,0,0) 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top,  rgba('.$sidebar_bgcolor_rgb.',0.05) 0%,rgba(0,0,0,0) 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top,  rgba('.$sidebar_bgcolor_rgb.',0.05) 0%,rgba(0,0,0,0) 100%); /* IE10+ */
	background: linear-gradient(to bottom,  rgba('.$sidebar_bgcolor_rgb.',0.05) 0%,rgba(0,0,0,0) 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#0d000000", endColorstr="#00'.$sidebar_bgcolor_rgb.'",GradientType=0 ); /* IE6-9 */
	}';
}

if ( of_get_option('custom_font_css')<>"" ) {
	$dynamic_css .= of_get_option('custom_font_css');
}

$photowall_title_color=of_get_option('photowall_title_color');
if ($photowall_title_color) {
$dynamic_css .= mtheme_change_class( '.photowall-title', "color",$photowall_title_color,'' );
}

$photowall_description_color=of_get_option('photowall_description_color');
if ($photowall_description_color) {
$dynamic_css .= mtheme_change_class( '.photowall-desc', "color",$photowall_description_color,'' );
}

$photowall_hover_titlecolor=of_get_option('photowall_hover_titlecolor');
if ($photowall_hover_titlecolor) {
$dynamic_css .= mtheme_change_class( '.photowall-item:hover .photowall-title', "color",$photowall_hover_titlecolor,'' );
}
$photowall_hover_descriptioncolor=of_get_option('photowall_hover_descriptioncolor');
if ($photowall_hover_descriptioncolor) {
$dynamic_css .= mtheme_change_class( '.photowall-item:hover .photowall-desc', "color",$photowall_hover_descriptioncolor,'' );
}

$photowall_description_color=of_get_option('photowall_description_color');
if ($photowall_description_color) {
$dynamic_css .= mtheme_change_class( '.photowall-desc', "color",$photowall_description_color,'' );
}

$photowall_customize = of_get_option('photowall_customize');
if ($photowall_customize) {

$dynamic_css .= '
.photowall-content-wrap {
	transition: background 1s;
	-moz-transition: background 1s;
	-webkit-transition: background 1s;
	-o-transition: background 1s;
}

.photowall-item:hover .photowall-content-wrap {
	transition: background 0.5s;
	-moz-transition: background 0.5s;
	-webkit-transition: background 0.5s;
	-o-transition: background 0.5s;
}
.photowall-item .photowall-desc,
.photowall-item .photowall-title {
	transition: color 0.5s;
	-moz-transition: color 0.5s;
	-webkit-transition: color 0.5s;
	-o-transition: color 0.5s;
}
.photowall-item:hover .photowall-desc,
.photowall-item:hover .photowall-title {
	transition: color 0.5s;
	-moz-transition: color 0.5s;
	-webkit-transition: color 0.5s;
	-o-transition: color 0.5s;
}';

	$photowall_default_overlaycolor=of_get_option('photowall_default_overlaycolor');
	$photowall_default_overlaycolor_rgb=mtheme_hex2RGB($photowall_default_overlaycolor,true);
	$photowall_default_opacity_percent = of_get_option('photowall_default_opacity')/100;

	if ($photowall_default_overlaycolor) {
		$dynamic_css .= '.photowall-content-wrap { opacity:1; background: rgba('.$photowall_default_overlaycolor_rgb.','.$photowall_default_opacity_percent.'); }';
	} else {
		$dynamic_css .= '.photowall-content-wrap { opacity:1; background: rgba(0,0,0,'.$photowall_default_opacity_percent.'); }';
	}

	$photowall_hover_overlaycolor=of_get_option('photowall_hover_overlaycolor');
	$photowall_hover_overlaycolor_rgb=mtheme_hex2RGB($photowall_hover_overlaycolor,true);
	$photowall_hover_opacity_percent = of_get_option('photowall_hover_opacity')/100;

	if ($photowall_hover_overlaycolor) {
		$dynamic_css .= '.photowall-item:hover .photowall-content-wrap { opacity:1; background: rgba('.$photowall_hover_overlaycolor_rgb.','.$photowall_hover_opacity_percent.'); }';
	} else {
		$dynamic_css .= '.photowall-item:hover .photowall-content-wrap { opacity:1; background: rgba(0,0,0,'.$photowall_hover_opacity_percent.'); }';
	}
}

$blog_allowedtags=of_get_option('blog_allowedtags');
if ($blog_allowedtags) {
$dynamic_css .= '.form-allowed-tags { display:none; }';
}
$dynamic_css .= stripslashes_deep( of_get_option('custom_css') );
?>