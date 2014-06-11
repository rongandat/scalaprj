<?php
/*
  $Id: search.php 1739 2007-12-20 00:52:16Z hpdl $

  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/
?>
<!-- search //-->
          <tr>
            <td>
<?php
  $info_box_contents = array();
  $info_box_contents = array();
  $info_box_contents[] = array('form' => tep_draw_form('quick_find', tep_href_link(FILENAME_ADVANCED_SEARCH_RESULT, '', 'NONSSL', false), 'get', 'class="ajaxform"'),
                               'align' => 'center',
                               'text' => tep_draw_input_field('keywords', '', 'id="query" size="10" maxlength="30" style="width: ' . (BOX_WIDTH-10) . 'px"') . '&nbsp;' . tep_hide_session_id() . tep_image_submit('button_quick_find.gif') . '<br>' . BOX_SEARCH_TEXT . '<br><a class="remote" href="' . tep_href_link(FILENAME_ADVANCED_SEARCH) . '"><b>' . BOX_SEARCH_ADVANCED_SEARCH . '</b></a>');

  new infoBox($info_box_contents);
?>
            </td>
          </tr>
<!-- search_eof //-->
