<?php
$title = $data['title'];
$title = str_replace("///", "<br>", $title);
$style_font = $data['style_font'];
$style_btn = $data['style_btn'];
$padding = padding_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
?>
<div class="section section-about section-padding" data="home-about.php" style="background-color: <?php echo $data['bg_color_section']; ?>;<?php if (!empty($data['background'])) { ?>  background: url( <?php echo get_attachment($data['background'])['src']; ?> ); background-size: cover;  <?php } ?><?php echo $padding; ?>">
	<div class="container">
		<div class="row align-items-center <?php echo $data['reverse'] ? 'flex-row-reverse' : ''; ?>">
			<div class="col-12 col-lg-6 <?php echo $data['reverse'] ? 'offset-lg-1 mb-4 mb-lg-0' : ''; ?> <?php echo $data['reverse_mobile'] ? 'order-2 order-lg-1' : ''; ?>">
				<div class="image">
					<img src="<?php echo get_attachment($data['banner'])['src']; ?>">
				</div>
			</div>
			<div class="col-12 col-lg-5 mb-3 mb-lg-0 <?php echo $data['reverse'] ? '' : 'offset-lg-1'; ?> <?php echo $data['reverse_mobile'] ? 'order-1 order-lg-2' : ''; ?>">
				<div class="title-section <?php echo ($style_font ? $style_font : ''); ?>"><?php echo $title; ?></div>
				<?php if ($data['thumbnail']) : ?>
					<div class="image mb-3">
						<img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="Thumbnail">
					</div>
				<?php endif; ?>
				<?php if (!empty($data['btn_link'])) : ?>
					<div class="description-section">
						<?php echo $data['description']; ?>
					</div>
				<?php endif; ?>
				<?php if (!empty($data['link_button'])) { ?>
					<div class="btn-wrap btn-left">
						<a class="btn-main <?php echo ($style_btn ? $style_btn : ''); ?>" href="<?php echo $data['link_button']; ?>" <?php echo fade_up(4); ?>>
							<?php echo $data['text_button']; ?>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>