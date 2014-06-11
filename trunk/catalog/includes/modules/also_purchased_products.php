<?php
/*
  $Id: also_purchased_products.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
$product_cat = tep_db_query("select * from " . TABLE_PRODUCTS_TO_CATEGORIES . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "'");
$product_cat_result = tep_db_fetch_array($product_cat);

if ((int)$product_cat_result['categories_id'] == 23) {
    $add_query_cat23 = ' AND p2c.categories_id=23 ';
}

$thumb_product_with = 200;
$thumb_product_height = 200;
  if (isset($HTTP_GET_VARS['products_id'])) {
    $orders_query = tep_db_query("select p.products_id, p.products_image,p.products_quantity, p.products_model from " . TABLE_ORDERS_PRODUCTS . " opa, " . TABLE_ORDERS_PRODUCTS . " opb, " . TABLE_ORDERS . " o, " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_TO_CATEGORIES . " p2c where opa.products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "' and opa.orders_id = opb.orders_id and opb.products_id != '" . (int)$HTTP_GET_VARS['products_id'] . "' and opb.products_id = p.products_id and opb.orders_id = o.orders_id and p.products_status = '1' and p.products_id = p2c.products_id and p2c.categories_id!=21 ". $add_query_cat23 . " group by p.products_id order by o.date_purchased desc limit " . MAX_DISPLAY_ALSO_PURCHASED);
    $num_products_ordered = tep_db_num_rows($orders_query);
    if ($num_products_ordered >= MIN_DISPLAY_ALSO_PURCHASED) {
?>
<!-- also_purchased_products //-->
<?php
      $info_box_contents = array();
      $info_box_contents[] = array('text' => '<div class="cya-info-pro-box-title fgoudyhead" style="text-align:center;">' . TEXT_ALSO_PURCHASED_PRODUCTS . '</div><div style="text-align:center;"><div class="cya-under-box-title"></div></div>');

      new contentBoxHeading($info_box_contents);

      $row = 0;
      $col = 0;
      $info_box_contents = array();
      while ($orders = tep_db_fetch_array($orders_query)) {
        $view_stock_qtpro = '';
        if (cya_is_checked_qtpro()){
            $view_stock_qtpro = '<br><strong>Stock: ' . $orders['products_quantity'] ."</strong>";
        }
        $view_product_model = '';
        if ($orders['products_model']){
            $view_product_model = '<br>Code: ' . $orders['products_model'];
        }
        $orders['products_name'] = tep_get_products_name($orders['products_id']);
        $info_box_contents[$row][$col] = array('align' => 'center',
                                               'params' => 'class="smallText" width="33%" valign="top"',
                                               'text' => '<a class="" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $orders['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $orders['products_image'], $orders['products_name'], $thumb_product_with, $thumb_product_height) . '</a><br><a class="cya-name-product" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $orders['products_id']) . '">' . $orders['products_name'] . '</a>' . $view_product_model. $view_stock_qtpro);

        $col ++;
        if ($col > 4) {
          $col = 0;
          $row ++;
        }
      }

      new contentBox($info_box_contents);
?>
<!-- also_purchased_products_eof //-->
<?php
    }
  }
?>
