<?php

/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2007 osCommerce
  Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com

  Released under the GNU General Public License
 */

require('includes/application_top.php');

// needs to be included earlier to set the success message in the messageStack

$country = 223;
$process = false;
$response = array();
$listErrors = array();
if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'topmenu_send_contact')) {
    
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CONTACT_US);
    $process = true;

    $cya_get_customer_query = tep_db_query("select c.customers_id, c.customers_firstname, c.customers_lastname, c.customers_email_address, c.customers_default_address_id, c.customers_telephone,a.entry_company from " . TABLE_CUSTOMERS . " c
        left join " . TABLE_ADDRESS_BOOK . " a on a.address_book_id=c.customers_default_address_id
where a.customers_id = c.customers_id and c.customers_id = '" . $customer_id . "'");
    if (tep_db_num_rows($cya_get_customer_query)) {
        $cya_get_customer = tep_db_fetch_array($cya_get_customer_query);
        
        $name = $cya_get_customer['customers_firstname'];
        $email_address = $cya_get_customer['customers_email_address'];;
        $subject = tep_db_prepare_input($_REQUEST['subject']);
        $enquiry = tep_db_prepare_input($_REQUEST['enquiry']);
        $content='';
        $content .='<p>Company name: '.$cya_get_customer['entry_company'].'</p>';
        $content .='<p>Contact First and Last name: '.$cya_get_customer['customers_firstname'] .' '.$cya_get_customer['customers_lastname'].'</p>';
        $content .='<p>Phone number: '.preg_replace('/^(.*?)(.{3})(.{4})$/', '$1-$2 $3', $cya_get_customer['customers_telephone']).'</p>';
        $content .='<p>' . $enquiry . '</p>';
        
        if (tep_validate_email($email_address)) {
            tep_mail_no_triptag(STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS, $subject, $content, $name, $email_address);
            //tep_mail_no_triptag(STORE_OWNER, 'nghiempvn@gmail.com', $subject, $content, $name, $email_address);
            $response['type'] = 1;
            $response['content'] = TEXT_SUCCESS;
        } else {
            $response['type'] = 0;
            $response['content'] = ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
        }

        print json_encode($response);
        exit();
    }
}
if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_add_product_cs')) {
    
    $process = true;
    if ($_REQUEST['type'] == 'add'){
        $attributes=array();
        if (isset($HTTP_POST_VARS['id']) && is_array($HTTP_POST_VARS['id'])) {
            foreach ($HTTP_POST_VARS['id'] as $key=>$val) {
              if (is_numeric($key) && $key==(int)$key && is_numeric($val) && $val==(int)$val)
                $attributes=$attributes + $HTTP_POST_VARS['id'];
            }
         }
        $cart_cs->add_cart($HTTP_POST_VARS['products_id'], $cart_cs->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);
    } elseif ($_REQUEST['type'] == 'remove'){
        $cart_cs->remove($HTTP_POST_VARS['products_id']);
    }
    $cart_contents_string = '';
    if ($cart_cs->count_contents() > 0) {
      $products = $cart_cs->get_products();
      for ($i=0, $n=sizeof($products); $i<$n; $i++) {
          
        $cart_contents_string .= '<div class="cya-list-section-account color-samples">';
        $cart_contents_string .= '<img class="cartcs_color_samples_btn_remove" border=0 src="img/color_samples_btn_remove.png" data-id="' . $products[$i]['id'] . '">';
        $cart_contents_string .= '<span>' . $products[$i]['quantity'] . ' x </span>';
        $cart_contents_string .= '<a class="" href="' . tep_href_link(FILENAME_PRODUCT_INFO, 'products_id=' . $products[$i]['id']) . '">' . $products[$i]['name'] . '</a></div>';
          
        if ((tep_session_is_registered('new_products_id_in_cart')) && ($new_products_id_in_cart == $products[$i]['id'])) {
          tep_session_unregister('new_products_id_in_cart');
        }
      }
    } else {
      $cart_contents_string .= '<div class="cya-list-section-account color-samples"><span>0 items</span></div>';
    }
    $cart_contents_string .= '<div class="color-samples-order-sum">' . $currencies->format($cart_cs->show_total()) . '</div>';

    $response['type'] = 1;
    $response['content'] = $cart_contents_string;

    print json_encode($response);
    exit();
}
if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_add_product_fv')) {
    
    $process = true;
    $attributes=array();
    $cart_fv->add_cart($HTTP_POST_VARS['products_id'], $cart_fv->get_quantity(tep_get_uprid($HTTP_POST_VARS['products_id'], $attributes))+1, $attributes);

    $response['type'] = 1;
    $response['content'] = count($cart_fv->get_products());

    print json_encode($response);
    exit();
}
if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_get_product_fv_amount')) {
    
    $response['type'] = 1;
    $response['content'] = count($cart_fv->get_products());

    print json_encode($response);
    exit();
}

if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_login')) {
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_LOGIN);
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    
    $check_customer_query = tep_db_query("select customers_id, customers_firstname, customers_password, customers_email_address, customers_default_address_id, member_level,qtpro  from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
    
    $check_customer = tep_db_fetch_array($check_customer_query);
    if (!tep_db_num_rows($check_customer_query)) {
        $response['type'] = 0;
        $response['content'] = 'Error: No match for E-Mail Address and/or Password.';
    } else {
//        $check_customer = tep_db_fetch_array($check_customer_query);
        
        if (!tep_validate_password($password, $check_customer['customers_password'])) {
           $response['type'] = 0;
           $response['content'] = 'Error: No match for E-Mail Address and/or Password.';
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

                if (sizeof($navigation->snapshot) > 0) {
                    $origin_href = tep_href_link($navigation->snapshot['page'], tep_array_to_string($navigation->snapshot['get'], array(tep_session_name())), $navigation->snapshot['mode']);
                    $navigation->clear_snapshot();
                    //tep_redirect($origin_href);
                    
                } else {

                    //tep_redirect(tep_href_link(FILENAME_DEFAULT));
                }
                $response['type'] = 1;
                $response['content'] = '';
            }
        }
    }

    print json_encode($response);
    exit();
}

//cya register
if (isset($_REQUEST['action']) && ($_REQUEST['action'] == 'cya_register')) {
    require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CREATE_ACCOUNT);
    $process = true;
    $referral = tep_db_prepare_input($HTTP_POST_VARS['other_option']);
    $referral_other = tep_db_prepare_input($HTTP_POST_VARS['other_option_text']);
    $firstname = ucwords(tep_db_prepare_input($HTTP_POST_VARS['firstname']));
    $lastname = ucwords(tep_db_prepare_input($HTTP_POST_VARS['lastname']));
    $email_address = tep_db_prepare_input($HTTP_POST_VARS['email_address']);
    $company = ucwords(tep_db_prepare_input($HTTP_POST_VARS['company']));
    $street_address = tep_db_prepare_input($HTTP_POST_VARS['street_address']);
    $postcode = tep_db_prepare_input($HTTP_POST_VARS['postcode']);
    $city = tep_db_prepare_input($HTTP_POST_VARS['city']);
    $state = tep_db_prepare_input($HTTP_POST_VARS['state']);
    $country1 = tep_db_prepare_input($HTTP_POST_VARS['country']);
    $dbres = tep_db_fetch_array(tep_db_query("select countries_id from countries where countries_iso_code_2='$country1'"));
    $country = $dbres['countries_id'];
    $group = tep_db_prepare_input($HTTP_POST_VARS['customers_group']);
    $telephone = tep_db_prepare_input($HTTP_POST_VARS['telephone']);
    $customers_telephone_ext = tep_db_prepare_input($HTTP_POST_VARS['customers_telephone_ext']);
    $fax = tep_db_prepare_input($HTTP_POST_VARS['fax']);
    $password = tep_db_prepare_input($HTTP_POST_VARS['password']);
    $confirmation = tep_db_prepare_input($HTTP_POST_VARS['confirmation']);
    $website = tep_db_prepare_input($HTTP_POST_VARS['website']);
    $title = tep_db_prepare_input($HTTP_POST_VARS['title']);
    $st = tep_db_prepare_input($HTTP_POST_VARS['st']);
    $error = false;
    $arrayErrors = array();
    if (strlen($firstname) < ENTRY_FIRST_NAME_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['firstname'] = ENTRY_FIRST_NAME_ERROR;
    }
    if (strlen($lastname) < ENTRY_LAST_NAME_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['lastname'] = ENTRY_LAST_NAME_ERROR;
    }
    if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['email_address'] = ENTRY_EMAIL_ADDRESS_ERROR;
    } elseif (tep_validate_email($email_address) == false) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['email_address'] = ENTRY_EMAIL_ADDRESS_CHECK_ERROR;
    } else {
        $check_email_query = tep_db_query("select count(*) as total from " . TABLE_CUSTOMERS . " where customers_email_address = '" . tep_db_input($email_address) . "'");
        $check_email = tep_db_fetch_array($check_email_query);
        if ($check_email['total'] > 0) {
            $error = true;
            $response['type'] = 0;
            $arrayErrors['email_address'] = ENTRY_EMAIL_ADDRESS_ERROR_EXISTS;
        }
    }

    if (strlen($street_address) < ENTRY_STREET_ADDRESS_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['street_address'] = ENTRY_STREET_ADDRESS_ERROR;
    }

    if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['postcode'] = ENTRY_POST_CODE_ERROR;
    }

    if (strlen($city) < ENTRY_CITY_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['city'] = ENTRY_CITY_ERROR;
    }

    if (is_numeric($country) == false) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['country'] = ENTRY_COUNTRY_ERROR;
    }
    if (strlen($telephone) < ENTRY_TELEPHONE_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['telephone'] = ENTRY_TELEPHONE_NUMBER_ERROR;
    }
    if (strlen($password) < ENTRY_PASSWORD_MIN_LENGTH) {
        $error = true;
        $response['type'] = 0;
        $arrayErrors['password'] = ENTRY_PASSWORD_ERROR;
    } elseif ($password != $confirmation) { 
        $error = true;
        $response['type'] = 0;
        $arrayErrors['password'] = ENTRY_PASSWORD_ERROR_NOT_MATCHING;
    }
    
    //etc
     if (WORKETC_ENABLE == 'True' && tep_connect_worketc() != 0) {
        //if(tep_check_lead($email_address)) {       
        $worketc = tep_connect_worketc();
        $entity = tep_get_entity_by_email($email_address);
        $newgender = 'Unspecified';
        $OwnerID = get_current_login_etc();
        $getperson = $worketc->GetPerson(array('EntityID' => $entity, 'fullDetails' => true));
        $address = $getperson->Addresses->Address;
        if ($address == NULL || !isset($address)) {
            $addid = 0;
        } else {
            if (is_array($address))
                $addid = $address[0]->AddressID;
            else
                $addid = $address->AddressID;
        }
        if ($entity == 0) {
            $setperson = $worketc->SetPerson(array(
                'person' => array('Title' => $title,
                    'FirstName' => $firstname,
                    'MiddleName' => '',
                    'Surname' => $lastname,
                    //'Mobile' => $telephone,
                    'Gender' => $newgender,
                    'EntityID' => 0,
                    'LastActivity' => date('c'),
                    'DateLastModified' => date('c'),
                    'CreationDate' => date('c'),
                    'Email' => $email_address,
                    'CustomerCredentials' => 'SupportPersonal',
                    'Delete' => false,
                    'RemoveParentLinks' => false,
                    'OwnerID' => $OwnerID,
                    'SupplierRate' => 3.1,
                    'SupplierUnit' => 'None',
                    'Website' => $website,
                    'Addresses' => array(
                        'Address' => array(
                            'AddressID' => $addid,
                            'AddressType' => 'Home',
                            'Street' => $street_address,
                            'Suburb' => $city,
                            'StateOrProv' => $state,
                            'PostalCode' => $postcode,
                            'Country' => tep_get_country_name($country),
                            'Phone' => $telephone,
                            'PhoneExt' => $customers_telephone_ext,
                            'Fax' => $fax,
                            'Delete' => false,
                            'RemoveParentLinks' => false,
                            'DateLastModified' => date('c')
                        )
                    ),
                    'RelatedBranches' => array(
                        'BranchResult' => array(
                            'BranchName' => $company,
                            'BranchLabel' => $company,
                            'CompanyName' => $company,
                            'EntityID' => 0,
                            'IsPrimary' => true,
                            'BranchID' => 0,
                            'Delete' => false
                        )
                    )
                )
                    ));
            $entityid = $setperson->EntityID;
        } else {
            $findcompany = $worketc->FindCompanies(array('keywords' => $company));
            $company_id = $findcompany->Company->Branches->Branch->BranchID;
            $setperson = $worketc->SetPerson(array(
                'person' => array('Title' => $title,
                    'FirstName' => $firstname,
                    'MiddleName' => '',
                    'Surname' => $lastname,
                    //'Mobile' => $telephone,
                    'Gender' => $newgender,
                    'EntityID' => $entity,
                    'LastActivity' => date('c'),
                    'DateLastModified' => date('c'),
                    'CreationDate' => date('c'),
                    'Email' => $email_address,
                    'CustomerCredentials' => 'SupportPersonal',
                    'Delete' => false,
                    'RemoveParentLinks' => false,
                    'OwnerID' => $OwnerID,
                    'SupplierRate' => 3.1,
                    'SupplierUnit' => 'None',
                    'Website' => $website,
                    'Addresses' => array(
                        'Address' => array(
                            'AddressID' => $addid,
                            'AddressType' => 'Home',
                            'Street' => $street_address,
                            'Suburb' => $city,
                            'StateOrProv' => $state,
                            'PostalCode' => $postcode,
                            'Country' => tep_get_country_name($country),
                            'Phone' => $telephone,
                            'PhoneExt' => $customers_telephone_ext,
                            'Fax' => $fax,
                            'Delete' => false,
                            'RemoveParentLinks' => false,
                            'DateLastModified' => date('c')
                        )
                    ),
                    'RelatedBranches' => array(
                        'BranchResult' => array(
                            'BranchName' => $company,
                            'BranchLabel' => $company,
                            'CompanyName' => $company,
                            'EntityID' => $entity,
                            'IsPrimary' => true,
                            'BranchID' => 0,
                            'Delete' => false
                        )
                    )
                )
                    ));


            $entityid = $entity;
        }

        $worketc->EntityAddTag(array('EntityID' => $entityid, 'Tag' => "Registered Online"));
    }
    //end etc
    
    if ($error == false) {
        $sql_data_array = array('customers_firstname' => $firstname,
            'referral' => $referral,
            'referral_other' => $referral_other,
            'customers_lastname' => $lastname,
            'customers_email_address' => $email_address,
            'customers_telephone' => $telephone,
            'customers_telephone_ext' => $customers_telephone_ext,
            'customers_fax' => $fax,
            'customers_newsletter' => $newsletter,
            'customers_group' => $group,
            'website' => $website,
            'title' => $title,
            'st' => $st,
            'ip' => $_SERVER['REMOTE_ADDR'],
            'customers_password' => tep_encrypt_password($password));
        
        tep_db_perform(TABLE_CUSTOMERS, $sql_data_array);

        $customer_id = tep_db_insert_id();

        if (WORKETC_ENABLE == 'True' && tep_connect_worketc() != 0) {
            $sql_data_array2 = array('customer_id' => $customer_id, 'tag_id' => 1);
            tep_db_perform('customers_to_tag', $sql_data_array2);
        }

        $sql_data_array = array('customers_id' => $customer_id,
            'entry_firstname' => $firstname,
            'entry_lastname' => $lastname,
            'entry_street_address' => $street_address,
            'entry_postcode' => $postcode,
            'entry_city' => $city,
            'entry_country_id' => $country);

      
        $sql_data_array['entry_company'] = $company;
        
        
                $sql_data_array['entry_zone_id'] = '0';
                $sql_data_array['entry_state'] = $state;
           
       

        tep_db_perform(TABLE_ADDRESS_BOOK, $sql_data_array);

        $address_id = tep_db_insert_id();

        tep_db_query("update " . TABLE_CUSTOMERS . " set customers_default_address_id = '" . (int) $address_id . "' where customers_id = '" . (int) $customer_id . "'");

        tep_db_query("insert into " . TABLE_CUSTOMERS_INFO . " (customers_info_id, customers_info_number_of_logons, customers_info_date_account_created) values ('" . (int) $customer_id . "', '0', now())");

        if (SESSION_RECREATE == 'True') {
            tep_session_recreate();
        }

        $customer_first_name = $firstname;
        $customer_default_address_id = $address_id;
        $customer_country_id = $country;
        

// build the message content
        $name = $firstname . ' ' . $lastname;

        
            $email_text = sprintf(EMAIL_GREET_NONE, $firstname);
       

        //CYA - Add new here
        $email_text = sprintf(EMAIL_TEMPLATE_REGISTASION, HTTP_SERVER, HTTP_SERVER, $firstname, HTTP_SERVER . DIR_WS_CATALOG . "login.php", HTTP_SERVER . DIR_WS_CATALOG . "login.php", $email_address, $password, STORE_OWNER_EMAIL_ADDRESS, STORE_OWNER_EMAIL_ADDRESS);
        tep_mail_new($name, $email_address, EMAIL_SUBJECT, $email_text, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);


        // admin email notification 
        $admin_email_text .= ADMIN_EMAIL_WELCOME . ADMIN_EMAIL_TEXT; // . EMAIL_WARNING;

        $row = tep_db_fetch_array(tep_db_query("select group_name from customers_groups where group_id=$group"));
        if (isset($referral_other) && $referral_other != "") {
            $opt = ' (' . $referral_other . ')';
        }
        $admin_email_text .= "\nCustomer's info:\n" .
                "Name: $firstname $lastname\n" .
                "Company: " . $company . "\n" .
                "Title/Position: " . $title . "\n" .
                "Email: " . $email_address . "\n" .
                "Website: " . $website . "\n" .
                "Group: " . $row['group_name'] . "\n" .
                "Sales Territory: " . $st . "\n" .
                "Country: " . tep_get_country_name($country) . "\n" .
                "City: " . $city . "\n" .
                "Street Address: " . $street_address . "\n" .
                "Post Code: " . $postcode . "\n" .
                "State: " . $state . "\n" .
                "Telephone: $telephone\n" .
                "Telephone ext: $customers_telephone_ext\n" .
                "Fax: " . $fax . "\n" .
                "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n" .
                '<a href="http://www.ip2location.com/">http://www.ip2location.com/</a>' . "\n" .
                "Referral: " . $referral . $opt . "\n\n" .
                "Click to approve: " . HTTP_SERVER . DIR_WS_HTTP_CATALOG . "admin/members.php\n\n";
//        tep_mail(STORE_OWNER, "scalaluxury@gmail.com", EMAIL_SUBJECT, nl2br($admin_email_text), "", STORE_OWNER_EMAIL_ADDRESS);
        tep_mail(STORE_OWNER, "nghiempvn@gmail.com", EMAIL_SUBJECT, nl2br($admin_email_text), "", STORE_OWNER_EMAIL_ADDRESS);
        //tep_redirect(tep_href_link(FILENAME_CREATE_ACCOUNT_SUCCESS, '', 'SSL'));
        $response['type'] = 1;
        $response['content'] = tep_href_link(FILENAME_CREATE_ACCOUNT_SUCCESS, '', 'SSL');
    } else {
        $response['type'] = 0;
        $response['message'] = $arrayErrors;
    }
    
    print json_encode($response);
    exit();
}

$response['type'] = 0;
$response['content'] = "Error. Please try later!";

print json_encode($response);