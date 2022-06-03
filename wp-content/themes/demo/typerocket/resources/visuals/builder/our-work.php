<?php $choose_font = $data['choose_font'];
if($choose_font == 'carolissa'){
	$f_class = 'carolissa-font';
} elseif($choose_font == 'cherlotte'){
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
}

if (empty($data['padding_top'])) $data['padding_top'] = '';
if (empty($data['padding_right'])) $data['padding_right'] = '';
if (empty($data['padding_bottom'])) $data['padding_bottom'] = '';
if (empty($data['padding_left'])) $data['padding_left'] = '';
$padding = padding_tr($data['padding_top'], $data['padding_right'],  $data['padding_bottom'],  $data['padding_left']);

$image_width = $data['image_width'];
$text_width = 12-$image_width;
?>
<div class="section core-values our-work section-padding" style="<?php echo $padding; ?>">
    <div class="container">
        <div class="row <?php echo $data['reverse'] ? 'flex-row-reverse' : ''; ?>">

            <div class="col-12 col-lg-<?php echo $text_width; ?> d-flex">
                <div class="block-content1 bg-white h-100 w-100">
                    <div class="block-content-inner  h-100" <?php echo $data['animation'] ? zoom_in(2) : '' ?>>
                        <div class="title-section text-center <?php echo $f_class; ?>">
                            <?php echo $data['title']; ?>
                        </div>
                        <div class="description-section text-center">
                            <?php echo $data['description']; ?>
                        </div>
                    </div>
                </div>
            </div>
			
			            <div class="col-12 col-lg-<?php echo $image_width; ?>">
                <div class="block-image" <?php// echo zoom_in(1); ?>>
                        <img src="<?php echo get_attachment($data['image'])['src']; ?>" alt="image" />
                    </div>
            </div>
        </div>
    </div>
</div>