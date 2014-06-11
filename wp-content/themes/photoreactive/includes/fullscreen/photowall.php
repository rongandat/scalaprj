<?php
/**
 * Supersized
 */
get_header();
$count=0;
?>
<?php
if ( post_password_required() ) {
// Grab default background set from theme options
?>
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
?>
<div class="photowall-wrap">
    <div id="photowall-container" class="loading">
<?php
if (defined('ICL_LANGUAGE_CODE')) { // this is to not break code in case WPML is turned off, etc.
    $_type  = get_post_type($featured_page);
    $featured_page = icl_object_id($featured_page, $_type, true, ICL_LANGUAGE_CODE);
}
// Don't Populate list if no Featured page is set
//$featured_page = 3896;
if ( $featured_page <>"" ) { 
	$filter_image_ids = mtheme_get_custom_attachments ( $featured_page );
	if ($filter_image_ids) {
		foreach ( $filter_image_ids as $attachment_id) {

			$attachment = get_post( $attachment_id );
				$alt = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
				$caption = $attachment->post_excerpt;
				//$href = get_permalink( $attachment->ID ),
				$imageURI = $attachment->guid;

				$imageTitle = apply_filters('the_title',$attachment->post_title);
				$imageDesc = apply_filters('the_content',$attachment->post_content);
			// Count
			$count++;

			$slideshow_title="";
			$slideshow_caption="";
			
			//Find and replace all new lines to BR tags
			$find   = array("\r\n", "\n", "\r");
			$replace = '<br />';
			$imageDesc = str_replace($find, $replace , $imageDesc);
			
			if ($imageTitle) $slideshow_title='<div class="slideshow_title">'. esc_attr($imageTitle) .'</div>';
			if ($imageDesc) $slideshow_caption='<div class="slideshow_caption">'. $imageDesc .'</div>';

			echo '<div class="photowall-item item">';

			
			echo mtheme_display_post_image (
				$post->ID,
				$have_image_url=$imageURI,
				$link=false,
				$type="portfolio-square",
				$post->post_title,
				$class="photowall-image"
			);
			
			if ($imageTitle) {
				
				echo '<a class="photowall-lightbox" rel="prettyPhoto[photowall]" href="'.$imageURI.'">';
				echo '</a>';
				echo '<div class="photowall-box">';
				echo '<div class="photowall-title">' . $imageTitle . '</div>';
				echo '<div class="photowall-desc">' . $imageDesc . '</div>';
				echo '</div>';
				
			}
			
			echo '<div class="photowall-content-wrap">';
			echo '</div>';
			echo '</div>';
		}
	}

// If Ends here for the Featured Page
}
?>
</div>
</div>
<?php
//End of Password Check
}
?>
<?php get_footer(); ?>