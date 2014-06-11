<style>
    #payment_error{display:none;
                   font-size: 12px;
                   color: red;
                   font-weight: bold;
                   text-align: center;
                   padding: 10px;
    }
</style>
<script type="text/javascript">
base_url = '<?php HTTP_SERVER . DIR_WS_CATALOG ;?>';
</script>
<script type="text/javascript" src="<?php HTTP_SERVER . DIR_WS_CATALOG ;?>js/cya_frontend.js?v=1.0"></script>
<?php
if (file_exists('includes/functions/cya_functions.php')) include('includes/functions/cya_functions.php');
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
    if ((file_exists(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php')) && (is_writeable(dirname($HTTP_SERVER_VARS['SCRIPT_FILENAME']) . '/includes/configure.php'))) {
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
if ((function_exists('ini_get')) && (WARN_SESSION_AUTO_START == 'true')) {
    if (ini_get('session.auto_start') == '1') {
        $messageStack->add('header', WARNING_SESSION_AUTO_START, 'warning');
    }
}

if ((WARN_DOWNLOAD_DIRECTORY_NOT_READABLE == 'true') && (DOWNLOAD_ENABLED == 'true')) {
    if (!is_dir(DIR_FS_DOWNLOAD)) {
        $messageStack->add('header', WARNING_DOWNLOAD_DIRECTORY_NON_EXISTENT, 'warning');
    }
}

if ($messageStack->size('header') > 0) {
    echo $messageStack->output('header');
}
require(DIR_WS_LANGUAGES . $language . '/' . FILENAME_ADVANCED_SEARCH);
$categories_query_catmenu = tep_db_query("select c.categories_id, c.categories_image, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $currentParID . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and c.categories_id!=21 and c.categories_id!=23 order by sort_order, cd.categories_name");
//$categories_query_catmenu1 = tep_db_query("select c.categories_id, c.categories_image, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $currentParID . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and c.categories_id!=21 and c.categories_id!=23 order by sort_order, cd.categories_name");
?>
<div class="bg-header">
    <div class="topmenu">
        <div class="cya-logo"><a href="<?=HTTP_SERVER . DIR_WS_CATALOG;?>"><img src="<?=HTTP_SERVER . DIR_WS_CATALOG;?>img/logo.png"></a></div>
        <div class="cya-top-title cyafll"><img src="img/text_logo.png"></div>
        <ul class="sf-menu">
            <li class="sf-menu-li sf-menu-contact">
                <a class="" href="<?=HTTP_SERVER . DIR_WS_CATALOG;?>">CATALOG</a><span class="arrow-down"></span>
                <div class="wrap_contact cya_wrap_cat">
                   <div class="cya_wrap_cat_content">
                       <div class="cat-menu-title">
                           <span class="cya-cat-title cyafll">Categories</span>
                           <span class="cya-subcat-title cyafll">Sub-categories</span>
                       </div>
                       <div class="cyaclb"></div>
                        <div class="cya-cat cyafll">
                            <?php while ($categories = tep_db_fetch_array($categories_query_catmenu))  {?>
                            <a title="" href="<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'index.php?cPath=' . $categories['categories_id'];?>" class="cya_menusub" data-id="<?=$categories['categories_id'];?>"><?=$categories['categories_name'];?></a>
                            <div style="display:none;" class="data-cat-thumb-<?=$categories['categories_id'];?>"><img src="<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'images/' . (($categories['categories_image'])?$categories['categories_image']:'new_coming_soon.jpg');?>" height="196px" width="164px"></div>
                            <span class="dotfollow_<?=$categories['categories_id'];?> cya-cat-dotfollow cyafll">...................</span>
                            <div style="display:none;" class="cya_menusub_<?=$categories['categories_id'];?>">
                                <?php $categories_query_catsub = tep_db_query("select c.categories_id, c.categories_image, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.parent_id = '" . $categories['categories_id'] . "' and c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and c.categories_id!=21 and c.categories_id!=23 order by sort_order, cd.categories_name");
                                    while ($categories_sub = tep_db_fetch_array($categories_query_catsub))  {?>
                                        <a data-id="<?=$categories_sub['categories_id'];?>" title="" data-image="<?=HTTP_SERVER . DIR_WS_CATALOG . 'images/' . $categories_sub['categories_image'];?>" class="cat-hover-thumb" href="<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'index.php?cPath=' . $categories['categories_id'] . '_' . $categories_sub['categories_id'];?>"><?=$categories_sub['categories_name'];?></a>
                                        <div style="display:none;" class="data-cat-thumb-<?=$categories_sub['categories_id'];?>"><img src="<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'images/' . (($categories_sub['categories_image'])?$categories_sub['categories_image']:'new_coming_soon.jpg');?>" height="196px" width="164px"></div>
                                    <?php }?>
                            </div>
                            <?php }?>
                        </div>
                        <div class="cya-subcat cyafll"></div>
                        <div class="cya-cat-thumb cyaflr"><img src="<?php echo HTTP_SERVER . DIR_WS_CATALOG . 'img/initial_cat_menu.jpg';?>" height="196px" width="164px"></div>
                        <div class="cyaclb"></div>
                    </div>
                </div>
            </li>
            <li class="sf-menu-li">
                <a href="javascript:return false;">INFORMATION</a><span class="arrow-down"></span>
                <ul class="sf-sub-menu menu-info">
                    <li class=""><a class="" href="<?php echo tep_href_link(FILENAME_ACCOUNT, '', 'SSL'); ?>"><?php echo strtoupper(HEADER_TITLE_MY_ACCOUNT); ?></a></li>
                    <li class=""><a class="" href="<?php echo tep_href_link('shopping_cart_fv.php'); ?>">MY FAVORITES</a></li>
                    <li class=""><a class="" href="<?php echo tep_href_link('shopping_cart_pr.php', 'project_id=0'); ?>">MY PROJECTS</a></li>
                    <?php
                    $check_account_query = tep_db_query("select is_overstock_customer, overstock_active from " . TABLE_CUSTOMERS . " where customers_id = '" . (int) $customer_id . "'");

                    $check_account = tep_db_fetch_array($check_account_query);

                    if ($check_account['overstock_active'] && $check_account['is_overstock_customer']) {
                        echo '<li class="page_item"><a class="" href="../overstock?' . tep_session_name() . '=' . tep_session_id() . '">OVERSTOCK SECTION</a></li>';
                    }
                    ?>
                    <li class=""><a class="" href="<?php echo tep_href_link('account_invoices_quotes.php', ''); ?>">MY QUOTES - INVOICES</a></li>
                    <li class=""><a class="" href="<?php echo tep_href_link('color_samples.php', ''); ?>">ORDER COLOR SAMPLES</a></li>
                    <li class=""><a class="" href="<?php echo tep_href_link('conditions.php'); ?>" title="Terms & Conditions">TERMS & CONDITIONS</a></li>
                </ul>
            </li>
           <li class="sf-menu-li sf-menu-contact"><a class="" href="javascript:return false;">CONTACT</a>
               <div class="wrap_contact">
                   <div class="h_contact_content">
                       <div id="cya_contact_error_msg"></div>
                       <p class="cya-notice-success" id="cya_menutop_contact_success"></p>
                       <p id="cya_h_contact_guide">Hello <?php echo $customer_first_name?>, please send us an email and we will get back to you shortly!</p>
                       <input type="text" id="menutop_contact_subject" name="subject" class="text uni" placeholder="Subject" width="150">
                       <textarea name="enquiry" id="menutop_contact_enquiry" wrap="soft" cols="40" rows="10" class="uniform uni"></textarea>
                       <div class="clear"></div>
                       <div class="h_contact_info">
                           <span class="h_contact_info1">
                               SCALA LUXURY <BR>
                               2104 E 57th St.<br>
                               Los Angeles,CA 90021
                           </span>
                           <span class="h_contact_info2">
                               T: 310-929 7211 <br>
                               F: 310-957 2100 <br>
                               www.scalaluxury.com
                           </span>
                           <button class="cya-button-send-contact cya-button cyaflr" style="background-color: #ccc;border-radius: 0 0 0 0;">SEND</button>
                       </div>
                       <div class="clear"></div>
                   </div>
               </div>
           </li>
            <li class="sf-menu-li">
                <?php if (tep_session_is_registered('customer_id')) { ?><a class="" href="<?php echo tep_href_link(FILENAME_LOGOFF, '', 'SSL'); ?>" class="headerNavigation">LOG OUT</a><?php } ?>
            </li>
            <li class="sf-menu-li sf-menu-contact">
                <a class="cyaflr" style="float:right !important;" href="javascript:return false;">ADVANCED SEARCH</a>
                <span class="arrow-down cyaflr"></span>
                <div class="wrap_contact cya_wrap_adsearch">
                    <?php echo tep_draw_form('advanced_search', tep_href_link(FILENAME_ADVANCED_SEARCH, '', 'NONSSL', false), 'get', 'onsubmit="return check_form_as(this);" id="topmenu_ad_search"') . tep_hide_session_id(); ?>
                   <div class="cya-content">
                       <div class="guide-cat">
                           <div class="guide cyafll"><?php echo TOP_TEXT_GUIDE_SEARCH;?></div>
                           <div class="cat cyaflr">
                               <?php echo tep_draw_pull_down_menu('categories_id', tep_get_categories(array(array('id' => '', 'text' => TOP_TEXT_CATEGORY)))); ?><br>
                               <?php echo tep_draw_checkbox_field('inc_subcat', '1', true) . ' ' . ENTRY_INCLUDE_SUBCATEGORIES; ?>
                           </div>
                           <input type="hidden" name="keywords" value="">
                           <div class="cyaclb"></div>
                       </div>
                       <img style="margin:10px 0;" class="cyafll" src="<?php HTTP_SERVER . DIR_WS_CATALOG ;?>img/topmenu_adsearch_bg.jpg">
                       <div class="fields-con">
                            <div class="one-cond">
                                <div class="ocleft"><?php echo ENTRY_PRICE_FROM; ?></div>
                                <div class="ocright"><?php echo tep_draw_input_field('pfrom', '','class="price"'); ?></div>
                                <div class="cyaclb"></div>
                            </div>
                            <div class="one-cond">
                                <div class="ocleft"><?php echo ENTRY_PRICE_TO; ?></div>
                                <div class="ocright"><?php echo tep_draw_input_field('pto', '','class="price"'); ?></div>
                                <div class="cyaclb"></div>
                            </div>
                            <div class="one-cond">
                              <div class="ocleft">Width:</div>
                              <div class="ocright"><?php echo tep_draw_input_field('width_from','','size="2"'); ?>&nbsp;to&nbsp; <?php echo tep_draw_input_field('width_to','','size="2"'); ?>&nbsp;<span class="meas">inches</span></div>
                              <div class="cyaclb"></div>
                            </div>
                            <div class="one-cond">
                              <div class="ocleft">Height:</div>
                              <div class="ocright"><?php echo tep_draw_input_field('height_from','','size="2"'); ?>&nbsp;to&nbsp; <?php echo tep_draw_input_field('height_to','','size="2"'); ?>&nbsp;<span class="meas">inches</span></div>
                              <div class="cyaclb"></div>
                            </div>
                            <div class="one-cond">
                              <div class="ocleft">Depth:</div>
                              <div class="ocright"><?php echo tep_draw_input_field('depth_from','','size="2"'); ?>&nbsp;to&nbsp; <?php echo tep_draw_input_field('depth_to','','size="2"'); ?>&nbsp;<span class="meas">inches</span></div>
                              <div class="cyaclb"></div>
                            </div>
                            <div class="one-cond">
                                    Inches<input onclick="change_metric_search('inches',this.checked);" name="metric" checked value="inches" type="radio">
                                    Metric<input onclick="change_metric_search('metric',this.checked);" name="metric" value="metric" type="radio">
                                    <button style="background-color: #ccc;border-radius: 0 0 0 0; width: 60px;" onclick="$('#topmenu_ad_search').submit();" class="cya-button-send-contact cya-button cyaflr">FIND</button>
                            </div>
                        </div>
                       <div class="cyaclb"></div>
                   </div>
                 </form>
               </div>
            </li>
        </ul>
        <div class="sf-menu-li cyaflr" style="padding: 8px 0px 0px;">
                <?php
                    echo tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH, '', 'NONSSL', false), 'get', 'class="topmenu-search"');
                    
                    echo tep_draw_input_field('keywords', '', 'id="query" size="10" maxlength="30" placeholder="Product Search"') . '&nbsp;' . tep_hide_session_id() . tep_image_submit('menutop_btn_search.jpg', '', 'class="button"');
                  ?>
                </form>
        </div>
    </div>			
    <!-- topmenu end -->

</div>
<div id="cwdusacontainer">
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