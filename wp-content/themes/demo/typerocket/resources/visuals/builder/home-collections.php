<?php
$choose_button_layout = $data['choose_button_layout'];
if($choose_button_layout == 'layout-1'){
	$btn_class = 'btn-layout-1';
} elseif($choose_button_layout == 'layout-2'){ 
	$btn_class = 'btn-layout-2';
} else {
	$btn_class = '';
};
if (!empty($data['list'])) {
// 	$background = 'background-image: url('.get_attachment($data['background'])['src'].');background-size: 100% auto; background-position: bottom; background-repeat: no-repeat;';
	if (!empty($data['background'])){
		$bg_img = 'background-image: url('.get_attachment($data['background'])['src'].')';
	}
    ?>
    <section class="section-padding" id="collections" data="home-collections.php" style="<?php echo $bg_img; ?>;background-size: 100% auto; background-position: bottom; background-repeat: no-repeat;background-color: <?php echo $data['bg_color_section']; ?>; <?php echo $padding; ?>>">
        <div class="section section-collections pt-0">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="title-section cherlotte-font text-center" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div> 
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="description-section" <?php echo zoom_in(2); ?>><?php echo $data['description']; ?></div>
                    </div>
                </div>
            </div>
            <div class="w-full1 block-collections container-bigger">
                <div class="row justify-content-between">
                <?php $n = 0; foreach ($data['list'] as $item) { $n++;
                    
$title = $item['title'];
$title = str_replace("///", "<br>", $title);
                    ?>
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="item h-100">
                        <div class="d-flex">
                            <div class="image mask">
                                <img src="<?php echo get_attachment($item['background'])['src']; ?>"
                                     alt="collections"
                                     class="img-cover"
                                    >
                            </div>
                            <div class="block-content ">
                                <div class="d-flex flex-column justify-content-end">
                                    <div class="title text-white" <?php echo fade_up($n); ?>>
                                        <?php echo $title; ?>
                                    </div>
                                    <div class="description-section text-white" <?php echo fade_up($n); ?>>
                                        <?php echo $item['description']; ?>
                                    </div>
                                <div class="btn-group btn-left" <?php echo fade_up($n); ?>>
                                    <a class="btn-main <?php echo $btn_class; ?>" href="<?php echo $item['link_button']; ?>">
                                            <?php echo $item['text_button']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                <?php } ?>

                </div>
            </div>
        </div>
    </section>
    <?php
}