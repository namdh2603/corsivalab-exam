<?php $choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
    $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
    $f_class = 'cherlotte-font';
} else {
    $f_class = '';
}
if (!empty($data['list'])) :
?>
    <div class="section section-features monogram" <?php if (!empty($data['background'])) { ?> style="background: url( <?php echo get_attachment($data['background'])['src']; ?> ); background-size: cover; " <?php } ?>>
        <div class="container">
            <?php if (!empty($data['title'])) { ?>
                <div class="title-section text-center <?php echo $f_class; ?>"> <?php echo $data['title']; ?></div>
            <?php } ?>
            <div class="row">
                <?php $n = 0;
                foreach ($data['list'] as $item) {
                    $icon = $item['icon'];
                    $count = count($icon);
                    $n++; ?>
                    <div class="col-6 col-lg-3">
                        <div class="item" <?php echo zoom_in($n); ?>>
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
        <script>
            jQuery(document).ready(function($) {
                var monogram_swiper = new Swiper(".monogram-carousel-container", {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: true,
                    arrow: false,
                    autoplay: {
                        delay: 3000,
                        disableOnInteraction: false,
                    },
                });
            });
        </script>
    </div>
<?php
endif;
?>