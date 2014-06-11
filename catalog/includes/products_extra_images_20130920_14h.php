<?php
  /*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
  
  Based on Extra images 1.4 from Mikel Williams
  Thanks to Mikel Williams, StuBo, moosey_jude and Randelia
  Modifications: Xav xpavyfr@yahoo.fr

  */


$products_extra_images_query = tep_db_query("SELECT products_extra_image, products_extra_images_id FROM " . TABLE_PRODUCTS_EXTRA_IMAGES . " WHERE products_id='" . $product_info['products_id'] . "'");
if (tep_db_num_rows($products_extra_images_query) >= 1){

	$rowcount_value=4;  //number of extra images per row	
	//$rowcount=1;
	$rowcount=2;
?>
	<TR>
	  <TD>
	    <table border="0" width="78%" cellspacing="1" cellpadding="2" class="infoBox">
	      <TR>
<!--<a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: './images/triumph_small2.jpg',largeimage: './images/triumph_big2.jpg'}"><img src='images/thumbs/triumph_thumb2.jpg'></a>-->
	<TD CLASS="infoBoxContents" align ="center"> 
<?php 
		preg_match('/src="(.+?)"/',tep_image(DIR_WS_IMAGES . $product_info['products_image'], addslashes($product_info['products_name']),550,411),$match);
		$small_image=$match[1];
		echo "<a class='cya-info-pro-extra-img' id='thumb_0' href='javascript:void(0);' rel=\"{gallery: 'gal1', smallimage: '".$small_image."',largeimage: '".DIR_WS_IMAGES . $product_info['products_image']."'}\">".tep_image(DIR_WS_IMAGES . $product_info['products_image'], addslashes($product_info['products_name']),186,118)."</a>";
?>
		</td>
<?php	
$extra_images_set=array();
	//$products_extra_images_query = tep_db_query("SELECT products_extra_image, products_extra_images_id FROM " . TABLE_PRODUCTS_EXTRA_IMAGES . " WHERE products_id='" . $product_info['products_id'] . "'");
$c=1;
	while ($extra_images = tep_db_fetch_array($products_extra_images_query)) {
$extra_images_set[$extra_images['products_extra_images_id']]=$extra_images['products_extra_image'];
?>
		<TD CLASS="infoBoxContents" align ="center">
		<?php 
		preg_match('/src="(.+?)"/',tep_image(DIR_WS_IMAGES . $extra_images['products_extra_image'], addslashes($product_info['products_name']),550,411),$match);
		$small_image=$match[1];
		echo "<a class='cya-info-pro-extra-img' id='thumb_$c' href='javascript:void(0);' rel=\"{gallery: 'gal1', smallimage: '$small_image',largeimage: '".DIR_WS_IMAGES .$extra_images['products_extra_image']."'}\">".tep_image(DIR_WS_IMAGES . $extra_images['products_extra_image'], addslashes($product_info['products_name']),186,118)."</a>";

?>
		</td>
<?php
	if ($rowcount == $rowcount_value){echo '</tr><tr>'; $rowcount=1;}
	else {$rowcount=$rowcount+1;}
	$c++;
	}
?>	
	   </tr>
	</TABLE>
          <td>
              <?php include (DIR_WS_INCLUDES . 'products_versions.php');?>
          </td>
      </td>
    </tr>

<?php
}
?>    
