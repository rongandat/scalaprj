<?php
/*
404 Page
*/
?>
 
<?php get_header(); ?>

<div class="page-contents-wrap">
	<div class="entry-page-wrapper entry-content clearfix">
		<h4><?php _e( 'Try searching...', 'mthemelocal' ); ?></h4>
			<?php get_search_form(); ?>
	</div><!-- .entry-content -->
</div>

<?php get_footer(); ?>