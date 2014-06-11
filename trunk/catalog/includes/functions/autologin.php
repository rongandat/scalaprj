<?php
/*
##################################################
# Chaveiro at catus dot net
# 11-05-2004
##################################################
###
##  Autologin Secure 2.01
#

What this does is to alow client to set a checkbox and will be remembered in that pc for up to 14 days of inactivity.
The information is saved client side in a cookie with an md5 hash from the username, encripted password, userid and current user ip.
This hash warants an highly security metode even if someone steals your cookie hash as he will have to use a connection from the same ip address as you did.
If client changes email or password on other computer will have to login again on other computer he might use.

Module folows oscommerce codding style and use tep functions when available.

*/


function tep_autologincookie ($on) {
	global $customer_id ;
	if ($on) {
	    if (tep_session_is_registered('customer_id')) {

		    $check_customer_query = tep_db_query("select customers_id, customers_password, customers_email_address from " . TABLE_CUSTOMERS . " where customers_id = '" . (int)$customer_id . "'");
		    if (tep_db_num_rows($check_customer_query)) {
//			echo "COOKIE ON" ;
				$check_customer = tep_db_fetch_array($check_customer_query);
				$ip_address = tep_get_ip_address();
				setcookie( "osC_AutoCookieLogin", md5($check_customer['customers_id'].$check_customer['customers_email_address'].$check_customer['customers_password'].$ip_address), time()+60*60*24*14, "/",  "", 0 );
			}
		}
    } else {
//		echo "COOKIE OFF" ;
	    setcookie( "osC_AutoCookieLogin", "", 0, "/",  "", 0 );
	}
}


function tep_doautologin () {
global $HTTP_COOKIE_VARS, $cart, $cart_cs,$cart_fv,$cart_pr, $customer_id, $customer_default_address_id, $customer_first_name, $customer_country_id, $customer_zone_id ;
global $navigation;
	if (isset($HTTP_COOKIE_VARS['osC_AutoCookieLogin'])) {
		  $ip_address = tep_get_ip_address();
		  $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_lastname, customers_password, customers_email_address, customers_default_address_id from " . TABLE_CUSTOMERS . " where md5(CONCAT(customers_id,customers_email_address,customers_password,'" . $ip_address . "'))= '" . $HTTP_COOKIE_VARS['osC_AutoCookieLogin'] . "'");
		  if (tep_db_num_rows($check_customer_query)) {
			  $check_customer = tep_db_fetch_array($check_customer_query);
			  if (SESSION_RECREATE == 'True') {
				  tep_session_recreate();
			  }
			  $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . $check_customer['customers_id'] . "' and address_book_id = '" . (int)$check_customer['customers_default_address_id'] . "'");
			  $check_country = tep_db_fetch_array($check_country_query);

			  $customer_id = $check_customer['customers_id'];
			  $customer_default_address_id = $check_customer['customers_default_address_id'];
			  $customer_first_name = $check_customer['customers_firstname'];
			  $customer_country_id = $check_country['entry_country_id'];
			  $customer_zone_id = $check_country['entry_zone_id'];
			  if(!tep_session_is_registered('customer_id'))
				  tep_session_register('customer_id');
			  if(!tep_session_is_registered('customer_default_address_id'))
				  tep_session_register('customer_default_address_id');
			  if(!tep_session_is_registered('customer_first_name'))
				  tep_session_register('customer_first_name');
			  if(!tep_session_is_registered('customer_country_id'))
				  tep_session_register('customer_country_id');
			  if(!tep_session_is_registered('customer_zone_id'))
				  tep_session_register('customer_zone_id');

			  tep_autologincookie(true); // Save cookie

			  tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int)$customer_id . "'");

			  $cart->restore_contents();    // restore cart contents
		          $cart_cs->restore_contents();
        		  $cart_fv->restore_contents();
        		  $cart_pr->restore_contents();


			  if (sizeof($navigation->snapshot) > 0) {
			    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
			    $navigation->clear_snapshot();
			    tep_redirect($origin_href);
			  } else {
//			    tep_redirect(tep_href_link(FILENAME_DEFAULT));
			    tep_redirect(substr(tep_href_link(getenv('REQUEST_URI')), strlen(HTTP_SERVER . DIR_WS_HTTP_CATALOG)));  ;
			  }
	      }
	}
}


?>