<?php 
$title = $data['title'];
$title = str_replace("///", "<br>", $title);
?>
    <div class="section section-about"
    <?php if(!empty($data['background'])) { ?>
    style=" background: url( <?php echo get_attachment($data['background'])['src']; ?> );
        background-size: cover; "
    <?php };//if ?>
    >
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5 d-flex flex-column justify-content-center align-items-start block-left mb-3 mb-lg-0">
                    <div class="title" <?php echo zoom_in(1); ?>><?php echo $title; ?></div>
                    <div class="image" <?php echo fade_up(1); ?>>
                        <img src="<?php echo get_attachment($data['thumbnail'])['src']; ?>" alt="Thumbnail">
                    </div>
                    <div class="description" <?php echo zoom_in(3); ?>>
                        <?php echo $data['description']; ?>
                    </div>
                    <div class="btn-group btn-left">
                        <a class="btn-main" href="<?php echo $data['link_button']; ?>" <?php echo fade_up(4); ?>>
                            <?php echo $data['text_button']; ?>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-lg-6 offset-lg-1 block-right">
                    <div class="image" <?php echo fade_left(3); ?>>
                        <img src="<?php echo get_attachment($data['banner'])['src']; ?>" alt="">
                    </div>
                </div>
            </div>            
        </div>
    </div> 