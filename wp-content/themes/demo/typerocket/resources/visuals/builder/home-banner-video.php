<?php
if (!empty($data['video_file'])):
$data_video =  get_attachment($data['video_file']);
?>
<div class="banner-section">
    <div class="banner">
        <video src="<?php echo $data_video['src']; ?>" muted autoplay loop type="mp4"></video>
        <div class="noi_dung">
            <div class="container w-100">

                <div class="row justify-content-center">
                    <div class="col-12 col-lg-8">

                        <div class="title-section text-center text-white" <?php //echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
                        <div class="description-section text-center text-white" <?php //echo zoom_in(2); ?>><?php echo $data['description']; ?></div>

                        <?php if (!empty($data['button'])) { ?>
                            <div class="btn-group btn-center">
                                <a class="btn-main btn-outline" href="<?php echo $data['link_button']; ?>">
                                    <?php echo $data['button']; ?>
                                </a>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>