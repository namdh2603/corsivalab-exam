<?php $choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
    $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
    $f_class = 'cherlotte-font';
} else {
    $f_class = '';
}

$padding = padding_tr($data['padding_top'], $data['padding_right'],  $data['padding_bottom'],  $data['padding_left']);
		   

if (!empty($data['list'])) :
?>
    <div class="section section-features how-it-work" style="<?php echo (!empty($data['bg_color']) ? 'background-color: '.$data['bg_color'].';' : ''); echo $padding; ?>">
        <div class="container">
            <?php if (!empty($data['title'])) { ?>
                <div class="title-section text-center <?php echo $f_class; ?> <?php echo $data['title_color'] ? 'text-white' : '' ?>"> <?php echo $data['title']; ?></div>
            <?php } ?>
            <div class="row">
                <?php $n = 0;
                foreach ($data['list'] as $item) {
                    $icon = $item['icon'];
                    $count = count($icon);
                    $n++; ?>
                    <div class="col-6 col-lg-<?php echo ($n == 2) ? '6' : '3' ; ?>">
                        <div class="item" <?php echo fade_up($n); ?>>
                            <div class="text-center mx-auto w-100">
                                <?php if (count($icon) == 1) { ?>
                                    <img src="<?php echo get_attachment($item['icon'][0])['src']; ?>" <?php echo (($data['full_width_icon']) ? 'style="aspect-ratio: 1/1" class="w-100"' : 'class="icon"'); ?> />
                                    <?php } else {
                                    echo '<div class="swiper-container monogram-carousel-container"><div class="swiper-wrapper">';
                                    foreach ($item['icon'] as $icon) { ?>
                                        <div class="swiper-slide">
                                            <img src="<?php echo get_attachment($icon)['src']; ?>" <?php echo (($data['full_width_icon']) ? 'style="aspect-ratio: 1/1" class="w-100"' : 'class="icon"'); ?> />
                                        </div>
                                <?php       }
                                    echo '</div></div>';
                                } ?>
                                <div class="title">
                                    <?php echo $item['title']; ?>
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