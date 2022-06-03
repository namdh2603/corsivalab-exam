<?php $choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
    $f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
    $f_class = 'cherlotte-font';
} else {
    $f_class = '';
}
if (empty($data['padding_top'])) $data['padding_top'] = '';
if (empty($data['padding_right'])) $data['padding_right'] = '';
if (empty($data['padding_bottom'])) $data['padding_bottom'] = '';
if (empty($data['padding_left'])) $data['padding_left'] = '';
$padding = padding_tr($data['padding_top'], $data['padding_right'],  $data['padding_bottom'],  $data['padding_left']);
?>
<div class="section mission-content ambassador-content section-padding <?php echo $data['border'] ? 'has-border-content' : ''; ?>" data="ambassador-content.php" style="<?php echo $padding; ?>">
    <div class="container-bigger">
        <div class="section-inner" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>'); background-position: center top;background-repeat: no-repeat;background-size: 100% auto">
            <div class="container">
                <?php if (!empty($data['welcome'])) { ?>
                    <div class="title-welcome <?php echo $f_class; ?>"><?php echo $data['welcome']; ?></div>
                <?php } ?>
                <div class="position-relative">
                    <div class="row">
                        <div class="col-12 col-lg-7">
                            <img src="<?php echo get_attachment($data['image'])['src']; ?>" style="width:100%" <?php echo zoom_in(1); ?> />
                        </div>
                        <div class="col-12 col-lg-5">
                            <div class="block-content bg-white h-100">
                                <div class="block-content-inner h-100">
                                    <div class="title-section text-center <?php echo $f_class; ?>">
                                        <?php echo $data['title']; ?>
                                    </div>
                                    <div class="description-section text-center"><?php echo $data['description']; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>