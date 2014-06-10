<?php
global $mtheme_pagelayout_type;
$width=MTHEME_MAX_CONTENT_WIDTH;
$single_height='';
$posthead_size="blog-full";

$blogpost_style= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
if ($blogpost_style == "nosidebar") {
	$posthead_size="fullpage";
}

if ( $mtheme_pagelayout_type=="fullwidth" ) {
	$posthead_size="fullwidth";
}

if ( $mtheme_pagelayout_type=="two-column" ) {
	$posthead_size="blog-full";
}

echo '<a class="postsummaryimage" href="'. get_permalink() .'">';
// Show Image	
echo mtheme_display_post_image (
	$post->ID,
	$have_image_url=false,
	$link=false,
	$type=$posthead_size,
	$post->post_title,
	$class="" 
);
echo '</a>';
?>