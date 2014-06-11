<?php
/*
  $Id: header.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// check if the 'install' directory exists, and warn of its existence
  if (WARN_INSTALL_EXISTENCE == 'true') {
    if (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/install')) {
      $messageStack->add('header', WARNING_INSTALL_DIRECTORY_EXISTS, 'warning');
    }
  }

// check if the configure.php file is writeable
  if (WARN_CONFIG_WRITEABLE == 'true') {
    if ( (file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) ) {
      $messageStack->add('header', WARNING_CONFIG_FILE_WRITEABLE, 'warning');
    }
  }

// check if the session folder is writeable
  if (WARN_SESSION_DIRECTORY_NOT_WRITEABLE == 'true') {
    if (STORE_SESSIONS == '') {
      if (!is_dir(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NON_EXISTENT, 'warning');
      } elseif (!is_writeable(tep_session_save_path())) {
        $messageStack->add('header', WARNING_SESSION_DIRECTORY_NOT_WRITEABLE, 'warning');
      }
    }
  }

// check session.auto_start is disabled
  if ( (function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true') ) {
    if (ini_get('session.auto_start') == '1') {
      $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
  }

  if ( (WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true') ) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
      $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
  }

  if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
  }
?>

<div id="cwdusacontainer">
<table border="0" width="100%" cellspacing="0" cellpadding="0">
  <tr class="header">
    <td align="left" valign="top"><?php
  if ($banner = tep_banner_exists('dynamic', '850x100')) {
?>

      <table border="0" width="100%" cellspacing="0" cellpadding="0">
        <tr>
          <td align="center"><?php echo tep_display_banner('static', $banner); ?>
	</td>
        </tr>
      </table>
    <?php
  }
?></td>
  </tr>
</table>
<!-- topmenu start -->
<div class="topmenu">
<ul class="sf-menu">
<li class="current_page_item"><a class="remote" href="<?php echo tep_href_link('index.php'); ?>">HOME</a></li>
<li class="page_item">
 <a class="remote" href="<?php echo tep_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo strtoupper(HEADER_TITLE_MY_ACCOUNT); ?></a>
</li>
<li class="page_item">
 <a class="remote" href="<?php echo tep_href_link('shopping_cart_fv.php'); ?>">MY FAVORITES</a>
</li>
<li class="page_item">
 <span id="shopping_cart_box">
  <a class="remote" href="<?php echo tep_href_link(FILENAME_SHOPPING_CART); ?>"><?php echo strtoupper(HEADER_TITLE_CART_CONTENTS); ?></a>
 </span>
</li>
<li class="page_item">
 <span id="infocenter">
  <a class="remote" href="<?php echo tep_href_link('shopping_cart_pr.php','project_id=0'); ?>">MY PROJECTS</a>
 </span>
</li>
<li class="page_item">
 <a class="remote" href="<?php echo tep_href_link('index.php','cPath=23'); ?>">ORDER CATALOG & SAMPLES</a>
</li>
<li class="page_item">
 <?php if (tep_session_is_registered('customer_id')) { ?><a class="remote" href="<?php echo tep_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>" class="headerNavigation"><?php echo strtoupper(HEADER_TITLE_LOGOFF); ?></a><?php } ?>
</li>


<li class="page_item">
 <a class="remote" href="<?php echo tep_href_link(FILENAME_CHECKOUT_SHIPPING, 'ordertype=normal', 'SSL'); ?>"><?php echo strtoupper(HEADER_TITLE_CHECKOUT); ?></a> 
</li>
<li class="page_item">
 <a href="javascript:return false;">INFORMATION</a>
 <ul class='children'>
  <li class="page_item"><a class="remote" href="<?php echo tep_href_link('conditions.php'); ?>" title="Terms & Conditions">Terms & Conditions</a></li>
  <li class="page_item"><a target="_blank" href="<?php echo tep_href_link('pdf_price.php'); ?>" title="Print Price List">Print Price List</a></li>
 </ul>
</li>
<li class="page_item"><a style="padding-right:11px;" class="remote" href="<?php echo tep_href_link('contact_us.php'); ?>">CONTACT US</a>
</li>
</ul>
</div>			
<!-- topmenu end -->


<?php
  if (isset($HTTP_GET_VARS['error_message']) && tep_not_null($HTTP_GET_VARS['error_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerError">
    <td class="headerError"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['error_message']))); ?></td>
  </tr>
</table>
<?php
  }

  if (isset($HTTP_GET_VARS['info_message']) && tep_not_null($HTTP_GET_VARS['info_message'])) {
?>
<table border="0" width="100%" cellspacing="0" cellpadding="2">
  <tr class="headerInfo">
    <td class="headerInfo"><?php echo htmlspecialchars(stripslashes(urldecode($HTTP_GET_VARS['info_message']))); ?></td>
  </tr>
</table>
<?php
  }
?>
