<?php
$padding_top = $data['padding_top'];
$padding_bottom = $data['padding_bottom'];
$padding_left = $data['padding_left'];
$padding_right = $data['padding_right'];

if($padding_top != null){
    $padding_top = 'padding-top: '.$padding_top.'rem';
}

if($padding_bottom != null){
    $padding_bottom = 'padding-bottom: '.$padding_bottom.'rem';
}

if($padding_left  != null){
    $padding_left = 'padding-left: '.$padding_left.'rem';
}

if($padding_right  != null){
    $padding_right = 'padding-right: '.$padding_right.'rem';
}

?>
<section id="">
    <div class="section section-mission" style="<?php echo $padding_top.$padding_bottom.$padding_left.$padding_right; ?><?php if(!empty($data['background'])) { ?>
        ;background: url( <?php echo get_attachment($data['background'])['src']; ?> );background-size: contain; background-repeat: no-repeat;
        <?php } ?>">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 title-section text-center cherlotte-font" <?php echo zoom_in(1); ?>>
                        <?php echo $data['title']; ?>
                    </div>
                    <div class="col-12 col-lg-10" >                        
                        <div class="description" <?php echo zoom_in(3); ?>>
                            <?php echo $data['description']; ?>
                        </div>
                    </div>
                    <div class="col-12" >   
                    <?php if(!empty($data['text_button'])) { ?>
                                <div class="btn-group">
                                    <a class="btn-main" href="<?php echo $data['link_button']; ?>" <?php echo fade_up(5); ?>>
                                <?php echo $data['text_button']; ?>
                            </a>
                        </div>
                    <?php } ?>
                        </div>
                </div>
            </div>
    </div>
</section>