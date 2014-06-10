<?php
/*
* @ Header
*/
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<?php if ( of_get_option('general_fav_icon') ) { ?>
	<link rel="shortcut icon" href="<?php echo of_get_option('general_fav_icon'); ?>" />
	<?php } ?>
	<?php
	wp_head();
	?>
</head>

<body <?php body_class(); ?>>
<?php
//Check for overlays
do_action('mtheme_background_overlays');
//Demo Panel if active
do_action('mtheme_demo_panel');
//Check for sidebar choice
do_action('mtheme_get_sidebar_choice');
//Backround display status
if ( !is_page_template('template-fullscreen-home.php') ) {
	get_template_part('/includes/background/background','display');
}
//Mobile menu
get_template_part('/includes/mobile','menu');
//Header Navigation elements
get_template_part('header','navigation');
//Pass if it's not a fullscreen
if ( !mtheme_is_fullscreen_post() ) {
	echo '<div class="container-wrapper">';
	echo '<div class="container-boxed">';
	get_template_part('header','title');
}
?>