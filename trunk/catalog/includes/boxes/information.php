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

  $price_group=get_price_group_name($_SESSION['customer_id']);

  if ($price_group == "SL Staff")
   $pdflink = '<a class="nyroModal" href="' . tep_href_link("pdf_prices.php") . '">Print Price List</a><br>';
  else $pdflink='<a href="' . tep_href_link("pdf_price.php") . '">Print Price List</a><br>';

$projects='	
			<ul id="nav2" class="dropdown dropdown-vertical">
			  <li>
			    <a onmouseover="javascript:fill_projects(this, \'na\', 0);" href="javascript:return false;">My Projects &#9658;</a>
			     <ul id="infobox_projects">
			      <li><a class="nyroModal" href="add_project.php">New</a></li>
			    </ul>
                           </li>
			</ul><br>';


  $info_box_contents = array();
  $info_box_contents[] = array('text' => //'<a class="remote" href="' . tep_href_link(FILENAME_SHIPPING) . '">' . BOX_INFORMATION_SHIPPING . '</a><br>' .
                                         //'<a class="remote" href="' . tep_href_link(FILENAME_PRIVACY) . '">' . BOX_INFORMATION_PRIVACY . '</a><br>' .
                                         '<table><tr><td class="boxText"><a class="remote" href="' . tep_href_link("shopping_cart_fv.php") . '">My Favorites</a></td><td align="right" class="boxText"><img border="0" src="images/arrow-r.jpg"></td></tr>'.
                                         '<tr><td class="boxText">'.$projects.'</td><td align="right" class="boxText"><img border="0" src="images/arrow-r.jpg"></td></tr>'.
                                         '<tr><td class="boxText"><a class="remote" href="' . tep_href_link("shopping_cart.php") . '">My Order List</a></td><td align="right" class="boxText"><img border="0" src="images/arrow-r.jpg"></td></tr>' .
                                         '<tr><td class="boxText"><a class="remote" href="' . tep_href_link("index.php", 'cPath=23') . '">Order Catalog & Color Samples</a></td><td align="right" class="boxText"><img border="0" src="images/arrow-r.jpg"></td></tr>' .
                                         '<tr><td class="boxText">'.$pdflink .'</td><td align="right" class="boxText"><img border="0" src="images/arrow-r.jpg"></td></tr></table>'); 

  new infoBox($info_box_contents);
?>
            </span></td>
          </tr>
<!-- information_eof //-->