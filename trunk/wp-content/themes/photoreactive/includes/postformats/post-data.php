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