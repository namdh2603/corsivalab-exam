<section class="section-banner-title">
    <div class="banner-top">
        <div class="<?php echo $data['fit_content'] ? 'fit-content' : ''; ?>">
            <div class="<?php echo $data['fit_content'] ? 'd-flex align-items-center' : ''; ?>">
                <div class="bg-img mask ">
                    <img src="<?php echo get_attachment($data['background'])['src']; ?>"
                            class=" <?php echo $data['fit_content'] ? 'img-fit' : ''; ?>"
                            alt="img">
                </div>
                <div class="content-block">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <div class="block-content">
                                <div class="title-section text-center text-white"><?php echo $data['title']; ?></div>
                                <div class="block-description stevie">
                                    <?php echo $data['description']; ?>
                                </div>
                            </div>
                            <?php if (!empty($data['button'])) { ?>


                                <div class="btn-group">
                                    <a class="btn-main btn-outline" href="<?php echo $data['link_button']; ?>">
                                        <?php echo $data['button']; ?>
                                    </a>
                                </div>



                            <?php };//if ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  