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
    <div class="section redeeming-discounts section-padding" style="background-image: url('<?php echo get_attachment($data['bg_img'])['src']; ?>'); background-repeat: no-repeat; background-size: 100%;<?php echo $padding; ?>">
        <div class="container">
            <?php if (!empty($data['title'])) { ?>
                <div class="title-section text-center <?php echo $f_class; ?> <?php echo $data['title_color'] ? 'text-white' : '' ?>"> <?php echo $data['title']; ?></div>
            <?php } ?>
            <div class="row">
                <?php foreach ($data['list'] as $item) {
                    $icon = $item['icon'];
				?>
                    <div class="col-6 col-lg-3">
                        <div class="item text-center" <?php echo fade_up($n); ?>>
                                        
                                <div class="title cherlotte-font">
                                    <?php echo $item['title']; ?>
                            </div>
							
							<div class="title-kg text-white cherlotte-font">
                                    <?php echo $item['kg']; ?>
                            </div>
							
                                            <img src="<?php echo get_attachment($icon)['src']; ?>" <?php echo (($data['full_width_icon']) ? 'style="aspect-ratio: 1/1" class="w-100"' : 'class="icon"'); ?> />
							
							
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
<?php
endif;
?>