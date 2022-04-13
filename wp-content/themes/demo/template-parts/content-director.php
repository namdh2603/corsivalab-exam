<div class="col-lg-3 col-sm-4 col-6 mt-30">
    <div class="item<?php if(get_post_type() == 'director') echo ' show-item-director' ?>" data-post_type="<?= get_query_var('post_type') ?>" data-id="<?= get_the_ID() ?>" type="button">
        <?php
        if (!empty(get_the_post_thumbnail())) {
            ?>
            <div class="item-image">
                <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
            </div>
            <?php
        }
        ?>
        <div class="item-content text-center">
            <?php
            if (!empty(tr_posts_field('position'))) {
                ?>
                <div class="description-smallest fw-light">
                    <?= tr_posts_field('position') ?>
                </div>
                <?php
            }
            ?>
            <div class="fw-bold description-bigger main-black">
                <?php the_title() ?>
            </div>
            <?php
            if (!empty(tr_posts_field('more_info'))) {
                ?>
                <div class="mt-10 description-smaller main-black">
                    <?= tr_posts_field('more_info') ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>