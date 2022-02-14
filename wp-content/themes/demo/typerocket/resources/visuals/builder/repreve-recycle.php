<section class="section section-recycle">
    <div class="bg-img">
        <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="" >
    </div>
    <div class="container">
        <div class="block-content">
        <div class="row align-items-center">
            <div class="col-12 col-lg-5">
                <div class="thumbnail-big">
                    <img src="<?php echo get_attachment($data['thumbnail_big'])['src']; ?>" alt="" class="img-cover" >
                </div>
            </div>
            <div class="col-12 col-lg-5 offset-lg-2">
                <div class="content">
                    <div class="title-section">
                        <?php echo $data['title']; ?>
                    </div>
                    <div class="description-section">
                        <?php echo $data['description']; ?>
                    </div>
                    <div class="thumbnail">
                        <img src="<?php echo get_attachment($data['thumbnail_small'])['src']; ?>" alt="" class="img-cover">
                    </div>
                </div>
            </div>
        </div></div>
    </div>
</section> 