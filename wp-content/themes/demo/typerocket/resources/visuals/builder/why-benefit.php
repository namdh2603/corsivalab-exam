<section class="section section-benefit">
    <div class="container">
        <div class="title-section text-center">
            <?php echo $data['title']; ?>
        </div>
    </div>
    <div class="container">
        <div class="container-fluid1">
            <div class="row">
                <?php if (!empty($data['list'])) {
                    foreach ($data['list'] as $item) { ?>
                        <div class="col-6 col-lg-4">
                            <div class="item mb-4">
                                <div class="block-content">
                                    <div class="title">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <div class="description">
                                        <?php echo $item['description']; ?>
                                    </div>
                                </div>
                                <div class="bg-img">
                                    <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="background"
                                         class="img-cover">
                                </div>
                            </div>
                        </div>
                    <?php } } ?>
            </div>
        </div>
    </div>
</section>