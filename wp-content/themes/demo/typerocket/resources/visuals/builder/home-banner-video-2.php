<?php $choose_font = $data['choose_font'];
if($choose_font == 'carolissa'){
	$f_class = 'carolissa-font';
} elseif($choose_font == 'cherlotte'){
	$f_class = 'cherlotte-font';
} else {
	$f_class = '';
}
if (!empty($data['video_file'])) :
    $data_video =  get_attachment($data['video_file']);
?>
    <div class="banner-section" style="margin-bottom:3rem;">
        <div class="banner layout-2">
            <video src="<?php echo $data_video['src']; ?>" muted autoplay loop type="mp4"></video>
            <div class="noi_dung">
                <div class="container w-100">
                    <div class="title-section text-white <?php echo $data['title_shadow'] ? 'text-title-shadow' : '' ?> <?php echo $f_class; ?> mb-0" <?php //echo zoom_in(1); ?>><?php echo $data['title']; ?></div>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>