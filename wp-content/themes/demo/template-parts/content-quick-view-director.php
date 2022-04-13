<div class="director-details">
    <?php
    if (!empty(get_the_post_thumbnail())) {
        ?>
        <div class="director-image">
            <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
        </div>
        <?php
    }
    ?>
    <div class="director-content">
        <div class="title-section blue">
            <?php the_title() ?>
        </div>
        <?php
        if (!empty(tr_posts_field('more_info'))) {
            ?>
            <div class="name-item font-medium main-black">
                <?= tr_posts_field('more_info') ?>
            </div>
            <?php
        }
        if (!empty(get_the_content())) {
            ?>
            <div class="description mt-25">
                <?php the_content(); ?>
            </div>
            <?php
        }
        ?>
    </div>
</div>