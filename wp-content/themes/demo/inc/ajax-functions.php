<?php
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts_callback');
add_action('wp_ajax_load_more_posts', 'load_more_posts_callback');
function load_more_posts_callback()
{
    check_ajax_referer('verify-load_more_posts-string', 'nonce');
    $post_number = sanitize_text_field($_POST['post_number']);
    $post_type = sanitize_text_field($_POST['post_type']);
    $paged = sanitize_text_field($_POST['paged']);
    $cat = sanitize_text_field($_POST['cat']);
    $cat_id = sanitize_text_field($_POST['cat_id']);
    
    $args = array('post_status' => 'publish');
    $args['post_type'] = $post_type;
    $args['posts_per_page'] = $post_number;
    $args['paged'] = $paged + 1;
    if ($cat_id == 0) {
    } else {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category_portfolio',
                'fields' => 'term_id',
                'terms' => $cat_id
            )
        );
    }
    $getposts = new WP_query($args);
    ob_start();
    while ($getposts->have_posts()) : $getposts->the_post();
        echo get_template_part('template-parts/content-portfolios');
    endwhile;
    wp_reset_postdata();
    $result = ob_get_clean();
    wp_send_json_success($result);
    wp_die();
}

function load_template_part($template_name, $part_name=null, $data=null) {
    ob_start();
    get_template_part($template_name, $part_name, $data);
    $var = ob_get_contents();
    ob_end_clean();
    return $var;
}


add_action('wp_ajax_select_category', 'select_category_callback');
add_action('wp_ajax_nopriv_lselect_category', 'select_category_callback');
function select_category_callback()
{
    $cat_id = $_POST['cat_id'];
    $cat = $_POST['cat'];
    $post_type = $_POST['post_type'];
    $post_number = $_POST['post_number'];
    $result = array();
    $content_str = '';

    $args = array('post_status' => 'publish');
    $args['post_type'] = $post_type;
    $args['posts_per_page'] = $post_number;


    if ($cat_id == 0) {
    } else {
        $args['tax_query'] = array(
            array(
                'taxonomy' => $cat,
                'fields' => 'term_id',
                'terms' => $cat_id
            )
        );
    }



    $getposts = new WP_query($args);
    while ($getposts->have_posts()) : $getposts->the_post();
        $content_str .= load_template_part('template-parts/content-portfolios');
    endwhile;
    wp_reset_postdata();

    $data_loadmore = array(
        'post_type' => $post_type,
        'taxonomy' => $cat,
        'post_number' => $post_number,
        'cat' => $cat_id,
    );
    $btn_str = load_template_part('template-parts/button', 'load-more', $data_loadmore);
    // $btn_str = json_decode($btn_str, true);
    $result['btn'] = $btn_str;
    $result['content'] = $content_str;
    // $result = json_encode(
    //     array(
    //         "btn" => $btn_str, 
    //         "content" => $content_str
    //         )
    //     );
    wp_send_json_success($result);
    wp_die();

}