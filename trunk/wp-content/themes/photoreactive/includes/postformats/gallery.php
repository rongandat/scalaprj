<?php
global $mtheme_pagelayout_type;
$width=MTHEME_MAX_CONTENT_WIDTH;

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

$height= get_post_meta($post->ID, MTHEME . '_meta_gallery_height', true);

$flexi_slideshow = do_shortcode('[flexislideshow slideshowtitle=true lightbox=true lboxtitle=true imagesize='.$posthead_size.']');
echo $flexi_slideshow;

?>