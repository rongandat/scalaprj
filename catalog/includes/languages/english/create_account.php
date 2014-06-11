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
define('EMAIL_TEMPLATE_REGISTASION', 
        '<table align="center" width="600">        
      <tr>                
        <td>                    
          <div style="border: 1px solid rgb(204, 204, 204); padding:0 50px 50px 50px; width: 600px;margin-left: 20px; margin-right: 20px;">                        
            <p><a href="%s"><img src="%s/catalog/images/logo-2012-90.jpg" border="0" height="100" width="550"></a></p>
            <p class="text">Hello %s,<br>
              Welcome to Scala Luxury\'s web catalog. You will not able to log in until we review your registration. You will receive an approval email from us shortly after which you will be able to log in with your email address and password below:
              <br>
              Link: <a href="%s">%s</a><br>Username: %s<br>Password: %s<br>
              In the meantime, if you have any questions please contact us at %s or call 310-929 7211</p>
            <p class="text">Kind Regards,</p>
            <p class="text">Your Scala Luxury Team<br>www.scalaluxury.com</p>
            <p class="text"> Note: You were registered with this email address throught www.scalaluxury.com. If this is a mistake or you did not register, please let us know at %s </p>
          </div>
        </td>            
      </tr>        
  </table>');
?>
