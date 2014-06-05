<?php
/*
*  Page
*/
?>
 
<?php get_header();get_template_part('header', 'title'); ?>
<?php
if ( post_password_required() ) {
	
	echo '<div id="password-protected">';

	if (MTHEME_DEMO_STATUS) { echo '<p><h2>DEMO Password is 1234</h2></p>'; }
	echo get_the_password_form();
	echo '</div>';
	
	} else {
	$mtheme_pagestyle= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
	$floatside="float-left";
	if ($mtheme_pagestyle=="nosidebar") { $floatside=""; }
	if ($mtheme_pagestyle=="rightsidebar") { $floatside="float-left"; }
	if ($mtheme_pagestyle=="leftsidebar") { $floatside="float-right"; }
	?>
	<div class="page-contents-wrap <?php echo $floatside; ?> <?php if ($mtheme_pagestyle != "nosidebar") { echo 'two-column'; } ?>">
	<?php
	get_template_part( 'loop', 'page' );
	?>
	</div>
	<?php
	global $mtheme_pagestyle;
	if ($mtheme_pagestyle=="rightsidebar" || $mtheme_pagestyle=="leftsidebar" ) {
		get_sidebar();
	}
}
?>
<?php get_footer(); ?>