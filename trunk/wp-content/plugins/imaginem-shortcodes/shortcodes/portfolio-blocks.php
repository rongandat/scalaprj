<?php
//Thumbnails for Gallery [thumbnails]
function mtheme_Thumbnails($atts, $content = null) {
	extract(shortcode_atts(array(
		"size" => 'thumbnail',
		"exclude_featured" => 'false',
		"start" => '',
		"end" => '',
		"columns" => '4',
		"title" => "false",
		"description" => "false",
		"id" => '1',
		"pageid" => ''
	), $atts));
	
// Set a default
$column_type="four";
$portfolioImage_type="gridblock-small";

if ($columns==4) { 
	$column_type="four";
	$portfolioImage_type="gridblock-small";
	}
if ($columns==3) { 
	$column_type="three";
	$portfolioImage_type="gridblock-medium";
	}
if ($columns==2) { 
	$column_type="two";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==1) { 
	$column_type="one";
	$portfolioImage_type="gridblock-full";
	}
	
	$portfolio_count=0;
	$thumbnailcount=0;
	$thepageID=get_the_id();
	if ($pageid<>'') $thepageID=$pageid;

	if ($end < $start) {
		$end='';
		$start='';
	}
	
	$filter_image_ids = mtheme_get_custom_attachments ( $thepageID );
	
	if ( $filter_image_ids ) 
	{
	ob_start();
			echo '<div class="thumbnails-shortcode gridblock-columns-wrap clearfix">';
			echo '<ul class="gridblock-'.$column_type.'">';

			$featuredID = get_post_thumbnail_id();

			foreach ( $filter_image_ids as $attachment_id) {
			
			$thumbnailcount++;
			
			if ($start!='') {
				if ($thumbnailcount < $start ) { continue; }
			}
			if ($end!='') {
				if ($thumbnailcount > $end ) { continue; }
			}

			if ( $exclude_featured=='true') {
				if ($featuredID==$attachment_id) continue; // skip rest of the loop
			}

			$imagearray = wp_get_attachment_image_src( $attachment_id , 'fullsize', false);
			$imageURI = $imagearray[0];			
			
			$thumbnail_imagearray = wp_get_attachment_image_src( $attachment_id , $portfolioImage_type, false);
			$thumbnail_imageURI = $thumbnail_imagearray[0];
			
			$imageID = get_post($attachment_id);
			$imageTitle = $imageID->post_title;
			$imageDesc= $imageID->post_content;
			
			if ($portfolio_count==$columns) $portfolio_count=0;
			$portfolio_count++;

			if ($portfolio_count==1) echo '<li class="clearfix"></li>';
			echo '<li class="gridblock-element gridblock-col-'.$portfolio_count.'">';
			echo '<span class="gridblock-thumbnail-image-wrap">';

	echo '<span class="gridblock-link-hover">';
	
	$linkcenter = "gridblock-link-center";
	

	echo mtheme_activate_lightbox (
		$lightbox_type="prettyPhoto",
		$ID='',
		$link=$imageURI,
		$mediatype="image",
		$imagetitle=$imageTitle,
		$class="thumbnail-shortcode-columns",
		$navigation="prettyPhoto[portfolio]"
		);
	echo '<span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="icon-plus"></i></span></a>';
	echo '</span>';
	echo '<span class="gridblock-background-hover"></span>';
			
			?>
			<img class="displayed-image" src="<?php echo $thumbnail_imagearray[0]; ?>" alt="<?php echo mtheme_get_alt_text($attatchmentID); ?>">
			<?php
		
		echo '</span>';
		if ($title=="true" || $description=="true") {
			$portfoliogrid ='<div class="work-details">';
				if ($title=='true') {
					$portfoliogrid .= '<h4>';
					$portfoliogrid .=''. $imageTitle .'';
					$portfoliogrid .= '</h4>';
				}
				if ($description=='true') { $portfoliogrid .= '<p class="entry-content work-description">'.$imageDesc.'</p>'; }
			$portfoliogrid .='</div>';
			echo $portfoliogrid;
		}
			?>
		</li>
			<?php
			}
			?>
		</ul>
		</div>

<?php	
		
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
	

	}	
}
add_shortcode("thumbnails", "mtheme_Thumbnails");
/**
 * Portfolio Grid
 */
function mPortfolioGrids($atts, $content = null) {
	extract(shortcode_atts(array(
		"pageid" => '',
		"columns" => '4',
		"limit" => '-1',
		"title" => 'true',
		"desc" => 'true',
		"worktype_slugs" => '',
		"pagination" => 'false',
		"type" => 'filter'
	), $atts));


$portfoliogrid ='';

if ($type=="filter" || $type=="ajax") {

	$countquery = array(
		'post_type' => 'mtheme_portfolio',
		'types' => $worktype_slugs,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => -1,
		);
	query_posts($countquery);
	if (have_posts()) : while (have_posts()) : the_post();
	endwhile;endif;


if ($type=="ajax") {
	$portfoliogrid .= '	<div class="ajax-gridblock-block-wrap clearfix">';
	$portfoliogrid .= '	<div class="ajax-gallery-navigation clearfix">';
	$portfoliogrid .= '		<a class="ajax-navigation-arrow ajax-hide" href="#"><i class="icon-remove"></i></a>';
	$portfoliogrid .= '		<a class="ajax-navigation-arrow ajax-next" href="#"><i class="icon-chevron-right"></i></a>';
	$portfoliogrid .= '		<a class="ajax-navigation-arrow ajax-prev" href="#"><i class="icon-chevron-left"></i></a>';
	$portfoliogrid .= '		<span class="ajax-loading">Loading</span>';
	$portfoliogrid .= '	</div>';
	$portfoliogrid .= '	<div class="ajax-gridblock-window">';
	$portfoliogrid .= '		<div id="ajax-gridblock-wrap"></div>';
	$portfoliogrid .= '	</div>';
	$portfoliogrid .= '	</div>';
}
	$portfoliogrid .= '<div class="gridblock-filter-select-wrap">';
	$portfoliogrid .= '<div id="gridblock-filter-select"><span class="gridblock-filter-select-text">'. of_get_option('portfolio_allitems') .'</span><i class="icon-reorder"></i></div>';
	$portfoliogrid .= '<ul id="gridblock-filters">';
	
	$portfoliogrid .= '<li>';
		$portfoliogrid .= '<a data-filter="*" data-title="'. of_get_option('portfolio_allitems') .'" href="#">';
		$portfoliogrid .= of_get_option('portfolio_allitems');
		$portfoliogrid .= '</a>';
	$portfoliogrid .= '</li>';
					
	//$categories=  get_categories('child_of='.$portfolio_cat_ID.'&orderby=slug&taxonomy=types&title_li=');
	if ($worktype_slugs!='') $all_works = explode(",", $worktype_slugs);
	$categories=  get_categories('orderby=slug&taxonomy=types&title_li=');
	foreach ($categories as $category){
		
		$taxonomy = "types"; // can be category, post_tag, or custom taxonomy name

		// Use any one of the three methods below

		// Using Term ID
		//$term_id = $category->term_id;
		//$term = get_term_by('id', $term_id, $taxonomy);

		// Using Term Name
		//$term_name = 'A Category';
		//$term = get_term_by('name', $term_name, $taxonomy);

		// Using Term Slug
		$term_slug = $category->slug;
		$term = get_term_by('slug', $term_slug, $taxonomy);

		// Enter only if Works is not set - means all included OR if work types are defined in shortcode
		if ( !isSet($all_works) || in_array($term_slug, $all_works) ) {
			// Fetch the count
			//echo $term->count;
			$portfoliogrid .= '<li>';
				$portfoliogrid .= '<a data-filter=".filter-' . $category->slug .'" data-title="'. $category->name . '" href="#">';
					$portfoliogrid .= $category->name;
				$portfoliogrid .= '</a>';
			$portfoliogrid .= '</li>';
		}
	}
	$portfoliogrid .= '</ul>';
	$portfoliogrid .= '</div>';
//End of If Filter
}
//Reset query after Filters
wp_reset_query();

// Set a default
$column_type="four";
$portfolioImage_type="gridblock-small";

if ($columns==4) { 
	$column_type="four";
	$portfolioImage_type="gridblock-small";
	}
if ($columns==3) { 
	$column_type="three";
	$portfolioImage_type="gridblock-medium";
	}
if ($columns==2) { 
	$column_type="two";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==1) { 
	$column_type="one";
	$portfolioImage_type="gridblock-full";
	}

$flag_new_row=true;
$portfoliogrid .= '<div id="gridblock-container" class="gridblock-'.$column_type.' clearfix">';
//$portfoliogrid .= '<ul class="portfolio-'.$column_type.'">';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

$count=0;
$terms=array();
$work_slug_array=array();
//echo $worktype_slugs;
if ($worktype_slugs != "") {
	$type_explode = explode(",", $worktype_slugs);
	foreach ($type_explode as $work_slug) {
		$terms[] = $work_slug;
	}
	query_posts(array(
		'post_type' => 'mtheme_portfolio',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'paged' => $paged,
		'posts_per_page' => $limit,
		'tax_query' => array(
			array(
				'taxonomy' => 'types',
				'field' => 'slug',
				'terms' => $terms,
				'operator' => 'IN'
				)
			)
		));
} else {
	query_posts(array(
		'post_type' => 'mtheme_portfolio',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'paged' => $paged,
		'posts_per_page' => $limit
		));	
}

$idCount=1;
$portfolio_count=0;

if (have_posts()) : while (have_posts()) : the_post();
	//echo $type, $portfolio_type;
$custom = get_post_custom(get_the_ID());
$portfolio_cats = get_the_terms( get_the_ID(), 'types' );
$lightboxvideo="";
$thumbnail="";
$customlink_URL="";
$portfolio_thumb_header="Image";

if ( isset($custom[MTHEME . '_thumbnail_linktype'][0]) ) { $portfolio_link_type=$custom[MTHEME . '_thumbnail_linktype'][0]; }
if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { $lightboxvideo=$custom[MTHEME . '_lightbox_video'][0]; }
if ( isset($custom[MTHEME . '_customthumbnail'][0]) ) { $thumbnail=$custom[MTHEME . '_customthumbnail'][0]; }
if ( isset($custom[MTHEME . '_thumbnail_desc'][0]) ) { $description=$custom[MTHEME . '_thumbnail_desc'][0]; }
if ( isset($custom[MTHEME . '_customlink'][0]) ) { $customlink_URL=$custom[MTHEME . '_customlink'][0]; }
if ( isset($custom[MTHEME . '_portfoliotype'][0]) ) { $portfolio_thumb_header=$custom[MTHEME . '_portfoliotype'][0]; }

if ($portfolio_count==$columns) $portfolio_count=0;

$add_space_class = '';
if ($title=='false' && $desc=='false') {
	$add_space_class = 'gridblock-cell-bottom-space';
}

$protected="";
$icon_class="column-gridblock-icon";
$portfolio_count++;
if ( $type=="ajax" ) { $portfolio_check_ajax="gridblock-ajax";} else { $portfolio_check_ajax=''; } 

//if ($portfolio_count==1) $portfoliogrid .= '<div class="portfolio-row-new clearfix">';
//$portfoliogrid .= '<li class="portfolio-grid-element portfolio-col-'.$portfolio_count.'">';
$portfoliogrid .= '<div class="gridblock-element '.$add_space_class.' gridblock-filterable ';
if ( is_array($portfolio_cats) ) {
	foreach ($portfolio_cats as $taxonomy) { 
		$portfoliogrid .=  'filter-' . $taxonomy->slug . ' '; 
	}
}
$idCount++;
$portfoliogrid .= '" data-portfolio="portfolio-'. get_the_ID() .'" data-id="id-'. $idCount .'">';

	if ($type != "ajax") {
		// If not AJAX
		$portfoliogrid .= '<span class="gridblock-link-hover">';
		
		$linkcenter ='';
		if ( $portfolio_link_type=="DirectURL" ) $linkcenter="gridblock-link-center";
		
		$portfoliogrid .= '<a href="'.get_permalink().'"><span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="icon-plus"></i></span></a>';
		$portfoliogrid .= '</span>';
	}


	//if Password Required
	if ( post_password_required() ) {
		$protected=" gridblock-protected"; $iconclass="";
		$portfoliogrid .= '<a class="'.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
		$portfoliogrid .= '<span class="grid-blank-status"><i class="icon-lock icon-2x"></i></span>';
		$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
	} else {
		//Make sure it's not a slideshow
		if ($type !="ajax") {
				//Switch check for Linked Type
				switch ($portfolio_link_type) {
					case 'DirectURL':
						$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.get_permalink() .'" rel="bookmark" title="'.get_the_title().'">';
						$icon_class="";
						break;

					case 'Customlink':
						$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.$customlink_URL.'">';
						$icon_class='<i class="icon-external-link"></i>';
						break;

					case 'Lightbox':
						if ( $lightboxvideo<>"" ) {
							$portfoliogrid .= mtheme_activate_lightbox (
								$lightbox_type="prettyPhoto",
								$ID=get_the_ID(),
								$link=$lightboxvideo,
								$mediatype="video",
								$imagetitle='',
								$class="gridblock-image-link gridblock-columns",
								$navigation="prettyPhoto[portfolio]"
								);
							$icon_class='<i class="icon-play"></i>';
						} else {
							$portfoliogrid .= mtheme_activate_lightbox (
								$lightbox_type="prettyPhoto",
								$ID=get_the_ID(),
								$link=mtheme_featured_image_link( get_the_ID() ),
								$mediatype="image",
								$imagetitle='',
								$class="gridblock-image-link gridblock-columns",
								$navigation="prettyPhoto[portfolio]"
								);
							$icon_class='<i class="icon-search"></i>';							
						}
						break;
				}
					// Display Hover icon trigger classes
					$portfoliogrid .= '<span class="gridblock-image-hover">';
					if ($icon_class) $portfoliogrid .= '<span class="hover-icon-effect column-gridblock-icon">'.$icon_class .'</span>';
					$portfoliogrid .= '</span>';


			// If it aint slideshow then display a background. Otherwise one is active in slideshow thumbnails.
			$portfoliogrid .= '<span class="gridblock-background-hover"></span>';
			// Custom Thumbnail
			if ($thumbnail<>"") {
				$portfoliogrid .= '<img src="'.$thumbnail.'" class="preload-image displayed-image" alt="thumbnail" />';
			} else {
				// Slideshow then generate slideshow shortcode
				//$portfolio_thumb_header=="Slideshow"
				//Display Image
				$portfoliogrid .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$theimage_type=$portfolioImage_type,
					$imagetitle='',
					$class="preload-image displayed-image"
				);

			}
		// If AJAX
		} else {
	$portfoliogrid .= '<span class="ajax-image-selector">';
		$portfoliogrid .= '<a href="#" class="ajax-gridblock-icon gridblock-selected-icon">Up</a>';
	$portfoliogrid .= '</span>';
				
				// Display Hover icon trigger classes
				
				$portfoliogrid .= '<span class="gridblock-link-hover">';
				$portfoliogrid .= '<a class="gridblock-image-link gridblock-ajax" rel="'.get_the_id().'">';
				if ($icon_class) $portfoliogrid .= '<span class="hover-icon-effect column-gridblock-icon gridblock-link-center"><i class="icon-plus"></i></span>';
				$portfoliogrid .= '</span>';
				$portfoliogrid .= '<span class="gridblock-background-hover"></span>';

				$portfoliogrid .=  mtheme_display_post_image (
					get_the_id(),
					$have_image_url="",
					$link=false,
					$theimage_type=$portfolioImage_type,
					$post_title="",
					$class="preload-image displayed-image"
				);
				

		}
	}
	$portfoliogrid .= '</a>';
	if ($title=='true' || $desc=='true') {
		$portfoliogrid .='<div class="work-details">';
			$hreflink = get_permalink();
			if ($title=='true') {
				if ($type!="ajax") {
					$portfoliogrid .='<h4><a href="'.$hreflink.'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a></h4>';
				} else {
					$portfoliogrid .= '<h4><a class="gridblock-ajax" rel="'.get_the_id().'">';
					$portfoliogrid .=''. get_the_title() .'';
					$portfoliogrid .= '</a></h4>';
				}
			}
			if ($desc=='true') $portfoliogrid .= '<p class="entry-content work-description">'.$description.'</p>';
		$portfoliogrid .='</div>';
	}

$portfoliogrid .='</div>';

//if ($portfolio_count==$columns)  $portfoliogrid .='</div>';

endwhile; endif;
//$portfoliogrid .='</ul>';
$portfoliogrid .='</div>';

	if ($pagination=='true') { 
		$portfoliogrid .= '<div class="clearfix"></div>';
		$portfoliogrid .= '<div>';
		$portfoliogrid .= mtheme_pagination();
		$portfoliogrid .= '</div>';
	}
	wp_reset_query();
	return $portfoliogrid;
}
add_shortcode("portfoliogrid", "mPortfolioGrids");

//Recent Works Carousel
function mWorksCarousel($atts, $content = null) {
	extract(shortcode_atts(array(
		"pageid" => '',
		"carousel_type" => 'caroufred',
		"columns" => '4',
		"limit" => '-1',
		"title" => 'true',
		"desc" => 'true',
		"boxtitle" => 'true',
		"worktype_slug" => '',
		"pagination" => 'false'
	), $atts));

$uniqureID=get_the_id()."-".dechex(mt_rand(1,65535));
$column_type="four";
$portfolioImage_type="gridblock-large";
if ($columns==4) { 
	$column_type="four";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==3) { 
	$column_type="three";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==2) { 
	$column_type="three";
	$portfolioImage_type="gridblock-large";
	}

if ($worktype_slug=="-1") { $worktype_slug=''; }
$portfolio_count=0;
$flag_new_row=true;
$portfoliogrid='';

if ($carousel_type=="caroufred") {
	// Going to be obsolete
	$portfoliogrid .= '<div class="gridblock-carousel-wrap clearfix">';
	$portfoliogrid .= '<ul class="carousel-catcher" id="carousel-items-'.$uniqureID.'">';
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
			query_posts( 
				array( 
					'post_type' => 'mtheme_portfolio',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'types' => $worktype_slug,
					'paged' => $paged,
					'posts_per_page' => $limit
					)
				);

	if (have_posts()) : while (have_posts()) : the_post();

		//echo $type, $portfolio_type;
	$custom = get_post_custom(get_the_ID());
	$portfolio_cats = get_the_terms( get_the_ID(), 'types' );
	$lightboxvideo="";
	$thumbnail="";
	$customlink_URL="";
	$portfolio_thumb_header="Image";

	if ( isset($custom[MTHEME . '_thumbnail_linktype'][0]) ) { $portfolio_link_type=$custom[MTHEME . '_thumbnail_linktype'][0]; }
	if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { $lightboxvideo=$custom[MTHEME . '_lightbox_video'][0]; }
	if ( isset($custom[MTHEME . '_customthumbnail'][0]) ) { $thumbnail=$custom[MTHEME . '_customthumbnail'][0]; }
	if ( isset($custom[MTHEME . '_thumbnail_desc'][0]) ) { $description=$custom[MTHEME . '_thumbnail_desc'][0]; }
	if ( isset($custom[MTHEME . '_customlink'][0]) ) { $customlink_URL=$custom[MTHEME . '_customlink'][0]; }
	if ( isset($custom[MTHEME . '_portfoliotype'][0]) ) { $portfolio_thumb_header=$custom[MTHEME . '_portfoliotype'][0]; }

	if ($portfolio_count==$columns) $portfolio_count=0;

	$protected="";
	$icon_class="column-gridblock-icon";
	$portfolio_count++;
	$portfoliogrid .= '<li class="gridblock-grid-element">';

		if ($boxtitle=="true") {
			$portfoliogrid .= '<span class="boxtitle-hover"><a href="'.get_permalink().'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a></span>';
		}
		$portfoliogrid .= '<span class="gridblock-link-hover">';
		
		$linkcenter ='';
		if ( $portfolio_link_type=="DirectURL" ) $linkcenter="gridblock-link-center";
		
		$portfoliogrid .= '<a href="'.get_permalink().'"><span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="icon-plus"></i></span></a>';
		$portfoliogrid .= '</span>';


		//if Password Required
		if ( post_password_required() ) {
			$protected=" gridblock-protected"; $iconclass="";
			$portfoliogrid .= '<a class="'.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<span class="grid-blank-status"><i class="icon-lock icon-2x"></i></span>';
			$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
		} else {
			//Switch check for Linked Type

			switch ($portfolio_link_type) {
				case 'DirectURL':
					$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.get_permalink() .'" rel="bookmark" title="'.get_the_title().'">';
					$icon_class="";
					break;

				case 'Customlink':
					$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.$customlink_URL.'">';
					$icon_class='<i class="icon-external-link"></i>';
					break;

				case 'Lightbox':
					if ( $lightboxvideo<>"" ) {
						$portfoliogrid .= mtheme_activate_lightbox (
							$lightbox_type="prettyPhoto",
							$ID=get_the_ID(),
							$link=$lightboxvideo,
							$mediatype="video",
							$imagetitle=get_the_title(),
							$class="gridblock-image-link gridblock-columns",
							$navigation="prettyPhoto[portfolio]"
							);
						$icon_class='<i class="icon-play"></i>';
					} else {
						$portfoliogrid .= mtheme_activate_lightbox (
							$lightbox_type="prettyPhoto",
							$ID=get_the_ID(),
							$link=mtheme_featured_image_link( get_the_ID() ),
							$mediatype="image",
							$imagetitle=mtheme_featured_image_title( get_the_ID() ),
							$class="gridblock-image-link gridblock-columns",
							$navigation="prettyPhoto[portfolio]"
							);
						$icon_class='<i class="icon-search"></i>';							
					}
					break;
			}
			// Display Hover icon trigger classes
			$portfoliogrid .= '<span class="gridblock-image-hover">';
			if ($icon_class) $portfoliogrid .= '<span class="hover-icon-effect column-gridblock-icon">'.$icon_class .'</span>';
			$portfoliogrid .= '</span>';
			// If it aint slideshow then display a background. Otherwise one is active in slideshow thumbnails.
			// Custom Thumbnail
			$portfoliogrid .= '<span class="gridblock-background-hover"></span>';
			if ($thumbnail<>"") {
				$portfoliogrid .= '<img src="'.$thumbnail.'" class="preload-image displayed-image" alt="thumbnail" />';
			} else {
				// Slideshow then generate slideshow shortcode
				$portfoliogrid .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$type=$portfolioImage_type,
					$imagetitle=mtheme_featured_image_title( get_the_ID() ),
					$class="preload-image displayed-image"
				);

			}
		}
		$portfoliogrid .= '</a>';

	$portfoliogrid .='</li>';

	endwhile; endif;
	$portfoliogrid .='</ul>';
		$portfoliogrid .='<a class="prev" id="carousel-previous-'.$uniqureID.'" href="#"><i class="icon-chevron-left"></i></a>';
		$portfoliogrid .='<a class="next" id="carousel-next-'.$uniqureID.'" href="#"><i class="icon-chevron-right"></i></a>';
	$portfoliogrid .='</div>';
	$portfoliogrid .='
	<script>
	/* <![CDATA[ */
	(function($){
	$(window).load(function(){
	    jQuery("#carousel-items-'.$uniqureID.'").carouFredSel({
		responsive: true,
		auto: false,
		items: {
			width: 350,
			height: "auto",
			visible: {
				min: 1,
				max: 4
			}
		},
		swipe		: {
			onTouch		: true,
			onMouse		: true,
			items		: 3
		},
		prev	: {	
			button	: "#carousel-previous-'.$uniqureID.'",
			key		: "left"
		},
		next	: { 
			button	: "#carousel-next-'.$uniqureID.'",
			key		: "right"
		}
		});
		jQuery("#carousel-items-'.$uniqureID.'").swipe({
		  excludedElements: "button, input, select, textarea, .noSwipe",
		  swipeLeft: function() {
		    jQuery("#carousel-next-'.$uniqureID.'").trigger("click");
		  },
		  swipeRight: function() {
		    jQuery("#carousel-previous-'.$uniqureID.'").trigger("click");
		  }
		});
		jQuery(".gridblock-carousel-wrap").css({"visibility":"visible","height":"auto","overflow":"visible"});;
	})
	})(jQuery);
	/* ]]> */
	</script>
	';
}

if ($carousel_type=="owl") {

	$portfoliogrid .= '<div class="gridblock-owlcarousel-wrap clearfix">';
	$portfoliogrid .= '<div id="owl-'.$uniqureID.'" class="owl-carousel">';
		if ( get_query_var('paged') ) {
			$paged = get_query_var('paged');
		} elseif ( get_query_var('page') ) {
			$paged = get_query_var('page');
		} else {
			$paged = 1;
		}
			query_posts( 
				array( 
					'post_type' => 'mtheme_portfolio',
					'orderby' => 'menu_order',
					'order' => 'ASC',
					'types' => $worktype_slug,
					'paged' => $paged,
					'posts_per_page' => $limit
					)
				);

	if (have_posts()) : while (have_posts()) : the_post();

		//echo $type, $portfolio_type;
	$custom = get_post_custom(get_the_ID());
	$portfolio_cats = get_the_terms( get_the_ID(), 'types' );
	$lightboxvideo="";
	$thumbnail="";
	$customlink_URL="";
	$portfolio_thumb_header="Image";

	if ( isset($custom[MTHEME . '_thumbnail_linktype'][0]) ) { $portfolio_link_type=$custom[MTHEME . '_thumbnail_linktype'][0]; }
	if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { $lightboxvideo=$custom[MTHEME . '_lightbox_video'][0]; }
	if ( isset($custom[MTHEME . '_customthumbnail'][0]) ) { $thumbnail=$custom[MTHEME . '_customthumbnail'][0]; }
	if ( isset($custom[MTHEME . '_thumbnail_desc'][0]) ) { $description=$custom[MTHEME . '_thumbnail_desc'][0]; }
	if ( isset($custom[MTHEME . '_customlink'][0]) ) { $customlink_URL=$custom[MTHEME . '_customlink'][0]; }
	if ( isset($custom[MTHEME . '_portfoliotype'][0]) ) { $portfolio_thumb_header=$custom[MTHEME . '_portfoliotype'][0]; }

	if ($portfolio_count==$columns) $portfolio_count=0;

	$protected="";
	$icon_class="column-gridblock-icon";
	$portfolio_count++;
	$portfoliogrid .= '<div class="gridblock-grid-element">';

		if ($boxtitle=="true") {
			$portfoliogrid .= '<span class="boxtitle-hover"><a href="'.get_permalink().'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a></span>';
		}
		$portfoliogrid .= '<span class="gridblock-link-hover">';
		
		$linkcenter ='';
		if ( $portfolio_link_type=="DirectURL" ) $linkcenter="gridblock-link-center";
		
		$portfoliogrid .= '<a href="'.get_permalink().'"><span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="icon-plus"></i></span></a>';
		$portfoliogrid .= '</span>';


		//if Password Required
		if ( post_password_required() ) {
			$protected=" gridblock-protected"; $iconclass="";
			$portfoliogrid .= '<a class="'.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<span class="grid-blank-status"><i class="icon-lock icon-2x"></i></span>';
			$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
		} else {
			//Switch check for Linked Type

			switch ($portfolio_link_type) {
				case 'DirectURL':
					$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.get_permalink() .'" rel="bookmark" title="'.get_the_title().'">';
					$icon_class="";
					break;

				case 'Customlink':
					$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.$customlink_URL.'">';
					$icon_class='<i class="icon-external-link"></i>';
					break;

				case 'Lightbox':
					if ( $lightboxvideo<>"" ) {
						$portfoliogrid .= mtheme_activate_lightbox (
							$lightbox_type="prettyPhoto",
							$ID=get_the_ID(),
							$link=$lightboxvideo,
							$mediatype="video",
							$imagetitle=get_the_title(),
							$class="gridblock-image-link gridblock-columns",
							$navigation="prettyPhoto[portfolio]"
							);
						$icon_class='<i class="icon-play"></i>';
					} else {
						$portfoliogrid .= mtheme_activate_lightbox (
							$lightbox_type="prettyPhoto",
							$ID=get_the_ID(),
							$link=mtheme_featured_image_link( get_the_ID() ),
							$mediatype="image",
							$imagetitle=mtheme_featured_image_title( get_the_ID() ),
							$class="gridblock-image-link gridblock-columns",
							$navigation="prettyPhoto[portfolio]"
							);
						$icon_class='<i class="icon-search"></i>';							
					}
					break;
			}
			// Display Hover icon trigger classes
			$portfoliogrid .= '<span class="gridblock-image-hover">';
			if ($icon_class) $portfoliogrid .= '<span class="hover-icon-effect column-gridblock-icon">'.$icon_class .'</span>';
			$portfoliogrid .= '</span>';
			// If it aint slideshow then display a background. Otherwise one is active in slideshow thumbnails.
			// Custom Thumbnail
			$portfoliogrid .= '<span class="gridblock-background-hover"></span>';
			if ($thumbnail<>"") {
				$portfoliogrid .= '<img src="'.$thumbnail.'" class="preload-image displayed-image" alt="thumbnail" />';
			} else {
				// Slideshow then generate slideshow shortcode
				$portfoliogrid .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$type=$portfolioImage_type,
					$imagetitle=mtheme_featured_image_title( get_the_ID() ),
					$class="preload-image displayed-image"
				);

			}
		}
		$portfoliogrid .= '</a>';

	$portfoliogrid .='</div>';

	endwhile; endif;
	$portfoliogrid .='</div>';
	$portfoliogrid .='</div>';
	$portfoliogrid .='
	<script>
	/* <![CDATA[ */
	(function($){
	$(window).load(function(){
		$("#owl-'.$uniqureID.'").owlCarousel({
			itemsCustom : [
				[0, 1],
				[500, 2],
				[700, 3],
				[1024, '.$columns.']
			],
			items: '.$columns.',
			navigation : true,
			navigationText : ["",""],
			scrollPerPage : false
		});
	})
	})(jQuery);
	/* ]]> */
	</script>
	';

}

	wp_reset_query();
	return $portfoliogrid;
}
add_shortcode("workscarousel", "mWorksCarousel");


///////// Recent Blog Lists ///////////////
//++++++++++++++++++++++++++++++++++++++//

function mRecentBlog($atts, $content = null) {
	extract(shortcode_atts(array(
		"comments" => 'true',
		"date" => 'true',
		"columns" => '4',
		"limit" => '-1',
		"title" => 'true',
		"description" => 'true',
		"cat_slug" => '',
		"post_type" => '',
		"excerpt_length" => '15',
		"readmore_text" => '',
		"pagination" => 'false'
	), $atts));

if ($columns==4) { 
	$column_type="four";
	$portfolioImage_type="gridblock-medium";
	}
if ($columns==3) { 
	$column_type="three";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==2) { 
	$column_type="two";
	$portfolioImage_type="gridblock-large";
	}
if ($columns==1) { 
	$column_type="one";
	$portfolioImage_type="gridblock-full";
	}

$portfolio_count=0;
$postformats="";
$terms='';
$terms=array();
$count=0;
$flag_new_row=true;
$portfoliogrid='';
$portfoliogrid .= '<div class="gridblock-columns-wrap clearfix">';
$portfoliogrid .= '<ul class="gridblock-'.$column_type.'">';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

if ($post_type<>"") {
	$type_explode = explode(",", $post_type);
	foreach ($type_explode as $postformat) {
		$count++;
		$postformat_slug = "post-format-" . $postformat;
		$terms[] .= $postformat_slug;
	}
	
	query_posts(array(
		'category_name' => $cat_slug,
		'posts_per_page' => $limit,
		'paged' => $paged,
		'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => $terms
					)
				)
		));
} else {
	query_posts(array(
		'category_name' => $cat_slug,
		'paged' => $paged,
		'posts_per_page' => $limit
		));	
}

if (have_posts()) : while (have_posts()) : the_post();
	//echo $type, $portfolio_type;

$postformat = get_post_format();
if($postformat == "") $postformat="standard";

$portfolio_thumb_header="Image";

if ($portfolio_count==$columns) $portfolio_count=0;

$protected="";
$icon_class="column-gridblock-icon";
$portfolio_count++;

if ($portfolio_count==1) $portfoliogrid .= '<li class="clearfix"></li>';
$portfoliogrid .= '<li class="gridblock-element gridblock-col-'.$portfolio_count.'">';

	$portfoliogrid .= '<span class="gridblock-link-hover">';
	
	$linkcenter ='';
	$linkcenter="gridblock-link-center";

	switch ($postformat) {
		case 'video':
			$postformat_icon = "icon-play";
			break;
		case 'audio':
			$postformat_icon = "icon-volume-up";
			break;
		case 'gallery':
			$postformat_icon = "icon-plus";
			break;
		case 'quote':
			$postformat_icon = "icon-quote-left";
			break;
		case 'link':
			$postformat_icon = "icon-link";
			break;
		case 'aside':
			$postformat_icon = "icon-pushpin";
			break;
		case 'image':
			$postformat_icon = "icon-picture";
			break;
		default:
			$postformat_icon ="icon-pencil";
			break;
	}
	

	$portfoliogrid .= '<a href="'.get_permalink().'"><span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="'.$postformat_icon.'"></i></span></a>';
	$portfoliogrid .= '</span>';


	//if Password Required
	if ( post_password_required() ) {
		$protected=" portfolio-protected"; $iconclass="";
		$portfoliogrid .= '<a class="grid-blank-element '.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
		$portfoliogrid .= '<span class="grid-blank-status"><i class="icon-lock icon-2x"></i></span>';
		$portfoliogrid .= '<div class="portfolio-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
	} else {

		if ( ! has_post_thumbnail() ) {
			$portfoliogrid .= '<a class="grid-blank-element '.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<span class="grid-blank-status"><i class="'.$postformat_icon.' icon-2x"></i></span>';
			$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
		}

		if ( has_post_thumbnail() ) {
		//Make sure it's not a slideshow
			//Switch check for Linked Type
		$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.get_permalink() .'" rel="bookmark" title="'.get_the_title().'">';
		// Display Hover icon trigger classes

		// If it aint slideshow then display a background. Otherwise one is active in slideshow thumbnails.
		$portfoliogrid .= '<span class="gridblock-background-hover"></span>';
		// Custom Thumbnail
		//Display Image
			$portfoliogrid .= mtheme_display_post_image (
				get_the_ID(),
				$have_image_url="",
				$link=false,
				$type=$portfolioImage_type,
				$imagetitle='',
				$class="preload-image displayed-image"
			);
		} else {
			$portfoliogrid .= '<a class="'.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<div class="post-nothumbnail"></div>';
		} 
	}
	$portfoliogrid .= '</a>';

	$portfoliogrid .= '<div class="summary-info">';
		$category = get_the_category();
		if ($comments == 'true' ) {
			$portfoliogrid .= '<div class="summary-comment">';

			$num_comments = get_comments_number( get_the_id() ); // get_comments_number returns only a numeric value
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments_desc = __('0 <i class="icon-comment-alt"></i>');
				} elseif ( $num_comments > 1 ) {
					$comments_desc = $num_comments . __(' <i class="icon-comment-alt"></i>');
				} else {
					$comments_desc = __('1 <i class="icon-comment-alt"></i>');
				}
				$portfoliogrid .= '<a href="' . get_comments_link( get_the_id() ) .'">'. $comments_desc.'</a>';
			}
			$portfoliogrid .='</div>';
		}
		if ($date=='true') {
			$portfoliogrid .='<div class="summary-date"><i class="icon-time"></i> '.get_the_date('jS M y').'</div>';
		}
	$portfoliogrid .='</div>';

	// If either of title and description needs to be displayed.
	if ($title=="true" || $description=="true") {
		$portfoliogrid .='<div class="work-details">';
			$hreflink = get_permalink();
			if ($title=="true") { $portfoliogrid .='<h4><a href="'.$hreflink.'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a></h4>'; }
			$summary_content = mtheme_excerpt_limit($excerpt_length);
			if ($readmore_text!='') {
				$summary_content .= '<div class="blogpost_readmore"><a href="'.$hreflink.'">'.$readmore_text.'</a></div>';
			}
			if ($postformat=='quote') $summary_content = get_post_meta( get_the_id() , MTHEME . '_meta_quote', true);
			if ($description=="true") { $portfoliogrid .= '<p class="entry-content work-description">'. $summary_content .'</p>'; }
		$portfoliogrid .='</div>';
	}

$portfoliogrid .='</li>';


endwhile; endif;
$portfoliogrid .='</ul>';
$portfoliogrid .='</div>';

	if ($pagination=='true') $portfoliogrid .= mtheme_pagination();
	wp_reset_query();
	return $portfoliogrid;
}
add_shortcode("recentblog", "mRecentBlog");

///////// Recent Blog Lists ///////////////
//++++++++++++++++++++++++++++++++++++++//

function mRecentBlogListBox($atts, $content = null) {
	extract(shortcode_atts(array(
		"comments" => 'true',
		"date" => 'true',
		"columns" => '4',
		"limit" => '-1',
		"title" => 'true',
		"description" => 'true',
		"cat_slug" => '',
		"excerpt_length" => '15',
		"post_type" => '',
		"pagination" => 'false'
	), $atts));

$column_type="listbox";
$portfolioImage_type="gridblock-small";

$portfolio_count=0;
$postformats="";
$terms='';
$terms=array();
$count=0;
$flag_new_row=true;
$portfoliogrid='';
$portfoliogrid .= '<div class="gridblock-listbox gridblock-columns-wrap clearfix">';
$portfoliogrid .= '<ul class="gridblock-'.$column_type.' clearfix">';

if ( get_query_var('paged') ) {
	$paged = get_query_var('paged');
} elseif ( get_query_var('page') ) {
	$paged = get_query_var('page');
} else {
	$paged = 1;
}

if ($post_type<>"") {
	$type_explode = explode(",", $post_type);
	foreach ($type_explode as $postformat) {
		$count++;
		$postformat_slug = "post-format-" . $postformat;
		$terms[] .= $postformat_slug;
	}
	
	query_posts(array(
		'category_name' => $cat_slug,
		'posts_per_page' => $limit,
		'paged' => $paged,
		'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => $terms
					)
				)
		));
} else {
	query_posts(array(
		'category_name' => $cat_slug,
		'paged' => $paged,
		'posts_per_page' => $limit
		));	
}

if (have_posts()) : while (have_posts()) : the_post();
	//echo $type, $portfolio_type;

$postformat = get_post_format();
if($postformat == "") $postformat="standard";

$portfolio_thumb_header="Image";

if ($portfolio_count==$columns) $portfolio_count=0;

$protected="";
$icon_class="column-gridblock-icon";
$portfolio_count++;

$portfoliogrid .= '<li class="gridblock-listbox-row gridblock-col-'.$portfolio_count.' clearfix">';
	
	$portfoliogrid .= '<div class="listbox-image">';

	$portfoliogrid .= '<span class="gridblock-link-hover">';
	
	$linkcenter ='';
	$linkcenter="gridblock-link-center";

	switch ($postformat) {
		case 'video':
			$postformat_icon = "icon-play";
			break;
		case 'audio':
			$postformat_icon = "icon-volume-up";
			break;
		case 'gallery':
			$postformat_icon = "icon-plus";
			break;
		case 'quote':
			$postformat_icon = "icon-quote-left";
			break;
		case 'link':
			$postformat_icon = "icon-link";
			break;
		case 'aside':
			$postformat_icon = "icon-pushpin";
			break;
		case 'image':
			$postformat_icon = "icon-picture";
			break;
		default:
			$postformat_icon ="icon-pencil";
			break;
	}
	

	$portfoliogrid .= '<a href="'.get_permalink().'"><span class="hover-icon-effect column-gridblock-link '.$linkcenter.'"><i class="'.$postformat_icon.'"></i></span></a>';
	$portfoliogrid .= '</span>';


	//if Password Required
	if ( post_password_required() ) {
		$protected=" gridblock-protected"; $iconclass="";
		$portfoliogrid .= '<a class="grid-blank-element '.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
		$portfoliogrid .= '<span class="grid-blank-status"><i class="icon-lock icon-2x"></i></span>';
		$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
	} else {

		if ( ! has_post_thumbnail() ) {
			$portfoliogrid .= '<a class="grid-blank-element '.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<span class="grid-blank-status"><i class="'.$postformat_icon.' icon-2x"></i></span>';
			$portfoliogrid .= '<div class="gridblock-protected"><img src="'.MTHEME_PATH.'/images/icons/blank-grid.png" /></div>';
		}

		if ( has_post_thumbnail() ) {
		//Make sure it's not a slideshow
			//Switch check for Linked Type
		$portfoliogrid .= '<a class="gridblock-image-link gridblock-columns" href="'.get_permalink() .'" rel="bookmark" title="'.get_the_title().'">';
		// Display Hover icon trigger classes

		// If it aint slideshow then display a background. Otherwise one is active in slideshow thumbnails.
		$portfoliogrid .= '<span class="gridblock-background-hover"></span>';
		// Custom Thumbnail
		//Display Image
			$portfoliogrid .= mtheme_display_post_image (
				get_the_ID(),
				$have_image_url="",
				$link=false,
				$type=$portfolioImage_type,
				$imagetitle='',
				$class="preload-image displayed-image"
			);
		} else {
			$portfoliogrid .= '<a class="'.$protected.' gridblock-image-link gridblock-columns" title="'.get_the_title().'" href="'.get_permalink().'" >';
			$portfoliogrid .= '<div class="post-nothumbnail"></div>';
		} 
	}
	$portfoliogrid .= '</a>';
	
	$portfoliogrid .= '<div class="listbox-content">';
	$portfoliogrid .= '<div class="summary-info">';
		$category = get_the_category();
		if ($comments == 'true' ) {
			$portfoliogrid .= '<div class="summary-comment">';

			$num_comments = get_comments_number( get_the_id() ); // get_comments_number returns only a numeric value
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments_desc = __('0 <i class="icon-comment-alt"></i>');
				} elseif ( $num_comments > 1 ) {
					$comments_desc = $num_comments . __(' <i class="icon-comment-alt"></i>');
				} else {
					$comments_desc = __('1 <i class="icon-comment-alt"></i>');
				}
				$portfoliogrid .= '<a href="' . get_comments_link( get_the_id() ) .'">'. $comments_desc.'</a>';
			}
			$portfoliogrid .='</div>';
		}
		if ($date=='true') {
			$portfoliogrid .='<div class="summary-date"><i class="icon-time"></i> '.get_the_date('jS M y').'</div>';
		}
	$portfoliogrid .='</div>';
$portfoliogrid .= '</div>';
	// If either of title and description needs to be displayed.
	if ($title=="true" || $description=="true") {
		$portfoliogrid .='<div class="work-details">';
			$hreflink = get_permalink();
			if ($title=="true") { $portfoliogrid .='<h4><a href="'.$hreflink.'" rel="bookmark" title="'. get_the_title() .'">'. get_the_title() .'</a></h4>'; }
			$summary_content = mtheme_excerpt_limit($excerpt_length);
			if ($postformat=='quote') $summary_content = get_post_meta( get_the_id() , MTHEME . '_meta_quote', true);
			if ($description=="true") { $portfoliogrid .= '<p class="entry-content work-description">'. $summary_content .'</p>'; }
		$portfoliogrid .='</div>';
	}
	$portfoliogrid .= '</div>';

$portfoliogrid .='</li>';

endwhile; endif;
$portfoliogrid .='</ul>';
$portfoliogrid .='</div>';

	if ($pagination=='true') $portfoliogrid .= mtheme_pagination();
	wp_reset_query();
	return $portfoliogrid;
}
add_shortcode("recent_blog_listbox", "mRecentBlogListBox");
?>