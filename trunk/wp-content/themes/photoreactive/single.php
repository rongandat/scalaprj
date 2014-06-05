<?php
/*
*  Single Page
*/
?>
<?php get_header(); ?>
<?php

$mtheme_pagestyle= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
if ($mtheme_pagestyle != "nosidebar") {
	$floatside="float-left";
	if ($mtheme_pagestyle=="rightsidebar") { $floatside="float-left two-column"; }
	if ($mtheme_pagestyle=="leftsidebar") { $floatside="float-right two-column"; }
}
?>
<div class="contents-wrap <?php echo $floatside; ?> ">
<?php
get_template_part( 'loop', 'single' );
?>
</div>
<?php
if ($mtheme_pagestyle != "nosidebar") {
	global $mtheme_pagestyle;
	if ($mtheme_pagestyle=="rightsidebar" || $mtheme_pagestyle=="leftsidebar" ) {
		get_sidebar();
	}
}
get_footer();
?>