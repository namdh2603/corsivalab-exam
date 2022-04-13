<?php
function load_more_posts()
{
    $_paged = $_POST['_paged'];
    $response = '';
    $args['post_type'] = $_POST['_post_type'];
    $args['posts_per_page'] = $_POST['_posts_per_page'];
    $args['paged'] = $_paged + 1;
    if (isset($_POST['_data_cat_id']) && $_POST['_data_cat_id'] != 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $_POST['_data_cat'],
                'fields' => 'term_id',
                'terms' => $_POST['_data_cat_id']
            )
        );
    }
    query_posts($args);
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            if ($args['post_type'] == 'director' || $args['post_type'] == 'member') {
                $response .= get_template_part('template-parts/content', 'director');
            } else if ($args['post_type'] == 'licensee') {
                $response .= get_template_part('template-parts/content', 'licensee');
            } else if ($args['post_type'] == 'event') {
                $response .= get_template_part('template-parts/content', 'event');
            } else if ($args['post_type'] == 'post') {
                $response .= get_template_part('template-parts/content', 'news');
            }
        }
        wp_reset_query();
    } else {
        $response = 'Nothing to Show';
    }
    echo $response;
    exit;
}

add_action('wp_ajax_load_more_posts', 'load_more_posts');
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

function update_load_more_button()
{
    $_paged = $_POST['_paged'];
    $response = '';
    $args['post_type'] = $_POST['_post_type'];
    $args['posts_per_page'] = $_POST['_posts_per_page'];
    $args['paged'] = $_paged + 1;
    if (isset($_POST['_data_cat_id']) && $_POST['_data_cat_id'] != 0) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $_POST['_data_cat'],
                'fields' => 'term_id',
                'terms' => $_POST['_data_cat_id']
            )
        );
    }
    query_posts($args);
    global $wp_query;
    if ($wp_query->max_num_pages != get_query_var('paged')) {
        $response .= get_template_part('template-parts/load-more', 'button', array('dataCat' => $_POST['_data_cat'], 'dataCatID' => $_POST['_data_cat_id']));
    } else {
        $response = 'Nothing to Show';
    }
    echo $response;
    exit;
}

add_action('wp_ajax_update_load_more_button', 'update_load_more_button');
add_action('wp_ajax_nopriv_update_load_more_button', 'update_load_more_button');

function quick_view_director()
{
    $id = $_POST['id'];
    $response = '';
    $args['post_type'] = $_POST['post_type'];
    $args['post__in'] = array($id);
    $args['posts_per_page'] = 1;
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $response .= get_template_part('template-parts/content', 'quick-view-director');
        }
        wp_reset_postdata();
    } else {
        $response = 'Nothing to Show';
    }
    echo $response;
    exit;
}

add_action('wp_ajax_quick_view_director', 'quick_view_director');
add_action('wp_ajax_nopriv_quick_view_director', 'quick_view_director');