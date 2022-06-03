<section class="section section-why-bamboo">
    <?php if(!empty($data['background'])) { ?>
    <div class="bg-img">
        <img src="<?php echo get_attachment($data['background'])['src']; ?>" class="img-cover">
    </div>
    <?php };//if ?>
    <div class="container">
        <div class="row align-items-center">
            <div class="thumbnail col-12 col-lg-8">
                <img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="thumbnail">
            </div>
            <div class="block-content col-12 col-lg-4">
                <div class="title-section cherlotte-font">
                    <?php echo $data['title']; ?>
                </div>
                <div class="description-section">
                    <?php echo $data['description']; ?>
                </div>
            </div>
        </div>
    </div>
</section>
