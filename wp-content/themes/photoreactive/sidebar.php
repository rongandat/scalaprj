<?php
/**
*  Sidebar
 */
?>
<?php
wp_reset_query();
global $mtheme_sidebar_choice,$mtheme_pagestyle;
if ( !is_singular() ) {
	unset($mtheme_sidebar_choice);
}
$sidebar_position="sidebar-float-right";
if ($mtheme_pagestyle=="rightsidebar") { $sidebar_position = 'sidebar-float-right'; }
if ($mtheme_pagestyle=="leftsidebar") { $sidebar_position = 'sidebar-float-left'; }
?>
<div class="sidebar-wrap<?php if ( is_single() || is_page() ) { echo "-single"; } ?> <?php echo $sidebar_position; ?>">
<?php
	$page_header_status= get_post_meta($post->ID, MTHEME . '_pagetitle_header', true);
	if ( $page_header_status == "Hide" ) {
		echo '<div class="sidebar-margin"></div>';
	}
?>
	<div class="sidebar">
		<div class="regular-sidebar clearfix">
			<!-- begin sidebar -->
			<!-- begin Dynamic Sidebar -->
			<?php
			if ( !isset($mtheme_sidebar_choice) || empty($mtheme_sidebar_choice) ) {
				$mtheme_sidebar_choice="Default Sidebar";
			}
			//echo "sidebar is: " . $sidebar_choice;
			?>
			<?php
			if ( function_exists( 'is_woocommerce' ) && is_woocommerce() ) { 
			
				if ( ! dynamic_sidebar() ) :
					dynamic_sidebar('woocommerce_sidebar');
				endif;
			
			} else {
				
				if ( !function_exists('dynamic_sidebar') 
				
					|| !dynamic_sidebar($mtheme_sidebar_choice) ) :
				
				endif;
			}
			?>
		</div>
	</div>
</div>