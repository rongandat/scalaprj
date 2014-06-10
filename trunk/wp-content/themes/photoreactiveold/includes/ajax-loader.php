<?php
// Our include   
require_once( '../../../../wp-load.php' );

// Our variables
$mtheme_thepostID = (isset($_GET['thepostID'])) ? $_GET['thepostID'] : 0;
$page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 0;


$custom = get_post_custom($mtheme_thepostID);
$portfolio_cats = get_the_terms( $mtheme_thepostID, 'types' );
$video_url="";
$thumbnail="";
$link_url="";
$description="";
$portfoliotype="view";
if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { $video_url=$custom[MTHEME . '_lightbox_video'][0]; $portfoliotype="video"; }
if ( isset($custom[MTHEME . '_customthumbnail'][0]) ) { $thumbnail=$custom[MTHEME . '_customthumbnail'][0]; }
if ( isset($custom[MTHEME . '_customlink'][0]) ) { $link_url=$custom[MTHEME . '_customlink'][0];  $portfoliotype="link"; }
if ( isset($custom[MTHEME . '_video_embed'][0]) ) { $portfoliotype="portfolio_videoembed"; }

$portfolio_page_header=$custom[MTHEME . '_portfoliotype'][0];

if ( isset($custom[MTHEME . '_clientname'][0]) ) $portfolio_client=$custom[MTHEME . '_clientname'][0];
if ( isSet($custom[MTHEME . '_projectlink'][0]) ) $portfolio_projectlink=$custom[MTHEME . '_projectlink'][0];
if (isset($custom[MTHEME . '_skills_required'][0])) $portfolio_skills_required=$custom[MTHEME . '_skills_required'][0];

if ( isset($custom[MTHEME . '_ajax_description'][0])) {
	$description=$custom[MTHEME . '_ajax_description'][0];
	$description=nl2br($description);
	
} else {
	if ( isset($custom[MTHEME . '_thumbnail_desc'][0]) ) { 
		$description=$custom[MTHEME . '_thumbnail_desc'][0];
	}
}
	
?>
<div id="ajax-gridblock-content" class="clearfix">
	<div class="ajax-gridblock-image-wrap">
	<div class="column32 column_space">
	<?php
	if ( ! post_password_required($mtheme_thepostID) ) {
	switch ($portfolio_page_header) {
		
		case "Slideshow" :
			global $mtheme_thepostID;
			$flexi_slideshow = do_shortcode('[ajaxflexislideshow]');
			echo $flexi_slideshow;
			
		break;
		
		case "Image" :		
		echo mtheme_display_post_image (
			$mtheme_thepostID,
			$have_image_url=false,
			$link=false,
			$type="gridblock-ajax",
			$post_title=get_the_title(),
			$class=""
		);
		break;

		case "Vertical" :		
			global $mtheme_thepostID;
			$vertical_images = do_shortcode('[vertical_images imagesize="gridblock-full"]');
			echo $vertical_images;
		break;
		
		case "Video" :	
		echo '<div class="ajax-video-wrapper">';
		echo '<div class="ajax-video-container">';
			echo $custom[MTHEME . '_video_embed'][0];
		echo '</div>';
		echo '</div>';		
		break;
			
	}
	}
	?>
	</div>
	</div>
	<?php if ( post_password_required($mtheme_thepostID) ) { ?>
		<div class="ajax-protected">
			<i class="icon-lock icon-3x"></i>
		<h2>
			<a href="<?php echo get_permalink($mtheme_thepostID); ?>">
			<?php echo get_the_title($mtheme_thepostID); ?>
			</a>
		</h2>
		</div>
	<?php } ?>
<div class="column3">	
<div class="entry-content gridblock-contents-wrap">
	<div class="ajax-gridblock-data">

		<?php if ( ! post_password_required($mtheme_thepostID) ) { ?>
		<h2>
			<?php
			if ( isset($custom[MTHEME . '_customlink'][0]) ) {
				$linkedto = $custom[MTHEME . '_customlink'][0];
			} else {
				$linkedto = get_permalink($mtheme_thepostID);
			}
			?>
			<a href="<?php echo $linkedto; ?>">
			<?php echo get_the_title($mtheme_thepostID); ?>
			</a>
		</h2>

		<div class="ajax-gridblock-description">
		<?php echo $description; ?>
		</div>

		<?php
			echo do_shortcode('[button size="small" link="'.$linkedto.'" type="gray" button_icon="icon-arrow-right"]View Portfolio[/button]');
		?>
		<?php } ?>

	</div>
</div>
</div>