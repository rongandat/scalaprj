<?php
/*
  $Id: new_products.php 1806 2008-01-11 22:48:15Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2008 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- new_products //-->
<?php
  $info_box_contents = array();
  //$info_box_contents[] = array('text' => sprintf(TABLE_HEADING_NEW_PRODUCTS, strftime('%B')));
  $info_box_contents[] = array('text' => '');

  new contentBoxHeading($info_box_contents);

  if ( (!isset($new_products_category_id)) || ($new_products_category_id == '0') ) {
    $new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_description, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.index_page='1' and pd.language_id=1 and (p.parent_products_id is null or p.child_products_status='1') order by p.index_page_sort_order ");
	//$new_products_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and p.index_page='1' order by p.index_page_sort_order ");
  } else {
    //$new_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and c.parent_id = '" . (int)$new_products_category_id . "' and p.index_page='1' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' order by p.index_page_sort_order");
	$new_products_query = tep_db_query("select distinct p.products_id, p.products_image, p.products_tax_class_id, pd.products_description, pd.products_name, if(s.status, s.specials_new_products_price, p.products_price) as products_price from " . TABLE_PRODUCTS . " p left join " . TABLE_SPECIALS . " s on p.products_id = s.products_id, " . TABLE_PRODUCTS_DESCRIPTION . " pd, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c, " . TABLE_CATEGORIES . " c where p.products_id = p2c.products_id and p2c.categories_id = c.categories_id and and pd.language_id=1 c.parent_id = '" . (int)$new_products_category_id . "' and p.index_page='1' and p.products_status = '1' and p.products_id = pd.products_id and pd.language_id = '" . (int)$languages_id . "' and (p.parent_products_id is null or p.child_products_status='1') order by p.index_page_sort_order");
  }

  $row = 0;
  $col = 0;
  $info_box_contents = array();
  $x=0;
  while ($new_products = tep_db_fetch_array($new_products_query)) {


  $lc_text = '<input type="hidden" value="'.$new_products['products_id'].'" id="productname_'.$x.'">';
  $lc_text .= '<input type="hidden" value="'.htmlspecialchars($new_products['products_name']).'" name="product_name['.$new_products['products_id'].']">';
  $lc_text .= '<input type="hidden" value="'.htmlspecialchars($new_products['products_description']).'" name="product_description['.$new_products['products_id'].']">';
  $lc_text .= '<input type="hidden" value="'.$currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id']), 1, "", $new_products['products_id']).'" name="product_price['.$new_products['products_id'].']">';


    $info_box_contents[$row][$col] = array('align' => 'center',
                                           'params' => 'class="smallText" width="33%" valign="top"',
                                           'text' => '&nbsp;<a onclick="fill_quickview(\''.$new_products['products_id'].'\')" href="#quickview" class="nyroModal"><div onmouseover="$(this).show();" onmouseout="$(this).hide();" class="quickview"></div></a><div onmouseover="$(this).prev().find(\'div\').show();" onmouseout="$(this).prev().find(\'div\').hide();"><a class="remote preload" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $new_products['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $new_products['products_image'], $new_products['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a></div>&nbsp;<br><a class="remote cya-name-product" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $new_products['products_id']) . '">' . $new_products['products_name'] . '</a><br>' . $currencies->display_price($new_products['products_price'], tep_get_tax_rate($new_products['products_tax_class_id']), 1, "", $new_products['products_id'])." ".$lc_text);

    $col ++;
    if ($col > 3) {
      $col = 0;
      $row ++;
    }
   $x++;
  }

  new contentBox($info_box_contents);
?>
<!-- new_products_eof //-->
