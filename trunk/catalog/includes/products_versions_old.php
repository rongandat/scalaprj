<?php
if ($product_info['parent_products_id'] > 0) $parent_products_id = $product_info['parent_products_id'];
else 
    $parent_products_id = $product_info['products_id'];

$sql = tep_db_query("select a.products_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where parent_products_id='" . (int)$parent_products_id . "' order by b.products_name");
if (tep_db_num_rows($sql)){
?>
<style>

#versions{ 
	width:300px;
		position:relative; left:0px; top:0px;
	}

</style>
<b>See different versions of this item</b>
<table border="0" cellspacing="1" cellpadding="2" class="infoBox versions">
  
	<tr>
		<td style="width:20px;" onmouseover="javascript:versions_arrow_onmouseover('L');" onmouseout="javascript:versions_arrow_onmouseout();"><a href="javascript://"><?php echo tep_image(DIR_WS_IMAGES . 'icons/icon_left.png', '', '16', '16'); ?></a></td>
		<td class="infoBoxContents" align ="center" style="width:300px;overflow:hidden;">
			<?php /* ?><div id="versions" style="width:300px;overflow:hidden;position:relative;left:0px;top:0px;">
				<table border="0" width="100%" cellspacing="1" cellpadding="2" class="infoBox versions">
					<tr>
	<?php while ($version = tep_db_fetch_array($sql)) { ?>
						<td class="infoBoxContents" align ="center">
							<?php echo "<a href=\"javascript:popupWindow('" . tep_href_link('popup_version_image.php', 'vID=' . $version['products_id']) . "')\">" . tep_image_original(DIR_WS_IMAGES . $version['products_image'], addslashes($product_info['products_name']),SMALL_IMAGE_WIDTH/2, SMALL_IMAGE_HEIGHT/2, "hspace='5' vspace='5'". " onMouseOver=\"javascript:window.document.prodimg.src='" . DIR_WS_IMAGES . $version['products_image'] . "'\" onMouseOut=\"javascript:window.document.prodimg.src='" . DIR_WS_IMAGES . $product_info['products_image'] . "'\"" ) . '<br>' . TEXT_CLICK_TO_ENLARGE . '</a>'; ?>
						</td>
	<?php } ?>
					</tr>
				</table>
			</div><?php */ ?>
			<div id="versions">
				<table>
					<tr>
<?php while ($version = tep_db_fetch_array($sql)) { ?>
					<td>
						<?php echo "<a title=\"" . $version['products_name'] . "\"  rel=\"show-title:bottom;title-source:title;\">" . tep_image_original(DIR_WS_IMAGES . $version['products_image'], addslashes($product_info['products_name']),SMALL_IMAGE_WIDTH/2, SMALL_IMAGE_HEIGHT/2, "hspace='5' vspace='5'". " onMouseOver=\"javascript:window.document.prodimg.src='" . DIR_WS_IMAGES . $version['products_image'] . "'\" onMouseOut=\"javascript:window.document.prodimg.src='" . DIR_WS_IMAGES . $product_info['products_image'] . "'\"" ) . '<br>' . '<a href="' . tep_href_link('product_info_rnd.php', 'products_id=' . $versions['products_id']) . 'Click for details' . '</a>'; ?>
<?php //echo "<a title=\"" . $version['products_name'] . "\" class=\"MagicZoomPlus\" href=\"". DIR_WS_IMAGES . $version['products_image'] . "\" rel=\"show-title:bottom;title-source:title;\">" . tep_image_original(DIR_WS_IMAGES . $version['products_image'], addslashes($product_info['products_name']),SMALL_IMAGE_WIDTH/2, SMALL_IMAGE_HEIGHT/2, "hspace='5' vspace='5'") .  '</a>' . '<br><a href="' . tep_href_link('product_info_rnd.php', 'products_id=' . $versions['products_id']) . 'Click for details' . '</a>'; ?>

                                        </td>
<?php } ?>
					</tr>
				</table>
			</div>
		</td>
		<td style="width:20px;" onmouseover="javascript:versions_arrow_onmouseover('R');" onmouseout="javascript:versions_arrow_onmouseout();"><a href="javascript://"><?php echo tep_image(DIR_WS_IMAGES . 'icons/icon_right.png', '', '16', '16'); ?></a></td>
	</tr>
</table>
<script type="text/javascript">
	var timer;
	var direction_flag = '';
	min_left =  (-1) * (150 * ($('#versions table tr td').length - 1));
	function versions_arrow_onmouseover(direction){
		try{
		direction_flag = direction;
		timer = setInterval("move_versions()", 100, this);
		} catch(e){
			alert(e);
		}
	}
	
	function versions_arrow_onmouseout(){
		try{
		clearInterval(timer);
		} catch(e){
			alert(e);
		}
	}
	
	function move_versions(){
		try{
		var cur_left = parseInt($('#versions').css('left').replace(/px/, ''));
		var left_val = '';
		if (cur_left==0 && direction_flag=='R'){
			left_val = '0px';
		} else if (cur_left==min_left && direction_flag=='L'){
			left_val = min_left + 'px';
		} else {
			left_val = (direction_flag=='L' ? (cur_left - 5) : (cur_left + 5)) + 'px';
		}
		$('#versions').css({
			left: left_val
		});
		} catch(e){
			clearInterval(timer);
			alert(e);
		}		
	}
</script>
<?php } ?>
