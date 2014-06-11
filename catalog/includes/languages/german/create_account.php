<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE', 'Konto erstellen');

define('HEADING_TITLE', 'Informationen zu Ihrem Kundenkonto');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>ACHTUNG:</b></font></small> Wenn Sie bereits ein Konto besitzen, so melden Sie sich bitte <a class="remote" href="%s"><u><b>hier</b></u></a> an.');

define('EMAIL_SUBJECT', 'Willkommen zu ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Sehr geehrter Herr ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Sehr geehrte Frau ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Sehr geehrte ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'willkommen zu <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Sie k�nnen jetzt unseren <b>Online-Service</b> nutzen. Der Service bietet unter anderem:' . "\n\n" . '<li><b>Kundenwarenkorb</b> - Jeder Artikel bleibt registriert bis Sie zur Kasse gehen, oder die Produkte aus dem Warenkorb entfernen.' . "\n" . '<li><b>Adressbuch</b> - Wir k�nnen jetzt die Produkte zu der von Ihnen ausgesuchten Adresse senden. Der perfekte Weg ein Geburtstagsgeschenk zu versenden.' . "\n" . '<li><b>Vorherige Bestellungen</b> - Sie k�nnen jederzeit Ihre vorherigen Bestellungen �berpr�fen.' . "\n" . '<li><b>Meinungen �ber Produkte</b> - Teilen Sie Ihre Meinung zu unseren Produkten mit anderen Kunden.' . "\n\n");
define('EMAIL_CONTACT', 'Falls Sie Fragen zu unserem Kunden-Service haben, wenden Sie sich bitte an den Vertrieb: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Achtung:</b> Diese eMail-Adresse wurde uns von einem Kunden bekannt gegeben. Falls Sie sich nicht angemeldet haben, senden Sie bitte eine eMail an ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
define('EMAIL_TEMPLATE_REGISTASION', 
        '<table align="center" width="600">        
      <tr>                
        <td>                    
          <div style="border: 1px solid rgb(204, 204, 204); padding:0 50px 50px 50px; width: 600px;margin-left: 20px; margin-right: 20px;">                        
            <p><a href="%s"><img src="%s/catalog/images/logo-2012-90.jpg" border="0" height="100" width="550"></a></p>
            <p class="text"><font size="3">Hello %s,<br>
              Welcome to Scala Luxury\'s web catalog. You will not able to log in until we review your registration. You will receive an approval email from us shortly after which you will be able to log in with your email address and password below:
              <br>
              Link: <a href="%s">%s</a><br>Username: %s<br>Password: %s<br>
              In the meantime, if you haveany questions please contact us at %s or call 310-929 7211</font></p>
            <p class="text"><font size="3">Kind Regards,</font></p>
            <p class="text"><font size="3">Your Scala Luxury Team<br>www.scalaluxury.com</font></p>
            <p class="text"><font size="3"> Note: You were registered with this email address throught www.scalaluxury.com. If this is a mistake or you did not register, please let us know at %s </font></p>
          </div>
        </td>            
      </tr>        
  </table>');
?>
