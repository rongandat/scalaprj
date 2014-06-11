<?php
/*
  $Id: information.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- information //-->
          <tr>
            <td><span id="infocenter">
<?php
  $info_box_contents = array();
  $info_box_contents[] = array('text' => "Information Center");

  new infoBoxHeading($info_box_contents, false, false);

  $info_box_contents = array();
  $info_box_contents[] = array('text' => //'<a class="remote" href="' . tep_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a><br>' .
                                         //'<a class="remote" href="' . tep_href_link(FILENAME_PRIVACY) . '">' . BOX_INFORMATION_PRIVACY . '</a><br>' .

                                         '<a class="remote" href="' . tep_href_link("shopping_cart_fv.php") . '">My Favourites</a><br>'); 

  new infoBox($info_box_contents);
?>
            </center></td>
          </tr>
<!-- information_eof //-->
