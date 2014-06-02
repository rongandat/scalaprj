<?php
function mtheme_demo_scripts_styles() {
?>
<link href="<?php echo get_template_directory_uri(); ?>/framework/demopanel/demo.panel.css" rel="stylesheet" type="text/css" />
<?php
}
function mtheme_demo_scripts_scripts() {
?>
<script type="text/javascript">
/* <![CDATA[ */
/* 
**********************************************************************
DEMO Panel code - START
**********************************************************************
*/
jQuery(document).ready(function(){
	var panelOpen = jQuery('#demopanel .demo_toggle');
	var panelWrap = jQuery('.paneloptions');
	
	panelOpen.hover(
	function () {
	  panelWrap.stop().animate({ top: '10'}, {duration: 'fast'});
	},
	function () {
	  panelWrap.stop().animate({ top: '-70'}, {duration: 'slow'});
	});	
	panelWrap.hover(
	function () {
	  panelWrap.stop().animate({ top: '10'}, {duration: 'fast'});
	},
	function () {
	  panelWrap.stop().animate({ top: '-70'}, {duration: 'slow'});
	});
});
/* 
**********************************************************************
DEMO Panel code - END
**********************************************************************
*/
/* ]]> */
</script>
<?php
	}
	add_action('wp_head','mtheme_demo_scripts_styles',12);
	add_action('wp_footer','mtheme_demo_scripts_scripts',20);
?>