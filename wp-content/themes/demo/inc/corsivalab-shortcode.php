<?php
function shortcode_list_social(){
    $social_footer =  tr_options_field('corsivalab_options.social_footer');
    ob_start();
    if ($social_footer) :
        echo '<div class="social-footer-section d-flex align-items-center"><ul class="social-list">';
        foreach ($social_footer as $value) {
            $img_ID = $value['icon'];
            $img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
            echo '<li><a href="' . $value['link_icon'] . '"><img src="' . wp_get_attachment_image_url($img_ID, 'full') . '" alt="' . $img_alt . '"></a></li>';
        }
        echo '</ul></div>';
    endif;
    return ob_get_clean();
}
add_shortcode('social-icon-footer', 'shortcode_list_social');
function shortcode_info_company(){
    $info_company =  tr_options_field('corsivalab_options.info_company');
    ob_start();
    echo '<div class="info-company">';
    foreach ($info_company as $value) {
        // $img_ID = $value['icon'];
        // $img_alt = get_post_meta($img_ID, '_wp_attachment_image_alt', true);
        echo '<div class="item-company">
        <em>' . $value['title'] . '</em>
        <span>' . $value['description_item'] . '</span>
        </div>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('contact-info', 'shortcode_info_company');
function shortcode_menu_content(){
    ob_start();
    $shop_page = wc_get_page_permalink('shop');
    $parent_product_cats = get_terms('product_cat', array('parent' => 0, 'hide_empty' => true, 'exclude' => 15));
    $parent_product_brands = get_terms('berocket_brand', array('parent' => 0, 'hide_empty' => true,));
    $promotion_image =  tr_options_field('corsivalab_options.promotion_image');
    $title =  tr_options_field('corsivalab_options.title');
    $sub_title =  tr_options_field('corsivalab_options.sub_title');
    $title_link =  tr_options_field('corsivalab_options.title_link');
    $link =  tr_options_field('corsivalab_options.link');
    $image_data = get_attachment($promotion_image);
?>
    <div class="row">
        <div class="col-4">
            <div class="promotion-inner">
                <div class="promotion-item text-left">
                    <?php echo '<img class="w-100" src="' . $image_data['src'] . '" alt="' . $image_data['alt'] . '" title="' . $image_data['title'] . '" />'; ?>
                    <div class="promotion-info">
                        <div class="w-100">
                            <div class="title text-white"><?php echo $title; ?></div>
                            <div class="sub-title text-white"><?php echo $sub_title; ?></div>
                            <div class="btn-group btn-left">
                                <a class="btn-main btn-selling text-white" href="<?php echo $link; ?>"><?php echo $title_link; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-2">
            <h4 class="title-sub-block">Shop By Category</h4>
            <?php foreach ($parent_product_cats as $product_cat_obj) {
                echo '<ul>';
                $term_link = get_term_link($product_cat_obj);
                //$term_id = $product_cat_obj->term_id; // term ID
                $term_name = $product_cat_obj->name; // term Name
                echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
                echo '</ul>';
            } ?>
        </div>
        <div class="col-2">
            <h4 class="title-sub-block">Shop By Brands</h4>
            <?php foreach ($parent_product_brands as $product_brands_obj) {
                echo '<ul>';
                $term_link = get_term_link($product_brands_obj);
                //$term_id = $product_cat_obj->term_id; // term ID
                $term_name = $product_brands_obj->name; // term Name
                echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
                echo '</ul>';
            } ?>
        </div>
        <div class="col-4">
            <h4 class="title-sub-block">Shop By Product Tag</h4>
            <?php $terms = get_terms('product_tag');
            if (!empty($terms) && !is_wp_error($terms)) {
                echo '<ul class="product-tags">';
                foreach ($terms as $term) {
                    $term_link = get_term_link($term);
                    $term_name = $term->name;
                    echo '<li><a href="' . $term_link . '">' . $term_name . '</a></li>';
                }
                echo '</ul>';
            } ?>
        </div>
    </div>
    <?php return ob_get_clean();
}
add_shortcode('menu-shop-content', 'shortcode_menu_content');
function shortcode_similar_blogposts(){
    ob_start();
    echo '<ul class="list post-list">';
    $args = array(
        'post_type'    => 'post',
        'posts_per_page' => 4,
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <li class="sb-post-item">
                <div class="sb-post-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail(); ?>
                    </a>
                </div>
                <div class="sb-post-name">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                    <div class="small-text"><?php echo wp_trim_words(get_the_content(), 10, '...'); ?></div>
                </div>
            </li>
        <?php endwhile;
        wp_reset_postdata();
    endif;
    echo '</ul>';
    return ob_get_clean();
}
add_shortcode('similar-blogposts', 'shortcode_similar_blogposts');
function shortcode_feature_list(){
    ob_start();
    $feature_item =  tr_options_field('corsivalab_options.feature_item');
    if (!empty($feature_item)) : ?>
        <div class="default-section feature-list-section" style="background-color: #F3F8EF">
            <div class="container">
                <div class="feature-list-inner">
                    <div class="row row-eq-height">
                        <?php foreach ($feature_item as $item) {
                            $title = $item['title'];
                            $description = $item['description'];
                            $description = str_replace("|", "<br>", $description);
                            $image = $item['icon'];
                            $image_data = get_attachment($image);
                        ?>
                            <div class="col-4 col-lg-4">
                                <div class="feature-item text-left">
                                    <div class="row align-items-center">
                                        <div class="col-12 col-lg-4">
                                            <div class="feature-icon">
                                                <?php echo '<img src="' . $image_data['src'] . '" alt="' . $image_data['alt'] . '" title="' . $image_data['title'] . '" />'; ?>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-8">
                                            <div class="feature-info">
                                                <div class="name"><?php echo $title; ?></div>
                                                <div class="address"><?php echo $description; ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php endif;
    return ob_get_clean();
}
add_shortcode('feature-list', 'shortcode_feature_list');