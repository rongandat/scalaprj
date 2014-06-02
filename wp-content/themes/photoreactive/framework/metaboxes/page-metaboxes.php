<?php
//$prefix = 'fables_';

/*
$meta_box = array(
	'id' => 'my-meta-box',
	'title' => 'Custom meta box',
	'page' => 'page',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => 'Text box',
			'desc' => 'Enter something here',
			'id' => $prefix . 'text',
			'type' => 'text',
			'std' => 'Default value 1'
		),
		array(
			'name' => 'Textarea',
			'desc' => 'Enter big text here',
			'id' => $prefix . 'textarea',
			'type' => 'textarea',
			'std' => 'Default value 2'
		),
		array(
			'name' => 'Select box',
			'id' => $prefix . 'select',
			'type' => 'select',
			'options' => array('Option 1', 'Option 2', 'Option 3')
		),
		array(
			'name' => 'Select box category',
			'id' => $prefix . 'select',
			'desc' => 'Enter big text here',
			'type' => 'select',
			'options' => mtheme_get_select_target_options('portfolio_category')
		),
		array(
			'name' => 'Radio',
			'id' => $prefix . 'radio',
			'desc' => 'Enter big text here',
			'type' => 'radio',
			'options' => array(
				array('name' => 'Name 1', 'value' => 'Value 1'),
				array('name' => 'Name 2', 'value' => 'Value 2')
			)
		)
	)
);
*/

global $mtheme_meta_box,$mtheme_common_page_box,$mtheme_active_metabox;

$mtheme_active_metabox="page";
$mtheme_sidebar_options = mtheme_generate_sidebarlist("page");

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

$mtheme_common_page_box = array(
	'id' => 'common-pagemeta-box',
	'title' => 'General Page Metabox',
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
			'name' => __('Page Style','mthemelocal'),
			'id' => MTHEME . '_pagestyle',
			'type' => 'image',
			'std' => 'rightsidebar',
			'desc' => __('<strong>With Sidebar :</strong> Displays post with sidebar - two columns</br><strong>Fullwidth without sidebar :</strong> Displays post as without sidebar','mthemelocal'),
			'options' => array(
				'rightsidebar' => $mtheme_imagepath . 'right_sidebar.png',
				'leftsidebar' => $mtheme_imagepath . 'left_sidebar.png',
				'nosidebar' => $mtheme_imagepath . 'no_sidebar.png')
		),
		array(
			'name' => __('Choice of Sidebar','mthemelocal'),
			'id' => MTHEME . '_sidebar_choice',
			'type' => 'select',
			'desc' => __('For Sidebar Active Pages and Posts','mthemelocal'),
			'options' => $mtheme_sidebar_options
		)
	)
);

// Add meta box
function mtheme_add_box() {
	global $mtheme_meta_box,$mtheme_common_page_box;
	add_meta_box($mtheme_common_page_box['id'], $mtheme_common_page_box['title'], 'mtheme_common_show_pagebox', $mtheme_common_page_box['page'], $mtheme_common_page_box['context'], $mtheme_common_page_box['priority']);
}

function mtheme_common_show_pagebox() {
	global $mtheme_common_page_box, $post;
	mtheme_generate_metaboxes($mtheme_common_page_box,$post);
}
?>