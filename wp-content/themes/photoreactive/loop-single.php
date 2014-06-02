<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<div class="post-<?php echo $postformat; ?>-wrapper">


			<?php get_template_part( 'includes/postformats/postformat-media' );	?>
			<?php get_template_part( 'includes/postformats/default' );	?>

			<?php
			get_template_part('/includes/share','this');
			?>
			
		</div>
		<?php //edit_post_link( __('edit this entry','mthemelocal') ,'<p class="edit-entry">','</p>'); ?>
		<?php comments_template(); ?>

	</div>
<?php endwhile; // end of the loop. ?>