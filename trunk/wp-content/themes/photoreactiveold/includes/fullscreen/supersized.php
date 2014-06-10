<?php
/**
 * Supersized
 */
get_header();
?>
<?php
//The Image IDs
$filter_image_ids = mtheme_get_custom_attachments ( $featured_page );
//Slideshow Settings
$slideshow_autoplay=of_get_option('slideshow_autoplay');
$slideshow_pause_on_last=of_get_option('slideshow_pause_on_last');
$slideshow_pause_hover=of_get_option('slideshow_pause_hover');
$slideshow_random=of_get_option('slideshow_random');
$slideshow_interval=of_get_option('slideshow_interval');
$slideshow_transition=of_get_option('slideshow_transition');
$slideshow_transition_speed=of_get_option('slideshow_transition_speed');
$slideshow_portrait=of_get_option('slideshow_portrait');
$slideshow_landscape=of_get_option('slideshow_landscape');
$slideshow_fit_always=of_get_option('slideshow_fit_always');
$slideshow_vertical_center=of_get_option('slideshow_vertical_center');
$slideshow_horizontal_center=of_get_option('slideshow_horizontal_center');
$fullscreen_menu_toggle=of_get_option('fullscreen_menu_toggle');
$fullscreen_menu_toggle_nothome=of_get_option('fullscreen_menu_toggle_nothome');
$rootpath= get_stylesheet_directory_uri();

if (! $slideshow_autoplay) $slideshow_autoplay=0;
if (! $slideshow_pause_on_last) $slideshow_pause_on_last=0;
if (! $slideshow_pause_hover) $slideshow_pause_hover=0;
if (! $slideshow_fit_always) $slideshow_fit_always=0;
if (! $slideshow_portrait) $slideshow_portrait=0;
if (! $slideshow_landscape) $slideshow_landscape=0;
if (! $slideshow_vertical_center) $slideshow_vertical_center=0;
if (! $slideshow_horizontal_center) $slideshow_horizontal_center=0;

$supersized_image_path = get_template_directory_uri() . '/images/supersized/';
$slideshow_thumbnails="";

$featured_linked=false;
$attatchmentURL="";
$postLink="";
$thelimit=-1;
$count=0;

if ( post_password_required($featured_page) ) {
// Grab default background set from theme options	
$default_bg= of_get_option('general_background_image');
?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(document).ready(function(){
<?php
	echo '
		jQuery.backstretch("'.$default_bg.'", {
			speed: 1000
		});
		';
?>
});
/* ]]> */
</script>
<div class="container-wrapper">
	<div class="container-boxed mtheme-adjust-max-height">
		<div class="title-container-wrap">
			<div class="title-container clearfix">
				<div id="post-<?php echo $featured_page ?>" <?php post_class(); ?>>
					<?php
					$thispage = get_post($featured_page);
					?>
					<div class="entry-title">
					<h1><?php echo $thispage->post_title; ?></h1>
					</div>
					<div class="container fullscreen-protected clearfix">
					<?php
					echo '<div id="password-protected">';
					if (MTHEME_DEMO_STATUS) { echo '<p><h2>DEMO Password is 1234</h2></p>'; }
					echo get_the_password_form();
					echo '</div>';
					?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php	
	} else {
if (defined('ICL_LANGUAGE_CODE')) { // this is to not break code in case WPML is turned off, etc.
    $_type  = get_post_type($featured_page);
    $featured_page = icl_object_id($featured_page, $_type, true, ICL_LANGUAGE_CODE);
}
// Don't Populate list if no Featured page is set
//$featured_page = 3875;
if ( $featured_page <>"" ) {
	if (!$filter_image_ids) {
		echo '<div class="mtheme-error-notice">No images present to display slideshow.</div>';
	}
if ($filter_image_ids) {
$custom = get_post_custom($featured_page);
if (isSet ($custom[ MTHEME . "_slideshowthumbnails"][0]) ) {
	$slideshow_thumbnails=$custom[ MTHEME . "_slideshowthumbnails"][0];
}
$slideshow_thumbnails_status="0";
if ($slideshow_thumbnails=="thumbnails") {
	$slideshow_thumbnails_status="1";
}
?>
<?php
// Static Titles and Description block
$static_description='';
$static_title='';
$static_link_text='';
$slideshow_link='';
$slideshow_title='';
$slideshow_caption='';
$static_url='';
$custom = get_post_custom($featured_page);
if (isSet($custom[MTHEME . "_static_title"][0])) $static_title=$custom[MTHEME . "_static_title"][0];
if (isSet($custom[MTHEME . "_static_description"][0])) $static_description=$custom[MTHEME . "_static_description"][0];
if (isSet($custom[MTHEME . "_static_link_text"][0])) $static_link_text=$custom[MTHEME . "_static_link_text"][0];
if (isSet($custom[MTHEME . "_static_url"][0])) $static_url=$custom[MTHEME . "_static_url"][0];

$slideshow_no_description='';
if ( $static_description =='' ) {
	$slideshow_no_description = "slideshow_text_shift_up";
}
$slideshow_no_description_no_title='';
if ( $static_description =='' && $static_title =='' ) {
	$slideshow_no_description_no_title = "slideshow_text_shift_up";
}

$static_msg_display = false;

if ($static_link_text) $slideshow_link='<div class="static_slideshow_content_link '.$slideshow_no_description_no_title.'"><a href="'.$static_url.'">'. esc_attr($static_link_text) .'</a></div>';
if ($static_title) $slideshow_title='<div class="static_slideshow_title '.$slideshow_no_description.'">'. esc_attr($static_title) .'</div>';
if ($static_description) $slideshow_caption='<div class="entry-content static_slideshow_caption">'. do_shortcode($static_description) .'</div></div>';

if ( $static_link_text != '' || $static_title != '' || $static_description != '' || $static_url != '' ) {
	$static_msg_display = true;
	echo '<div id="static_slidecaption">' . $slideshow_link . $slideshow_title . $slideshow_caption . "</div>";
}
?>
<?php
ob_start();
?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function($){	
	jQuery.supersized({
		slideshow               :   1,
		autoplay				:	<?php echo $slideshow_autoplay; ?>,
		start_slide             :   1,
		image_path				:	'<?php echo $supersized_image_path; ?>',
		stop_loop				:	<?php echo $slideshow_pause_on_last; ?>,
		random					: 	0,
		slide_interval          :   <?php echo $slideshow_interval; ?>,
		transition              :   <?php echo $slideshow_transition; ?>,
		transition_speed		:	<?php echo $slideshow_transition_speed; ?>,
		new_window				:	0,
		pause_hover             :   <?php echo $slideshow_pause_hover; ?>,
		keyboard_nav            :   1,
		performance				:	2,
		image_protect			:	1,			   
		min_width		        :   0,
		min_height		        :   0,
		vertical_center         :   <?php echo $slideshow_vertical_center; ?>,
		horizontal_center       :   <?php echo $slideshow_horizontal_center; ?>,
		fit_always				:	<?php echo $slideshow_fit_always; ?>,
		fit_portrait         	:   <?php echo $slideshow_portrait; ?>,
		fit_landscape			:   <?php echo $slideshow_landscape; ?>,
		slide_links				:	'blank',
		thumb_links				:	1,
		thumbnail_navigation    :   <?php echo $slideshow_thumbnails_status; ?>,
		slides 					:  	[
<?php
	// Loop through the images
	foreach ( $filter_image_ids as $attachment_id) {
			$attachment = get_post( $attachment_id );
			$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
			$caption = $attachment->post_excerpt;
			//$href = get_permalink( $attachment->ID ),
			$imageURI = $attachment->guid;
			$imageTitle = apply_filters('the_title',$attachment->post_title);
			$imageDesc = apply_filters('the_content',$attachment->post_content);
			$thumb_imageURI = '';

			$link_text = ''; $link_url = ''; $slideshow_link = '';
			$link_text = get_post_meta( $attachment->ID, 'mtheme_attachment_fullscreen_link', true );
			$link_url = get_post_meta( $attachment->ID, 'mtheme_attachment_fullscreen_url', true );

		// If linking is On
		if ($featured_linked == 1 || $featured_linked == true) {
			$attatchmentURL = get_attachment_link($image->ID);
		}
		// Count
		$count++;
		if ($count>1) { echo ","; }
		$slideshow_title="";
		$slideshow_caption="";
		//Find and replace all new lines to BR tags
		$find   = array("\r\n", "\n", "\r");
		$replace = '<br />';
		$imageDesc = str_replace($find, $replace , $imageDesc);

		if ( !$static_msg_display ) {
			// If static message is not filled in page meta fields
			$slideshow_no_description='';
			if ( !$imageDesc ) {
				$slideshow_no_description = "slideshow_text_shift_up";
			}
			$slideshow_no_description_no_title='';
			if ( !$imageDesc && !$imageTitle ) {
				$slideshow_no_description_no_title = "slideshow_text_shift_up";
			}

			if ($link_text) $slideshow_link='<div class="slideshow_content_link '.$slideshow_no_description_no_title.'"><a href="'.$link_url.'">'. esc_attr($link_text) .'</a></div>';
	 		if ($imageTitle) $slideshow_title='<div class="slideshow_title '.$slideshow_no_description.' slideshow_title_animation">'. esc_attr($imageTitle) .'</div>';
			if ($imageDesc) $slideshow_caption='<div class="entry-content slideshow_caption">'. do_shortcode($imageDesc) .'</div></div>';
		} else {
			// Empty if static message is filled in page settings
			$slideshow_link='';
			$slideshow_title='';
			$slideshow_caption='';
		}
		
		echo "{image : '".$imageURI."', title : '". $slideshow_link . $slideshow_title . $slideshow_caption . "', thumb : '".$thumb_imageURI."', url : ''}";
	}
?>
		],
		progress_bar			:	1,					
		mouse_scrub				:	1
	});
	if ($.fn.swipe) {
		jQuery("#supersized,.super-navigation,#slidecaption").swipe({
		  excludedElements: "button, input, select, textarea, .noSwipe",
		  swipeLeft: function() {
		    jQuery("#nextslide").trigger("click");
		  },
		  swipeRight: function() {
		    jQuery("#prevslide").trigger("click");
		  }
		});
	}
});
/* ]]> */
</script>
<?php
	global $mtheme_slideshow_supersized_script;
	$mtheme_slideshow_supersized_script = ob_get_contents();
	ob_end_clean();

	function mtheme_slideshow_script_add() {
		global $mtheme_slideshow_supersized_script;
		echo $mtheme_slideshow_supersized_script;
	}
	add_action('wp_footer', 'mtheme_slideshow_script_add',100);
?>
	<?php if ($count>1) { ?>
	<!--Arrow Navigation-->
		<?php if ( ! of_get_option('hnavigation_disable') ) { ?>
		<div class="super-navigation">
		<a id="prevslide" class="load-item"><i class="icon-chevron-left"></i></a>
		<a id="nextslide" class="load-item"><i class="icon-chevron-right"></i></a>
		</div>
		<?php } ?>
	<?php } ?>

	<div id="slidecaption"></div>
	<!--Control Bar-->
	<!--Time Bar-->
	<?php if ($count>1) { ?>
		<?php if ( ! of_get_option('hprogressbar_disable') ) { ?>
			<div id="progress-back" class="load-item">
				<div id="progress-bar"></div>
			</div>
		<?php } ?>
	
		<div id="controls-wrapper" class="load-item">
			<div id="controls">		
				<!--Navigation-->
				<?php if ($count>1) { ?>
					<?php if ( ! of_get_option('hplaybutton_disable') ) { ?>
						<a id="play-button"><i id="pauseplay" class="icon-pause"></i></a>
					<?php } ?>
				<?php } ?>
			</div>
		</div>
	<?php } ?>
<?php
// Enf of $image check - script wont run if null
}
// End of IF statement checking null images
}
?>
<?php
require_once (MTHEME_INCLUDES . 'fullscreen/audioplay.php');
?>
<?php
//End password check wrap
}
?>
<?php get_footer(); ?>