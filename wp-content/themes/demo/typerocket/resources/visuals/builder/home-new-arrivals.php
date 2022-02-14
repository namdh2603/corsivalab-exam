<section id="new-arrivals">
    <div class="section section-new-arrivals">
        <div class="container">
            <div class="row flex-column align-items-center">
				
                <div class="col-12">
                <div class="title" <?php echo zoom_in(1); ?>>
                    <?php echo $data['title']; ?>
                </div>
				</div>
                <div class="col-12 col-lg-8">
                    <div class="description" <?php echo zoom_in(2); ?>>
                        <?php echo $data['description']; ?>
                    </div>
                </div>
            </div>

            <div class="block-inner">
                <div class="row">
                    <?php foreach( $data['list'] as $item) {
                        $_product = wc_get_product($item['product_name']);
                        $terms = get_the_terms ( $_product->id, 'product_cat' );
                        $attachment_ids = $_product->get_gallery_image_ids();

                     
                    ?>
                        <div class="block-left col-12 col-lg-5 offset-lg-1">
                            <div class="image">
                                <img src="<?php echo get_attachment(tr_posts_field('materials_thumbnail', $_product->id))['src']; ?>" alt="material" class="img-cover">
                            </div>
                            <div class="title">
                                <?php   echo tr_posts_field('material_title',$_product->id); ?>
                            </div>
                        </div>
                        <div class="block-center image d-flex justify-content-center col-12 col-lg-4">  
<!--                             <div class="swiper new-arrivals-slide"> -->
								
								
        <div class="swiper-container  new-arrivals-slide">
			
                                <div class="swiper-wrapper mb-5" >
                                    <div class="swiper-slide active">
                                        <img src="<?php echo get_the_post_thumbnail_url($_product->id); ?>" alt="product" class="img-cover">
                                    </div>
                                <?php
                                    $attachment_ids = $_product->get_gallery_image_ids();

                                    foreach( $attachment_ids as $attachment_id ) 
                                        { ?>
                                          <div class="swiper-slide">
                                        <img src="<?php echo $Original_image_url = wp_get_attachment_url( $attachment_id ); ?>" alt="product" class="img-cover">
                                    </div>
                                    <?php } ?>                                   
                                </div>  
                                <div class="swiper-button-next d-none d-lg-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shop-details/arrow.png">
                                </div>
                                <div class="swiper-button-prev d-none d-lg-flex">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Shop-details/arrow.png" >
                                </div>
                                <div class="swiper-pagination d-lg-none"></div>
                            </div>
                            <!-- <img src="<?php echo get_the_post_thumbnail_url($_product->id); ?>" alt="product" > -->
                            
                            <?php 
                                    foreach( $attachment_ids as $attachment_id ) {
                                    // echo $image_link = wp_get_attachment_url( $attachment_id );
                                }
                            ?>
                                                                     
                        </div>
                        <div class="block-right col-12 col-lg-4 offset-lg-8">
                                <div class="block-content">
									
                                    <div class="title-1" <?php echo fade_up(1); ?>>
                                        <a href="<?php echo $_product->get_permalink(); ?>">
                                            <?php echo $_product->name; ?>
                                        </a>
                                    </div>
                                    <div class="short" <?php echo fade_up(2); ?>>
                                    <?php echo $_product->get_short_description(); ?>
                                    </div>
                                    <div class="price" <?php echo fade_up(3); ?>>
                                        <?php echo $_product->get_price_html(); ?>
                                    </div>
                                    <div class="btn-group btn-left" <?php echo fade_up(4); ?>>
                                        <a class="btn-main" href='<?php echo $_product->add_to_cart_url(); ?>'>ADD TO CART</a>
                                    </div>
                                </div>
                        </div>
                    <?php
                    };?>
                </div>
            </div>
        </div>
    </div> 
</section>

