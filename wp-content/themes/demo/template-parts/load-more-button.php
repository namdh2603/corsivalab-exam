<button class="btn w-245 btn-load-more"
        data-posts_per_page="<?= get_query_var('posts_per_page') ?>"
        data-post_type="<?= get_query_var('post_type') ?>"
        data-paged="<?= get_query_var('paged') ?>"
        data-cat="<?= $args['dataCat'] ?>"
        data-cat-id="<?php if (isset($args['dataCatID'])) echo $args['dataCatID']; else echo 0; ?>">
    LOAD MORE
</button>