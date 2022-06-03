<section class="section section-plan-to-product">
    <div class="container">
        <div class="block-title text-center">
            <div class="title-section text-center" <?php echo zoom_in(1); ?>>
                <?php echo $data['title']; ?>
            </div>
            <div class="subtitle" <?php echo zoom_in(3); ?>>
                <?php echo $data['description']; ?>
            </div>
        </div>
        <div class="bg-custom" style="background-image: url(<?php echo get_attachment($data['background'])['src']; ?>);background-repeat: no-repeat;background-size: 75% 100%;">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <ul class="nav nav-pills flex-column" id="myTab" role="tablist" <?php echo fade_right(2); ?>>
                        <?php $c = 0;
                        foreach ($data['list'] as $item) {
                            $c++; ?>
                            <li class="nav-item">
                                <a class="nav-link <?php if ($c == 1) echo 'active'; ?>" id="<?php echo $c; ?>-tab" data-toggle="tab" href="#tab<?php echo $c; ?>" role="tab" aria-controls="<?php echo $c; ?>">
								 <div class="title"><?php echo $item['title']; ?></div>
                                <div class="description"><?php echo $item['description']; ?></div>
								
								</a>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
                <div class="col-12 col-lg-5 offset-lg-1">
                    <div class="tab-content" id="myTabContent" <?php echo fade_left(2); ?>>
                        <?php $cc = 0;
                        foreach ($data['list'] as $item) {
                            $cc++; ?>
                            <div class="tab-pane fade <?php if ($cc == 1) echo 'show active'; ?>" id="tab<?php echo $cc; ?>" role="tabpanel" aria-labelledby="<?php echo $cc; ?>-tab">
                                <?php if (!empty($item['thumbnail'])) { ?>
                                    <img src="<?php echo get_attachment($item['thumbnail'])['src']; ?>" alt="background" class="img-cover">
                                <?php } ?>
                            </div>
                        <?php  } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>