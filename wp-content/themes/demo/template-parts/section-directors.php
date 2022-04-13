<?php
if ($args['title']) {
    $title = $args['title'];
}
if ($args['description']) {
    $description = $args['description'];
}
if ($args['taxonomy']) {
    $taxonomy = $args['taxonomy'];
}
if ($args['currentPage']) {
    $currentPage = $args['currentPage'];
}
if ($args['showFilter']) {
    $showFilter = $args['showFilter'];
}
global $wp_query;
?>
<div class="section section-directors">
    <div class="container">
        <div class="directors">
            <div class="row">
                <?php
                if (!empty($title) || !empty($description)) {
                    ?>
                    <div class="col-sm-10">
                        <div class="directors-title">
                            <?php
                            if (!empty($title)) {
                                ?>
                                <div class="title-section blue">
                                    <?= $title ?>
                                </div>
                                <?php
                            }
                            if (!empty($description)) {
                                ?>
                                <div class="description mt-25">
                                    <?= $description ?>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="col-sm-12">
                    <div class="directors-content mt-20">
                        <?php
                        if (isset($showFilter) && $showFilter == 1) {
                            $directorCats = get_terms(array('taxonomy' => $taxonomy));
                            if (!empty($directorCats)) {
                                ?>
                                <ul class="directors-filter main-black">
                                    <li<?php if (!isset($_GET['category'])) echo ' class="active"' ?>><a
                                                href="<?= get_permalink($currentPage) ?>">All</a></li>
                                    <?php
                                    foreach ($directorCats as $cat) {
                                        ?>
                                        <li<?php if (isset($_GET['category']) && $_GET['category'] == $cat->term_id) echo ' class="active"' ?>>
                                            <a href="?category=<?= $cat->term_id ?>"><?= $cat->name ?></a></li>
                                        <?php
                                    }
                                    ?>
                                </ul>
                                <?php
                            }
                        }
                        ?>
                        <div class="directors-list<?php if (isset($showFilter) && $showFilter == 1) echo ' mt-40'; else echo ' border-0' ?>">
                            <div class="row row-posts-list">
                                <?php
                                while (have_posts()) {
                                    the_post();
                                    if (get_post_type() != 'licensee') {
                                        echo get_template_part('template-parts/content', 'director');
                                    } else {
                                        echo get_template_part('template-parts/content', 'licensee');
                                    }
                                }
                                ?>
                            </div>
                            <?php
                            if ($wp_query->max_num_pages != get_query_var('paged')) {
                                ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="directors-pagination group-btn-load-more group-btn mt-55 text-center">
                                            <button class="btn w-245 btn-load-more"
                                                    data-posts_per_page="<?= get_query_var('posts_per_page') ?>"
                                                    data-post_type="<?= get_query_var('post_type') ?>"
                                                    data-paged="<?= get_query_var('paged') ?>"
                                                    data-cat="<?= $taxonomy ?>"
                                                    data-cat-id="<?php if (isset($_GET['category'])) echo $_GET['category']; else echo 0; ?>">
                                                LOAD MORE
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>