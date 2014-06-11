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
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CREATE_ACCOUNT);
$country = 223;
$process = false;
$response = array();
$query = tep_db_query("select * from countries");
$countries = array();
while ($dbres = tep_db_fetch_array($query)) {
    $countries[$dbres['countries_iso_code_2']] = $dbres['countries_name'];
}

echo json_encode($countries);die;

?>