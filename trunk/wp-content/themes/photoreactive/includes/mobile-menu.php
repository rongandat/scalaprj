
<div id="menu-show-btn" class="icon-align-justify"></div>
<div class="responsive-menu-wrap">
    <div class="logo" id="responsive-menu-logo">
        <?php
        $main_logo = of_get_option('main_logo');
        $responsive_logo = of_get_option('responsive_logo');
        if ($main_logo <> "") {
            if ($responsive_logo <> "") {
                echo '<img class="logoimage" src="' . $responsive_logo . '" alt="logo" />';
            } else {
                echo '<img class="logoimage" src="' . $main_logo . '" alt="logo" />';
            }
        } else {
            echo '<img class="logo-light" src="' . MTHEME_PATH . '/images/logo.png" alt="logo" />';
        }
        ?>
    </div>
    <div class="responsive-mobile-menu">
        <?php
        get_search_form();
        ?>
        <div class="clear"></div>
        <?php
        // Responsive menu conversion to drop down list
        if (function_exists('wp_nav_menu')) {
            wp_nav_menu(array(
                'container' => false,
                'theme_location' => 'top_menu',
                'menu_class' => 'mobile-menu',
                'echo' => true,
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'depth' => 0,
                'fallback_cb' => 'mtheme_nav_fallback'
                    )
            );
        }
        ?>


    </div>
    <div class="copyright">
        <span>Copyright @ 2014 Scala Luxury</span>
        <div class="copyright-img"></div>
    </div>
    <?php
    $wpml_lang_selector_disable = of_get_option('wpml_lang_selector_disable');
    if (!$wpml_lang_selector_disable) {
        ?>
        <div class="mobile-wpml-lang-selector-wrap">
            <?php do_action('icl_language_selector'); ?>
        </div>
        <?php
    }
    ?>
</div>

<div class="login-popup">
    <a href="javascript:void(0)" class="login-btn">Login</a>
    <div class="clear"></div>
    <div class="login-scroll hidden">
        <form action="" method="post">
            <h2>Account Log In</h2>
            <div class="login-input">
                <span>Email: </span>
                <input type="text" name="email" value="">
            </div>
            <div class="clear"></div>
            <div class="login-input">
                <span>Password: </span>
                <input type="password" name="password" value="">
            </div>
            <div class="clear"></div>
            <div class="login-input remember">
                <span>&nbsp;</span>
                <input type="checkbox" name="remember" id="remember" value="1">
                <label for="remember">Remember me</label>
            </div>
            <div class="clear"></div>
            <button type="submit" name="signin">Sign in</button>
            <div class="clear"></div>
        </form>
        <a class="register-suggest" href="javascript:void(0)">If you don’t have an account, please register here</a>
    </div>
</div>