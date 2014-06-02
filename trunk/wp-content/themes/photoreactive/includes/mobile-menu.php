<div class="responsive-menu-wrap">
	<div class="mobile-menu-toggle">
		<span class="mobile-menu-icon"><i class="icon-reorder"></i></span>
				<div class="logo-mobile">
						<?php
						$main_logo=of_get_option('main_logo');
						$responsive_logo=of_get_option('responsive_logo');
						if ( $main_logo<>"" ) {
							if ($responsive_logo<>"") {
								echo '<img class="logoimage" src="' . $responsive_logo .'" alt="logo" />';
							} else {
								echo '<img class="logoimage" src="' . $main_logo .'" alt="logo" />';
							}
						} else {
							echo '<img class="logo-light" src="'.MTHEME_PATH.'/images/logo.png" alt="logo" />';
						}
						?>
				</div>
	</div>
	<div class="responsive-mobile-menu">
		<?php
		get_search_form();
		// Responsive menu conversion to drop down list
	if ( function_exists('wp_nav_menu') ) { 
		wp_nav_menu( array(
		 'container' =>false,
		 'theme_location' => 'top_menu',
		 'menu_class' => 'mobile-menu',
		 'echo' => true,
		 'before' => '',
		 'after' => '',
		 'link_before' => '',
		 'link_after' => '',
		 'depth' => 0,
		 'fallback_cb' => 'mtheme_nav_fallback'
		 )
		);
	}
		?>
	</div>
	<?php
	$wpml_lang_selector_disable= of_get_option('wpml_lang_selector_disable');
	if (!$wpml_lang_selector_disable) {
	?>
	<div class="mobile-wpml-lang-selector-wrap">
		<?php do_action('icl_language_selector'); ?>
	</div>
	<?php
	}
	?>
</div>