<?php

if (!empty($data['list'])) {
    ?>
    <section id="collections"
			         <?php if(!empty($data['background'])) { ?>
        style=" background-image: url(<?php echo get_attachment($data['background'])['src']; ?>);background-size: 100% auto; background-position: bottom; background-repeat: no-repeat;"
        <?php } ?>
			 >
        <div class="section section-collections">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-6">
                        <div class="title text-center" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div> 
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">
                        <div class="description" <?php echo zoom_in(2); ?>><?php echo $data['description']; ?></div>
                    </div>
                </div>
            </div>
            <div class="w-full1 block-collections container">
                <div class="row justify-content-between">
                <?php $n = 0; foreach ($data['list'] as $item) { $n++;
                    
$title = $item['title'];
$title = str_replace("///", "<br>", $title);
                    ?>
                    <div class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div class="item">
                        <div class="d-flex">
                            <div class="image mask">
                                <img src="<?php echo get_attachment($item['background'])['src']; ?>"
                                     alt="collections"
                                     class="img-cover"
                                    >
                            </div>
                            <div class="block-content ">
                                <div class="d-flex flex-column justify-content-end">
                                    <div class="title text-white" <?php echo fade_up($n); ?>>
                                        <?php echo $title; ?>
                                    </div>
                                    <div class="description text-white" <?php echo fade_up($n); ?>>
                                        <?php echo $item['description']; ?>
                                    </div>
                                <div class="btn-group btn-left" <?php echo fade_up($n); ?>>
                                    <a class="btn-main btn-outline" href="<?php echo $item['link_button']; ?>">
                                            <?php echo $item['text_button']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div></div>
                <?php }//foreach ?>

                </div>
            </div>
        </div>
    </section>
    <?php
}//if
?>
