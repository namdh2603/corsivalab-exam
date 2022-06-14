<?php
?>
<div class="btn-main btn-load-more" data-post_number="<?php if ($args['post_number']) echo $args['post_number']; ?>" data-post_type="<?php if ($args['post_type']) echo $args['post_type']; ?>" data-paged="1" data-cat="<?php if ($args['taxonomy']) echo $args['taxonomy']; ?>" data-cat_id="<?php if ($args['cat']){ echo $args['cat'];} else { echo '0';} ?>">LOAD MORE</div>