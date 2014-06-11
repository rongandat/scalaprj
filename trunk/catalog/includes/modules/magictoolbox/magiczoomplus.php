<?php
/**
* Magic Zoom Plus osCommerce Module
*
* @version 3.42.2.2
* @author Magic Toolbox
* @copyright (C) 2008 Magic Toolbox. All rights reserved.
* @link http://www.magictoolbox.com/magiczoomplus/
* @license http://www.magictoolbox.com/license/
*
* Magic Zoom Plus osCommerce Module comes with absolute no warranty.
*/

$GLOBALS["MagicToolboxModuleCurrent"] = "MagicZoomPlus";

require_once(dirname(__FILE__) . '/magictoolbox.php');

function MagicZoomPlus($content = null) {
	return MagicToolboxParse($content);
}

?>