<?php
/*
  $Id: whats_new.php,v 1.31 2003/02/10 22:31:09 hpdl Exp $

  E-Commerce Solutions

  Copyright (c) 2005 www.flash-template-design.com

  Released under the GNU General Public License
*/
?>
 <table border="0" height="41" cellpadding="0" cellspacing="0" width="100%" bgcolor="#5F5F5F" >
					<tr align="center">
						<td width="231" height="41" id="shopping_cart" align="left"><a class="remote" href="<?php echo tep_href_link(FILENAME_SHOPPING_CART) ?>"><img src="images/shopping_cart_im.gif" width="27" height="27" border="0" align="left"></a>Now in your cart <br/><?php  echo '<span style="color:#FFFFFF; font-weight:bold;">'.sizeof($products = $cart->get_products()).' items</span>'; ?></td>
						<td width="70"><a class="menu" href="<?php echo tep_href_link(FILENAME_DEFAULT) ?>">HOME</a></td>
						<td width="1"><img src="images/menu_divider.gif" width="1" height="16"></td>
						<td width="101"><a class="menu" href="<?php echo tep_href_link(FILENAME_ABOUT_US) ?>">ABOUT US</td>
						<td width="1"><img src="images/menu_divider.gif" width="1" height="16"></td>						
						<td width="108"><a class="menu" href="<?php echo tep_href_link(FILENAME_PRODUCTS, '', 'SSL') ?>">PRODUCTS</a></td>
						<td width="1"><img src="images/menu_divider.gif" width="1" height="16"></td>						
						<td width="78"><a class="menu" href="<?php echo tep_href_link(FILENAME_MAP) ?>">MAP</a></td>
						<td width="1"><img src="images/menu_divider.gif" width="1" height="16"></td>						
						<td width="120"><a class="menu" href="<?php echo tep_href_link(FILENAME_CONTACT_US) ?>">CONTACT US</a></td>
					</tr>
					<tr>
						<td width="712" height="4" colspan="10" background="images/under_menu.gif"><img src="images/under_menu.gif" width="1" height="4" alt="" /></td>
					</tr>
					
</table>

