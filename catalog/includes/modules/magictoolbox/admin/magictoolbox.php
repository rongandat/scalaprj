<?php

if(!class_exists('magictoolboxAdmin')) {
  class magictoolboxAdmin {
    var $code, $title, $description, $icon, $enabled, $curClass;
    
    function check() {
        if (!isset($this->_check)) {
            $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_" . $this->codeUpper . "_ENABLED'");
            $this->_check = tep_db_num_rows($check_query);
        }
        return $this->_check;
    }
    
    function init($id, $name, $description) {
		if(!isset($GLOBALS["MagicToolboxModuleCoreClass_" . $id])) {
			require_once(dirname(__FILE__) . '/../' . strtolower($id) . '.module.core.class.php');
			$className = $id . 'ModuleCoreClass';
			$GLOBALS["MagicToolboxModuleCoreClass_" . $id] = & new $className;
		}    	
		
		$this->curClass = & $GLOBALS["MagicToolboxModuleCoreClass_" . $id];
		$this->title = $name;
		$this->code = strtolower($id);
		$this->codeUpper = strtoupper($id);
		$this->description = $description;
		$this->icon = '';
		$this->enabled = ((@constant('MODULE_' . strtoupper($id) . '_ENABLED') === 'True') ? true : false);
    }

    function install() {
        /*If CRELoaded */
        if(preg_match('/creloaded/is', file_get_contents('../account.php'))){
                $cre_label = 'Use Ctrl key with keyboard shortcuts to navigation?';
        }
        tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('Enable " . $this->title . "', 'MODULE_" . $this->codeUpper . "_ENABLED', 'True', 'Do you want to enable " . $this->title . " effect?', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");
        foreach($this->_getConf() as $name => $conf) {
             if(($name == 'use-ctrl-key') && $cre_label){
               $label = $cre_label;
            } else {
                $label = $conf["label"];
            }
            switch($conf["type"]) {
                case "array":
                    $func = "tep_cfg_select_option(array(\'" . implode("\', \'",$conf['values']) . "\'), ";
                    break;
                case "num":
                case "text":
                default: $func = null;
            }
            if(!isset($conf["description"])) $conf["description"] = '';
            tep_db_query(
                "INSERT INTO 
                    " . TABLE_CONFIGURATION . " 
                    (
                        configuration_title, 
                        configuration_key, 
                        configuration_value, 
                        configuration_description, 
                        configuration_group_id, 
                        sort_order, 
                        " . (($func === null)?"":("set_function,")) . "
                        date_added
                    ) 
                    values (
                        '" . str_replace('\'', '\'\'', $label) . "',
                        'MODULE_" . $this->codeUpper . "_" . strtoupper($name) . "', 
                        '" . $conf["default"] . "', 
                        '" . addslashes($conf["description"]) . "', 
                        '6', 
                        '5', 
                        " . (($func === null)?"":("'{$func}',")) . "
                        now()
                    )"
            );      
        }
      
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
    }

    function keys() {
        $keys = Array();
        $keys[] = 'MODULE_' . $this->codeUpper . '_ENABLED';
        foreach($this->_getConf() as $name => $conf) {
            $keys[] = 'MODULE_' . $this->codeUpper . '_' . strtoupper($name);
        }
        return $keys;
    }
    
    function _getConf() {
    	$conf = $this->curClass->params->getArray();
    	//echo "<pre>" ; print_r($conf); die();
    	$conf = array_merge($conf, array(
    		"thumb-size-depends-on"           => Array(
                "default" => "both",
                "type"      => "array",
                "subType"   => "select",
                "values"    => Array("width","height",'both'),
                "label"     => "Size of thumbnails depends on"
            ),
            "thumb-size"           => Array(
                "default" => 200,
                "type" => "num",
                "label"     => "Size of thumbnails (in pixels)"
            ),
            "extra-thumb-size"           => Array(
                "default" => 100,
                "type" => "num",
                "label"     => "Size of extra images thumbnails (in pixels)"
            ),
            "paps-thumb-size"           => Array(
                "default" => 100,
                "type" => "num",
                "label"     => "Size of paps module thumbnails (in pixels)"
            ),
            "paps-image-size"           => Array(
                "default" => 200,
                "type" => "num",
                "label"     => "Size of paps module big image (in pixels)"
            ),
            "use-effect-on-product-page"           => Array(
                "default" => "Yes",
                "type"      => "array",
                "subType"   => $this->code == 'magiczoomplus' ? "select" : "radio",
                "values"    => $this->code == 'magiczoomplus' ? Array("Yes","Zoom", "Expand", "No") : Array("Yes","No"),
                "label"     => "Use effect on product page"
            ),
            "use-effect-on-category-page"           => Array(
                "default" => "No",
                "type"      => "array",
                "subType"   => $this->code == 'magiczoomplus' ? "select" : "radio",
                "values"    => $this->code == 'magiczoomplus' ? Array("Yes","Zoom", "Expand", "No") : Array("Yes","No"),
                "label"     => "Use effect on category page"
            ),
            "thumb-size-category-page"           => Array(
                "default" => 100,
                "type" => "num",
                "label"     => "Size of thumbnails on category page (in pixels)"
            ),
            "thumb-margin"           => Array(
                "default" => 1,
                "type" => "num",
                "label"     => "Left/Right margin of thumbnail (in pixels)"
            ),
            "thumb-margin-top"           => Array(
                "default" => 5,
                "type" => "num",
                "label"     => "Top margin of thumbnail (in pixels)"
            ),
            "use-effect-on-hp-whats-new-block"           => Array(
                "default" => "No",
                "type"      => "array",
                "subType"   => $this->code == 'magiczoomplus' ? "select" : "radio",
                "values"    => $this->code == 'magiczoomplus' ? Array("Yes","Zoom", "Expand", "No") : Array("Yes","No"),
                "label"     => "Use effect on What's new block on home page"
            ),
            /*"use-effect-on-new-products-page"           => Array(
                "default" => "No",
                "type"      => "array",
                "subType"   => $this->code == 'magiczoomplus' ? "select" : "radio",
                "values"    => $this->code == 'magiczoomplus' ? Array("Yes","Zoom", "Expand", "No") : Array("Yes","No"),
                "label"     => "Use effect on New products page"
            ),*/
            "link-to-product-page"           => Array(
                "default" => "Yes",
                "type"      => "array",
                "subType"   => "radio",
                "values"    => Array("Yes","No"),
                "label"     => "Link enlarged image to the product page"
            ),
    	));
    	
    	/* only for MagicZoom */
        if(($this->code == 'magiczoom' || $this->code == 'magiczoomplus') && $GLOBALS["mz_osc_cre"] == false) {
        	$conf['zoom_position']['default'] = 'left';
        }
    	
        return $conf;
    }
    
    function getConf() {
        $conf = $this->_getConf();
        foreach($conf as $name => $c) {
            $value = @constant('MODULE_' . $this->codeUpper . '_' . strtoupper($name));
            if($value === null) $value = $c["default"];
            $conf[$name]['value'] = $value;
        }
        $conf["enabled"] = Array(
        	'value' => $this->enabled
        );
        return $conf;
    }

  }
}
?>
