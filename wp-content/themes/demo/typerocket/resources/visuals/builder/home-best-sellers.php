    <div class="section section-best-sellers"
		 			         <?php if(!empty($data['main_background'])) { ?>
        style=" background-image: url(<?php echo get_attachment($data['main_background'])['src']; ?>);background-size: 100% auto; background-position: top; background-repeat: no-repeat;"
        <?php } ?>
		 >
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center">
                    <div class="title" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
                </div>
            </div>
            <div class="row block-sellers gap-4">
                <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                <div class="item-big" <?php echo fade_right(1); ?>>
                    <?php                                      
                        $term = get_term_by( 'id', $data['category'] , 'product_cat' );
                        $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                        $image        = wp_get_attachment_url( $thumbnail_id );                        

                    ?>
                    <div class="image mask">
                        <img src="<?php echo  $image; ?>" alt="collections" class="img-cover">
                    </div>
                    <div class="block-content">
                        <div class="container-5/7 d-flex flex-column justify-content-center">
                        <div class="title text-white text-center">
                            <?php echo $term->name; ?>
                        </div>
                        <div class="button">
                            <a href="<?php echo  get_term_link( $term->term_id ,'product_cat'); ?>" >
                                SHOP NOW
                            </a>
                        </div>
                        </div>
                    </div>
                </div>
                </div>
                <div class="col-12 col-lg-6">
                <div class="item-small" <?php echo fade_left(1); ?>>
                    <div class="row h-100 gap-4">
                        <?php 
                            $the_query = get_all_products($data['category'], 4);
                            foreach ( $the_query as $item) { 
                                $_product = wc_get_product($item->ID);
                        ?>
                            <div class="item-block">
                                <div class="image ">
                                    <img src="<?php echo get_the_post_thumbnail_url($item->ID); ?>" alt="collections" class="img-cover">
                                    <div class="mask-pink"></div>
                                </div>
                                <div class="block-content">
                                    <div class="title">
                                        <a href="<?php echo $_product->get_permalink(); ?>">
                                            <?php echo $_product->name; ?>
                                        </a>
                                    </div>
                                    <div class="price">
                                        <?php echo $_product->get_price_html(); ?>
                                    </div>
                                    <div class="button">
                                    <a href='<?php echo $_product->get_permalink(); ?>'>VIEW THIS PRODUCT</a>
                                    </div>
                                </div>
                            </div>
                        <?php }; //foreach ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>