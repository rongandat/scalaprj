<?php
//$prefix = 'fables_';

/*
$post_meta_box = array(
	'id' => 'my-post-meta-box',
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
global $mtheme_video_meta_box,
$mtheme_link_meta_box,
$mtheme_image_meta_box,
$mtheme_quote_meta_box,
$mtheme_gallery_meta_box,
$mtheme_audio_meta_box,
$mtheme_common_meta_box,
$mtheme_active_metabox;

$mtheme_active_metabox="post";
$mtheme_sidebar_options = mtheme_generate_sidebarlist("post");

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
}
if (! $options_bgslideshow ) $options_bgslideshow[0]="Featured pages not found.";

$mtheme_imagepath =  get_template_directory_uri() . '/framework/options/images/';

$mtheme_common_meta_box = array(
	'id' => 'common-meta-box',
	'title' => 'General Metabox',
	'page' => 'post',
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
			'name' => __('Post Style','mthemelocal'),
			'id' => MTHEME . '_pagestyle',
			'std' => 'rightsidebar',
			'type' => 'image',
			'desc' => __('<strong>With Sidebar :</strong> Displays post with sidebar - two columns</br><strong>Fullwidth without sidebar :</strong> Displays post as without sidebar','mthemelocal'),
			'options' => array(
				'rightsidebar' => $mtheme_imagepath . 'right_sidebar.png',
				'leftsidebar' => $mtheme_imagepath . 'left_sidebar.png',
				'nosidebar' => $mtheme_imagepath . 'no_sidebar.png')
		),
		array(
			'name' => 'Choice of Sidebar',
			'id' => MTHEME . '_sidebar_choice',
			'type' => 'select',
			'desc' => 'For Sidebar Active Pages and Posts',
			'options' => $mtheme_sidebar_options
		)
	)
);

$mtheme_video_meta_box = array(
	'id' => 'video-meta-box',
	'title' => ' Video Metabox',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('HTML5 Video','mthemelocal'),
			'id' => MTHEME . '_video_meta_section1_id',
			'type' => 'break',
			'sectiontitle' => __('HTML5 Video','mthemelocal'),
			'std' => ''
		),
		array(
			'name' => __('Video Title','mthemelocal'),
			'id' => MTHEME . '_video_title',
			'type' => 'text',
			'std' => '',
			'desc' => __('Title for Video','mthemelocal')
		),
		array(
			'name' => __('M4V File URL','mthemelocal'),
			'id' => MTHEME . '_video_m4v_file',
			'type' => 'text',
			'std' => '',
			'desc' => __('Enter M4V File URL ( Required )','mthemelocal')
		),
		array(
			'name' => __('OGV File URL','mthemelocal'),
			'id' => MTHEME . '_video_ogv_file',
			'type' => 'text',
			'std' => '',
			'desc' => __('Enter OGV File URL','mthemelocal')
		),
		array(
			'name' => __('Poster Image','mthemelocal'),
			'id' => MTHEME . '_video_poster_file',
			'type' => 'upload',
			'target' => 'image',
			'std' => '',
			'desc' => __('Poster Image','mthemelocal')
		),
		array(
			'name' => __('Video Hosts','mthemelocal'),
			'id' => MTHEME . '_video_meta_section2_id',
			'type' => 'break',
			'std' => '',
			'sectiontitle' => __('Video Hosts','mthemelocal')
		),
		array(
			'name' => __('Youtube Video ID','mthemelocal'),
			'id' => MTHEME . '_video_youtube_id',
			'type' => 'text',
			'std' => '',
			'desc' => __('Youtube video ID','mthemelocal')
		),
		array(
			'name' => __('Vimeo Video ID','mthemelocal'),
			'id' => MTHEME . '_video_vimeo_id',
			'type' => 'text',
			'std' => '',
			'desc' => __('Vimeo video ID','mthemelocal')
		),
		array(
			'name' => __('Daily Motion Video ID','mthemelocal'),
			'id' => MTHEME . '_video_dailymotion_id',
			'type' => 'text',
			'std' => '',
			'desc' => __('Daily Motion video ID','mthemelocal')
		),
		array(
			'name' => __('Google Video ID','mthemelocal'),
			'id' => MTHEME . '_video_google_id',
			'type' => 'text',
			'std' => '',
			'desc' => __('Google video ID','mthemelocal')
		),
		array(
			'name' => __('Video Embed Code','mthemelocal'),
			'id' => MTHEME . '_video_embed_code',
			'type' => 'textarea',
			'std' => '',
			'desc' => __('Video Embed code. You can grab embed codes from hosted video sites.','mthemelocal')
		)
	)
);

$mtheme_audio_meta_box = array(
	'id' => 'audio-meta-box',
	'title' => 'Audio Metabox',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('MP3 file','mthemelocal'),
			'id' => MTHEME . '_meta_audio_mp3',
			'type' => 'text',
			'std' => '',
			'desc' => __('Please provide full url. eg. <code>http://www.domain.com/path/audiofile.mp3</code>','mthemelocal')
		),
		array(
			'name' => __('M4A file','mthemelocal'),
			'id' => MTHEME . '_meta_audio_m4a',
			'type' => 'text',
			'std' => '',
			'desc' => __('Please provide full url. eg. <code>http://www.domain.com/path/audiofile.m4a</code>','mthemelocal')
		),
		array(
			'name' => __('OGA file','mthemelocal'),
			'id' => MTHEME . '_meta_audio_ogg',
			'type' => 'text',
			'std' => '',
			'desc' => __('Please provide full url. eg. <code>http://www.domain.com/path/audiofile.ogg</code>','mthemelocal')
		)
	)
);

$mtheme_link_meta_box = array(
	'id' => 'link-meta-box',
	'title' => 'Link Metabox',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Link URL','mthemelocal'),
			'id' => MTHEME . '_meta_link',
			'type' => 'text',
			'std' => '',
			'desc' => __('Please provide full url. eg. <code>http://www.domain.com/path/</code>','mthemelocal')
		)
	)
);

$mtheme_image_meta_box = array(
	'id' => 'image-meta-box',
	'title' => 'Image Metabox',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Enable Lightbox','mthemelocal'),
			'id' => MTHEME . '_meta_lightbox',
			'type' => 'select',
			'options' => array('Enable Lightbox', 'Disable Lighbox')
		)
	)
);

$mtheme_quote_meta_box = array(
	'id' => 'quote-meta-box',
	'title' => 'Quote Metabox',
	'page' => 'post',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => __('Quote','mthemelocal'),
			'id' => MTHEME . '_meta_quote',
			'type' => 'textarea',
			'std' => '',
			'desc' => __('Enter quote here','mthemelocal')
		),
		array(
			'name' => __('Author','mthemelocal'),
			'id' => MTHEME . '_meta_quote_author',
			'type' => 'text',
			'std' => '',
			'desc' => __('Author','mthemelocal')
		)
	)
);

add_action('admin_init', 'mtheme_add_boxes');

// Add meta box
function mtheme_add_boxes() {
	global $mtheme_video_meta_box,$mtheme_link_meta_box,$mtheme_image_meta_box,$mtheme_quote_meta_box,$mtheme_audio_meta_box,$mtheme_common_meta_box;
	add_meta_box($mtheme_common_meta_box['id'], $mtheme_common_meta_box['title'], 'mtheme_common_show_box', $mtheme_common_meta_box['page'], $mtheme_common_meta_box['context'], $mtheme_common_meta_box['priority']);
	add_meta_box($mtheme_video_meta_box['id'], $mtheme_video_meta_box['title'], 'mtheme_video_show_box', $mtheme_video_meta_box['page'], $mtheme_video_meta_box['context'], $mtheme_video_meta_box['priority']);
	add_meta_box($mtheme_link_meta_box['id'], $mtheme_link_meta_box['title'], 'mtheme_link_show_box', $mtheme_link_meta_box['page'], $mtheme_link_meta_box['context'], $mtheme_link_meta_box['priority']);
	add_meta_box($mtheme_image_meta_box['id'], $mtheme_image_meta_box['title'], 'mtheme_image_show_box', $mtheme_image_meta_box['page'], $mtheme_image_meta_box['context'], $mtheme_image_meta_box['priority']);
	add_meta_box($mtheme_quote_meta_box['id'], $mtheme_quote_meta_box['title'], 'mtheme_quote_show_box', $mtheme_quote_meta_box['page'], $mtheme_quote_meta_box['context'], $mtheme_quote_meta_box['priority']);
	add_meta_box($mtheme_audio_meta_box['id'], $mtheme_audio_meta_box['title'], 'mtheme_audio_show_box', $mtheme_audio_meta_box['page'], $mtheme_audio_meta_box['context'], $mtheme_audio_meta_box['priority']);
}

// Callback function to show fields in meta box
function mtheme_video_show_box() {
	global $mtheme_video_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_video_meta_box,$post);
}

function mtheme_audio_show_box() {
	global $mtheme_audio_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_audio_meta_box,$post);
}

function mtheme_common_show_box() {
	global $mtheme_common_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_common_meta_box,$post);
}

function mtheme_link_show_box() {
	global $mtheme_link_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_link_meta_box,$post);
}

function mtheme_image_show_box() {
	global $mtheme_image_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_image_meta_box,$post);
}

function mtheme_quote_show_box() {
	global $mtheme_quote_meta_box, $post;
	mtheme_generate_metaboxes($mtheme_quote_meta_box,$post);
}

?>