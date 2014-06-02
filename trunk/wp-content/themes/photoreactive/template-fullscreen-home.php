<?php
/*
Template Name: Fullscreen Home
*/
?>
<?php
//Defined in Theme Framework functions
$featured_page = mtheme_get_active_fullscreen_post();
if (defined('ICL_LANGUAGE_CODE')) { // this is to not break code in case WPML is turned off, etc.
    $_type  = get_post_type($featured_page);
    $featured_page = icl_object_id($featured_page, $_type, true, ICL_LANGUAGE_CODE);
}
$custom = get_post_custom( $featured_page );
if ( isSet($custom[ MTHEME . "_fullscreen_type"][0]) ) {
	$fullscreen_type = $custom[ MTHEME . "_fullscreen_type"][0];
}
if ( isSet($fullscreen_type) ) {
	$fullscreen_file = mtheme_get_fullscreen_file($fullscreen_type);
}
if ( isSet($fullscreen_file) ) {
	require_once ( MTHEME_INCLUDES . $fullscreen_file );
} else {
	get_header();
	?>
	<div class="container-wrapper container-boxed"> 
		<div class="page-contents-wrap">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="entry-page-wrapper entry-content clearfix">
					<div class="title-container-wrap">
						<div class="title-container clearfix">
							<div class="entry-title">
			<?php
			echo _e('<h1>No Fullscreen post selected in theme options.</h1>','mthemelocal');
			?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	get_footer();
}
?>