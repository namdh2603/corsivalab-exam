<div class="video-section section-padding">
	<div class="container">
		<?php
		if (!empty($data['video_file'])) :
			$data_video =  get_attachment($data['video_file']); ?>
			<video class="w-100" src="<?php echo $data_video['src']; ?>" muted autoplay loop type="mp4"></video>
		<?php endif; ?>
	</div>
</div>