<?php

    ob_start();
    
    $GLOBALS["magictoolbox_dir_ws_images"] = DIR_WS_IMAGES;
    if(empty($GLOBALS["magictoolbox_dir_ws_images"])) $GLOBALS["magictoolbox_dir_ws_images"] = 'images/';
    
    $_DMTD = @constant('DYNAMIC_MOPICS_THUMBS_DIR');
    if($_DMTD !== null) {
        $GLOBALS["magictoolbox_dir_ws_images"] .= DYNAMIC_MOPICS_THUMBS_DIR;
    }

    $GLOBALS["magictoolbox_dir_ws_images_quoted"] = preg_quote(trim($GLOBALS["magictoolbox_dir_ws_images"]), "/");                
    
    /* is this CRELoaded engine? */
    $GLOBALS["mz_osc_cre"] = false;
    if(isset($GLOBALS["cre_RCI"]) && is_object($GLOBALS["cre_RCI"]) /*&& isset($GLOBALS["cre_RCO"]) && is_object($GLOBALS["cre_RCO"])*/) {
        $GLOBALS["mz_osc_cre"] = true;
    }
    /*If CRELoaded 6.2*/
    if(preg_match('/creloaded/is', file_get_contents('account.php'))){
        $GLOBALS["mz_osc_cre"] = true;
    }

    if(!defined('OPTIONS_AS_COLOR_SWATCHES_ENABLED')) {
	    define('OPTIONS_AS_COLOR_SWATCHES_ENABLED', false);
    }    

    /* load config */
    require_once(DIR_WS_MODULES . 'magictoolbox/admin/' . strtolower($GLOBALS["MagicToolboxModuleCurrent"]) . '.php');
    $mtClassName = strtolower($GLOBALS["MagicToolboxModuleCurrent"]);
    $mtClass = new $mtClassName;
    $mtClass->curClass->params->appendArray($mtClass->getConf());
    @include(DIR_WS_LANGUAGES . $GLOBALS['language'] . '/modules/magictoolbox/magiczoomplus.php');
    @define('MODULE_LNG_MAGICZOOMPLUS_MESSAGE', $mtClass->curClass->params->getValue('message'));
    @define('MODULE_LNG_MAGICZOOMPLUS_LOADING_MESSAGE', $mtClass->curClass->params->getValue('loading-msg'));
    @$mtClass->curClass->params->set('message', MODULE_LNG_MAGICZOOMPLUS_MESSAGE);
    @$mtClass->curClass->params->set('loading-msg', MODULE_LNG_MAGICZOOMPLUS_LOADING_MESSAGE);
    $GLOBALS["MagicToolboxModuleClass"] = & $mtClass;
    //dmp($mtClass->curClass->params->params);

    /* = = = onlyFor start: magiczoomplus
    if($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Zoom')) {
        $mtClass->curClass->params->set('disable-expand', 'Yes');
        $mtClass->curClass->params->set('disable-zoom', 'No');
        $mtClass->curClass->params->set('use-effect-on-product-page', 'Yes');
    } elseif($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Expand')) {
        $mtClass->curClass->params->set('disable-zoom', 'Yes');
        $mtClass->curClass->params->set('disable-expand', 'No');
        $mtClass->curClass->params->set('use-effect-on-product-page', 'Yes');
    }
    = = = onlyFor end: magiczoomplus */
    
    /*
    $mtrel = Array();
    $mtrel[] = "opacity: ".$GLOBALS["mz_conf"]["opacity"];
    $mtrel[] = "zoom-width: ".$GLOBALS["mz_conf"]["zoom-width"];
    $mtrel[] = "zoom-height: ".$GLOBALS["mz_conf"]["zoom-height"];
    $mtrel[] = "zoom-position: ".$GLOBALS["mz_conf"]["zoom-position"];
    $mtrel[] = "thumb-change: ".$GLOBALS["mz_conf"]["thumb-change"];
    
    $GLOBALS["mz_rel"] = join($mzrel, ';');
    */
    
    /*if($GLOBALS["mz_conf"]["message"] != "") {
        $GLOBALS["mz_msg"] = '<br/><span style="font-size:10px;">'.$GLOBALS["mz_conf"]["message"].'</span>';
    }*/
    
    /* rewrite 'tep_javascript_image' function for CRELoaded engine */
    /* NOTE: original 'tep_javascript_image' function of CRELoaded engine should be rename to 'tep_javascript_image_original' */
    /* (includes/functions/html_output.php -> function tep_javascript_image) */
    if($GLOBALS["mz_osc_cre"]) {
        function tep_javascript_image($src, $name, $alt = '', $width = '', $height = '', $parameters = '', $popup = false) {
            
            $mtClass = & $GLOBALS["MagicToolboxModuleClass"];
            
            if($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Zoom')) {
                $mtClass->curClass->params->set('disable-expand', 'Yes');
                $mtClass->curClass->params->set('disable-zoom', 'No');
            } elseif($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Expand')) {
                $mtClass->curClass->params->set('disable-zoom', 'Yes');
                $mtClass->curClass->params->set('disable-expand', 'No');
            }


            if(($GLOBALS["content"] == "product_info" || $GLOBALS["content"] == "product_info_tabs") && $mtClass->curClass->params->getValue('enabled') == true) {
                $product_info = $GLOBALS["product_info"];
                $img = "";
                foreach(array("","_med","_lrg") as $key) {
                    if(!empty($GLOBALS["product_info"]["products_image" . $key])) {
                        $img = $GLOBALS["product_info"]["products_image" . $key];
                    }
                }

                if(empty($img)) return tep_javascript_image_original($src, $name, $alt, $width, $height, $parameters, $popup);
                $img = $GLOBALS["magictoolbox_dir_ws_images"] . $img;
                $thumb = MagicToolbox_getThumb($img, $mtClass->curClass->params->getValue("thumb-size"));
                return callback_MagicToolbox(Array('','',''), $img, $thumb, $mtClass->curClass->params->getValue("thumb-size"), 'productImage', '', $alt);
                
                /*$html = "<img src=\"{$thumb}\" alt=\"{$alt}\" {$parameters} />";
                $html = "<a class="remote" href=\"{$img}\" class=\"MagicZoom\" title=\"{$alt}\">{$html}</a>";
                return $html;*/
            }
            return tep_javascript_image_original($src, $name, $alt, $width, $height, $parameters, $popup);
        }
    }
    
    function MagicToolboxParse($content = null) {
        $stsMod = false;
        if($content == null) {
            $content = ob_get_contents();
            ob_clean();
        } else {
            $stsMod = true;
            ob_end_flush();
        }
        $mtClass = & $GLOBALS["MagicToolboxModuleClass"];
        //$conf = $mtClass->getConf();

        $product_info = $GLOBALS["product_info"];
        
        // is Enabled Color Swatches on current page
        $_csw = false;
        if($GLOBALS['products_image'] != $product_info['products_image']) {
            $_csw = true;
        }
        
        //die("<div style=\"display:none;\">".print_r($GLOBALS,true)."</div>");
        
        $categoryPage = false;
        $productPage = false;
/*        if((!$mtClass->curClass->params->checkValue("use-effect-on-category-page", "No")
                && ($GLOBALS['category_depth'] == 'products' && intval($GLOBALS['current_category_id']) > 0
                    || intval($_GET['manufacturers_id']) > 0)
                || $GLOBALS['category_depth'] == 'top'
                    && !$mtClass->curClass->params->checkValue('use-effect-on-hp-whats-new-block', 'No'))
             && (preg_match("/index\.php/is", $GLOBALS['_SERVER']['REQUEST_URI'])
                || preg_match('/-[cm]-[0-9_]+\.html/is', $GLOBALS['_SERVER']['REQUEST_URI']))
             || !$mtClass->curClass->params->checkValue('use-effect-on-new-products-page', 'No')
                && $GLOBALS['_SERVER']['SCRIPT_NAME'] == '/products_new.php') */
        if (1==1)
										{

            $list_box_contents = $GLOBALS['list_box_contents'];
            $info_box_contents = $GLOBALS['info_box_contents'];

            //print_r($list_box_contents); die();

            if(preg_match('/productListing-heading/is', $list_box_contents[0][0]['params'])) {
                // remove table header
                array_shift($list_box_contents);
            }

            if(!isset($list_box_contents[0]['text']) && @!isset($list_box_contents[0][1]['text'])) {
                $products_list_contents = $info_box_contents;
            } else {
                $products_list_contents = $list_box_contents;
            }

            if($mtClass->curClass->params->checkValue('use-effect-on-category-page', 'Zoom')) {
                $mtClass->curClass->params->set('disable-expand', 'Yes');
                $mtClass->curClass->params->set('disable-zoom', 'No');
                $mtClass->curClass->params->set('use-effect-on-category-page', 'Yes');
            } elseif($mtClass->curClass->params->checkValue('use-effect-on-category-page', 'Expand')) {
                $mtClass->curClass->params->set('disable-zoom', 'Yes');
                $mtClass->curClass->params->set('disable-expand', 'No');
                $mtClass->curClass->params->set('use-effect-on-category-page', 'Yes');
            }
            if($mtClass->curClass->params->checkValue('use-effect-on-hp-whats-new-block', 'Zoom')) {
                $mtClass->curClass->params->set('disable-expand', 'Yes');
                $mtClass->curClass->params->set('disable-zoom', 'No');
                $mtClass->curClass->params->set('use-effect-on-hp-whats-new-block', 'Yes');
            } elseif($mtClass->curClass->params->checkValue('use-effect-on-hp-whats-new-block', 'Expand')) {
                $mtClass->curClass->params->set('disable-zoom', 'Yes');
                $mtClass->curClass->params->set('disable-expand', 'No');
                $mtClass->curClass->params->set('use-effect-on-hp-whats-new-block', 'Yes');
            }
            if($mtClass->curClass->params->checkValue('use-effect-on-new-products-page', 'Zoom')) {
                $mtClass->curClass->params->set('disable-expand', 'Yes');
                $mtClass->curClass->params->set('disable-zoom', 'No');
                $mtClass->curClass->params->set('use-effect-on-new-products-page', 'Yes');
            } elseif($mtClass->curClass->params->checkValue('use-effect-on-new-products-page', 'Expand')) {
                $mtClass->curClass->params->set('disable-zoom', 'Yes');
                $mtClass->curClass->params->set('disable-expand', 'No');
                $mtClass->curClass->params->set('use-effect-on-new-products-page', 'Yes');
            }

            

            $categoryPage = true;
        }
        
        if ($mtClass->curClass->params->checkValue("enabled",true) && !$mtClass->curClass->params->checkValue("use-effect-on-product-page", "No") && $product_info && is_array($product_info)) {
            
            $productPage = true;
            
            if($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Zoom')) {
                $mtClass->curClass->params->set('disable-expand', 'Yes');
                $mtClass->curClass->params->set('disable-zoom', 'No');
            } elseif($mtClass->curClass->params->checkValue('use-effect-on-product-page', 'Expand')) {
                $mtClass->curClass->params->set('disable-zoom', 'Yes');
                $mtClass->curClass->params->set('disable-expand', 'No');
            }

        
            /* backup left/right columns content */
            $contentBackup = preg_replace('/^(.*?<\!--\sbody_text\s\/\/-->)(.*?)(<\!--\sbody_text_eof\s\/\/-->.*)$/is', '$1_MAGICTOOLBOX_COLUMNS_BACKUP_$3', $content);
            if($contentBackup === null || $contentBackup == $content) {
                $contentBackup = false;
            } else {
                $content = preg_replace('/^(.*?<\!--\sbody_text\s\/\/-->)(.*?)(<\!--\sbody_text_eof\s\/\/-->.*)$/is', '$2', $content);
            }

            /* backup left/right columns content in OscMax */
            if($contentBackup == false) {
                $contentBackup = preg_replace('/^(.*?<\!--\scontent\s\/\/-->)(.*?)(<\!--\scontent_eof\s\/\/-->.*)$/is', '$1_MAGICTOOLBOX_COLUMNS_BACKUP_$3', $content);
                if($contentBackup === null || $contentBackup == $content) {
                    $contentBackup = false;
                } else {
                    $content = preg_replace('/^(.*?<\!--\scontent\s\/\/-->)(.*?)(<\!--\scontent_eof\s\/\/-->.*)$/is', '$2', $content);
                }
            }


            /* backup <noscript> tags */
            $GLOBALS["magictoolbox_noscripts_backups"] = Array();
            $content = preg_replace_callback("/(<noscript>.*<\/noscript>)/iUs","MagicToolbox_callback_noscript",$content);
            
            if(!$GLOBALS["mz_osc_cre"]) {
                /* product image parce - only for original osCommerce distributive (no CRELoaded engine!)*/
                $product_image = $product_info["products_image"];

                $srcAddons = '';
                if($_csw && OPTIONS_AS_COLOR_SWATCHES_ENABLED && is_array($GLOBALS['products_options_array']) && !empty($GLOBALS['products_options_array'])) {
                    $srcAddons = array();
                    foreach($GLOBALS['products_options_array'] as $po) {
                        // comented.. maybe should be used for old versions of color swatches
                        //$srcAddons[] = $po['att_id'];
                        $srcAddons[] = preg_quote($po['image'], '/');
                    }
                    //$srcAddons = '(?:(?:options\/)?(?:(?:' . implode(')|(?:', $srcAddons) . '))_)?';
                    $srcAddons = '(?:(?:options\/)?(?:(?:' . implode(')|(?:', $srcAddons) . ')))?';
                    $product_image = "";
                }
                
                if(isset($product_info["products_largeimage"]) && !empty($product_info["products_largeimage"])) {
                    /* support Sm,Med,and Lg Images osCommerce addon (http://addons.oscommerce.com/info/695) */
                    $product_image = $product_info["products_largeimage"];
                }
                
                if(isset($product_info["products_image_med"]) && isset($product_info["products_image_pop"])) {
                    if(!empty($product_info["products_image_med"])) {
                        $product_image = $product_info["products_image_med"];
                    } elseif(!empty($product_info["products_image_pop"])) {
                        $product_image = $product_info["products_image_pop"];
                    }
                }
                
                if(isset($product_info["products_image_med"]) && !empty($product_info["products_largeimage"])) {
                    /* support Additional Images Module osCommerce addon (http://addons.oscommerce.com/info/1032) */
                    $product_image = $product_info["products_largeimage"];
                }

                if(function_exists('thumbimage')) {
                    // support Automatic Thumbnail oscommerce addon
                    $GLOBALS['magictoolbox']['product_image_orig'] = $GLOBALS["magictoolbox_dir_ws_images"] . $product_image;
                    $product_image = $GLOBALS["magictoolbox_dir_ws_images_quoted"] . '(thumbs_cache\/)?(imagecache\/([0-9]+x[0-9]+_)?)?' . preg_quote($product_image,"/");;
                } else {
                    $product_image = $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $srcAddons . preg_quote($product_image,"/");;
                }

                $pattern = "<img[^>]*src=\"((?:(?:(?:product_thumb)|(?:imagemagic)|(?:oscthumb))\.php\?(?:img|src)\=)?\/?" . $product_image . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                //die($pattern);
                $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_product", $content);
            }



            /* color swatches */
            if($_csw && OPTIONS_AS_COLOR_SWATCHES_ENABLED && is_array($GLOBALS['products_options_array']) && !empty($GLOBALS['products_options_array'])) {
                $mainImageId = preg_replace('/^.*?<a[^>]*?class=\"' . $GLOBALS["MagicToolboxModuleCurrent"] . '\"[^>]*?id=\"([^\"\>]*)\".*$/is', "$1", $content);
                if($mainImageId == $content) {
                    $mainImageId = preg_replace('/^.*?<a[^>]*?id=\"([^\"\>]*)\"[^>]*?class=\"' . $GLOBALS["MagicToolboxModuleCurrent"] . '\".*$/is', "$1", $content);
                }
                
                if($mainImageId != $content) {
                    $pattern = "<div id='div_colors' name='div_colors'([^>]*?)onMouseOver=change_product_image\((.*?)\) onMouseOut=change_product_image_back\((this)\)><\/div>";
                    $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_colorSwatches", $content);
                    $scripts = "function MagicToolbox_change_product_image_back(obj){}";
                    
                    $scripts .= "function MagicToolbox_change_product_image(obj,img,att_id,id,thumb){";
                        
                    if('magiczoomplus'=='magiczoom2') $scripts .= "MagicZoom_stopZooms();";
		    if('magiczoomplus'=='magiczoom') $scripts .= "MagicZoom.stop($j('{$mainImageId}'));";
                    if('magiczoomplus'=='magicmagnify') $scripts .= "MagicMagnify_stopMagnifiers();";
                    
                    $scripts .= "var path = '" . DIR_WS_IMAGES . "' + ((att_id==0) ? '' : 'options/');
                        window.document.getElementsByName('id[1]')[0].value=id;
                        colors = window.document.getElementsByName('div_colors');
                        for(i=0;i<colors.length;i++){
                            if(colors[i]!=obj){
                                colors[i].style.border='2px solid #BBBBBB';
                            }
                        }
                        window.document.getElementById('{$mainImageId}').href= path+img ;";
                        
                    $scripts .=  "window.document.getElementById('{$mainImageId}').firstChild.src= thumb;
                            obj.style.border='2px solid #000000';";
                        
                    if('magiczoomplus'=='magiczoom2') $scripts .= "MagicZoom_findZooms();";
		    if('magiczoomplus'=='magiczoom') $scripts .= "MagicZoom.start($j('{$mainImageId}'));";
                    if('magiczoomplus'=='magicmagnify') $scripts .= "MagicMagnify_findMagnifiers();";
                    if('magiczoomplus'=='magicthumb') $scripts .= "MagicThumb.refresh();";
                    
                    $scripts .= "}";
                    
                    $content = preg_replace("/(function change_product_image\()/is", $scripts . "$1", $content);
                }
            }
            
            /* support Additional Images Module osCommerce addon (http://addons.oscommerce.com/info/1032) */
            if (tep_db_num_rows(tep_db_query("show tables like 'additional_images'")) >= 1) {
                $products_additional_images_query = tep_db_query("SELECT thumb_images, medium_images FROM " . TABLE_ADDITIONAL_IMAGES . " WHERE products_id='" . intval($product_info['products_id']) . "'");
                if (tep_db_num_rows($products_additional_images_query) >= 1) {
                    while($additional_image = tep_db_fetch_array($products_additional_images_query)) {
                        if(!empty($additional_image['medium_images'])) {
                            $img = $additional_image['medium_images'];
                        } else {
                            $img = $additional_image['thumb_images'];
                        }
                        $GLOBALS["mz_current_ultra_pic"] = preg_replace('/[sml]\.([^\.]+)$/is', '.$1', $img);
                        $img = preg_quote($img, "/");
                        $pattern = "<img[^>]*src=\"(" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $img . ")\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                        $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                        $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);        
                        unset($GLOBALS["mz_current_ultra_pic"]);
                    }
                }
            }
            
            /* extra images */
            if (tep_db_num_rows(tep_db_query("show tables like 'products_extra_images'")) >= 1) {
                $products_extra_images_query = tep_db_query("SELECT products_extra_image FROM " . TABLE_PRODUCTS_EXTRA_IMAGES . " WHERE products_id='" . intval($product_info['products_id']) . "'");
                if (tep_db_num_rows($products_extra_images_query) >= 1) {
                    while($extra_image = tep_db_fetch_array($products_extra_images_query)) {
                        $GLOBALS["mz_current_ultra_pic"] = $extra_image['products_extra_image'];
                        $extra_image = preg_quote($extra_image['products_extra_image'],"/");
                        $pattern = "<img[^>]*src=\"((?:product_thumb\.php\?img\=)?" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $extra_image . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                        $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                        $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);        
                        unset($GLOBALS["mz_current_ultra_pic"]);
                    }
                    $pattern = "<img[^>]*src=\"(" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . preg_quote($product_info['products_image'], '/') . ")\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                    $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                    $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);
                }
            }
			
			//BOF:mod 20120207
            /* product versions */
				if ($product_info['parent_products_id'] != $product_info['products_id']){
					$product_versions_query = tep_db_query("select a.products_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where ((parent_products_id='" . (int)$product_info['parent_products_id'] . "' and a.products_id<>'" . (int)$product_info['products_id'] . "') or (a.products_id='" . (int)$product_info['parent_products_id'] . "')) order by b.products_name");
				} else {
					$product_versions_query = tep_db_query("select a.products_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where parent_products_id='" . (int)$product_info['products_id'] . "'  order by b.products_name");
				}
				if (tep_db_num_rows($product_versions_query)){
					while ($version = tep_db_fetch_array($product_versions_query)){
						$GLOBALS["mz_current_ultra_pic"] = $version['products_image'];
						$version_image = preg_quote($version['products_image'],"/");
						$pattern = "<img[^>]*src=\"((?:product_thumb\.php\?img\=)?" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $version_image . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
						$pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
						$content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);
						unset($GLOBALS["mz_current_ultra_pic"]);
					}
                    /*$pattern = "<img[^>]*src=\"(" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . preg_quote($product_info['products_image'], '/') . ")\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                    $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                    $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);*/
				}
			//EOF:mod 20120207
            
            /* More Pics 6 (extra pics) v 1.3 */
            foreach($product_info as $fieldName => $fieldValue) {
                if(preg_match("/^products_subimage[1-6]$/is", $fieldName)) {
                    $extra_image = preg_quote($fieldValue,"/");
                    $pattern = "<img[^>]*src=\"((?:product_thumb\.php\?img\=)?" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $extra_image . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                    $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                    $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);        
                }
            }
            
            /* ultra pics */
            $ultraPics = Array();
            foreach($product_info as $fieldName => $fieldValue) {
                preg_match("/^products_image_((?:sm)|(?:xl))_([0-9]+)$/is", $fieldName, $matches);
                if(!empty($matches)) {
                    if(!isset($ultraPics[intval($matches[2])])) {
                        $ultraPics[intval($matches[2])] = Array();
                    }
                    $ultraPics[intval($matches[2])][($matches[1]=="sm")?"thumb":"img"] = $fieldValue;
                }
            }            
            foreach($ultraPics as $pic) {
                if(!isset($pic["img"]) || empty($pic["img"])) continue;
                if(!isset($pic["thumb"]) || empty($pic["thumb"])) {
                    $thumbExists = false;
                    $pic["thumb"] = $pic["img"];
                } else $thumbExists = true;

                $img = preg_quote($pic["thumb"],"/");
                $pattern = "<img[^>]*src=\"((?:product_thumb\.php\?img\=)?" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . $img . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                if($thumbExists) $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                $GLOBALS["mz_current_ultra_pic"] = $pic["img"];
                $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);
                unset($GLOBALS["mz_current_ultra_pic"]);
            }


            /* support: Dynamic MoPics (http://www.oscommerce.com/community/contributions,1114) */
            ob_start();
            include(DIR_WS_MODULES . 'dynamic_mopics.php');
            $moPicsContents = ob_get_contents();
            ob_end_clean();
            $moPicsContents = preg_replace('/<noscript>.*?<\/noscript>/is', '', $moPicsContents);
            $pattern = $GLOBALS["magictoolbox_dir_ws_images_quoted"] . '[^\"\>]+?';
            $pattern = '<img[^>]*src=\"(' . $pattern . ')\"[^>]*(?:\/?>)';
            $pattern = '(?:<a[^>]*?href=\"[^\"]+?\\\\\'(.*?)\\\\\'[^\"]+?\"[^>]*>)' . $pattern . '(.*?)(?:<\/a>)';
            preg_match_all('/' . $pattern . '/is', $moPicsContents, $moPicsMatches);
            foreach($moPicsMatches[2] as $key => $thumb) {
                $href = $moPicsMatches[1][$key];
                $pic = preg_replace('/^.*?(?:\?|\&)pic\=(.*?)(?:\&.*|)$/is', '$1', $href);
                $type = preg_replace('/^.*?(?:\?|\&)type\=(.*?)(?:\&.*|)$/is', '$1', $href);
	            $imagebase = mopics_get_imagebase($product_info['products_image'], DIR_WS_IMAGES . DYNAMIC_MOPICS_BIGIMAGES_DIR);
		        $search = array('imagebase', mopics_match_pattern(DYNAMIC_MOPICS_PATTERN));
		        $replace = array($imagebase, $pic);
		        $image = str_replace($search, $replace, DYNAMIC_MOPICS_PATTERN) . '.' . $type;
                $image = str_replace($GLOBALS['magictoolbox_dir_ws_images'], '', $image);
                $GLOBALS["mz_current_ultra_pic"] = $image;
                $pattern = "<img[^>]*src=\"((?:product_thumb\.php\?img\=)?" . preg_quote($thumb, '/') . "(?:\&[^\&\"]+)*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                $pattern = "(?:<a[^>]*>){$pattern}(.*?)(?:<\/a>)";
                $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_extra", $content);  
                unset($GLOBALS["mz_current_ultra_pic"]);
            }


            /* paps images */
            if(isset($GLOBALS["arr_filenames"])) $paps_images = $GLOBALS["arr_filenames"];
            else $paps_images = Array();
            if(count($paps_images) > 0) {
                foreach($paps_images as $paps_image) {
                    $paps_image = preg_quote($paps_image,"/");
                    $pattern = "<img[^>]*src=\"(paps_makethumb.php\?pic\=(" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . "paps\/{$paps_image})[^\"]*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
                    $pattern = "(?:<a[^>]*>\s*){$pattern}(?:<\/a>)";
                    $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_paps", $content);        
                }
            }
            
            /* main paps image */
            $pattern = "<img[^>]*src=\"(paps_makethumb.php\?pic\=" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . "paps\/[^\"]*)\"[^>]*(?:>)(?:[^<]*<\/img>)?";
            $pattern = "(<td[^>]*>\s*){$pattern}(\s*<\/td>)";
            $content = preg_replace_callback("/{$pattern}/is", "callback_MagicToolbox_paps_main", $content);        
            
            /* restore <noscript> tags */
            foreach($GLOBALS["magictoolbox_noscripts_backups"] as $k => $noscript) {
                $content = str_replace("_MAGICTOOLBOX_NOSCRIPT_BACKUP_".($k+1),$noscript,$content);
            }
            unset($GLOBALS["magictoolbox_noscripts_backups"]);

            /* restore left/right columns content */
            if($contentBackup) {
                $content = str_replace('_MAGICTOOLBOX_COLUMNS_BACKUP_', $content, $contentBackup);
            }

        }
        
        if (($categoryPage || $productPage) && !defined( '_MAGICTOOLBOX_MODULE' )) {
            define( '_MAGICTOOLBOX_MODULE', 1 );
            
            /* load JS and CSS */
            if($stsMod == true || $categoryPage == true) $pattern = '/^.*$/is';
            else $pattern = '/<\/head>/is';
            $content = preg_replace_callback($pattern, "callback_MagicToolbox_head", $content);
        }
        

        if($stsMod == true) return $content;
        else echo $content;
    }
    
    function MagicToolbox_getThumb($src, $size = -1) {
        //require_once(DIR_WS_MODULES . "magictoolbox/img2thumb.php");
        if($size < 0) $size = $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-size");

        $webpath = false;
        if(!file_exists(DIR_FS_CATALOG . $src)) {
            $webpath = true;
        }
        $s = @getimagesize( ($webpath ? (HTTP_SERVER . DIR_WS_HTTP_CATALOG) : DIR_FS_CATALOG) . $src);
        if($s === false) return $src;
        
        if($GLOBALS["MagicToolboxModuleClass"]->curClass->params->checkValue("thumb-size-depends-on", "both")) {
            if($s[0] > $s[1]) { //if width > height
                $w = $size;
                $h = round( ($size * $s[1]) / $s[0] );
            } else { //if height > width
                $h = $size;
                $w = round( ($size * $s[0]) / $s[1] );
            }
        } elseif($GLOBALS["MagicToolboxModuleClass"]->curClass->params->checkValue("thumb-size-depends-on", "width")) {
            $w = $size;
            $h = round( ($size * $s[1]) / $s[0] );
        } elseif($GLOBALS["MagicToolboxModuleClass"]->curClass->params->checkValue("thumb-size-depends-on", "height")) {
            $h = $size;
            $w = round( ($size * $s[0]) / $s[1] );
        } 

        $path = pathinfo($src);
        if(intval(phpversion()) < 5 || !isset($path["filename"])) {
            $path['filename'] = basename($path["basename"], ".".$path["extension"]);
        }
        $dir = $path["dirname"];
        if(!@is_dir(DIR_FS_CATALOG . $path["dirname"])) {
            $dir = DIR_WS_IMAGES . "magictoolbox_thumbs_cache";
            if(!@is_dir(DIR_FS_CATALOG . $dir)) @mkdir(DIR_FS_CATALOG . $dir);
            clearstatcache();
            if(!@is_dir(DIR_FS_CATALOG . $dir)) return $src;
        }
        $thumb = "{$dir}/" . $path["filename"] . "_thumb_{$w}x{$h}." . $path["extension"];

        if(file_exists(DIR_FS_CATALOG . $thumb)) {
            $img_full = ($webpath ? (HTTP_SERVER . DIR_WS_HTTP_CATALOG) : DIR_FS_CATALOG) . $src;
            $thumb_full = DIR_FS_CATALOG . $thumb;
            $time_diff = filemtime($img_full) - filemtime($thumb_full);
        }

        //backup - if(!file_exists(DIR_FS_CATALOG . $thumb)) {
        if(!$time_diff || $time_diff != 0) { //create thumb only if it doesn't exists or it is out of date
            require_once(DIR_WS_MODULES . "magictoolbox/magictoolbox.makethumb.class.php");
            new MagicToolboxMakeThumb(($webpath ? (HTTP_SERVER . DIR_WS_HTTP_CATALOG) : DIR_FS_CATALOG) . $src, $w, $h, DIR_FS_CATALOG . $thumb, $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-size-depends-on"), $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("image-magick-path"));
            clearstatcache();
            if(!file_exists(DIR_FS_CATALOG . $thumb)) $thumb = $src;
        }
        return $thumb;
    }
    
    function MagicToolbox_getProductInfo($id, $key = null) {
        $result = array();

        $query = tep_db_query("SELECT products_name, products_description FROM " . TABLE_PRODUCTS_DESCRIPTION . " WHERE products_id='" . intval($id) . "' AND language_id='" . intval($GLOBALS['languages_id']) . "'");
        if (tep_db_num_rows($query) >= 1) {
            while($info = tep_db_fetch_array($query)) {
                $result["title"] = $info['products_name'];
                $result["description"] = $info['products_description'];
                break;
            }
        }

        if(empty($result)) return false;
        
        if($key != null) {
            if(!isset($result[$key])) return false;
            return $result[$key];
        }
        return $result;
    }
    
    function MagicToolbox_callback_noscript($matches) {
        $GLOBALS["magictoolbox_noscripts_backups"][] = $matches[0];
        return "_MAGICTOOLBOX_NOSCRIPT_BACKUP_".count($GLOBALS["magictoolbox_noscripts_backups"]);
    }
    
    function callback_MagicToolbox_head($matches) {
        return $GLOBALS["MagicToolboxModuleClass"]->curClass->headers( ((getenv('HTTPS') == 'on') ? HTTPS_SERVER : HTTP_SERVER) .  DIR_WS_CATALOG.DIR_WS_MODULES.'magictoolbox/core') . $matches[0];
    }

    function callback_MagicToolbox_colorSwatches($matches) {
        $params = explode(',', $matches[2]);
        $img = substr(trim($params[1]), 1, -1);
        $path = (substr(trim($params[2]), 1, -1) == 0) ? DIR_WS_IMAGES : DIR_WS_IMAGES . 'options/';
        $img = $path . $img;
        $thumb = MagicToolbox_getThumb($img);
        return "<div id=\"div_colors\" name=\"div_colors\" " . $matches[1] . " onMouseOver=\"MagicToolbox_change_product_image({$matches[2]},'{$thumb}');\" onMouseOut=\"MagicToolbox_change_product_image_back(" . $matches[3] . ");\"></div>";
    }

    function callback_MagicToolbox_product($matches) {

        if(defined('_MZP_MAIN_IMAGE_PARSED')) {
            return $matches[0];
        } else {
            define('_MZP_MAIN_IMAGE_PARSED', true);
        }

        if($_csw && OPTIONS_AS_COLOR_SWATCHES_ENABLED && is_array($GLOBALS['products_options_array']) && !empty($GLOBALS['products_options_array'])) {
            $tmp = array();
            foreach($GLOBALS['products_options_array'] as $po) {
                if(!empty($po['att_id'])) $tmp[] = $po['att_id'];
            }
            $tmp = '^(options\/)?((' . implode(')|(', $tmp) . '))_';
            $matches[1] = preg_replace("/{$tmp}/is", "", $matches[1]);
        }

        if(function_exists('thumbimage')) {
            // support Automatic Thumbnail oscommerce addon
            $img = $GLOBALS['magictoolbox']['product_image_orig'];
        } else {
            $img = $matches[1];
            $img = preg_replace("/^(?:(?:product_thumb)|(?:imagemagic)|(?:oscthumb))\.php\?(?:img|src)=([^\&]*)\&.*$/is","$1",$img);
            $img = preg_replace('/^\//is', '', $img);
        }
        
        $product_info = $GLOBALS["product_info"];
        if(isset($product_info["products_image_med"]) && isset($product_info["products_image_pop"])) {
            /* support Additional Images Module osCommerce addon (http://addons.oscommerce.com/info/1032) */
            // remove Small/Medium/Large sufix
            $img = preg_replace('/[sml]\.([^\.]+)$/is', '.$1', $img);
        }

        $thumb = MagicToolbox_getThumb($img,$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-size"));
        return callback_MagicToolbox($matches,$img,$thumb,$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-size"), 'productImage');
    }

    function callback_MagicToolbox_extra($matches) {
        if(!isset($GLOBALS["mz_current_ultra_pic"]) || empty($GLOBALS["mz_current_ultra_pic"])) {
            $img = $matches[1];
        } else {
            $img = $GLOBALS["magictoolbox_dir_ws_images"] . $GLOBALS["mz_current_ultra_pic"];
        }
        $img = preg_replace("/^product_thumb\.php\?img=([^\&]*)\&.*$/is","$1",$img);
        $thumb = MagicToolbox_getThumb($img, $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-size"));
        $thumb2 = MagicToolbox_getThumb($img, $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("extra-thumb-size"));
        return callback_MagicToolbox($matches,$img,$thumb,$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("extra-thumb-size"),'productImage',$thumb2);
    }
    
    function callback_MagicToolbox_paps_main($matches) {
        $paps_images = $GLOBALS["arr_filenames"];
        $thumb = $matches[2];
        $thumb = preg_replace("/\&w\=[0-9]+/is","&w=" . $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("paps-image-size"),$thumb);
        $thumb = preg_replace("/pic=" . $GLOBALS["magictoolbox_dir_ws_images_quoted"] . "paps\/\&/is","pic=" . $GLOBALS["magictoolbox_dir_ws_images"]. "paps/" . $paps_images[0] . "&",$thumb);
        $img = $GLOBALS["magictoolbox_dir_ws_images"] . "paps/" . $paps_images[0];
        return callback_MagicToolbox($matches,$img,$thumb,$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("paps-image-size"),'Paps','Paps');
    }
    
    function callback_MagicToolbox_paps($matches) {
        $thumb = $matches[1];
        $thumb2 = preg_replace("/\&w\=[0-9]+/is","&w=" . $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("paps-thumb-size"),$thumb);
        $thumb = preg_replace("/\&w\=[0-9]+/is","&w=" . $GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("paps-image-size"),$thumb);
        $img = $matches[2];
        return callback_MagicToolbox($matches,$img,$thumb,$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("paps-thumb-size"),'Paps',$thumb2);
    }
    
    function callback_MagicToolbox($matches,$img,$thumb,$size,$id = '',$type='',$title='') {
        /*$msg = $GLOBALS["mz_msg"];
        if(empty($msg) && !empty($matches[2]) && $type != "Paps" && $id != "Paps") {
            $msg = $matches[2];
        }*/
        
        preg_match("/alt=\"(.*?)\"/", $matches[0], $alt);
        $alt = $alt[1];
        
        $product_info = $GLOBALS["product_info"];
        if(empty($title)) {
            if(!empty($alt)) $title = $alt;
            if(!empty($product_info['products_name'])) $title = $product_info['products_name'];
        }
        if(!empty($product_info['products_description'])) $description = $product_info['products_description'];
        
        $title = addslashes($title);
        $alt = addslashes($alt);
        $description = addslashes($description);
        
        if(!empty($alt)) $alt = " alt=\"{$alt}\" ";
    
        /*if(empty($title)) {
            preg_match("/alt=\"(.*?)\"/", $matches[0], $alt);
            $alt = $alt[1];
            if(!empty($alt)) $title = $alt;
        }*/
        //if(!empty($title))$title = " title=\"{$title}\"";
        /*if($GLOBALS["mt_conf"]["show_caption"]["value"] == "No") $title = '';*/
        
        $style = 'style="margin: '.$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-margin-top").' '.$GLOBALS["MagicToolboxModuleClass"]->curClass->params->getValue("thumb-margin").' 0px;"';

        $onClick = "";
        /* uncoment 3 folowing lines for enable onClick popup (NOTE: working only with primary image! Only for MagicZoom!)*/
        //$onClick = preg_replace("/^.*href=\"javascript\:(.*?)\".*$/is","$1",$matches[0]);
        //if($onClick == $matches[0]) $onClick = '';
        //else $onClick = "onclick=\"{$onClick}\" ";

        $html = '';
        
        if($type == '' || $type == 'Paps') {
        	$html = $GLOBALS["MagicToolboxModuleClass"]->curClass->template(compact('img', 'thumb', 'id', 'title','description'));
            $html = preg_replace("/^<a /is","<a style=\"margin:0 auto;\" ",$html);
            $html = preg_replace("/^<a /is","<a " . $onClick . " ",$html);   
            $html = preg_replace("/^<img /is","<img " . $alt . " ",$html);   
            /*$html = "<img src=\"{$thumb}\" />";
            $html = "<a {$onClick}id=\"MagicZoomImage{$id}\" class=\"MagicZoom\" href=\"{$img}\" rel=\"{$GLOBALS["mz_rel"]}\"{$title}>{$html}</a>";*/
            $html = "<div class=\"MagicToolboxModule{$type} MagicToolboxContainer\" {$style}>{$html}</div>";    
        } else {
        	$medium = $thumb;
            $thumb = $type;   
        	$html = $GLOBALS["MagicToolboxModuleClass"]->curClass->subTemplate(compact('img', 'medium', 'thumb', 'id', 'title','description'));
            $html = preg_replace("/^<img /is","<img " . $alt . " ",$html);
	    $html = '<div class="MagicToolboxSelector">' . $html . '</div>';
            /*$html = "<img src=\"{$thumb2}\" />";*/
            /*$html = "<a rel=\"MagicZoomImage{$id}\" href=\"{$img}\" rev=\"{$thumb}\"{$title}>{$html}</a>";*/
        }
        return $html;
    }
?>
