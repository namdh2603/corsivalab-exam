<?php
/* Template Name: Checkout Page */
get_header(); ?>
<?php if (isset($_GET['key'])) { ?>
    <section class="thank-you">
        <div class="container">
            <div class="inner">
                <div class="content-wrapper">
                    <?php while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
    <section class="checkout-page">
        <div class="container">
            <h2 class="heading-35 mb-6"><?php echo get_the_title(); ?></h2>
            <div class="page-woocommerce-content">
                <?php while (have_posts()) : the_post();
                    the_content();
                endwhile; ?>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer();
