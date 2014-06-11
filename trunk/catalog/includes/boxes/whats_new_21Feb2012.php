<?php
/*
  BPAS, Opensource osCommerce contribution
  http://www.bpas.co.nz

  Copyright (c) 2003 BPAS New Zealand Limited

  Released under the GNU General Public License
*/
?>
<!-- new products //-->
          <tr>
            <td><span id="whatsnew_box">
            <?php
  $rp_query = tep_db_query("select p.products_id, p.products_image, p.products_tax_class_id, p.products_price, left(pd.products_name,50) as products_name from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id where products_status = '1' and p.products_id not in (select products_id from " . TABLE_SPECIALS . " where status = 1) and p.products_id not in (select products_id from products_to_categories where categories_id=21 or categories_id=23) and pd.language_id = '" . (int)$languages_id . "' order by p.products_date_added desc limit " . MAX_DISPLAY_NEW_PRODUCTS);
  if (tep_db_num_rows($rp_query)) {

	$i = 0;
   $pausecontent_np='<ul id="whatsnew_list" class="carousel">';
    while ($random_product = tep_db_fetch_array($rp_query)) {
	$pausecontent_np .= "<li><a class='remote' href='" . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product["products_id"]) . "'>" . tep_image(DIR_WS_IMAGES . $random_product['products_image'], tep_output_string($random_product['products_name'], array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;', '&' => '&amp;')), SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . "</a><br/><a class='remote' href='" . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $random_product['products_id']) . "'>" . tep_output_string($random_product['products_name'], array('"' => '&quot;', '\'' => '&#039;', '<' => '&lt;', '>' => '&gt;', '&' => '&amp;')) . "</a><br/>";
	if (intval($random_product['specials_new_products_price']) > 0) {
		$pausecontent_np .= "<s>" . $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . "</s><br/><span class='productSpecialPrice'>" . $currencies->display_price($random_product['specials_new_products_price'], tep_get_tax_rate($random_product['products_tax_class_id']))."</span></li>";
    } else {
		$pausecontent_np .= $currencies->display_price($random_product['products_price'], tep_get_tax_rate($random_product['products_tax_class_id'])) . "<br/></li>";
    }
		$i++;
    }
   $pausecontent_np.="</ul>";
  }
?>
<?php


    $info_box_contents = array();
    $info_box_contents[] = array('text' => BOX_HEADING_WHATS_NEW);
    new infoBoxHeading($info_box_contents, false, false, tep_href_link(FILENAME_PRODUCTS_NEW));

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text' => $pausecontent_np);

    new infoBox($info_box_contents);
?>
            </span></td>
          </tr>
<!-- new products_eof //-->
