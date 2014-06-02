<?php
function mtheme_theme_Socials( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"social_icon" => '',
		"social_link" => '',
		"social_text" => '',
		"social_color" => '',
		"align" => 'false'
	), $atts));

	if ($align =="false" ) {
		// Initially built for staff shortcode. For individual use it will have to have the align variable set.
		$socials = '<li><a class="ntips" title="'.$social_text.'" href="'.$social_link.'"><i class="'.$social_icon.'"></i></a></li>';
	} else {
		$socials = '<div class="social-shortcode align-'.$align.' social-margin-'.$align.'"><a class="ntips" title="'.$social_text.'" href="'.$social_link.'"><i style="color:'.$social_color.'" class="'.$social_icon.'"></i></a></div>';
	}
	return $socials;
}
add_shortcode('socials', 'mtheme_theme_Socials');
//People
function mtheme_People( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"name" => '',
		"image" => '',
		"title" => '',
		"desc" => ''
	), $atts));

$personsocials = '<ul class="person-socials clearfix">';
$personsocials .= do_shortcode($content);
$personsocials .= '</ul>';

$person = '
<div class="person">
	<div class="person-image">
		<img src="'.$image.'" alt="'.$name.'" tite="'.$name.'" />
	</div>
	<h3>'.$name.'</h3>
	<h4>'.$title.'</h4>
	'.$personsocials.'
	<div class="person-desc">
	'.$desc.'
	</div>
</div>';

   return $person;
}
add_shortcode('staff', 'mtheme_People');
// Testimonials
add_shortcode('testimonials', 'mtheme_Testimonials');
	function mtheme_Testimonials($atts, $content) {

		$id = "testimonial-id-".rand(0,1000);

		$qblock = '';
$qblock .= '
<div class="testimonials-wrap">
<div class="testimonials-roll flexslider-container-page flexislider-testimonials clearfix">
	<div id="flex-testimonails" class="flexslider '.$id.'">
	<ul class="slides clearfix">
';
		$qblock .= do_shortcode($content);
		$qblock .= '
	</ul>
	</div>
</div>
</div>';
$qblock .='
<script type="text/javascript">
	jQuery(window).load(function() {
		jQuery(".'.$id.'").flexslider({
			animation: "fade",
			slideshow: true,
			pauseOnAction: true,
			pauseOnHover: true,
			smoothHeight: true,
			controlsContainer: "flexislider-testimonials"
		});
	});
</script>';

		return $qblock;
	}
// The Saying
function mtheme_Testimonial($atts, $content) {
	extract(shortcode_atts(array(
		"quote" => '',
		"name" => '',
		"company" => '',
		"link" => '',
		"position" =>'',
		"image" => ''
	), $atts));

	$testimonial = '';
	$testimonial .= '<li>';
		$testimonial .= '<div class="testimonial-say">';
		$testimonial .= '<div class="testimonial-inner">';
		$testimonial .= '<span class="client-say">';
		$testimonial .= $quote;
		$testimonial .= '</span>';
		if ( $image !="" ) { 
			$testimonial .= '<div class="client-details">';
			$testimonial .= '<img class="client-image" src="'.$image.'" alt="testimonial-image" />';
			$testimonial .= '</div>';
		}
		$testimonial .= '<div class="client-info">';
				$testimonial .= '<span class="client-position">';
		$testimonial .= $position;
		$testimonial .= '</span>';
		$testimonial .= '<span class="client-name">';
		$testimonial .= $name;
		$testimonial .= '</span>';
		$testimonial .= '<span class="client-company">';
		if ($link !='') { $testimonial .= '<a href="'.$link.'">'; }
		$testimonial .=  $company;
		if ($link !='') { $testimonial .= '</a>'; }
		$testimonial .= '</span></div>';
		$testimonial .= '</div>';
		$testimonial .= '</div>';
	$testimonial .= '</li>';
	return $testimonial;
}
add_shortcode('testimonial', 'mtheme_Testimonial');

// Clients
//Obsolete
add_shortcode('clients', 'mtheme_Clients');
function mtheme_Clients($atts, $content) {
	extract(shortcode_atts(array(
		'column' => '5'
	), $atts));

	$clientbox = '<div class="client-column-'.$column.' clearfix">';
	$clientbox .= do_shortcode($content);
	$clientbox .= '</div>';

	return $clientbox;
}
// The Saying
function mtheme_Client($atts, $content) {
	extract(shortcode_atts(array(
		"logo" => '',
		"link" => '',
		"hovertitle" =>'',
		"last_item" => 'no'
	), $atts));

	$column_edge="client-item-space";
	if ($last_item=="yes") $column_edge="clearfix";
	$client = '<div class="client-item '.$column_edge.'">';
	if ( $link <>"" ) { $client .= '<a class="ntips" title="'.$hovertitle.'" href="'.$link.'" >'; }
	$client .= '<img src="' . $logo . '" alt="client" />';
	if ( $link <>"" ) { $client .= '</a>'; }
	$client .= '</div>';

	return $client;
}
add_shortcode('client', 'mtheme_Client');

// Display Logo Carousel
add_shortcode('carousel_group', 'mtheme_carousel_group');
function mtheme_carousel_group($atts, $content) {
	extract(shortcode_atts(array(
		'column' => '5'
	), $atts));

	$uniqueID=get_the_id()."-".dechex(mt_rand(1,65535));

	$carousel_group = '<div class="shortcode-carousel-group clearfix">';
	$carousel_group .= '<div id="shortcode-carousel-owl-'.$uniqueID.'" class="owl-carousel">';
	$carousel_group .= do_shortcode($content);
	$carousel_group .= '</div>';
	$carousel_group .= '</div>';
	$carousel_group .='
	<script>
	/* <![CDATA[ */
	(function($){
	$(window).load(function(){
		$("#shortcode-carousel-owl-'.$uniqueID.'").owlCarousel({
			itemsCustom : [
				[0, 1],
				[700, 3],
				[1024, 5]
			],
			items: 5,
			navigation : false,
			navigationText : ["",""],
			scrollPerPage : false,
			pagination: false,
			autoPlay: true
		});
	})
	})(jQuery);
	/* ]]> */
	</script>
	';

	return $carousel_group;
}
// The Saying
function mtheme_carousel_item($atts, $content) {
	extract(shortcode_atts(array(
		"image" => '',
		"link" => ''
	), $atts));

	$carousel_item = '<div class="shortcode-carousel-item">';
	if ( $link <>"" ) { $carousel_item .= '<a href="'.$link.'" >'; }
	$carousel_item .= '<img src="' . $image . '" alt="image" />';
	if ( $link <>"" ) { $carousel_item .= '</a>'; }
	$carousel_item .= '</div>';

	return $carousel_item;
}
add_shortcode('carousel_item', 'mtheme_carousel_item');
?>