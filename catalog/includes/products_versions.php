<?php
if ($product_info['parent_products_id'] != $product_info['products_id']) {
    $sql = tep_db_query("select a.products_id,a.products_model,a.products_price,a.products_tax_class_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where ((parent_products_id='" . (int) $product_info['parent_products_id'] . "' and a.products_id<>'" . (int) $product_info['products_id'] . "') or (a.products_id='" . (int) $product_info['parent_products_id'] . "')) order by b.products_name");
} else {
    $sql = tep_db_query("select a.products_id,a.products_model,a.products_price,a.products_tax_class_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where parent_products_id='" . (int) $product_info['products_id'] . "'  order by b.products_name");
}
//$sql = tep_db_query("select a.products_id,a.products_model,a.products_price,a.products_tax_class_id, a.products_image, b.products_name from products a inner join products_description b on (a.products_id=b.products_id and b.language_id='1') where (parent_products_id='" . (int) $product_info['products_id'] . "' or a.products_id='" . (int) $product_info['parent_products_id'] . "') AND a.products_id <> '" . (int) $product_info['products_id'] . "' order by b.products_name");
?>
    <style>
        .tooltip {
            display: none;text-align:center;
            background-color: #FFFFFF;
            border: 6px solid #999999;
            border-radius: 6px 6px 6px 6px;
            display: none;
            height: 360px;
            position: absolute;
            right: 0;
            top: -366px;
            width: 525px;
            z-index: 99999;
        }

        #versions{ 
            position:relative; left:0px; top:0px;
            background:url('img/info_pro_bg_version.jpg') no-repeat 0 0 transparent;
            width:309px;height:150px;
            padding-top:6px;
        }
        .wrap_versions{
            position: relative;
            
        }
        .tooltip_version_name{
            text-align: right;
            margin-right: 15px;
            margin-top: 5px;
        }
        .tooltip_version_des{
            text-align: right;
            margin-right: 15px;
            margin-top: 2px;
        }
        .tooltip_version_link{
            text-align: right;
            margin-right: 15px;
        }
        .tooltip_version_link a{color:#575757;}
        .cya-info-pro-p-version{z-index:222;}
        #cya_product_info_version_title{font-size:16px;}
    </style>
    <div class="wrap_versions">
                <div id="versions">
                    <?php $count_ver = 0; while ($version = tep_db_fetch_array($sql)) { 
                         if ($count_ver == 4) break;
                            $count_ver++;?>
                        <div class="cyafll cya-info-pro-p-version">
                            <?php 
                            preg_match('/src="(.+?)"/', tep_image(DIR_WS_IMAGES . $version['products_image'], addslashes($version['products_name']), 300, 200), $match);
                            $small_image = $match[1];
                            $price_group=cya_get_price_group_desc($_SESSION['customer_id']);
                            if ($new_price = tep_get_products_special_price($version['products_id'])) {
                                $products_price = '<s>' . $currencies->cya_display_price($version['products_price'], tep_get_tax_rate($version['products_tax_class_id']), 1, "", $version['products_id']) . '</s> <span class="productSpecialPrice">' . $currencies->cya_display_price($new_price, tep_get_tax_rate($version['products_tax_class_id'])) . '</span>';
                            } else {
                                $products_price = $currencies->cya_display_price($version['products_price'], tep_get_tax_rate($version['products_tax_class_id']), 1, "", $version['products_id']);
                            }
                            ?>                                 
                            <a target="_self" href="<?php echo tep_href_link('product_info.php', 'products_id=' . $version['products_id']); ?>">
                            <?php echo tep_image(DIR_WS_IMAGES . $version['products_image'], $version["products_name"], 150, 64, 'class="thumbnail"') ?>
                            </a>
                            <div class="tooltip">
                                <div class="tooltip_version_name"><b>Version: </b><?php echo $version["products_name"] ?></div>
                                <?php echo tep_image(DIR_WS_IMAGES . $version['products_image'], addslashes($version['products_name']),524,285);?>
                                <div class="tooltip_version_des"><b>Code: </b><?php echo $version['products_model'] ?>
								<?php if ($_SESSION['hide_price'] != 'on'){?>
								&nbsp;&nbsp;<b>Price: </b><?php echo $products_price ?>
								<?php }?>
								</div>
								<?php if ($_SESSION['hide_price'] != 'on'){?>
                                <div class="tooltip_version_des"><?=$price_group['group_description'];?></div>
								<?php }?>
                                <div class="tooltip_version_link"><a target="_self" href="<?php echo tep_href_link('product_info.php', 'products_id=' . $version['products_id']); ?>">MORE DETAILS</a>&nbsp;&nbsp;<span class="cya-narrow-right"></span></div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                        
                        if ($count_ver < 4){
                            for($i = 1;$i <= 4-$count_ver; $i++){
                    ?>
                    <div class="cyafll cya-info-pro-p-version">
                        <div style="text-align:center;height:67px;color:#888;font-size:11px;line-height: 50px;">NO OTHER VERSION</div>
                        <div class="tooltip"><div style="text-align:center;height:360px;line-height:360px;">NO OTHER VERSION</div></div>
                    </div>
                    
                    <?php } }?>
                </div>
    </div>
