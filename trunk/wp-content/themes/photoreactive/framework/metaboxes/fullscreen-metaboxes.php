<?php
global $mtheme_meta_box,$mtheme_fullscreen_box,$mtheme_active_metabox;

$mtheme_active_metabox="fullscreen";
$mtheme_sidebar_options = mtheme_generate_sidebarlist("portfolio");

// Pull all the Featured into an array
$bg_slideshow_pages = get_posts('post_type=mtheme_featured&orderby=title&numberposts=-1&order=ASC');

if ($bg_slideshow_pages) {
	$options_bgslideshow['none'] = "Not Selected";
	foreach($bg_slideshow_pages as $key => $list) {
		$custom = get_post_custom($list->ID);
		if ( isset($custom["fullscreen_type"][0]) ) { 
			$slideshow_type=$custom["fullscreen_type"][0]; 
		} else {
		$slideshow_type="";
		}
		if ($slideshow_type<>"Fullscreen-Video") {
			$options_bgslideshow[$list->ID] = $list->post_title;
		}
	}
} else {
	$options_bgslideshow[0]="Featured pages not found.";
}

$mtheme_imagepath =  get_template_directory_uri() . '/framework/options/images/';

/**
 * Add Photographer Name and URL fields to media uploader
 *
 * @param $form_fields array, fields to include in attachment form
 * @param $post object, attachment record in database
 * @return $form_fields, modified form fields
 */
 
function mtheme_attachment_fields_fullscreen_link( $form_fields, $post ) {
	$form_fields['mtheme_attachment_fullscreen_link'] = array(
		'label' => 'Fullscreen Button Text',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mtheme_attachment_fullscreen_link', true ),
		'helps' => '* Only for Fullscreen Slideshow & Static images',
	);

	$form_fields['mtheme_attachment_fullscreen_url'] = array(
		'label' => 'Fullscreen Button Link',
		'input' => 'text',
		'value' => get_post_meta( $post->ID, 'mtheme_attachment_fullscreen_url', true ),
		'helps' => '* Only for Fullscreen Slideshow & Static images',
	);

	return $form_fields;
}

add_filter( 'attachment_fields_to_edit', 'mtheme_attachment_fields_fullscreen_link', 10, 2 );

/**
 * Save values of Photographer Name and URL in media uploader
 *
 * @param $post array, the post data for database
 * @param $attachment array, attachment fields from $_POST form
 * @return $post array, modified post data
 */

function mtheme_attachment_fields_fullscreen_link_save( $post, $attachment ) {
	if( isset( $attachment['mtheme_attachment_fullscreen_link'] ) )
		update_post_meta( $post['ID'], 'mtheme_attachment_fullscreen_link', $attachment['mtheme_attachment_fullscreen_link'] );

	if( isset( $attachment['mtheme_attachment_fullscreen_url'] ) )
		update_post_meta( $post['ID'], 'mtheme_attachment_fullscreen_url', esc_url( $attachment['mtheme_attachment_fullscreen_url'] ) );

	return $post;
}

add_filter( 'attachment_fields_to_save', 'mtheme_attachment_fields_fullscreen_link_save', 10, 2 );


$mtheme_fullscreen_box = array(
	'id' => 'featuredmeta-box',
	'title' => 'Fullscreen Metabox',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Add Images','mthemelocal'),
			'id' => MTHEME . '_image_attachments',
			'std' => 'Upload Images',
			'type' => 'image_gallery',
			'desc' => __('<div class="metabox-note">Add images from Media Uploader or by uploading new images.</div>','mthemelocal')
		),
		array(
			'name' => __('Fullscreen Type','mthemelocal'),
			'id' => MTHEME . '_fullscreen_type',
			'type' => 'image',
			'std' => 'slideshow',
			'class' => 'page_type',
			'desc' => __('Fullscreen page type','mthemelocal'),
			'options' => array(
				'slideshow' => $mtheme_imagepath . 'fullscreen_slideshow.png',
				'photowall' => $mtheme_imagepath . 'fullscreen_photowall.png',
				'kenburns' => $mtheme_imagepath . 'fullscreen_kenburns.png',
				'video' => $mtheme_imagepath . 'fullscreen_video.png')
		),

		array(
			'name' => __('For Kenburns & Static Slideshow Text','mthemelocal'),
			'id' => MTHEME . '_static_title',
			'class'=> 'static_titles',
			'type' => 'text',
			'desc' => __('Static Title','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => '',
			'id' => MTHEME . '_static_description',
			'heading' => 'subhead',
			'class'=> 'static_titles',
			'type' => 'textarea',
			'desc' => __('Static Decription','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => '',
			'id' => MTHEME . '_static_link_text',
			'heading' => 'subhead',
			'class'=> 'static_titles',
			'type' => 'text',
			'desc' => __('Static Button Text','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => '',
			'id' => MTHEME . '_static_url',
			'heading' => 'subhead',
			'class'=> 'static_titles',
			'type' => 'text',
			'desc' => __('Static Button Link','mthemelocal'),
			'std' => ''
		),

		array(
			'name' => __('Slideshow Audio files (optional)','mthemelocal'),
			'id' => MTHEME . '_slideshow_mp3',
			'class'=> 'slideshowaudio',
			'type' => 'text',
			'desc' => __('Enter MP3 file path for Slideshow','mthemelocal'),
			'std' => ''
		),

		array(
			'name' => '',
			'id' => MTHEME . '_slideshow_oga',
			'heading' => 'subhead',
			'class'=> 'slideshowaudio',
			'type' => 'text',
			'desc' => __('Enter OGA file path for Slideshow','mthemelocal'),
			'std' => ''
		),

		array(
			'name' => '',
			'id' => MTHEME . '_slideshow_m4a',
			'heading' => 'subhead',
			'class'=> 'slideshowaudio',
			'type' => 'text',
			'desc' => __('Enter M4A file path for Slideshow','mthemelocal'),
			'std' => ''
		),

		array(
			'name' => __('Vimeo video ID','mthemelocal'),
			'id' => MTHEME . '_vimeovideo',
			'class'=> 'fullscreenvideo',
			'type' => 'text',
			'desc' => __('Enter Vimeo video ID for fullscreen playback','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Youtube video ID','mthemelocal'),
			'id' => MTHEME . '_youtubevideo',
			'class'=> 'fullscreenvideo',
			'type' => 'text',
			'desc' => __('<strong>Add a featured image for iOS autoplay fallback.</strong><br /><br />Youtube IDs<br/>eg: <code>ylLzyHk54Z0</code>. Youtube video IDs can be found at the end of youtube url - <br/>http://www.youtube.com/watch?v=<code>ylLzyHk54Z0</code>','mthemelocal'),
			'std' => ''
		),
	)
);
add_action("admin_init", "mtheme_fullscreenitemmetabox_init");
function mtheme_fullscreenitemmetabox_init(){
    add_meta_box("mtheme_featured-meta", "Featured Options", "mtheme_featured_options", "mtheme_featured", "normal", "low");
}
/*
* Meta options for Portfolio post type
*/
function mtheme_featured_options(){
	global $mtheme_fullscreen_box, $post;
	mtheme_generate_metaboxes($mtheme_fullscreen_box,$post);
}
?>