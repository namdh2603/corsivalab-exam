<?php
$choose_font = $data['choose_font'];
if ($choose_font == 'carolissa') {
	$f_class = 'carolissa-font';
} elseif ($choose_font == 'cherlotte') {
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
}
$margin = margin_tr($data['top'] ?? null, $data['right'] ?? null,  $data['bottom'] ?? null,  $data['left'] ?? null);
if (!empty($data['list'])) { ?>
	<section class="section-banner-carousel photo-carousel" data="home-banner-carousel-2.php" style="<?php echo $margin; ?>">
		<div class="swiper-container  banner-carousel-container">
			<div class="swiper-wrapper">
				<?php
				foreach ($data['list'] as $item) {
				?>
					<div class="swiper-slide">
						<img src="<?php echo get_attachment($item['background'])['src']; ?>" class="w-100" alt="img" style="max-height: <?php echo $item['height']; ?>rem" />
					</div>
				<?php } ?>
			</div>
			<div class="swiper-caption">
				<div class="block-content">
					<div class="container">
						<div class="title-section text-left w-100 mb-0 <?php echo $f_class; ?> <?php echo $data['title_color'] ? 'text-white' : '' ?> <?php echo $data['title_shadow'] ? 'text-title-shadow' : '' ?>" <?php //echo zoom_in(1); 
																																																						?>><?php echo $data['title']; ?></div>
					</div>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
<script>
	jQuery(document).ready(function($) {
		var swiper = new Swiper(".banner-carousel-container", {
			//         navigation: {
			//             nextEl: ".swiper-button-next",
			//             prevEl: ".swiper-button-prev",
			//         },
		});
	});
</script>