<?php/*  $Id: create_account.php 1739 2007-12-20 00:52:16Z hpdl $  osCommerce, Open Source E-Commerce Solutions  http://www.oscommerce.com  Copyright (c) 2007 osCommerce  Copyright (c) 2011 Sergey Burkov http://www.oscommerce-ajax.com  Released under the GNU General Public License */require('includes/application_top.php');// needs to be included earlier to set the success message in the messageStackrequire(DIR_WS_LANGUAGES . $language . '/' . FILENAME_CREATE_ACCOUNT);$country = 223;$process = false;$response = array();$zones_array = array();$zones_query = tep_db_query("select zone_name from zones where zone_country_id = '" . (int) $country . "' order by zone_name");while ($zones_values = tep_db_fetch_array($zones_query)) {    $zones_array[] = array('id' => $zones_values['zone_name'], 'text' => $zones_values['zone_name']);}echo json_encode($zones_array);die;?>