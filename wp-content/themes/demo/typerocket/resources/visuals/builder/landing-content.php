<?php
$style_font = $data['style_font'];
$style_font_2 = $data['style_font_2'];
// $style_btn = $data['style_btn'];
?>
<div class="css-1bo4ahw" data="landing-content.php">
	<div id="image-2" class="css-1n84elv">
		<img src="<?php echo get_attachment($data['background'])['src']; ?>" class="image">
	</div>
</div>
<div class="row-bg-white h-100">
<div class="row row-landing-content h-100">
	<div class="col-12 col-lg-6">
		<div class="css-1abynbb">
			<div data-comp="Box" class="css-oc84xg">
				<h2 class="css-10mmay5 title-section <?php echo ($style_font ? $style_font : ''); ?> cherlotte-font-login"><?php echo $data['title_left']; ?></h2>
				<div data-comp="Text" class="css-7htj65 description-section "><?php echo $data['description_left']; ?></div>
			</div>
			<div class="countdown-form">
				<?php echo do_shortcode($data['shortcode_countdown']); ?>
			</div>
		</div>
	</div>
	<div class="col-12 col-lg-6">
		<div class="css-1vfxwd8">
			<div data-comp="Box" class="css-oc84xg">
				<?php if (!empty($data['title_right'])) : ?>
					<h2 class="css-11ftgon title-section <?php echo ($style_font_2 ? $style_font_2 : ''); ?>">
						<?php
						$title_right = $data['title_right'];
						$title_right = str_replace("///", "<br>", $title_right);
						echo $title_right;
						?>
					</h2>
				<?php endif; ?>

				<?php if (!empty($data['sub_title_right'])) : ?>
					<div><?php echo $data['sub_title_right']; ?></div>
				<?php endif; ?>

				<?php if (!empty($data['description_right'])) : ?>
					<br>
					<div class="css-xvuvl5 description-section">
						<strong><?php echo $data['description_right']; ?></strong>
					</div>
				<?php endif; ?>

			</div>
			<div class="reg-form">
				<?php echo do_shortcode($data['shortcode_register']); ?>
			</div>
		</div>
	</div>
</div>
</div>