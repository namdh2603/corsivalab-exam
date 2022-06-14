<div class="col-lg-3 col-sm-4 col-6 mt-30">
    <div class="item">
        <div class="item-image">
            <?= get_the_post_thumbnail(get_the_ID(), 'large') ?>
        </div>
        <div class="item-content text-center">
            <div class="fw-bold description-bigger main-black">
                <?php the_title() ?>
            </div>
        </div>
    </div>
</div>