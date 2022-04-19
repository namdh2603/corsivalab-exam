<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    if (class_exists('woocommerce')) {
        global $woocommerce;
        $cart_count = $woocommerce->cart->get_cart_contents_count();
        $cart_total = $woocommerce->cart->get_total();
        $cart_link = wc_get_cart_url();
        $account_link = get_permalink(get_option('woocommerce_myaccount_page_id'));
    } else {
        $cart_count = $cart_total = $cart_link = $account_link = '';
    }
    $social_list =  tr_options_field('corsivalab_options.social_list');
    $logo = get_attachment(get_theme_mod('custom_logo'));
    $home_link = get_home_url();
    ?>
    <!-- Mobile Menu -->
    <div class="navbar-overlay"></div>
    <div class="navbar-mobile">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'mobile-menu',
            'container' => 'nav',
        ));
        ?>
    </div>
    <!-- Header -->
    <header class="header">
        <div class="site-header">
            <div class="middle-header">
                <div class="container">
                    <div class="row row-sm justify-content-center align-items-center">
                        <div class="col-4 col-lg-2 text-left">
                            <?php
                            echo '<a href="' . $home_link . '"><img class="logo" src="' . $logo['src'] . '" alt="' . $logo['alt'] . '" /></a>';
                            ?>
                        </div>
                        <div class="col-12 col-lg-8 position-static d-none d-sm-block">
                            <div class="row align-items-center">
                                <div class="col-7 position-static">
                                    <?php wp_nav_menu(
                                        array(
                                            'theme_location' => 'main-menu',
                                            'container' => false,
                                            //'container_class' => 'menu',
                                            'menu_class' => 'navbar',
                                            'walker' => new Default_Walker(),
                                        )
                                    );
                                    ?>
                                </div>
                                <div class="col-5">
                                    <?php echo do_shortcode('[fibosearch]'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-8 col-lg-2">
                            <div class="d-flex justify-content-end">
                                <div class="social-icon">
                                    <?php if (!empty($social_list)) :
                                        echo '<ul class="social-list">';
                                        foreach ($social_list as $item) {
                                            $icon_arr = get_attachment($item['icon']);
                                            echo '<li><a href="' . $item['link_icon'] . '"><img src="' . $icon_arr['src'] . '" alt="' . $icon_arr['alt'] . '"></a></li>';
                                        }
                                        echo '</ul>';
                                    endif;
                                    ?>
                                </div>
                                <div class="cart-icon header-icon">
                                    <a href="<?php echo $cart_link; ?>">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/shopping-bag.svg" />
                                    </a>
                                    <div class="cart-count">
                                        <?php echo $cart_count; ?>
                                    </div>
                                </div>
                                <div class="cart-total">
                                    <?php echo $cart_total; ?>
                                </div>
                                <div class="mobile d-block d-lg-none">
                                    <div class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>