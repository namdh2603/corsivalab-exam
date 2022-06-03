<?php
$style_btn = $data['style_btn'];
$bg_color = $data['bg_color'];

$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<div class="section-padding two-column-v2 inner-1" data="two-column-v2.php" style="background-color: <?php echo $data['bg_color']; ?>; <?php echo $padding; ?>">
    <div class="container">
        <div class="row">

            <div class="col-12 col-lg-7">
				<div class="content-inner <?php echo $data['white_section'] ? 'white-content' : ''; ?>">
                <?php if (!empty($data['sub'])) : ?>
                    <div class="sub-title"><?php echo $data['sub']; ?></div>
                <?php endif; ?>
                <?php if (!empty($data['title'])) : ?>
                    <div class="title-section"><?php echo $data['title']; ?></div>
                <?php endif; ?>
                <?php if (!empty($data['desc'])) : ?>
                    <div class="description-section" <?php //echo zoom_in(3); ?>>
                        <?php echo $data['desc']; ?>
                    </div>
                <?php endif; ?>
          <?php if (!empty($data['btn_txt'])) { ?>
                    <div class="btn-group btn-left">
                        <a class="btn-main" href="<?php echo $data['btn_link']; ?>">
                            <?php echo $data['btn_txt']; ?>
                        </a>
                    </div>
                <?php } ?>
					</div>
            </div>
			<div class="col-12 col-lg-1"></div>
			
			            <div class="col-12 col-lg-4">
                <?php if (!empty($data['img'])) : ?>
                    <div class="image">
                        <img class="w-100" src="<?php echo get_attachment($data['img'])['src']; ?>">
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<div class="section-padding two-column-v2 inner-2" data="two-column-v2.php" style="background-color: <?php echo $data['bg_color_2']; ?>; <?php echo $padding; ?>">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-12 col-lg-7">
				<div class="d-flex align-items-end">
				<div class="content-inner <?php echo $data['white_section_2'] ? 'white-content' : ''; ?>">
					
                <?php if (!empty($data['sub_2'])) : ?>
                    <div class="sub-title"><?php echo $data['sub_2']; ?></div>
                <?php endif; ?>
				
                <?php if (!empty($data['title_2'])) : ?>
                    <div class="title-section"><?php echo  $data['title_2']; ?></div>
                <?php endif; ?>
                <?php if (!empty($data['desc_2'])) : ?>
                    <div class="description-section" <?php //echo zoom_in(3); ?>>
                        <?php echo $data['desc_2']; ?>
                    </div>
                <?php endif; ?>
                   <?php if (!empty($data['btn_txt_2'])) { ?>
                    <div class="btn-group btn-left">
                        <a class="btn-main" href="<?php echo $data['btn_link_2']; ?>">
                            <?php echo $data['btn_txt_2']; ?>
                        </a>
                    </div>
                <?php } ?>
					</div>
					</div>
            </div>
			<div class="col-12 col-lg-1"></div>
			
            <div class="col-12 col-lg-4">
                <?php if (!empty($data['img_2'])) : ?>
                    <div class="image">
                        <img class="w-100" src="<?php echo get_attachment($data['img_2'])['src']; ?>">
                    </div>
                <?php endif; ?>

            </div>
        </div>
        </div>
</div>