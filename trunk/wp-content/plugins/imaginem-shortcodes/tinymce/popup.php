<?php

// loads the shortcodes class, wordpress is loaded with it
require_once( 'shortcodes.class.php' );

// get popup type
$popup = trim( $_GET['popup'] );
$shortcode = new mtheme_shortcodes( $popup );

$mtheme_plugin_shortcodes_list = array(
		array(
			"id" => "fullpageblock",
			"title" => "Fullpage Block",
			"icon" => "resize-horizontal",
			"active" => false
			),
		array(
			"id" => "fontawesome",
			"title" => "Fontawesome",
			"help" => "Add a fontawesome icon",
			"icon" => "flag",
			"active" => true
			),
		array(
			"id" => "socials",
			"icon" => "group",
			"title" => "Social",
			"active" => true
			),
		array(
			"id" => "clients",
			"icon" => "asterisk",
			"title" => "Clients",
			"active" => true
			),
		array(
			"id" => "callout",
			"icon" => "info",
			"title" => "Callout Box",
			"active" => true
			),
		array(
			"id" => "map",
			"icon" => "map-marker",
			"title" => "Google Maps",
			"active" => true
			),
		array(
			"id" => "recent_portfolio_slideshow",
			"icon" => "desktop",
			"title" => "Portfolio Slideshow",
			"active" => true
			),
		array(
			"id" => "recent_blog_slideshow",
			"icon" => "desktop",
			"title" => "Blog Slideshow",
			"active" => true
			),
		array(
			"id" => "flexislideshow",
			"icon" => "desktop",
			"title" => "Slideshow",
			"active" => true
			),
		array(
			"id" => "audioplayer",
			"icon" => "music",
			"title" => "Audio Player",
			"active" => true
			),
		array(
			"id" => "pullquote",
			"icon" => "quote-left",
			"title" => "Pullquote",
			"active" => true
			),
		array(
			"id" => "highlight",
			"icon" => "eye-open",
			"title" => "Highlight",
			"active" => true
			),
		array(
			"id" => "dropcap",
			"icon" => "circle-blank",
			"title" => "Dropcap",
			"active" => true
			),
		array(
			"id" => "pricing_table",
			"icon" => "usd",
			"title" => "Pricing Table",
			"active" => true
			),
		array(
			"id" => "columns",
			"icon" => "align-justify",
			"title" => "Columns",
			"active" => true
			),
		array(
			"id" => "button",
			"icon" => "hand-up",
			"title" => "Buttons",
			"active" => true
			),
		array(
			"id" => "alert",
			"icon" => "warning-sign",
			"title" => "Alerts",
			"active" => true
			),
		array(
			"id" => "count",
			"icon" => "time",
			"title" => "From-To Counter",
			"active" => false
			),
		array(
			"id" => "counter",
			"icon" => "time",
			"title" => "Circular Counter",
			"active" => true
			),
		array(
			"id" => "staff",
			"icon" => "user",
			"title" => "Staff",
			"active" => true
			),
		array(
			"id" => "accordions",
			"icon" => "tasks",
			"title" => "Accordion",
			"active" => true
			),
		array(
			"id" => "checklist",
			"icon" => "ok-sign",
			"title" => "Checklist",
			"active" => true
			),
		array(
			"id" => "toggle",
			"icon" => "plus",
			"title" => "Toggle",
			"active" => true
			),
		array(
			"id" => "tabs",
			"icon" => "folder-close",
			"title" => "Tabs",
			"active" => true
			),
		array(
			"id" => "lightbox",
			"icon" => "zoom-in",
			"title" => "Lightbox",
			"active" => true
			),
		array(
			"id" => "thumbnails",
			"icon" => "th-large",
			"title" => "Thumbnails",
			"active" => true
			),
		array(
			"id" => "testimonials",
			"icon" => "comment",
			"title" => "Testimonails",
			"active" => true
			),
		array(
			"id" => "progressbar",
			"icon" => "ellipsis-horizontal",
			"title" => "Progress Bar",
			"active" => true
			),
		array(
			"id" => "recent_blog_listbox",
			"icon" => "list",
			"title" => "Column Blog list",
			"active" => true
			),
		array(
			"id" => "recentblog",
			"icon" => "list-ul",
			"title" => "Recent Blog",
			"active" => true
			),
		array(
			"id" => "workscarousel",
			"icon" => "heart",
			"title" => "Works Carousel",
			"active" => true
			),
		array(
			"id" => "portfoliogrid",
			"icon" => "th",
			"title" => "Portfolio Grid",
			"active" => true
			),
		array(
			"id" => "infoboxes",
			"icon" => "lightbulb",
			"title" => "Information Boxes",
			"active" => true
			),
		array(
			"id" => "serviceboxes",
			"icon" => "gear",
			"title" => "Service Boxes",
			"active" => true
			),
		array(
			"id" => "heading",
			"icon" => "bolt",
			"title" => "Section Heading",
			"active" => true
			),
		array(
			"id" => "divider",
			"icon" => "minus",
			"title" => "Divider",
			"active" => true
			),
		array(
			"id" => "anchor",
			"icon" => "anchor",
			"title" => "Anchor",
			"active" => true
			)
);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
<div id="mtheme-popup">

	<div id="mtheme-shortcode-wrap">

		<div id="mtheme-sc-form-wrap">
			<div>
			<form method="post" id="mtheme-sc-form">

				<table id="mtheme-sc-form-table">

					<?php echo $shortcode->output; ?>

					<tbody class="mtheme-sc-form-button">
						<tr class="form-row">
							<td class="field"><a href="#" class="mtheme-insert"><i class="icon-bolt"></i> <?php _e('Generate Shortcode','mthemelocal'); ?></a></td>
						</tr>
					</tbody>

				</table>
				<!-- /#mtheme-sc-form-table -->

			</form>
			</div>

			<div class="mtheme-shortcode-choice-wrap">
				<div class="mtheme_shortcode_choice_toggle"><i class="icon-bolt"></i> <span><?php _e('Choose a Shortcode','mthemelocal'); ?></span></div>
				<div class="mtheme-form-select-field clearfix">
					<div id="mtheme_shortcode_choices">
					<?php
					foreach ($mtheme_plugin_shortcodes_list as $mtheme_plugin_shortcode) {
						if ($mtheme_plugin_shortcode["active"]) {
								//echo $shortcode_container["title"];
							$mtheme_curr_active_shortcode="";
							if ($popup==$mtheme_plugin_shortcode["id"]) {
								$mtheme_curr_active_shortcode="mtheme-shortcode-active";
							}
							echo '<div class="mtheme_shortcode_choice_box '.$mtheme_curr_active_shortcode.'" data-id="'.$mtheme_plugin_shortcode["id"].'" data-title="'.$mtheme_plugin_shortcode["title"].'">';
							$icon_badge="flag";
							if (isSet($mtheme_plugin_shortcode["icon"])) {
								$icon_badge = $mtheme_plugin_shortcode["icon"];
							} 
							echo '<i class="icon-'.$icon_badge.'"></i><span>'.$mtheme_plugin_shortcode["title"].'</span></div>';
						}
					}
					?>
					</div>
				</div>
			</div>
			<!-- /#mtheme-sc-form -->

		</div>
		<!-- /#mtheme-sc-form-wrap -->

		<div class="clear"></div>

	</div>
	<!-- /#mtheme-shortcode-wrap -->

</div>
<!-- /#mtheme-popup -->

</body>
</html>