<section class="section section-our-partner" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>);">
    <div class="container">
        <div class="content-block">
            <div class="row align-items-center">
                <div class="col-12 col-lg-4 mb-4">
                    <div class="title"><?php echo $data['title']; ?></div>
                    <div class="description">
                        <?php echo $data['description']; ?>
                    </div>
                    <div class="button">
                        <a href="<?php echo $data['link_button'] ?>">
                            <?php echo $data['text_button']; ?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-7 offset-lg-1">
                    <div class="thumbnail">
                        <img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="" class="img-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>