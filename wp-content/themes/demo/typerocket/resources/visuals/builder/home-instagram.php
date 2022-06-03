<?php
$title = $data['title'];
$style_font = $data['style_font'];
$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<div class="section section-instagram section-padding" style="background-color: <?php echo $data['bg_color_section']; ?>; <?php echo $padding; ?>>">
    <div class="title-section text-center <?php echo ($style_font ? $style_font : ''); ?>" <?php echo zoom_in(1); ?>><?php echo $title; ?></div>
    <div class="instagram-inner">
        <?php echo do_shortcode($data['instagram_shortcode']); ?>
    </div>
</div>