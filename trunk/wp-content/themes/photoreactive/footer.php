<?php
/*
* Footer
*/
?>
<?php
function mtheme_display_bg_image() {
	global $mtheme_bg_image_script;
	if ( isSet($mtheme_bg_image_script) ){
		echo $mtheme_bg_image_script;
	}
}
if ( mtheme_is_fullscreen_post() ) {
	$fullscreen_type = mtheme_get_fullscreen_type();
	if ($fullscreen_type=="photowall") {
		if ( !post_password_required() ) {
		echo '<div class="background-fill"></div>';
		}
		add_action( 'wp_footer', 'mtheme_display_bg_image');
	}
}
if ( !mtheme_is_fullscreen_post() ) {
	add_action( 'wp_footer', 'mtheme_display_bg_image');
	?>
	<div class="clearfix"></div>
	</div>
	<?php edit_post_link( __('edit this entry','mthemelocal') ,'<p class="edit-entry">','</p>'); ?>
	<?php //End of Container Wrapper ?>
	</div>
	</div>
	<?php
}
echo '</div>';
if ( !mtheme_is_fullscreen_post() ) {
?>
<div class="copyright-responsive">
<?php echo stripslashes_deep( of_get_option('footer_copyright') ); ?>
</div>
<?php
}
wp_footer();
?>
</body>
</html>