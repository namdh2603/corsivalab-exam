<section class="section section-our-partner" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>);">
    <div class="container">
        <div class="content-block">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 mb-4">
                    <div class="title" <?php echo fade_up(1); ?>><?php echo $data['title']; ?></div>
                    <div class="description" <?php echo fade_up(3); ?>>
                        <?php echo $data['description']; ?>
                    </div>
                    <div class="button" <?php echo fade_up(5); ?>>
                        <a href="<?php echo $data['link_button'] ?>">
                            <?php echo $data['text_button']; ?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-7 offset-lg-1">
                    <div class="thumbnail" <?php echo fade_left(1); ?>>
                        <img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="" class="img-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>