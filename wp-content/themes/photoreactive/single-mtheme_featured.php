<?php
//Defined in Theme Framework functions
$featured_page = get_the_ID();
$custom = get_post_custom( get_the_ID() );
if ( isSet($custom[ MTHEME . "_fullscreen_type"][0]) ) {
	$fullscreen_type = $custom[ MTHEME . "_fullscreen_type"][0];
}

$fullscreen_post_load = mtheme_get_fullscreen_file($fullscreen_type);
require_once (MTHEME_INCLUDES . $fullscreen_post_load);
?>