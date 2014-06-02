<?php
function mtheme_fullpage( $atts, $content = null ) {
   extract( shortcode_atts( array(
   		'id' => '',
		'border_style' => 'none',
		'border_width' => '1',
		'border_color' => '#eeeeee',
		'background_image' => '',
		'background_color' => '',
		'top' =>'',
		'text_align' => 'center',
		'bottom' => '',
		'textcolor' => ''
      ), $atts ) );

if (MTHEME_DEMO_STATUS) {
	if (isSet($_SESSION['demo_skin'])) {
		if ($_SESSION['demo_skin']=="dark") {
			$border_color="#000000";
			$background_color="#111111";
			$textcolor="";
		}
	}
}
	global $fullblockid;
	if (!isSet($fullblockid)) {
		$fullblockid=1;
	} else {
		$fullblockid++;
	}
	if ($id !='' ) {
		$display_id = $id;
	} else {
		$display_id = get_the_id() . '-' . $fullblockid;
	}

	$fullpage='';
	$textclass='';
   	if ($textcolor=="bright") { $textclass="textbright"; }
	$fullpage .= '<div class="fullpage-block fullpage-block-'. $display_id .'" ';
	$fullpage .= ' style="background-color: '.$background_color.'; background-image: url('.$background_image.');';
	if ($border_style!="none") {
		$fullpage .= ' border-style:'.$border_style.'; border-color:'.$border_color.'; border-width:'.$border_width.'px; border-left:none; border-right:none;';
	}
	$fullpage .= ' padding-top:'.$top.'px; padding-bottom:'.$bottom.'px;';
	$fullpage .= ' background-attachment:fixed; background-position:50% 50%; background-repeat: repeat;">';
	$fullpage .= '<div class="fullpage-item '.$textclass.'">'.do_shortcode($content).'</div>';
	$fullpage .= '</div>';
	return $fullpage;
}
add_shortcode('fullpageblock', 'mtheme_fullpage');
function mtheme_Hr( $atts, $content = null ) {
   return '<div class="clearfix"></div><div class="hrule"></div>';
}
add_shortcode('hr', 'mtheme_Hr');

//Hrule [hr]
function mtheme_Hr_top( $atts, $content = null ) {
   return '<div class="clearfix"></div><div class="hrule top"><a href="#">'.__('Top','mtheme').'</a></div>';
}
add_shortcode('hr_top', 'mtheme_Hr_top');

//Hrule [hr]
function mtheme_Hr_padding( $atts, $content = null ) {
   return '<div class="clearfix"></div><div class="hr_padding"></div>';
}
add_shortcode('hr_padding', 'mtheme_Hr_padding');
/**
 * List shortcode.
 *
 * @ [list type=(check,star,note,play,bullet)]
 */
function mtheme_List( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'icon' => 'icon-ok',
	  'color' => '#EC3939'
      ), $atts ) );

   	$checklist = '<div class="checklist">';
	//$checklist .= str_replace('<ul>', '<ul class="icons-ul">', $content);
	$checklist .= str_replace('<li>', '<li><i style="color:'.$color.';" class="icon-li '.$icon.'"></i>', do_shortcode($content));
	$checklist .= '</div>';

	return $checklist;
}
add_shortcode('checklist', 'mtheme_List');

/**
 * Notice / Alerts
 */
function mtheme_Alert( $atts, $content = null ) {

   extract( shortcode_atts( array(
	  'type' => 'yellow',
	  'icon' => ''
      ), $atts ) );

	$notice ='<div class="noticebox info_'.$type.'">';
	$notice .= '<span class="close_notice icon-remove"></span>';
	if ($icon==''){
		if ($type=="yellow") $notice .= '<i class="icon-lightbulb icon-2x"></i>';
		if ($type=="green") $notice .= '<i class="icon-cog icon-2x"></i>';
		if ($type=="blue") $notice .= '<i class="icon-user icon-2x"></i>';
		if ($type=="red") $notice .= '<i class="icon-warning-sign icon-2x"></i>';
	} else {
		$notice .= '<i class="'.$icon.' icon-2x"></i>';
	}
	$notice .= '<div class="notice-text">'.do_shortcode($content).'</div>';
	$notice .= '</div>';
	
	return $notice;
		
}
add_shortcode('alert', 'mtheme_Alert');


//DropCaps [dropcap1] letter [/dropcap1]
function mtheme_DropCap( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'type' => '1',
      ), $atts ) );
   return '<span class="mtheme-dropcap dropcap'.$type.'">' . $content . '</span>';
}
add_shortcode('dropcap', 'mtheme_DropCap');

//Button [button link="yourlink.html"] text [/button]
function mtheme_Button( $atts, $content = null ) {

   extract( shortcode_atts( array(
      'link' => '#',
      'button_icon' => '',
	  'target' => '',
	  'button_icon' => '',
	  'type' => 'gray',
	  'text_color' => '',
	  'size'=> 'normal',
	  'align' => 'none'
      ), $atts ) );
	  
	if ($text_color<>"") {
		$text_color=' style="color:'.$text_color.';"';
	}
	if ($size=="normal") { $size = "bigbutton "; } 
	if ($size=="medium") { $size = "mediumbutton " . $size . "_"; }
	if ($size=="small") { $size = "smallbutton "; }
	  
	if ($target=="_blank") { $target=' target="_blank"'; }
	$textcolor='';
	if ($type != "gray" && $type != "white") {
		$textcolor='button-text-white';
	}
	$button_icon_status='button-without-icon';
	if ($button_icon !='') {
		$button_icon = '<i class="button-icon '.$button_icon.'"></i>';
		$button_icon_status = 'button-with-icon';
	}

	$button = '<a class="mbutton ' . $button_icon_status . ' '. $textcolor.' button-align-' . $align . ' ' .$size.$type.'button button_'.$type.'" href="'.$link.'"' . $target . '>';
	$button .= '<span'. $text_color . '>' . trim($content) . '</span>';
	$button .= $button_icon;
	$button .= '</a>';
	
   return $button;
}
add_shortcode('button', 'mtheme_Button');

//post list [postlist cat=3 num=5]
function mtheme_post_list($atts, $content = null) {
        extract(shortcode_atts(array(
                "num" => '5',
                "cat" => ''
        ), $atts));
        global $post;
        $myposts = get_posts('numberposts='.$num.'&order=DESC&orderby=post_date&category='.$cat);
        $retour='<div class="postlist"><ul>';
        foreach($myposts as $post) :
                setup_postdata($post);
             $retour.='<li><a href="'.get_permalink().'">'.the_title("","",false).'</a></li>';
        endforeach;
        $retour.='</ul></div> ';
		wp_reset_query();
        return $retour;
}
add_shortcode("posts", "mtheme_post_list");

/**
 * Usage: [pagelist child_of=x] x = id of the parent page, default = 0
 * Example: [pagelist child_of=12]
**/

function mtheme_pagelist($atts, $content = null) {
        extract(shortcode_atts(array(
                "childof" => ''
        ), $atts));
 $output = wp_list_pages('echo=0&child_of='.$childof.'&sort_column=menu_order&title_li=');
 return '<div class="postlist"><ul>'.$output.'</ul></div>';
}
add_shortcode('pages', 'mtheme_pagelist');
//Google Maps Shortcode
function mtheme_do_googleMaps($atts, $content = null) {
   extract(shortcode_atts(array(
      "width" => '460',
      "height" => '480',
      "src" => ''
   ), $atts));
   return '<iframe width="'.$width.'" height="'.$height.'" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="'.$src.'&amp;output=embed" ></iframe>';
}
add_shortcode("googlemap", "mtheme_do_googleMaps");

//Clear [clear]
function mtheme_Clear( $atts, $content = null ) {
   return '<div class="clear"></div>';
}
add_shortcode('clear', 'mtheme_Clear');

//Not a shortcode function. - it's used by Column shortcode to check last status
function mtheme_Column_check_last($last_flag) {
	if ($last_flag=="yes") {
		$last_status = "clearfix";
	} else {
		$last_status = "column_space";
	}
	return $last_status;
}
//Column1 [column1] text [/column1]
function mtheme_Column1( $atts, $content = null ) {
   $column = '<div class="column1">' . do_shortcode(trim($content)) . '</div>';
   return $column;
}
add_shortcode('column1', 'mtheme_Column1');

//Column2 [column2] text [/column2]
function mtheme_Column2( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column2 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column2', 'mtheme_Column2');
	
//Column3 [column3] text [/column3]
function mtheme_Column3( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column3 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column3', 'mtheme_Column3');

//Column4 [column4] text [/column4]
function mtheme_Column4( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column4 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column4', 'mtheme_Column4');

//Column32 [column32] text [/column32]
function mtheme_Column32( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column32 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column32', 'mtheme_Column32');
	
//Column32 [column43] text [/column43]
function mtheme_Column43( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column43 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column43', 'mtheme_Column43');
	
//Column32 [column43] text [/column43]
function mtheme_Column5( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column5 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column5', 'mtheme_Column5');
	
function mtheme_Column52( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column52 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column52', 'mtheme_Column52');
	
function mtheme_Column53( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column53 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column53', 'mtheme_Column53');
	
//Column32 [column43] text [/column43]
function mtheme_Column6( $atts, $content = null ) {
   extract( shortcode_atts( array(
	  'last' => 'false'
      ), $atts ) );
   $column = '<div class="column6 '.mtheme_Column_check_last($last).'">' . do_shortcode(trim($content)) . '</div>';
   if ($last=="yes") {
   		$column .= '<div class="clear"></div>';
   }
   return $column;
}
add_shortcode('column6', 'mtheme_Column6');


//Toggle [toggle] text [/toggle]
function mtheme_Toggle( $atts, $content = null ) {

  	extract(shortcode_atts(array(
		"title" => 'Toggle',
		"state" => 'closed'
	), $atts));

  	$toggle_status="";
	if ($state=="open") { 
		$toggle_status="active";
	}
	  
	$toggle	=  '<div class="toggle-shortcode-wrap clearfix">';
	$toggle	.=	'<h3 class="toggle-shortcode '.$toggle_status.'">' . $title . '</h3>';
	$toggle .=	'<div class="toggle-container toggle-display-'.$state.'">';
	$toggle .=	$content;
	$toggle	.=	'</div>';
	$toggle	.=	'</div>';
	$toggle = do_shortcode($toggle);

	return $toggle;
}
add_shortcode('toggle', 'mtheme_Toggle');


//Highlight [highlight] text [/highlight]
function mtheme_Highlight( $atts, $content = null ) {
   return '<span class="highlight">' . do_shortcode($content) . '</span>';
}
add_shortcode('highlight', 'mtheme_Highlight');

//Big Italic
function mtheme_big_italic( $atts, $content = null ) {
		$big_italic = '<div class="big-italic">' . do_shortcode($content) . '</div>';

   return $big_italic;
}
add_shortcode('big_italic', 'mtheme_big_italic');

//Pullquote Right [pullquote_right] text [/pullquote_right]
function mtheme_Pullquote( $atts, $content = null ) {

   extract( shortcode_atts( array(
	  'align' => 'center'
      ), $atts ) );

	switch ($align)
	{
		case "center":
		$pullquote = '<div class="pullquote-center">' . do_shortcode($content) . '</div>';
		break;
		
		case "right":
		$pullquote = '<div class="pullquote-right">' . do_shortcode($content) . '</div>';
		break;
		
		case "left":
		$pullquote = '<div class="pullquote-left">' . do_shortcode($content) . '</div>';
		break;
	}

   return $pullquote;
}
add_shortcode('pullquote', 'mtheme_Pullquote');

/* Lightbox */
function mtheme_Lightbox( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"lightbox_url" => '',
		"thumbnail_url" => '',
		"title" => '',
		'align' => ''
	), $atts));
	
	$before='';
	$after='';
	
	if ($align=="left") {$style='style="float:left; margin-right:20px;"';}
	if ($align=="right") {$style='style="float:right; margin-left:20px;"';}
	if ($align=="center") {$style='style="margin:0 auto; text-align:center;"';}
	
	$before='<div class="lightbox-shortcode lightbox-shortcode-'.$align.'" '.$style.'><a rel="prettyPhoto[group]" title="'.$title.'" href="'. $lightbox_url . '"><span class="shortcode-lightbox-indicate"><i class="icon-plus"></i></span>';
	$after='</a></div>';
	
	$class="is-lightbox ";
		
	$imagesrc = '<img src="'. $thumbnail_url . '" class="'.$class.'" alt="thumbnail" />';


   return $before . $imagesrc . $after;
}
add_shortcode('lightbox', 'mtheme_Lightbox');

//Picture frame [pictureframe]
function mtheme_PictureFrame( $atts, $content = null ) {
	extract(shortcode_atts(array(
		"width" => '150',
		"height" => '',
		"zoom" => '',
		"title" => 'Untitled',
		"align" => 'none',
		"link" => 'none',
		"lightbox" => 'true',
		"image" => ''
	), $atts));
	
	$quality=MTHEME_IMAGE_QUALITY;
	$class="none";
	$before='';
	$after='';
	$fade='';
	$img_align='';
	
	
	if ( $height=="" || $height==0 ) { $height="auto"; } else { $height=$height . "px"; }
	$width=$width . "px";
	
	if ($align=="left") {$img_align="img-align-left";}
	if ($align=="right") {$img_align="img-align-right";}
	if ($align=="center") {$img_align="img-align-center";}
	if ($link<>"") {
		$before='<a title="'.$title.'" href="'. $link . '">';
		$after='</a>';
		$fade="portfolio-fadein";
		}
	if ($lightbox=="true") {
		$before='<a rel="prettyPhoto" title="'.$title.'" href="'. $image . '">';
		$after='</a>';
		$fade="pictureframe-image";
		}
	
	$class="pictureframe " . $img_align . " " . $fade;
		
	$imagesrc = '<img src="'. $image . '" class="'.$class.'" style="width:' . $width .'; height:'. $height .'" alt="thumbnail" />';


   return $before . $imagesrc . $after;
}
add_shortcode('pictureframe', 'mtheme_PictureFrame');

/*
* jQuery UI - Tabs shortcode
*/
global $olt_tab_shortcode_count, $olt_tab_shortcode_tabs;
$olt_tab_shortcode_count = 0;
function mtheme_display_shortcode_tab($atts,$content)
{
global $olt_tab_shortcode_count, $post, $olt_tab_shortcode_tabs;
extract(shortcode_atts(array(
'title' => null,
'class' => null,
), $atts));

ob_start();

if($title):
$olt_tab_shortcode_tabs[] = array(
"title" => $title,
"id" => preg_replace("#[^a-z0-9\.]#i", "", $title)."-".$olt_tab_shortcode_count,
"class" => $class
);
?><div id="<?php echo preg_replace("#[^a-z0-9\.]#i", "", $title)."-".$olt_tab_shortcode_count; ?>" >
<div class="tab-contents">
<?php echo do_shortcode( $content ); ?>
</div>
</div><?php
elseif($post->post_title):
$olt_tab_shortcode_tabs[] = array(
"title" => $post->post_title,
"id" => preg_replace("#[^a-z0-9\.]#i", "", $post->post_title)."-".$olt_tab_shortcode_count,
"class" =>$class
);
?><div id="<?php echo preg_replace("#[^a-z0-9\.]#i", "", $post->post_title)."-".$olt_tab_shortcode_count; ?>" >
<?php echo do_shortcode( $content ); ?>
</div><?php
else:
?>
<span style="color:red">Please enter a title attribute like [tab title="title name"]tab content[tab]</span>
<?php
endif;
$olt_tab_shortcode_count++;
return ob_get_clean();
}

function mtheme_display_shortcode_tabs( $attr, $content )
{
// wordpress function
extract(shortcode_atts(array(
'type' => "horizontal"
), $attr));

global $olt_tab_shortcode_count,$post, $olt_tab_shortcode_tabs;
$olt_tab_shortcode_tabs="";
$vertical_tabs = "";
if( isset( $attr['vertical_tabs']) ):
$vertical_tabs = ( (bool)$attr['vertical_tabs'] ? "vertical-tabs": "");
unset($attr['vertical_tabs']);
endif;

// $attr['disabled'] = (bool)$attr['disabled'];
if ( isset($attr['collapsible']) ) $attr['collapsible'] = (bool)$attr['collapsible'];
$query_atts = shortcode_atts(
array(
'collapsible' => false,
'event' =>'click'
), $attr);
// there might be a better way of doing this
$id = "random-tab-id-".rand(0,1000);

ob_start();
?>
<div class="clearfix" id="<?php echo $id ?>" class="tabs-shortcode <?php echo $vertical_tabs; ?>"><?php

$content = (substr($content,0,6) =="<br />" ? substr( $content,6 ): $content);
$content = str_replace("]<br />","]",$content);

$str = do_shortcode( $content ); ?>
<ul>
<?php
$tab_counter=0;
foreach( $olt_tab_shortcode_tabs as $li_tab ):
$tab_counter++;
?><li <?php if( $li_tab['class']): ?> class='<?php echo $li_tab['class'];?>' <?php endif; ?> ><a href="#<?php echo $li_tab['id']; ?>"><?php echo $li_tab['title']; ?></a></li><?php
endforeach;



?></ul><?php echo $str; ?></div>
<?php
if ($type!="vertical") {
?>
<style>/* <![CDATA[ */
<?php
$css_tab_length= 100/$tab_counter;
echo '#' . $id . ' .ui-tabs-nav li { width:'. $css_tab_length .'%;}';
?>
/* ]]> */
</style>
<?php
}
?>
<script type="text/javascript"> /* <![CDATA[ */
jQuery(document).ready(function($) {
	<?php
	if ( $type != "vertical" ) {
	?>
	jQuery("#<?php echo $id ?>").tabs(<?php echo json_encode($query_atts); ?> );
	<?php
	} else {
	?>
	jQuery("#<?php echo $id ?>").tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	jQuery("#<?php echo $id ?> li").removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
	<?php
	}
	?>
});
/* ]]> */
</script>

<?php
$post_content = ob_get_clean();

return str_replace("\r\n", '',$post_content);
}

function olt_tabs_shortcode_init() {
    
    add_shortcode('tab', 'mtheme_display_shortcode_tab'); // Individual tab
    add_shortcode('tabs', 'mtheme_display_shortcode_tabs'); // The shell
}

add_action('init','olt_tabs_shortcode_init');

global $olt_accordion_shortcode_count;
$olt_accordion_shortcode_count = 0;

function mtheme_accordiontab($atts,$content)
{
	global $olt_accordion_shortcode_count,$post;
	extract(shortcode_atts(array(
		'title' => null,
		'class' => null,
	), $atts));
	
	ob_start();
	
	if($title):
		?>
		<h3 ><a href="#<?php echo preg_replace("#[^a-z0-9\.]#i", "", $title)."-".$olt_accordion_shortcode_count; ?>"><?php echo $title; ?></a></h3>
		<div class="accordian-shortcode-content <?php echo $class; ?>" >
			<?php echo do_shortcode( $content ); ?>
		</div>
		<?php
	elseif($post->post_title):
	?>
		<div id="<?php echo preg_replace("#[^a-z0-9\.]#i", "", $post->post_title)."-".$olt_accordion_shortcode_count; ?>" >
			<?php echo do_shortcode( $content ); ?>
		</div>
	<?php
	else:
	?>
		<span style="color:red">Please enter a title attribute like [accordion title="title name"]accordion content[accordion]</span>
		<?php 	
	endif;
	$olt_accordion_shortcode_count++;
	return ob_get_clean();
}

function mtheme_accordiontabs($attr,$content)
{
	// wordpress function 
	global $olt_accordion_shortcode_count,$post;
	
	if (isset($attr['autoHeight'])) $attr['autoHeight'] =  (bool)$attr['autoHeight'];
	if (isset($attr['disabled'])) $attr['disabled'] =  (bool)$attr['disabled'];
	if ($attr['active']==-1) {
		$attr['active'] =  (bool)$attr['active'];
	} else {
		$attr['active'] =  (int)$attr['active'];
	}
	if (isset($attr['clearStyle'])) $attr['clearStyle'] = (bool)$attr['clearStyle'];
	if (isset($attr['collapsible'])) $attr['collapsible'] = (bool)$attr['collapsible'];
	if (isset($attr['fillSpace'])) $attr['fillSpace']= (bool)$attr['fillSpace'];
	$query_atts = shortcode_atts(
		array(
			'heightStyle' => 'content',
			'autoHeight' => false, 
			'disabled' => false,
			'active'	=> 0,
			'animated' => 'slide',
			'clearStyle' => false,
			'collapsible' => true,
			'event'=>'click',
			'fillSpace'=>false
		), $attr);
	
	// there might be a better way of doing this
	$id = "random-accordion-id-".rand(0,1000);
	
	$content = (substr($content,0,6) =="<br />" ? substr($content,6): $content);
	$content = str_replace("]<br />","]",$content);
	ob_start();
	?>
	<div id="<?php echo $id ?>" class="wp-accordion accordions-shortcode">
		<?php echo do_shortcode( $content ); ?> 
	</div>
	<script type="text/javascript"> /* <![CDATA[ */ 
	jQuery(document).ready( function($){ jQuery("#<?php echo $id ?>").accordion(<?php echo json_encode($query_atts); ?> ); }); 
	/* ]]> */ </script>

	<?php
	$post_content = ob_get_clean();
	
	return str_replace("\r\n", '',$post_content);
}

function olt_accordions_shortcode_init() {
    
    add_shortcode('accordion', 'mtheme_accordiontab'); // Individual accordion
    add_shortcode('accordions', 'mtheme_accordiontabs'); // The shell
	
}
add_action('init','olt_accordions_shortcode_init');

// Progress Bars
function mtheme_progressbar($atts, $content = null) {
	extract(shortcode_atts(array(
		'color' => null
	), $atts));
	$skill = '';
	$skill ='<div class="skillbar clearfix " data-percent="'.$atts['percentage'].'">';
	$skill .='<div style="background-color:'.$color.';" class="skillbar-title"><span>'.$atts['title'].'</span></div>';
	$skill .='<div style="background-color:'.$color.';" class="skillbar-bar"><div class="skill-bar-percent">'.$atts['percentage'].$atts['unit'].'</div></div>';
	$skill .='</div>';
	return $skill;
}
add_shortcode('progressbar', 'mtheme_progressbar');

// Counter
function mtheme_counter($atts, $content = null) {
	extract(shortcode_atts(array(
		"size" => '150',
		"title" => '',
		"percentage" => '90',
		"textsize" => '32',
		"bgcolor" => '#f0f0f0',
		"fgcolor" => '#EC3939',
		"donutwidth" => '3'
	), $atts));
	if ($percentage>100) {
		$percentage="100";
	}
	$uniqurePageID=get_the_id()."-".dechex(mt_rand(1,65535));
	$counter = '';
	$counter .= '<div class="donutcounter-wrap">';
	$counter .='<div class="donutcounter-item" id="donutchart-'.$uniqurePageID.'" data-percent="'.$percentage.'"></div>';
	$counter .= '<h4 class="donutcounter-title">'.$title.'</h4>';
	$counter .= '<div class="donut-desc">'.$content.'</div>';
	$counter .= '</div>';
	$counter .="
<script>
jQuery(document).ready(function($){
	$('#donutchart-".$uniqurePageID."').waypoint(function() {
	$('#donutchart-".$uniqurePageID."').donutchart({
		'size': '".$size."',
		'donutwidth': ".$donutwidth.",
		'fgColor' : '".$fgcolor."',
		'bgColor' : '".$bgcolor."',
		'textsize': '".$textsize."'
	});
	$('#donutchart-".$uniqurePageID."').donutchart('animate');
	}, { offset: 'bottom-in-view',triggerOnce: true });
});
</script>";
	return $counter;
}
add_shortcode('counter', 'mtheme_counter');

/* Font Awesome */
function mtheme_fontawesome($atts, $content = null) {
	extract( shortcode_atts( array(
        'class' => 'icon-wrench'
    ), $atts ));
    $fontawesome = '<i class="'.$class.'"></i>';
    return $fontawesome;
}
add_shortcode('fontawesome', 'mtheme_fontawesome');

// Dividers
function mtheme_divider($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'textcolor' => '',
		'textbackground' => '',
		'style' => 'blank',
		'top' => '40',
		'bottom' => ''
	), $atts));
	$divider = '';
	if ( $bottom == "" ) { 
		$bottom = $top;
		}
	$stylecss ='padding-top:'.$top.'px;';
	$stylecss .= 'padding-bottom:'.$bottom.'px;';
	$titlespan ='';
	if ( $title !='' ) {
		$titlespan = '<span class="divider-title">'.$title.'</span>';
	}
	$divider .= '<div class="clearfix divider-common divider-'.$style.'" style="'.$stylecss.'">'.$titlespan.'</div>';
	return $divider;
}
add_shortcode('divider', 'mtheme_divider');

// ###################################
// Headings
// ###################################
function mtheme_heading($atts, $content = null) {
	extract(shortcode_atts(array(
		'title' => '',
		'size' => '3',
		'textcolor' => '',
		'textbackground' => '',
		'style' => 'line',
		'top' => '40',
		'bottom' => '0'
	), $atts));
	$divider = '';
	if ( $bottom == "0" ) { 
		$bottom = $top;
		}
	$stylecss ='margin-top:'.$top.'px;';
	$stylecss .= 'margin-bottom:'.$bottom.'px;';

	$titlespan = '<h'.$size.' class="item-title">'.$content.'</h'.$size.'>';

	$divider .= '<div class="item-common item-'.$style.'" style="'.$stylecss.'">'.$titlespan.'</div>';
	return $divider;
}
add_shortcode('heading', 'mtheme_heading');

// ###################################
// Information Box
// ###################################
function mtheme_infobox($atts, $content = null) {
	global $iconplace,$iconcolor,$iconbackground;
	$iconplace='';
	$iconcolor='';
	$iconbackground='';
	$servicebox='';
	extract(shortcode_atts(array(
		'column' => '4',
		'boxplace' => 'horizontal',
		'layout' => 'icon-with-title',
		'iconplace' => 'left',
		'iconcolor' => '',
		'iconbackground' => ''
	), $atts));
	$alignicon = "alignicon-top";
	if ($iconplace == "left") $alignicon = "alignicon-left";
	if ($iconplace == "right") $alignicon = "alignicon-right";

	$servicebox .= '<div class="service-column service-info-box service-column-'.$column.' service-boxes-'.$layout.' '.$alignicon.' '.$alignicon.'-'.$boxplace.' serviceboxes-'.$boxplace.' clearfix">';
	$servicebox .= do_shortcode($content);
	$servicebox .= '</div>';

	return $servicebox;
}
add_shortcode('infobox', 'mtheme_infobox');

// ###################################
// Information Item
// ###################################
	function mtheme_infobox_item($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
			'link' => '',
			'image' => '',
			'last_item' => 'no'
		), $atts));

		$service = '';
		$iconcolor_css='';
		$iconbackground_css='';
		$service_icon='';

		global $iconplace,$iconcolor,$iconbackground;

		$iconsize = "icon-2x";
		if ($iconcolor) $iconcolor_css = 'color:' .$iconcolor. ';';
		
		if ($image) $service_image = '<img class="service-image" src="'.$image.'" alt="info-image" />';

		$column_edge="service-item-space";
		if ($last_item=="yes") $column_edge="clearfix";
		$service .= '<div class="service-item '.$column_edge.'">';

		if ( $link <>"" ) { $title = '<a href="'.$link.'" >' . $title . '</a>'; }
		if ($image) $service .= $service_image;
		$service .= '<h4>'.$title.'</h4>';
		$service .= '<div class="service-details">';
		$service .= do_shortcode($content);
		$service .= '</div>';
		$service .= '</div>';

		return $service;
	}
add_shortcode('infobox_item', 'mtheme_infobox_item');

// ###################################
// Service Box
// ###################################
function mtheme_servicebox($atts, $content = null) {
	global $iconplace,$iconcolor,$iconbackground,$boxplace;
	$iconplace='';
	$iconcolor='';
	$iconbackground='';
	$servicebox='';
	$boxplace='';
	extract(shortcode_atts(array(
		'column' => '4',
		'boxplace' => 'horizontal',
		'layout' => 'icon-with-title',
		'iconplace' => 'left',
		'iconcolor' => '',
		'iconbackground' => ''
	), $atts));
	$alignicon = "alignicon-top";
	if ($iconplace == "left") $alignicon = "alignicon-left";
	if ($iconplace == "right") $alignicon = "alignicon-right";

	$servicebox .= '<div class="service-column service-column-'.$column.' service-boxes-'.$layout.' '.$alignicon.' '.$alignicon.'-'.$boxplace.' serviceboxes-'.$boxplace.' clearfix">';
	$servicebox .= do_shortcode($content);
	$servicebox .= '</div>';

	return $servicebox;
}
add_shortcode('servicebox', 'mtheme_servicebox');

// ###################################
// Service Item
// ###################################
	function mtheme_servicebox_item($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
			'link' => '',
			'icon' => '',
			'last_item' => 'no'
		), $atts));

		$service = '';
		$iconcolor_css='';
		$iconbackground_css='';
		$service_icon='';

		global $iconplace,$iconcolor,$iconbackground,$boxplace;

		$iconsize = "icon-2x";
		if ($iconcolor) $iconcolor_css = 'color:' .$iconcolor. ';border-color:'.$iconcolor. ';';
		
		if ( $iconplace =="top" ) { $iconsize = "icon-4x"; }
		if ( $boxplace =="vertical" ) { $iconsize = "icon-4x"; }
		if ($icon) $service_icon .= '<div class="service-icon"><i style="'. $iconcolor_css .'" class="is-animated fontawesome in-circle '.$iconsize.' '.$icon.'"></i></div>';

		$column_edge="service-item-space";
		if ($last_item=="yes") $column_edge="clearfix";
		$service .= '<div class="service-item '.$column_edge.'">';

		if ( $link <>"" ) { $title = '<a href="'.$link.'" >' . $title . '</a>'; }
		if ($icon) $service .= $service_icon;
		$service .= '<div class="service-content">';
		$service .= '<h4>'.$title.'</h4>';
		$service .= '<div class="service-details">';
		$service .= do_shortcode($content);
		$service .= '</div>';
		$service .= '</div>';
		$service .= '</div>';

		return $service;
	}
add_shortcode('servicebox_item', 'mtheme_servicebox_item');

// ###################################
// Callout Message
// ###################################
	function mtheme_callout_msg($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
			'type' => '',
			'description' => '',
			'button' => '',
			'button_type' =>'',
			'button_text' =>'',
			'button_link' => ''
		), $atts));

		$service = '';
		$iconcolor_css='';
		$iconbackground_css='';
		$service_icon='';

		$callout =  '<div class="callout-wrap calltype-'.$type.' clearfix">';
		$callout .=  '<div class="callout">';

		if ($button=="true") {
			$callout .= '<div class="callout-button">';
			$callout .= do_shortcode('[button link="'.$button_link.'" type="'.$button_type.'"]'.$button_text.'[/button]');
			$callout .= '</div>';
		}
		$callout .= '<h2 class="callout-title">'.$title.'</h2>';
		$callout .= '<div class="callout-desc">'.$description.'</div>';
		$callout .= '</div>';
		$callout .= '</div>';
		return $callout;
	}
add_shortcode('callout', 'mtheme_callout_msg');

// ###################################
// Pricing Table
// ###################################
	function mtheme_pricing_table($atts, $content = null) {
		extract(shortcode_atts(array(
			'columns' => '4'
		), $atts));

		global $pricing_columns;
		$pricing_columns = "column".$columns;

		$pricing_table =  '<div class="pricing-table clearfix">';
		$pricing_table .= do_shortcode($content);
		$pricing_table .= '</div>';
		return $pricing_table;
	}
add_shortcode('pricing_table', 'mtheme_pricing_table');

// ###################################
// Pricing Column
// ###################################
	function mtheme_pricing_column($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => '',
			'type' => '1',
			'topspace' => '175',
			'featured' => 'false'
		), $atts));

		global $pricing_columns;

		$highlight='';
		if ($featured=="true") $highlight="pricing_highlight";
		$pricing_table = '<div class="pricing-column-target '.$pricing_columns.' '.$highlight.'">';
		$pricing_table .= '<div class="pricing-column-type-'.$type.' pricing-column">';
		if ($type=="2") { 
			$pricing_table .= '<ul style="margin-top:'.$topspace.'px">';
		} else {
			$pricing_table .= '<ul>';
		}
		$pricing_table .= '<li class="pricing-title">'.$title.'</li>';
		$pricing_table .= do_shortcode($content);
		$pricing_table .= '</ul>';
		$pricing_table .= '</div>';
		$pricing_table .= '</div>';
		return $pricing_table;
	}
add_shortcode('pricing_column', 'mtheme_pricing_column');

// ###################################
// Pricing Price
// ###################################
	function mtheme_pricing_price($atts, $content = null) {
		extract(shortcode_atts(array(
			'currency' => '$',
			'price' => '17',
			'duration' => 'Monthly'
		), $atts));

		$price_sep = explode('.',$price);
		$pricing_table = '<li class="pricing-price"><span class="pricing-currency">'.$currency.'</span>'.$price_sep[0].'<span class="pricing-suffix">'.$price_sep[1].'</span></li>';
		$pricing_table .= '<li class="pricing-duration">'.$duration.'</li>';
		return $pricing_table;
	}
add_shortcode('pricing_price', 'mtheme_pricing_price');

// ###################################
// Pricing Row
// ###################################
	function mtheme_pricing_row($atts, $content = null) {
		extract(shortcode_atts(array(
			'type' => ''
		), $atts));

		
		$pricing_table = '<li class="pricing-row">';
		if ($type=="tick") { $pricing_table .= '<i class="icon-ok"></i>'; }
		if ($type=="cross") { $pricing_table .= '<i class="icon-remove"></i>'; }
		$pricing_table .= do_shortcode($content);
		$pricing_table .= '</li>';
		return $pricing_table;
	}
add_shortcode('pricing_row', 'mtheme_pricing_row');

// ###################################
// Pricing Footer
// ###################################
	function mtheme_pricing_footer($atts, $content = null) {
		extract(shortcode_atts(array(
			'title' => 'Pricing'
		), $atts));

		
		$pricing_table = '<li class="pricing-footer">';
		$pricing_table .= do_shortcode($content);
		$pricing_table .= '</li>';
		return $pricing_table;
	}
add_shortcode('pricing_footer', 'mtheme_pricing_footer');


// ###################################
// FontAwesome
// ###################################
add_shortcode('fontawesome', 'mtheme_fontawesome_icon_gen');
function mtheme_fontawesome_icon_gen($atts, $content = null) {

	extract(shortcode_atts(array(
		'size' => 'medium',
		'icon' => 'icon-anchor',
		'circle' => 'yes',
		'iconcolor' => '',
		'circlecolor' => '',
		'circlebordercolor' => ''
	), $atts));

	$css_style = 'color:'.$iconcolor.' !important;';

	if($circle == 'yes') {
		$css_style .= 'background-color:'.$circlecolor.' !important; border:2px solid '.$circlebordercolor.' !important;';
	}

	$fontawesome = '<i style="'.$css_style.'" class="shortcode-fontawesome-icon '.$size.' circle-'.$circle.' '.$icon.'"'.'></i>';

	return $fontawesome;
}



// ###################################
// @ Since Version 2.4
// Counter
// ###################################
add_shortcode('count', 'mtheme_counter_timer');
function mtheme_counter_timer($atts, $content = null) {

	extract(shortcode_atts(array(
		'icon' => 'icon-anchor',
		'from' => '0',
		'title' => 'title',
		'decimal_places' => '0',
		'to' => '1000',
		'iconcolor' => '',
	), $atts));

	$uniqueID=get_the_id()."-".dechex(mt_rand(1,65535));

	$css_style = 'color:'.$iconcolor.' !important;';

	$fontawesome = '<i style="'.$css_style.'" class="time-count-icon '.$icon.'"'.'></i>';

	$counter = '';
	$counter = '<div class="shortcode-time-counter-block">';
	$counter .= $fontawesome;
	$counter .= '<div class="time-count-data" id="time-count-data-'.$uniqueID.'" data-start="'.$from.'" data-end="'.$to.'"></div>';
	$counter .= '<div class="time-count-title"><h4>'.$title.'</h4></div>';
	$counter .= do_shortcode($content);
	$counter .= '</div>';

	$counter .="
<script>
jQuery(document).ready(function($){
	$('#time-count-data-".$uniqueID."').waypoint(function() {
    $('#time-count-data-".$uniqueID."').countTo({
        from: ".$from.",
        to: ".$to.",
        speed: 5000,
        decimals: ".$decimal_places.",
        refreshInterval: 50,
        onComplete: function(value) {
        }
    });
	}, { offset: 'bottom-in-view',triggerOnce: true });
});
</script>";

	return $counter;
}

add_shortcode('anchor', 'mtheme_anchor');
function mtheme_anchor( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'id' => '#anchor'
	), $atts));

	$anchor = '<span id="'.$id.'" data-id="anchor"></span>';

	return $anchor;
}
?>