<section class="section section-recycle">
    <div class="bg-img">
        <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="" >
    </div>
    <div class="container">
        <div class="block-content">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5">
                <div class="thumbnail-big" <?php echo fade_right(1); ?>>
                    <img src="<?php echo get_attachment($data['thumbnail_big'])['src']; ?>" alt="" class="img-cover" >
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-2">
                <div class="content">
                    <div class="title-section cherlotte-font" <?php echo fade_left(1); ?>>
                        <?php echo $data['title']; ?>
                    </div>
                    <div class="description-section" <?php echo fade_left(3); ?>>
                        <?php echo $data['description']; ?>
                    </div>
                    <div class="thumbnail" <?php echo fade_left(5); ?>>
                        <img src="<?php echo get_attachment($data['thumbnail_small'])['src']; ?>" alt="" class="img-cover">
                    </div>
                </div>
            </div>
        </div></div>
    </div>
</section> 