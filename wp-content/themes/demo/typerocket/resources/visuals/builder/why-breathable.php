<?php
$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];
if($padding_top != null){
   $padding_top = 'padding-top: '.$padding_top.'px;';
}

if($padding_bottom != null){
   $padding_bottom = 'padding-bottom: '.$padding_bottom.'px;';
}

if($padding_left  != null){
   $padding_left = 'padding-left: '.$padding_left.'px;';
}

if($padding_right  != null){
   $padding_right = 'padding-right: '.$padding_right.'px;';
}
?>
<section class="section section-bread-and-sustain section-padding" style="<?php echo $padding_top.$padding_bottom.$padding_left.$padding_right; ?>">
	
	<div class="image-left" style="background-image: url('<?php echo get_attachment($data['big_thumbnail'])['src']; ?>');    background-position: center <?php echo $data['reverse'] ? 'right' : 'left'; ?>;background-repeat: no-repeat;background-size: 33.3333333%;">
		
		
    <div class="container">
            <div class="row align-items-center <?php echo $data['reverse'] ? 'flex-row-reverse' : ''; ?>">
				<div class="col-12 col-lg-4 <?php echo $data['reverse'] ? 'offset-lg-1' : ''; ?>">
					<div class="hide-image" <?php echo zoom_in(1); ?>>
                    <div class="block-img">
                        <img src="<?php echo get_attachment($data['big_thumbnail'])['src']; ?>" alt="">
                    </div>
					</div>
                </div>
                <div class="col-12 col-lg-4 <?php echo $data['reverse'] ? '' : 'offset-lg-1'; ?>">
                    <div class="block-content" <?php echo zoom_in(2); ?>>
                        <div class="title cherlotte-font">
                            <?php echo $data['title']; ?>
                        </div>
                        <div class="description">
                            <?php echo $data['description']; ?>
                        </div>
                    </div>
                </div>
				<div class="col-12 col-lg-3 block-right">
					<div class="block-img" <?php echo zoom_in(3); ?>>
						<div class="block-img-left w-60">
							<img src="<?php echo get_attachment($data['small_thumbnail_top'])['src']; ?>" alt="image" />
</div>
						<div class="block-img-right w-60">
                                <img src="<?php echo get_attachment($data['small_thumbnail_back'])['src']; ?>"
                                     alt="image" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>