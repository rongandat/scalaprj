<?php
/*
Plugin Name: iMaginem Portfolio Creater
Plugin URI: http://www.imaginemthemes.com/plugins/mthemeshortcodes
Description: Imaginem Themes Portfolio Custom Post Types.
Version: 1.3
Author: iMaginem
Author URI: http://www.imaginemthemes.com
*/

class mtheme_Portfolio_Posts {

    function __construct() 
    {
		require_once ( plugin_dir_path( __FILE__ ) . 'portfolio-post-sorter.php');
		
        add_action('init', array(&$this, 'init'));
        add_action('admin_init', array(&$this, 'admin_init'));
        add_filter("manage_edit-mtheme_portfolio_columns", array(&$this, 'mtheme_portfolio_edit_columns'));
		add_action("manage_posts_custom_column",  array(&$this, 'mtheme_portfolio_custom_columns'));
	}

	/*
	* Portfolio Admin columns
	*/
	function mtheme_portfolio_custom_columns($column){
	    global $post;
	    $custom = get_post_custom();
		$image_url=wp_get_attachment_thumb_url( get_post_thumbnail_id( $post->ID ) );
		
		$full_image_id = get_post_thumbnail_id(($post->ID), 'thumbnail'); 
		$full_image_url = wp_get_attachment_image_src($full_image_id,'thumbnail');  
		$full_image_url = $full_image_url[0];

		if (!defined('MTHEME')) {
			$mtheme_shortname = "mtheme_p2";
			define('MTHEME', $mtheme_shortname);
		}

	    switch ($column)
	    {
	        case "portfolio_image":
				if ( isset($image_url) ) {
	            echo '<a class="thickbox" href="'.$full_image_url.'"><img src="'.$image_url.'" width="60px" height="60px" alt="featured" /></a>';
				} else {
				echo __('Image not found','mthemelocal');
				}
	            break;
	        case "description":
	            if ( isset($custom[MTHEME . '_thumbnail_desc'][0]) ) { echo $custom[MTHEME . '_thumbnail_desc'][0]; }
	            break;
	        case "video":
	            if ( isset($custom[MTHEME . '_lightbox_video'][0]) ) { echo $custom[MTHEME . '_lightbox_video'][0]; }
	            break;
	        case "types":
	            echo get_the_term_list($post->ID, 'types', '', ', ','');
	            break;
	    } 
	}

	function mtheme_portfolio_edit_columns($columns){
	    $columns = array(
	        "cb" => "<input type=\"checkbox\" />",
	        "title" => __('Portfolio Title','mthemelocal'),
	        "description" => __('Description','mthemelocal'),
			"video" => __('Video','mthemelocal'),
	        "types" => __('Types','mthemelocal'),
			"portfolio_image" => __('Image','mthemelocal')
	    );
	 
	    return $columns;
	}
	
	/**
	 * Registers TinyMCE rich editor buttons
	 *
	 * @return	void
	 */
	function init()
	{
		/*
		* Register Featured Post Manager
		*/
		//add_action('init', 'mtheme_featured_register');
		//add_action('init', 'mtheme_portfolio_register');//Always use a shortname like "mtheme_" not to see any 404 errors
		/*
		* Register Portfolio Post Manager
		*/
	    $mtheme_portfolio_slug="project";
	    if (function_exists('of_get_option')) {
	    	$mtheme_portfolio_slug = of_get_option('portfolio_permalink_slug');
		}
	    if ( $mtheme_portfolio_slug=="" || !isSet($mtheme_portfolio_slug) ) {
	        $mtheme_portfolio_slug="project";
	    }
	    $mtheme_portfolio_singular_refer = "Portfolio";
	    if (function_exists('of_get_option')) {
	    	$mtheme_portfolio_singular_refer = of_get_option('portfolio_singular_refer');
		}
	    $args = array(
	        'label' => $mtheme_portfolio_singular_refer . __(' Items','mthemelocal'),
	        'singular_label' => __('Portfolio','mthemelocal'),
	        'public' => true,
	        'show_ui' => true,
	        'capability_type' => 'post',
	        'hierarchical' => false,
	        'has_archive' =>true,
			'menu_position' => 6,
	    	'menu_icon' => plugin_dir_url( __FILE__ ) . 'images/portfolio.png',
	        'rewrite' => array('slug' => $mtheme_portfolio_slug),//Use a slug like "work" or "project" that shouldnt be same with your page name
	        'supports' => array('title', 'excerpt','editor', 'thumbnail','comments','revisions')//Boxes will be shown in the panel
	       );
	 
	    register_post_type( 'mtheme_portfolio' , $args );
		/*
		* Add Taxonomy for Portfolio 'Type'
		*/
		register_taxonomy("types", array("mtheme_portfolio"), array("hierarchical" => true, "label" => "Work Type", "singular_label" => "Types", "rewrite" => true));
		 
		/*
		* Hooks for the Portfolio and Featured viewables
		*/
	}
	/**
	 * Enqueue Scripts and Styles
	 *
	 * @return	void
	 */
	function admin_init()
	{
		if( is_admin() ) {
			// Load only if in a Post or Page Manager	
			if ('edit.php' == basename($_SERVER['PHP_SELF'])) {
				wp_enqueue_script('jquery-ui-sortable');
				wp_enqueue_script('thickbox');
				wp_enqueue_style('thickbox');
				wp_enqueue_script("post-sorter-JS", plugin_dir_url( __FILE__ ) . "js/post-sorter.js", array( 'jquery' ), "1.0");
				wp_enqueue_style( 'mtheme-portfolio-sorter-CSS',  plugin_dir_url( __FILE__ ) . '/css/style.css', false, '1.0', 'all' );
			}
		}
	}
    
}
$mtheme_portfolio_post_type = new mtheme_Portfolio_Posts();

?>