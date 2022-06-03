<section class="section section-ocean-banner-2-cols section-padding1" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>');background-repeat: no-repeat;background-size: 100% 100%;">
<!--     <?php if(!empty($data['background'])) { ?>
    <div class="bg-img">
        <img src="<?php echo get_attachment($data['background'])['src']; ?>" class="img-cover">
    </div>
    <?php };//if ?> -->
	<div class="image-left" style="background-image: url('<?php echo get_attachment($data['thumbnail'])['src']; ?>');    background-position: center left;background-repeat: no-repeat;background-size: 50%;">
		
		
	
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-lg-7">
                <div class="ocean-image">
                <img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="thumbnail" class="d-lg-none img-cover">
                </div>
            </div>
            <div class="block-content col-12 col-lg-5 pt-3 pt-lg-0">
                <div class="title-section" <?php echo fade_left(1); ?>>
                    <?php echo $data['title']; ?>
                </div>
                <div class="description" <?php echo fade_left(3); ?>>
                    <?php echo $data['description']; ?>
                </div>
            </div>
        </div>
    </div></div>
</section>
