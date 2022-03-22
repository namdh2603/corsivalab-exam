<?php
function corsivalab_setup()
{
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('woocommerce');
    // add_theme_support('wc-product-gallery-lightbox');
    // add_theme_support('wc-product-gallery-slider');
    add_theme_support('html5', array('search-form'));
    register_nav_menus(array(
        'main-menu' => 'Main Menu',
    ));
    add_theme_support('customize-selective-refresh-widgets');
    add_filter('widget_text', 'do_shortcode');
    add_theme_support('custom-logo', array(
        'height' => 250,
        'width' => 250,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => array('site-title', 'site-description'),
    ));
}
add_action('after_setup_theme', 'corsivalab_setup');
function corsivalab_widgets()
{
    $corsivalab_sidebars = array(
        array(
            'name' => 'Default Sidebar',
            'id' => 'widget-sidebar-default',
        ),
        array(
            'name' => 'Woocommerce Sidebar',
            'id' => 'widget-sidebar-woocommerce',
        ),
        array(
            'name' => 'News Sidebar',
            'id' => 'widget-sidebar-news',
        ),
        array(
            'name' => 'Footer Column 1',
            'id' => 'widget-sidebar-footer1',
        ),
        array(
            'name' => 'Footer Column 2',
            'id' => 'widget-sidebar-footer2',
        ),
        array(
            'name' => 'Footer Column 3',
            'id' => 'widget-sidebar-footer3',
        ),
        array(
            'name' => 'Footer Column 4',
            'id' => 'widget-sidebar-footer4',
        ),
    );
    $defaults = array(
        'name' => 'Default Sidebar',
        'id' => 'widget-sidebar-default',
        'before_widget' => '<div class="widget-content">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>'
    );
    foreach ($corsivalab_sidebars as $sidebar) {
        $args = wp_parse_args($sidebar, $defaults);
        register_sidebar($args);
    }
}
add_action('widgets_init', 'corsivalab_widgets');
function corsivalab_scripts()
{
    $ver = rand();
    wp_enqueue_style('corsivalab-swiper-style', get_stylesheet_directory_uri() . '/assets/swiper-741/swiper-bundle.min.css', '', $ver);
    wp_enqueue_style('corsivalab-theme-style', get_stylesheet_directory_uri() . '/assets/scss/main.css', '', $ver);
    wp_enqueue_script('corsivalab-bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap-513/bootstrap.bundle.min.js', array('jquery'), $ver, true);
    wp_enqueue_script('corsivalab-main-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), $ver, true);
    wp_enqueue_script('corsivalab-swiper-min-js', get_stylesheet_directory_uri() . '/assets/swiper-741/swiper-bundle.min.js', array('jquery'), $ver, false);
}
add_action('wp_enqueue_scripts', 'corsivalab_scripts');
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
add_filter('big_image_size_threshold', '__return_false');
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('gutenberg_use_widgets_block_editor', '__return_false');
add_filter('wpcf7_autop_or_not', '__return_false');
add_filter( 'use_widgets_block_editor', '__return_true' );
require('typerocket/init.php');
//require('inc/corsivalab-shortcode.php');
require('inc/menu-navwalker.php');
//require('inc/corsivalab-field-product.php');
//require('inc/corsivalab-field-page.php');
// require('inc/custom-field-post.php');
//require('inc/corsivalab-register-post.php');
//require('inc/corsivalab-woocommerce.php');
//require('inc/ajax.php');
add_filter('tr_theme_options_page', function () {
    return get_template_directory() . '/inc/theme-options.php';
});
add_filter('tr_theme_options_name', function () {
    return 'corsivalab_options';
});
// get image
if (!function_exists('get_attachment')) {
    function get_attachment($attachment_id)
    {
        if ($attachment_id) {
            $attachment = get_post($attachment_id);
            return array(
                'alt' => (get_post_meta($attachment->ID, '_wp_attachment_image_alt', true)) ? get_post_meta($attachment->ID, '_wp_attachment_image_alt', true) : '',
                'caption' => ($attachment->post_excerpt != '') ? $attachment->post_excerpt : '',
                'description' => ($attachment->post_content != '') ? $attachment->post_content : '',
                'href' => (get_permalink($attachment->ID) != '') ? get_permalink($attachment->ID) : '',
                'src' => ($attachment->guid) ? $attachment->guid : '',
                'srcset' => (wp_get_attachment_image_srcset($attachment_id, 'post-thumbnail')) ? wp_get_attachment_image_srcset($attachment_id, 'post-thumbnail') : '',
                'title' => ($attachment->post_title != '') ? $attachment->post_title : ''
            );
        } else {
            return array(
                'alt' => '',
                'caption' => '',
                'description' => '',
                'href' => '',
                'src' => '',
                'srcset' => '',
                'title' => ''
            );
        }
    }
}
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
function disable_wp_responsive_images()
{
    return 1;
}
add_filter('max_srcset_image_width', 'disable_wp_responsive_images');
function wp_tsas_grid_column($grid = '')
{
    if ($grid == '2') {
        $grid_clmn = '6';
    } else if ($grid == '3') {
        $grid_clmn = '4';
    } else if ($grid == '4') {
        $grid_clmn = '3';
    } else if ($grid == '6') {
        $grid_clmn = '2';
    } else if ($grid == '1') {
        $grid_clmn = '12';
    } else {
        $grid_clmn = '12';
    }
    return $grid_clmn;
}
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
