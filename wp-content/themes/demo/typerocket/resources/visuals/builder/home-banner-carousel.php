<?php
$choose_button_layout = $data['choose_button_layout'];
if($choose_button_layout == 'layout-1'){
	$btn_class = 'btn-layout-1';
} elseif($choose_button_layout == 'layout-2'){ 
	$btn_class = 'btn-layout-2';
} else {
	$btn_class = '';
};
if (!empty($data['list'])) { ?>
	<section class="section-banner-carousel <?php echo $data['section_padding'] ? 'section-padding' : '' ?>" data="home-banner-carousel.php">
		<div class="swiper-container  banner-carousel-container <?php echo $data['bg_darken'] ? 'bg-darken' : '' ?>">
			<div class="swiper-wrapper">
				<?php
				foreach ($data['list'] as $item) {
					$choose_font = $item['choose_font'];
					if ($choose_font == 'carolissa') {
						$f_class = 'carolissa-font';
					} elseif ($choose_font == 'cherlotte') {
						$f_class = 'cherlotte-font';
					} else {
						$f_class = '';
					}
				?>
					<div class="swiper-slide">
						<img src="<?php echo get_attachment($item['background'])['src']; ?>" class="w-100" alt="img" />
						<div class="swiper-caption">
							<div class="container w-100">
								<div class="row">
									<div class="col-12 col-lg-9 mx-auto">
										<div class="block-content">
											<div class="title-section text-center text-black <?php echo $data['title_color'] ? 'text-white' : '' ?> <?php echo $data['title_shadow'] ? 'text-title-shadow' : '' ?> <?php echo $f_class; ?>" <?php //echo zoom_in(1); ?>><?php echo $item['title']; ?></div>
											<div class="description-section text-center <?php echo $data['text_color'] ? 'text-white' : '' ?>" <?php //echo zoom_in(2); ?>>
												<?php echo $item['description']; ?>
											</div>
											
											<?php if (!empty($item['button'])) { ?>
											<div class="btn-group btn-center">
												<a class="btn-main  <?php echo $btn_class; ?>" href="<?php echo $item['link_button']; ?>" <?php //echo fade_up(3); ?>>
													<?php echo $item['button']; ?>
												</a>
											</div>
										<?php } ?>
											
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="swiper-button-next d-none d-lg-block">
				<img src="<?php echo get_template_directory_uri();  ?>/assets/images/Home/next-arrow.png" alt="">
			</div>
			<div class="swiper-button-prev d-none d-lg-block">
				<img src="<?php echo get_template_directory_uri();  ?>/assets/images/Home/prev-arrow.png" alt="">
			</div>
		</div>
	</section>
<?php } ?>
<script>
	jQuery(document).ready(function($) {
		var swiper = new Swiper(".banner-carousel-container", {
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev",
			},
		});
	});
</script>