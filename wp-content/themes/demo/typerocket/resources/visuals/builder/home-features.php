<?php
if (!empty($data['list'])):
?>
    <div class="section section-features" <?php if (!empty($data['background'])) { ?> style="background: url( <?php echo get_attachment($data['background'])['src']; ?> ); background-size: cover; " <?php } ?>>
        <div class="container">
            <div class="row">
                <?php $n = 0;
                foreach ($data['list'] as $item) {
                    $n++; ?>
                    <div class="col-6 col-xl-3">
                        <div class="item" <?php echo fade_up($n); ?>>
                            <div class="text-center mx-auto">
                                <img src="<?php echo get_attachment($item['icon'])['src']; ?>" alt="" class="icon">
                                <div class="title">
                                    <?php echo $item['title']; ?>
                                </div>
                                <div class="description stevie">
                                    <?php echo $item['description']; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
endif;
?>