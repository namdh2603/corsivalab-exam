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
?>
<div class="section core-values section-padding" style="<?php echo $padding; ?>">
    <div class="container">
        <div class="row align-items-center <?php echo $data['reverse'] ? 'flex-row-reverse' : ''; ?>">
            <div class="col-12 col-lg-7">
                <div class="block-img" <?php echo zoom_in(1); ?>>
                    <div class="block-img-left w-60">
                        <img src="<?php echo get_attachment($data['small_thumbnail_top'])['src']; ?>" alt="image" />
                    </div>
                    <div class="block-img-right w-60">
                        <img src="<?php echo get_attachment($data['small_thumbnail_back'])['src']; ?>" alt="image" />
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <div class="block-content bg-white" 
					 <?php if(!empty($data['text_position'])) { ?>
					 	style="transform: translatey(<?php echo $data['text_position'] ?>%);"
					 <?php } ?>
					 >
                    <div class="block-content-inner" <?php echo zoom_in(2); ?>>
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
</div>