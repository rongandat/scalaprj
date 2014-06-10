<?php
/**
 * Kenburns
 */
$count=0;
if ( post_password_required($featured_page) ) {
get_header();
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
<?php	
} else {
if (defined('ICL_LANGUAGE_CODE')) { // this is to not break code in case WPML is turned off, etc.
    $_type  = get_post_type($featured_page);
    $featured_page = icl_object_id($featured_page, $_type, true, ICL_LANGUAGE_CODE);
}
// Don't Populate list if no Featured page is set
//The Image IDs
if ( $featured_page <>"" ) { 

$filter_image_ids = mtheme_get_custom_attachments ( $featured_page );
get_header();
if ($filter_image_ids) {
?>
<style type="text/css">
body {
	position: absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
	overflow:hidden;
}
</style>
<div class="kenburns-preloader"></div>
<div id="kenburns-container">
<?php		
	// Loop through the images
	foreach ( $filter_image_ids as $attachment_id) {
		$attachment = get_post( $attachment_id );
		$imageURI = $attachment->guid;
		echo mtheme_display_post_image (
			$post->ID,
			$have_image_url=$imageURI,
			$link=false,
			$type="full",
			$post->post_title,
			$class="kenburns-images"
		);
	}
?>
</div>
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
require_once (MTHEME_INCLUDES . 'fullscreen/audioplay.php');
// If Ends here for the Featured Page
}
}
?>
<?php
//End Password Check
}
?>
<?php get_footer(); ?>