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
<div class="new_left_shopping_cs">
<div class="new_order_list_header">CURRENT ORDER LIST</div>
<div id="cya_reload_list_order_cs">
    <?php
    if ($cart_cs->count_contents() > 0) {

        $cart_contents_string = '';

        $products = $cart_cs->get_products();
        for ($i = 0, $n = sizeof($products); $i < $n; $i++) {
            $cart_contents_string .= '<div class="cya-list-section-account color-samples">';
            $cart_contents_string .= '<img class="cartcs_color_samples_btn_remove" border=0 src="img/color_samples_btn_remove.png" data-id="' . $products[$i]['id'] . '">';
            $cart_contents_string .= '<span>' . $products[$i]['quantity'] . ' x </span>';
            $cart_contents_string .= '<a class="" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">' . $products[$i]['name'] . '</a></div>';

            if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
                tep_session_unregister('new_products_id_in_cart');
            }
        }
        $cart_contents_string .= '<div class="color-samples-order-sum">' . $currencies->format($cart_cs->show_total()) . '</div>';
    } else {
        $cart_contents_string .= BOX_SHOPPING_CART_EMPTY;
    }
    echo $cart_contents_string;
    ?>

</div>
</div>