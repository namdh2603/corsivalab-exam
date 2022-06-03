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
<div class="section story-content section-padding" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>'); background-position: center top;background-repeat: no-repeat;background-size: 100% auto;<?php echo $padding_top . $padding_bottom . $padding_left . $padding_right; ?>">
    <div class="container">
        <div class="position-relative">
            <div class="block-img mb-3 mb-lg-0" <?php echo zoom_in(1); ?>>
                <img src="<?php echo get_attachment($data['image'])['src']; ?>" alt="" class="story-content-img">
            </div>
            <div class="block-content bg-white"
				 <?php if(!empty($data['text_position'])) { ?>
					 	style="transform: translatey(<?php echo $data['text_position'] ?>%);"
					 <?php } ?>
				 >
                <div class="block-content-inner"  <?php echo zoom_in(1,-100); ?>>
                    <div class="title-section text-center <?php echo $f_class; ?>">
                        <?php echo $data['title']; ?>
                    </div>
                    <div class="description-section text-center">
                        <?php echo $data['description']; ?>
                    </div>
                </div>
	</div>
        </div>
    </div>
	
</div>