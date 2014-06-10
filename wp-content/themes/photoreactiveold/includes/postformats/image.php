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
	$posthead_size="fullpage";
}

if ( $mtheme_pagelayout_type=="two-column" ) {
	$posthead_size="blog-full";
}

$lightbox_status= get_post_meta($post->ID, MTHEME . '_meta_lightbox', true);
$image_link=mtheme_featured_image_link($post->ID);

if ($image_link<>"") {
	if ($lightbox_status=="Enable Lightbox") {
		echo '<a class="postformat-image-lightbox" rel="prettyPhoto" href="'. $image_link .'">';
	} else {
		echo '<a href="'. get_permalink() .'">';
	}
echo '<span class="lightbox-indicate"><i class="icon-plus"></i></span>';
}
echo mtheme_display_post_image (
	$post->ID,
	$have_image_url=false,
	$link=false,
	$type=$posthead_size,
	$post->post_title,
	$class="postformat-image" 
);
echo '</a>';
?>