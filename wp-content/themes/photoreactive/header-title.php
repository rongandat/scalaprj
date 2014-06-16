<?php
$mtheme_pagestyle = '';
if (isSet($post->ID)) {
    $custom = get_post_custom($post->ID);
}
if (isset($custom[MTHEME . '_pagestyle'][0])) {
    $mtheme_pagestyle = $custom[MTHEME . '_pagestyle'][0];
} else {
    $mtheme_pagestyle = "rightsidebar";
}
if (is_home()) {
    $mtheme_pagestyle = "rightsidebar";
}
if (is_post_type_archive()) {
    $mtheme_pagestyle = "fullwidth";
}
if (is_tax()) {
    $mtheme_pagestyle = "fullwidth";
}
if ($mtheme_pagestyle == "fullwidth") {
    $floatside = "";
}
if ($mtheme_pagestyle == "rightsidebar") {
    $floatside = "float-left";
}
if ($mtheme_pagestyle == "leftsidebar") {
    $floatside = "float-right";
}
?>
<div class="entry-title <?php
     echo $floatside . " ";
     if ($mtheme_pagestyle != "nosidebar" && $mtheme_pagestyle != '' && $mtheme_pagestyle != "fullwidth") {
         echo 'two-column';
     }
     ?>">
    <h1>
        <?php if (is_day()) : ?>
            <?php printf(__('Daily Archives: <span>%s</span>', 'mthemelocal'), get_the_date()); ?>
        <?php elseif (is_month()) : ?>
            <?php printf(__('Monthly Archives: <span>%s</span>', 'mthemelocal'), get_the_date('F Y')); ?>
        <?php elseif (is_year()) : ?>
            <?php printf(__('Yearly Archives: <span>%s</span>', 'mthemelocal'), get_the_date('Y')); ?>
        <?php elseif (is_author()) : ?>
            <?php _e('Author Archives: ', 'mthemelocal'); ?> <?php echo get_query_var('author_name'); ?>
        <?php elseif (is_category()) : ?>
            <?php printf(__('Category : %s', 'mthemelocal'), '<span>' . single_cat_title('', false) . '</span>'); ?>
        <?php elseif (is_tag()) : ?>
            <?php printf(__('Tag : %s', 'mthemelocal'), '<span>' . single_cat_title('', false) . '</span>'); ?>
        <?php elseif (is_search()) : ?>
            <?php printf(__('Search Results for: %s', 'mthemelocal'), '<span>' . get_search_query() . '</span>'); ?>
        <?php elseif (is_404()) : ?>
            <?php _e('404 Page not Found!', 'mthemelocal'); ?>		
        <?php elseif (is_home()) : ?>
            <?php bloginfo('name'); ?>
        <?php elseif (is_front_page()) : ?>
            <?php the_title(''); ?>
        <?php elseif (is_post_type_archive('mtheme_portfolio')) : ?>
            <?php echo of_get_option('portfolio_singular_refer'); ?>
        <?php elseif (is_post_type_archive('product')) : ?>
            <?php echo of_get_option('mtheme_woocommerce_shoptitle'); ?>
        <?php elseif (is_tax()) : ?>
            <?php
            $term = get_queried_object();
            if (!isSet($term->name)) {
                $worktype = of_get_option('portfolio_singular_refer');
            } else {
                $worktype = $term->name;
            }
            echo $worktype;
            ?>
        <?php else : ?>
            <?php the_title(''); ?>
        <?php endif; ?>
        <span></span>
    </h1>
</div>