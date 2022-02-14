<section class="section section-collection-small">
    <?php if(!empty($data['background'])) {?>
        <div class="background">
            <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="" class="img-cover">            
        </div>
    <?php }; //if ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 align-self-center">
            <div class="title-section text-center" <?php echo zoom_in(1); ?>><?php echo $data['title'];?></div>
			</div>
            <div class="col-12 align-self-center">
            <div class="description" <?php echo zoom_in(2); ?>><?php echo $data['description']; ?></div>
			</div>
			<div class="col-12">
            <div class="block-content">
                <div class="row">
                    <?php if(!empty($data['list'])) {
	$n = 0;
                        foreach($data['list'] as $item ) {   
							$n++;
                            $term = get_term_by( 'id', $item['category'] , 'product_cat' );
                            $thumbnail_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
                            $image        = wp_get_attachment_url( $thumbnail_id );                            
                    ?>
                        <div class="col-12 col-lg-4">
							
                            <div class="item d-flex <?php echo $item['text_top'] ? 'flex-column-reverse' :''; ?>"  <?php echo fade_up($n); ?>>
                            <div class="image">
                                <img src="<?php echo  $image; ?>" alt="collections">
                            </div>
                            <div class="content">
                                <div class="title">
                                    <?php echo $term->name; ?>
                                </div>
                                <div class="description">
                                    <?php echo $item['short_description']; ?>
                                </div>
                                <div class="button">
                                    <a href="<?php echo  get_term_link( $term->term_id ,'product_cat'); ?>" >
                                        SHOP NOW
                                    </a>
                                </div>
                            </div>
                        </div>    
                        </div>   
                    <?php 
                        };//foreach
                    };//if ?>
                </div>
            </div>
			</div>
        </div>
    </div>
</section>