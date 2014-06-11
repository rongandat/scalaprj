<?php

// 
  function links_color_pro_fav() {
     global $cart_fv;
     $html_output = '<a href="javascript:popupWindow1(\'finishes.php\',640,530);" class="cya-button color_btn">COLORS</a>';
     
     $html_output .= '<a href="' . tep_href_link('shopping_cart_pr.php','project_id=0') . '" class="cya-button projects_btn">PROJECTS</a>';
     if($cart_fv->get_products()) $num_fv=count($cart_fv->get_products());
     else $num_fv=0;
     $html_output .= '<a href="' .tep_href_link('shopping_cart_fv.php') . '" class="cya-button top-favourite">FAVORITES<span id="top_cart_fv_count">' . $num_fv .'</span></a>';
  
     return $html_output;
  }
  // breakcum
  function cya_get_breakcum() {
     global $languages_id;
     $categories_query_catmenu = tep_db_query("select c.categories_id, cd.categories_name, c.parent_id from " . TABLE_CATEGORIES . " c, " . TABLE_CATEGORIES_DESCRIPTION . " cd where c.categories_id = cd.categories_id and cd.language_id='" . $languages_id ."' and c.categories_id!=21 and c.categories_id!=23 order by sort_order, cd.categories_name");
     while ($categories = tep_db_fetch_array($categories_query_catmenu))  {
        $arrayCats[] = $categories;
     }
     
     if ($_REQUEST['products_id']){
         $dbres=tep_db_query("select * from products_to_categories where products_id='".$_GET['products_id']."'");
         while($row1=tep_db_fetch_array($dbres)){
             foreach ($arrayCats as $cat_from_list){ 
                if ($cat_from_list['categories_id']==$row1['categories_id'] && $cat_from_list['parent_id'] != 0){
                    $row = $row1;break;
                }
             }
         }
         
         $list_cat = cya_get_breakcum_get_cat($arrayCats, $row['categories_id']);
         $list_cat = explode('_', $list_cat);
         $list_cat = array_reverse($list_cat);
         
         foreach ($list_cat as $one_cat) {
             if ((int)$one_cat){
                foreach ($arrayCats as $cat_from_list){
                    if ($one_cat == $cat_from_list['categories_id'])
                    $html_output .= '<a href="' . HTTP_SERVER . DIR_WS_CATALOG . 'index.php?cPath=' . $one_cat . '">' . $cat_from_list['categories_name'] .  '</a> <span class="breakcum-sub-icon">></span> ';
                }
             }
         }
     }
     
     return $html_output;
  }
  function cya_get_breakcum_get_cat($arrayCats, $catId) {
      
      foreach($arrayCats as $oneCat){
          if ((int)$oneCat['categories_id'] == $catId){
              
              $list_cat .= $catId . '_';
              if ((int)$oneCat['parent_id']){
                      $list_cat .= cya_get_breakcum_get_cat($arrayCats,$oneCat['parent_id']);
              }
          }
      }
      return $list_cat;
  }
  function cya_is_checked_qtpro() {
    global $customer_id;
    $check_customer_query_qtpro = tep_db_query("select customers_id, qtpro  from " . TABLE_CUSTOMERS . " where customers_id = '" . $customer_id . "'");
    if (!tep_db_num_rows($check_customer_query_qtpro)) {
      return false;
    } else {
      $check_customer_qtpro = tep_db_fetch_array($check_customer_query_qtpro);
      if ((int)$check_customer_qtpro['qtpro']){
          return true;
      }
      return false;
    }
  }
function cya_get_price_group_desc($customer_id)
{
if (is_numeric($customer_id))
{
    $query="select customers_group from customers where customers_id='$customer_id'";
    $res=tep_db_query($query);
    $row=tep_db_fetch_array($res);

    $gid=$row['customers_group'];
    $res=tep_db_query("select group_description,group_name from customers_groups where group_id='$gid'");
    $row=tep_db_fetch_array($res);

//    $desc=$row['group_description'];
}
return $row;
}
?>