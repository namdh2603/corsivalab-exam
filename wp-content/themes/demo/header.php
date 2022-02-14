<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Header -->
    <div class="sidebar-popup-section open-left open-in-mobile menu-mobile-sidebar">
        <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'navbar')); ?>
    </div>
    <div class="header">
        <div name="top" id="top"></div>
        <header>
            <div class="site-header">
                <div class="middle-header">
                    <div class="container">
                        <div class="row row-sm justify-content-center align-items-center">
                            <div class="col-4 col-lg-2 text-left">
                                <?php
                                $custom_logo_id = get_theme_mod('custom_logo');
                                $logo = get_attachment($custom_logo_id);
                                echo '<a href="' . get_home_url() . '"><img class="logo" src="' . $logo['src'] . '" alt="' . $logo['alt'] . '" title="' . $logo['title'] . '" /></a>';
                                ?>
                            </div>
                            <div class="col-12 col-lg-8 position-static d-none d-sm-block">
                                <div class="row align-items-center">
                                    <div class="col-7 position-static">
                                        <?php wp_nav_menu(array('theme_location' => 'main-menu', 'container' => false, 'menu_class' => 'navbar navbar-left', 'walker' => new Default_Walker())); ?>
                                    </div>
                                    <div class="col-5">
                                        <?php echo do_shortcode('[fibosearch]'); ?>
                                    </div>
                                </div>

                            </div>
                            <div class="col-8 col-lg-2">
                                <div class="d-flex justify-content-end">
									<div class="social-icon">
										  <?php  $social_list =  tr_options_field('corsivalab_options.social_list');
										if ($social_list) :
										echo '<ul class="social-list">';
										foreach ($social_list as $value) {
											$img_ID = $value['icon'];
											$img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
											echo '<li><a href="' . $value['link_icon'] . '"><img src="' . wp_get_attachment_image_url($img_ID, 'full') . '" alt="' . $img_alt . '"></a></li>';
										}
										echo '</ul>';
										endif;
										?>
									</div>
                                    <div class="cart-icon header-icon">
                                        <a href="<?php echo wc_get_cart_url(); ?>">
                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/shopping-bag.svg" />
                                        </a>
                                        <div class="cart-count">
                                            <?php global $woocommerce;
                                            echo $woocommerce->cart->get_cart_contents_count();
                                            ?>
                                        </div>
                                    </div>
                                    <div class="cart-total">
                                        <?php echo $woocommerce->cart->get_total(); ?>
                                    </div>
                                    <div class="d-block d-sm-none button-burger ml-5">
                                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/Hamburger.png" alt="Mobile Icon">
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>