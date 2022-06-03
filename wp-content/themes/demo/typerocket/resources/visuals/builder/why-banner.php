<?php
$background_color = $data['background_color'];
$color = $data['color'];
if($data['background']){
    $style = '';
} else {
    $style = 'style="border-color:'.$color.';background-color:'.$background_color.'90"';
}
?>
<section class="section section-banner-dash">
    <div class="w-full">
        <?php if($data['background']){ ?>
        <div class="bg-img">
            <img src="<?php echo get_attachment($data['background'])['src']; ?>" alt="" class="img-cover">
        </div>
        <?php } ?>
        <div class="block-content" <?php echo $style; ?>>
            <div class="container-fluid">
                <div class="row">
                    <div class="title col-10 mx-auto" <?php echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
                </div>
            </div>
        </div>
    </div>
</section>