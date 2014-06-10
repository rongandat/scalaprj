<?php get_header(); ?>
<?php
global $mtheme_pagelayout_type,$mtheme_pagestyle;;
$mtheme_pagelayout_type="two-column";
$mtheme_pagestyle= get_post_meta($post->ID, MTHEME . '_pagestyle', true);
$floatside="float-left";
if ($mtheme_pagestyle=="rightsidebar") { $floatside="float-left"; }
if ($mtheme_pagestyle=="leftsidebar") { $floatside="float-right"; }
if ($mtheme_pagestyle=="nosidebar") { $mtheme_pagelayout_type="fullwidth"; }
?>
<div class="contents-wrap <?php echo $floatside; ?> two-column">
	<?php
	if ( get_query_var('paged') ) {
		$paged = get_query_var('paged');
	} elseif ( get_query_var('page') ) {
		$paged = get_query_var('page');
	} else {
		$paged = 1;
	}
	query_posts('paged='.$paged.'&posts_per_page=');
	?>
	<div class="entry-content-wrapper">
	<?php get_template_part( 'loop', 'blog' ); ?>
	</div>
</div>
<?php
get_sidebar();
get_footer();