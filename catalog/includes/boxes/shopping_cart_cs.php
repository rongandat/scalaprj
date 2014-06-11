<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce
  Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com 

  Released under the GNU General Public License
<span id="shopping_cart_box_cs"><a class="remote" href="<?php echo tep_href_link("shopping_cart_cs.php"); ?>" class="headerNavigation">MY COLOR SAMPLES</a></span> &nbsp;|&nbsp;
*/

?>
<!-- shopping_cart //-->
          <tr>                                                           
            <td><div id="shopping_cart_box_cs">
<?php
if ($cart_cs->count_contents() > 0)
{
  $info_box_contents = array();
  $info_box_contents[] = array('text' => '<a class="remote" href="shopping_cart_cs.php">Color Samples</a>');

  new infoBoxHeading($info_box_contents, false, true, tep_href_link("shopping_cart_cs.php"));



// Start - CREDIT CLASS Gift Voucher Contribution
// CREDIT CLASS script moved for compatibility with STS
$cart_contents_string = '';

// End - CREDIT CLASS Gift Voucher Contribution

  if ($cart_cs->count_contents() > 0) {

    $cart_contents_string = '<table border="0" width="100%" cellspacing="0" cellpadding="0">';

    $products = $cart_cs->get_products();
    for ($i=0, $n=sizeof($products); $i<$n; $i++) {
      $cart_contents_string .= '<tr>';
      $cart_contents_string .="<td valign=\"middle\" align=\"center\" class=\"\"><img style='cursor:pointer;' border=0 src='img/color_samples_btn_remove.png' class='delete-icon-box-new' onclick='box_product_remove(\"" . $products[$i]['id'] . "\")'></td>";
      $cart_contents_string .= '<td align="right" valign="top" class="">';

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        $cart_contents_string .= '<a class="remote" href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']).'" style="color:black;">';
      } else {
        $cart_contents_string .= '<a class="remote" href="'.tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']).'" style="color:black;">';
      }                                                    

      $cart_contents_string .= $products[$i]['quantity'] . '</a>&nbsp;x&nbsp;</td><td valign="top" class=""><a class="remote" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">';

      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
            $cart_contents_string .= '<span class="">';
      } else {
            $cart_contents_string .= '<span class="">';
      }
      $cart_contents_string .= $products[$i]['name'] . '</span></a></td></tr>';
        
                    
      if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
        tep_session_unregister('new_products_id_in_cart');
      }
    }
    $cart_contents_string .= '</table>';
  } else {
    $cart_contents_string .= BOX_SHOPPING_CART_EMPTY;
  }

  $info_box_contents = array();
  $info_box_contents[] = array('text' => $cart_contents_string);

  if ($cart_cs->count_contents() > 0) {
    $info_box_contents[] = array('text' => tep_draw_separator());
    $info_box_contents[] = array('align' => 'right',
                                 'text' => '<span class="cya-checkout-shipping">' . $currencies->format($cart_cs->show_total()) . '</span>');
  }


//    $info_box_contents[] = array('align' => 'center',
//				 'text' => '<a class="remote" href="checkout_shipping.php?ordertype=cs">Checkout</a>');

  new infoBox($info_box_contents);
}
?>

            </div></td>
          </tr>
<!-- shopping_cart_eof //-->
