<div class="global-container-wrapper">
	<div class="header-element-underpaint-wrapper">
		<div class="header-elements-wrap">
			<div class="navigation-wrapper">
				<div class="logo">
					<a href="<?php echo home_url(); ?>/">
						<?php
						$main_logo=of_get_option('main_logo');
						if ( $main_logo<>"" ) {
							echo '<img class="logoimage" src="' . $main_logo .'" alt="logo" />';
						} else {
							echo '<img class="logo-light" src="'.MTHEME_PATH.'/images/logo.png" alt="logo" />';
						}
						?>
					</a>
				</div>
				<nav>
					<?php
					$wpml_lang_selector_disable= of_get_option('wpml_lang_selector_disable');
					if (!$wpml_lang_selector_disable) {
					?>
					<div class="wpml-lang-selector-wrap">
						<?php do_action('icl_language_selector'); ?>
					</div>
					<?php
					}
					?>
					<div class="mainmenu-navigation">
						<?php
						if ( function_exists('wp_nav_menu') ) { 
							// If 3.0 menus exist
							require ( MTHEME_INCLUDES . 'menu/call-menu.php' );

						} else {
						?>
						<ul>
							<li>
								<a href="<?php echo home_url(); ?>/"><?php _e('Home','mthemelocal'); ?></a>
							</li>
						</ul>
						<?php
						}
						?>
					</div>
				</nav>
			</div>
			<div class="menu-toggle-wrap menu-toggle-wrap-fixed">
					<div class="footer-widget-wrap">
						<div class="header-widgets clearfix">
								<?php if ( !function_exists('dynamic_sidebar') 
							
									|| !dynamic_sidebar('Social Footer') ) : ?>
							
								<?php endif; ?>
						</div>
						<div id="copyright">
						<?php echo stripslashes_deep( of_get_option('footer_copyright') ); ?>
						</div>
					</div>
				<div class="menu-toggle menu-toggle-off"><i class="icon-plus"></i></div>
			</div>
		</div>
	</div>