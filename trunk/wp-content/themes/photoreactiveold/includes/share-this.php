<?php
$media = mtheme_featured_image_link( get_the_id() );
$socialshare = array (
		'facebook' => array (
			'icon-facebook' => 'http://www.facebook.com/sharer.php?u='.get_permalink().'&t='.get_the_title()
			),
		'twitter' => array (
			'icon-twitter' => 'http://twitter.com/home?status='.get_the_title().'+'.get_permalink()
			),
		'googleplus' => array (
			'icon-google-plus' => 'https://plus.google.com/share?url='.get_permalink()
			),
		'pinterest' => array (
			'icon-pinterest' => 'http://pinterest.com/pin/create/bookmarklet/?media='.$media.'&url='.get_permalink().'&is_video=false&description='.get_the_title()
			),
		'link' => array (
			'icon-link' => get_permalink()
			),
		'email' => array (
			'icon-envelope-alt' => 'mailto:email@address.com?subject=Interesting Link&body=' . get_the_title() . " " . get_permalink()
			)
		);
?>
<ul class="portfolio-share">
<li class="sharethis"><?php _e('Share','mthemelocal'); ?></li>
<?php
foreach($socialshare as $key => $share){
  foreach( $share as $icon => $url){
    echo '<li><a target="_blank" href="'.$url.'"><i class="'.$icon.'"></i></a></li>';
  }
}
?>
</ul>