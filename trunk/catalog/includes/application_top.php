<?php

/*

  $Id: application_top.php 1833 2008-01-30 22:03:30Z hpdl $



  osCommerce, Open Source E-Commerce Solutions

  http://www.oscommerce.com



  Copyright (c) 2008 osCommerce

  Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com



  Released under the GNU General Public License

*/

  error_reporting(E_ERROR);

  if ($_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest') {$AJAX=true; }

  else $AJAX=false;



// start the timer for the page parse time log

  define('PAGE_PARSE_START_TIME', microtime());



// set the level of error reporting

//  error_reporting(E_ALL & ~E_NOTICE);

  error_reporting(E_ERROR);



// mail lib

  require_once 'lib/swift_required.php';



// check support for register_globals

  if (function_exists('ini_get') && (ini_get('register_globals') == false) && (PHP_VERSION < 4.3) ) {

    exit('Server Requirement Error: register_globals is disabled in your PHP configuration. This can be enabled in your php.ini configuration file or in the .htaccess file in your catalog directory. Please use PHP 4.3+ if register_globals cannot be enabled on the server.');

  }



// Set the local configuration parameters - mainly for developers

  if (file_exists('includes/local/configure.php')) include('includes/local/configure.php');



// include server parameters

  require('includes/configure.php');



  if (strlen(DB_SERVER) < 1) {

    if (is_dir('install')) {

      header('Location: install/index.php');

    }

  }



// define the project version

  define('PROJECT_VERSION', 'osCommerce Online Merchant v2.2 RC2a');



// some code to solve compatibility issues

  require(DIR_WS_FUNCTIONS . 'compatibility.php');



// set the type of request (secure or not)

  $request_type = (getenv('HTTPS') == 'on') ? 'SSL' : 'NONSSL';



// set php_self in the local scope

  if (!isset($PHP_SELF)) $PHP_SELF = $HTTP_SERVER_VARS['PHP_SELF'];



  if ($request_type == 'NONSSL') {

    define('DIR_WS_CATALOG', DIR_WS_HTTP_CATALOG);

  } else {

    define('DIR_WS_CATALOG', DIR_WS_HTTPS_CATALOG);

  }



// include the list of project filenames

  require(DIR_WS_INCLUDES . 'filenames.php');



// include the list of project database tables

  require(DIR_WS_INCLUDES . 'database_tables.php');



// customization for the design layout

  define('BOX_WIDTH', 125); // how wide the boxes should be in pixels (default: 125)



// include the database functions

  require(DIR_WS_FUNCTIONS . 'database.php');







// make a connection to the database... now

  tep_db_connect() or die('Unable to connect to database server!');



// set the application parameters

  $configuration_query = tep_db_query('select configuration_key as cfgKey, configuration_value as cfgValue from ' . TABLE_CONFIGURATION);

  while ($configuration = tep_db_fetch_array($configuration_query)) {

    define($configuration['cfgKey'], $configuration['cfgValue']);

  }



// if gzip_compression is enabled, start to buffer the output

  if ( (GZIP_COMPRESSION == 'true') && ($ext_zlib_loaded = extension_loaded('zlib')) && (PHP_VERSION >= '4') ) {

    if (($ini_zlib_output_compression = (int)ini_get('zlib.output_compression')) < 1) {

      if (PHP_VERSION >= '4.0.4') {

        ob_start('ob_gzhandler');

      } else {

        include(DIR_WS_FUNCTIONS . 'gzip_compression.php');

        ob_start();

        ob_implicit_flush();

      }

    } else {

      ini_set('zlib.output_compression_level', GZIP_LEVEL);

    }

  }

//echo '1';

// set the HTTP GET parameters manually if search_engine_friendly_urls is enabled

  if (SEARCH_ENGINE_FRIENDLY_URLS == 'true') {

    if (strlen(getenv('PATH_INFO')) > 1) {

      $GET_array = array();

      $PHP_SELF = str_replace(getenv('PATH_INFO'), '', $PHP_SELF);

      $vars = explode('/', substr(getenv('PATH_INFO'), 1));

      for ($i=0, $n=sizeof($vars); $i<$n; $i++) {

        if (strpos($vars[$i], '[]')) {

          $GET_array[substr($vars[$i], 0, -2)][] = $vars[$i+1];

        } else {

          $HTTP_GET_VARS[$vars[$i]] = $vars[$i+1];

        }

        $i++;

      }



      if (sizeof($GET_array) > 0) {

        while (list($key, $value) = each($GET_array)) {

          $HTTP_GET_VARS[$key] = $value;

        }

      }

    }

  }



// define general functions used application-wide

  require(DIR_WS_FUNCTIONS . 'general.php');

  require(DIR_WS_FUNCTIONS . 'html_output.php');



// set the cookie domain

  $cookie_domain = (($request_type == 'NONSSL') ? HTTP_COOKIE_DOMAIN : HTTPS_COOKIE_DOMAIN);

  $cookie_path = (($request_type == 'NONSSL') ? HTTP_COOKIE_PATH : HTTPS_COOKIE_PATH);



// include cache functions if enabled

  if (USE_CACHE == 'true') include(DIR_WS_FUNCTIONS . 'cache.php');



// include shopping cart class

  require(DIR_WS_CLASSES . 'shopping_cart.php');



// include shopping cart class

  require(DIR_WS_CLASSES . 'shopping_cart_cs.php');



// include fav class

  require(DIR_WS_CLASSES . 'shopping_cart_fv.php');



// include fav class

  require(DIR_WS_CLASSES . 'shopping_cart_pr.php');



// include navigation history class

  require(DIR_WS_CLASSES . 'navigation_history.php');

//huyen - worketc

require(DIR_WS_CLASSES . 'worketc.php');





// check if sessions are supported, otherwise use the php3 compatible session class

  if (!function_exists('session_start')) {

    define('PHP_SESSION_NAME', 'osCsid');

    define('PHP_SESSION_PATH', $cookie_path);

    define('PHP_SESSION_DOMAIN', $cookie_domain);

    define('PHP_SESSION_SAVE_PATH', SESSION_WRITE_DIRECTORY);



    include(DIR_WS_CLASSES . 'sessions.php');

  }



// define how the session functions will be used

  require(DIR_WS_FUNCTIONS . 'sessions.php');



// set the session name and save path

  tep_session_name('osCsid');

  tep_session_save_path(SESSION_WRITE_DIRECTORY);







// set the session cookie parameters

   if (function_exists('session_set_cookie_params')) {

    session_set_cookie_params(0, $cookie_path, $cookie_domain);

  } elseif (function_exists('ini_set')) {

    ini_set('session.cookie_lifetime', '0');

    ini_set('session.cookie_path', $cookie_path);

    ini_set('session.cookie_domain', $cookie_domain);

  }



// set the session ID if it exists

   if (isset($HTTP_POST_VARS[tep_session_name()])) {

     tep_session_id($HTTP_POST_VARS[tep_session_name()]);

   } elseif ( ($request_type == 'SSL') && isset($HTTP_GET_VARS[tep_session_name()]) ) {

     tep_session_id($HTTP_GET_VARS[tep_session_name()]);

   }



// start the session

  $session_started = false;

  if (SESSION_FORCE_COOKIE_USE == 'True') {

    tep_setcookie('cookie_test', 'please_accept_for_session', time()+60*60*24*30, $cookie_path, $cookie_domain);



    if (isset($HTTP_COOKIE_VARS['cookie_test'])) {

      tep_session_start();

      $session_started = true;

    }

  } elseif (SESSION_BLOCK_SPIDERS == 'True') {

    $user_agent = strtolower(getenv('HTTP_USER_AGENT'));

    $spider_flag = false;



    if (tep_not_null($user_agent)) {

      $spiders = file(DIR_WS_INCLUDES . 'spiders.txt');



      for ($i=0, $n=sizeof($spiders); $i<$n; $i++) {

        if (tep_not_null($spiders[$i])) {

          if (is_integer(strpos($user_agent, trim($spiders[$i])))) {

            $spider_flag = true;

            break;

          }

        }

      }

    }



    if ($spider_flag == false) {

      tep_session_start();

      $session_started = true;

    }

  } else {

    tep_session_start();

    $session_started = true;

  }



  if ( ($session_started == true) && (PHP_VERSION >= 4.3) && function_exists('ini_get') && (ini_get('register_globals') == false) ) {

    extract($_SESSION, EXTR_OVERWRITE+EXTR_REFS);

  }



// set SID once, even if empty

  $SID = (defined('SID') ? SID : '');



// verify the ssl_session_id if the feature is enabled

  if ( ($request_type == 'SSL') && (SESSION_CHECK_SSL_SESSION_ID == 'True') && (ENABLE_SSL == true) && ($session_started == true) ) {

    $ssl_session_id = getenv('SSL_SESSION_ID');

    if (!tep_session_is_registered('SSL_SESSION_ID')) {

      $SESSION_SSL_ID = $ssl_session_id;

      tep_session_register('SESSION_SSL_ID');

    }



    if ($SESSION_SSL_ID != $ssl_session_id) {

      tep_session_destroy();

      tep_redirect(tep_href_link(FILENAME_SSL_CHECK));

    }

  }



// verify the browser user agent if the feature is enabled

  if (SESSION_CHECK_USER_AGENT == 'True') {

    $http_user_agent = getenv('HTTP_USER_AGENT');

    if (!tep_session_is_registered('SESSION_USER_AGENT')) {

      $SESSION_USER_AGENT = $http_user_agent;

      tep_session_register('SESSION_USER_AGENT');

    }



    if ($SESSION_USER_AGENT != $http_user_agent) {

      tep_session_destroy();

      tep_redirect(tep_href_link(FILENAME_LOGIN));

    }

  }



// verify the IP address if the feature is enabled

  if (SESSION_CHECK_IP_ADDRESS == 'True') {

    $ip_address = tep_get_ip_address();

    if (!tep_session_is_registered('SESSION_IP_ADDRESS')) {

      $SESSION_IP_ADDRESS = $ip_address;

      tep_session_register('SESSION_IP_ADDRESS');

    }



    if ($SESSION_IP_ADDRESS != $ip_address) {

      tep_session_destroy();

      tep_redirect(tep_href_link(FILENAME_LOGIN));

    }

  }



if (is_numeric($_SESSION['customer_id'])) {

 $dbres=tep_db_query("select active from customers where customers_id='".$_SESSION['customer_id']."'");

 $row=tep_db_fetch_array($dbres);

 if ($row['active']==0) tep_redirect("disabled.php");

}



 $row=tep_db_fetch_array(tep_db_query("select qtpro from customers where customers_id='".$_SESSION['customer_id']."'"));

 if ($row['qtpro']=="1") $QTPRO=true;

 else $QTPRO=false;



if (get_price_group_name($_SESSION['customer_id'])!="SL Staff" && MAINTENANCE_MODE=="true" && basename($_SERVER['SCRIPT_NAME'])!="login.php")

{

 tep_redirect("login.php");

}





// create the shopping cart & fix the cart if necesary

  if (tep_session_is_registered('cart') && is_object($cart)) {

    if (PHP_VERSION < 4) {

      $broken_cart = $cart;

      $cart = new shoppingCart;

      $cart->unserialize($broken_cart);

    }

  } else {

    tep_session_register('cart');

    $cart = new shoppingCart;

  }



// create the shopping cart & fix the cart if necesary

  if (tep_session_is_registered('cart_cs') && is_object($cart_cs)) {

    if (PHP_VERSION < 4) {

      $broken_cart_cs = $cart_cs;

      $cart_cs = new shoppingCart_cs;

      $cart_cs->unserialize($broken_cart_cs);

    }

  } else {

    tep_session_register('cart_cs');

    $cart_cs = new shoppingCart_cs;

  }



// create the shopping cart & fix the cart if necesary

  if (tep_session_is_registered('cart_fv') && is_object($cart_fv)) {

    if (PHP_VERSION < 4) {

      $broken_cart_fv = $cart_fv;

      $cart_fv = new shoppingCart_fv;

      $cart_fv->unserialize($broken_cart_fv);

    }

  } else {

    tep_session_register('cart_fv');

    $cart_fv = new shoppingCart_fv;

  }



// create the shopping cart & fix the cart if necesary

  if (tep_session_is_registered('cart_pr') && is_object($cart_pr)) {

    if (PHP_VERSION < 4) {

      $broken_cart_pr = $cart_pr;

      $cart_pr = new shoppingCart_pr;

      $cart_pr->unserialize($broken_cart_pr);

    }

  } else {

    tep_session_register('cart_pr');

    $cart_pr = new shoppingCart_pr;

  }







// include currencies class and create an instance

  require(DIR_WS_CLASSES . 'currencies.php');

  $currencies = new currencies();



// include the mail classes

  require(DIR_WS_CLASSES . 'mime.php');

  require(DIR_WS_CLASSES . 'email.php');



// set the language

  if (!tep_session_is_registered('language') || isset($HTTP_GET_VARS['language'])) {

    if (!tep_session_is_registered('language')) {

      tep_session_register('language');

      tep_session_register('languages_id');

    }



    include(DIR_WS_CLASSES . 'language.php');

    $lng = new language();



    if (isset($HTTP_GET_VARS['language']) && tep_not_null($HTTP_GET_VARS['language'])) {

      $lng->set_language($HTTP_GET_VARS['language']);

    } else {

      $lng->get_browser_language();

    }



    $language = $lng->language['directory'];
    

    $languages_id = $lng->language['id'];

  }



// include the language translations
  $language = 'english';
  require(DIR_WS_LANGUAGES . $language . '.php');


// currency

  if (!tep_session_is_registered('currency') || isset($HTTP_GET_VARS['currency']) || ( (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') && (LANGUAGE_CURRENCY != $currency) ) ) {

    if (!tep_session_is_registered('currency')) tep_session_register('currency');



    if (isset($HTTP_GET_VARS['currency']) && $currencies->is_set($HTTP_GET_VARS['currency'])) {

      $currency = $HTTP_GET_VARS['currency'];

    } else {

      $currency = (USE_DEFAULT_LANGUAGE_CURRENCY == 'true') ? LANGUAGE_CURRENCY : DEFAULT_CURRENCY;

    }

  }



// navigation history

  if (tep_session_is_registered('navigation')) {

    if (PHP_VERSION < 4) {

      $broken_navigation = $navigation;

      $navigation = new navigationHistory;

      $navigation->unserialize($broken_navigation);

    }

  } else {

    tep_session_register('navigation');

    $navigation = new navigationHistory;

  }

  if (isset($navigation)) $navigation->add_current_page();



// Shopping cart actions

  if (isset($HTTP_GET_VARS['action'])) {

// redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled

    if ($session_started == false) {

      tep_redirect(tep_href_link(FILENAME_COOKIE_USAGE));

    }



            if (DISPLAY_CART == 'true') {

              $goto =  FILENAME_SHOPPING_CART;

              $parameters = array('action', 'cPath', 'products_id', 'pid');

        /* Optional Related Products (ORP) */

            } elseif ($HTTP_GET_VARS['action'] == 'rp_buy_now') {

              $goto = FILENAME_PRODUCT_INFO;

              $parameters = array('action', 'pid', 'rp_products_id');

        //ORP: end

            } else {

              $goto = basename($PHP_SELF);

      if ($HTTP_GET_VARS['action'] == 'buy_now') {

        $parameters = array('action', 'pid', 'products_id');

      } else {

        $parameters = array('action', 'pid');

      }

    }

    switch ($HTTP_GET_VARS['action']) {

      // customer wants to update the product quantity in their shopping cart

      case 'update_product' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {

                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {

                                  $cart->remove($HTTP_POST_VARS['products_id'][$i]);

                                } else {

                                  if (PHP_VERSION < 4) {

                                    // if PHP3, make correction for lack of multidimensional array.

                                    reset($HTTP_POST_VARS);

                                    while (list($key, $value) = each($HTTP_POST_VARS)) {

                                      if (is_array($value)) {

                                        while (list($key2, $value2) = each($value)) {

                                          if (preg_match ("/(.*)\]\[(.*)/", $key2, $var)) {

                                            $id2[$var[1]][$var[2]] = $value2;

                                          }

                                        }

                                      }

                                    }

                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';

                                  } else {

                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';

                                  }

                                  $cart->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);

                                }

                              }



                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                              break;



      case 'update_product_cs' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {

                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {

                                  $cart_cs->remove($HTTP_POST_VARS['products_id'][$i]);

                                } else {

                                  if (PHP_VERSION < 4) {

                                    // if PHP3, make correction for lack of multidimensional array.

                                    reset($HTTP_POST_VARS);

                                    while (list($key, $value) = each($HTTP_POST_VARS)) {

                                      if (is_array($value)) {

                                        while (list($key2, $value2) = each($value)) {

                                          if (preg_match ("/(.*)\]\[(.*)/", $key2, $var)) {

                                            $id2[$var[1]][$var[2]] = $value2;

                                          }

                                        }

                                      }

                                    }

                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';

                                  } else {

                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';

                                  }

                                  $cart_cs->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);

                                }

                              }



                              tep_redirect(tep_href_link("shopping_cart_cs.php", tep_get_all_get_params($parameters)));

                              break;

      case 'update_product_fv' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {

                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {

                                  $cart_fv->remove($HTTP_POST_VARS['products_id'][$i]);

                                } else {

                                  if (PHP_VERSION < 4) {

                                    // if PHP3, make correction for lack of multidimensional array.

                                    reset($HTTP_POST_VARS);

                                    while (list($key, $value) = each($HTTP_POST_VARS)) {

                                      if (is_array($value)) {

                                        while (list($key2, $value2) = each($value)) {

                                          if (preg_match ("/(.*)\]\[(.*)/", $key2, $var)) {

                                            $id2[$var[1]][$var[2]] = $value2;

                                          }

                                        }

                                      }

                                    }

                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';

                                  } else {

                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';

                                  }

                                  $cart_fv->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);

                                }

                              }



                              tep_redirect(tep_href_link("shopping_cart_fv.php", tep_get_all_get_params($parameters)));

                              break;



      case 'update_product_pr' : for ($i=0, $n=sizeof($HTTP_POST_VARS['products_id']); $i<$n; $i++) {

                                if (in_array($HTTP_POST_VARS['products_id'][$i], (is_array($HTTP_POST_VARS['cart_delete']) ? $HTTP_POST_VARS['cart_delete'] : array()))) {

                                  $cart_pr->remove($HTTP_POST_VARS['products_id'][$i]);

                                } else {

                                  if (PHP_VERSION < 4) {

                                    // if PHP3, make correction for lack of multidimensional array.

                                    reset($HTTP_POST_VARS);

                                    while (list($key, $value) = each($HTTP_POST_VARS)) {

                                      if (is_array($value)) {

                                        while (list($key2, $value2) = each($value)) {

                                          if (preg_match ("/(.*)\]\[(.*)/", $key2, $var)) {

                                            $id2[$var[1]][$var[2]] = $value2;

                                          }

                                        }

                                      }

                                    }

                                    $attributes = ($id2[$HTTP_POST_VARS['products_id'][$i]]) ? $id2[$HTTP_POST_VARS['products_id'][$i]] : '';

                                  } else {

                                    $attributes = ($HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]]) ? $HTTP_POST_VARS['id'][$HTTP_POST_VARS['products_id'][$i]] : '';

                                  }

                                  $cart_pr->add_cart($HTTP_POST_VARS['products_id'][$i], $HTTP_POST_VARS['cart_quantity'][$i], $attributes, false);

                                }

                              }



                              tep_redirect(tep_href_link("shopping_cart_pr.php", tep_get_all_get_params($parameters)));

                              break;



      // customer adds a product from the products page

      case 'add_product' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {

//++++ QT Pro: Begin Changed code

                                $attributes=array();

                                if (isset($HTTP_POST_VARS['attrcomb']) && (preg_match("/^\d{1,10}-\d{1,10}(,\d{1,10}-\d{1,10})*$/",$HTTP_POST_VARS['attrcomb']))) {

                                  $attrlist=explode(',',$HTTP_POST_VARS['attrcomb']);

                                  foreach ($attrlist as $attr) {

                                    list($oid, $oval)=explode('-',$attr);

                                    if (is_numeric($oid) && $oid==(int)$oid && is_numeric($oval) && $oval==(int)$oval)

                                      $attributes[$oid]=$oval;

                                  }

                                }

                                if (isset($HTTP_POST_VARS['id']) && is_array($HTTP_POST_VARS['id'])) {

                                  foreach ($HTTP_POST_VARS['id'] as $key=>$val) {

                                    if (is_numeric($key) && $key==(int)$key && is_numeric($val) && $val==(int)$val)

                                      $attributes=$attributes + $HTTP_POST_VARS['id'];

                                  }

                                }

//print_r($attributes);

                                $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);								

//++++ QT Pro: End Changed Code



                              }

                              if ($AJAX) exit;

                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                              break;

    // BOF: Product Listing in Columns



    // add to cart



      // customer adds a product from the products page

      case 'add_product_cs' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {

//++++ QT Pro: Begin Changed code

                                $attributes=array();

                                if (isset($HTTP_POST_VARS['attrcomb']) && (preg_match("/^\d{1,10}-\d{1,10}(,\d{1,10}-\d{1,10})*$/",$HTTP_POST_VARS['attrcomb']))) {

                                  $attrlist=explode(',',$HTTP_POST_VARS['attrcomb']);

                                  foreach ($attrlist as $attr) {

                                    list($oid, $oval)=explode('-',$attr);

                                    if (is_numeric($oid) && $oid==(int)$oid && is_numeric($oval) && $oval==(int)$oval)

                                      $attributes[$oid]=$oval;

                                  }

                                }

                                if (isset($HTTP_POST_VARS['id']) && is_array($HTTP_POST_VARS['id'])) {

                                  foreach ($HTTP_POST_VARS['id'] as $key=>$val) {

                                    if (is_numeric($key) && $key==(int)$key && is_numeric($val) && $val==(int)$val)

                                      $attributes=$attributes + $HTTP_POST_VARS['id'];

                                  }

                                }



                                $cart_cs->add_cart($HTTP_POST_VARS['products_id'], $cart_cs->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);

//++++ QT Pro: End Changed Code



                              }

                              

                              tep_redirect(tep_href_link("shopping_cart_cs.php", tep_get_all_get_params($parameters)));

                              if ($AJAX) exit;

                              break;

    // BOF: Product Listing in Columns



      // customer adds a product from the products page

      case 'add_product_fv' :    if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {



//++++ QT Pro: Begin Changed code

                                $attributes=array();

                                if (isset($HTTP_POST_VARS['attrcomb']) && (preg_match("/^\d{1,10}-\d{1,10}(,\d{1,10}-\d{1,10})*$/",$HTTP_POST_VARS['attrcomb']))) {

                                  $attrlist=explode(',',$HTTP_POST_VARS['attrcomb']);

                                  foreach ($attrlist as $attr) {

                                    list($oid, $oval)=explode('-',$attr);

                                    if (is_numeric($oid) && $oid==(int)$oid && is_numeric($oval) && $oval==(int)$oval)

                                      $attributes[$oid]=$oval;

                                  }

                                }

                                if (isset($HTTP_POST_VARS['id']) && is_array($HTTP_POST_VARS['id'])) {

                                  foreach ($HTTP_POST_VARS['id'] as $key=>$val) {

                                    if (is_numeric($key) && $key==(int)$key && is_numeric($val) && $val==(int)$val)

                                      $attributes=$attributes + $HTTP_POST_VARS['id'];

                                  }

                                }



                                $cart_fv->add_cart($HTTP_POST_VARS['products_id'], $cart_fv->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);

//++++ QT Pro: End Changed Code



                              }

                              

                              tep_redirect(tep_href_link("shopping_cart_fv.php", tep_get_all_get_params($parameters)));

                              if ($AJAX) exit;

                              break;

    // BOF: Product Listing in Columns



      case 'add_product_pr' :   

	$attributes_array=array();

         if (strstr($HTTP_POST_VARS['products_id'], "{"))

	 {

          $attributes_check = true;

          $attributes_ids = '';

          $prid=$HTTP_POST_VARS['products_id'];

// strpos()+1 to remove up to and including the first { which would create an empty array element in explode()

          $attributes = explode('{', substr($prid, strpos($prid, '{')+1));



          for ($i=0, $n=sizeof($attributes); $i<$n; $i++) {

            $pair = explode('}', $attributes[$i]);



            if (is_numeric($pair[0]) && is_numeric($pair[1])) {

              $attributes_ids .= '{' . (int)$pair[0] . '}' . (int)$pair[1];

              $attributes_array[(int)$pair[0]]=(int)$pair[1];

            } else {

              $attributes_check = false;

              break;

            }

          }



          if ($attributes_check == true) {

            $uprid .= $attributes_ids;

          }

         }

 

				if (isset($HTTP_POST_VARS['products_id'])) {

				$HTTP_POST_VARS['products_id']=(int)$HTTP_POST_VARS['products_id'];





//++++ QT Pro: Begin Changed code

                               if (count($attributes_array)==0)

                                {

                                $attributes=array();

                                if (isset($HTTP_POST_VARS['attrcomb']) && (preg_match("/^\d{1,10}-\d{1,10}(,\d{1,10}-\d{1,10})*$/",$HTTP_POST_VARS['attrcomb']))) {

                                  $attrlist=explode(',',$HTTP_POST_VARS['attrcomb']);

                                  foreach ($attrlist as $attr) {

                                    list($oid, $oval)=explode('-',$attr);

                                    if (is_numeric($oid) && $oid==(int)$oid && is_numeric($oval) && $oval==(int)$oval)

                                      $attributes[$oid]=$oval;

                                  }

                                }

                                if (isset($HTTP_POST_VARS['id']) && is_array($HTTP_POST_VARS['id'])) {

                                  foreach ($HTTP_POST_VARS['id'] as $key=>$val) {

                                    if (is_numeric($key) && $key==(int)$key && is_numeric($val) && $val==(int)$val)

                                      $attributes=$attributes + $HTTP_POST_VARS['id'];

                                  }

                                }

                                }

                                else $attributes=$attributes_array;

                                $cart_pr->add_cart($HTTP_POST_VARS['products_id'], $cart_pr->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);

//++++ QT Pro: End Changed Code



                              }

                              

                              tep_redirect(tep_href_link("shopping_cart_pr.php", tep_get_all_get_params($parameters)));

                              if ($AJAX) exit;

                              break;

    // BOF: Product Listing in Columns





    // add to cart



      case 'buy_now_form' :   if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {



                                $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id']))+($HTTP_POST_VARS['cart_quantity']), $HTTP_POST_VARS['id']);



                              }



                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));



                              break;



      // custom product builder add to cart from builder_info page

      case 'add_build' :      if (isset($HTTP_POST_VARS['products_id']) && is_numeric($HTTP_POST_VARS['products_id'])) {

                                if ($_POST['uncloaked_build'] == '0') {

                                  tep_db_query("update " . TABLE_PRODUCTS . " set products_status = '1' where products_id = '" . $_POST['products_id'] . "' and products_quantity > '" . $cart->get_quantity(tep_get_uprid($_POST['products_id'],$_POST['id'])) . "'");

                                }

                                $cart->add_cart($HTTP_POST_VARS['products_id'], $cart->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $HTTP_POST_VARS['id']))+1, $HTTP_POST_VARS['id']);

                                if ($_POST['disable_build'] == '1' or $_POST['uncloaked_build'] =='0') {

                                  tep_db_query("update " . TABLE_PRODUCTS . " set products_status = '0' where products_id = '" . $_POST['products_id'] . "'");

                                }

                              }

                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                              break;





    // customer adds multiple products from the products_listing page



      case 'add_multiple' :   while (list($key, $val) = each($HTTP_POST_VARS)) { 



                                if (substr($key,0,11) == "Qty_ProdId_" || substr($key,0,11) == "Qty_NPrdId_") { 



                                  $prodId = substr($key, 11); 



                                  $qty = $val; 



                                  if ($qty <= 0) continue; 



                                  if (isset($HTTP_POST_VARS["id_$prodId"]) && is_array($HTTP_POST_VARS["id_$prodId"])) {



                                  // We have attributes



                                    $cart->add_cart($prodId, $cart->get_quantity(tep_get_uprid($prodId,$HTTP_POST_VARS["id_$prodId"]))+$qty, $HTTP_POST_VARS["id_$prodId"]);



                                  } else {



                                    // No attributes



                                    $cart->add_cart($prodId, $cart->get_quantity($prodId)+$qty);



                                  }



                                } 



                              } 



                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));



                              break;



    // BOF: Product Listing in Columns



							  

      // performed by the 'buy now' button in product listings and review page

      case 'buy_now' :        if (isset($HTTP_GET_VARS['products_id'])) {

                                if (tep_has_product_attributes($HTTP_GET_VARS['products_id'])) {

                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['products_id']));

                                } else {

                                  $cart->add_cart($HTTP_GET_VARS['products_id'], $cart->get_quantity($HTTP_GET_VARS['products_id'])+1);

                                }

                              }

                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                              break;

/* Optional Related Products (ORP) */

          case 'rp_buy_now' :     if (isset($HTTP_GET_VARS['rp_products_id'])) {

                                    if (tep_has_product_attributes($HTTP_GET_VARS['rp_products_id'])) {

                                      tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['rp_products_id']));

                                    } else {

                                      $cart->add_cart($HTTP_GET_VARS['rp_products_id'], $cart->get_quantity($HTTP_GET_VARS['rp_products_id'])+1);

                                    }

                                  }

                                  tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                                  break;

          //ORP: end

          case 'notify' :         if (tep_session_is_registered('customer_id')) {

	if (isset($HTTP_GET_VARS['products_id'])) {

                                  $notify = $HTTP_GET_VARS['products_id'];

                                } elseif (isset($HTTP_GET_VARS['notify'])) {

                                  $notify = $HTTP_GET_VARS['notify'];

                                } elseif (isset($HTTP_POST_VARS['notify'])) {

                                  $notify = $HTTP_POST_VARS['notify'];

                                } else {

                                  tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));

                                }

                                if (!is_array($notify)) $notify = array($notify);

                                for ($i=0, $n=sizeof($notify); $i<$n; $i++) {

                                  $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $notify[$i] . "' and customers_id = '" . $customer_id . "'");

                                  $check = tep_db_fetch_array($check_query);

                                  if ($check['count'] < 1) {

                                    tep_db_query("insert into " . TABLE_PRODUCTS_NOTIFICATIONS . " (products_id, customers_id, date_added) values ('" . $notify[$i] . "', '" . $customer_id . "', now())");

                                  }

                                }

                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action', 'notify'))));

                              } else {

                                $navigation->set_snapshot();

                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));

                              }

                              break;

      case 'notify_remove' :  if (tep_session_is_registered('customer_id') && isset($HTTP_GET_VARS['products_id'])) {

                                $check_query = tep_db_query("select count(*) as count from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");

                                $check = tep_db_fetch_array($check_query);

                                if ($check['count'] > 0) {

                                  tep_db_query("delete from " . TABLE_PRODUCTS_NOTIFICATIONS . " where products_id = '" . $HTTP_GET_VARS['products_id'] . "' and customers_id = '" . $customer_id . "'");

                                }

                                tep_redirect(tep_href_link(basename($PHP_SELF), tep_get_all_get_params(array('action'))));

                              } else {

                                $navigation->set_snapshot();

                                tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));

                              }

                              break;

      case 'cust_order' :     if (tep_session_is_registered('customer_id') && isset($HTTP_GET_VARS['pid'])) {

                                if (tep_has_product_attributes($HTTP_GET_VARS['pid'])) {

                                  tep_redirect(tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $HTTP_GET_VARS['pid']));

                                } else {

                                  $cart->add_cart($HTTP_GET_VARS['pid'], $cart->get_quantity($HTTP_GET_VARS['pid'])+1);

                                }

                              }

                              tep_redirect(tep_href_link($goto, tep_get_all_get_params($parameters)));

                              break;

    }

  }



// include the who's online functions

  require(DIR_WS_FUNCTIONS . 'whos_online.php');

  tep_update_whos_online();



// include the password crypto functions

  require(DIR_WS_FUNCTIONS . 'password_funcs.php');



// include validation functions (right now only email address)

  require(DIR_WS_FUNCTIONS . 'validations.php');



// split-page-results

  require(DIR_WS_CLASSES . 'split_page_results.php');



// infobox

  require(DIR_WS_CLASSES . 'boxes.php');



// auto activate and expire banners

  require(DIR_WS_FUNCTIONS . 'banner.php');

  tep_activate_banners();

  tep_expire_banners();



// auto expire special products

  require(DIR_WS_FUNCTIONS . 'specials.php');

  tep_expire_specials();



// calculate category path

  if (isset($HTTP_GET_VARS['cPath'])) {

    $cPath = $HTTP_GET_VARS['cPath'];

  } elseif (isset($HTTP_GET_VARS['products_id']) && !isset($HTTP_GET_VARS['manufacturers_id'])) {

    $cPath = tep_get_product_path($HTTP_GET_VARS['products_id']);

  } else {

    $cPath = '';

  }



  if (tep_not_null($cPath)) {

    $cPath_array = tep_parse_category_path($cPath);

    $cPath = implode('_', $cPath_array);

    $current_category_id = $cPath_array[(sizeof($cPath_array)-1)];

  } else {

    $current_category_id = 0;

  }



// include the breadcrumb class and start the breadcrumb trail

  require(DIR_WS_CLASSES . 'breadcrumb.php');

  $breadcrumb = new breadcrumb;



  require(DIR_WS_CLASSES . 'breadcrumb_projects.php');

  $breadcrumb_projects = new breadcrumb_projects;





  $breadcrumb->add(HEADER_TITLE_TOP, HTTP_SERVER);

  $breadcrumb->add(HEADER_TITLE_CATALOG, tep_href_link(FILENAME_DEFAULT));



// add category names or the manufacturer name to the breadcrumb trail

  if (isset($cPath_array)) {

    for ($i=0, $n=sizeof($cPath_array); $i<$n; $i++) {

      $categories_query = tep_db_query("select categories_name from " . TABLE_CATEGORIES_DESCRIPTION . " where categories_id = '" . (int)$cPath_array[$i] . "' and language_id = '" . (int)$languages_id . "'");

      if (tep_db_num_rows($categories_query) > 0) {

        $categories = tep_db_fetch_array($categories_query);

        $breadcrumb->add($categories['categories_name'], tep_href_link(FILENAME_DEFAULT, 'cPath=' . implode('_', array_slice($cPath_array, 0, ($i+1)))));

      } else {

        break;

      }

    }

  } elseif (isset($HTTP_GET_VARS['manufacturers_id'])) {

    $manufacturers_query = tep_db_query("select manufacturers_name from " . TABLE_MANUFACTURERS . " where manufacturers_id = '" . (int)$HTTP_GET_VARS['manufacturers_id'] . "'");

    if (tep_db_num_rows($manufacturers_query)) {

      $manufacturers = tep_db_fetch_array($manufacturers_query);

      $breadcrumb->add($manufacturers['manufacturers_name'], tep_href_link(FILENAME_DEFAULT, 'manufacturers_id=' . $HTTP_GET_VARS['manufacturers_id']));

    }

  }



// add the products model to the breadcrumb trail

  if (isset($HTTP_GET_VARS['products_id'])) {

    $model_query = tep_db_query("select products_model from " . TABLE_PRODUCTS . " where products_id = '" . (int)$HTTP_GET_VARS['products_id'] . "'");

    if (tep_db_num_rows($model_query)) {

      $model = tep_db_fetch_array($model_query);

      $breadcrumb->add($model['products_model'], tep_href_link(FILENAME_PRODUCT_INFO, 'cPath=' . $cPath . '&products_id=' . $HTTP_GET_VARS['products_id']));

    }

  }



////

// START oscThumb

  require(DIR_WS_CLASSES . 'oscthumb.php');

    $oscthumb = new oscthumb;

    $oscthumb->check_hash(); // Check if parameters have changed. Delete cache if yes.

// END oscThumb



// initialize the message stack for output messages

  require(DIR_WS_CLASSES . 'message_stack.php');

  $messageStack = new messageStack;



// set which precautions should be checked

  define('WARN_INSTALL_EXISTENCE', 'true');

  define('WARN_CONFIG_WRITEABLE', 'false');

  define('WARN_SESSION_DIRECTORY_NOT_WRITEABLE', 'true');

  define('WARN_SESSION_AUTO_START', 'true');

  define('WARN_DOWNLOAD_DIRECTORY_NOT_READABLE', 'true');



// #CHAVEIRO14# Autologon

require('includes/functions/autologin.php');

if ($session_started == true) {

	if (ALLOW_AUTOLOGON == 'true') {                                // Is Autologon enabled?

	  if (basename($PHP_SELF) != FILENAME_LOGIN) {                  // yes

		if (!tep_session_is_registered('customer_id')) {

		  tep_doautologin();

		}

	  }

	} else {

		tep_autologincookie(false);

	}

}

// #CHAVEIRO14# Autologon END

function curPageName2() {

 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);

}

if (! in_array(basename($_SERVER['SCRIPT_FILENAME']), array("login.php", "logoff.php", "password_forgotten.php", "create_account.php", "create_account_demo.php", "sale_quotes_ajax.php", "create_account_success.php", "ipn.php", "product_info_window.php","product_info_factory_user.php","create_account_ajax.php","get_country.php","cya_ajax.php","get_state.php")))

{

  if (!tep_session_is_registered('customer_id')) {

   if(curPageName2()!='members.php' && curPageName2()!='member_detail_m.php') { 
      if ($navigation) 
      $navigation->set_snapshot('');

	

    tep_redirect(tep_href_link(FILENAME_LOGIN, '', 'SSL'));

	}

  }

}





// load all enabled payment modules

  if (basename($_SERVER['SCRIPT_NAME'])!="ipn.php") {

  require(DIR_WS_CLASSES . 'payment.php');

   if (isset($_SESSION['payment_method']) && basename($_SERVER['SCRIPT_NAME'])=="checkout_process.php") {

    $payment=$_SESSION['payment_method'];

    $payment_modules = new payment($payment);

   }

   elseif (isset($HTTP_POST_VARS['payment'])) {

    $payment = $HTTP_POST_VARS['payment'];

    $payment_modules = new payment($payment);

    $_SESSION['payment_method']=$payment;

   }
   elseif(isset($_SESSION['payment_method'])&& basename($_SERVER['SCRIPT_NAME'])=="checkout_confirmation.php" && isset($HTTP_GET_VARS['error_payment']) && tep_not_null($HTTP_GET_VARS['error_payment'])) {
    $payment = $_SESSION['payment_method'];
    $payment_modules = new payment($payment);
   }
   else $payment_modules = new payment;

  }