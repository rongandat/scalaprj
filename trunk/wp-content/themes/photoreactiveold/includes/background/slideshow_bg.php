<?php
/**
 * Supersized
 */
?>
<?php
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

// Grab all image attachements from the featured page
$filter_image_ids = mtheme_get_custom_attachments ( $get_slideshow_from_page_id );
if ($filter_image_ids) {
	ob_start();
?>
<script type="text/javascript">
/* <![CDATA[ */
jQuery(function($){
	jQuery.supersized({
		slideshow               :   1,
		autoplay				:	1,
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
		thumbnail_navigation    :   0,
		slides 					:  	[
<?php
	foreach ( $filter_image_ids as $attachment_id) {
		$attachment = get_post( $attachment_id );
		$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
		$caption = $attachment->post_excerpt;
		$imageURI = $attachment->guid;
		if ($featured_linked == 1 || $featured_linked == true) {
			$attatchmentURL = get_attachment_link($image->ID);
		}
		$count++;
		if ($count>1) { echo ","; }
		$slideshow_title="";
		$slideshow_caption="";
		echo "{image : '".$imageURI."', title : '', thumb : '', url : ''}";
	}
?>
		],
		progress_bar			:	1,			// Timer for each slide							
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
	global $mtheme_background_slideshow_supersized_script;
	$mtheme_background_slideshow_supersized_script = ob_get_contents();
	ob_end_clean();
	function mtheme_background_slideshow_script_add() {
		global $mtheme_background_slideshow_supersized_script;
		echo $mtheme_background_slideshow_supersized_script;
	}
	// Add script code to footer.
	add_action('wp_footer', 'mtheme_background_slideshow_script_add',100);
	?>
	<div class="background-slideshow-controls">
	<!--Arrow Navigation-->
	<?php if ( ! of_get_option('hnavigation_disable') ) { ?>
		<div class="super-navigation">
		<a id="prevslide" class="load-item"><i class="icon-chevron-left"></i></a>
		<a id="nextslide" class="load-item"><i class="icon-chevron-right"></i></a>
		</div>
	<?php } ?>
<?php if ($count>1) { ?>
	<?php if ( ! of_get_option('hprogressbar_disable') ) { ?>
		<div id="progress-back" class="load-item">
			<div id="progress-bar"></div>
		</div>
	<?php } ?>
<?php } ?>
	<!--Time Bar-->
	<?php if ( ! of_get_option('hplaybutton_disable') ) { ?>
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
	</div>
<?php
// Image null check
// Background ID check
}
?>