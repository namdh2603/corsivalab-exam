<div class="image-section section-padding">
	<div class="container">
		<?php
		if (!empty($data['img'])) :
			$data_image =  get_attachment($data['img']); ?>
			<img class="w-100" src="<?php echo $data_image['src']; ?>" />
		<?php endif; ?>
	</div>
</div>