<?php if (!empty($data['list'])) { ?>
    <section class="section-banner-carousel">
        <div class="swiper-container  banner-carousel-container">
            <div class="swiper-wrapper">
                <?php
                foreach ($data['list'] as $item) { ?>
                    <div class="swiper-slide">
						     <img src="<?php echo get_attachment($item['background'])['src']; ?>" class="w-100" alt="img" />
                        <div class="swiper-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-8 <?php echo $data['fit_content'] ? '' : 'col-xxl-6'; ?> mx-auto">
                                        <div class="block-content">
                                            <div class="title-section text-center text-white" <?php echo zoom_in(1); ?>><?php echo $item['title']; ?></div>
                                            <div class="description-section text-center text-white" <?php echo zoom_in(2); ?>>
                                                <?php echo $item['description']; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($item['button'])) { ?>
                                            <div class="btn-group btn-center">
                                                <a class="btn-main btn-outline" href="<?php echo $item['link_button']; ?>"  <?php echo fade_up(3); ?>>
                                                    <?php echo $item['button']; ?>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
				
				         
				
            </div>
			
			   <div class="swiper-button-next d-none d-lg-block">
                <img src="<?php  echo get_template_directory_uri();  ?>/assets/images/Home/next-arrow.png" alt="">
            </div>
            <div class="swiper-button-prev d-none d-lg-block">
                <img src="<?php  echo get_template_directory_uri();  ?>/assets/images/Home/prev-arrow.png" alt="">
            </div>

        </div>
    </section>
    <?php } ?>
<script>
	
jQuery(document).ready(function ($) {
var swiper = new Swiper(".banner-carousel-container", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
});
	</script>
