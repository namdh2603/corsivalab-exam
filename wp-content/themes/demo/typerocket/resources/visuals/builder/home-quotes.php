    <div class="section section-quotes" 
        <?php if(!empty($data['background'])) { ?>
        style=" background: url(<?php echo get_attachment($data['background'])['src']; ?>);background-size: cover;background-repeat: no-repeat; "
        <?php } ?>
        >
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-lg-10 mx-auto">
                        <div class="description" <?php echo fade_up(2); ?>><?php echo $data['text']; ?></div>
                    </div>
                </div>
            </div>
    </div>