<?php
/*
  $Id: login.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce
  Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com

  Released under the GNU General Public License
 */

require('includes/application_top.php');

// redirect the customer to a friendly cookie-must-be-enabled page if cookies are disabled (or the session has not started)
if ($session_started == false) {
    tep_redirect(tep_href_link(FILENAME_COOKIE_USAGE));
}

require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);

$error = false;

if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_login')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    //var_dump($password);die;
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, member_level,qtpro  from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
   
    if (!tep_db_num_rows($check_customer_query)) {
        $response['type'] = 0;
        $response['content'] = 'Error: No match for E-Mail Address and/or Password.';
    } else {
        $check_customer = tep_db_fetch_array($check_customer_query);
        if (!tep_validate_password($password, $check_customer['customers_password'])) {
           $response['type'] = 0;
           $response['content'] = 'Error: No match for E-Mail Address and/or Password 1.';
        } else {
            if ($check_customer['member_level'] == 0) {

                $HTTP_GET_VARS['login'] = 'invalid';

                $response['type'] = 0;
                $response['content'] = 'Your account has not been approved yet';
            } else {
                if (SESSION_RECREATE == 'True') {
                    tep_session_recreate();
                }

                $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int) $check_customer['customers_id'] . "' and address_book_id = '" . (int) $check_customer['customers_default_address_id'] . "'");
                $check_country = tep_db_fetch_array($check_country_query);

                $customer_id = $check_customer['customers_id'];
                $customer_default_address_id = $check_customer['customers_default_address_id'];
                $customer_first_name = $check_customer['customers_firstname'];
                $customer_country_id = $check_country['entry_country_id'];
                $customer_zone_id = $check_country['entry_zone_id'];

                $customer_qtpro = $check_customer['qtpro'];
                tep_session_register('customer_id');
                tep_session_register('customer_default_address_id');
                tep_session_register('customer_first_name');
                tep_session_register('customer_country_id');
                tep_session_register('customer_zone_id');
                tep_session_register('customer_qtpro');
	
                if ((ALLOW_AUTOLOGONLOGON == 'false') || ($HTTP_POST_VARS['remember_me'] == '')) {
                    //tep_autologincookie(false);
                    tep_autologincookie(true);
                } else {
                    tep_autologincookie(true);
                }

                tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int) $customer_id . "'");

// restore cart contents
                $cart->restore_contents();
                $cart_cs->restore_contents();
                $cart_fv->restore_contents();
                $cart_pr->restore_contents();
                $response['type'] = 1;
                
                if (sizeof($navigation->snapshot) > 0) {
                    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
                    $navigation->clear_snapshot();
                    //tep_redirect($origin_href);
                    $response['content'] = $origin_href;
                } else {
                    $response['content'] = tep_href_link(FILENAME_DEFAULT);
                    //tep_redirect(tep_href_link(FILENAME_DEFAULT));
                }
                
            }
        }
    }

    print json_encode($response);
    exit();
}

if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'check_first_login')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    //var_dump($password);die;
    $hide_price = tep_db_prepare_input($HTTP_POST_VARS['hide_price']);
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, member_level,qtpro  from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_customer_query)) {
        $number_login = -1;
    } else {
        $check_customer = tep_db_fetch_array($check_customer_query);
        if (!tep_validate_password($password, $check_customer['customers_password'])) {
            $number_login = -1;
        } else {
            $customer_id = $check_customer['customers_id'];
            $get_number_login_query = tep_db_query("select customers_info_number_of_logons  from " . TABLE_CUSTOMERS_INFO . " where customers_info_id = '" . (int) $customer_id . "'");
            $get_number_login = tep_db_fetch_array($get_number_login_query);
            $number_login = $get_number_login['customers_info_number_of_logons'];

            if ($check_customer['member_level'] == 0) {
                $HTTP_GET_VARS['login'] = 'invalid';
                $number_login = -2;
            }
        }
    }
    print json_encode($number_login);
    exit();
}


if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'first_login')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    $hide_price = tep_db_prepare_input($HTTP_POST_VARS['hide_price']);
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, member_level,qtpro  from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    $check_customer = tep_db_fetch_array($check_customer_query);
    $customer_id = $check_customer['customers_id'];
    if (SESSION_RECREATE == 'True') {
        tep_session_recreate();
    }

    $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int) $check_customer['customers_id'] . "' and address_book_id = '" . (int) $check_customer['customers_default_address_id'] . "'");
    $check_country = tep_db_fetch_array($check_country_query);

    $customer_default_address_id = $check_customer['customers_default_address_id'];
    $customer_first_name = $check_customer['customers_firstname'];
    $customer_country_id = $check_country['entry_country_id'];
    $customer_zone_id = $check_country['entry_zone_id'];

    $customer_qtpro = $check_customer['qtpro'];
    tep_session_register('customer_id');
    tep_session_register('customer_default_address_id');
    tep_session_register('customer_first_name');
    tep_session_register('customer_country_id');
    tep_session_register('customer_zone_id');
    tep_session_register('customer_qtpro');

// #CHAVEIRO14#  Autologon	
    if ((ALLOW_AUTOLOGONLOGON == 'false') || ($HTTP_POST_VARS['remember_me'] == '')) {
        //tep_autologincookie(false);
        tep_autologincookie(true);
    } else {
        tep_autologincookie(true);
    }
// #CHAVEIRO14#  Autologon	END

    if ($hide_price == 'on')
        tep_session_register('hide_price');

    tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int) $customer_id . "'");

// restore cart contents
    $cart->restore_contents();
    $cart_cs->restore_contents();
    $cart_fv->restore_contents();
    $cart_pr->restore_contents();


    echo json_encode('logged');
    exit();
}


if (isset($HTTP_GET_VARS['action']) && ($HTTP_GET_VARS['action'] == 'process')) {
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    $hide_price = tep_db_prepare_input($HTTP_POST_VARS['hide_price']);

// Check if email exists
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, member_level,qtpro  from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    if (!tep_db_num_rows($check_customer_query)) {
        $error = true;
    } else {
        $check_customer = tep_db_fetch_array($check_customer_query);
// Check that password is good
        if (!tep_validate_password($password, $check_customer['customers_password'])) {
            $error = true;
        } else {
            if ($check_customer['member_level'] == 0) {

                $HTTP_GET_VARS['login'] = 'invalid';

                $messageStack->add('login', TEXT_NOT_APPROVED);
            } else {
                if (SESSION_RECREATE == 'True') {
                    tep_session_recreate();
                }

                $check_country_query = tep_db_query("select entry_country_id, entry_zone_id from " . TABLE_ADDRESS_BOOK . " where customers_id = '" . (int) $check_customer['customers_id'] . "' and address_book_id = '" . (int) $check_customer['customers_default_address_id'] . "'");
                $check_country = tep_db_fetch_array($check_country_query);

                $customer_id = $check_customer['customers_id'];
                $customer_default_address_id = $check_customer['customers_default_address_id'];
                $customer_first_name = $check_customer['customers_firstname'];
                $customer_country_id = $check_country['entry_country_id'];
                $customer_zone_id = $check_country['entry_zone_id'];

                $customer_qtpro = $check_customer['qtpro'];
                tep_session_register('customer_id');
                tep_session_register('customer_default_address_id');
                tep_session_register('customer_first_name');
                tep_session_register('customer_country_id');
                tep_session_register('customer_zone_id');
                tep_session_register('customer_qtpro');

// #CHAVEIRO14#  Autologon	
                if ((ALLOW_AUTOLOGONLOGON == 'false') || ($HTTP_POST_VARS['remember_me'] == '')) {
                    //tep_autologincookie(false);
                    tep_autologincookie(true);
                } else {
                    tep_autologincookie(true);
                }
// #CHAVEIRO14#  Autologon	END

                if ($hide_price == 'on')
                    tep_session_register('hide_price');

                tep_db_query("update " . TABLE_CUSTOMERS_INFO . " set customers_info_date_of_last_logon = now(), customers_info_number_of_logons = customers_info_number_of_logons+1 where customers_info_id = '" . (int) $customer_id . "'");

// restore cart contents
                $cart->restore_contents();
                $cart_cs->restore_contents();
                $cart_fv->restore_contents();
                $cart_pr->restore_contents();

                if (sizeof($navigation->snapshot) > 0) {
                    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
                    $navigation->clear_snapshot();
                    tep_redirect($origin_href);
                } else {

                    tep_redirect(tep_href_link(FILENAME_DEFAULT));
                }
            }
        }
    }
}

if ($error == true) {
    $messageStack->add('login', TEXT_LOGIN_ERROR);
}

$breadcrumb->add(NAVBAR_TITLE, tep_href_link(FILENAME_LOGIN, '', 'SSL'));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo TITLE; ?></title>
        <base href="<?php echo (($request_type == 'SSL') ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG; ?>">
            <meta name="robots" content="noindex,nofollow">
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link href="stylesheet.css" rel="stylesheet" type="text/css" />
                <link href="uniform.css" rel="stylesheet" type="text/css" />
                <link href="js/jqueryui/jquery-ui-1.10.4.custom.min.css" rel="stylesheet" type="text/css" />
                <script type="text/javascript" src="js/jqueryui/jquery-1.10.2.js"></script>
                <script type="text/javascript" src="includes/general.js"></script>
                <script type="text/javascript" src="js/jqueryui/jquery-ui-1.10.4.custom.min.js"></script>
                <?php require(DIR_WS_INCLUDES . 'misc_js.php'); ?>

                <link href="../css/style2010.css" rel="stylesheet" type="text/css" />
                <style type="text/css">
                    <!--
                    body {
                        margin-top: 0px;
                    }
                    a.nyroModal:hover{background:none;}
                    #nyroModalWrapper{min-width:550px;}
                    .headline1 {
                        font-family: Geneva, Arial, Helvetica;
                        font-size: 11px;
                        color: #999;
                    }
                    .headerline1 {
                        font-family: "Helvetica Neue Condensed Black", Arial;
                        font-size: 11px;
                        color: #333;
                    }
                    -->
                    #dialog-form{display: none;text-align: justify;}
                </style>

                <script language="javascript">
                    
                    $(document).ready(function()
                    {
                        $('.login_error').hide();
                    });
                    //  $("#login_btn").live('click',function()
                    
                    $(document).on("click","#login_btn", function()   
                    {
                        <?php if(TURN_EXCEPT_TERMS_LOGIN=='true'){?>
                        var email_address=$('#email_address').val();
                        var password=$('#password').val();
                        var hide_price=$('#hide_price').val();
                        $.ajax({
                            url: '<?php echo tep_href_link(FILENAME_LOGIN, 'action=check_first_login', 'SSL') ?>',
                            type: "post",
                            dataType:"json",
                            data: "email_address="+ email_address +"&password=" + password + "&hide_price=" + hide_price,
                            success: function(data){
                                    
                                if(data==0) 
                                {
                                    $('.login_error').hide();
                                    $( "#dialog-form" ).dialog({
                                        autoOpen: false,
                                        height: 600,
                                        width: 600,
                                        modal: true,
                                        buttons: {
                                            "Agree": function() {
                                                $.ajax({
                                                    url: '<?php echo tep_href_link(FILENAME_LOGIN, 'action=first_login', 'SSL') ?>',
                                                    type: "post",
                                                    dataType:"json",
                                                    data: "email_address="+ email_address +"&password=" + password + "&hide_price=" + hide_price,
                                                    success: function(data){
                                    
                                                        if(data=='logged') 
                                                        {
                                                            window.location.href='<?php echo tep_href_link(FILENAME_DEFAULT) ?>';
                                                        }
                                                    }
                                                });
                                            },
                                            "Decline": function() {
                                                $( this ).dialog( "close" );
                                            }
                                        },
                                        close: function() {
        
                                        }
                                    });
    
                                    $( "#dialog-form" ).dialog( "open" );
                                }
                                else if(data==-1){
                                    $('.login_error').show();
                                    $('td.messageStackError').html('<img src="images/icons/error.gif" border="0" alt="Error" title="Error">&nbsp;Error: No match for E-Mail Address and/or Password.');
                                }  
                                else if(data==-2){
                                    $('.login_error').show();
                                    $('td.messageStackError').html('<img src="images/icons/error.gif" border="0" alt="Error" title="Error">&nbsp;Your account has not been approved yet');
                                }
                                else {
                                    $('.login_error').hide();
                                    $('#login_form').submit();
                                }
                            }
                        });
                        <?php } else {?>
                          $('#login_form').submit(); 
                          <?php }?>
                    });
                    
                    // });          
                    //<!--
                    function session_win() {
                        window.open("<?php echo tep_href_link(FILENAME_INFO_SHOPPING_CART); ?>","info_shopping_cart","height=460,width=430,toolbar=no,statusbar=no,scrollbars=yes").focus();
                    }
                    //--></script>
                </head>

                <body topmargin="0" onload="MM_preloadImages('/images/_menu/header1-rl_05.jpg','/images/_menu/header1-rl_06.jpg','/images/_menu/header1-rl_07.jpg','/images/_menu/header1-rl_08.jpg','/images/_menu/header1-rl_09.jpg','/images/_menu/header1-rl_10.jpg','/images/news-pgs-rl.png')">
                    <!-- header //-->
                    <?php #require(DIR_WS_INCLUDES . 'header.php');    ?>
                    <!-- header_eof //-->

                    <!-- body //-->

                    <div id="dialog-form" title="<?php echo TITLE_POPUP_TERMS_LOGIN?>">
                        <p>ORDERS:<br>
                                All orders are subject to acceptance by SL . We will confirm all orders electronically or via email after receipt of the clients purchase order and deposit (if required). Orders are subject to cancellation by SL if manufacturing or business conditions make it not feasible in the judgment of SL to produce said shipment, or, a credit condition of a customer is deemed to require such action. Further, quotes or invoices are based on issue dates or related issues such as approval of technical drawings by client, possible color sample submission or any other materials that are required to finalize and order. Delivery or lead-times are based on the same as mentioned above and SL reserves the right to delay or increase quoted delivery or lead-times if manufacturing or business conditions make it not feasible in the judgment of SL to deliver said shipment as originally promised.
                        </p><p>ORDER PROCESSING:<br>
                                SL is processing all orders and order tracking online through this catalog and ordering system. Placing an order with SL is easy, just setup your account one time with the correct information. Please be sure your shipping and contact information is up to date. SL does not take any responsibly for incorrect information in your profile reflecting on orders, shipping related documents or invoices, and we do not monitor your information for correctness. All your information will remain on our website until you remove it, as well as your order history. We will update you on your order status through our website or by emails or phone conversations. 
                                <br>
                                    Retail, stocking-dealer and contract/hospitality orders require a initial minimum opening order of $15,000USD. There is no minimum order required thereafter the initial opening order. <br>
                                        <br>
                                            CUSTOM ORDERS:<br>
                                                Custom orders require a 50% deposit of face value of invoice, and the balance once the order is ready for delivery, but before shipping or releasing the merchandise&nbsp;from the SL warehouse.&nbsp;<br>
                                                    Custom orders require clear and professional drawings that need to be approved by the customer with date and signature. If SL quoted a time frame for delivery or production, the official due-date for an order to become active will depend on when drawings where approved with a signature, and/or when the deposit was received. If after placing the order or during production questions arise to clarify product details, we would expect an answer within 24 hours. If it takes longer or even an unreasonable amount of time to get a definite reply or clarification from the customer, we reserve the right to revise the due date on the original invoice as quoted, at our own option and discretion,&nbsp;but within a reasonable time frame. Changes that where made by the customer after the order was placed with signature and deposit received could extend deliver times and pricing as well. Please make sure to receive an revised invoice from our office. </p>
                                                    <p>SL is not responsible for delays that could occur due to possible mistakes on drawings, miss leading information or not clearly or logically stated details that could be misinterpreted later on. </p>
                                                    <p>PRODUCT AVAILABILITY:<br>
                                                            Items in stock are immediately available for shipping. The delivery time on back orders or custom orders can be 8-12 weeks, unless quoted differently in writing. Please confirm with our office before ordering. We cannot guarantee product availability and products, nonetheless, some items may not be available for immediate delivery. We reserve the right, without liability or prior notice, to revise, discontinue, or cease to make available any or all products or to cancel any order.</p>
                                                    <p>PAYMENTS:<br>
                                                            All prices are F.O.B. Los Angeles from the SL warehouse, or EXW factory Indonesia - whichever one is more feasible. SL accepts checks or wire transfers. Orders are pre-paid only, meaning payments must be received at our office before shipment. <br>
                                                                Opening orders for first time buyers; If merchandise is not in stock and has to be back-ordered, we require a 50% deposit, and the balance once merchandise is ready for shipment from our warehouse. Deposits for  orders, or payments made after merchandise was shipped, or was released to the customer, are non-refundable. SL is not responsible for lost checks and bank or wire transfers not received, for any reason. Returned or "insufficient funds" checks might generate additional late fees, and/or cancellation of shipments as well as other active orders a customer might have pending with SL. All prices are subject to change without notice, at any time. </p>
                                                                <p>FREIGHT:<br>
                                                                        SL recommends the use of Blanket Wrap-carriers.  We can arrange shipment of commercial orders via "best way", unless otherwise indicated on customers purchase order or instructed in writing to our office. SL assumes all shipments to be transferred on a commercial basis, meaning from business to business, as our products are available to the trade only. We do not arrange -home deliveries- or -residential deliveries- or any customer service for this kind of transaction.  If you need merchandise to be delivered to the end-user directly, we assume that you arrange and schedule  a delivery company of your choice, and at  your own risk. All merchandise picked up from our warehouse is inspected by the carrier and accepted with their signature on the invoice as in -First Rate Condition-. Title to merchandise passes to the customer when the carrier accepts delivery from our facilities with their signature. SL is not responsible for any shipping damages, lost goods or any claims that need to be filed with the carrier. <br>
                                                                            Damaged merchandise (shipping damages) received by the customer must be noted on the carriers Bill of Lading before signing, and claimed directly with the shipping company at the point of delivery. From experience we would like to suggest to support your claim with photos while receiving merchandise from the carrier. Photos taken on the carriers truck or container generally are the best&nbsp;proof to show that merchandise was damaged before you even took possession of the title. Further, SL does not assume any responsability for shipments that might be send by the client to the end-consumer direct from our warehouse facilities. SL expects clients to check and approve merchandise picked up from our warehouse before shipping (or shipping direct) orders to their end-consumer. SL does not reimburse or pay for possible replacement items that need to be shipped if the client did not approve or review items that were shipped to the end-consumer without previous review or approval.</p>
                                                                            <p>In case of shipping damages or any other issues that might create a claim with a  3rd party, that occurred after the title of merchandise was passed on, customers are still required to make timely payments to SL, as per invoice submitted. Customer may not withhold payments to SL while awaiting settlements of claims from any 3rd parties, or any other companies.</p>
                                                                            <p>SL does not pre-pay shipping charges nor can we receive payments for shipping related expenses. All shipments are send freight collect or pre-paid, with no exceptions. You are welcome however to make out a check to the shipping company directly and send it to us&nbsp;along with your payment for products. We will then pass on your check to the shipping company upon pickup of your merchandise.</p>
                                                                            <p>We can assist to generate freight quotes for your order or quote. However, freight quotes provided by a 3rd party shipping company to our office, and passed on to you (the client) are non-binding, nor does SL guaranty its accuracy, validity or any or additional charges or changes in shipping rates that might occur. SL product prices, quotes and estimates are not including  shipping charges&nbsp;or transport of any kind.</p>
                                                                            <p>WARRANTY:<br>
                                                                                    SL guarantees its product to be free from defects of workmanship. Our products are hand made from selected natural materials. Due to environmental elements and relative humidity, some of these materials naturally might expand or shrink under certain environmental conditions. Colors on natural materials such as goatskin, shagreen, horn or leathers might fluctuate, due to the natural patterns of these materials.<br>
                                                                                        SL takes great care to carefully construct  furniture at best quality levels and with proper methods, to allow the natural shrinking and expanding. SL does not offer a Money Back Guarantee whatsoever, nor excepts merchandise returns without written authorization from our office, but stands by its product by offering merchandise credits or replacements, at our own option and discretion. </p>
                                                                                        <p>COPYRIGHTED MATERIALS - UNAUTHIRIZED USES REQUIRE PRIOR WRITTEN PERMISSION: <br>
                                                                                                You may not use any Content or Images from the SL website for commercial purposes. You may not sell the Content or sell materials thereof, nor may you use the Content to promote or advertise products or services. You may not use the name SL in conjunction with any products, promotional or commercial purposes, unless you have written permission from SL. If you wish to use&nbsp; Content for any purpose beyond the permitted uses, such as a commercial use or publication (except as may be permitted by fair use under the copyright law), you must obtain prior written permission from the SL office.<br><br>Send your permission request or other inquiries, including requests for higher quality formats, including high resolution digital images to our office. If you are seeking permission to include the Content in a commercial product, or display SL products on your website or any other publication, please acquire written permission from SL by contacting our office at <a href="mailto:info@scalaluxury.com">info@scalaluxury.com</a></p>
                                                                                                        <p>TYPOGRAPHICAL ERRORS: <br>
                                                                                                                In the event a product is listed at an incorrect price or with incorrect information due to typographical or technical error or error in pricing or product information, we shall have the right to refuse or cancel any orders placed for products listed with incorrect information. We shall have the right to refuse or cancel any such orders whether or not the order has been confirmed.</p>
                                                                                                        <p>The terms and conditions of sale herein described shall be enforced in accordance with, and governed by the laws of the State of California. Customer acknowledges and agrees that the courts of the State of California shall have exclusive jurisdiction over any dispute(s). Bidder (in person, by agent, order bid, telephone, internet or by other means) agrees that any dispute arising shall be litigated exclusively in the courts of the State of California. Further, venue shall be in the Superior Court of Los Angeles County, in the state of California.</p>

                                                                                                        </div>

                                                                                                        <div id="wrapper" style="border:1px solid #CCC;">
                                                                                                            <table border="0" width="100%" cellspacing="3" cellpadding="3">
                                                                                                                <tr>
                                                                                                                    <!-- body_text //-->
                                                                                                                    <td width="100%" valign="top">
                                                                                                                        <?php
                                                                                                                        if (MAINTENANCE_MODE == "false") {
                                                                                                                            ?>
                                                                                                                            <?php echo tep_draw_form('login', tep_href_link(FILENAME_LOGIN, 'action=process', 'SSL'), 'post', 'id="login_form"'); ?>

                                                                                                                            <table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                                                                                <tr>
                                                                                                                                    <td><table border="0" width="100%" cellspacing="0" cellpadding="0">
                                                                                                                                            <tr>
                                                                                                                                            </tr>
                                                                                                                                        </table></td>
                                                                                                                                </tr>
                                                                                                                                <tr>
                                                                                                                                    <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                </tr>

                                                                                                                                <tr class="login_error">
                                                                                                                                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                                                                                                            <tbody><tr class="messageStackError">
                                                                                                                                                    <td class="messageStackError"></td>
                                                                                                                                                </tr>
                                                                                                                                            </tbody></table>
                                                                                                                                    </td>
                                                                                                                                </tr>


                                                                                                                                <?php
                                                                                                                                if ($messageStack->size('login') > 0) {
                                                                                                                                    ?>
                                                                                                                                    <tr>
                                                                                                                                        <td><?php echo $messageStack->output('login'); ?></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                    </tr>
                                                                                                                                    <?php
                                                                                                                                }

                                                                                                                                if ($cart->count_contents() > 0) {
                                                                                                                                    ?>
                                                                                                                                    <tr>
                                                                                                                                        <td class="smallText"><?php echo TEXT_VISITORS_CART; ?></td>
                                                                                                                                    </tr>
                                                                                                                                    <tr>
                                                                                                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                    </tr>
                                                                                                                                    <?php
                                                                                                                                }
                                                                                                                                ?>
                                                                                                                                <tr>
                                                                                                                                    <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                                                                                                            <tr>
                                                                                                                                                <td class="main" width="50%" valign="top">&nbsp;</td>
                                                                                                                                                <td class="main" width="50%" valign="top">&nbsp;</td>
                                                                                                                                            </tr>
                                                                                                                                            <tr>
                                                                                                                                                <td width="50%"  valign="top"><table width="86%" border="0" align="right" cellpadding="2" cellspacing="1" class="infoBox">
                                                                                                                                                        <tr class="infoBoxContents">
                                                                                                                                                            <td height="25" align="left" bgcolor="#FFFFFF" class="headerline1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; REGISTER YOUR COMPANY:</td>
                                                                                                                                                            <td width="16%" rowspan="2" align="left" bgcolor="#FFFFFF" class="headerline1"><img src="images/vert-rule.jpg" width="4" height="150" align="right" /></td>
                                                                                                                                                        </tr>
                                                                                                                                                        <tr class="infoBoxContents">
                                                                                                                                                            <td width="84%"  align="center" bgcolor="#FFFFFF"><table border="0" width="100%"  cellspacing="0" cellpadding="2">
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td class="main" valign="top"><?php echo TEXT_NEW_CUSTOMER_INTRODUCTION; ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                                                                                                                                                <tr>
                                                                                                                                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                                                                                                                                    <td align="right">&nbsp;</td>
                                                                                                                                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                                                                                                                                </tr>
                                                                                                                                                                            </table></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </table>
                                                                                                                                                                <?php echo '<a href="' . tep_href_link(FILENAME_CREATE_ACCOUNT, '', 'SSL') . '">' . tep_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>'; ?></td>
                                                                                                                                                        </tr>
                                                                                                                                                    </table> </td>
                                                                                                                                                <td width="50%"  valign="top"><table width="80%"  border="0" align="center" cellpadding="2" cellspacing="1" class="infoBox">
                                                                                                                                                        <tr class="infoBoxContents">
                                                                                                                                                            <td class="headerline1">LOG IN (existing customers):
                                                                                                                                                                <table border="0" width="95%"  cellspacing="0" cellpadding="2">
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td class="main" colspan="2"><?php //echo TEXT_RETURNING_CUSTOMER;     ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td colspan="2"><?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td class="main"><b><?php echo ENTRY_EMAIL_ADDRESS; ?></b></td>
                                                                                                                                                                        <td class="main"><?php echo tep_draw_input_field('email_address', '', 'id="email_address"'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td class="main"><b><?php echo ENTRY_PASSWORD; ?></b></td>
                                                                                                                                                                        <td class="main"><?php echo tep_draw_password_field('password', '', 'id="password"'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <?php
                                                                                                                                                                    // #CHAVEIRO14# Autologon 
                                                                                                                                                                    if ((ALLOW_AUTOLOGON == 'true') && ((isset($HTTP_COOKIE_VARS['cookie_test']) && (SESSION_FORCE_COOKIE_USE == 'True')) || (SESSION_FORCE_COOKIE_USE != 'True'))) {
                                                                                                                                                                        ?>
                                                                                                                                                                        <tr>
                                                                                                                                                                            <td></td>
                                                                                                                                                                            <td align="left" class="smalltext"></td>
                                                                                                                                                                        </tr>
                                                                                                                                                                        <?php
                                                                                                                                                                    }
// #CHAVEIRO14# Autologon END  
                                                                                                                                                                    ?>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td align="left"><span class="main" style="text-align:left;padding-right:10px;"><?php echo HIDE_PRICE; ?>
                                                                                                                                                                                <input type=checkbox name="hide_price" id="hide_price"/>
                                                                                                                                                                            </span></td>
                                                                                                                                                                        <td align="left"><?php echo tep_draw_checkbox_field('remember_me', 'on', (($password == '') ? false : true)) . '&nbsp;' . ENTRY_REMEMBER_ME; ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td class="smallText"><p><br />
                                                                                                                                                                                <br />
                                                                                                                                                                            </p>                        <?php echo '<a  href="' . tep_href_link(FILENAME_PASSWORD_FORGOTTEN, '', 'SSL') . '">' . TEXT_PASSWORD_FORGOTTEN . '</a>'; ?></td>
                                                                                                                                                                        <td class="main" title="Hide Prices - View catalog without prices" style="text-align:right;padding-right:10px;">
                                                                                                                                                                            <a href="javascript:void(0)" id="login_btn"><?php echo tep_image_button('button_login.gif', IMAGE_BUTTON_LOGIN) ?></a>
                                                                                                                                                                            <?php //echo tep_image_submit('button_login.gif', IMAGE_BUTTON_LOGIN,'id="login_btn"');   ?>

                                                                                                                                                                        </td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td colspan="2"><p>&nbsp;</p>                        <?php echo tep_draw_separator('pixel_trans.gif', '100%', '10'); ?></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                    <tr>
                                                                                                                                                                        <td height="35" colspan="2"><table border="0" width="100%" cellspacing="0" cellpadding="2">
                                                                                                                                                                                <tr>
                                                                                                                                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                                                                                                                                    <td align="right">&nbsp;</td>
                                                                                                                                                                                    <td width="10"><?php echo tep_draw_separator('pixel_trans.gif', '10', '1'); ?></td>
                                                                                                                                                                                </tr>
                                                                                                                                                                            </table></td>
                                                                                                                                                                    </tr>
                                                                                                                                                                </table></td>
                                                                                                                                                        </tr>
                                                                                                                                                    </table></td>
                                                                                                                                            </tr>
                                                                                                                                        </table></td>
                                                                                                                                </tr>
                                                                                                                            </table>

                                                                                                                            </form>
                                                                                                                            <?php
                                                                                                                        } else { //display maintenance page
                                                                                                                            ?>

                                                                                                                            <center>
                                                                                                                                <img height="110" src="/m/images/logo-2012-90.jpg" border="0"><br>
                                                                                                                                        <p class="main">We currently undergoing updates - please check back shortly.</p>
                                                                                                                                        <p class="main"><a href="http://scalaluxury.com">Go back to the home page.</a></p>
                                                                                                                                        </center>

                                                                                                                                        <?php
                                                                                                                                    }
                                                                                                                                    ?>
                                                                                                                                    </td>
                                                                                                                                    <!-- body_text_eof //-->
                                                                                                                                    </tr>
                                                                                                                                    </table>
                                                                                                                                    </div>
                                                                                                                                    <!-- body_eof //-->

                                                                                                                                    <!-- footer //-->
                                                                                                                                    <?php #require(DIR_WS_INCLUDES . 'footer.php');   ?>
                                                                                                                                    <!-- footer_eof //-->
                                                                                                                                    <br><br>
                                                                                                                                            </body>
                                                                                                                                            </html>
                                                                                                                                            <?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
