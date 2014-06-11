<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Create an Account');

define('HEADING_TITLE', 'Please register for catalog access');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTE:</b></font></small> If you already have an account with us, please login at the <a class="remote" href="%s"><u>login page</u></a>.');

define('EMAIL_SUBJECT', 'Pending catalog access for ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Dear Mr. %s,' . "\n");
define('EMAIL_GREET_MS', 'Dear Ms. %s,' . "\n");
define('EMAIL_GREET_NONE', 'Hello %s' . "\n");
define('EMAIL_WELCOME', 'Welcome to <b>' . STORE_NAME .  '</b></b>.' .  "");
define('ADMIN_EMAIL_WELCOME', 'Hello administrator at <b>' . STORE_NAME . '</b>.' . "\n\n");
#define('EMAIL_TEXT', 'Thank you for registering with Scala Luxury. We are reviewing your information and will get back to you shorlty. To make the browsing through our catalog and ordering easy for you, we process all orders online through our website. You will be able to use many features, such as:' . "\n\n" . '<li><b>- Ordering:</b> All orders are tracked online and you can view your history of purchases that you have made with us.' . "\n\n" . '<li><b>- Address Book:</b> Add different ship-to addresses to different orders! This is a great feature if you have multiple locations.' . "\n\n" . '<li><b>- Products:</b> Our catalog is easy to search and categorically organized - you will be able to easily find what you are looking for.' . "\n\n" . '<li><b>- Mailing list:</b> Sign up to our mailing list and stay in touch, this is the fastest way to find out about new designs and additions to our catalog!' . "\n\n");
define('EMAIL_TEXT', 'We are reviewing your registration and will get back to you within a couple of hours. Once you receive the approval email from our office you will be able to log in with your email address and password below:' . "\n\n");
define('EMAIL_LINK', 'Link: %s'. "\n"); 
define('EMAIL_USERNAME', 'Username: %s'. "\n");
define('EMAIL_PASSWORD', 'Password: %s'. "\n\n");

define('ADMIN_EMAIL_TEXT', 'New account - need approval.' . "\n\n");
define('EMAIL_CONTACT', 'In the meantime, if you have questions please contact us at ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n\n\n");
define('EMAIL_WARNING', '<b>Note:</b> You were registered with this email address to our catalog. If this is a mistake, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_BEST_REGARDS', "Best Regards,\n\nScala Luxury - Sales\nwww.scalaluxury.com");

// pull down default text
define('PULL_DOWN_DEFAULT', 'Please Select');
define('TYPE_BELOW', 'Type Below');

// javascript messages
define('JS_ERROR', 'Errors have occured during the process of your form.\n\nPlease make the following corrections:\n\n');

define('JS_REVIEW_TEXT', '* The \'Review Text\' must have at least ' . REVIEW_TEXT_MIN_LENGTH . ' characters.\n');
define('JS_REVIEW_RATING', '* You must rate the product for your review.\n');

define('JS_ERROR_NO_PAYMENT_MODULE_SELECTED', '* Please select a payment method for your order.\n');

define('JS_ERROR_SUBMITTED', 'This form has already been submitted. Please press Ok and wait for this process to be completed.');

define('ERROR_NO_PAYMENT_MODULE_SELECTED', 'Please select a payment method for your order.');

define('CATEGORY_COMPANY', 'Company Details');
define('CATEGORY_PERSONAL', 'Your Personal Details');
define('CATEGORY_ADDRESS', 'Your Address');
define('CATEGORY_CONTACT', 'Your Contact Information');
define('CATEGORY_OPTIONS', 'Options');
define('CATEGORY_PASSWORD', 'Your Password');

define('ENTRY_COMPANY', 'Company Name:');
define('ENTRY_COMPANY_ERROR', '');
define('ENTRY_COMPANY_TEXT', '');
define('ENTRY_GENDER', 'Gender:');
define('ENTRY_GENDER_ERROR', 'Please select your Gender.');
define('ENTRY_GENDER_TEXT', '*');
define('ENTRY_FIRST_NAME', 'First Name:');
define('ENTRY_FIRST_NAME_ERROR', 'Your First Name must contain a minimum of ' . ENTRY_FIRST_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_FIRST_NAME_TEXT', '*');
define('ENTRY_LAST_NAME', 'Last Name:');
define('ENTRY_LAST_NAME_ERROR', 'Your Last Name must contain a minimum of ' . ENTRY_LAST_NAME_MIN_LENGTH . ' characters.');
define('ENTRY_LAST_NAME_TEXT', '*');
define('ENTRY_DATE_OF_BIRTH', 'Date of Birth:');
define('ENTRY_DATE_OF_BIRTH_ERROR', 'Your Date of Birth must be in this format: MM/DD/YYYY (eg 05/21/1970)');
define('ENTRY_DATE_OF_BIRTH_TEXT', '* (eg. 05/21/1970)');
define('ENTRY_EMAIL_ADDRESS', 'E-Mail:');
define('ENTRY_EMAIL_ADDRESS_ERROR', 'Your E-Mail Address must contain a minimum of ' . ENTRY_EMAIL_ADDRESS_MIN_LENGTH . ' characters.');
define('ENTRY_EMAIL_ADDRESS_CHECK_ERROR', 'Your E-Mail Address does not appear to be valid - please make any necessary corrections.');
define('ENTRY_EMAIL_ADDRESS_ERROR_EXISTS', 'Your E-Mail Address already exists in our records - please log in with the e-mail address or create an account with a different address.');
define('ENTRY_EMAIL_ADDRESS_TEXT', '*');
define('ENTRY_STREET_ADDRESS', 'Street:');
define('ENTRY_STREET_ADDRESS_ERROR', 'Your Street Address must contain a minimum of ' . ENTRY_STREET_ADDRESS_MIN_LENGTH . ' characters.');
define('ENTRY_STREET_ADDRESS_TEXT', '*');
define('ENTRY_SUBURB', 'Suburb:');
define('ENTRY_SUBURB_ERROR', '');
define('ENTRY_SUBURB_TEXT', '');
define('ENTRY_POST_CODE', 'Post Code:');
define('ENTRY_POST_CODE_ERROR', 'Your Post Code must contain a minimum of ' . ENTRY_POSTCODE_MIN_LENGTH . ' characters.');
define('ENTRY_POST_CODE_TEXT', '*');
define('ENTRY_CITY', 'City:');
define('ENTRY_CITY_ERROR', 'Your City must contain a minimum of ' . ENTRY_CITY_MIN_LENGTH . ' characters.');
define('ENTRY_CITY_TEXT', '*');
define('ENTRY_STATE', 'State:');
define('ENTRY_STATE_ERROR', 'Your State must contain a minimum of ' . ENTRY_STATE_MIN_LENGTH . ' characters.');
define('ENTRY_STATE_ERROR_SELECT', 'Please select a state from the States pull down menu.');
define('ENTRY_STATE_TEXT', '*');
define('ENTRY_COUNTRY', 'Country:');
define('ENTRY_COUNTRY_ERROR', 'You must select a country from the Countries pull down menu.');
define('ENTRY_COUNTRY_TEXT', '*');
define('ENTRY_TELEPHONE_NUMBER', 'Telephone Number:');
define('ENTRY_TELEPHONE_NUMBER_ERROR', 'Your Telephone Number must contain a minimum of ' . ENTRY_TELEPHONE_MIN_LENGTH . ' characters.');
define('ENTRY_TELEPHONE_NUMBER_TEXT', '*');
define('ENTRY_TITLE_NUMBER_ERROR', 'Your Title/Position must contain a minimum of 3 characters.');
define('ENTRY_FAX_NUMBER', 'Fax Number:');
define('ENTRY_FAX_NUMBER_ERROR', '');
define('ENTRY_FAX_NUMBER_TEXT', '');
define('ENTRY_NEWSLETTER', 'Newsletter:');
define('ENTRY_NEWSLETTER_TEXT', '');
define('ENTRY_NEWSLETTER_YES', 'Subscribed');
define('ENTRY_NEWSLETTER_NO', 'Unsubscribed');
define('ENTRY_NEWSLETTER_ERROR', '');
define('ENTRY_PASSWORD', 'Password:');
define('ENTRY_PASSWORD_ERROR', 'Your Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_ERROR_NOT_MATCHING', 'The Password Confirmation must match your Password.');
define('ENTRY_PASSWORD_TEXT', '*');
define('ENTRY_PASSWORD_CONFIRMATION', 'Password Confirmation:');
define('ENTRY_PASSWORD_CONFIRMATION_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT', 'Current Password:');
define('ENTRY_PASSWORD_CURRENT_TEXT', '*');
define('ENTRY_PASSWORD_CURRENT_ERROR', 'Your Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_NEW', 'New Password:');
define('ENTRY_PASSWORD_NEW_TEXT', '*');
define('ENTRY_PASSWORD_NEW_ERROR', 'Your new Password must contain a minimum of ' . ENTRY_PASSWORD_MIN_LENGTH . ' characters.');
define('ENTRY_PASSWORD_NEW_ERROR_NOT_MATCHING', 'The Password Confirmation must match your new Password.');
define('PASSWORD_HIDDEN', '--HIDDEN--');

define('FORM_REQUIRED_INFORMATION', '* Required information');

define('ENTRY_GROUP', 'Business');
define('SELECT_GROUP', 'Select Here');
define('ENTRY_GROUP_TEXT', '*');
define('ENTRY_GROUP_ERROR', 'Please select your group');
define('HIDE_PRICE', 'HP');
define('EMAIL_REGISTRATION', 'Your account has not been approved yet. When it gets approved use the following login/password:');

define('IMAGE_BUTTON_CONTINUE', 'Continue');

define('TABLE_HEADING_LASTNAME', 'Lastname');
define('TABLE_HEADING_FIRSTNAME', 'Firstname');
define('TABLE_HEADING_ACCOUNT_CREATED', 'Account Created');
define('TABLE_HEADING_ACTION', 'Action');
define('HEADING_TITLE_SEARCH', 'Search');
define('HEADING_TITLE', 'Member approval');

define('EMAIL_CONTACT', 'For help with any of our online services, please email us at: ' . STORE_OWNER_EMAIL_ADDRESS);

define('EMAIL_TEXT_CONFIRM', 'Your account has been approved and you now have complete access to the Scala Luxury web-catalog.' . "\n
Please click the link below and log in with your email address and password:\nwww.scalaluxury.com/catalog\n\nIf you have any questions, please feel free to contact us at 310-929 7211 or email us at info@scalaluxury.com\n\n\n");
define('EMAIL_TEXT_BEST_REGARDS', "Thank you!\n\nScala Luxury - Administrator\nwww.scalaluxury.com");

define('EMAIL_WARNING', '<b>Note:</b> This email address was used to request access to our website. If you did not sign up to be a customer, please send an email to ' . STORE_OWNER_EMAIL_ADDRESS . "\n\n");

define('EMAIL_TEXT_SUBJECT', 'Your account is approved');

define('EMAIL_SEPARATOR', '----------------------------------------------');

define('EMAIL_FORMAT_HTML_CONFIRM', '<table align="center" width="600">        
        <tr>                
            <td>                    
                <div style="border: 1px solid rgb(204, 204, 204); padding: 50px; width: 600px;margin-left: 20px; margin-right: 20px;">                        
                    <p><a href="%s"><img src="%s/catalog/images/logo-2012-90.jpg" border="0" height="100" width="550"></a></p>
                    <p class="text"><font size="2">Hello %s,<br><br>
                        Your account has been approved and you now have full access to the Scala Luxury web-catalog. <br><br>
                        Please click the link below and log in with your email address and password. If you can\'t remember your password please click "Forgot Password" and the system will send you a new password immediately:<br><br>
                        Log in here: <a href="http://www.scalaluxury.com/catalog">www.scalaluxury.com/catalog</a><br><br>
                        If you have any questions, please feel free to contact us at 310-929 7211 or email us at %s</font></p>
                    <p class="text"><font size="2">Kind Regards,</font></p>
                    <p class="text"><font size="2">Your Scala Luxury Team<br>www.scalaluxury.com</font></p>
                </div>
            </td>            
        </tr>        
</table>');
?>
