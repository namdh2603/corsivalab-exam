<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */
defined('ABSPATH') || exit;
get_header('shop'); ?>
<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>
<!-- <header class="woocommerce-products-header">
<?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
		<h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
	<?php endif; ?>
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//    do_action('woocommerce_archive_description');
	?>
</header> -->
<section class="banner">
	<div class="container">
		<div class="banner__content">
			<div class="banner__content--image">
				<img src="<?= get_template_directory_uri() ?>/assets/images/shop/Group1122.jpg" alt="">
			</div>
			<div class="banner__content--title">
				<h2 class="title__banner">All Activities</h2>
			</div>
		</div>
	</div>
</section>
<section class="shop__activities mt-60">
	<?php
	$args = array(
		'type' => 'product',
		'child_of' => 0,
		'parent' => '',
		'taxonomy' => 'product_cat',
	);
	$categories = get_categories($args);
	?>
	<div class="container">
		<div class="shop__activities--all">
			<?php $active = '';
			$shop_page_url = get_permalink(wc_get_page_id('shop'));
			if (is_shop()) {
				$active = 'active';
			} ?>
			<div class="shop__activities--item <?php echo $active; ?>">
				<div class="item__content">
					<a href="<?php echo $shop_page_url; ?>">
						<div class="icon">
							<img src="<?= get_template_directory_uri() ?>/assets/images/icons/Group1124.png" alt="">
						</div>
						<h6>All activities</h6>
					</a>
				</div>
			</div>
			<?php
			foreach ($categories as $category) :
			?>
				<div class="shop__activities--item">
					<div class="item__content">
						<a href="<?= get_term_link($category->term_id); ?>">
							<?php
							$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
							?>
							<?php if ($thumbnail_id) : ?>
								<div class="icon">
									<img src="<?= wp_get_attachment_url($thumbnail_id); ?>" alt="">
								</div>
							<?php endif; ?>
							<h6><?php echo $category->name; ?></h6>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<section class="shop__main mt-120 py-5">
	<div class="container">
		<?php
		if (woocommerce_product_loop()) { ?>
			<div class="shop__main--sort">
				<?php
				/**
				 * Hook: woocommerce_before_shop_loop.
				 *
				 * @hooked woocommerce_output_all_notices - 10
				 * @hooked woocommerce_result_count - 20
				 * @hooked woocommerce_catalog_ordering - 30
				 */
				do_action('woocommerce_before_shop_loop');
				?>
			</div>
		<?php
			woocommerce_product_loop_start();
			if (wc_get_loop_prop('total')) {
				while (have_posts()) {
					the_post();
					/**
					 * Hook: woocommerce_shop_loop.
					 */
					do_action('woocommerce_shop_loop');
					wc_get_template_part('content', 'product');
				}
			}
			woocommerce_product_loop_end();
			/**
			 * Hook: woocommerce_after_shop_loop.
			 *
			 * @hooked woocommerce_pagination - 10
			 */
			do_action('woocommerce_after_shop_loop');
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action('woocommerce_no_products_found');
		}
		/**
		 * Hook: woocommerce_after_main_content.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		//do_action( 'woocommerce_after_main_content' );
		?>
	</div>
</section>
<?php get_footer('shop'); ?>