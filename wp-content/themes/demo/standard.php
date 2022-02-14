<div class="container">
    <div class="page-content">
        <?php while (have_posts()) : the_post();
                        the_content();
                endwhile; ?>
    </div>
</div>