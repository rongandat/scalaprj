<div class="postsummarywrap">

<?php
	$postformat = get_post_format();
	if($postformat == "") $postformat="standard";

$post_icon="";
switch ($postformat) {
	case 'standard':
		$post_icon = 'pencil';
		break;
	case 'quote':
		$post_icon = 'quote-left';
		break;
	case 'audio':
		$post_icon = 'volume-up';
		break;
	case 'video':
		$post_icon = 'film';
		break;
	case 'gallery':
		$post_icon = 'picture';
		break;
	case 'image':
		$post_icon = 'camera-retro';
		break;
	case 'aside':
		$post_icon = 'bullhorn';
		break;
	case 'link':
		$post_icon = 'link';
		break;
	
	default:
		# code...
		break;
}
?>
	<div class="datecomment clearfix">
		<?php
		if ( !is_search() ) {
		?>
		<i class="icon-<?php echo $post_icon; ?>"></i>
		<span class="post-meta-category">
			<?php the_category(' / ') ?>
		</span>
		<?php
		}
		?>
		<span class="post-single-meta">
			<span class="post-meta-time">
			<i class="icon-time"></i>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'mthemelocal' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
		<?php
		$mtheme_datetime=of_get_option('mtheme_datetime');
		if ($mtheme_datetime=="traditional") { ?>

				<?php echo esc_attr( get_the_time() ); echo " , "; echo get_the_date(); ?>

		<?php } else { ?>

				<?php echo mtheme_time_since(abs(strtotime($post->post_date_gmt . " GMT")), time()); ?> <?php _e('ago','mthemelocal'); ?>

		<?php } ?>
			</a>
			</span>
		<?php
		if ( !is_search() ) {
		?>
			<span class="post-meta-comment">
			<i class="icon-comments-alt"></i>
			<?php comments_popup_link('0', '1', '%'); ?>
			</span>
		<?php
		}
		?>
		</span>
	</div>
</div>
<?php
if ( is_single() ) {
?>
	
	<?php the_tags( '<div class="post-single-tags"><i class="icon-tag"></i>', ' ', '</div>'); ?>
<?php
}
?>

<?php //edit_post_link( __('edit this entry','mthemelocal') ,'<p class="edit-entry">','</p>'); ?>