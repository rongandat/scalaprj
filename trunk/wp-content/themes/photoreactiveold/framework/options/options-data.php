<?php
/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {
	
	// Pull all Google Fonts using API into an array
	require ( MTHEME_PARENTDIR . '/framework/options/google-fonts.php');
	//$fontArray = unserialize($fontsSeraliazed);
	$google_font_array = json_decode ($google_api_output,true) ;
	//print_r( json_decode ($google_api_output) );
	
	$items = $google_font_array['items'];
	
	$options_fonts=array();
	array_push($options_fonts, "Default Font");
	$fontID = 0;
	foreach ($items as $item) {
		$fontID++;
		$variants='';
		$variantCount=0;
		foreach ($item['variants'] as $variant) {
			$variantCount++;
			if ($variantCount>1) { $variants .= '|'; }
			$variants .= $variant;
		}
		$variantText = ' (' . $variantCount . ' Varaints' . ')';
		if ($variantCount <= 1) $variantText = '';
		$options_fonts[ $item['family'] . ':' . $variants ] = $item['family']. $variantText;
	}
	
	// Pull all the categories into an array
	$options_categories = array(); 
	array_push($options_categories, "All Categories");
	$options_categories_obj = get_categories();
	foreach ($options_categories_obj as $category) {
    	$options_categories[$category->cat_ID] = $category->cat_name;
	}
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	if ($options_pages_obj) {
		foreach ($options_pages_obj as $page) {
			$options_pages[$page->ID] = $page->post_title;
		}
	}
	
	// Pull all the Featured into an array
	$featured_pages = get_posts('post_type=mtheme_featured&orderby=title&numberposts=-1&order=ASC');
	if ($featured_pages) {
		foreach($featured_pages as $key => $list) {
			$custom = get_post_custom($list->ID);
			if ( isset($custom["fullscreen_type"][0]) ) { 
				$slideshow_type=' ('.$custom["fullscreen_type"][0].')'; 
			} else {
			$slideshow_type="";
			}
			$options_featured[$list->ID] = $list->post_title . $slideshow_type;
		}
	} else {
		$options_featured[0]="Featured pages not found.";
	}
	
	// Pull all the Featured into an array
	$bg_slideshow_pages = mtheme_get_select_target_options('fullscreen_slideshow_posts');
	
	// Pull all the Portfolio into an array
	$portfolio_pages = get_posts('post_type=mtheme_portfolio&orderby=title&numberposts=-1&order=ASC');
	if ($portfolio_pages) {
		foreach($portfolio_pages as $key => $list) {
			$custom = get_post_custom($list->ID);
			$portfolio_list[$list->ID] = $list->post_title;
		}
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_template_directory_uri() . '/framework/options/images/';
	$theme_imagepath =  get_template_directory_uri() . '/images/';
		
	$options = array();
		
$options[] = array( "name" => __("General", "mthemelocal" ),
					"type" => "heading");
	$options[] = array( "name"			=> __( 'Fav icon file', 'mthemelocal' ),
						"desc"			=> __( "Customize with your fav icon. The fav icon is displayed in the browser window", 'mthemelocal' ),
						"id"			=> "general_fav_icon",
						"type"			=> "upload");
					
	$options[] = array( "name" => __( "Theme Style", "mthemelocal" ),
						"desc" => __( "Styles found in root theme : style_dark.css / style.css", 'mthemelocal' ),
						"id" => "general_theme_style",
						"std" => "light",
						"type" => "images",
						"options" => array(
							'light' => $imagepath . 'light.png',
							'dark' => $imagepath . 'dark.png')
						);

	$options[] = array( "name" => __("Disable Right Click", "mthemelocal" ),
						"desc" => __("Disable right clicking", "mthemelocal" ),
						"id" => "rightclick_disable",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __("Right Click Message", "mthemelocal" ),
						"desc" => __("This text appears in the popup when right click is disabled", "mthemelocal" ),
						"id" => "rightclick_disabletext",
						"std" => "You can enable/disable right clicking from Theme Options and customize this message too.",
						"type" => "textarea");

$options[] = array( "name" => __("Custom CSS", "mthemelocal" ),
					"type" => "heading");

	$options[] = array( "name" => __("Custom CSS", "mthemelocal" ),
						"desc" => __("You can include custom CSS to this field. There's also a custom.css file included with the theme which you can make additions to. <br/> eg. <code>.entry-title h1 { font-family: 'Lobster', cursive; }</code>", "mthemelocal" ),
						"id" => "custom_css",
						"std" => '',
						"class" => "big",
						"type" => "textarea");

$options[] = array( "name" => __("Logo", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => __( "Site Logo", 'mthemelocal' ),
						"desc" => __( "Upload logo for website.", 'mthemelocal' ),
						"id" => "main_logo",
						"type" => "upload");

	$options[] = array( "name" => __( "Logo Width", 'mthemelocal' ),
						"desc" => __( "Logo width in pixels", 'mthemelocal' ),
						"id" => "logo_width",
						"min" => "0",
						"max" => "2000",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "219",
						"type" => "text");
						
	$options[] = array( "name" => __( "Top Space", 'mthemelocal' ),
						"desc" => __( "Top spacing for logo ( 0 sets default )", 'mthemelocal' ),
						"id" => "logo_topmargin",
						"min" => "0",
						"max" => "200",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "0",
						"type" => "text");

	$options[] = array( "name" => __( "Bottom Space", 'mthemelocal' ),
						"desc" => __( "Bottom spacing for logo ( 0 sets default )", 'mthemelocal' ),
						"id" => "logo_bottommargin",
						"min" => "0",
						"max" => "200",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "0",
						"type" => "text");
						
	$options[] = array( "name" => __( "Left Space", 'mthemelocal' ),
						"desc" => __( "Left spacing for logo ( 0 sets default )", 'mthemelocal' ),
						"id" => "logo_leftmargin",
						"min" => "0",
						"max" => "200",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "0",
						"type" => "text");

	$options[] = array( "name" => __( "Responsive/Mobile Logo", 'mthemelocal' ),
						"desc" => __( "Upload logo for responsive layout.", 'mthemelocal' ),
						"id" => "responsive_logo",
						"type" => "upload");

	$options[] = array( "name" => __( "Responsive Logo Width", 'mthemelocal' ),
						"desc" => __( "Responsive Logo width in pixels", 'mthemelocal' ),
						"id" => "responsive_logo_width",
						"min" => "0",
						"max" => "2000",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "0",
						"type" => "text");

	$options[] = array( "name" => __( "Responsive Logo Top Space", 'mthemelocal' ),
						"desc" => __( "Top spacing for logo ( 0 sets default )", 'mthemelocal' ),
						"id" => "responsive_logo_topmargin",
						"min" => "0",
						"max" => "200",
						"step" => "0",
						"unit" => 'pixels',
						"std" => "0",
						"type" => "text");
						
$options[] = array( "name" => __( "Custom WordPress Login Page Logo", 'mthemelocal' ),
					"desc" => __( "Upload logo for WordPress Login Page", 'mthemelocal' ),
					"id" => "wplogin_logo",
					"type" => "upload");

$options[] = array( "name" => __("Background", "mthemelocal" ),
					"type" => "heading");		
						
	$options[] = array( "name" => __( "Background color", 'mthemelocal' ),
						"desc" => __( "No color selected by default.", 'mthemelocal' ),
						"id" => "general_background_color",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => __( "General Background Fullscreen Slideshow Page", 'mthemelocal' ),
						"desc" => __( "General Background Fullscreen Slideshow Page.", 'mthemelocal' ),
						"id" => "general_bgslideshow",
						"std" => "",
						"type" => "select",
						"class" => "small",
						"options" => $bg_slideshow_pages);
						
	$options[] = array( "name" => __( "Background image ( required for archive pages )", 'mthemelocal' ),
						"desc" => __( "Upload background image", 'mthemelocal' ),
						"id" => "general_background_image",
						"type" => "upload");

	$options[] = array( "name" => __( "Photowall Background image", 'mthemelocal' ),
						"desc" => __( "Upload background image", 'mthemelocal' ),
						"id" => "photowall_background_image",
						"type" => "upload");
						
	$options[] = array( "name" => __( "Background overlay pattern", 'mthemelocal' ),
						"desc" => __( "Background overlay patterns.", 'mthemelocal' ),
						"id" => "general_background_overlay",
						"std" => "0",
						"type" => "images",
						"options" => array(
							'0' => $theme_imagepath . 'overlays/options/sample-none.png',
							'01' => $theme_imagepath . 'overlays/options/sample-01.png',
							'02' => $theme_imagepath . 'overlays/options/sample-02.png',
							'03' => $theme_imagepath . 'overlays/options/sample-03.png',
							'04' => $theme_imagepath . 'overlays/options/sample-04.png',
							'05' => $theme_imagepath . 'overlays/options/sample-05.png',
							'06' => $theme_imagepath . 'overlays/options/sample-06.png',
							'07' => $theme_imagepath . 'overlays/options/sample-07.png',
							'08' => $theme_imagepath . 'overlays/options/sample-08.png',
							'09' => $theme_imagepath . 'overlays/options/sample-09.png',
							'10' => $theme_imagepath . 'overlays/options/sample-10.png',
							'11' => $theme_imagepath . 'overlays/options/sample-11.png',
							'12' => $theme_imagepath . 'overlays/options/sample-12.png',
							'13' => $theme_imagepath . 'overlays/options/sample-13.png',
							'14' => $theme_imagepath . 'overlays/options/sample-14.png',
							'15' => $theme_imagepath . 'overlays/options/sample-15.png')
						);

	$options[] = array( "name" => __( "Background pattern opacity ( default 85 )", 'mthemelocal' ),
						"desc" => __( "Background pattern opacity", 'mthemelocal' ),
						"id" => "background_opacity",
						"min" => "0",
						"max" => "100",
						"step" => "0",
						"unit" => '%',
						"std" => "85",
						"type" => "text");

$options[] = array( "name" => __("Fullscreen Homepage", "mthemelocal" ),
					"type" => "heading");

	$options[] = array( "name" => __( "Set Fullscreen Hompage", 'mthemelocal' ),
						"desc" => __( "Requires a Page created with Fullscreen Home template.", 'mthemelocal' ),
						"id" => "fullcscreen_hselected",
						"std" => "",
						"type" => "select",
						"class" => "small",
						"options" => mtheme_get_select_target_options('fullscreen_posts')
						);

$options[] = array( "name" => __("Fullscreen Media", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => "Audio Settings",
						"type" => "info");
					
	$options[] = array( "name" => __( "Loop Audio Clip", 'mthemelocal' ),
						"desc" => __( "Loop the audio clip for fullscreen slideshows", 'mthemelocal' ),
						"id" => "audio_loop",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "On-start volume", 'mthemelocal' ),
						"desc" => __( "Volume to start with", 'mthemelocal' ),
						"id" => "audio_volume",
						"min" => "1",
						"max" => "100",
						"step" => "0",
						"unit" => '%',
						"std" => "75",
						"type" => "text");
						
	$options[] = array( "name" => __("Slideshow Settings", "mthemelocal" ),
						"type" => "info");

	$options[] = array( "name" => __("Disable Slideshow Progress Bar", "mthemelocal" ),
						"desc" => __("Disable slideshow progress bar", "mthemelocal" ),
						"id" => "hprogressbar_disable",
						"std" => "0",
						"type" => "checkbox");

		$options[] = array( "name" => __("Disable Slideshow Play button", "mthemelocal" ),
							"desc" => __("Disable slideshow play button", "mthemelocal" ),
							"id" => "hplaybutton_disable",
							"std" => "0",
							"type" => "checkbox");

		$options[] = array( "name" => __("Disable Slideshow Navigation Arrows", "mthemelocal" ),
							"desc" => __("Disable navigation arrows", "mthemelocal" ),
							"id" => "hnavigation_disable",
							"std" => "0",
							"type" => "checkbox");
						
	// 0-None, 1-Fade, 2-Slide Top, 3-Slide Right, 4-Slide Bottom, 5-Slide Left, 6-Carousel Right, 7-Carousel Left					
	$options[] = array( "name" => __( "Transition", 'mthemelocal' ),
						"desc" => __( "Transition type", 'mthemelocal' ),
						"id" => "slideshow_transition",
						"std" => "1",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array(
							'1' => "Fade",
							'2' => "Slide Top",
							'3' => "Slide Right",
							'4' => "Slide Bottom",
							'5' => "Slide Left",
							'6' => "Carousel Right",
							'7' => "Carousel Left",
							'0' => "None")
						);
						
	$options[] = array( "name" => __( "Auto Play Slideshow", 'mthemelocal' ),
						"desc" => __( "Auto start slideshow on load", 'mthemelocal' ),
						"id" => "slideshow_autoplay",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Pause on last slide", 'mthemelocal' ),
						"desc" => __( "Pause on end of slideshow", 'mthemelocal' ),
						"id" => "slideshow_pause_on_last",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Pause on hover", 'mthemelocal' ),
						"desc" => __( "Pause slideshow on hover", 'mthemelocal' ),
						"id" => "slideshow_pause_hover",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Vertical center", 'mthemelocal' ),
						"desc" => __( "Vertical center images", 'mthemelocal' ),
						"id" => "slideshow_vertical_center",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Horizontal center", 'mthemelocal' ),
						"desc" => __( "Horizontal center images", 'mthemelocal' ),
						"id" => "slideshow_horizontal_center",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Fit portrait", 'mthemelocal' ),
						"desc" => __( "Portrait images will not exceed browser height", 'mthemelocal' ),
						"id" => "slideshow_portrait",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Fit Landscape", 'mthemelocal' ),
						"desc" => __( "Landscape images will not exceed browser width", 'mthemelocal' ),
						"id" => "slideshow_landscape",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Fit Always", 'mthemelocal' ),
						"desc" => __( "Image will never exceed browser width or height.", 'mthemelocal' ),
						"id" => "slideshow_fit_always",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __( "Slide Interval", "mthemelocal" ),
						"desc" => __( "Length between transitions", "mthemelocal" ),
						"id" => "slideshow_interval",
						"min" => "500",
						"max" => "20000",
						"step" => "0",
						"unit" => 'px',
						"std" => "8000",
						"type" => "text");
						
	$options[] = array( "name" => __( "Transition speed", "mthemelocal" ),
						"desc" => __( "Speed of transition", "mthemelocal" ),
						"id" => "slideshow_transition_speed",
						"std" => "1000",
						"min" => "500",
						"max" => "20000",
						"step" => "0",
						"unit" => 'px',
						"type" => "text");

$options[] = array( "name" => __("Color", "mthemelocal" ),
					"type" => "heading");

	$options[] = array( "name" => __( "Accent Color", "mthemelocal" ),
						"desc" => __( "Accent Color", "mthemelocal" ),
						"id" => "accent_color",
						"std" => "",
						"type" => "color");

	$options[] = array( "name" => __("Toggle Color", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'header_section_order');

		$options[] = array( "name" => __( "Fullscreen Toggle color", "mthemelocal" ),
							"desc" => __( "Fullscreen Toggle color", "mthemelocal" ),
							"id" => "fullscreen_toggle_color",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Fullscreen Toggle background color", "mthemelocal" ),
							"desc" => __( "Fullscreen Toggle background color", "mthemelocal" ),
							"id" => "fullscreen_toggle_bg",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Fullscreen Toggle Hover color", "mthemelocal" ),
							"desc" => __( "Fullscreen Toggle Hover color", "mthemelocal" ),
							"id" => "fullscreen_toggle_hovercolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Fullscreen Toggle Hover background color", "mthemelocal" ),
							"desc" => __( "Fullscreen Toggle Hover background color", "mthemelocal" ),
							"id" => "fullscreen_toggle_hoverbg",
							"std" => "",
							"type" => "color");

	$options[] = array( "name" => __("Menu Color", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'header_section_order');

		$options[] = array( "name" => __( "Menu Background fill", "mthemelocal" ),
							"desc" => __( "Menu Background fill", "mthemelocal" ),
							"id" => "menu_bg_fill",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Menu opacity ( default 65% )", 'mthemelocal' ),
							"desc" => __( "Menu opacity", 'mthemelocal' ),
							"id" => "menu_opacity_percent",
							"min" => "0",
							"max" => "100",
							"step" => "0",
							"unit" => '%',
							"std" => "65",
							"type" => "text");

		$options[] = array( "name" => __( "Menu Background Hover fill", "mthemelocal" ),
							"desc" => __( "Menu Background Hover fill", "mthemelocal" ),
							"id" => "menu_bg_hoverfill",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Menu Hover opacity ( default 60% )", 'mthemelocal' ),
							"desc" => __( "Menu hover opacity", 'mthemelocal' ),
							"id" => "menu_hoveropacity_percent",
							"min" => "0",
							"max" => "100",
							"step" => "0",
							"unit" => '%',
							"std" => "60",
							"type" => "text");

		$options[] = array( "name" => __( "Menu title link color", "mthemelocal" ),
							"desc" => __( "Menu title link color", "mthemelocal" ),
							"id" => "menu_title_color",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Menu title link hover color", "mthemelocal" ),
							"desc" => __( "Menu title link hover color", "mthemelocal" ),
							"id" => "menu_titlelinkhover_color",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Menu subcategory link color", "mthemelocal" ),
							"desc" => __( "Menu subcategory link color", "mthemelocal" ),
							"id" => "menusubcat_linkcolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Menu subcategory link hover color", "mthemelocal" ),
							"desc" => __( "Menu subcategory link hover color", "mthemelocal" ),
							"id" => "menusubcat_linkhovercolor",
							"std" => "",
							"type" => "color");

$options[] = array( "name" => __("Slideshow Color", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'header_section_order');

		$options[] = array( "name" => __("Fullscreen Slideshow title","mthemelocal"),
							"desc" => __("Fullscreen Slideshow title","mthemelocal"),
							"id" => "slideshow_title",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Slideshow caption text","mthemelocal"),
							"desc" => __("Fullscreen Slideshow caption text","mthemelocal"),
							"id" => "slideshow_captiontxt",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Slideshow caption background","mthemelocal"),
							"desc" => __("Fullscreen Slideshow caption background","mthemelocal"),
							"id" => "slideshow_captionbg",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Button text","mthemelocal"),
							"desc" => __("Fullscreen Button text","mthemelocal"),
							"id" => "slideshow_buttontxt",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Button border","mthemelocal"),
							"desc" => __("Fullscreen Button border","mthemelocal"),
							"id" => "slideshow_buttonborder",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Button Hover text","mthemelocal"),
							"desc" => __("Fullscreen Button Hover text","mthemelocal"),
							"id" => "slideshow_buttonhover_text",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __("Fullscreen Button Hover background","mthemelocal"),
							"desc" => __("Fullscreen Button Hover background","mthemelocal"),
							"id" => "slideshow_buttonhover_bg",
							"std" => "",
							"type" => "color");
						
	$options[] = array( "name" => __("Fullscreen Slideshow transition progress bar","mthemelocal"),
						"desc" => __("Slideshow transition progress bar","mthemelocal"),
						"id" => "slideshow_transbar",
						"std" => "",
						"type" => "color");

$options[] = array( "name" => __("Photowall Color", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'header_section_order');

		$options[] = array( "name" => __( "Photowall title color", "mthemelocal" ),
							"desc" => __( "Photowall title color", "mthemelocal" ),
							"id" => "photowall_title_color",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Photowall description color", "mthemelocal" ),
							"desc" => __( "Photowall description color", "mthemelocal" ),
							"id" => "photowall_description_color",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Photowall hover title color", "mthemelocal" ),
							"desc" => __( "Photowall hover title color", "mthemelocal" ),
							"id" => "photowall_hover_titlecolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Photowall hover description color", "mthemelocal" ),
							"desc" => __( "Photowall hover description color", "mthemelocal" ),
							"id" => "photowall_hover_descriptioncolor",
							"std" => "",
							"type" => "color");

	$options[] = array( "name" => __( "Apply custom Photowall opacity colors", 'mthemelocal' ),
						"desc" => __( "Apply custom Photowall opacity colors", 'mthemelocal' ),
						"id" => "photowall_customize",
						"std" => "0",
						"type" => "checkbox");

		$options[] = array( "name" => __( "Photowall default overlay color", "mthemelocal" ),
							"desc" => __( "Photowall default overlay color", "mthemelocal" ),
							"id" => "photowall_default_overlaycolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Photowall default overlay opacity ( default 80 )", 'mthemelocal' ),
							"desc" => __( "Photowall default overlay opacity", 'mthemelocal' ),
							"id" => "photowall_default_opacity",
							"min" => "0",
							"max" => "100",
							"step" => "0",
							"unit" => '%',
							"std" => "80",
							"type" => "text");

		$options[] = array( "name" => __( "Photowall hover overlay color", "mthemelocal" ),
							"desc" => __( "Photowall hover overlay color", "mthemelocal" ),
							"id" => "photowall_hover_overlaycolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Photowall hover overlay opacity ( default 50 )", 'mthemelocal' ),
							"desc" => __( "Photowall hover overlay opacity", 'mthemelocal' ),
							"id" => "photowall_hover_opacity",
							"min" => "0",
							"max" => "100",
							"step" => "0",
							"unit" => '%',
							"std" => "50",
							"type" => "text");

	$options[] = array( "name" => __("Page Color", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'header_section_order');

		$options[] = array( "name" => __( "Page background", "mthemelocal" ),
							"desc" => __( "Page background", "mthemelocal" ),
							"id" => "page_background",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Page opacity ( default 100 )", 'mthemelocal' ),
							"desc" => __( "Page opacity", 'mthemelocal' ),
							"id" => "page_opacity",
							"min" => "0",
							"max" => "100",
							"step" => "0",
							"unit" => '%',
							"std" => "100",
							"type" => "text");

		$options[] = array( "name" => __( "Page title color", "mthemelocal" ),
							"desc" => __( "Page title color", "mthemelocal" ),
							"id" => "page_headingcolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Page contents color", "mthemelocal" ),
							"desc" => __( "Page contents color", "mthemelocal" ),
							"id" => "page_contentscolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Page contents heading color", "mthemelocal" ),
							"desc" => __( "Page contents heading color", "mthemelocal" ),
							"id" => "page_contentsheading",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Sidebar background color", "mthemelocal" ),
							"desc" => __( "Sidebar background color", "mthemelocal" ),
							"id" => "sidebar_bgcolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Sidebar heading color", "mthemelocal" ),
							"desc" => __( "Sidebar heading color", "mthemelocal" ),
							"id" => "sidebar_headingcolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Sidebar link color", "mthemelocal" ),
							"desc" => __( "Sidebar link color", "mthemelocal" ),
							"id" => "sidebar_linkcolor",
							"std" => "",
							"type" => "color");

		$options[] = array( "name" => __( "Sidebar text color", "mthemelocal" ),
							"desc" => __( "Sidebar text color", "mthemelocal" ),
							"id" => "sidebar_textcolor",
							"std" => "",
							"type" => "color");

						
$options[] = array( "name" => __("Fonts", "mthemelocal" ),
					"type" => "heading");
					
$options[] = array( "name" => __("Enable Google Web Fonts", "mthemelocal" ),
					"desc" => __("Enable Google Web fonts", "mthemelocal" ),
					"id" => "default_googlewebfonts",
					"std" => "0",
					"type" => "checkbox");
						
	$options[] = array(	"name" => __("Menu Font", "mthemelocal" ),
						"desc" => __("Select menu font", "mthemelocal" ),
						"id" => "menu_font",
						"std" => '',
						"type" => "select",
						"class" => "small", //mini, tiny, small
						"options" => $options_fonts);

	$options[] = array(	"name" => __("Slideshow Title font","mthemelocal"),
						"desc" => __("Select font for slideshow title","mthemelocal"),
						"id" => "super_title",
						"std" => 'Default Font',
						"type" => "select",
						"class" => "small", //mini, tiny, small
						"options" => $options_fonts);
						
	$options[] = array(	"name" => __("Heading Font (applies to all headings)", "mthemelocal" ),
						"desc" => __("Select heading font", "mthemelocal" ),
						"id" => "heading_font",
						"std" => '',
						"type" => "select",
						"class" => "small", //mini, tiny, small
						"options" => $options_fonts);	
						
	$options[] = array(	"name" => __("Contents post/page heading (overide)", "mthemelocal" ),
						"desc" => __("Select font for headings inside posts and pages", "mthemelocal" ),
						"id" => "page_headings",
						"std" => '',
						"type" => "select",
						"class" => "small", //mini, tiny, small
						"options" => $options_fonts);

$options[] = array( "name" => __("Custom Font", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'default_googlewebfonts');

	$options[] = array( "name" => __("Font Embed Code", "mthemelocal" ),
						"desc" => __("eg. <code>&lt;link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'&gt;</code>", "mthemelocal" ),
						"id" => "custom_font_embed",
						"std" => '',
						"type" => "textarea");

	$options[] = array( "name" => __("CSS Codes for Custom Font", "mthemelocal" ),
						"desc" => __("eg. <code>.entry-title h1 { font-family: 'Lobster', cursive; }</code>", "mthemelocal" ),
						"id" => "custom_font_css",
						"std" => '',
						"type" => "textarea");

$options[] = array( "name" => __("Portfolio Page", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => __("Enable comments", "mthemelocal" ),
						"desc" => __("Enable comments for portfolio items. Switching off will disable comments and comment information on portfolio thumbnails.", "mthemelocal" ),
						"id" => "portfolio_comments",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Number of thumbnail columns for Portfolio archives listing", "mthemelocal" ),
						"desc" => __("Affects portfolio archives. eg. Browsing portfolio category and tag links.", "mthemelocal" ),
						"id" => "portfolio_achivelisting",
						"min" => "1",
						"max" => "4",
						"step" => "0",
						"unit" => 'columns',
						"std" => "4",
						"type" => "text");

	$options[] = array( "name" => __("Portfolio permalink slug (Important Note below)","mthemelocal"),
						"desc" => __("Slug name used in portfolio permalink. <br/> IMPORTANT NOTE: After changing this please make sure to flush the old cache by visiting wp-admin > Settings > Permalinks","mthemelocal"),
						"id" => "portfolio_permalink_slug",
						"std" => "project",
						"class" => "tiny",
						"type" => "text");

	$options[] = array( "name" => __("Portfolio refered as ( Singular )","mthemelocal"),
						"desc" => __("Text name to refer portfolio as a singular ( one item )","mthemelocal"),
						"id" => "portfolio_singular_refer",
						"std" => "Project",
						"class" => "tiny",
						"type" => "text");

	$options[] = array( "name" => __("Portfolio refered as ( Plural )","mthemelocal"),
						"desc" => __("Text name to refer portfolio as plural ( many items )","mthemelocal"),
						"id" => "portfolio_plural_refer",
						"std" => "Projects",
						"class" => "tiny",
						"type" => "text");

	$options[] = array( "name" => __("Refer to Client as","mthemelocal"),
						"desc" => __("Refer to Client as. Seen in Portfolio details pages","mthemelocal"),
						"id" => "portfolio_client_refer",
						"std" => "Client",
						"class" => "tiny",
						"type" => "text");

	$options[] = array( "name" => __("Refer to Skills as","mthemelocal"),
						"desc" => __("Refer to Skills as. Seen in Portfolio details pages","mthemelocal"),
						"id" => "portfolio_skill_refer",
						"std" => "Skills",
						"class" => "tiny",
						"type" => "text");

	$options[] = array( "name" => __("Filter tag for all Items","mthemelocal"),
						"desc" => __("Displays as a filterable tag in place of all items","mthemelocal"),
						"id" => "portfolio_allitems",
						"std" => "All Projects",
						"class" => "tiny",
						"type" => "text");
						
$options[] = array( "name" => __("Blog", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => __("Display Fullpost Archives", "mthemelocal" ),
						"desc" => __("Display fullpost archives", "mthemelocal" ),
						"id" => "postformat_fullcontent",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __("Hide allowed HTML tags info", "mthemelocal" ),
						"desc" => __("Hide allowed HTML tags info after comments box", "mthemelocal" ),
						"id" => "blog_allowedtags",
						"std" => "0",
						"type" => "checkbox");
					
	$options[] = array( "name" => __("Time format for blog posts", "mthemelocal" ),
						"desc" => __("Switch from traditional or modern time", "mthemelocal" ),
						"id" => "mtheme_datetime",
						"std" => "timeago",
						"type" => "select",
						"class" => "mini", //mini, tiny, small
						"options" => array(
							'modern' => "Modern time",
							'traditional' => "Traditional")
						);

	$options[] = array( "name" => __("Read more text", "mthemelocal" ),
						"desc" => __("Enter text for Read more", "mthemelocal" ),
						"id" => "read_more",
						"std" => "Continue reading",
						"class" => "small",
						"type" => "text");
						
$options[] = array( "name" => __("Contact Template", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => __("Section title", "mthemelocal" ),
						"desc" => __("Title for this section", "mthemelocal" ),
						"id" => "ctemplate_title",
						"std" => "We'd love to hear from you",
						"class" => "tiny",
						"type" => "textarea");
						
	$options[] = array( "name" => __("Email address", "mthemelocal" ),
						"desc" => __("Email address to recieve mail", "mthemelocal" ),
						"id" => "ctemplate_email",
						"std" => "email@address.com",
						"class" => "tiny",
						"type" => "text");
						
	$options[] = array( "name" => __("Label- Name Field", "mthemelocal" ),
						"desc" => __("Label for name field", "mthemelocal" ),
						"id" => "ctemplate_lname",
						"std" => "Name",
						"class" => "tiny",
						"type" => "text");
						
	$options[] = array( "name" => __("Label- Email Field", "mthemelocal" ),
						"desc" => __("Label for email field", "mthemelocal" ),
						"id" => "ctemplate_lemail",
						"std" => "E-mail",
						"class" => "tiny",
						"type" => "text");
						
	$options[] = array( "name" => __("Label- Subject Field", "mthemelocal" ),
						"desc" => __("Label for subject field", "mthemelocal" ),
						"id" => "ctemplate_lsubject",
						"std" => "Subject",
						"class" => "tiny",
						"type" => "text");
						
	$options[] = array( "name" => __("Label- Message Field", "mthemelocal" ),
						"desc" => __("Label for message field", "mthemelocal" ),
						"id" => "ctemplate_lmessage",
						"std" => "Message",
						"class" => "tiny",
						"type" => "text");
						
	$options[] = array( "name" => __("Error Notice - For no name input", "mthemelocal" ),
						"desc" => __("Error Notice - For no name input", "mthemelocal" ),
						"id" => "ctemplate_errorname",
						"std" => "Please enter name",
						"class" => "small",
						"type" => "text");
						
	$options[] = array( "name" => __("Error Notice - For no email input", "mthemelocal" ),
						"desc" => __("Error Notice - For no email input", "mthemelocal" ),
						"id" => "ctemplate_erroremail",
						"std" => "Please enter email",
						"class" => "small",
						"type" => "text");
						
	$options[] = array( "name" => __("Error Notice - For invalid email input", "mthemelocal" ),
						"desc" => __("Error Notice - For invalid email input", "mthemelocal" ),
						"id" => "ctemplate_invalidemail",
						"std" => "Please provide a valid email",
						"class" => "small",
						"type" => "text");
						
	$options[] = array( "name" => __("Error Notice - For no message input", "mthemelocal" ),
						"desc" => __("Error Notice - For no message input", "mthemelocal" ),
						"id" => "ctemplate_errormsg",
						"std" => "Please enter message",
						"class" => "small",
						"type" => "text");
						
	$options[] = array( "name" => __("Thank you message", "mthemelocal" ),
						"desc" => __("Thank you message", "mthemelocal" ),
						"id" => "ctemplate_thankyou",
						"std" => "<h2>Thank you!</h2>Your message was sent! This message along with the contact form labels are editable from theme options.",
						"class" => "tiny",
						"type" => "textarea");
						
	$options[] = array( "name" => __("Button text", "mthemelocal" ),
						"desc" => __("Button text for form", "mthemelocal" ),
						"id" => "ctemplate_button",
						"std" => "Send",
						"class" => "tiny",
						"type" => "text");

$options[] = array( "name" => __("Sidebars", "mthemelocal" ),
					"type" => "heading");

				
	for ($sidebar_count=1; $sidebar_count <=MTHEME_MAX_SIDEBARS; $sidebar_count++ ) {

	$options[] = array( "name" => __("Sidebar ", "mthemelocal" ) . $sidebar_count,
							"type" => "info");
						
		$options[] = array( "name" => __("Sidebar Name", "mthemelocal" ),
						"desc" => __("Activate sidebars by naming them.", "mthemelocal" ),
						"id" => "theme_sidebar".$sidebar_count,
						"std" => "",
						"class" => "small",
						"type" => "text");

		$options[] = array( "name" => __("Sidebar Description", "mthemelocal" ),
						"desc" => __("A small description to display inside the widget to easily identify it. Widget description is only shown in admin mode inside the widget.", "mthemelocal" ),
						"id" => "theme_sidebardesc".$sidebar_count,
						"std" => "",
						"class" => "small",
						"type" => "text");
	}

$options[] = array( "name" => __("WPML", "mthemelocal" ),
					"type" => "heading");

	$options[] = array( "name" => __( "Disable Built-in WPML language selector", 'mthemelocal' ),
						"desc" => __( "Disable Built-in WPML language selector", 'mthemelocal' ),
						"id" => "wpml_lang_selector_disable",
						"std" => "0",
						"type" => "checkbox");

$options[] = array( "name" => __("WooCommerce", "mthemelocal" ),
					"type" => "heading");

		$options[] = array( "name" => __("WooCommerce Shop default title", "mthemelocal" ),
						"desc" => __("Shop title for WooCommerce shop. ( default 'Shop' ).", "mthemelocal" ),
						"id" => "mtheme_woocommerce_shoptitle",
						"std" => "Shop",
						"class" => "small",
						"type" => "text");
						
$options[] = array( "name" => __("Footer", "mthemelocal" ),
					"type" => "heading");
					
	$options[] = array( "name" => __("Copyright text", "mthemelocal" ),
						"desc" => __("Enter your copyright and other texts to display in footer", "mthemelocal" ),
						"id" => "footer_copyright",
						"std" => "Copyright 2014",
						"type" => "textarea");
						
	$options[] = array( "name" => __("Footer Scripts", "mthemelocal" ),
						"desc" => __("Enter footer scripts. eg. Google Analytics. ", "mthemelocal" ),
						"id" => "footer_scripts",
						"std" => "",
						"type" => "textarea");

$options[] = array( "name" => __("Export", "mthemelocal" ),
					"type" => "heading");

	$options[] = array( "name" => __("Export Options ( Copy this ) Read-Only.", "mthemelocal" ),
						"desc" => __("Select All, copy and store your theme options backup. You can use these value to import theme options settings.", "mthemelocal" ),
						"id" => "exportpack",
						"std" => '',
						"class" => "big",
						"type" => "textarea");

$options[] = array( "name" => __("Import Options", "mthemelocal" ),
					"type" => "heading",
					"subheading" => 'exportpack');

	$options[] = array( "name" => __("Import Options ( Paste and Save )", "mthemelocal" ),
						"desc" => __("CAUTION: Copy and Paste the Export Options settings into the window and Save to apply theme options settings.", "mthemelocal" ),
						"id" => "importpack",
						"std" => '',
						"class" => "big",
						"type" => "textarea");

	return $options;
}

?>