<?php
/*
original: $Id: product_listing.php,v 1.44 2003/06/09 22:49:43 hpdl Exp $
  product_listing_tpl.php v1.0 2008/05/11 JanZ

osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
  
*/

//version 2.2 modification
//if number of column per row is 1, include the original product_listing.php
if (PRODUCT_LIST_NUMCOL == 1) {
	include(dirname(__FILE__).'/product_listing.php');

} else {
	//display the version 2.2.1 product_listing_col.php code
	
//bof product listing with attributes
$list_box_contents = array();
$list_box_contents[] = array('params' => 'class="productListing-heading"');
$cur_row = sizeof($list_box_contents) - 1;

// two variables that determine a certain output and/or if queries get executed
$add_multiple = false;
$use_of_attributes = false;
$get_short_description = false;
// $column_list[] = PRODUCT_SHORT_DESCRIPTION; // alternative for adding a key to configuration

for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
    switch ($column_list[$col]) {
		case 'PRODUCT_LIST_MULTIPLE':
			$add_multiple = true;
      $use_of_attributes = true;
			echo '<form name="buy_now_" method="post" action="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'sort', 'products_id')) . 'action=add_multiple', 'NONSSL') . '">';
			break;
		case 'PRODUCT_LIST_BUY_NOW_MULTIPLE':
      $use_of_attributes = true;
			break;
		case 'PRODUCT_SHORT_DESCRIPTION':
      $get_short_description = true;
			break;
	}
}
//eof product listing with attributes
?>
<?php
$listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');

if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>  <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
  <td class="smallText" align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y', 'products_id'))); ?></td>
</tr>
</table>
<?php
}

$list_box_contents = array();
global $cart;
 
 if ($listing_split->number_of_rows > 0) {
	
	//BOF version 2.2 modification
	if (PRODUCT_LIST_NUMCOL <= 0) {
		$colnum = 3;
		$tdsize = floor(100/3);
	} else {
		$colnum = PRODUCT_LIST_NUMCOL;
		$tdsize = floor(100/PRODUCT_LIST_NUMCOL);
	}
	//EOF version 2.2 modification
	
	$row = 0;
	$column = 0;
	$listing_query = tep_db_query($listing_split->sql_query);
// BOF v 2.2.1
   $no_of_listings = tep_db_num_rows($listing_query);
   
  while ($_listing = tep_db_fetch_array($listing_query)) {
    $_listing['total'] = ''; // for number of attributes
    $listing[] = $_listing;
    $list_of_prdct_ids[] = $_listing['products_id'];
  }

// lets save all the separate count queries that check if a product has attributes
// and do it in one (if needed)
  if ($use_of_attributes == true) {
    $products_attributes_count_query = tep_db_query("select count(*) as total, patrib.products_id from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id in (" . implode(',', $list_of_prdct_ids) . ") and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "' group by products_id");
		while ($_products_attributes_count = tep_db_fetch_array($products_attributes_count_query)) {
      $products_attributes_count[] = array('products_id' => $_products_attributes_count['products_id'], 'total' => $_products_attributes_count['total']);
    }
    $no_of_products_with_attributes = count($products_attributes_count);
    for ($x = 0; $x < $no_of_listings; $x++) {
      if (!empty($products_attributes_count)) {
        for ($i = 0; $i < $no_of_products_with_attributes; $i++) {
          if ($listing[$x]['products_id'] == $products_attributes_count[$i]['products_id'] ) {
            $listing[$x]['total'] = $products_attributes_count[$i]['total'];
          }
        }
      }
    } // end for ($x = 0; $x < $no_of_listings; $x++)
  } // end ($use_of_attributes == true)

// an extra query is used for all the specials because joining the table specials in a query
// often results in a slow query if you haven't added additional indexes to that table
// see http://forums.oscommerce.com/index.php?s=&showtopic=119077&view=findpost&p=1118789 and further

  $specials_query = tep_db_query("select products_id, specials_new_products_price from " . TABLE_SPECIALS . " where products_id in (" . implode(',', $list_of_prdct_ids) . ") and status = '1'");
  while ($specials_array = tep_db_fetch_array($specials_query)) {
    $new_s_prices[] = array ('products_id' => $specials_array['products_id'], 'products_price' => '', 'specials_new_products_price' => $specials_array['specials_new_products_price']);
  }

// add the correct specials_new_products_price and replace final_price
  for ($x = 0; $x < $no_of_listings; $x++) {
    if (!empty($new_s_prices)) {
      for ($i = 0; $i < count($new_s_prices); $i++) {
        if ($listing[$x]['products_id'] == $new_s_prices[$i]['products_id'] ) {
          $listing[$x]['specials_new_products_price'] = $new_s_prices[$i]['specials_new_products_price'];
        }
      }
    } // end if (!empty($new_s_prices)
  } // end for ($x = 0; $x < $no_of_listings; $x++)

// get a short description if needed
   if ($get_short_description == true) {
   $short_description_query = tep_db_query("select pd.products_id, pd.products_description from " . TABLE_PRODUCTS_DESCRIPTION . " pd where pd.language_id = '" . (int)$languages_id . "' and products_id in (" . implode(',', $list_of_prdct_ids) . ")");
   while ($short_description_array = tep_db_fetch_array($short_description_query)) {
     $short_description[] = array ('products_id' => $short_description_array['products_id'], 'short_description' => substr(strip_tags($short_description_array['products_description']), 0, 102) . '...');
   }

// add the short descriptions to the array listing
  $number_of_descriptions = count($short_description);
    for ($x = 0; $x < $no_of_listings; $x++) {
      if ($number_of_descriptions > 0) {
        for ($i = 0; $i < $number_of_descriptions; $i++) {
          if ($listing[$x]['products_id'] == $short_description[$i]['products_id'] ) {
            $listing[$x]['short_description'] = $short_description[$i]['short_description'];
          }
        }
      } // end if ($number_of_descriptions > 0)
    } // end for ($x = 0; $x < $no_of_listings; $x++)   
  } // end if ($get_short_description == true)
   
  $counter = 0;
  for ($x = 0; $x < $no_of_listings; $x++) {

   if ($x % PRODUCT_LIST_NUMCOL == 0) { // start of new row
     if (($counter+1)/2 == floor(($counter+1)/2)) { // start with the background color productListing-odd
// if ($counter/2 == floor($counter/2)) { // if you want to start with the background color productListing-even use this
       $list_box_contents[$row] = array('params' => 'class="productListing-even"');
       $class_for_buy_now_row = 'class="productListing-even"';
     } else {
       $list_box_contents[$row] = array('params' => 'class="productListing-even"');
       $class_for_buy_now_row = 'class="productListing-odd"';
     }
   } // end if ($x % PRODUCT_LIST_NUMCOL == 0)

		$product_contents = array();

		for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
			$lc_align = '';
			$lc_text = array();

			switch ($column_list[$col]) {
				case 'PRODUCT_LIST_MODEL':
				$lc_align = '';
				$lc_text['products_model'] = '&nbsp;' . $listing[$x]['products_model'] . '&nbsp;';
				break;
				case 'PRODUCT_LIST_NAME':
				$lc_align = '';
				if (isset($_GET['manufacturers_id'])) {
					$lc_text['products_name'] = '<a class="remote" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&products_id=' . $listing[$x]['products_id']) . '">' . $listing[$x]['products_name'] . '</a>';
				} else {
					$lc_text['products_name'] = '<a class="remote" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id']) . '">' . $listing[$x]['products_name'] . '</a>';
				}
				break;
				case 'PRODUCT_SHORT_DESCRIPTION';
				  $lc_text['products_short_description'] = $listing[$x]['short_description'];
				  break;
				case 'PRODUCT_LIST_MANUFACTURER':
				$lc_align = '';
				$lc_text['manufacturers_name'] = '<a class="remote" href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing[$x]['manufacturers_id']) . '">' . $listing[$x]['manufacturers_name'] . '</a>';
				break;
				case 'PRODUCT_LIST_PRICE':
				$lc_align = 'right';
				if (tep_not_null($listing[$x]['specials_new_products_price'])) {
					$lc_text['products_price'] = '<s>' .  $currencies->display_price($listing[$x]['products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($listing[$x]['specials_new_products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) . '</span>';
				} else {
					$lc_text['products_price'] = '&nbsp;' . $currencies->display_price($listing[$x]['products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) . '&nbsp;';
				}
				break;
				case 'PRODUCT_LIST_QUANTITY':
				$lc_align = 'right';
				$lc_text['products_quantity'] = '&nbsp;' . $listing[$x]['products_quantity'] . '&nbsp;';
				break;
				case 'PRODUCT_LIST_WEIGHT':
				$lc_align = 'right';
				$lc_text['products_weight'] = '&nbsp;' . $listing[$x]['products_weight'] . '&nbsp;';
				break;
				case 'PRODUCT_LIST_IMAGE':
				$lc_align = 'center';
				if (isset($_GET['manufacturers_id'])) {
					$lc_text['products_image'] = '<a class="remote preload" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&products_id=' . $listing[$x]['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';
				} else {
					$lc_text['products_image'] = '<a class="remote preload" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT) . '</a>';
				}
				break;
				//bof product listing with attributes
				case 'PRODUCT_LIST_BUY_NOW':
	      $lc_text['button_buy_now'] = '<a class="remote" href="' . tep_href_link(basename($_SERVER['PHP_SELF']), tep_get_all_get_params(array('action','sort','products_id')) . 'action=buy_now&products_id=' . $listing[$x]['products_id']) . '">' . tep_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW, 'style="padding-bottom: 5px;"') . '</a>';
// the link for a button that goes to product_info is generated here too
// IMAGE_BUTTON_DETAILS should be defined in includes/languages/**your_languages**.php (alt text)
	      $lc_text['button_details'] = '<a class="remote" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id']) . '">' . tep_image_button('button_details.gif', IMAGE_BUTTON_DETAILS, 'style="padding-bottom: 5px;"') . '</a>';
				break;
				// Begin Buy Now button with attributes and quantity mod 
				// Begin Add Multiple  with attributes Contrib
				case 'PRODUCT_LIST_MULTIPLE': 
				$lc_align = 'right'; 
				$lc_valign = 'top'; 
				$product_list_multiple_text = (TABLE_HEADING_MULTIPLE . tep_draw_input_field('Qty_ProdId_' . $listing[$x]['products_id'], '0', 'size="4"'));
        if ((int)$listing[$x]['total'] > 0) {
					$product_list_multiple_text .= '<table border="0" cellpadding="0" cellspacing"0">';
					$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $listing[$x]['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'");
					while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
						$selected_attribute = false;
						$products_options_array = array();
						$product_list_multiple_text .= '<tr><td class="main">' . $products_options_name['products_options_name'] . ':</td><td>' . "\n";
						$products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_attributes_id from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . $listing[$x]['products_id'] . "' and pa.options_id = '" . $products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . $languages_id . "'");
		$list_of_prdcts_attributes_id = '';
  		$products_options = array(); // makes sure this array is empty again
        while ($_products_options = tep_db_fetch_array($products_options_query)) {
		      $products_options[] = $_products_options;
	      }

   for ($v = 0 ; $v < count($products_options); $v++) {
          $options_text = ''; // make it empty again
          $options_text = $products_options[$v]['products_options_values_name'];
          if (defined('PRODUCT_LIST_ACTUAL_PRICE_IN_DROPDOWN') && PRODUCT_LIST_ACTUAL_PRICE_IN_DROPDOWN == 'Yes') {
           // if ((int) $products_options[$v]['options_values_price'] != '0') {
              if (tep_not_null($listing[$x]['specials_new_products_price'])) {
                $original_price = $listing[$x]['specials_new_products_price'];
              } else {
                $original_price = $listing[$x]['products_price'];
              }
              if ($products_options[$v]['price_prefix'] == "-") // in case price lowers, don't add values, subtract 
              {
		            $show_price = 0.0 + $original_price - $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
	            } else {
        	      $show_price = 0.0 + $original_price + $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
	            }
              $options_text .= ' (' .  $currencies->display_price($show_price, tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
         // }
          } else {
            if ($products_options[$v]['options_values_price'] != '0') {
              $options_text .= ' (' . $products_options[$v]['price_prefix'] . $currencies->display_price($products_options[$v]['options_values_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
            } 
          }
          $products_options_array[] = array('id' => $products_options[$v]['products_options_values_id'], 'text' => $options_text);
        }  // end for ($v = 0 ; $v < count($products_options); $v++)

						$product_list_multiple_text .= tep_draw_pull_down_menu('id_'.$listing[$x]['products_id'].'[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute);
						$product_list_multiple_text .= '</td></tr>';
					}
					$product_list_multiple_text .= '</table>';
					$lc_text['product_list_multiple'] = $product_list_multiple_text;
				}
				break;	
				case 'PRODUCT_LIST_BUY_NOW_MULTIPLE': 
				$lc_align = 'right'; 
				$lc_valign = 'top'; 
				$lc_text_plbnm = '<form name="buy_now_' . $listing[$x]['products_id'] . '" method="post" action="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action','sort','products_id')) . 'action=buy_now_form', 'NONSSL') . '">';
				$lc_text_plbnm .= (TABLE_HEADING_MULTIPLE) . '<input type="text" name="cart_quantity" value="1" maxlength="6" size="4">'; 
        if ((int)$listing[$x]['total'] > 0) {
					$lc_text_plbnm .= '<table border="0" cellpadding="0" cellspacing"0">'; 
					$products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $listing[$x]['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'"); 
					while ($products_options_name = tep_db_fetch_array($products_options_name_query)) { 
						$selected_attribute = false; 
						$products_options_array = array();
						$lc_text_plbnm .= '<tr><td class="main">' . $products_options_name['products_options_name'] . ':</td><td>' . "\n";
						$products_options_query = tep_db_query("select pov.products_options_values_id, pov.products_options_values_name, pa.options_values_price, pa.price_prefix, pa.products_attributes_id from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_OPTIONS_VALUES . " pov where pa.products_id = '" . $listing[$x]['products_id'] . "' and pa.options_id = '" . $products_options_name['products_options_id'] . "' and pa.options_values_id = pov.products_options_values_id and pov.language_id = '" . $languages_id . "'");
		$list_of_prdcts_attributes_id = '';
  		$products_options = array(); // makes sure this array is empty again
        while ($_products_options = tep_db_fetch_array($products_options_query)) {
		      $products_options[] = $_products_options;
	      }

   for ($v = 0 ; $v < count($products_options); $v++) {
          $options_text = ''; // make it empty again
          $options_text = $products_options[$v]['products_options_values_name'];
          if (defined('PRODUCT_LIST_ACTUAL_PRICE_IN_DROPDOWN') && PRODUCT_LIST_ACTUAL_PRICE_IN_DROPDOWN == 'Yes') {
              if (tep_not_null($listing[$x]['specials_new_products_price'])) {
                $original_price = $listing[$x]['specials_new_products_price'];
              } else {
                $original_price = $listing[$x]['products_price'];
              }
              if ($products_options[$v]['price_prefix'] == "-") // in case price lowers, don't add values, subtract 
              {
		            $show_price = 0.0 + $original_price - $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
	            } else {
        	      $show_price = 0.0 + $original_price + $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
	            }
              $options_text .= ' (' .  $currencies->display_price($show_price, tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
          } else {
            if ($products_options[$v]['options_values_price'] != '0') {
              $options_text .= ' (' . $products_options[$v]['price_prefix'] . $currencies->display_price($products_options[$v]['options_values_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
            } 
          }
          $products_options_array[] = array('id' => $products_options[$v]['products_options_values_id'], 'text' => $options_text);
        }  // end for ($v = 0 ; $v < count($products_options); $v++)

						$lc_text_plbnm .= tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); 
						$lc_text_plbnm .= '</td></tr>'; 
					} 
					$lc_text_plbnm .= '</table>'; 
					$lc_text_plbnm .= tep_draw_hidden_field('products_id', $listing[$x]['products_id']) . tep_image_submit('button_buy_now.gif', TEXT_BUY . $listing[$x]['products_name'] . TEXT_NOW);
	
				} // end if ((int)$listing[$x]['total'] > 0)
				if ((int)$listing[$x]['total'] == 0) { 
					$lc_text_plbnm .= '<br>&nbsp;';
					$lc_text_plbnm .= tep_draw_hidden_field('products_id', $listing[$x]['products_id']) . tep_image_submit('button_buy_now.gif', TEXT_BUY . $listing[$x]['products_name'] . TEXT_NOW);
					$lc_text_plbnm .= '<br>&nbsp;';
					$lc_text_plbnm .= '<table border="0" cellpadding="0" cellspacing"0"><tr><td class="main"></td><td></td></tr></table>';
				}
				$lc_text_plbnm .= '</form>'; 
				$lc_text['product_list_buy_now_multiple'] = $lc_text_plbnm;
				break; 
				// End Add Multiple mod
				default: $lc_text = array();
			}
			if (is_array($lc_text)) {
			  foreach($lc_text as $name => $contents) {
			  $product_contents[$name] = $contents;
			  }
			}
		} // end for ($col=0, $n=sizeof($column_list); $col<$n; $col++)

		// making a dividing line between td cells by giving the right side the class infobox which has
		// a background color, but not for the one on the right side
		$class_for_right_side = '';
		if (($x % $colnum) < ($colnum - 1)) {
		  $class_for_right_side = ' class="infobox"';
		}
		$class_for_bottom = '';
		$last_row = ceil($no_of_listings / $colnum) - 1;
		if ($row < $last_row) {
		  $class_for_bottom = ' class="infobox"';
		}

		$product_text = "\n";
		$product_text .= '<!-- start of cell contents for a product -->' . "\n";
		$product_text .= '<table cellpadding="0" cellspacing="0" border="0">' . "\n";
		$product_text .= '  <tr>' . "\n";
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '    <td colspan="2">' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '  </tr>' . "\n";
		$product_text .= '  <tr>' . "\n";
		$product_text .= '    <td rowspan="3">' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '    <td style="padding: 20px; background-color: white;" class="productListing-data">' . $product_contents['products_name'] . '</td>' . "\n";
		$product_text .= '    <td rowspan="2" style="padding: 5px; background-color: #fff;">' . $product_contents['products_image'] . '</td>' . "\n";
		$product_text .= '    <td rowspan="3"' . $class_for_right_side .'>' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '  </tr>' . "\n";
		$product_text .= '  <tr>' . "\n";
		// adding a class for the price is more appropriate, hard coded here
		$product_text .= '    <td style="text-align: center; vertical-align: bottom; padding-bottom: 5px; font-size: 12px; font-weight: bold; color:#06A;">' . $product_contents['products_price'] . '</td>' . "\n";
		$product_text .= '  </tr>' . "\n";
		$product_text .= '  <tr>' . "\n";
		$product_text .= '    <td colspan="2" style="text-align: center; padding-top: 5px;">' . $product_contents['button_buy_now'] . '&nbsp;' . $product_contents['button_details'] . '</td>' . "\n";
		$product_text .= '  </tr>' . "\n";
		$product_text .= '  <tr'. $class_for_bottom .'>' . "\n";
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
// split up in two to keep td for pictures and text aligned		
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '150px' , '1') . '</td>' . "\n";
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '100px' , '1') . '</td>' . "\n";
		$product_text .= '    <td>' . tep_draw_separator('pixel_trans.gif', '1' , '1') . '</td>' . "\n";
		$product_text .= '  <tr>' . "\n";
		$product_text .= '</table>' . "\n";

		$list_box_contents[$row][$column] = array('align' => 'center',
												//bof product listing with attributes
												'valign' => $lc_valign,
												//eof product listing with attributes
												//2.2 modification ,add width in td
                                              'params' => 'class="productListing-data" width="'.$tdsize.'%"',
                                              'text'  => $product_text); // $tdsize in pixels?
    
		$column ++;
   
		if ($x == ($no_of_listings -1)) {
			$last_column = ($x % PRODUCT_LIST_NUMCOL); // x modulus number of columns
// NOTE that the contents of the empty cell is hardcoded here
			$fill_up_empty_cell = tep_draw_separator('pixel_trans.gif', '250px' , '1');
			//BOF version 2.2 modification
			// fill up the remainder of the table row with empty cells
			for ($column = ($last_column + 1) ; $column < $colnum; $column++) {
				$list_box_contents[$row][$column] = array('align' => 'center',
												//bof product listing with attributes
												'valign' => $lc_valign,
												//eof product listing with attributes
												//2.2 modification ,add width in td
                                              'params' => 'class="productListing-data" width="'.$tdsize.'%"',
                                              'text'  => $fill_up_empty_cell);
			}
		} // end if ($x == ($no_of_listings -1))
		
		if ($column >= $colnum && $x < ($no_of_listings -1)) {
			$row ++; // we start a new tr here
			$column = 0;
      $counter++; // counter only goes up after the buy now buttons have been outputted, counts the real rows
    } // end elseif ($x == ($no_of_listings -1)    
	} // end for ($x = 0; $x < $no_of_listings; $x++)

	new productListingTplBox($list_box_contents);

} else {
	$list_box_contents = array();

	$list_box_contents[0] = array('params' => 'class="productListing-odd"');
	$list_box_contents[0][] = array('params' => 'class="productListing-data"',
                                 'text' => TEXT_NO_PRODUCTS);

	new productListingBox($list_box_contents);
}

  if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>

<table border="0" width="100%" cellspacing="0" cellpadding="2">
<tr>
  <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
  <td class="smallText" align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y','products_id','sort'))); // sort was added in this file, no point here ?></td>
</tr>
 <?php if ($add_multiple == true){
?>
  <tr> 
    <td align="left" class="main">&#160;</td>
    <td align="right" class="main"><?php echo tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART); // added end of form here 
    ?></form></td> 
  </tr> 
<?php } ?>
</table>
<?php
  }
}
?>

