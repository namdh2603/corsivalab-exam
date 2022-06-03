<?php $choose_font = $data['choose_font'];
if($choose_font == 'carolissa'){
	$f_class = 'carolissa-font';
} elseif($choose_font == 'cherlotte'){
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
}
$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];
if ($padding_top != null) {
    $padding_top = 'padding-top: ' . $padding_top . 'px;';
}
if ($padding_bottom != null) {
    $padding_bottom = 'padding-bottom: ' . $padding_bottom . 'px;';
}
if ($padding_left  != null) {
    $padding_left = 'padding-left: ' . $padding_left . 'px;';
}
if ($padding_right  != null) {
    $padding_right = 'padding-right: ' . $padding_right . 'px;';
}
?>
<div class="section ambassador-form section-landing-page section-padding" data="ambassador-form.php" style="<?php echo $padding_top . $padding_bottom . $padding_left . $padding_right; ?>">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-12 col-lg-6">
                <div class="block-content px-2 py-1 h-100" style="background-color: <?php echo $data['bg_color']; ?>;">
                    <div style="padding:5%;" class="block-content-inner" <?php echo zoom_in(2); ?>>
                        <div class="title-section <?php echo $f_class; ?>">
                            <?php echo $data['title']; ?>
                        </div>
                        <div class="description-section"><?php echo $data['description']; ?></div>
						
						<?php echo do_shortcode($data['shortcode']); ?>
						
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <img class="w-100 h-100" src="<?php echo get_attachment($data['image'])['src']; ?>" />
            </div>
        </div>
    </div>
</div>