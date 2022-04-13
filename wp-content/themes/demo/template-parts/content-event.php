
<div class="col-lg-3 col-sm-4 col-6 mt-30">
    <div class="item">

        <?php
        if (!empty(get_the_post_thumbnail())) {
            ?>
            <div class="item-image">
                <a href="<?= get_permalink() ?>">
                    <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
                </a>
            </div>
            <?php
        }
        ?>
        <div class="item-content">
            <div class="fw-bold description-bigger main-black">
                <a href="<?= get_permalink() ?>">
                    <?php the_title(); ?>
                </a>
            </div>
            <?php
            if (!empty(tr_posts_field('event_date')) || !empty(tr_posts_field('address'))) {
                ?>
                <div class="item-info">
                    <?php
                    if (!empty(tr_posts_field('event_date'))) {
                        ?>
                        <div class="child-item">
                            <div class="child-item-image">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/clock-blue.png" alt="Clock"/>
                            </div>
                            <div class="child-item-content">
                                <div class="main-black semi-bold">
                                    Date & Time
                                </div>
                                <div class="description-smaller mt-10">
									
                                    <?php //echo  tr_posts_field('time').'<br>' || ''; ?>
                                    <?= tr_posts_field('event_date') ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if (!empty(tr_posts_field('address'))) {
                        ?>
                        <div class="child-item">
                            <div class="child-item-image">
                                <img src="<?= get_template_directory_uri() ?>/assets/images/location-blue.png" alt="Clock"/>
                            </div>
                            <div class="child-item-content">
                                <div class="main-black semi-bold">
                                    Venue
                                </div>
                                <div class="description-smaller mt-10">
                                    <?= tr_posts_field('address') ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>