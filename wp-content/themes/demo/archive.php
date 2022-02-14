<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

$description = get_the_archive_description();
?>

<?php if ( have_posts() ) : ?>

	<header class="page-header alignwide">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
		<?php if ( $description ) : ?>
			<div class="archive-description"><?php echo wp_kses_post( wpautop( $description ) ); ?></div>
		<?php endif; ?>
	</header><!-- .page-header -->


	<?php while ( have_posts() ) : ?>
		<?php the_post(); ?>
		<?php get_template_part( 'template-parts/content/content', get_theme_mod( 'display_excerpt_or_full_post', 'excerpt' ) ); ?>
	<?php endwhile; ?>


<?php else : ?>
	<?php get_template_part( 'template-parts/content/content-none' ); ?>
<?php endif; ?>
<div class="default-section feature-list-section" style="background-color: #F3F8EF">
    <div class="container">
        <div class="feature-list-inner">
            <div class="row row-eq-height">
                <div class="col-6 col-lg-4">
                    <div class="feature-item text-left">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="feature-icon">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2021/11/organic-boxes.svg" alt="" title="organic-boxes">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="feature-info">
                                    <div class="name">Organic Boxes</div>
                                    <div class="address">Wide variety of Fresh <br> Produce and Dried Goods</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="feature-item text-left">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="feature-icon">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2021/11/corporate.svg" alt="" title="corporate">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="feature-info">
                                    <div class="name">Corporate Sales</div>
                                    <div class="address">Do email your enquiry to: <br> shop@organic basket.com</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4">
                    <div class="feature-item text-left">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <div class="feature-icon">
                                    <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2021/11/delivery.svg" alt="" title="delivery">
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="feature-info">
                                    <div class="name">Free Delivery</div>
                                    <div class="address">Min of $60 spend. <br> Next day delivery in 24h</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
