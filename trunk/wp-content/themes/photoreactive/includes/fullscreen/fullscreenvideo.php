<?php
/**
 * Fullscreen Video
 */
get_header();
$featured_page=mtheme_get_active_fullscreen_post();
$custom = get_post_custom($featured_page);
if (isSet($custom[MTHEME . "_youtubevideo"][0])) $youtube=$custom[MTHEME . "_youtubevideo"][0];
if (isSet($custom[MTHEME . "_vimeovideo"][0])) $vimeoID=$custom[MTHEME . "_vimeovideo"][0];

$video_control_bar=of_get_option('video_control_bar');
$fullscreen_menu_toggle=of_get_option('fullscreen_menu_toggle');
$fullscreen_menu_toggle_nothome=of_get_option('fullscreen_menu_toggle_nothome');

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
<?php
// Activate Vimeo iframe for fullscreen playback
if ( isSet($vimeoID) ) {
	$youtube=false;
	?>
<div id="fullscreenvimeo">
<iframe frameborder="0" allowfullscreen="" webkitallowfullscreen="" src="http://player.vimeo.com/video/<?php echo $vimeoID; ?>?title=0&amp;byline=0&amp;portrait=0&amp;autoplay=1&amp;loop=0"></iframe>
</div>
<?php
}
?>


<?php
// Play Youtube and Other Video files
if ( mtheme_get_device()!="ios" && $youtube ) {
?>
<div id="backgroundvideo">
</div>
<script>
jQuery(document).ready(function($) {
	var options = { videoId: '<?php echo $youtube; ?>', wrapperZIndex: -1, start: 0, mute: false, repeat: false, ratio: 16/9 };
	$('#backgroundvideo').tubular(options);
});
</script>
<?php
}
?>
<style type='text/css'>
body { overflow:hidden; }
</style>
<?php
	//If iOS then display a play button in Youtube video page.
	if ( mtheme_get_device()=="ios" && $youtube != false ) {
		if ( has_post_thumbnail()) :
			$default_bg = mtheme_featured_image_link( $featured_page );
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
		 <?php
		 endif;
		echo '<a class="youtube-play" href="http://www.youtube.com/watch?v='.$youtube.'" title="Play">Video Link</a>';
	}
//End password check wrap
}
?>
<?php get_footer(); ?>