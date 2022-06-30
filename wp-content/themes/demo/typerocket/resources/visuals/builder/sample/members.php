<?php
$currentPage = get_the_ID();
$args = array();
$args['post_type'] = 'member';
$args['posts_per_page'] = 12;
$args['orderby'] = 'title';
$args['order'] = 'ASC';
$args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;
if (isset($_GET['category'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'member_cat',
            'field' => 'term_id',
            'terms' => $_GET['category']
        )
    );
}
query_posts($args);
global $wp_query;
if (have_posts()) {
    echo get_template_part('template-parts/section', 'directors',
        array('title' => $data['title'],
            'description' => $data['description'],
            'taxonomy' => 'member_cat',
            'currentPage' => $currentPage,
            'showFilter' => 1
        ));
    wp_reset_query();
} ?>


<?php if (!empty($data['btn_txt'])) : ?>
    <div class="btn-wrap btn-left">
      <a class="btn-main" href="<?php echo $data['btn_link']; ?>"><?php echo $data['btn_txt']; ?></a>
    </div>
  <?php endif; ?>