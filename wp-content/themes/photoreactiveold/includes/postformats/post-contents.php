<div class="entry-content postformat_contents postformat_<?php echo $postformat; ?>_contents clearfix">
<?php
$show_readmore=false;
$postformat = get_post_format();
if($postformat == "") $postformat="standard";
$blogpost_style= get_post_meta($post->ID, MTHEME . '_pagestyle', true);

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

if (!is_single()) {
	switch ($postformat) {
		
		case 'aside':
		break;
		
		case 'link':
		$linked_to= get_post_meta($post->ID, MTHEME . '_meta_link', true);
		$fullcontent=true;		
		?>
		<div class="entry-post-title entry-post-title-only">
		<h2>
		<a class="postformat_<?php echo $postformat; ?>" href="<?php echo esc_attr($linked_to); ?>" title="<?php echo esc_attr($linked_to); ?>"><?php the_title(); ?></a>
		</h2>
		</div>
		<?php
		break;

		case 'quote':
		break;
		
		default:
		?>
		<div class="entry-post-title">
		<h2>
		<a class="postformat_<?php echo $postformat; ?>" href="<?php the_permalink() ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'mthemelocal' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h2>
		</div>
		<?php
	}
}
?>
<?php

if ($postformat=="quote") {
		$quote=get_post_meta($post->ID, MTHEME . '_meta_quote', true);
		$quote_author=get_post_meta($post->ID, MTHEME . '_meta_quote_author', true);
		$fullcontent=true;
		?>
		<span class="quote_say"><i class="icon-quote-left"></i> <?php echo $quote; ?><i class="icon-quote-right"></i></span>
		<?php if ($quote_author != "") { ?>
		<span class="quote_author"><?php echo "&#8212;&nbsp;" . $quote_author; ?></span>
		<?php }
}

if ( is_single() ) {
	echo '<div class="fullcontent-spacing">';
	echo '<article>';
	the_content();
	echo '</article>';
	echo '</div>';
	
} else {

	if ( of_get_option('postformat_fullcontent') ) {
	
		echo '<div class="postsummary-spacing">';
		global $more;
		$more = 0;
		the_content();
		echo '</div>';
		
	} else {
		if ($postformat!="link" && $postformat!="aside" ) {
			the_excerpt();
			$show_readmore=true;		
		} else {
			echo '<div class="postsummary-spacing">';
			global $more;
			$more = 0;
			the_content();
			echo '</div>';
			$show_readmore=false;		
		}
	}
}
?>
<?php
if ( $show_readmore==true ) {
?>
	<div class="readmore_link">
	<a href="<?php the_permalink(); ?>"><?php echo of_get_option ( 'read_more' ); ?> &rarr;</a>
	</div>
<?php
}
?>
</div>