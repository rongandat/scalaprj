<?php
/*
  $Id: product_listing.php, v1.44 2003/06/09 22:49:43 hpdl Exp $
  
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
    $thumb_product_with = 250;
    $thumb_product_height = 250;
//if number of column per row is 1, include the original product_listing.php
  if (PRODUCT_LIST_NUMCOL == 1) {
      include(dirname(__FILE__).'/product_listing.php');
  } else {  
    $list_box_contents = array();
    $list_box_contents[] = array('params' => 'class="productListing-heading"');
    $cur_row = sizeof($list_box_contents) - 1;

  // three variables that determine a certain output
    $use_tr_for_buy_now_button = false;
    $add_multiple = false;
    $use_of_attributes = false;

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
      
        case 'PRODUCT_LIST_BUY_NOW':
          $use_tr_for_buy_now_button = true;
          break;
      }
    }

    $listing_split = new splitPageResults($listing_sql, MAX_DISPLAY_SEARCH_RESULTS, 'p.products_id');

    if ( ($listing_split->number_of_rows > 0) && ( (PREV_NEXT_BAR_LOCATION == '1') || (PREV_NEXT_BAR_LOCATION == '3') ) ) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
    <td class="smallText cya-product-listing-paging" align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y', 'products_id'))); ?></td>
  </tr>
</table>
<?php
  }

  $list_box_contents = array();
   
  if ($listing_split->number_of_rows > 0) {
    
    if (PRODUCT_LIST_NUMCOL <= 0) {
        $colnum = 3;
        $tdsize = floor(100/3);
    } else {
        $colnum = PRODUCT_LIST_NUMCOL;
        
        $tdsize = floor(100/PRODUCT_LIST_NUMCOL);
    }
    $row = 0;
    $column = 0;
    
    $listing_query = tep_db_query($listing_split->sql_query);
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

    $counter = 0;
    $class_for_buy_now = 'class="productListing-data" width="' . $tdsize . '%"';
    for ($x = 0; $x < $no_of_listings; $x++) {
      if ($x % PRODUCT_LIST_NUMCOL == 0) { // start of new row
        if (($counter+1)/2 == floor(($counter+1)/2)) { // start with the background color productListing-odd
        //if ($counter/2 == floor($counter/2)) { // if you want to start with the background color productListing-even use this
          $list_box_contents[$row] = array('params' => 'class="productListing-even"');
          $class_for_buy_now_row = 'class="productListing-even"';
         } else {
           $list_box_contents[$row] = array('params' => 'class="productListing-odd"');
           $class_for_buy_now_row = 'class="productListing-odd"';
         }
      } // end if ($x % PRODUCT_LIST_NUMCOL == 0)

      $product_contents = array();
      for ($col=0, $n=sizeof($column_list); $col<$n; $col++) {
        $lc_align = '';
        
        switch ($column_list[$col]) {
          
          case 'PRODUCT_LIST_MODEL':
            $lc_align = '';
            $lc_text = '&nbsp;' . $listing[$x]['products_model'] . '&nbsp;';
            break;
            
          case 'PRODUCT_LIST_NAME':
            $lc_align = '';
            $view_stock_qtpro = '';
            if (cya_is_checked_qtpro()){
                $view_stock_qtpro = '<br><strong>Stock: ' . $listing[$x]['products_quantity'] ."</strong>";
            }
            $view_product_model = '';
            if ($listing[$x]['products_model']){
                $view_product_model = '<br>Code: ' . $listing[$x]['products_model'];
            }
            if (isset($_GET['manufacturers_id'])) {
                $lc_text = '<a class="" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&products_id=' . $listing[$x]['products_id']) . '">' . $listing[$x]['products_name'] . '</a>';
            } else {
                $lc_text = '&nbsp;<a class="cya-name-product" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id']) . '">' . $listing[$x]['products_name'] . '</a>' .$view_product_model .  $view_stock_qtpro;
            }
            break;
            
          case 'PRODUCT_LIST_MANUFACTURER':
            $lc_align = '';
            $lc_text = '&nbsp;<a class="" href="' . tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $listing[$x]['manufacturers_id']) . '">' . $listing[$x]['manufacturers_name'] . '</a>&nbsp;';
            break;
            
          case 'PRODUCT_LIST_PRICE':
              $lc_text = '';
              break;
            $lc_align = 'right';
            if (tep_not_null($listing[$x]['specials_new_products_price'])) {
                $lc_text = '&nbsp;<s>' .  $currencies->display_price($listing[$x]['products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id']), 1, "", $listing[$x]['products_id']) . '</s>&nbsp;&nbsp;<span class="productSpecialPrice">' . $currencies->display_price($listing[$x]['specials_new_products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) . '</span>&nbsp;';
            } else {
                $lc_text = '&nbsp;' . $currencies->display_price($listing[$x]['products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id']), 1, "", $listing[$x]['products_id']) . '&nbsp;';
            }
            break;
            
          case 'PRODUCT_LIST_QUANTITY':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_quantity'] . '&nbsp;';
            break;
          
          case 'PRODUCT_LIST_WEIGHT':
            $lc_align = 'right';
            $lc_text = '&nbsp;' . $listing[$x]['products_weight'] . '&nbsp;';
            break;
            
          case 'PRODUCT_LIST_IMAGE':
            $lc_align = 'center';
            if (isset($_GET['manufacturers_id'])) {
                $lc_text = '<a class="preload" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'manufacturers_id=' . (int)$_GET['manufacturers_id'] . '&products_id=' . $listing[$x]['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], $thumb_product_with, $thumb_product_height) . '</a>';
            } else {
                $lc_text = '<div class="cya-pro-quick-action-par"><div class="cya-pro-quick-action">&nbsp;<a data-id="'.$listing[$x]['products_id'].'" href="javascript:void(0);" class="cya-addfav"></a>&nbsp;<a onclick="fill_quickview(\''.$listing[$x]['products_id'].'\')" href="#quickview" class="quickview nyroModal"></a></div><a class="preload" href="' . tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id']) . '">' . tep_image(DIR_WS_IMAGES . $listing[$x]['products_image'], $listing[$x]['products_name'], $thumb_product_with, $thumb_product_height) . '</a></div>&nbsp;';
                $lc_text .= '<input type="hidden" value="'.$listing[$x]['products_id'].'" id="productname_'.$x.'">';
                $lc_text .= '<input type="hidden" value="'.htmlspecialchars($listing[$x]['products_name']).'" name="product_name['.$listing[$x]['products_id'].']">';
                $lc_text .= '<input type="hidden" value="'.htmlspecialchars($listing[$x]['products_description']).'" name="product_description['.$listing[$x]['products_id'].']">';
                $lc_text .= '<input type="hidden" value="'.$currencies->display_price($listing[$x]['products_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id']), 1, "", $listing[$x]['products_id']).'" name="product_price['.$listing[$x]['products_id'].']">';
            }
            break;


          case 'PRODUCT_LIST_BUY_NOW':
            // this button will be in a separate table row for better aligning
#            $buy_now_button_array[] = '<a class="remote" href="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action','sort','products_id')) . 'action=buy_now&products_id=' . $listing[$x]['products_id']) . '">' . tep_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW, 'style="padding-top: 5px;"') . '</a>&nbsp;';
            //$buy_now_button_array[] = '<a class="remote" href="' .tep_href_link(FILENAME_PRODUCT_INFO, ($cPath ? 'cPath=' . $cPath . '&' : '') . 'products_id=' . $listing[$x]['products_id'])  . '">' . tep_image_button('button_buy_now.gif', IMAGE_BUTTON_BUY_NOW, 'style="padding-top: 5px;"') . '</a>&nbsp;';
            $lc_text = ''; // otherwise the previous $lc_text will be outputted again 
            break;
            
          // Begin Buy Now button with attributes and quantity mod 
          // Begin Add Multiple  with attributes Contrib
          case 'PRODUCT_LIST_MULTIPLE': 
            $lc_align = 'right'; 
            $lc_valign = 'top'; 
            $lc_text = (TABLE_HEADING_MULTIPLE . tep_draw_input_field('Qty_ProdId_' . $listing[$x]['products_id'], '0', 'size="4"'));
            if ((int)$listing[$x]['total'] > 0) {
              $lc_text .= '<table border="0" cellpadding="0" cellspacing"0">';
              $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $listing[$x]['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'");
              while ($products_options_name = tep_db_fetch_array($products_options_name_query)) {
                $selected_attribute = false;
                $products_options_array = array();
                $lc_text .= '<tr><td class="main">' . $products_options_name['products_options_name'] . ':</td><td>' . "\n";
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
                    //if ((int) $products_options[$v]['options_values_price'] != '0') {
                      if (tep_not_null($listing[$x]['specials_new_products_price'])) {
                        $original_price = $listing[$x]['specials_new_products_price'];
                      } else {
                        $original_price = $listing[$x]['products_price'];
                      }
                      if ($products_options[$v]['price_prefix'] == "-") { // in case price lowers, don't add values, subtract 
                        $show_price = 0.0 + $original_price - $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
                      } else {
                        $show_price = 0.0 + $original_price + $products_options[$v]['options_values_price']; // force float (in case) using the 0.0;
                      }
                      $options_text .= ' (' .  $currencies->display_price($show_price, tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
                    //}
                  } else {
                    if ($products_options[$v]['options_values_price'] != '0') {
                      $options_text .= ' (' . $products_options[$v]['price_prefix'] . $currencies->display_price($products_options[$v]['options_values_price'], tep_get_tax_rate($listing[$x]['products_tax_class_id'])) .') ';
                    } 
                  }
                  $products_options_array[] = array('id' => $products_options[$v]['products_options_values_id'], 'text' => $options_text);
                }  // end for ($v = 0 ; $v < count($products_options); $v++)

                $lc_text .= tep_draw_pull_down_menu('id_'.$listing[$x]['products_id'].'[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute);
                $lc_text .= '</td></tr>';
              }
              $lc_text .= '</table>';
            }
            break;
            
          case 'PRODUCT_LIST_BUY_NOW_MULTIPLE': 
            $lc_align = 'right'; 
            $lc_valign = 'top'; 
            $lc_text = '<form name="buy_now_' . $listing[$x]['products_id'] . '" method="post" action="' . tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action','sort','products_id')) . 'action=buy_now_form', 'NONSSL') . '">';
            $lc_text .= (TABLE_HEADING_MULTIPLE) . '<input type="text" name="cart_quantity" value="1" maxlength="6" size="4">'; 
            if ((int)$listing[$x]['total'] > 0) {
              $lc_text .= '<table border="0" cellpadding="0" cellspacing"0">'; 
              $products_options_name_query = tep_db_query("select distinct popt.products_options_id, popt.products_options_name from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_ATTRIBUTES . " patrib where patrib.products_id='" . $listing[$x]['products_id'] . "' and patrib.options_id = popt.products_options_id and popt.language_id = '" . $languages_id . "'"); 
              while ($products_options_name = tep_db_fetch_array($products_options_name_query)) { 
                  $selected_attribute = false; 
                  $products_options_array = array();
                  $lc_text .= '<tr><td class="main">' . $products_options_name['products_options_name'] . ':</td><td>' . "\n";
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
                        if ($products_options[$v]['price_prefix'] == "-") { // in case price lowers, don't add values, subtract 
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

                  $lc_text .= tep_draw_pull_down_menu('id[' . $products_options_name['products_options_id'] . ']', $products_options_array, $selected_attribute); 
                  $lc_text .= '</td></tr>'; 
                } 
                $lc_text .= '</table>'; 
                $lc_text .= tep_draw_hidden_field('products_id', $listing[$x]['products_id']) . tep_image_submit('button_buy_now.gif', TEXT_BUY . $listing[$x]['products_name'] . TEXT_NOW);
        
              } // end if ((int)$listing[$x]['total'] > 0)
              if ((int)$listing[$x]['total'] == 0) { 
                $lc_text .= '<br>&nbsp;';
                $lc_text .= tep_draw_hidden_field('products_id', $listing[$x]['products_id']) . tep_image_submit('button_buy_now.gif', TEXT_BUY . $listing[$x]['products_name'] . TEXT_NOW);
                $lc_text .= '<br>&nbsp;';
                $lc_text .= '<table border="0" cellpadding="0" cellspacing"0"><tr><td class="main"></td><td></td></tr></table>';
              }
              $lc_text .= '</form>'; 
              break;
              
            // End Add Multiple mod
            default: $lc_text = '';
          }
        $product_contents[] = $lc_text;
      }
      $lc_text = implode('<br>', $product_contents);
      $list_box_contents[$row][$column] = array(
        'align' => 'center',
        'valign' => $lc_valign,
        'params' => 'class="productListing-data" width="'.$tdsize.'%"',
        'text'  => $lc_text
      );
        
      $column ++;
       
      if ($x == ($no_of_listings -1)) {
        $last_column = ($x % PRODUCT_LIST_NUMCOL); // x modulus number of columns
        // fill up the remainder of the table row with empty cells
        for ($column = ($last_column + 1) ; $column < $colnum; $column++) {
          $list_box_contents[$row][$column] = array(
            'align' => 'center',
            'valign' => $lc_valign,
            'params' => 'class="productListing-data" width="'.$tdsize.'%"',
            'text'  => "&#160;");
          }
        } 
        
        if ($column >= $colnum && $x < ($no_of_listings -1)) {
          $row ++; // we start a new tr here  with $list_box_contents unless we already listed all products
          // $list_box_contents[$row] = array('params' => $class_for_buy_now);
          $column = 0;
          $counter++; // counter only goes up after the buy now buttons have been outputted, counts the real rows
          if ($use_tr_for_buy_now_button == true) {
            // make sure all data cells per row are filled
            $last_column = sizeof($buy_now_button_array);
            for ($zz = $last_column ; $zz < PRODUCT_LIST_NUMCOL; $zz++) {
              $buy_now_button_array[] = "&#160;";
            }
            $list_box_contents[$row] = array('params' => $class_for_buy_now_row);
            foreach ($buy_now_button_array as $column1 => $lc_text1) {
              $list_box_contents[$row][$column1] = array(
                'align' => 'center',
                'params' => 'class="productListing-data"',
                'text'  => $lc_text1
              );
            }
            unset($buy_now_button_array);
            $row ++;
          } // end if ($use_tr_for_buy_now_button == true)
        // output the last row with buy now buttons if needed
        } elseif ($x == ($no_of_listings -1) && $use_tr_for_buy_now_button == true) { 
          $row ++; // we start a new tr here with $list_box_contents for the last row with buy now buttons
          // make sure all data cells per row are filled
          $last_column = sizeof($buy_now_button_array);
          for ($zz = $last_column ; $zz < PRODUCT_LIST_NUMCOL; $zz++) {
            $buy_now_button_array[] = "&#160;";
          }
          $list_box_contents[$row] = array('params' => $class_for_buy_now_row);
          foreach ($buy_now_button_array as $column1 => $lc_text1) {
            $list_box_contents[$row][$column1] = array(
              'align' => 'center',
              'params' => $class_for_buy_now,
              'text'  => $lc_text1
            );
          }
          unset($buy_now_button_array);
        } // end elseif ($x == ($no_of_listings -1) && $use_tr_for_buy_now_button == true)
      } // end for ($x = 0; $x < $no_of_listings; $x++)

      new productListingBox($list_box_contents);

    } else {
      $list_box_contents = array();

      //$list_box_contents[0] = array('params' => 'class="productListing-odd"');
      $list_box_contents[0][] = array(
        'params' => 'class="productListing-data"',
        'text' => TEXT_NO_PRODUCTS
      );

      new productListingBox($list_box_contents);
    }

    if ( ($listing_split->number_of_rows > 0) && ((PREV_NEXT_BAR_LOCATION == '2') || (PREV_NEXT_BAR_LOCATION == '3')) ) {
?>

<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr>
    <td class="smallText"><?php echo $listing_split->display_count(TEXT_DISPLAY_NUMBER_OF_PRODUCTS); ?></td>
    <td class="smallText cya-product-listing-paging" align="right"><?php echo TEXT_RESULT_PAGE . ' ' . $listing_split->display_links(MAX_DISPLAY_PAGE_LINKS, tep_get_all_get_params(array('page', 'info', 'x', 'y','products_id'))); ?></td>
  </tr>
  <?php if ($add_multiple == true){ ?>
  <tr> 
    <td align="left" class="main">&#160;</td>
    <td align="right" class="main"><?php echo tep_image_submit('button_in_cart.gif', IMAGE_BUTTON_IN_CART); ?></form></td> 
  </tr> 
  <?php } ?>
</table>
<?php
    }
  }
?>