<?php
/*
 * @ Header
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title><?php wp_title('|', true, 'right'); ?></title>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php if (of_get_option('general_fav_icon')) { ?>
            <link rel="shortcut icon" href="<?php echo of_get_option('general_fav_icon'); ?>" />
        <?php } ?>
        <?php
        wp_head();
        ?>
    </head>

    <body <?php body_class(); ?>>

        <?php
//Mobile menu
        get_template_part('/includes/mobile', 'menu');
//Check for overlays
        do_action('mtheme_background_overlays');
//Demo Panel if active
        do_action('mtheme_demo_panel');
//Check for sidebar choice
        do_action('mtheme_get_sidebar_choice');
//Backround display status

        if (!is_page_template('template-fullscreen-home.php')) {
            get_template_part('/includes/background/background', 'display');
        }

//Header Navigation elements
        get_template_part('header', 'navigation');
//Pass if it's not a fullscreen
        if (!mtheme_is_fullscreen_post()) {
            echo '<div class="container-wrapper">';
            echo '<div class="container-boxed">';
        }

        $conuntriesJson = file_get_contents(get_site_url() . '/catalog/get_country.php');
        ?>

        <div class="scala-popup" id="register-form">
            <a href="javascript:void(0)" class="close-popup"></a>
            <div class="header">
                <h2>TRADE REGISTRATION</h2>
                <p>Register your account below.
                    Please note that you will not be able to access until the administrator approves your account.</p>
                <p>If you have any questions, please feel free to call us at 310-929-7211</p>
            </div>
            <div class="content">
                <form action="" method="post" id="register-form-post">
                    <div class="content-left">
                        <h3 class="float-left personal">Your Personal Detals</h3>
                        <p class="float-left">* Required information</p>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="firstname">First Name:</label>
                            <input type="text" name="firstname" id="firstname" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="lastname">Last Name:</label>
                            <input type="text" name="lastname" id="lastname" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="title">Title/Position:</label>
                            <input type="text" name="title" id="title" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="email_address">Email:</label>
                            <input type="text" name="email_address" id="email_address" value=""> <i>*</i>
                            <p>Not accepted: yahoo, aol, msn, hotmail, comcast</p>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="website">Website:</label>
                            <input type="text" name="website" id="website" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <h3>Company Details</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="company">Company Name:</label>
                            <input type="text" name="company" id="company" value=""> <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="customers_group">Business:</label>

                            <span class="label_select">
                                <select id="customers_group " name="customers_group">
                                    <option selected> Select Box </option>
                                    <option>Short Option</option>
                                    <option>This Is A Longer Option</option>
                                </select>
                            </span><i>*</i><div class="clear"></div>

                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="st">Sales Territory:</label>
                            <input type="text" name="st" id="st" value="">
                        </div>
                        <div class="clear"></div>
                        <h3>Your Address</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="country">Country:</label>
                            <span class="label_select">
                                <select id="country" name="country">
                                    <?php $conuntries = json_decode($conuntriesJson) ?>
                                    <?php foreach ($conuntries as $code => $name): ?>
                                        <option value="<?php echo $code ?>"><?php echo $name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </span><i>*</i><div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="street_address">Street:</label>
                            <input type="text" name="street_address" id="street_address" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="postcode">Post Code:</label>
                            <input type="text" name="postcode" id="postcode" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="city">City:</label>
                            <input type="text" name="city" id="city" value=""><i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="state">State:</label>
                            <span class="label_select">
                                <select id="state" name="state">
                                    <option value="us">Alabma</option>
                                </select>
                            </span>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="content-right">
                        <h3>Your Contact Info</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="telephone">Telephone Number:</label>
                            <input type="text" name="telephone" id="telephone" value="">
                            <label for="customers_telephone_ext">Ext.</label>
                            <input type="text" name="customers_telephone_ext" id="customers_telephone_ext" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="fax">Fax Number:</label>
                            <input type="text" name="fax" id="fax" value="">
                        </div>
                        <div class="clear"></div>
                        <h3>Your Password</h3>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="password">Password:</label>
                            <input type="text" name="password" id="password" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="confirmation">Password Confirmation:</label>
                            <input type="text" name="confirmation" id="confirmation" value="">
                            <i>*</i>
                        </div>
                        <div class="clear"></div>
                        <div class="input-box">
                            <label for="other_option">Referral:</label>
                            <span class="label_select">
                                <select id="other_option" name="other_option">
                                    <option value="Advertisement">Advertisement</option>
                                    <option value="Referral">Referral</option>
                                    <option value="Internet Search">Internet Search</option>
                                    <option value="Other">Other</option>
                                </select>
                            </span><i>*</i><div class="clear"></div>

                        </div>
                        <div class="clear"></div>
                    </div>
                    <button name="register-btn" id="register-btn" type="submit">Register</button> 
                </form>
                <div class="clear"></div>
            </div>
        </div>

        <div class="scala-popup" id="register-success-form" >
            <a href="javascript:void(0)" class="close-popup"></a>
            <div class="header">
                <h3 class="thanks">Thank you, and one more thing!</h3>
                <p class="msg">You will not be able to access the catalog until the administrator approves your account. 
                    usually we approve accounts within the hour. </p>
                <p>We just sent you an email with your account details and if you do not seem to receive this email, please check your spam folder and 
                    make sure that info@scalaluxury.com is in your "save sender list"!</p>
                <p>Note: If you have used an email address against our recommendation by AOL, Comcast, Hotmail or MSN you will probably not receive 
                    the approval email, in which case you should email us directly or call us at 310-929-7211
                </p>
            </div>
        </div>