<?php
/* Template Name: Woocommerce Page */
get_header(); ?>
<div id="main-wrap">
    <?php if (!isset($_GET['key'])) { ?>
        <div class="default-section title-page-woocommerce pb-2">
            <div class="container">
                <div class="title-section">
                    <h2><?php the_title(); ?></h2>
                    <?php if (is_cart()) :
                        $shop_page_url = get_permalink(wc_get_page_id('shop'));
                    ?>
                        <a class="woocommerce-backtoshop" href="<?php echo $shop_page_url; ?>">BACK TO SHOP</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } else {
        $thank_you_banner =  tr_options_field('corsivalab_options.thank_you_banner');
        $thank_you_title =  tr_options_field('corsivalab_options.thank_you_title');
        $thank_you_banner_data = get_attachment($thank_you_banner);
    ?>
        <div class="default-section home-cta-section pt-0">
            <div class="slide-inner">
                <div class="container mt-5">
                    <div class="row align-items-center w-100">
                        <div class="col-9 col-lg-7">
                            <div class="content1">
                                <div class="title-thankyou-section">
                                    <h2><?php echo $thank_you_title; ?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="page-woocommerce-content">
        <?php while (have_posts()) : the_post();
            the_content();
        endwhile; ?>
    </div>
</div>
<?php echo do_shortcode('[feature-list]'); ?>
<?php get_footer();
