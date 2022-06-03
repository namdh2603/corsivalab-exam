<?php
if (!empty($data['list'])) {
    ?>
    <section class="section-banner-top" data="home-banner-top.php">
        <div class="swiper banner-top">
            <div class="swiper-wrapper <?php echo $data['fit_content'] ? 'fit-content' : ''; ?>">
                <?php
                $is_first = true;
                foreach ($data['list'] as $item) { ?>
                    <div class="swiper-slide <?php if ($is_first) {
                        $is_first = false;
                        echo "active";
                    }; //if
                        echo $data['fit_content'] ? 'd-flex align-items-center' : ''; 
                    ?>">
                        <div class="bg-img mask ">
                            <img src="<?php echo get_attachment($item['background'])['src']; ?>"
                                 class="w-100 <?php echo $data['fit_content'] ? 'img-fit' : ''; ?>"
                                 alt="img">
                        </div>
                        <div class="swiper-caption">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-lg-8 <?php echo $data['fit_content'] ? '' : 'col-xxl-6'; ?> mx-auto">
                                        <div class="block-content">
                                            <div class="title-section text-center text-white"><?php echo $item['title']; ?></div>
                                            <div class="block-description stevie">
                                                <?php echo $item['description']; ?>
                                            </div>
                                        </div>
                                        <?php if (!empty($item['button'])) { ?>
										<div class="btn-group">
											<a class="btn-main btn-layout-2" href="<?php echo $item['link_button']; ?>"><?php echo $item['button']; ?></a></div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php };//foreach ?>
            </div>
            <div class="swiper-button-next d-none d-lg-block">
                <img src="<?php  echo get_template_directory_uri();  ?>/assets/images/Home/next-arrow.png" alt="">
            </div>
            <div class="swiper-button-prev d-none d-lg-block">
                <img src="<?php  echo get_template_directory_uri();  ?>/assets/images/Home/prev-arrow.png" alt="">
            </div>
        </div>
    </section>
    <?php
};//if
?>
