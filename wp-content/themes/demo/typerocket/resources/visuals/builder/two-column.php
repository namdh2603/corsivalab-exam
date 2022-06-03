<?php
$style_btn = $data['style_btn'];
$bg_color = $data['bg_color'];

$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<div class="section two-column section-padding" data="two-column.php" style="background-color: <?php echo $data['bg_color_section']; ?>; <?php echo $padding; ?>>">
    <div class="container">
		<div class="" style="background-color: <?php echo $bg_color; ?>">
        <div class="row no-gutters align-items-center <?php echo $data['reverse'] ? 'flex-row-reverse' : ''; ?>">
            <div class="col-12 col-lg-6">
                <?php if (!empty($data['img'])) : ?>
                    <div class="image" <?php //echo zoom_in(1); ?>>
                        <img class="w-100" src="<?php echo get_attachment($data['img'])['src']; ?>">
                    </div>
                <?php endif; ?>

            </div>
            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
				<div class="content-inner <?php //echo $data['content_center'] ? 'text-center' : ''; ?>">
					
				
                <?php if (!empty($data['title'])) : ?>
                    <div class="title-section <?php echo $data['cherlotte_font'] ? 'cherlotte-font' : ''; ?> <?php //echo $data['content_center'] ? 'text-center' : ''; ?>" <?php //echo zoom_in(1); ?>><?php echo  $data['title']; ?></div>
                <?php endif; ?>
                <?php if (!empty($data['description'])) : ?>
                    <div class="description-section" <?php //echo zoom_in(3); ?>>
                        <?php echo $data['description']; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($data['link_button'])) { ?>
                    <div class="btn-group <?php //echo $data['content_center'] ? 'btn-center' : 'btn-left'; ?>">
                        <a class="btn-main <?php echo ($style_btn ? $style_btn : ''); ?>" href="<?php echo $data['link_button']; ?>" <?php //echo fade_up(4); ?>>
                            <?php echo $data['text_button']; ?>
                        </a>
                    </div>
                <?php } ?>
					</div>
            </div>
        </div>
        </div>
    </div>
</div>