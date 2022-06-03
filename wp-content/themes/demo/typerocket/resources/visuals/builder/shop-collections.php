<?php
$style_font = $data['style_font'];
$style_btn = $data['style_btn'];
$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<section class="section section-padding shop-collections" data="shop-collections.php" style="background-image: url(<?php //echo get_attachment($data['background'])['src']; ?>);background-repeat: no-repeat;background-position: <?php //echo $data['background_position']; ?> ;background-size: 100% auto; <?php echo $padding; ?>">
    <div class="container">
        <div class="title-section text-center">
            <?php echo $data['title']; ?>
        </div>
            <div class="row">
                <?php if (!empty($data['list'])) {
                    foreach ($data['list'] as $item) {
                ?>
                        <div class="col-12 col-lg-4 mb-4">
                            <div class="item">
                            <div class="item-image">
								<img src="<?php echo get_attachment($item['img'])['src']; ?>" alt="" class="img-cover">
								</div>
                                <div class="content">
                                    <?php if (!empty($item['link_button'])) { ?>
                                        <div class="title-item text-center title-underline"><a class="<?php echo ($style_btn ? $style_btn : ''); ?>" href="<?php echo $item['link_button']; ?>"><?php echo $item['title']; ?></a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php }
                }
                ?>
        </div>
    </div>
</section>