<?php
/**
 * Generate Slideshow .
 *
 * @ [slidegallery width=100 height=100 link=(lightbox,direct,none)]
 */
function mtheme_SlideGallery($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '1',
		"lightbox" => 'false',
		"crop" => 'true',
		"height" => '434',
		"width" => '620',
		"type" => 'Fill',
		"resize" => true,
		"title" => 'false'
	), $atts));
	$withplus=$width+20;
	$resize_image=false;
	if ($resize=="true") { $resize_image=true; }
	$quality=MTHEME_IMAGE_QUALITY;
	$link_end="";
	$lightbox_link="";
	$crop_image= " ,imageCrop: false";
	$lightbox_link = " ,lightbox: false";
	$portfolio_type= " ,lightbox: false ,imageCrop: true";
	
	if ($type=="Normal") $portfolio_type= " ,lightbox: false ,imageCrop: false";
	if ($type=="Fill") $portfolio_type= " ,lightbox: false ,imageCrop: true";
	if ($type=="Normal-plus-Lightbox") $portfolio_type= " ,lightbox: true ,imageCrop: false";
	if ($type=="Fill-plus-Lightbox") $portfolio_type= " ,lightbox: true ,imageCrop: true";
	
	//echo $type, $portfolio_type;
	
	$rootpath= get_stylesheet_directory_uri();
	$images = get_children( array( 
						'post_parent' => '47',
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order' )
						);
	
	if ( $images ) 
	{
	$output = '<div class="clear"></div>';
		$output .= '<div id="galleria">';
			foreach ( $images as $id => $image ) {
			$attatchmentID = $image->ID; 
			$imagearray = wp_get_attachment_image_src( $attatchmentID , 'full', false);
			$imageURI = $imagearray[0];
			$imageID = get_post($attatchmentID);
			$imageTitle = $imageID->post_title;
			$imageCaption = $imageID->post_excerpt;
			if ($title=="false") { $imageTitle=""; }

					$output .= mtheme_showimage (
						$imageURI,
						$link="",
						$resize=false,
						$height,
						$width,
						$quality=MTHEME_IMAGE_QUALITY, 
						$crop=1,
						$imageTitle="",
						$class=""
						);
			//$output .='</a>';
			}
		$output .='</div>';
	$output .='<div class="clear"></div>';
	return $output;
	}	
}
add_shortcode("galleria", "mtheme_SlideGallery");



function mtheme_NivoSlides($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '1',
		"lightbox" => 'false',
		"crop" => 'true',
		"height" => '300',
		"width" => '650',
		"resize" => true,
		"title" => 'false'
	), $atts));
	$withplus=$width+20;
	$resize_image=false;
	if ($resize=="true") { $resize_image=true; }
	$quality=MTHEME_IMAGE_QUALITY;
	$link_end="";
	$lightbox_link="";
	
	$cssheight= $height . "px";
	$csswidth= $width . "px";
	
	if ($height==0) { $cssheight="50px"; }
	
	$crop_image= " ,imageCrop: true";
	if ($lightbox == "true" ) { $lightbox_link = " ,lightbox: true"; }
	$rootpath= get_stylesheet_directory_uri();
	$images = get_children( array( 
						'post_parent' => get_the_id(),
						'post_status' => 'inherit',
						'post_type' => 'attachment',
						'post_mime_type' => 'image',
						'order' => 'ASC',
						'orderby' => 'menu_order' )
						);
	
	if ( $images ) 
	{
	
	$nivoID = "sliderID" . dechex(time()).dechex(mt_rand(1,65535));
	
$mtheme_path=MTHEME_PATH;
$output = <<<HTML
<script type='text/javascript'>
/*<![CDATA[*/
    jQuery(window).load(function() {
        jQuery('#{$nivoID}').nivoSlider({
        effect:'fade', // Specify sets like: 'fold,fade,sliceDown'
        slices:10, // For slice animations
        boxCols: 10, // For box animations
        boxRows: 10, // For box animations
        animSpeed:500, // Slide transition speed
        pauseTime:6000, // How long each slide will show
		keyboardNav:true, //Use left & right arrows
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
		});
    });

/*]]>*/
</script>
<style type='text/css'>
/*<![CDATA[*/
#{$nivoID} { position:relative; height:{$cssheight} !important; background: url({$mtheme_path}/images/preloaders/preloader.png) no-repeat 50% 50%; margin: 0 0 10px 0; }
#{$nivoID} img { position:absolute;top:0px;left:0px;display:none;}
#{$nivoID} a { border:0;	display:block;}
/*]]>*/
</style>

<div class="clear"></div>
<div id="nivoContainer">
<div id="{$nivoID}" class="nivoSlider">
HTML;
			foreach ( $images as $id => $image ) {
			$attatchmentID = $image->ID; 
			$imagearray = wp_get_attachment_image_src( $attatchmentID , 'blog-post', false);
			$imageURI = $imagearray[0];
			$imageID = get_post($attatchmentID);
			$imageTitle = $imageID->post_title;
			$imageCaption = $imageID->post_excerpt;
			if ($title=="false") { $imageTitle=""; }
			//$output .= '<a href="' . $imageURI . '" title="'. $imageTitle .'">';
			$output .= mtheme_showimage (
				$imageURI,
				$link="",
				$resize=false,
				$height,
				$width,
				$quality=MTHEME_IMAGE_QUALITY, 
				$crop=1,
				$imageTitle="",
				$class=""
				);
			//$output .='</a>';
			}
$output .= <<<HTML
</div>
</div>
<div class="clear"></div>
HTML;
	return $output;
	}	
}
add_shortcode("nivoslides", "mtheme_NivoSlides");

/**
 * Flexi Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_FelxiSlideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		"pageid" => '',
		"hovericon"=> false,
		"hovertype"=> 'ajax',
		"transition" => 'fade',
		"imagesize" => 'fullwidth',
		"height" => '434',
		"width" => '650',
		"slideshowtitle" => false,
		"lightbox" => false,
		"lboxtitle" => false
	), $atts));
	
	//echo $type, $portfolio_type;
	$thepageID=get_the_id();
	if ($pageid<>'') $thepageID=$pageid;
	$count=1;

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$uniqurePageID=get_the_id()."-".dechex(mt_rand(1,65535));

	$filter_image_ids = mtheme_get_custom_attachments ( $thepageID );						
	if ( $filter_image_ids ) 
	{
	$output = '
	<div class="spaced-wrap clearfix">
		<div class="flexslider-container-page flexislider-container-'.$flexID.' ">
			<div id="flex'.$flexID.'" class="flexslider">
			<ul class="slides">';
			foreach ( $filter_image_ids as $attachment_id) {
			$imagearray = wp_get_attachment_image_src( $attachment_id , $imagesize, false);
			$imageURI = $imagearray[0];
			$imageID = get_post($attachment_id);
			$imageTitle = $imageID->post_title;
			$imageCaption = $imageID->post_excerpt;
			$fullimagearray = wp_get_attachment_image_src( $attachment_id , '', false);
			$fullimageURI = $fullimagearray[0];
			$lightboxTitle="";
			$output .= '<li>';
			if ($lboxtitle=='true') $lightboxTitle = 'title="'.$imageTitle.'" ';
			if ($lightbox=='true') {
				$output .= '<a class="gridblock-image-link flexislideshow-link" '. $lightboxTitle .'rel="prettyPhoto['.$uniqurePageID.']" href="'.$fullimageURI.'">';
			}
			if ($hovericon=='true') {
				$hovercolumn="ajax";
				if ($hovertype=="portfolio") $hovercolumn="column";
				$output .= '<span class="'.$hovertype.'-image-hover"><span class="hover-icon-effect '.$hovercolumn.'-gridblock-icon"><i class="icon-search"></i></span></span>';
				$count++;
				$output .= '<span class="gridblock-background-hover"></span>';
			}
					$output .= mtheme_showimage (
						$imageURI,
						$link="",
						$resize=false,
						$height,
						$width,
						$quality=MTHEME_IMAGE_QUALITY,
						$crop=1,
						$alt_text = mtheme_get_alt_text( $attachment_id ),
						$class="displayed-image"
						);
			if ($lightbox=='true') $output .= '</a>';
			if ( $slideshowtitle=='true' && $imageTitle != '' ) $output .= '<div class="sc_slideshowtitle">'.$imageTitle.'</div>';
			$output .='</li>';
			}
		$output .='</ul></div></div></div>';
		$output .='
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery("#flex'.$flexID.'").flexslider({
			animation: "'.$transition.'",
			slideshow: false,
			pauseOnAction: true,
			pauseOnHover: true,
			smoothHeight: true,
			controlsContainer: "flexslider-container-'.$flexID.'",
			start: function(){
				jQuery(".flexslider-container-page,.gridblock-element .ajax-image-block").css("background","none");
			},
                        after: function(){
				jQuery(".entry-title  h1 span").text(\' : \' + jQuery(".flex-active-slide .sc_slideshowtitle").text());
			},
		});
                jQuery(".entry-title  h1 span").text(\' : \' + jQuery(".flex-active-slide .sc_slideshowtitle").text());
	});
</script>
';
	return $output;
	}	
}
add_shortcode("flexislideshow", "mtheme_FelxiSlideshow");


/**
 * AJAX Flexi Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_AJAXFelxiSlideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '1',
		"lightbox" => 'false',
		"crop" => 'true',
		"height" => '434',
		"width" => '1020',
		"type" => 'Fill',
		"resize" => true,
		"title" => 'false'
	), $atts));
	$withplus=$width+20;
	$resize_image=false;
	if ($resize=="true") { $resize_image=true; }
	$quality=MTHEME_IMAGE_QUALITY;
	$link_end="";
	$lightbox_link="";
	$crop_image= " ,imageCrop: false";
	$lightbox_link = " ,lightbox: false";
	$portfolio_type= " ,lightbox: false ,imageCrop: true";
	
	if ($type=="Normal") $portfolio_type= " ,lightbox: false ,imageCrop: false";
	if ($type=="Fill") $portfolio_type= " ,lightbox: false ,imageCrop: true";
	if ($type=="Normal-plus-Lightbox") $portfolio_type= " ,lightbox: true ,imageCrop: false";
	if ($type=="Fill-plus-Lightbox") $portfolio_type= " ,lightbox: true ,imageCrop: true";
	
	//echo $type, $portfolio_type;
	global $mtheme_thepostID;

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$filter_image_ids = mtheme_get_custom_attachments ( $mtheme_thepostID );						
	if ( $filter_image_ids ) 
	{
	$output = '
	<div class="spaced-wrap clearfix">
		<div class="flexslider-container-page flexislider-container1 clearfix">
			<div id="flex1" class="flexslider">
			<ul class="slides">';
			foreach ( $filter_image_ids as $attachment_id) {
			$imagearray = wp_get_attachment_image_src( $attachment_id , 'gridblock-ajax', false);
			$imageURI = $imagearray[0];
			$imageID = get_post($attachment_id);
			$imageTitle = $imageID->post_title;
			$imageCaption = $imageID->post_excerpt;
			if ($title=="false") { $imageTitle=""; }
			$output .= '<li>';

					$output .= mtheme_showimage (
						$imageURI,
						$link="",
						$resize=false,
						$height,
						$width,
						$quality=MTHEME_IMAGE_QUALITY, 
						$crop=1,
						$alt_text = mtheme_get_alt_text( $attachment_id ),
						$class=""
						);

			$output .='</li>';
			}
		$output .='</ul></div></div><div class="clear"></div></div>';
	return $output;
	}	
}
add_shortcode("ajaxflexislideshow", "mtheme_AJAXFelxiSlideshow");

/**
 * AJAX Flexi Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_Verticalimages($atts, $content = null) {
	extract(shortcode_atts(array(
		"id" => '1',
		"height" =>'',
		"width" =>'',
		"imagesize" => 'portfolio-ajax'
	), $atts));

	//echo $type, $portfolio_type;
	global $mtheme_thepostID;

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$filter_image_ids = mtheme_get_custom_attachments ( $mtheme_thepostID );

	$uniqurePageID = dechex(mt_rand(1,65535));

	if ( $filter_image_ids ) 
	{
	$output = '
			<ul class="vertical_images clearfix">';
			foreach ( $filter_image_ids as $attachment_id) {
			$imagearray = wp_get_attachment_image_src( $attachment_id , $imagesize, false);
			$imageURI = $imagearray[0];
			$imageID = get_post($attachment_id);
			$imageTitle = $imageID->post_title;
			$imageCaption = $imageID->post_excerpt;
			$fullimagearray = wp_get_attachment_image_src( $attachment_id , '', false);
			$fullimageURI = $fullimagearray[0];
			$output .= '<li>';

			$output .= '<a class="vertical-images-link" rel="prettyPhoto['.$uniqurePageID.']" href="'.$fullimageURI.'">';
					$output .= mtheme_showimage (
						$imageURI,
						$link="",
						$resize=false,
						$height,
						$width,
						$quality=MTHEME_IMAGE_QUALITY, 
						$crop=1,
						$alt_text = mtheme_get_alt_text( $attachment_id ),
						$class=""
						);

			$output .= '</a>';

			if ($imageTitle<>"") $output .= '<div class="vertical-images-title">'.$imageTitle.'</div>';
			$output .='</li>';
			}
		$output .='</ul>';
	return $output;
	}	
}
add_shortcode("vertical_images", "mtheme_Verticalimages");


/**
 * Blog Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_BlogSlideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		"limit" => '-1',
		"cat_slug" => '',
		"transition" => 'fade',
		"limit" => ''
	), $atts));
	
	//echo $type, $portfolio_type;
	query_posts(array(
		'category_name' => $cat_slug,
		'posts_per_page' => $limit
		));	

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$uniqurePageID=get_the_id()."-".dechex(mt_rand(1,65535));
						
	$portfolioImage_type = "blog-full";
	$output = '
	<div class="spaced-wrap clearfix">
		<div class="flexslider-container-page flexislider-container-'.$flexID.' clearfix">
			<div id="flex'.$flexID.'" class="flexslider">
			<ul class="slides">';

			if (have_posts()) : while (have_posts()) : the_post();

			if ( has_post_thumbnail() ) {
				$output .= '<li class="slideshow-box-wrapper">';
				$output .= '<div class="slideshow-box-image">';
				$output .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$theimage_type=$portfolioImage_type,
					$imagetitle='',
					$class="preload-image displayed-image"
				);
				$output .= '</div>';
				$output .= '<div class="slideshow-box-content"><div class="slideshow-box-content-inner">';
				$output .= '<div class="slideshow-box-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';

	$output .= '<div class="slideshow-box-info">';
				$output .='<div class="slideshow-box-categories">';
				foreach((get_the_category()) as $category) { 
				    $output .= '<span>'.$category->cat_name.'</span>';
				} 
				$output .='</div>';
		$category = get_the_category();
			$output .= '<div class="slideshow-box-comment">';

			$num_comments = get_comments_number( get_the_id() ); // get_comments_number returns only a numeric value
			if ( comments_open() ) {
				if ( $num_comments == 0 ) {
					$comments_desc = __('0 <i class="icon-comment-alt"></i>');
				} elseif ( $num_comments > 1 ) {
					$comments_desc = $num_comments . __(' <i class="icon-comment-alt"></i>');
				} else {
					$comments_desc = __('1 <i class="icon-comment-alt"></i>');
				}
				$output .= '<a href="' . get_comments_link( get_the_id() ) .'">'. $comments_desc.'</a>';
			}
			$output .='</div>';
			$output .='<div class="slideshow-box-date"><i class="icon-time"></i> '.get_the_date('jS M y').'</div>';
			$output .='</div>';

				$output .= '</div></div>';
				$output .='</li>';
			}

			endwhile; endif;

		$output .='</ul></div></div><div class="clear"></div></div>';
		$output .='
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery("#flex'.$flexID.'").flexslider({
			animation: "'.$transition.'",
			slideshow: true,
			pauseOnAction: true,
			pauseOnHover: true,
			smoothHeight: true,
			controlsContainer: "flexslider-container-'.$flexID.'",
			start: function(){
				jQuery(".flexslider-container-page,.gridblock-element .ajax-image-block").css("background","none");
			},
		});
	});
</script>
';
	wp_reset_query();
	return $output;
}
add_shortcode("recent_blog_slideshow", "mtheme_BlogSlideshow");


/**
 * Portfolio Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_PortfolioSlideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		"limit" => '-1',
		"worktype_slugs" => '',
		"transition" => 'fade'
	), $atts));
	
	//echo $type, $portfolio_type;
	$countquery = array(
		'post_type' => 'mtheme_portfolio',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'types' => $worktype_slugs,
		'posts_per_page' => $limit,
		);
	query_posts($countquery);

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$uniqurePageID=get_the_id()."-".dechex(mt_rand(1,65535));
						
	$portfolioImage_type = "blog-full";
	$output = '
	<div class="spaced-wrap clearfix">
		<div class="flexslider-container-page flexislider-container-'.$flexID.' clearfix">
			<div id="flex'.$flexID.'" class="flexslider">
			<ul class="slides">';

			if (have_posts()) : while (have_posts()) : the_post();

			if ( has_post_thumbnail() ) {
				$output .= '<li class="slideshow-box-wrapper">';
				$output .= '<div class="slideshow-box-image">';

				$lightbox_image = mtheme_featured_image_link( get_the_id() );

				$lightbox_media = $lightbox_image;

				$custom = get_post_custom(get_the_ID());

				if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { 
					$lightbox_media=$custom[MTHEME . '_lightbox_video'][0];
				}
				
				$output .= '<a class="gridblock-image-link flexislideshow-link"' .' title="'.get_the_title().'" rel="prettyPhoto['.$uniqurePageID.']" href="'.$lightbox_media.'">';

				$output .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$theimage_type=$portfolioImage_type,
					$imagetitle='',
					$class="preload-image displayed-image"
				);
				$output .= '</a>';
				$output .= '</div>';
				$output .= '<div class="slideshow-box-content"><div class="slideshow-box-content-inner">';
				$output .= '<div class="slideshow-box-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';

			$output .= '<div class="slideshow-box-info">';
				$output .='<div class="slideshow-box-categories">';
				$categories = get_the_term_list( get_the_id(), 'types', '', ' / ', '' );
				    $output .= '<span>'.$categories.'</span>';
				$output .='</div>';
			$output .='</div>';

				$output .= '</div></div>';
				$output .='</li>';
			}

			endwhile; endif;

		$output .='</ul></div></div><div class="clear"></div></div>';
		$output .='
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery("#flex'.$flexID.'").flexslider({
			animation: "'.$transition.'",
			slideshow: true,
			pauseOnAction: true,
			pauseOnHover: true,
			smoothHeight: true,
			controlsContainer: "flexslider-container-'.$flexID.'",
			start: function(){
				jQuery(".flexslider-container-page,.gridblock-element .ajax-image-block").css("background","none");
			},
		});
	});
</script>
';
	wp_reset_query();
	return $output;
}
add_shortcode("recent_portfolio_slideshow", "mtheme_PortfolioSlideshow");


/**
 * WooCommerce Featured Slideshow .
 *
 * @ [flexislideshow link=(lightbox,direct,none)]
 */
function mtheme_woocommerce_featured_Slideshow($atts, $content = null) {
	extract(shortcode_atts(array(
		"limit" => '-1',
		"cat_slug" => '',
		"transition" => 'fade',
		"limit" => ''
	), $atts));
	
	//echo $type, $portfolio_type;
	query_posts(array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'meta_key' => '_featured',
		'meta_value' => 'yes'
		));	

	$flexID = "ID" . dechex(time()).dechex(mt_rand(1,65535));
	$uniqurePageID=get_the_id()."-".dechex(mt_rand(1,65535));
						
	$portfolioImage_type = "blog-full";
	$output = '
	<div class="spaced-wrap woocommerce-slideshow clearfix">
		<div class="flexslider-container-page flexislider-container-'.$flexID.' clearfix">
			<div id="flex'.$flexID.'" class="flexslider">
			<ul class="slides">';

			if (have_posts()) : while (have_posts()) : the_post();

			if ( has_post_thumbnail() ) {
				$output .= '<li class="slideshow-box-wrapper">';
				$output .= '<div class="slideshow-box-image">';
				$output .= mtheme_display_post_image (
					get_the_ID(),
					$have_image_url="",
					$link=false,
					$theimage_type=$portfolioImage_type,
					$imagetitle='',
					$class="preload-image displayed-image"
				);
				$output .= '</div>';
				$output .= '<div class="slideshow-box-content"><div class="slideshow-box-content-inner">';
				$output .= '<div class="slideshow-box-title"><a href="'.get_permalink().'">'.get_the_title().'</a></div>';

	$output .= '<div class="slideshow-box-info">';
				$output .='<div class="slideshow-box-categories">';
				foreach((get_the_category()) as $category) { 
				    $output .= '<span>'.$category->cat_name.'</span>';
				} 
				$output .='</div>';
		$category = get_the_category();
			$output .= '<div class="slideshow-box-comment">';
			ob_start();
			woocommerce_get_template('loop/price.php');
			$price = ob_get_contents();
			ob_end_clean();
			$output .='<div class="slideshow-box-date">'.$price.'</div>';
			$output .='</div>';

				$output .= '</div></div>';
				$output .='</li>';
			}

			endwhile; endif;

		$output .='</ul></div></div><div class="clear"></div></div>';
		$output .='
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery("#flex'.$flexID.'").flexslider({
			animation: "'.$transition.'",
			slideshow: true,
			pauseOnAction: true,
			pauseOnHover: true,
			smoothHeight: true,
			controlsContainer: "flexslider-container-'.$flexID.'",
			start: function(){
				jQuery(".flexslider-container-page,.gridblock-element .ajax-image-block").css("background","none");
			},
		});
	});
</script>
';
	wp_reset_query();
	return $output;
}
add_shortcode("woocommerce_featured_slideshow", "mtheme_woocommerce_featured_Slideshow");




// Woo Best Selling
add_shortcode('woocommerce_carousel_bestselling', 'mtheme_woocommerce_bestselling_slideshow');
function mtheme_woocommerce_bestselling_slideshow($atts, $content) {
	extract(shortcode_atts(array(
		'limit' => '5'
	), $atts));

    $args = array(
        'post_type' => 'product',
		'post_status' => 'publish',
		'ignore_sticky_posts'   => 1,
		'posts_per_page' => $limit,
		'meta_key' 		=> 'total_sales',
		'orderby' 		=> 'meta_value'
    );

	$uniqueID=get_the_id()."-".dechex(mt_rand(1,65535));

	ob_start();
	?>
	<div class="shortcode-woo-carousel-group woocommerce clearfix">
	<ul id="shortcode-woo-carousel-owl-<?php echo $uniqueID; ?>" class="products owl-carousel">
	    <?php
	    $products = new WP_Query( $args );
	    
	    if ( $products->have_posts() ) : ?>
	                
	        <?php while ( $products->have_posts() ) : $products->the_post(); ?>
	    
	            <?php woocommerce_get_template_part( 'content', 'product' ); ?>

	        <?php endwhile; // end of the loop. ?>
	        
	    <?php
	    
	    endif; 
	    //wp_reset_query();
	    wp_reset_postdata();
	    ?>
	</ul>
	</div>
	<script>
	/* <![CDATA[ */
	(function($){
	$(window).load(function(){
		$("#shortcode-woo-carousel-owl-<?php echo $uniqueID; ?>").owlCarousel({
			itemsCustom : [
				[0, 1],
				[700, 2],
				[1024, 3]
			],
			items: 3,
			navigation : true,
			navigationText : ["",""],
			scrollPerPage : true,
			pagination: true,
			autoPlay: false
		});
	})
	})(jQuery);
	/* ]]> */
	</script>

	<?php
	$content = ob_get_contents();
	ob_end_clean();
	return $content;
}
?>