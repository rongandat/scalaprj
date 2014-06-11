<?php
/*
  $Id: shopping_cart.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

  class shoppingCart_pr {
    var $contents, $total, $weight, $cartID, $content_type;

    function shoppingCart() {
//      $this->reset();
    }

    function restore_contents() {
      global $customer_id;

      if (!tep_session_is_registered('customer_id')) return false;

  if (is_numeric($_SESSION['new_customer_id'])) $cust_id=$_SESSION['new_customer_id'];
  else $cust_id=$customer_id;



// insert current cart contents in database
 if (!isset($_GET['customer_id']))
  {
      if (is_array($this->contents)) {
        $keys=array_keys($this->contents);
        reset($this->contents);

        foreach ($keys as $key) {
        
        while (list($products_id, ) = each($this->contents[$key])) {
          $qty = $this->contents[$key][$products_id]['qty'];
          $product_query = tep_db_query("select products_id from " . TABLE_CUSTOMERS_BASKET_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id) . "' and project_id='".$key."'");
          if (!tep_db_num_rows($product_query)) {
            tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_PR . " (customers_id, products_id, customers_basket_quantity, customers_basket_date_added, project_id) values ('" . (int)$cust_id . "', '" . tep_db_input($products_id) . "', '" . tep_db_input($qty) . "', '" . date('Ymd') . "', '".$key."')");
            if (isset($this->contents[$key][$products_id]['attributes'])) {
              reset($this->contents[$key][$products_id]['attributes']);
              while (list($option, $value) = each($this->contents[$key][$products_id]['attributes'])) {
                tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " (customers_id, products_id, products_options_id, products_options_value_id, project_id) values ('" . (int)$cust_id . "', '" . tep_db_input($products_id) . "', '" . (int)$option . "', '" . (int)$value . "', '".$key."')");
              }
            }
          } else {
            tep_db_query("update " . TABLE_CUSTOMERS_BASKET_PR . " set customers_basket_quantity = '" . tep_db_input($qty) . "' where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id) . "' and project_id='".$key."'");
          }
        }
       }
      }
   }
// reset per-session cart contents, but not the database contents
      $this->reset(false);

      $products_query = tep_db_query("select products_id, customers_basket_quantity, project_id from " . TABLE_CUSTOMERS_BASKET_PR . " where customers_id = '" . (int)$cust_id . "'");
      while ($products = tep_db_fetch_array($products_query)) {
        $this->contents[$products['project_id']][$products['products_id']] = array('qty' => $products['customers_basket_quantity']);
// attributes
        $attributes_query = tep_db_query("select products_options_id, products_options_value_id, project_id from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products['products_id']) . "'");
        while ($attributes = tep_db_fetch_array($attributes_query)) {
          $this->contents[$products['project_id']][$products['products_id']]['attributes'][$attributes['products_options_id']] = $attributes['products_options_value_id'];
        }
      }

      $this->cleanup();
    }

    function reset($reset_database = false) {
      global $customer_id;
      return true;

      $this->contents = array();
      $this->total = 0;
      $this->weight = 0;
      $this->content_type = false;

      if (tep_session_is_registered('customer_id') && ($reset_database == true)) {
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_PR . " where customers_id = '" . (int)$cust_id . "'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " where customers_id = '" . (int)$cust_id . "'");
      }

      unset($this->cartID);
      if (tep_session_is_registered('cartID')) tep_session_unregister('cartID');
    }

    function add_cart($products_id, $qty = '1', $attributes = '', $notify = true) {
      global $new_products_id_in_cart, $customer_id;

  if (is_numeric($_SESSION['new_customer_id'])) $cust_id=$_SESSION['new_customer_id'];
  else $cust_id=$customer_id;

      $products_id_string = tep_get_uprid($products_id, $attributes);
      $products_id = tep_get_prid($products_id_string);

      if (defined('MAX_QTY_IN_CART') && (MAX_QTY_IN_CART > 0) && ((int)$qty > MAX_QTY_IN_CART)) {
        $qty = MAX_QTY_IN_CART;
      }

      $attributes_pass_check = true;

      if (is_array($attributes)) {
        reset($attributes);
        while (list($option, $value) = each($attributes)) {
          if (!is_numeric($option) || !is_numeric($value)) {
            $attributes_pass_check = false;
            break;
          }
        }
      }

      if (is_numeric($products_id) && is_numeric($qty) && ($attributes_pass_check == true)) {

        $check_product_query = tep_db_query("select products_status from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id . "'");
        $check_product = tep_db_fetch_array($check_product_query);

        if (($check_product !== false) && ($check_product['products_status'] == '1')) {
          if ($notify == true) {
            $new_products_id_in_cart = $products_id;
            tep_session_register('new_products_id_in_cart');
          }

          if ($this->in_cart($products_id_string)) {

            $this->update_quantity($products_id_string, $qty, $attributes);
          } else {
            $this->contents[$_REQUEST['project_id']][$products_id_string] = array('qty' => (int)$qty);
// insert into database

            if (tep_session_is_registered('customer_id')) { 
		tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_PR . " (customers_id, products_id, customers_basket_quantity, customers_basket_date_added, project_id) values ('" . (int)$cust_id . "', '" . tep_db_input($products_id_string) . "', '" . (int)$qty . "', '" . date('Ymd') . "', '".$_REQUEST['project_id']."')");
	    }


            if (is_array($attributes)) {
              reset($attributes);
              while (list($option, $value) = each($attributes)) {
                $this->contents[$_REQUEST['project_id']][$products_id_string]['attributes'][$option] = $value;
// insert into database
                if (tep_session_is_registered('customer_id')) tep_db_query("insert into " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " (customers_id, products_id, products_options_id, products_options_value_id, project_id) values ('" . (int)$cust_id . "', '" . tep_db_input($products_id_string) . "', '" . (int)$option . "', '" . (int)$value . "', '".$_REQUEST['project_id']."')");
              }
            }
          }

          $this->cleanup();

// assign a temporary unique ID to the order contents to prevent hack attempts during the checkout procedure
          $this->cartID = $this->generate_cart_id();
        }
      }
    }

    function update_quantity($products_id, $quantity = '', $attributes = '') {
      global $customer_id;

  if (is_numeric($_SESSION['new_customer_id'])) $cust_id=$_SESSION['new_customer_id'];
  else $cust_id=$customer_id;


      $products_id_string = tep_get_uprid($products_id, $attributes);
      $products_id = tep_get_prid($products_id_string);

      if (defined('MAX_QTY_IN_CART') && (MAX_QTY_IN_CART > 0) && ((int)$quantity > MAX_QTY_IN_CART)) {
        $quantity = MAX_QTY_IN_CART;
      }

      $attributes_pass_check = true;

      if (is_array($attributes)) {
        reset($attributes);
        while (list($option, $value) = each($attributes)) {
          if (!is_numeric($option) || !is_numeric($value)) {
            $attributes_pass_check = false;
            break;
          }
        }
      }

      if (is_numeric($products_id) && isset($this->contents[$_REQUEST['project_id']][$products_id_string]) && is_numeric($quantity) && ($attributes_pass_check == true)) {
        $this->contents[$_REQUEST['project_id']][$products_id_string] = array('qty' => (int)$quantity);
// update database
        if (tep_session_is_registered('customer_id')) tep_db_query("update " . TABLE_CUSTOMERS_BASKET_PR . " set customers_basket_quantity = '" . (int)$quantity . "' where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id_string) . "' and project_id='".$_REQUEST['project_id']."'");

        if (is_array($attributes)) {
          reset($attributes);
          while (list($option, $value) = each($attributes)) {
            $this->contents[$_REQUEST['project_id']][$products_id_string]['attributes'][$option] = $value;
// update database
            if (tep_session_is_registered('customer_id')) tep_db_query("update " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " set products_options_value_id = '" . (int)$value . "' where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id_string) . "' and project_id='".$_REQUEST['project_id']."' and products_options_id = '" . (int)$option . "'");
          }
        }
      }
    }

    function cleanup() {
      global $customer_id;   
      return true;
      reset($this->contents[$_REQUEST['project_id']]);
      while (list($key,) = each($this->contents[$_REQUEST['project_id']])) {
        if ($this->contents[$_REQUEST['project_id']][$key]['qty'] < 1) {
          unset($this->contents[$_REQUEST['project_id']][$key]);
// remove from database
          if (tep_session_is_registered('customer_id')) {
            tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($key) . "'");
            tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($key) . "'");
          }
        }
      }
    }

    function count_contents() {  // get total number of items in cart 
      $total_items = 0;

      if (is_array($this->contents[$_REQUEST['project_id']])) {
        reset($this->contents[$_REQUEST['project_id']]);
//        while (list($products_id, ) = each($this->contents[$_REQUEST['project_id']])) {
         foreach ($this->contents[$_REQUEST['project_id']] as $products_id=>$val) {
          $total_items += $this->get_quantity($products_id);
        }
      }

      return $total_items;
    }

    function get_quantity($products_id) {
      if (isset($this->contents[$_REQUEST['project_id']][$products_id])) {
        return $this->contents[$_REQUEST['project_id']][$products_id]['qty'];
      } else {
        return 0;
      }
    }

    function in_cart($products_id) {
      if (isset($this->contents[$_REQUEST['project_id']][$products_id])) {
        return true;
      } else {
        return false;
      }
    }

    function remove($products_id) {
      global $customer_id;

  if (is_numeric($_SESSION['new_customer_id'])) $cust_id=$_SESSION['new_customer_id'];
  else $cust_id=$customer_id;


      unset($this->contents[$_REQUEST['project_id']][$products_id]);
// remove from database
      if (tep_session_is_registered('customer_id')) {
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id) . "' and project_id='".$_REQUEST['project_id']."'");
        tep_db_query("delete from " . TABLE_CUSTOMERS_BASKET_ATTRIBUTES_PR . " where customers_id = '" . (int)$cust_id . "' and products_id = '" . tep_db_input($products_id) . "' and project_id='".$_REQUEST['project_id']."'");
      }

// assign a temporary unique ID to the order contents to prevent hack attempts during the checkout procedure
      $this->cartID = $this->generate_cart_id();
    }

    function remove_all() {
      $this->reset();
    }

    function get_product_id_list() {
      $product_id_list = '';
      if (is_array($this->contents[$_REQUEST['project_id']])) {
        reset($this->contents[$_REQUEST['project_id']]);
//        while (list($products_id, ) = each($this->contents[$_REQUEST['project_id']])) {
       foreach ($this->contents[$_REQUEST['project_id']] as $products_id=>$val) {
          $product_id_list .= ', ' . $products_id;
        }
      }

      return substr($product_id_list, 2);
    }

    function calculate() {
      global $currencies;

      $this->total = 0;
      $this->weight = 0;

      if (!is_array($this->contents[$_REQUEST['project_id']])) return 0;

      reset($this->contents);


//      while (list($products_id, ) = each($this->contents[$_REQUEST['project_id']])) {
        foreach ($this->contents[$_REQUEST['project_id']] as $products_id=>$val) {
        $qty = $this->contents[$_REQUEST['project_id']][$products_id]['qty'];
// products price
        $product_query = tep_db_query("select products_id, products_price, products_tax_class_id, products_weight from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id . "'");
        if ($product = tep_db_fetch_array($product_query)) {
          $prid = $product['products_id'];
          $products_tax = tep_get_tax_rate($product['products_tax_class_id']);
          $products_price = $product['products_price'];
          $products_weight = $product['products_weight'];

          $specials_query = tep_db_query("select specials_new_products_price from " . TABLE_SPECIALS . " where products_id = '" . (int)$prid . "' and status = '1'");
          if (tep_db_num_rows ($specials_query)) {
            $specials = tep_db_fetch_array($specials_query);
            $products_price = $specials['specials_new_products_price'];
          }

          $this->total += $currencies->calculate_price($products_price, $products_tax, $qty, "", $prid);
          $this->weight += ($qty * $products_weight);

        }

// attributes price
        if (isset($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
          reset($this->contents[$_REQUEST['project_id']][$products_id]['attributes']);
          while (list($option, $value) = each($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
            $attribute_price_query = tep_db_query("select options_values_price, price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id = '" . (int)$prid . "' and options_id = '" . (int)$option . "' and options_values_id = '" . (int)$value . "'");
            $attribute_price = tep_db_fetch_array($attribute_price_query);
// Actual Attribute Price

            $price_prefix = $attribute_price['price_prefix'];

            $option_price = $attribute_price['options_values_price'];

            $products_query = tep_db_query("select products_price from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id . "'");

            $products_stuff = tep_db_fetch_array($products_query);

            $products_price = $products_stuff['products_price'];

            if ($price_prefix == '+') {

                 $this->total += $qty * tep_add_tax($option_price, $products_tax);

            } elseif ($price_prefix == '-') {

                 $this->total -= $qty * tep_add_tax($option_price, $products_tax);

            } else {

                 $this->total += $qty * tep_add_tax(tep_adjust_price($option_price, $products_price), $products_tax);

            }

// Actual Attribute Price End
          }
        }
      }
    }

    function attributes_price($products_id) {
      $attributes_price = 0;

      if (isset($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
        reset($this->contents[$_REQUEST['project_id']][$products_id]['attributes']);
        while (list($option, $value) = each($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
          $attribute_price_query = tep_db_query("select options_values_price, price_prefix from " . TABLE_PRODUCTS_ATTRIBUTES . " where products_id = '" . (int)$products_id . "' and options_id = '" . (int)$option . "' and options_values_id = '" . (int)$value . "'");
          $attribute_price = tep_db_fetch_array($attribute_price_query);
// Actual Attribute Price

          $price_prefix = $attribute_price['price_prefix'];

          $option_price = $attribute_price['options_values_price'];

          $products_query = tep_db_query("select products_price from " . TABLE_PRODUCTS . " where products_id = '" . (int)$products_id . "'");

          $products_stuff = tep_db_fetch_array($products_query);

          $products_price = $products_stuff['products_price'];



          if ($price_prefix == '+') {

            $attributes_price += $option_price;

          } elseif ($price_prefix == '-') {

            $attributes_price -= $option_price;

          } else {

            $attributes_price += tep_adjust_price($option_price, $products_price);

          }

// Actual Attribute Price
        }
      }

      return $attributes_price;
    }

    function get_products() {
      global $languages_id;

      #$price_rate=get_price_rate($_SESSION['customer_id']);
      
      if (!is_array($this->contents[$_REQUEST['project_id']])) return false;

      $products_array = array();
      reset($this->contents[$_REQUEST['project_id']]);
//      while (list($products_id, ) = each($this->contents[$_REQUEST['project_id']])) {
      foreach ($this->contents[$_REQUEST['project_id']] as $products_id=>$val) {
        $products_query = tep_db_query("select p.products_id, pd.products_name, p.products_model, p.products_image, p.products_price, p.products_weight, p.products_tax_class_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$products_id . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
        if ($products = tep_db_fetch_array($products_query)) {
          $prid = $products['products_id'];
          $products_price = $products['products_price'];

          $specials_query = tep_db_query("select specials_new_products_price from " . TABLE_SPECIALS . " where products_id = '" . (int)$prid . "' and status = '1'");
          if (tep_db_num_rows($specials_query)) {
            $specials = tep_db_fetch_array($specials_query);
            $products_price = $specials['specials_new_products_price'];
          }

          $products_array[] = array('id' => $products_id,
                                    'name' => $products['products_name'],
                                    'model' => $products['products_model'],
                                    'image' => $products['products_image'],
                                    'price' => $products_price,
                                    'quantity' => $this->contents[$_REQUEST['project_id']][$products_id]['qty'],
                                    'weight' => $products['products_weight'],
                                    'final_price' => ($products_price + $this->attributes_price($products_id)),
                                    'tax_class_id' => $products['products_tax_class_id'],
                                    'attributes' => (isset($this->contents[$_REQUEST['project_id']][$products_id]['attributes']) ? $this->contents[$_REQUEST['project_id']][$products_id]['attributes'] : ''));
        }
      }

      return array_reverse($products_array);
    }

    function show_total() {
      $this->calculate();

      return $this->total;
    }

    function show_weight() {
      $this->calculate();

      return $this->weight;
    }

    function generate_cart_id($length = 5) {
      return tep_create_random_value($length, 'digits');
    }

    function get_content_type() {
      $this->content_type = false;

      if ( (DOWNLOAD_ENABLED == 'true') && ($this->count_contents() > 0) ) {
        reset($this->contents[$_REQUEST['project_id']]);
        while (list($products_id, ) = each($this->contents[$_REQUEST['project_id']])) {
          if (isset($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
            reset($this->contents[$_REQUEST['project_id']][$products_id]['attributes']);
            while (list(, $value) = each($this->contents[$_REQUEST['project_id']][$products_id]['attributes'])) {
              $virtual_check_query = tep_db_query("select count(*) as total from " . TABLE_PRODUCTS_ATTRIBUTES . " pa, " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad where pa.products_id = '" . (int)$products_id . "' and pa.options_values_id = '" . (int)$value . "' and pa.products_attributes_id = pad.products_attributes_id");
              $virtual_check = tep_db_fetch_array($virtual_check_query);

              if ($virtual_check['total'] > 0) {
                switch ($this->content_type) {
                  case 'physical':
                    $this->content_type = 'mixed';

                    return $this->content_type;
                    break;
                  default:
                    $this->content_type = 'virtual';
                    break;
                }
              } else {
                switch ($this->content_type) {
                  case 'virtual':
                    $this->content_type = 'mixed';

                    return $this->content_type;
                    break;
                  default:
                    $this->content_type = 'physical';
                    break;
                }
              }
            }
          } else {
            switch ($this->content_type) {
              case 'virtual':
                $this->content_type = 'mixed';

                return $this->content_type;
                break;
              default:
                $this->content_type = 'physical';
                break;
            }
          }
        }
      } else {
        $this->content_type = 'physical';
      }

      return $this->content_type;
    }

    function unserialize($broken) {
      for(reset($broken);$kv=each($broken);) {
        $key=$kv['key'];
        if (gettype($this->$key)!="user function")
        $this->$key=$kv['value'];
      }
    }
    
    function cya_statistic_project($project_id, $cust_id) {
      global $languages_id;

      $list_all_sub = $this->cya_get_all_project_sub($project_id, $cust_id);
      $list_all_sub = explode('_', $list_all_sub);
      $list_all_sub[] = $project_id;
      
      $products_array = array();
      reset($this->contents[$project_id]);
      
      $result_statistic['price'] = 0.0;$result_statistic['count'] = 0;
      
      foreach ($list_all_sub as $one_project){
            if (!(int)$one_project) continue;
            foreach ($this->contents[$one_project] as $products_id=>$val) {
              $products_query = tep_db_query("select p.products_id, pd.products_name, p.products_model, p.products_image, p.products_price, p.products_weight, p.products_tax_class_id from " . TABLE_PRODUCTS . " p, " . TABLE_PRODUCTS_DESCRIPTION . " pd where p.products_id = '" . (int)$products_id . "' and pd.products_id = p.products_id and pd.language_id = '" . (int)$languages_id . "'");
              if ($products = tep_db_fetch_array($products_query)) {
                $prid = $products['products_id'];
                $products_price = $products['products_price'];

                $specials_query = tep_db_query("select specials_new_products_price from " . TABLE_SPECIALS . " where products_id = '" . (int)$prid . "' and status = '1'");
                if (tep_db_num_rows($specials_query)) {
                  $specials = tep_db_fetch_array($specials_query);
                  $products_price = $specials['specials_new_products_price'];
                }
                $result_statistic['price'] += $products_price;
                $result_statistic['count']++;
              }
            }
      }
      return $result_statistic;
    }
    
    function cya_get_all_project_sub($project_id, $cust_id) {
        
      $dbres=tep_db_query("select * from projects where parent_id='".$project_id."' and customer_id='".(int)$cust_id."'");
      
      while ($row=tep_db_fetch_array($dbres)) {
        $list_sub .= $row['id'] . '_';
        if ((int)$row['id']){
            $list_sub .= $this->cya_get_all_project_sub($row['id'], $cust_id);
        }
      }
      
      return $list_sub;
    }
  }
?>