<?php get_header();
$border_radius = tr_posts_field('border_radius');

if( tr_posts_field("use_builder") == '1') {
	if($border_radius == 'no') echo '<div class="no-image-border-radius">';
        tr_components_field('builder');
	if($border_radius == 'no') echo '</div>';
} else {
    get_template_part('standard');
}

get_footer();