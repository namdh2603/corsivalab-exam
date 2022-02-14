<section class="section section-repreve-2-col">
    <div class="container">
        <div class="row list">
            <?php if(!empty($data['list'])) {
                foreach ( $data['list'] as $item) {
            ?>
            <div class="col-12 col-lg-6">
                <div class="item <?php echo $item['text_top'] ? '' : 'reverse'; ?>">
                    <div class="block-content">
                        <div class="title">
                            <?php echo $item['title'] ?>
                        </div>
                        <div class="description">
                            <?php echo $item['description'] ?>
                        </div>
                    </div>
                    <div class="block-thumbnail">
                        <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="thumbnail" class="img-cover">
                    </div>
                </div>
            </div>
            <?php };//foreach
            };//if ?>
        </div>
    </div>
</section>

