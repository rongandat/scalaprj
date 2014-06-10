<?php
// Check fullscreen type
function mtheme_get_fullscreen_type() {
	$fullscreen_type=false;
	if ( is_page_template('template-fullscreen-home.php') ) {
		$custom = get_post_custom( of_get_option('fullcscreen_hselected') );
	} else{
		$custom = get_post_custom( get_the_id() );
	}
	if ( isSet($custom[ MTHEME . "_fullscreen_type"][0]) ) {
		$fullscreen_type = $custom[ MTHEME . "_fullscreen_type"][0];
	}
	return $fullscreen_type;
}
// Check if it's a fullscreen post
function mtheme_is_fullscreen_post(){
	$fullscreen_post_check = false;
	if ( is_singular( 'mtheme_featured' ) ) {
		$fullscreen_post_check = true;
	}
	if ( is_page_template('template-fullscreen-home.php') ) {
		$fullscreen_post_check = true;
	}
	return $fullscreen_post_check;
}
// Get active fullscreen post
function mtheme_get_active_fullscreen_post() {
	if ( is_page_template('template-fullscreen-home.php') ) {
		$fullscreen_page_id=of_get_option('fullcscreen_hselected');
	} else {
		$fullscreen_page_id=get_the_id();
	}
	return $fullscreen_page_id;
}
/*
Check fullscreen type and return the correct page.
*/
function mtheme_get_fullscreen_file($fullscreen_type) {
	switch ($fullscreen_type) {

		case "photowall" :
			$fullscreen_load = 'fullscreen/photowall.php';
		break;

		case "kenburns" :
			$fullscreen_load = 'fullscreen/kenburns.php';
		break;
		
		case "slideshow" :
		case "Slideshow-plus-captions" :
			$fullscreen_load = 'fullscreen/supersized.php';
		break;
		
		case "video" :
			remove_action('mtheme_background_overlays', 'mtheme_background_overlays_display');
			$fullscreen_load = 'fullscreen/fullscreenvideo.php';
		break;
		default:
		break;
	}
	return $fullscreen_load;
}
// Get Attached images applied with custom script
function mtheme_get_custom_attachments( $page_id ) {
	$the_image_ids = get_post_meta( $page_id , '_mtheme_image_ids');
	if ($the_image_ids) {
		$filter_image_ids = explode(',', $the_image_ids[0]);
		return $filter_image_ids;
	}
}
// Enqueque Font
function mtheme_enqueue_font ( $sectionName ) {		
	$got_font=of_get_option($sectionName);
	if ( ! MTHEME_BUILDMODE ) {
		if ($got_font) {
			$font_pieces = explode(":", $got_font);
			
			$font_name = $font_pieces[0];
			$font_name = str_replace (" ","+", $font_pieces[0] );
			
			if (isset ($font_pieces[1]) ) {
				$font_variants = $font_pieces[1];
				$font_variants = str_replace ("|",",", $font_pieces[1] );
			} else {
				$font_variants="";
			}
			$font_url = 'http://fonts.googleapis.com/css?family='.$font_name . ':' . $font_variants;
			$google_font['name'] = $font_name;
			$google_font['url'] = $font_url;
			return $google_font;
		}
	}
	
}
//Apply Font used by Dynamic_CSS
function mtheme_apply_font ( $fontName , $fontClasses ) {

	$got_font=of_get_option($fontName, $fontClasses);
	
	if ($got_font) {
		$font_pieces = explode(":", $got_font);
		$font_name = $font_pieces[0];
		$dynamic_css = $fontClasses . "{ font-family:'" . $font_name . "'; }";
		return $dynamic_css;
	}

}
//Change Class called from Dynamic_CSS
function mtheme_change_class ( $class,$property,$value,$important) {
	if ( $important!='' ) { 
		$important =" !".$important;
	}
	$output_value = "{". $property .":".$value.$important.";}";
	$dynamic_css = $class . $output_value;
	return $dynamic_css;
}
// Displays alt text based on ID
function mtheme_get_alt_text($attatchmentID) {
	$alt = get_post_meta($attatchmentID, '_wp_attachment_image_alt', true);
	return $alt;
}
// Breadcrumb
function mtheme_breadcrumbs()	{
			$delimiter = '<span class="breadcrumb-sep">/</span>';
			$name = __("Home",'mthemelocal');
			$currentBefore = ' <span class="current">';
			$currentAfter = '</span> ';
			$type=get_post_type();
			if (!is_home() && !is_front_page() && get_post_type() == $type || is_paged()) {

				echo '<nav id="breadcrumbs">';
				global $post;
				$home = home_url();
				echo '<a href="' . $home . '">' . $name . '</a> ' . $delimiter . '';
				if (is_category()) {
					global $wp_query;
					$cat_obj = $wp_query->get_queried_object();
					$thisCat = $cat_obj->term_id;
					$thisCat = get_category($thisCat);
					$parentCat = get_category($thisCat->parent);
					if ($thisCat->parent != 0) {
						echo(get_category_parents($parentCat, true, '' . $delimiter . ''));
					}
					echo $currentBefore . single_cat_title() . $currentAfter;
				}
				else if (is_post_type_archive()) {
					_e('Projects','mthemelocal');
				}
				else if (is_tax()) {
					the_title();
				}
				else if (is_day()) {
					echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '';
					echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
					echo $currentBefore . get_the_time('d') . $currentAfter;
				} else if (is_month()) {
					echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . '';
					echo $currentBefore . get_the_time('F') . $currentAfter;
				} else if (is_year()) {
					echo $currentBefore . get_the_time('Y') . $currentAfter;
				} else if (is_attachment()) {
					echo $currentBefore;
					the_title();
					$currentAfter;
				} if (is_single() && get_post_type() == $type ){
					$cat = get_the_category();
					if ( isSet($cat[0]) ) {
						$cat = $cat[0];
						if ($cat !==NULL) {
							echo get_category_parents($cat, true, ' ' . $delimiter . '');
						}
					}
					echo $currentBefore;
					the_title();
					echo $currentAfter;
				} else if (is_page() && !$post->post_parent) {
					echo $currentBefore;
					the_title();
					echo $currentAfter;
				} else if (is_page() && $post->post_parent) {
					$parent_id = $post->post_parent;
					$breadcrumbs = array();
					while ($parent_id) {
						$page = get_page($parent_id);
						$breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
						$parent_id = $page->post_parent;
					}
					$breadcrumbs = array_reverse($breadcrumbs);
					foreach($breadcrumbs as $crumb)
					echo $crumb . ' ' . $delimiter . ' ';
					echo $currentBefore;
					the_title();
					echo $currentAfter;
				} else if (is_search()) {
					echo $currentBefore . __('Search Results For:','mthemelocal') . ' ' . get_search_query() . $currentAfter;
				} else if (is_tag()) {
					echo $currentBefore . single_tag_title() . $currentAfter;
				} else if (is_author()) {
					global $author;
					$userdata = get_userdata($author);
					echo $currentBefore . $userdata->display_name . $currentAfter;
				} else if (is_404()) {
					echo $currentBefore . '404 Not Found' . $currentAfter;
				}
				if (get_query_var('paged')) {
					if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
						echo  $currentBefore;
					}
					echo __('Page','mthemelocal') . ' ' . get_query_var('paged');
					if (is_home() || is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
						echo $currentAfter;
					}
				}
				echo '</nav>';
			}
		}
// Excerpt Limit
function mtheme_excerpt_limit($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
      } else {
        $excerpt = implode(" ",$excerpt);
      } 
      $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      return $excerpt;
    }

    function mtheme_content_limit($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      } 
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content); 
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }
// Detect User Agent
// Detect special conditions devices
function mtheme_get_device() {
	$iPod = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$iPhone = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$iPad = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$Android= stripos($_SERVER['HTTP_USER_AGENT'],"Android");
	$webOS= stripos($_SERVER['HTTP_USER_AGENT'],"webOS");
	$device_is=false;
	//do something with this information
	if( $iPod || $iPhone ){
	        //were an iPhone/iPod touch -- do something here
		$device_is="ios";
	}else if($iPad){
	        //were an iPad -- do something here
		$device_is="ios";
	}else if($Android){
	        //were an Android device -- do something here
		$device_is="android";
	}else if($webOS){
	        //were a webOS device -- do something here
	}
	return $device_is;
}
// Check if a Shortcode is in a string 
function has_shortcode_instring($shortcode,$string) {
	$found=false;
	if ( stripos($string, '[' . $shortcode) !== false ) {
		// we have found the short code
		$found = true;
	}
	return $found;
}
/*
Numbe pads ex. 01 when $n is 2 and number is 1, 001 if $n is 3
if $number is 12 it returns 12 - no changes
*/
function mtheme_number_pad($number,$n) {
	return str_pad((int) $number,$n,"0",STR_PAD_LEFT);
}
/*
Tag Cloud Font size modifier
*/
function mtheme_tag_cloud_filter($args = array()) {
   $args['smallest'] = 10;
   $args['largest'] = 14;
   $args['unit'] = 'px';
   return $args;
}
add_filter('widget_tag_cloud_args', 'mtheme_tag_cloud_filter', 90);
/**
 * RESPONSIVE IMAGE FUNCTIONS
 */
add_filter( 'post_thumbnail_html', 'mtheme_remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'mtheme_remove_thumbnail_dimensions', 10 ); 
function mtheme_remove_thumbnail_dimensions( $html ) {
        $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
        return $html;
}
/*-------------------------------------------------------------------------*/
/* Check for shortcode */
/*-------------------------------------------------------------------------*/
// check the current post for the existence of a short code  
function mtheme_got_shortcode($shortcode = '') {  
  	global $post;
	if ( isSet($post->ID) ) {
		$post_to_check = get_post(get_the_ID());  
	}
	// false because we have to search through the post content first  
	$found = false;  
  
	// if no short code was provided, return false  
	if (!$shortcode) {  
		return $found;  
	}
	if ( isset($post_to_check) ) {
		// check the post content for the short code  
		if ( stripos($post_to_check->post_content, '[' . $shortcode) !== false ) {  
			// we have found the short code  
			$found = true;  
		}
	}
  
	// return our final results  
	return $found;  
}
function mtheme_get_select_target_options($type) {
        $list_options = array();
        
        switch($type){
			case 'post':
				$the_list = get_posts('orderby=title&numberposts=-1&order=ASC');
				foreach($the_list as $key => $list) {
					$list_options[$list->ID] = $list->post_title;
				}
				break;
			case 'page':
				$the_list = get_pages('title_li=&orderby=name');
				foreach($the_list as $key => $list) {
					$list_options[$list->ID] = $list->post_title;
				}
				break;
			case 'category':
				$the_list = get_categories('orderby=name&hide_empty=0');
				foreach($the_list as $key => $list) {
					$list_options[$list->term_id] = $list->name;
				}
				break;
			case 'backgroundslideshow_choices':
				$list_options = array(
					'options_image'=> __('Theme options set Static Image','mthemelocal'),
					'options_slideshow'=>__('Theme options set Slideshow','mthemelocal'),
					'image_attachments'=>__('Slideshow from post/page image attachments','mthemelocal'),
					'featured_image'=>__('Featured image from this post/page','mthemelocal'),
					'fullscreen_post'=>__('Slideshow from a fullscreen post','mthemelocal'),
					'custom_url'=>__('Custom background image','mthemelocal'),
					'none'=>__('none','mthemelocal')
					);
				break;
			case 'portfolio_category':
				$the_list = get_categories('taxonomy=types&title_li=');
				foreach($the_list as $key => $list) {
					$list_options[$list->slug] = $list->name;
				}
				array_unshift($list_options, "All the items");
				break;
			case 'fullscreen_slideshow_posts':
				// Pull all the Featured into an array
				$featured_pages = get_posts('post_type=mtheme_featured&orderby=title&numberposts=-1&order=ASC');
				$list_options['none'] = "Not Selected";
				if ($featured_pages) {
					foreach($featured_pages as $key => $list) {
						$custom = get_post_custom($list->ID);
						if ( isset($custom[ MTHEME . "_fullscreen_type"][0]) ) { 
							$slideshow_type=$custom[ MTHEME . "_fullscreen_type"][0]; 
						} else {
						$slideshow_type="";
						}
						if ($slideshow_type != "video") {
							$list_options[$list->ID] = $list->post_title;
						}
					}
				} else {
					$list_options[0]="Featured pages not found.";
				}
				break;
			case 'fullscreen_posts':
				// Pull all the Featured into an array
				$featured_pages = get_posts('post_type=mtheme_featured&orderby=title&numberposts=-1&order=ASC');
				$list_options['none'] = "Not Selected";
				if ($featured_pages) {
					foreach($featured_pages as $key => $list) {
						$custom = get_post_custom($list->ID);
						if ( isset($custom[ MTHEME . "_fullscreen_type"][0]) ) { 
							$slideshow_type=$custom[ MTHEME . "_fullscreen_type"][0]; 
						} else {
						$slideshow_type="";
						}
						$list_options[$list->ID] = $list->post_title;
					}
				} else {
					$list_options[0]="Featured pages not found.";
				}
				break;
		}
		
		return $list_options;
	}
	
function mtheme_posted_on() {
	echo '<div class="post-meta-info">';
	echo '<div class="posted-in">' . _e('Posted in ','mthemelocal') . " " .  the_category(', ') ."</div>";
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s" pubdate>%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'mthemelocal' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'mthemelocal' ), get_the_author() ),
		esc_html( get_the_author() )
	);
	echo '<span class="comments">';
	comments_popup_link('No Comments', '1 Comment', '% Comments');
	echo '</span>';
	echo '</div>';
}
/*-------------------------------------------------------------------------*/
/* Converts a WP menu to a Drop down menu
/*-------------------------------------------------------------------------*/
function mtheme_menu_to_select_menu ($menu_name,$class_ID, $level_symbol,$menu_title) {
	//Custom code
    if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
	$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );

	$menu_items = wp_get_nav_menu_items($menu->term_id);
	
	$parent="";
	$cat_level=0;

	$menu_list = '<select id="'. $class_ID .'">';
	$menu_list .= '<option value="#">'.$menu_title.'</option>';

	foreach ( (array) $menu_items as $key => $menu_item ) {
	    $title = $menu_item->title;
	    $url = $menu_item->url;
		
		//Store Previous parent		
		$prev_parent=$parent;
		//Get Current Parent
		$parent=$menu_item->menu_item_parent;
		
		// Compare prev and curr parents
		// Increment if greater else decrement
		if ($parent > $prev_parent) {
		
			$cat_level++;
		
		}
		if ($parent < $prev_parent) {
		
			$cat_level--;
			
		}
		
		// Reset menu level
		
		$menu_level='';
		
		// Check menu level and add level symbol accordion to cat_level
		if ($parent==0) {
			$cat_level=0;
			
		} else {
			for ($n=0; $n<$cat_level; $n++) {
				$menu_level=$menu_level . "-";
			}
		}
		
	    $menu_list .= '<option value="'. $url . '">' . $menu_level . '&nbsp;' . $title . '</option>';
	}
	$menu_list .= '</select>';
    } else {
	$menu_list = '';
    }
	return $menu_list;
}
/**
* If more than one page exists, return TRUE.
*/
function mtheme_show_posts_nav() {
	global $wp_query;
	return ($wp_query->max_num_pages > 1);
}
/*-------------------------------------------------------------------------*/
/* Shorten text to closest complete word from provided text */
/*-------------------------------------------------------------------------*/
function mtheme_shortentext ($textblock, $textlen) {

	if ($textblock) {
	//$output = substr(get_the_excerpt(), 0,$textlen);
	//$temp = wordwrap(get_the_excerpt(),$textlen,'[^^^]'); $output= strtok($temp,'[^^^]');
	$output = substr(substr($textblock, 0, $textlen), 0, strrpos(substr($textblock, 0, $textlen), ' '));  
	return $output;
	}
}
/*-------------------------------------------------------------------------*/
/* Shorten text to closest complete word from ID */
/*-------------------------------------------------------------------------*/
function mtheme_shortdesc ($pageid, $textlen) {

	if ($pageid) {
	$apage = new WP_Query('page_id='.$pageid); while ($apage->have_posts()) : $apage->the_post(); $do_not_duplicate = $post->ID;
	//$output = substr(get_the_excerpt(), 0,$textlen);
	//$temp = wordwrap(get_the_excerpt(),$textlen,'[^^^]'); $output= strtok($temp,'[^^^]');
	$output = substr(substr(get_the_excerpt(), 0, $textlen), 0, strrpos(substr(get_the_excerpt(), 0, $textlen), ' '));  
	endwhile;
	return $output;
	}
}
/*-------------------------------------------------------------------------*/
/* Get Parent page ID from a Page ID */
/*-------------------------------------------------------------------------*/
function get_parent_page_id($id) {
    global $post;
    // Check if page is a child page (any level)
    if ($post->ancestors) {

        //  Grab the ID of top-level page from the tree
        return end($post->ancestors);
    } else {

        // Page is the top level, so use  it's own id
        return $post->ID;
    }
}
/*-------------------------------------------------------------------------*/
/* Show featured image link */
/*-------------------------------------------------------------------------*/
function mtheme_featured_image_link ($ID) {
	$image_id = get_post_thumbnail_id($ID, 'full'); 
	$image_url = wp_get_attachment_image_src($image_id,'full');  
	$image_url = $image_url[0];
	return $image_url;
}
/*-------------------------------------------------------------------------*/
/* Show featured image title */
/*-------------------------------------------------------------------------*/
function mtheme_featured_image_title ($ID) {
	$img_title='';
	$image_id = get_post_thumbnail_id($ID);
	$img_obj = get_post($image_id);
	if (isSet($img_obj)){
		$img_title = $img_obj->post_title;
	}
	return $img_title;
}
/*-------------------------------------------------------------------------*/
/* Show attached image real link */
/*-------------------------------------------------------------------------*/
function mtheme_featured_image_real_link ($ID) {
	$image_id = get_post_thumbnail_id($ID, 'full'); 
	$image_url = wp_get_attachment_image_src($image_id,'full');  
	$image_url = $image_url[0];
		
	$image=wpmu_image_path($image_url);
	return $image;
}

function mtheme_activate_lightbox ($lightbox_type,$ID,$link,$mediatype,$title,$class,$navigation) {
	if ($lightbox_type=="fancybox") {
	
		if ($navigation) $gallery='rel="'.$navigation.'" ';
		
		if ($mediatype=="video") { $fancyboxclass="fancybox-video"; } else { $fancyboxclass="fancybox-image"; }
	
		$output='<a '.$gallery.'class="'.$class.' '.$fancyboxclass.'" title="'.$title.'" href="'.$link.'">';
	}
	if ($lightbox_type=="prettyPhoto") {
	
		if ($navigation) $gallery='rel="'.$navigation.'" ';
	
		$output='<a '.$gallery.'class="'.$class.'" title="'.$title.'" href="'.$link.'">';
	}
	return $output;
}
/*-------------------------------------------------------------------------*/
/* Resize images and cross check if WP MU using blog ID */
/*-------------------------------------------------------------------------*/
function mtheme_showimage ($image,$link_url,$resize,$height,$width,$quality, $crop, $title,$class) {
	$image_url=$image;
	$image=wpmu_image_path($image);
	$output=""; // Set nill
	if ($link_url<>"") {
		$output = '<a href="' . $link_url . '">';
	}
	if ($resize==true) {
		if ($image) {
			if ($class) {
				$output .= '<img src="'. $image_url .'" alt="'. $title .'" class="'. $class .'"/>';
			} else {
				$output .= '<img src="'. $image_url .'" alt="'. $title .'" />';
			}
		}
	}
	if ($resize==false) {
		if ($image_url) {
			if ($class) {
				$output .= '<img src="'. $image_url .'" alt="'. $title .'" class="'. $class .'"/>';
			} else {
				$output .= '<img src="'. $image_url .'" alt="'. $title .'" />';
			}
		}
	}
	if ($link_url<>"") {
		$output .= '</a>';
	}
	return $output;
}
/*-------------------------------------------------------------------------*/
/* Show featured image */
/* 
@ ID 
@ $height
@ $width
@ quality
@ $crop
@ $title
@ $class
/*-------------------------------------------------------------------------*/
function mtheme_display_post_image ($ID,$have_image_url,$link,$type,$title,$class) {

	if ($type=="") $type="fullsize";
	$output="";
	
	$image_id = get_post_thumbnail_id(($ID), $type); 
	$image_url = wp_get_attachment_image_src($image_id,$type);  
	$image_url = $image_url[0];

	$img_obj = get_post($image_id);
	$img_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
	
	$permalink = get_permalink( $ID );
	
	if ($link==true) {
		$output = '<a href="' . $permalink . '">';
	}
	
	if ($have_image_url) {
		$output .= '<img src="'. $have_image_url .'" alt="'. $img_alt .'" class="'. $class .'"/>';
	} else {
		if ($image_url) {
			if ($class) {
				$output .= '<img src="'. $image_url .'" alt="'. $img_alt .'" class="'. $class .'"/>';
			} else {
				$output .= '<img src="'. $image_url .'" alt="'. $img_alt .'" />';
			}
		}
	}
	
	if ($link==true) {
		$output .= '</a>';
	}
	
	return $output;
}
/*-------------------------------------------------------------------------*/
/* Get Page ID by Slug */
/*-------------------------------------------------------------------------*/
function mtheme_get_page_id($page_slug)
{
	$page_id = get_page_by_path($page_slug);
	if ($page_id) :
		return $page_id->ID;
	else :
		return null;
	endif;
}
/*-------------------------------------------------------------------------*/
/* Get Page ID by Title */
/*-------------------------------------------------------------------------*/
function mtheme_get_page_title_by_id($page_id)
{
	$page = get_post($page_id);
	if ($page) :
		return $page->post_title;
	else :
		return null;
	endif;
}
/*-------------------------------------------------------------------------*/
/* Get Page Link by Title */
/*-------------------------------------------------------------------------*/
function mtheme_get_page_link_by_title($page_title) {
  $page = get_page_by_title($page_title);
  if ($page) :
    return get_permalink( $page->ID );
  else :
    return "#";
  endif;
}
/*-------------------------------------------------------------------------*/
/* Get Page link by Slug */
/*-------------------------------------------------------------------------*/
function mtheme_get_page_link_by_slug($page_slug) {
  $page = get_page_by_path($page_slug);
  if ($page) :
    return get_permalink( $page->ID );
  else :
    return "#";
  endif;
}
/*-------------------------------------------------------------------------*/
/* Get Page link by ID */
/*-------------------------------------------------------------------------*/
function mtheme_get_page_link_by_id($page_id) {
  $page = get_post($page_id);
  if ($page) :
    return get_permalink( $page->ID );
  else :
    return "#";
  endif;
}
/*-------------------------------------------------------------------------*/
/* Get Human Time */
/*-------------------------------------------------------------------------*/
function mtheme_time_since($older_date, $newer_date = false)
	{
	//Script URI: http://binarybonsai.com/wordpress/timesince
	// array of time period chunks
	$chunks = array(
	array(60 * 60 * 24 * 365 , __('year','mthemelocal') ),
	array(60 * 60 * 24 * 30 , __('month','mthemelocal') ),
	array(60 * 60 * 24 * 7, __('week','mthemelocal') ),
	array(60 * 60 * 24 , __('day','mthemelocal') ),
	array(60 * 60 , __('hour','mthemelocal') ),
	array(60 , __('minute','mthemelocal') ),
	);
	
	// $newer_date will equal false if we want to know the time elapsed between a date and the current time
	// $newer_date will have a value if we want to work out time elapsed between two known dates
	$newer_date = ($newer_date == false) ? (time()+(60*60*get_settings("gmt_offset"))) : $newer_date;
	
	// difference in seconds
	$since = $newer_date - $older_date;
	
	// we only want to output two chunks of time here, eg:
	// x years, xx months
	// x days, xx hours
	// so there's only two bits of calculation below:

	// step one: the first chunk
	for ($i = 0, $j = count($chunks); $i < $j; $i++)
		{
		$seconds = $chunks[$i][0];
		$name = $chunks[$i][1];

		// finding the biggest chunk (if the chunk fits, break)
		if (($count = floor($since / $seconds)) != 0)
			{
			break;
			}
		}

	// set output var
	$output = ($count == 1) ? '1 '.$name : "$count {$name}s";

	// step two: the second chunk
	if ($i + 1 < $j)
		{
		$seconds2 = $chunks[$i + 1][0];
		$name2 = $chunks[$i + 1][1];
		
		if (($count2 = floor(($since - ($seconds * $count)) / $seconds2)) != 0)
			{
			// add to output var
			$output .= ($count2 == 1) ? ', 1 '.$name2 : ", $count2 {$name2}s";
			}
		}
	return $output;
}
/*-------------------------------------------------------------------------*/
/* Generate WP MU image path (Deprecated Function) */
/*-------------------------------------------------------------------------*/
function wpmu_image_path ($theImageSrc) {

	if ( is_multisite() ) { 
		$blog_id=get_current_blog_id();	
		if (isset($blog_id) && $blog_id > 0) {
			$imageParts = explode('/files/', $theImageSrc);
			if (isset($imageParts[1])) {
				//$theImageSrc = $imageParts[0] . '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
				$theImageSrc = '/blogs.dir/' . $blog_id . '/files/' . $imageParts[1];
			}
		}
	}
	return $theImageSrc;
}
/***** Numbered Page Navigation (Pagination) Code.
      Tested up to WordPress version 3.1.2 *****/
 
/* Function that Rounds To The Nearest Value.
   Needed for the pagenavi() function */
function mtheme_round_num($num, $to_nearest) {
   /*Round fractions down (http://php.net/manual/en/function.floor.php)*/
   return floor($num/$to_nearest)*$to_nearest;
}
 

// Custom Pagination codes
function mtheme_pagination($pages = '', $range = 4)
{ 
	$pagination='';
     $showitems = ($range * 2)+1; 
 
    global $paged;
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }  
 
     if(1 != $pages)
     {
         $pagination .= '<div class="pagination-navigation">';
         $pagination .=  "<div class=\"pagination\"><span class=\"pagination-info\">". __("Page ","mthemelocal") . $paged. __(" of ","mthemelocal") .$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) $pagination .=  "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) $pagination .=  "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 $pagination .=  ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) $pagination .=  "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>"; 
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) $pagination .=  "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         $pagination .=  "</div>";
         $pagination .=  "</div>";
     }
     return $pagination;
}




/*
Lighten a colour

$colour = '#ae64fe';
$brightness = 0.5; // 50% brighter
$newColour = colourBrightness($colour,$brightness);

Darken a colour

$colour = '#ae64fe';
$brightness = -0.5; // 50% darker
$newColour = colourBrightness($colour,$brightness);
*/
function mtheme_colourBrightness($hex, $percent) {
	// Work out if hash given
	$hash = '';
	if (stristr($hex,'#')) {
		$hex = str_replace('#','',$hex);
		$hash = '#';
	}
	/// HEX TO RGB
	$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
	//// CALCULATE
	for ($i=0; $i<3; $i++) {
		// See if brighter or darker
		if ($percent > 0) {
			// Lighter
			$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
		} else {
			// Darker
			$positivePercent = $percent - ($percent*2);
			$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
		}
		// In case rounding up causes us to go to 256
		if ($rgb[$i] > 255) {
			$rgb[$i] = 255;
		}
	}
	//// RBG to Hex
	$hex = '';
	for($i=0; $i < 3; $i++) {
		// Convert the decimal digit to hex
		$hexDigit = dechex($rgb[$i]);
		// Add a leading zero if necessary
		if(strlen($hexDigit) == 1) {
		$hexDigit = "0" . $hexDigit;
		}
		// Append to the hex string
		$hex .= $hexDigit;
	}
	return $hash.$hex;
}

/**
 * Convert a hexa decimal color code to its RGB equivalent
 *
 * @param string $hexStr (hexadecimal color value)
 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
 */                                                                                                
function mtheme_hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
}
?>