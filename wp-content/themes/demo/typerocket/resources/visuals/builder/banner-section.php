<?php
$choose_button_layout = $data['choose_button_layout'];
$choose_font = $data['choose_font'];
if ($choose_button_layout == 'layout-1') {
	$btn_class = 'btn-layout-1';
} elseif ($choose_button_layout == 'layout-2') {
	$btn_class = 'btn-layout-2';
} else {
	$btn_class = '';
}
if ($choose_font == 'carolissa') {
	$f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
} ?>
<div class="banner-section-v2<?php echo $data['section_padding'] ? ' section-padding' : '' ?>" data="banner-section.php">
	<style>
	@media only screen and (max-width: 576px) {
	.banner-section-v2{
	background-image: url(<?php echo get_attachment($data['img'])['src']; ?>);background-repeat: no-repeat;background-size: cover;
	}
	</style>
	<div class="<?php echo $data['bg_darken'] ? 'bg-darken' : '' ?>">
		<img src="<?php echo get_attachment($data['img'])['src']; ?>" class="w-100 d-none d-lg-block" alt="img" />
		<div class="swiper-caption">
			<div class="container w-100">
				<div class="row">
					<div class="col-12 col-lg-9 mx-auto">
						<div class="block-content">
							<div class="title-section text-center text-black <?php echo $data['title_color'] ? 'text-white' : '' ?> <?php echo $data['title_shadow'] ? 'text-title-shadow' : '' ?> <?php echo $f_class; ?>"><?php echo $data['title']; ?></div>
							<div class="description-section text-center <?php echo $data['text_color'] ? 'text-white' : '' ?>">
								<?php echo $data['description']; ?>
							</div>
							<?php if (!empty($data['button'])) { ?>
								<div class="btn-group btn-center">
									<a class="btn-main  <?php echo $btn_class; ?>" href="<?php echo $data['link_button']; ?>">
										<?php echo $data['button']; ?>
									</a>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>