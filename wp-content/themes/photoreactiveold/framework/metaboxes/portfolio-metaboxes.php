<?php
global $mtheme_meta_box,$mtheme_portfolio_box,$mtheme_active_metabox;

$mtheme_active_metabox="portfolio";
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

$mtheme_portfolio_box = array(
	'id' => 'portfoliometa-box',
	'title' => 'Portfolio Metabox',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Attach Images','mthemelocal'),
			'id' => MTHEME . '_image_attachments',
			'std' => __('Upload Images','mthemelocal'),
			'type' => 'image_gallery',
			'desc' => __('<div class="metabox-note">Attach images to this page/post.</div>','mthemelocal')
		),
		array(
			'name' =>  __('Background Slideshow / Image from','mthemelocal'),
			'id' => MTHEME . '_meta_background_choice',
			'type' => 'select',
			'target' => 'backgroundslideshow_choices',
			'desc' => __('<div class="metabox-note">
			<strong>Static Image from Theme options</strong> <em>Satic image set from theme options as background</em></br>
			<strong>Slideshow from Theme options:</strong> <em>Slideshow chosen from theme options as background</em></br>
			<strong>Slideshow from post/page image attachments:</strong> <em>Slideshow from images attached to this post/page</em></br>
			<strong>Static image using post/page featured image:</strong> <em>Static image from featured image of this post/page</em></br>
			<strong>Slideshow from a fullscreen post:</strong> <em>Slideshow from a fullscreen post - choose from next selector.</em></br>
			<strong>Static image using custom background image:</strong> <em>Static image from custom background image url listed below</em></br>
			</div>
			','mthemelocal'),
			'options' => mtheme_get_select_target_options('backgroundslideshow_choices')
		),
		array(
			'name' => __('Background Slideshow from a fullscreen post','mthemelocal'),
			'id' => MTHEME . '_slideshow_bgfullscreenpost',
			'type' => 'select',
			'target' => 'fullscreen_slideshow_posts',
			'desc' => __('<div class="metabox-note"><strong>Note :</strong>If selected, your choice of fullscreen slideshow post is used to create the  page background slideshow</div>','mthemelocal'),
			'options' => mtheme_get_select_target_options('fullscreen_slideshow_posts')
		),
		array(
			'name' => __('Custom background image URL','mthemelocal'),
			'id' => MTHEME . '_meta_background_url',
			'type' => 'upload',
			'target' => 'image',
			'std' => '',
			'desc' => __('<div class="metabox-note">Upload or provide full url of background. eg. <code>http://www.domain.com/path/image.jpg</code></div>','mthemelocal')
		),
		array(
			'name' => __('Header image','mthemelocal'),
			'id' => MTHEME . '_header_image',
			'type' => 'upload',
			'target' => 'image',
			'std' => '',
			'desc' => __('<div class="metabox-note">Upload or provide full url of header image. eg. <code>http://www.domain.com/path/image.jpg</code></div>','mthemelocal')
		),
		array(
			'name' => __('Page Style','mthemelocal'),
			'id' => MTHEME . '_pagestyle',
			'type' => 'image',
			'std' => 'rightsidebar',
			'triggerStatus'=> 'on',
			'toggleClass' => '.sidebar_choice',
			'toggleAction' => 'hide',
			'toggleTrigger' => 'nosidebar',
			'class' => 'page_style',
			'desc' => __('<strong>Column:</strong> Displays column based portfolio.</br><strong>Fullwidth:</strong> Displays fullwidth portfolio.','mthemelocal'),
			'options' => array(
				'column' => $mtheme_imagepath . 'portfolio_column.png',
				'fullwidth' => $mtheme_imagepath . 'portfolio_fullwidth.png',
				'rightsidebar' => $mtheme_imagepath . 'right_sidebar.png',
				'leftsidebar' => $mtheme_imagepath . 'left_sidebar.png')
		),
		array(
			'name' => __('Choice of Sidebar','mthemelocal'),
			'id' => MTHEME . '_sidebar_choice',
			'class' => 'sidebar_choice',
			'type' => 'select',
			'desc' => __('For Sidebar Active Pages and Posts','mthemelocal'),
			'options' => $mtheme_sidebar_options
		),
		array(
			'name' => __('Portfolio Post Header','mthemelocal'),
			'id' => MTHEME . '_portfoliotype',
			'std' => 'Image',
			'type' => 'image',
			'triggerStatus'=> 'on',
			'toggleClass' => '.videoembed',
			'toggleAction' => 'show',
			'toggleTrigger' => 'Video',
			'class'=>'portfolio_header',
			'desc' => __('Select type of Portfolio header.','mthemelocal'),
			'options' => array(
				'Image' => $mtheme_imagepath . 'portfolio_image.png',
				'Vertical' => $mtheme_imagepath . 'portfolio_vertical.png',
				'Slideshow' => $mtheme_imagepath . 'portfolio_slideshow.png',
				'Video' => $mtheme_imagepath . 'portfolio_video.png',
				'None' => $mtheme_imagepath . 'portfolio_none.png'
				)
		),
		array(
			'name' => __('Video Embed Code for Header','mthemelocal'),
			'id' => MTHEME . '_video_embed',
			'heading' => 'subhead',
			'class'=> 'videoembed',
			'type' => 'textarea',
			'desc' => __('Video Embed code for Portfolio Header.','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Gallery thumbnails link to','mthemelocal'),
			'id' => MTHEME . '_thumbnail_linktype',
			'type' => 'image',
			'std' => 'Lightbox',
			'triggerStatus'=> 'on',
			'toggleClass' => '.portfoliolinktype',
			'toggleAction' => 'hide',
			'toggleTrigger' => 'meta_thumbnail_direct',
			'class'=>'thumbnail_linktype',
			'desc' => __('Link type of portfolio image in portfolio galleries.','mthemelocal'),
			'options' => array(
				'Lightbox' => $mtheme_imagepath . 'thumb_lightbox.png',
				'Customlink' => $mtheme_imagepath . 'thumb_customlink.png',
				'DirectURL' => $mtheme_imagepath . 'thumb_directlink.png'
				)
		),
		array(
			'name' => __('Fill for Lightbox Video','mthemelocal'),
			'id' => MTHEME . '_lightbox_video',
			'heading' => 'subhead',
			'class'=> 'portfoliolinktype',
			'type' => 'text',
			'desc' => __('To display a Lightbox Video.<br/>Eg.<br/>http://www.youtube.com/watch?v=D78TYCEG4<br/>http://vimeo.com/172881<br/>http://www.adobe.com/products/flashplayer/include/marquee/design.swf?width=792&height=294','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Fill for Custom Link','mthemelocal'),
			'id' => MTHEME . '_customlink',
			'heading' => 'subhead',
			'class'=> 'portfoliolinktype',
			'type' => 'text',
			'desc' => __('For any link. URL followed with <code>http://</code>','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Description below Thumbnail ( Portfolio Gallery )','mthemelocal'),
			'id' => MTHEME . '_thumbnail_desc',
			'type' => 'textarea',
			'desc' => __('This description is displayed below each thumbnail.','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Description for AJAX Preview','mthemelocal'),
			'id' => MTHEME . '_ajax_description',
			'type' => 'textarea',
			'desc' => __('Ajax item description. Leave empty to use gallery item description instead.','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Skills Required','mthemelocal'),
			'id' => MTHEME . '_skills_required',
			'type' => 'text',
			'desc' => __('Comma seperated skills sets. eg. PHP,HTML,CSS,Illustrator,Photoshop','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Client Name (optional)','mthemelocal'),
			'id' => MTHEME . '_clientname',
			'type' => 'text',
			'desc' => __('Name of Client','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Client Link (optional)','mthemelocal'),
			'id' => MTHEME . '_clientname_link',
			'type' => 'text',
			'desc' => __('URL of Client','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Project Link (optional)','mthemelocal'),
			'id' => MTHEME . '_projectlink',
			'type' => 'text',
			'desc' => __('Project link. URL followed with <code>http://</code>','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Custom Thumbnail. (optional)','mthemelocal'),
			'id' => MTHEME . '_customthumbnail',
			'type' => 'upload',
			'target' => 'image',
			'desc' => __('Thumbnail URL. URL followed with <code>http://</code>','mthemelocal'),
			'std' => ''
		),
	)
);
add_action("admin_init", "mtheme_portfolioitemmetabox_init");
function mtheme_portfolioitemmetabox_init(){
	add_meta_box("mtheme_portfolioInfo-meta", "Portfolio Options", "mtheme_portfolioitem_metaoptions", "mtheme_portfolio", "normal", "low");
}
/*
* Meta options for Portfolio post type
*/
function mtheme_portfolioitem_metaoptions(){
	global $mtheme_portfolio_box, $post;
	mtheme_generate_metaboxes($mtheme_portfolio_box,$post);
}
?>