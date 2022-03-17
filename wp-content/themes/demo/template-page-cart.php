<?php
/* Template Name: Cart Page */
get_header(); ?>
    <section class="cart-page">
        <div class="container">
            <div class="inner">
                <h2 class="heading-35 mb-6"><?php echo get_the_title(); ?></h2>
                <div class="page-cart-content">
                    <?php while (have_posts()) : the_post();
                        the_content();
                    endwhile; ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer();
