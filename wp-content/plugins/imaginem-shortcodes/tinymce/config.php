<?php
// Pull all the Portfolio Categories into an array
$the_list = get_categories('taxonomy=types&title_li=');
if ($the_list) {
	$portfolio_categories=array();
	$portfolio_categories['-1']="All the items";
	foreach($the_list as $key => $list) {
		$portfolio_categories[$list->slug] = $list->name;
	}
} else {
	$portfolio_categories['none']="Portfolio Categories not found.";
}

// Pull all the categories into an array
$options_categories = array(); 
$options_categories['']="All Categories";
$options_categories_obj = get_categories();
foreach ($options_categories_obj as $category) {
	$options_categories[$category->slug] = $category->cat_name;
}

// Pull all the blog category slugs into an array
$blog_cat_slugs = array();
$blog_cat_slugs_obj = get_categories();
if ($blog_cat_slugs_obj) {
	foreach ($blog_cat_slugs_obj as $category) {
		$blog_cat_slugs[$category->slug] = $category->slug;
	}
} else {
	$blog_cat_slugs[0]="Blog Categories not found.";
}

// Pull all the Portfolio Categories into an array
$the_list = get_categories('taxonomy=types&title_li=');
if ($the_list) {
	$portfolio_categories=array();
	//$portfolio_categories[0]="All the items";
	foreach($the_list as $key => $list) {
		$portfolio_categories[$list->slug] = $list->name;
	}
} else {
	$portfolio_categories[0]="Portfolio Categories not found.";
}

// Fontawesome icons list
$pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
$fontawesome_file = mtheme_TINYMCE_DIR . '/css/font-awesome/css/font-awesome.css';

@$fontawesome_contents = file_get_contents($fontawesome_file);

preg_match_all($pattern, $fontawesome_contents, $matches, PREG_SET_ORDER);
$fontawesome_icons = array();
foreach($matches as $match){
	$fontawesome_icons[$match[1]] = $match[2];
}

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Gen
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['shortcode-generator'] = array(
	'no_preview' => true,
	'params' => array(),
	'shortcode' => '',
	'popup_title' => '',
	'shortcode_desc' => ''
);

/*-----------------------------------------------------------------------------------*/
/*	Social Links
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['socials'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add a Social link', 'mthemelocal'),
	'params' => array(
        'social_icon' => array(
            'std' => '',
            'type' => 'fontawesome-iconpicker',
            'label' => __('Font Awesome icon', 'mthemelocal'),
            'desc' => __('Select a fontawesome icon', 'mthemelocal'),
            'options' => $fontawesome_icons
        ),
		'align' => array(
			'type' => 'select',
			'label' => __('Align', 'mthemelocal'),
			'desc' => __('Align', 'mthemelocal'),
			'options' => array(
				'left' => 'left',
				'right' => 'right'
			)
		),
		'social_color' => array(
			'std' => '#EC3939',
			'type' => 'color',
			'label' => __('Social icon color', 'mthemelocal'),
			'desc' => __('Social icon color', 'mthemelocal'),
		),
        'social_link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Social link', 'mthemelocal'),
            'desc' => __('Social link', 'mthemelocal'),
        ),
        'social_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Social hover text', 'mthemelocal'),
            'desc' => __('Social hover text', 'mthemelocal'),
        )
	),
	'shortcode' => '[socials align="{{align}}" social_color="{{social_color}}" social_icon="{{social_icon}}" social_link="{{social_link}}" social_text="{{social_text}}"]',
	'popup_title' => __('Add a Social link', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Clients
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['clients'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add client logos', 'mthemelocal'),
    'shortcode' => '[clients column="{{column}}" ] {{child_shortcode}} <br/>[/clients]',
    'popup_title' => __('Generate Clients Shortcode', 'mthemelocal'),
 	'params' => array(
		'column' => array(
			'type' => 'select',
			'label' => __('Clients Columns', 'mthemelocal'),
			'desc' => __('Select number of columns for client boxes. Add matching number of Client Items. You can add as many as you need.', 'mthemelocal'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			)
		)
		
	),
    'child_shortcode' => array(
        'params' => array(
            'logo' => array(
                'std' => '',
                'type' => 'uploader',
                'label' => __('Add image', 'mthemelocal'),
                'desc' => __('Upload a logo', 'mthemelocal'),
            ),
            'hovertitle' => array(
                'std' => 'Client Name',
                'type' => 'text',
                'label' => __('Client Name', 'mthemelocal'),
                'desc' => __('Client Name', 'mthemelocal'),
            ),
            'link' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Link', 'mthemelocal'),
                'desc' => __('Link to title', 'mthemelocal'),
            )
        ),
        'shortcode' => '<br/> [client logo="{{logo}}" hovertitle="{{hovertitle}}" link="{{link}}"]',
        'clone_button' => __('+ Add another Client', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Google Maps
/*-----------------------------------------------------------------------------------*/
$mtheme_shortcodes['map'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add Google Maps', 'mthemelocal'),
	'params' => array(
		'map_type' => array(
			'type' => 'select',
			'label' => __('Map Type', 'mthemelocal'),
			'desc' => __('Map Type', 'mthemelocal'),
			'options' => array(
				'ROADMAP' => 'roadmap',
				'SATELLITE' => 'satellite',
				'HYBRID' => 'hybrid',
				'TERRAIN' => 'terrain',
			)
		),
        'map_address' => array(
            'std' => 'Tokyo, Japan',
            'type' => 'text',
            'label' => __('Map Address', 'mthemelocal'),
            'desc' => __('Map Address', 'mthemelocal'),
        ),
        'map_width' => array(
            'std' => '1000',
            'type' => 'text',
            'label' => __('Map Width', 'mthemelocal'),
            'desc' => __('Map Width', 'mthemelocal'),
        ),
        'map_height' => array(
            'std' => '400',
            'type' => 'text',
            'label' => __('Map Height', 'mthemelocal'),
            'desc' => __('Map Height', 'mthemelocal'),
        ),
        'map_latitude' => array(
            'std' => '0',
            'type' => 'text',
            'label' => __('Map Latitude', 'mthemelocal'),
            'desc' => __('Set 0 if you want to don\'t want to use the field. Map Latitude', 'mthemelocal'),
        ),
        'map_longitude' => array(
            'std' => '0',
            'type' => 'text',
            'label' => __('Map Longitude', 'mthemelocal'),
            'desc' => __('Set 0 if you want to don\'t want to use the field. Map Longitude', 'mthemelocal'),
        ),
		'map_marker' => array(
			'type' => 'select',
			'label' => __('Map Marker', 'mthemelocal'),
			'desc' => __('Map Marker', 'mthemelocal'),
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
        'map_zoom' => array(
            'std' => '18',
            'type' => 'text',
            'label' => __('Map Zoom (1 to 20)', 'mthemelocal'),
            'desc' => __('Map Height', 'mthemelocal'),
        ),
		'map_scroll' => array(
			'type' => 'select',
			'label' => __('Mouse Scroll', 'mthemelocal'),
			'desc' => __('Mouse Scroll', 'mthemelocal'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
		'map_control' => array(
			'type' => 'select',
			'label' => __('Map Controls', 'mthemelocal'),
			'desc' => __('Map Controls', 'mthemelocal'),
			'options' => array(
				'true' => 'True',
				'false' => 'False'
			)
		),
        'map_marker_image' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Image as marker', 'mthemelocal'),
            'desc' => __('Image as marker', 'mthemelocal'),
        ),
        'map_marker_text' => array(
            'std' => 'Marker Text',
            'type' => 'text',
            'label' => __('Marker text', 'mthemelocal'),
            'desc' => __('Marker text', 'mthemelocal'),
        )
	),
	'shortcode' => '[map maptype="{{map_type}}" scrollwheel="{{map_scroll}}" markerimage="{{map_marker_image}}" infowindow="{{map_marker_text}}" lat="{{map_latitude}}" lon="{{map_longitude}}" hidecontrols="{{map_control}}" marker="{{map_marker}}" z="{{map_zoom}}" h="{{map_height}}" w="{{map_width}}" address="{{map_address}}"]',
	'popup_title' => __('Add Google Maps', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Slideshow
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['recent_portfolio_slideshow'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add a slideshow of portfolio items', 'mthemelocal'),
	'params' => array(
        'limit' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Limit posts', 'mthemelocal'),
            'desc' => __('Limit the number of posts', 'mthemelocal'),
        ),
		'worktype_slugs' => array(
			'type' => 'multilist',
			'std' => '',
			'label' => __('Enter Work type slugs to list', 'mthemelocal'),
			'desc' => __('Leave blank to list all. Enter comma seperated work type categories. eg. artwork,photography,prints ', 'mthemelocal'),
			'options' => $portfolio_categories
		),
		'transition' => array(
			'type' => 'select',
			'label' => __('Slideshow transition', 'mthemelocal'),
			'desc' => __('Slideshow transition', 'mthemelocal'),
			'options' => array(
				'fade' => 'fade',
				'slide' => 'slide'
			)
		)
	),
	'shortcode' => '[recent_portfolio_slideshow limit="{{limit}}" worktype_slugs="{{worktype_slugs}}" transition="{{transition}}"]',
	'popup_title' => __('Add a slideshow of portfolio items', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Recent Blog Slideshow
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['recent_blog_slideshow'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add a slideshow of blog posts', 'mthemelocal'),
	'params' => array(
        'limit' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Limit posts', 'mthemelocal'),
            'desc' => __('Limit the number of posts', 'mthemelocal'),
        ),
		'cat_slugs' => array(
			'type' => 'multilist',
			'std' => '',
			'label' => __('Enter category slugs to list', 'mthemelocal'),
			'desc' => __('Leave blank to list all. Enter comma seperated blog categories. eg. artwork,photography,prints ', 'mthemelocal'),
			'options' => $blog_cat_slugs
		),
		'transition' => array(
			'type' => 'select',
			'label' => __('Slideshow transition', 'mthemelocal'),
			'desc' => __('Slideshow transition', 'mthemelocal'),
			'options' => array(
				'fade' => 'fade',
				'slide' => 'slide'
			)
		)
	),
	'shortcode' => '[recent_blog_slideshow limit="{{limit}}" cat_slugs="{{cat_slugs}}" transition="{{transition}}"]',
	'popup_title' => __('Add a slideshow of blog posts', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Slideshow Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['flexislideshow'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add flexiSlideshow', 'mthemelocal'),
	'params' => array(
        'pageid' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Populate images from page ID', 'mthemelocal'),
            'desc' => __('Leave blank for current page. Enter a page ID to populate images from another page.', 'mthemelocal'),
        ),
		'slideshowtitle' => array(
			'type' => 'select',
			'label' => __('Display title', 'mthemelocal'),
			'desc' => __('Display title from image title field', 'mthemelocal'),
			'options' => array(
				'true' => 'true',
				'false' => 'false'
			)
		),
		'lightbox' => array(
			'type' => 'select',
			'label' => __('Activate lightboxes', 'mthemelocal'),
			'desc' => __('Acitvate lightbox for images', 'mthemelocal'),
			'options' => array(
				'true' => 'true',
				'false' => 'false'
			)
		),
		'lightboxtitle' => array(
			'type' => 'select',
			'label' => __('Display lightbox title', 'mthemelocal'),
			'desc' => __('Display lightbox title from image title field', 'mthemelocal'),
			'options' => array(
				'true' => 'true',
				'false' => 'false'
			)
		),
		'transition' => array(
			'type' => 'select',
			'label' => __('Slideshow transition', 'mthemelocal'),
			'desc' => __('Slideshow transition', 'mthemelocal'),
			'options' => array(
				'fade' => 'fade',
				'slide' => 'slide'
			)
		)
	),
	'shortcode' => '[flexislideshow pageid="{{pageid}}" slideshowtitle="{{slideshowtitle}}" lightbox="{{lightbox}}" lightboxtitle="{{lightboxtitle}}" transition="{{transition}}"]',
	'popup_title' => __('Add FlexSlideshow', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Audio Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['audioplayer'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add HTML5 Audio Player', 'mthemelocal'),
	'params' => array(
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title of Audio', 'mthemelocal'),
            'desc' => __('Title of Audio', 'mthemelocal'),
        ),
        'mp3' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('MP3 url. File path', 'mthemelocal'),
            'desc' => __('MP3 url. File path', 'mthemelocal'),
        ),
        'm4a' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('M4A url. File path', 'mthemelocal'),
            'desc' => __('M4A url. File path', 'mthemelocal'),
        ),
        'oga' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('OGA url. File path', 'mthemelocal'),
            'desc' => __('OGA url. File path', 'mthemelocal'),
        )
	),
	'shortcode' => '[audioplayer mp3="{{mp3}}" m4a="{{m4a}}" oga="{{oga}}" title="{{title}}"]',
	'popup_title' => __('Insert Audio Player', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Call Out
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['callout'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Callout box.', 'mthemelocal'),
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Box Style', 'mthemelocal'),
			'desc' => __('Box Style', 'mthemelocal'),
			'options' => array(
				'default' => 'default',
				'double' => 'double',
				'line-right' => 'right',
				'line-left' => 'left',
				'line-top' => 'top',
				'line-bottom' => 'bottom'
			)
		),
        'title' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Title', 'mthemelocal'),
            'desc' => __('Title for Callout box', 'mthemelocal'),
        ),
        'content' => array(
            'std' => '',
            'type' => 'textarea',
            'label' => __('Text for Callout', 'mthemelocal'),
            'desc' => __('Text for Callout', 'mthemelocal'),
        ),
		'button_type' => array(
			'type' => 'select',
			'label' => __('Button Style', 'mthemelocal'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'mthemelocal'),
			'options' => array(
				'gray' => 'Gray',
				'black' => 'Black',
				'green' => 'Green',
				'blue' => 'Blue',
				'red' => 'Red',
				'orange' => 'Orange',
				'purple' => 'Purple'
			)
		),
        'button_text' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Text', 'mthemelocal'),
            'desc' => __('Button Text', 'mthemelocal'),
        ),
        'button_link' => array(
            'std' => '',
            'type' => 'text',
            'label' => __('Button Link', 'mthemelocal'),
            'desc' => __('Button Link', 'mthemelocal'),
        ),
	),
	'shortcode' => '[callout type="{{style}}" title="{{title}}" description="{{content}}" button="true" button_type="{{button_type}}" button_text="{{button_text}}" button_link="{{button_link}}"]',
	'popup_title' => __('Insert Callout Box', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Dividers
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['divider'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Display Dividers. Blanks and minimal decorations.', 'mthemelocal'),
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Choose Divider', 'mthemelocal'),
			'desc' => __('Choose Divider', 'mthemelocal'),
			'options' => array(
				'blank' => 'blank',
				'line' => 'line',
				'double' => 'double',
				'stripes' => 'stripes',
				'thinfade' => 'thinfade',
				'threelines' => 'threelines',
				'circleline' => 'circleline',
				'stripedcenter' => 'stripedcenter',
				'linedcenter' => 'linedcenter'
			)
		),
        'top' => array(
            'std' => '10',
            'type' => 'text',
            'label' => __('Top Space in pixels', 'mthemelocal'),
            'desc' => __('Top Spacing', 'mthemelocal'),
        ),
        'bottom' => array(
            'std' => '10',
            'type' => 'text',
            'label' => __('Bottom Space pixels', 'mthemelocal'),
            'desc' => __('Bottom Spacing', 'mthemelocal'),
        )
	),
	'shortcode' => '[divider top="{{top}}" bottom="{{bottom}}" style="{{style}}"]',
	'popup_title' => __('Insert Divider', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Heading
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['heading'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Display Section Headings', 'mthemelocal'),
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Section Heading text', 'mthemelocal'),
			'desc' => __('Section Heading text', 'mthemelocal'),
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Heading size', 'mthemelocal'),
			'desc' => __('Heading size', 'mthemelocal'),
			'options' => array(
				'1' => 'h1',
				'2' => 'h2',
				'3' => 'h3',
				'4' => 'h4',
				'5' => 'h5',
				'6' => 'h6'
			)
		),
        'top' => array(
            'std' => '10',
            'type' => 'text',
            'label' => __('Top Space in pixels', 'mthemelocal'),
            'desc' => __('Top Spacing', 'mthemelocal'),
        ),
        'bottom' => array(
            'std' => '10',
            'type' => 'text',
            'label' => __('Bottom Space pixels', 'mthemelocal'),
            'desc' => __('Bottom Spacing', 'mthemelocal'),
        )
	),
	'shortcode' => '[heading top="{{top}}" bottom="{{bottom}}" size="{{size}}"]{{content}}[/heading]',
	'popup_title' => __('Insert Section Heading', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Pullquote
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['pullquote'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Display Pullquotes', 'mthemelocal'),
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Pullquote text', 'mthemelocal'),
			'desc' => __('Pullquote text', 'mthemelocal'),
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Alignment', 'mthemelocal'),
			'desc' => __('Alignment', 'mthemelocal'),
			'options' => array(
				'left' => 'left',
				'right' => 'right',
				'center' => 'center'
			)
		)
		
	),
	'shortcode' => '[pullquote align="{{align}}"]{{content}}[/pullquote]',
	'popup_title' => __('Insert Pullquote', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Highlight Text
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['highlight'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Highlight texts', 'mthemelocal'),
	'params' => array(
		'content' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Text to hightlight', 'mthemelocal'),
			'desc' => __('Text to hightlight', 'mthemelocal'),
		)
		
	),
	'shortcode' => '[highlight]{{content}}[/highlight]',
	'popup_title' => __('Insert Highlighted text', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Drop Caps
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['dropcap'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Display Drop Cap letters', 'mthemelocal'),
	'params' => array(
		'letter' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Drop cap letter', 'mthemelocal'),
			'desc' => __('Drop cap letter', 'mthemelocal'),
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Display style', 'mthemelocal'),
			'desc' => __('Display style', 'mthemelocal'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3'
			)
		)
		
	),
	'shortcode' => '[dropcap type="{{type}}"]{{letter}}[/dropcap]',
	'popup_title' => __('Insert Drop Cap Letter', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Lightbox Image/Video
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['lightbox'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Display lightboxes', 'mthemelocal'),
	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Lightbox image title', 'mthemelocal'),
			'desc' => __('Lightbox image title', 'mthemelocal'),
		),
		'lightbox_url' => array(
			'std' => '',
			'type' => 'uploader',
			'label' => __('Lightbox image', 'mthemelocal'),
			'desc' => __('Lightbox image. You can manually enter a youtube or vimeo video url here for videos.', 'mthemelocal')
		),
		'thumbnail_url' => array(
			'std' => '',
			'type' => 'uploader',
			'label' => __('Thumbnail image', 'mthemelocal'),
			'desc' => __('Thumbnail image', 'mthemelocal')
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Image Alignment', 'mthemelocal'),
			'desc' => __('Alignment of image', 'mthemelocal'),
			'options' => array(
				'left' => 'left',
				'right' => 'right',
				'center' => 'center'
			)
		)
		
	),
	'shortcode' => '[lightbox title="{{title}}" lightbox_url="{{lightbox_url}}" thumbnail_url="{{thumbnail_url}}" align="{{align}}"]',
	'popup_title' => __('Insert Lightbox Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Pricing Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['pricing_table'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add Pricing shortcode. You can configure the shortcode after adding them.', 'mthemelocal'),
    'shortcode' => '[pricing_table columns="{{columns}}"]<br/> {{child_shortcode}}  [/pricing_table]',
    'popup_title' => __('Add Pricing Shortcode', 'mthemelocal'),
 	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Columns', 'mthemelocal'),
			'desc' => __('No. of Pricing Columns', 'mthemelocal'),
			'options' => array(
				'6' => '6',
				'5' => '5',
				'4' => '4',
				'3' => '3',
				'2' => '2',
				'1' => '1'
			)
		)
	),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Column Title', 'mthemelocal'),
                'desc' => __('After generating shortcode you can duplicate the [pricing_row] section to make as many rows as you prefer.', 'mthemelocal'),
            )
        ),
        'shortcode' => '[pricing_column title="{{title}}" featured="false"]<br/>[pricing_price currency="$" price="29.99" duration="monthly"]<br/>[pricing_row type="tick"] Apple [/pricing_row]<br/>[pricing_row type="cross"] Orange [/pricing_row]<br/>[pricing_footer][button link="#" align="center"]Signup[/button][/pricing_footer]<br/>[/pricing_column]<br/>',
        'clone_button' => __('+ Add Another Column', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Portfolio Grid
/*-----------------------------------------------------------------------------------*/
//[portfoliogrid worktype_slugs="" limit="8" pagination="true" columns="4" title="false" desc="true" type="filter"]
$mtheme_shortcodes['portfoliogrid'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('A Grid based list of portfolio items.', 'mthemelocal'),
	'params' => array(
		'worktype_slugs' => array(
			'type' => 'multilist',
			'std' => '',
			'label' => __('Choose Work types to list', 'mthemelocal'),
			'desc' => __('Leave blank to list all. Enter comma seperated work type categories. eg. artwork,photography,prints ', 'mthemelocal'),
			'options' => $portfolio_categories
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Type of Portfolio list', 'mthemelocal'),
			'desc' => __('Type of Portfolio list', 'mthemelocal'),
			'options' => array(
				'no-filter' => 'No Filter',
				'filter' => 'Filterable',
				'ajax' => 'Ajax Filterable',
			)
		),
		'columns' => array(
			'type' => 'select',
			'label' => __('Grid Columns', 'mthemelocal'),
			'desc' => __('No. of Grid Columns', 'mthemelocal'),
			'options' => array(
				'4' => '4',
				'3' => '3',
				'2' => '2',
				'1' => '1'
			)
		),
		'title' => array(
			'type' => 'select',
			'label' => __('Display post title', 'mthemelocal'),
			'desc' => __('Display post title', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'desc' => array(
			'type' => 'select',
			'label' => __('Display Post description', 'mthemelocal'),
			'desc' => __('Display Post description', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'limit' => array(
			'std' => '-1',
			'type' => 'text',
			'label' => __('Limit. -1 for unlimited', 'mthemelocal'),
			'desc' => __('Limit items. -1 for unlimited', 'mthemelocal'),
		),
		'pagination' => array(
			'type' => 'select',
			'label' => __('Generate Pagination', 'mthemelocal'),
			'desc' => __('Generate Pagination', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		)
	),
	'shortcode' => '[portfoliogrid type="{{type}}" columns="{{columns}}" worktype_slugs="{{worktype_slugs}}" title="{{title}}" desc="{{desc}}" pagination="{{pagination}}" limit="{{limit}}"]',
	'popup_title' => __('Insert Portfolio Grid Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Counter Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['counter'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Generate Counters based on percentage', 'mthemelocal'),
	'params' => array(
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Title', 'mthemelocal'),
			'desc' => __('Add the alert\'s text', 'mthemelocal'),
		),
		'percentage' => array(
			'std' => '70',
			'type' => 'text',
			'label' => __('Percentage', 'mthemelocal'),
			'desc' => __('Percentage', 'mthemelocal'),
		),
		'size' => array(
			'std' => '150',
			'type' => 'text',
			'label' => __('Counter Size', 'mthemelocal'),
			'desc' => __('Counter size', 'mthemelocal'),
		),
		'donutwidth' => array(
			'std' => '10',
			'type' => 'text',
			'label' => __('Border Size', 'mthemelocal'),
			'desc' => __('Border size', 'mthemelocal'),
		),
		'textsize' => array(
			'std' => '32',
			'type' => 'text',
			'label' => __('Counter percent text size', 'mthemelocal'),
			'desc' => __('Counter percent text size', 'mthemelocal'),
		),
		'fgcolor' => array(
			'std' => '#EC3939',
			'type' => 'color',
			'label' => __('Foreground Color', 'mthemelocal'),
			'desc' => __('Foreground Color', 'mthemelocal'),
		),
		'bgcolor' => array(
			'std' => '#f0f0f0',
			'type' => 'color',
			'label' => __('Background Color', 'mthemelocal'),
			'desc' => __('Background color', 'mthemelocal'),
		),
		'content' => array(
			'std' => 'Counter Description',
			'type' => 'textarea',
			'label' => __('Counter description', 'mthemelocal'),
			'desc' => __('Counter Description', 'mthemelocal'),
		)
		
	),
	'shortcode' => '[counter size="{{size}}" percentage="{{percentage}}" textsize="{{textsize}}" bgcolor="{{bgcolor}}" fgcolor="{{fgcolor}}" donutwidth="{{donutwidth}}" title="{{title}}"]{{content}}[/counter]',
	'popup_title' => __('Insert Counter Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Staff Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['staff'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add a Staff with multiple social links.', 'mthemelocal'),
    'shortcode' => '[staff title="{{title}}" name="{{name}}" image="{{image}}" desc="{{description}}"]<br/> {{child_shortcode}} [/staff]',
    'popup_title' => __('Insert Staff Shortcode', 'mthemelocal'),
 	'params' => array(
		'title' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Staff title', 'mthemelocal'),
			'desc' => __('Staff title', 'mthemelocal')
		),
		'name' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Staff name', 'mthemelocal'),
			'desc' => __('Staff name', 'mthemelocal')
		),
		'image' => array(
			'std' => '',
			'type' => 'uploader',
			'label' => __('Staff image', 'mthemelocal'),
			'desc' => __('Staff image', 'mthemelocal')
		),
		'description' => array(
			'std' => '',
			'type' => 'textarea',
			'label' => __('Staff Description', 'mthemelocal'),
			'desc' => __('Staff Description', 'mthemelocal')
		)
	),
    'child_shortcode' => array(
        'params' => array(
            'social_icon' => array(
                'std' => 'icon-facebook',
	            'type' => 'fontawesome-iconpicker',
	            'label' => __('Choose a Fontawesome icon', 'mthemelocal'),
	            'desc' => __('Pick a fontawesome icon', 'mthemelocal'),
	            'options' => $fontawesome_icons
            ),
            'social_text' => array(
                'std' => 'Facebook',
                'type' => 'text',
                'label' => __('Social Text', 'mthemelocal'),
                'desc' => __('Social Text', 'mthemelocal'),
            ),
            'social_link' => array(
                'std' => 'http://www.facebook.com/',
                'type' => 'text',
                'label' => __('Link', 'mthemelocal'),
                'desc' => __('Social Link', 'mthemelocal'),
            )
        ),
		'shortcode' => '[socials social_icon="{{social_icon}}" social_link="{{social_link}}" social_text="{{social_text}}"]<br/>',
        'clone_button' => __('+ Add Another Social Link', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Thumbnails
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['thumbnails'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Generate a Thumbnail grid using image attachments', 'mthemelocal'),
	'params' => array(
		'pageid' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Page ID', 'mthemelocal'),
			'desc' => __('Default(blank) Add page ID if you require images from another page.', 'mthemelocal')
		),
		'columns' => array(
			'type' => 'select',
			'label' => __('Grid Columns', 'mthemelocal'),
			'desc' => __('No. of Grid Columns', 'mthemelocal'),
			'options' => array(
				'4' => '4',
				'3' => '3',
				'2' => '2',
				'1' => '1'
			)
		),
		'start' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Start from image count', 'mthemelocal'),
			'desc' => __('Start from the defined image count', 'mthemelocal')
		),
		'end' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('End to image count', 'mthemelocal'),
			'desc' => __('End to the defined image count', 'mthemelocal')
		),
		'title' => array(
			'type' => 'select',
			'label' => __('Dispay image title', 'mthemelocal'),
			'desc' => __('Display image title', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'description' => array(
			'type' => 'select',
			'label' => __('Display image description', 'mthemelocal'),
			'desc' => __('Display image description', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'exclude_featured' => array(
			'type' => 'select',
			'label' => __('Exclude featured image', 'mthemelocal'),
			'desc' => __('Exclude featured image in posts or portfolio', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
	),
	'shortcode' => '[thumbnails columns="{{columns}}" pageid="{{pageid}}" start="{{start}}" end="{{end}}" title="{{title}}" exclude_featured="{{exclude_featured}}" description="{{description}}"]',
	'popup_title' => __('Insert Thumbnails Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Button Config
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['button'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add button.', 'mthemelocal'),
	'params' => array(
		'link' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Button URL', 'mthemelocal'),
			'desc' => __('Add the button\'s url eg http://example.com', 'mthemelocal')
		),
		'type' => array(
			'type' => 'select',
			'label' => __('Button Style', 'mthemelocal'),
			'desc' => __('Select the button\'s style, ie the button\'s colour', 'mthemelocal'),
			'options' => array(
				'gray' => 'Gray',
				'black' => 'Black',
				'green' => 'Green',
				'blue' => 'Blue',
				'red' => 'Red',
				'orange' => 'Orange',
				'purple' => 'Purple'
			)
		),
		'button_icon' => array(
			'std' => 'icon-arrow-right',
            'type' => 'fontawesome-iconpicker',
            'label' => __('Font Awesome icon', 'mthemelocal'),
            'desc' => __('Select a fontawesome icon', 'mthemelocal'),
            'options' => $fontawesome_icons
		),
		'size' => array(
			'type' => 'select',
			'label' => __('Button Size', 'mthemelocal'),
			'desc' => __('Select the button\'s size', 'mthemelocal'),
			'options' => array(
				'small' => 'Small',
				'medium' => 'Medium',
				'large' => 'Large'
			)
		),
		'align' => array(
			'type' => 'select',
			'label' => __('Button Size', 'mthemelocal'),
			'desc' => __('Select the button\'s size', 'mthemelocal'),
			'options' => array(
				'left' => 'Left',
				'right' => 'Right',
				'fullwidth' => 'Fullwidth'
			)
		),
		'target' => array(
			'type' => 'select',
			'label' => __('Button Target', 'mthemelocal'),
			'desc' => __('_self = open in same window. _blank = open in new window', 'mthemelocal'),
			'options' => array(
				'_self' => '_self',
				'_blank' => '_blank'
			)
		),
		'content' => array(
			'std' => 'Button Text',
			'type' => 'text',
			'label' => __('Button\'s Text', 'mthemelocal'),
			'desc' => __('Add the button\'s text', 'mthemelocal'),
		)
	),
	'shortcode' => '[button link="{{link}}" type="{{type}}" size="{{size}}" button_icon="{{button_icon}}" align="{{align}}" target="{{target}}"] {{content}} [/button]',
	'popup_title' => __('Insert Button Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Alert Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['alert'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Generate alert messages using presets icons or custom icon.', 'mthemelocal'),
	'params' => array(
		'style' => array(
			'type' => 'select',
			'label' => __('Alert Type', 'mthemelocal'),
			'desc' => __('Select alert type', 'mthemelocal'),
			'options' => array(
				'yellow' => 'Yellow',
				'red' => 'Red',
				'blue' => 'Blue',
				'green' => 'Green'
			)
		),
		'content' => array(
			'std' => 'Alert Message',
			'type' => 'textarea',
			'label' => __('Alert Text', 'mthemelocal'),
			'desc' => __('Add the alert\'s text', 'mthemelocal'),
		),
        'icon' => array(
            'std' => '',
            'type' => 'fontawesome-iconpicker',
            'label' => __('Choose a Fontawesome icon', 'mthemelocal'),
            'desc' => __('Pick a fontawesome icon', 'mthemelocal'),
            'options' => $fontawesome_icons
        )
		
	),
	'shortcode' => '[alert type="{{style}}" icon="{{icon}}"] {{content}} [/alert]',
	'popup_title' => __('Insert Alert Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Checklist Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['checklist'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add Checklist shortcode.', 'mthemelocal'),
    'shortcode' => '[checklist icon="{{icon}}" color="{{iconcolor}}"]<ul>{{child_shortcode}}</ul>[/checklist]',
    'popup_title' => __('Insert Checklist Shortcode', 'mthemelocal'),
 	'params' => array(
        'icon' => array(
            'std' => 'icon-ok',
            'type' => 'fontawesome-iconpicker',
            'label' => __('Choose a Fontawesome icon', 'mthemelocal'),
            'desc' => __('Pick a fontawesome icon', 'mthemelocal'),
            'options' => $fontawesome_icons
        ),
		'iconcolor' => array(
			'std' => '#EC3939',
			'type' => 'color',
			'label' => __('Icon color', 'mthemelocal'),
			'desc' => __('Icon color in hex', 'mthemelocal'),
		),
	),
    'child_shortcode' => array(
        'params' => array(
            'content' => array(
                'std' => 'Aenean eu leo quam. Pellentesque ornare sem lacinia.',
                'type' => 'text',
                'label' => __('List a line', 'mthemelocal'),
                'desc' => __('You can add as many as you like.', 'mthemelocal')
            )
        ),
        'shortcode' => '<li>{{content}}</li>',
        'clone_button' => __('+ Add Another Checklist Line', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Toggle Config
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['toggle'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add toggle shortcode.', 'mthemelocal'),
	'params' => array(
		'title' => array(
			'type' => 'text',
			'label' => __('Toggle Content Title', 'mthemelocal'),
			'desc' => __('Add the title that will go above the toggle content', 'mthemelocal'),
			'std' => 'Title'
		),
		'content' => array(
			'std' => 'Content',
			'type' => 'textarea',
			'label' => __('Toggle Content', 'mthemelocal'),
			'desc' => __('Add the toggle content. Will accept HTML', 'mthemelocal'),
		),
		'state' => array(
			'type' => 'select',
			'label' => __('Toggle State', 'mthemelocal'),
			'desc' => __('Select the state of the toggle on page load', 'mthemelocal'),
			'options' => array(
				'open' => 'Open',
				'closed' => 'Closed'
			)
		),
		
	),
	'shortcode' => '[toggle title="{{title}}" state="{{state}}"] {{content}} [/toggle]',
	'popup_title' => __('Insert Toggle Content Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Accordions Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['accordions'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add accordions shortcode. You can add multiple accordion tab sections within this generator.', 'mthemelocal'),
    'shortcode' => '[accordions active="{{active}}"]<br/> {{child_shortcode}}  [/accordions]',
    'popup_title' => __('Insert Accordions Shortcode', 'mthemelocal'),
 	'params' => array(
        'active' => array(
            'std' => '-1',
            'type' => 'text',
            'label' => __('Accordion Tab to activate', 'mthemelocal'),
            'desc' => __('Set -1 to close all. 0 is the first, 1 for second and so on...', 'mthemelocal'),
        ),
	),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Title', 'mthemelocal'),
                'desc' => __('Title', 'mthemelocal'),
            ),
            'content' => array(
                'std' => 'Accordion Content',
                'type' => 'textarea',
                'label' => __('Content', 'mthemelocal'),
                'desc' => __('Accordion Tab content', 'mthemelocal')
            )
        ),
        'shortcode' => '[accordion title="{{title}}"] {{content}} [/accordion]<br/>',
        'clone_button' => __('+ Add Another Accordion Tab', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Tabs Shortcode
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['tabs'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add tabs shortcode. You can add multiple tab sections within this generator.', 'mthemelocal'),
    'shortcode' => '[tabs type="{{type}}"]<br/> {{child_shortcode}}  [/tabs]',
    'popup_title' => __('Insert Tab Shortcode', 'mthemelocal'),
 	'params' => array(
		'type' => array(
			'type' => 'select',
			'label' => __('Tab function type', 'mthemelocal'),
			'desc' => __('Tab function type', 'mthemelocal'),
			'options' => array(
				'horizontal' => 'horizontal',
				'vertical' => 'vertical'
			)
		)
		
	),
    'child_shortcode' => array(
        'params' => array(
            'title' => array(
                'std' => 'Title',
                'type' => 'text',
                'label' => __('Tab Title', 'mthemelocal'),
                'desc' => __('Title of the tab', 'mthemelocal'),
            ),
            'content' => array(
                'std' => 'Tab Content',
                'type' => 'textarea',
                'label' => __('Tab Content', 'mthemelocal'),
                'desc' => __('Tab content', 'mthemelocal')
            )
        ),
        'shortcode' => '[tab title="{{title}}"] {{content}} [/tab]<br/>',
        'clone_button' => __('+ Add Another Tab', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Recent Blog List boxes
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['recent_blog_listbox'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('A Grid based list of most recent blog posts.', 'mthemelocal'),
	'params' => array(
		'cat_slug' => array(
			'type' => 'select',
			'label' => __('Choose Category to list', 'mthemelocal'),
			'desc' => __('Choose Category to list', 'mthemelocal'),
			'options' => $options_categories
		),
		'post_type' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Comma seperated post types or a single post type.', 'mthemelocal'),
			'desc' => __('audio,gallery,aside,quote,video,image,standard', 'mthemelocal'),
		),
		'title' => array(
			'type' => 'select',
			'label' => __('Display post title', 'mthemelocal'),
			'desc' => __('Display post title', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'description' => array(
			'type' => 'select',
			'label' => __('Display Post description', 'mthemelocal'),
			'desc' => __('Display Post description', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'excerpt_length' => array(
			'std' => '15',
			'type' => 'text',
			'label' => __('Excerpt length', 'mthemelocal'),
			'desc' => __('Excerpt length', 'mthemelocal'),
		),
		'readmore_text' => array(
			'std' => 'Continue reading',
			'type' => 'text',
			'label' => __('Read more text', 'mthemelocal'),
			'desc' => __('Read more text', 'mthemelocal'),
		),
		'comments' => array(
			'type' => 'select',
			'label' => __('Display number of Comments', 'mthemelocal'),
			'desc' => __('Display number of Comments', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'date' => array(
			'type' => 'select',
			'label' => __('Display age of post', 'mthemelocal'),
			'desc' => __('Display age of post', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'limit' => array(
			'std' => '-1',
			'type' => 'text',
			'label' => __('Limit. -1 for unlimited', 'mthemelocal'),
			'desc' => __('Limit items. -1 for unlimited', 'mthemelocal'),
		)
	),
	'shortcode' => '[recent_blog_listbox cat_slug="{{cat_slug}}" readmore_text="{{readmore_text}}" excerpt_length="{{excerpt_length}}" date="{{date}}" comments="{{comments}}" title="{{title}}" description="{{description}}" post_type="{{post_type}}" limit="{{limit}}"]',
	'popup_title' => __('Insert Recent Blog List box Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Recent Blog Posts
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['recentblog'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('A Grid based list of most recent blog posts.', 'mthemelocal'),
	'params' => array(
		'cat_slug' => array(
			'type' => 'select',
			'label' => __('Choose Category to list', 'mthemelocal'),
			'desc' => __('Choose Category to list', 'mthemelocal'),
			'options' => $options_categories
		),
		'columns' => array(
			'type' => 'select',
			'label' => __('Grid Columns', 'mthemelocal'),
			'desc' => __('No. of Grid Columns', 'mthemelocal'),
			'options' => array(
				'4' => '4',
				'3' => '3',
				'2' => '2',
				'1' => '1'
			)
		),
		'post_type' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Comma seperated post types or a single post type.', 'mthemelocal'),
			'desc' => __('audio,gallery,aside,quote,video,image,standard', 'mthemelocal'),
		),
		'title' => array(
			'type' => 'select',
			'label' => __('Display post title', 'mthemelocal'),
			'desc' => __('Display post title', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'description' => array(
			'type' => 'select',
			'label' => __('Display Post description', 'mthemelocal'),
			'desc' => __('Display Post description', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'excerpt_length' => array(
			'std' => '15',
			'type' => 'text',
			'label' => __('Excerpt length', 'mthemelocal'),
			'desc' => __('Excerpt length', 'mthemelocal'),
		),
		'readmore_text' => array(
			'std' => 'Continue reading',
			'type' => 'text',
			'label' => __('Read more text', 'mthemelocal'),
			'desc' => __('Read more text', 'mthemelocal'),
		),
		'comments' => array(
			'type' => 'select',
			'label' => __('Display number of Comments', 'mthemelocal'),
			'desc' => __('Display number of Comments', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'date' => array(
			'type' => 'select',
			'label' => __('Display age of post', 'mthemelocal'),
			'desc' => __('Display age of post', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'limit' => array(
			'std' => '-1',
			'type' => 'text',
			'label' => __('Limit. -1 for unlimited', 'mthemelocal'),
			'desc' => __('Limit items. -1 for unlimited', 'mthemelocal'),
		),
		'pagination' => array(
			'type' => 'select',
			'label' => __('Generate Pagination', 'mthemelocal'),
			'desc' => __('Generate Pagination', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		)
	),
	'shortcode' => '[recentblog columns="{{columns}}" cat_slug="{{cat_slug}}" readmore_text="{{readmore_text}}" excerpt_length="{{excerpt_length}}" date="{{date}}" comments="{{comments}}" title="{{title}}" description="{{description}}" post_type="{{post_type}}" pagination="{{pagination}}" limit="{{limit}}"]',
	'popup_title' => __('Insert Recent Blog Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Recent Works Carousel
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['workscarousel'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Generate a slideshow thumbnails carousel using your work type categories.', 'mthemelocal'),
	'params' => array(
		'work_categories' => array(
			'type' => 'multilist',
			'std' => '',
			'label' => __('Enter Work type slugs to list', 'mthemelocal'),
			'desc' => __('Leave blank to list all. Enter comma seperated work type categories. eg. artwork,photography,prints ', 'mthemelocal'),
			'options' => $portfolio_categories
		),
		'boxtitle' => array(
			'type' => 'select',
			'label' => __('Box Title', 'mthemelocal'),
			'desc' => __('Display title inside box on hover', 'mthemelocal'),
			'options' => array(
				'true' => 'Yes',
				'false' => 'No'
			)
		),
		'limit' => array(
			'std' => '-1',
			'type' => 'text',
			'label' => __('Limit. -1 for unlimited', 'mthemelocal'),
			'desc' => __('Limit items. -1 for unlimited', 'mthemelocal'),
		)
	),
	'shortcode' => '[workscarousel worktype_slug="{{work_categories}}" limit="{{limit}}" boxtitle="{{boxtitle}}"]',
	'popup_title' => __('Insert Works Carousel Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Testimonials
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['testimonials'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Generates testimonials slideshow using multiple testimonial items. You can add as many testimonial items as you prefer and multiple testimonial blocks on the same page.', 'mthemelocal'),
    'shortcode' => '[testimonials] {{child_shortcode}} <br/>[/testimonials]',
    'popup_title' => __('Insert Testimonial Shortcode', 'mthemelocal'),
    
    'child_shortcode' => array(
        'params' => array(
            'name' => array(
                'std' => 'John Doe',
                'type' => 'text',
                'label' => __('Client Name', 'mthemelocal'),
                'desc' => __('Client Name', 'mthemelocal'),
            ),
            'company' => array(
                'std' => 'Company Name',
                'type' => 'text',
                'label' => __('Company', 'mthemelocal'),
                'desc' => __('Company', 'mthemelocal'),
            ),
            'position' => array(
                'std' => 'Client Position',
                'type' => 'text',
                'label' => __('Client Position', 'mthemelocal'),
                'desc' => __('Client Position', 'mthemelocal'),
            ),
            'link' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Company link', 'mthemelocal'),
                'desc' => __('Client link', 'mthemelocal'),
            ),
            'image' => array(
                'std' => '',
                'type' => 'uploader',
                'label' => __('Image', 'mthemelocal'),
                'desc' => __('Image', 'mthemelocal'),
            ),
            'quote' => array(
                'std' => 'Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero a pharetra augue. Nulla vitae elit libero, a pharetra augue.',
                'type' => 'textarea',
                'label' => __('Quote', 'mthemelocal'),
                'desc' => __('Quote', 'mthemelocal'),
            ),
        ),
        'shortcode' => '<br/>[testimonial image="{{image}}" link="{{link}}" position={{position}} name="{{name}}" company="{{company}}" quote="{{quote}}"]',
        'clone_button' => __('+ Add Testimonial', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Progress Bar
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['progressbar'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Generates a percentage based progress bar.', 'mthemelocal'),
	'params' => array(
		'title' => array(
			'std' => 'Title',
			'type' => 'text',
			'label' => __('Progress Bar title', 'mthemelocal'),
			'desc' => __('Progress bar title', 'mthemelocal'),
		),
		'iconcolor' => array(
			'std' => '#EC3939',
			'type' => 'color',
			'label' => __('Progress color', 'mthemelocal'),
			'desc' => __('Progress color in hex', 'mthemelocal'),
		),
		'percentage' => array(
			'std' => '55',
			'type' => 'text',
			'label' => __('Percent Value', 'mthemelocal'),
			'desc' => __('Percent Value', 'mthemelocal'),
		),
		'unit' => array(
			'std' => '%',
			'type' => 'text',
			'label' => __('Display unit', 'mthemelocal'),
			'desc' => __('Display unit', 'mthemelocal'),
		)
		
	),
	'shortcode' => '[progressbar unit="{{unit}}" color="{{iconcolor}}" percentage="{{percentage}}" title="{{title}}"]',
	'popup_title' => __('Insert Progressbar Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Fullpage Center
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['fullpageblock'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Creates a fullpage cell where you can display an edge to edge row with any shortcode or contents within it. This shortcode is design for Fullpage Template. Ideal to build homepages and landing pages.', 'mthemelocal'),
	'params' => array(
        'top' => array(
            'std' => '80',
            'type' => 'text',
            'label' => __('Top Space', 'mthemelocal'),
            'desc' => __('Top Spacing', 'mthemelocal'),
        ),
        'bottom' => array(
            'std' => '80',
            'type' => 'text',
            'label' => __('Bottom Space', 'mthemelocal'),
            'desc' => __('Bottom Spacing', 'mthemelocal'),
        ),
		'textcolor' => array(
			'type' => 'select',
			'label' => __('Text Color Style', 'mthemelocal'),
			'desc' => __('Text Color Style', 'mthemelocal'),
			'options' => array(
				'default' => 'default',
				'bright' => 'bright'
			)
		),
		'border_style' => array(
			'type' => 'select',
			'label' => __('Border Style', 'mthemelocal'),
			'desc' => __('Border Style. Double style required more than 3px in width.', 'mthemelocal'),
			'options' => array(
				'solid' => 'solid',
				'dotted' => 'dotted',
				'double' => 'double',
			)
		),
        'border_width' => array(
            'std' => '1',
            'type' => 'text',
            'label' => __('Border width', 'mthemelocal'),
            'desc' => __('Border width in pixels', 'mthemelocal'),
        ),
		'border_color' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Border color', 'mthemelocal'),
			'desc' => __('Border color', 'mthemelocal'),
		),
        'background_image' => array(
            'std' => '',
            'type' => 'uploader',
            'label' => __('Background image', 'mthemelocal'),
            'desc' => __('Background image', 'mthemelocal'),
        ),
		'scroll' => array(
			'type' => 'select',
			'label' => __('Background Scroll Type', 'mthemelocal'),
			'desc' => __('Background Scroll Type', 'mthemelocal'),
			'options' => array(
				'static' => 'static',
				'parallax' => 'parallax'
			)
		),
		'background_color' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Background color', 'mthemelocal'),
			'desc' => __('Background color', 'mthemelocal'),
		),
		'content' => array(
			'std' => 'Contents',
			'type' => 'textarea',
			'label' => __('Contents', 'mthemelocal'),
			'desc' => __('Contents', 'mthemelocal'),
		)
		
	),
	'shortcode' => '[fullpageblock top="{{top}}" bottom="{{bottom}}" textcolor="{{textcolor}}" border_color="{{border_color}}" border_style="{{border_style}}" border_width="{{border_width}}" background_image="{{background_image}}" background_color="{{background_color}}" scroll="{{scroll}}"] {{content}} [/fullpageblock]',
	'popup_title' => __('Insert Fullpage Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	Information Boxes
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['infoboxes'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add Information columns. You can add multiple information items from this generator as well as sort them before adding to contents editor.', 'mthemelocal'),
    'shortcode' => '[infobox column="{{column}}"] {{child_shortcode}} <br/>[/infobox]',
    'popup_title' => __('Generate Info boxes Shortcode', 'mthemelocal'),
 	'params' => array(
		'column' => array(
			'type' => 'select',
			'label' => __('Info Box Columns', 'mthemelocal'),
			'desc' => __('Select number of columns for info boxes. Add matching number of Service Items to the Service Box', 'mthemelocal'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			)
		)
		
	),
    'child_shortcode' => array(
        'params' => array(
			'lastitem' => array(
				'type' => 'select',
				'std' => 'no',
				'label' => __('Last Item', 'mthemelocal'),
				'desc' => __('Is it the last item', 'mthemelocal'),
				'options' => array(
					'no' => 'no',
					'yes' => 'yes'
				)
			),
            'image' => array(
                'std' => '',
                'type' => 'uploader',
                'label' => __('Image URL', 'mthemelocal'),
                'desc' => __('Image URL', 'mthemelocal'),
            ),
            'title' => array(
                'std' => 'Title of the info box',
                'type' => 'text',
                'label' => __('Service Title', 'mthemelocal'),
                'desc' => __('Title of the info box', 'mthemelocal'),
            ),
            'link' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Link', 'mthemelocal'),
                'desc' => __('Link to title', 'mthemelocal'),
            ),
            'content' => array(
                'std' => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum.',
                'type' => 'textarea',
                'label' => __('Service Content', 'mthemelocal'),
                'desc' => __('Add the service content', 'mthemelocal')
            )
        ),
        'shortcode' => '<br/> [infobox_item image="{{image}}" title="{{title}}" link="{{link}}" last_item="{{lastitem}}"] {{content}} [/infobox_item]',
        'clone_button' => __('+ Add another Information Box', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Service Boxes
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['serviceboxes'] = array(
    'params' => array(),
    'no_preview' => true,
    'shortcode_desc' => __('Add Service columns. You can add multiple service items from this generator as well as sort them before adding to contents editor.', 'mthemelocal'),
    'shortcode' => '[servicebox column="{{column}}" iconplace="{{iconplace}}" boxplace="{{boxplace}}" iconcolor="{{iconcolor}}"] {{child_shortcode}} <br/>[/servicebox]',
    'popup_title' => __('Generate Services Shortcode', 'mthemelocal'),
 	'params' => array(
		'column' => array(
			'type' => 'select',
			'label' => __('Service Box Columns', 'mthemelocal'),
			'desc' => __('Select number of columns for service boxes. Add matching number of Service Items to the Service Box', 'mthemelocal'),
			'options' => array(
				'1' => '1',
				'2' => '2',
				'3' => '3',
				'4' => '4',
				'5' => '5',
				'6' => '6'
			)
		),
		'iconplace' => array(
			'type' => 'select',
			'label' => __('Icon Placement', 'mthemelocal'),
			'desc' => __('Placement of icon', 'mthemelocal'),
			'options' => array(
				'top' => 'top',
				'left' => 'left'
			)
		),
		'boxplace' => array(
			'type' => 'select',
			'label' => __('Box Placement', 'mthemelocal'),
			'desc' => __('Placement of service boxes', 'mthemelocal'),
			'options' => array(
				'horizontal' => 'horizontal',
				'vertical' => 'vertical'
			)
		),
		'iconcolor' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Icon color', 'mthemelocal'),
			'desc' => __('Color of icon in hex', 'mthemelocal'),
		)
		
	),
    'child_shortcode' => array(
        'params' => array(
			'lastitem' => array(
				'type' => 'select',
				'std' => 'no',
				'label' => __('Last Item', 'mthemelocal'),
				'desc' => __('Is it the last item', 'mthemelocal'),
				'options' => array(
					'no' => 'no',
					'yes' => 'yes'
				)
			),
            'icon' => array(
                'std' => 'icon-anchor',
	            'type' => 'fontawesome-iconpicker',
	            'label' => __('Choose a Fontawesome icon', 'mthemelocal'),
	            'desc' => __('Pick a fontawesome icon', 'mthemelocal'),
	            'options' => $fontawesome_icons
            ),
            'title' => array(
                'std' => 'Fusce Magna Elit',
                'type' => 'text',
                'label' => __('Service Title', 'mthemelocal'),
                'desc' => __('Title of the service', 'mthemelocal'),
            ),
            'link' => array(
                'std' => '',
                'type' => 'text',
                'label' => __('Link', 'mthemelocal'),
                'desc' => __('Link to title', 'mthemelocal'),
            ),
            'content' => array(
                'std' => 'Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Cras mattis consectetur purus sit amet fermentum.',
                'type' => 'textarea',
                'label' => __('Service Content', 'mthemelocal'),
                'desc' => __('Add the service content', 'mthemelocal')
            )
        ),
        'shortcode' => '<br/> [servicebox_item icon="{{icon}}" title="{{title}}" link="{{link}}" last_item="{{lastitem}}"] {{content}} [/servicebox_item]',
        'clone_button' => __('+ Add another Service Column', 'mthemelocal')
    )
);

/*-----------------------------------------------------------------------------------*/
/*	Columns Config
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['columns'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add Columns Shortcode and Combinations', 'mthemelocal'),
	'params' => array(
		'columns' => array(
			'type' => 'select',
			'label' => __('Column Type', 'mthemelocal'),
			'desc' => __('Select the type, ie width of the column.', 'mthemelocal'),
			'options' => array(
				'[column1]<br/> text <br/>[/column1]' => 'column1',
				'[column2]<br/> text <br/>[/column2]<br/>[column2 last=yes]<br/> text <br/>[/column2]' => 'column2',
				'[column3]<br/> text <br/>[/column3]<br/>[column3]<br/> text <br/>[/column3]<br/>[column3 last=yes]<br/> text <br/>[/column3]' => 'column3',
				'[column32]<br/> text <br/>[/column3]' => 'column32',
				'[column4]<br/> text <br/>[/column4]<br/>[column4]<br/> text <br/>[/column4]<br/>[column4]<br/> text <br/>[/column4]<br/>[column4 last=yes]<br/> text <br/>[/column4]' => 'column4',
				'[column43]<br/> text <br/>[/column4]' => 'column43',
				'[column5]<br/> text <br/>[/column5]' => 'column5',
				'[column52]<br/> text <br/>[/column52]' => 'column52',
				'[column53]<br/> text <br/>[/column5]' => 'column53',
				'[column6]<br/> text <br/>[/column6]' => 'colum6',
				'[column3]<br/><br/> text <br/><br/>[/column3][column32 last=yes]<br/> text <br/>[/column32]' => '2x Combo 3 - 32',
				'[column32]<br/> text <br/>[/column32][column3 last=yes]<br/> text <br/>[/column3]' => '2x Combo 32 - 3',
				'[column52]<br/> text <br/>[/column52][column53 last=yes]<br/> text <br/>[/column53]' => '2x Combo 52 - 53',
				'[column53]<br/> text <br/>[/column53][column52 last=yes]<br/> text <br/>[/column52]' => '2x Combo 53 - 52',
				'[column2]<br/> text <br/>[/column2][column4]<br/> text <br/>[/column4][column4 last=yes]<br/> text <br/>[/column4]' => '3x Combo 2 - 4 - 4',
				'[column2]<br/> text <br/>[/column2][column4]<br/> text <br/>[/column4][column4 last=yes]<br/> text <br/>[/column4]' => '3x Combo 4 - 2 - 4',
				'[column4]<br/> text <br/>[/column4][column4]<br/> text <br/>[/column4][column2 last=yes]<br/> text <br/>[/column2]' => '3x Combo 4 - 4 - 2',
				'[column5]<br/> text <br/>[/column5][column52]<br/> text <br/>[/column52][column52 last=yes]<br/> text <br/>[/column52]' => '3x Combo 5 - 52 - 52',
				'[column52]<br/> text <br/>[/column52][column52]<br/> text <br/>[/column52][column5 last=yes]<br/> text <br/>[/column5]' => '3x Combo 52 - 52 - 5',
				'[column52]<br/> text <br/>[/column52][column5]<br/> text <br/>[/column5][column52 last=yes]<br/> text <br/>[/column52]' => '3x Combo 52 - 5 - 52',
				'[column53]<br/> text <br/>[/column53][column5]<br/> text <br/>[/column5][column5 last=yes]<br/> text <br/>[/column5]' => '3x Combo 53 - 5 - 5',
				'[column5]<br/> text <br/>[/column5][column53]<br/> text <br/>[/column53][column5 last=yes]<br/> text <br/>[/column5]' => '3x Combo 5 - 53 - 5',
				'[column5]<br/> text <br/>[/column5][column5]<br/> text <br/>[/column5][column53 last=yes]<br/> text <br/>[/column53]' => '3x Combo 5 - 5 - 53',
				'[column52<br/> text <br/>[/column52][column5]<br/> text <br/>[/column5][column5]<br/> text <br/>[/column5][column5 last=yes]<br/> text <br/>[/column5]' => '4x Combo 52 - 5 - 5 - 5',
				'[column5<br/> text <br/>[/column5][column52]<br/> text <br/>[/column52][column5]<br/> text <br/>[/column5][column5 last=yes]<br/> text <br/>[/column5]' => '4x Combo 5 - 52 - 5 - 5',
				'[column5<br/> text <br/>[/column5][column5]<br/> text <br/>[/column5][column52]<br/> text <br/>[/column52][column5 last=yes]<br/> text <br/>[/column5]' => '4x Combo 5 - 5 - 52 - 5',
				'[column5<br/> text <br/>[/column5][column5]<br/> text <br/>[/column5][column5]<br/> text <br/>[/column5][column52 last=yes]<br/> text <br/>[/column52]' => '4x Combo 5 - 5 - 5 - 52',
			)
		)
		
	),
	'shortcode' => '{{columns}}',
	'popup_title' => __('Insert Columns', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	FontAwesome Generator
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['fontawesome'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add Fontawesome icons', 'mthemelocal'),
	'params' => array(

		'icon' => array(
			'std' => 'icon-anchor',
			'type' => 'fontawesome-iconpicker',
			'label' => __('Select Icon', 'mthemelocal'),
			'desc' => __('Click an icon to select, click again to deselect', 'mthemelocal'),
			'options' => $fontawesome_icons
		),
		'circle' => array(
			'std' => 'no',
			'type' => 'select',
			'label' => __('Icon in Circle', 'mthemelocal'),
			'desc' => 'Choose to display the icon in a circle',
			'options' => array(
				'yes' => 'Yes',
				'no' => 'No'
			)
		),
		'size' => array(
			'std' => 'small',
			'type' => 'select',
			'label' => __('Size of Icon', 'mthemelocal'),
			'desc' => 'Select the size of the icon',
			'options' => array(
				'large' => 'Large',
				'medium' => 'Medium',
				'small' => 'Small'
			)
		),
		'iconcolor' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Icon Color', 'mthemelocal'),
			'desc' => __('Leave blank for default', 'mthemelocal')
		),
		'circlecolor' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Icon Circle Background Color', 'mthemelocal'),
			'desc' => __('Leave blank for default', 'mthemelocal')
		),
		'circlebordercolor' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Icon Circle Border Color', 'mthemelocal'),
			'desc' => __('Leave blank for default', 'mthemelocal')
		)
	),
	'shortcode' => '[fontawesome icon="{{icon}}" circle="{{circle}}" size="{{size}}" iconcolor="{{iconcolor}}" circlecolor="{{circlecolor}}" circlebordercolor="{{circlebordercolor}}"]',
	'popup_title' => __( 'FontAwesome Shortcode', 'mthemelocal' )
);

/*-----------------------------------------------------------------------------------*/
/*	Anchor
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['anchor'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add an anchor to the page. Anchors can be used with href links as jump sections.', 'mthemelocal'),
	'params' => array(
		'id' => array(
			'std' => '',
			'type' => 'text',
			'label' => __('Assign a unique ID to anchor', 'mthemelocal'),
			'desc' => __('Assign a unique ID to anchor', 'mthemelocal'),
		)
		
	),
	'shortcode' => '[anchor id="{{id}}""]',
	'popup_title' => __('Insert Anchor Shortcode', 'mthemelocal')
);

/*-----------------------------------------------------------------------------------*/
/*	FontAwesome Generator
/*-----------------------------------------------------------------------------------*/

$mtheme_shortcodes['count'] = array(
	'no_preview' => true,
	'shortcode_desc' => __('Add From-To Count Shortcode blocks', 'mthemelocal'),
	'params' => array(
        'title' => array(
            'std' => 'Fusce Magna Elit',
            'type' => 'text',
            'label' => __('Title', 'mthemelocal'),
            'desc' => __('Title', 'mthemelocal'),
        ),
        'description' => array(
            'std' => 'Count description text',
            'type' => 'text',
            'label' => __('Description', 'mthemelocal'),
            'desc' => __('Description', 'mthemelocal'),
        ),
        'from' => array(
            'std' => '1',
            'type' => 'text',
            'label' => __('Count from', 'mthemelocal'),
            'desc' => __('Count from', 'mthemelocal'),
        ),
        'to' => array(
            'std' => '9',
            'type' => 'text',
            'label' => __('Count to', 'mthemelocal'),
            'desc' => __('Count to', 'mthemelocal'),
        ),
        'decimal_places' => array(
            'std' => '0',
            'type' => 'text',
            'label' => __('No. of decimals to display', 'mthemelocal'),
            'desc' => __('Number of decimals to display ( eg. 2 )', 'mthemelocal'),
        ),
		'icon' => array(
			'std' => 'icon-anchor',
			'type' => 'fontawesome-iconpicker',
			'label' => __('Select Icon', 'mthemelocal'),
			'desc' => __('Click an icon to select, click again to deselect', 'mthemelocal'),
			'options' => $fontawesome_icons
		),
		'iconcolor' => array(
			'std' => '',
			'type' => 'color',
			'label' => __('Icon Color', 'mthemelocal'),
			'desc' => __('Leave blank for default', 'mthemelocal')
		)
	),
	'shortcode' => '[count title="{{title}}" icon="{{icon}}" iconcolor="{{iconcolor}}" from="{{from}}" to="{{to}}" decimal_places="{{decimal_places}}"]{{description}}[/count]',
	'popup_title' => __( 'From-To Count Shortcode', 'mthemelocal' )
);



?>