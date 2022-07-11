<?php
//add_action('init', 'corsivalab_remove_image_sizes');
function corsivalab_remove_image_sizes()
{
    remove_image_size('thumbnail'); // WordPress (used by the media librairy to display thumbs)
    remove_image_size('large'); // WordPress (used by the media librairy to display thumbs)
    remove_image_size('medium'); // WordPress (used by the media librairy to display thumbs)
    remove_image_size('medium_large'); // WordPress (used by the media librairy to display thumbs)
    remove_image_size('1536x1536'); // WordPress (used by the media librairy to display thumbs)
    remove_image_size('2048x2048'); // WordPress (used by the media librairy to display thumbs)
    //remove_image_size('shop_thumbnail'); // Woocommerce
    //remove_image_size('shop_catalog'); // Woocommerce
    //remove_image_size('shop_single'); // Woocommerce
    //remove_image_size('woocommerce_thumbnail'); // Woocommerce
    //remove_image_size('woocommerce_single'); // Woocommerce
    //remove_image_size('woocommerce_gallery_thumbnail'); // Woocommerce 
}
function prefix_category_title($title)
{
    if (is_category()) $title = single_cat_title('', false);
    return $title;
}
//add_filter('get_the_archive_title', 'prefix_category_title');
//remove_action('wp_head', 'wp_generator');
//add_filter('the_generator', '__return_empty_string');
function remove_version_wp($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}
//add_filter('style_loader_src', 'remove_version_wp', 9999);
//add_filter('script_loader_src', 'remove_version_wp', 9999);

function corsivalab_search_form($form)
{
    $form = '
    <form role="search" method="get" class="search-form" action="' . home_url('/') . '" >
    <input type="text" class="element-search" value="' . get_search_query() . '" name="s" class="keyword" placeholder="Search..." />
	<input type="hidden" value="post" name="post_type" />
	<input type="hidden" value="product" name="post_type" />
    </form>
    ';
    return $form;
}
//add_filter('get_search_form', 'corsivalab_search_form');

function corsivalab_menu_classes($classes, $item, $args)
{
    if ($args->theme_location == 'main-menu') {
        $classes[] = 'menu__item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'corsivalab_menu_classes', 1, 3);
function corsivalab_menu_link_class($atts, $item, $args)
{
    if ($args->theme_location == 'main-menu') {
        $atts['class'] = 'menu__link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'corsivalab_menu_link_class', 1, 3);