<?php
global $wp_version;
add_action( 'admin_enqueue_scripts', 'mtheme_pointer_header' );
function mtheme_pointer_header() {
    $enqueue = false;

    $dismissed = explode( ',', (string) get_user_meta( get_current_user_id(), 'dismissed_wp_pointers', true ) );

    if ( ! in_array( 'mtheme_pointer', $dismissed ) ) {
        $enqueue = true;
        add_action( 'admin_print_footer_scripts', 'mtheme_pointer_footer' );
    }

    if ( $enqueue ) {
        // Enqueue pointers
        wp_enqueue_script( 'wp-pointer' );
        wp_enqueue_style( 'wp-pointer' );
    }
}
function mtheme_pointer_footer() {
    $pointer_content = '<h3>Welcome</h3>';
    $pointer_content .= '<p>This is Theme Options tab. You can configure theme by clicking to the pointed tab.</p>';
?>
<script type="text/javascript">// <![CDATA[
jQuery(document).ready(function($) {
    $('#toplevel_page_options-framework').pointer({
        content: '<?php echo $pointer_content; ?>',
        position: {
            edge: 'left',
            align: 'center'
        },
        close: function() {
            $.post( ajaxurl, {
                pointer: 'mtheme_pointer',
                action: 'dismiss-wp-pointer'
            });
        }
    }).pointer('open');
});
// ]]></script>
<?php
}
//End of Admin Pointer
// CUSTOM ADMIN LOGIN HEADER LOGO
function mtheme_custom_login_logo()  
{
	if ( of_get_option('wplogin_logo') ) {
		echo '<style type="text/css">h1 a {  background-size:auto !important; background-image:url('.of_get_option('wplogin_logo').')  !important; } </style>';  
	}
}
add_action('login_head',  'mtheme_custom_login_logo');
/*-------------------------------------------------------------------------*/
/* Inject Theme path to JS scripts */
/*-------------------------------------------------------------------------*/
function mtheme_path_to_js_script() { 
	// Load only if its theme options
	if ('admin.php' == basename($_SERVER['PHP_SELF'])) {
	?>
		<script type="text/javascript">
		var mtheme_uri="<?php echo get_stylesheet_directory_uri(); ?>";
		</script>
		<?php
	}
}
add_action('admin_head', 'mtheme_path_to_js_script');
/*-------------------------------------------------------------------------*/
/* Show Activation Message */
/*-------------------------------------------------------------------------*/
function mtheme_activate_head() { 	
	?>
    <script type="text/javascript">
    jQuery(function(){
	var message = '<p><?php echo MTHEME_NAME; ?> comes with an <a href="<?php echo admin_url('admin.php?page=options-framework'); ?>">options panel</a> for configuration. This theme also supports widgets, please visit the <a href="<?php echo admin_url('widgets.php'); ?>">widgets settings page</a> to configure them.</p>';
    	jQuery('.themes-php #message2').html(message);
    
    });
    </script>
    <?php
}
add_action('admin_head', 'mtheme_activate_head');
/*-------------------------------------------------------------------------*/
/* Admin JS and CSS */
/*-------------------------------------------------------------------------*/
function mtheme_adminscripts() {

	// Load if Theme Options or if in Post Edit mode
	$file_dir=get_template_directory_uri();
	
	if ( 'edit.php' == basename($_SERVER['PHP_SELF']) || 'post-new.php' == basename($_SERVER['PHP_SELF']) || 'post.php' == basename($_SERVER['PHP_SELF'])) {
		wp_enqueue_style("styles", $file_dir ."/framework/admin/css/style.css", false, "1.0", "all");
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-slider');
	}
	if ('post-new.php' == basename($_SERVER['PHP_SELF']) || 'post.php' == basename($_SERVER['PHP_SELF'])) {
		wp_enqueue_script("postmeta", $file_dir."/framework/admin/js/postmetaboxes.js?ver=1.0", array( 'jquery' ), "1.0",false);
	}
}
add_action('admin_menu', 'mtheme_adminscripts');
?>