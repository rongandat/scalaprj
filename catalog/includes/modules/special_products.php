<?php
/*
  $Id: specials.php,v 1.31 2003/06/09 22:21:03 hpdl Exp $

 E-Commerce Solutions

  Copyright (c) 2005 www.flash-template-design.com

  Released under the GNU General Public License
*/


?>
<!-- specials //-->
        <table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
	<td>
<?php
   if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
    $new_products_query = tep_db_query("select p.products_id, pd.products_name, p.products_price, p.products_tax_class_id, p.products_image, s.specials_new_products_price from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_SPECIALS . " s where p.products_status = '1' and p.products_id = s.products_id and pd.products_id = s.products_id and pd.language_id = '" . (int)$languages_id . "' and s.status = '1' order by s.specials_date_added desc limit " . MAX_RANDOM_SELECT_SPECIALS);
  } 

 $info_box_contents = array();
    $info_box_contents[] = array('text' => "<div style='height:20px; padding-right:10px;color:#E80377; font-weight:bold; font-size:14px; text-align:right;'><img src='images/sign_what_newg.gif' width='21' height='17' style='margin-top:1px;'>&nbsp;&nbsp;WHAT WE OFFER</div>");
   new contentBoxHeading($info_box_contents); 
 ?>
 </td>
</tr>
<tr>
<td height="1" background="images/hpoint.gif" align="left"><img src="images/hpoint.gif" width="3" height="1" alt=""></td>
</tr>
<tr>
<td>
 <?php  
  $row = 0;
  $col = 0;
  $info_box_contents = array();
  while ($new_products = tep_db_fetch_array($new_products_query)) {
    $new_products['products_name'] = tep_get_products_name($new_products['products_id']);
	
	$sql = 'SELECT `products_description` FROM `products_description` WHERE products_id ='.$new_products['products_id'].' && language_id='.(int)$languages_id;
	$description_query = tep_db_query($sql);
	$description = mysql_fetch_array($description_query, MYSQL_ASSOC);        
	$description['products_description'] = substr($description['products_description'], 0, 65);
	$desc_len = strlen($description['products_description']);
$description['products_description'][$desc_len-1] = '.';
	$description['products_description'][$desc_len-2] = '.';
	$description['products_description'][$desc_len-3] = '.';
		
	
    $info_box_contents[$row][$col] = array('align' => 'center',
                                           'params' => 'width="33%" height="200" style="padding-top:2px;"',
                                           'text' => '<div class="new_prod"><div class="image"><a class="remote" href="'. tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) .'">'. tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'align="left"') . '</a></div>
										   <table border="0" cellpadding="0" cellspacing="0">
										   <tr><td valign="top" align="left">&nbsp;<span class="gray" style="background-color:#E7E7E7;">&nbsp;&nbsp;Product:&nbsp;&nbsp;&nbsp;</span></td><td height="28" valign="top"><span class="special_price">'. $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'</span><br/><span class="price"> '.$currencies->display_price($new_products['specials_new_products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).
'</span></td></tr><tr><td colspan="2" align="left">'.$description['products_description'].'</td></tr><tr><td colspan="2">
<div class="buy" style="border-width:0px;">'.tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product'),'post','class="ajaxform"').'<a class="more" href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']).'">more</a> <span style="color:#E80377; font-weight:bold;">|</span> 
'. tep_draw_hidden_field('products_id', $new_products['products_id']) . tep_image_submit('add.gif', IMAGE_BUTTON_IN_CART) .'</form></div></td></tr></table></div>'); 
										   
   $col ++;
    if ($col > 2) {
     break;
    }
	
  }
  
  $dop_col=$col;

  if($dop_col<3)
  {
    if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
    $new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id where products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  } else {
    $new_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.products_status = '1' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  }

  $row = 0;
  $col = $dop_col;
 // $info_box_contents = array();
  while ($new_products = tep_db_fetch_array($new_products_query)) {
    $new_products['products_name'] = tep_get_products_name($new_products['products_id']);
	
	$sql = 'SELECT `products_description` FROM `products_description` WHERE products_id ='.$new_products['products_id'].' && language_id='.(int)$languages_id;
	$description_query = tep_db_query($sql);
	$description = mysql_fetch_array($description_query, MYSQL_ASSOC);        
	$description['products_description'] = substr($description['products_description'], 0, 65);
	$desc_len = strlen($description['products_description']);
$description['products_description'][$desc_len-1] = '.';
	$description['products_description'][$desc_len-2] = '.';
	$description['products_description'][$desc_len-3] = '.';
		
	
    $info_box_contents[$row][$col] = array('align' => 'center',
                                           'params' => 'width="33%" height="200" style="padding-top:2px;"',
                                           'text' => '<div class="new_prod"><div class="image"><a class="remote" href="'. tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) .'">'. tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT, 'align="left"') . '</a></div>
										   <table border="0" cellpadding="0" cellspacing="0">
										   <tr><td valign="top" align="left">&nbsp;<span class="gray" style="background-color:#E7E7E7;">&nbsp;&nbsp;Product:&nbsp;&nbsp;&nbsp;</span></td><td height="28" valign="top"><span class="special_price" style="text-decoration:none;">'. $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id'])).'</span></td></tr><tr><td colspan="2" align="left">'.$description['products_description'].'</td></tr><tr><td colspan="2">
<div class="buy" style="border-width:0px;">'.tep_draw_form('cart_quantity', tep_href_link(FILENAME_PRODUCT_INFO, tep_get_all_get_params(array('action')) . 'action=add_product')).'<a class="more" href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']).'">more</a> <span style="color:#E80377; font-weight:bold;">|</span> 
'. tep_draw_hidden_field('products_id', $new_products['products_id']) . tep_image_submit('add.gif', IMAGE_BUTTON_IN_CART) .'</form></div></td></tr></table></div>'); 
									   
    $col ++;
	if ($col >=3) {
     break;
    }
	
  }

  }
  new contentBox($info_box_contents, 0);


?>
    </td>
</tr>
</table>
<!-- specials_eof //-->

