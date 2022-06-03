<?php
$choose_product_list = $data['choose_product_list'];
?>
<section class="section-products-carousel section-padding" data="home-product-carousel.php" style="background-color: <?php echo $data['bg_color_section']; ?>; <?php echo $padding; ?>>">
    <div class="container">
        <div class="title-section text-center" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
        <div class="layout-2" <?php echo fade_up(2); ?>>
            <div class="products">
                <?php
                $args_query = array(
                    'post_type' => 'product',
                    'post_status' => 'publish',
                    //'posts_per_page' => -1,
                    'post__in' => $choose_product_list,
                );
                $product_query = new WP_Query($args_query);
                if ($product_query->have_posts()) {
                    echo '<div class="swiper-container product-carousel-container"><div class="swiper-wrapper">';
                    while ($product_query->have_posts()) {
                        $product_query->the_post();
                        global $product;
                        echo '<div class="swiper-slide">';
                        wc_get_template_part('content-product-carousel');
                        echo '</div>';
                    }
                    wp_reset_postdata();
                    echo '</div><div class="swiper-button-next"><img src="https://wearesandbar.com/wp-content/uploads/2022/03/right-arrow.png" /></div><div class="swiper-button-prev"><img src="https://wearesandbar.com/wp-content/uploads/2022/03/left-arrow.png" /></div></div>';
                }
                ?>
            </div>
        </div>
        <script>
            jQuery(document).ready(function($) {
                var product_swiper = new Swiper(".product-carousel-container", {
                    slidesPerView: 2,
                    spaceBetween: 12,
					loop: true,
					        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
                    autoplay: {
                        delay: 6000,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        768: {
                            slidesPerView: 3,
                        },
                        1024: {
                            slidesPerView: 4,
                        },
                    },

                });
            });
        </script>
    </div>
</section>