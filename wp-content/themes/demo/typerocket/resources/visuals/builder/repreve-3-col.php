<?php
$choose_button_layout = $data['choose_button_layout'];
if($choose_button_layout == 'layout-1'){
	$btn_class = 'btn-layout-1';
} elseif($choose_button_layout == 'layout-2'){ 
	$btn_class = 'btn-layout-2';
} else {
	$btn_class = '';
};

$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];
if($padding_top != null){
   $padding_top = 'padding-top: '.$padding_top.'px;';
}

if($padding_bottom != null){
   $padding_bottom = 'padding-bottom: '.$padding_bottom.'px;';
}

if($padding_left  != null){
   $padding_left = 'padding-left: '.$padding_left.'px;';
}

if($padding_right  != null){
   $padding_right = 'padding-right: '.$padding_right.'px;';
}
?>
<section class="section section-repreve-3-col section-padding" style="background-image: url(<?php echo get_attachment($data['background'])['src']; ?>);background-repeat: no-repeat;background-position: <?php echo $data['background_position']; ?> ;background-size: 100% auto; <?php echo $padding_top.$padding_bottom.$padding_left.$padding_right; ?>">
    <div class="container">
        <div class="title text-center cherlotte-font" <?php echo zoom_in(1); ?>>
            <?php echo $data['title']; ?>
        </div>
        <div class="block-content">
            <div class="row">
                <?php if (!empty($data['list'])) {
	$n = 1;
                    foreach ($data['list'] as $item) {
											$choose_font = $item['choose_font'];
					if ($choose_font == 'carolissa') {
						$f_class = 'carolissa-font';
					} elseif ($choose_font == 'cherlotte') {
						$f_class = 'cherlotte-font';
					} else {
						$f_class = '';
					}
                ?>
                        <div class="col-12 col-lg-4 mb-4">
                            <div class="item h-100" <?php echo fade_up($n); ?>>
                                <div class="bg-img mask">
                                    <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="" class="img-cover">
                                </div>
                                <div class="content">
                                    <div class="title-section text-white <?php echo $data['title_shadow'] ? 'text-shadow' : ''; ?> <?php echo $f_class; ?>">
                                        <?php echo $item['title']; ?>
                                    </div>
                                    <?php if (!empty($item['link_button'])) { ?>
                                        <div class="btn-group"><a class="btn-main <?php echo $btn_class; ?>" href="<?php echo $item['link_button']; ?>">SHOP NOW</a></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                <?php $n = $n+2; }
                }
                ?>
            </div>
        </div>
    </div>
</section>