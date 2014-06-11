<?php

/*
  $Id: optional_related_products.php, ver 1.0 02/05/2007 Exp $

  Copyright (c) 2007 Anita Cross (http://www.callofthewildphoto.com/)

  Part of Contribution: Optional Related Products Ver 4.0

  Based on code from Optional Relate Products, ver 2.0 05/01/2005
  Copyright (c) 2004-2005 Daniel Bahna (daniel.bahna@gmail.com)

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Released under the GNU General Public License
*/
$thumb_product_with = 200;
$thumb_product_height = 200;
  $orderBy = 'ORDER BY ';
  $orderBy .= (RELATED_PRODUCTS_RANDOMIZE)?'rand()':'pop_order_id, pop_id';
  $orderBy .= (RELATED_PRODUCTS_MAX_DISP)?' limit ' . RELATED_PRODUCTS_MAX_DISP:'';
  $attributes = "
         SELECT
         pop_products_id_slave,
         products_name,
         products_model,
         products_price,
         products_quantity,
         products_tax_class_id,
         products_image
         FROM " .
         TABLE_PRODUCTS_RELATED_PRODUCTS . ", " .
         TABLE_PRODUCTS_DESCRIPTION . " pa, ".
         TABLE_PRODUCTS . " pb
         WHERE pop_products_id_slave = pa.products_id
         AND pa.products_id = pb.products_id
         AND language_id = '" . (int)$languages_id . "'
         AND pop_products_id_master = '".$HTTP_GET_VARS['products_id']."'
         AND products_status='1' " . $orderBy;
  $attribute_query = tep_db_query($attributes);

  if (mysql_num_rows($attribute_query)>0) {
  $count = 0;
?>
<tr>
  <td>
    <div class="cya-info-pro-box-title fgoudyhead" style="text-align:center;"><?php echo TEXT_RELATED_PRODUCTS ?></div><div style="text-align:center;"><div class="cya-under-box-title"></div></div>
<!--    <table class="productlisting" border="0" cellspacing="0" cellpadding="2" width="100%">
    <tr>
      <td align="center" class="productListing-data">
        <table border="0" cellspacing="0" cellpadding="2" width="100%" align="center">
        <tr>-->
    <div id="content_related_products">
        <div id="content_related_product">
<?php
    while ($attributes_values = tep_db_fetch_array($attribute_query)) {
      $products_name_slave = ($attributes_values['products_name']);
      $products_model_slave = ($attributes_values['products_model']);
      $products_qty_slave = ($attributes_values['products_quantity']);
      $products_id_slave = ($attributes_values['pop_products_id_slave']);
      if ($new_price = tep_get_products_special_price($products_id_slave)) {
        $products_price_slave = $currencies->display_price($new_price, tep_get_tax_rate($attributes_values['products_tax_class_id']));
      } else {
        $products_price_slave = $currencies->display_price($attributes_values['products_price'], tep_get_tax_rate($attributes_values['products_tax_class_id']));
      }
      //echo '<td class="productListing-data" align="center">' . "\n";
      echo '<div class="related_product">';
      // show thumb image if Enabled
      if (RELATED_PRODUCTS_SHOW_THUMBS == 'True') {
        echo '<a href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id_slave) . '">' . "\n"
             . tep_image(DIR_WS_IMAGES . $attributes_values['products_image'], $attributes_values['products_name'], $thumb_product_with, $thumb_product_height, 'hspace="5" vspace="5"').'</a><br>' . "\n";
      }
      $caption = '';
      if (RELATED_PRODUCTS_SHOW_NAME == 'True') {
        $caption .= '<p>' . $products_name_slave;
        if (RELATED_PRODUCTS_SHOW_MODEL == 'True') {
          $caption .= sprintf(RELATED_PRODUCTS_MODEL_COMBO, $products_model_slave);
        }
        $caption .= '</p>' . "\n";
      } elseif (RELATED_PRODUCTS_SHOW_MODEL == 'True') {
        $caption .=  '<p>' . $products_model_slave . '</p>' . "\n";
      }
      if (RELATED_PRODUCTS_SHOW_PRICE == 'True') {
        $caption .= '<p>' . sprintf(RELATED_PRODUCTS_PRICE_TEXT, $products_price_slave) . '</p>' . "\n";
      }
      if (RELATED_PRODUCTS_SHOW_QUANTITY == 'True') {
        $caption .= '<p>' . sprintf(RELATED_PRODUCTS_QUANTITY_TEXT, $products_qty_slave) . '</p>' . "\n";
      }
      $view_stock_qtpro = '';
        if (cya_is_checked_qtpro()){
            $view_stock_qtpro = '<br><strong>Stock: ' . $attributes_values['products_quantity'] ."</strong> ";
        }
        $view_product_model = '';
        if ($attributes_values['products_model']){
            $view_product_model = '<br>Code: ' . $attributes_values['products_model'];
        }
      echo '<a class="cya-name-product" href="'
						. tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products_id_slave) . '">'
						. $attributes_values['products_name'] . '</a>' . $view_product_model. $view_stock_qtpro;
      if (RELATED_PRODUCTS_SHOW_BUY_NOW== 'True') {
        echo '<a class="" href="'
						. tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action'))
						. 'action=rp_buy_now&rp_products_id=' . $products_id_slave) . '">'
						. tep_image_button('button_rp_buy_now.gif', IMAGE_BUTTON_RP_BUY_NOW) . '</a>';
      }
      echo '</div>';
//      echo '</td>' . "\n";
//      $count++;
//      if ((RELATED_PRODUCTS_USE_ROWS == 'True') && ($count%RELATED_PRODUCTS_PER_ROW == 0)) {
//        echo '</tr><tr>' . "\n";
//      }
    }
    
?>
                 </div>
        </div>
    <script>
     (function($){
        $(window).load(function(){
            $("#content_related_products").mCustomScrollbar({
					scrollInertia:550,
					horizontalScroll:true,
					mouseWheelPixels:116,
					scrollButtons:{
						enable:true,
						scrollType:"pixels",
						scrollAmount:116
					},
                                        theme:"dark-thin",
                                        autoHideScrollbar:true,
				});
                                
        });
    })(jQuery);
</script>
<!--        </tr></table>-->      
      </td>
    </tr></table>
  </td>
</tr>
<?php
}
?>
