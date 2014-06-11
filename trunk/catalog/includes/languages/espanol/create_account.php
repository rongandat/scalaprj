<?php
/*
  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2002 osCommerce

  Released under the GNU General Public License
*/

define('NAVBAR_TITLE_1', 'Crear una Cuenta');
define('NAVBAR_TITLE_2', 'Proceso');
define('HEADING_TITLE', 'Datos de Mi Cuenta');

define('TEXT_ORIGIN_LOGIN', '<font color="#FF0000"><small><b>NOTA:</b></font></small> Si ya ha pasado por este proceso y tiene una cuenta, por favor <a class="remote" href="%s"><u>entre</u></a> en ella.');

define('EMAIL_SUBJECT', 'Bienvenido a ' . STORE_NAME);
define('EMAIL_GREET_MR', 'Estimado ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_MS', 'Estimado ' . stripslashes($HTTP_POST_VARS['lastname']) . ',' . "\n\n");
define('EMAIL_GREET_NONE', 'Estimado ' . stripslashes($HTTP_POST_VARS['firstname']) . ',' . "\n\n");
define('EMAIL_WELCOME', 'Le damos la bienvenida a <b>' . STORE_NAME . '</b>.' . "\n\n");
define('EMAIL_TEXT', 'Ahora puede disfrutar de los <b>servicios</b> que le ofrecemos. Algunos de estos servicios son:' . "\n\n" . '<li><b>Carrito Permanente</b> - Cualquier producto a�adido a su carrito permanecera en el hasta que lo elimine, o hasta que realice la compra.' . "\n" . '<li><b>Libro de Direcciones</b> - Podemos enviar sus productos a otras direcciones aparte de la suya! Esto es perfecto para enviar regalos de cumplea�os directamente a la persona que cumple a�os.' . "\n" . '<li><b>Historia de Pedidos</b> - Vea la relacion de compras que ha realizado con nosotros.' . "\n" . '<li><b>Comentarios</b> - Comparta su opinion sobre los productos con otros clientes.' . "\n\n");
define('EMAIL_CONTACT', 'Para cualquier consulta sobre nuestros servicios, por favor escriba a: ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n\n");
define('EMAIL_WARNING', '<b>Nota:</b> Esta direccion fue suministrada por uno de nuestros clientes. Si usted no se ha suscrito como socio, por favor comuniquelo a ' . STORE_OWNER_EMAIL_ADDRESS . '.' . "\n");
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
              In the meantime, if you haveany questions please contact us at %s or call  FREE 310-929 7211</p>
            <p class="text">Kind Regards,</p>
            <p class="text">Your Scala Luxury Team<br>www.scalaluxury.com</p>
            <p class="text"> Note: You were registered with this email address throught www.scalaluxury.com. If this is a mistake or you did not register, please let us know at %s </p>
          </div>
        </td>            
      </tr>        
  </table>');
?>
