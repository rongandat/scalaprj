<!-- banners //-->
          <tr>
            <td><span id="banners_box">
<?php

if (!isset($_SESSION['seen_banners'])) $_SESSION['seen_banners']=array();
if (is_numeric($_GET['products_id']))
{
$bannercontent="";
$firstmatch="";
$banners_query=tep_db_query("select * from banners_keyword");
while($row=tep_db_fetch_array($banners_query))
{
 $banners[$row['keyword']][]=$row['banner'];
}
  $rp_query = tep_db_query("select pd.products_name, pd.products_description from " . TABLE_PRODUCTS . " p left join " . TABLE_PRODUCTS_DESCRIPTION . " pd on p.products_id = pd.products_id where p.products_id='".$_GET['products_id']."' ");
  $pd=tep_db_fetch_array($rp_query);
  $i=0;  
  foreach($banners as $keyword=>$banner_array)
  {
   foreach ($banner_array as $banner)
   {
    if (stristr($pd['products_name'], $keyword)) //|| stristr($pd['products_description'], $keyword
    {
     if (!in_array($banner, $_SESSION['seen_banners'][$keyword]))
     {
      $bannercontent=tep_image(DIR_WS_IMAGES . "keyword_banners/$banner", $pd['products_name'], '200');
      $_SESSION['seen_banners'][$keyword][]=$banner;
      break;
     }
     else {
      if ($i==0) {$firstmatch=$banner; $thekeyword=$keyword;}
     }
     $i++;
    }
   }
  }

if ($bannercontent=="" && $firstmatch!="")
{
      $bannercontent=tep_image(DIR_WS_IMAGES . "keyword_banners/$firstmatch", $pd['products_name'], '200');
      $_SESSION['seen_banners'][$thekeyword]=array($firstmatch);
}

if ($bannercontent!="")
 {
?>
            <?php


    $info_box_contents = array();
    $info_box_contents[] = array('text' => "");
    new infoBoxHeading($info_box_contents);

    $info_box_contents = array();
    $info_box_contents[] = array('align' => 'center',
                                 'text' => $bannercontent);

    new infoBox($info_box_contents);
?>
<?php
 }
}
?>
            </span></td>
          </tr>
<!-- banners_eof //-->
