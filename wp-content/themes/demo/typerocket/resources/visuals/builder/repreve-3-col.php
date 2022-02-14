<section class="section section-repreve-3-col section-padding" style="background-image: url(<?php echo get_attachment($data['background'])['src']; ?>);background-repeat: no-repeat;background-position: bottom;background-size: 100% auto;">
    <div class="container">
        <div class="title text-center">
            <?php echo $data['title']; ?>
        </div>
        <div class="block-content">
            <div class="row">
                <?php if (!empty($data['list'])) {
                    foreach ($data['list'] as $item) {
                ?>
                        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
                            <div class="item h-100">
                                <div class="bg-img mask">
                                    <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="" class="img-cover">
                                </div>
                                <div class="content">
                                    <div class="title">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <?php if (!empty($item['text_button'])) { ?>
                                        <div class="btn-group">
                                            <a class="btn-main" href="<?php echo $item['link_button']; ?>">
                                                <?php echo $item['text_button']; ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</section>