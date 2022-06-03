<?php
if (!empty($data['list'])) {
?>
    <div class="section section-best-sellers-2 section-padding" style="background-image: url(<?php echo get_attachment($data['background'])['src']; ?>);background-repeat: no-repeat;background-position: <?php echo $data['background_position']; ?> ;background-size: 100% auto;">
        <div class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="title-section text-center" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
                    </div>
                </div>
            </div>
            <div class="w-full1 block-collections container">
                <div class="row justify-content-between">
                    <?php $n = 0;
                    foreach ($data['list'] as $item) {
                        $n++;
                        $title = $item['title'];
                        $title = str_replace("///", "<br>", $title);
                    ?>
                        <div class="col-12 col-lg-4 mb-3">
                            <div class="item">
                                <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" class="img-cover" />
                                <div class="block-content ">
									<div class="d-flex flex-column justify-content-center h-100">
										<div class="title cherlotte-font text-white text-shadow text-center" <?php echo fade_up($n); ?>>
											<?php echo $title; ?>
										</div>
										<div class="description text-white" <?php echo fade_up($n); ?>>
											<?php echo $item['description']; ?>
										</div>
										<div class="btn-group btn-left d-flex justify-content-center" <?php echo fade_up($n); ?>>
											<a class="btn-main" href="<?php echo $item['link_button']; ?>">SHOP NOW</a>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php
}