<section class="section section-videos section-padding pt-0">
    <div class="container">
        <div class="row flex-column justify-content-center align-items-center">
            <div class="col-12 col-lg-6 title-section text-center" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
            <div class="col-12 col-lg-8 description" <?php echo zoom_in(3); ?>>
                <?php echo $data['description']; ?>
            </div>
            <div class="btn-group col-auto">
                <a class="btn-main" href="<?php echo $data['link_button']; ?>" <?php echo zoom_in(5); ?>>
                    <?php echo $data['text_button']; ?>
                </a>
            </div>
			<?php if($data['image']): ?>
            <div class="col-12 image mask">
                <img src="<?php echo get_attachment($data['image'])['src']; ?>" alt="Image" class="img-cover">
            </div>
			<?php endif; ?>
        </div>
    </div>
</section>