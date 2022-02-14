<section class="section section-find-out">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 d-flex flex-column justify-content-center">
                <div class="title" <?php echo zoom_in(1); ?>>
                    <?php echo $data['title']; ?>
                </div>
                <div class="block-content">
                    <div class="row">
                        <?php if(!empty($data['list'])) {
	$n = 0;
                            foreach( $data['list'] as $item ) {    
								$n++;
                        ?>
                            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                            <div class="item" <?php echo fade_up($n); ?>>
                                <div class="thumbnail">
                                    <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="Thumbnail" class="img-cover">
                                </div>
                                <div class="title">
                                    <?php echo $item['title']; ?>
                                </div>
                                <div class="description">
                                    <?php echo $item['description']; ?>
                                </div>
                                <div class="btn-group btn-left">
                                    <a class="btn-main" href="<?php echo $item['link_button']; ?>" >
                                        <?php echo $item['text_button']; ?>
                                    </a>
                                </div>
                            </div>
                            </div>
                        <?php 
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>