<?php
$post_type_input = 'portfolios';
$taxonomy_input = 'category_portfolio';
$post_number_input = 2;
$cat_id = 0;
?>
<div class="section section-directors">
    <div class="container">
        <div class="select-category" data-post_number="<?php echo $post_number_input; ?>" data-post_type="<?php echo $post_type_input; ?>" data-cat="<?php echo $taxonomy_input; ?>">
            <?php
            $current_category = get_queried_object();
            $terms = wp_dropdown_categories(array(
                'taxonomy' => $taxonomy_input,
                'hierarchical' => 1,
                'show_option_all' => "Categories",
                'option_none_value' => "",
                'name' => $post_type_input,
                'id' => 'category',
                // 'value_field' => 'slug',
                'value_field' => 'id',
                'selected' => $post_type_input,
                'show_count'       => 1,
            ));
            ?>
        </div>
        <div class="directors">
            <div class="directors-list">
                <div class="row row-posts-list">
                    <?php
                    $args = array('post_type' => $post_type_input, 'posts_per_page' => $post_number_input, 'post_status' => 'publish');
                    $getposts = new WP_query($args);
                    while ($getposts->have_posts()) : $getposts->the_post();
                        echo get_template_part('template-parts/content-portfolios');
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php //if ($wp_query->max_num_pages != get_query_var('paged')) { 
                ?>
                <div class="ajax-pagination btn-load-more-wrap btn-wrap">
                    <?php $data_loadmore = array(
                        'post_type' => $post_type_input,
                        'taxonomy' => $taxonomy_input,
                        'post_number' => $post_number_input,
                        'cat' => $cat_id,
                    );
                    echo get_template_part('template-parts/button', 'load-more', $data_loadmore); ?>
                </div>
                <?php //} 
                ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
<script>
    jQuery(document).ready(function($) {
        $(".select-category").on("change", "select", function(e) {
            e.preventDefault();
            var data_cat_id = $(this).val();
            var post_type = $(this).parent().attr('data-post_type');
            var post_number = $(this).parent().attr('data-post_number');
            var cat = $(this).parent().attr('data-cat');
            // console.log(data_cat_id);
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                dataType: "json",
                // 					timeout: 30000,
                data: {
                    action: "select_category", //Tên action
                    post_type: post_type,
                    post_number: post_number,
                    cat: cat,
                    cat_id: data_cat_id,
                    nonce: '<?php echo wp_create_nonce("verify-select_category-string"); ?>',
                },
                context: this,
                beforeSend: function(xhr) {
                    var grid_section = $('.row-posts-list');
                    grid_section.parent().find('.btn-load-more-wrap').empty();
                    grid_section.empty();
                    // this.addClass('loading-ajax');
                    // this.addClass('disabled').attr("disabled", true);
                    canBeLoaded = false;
                },
                success: function(response) {
                    var grid_section = $('.row-posts-list');
                    if (response.success) {
                        if (response.data) {
                            grid_section.append(response.data['content']);
                            grid_section.parent().find('.btn-load-more-wrap').append(response.data['btn']);
                            
                        }
                    }
                },
                // complete: function() {
                // 	$('.progress').hide();
                // },
                failure: function() {
                    alert("Ajax request failed!!!");
                },
                error: function(xmlhttprequest, textstatus, message) {
                    if (textstatus === "timeout") {
                        parent.find('.load-result').html('<div class="load-result-inner">Chậm quá. Vui lòng thử lại sau</div>');
                    }
                }
            });
        });

        $(".btn-load-more-wrap").on("click", ".btn-load-more", function(e) {
            e.preventDefault();
            var post_number = $(this).attr('data-post_number');
            var post_type = $(this).attr('data-post_type');
            var paged = $(this).attr('data-paged');
            var cat = $(this).attr('data-cat');
            var cat_id = $(this).attr('data-cat_id');
            $.ajax({
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                type: "POST",
                dataType: "json",
                // 					timeout: 30000,
                data: {
                    action: "load_more_posts", //Tên action
                    post_number: post_number,
                    post_type: post_type,
                    paged: paged,
                    cat: cat,
                    cat_id: cat_id,
                    nonce: '<?php echo wp_create_nonce("verify-load_more_posts-string"); ?>',
                },
                context: this,
                beforeSend: function(xhr) {
                    $(this).addClass('loading-ajax');
                    $(this).addClass('disabled').attr("disabled", true);
                    canBeLoaded = false;
                },
                success: function(response) {
                    $(this).removeClass('disabled').attr("disabled", false);
                    $(this).removeClass('loading-ajax');
                    var newpaged = $(this).attr('data-paged');
                    $(this).attr('data-paged', ++newpaged);
                    var grid_section = $('.row-posts-list');
                    if (response.success) {
                        //btn.html('Đang thử lại <i class="fas fa-sync fa-spin ml-5"></i>');
                        //btn.addClass('disabled').attr("disabled", true);
                        if (response.data) {
                            grid_section.append(response.data);
                        } else {
                            $(this).remove();
                        }
                    }
                },
                // complete: function() {
                // 	$('.progress').hide();
                // },
                failure: function() {
                    alert("Ajax request failed!!!");
                },
                error: function(xmlhttprequest, textstatus, message) {
                    if (textstatus === "timeout") {
                        parent.find('.load-result').html('<div class="load-result-inner">Chậm quá. Vui lòng thử lại sau</div>');
                    }
                }
            });
        });


    });
</script>