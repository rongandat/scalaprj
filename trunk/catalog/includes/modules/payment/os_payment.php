<?php

  class os_payment {
    var $code, $title, $description, $enabled;

// class constructor
    function os_payment() {
      $this->code = 'os_payment';
      $this->title = MODULE_OS_PAYMENT_TEXT_TITLE;
      $this->description = MODULE_OS_PAYMENT_TEXT_DESCRIPTION;
      $this->enabled = (( MODULE_OS_PAYMENT_STATUS == 'True') ? true : false);
      $this->sort_order = MODULE_OS_PAYMENT_SORT_ORDER;
      if ((int)MODULE_OS_PAYMENT_ORDER_STATUS_ID > 0) {
				$this->order_status = MODULE_OS_PAYMENT_ORDER_STATUS_ID;
			}
                  if (is_object($order)) $this->update_status();


    }

// class methods
    function javascript_validation() {
      return false;
    }

    function selection() {
    return array('id' => $this->code,
		 'module' => $this->title);
    }

    function pre_confirmation_check() {
      return false;
    }

 function confirmation() {
      return array('title' => '          <tr>' . "\n" . '            <td class="main">&nbsp;' . MODULE_OS_PAYMENT_TEXT_DESCRIPTION . '&nbsp;</td>' . "\n" .  '          </tr>' . "\n");
    }

    function process_button() {
      return false;
    }

    function before_process() {
      return false;
    }

    function after_process() {
      return false;
    }

    function output_error() {
      return false;
    }

    function check() {
      if (!isset($this->check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_OS_PAYMENT_STATUS'");
        $this->check = tep_db_num_rows($check_query);
      }
      return $this->check;
    }

    function install() {
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Allow Overstock Payment', 'MODULE_OS_PAYMENT_STATUS', 'True', 'Do you want to accept Overstock Order payments?', '6', '1', now());");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('Sort order of display.', 'MODULE_OS_PAYMENT_SORT_ORDER', '0', 'Sort order of display. Lowest is displayed first.', '6', '0', now())");
      tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('Set Order Status', 'MODULE_OS_PAYMENT_ORDER_STATUS_ID', '0', 'Set the status of orders made with this payment module to this value', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
}

		function remove() {
			tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
		}

    function keys() {
     	return $keys = array(
             'MODULE_OS_PAYMENT_STATUS',
             'MODULE_OS_PAYMENT_SORT_ORDER',
             'MODULE_OS_PAYMENT_ORDER_STATUS_ID');
    }
  }