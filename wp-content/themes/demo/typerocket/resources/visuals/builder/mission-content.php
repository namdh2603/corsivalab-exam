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
<div class="section mission-content <?php echo (($data['bg_shadow']) ? 'bg-shadow' : ''); ?> section-padding" style="<?php echo $padding; ?>">
    <div class="container-bigger">
		
        <div class="section-inner" style="background-image: url('<?php echo get_attachment($data['background'])['src']; ?>'); background-position: center top;background-repeat: no-repeat;background-size: <?php echo (($data['bg_size']) ? $data['bg_size'] : '100% 50%'); ?>;">
			
			
	<div class="container">
        <?php if(!empty($data['welcome'])): ?><div class="title-welcome <?php echo $f_class; ?>"><?php echo $data['welcome']; ?></div><?php endif; ?>
        <div class="position-relative">
            <div class="block-content" style="background-image: url('<?php echo get_attachment($data['background_content'])['src']; ?>'); background-position: <?php echo (($data['bg_position_inner']) ?: 'center center'); ?>;background-repeat: no-repeat;background-size: <?php echo (($data['bg_size_inner']) ? $data['bg_size_inner'] : '100%'); ?>;">
                <div class="row">
                    <div class="col-12 col-lg-5 offset-lg-<?php echo (($data['right']) ? '7' : '0'); ?>">
                        <div class="block-content-inner" <?php //echo zoom_in(2); ?>>
                            <div class="title-section text-center text-white <?php echo $f_class; ?>">
                                <?php echo $data['title']; ?>
                            </div>
                            <div class="description-section text-center text-white"><?php echo $data['description']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
	</div>
</div>