<?php
/*
  Single Portfolio Page
 */
?>
<?php get_header(); ?>
<?php
/**
 *  Portfolio Loop
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    get_template_part('/includes/share', 'this');
    
    ?>
    <?php
    global $mtheme_portfolio_current_post;
    $mtheme_portfolio_current_post = $post;
    $width = MTHEME_FULLPAGE_WIDTH;
    $portfolio_page_header = "";
    $portfolio_client = "";
    $portfolio_projectlink = "";
    $portfolio_client_link = "";

    $custom = get_post_custom($post->ID);
    $mtheme_pagestyle = "column";
    if (isset($custom[MTHEME . '_pagestyle'][0]))
        $mtheme_pagestyle = $custom[MTHEME . '_pagestyle'][0];
    if (isset($custom[MTHEME . '_portfoliotype'][0]))
        $portfolio_page_header = $custom[MTHEME . '_portfoliotype'][0];
    if (isset($custom[MTHEME . '_video_embed'][0]))
        $portfolio_videoembed = $custom[MTHEME . '_video_embed'][0];
    if (isset($custom[MTHEME . '_customlink'][0]))
        $custom_link = $custom[MTHEME . '_customlink'][0];
    if (isset($custom[MTHEME . '_clientname'][0]))
        $portfolio_client = $custom[MTHEME . '_clientname'][0];
    if (isset($custom[MTHEME . '_clientname_link'][0]))
        $portfolio_client_link = $custom[MTHEME . '_clientname_link'][0];
    if (isset($custom[MTHEME . '_projectlink'][0]))
        $portfolio_projectlink = $custom[MTHEME . '_projectlink'][0];
    if (isset($custom[MTHEME . '_skills_required'][0]))
        $portfolio_skills_required = $custom[MTHEME . '_skills_required'][0];

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

    <?php if (have_posts()) while (have_posts()) : the_post(); ?>
            <?php
            $div_open = false;
            if ($mtheme_pagestyle == "rightsidebar" || $mtheme_pagestyle == "leftsidebar") {
                ?>
                <div class="<?php echo $floatside; ?> <?php
                if ($mtheme_pagestyle != "nosidebar") {
                    echo 'two-column';
                }
                ?>">
                         <?php
                         $div_open = true;
                     }
                     ?>
                <nav>
                    <div class="portfolio-nav-wrap">
                        <div class="portfolio-nav">
                            <span title="<?php _e('Previous', 'mthemelocal'); ?>" class="ntips portfolio-nav-item portfolio-prev">
                                <?php previous_post_link_plus(array('order_by' => 'menu_order', 'format' => '%link', 'tooltip' => '', 'link' => '<i class="icon-chevron-left"></i>')); ?>
                            </span>
                            <span title="<?php _e('Gallery', 'mthemelocal'); ?>" class="ntips portfolio-nav-item portfolio-nav-archive">
                                <a href="<?php echo get_post_type_archive_link('mtheme_portfolio'); ?>"><i class="icon-align-justify"></i></a>
                            </span>
                            <span title="<?php _e('Next', 'mthemelocal'); ?>" class="ntips portfolio-nav-item portfolio-next">
                                <?php next_post_link_plus(array('order_by' => 'menu_order', 'format' => '%link', 'tooltip' => '', 'link' => '<i class="icon-chevron-right"></i>')); ?>
                            </span>
                        </div>
                    </div>
                </nav>
                <div class="clear"></div>
                <?php get_template_part('header', 'title'); ?>
                <div class="clear"></div>
                <div class="entry-content clearfix">
                    <?php
                    if (!post_password_required()) {

                        if ($mtheme_pagestyle == "column") {
                            echo '<div class="column32 column_space">';
                        } else {
                            echo '<div>';
                        }

                        switch ($portfolio_page_header) {

                            case "Slideshow" :
                                $flexi_slideshow = do_shortcode('[flexislideshow slideshowtitle=true lightbox=true lboxtitle=true imagesize="gridblock-full"]');
                                echo $flexi_slideshow;

                                break;
                            case "Vertical" :
                                $mtheme_thepostID = $post->ID;
                                global $mtheme_thepostID;
                                $vertical_images = do_shortcode('[vertical_images imagesize="gridblock-full"]');
                                echo $vertical_images;
                                break;
                            case "Image" :
                                // Show Image			
                                echo mtheme_display_post_image(
                                        $post->ID, $have_image_url = false, $link = false, $type = "fullwidth", $post->post_title, $class = "portfolio-single-image"
                                );

                                break;
                            case "Video" :
                                echo '<div class="fitVids">';
                                echo $portfolio_videoembed;
                                echo '</div>';
                                break;
                        }
                    }
                    ?>
                </div>
                <div class="portfolio-single-wrap clearfix" style="display: none">
                    <?php
                    if (!isSet($mtheme_pagestyle)) {
                        $mtheme_pagestyle = "column";
                    }
                    if ($mtheme_pagestyle == "column") {
                        echo '<div class="column3">';
                    } else {
                        echo '<div class="portfolio-single-fullwidth">';
                    }
                    ?>	
                    <?php
                    if (post_password_required()) {
                        echo '<div id="password-protected">';
                        if (MTHEME_DEMO_STATUS) {
                            echo '<p><h2>DEMO Password is 1234</h2></p>';
                        }
                        echo get_the_password_form();
                        echo '</div>';
                    } else {
                        ?>

                        <div class="item-common item-line">
                            <h3 class="item-title"><?php
                                echo of_get_option('portfolio_singular_refer');
                                echo _e(' details', 'mthemelocal');
                                ?></h3>
                        </div>
                        <?php the_content(); ?>

                        <?php
                        if (isSet($custom[MTHEME . '_projectlink'][0])) {
                            $portfolio_projectlink = $custom[MTHEME . '_projectlink'][0];
                            echo do_shortcode('[button target="_blank" size="small" link="' . $portfolio_projectlink . '" type="gray" button_icon="icon-arrow-right"]' . of_get_option('portfolio_singular_refer') . ' Link[/button]');
                        }
                        ?>

                        <?php
                        if ($portfolio_client) {
                            ?>
                            <div class="project-details project-client-info clearfix">
                                <?php
                                if ($portfolio_client) {
                                    echo '<h4>' . of_get_option('portfolio_client_refer') . '</h4>';
                                }
                                ?>
                                <?php
                                if ($portfolio_client_link != '') {
                                    echo '<a href="' . $portfolio_client_link . '">';
                                }
                                ?>
                                <?php echo $portfolio_client; ?>
                                <?php
                                if ($portfolio_client_link != '') {
                                    echo '</a>';
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>

                        <?php
                        if (isSet($portfolio_skills_required)) {
                            ?>
                            <div class="project-details project-skills clearfix">
                                <h4><?php echo of_get_option('portfolio_skill_refer'); ?></h4>
                                <?php
                                $skills_user = $portfolio_skills_required;
                                $skills = explode(',', $skills_user);

                                $skill_list = '<ul>';
                                foreach ($skills as $skill):
                                    $skill_list .= '<li>';
                                    $skill_list .= $skill;
                                    $skill_list .= '</li>';
                                endforeach;
                                $skill_list .= '</ul>';
                                echo do_shortcode('[checklist]' . $skill_list . '[/checklist]');
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            <?php endwhile; // end of the loop.  ?>
    </div>

    <?php
    if (!post_password_required()) {
        ?>
        <div class="recent-portfolio-single">
            <div class="recent-single-carousel-wrap">
                <h3 class="item-title"><?php _e('OTHER COLLECTIONS', 'mthemelocal'); ?></h3>
                <?php
                echo do_shortcode('[workscarousel worktype_slug="" boxtitle=true columns=4]');
                ?>
            </div>
        </div>
        <?php
    }
    ?>
    <?php
    if (!post_password_required()) {
        if (of_get_option('portfolio_comments')) {
            if (comments_open()) {
                ?>
                <div class="fullpage-contents-wrap">
                    <?php
                    comments_template();
                    ?>
                </div>
                <?php
            }
        }
    }
    ?>
</div>
</div>
<?php
if ($div_open) {
    echo '</div>';
}
?>
<?php
global $mtheme_pagestyle;
if ($mtheme_pagestyle == "rightsidebar" || $mtheme_pagestyle == "leftsidebar") {
    get_sidebar();
}
?>
<?php get_footer(); ?>