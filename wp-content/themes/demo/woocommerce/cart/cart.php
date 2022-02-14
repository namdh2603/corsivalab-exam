<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */
defined('ABSPATH') || exit;
?>
<div class="container">
<section class="cart-section">
		<?php do_action('woocommerce_before_cart'); ?>
		<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
			<?php do_action('woocommerce_before_cart_table'); ?>
			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
					<tr>
						<th class="product-name"><?php esc_html_e('PRODUCT NAME:', 'woocommerce'); ?></th>
						<th class="product-quantity"><?php esc_html_e('QUANTITY:', 'woocommerce'); ?></th>
						<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
						<th class="product-subtotal"><?php esc_html_e('Total', 'woocommerce'); ?></th>
						<th class="product-remove">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					<?php do_action('woocommerce_before_cart_contents'); ?>
					<?php
					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);
						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
							$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);
					?>
							<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
								<td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
									<div class="product-item">
										<div class="p-row">
											<div class="product-thumb">
												<?php echo $_product->get_image('full'); ?>
											</div>
											<div class="p-item">
												<h4>
													<?php
													if (!$product_permalink) {
														echo wp_kses_post(apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key) . '&nbsp;');
													} else {
														echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a class="title" href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
													}
													do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);
													// Meta data.
													echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.
													// Backorder notification.
													if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
														echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
													}
													?>
												</h4>
												<?php if($_product->get_sku()): ?><div class="sku">SKU: <?php echo $_product->get_sku(); ?></div><?php endif; ?>
												<?php 
													$data_berocket_brand = get_the_term_list( $_product->get_id(), 'berocket_brand', '', ', ' );
													if($data_berocket_brand): ?><div class="brand">Brand: <?php echo get_the_term_list( $_product->get_id(), 'berocket_brand', '', ', ' ); ?></div><?php endif; ?>
											</div>
										</div>
									</div>
								</td>
								<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
									<?php
									if ($_product->is_sold_individually()) {
										$product_quantity = sprintf('1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key);
									} else {
										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '0',
												'product_name' => $_product->get_name(),
											),
											$_product,
											false
										);
									}
									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									?>
								</td>
								<td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>
								<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>
								<td class="product-remove">
									<?php
									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">'.file_get_contents(get_stylesheet_directory_uri() . '/assets/icons/cross.svg').'</a>',
											esc_url(wc_get_cart_remove_url($cart_item_key)),
											esc_html__('Remove this item', 'woocommerce'),
											esc_attr($product_id),
											esc_attr($_product->get_sku())
										),
										$cart_item_key
									);
									?>
								</td>
							</tr>
					<?php
						}
					}
					?>
					<?php do_action('woocommerce_cart_contents'); ?>
					<tr>
						<td colspan="1" class="actions">
							<?php do_action('woocommerce_cart_actions'); ?>
							<button type="submit" class="button update-cart" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>
						</td>
						<td colspan="4" class="actions-coupon">
							<?php if (wc_coupons_enabled()) { ?>
								<div class="coupon">
									<input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Discount Code" />
									<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e('Apply coupon', 'woocommerce'); ?>">
										<?php esc_attr_e('APPLY DISCOUNT', 'woocommerce'); ?>
									</button>
									<?php do_action('woocommerce_cart_coupon'); ?>
								</div>
							<?php } ?>
							<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
						</td>
					</tr>
					<?php do_action('woocommerce_after_cart_contents'); ?>
				</tbody>
			</table>
			<?php do_action('woocommerce_after_cart_table'); ?>
		</form>
		<?php do_action('woocommerce_before_cart_collaterals'); ?>

<?php

 $choose_product_upsell =  tr_options_field('corsivalab_options.choose_product_upsell');
if ($choose_product_upsell) :
?>
<div class="default-section product-bestselling-section pb-0">
        <div class="title-section">
            <h2>You may like these as well</h2>
        </div>
                <div class="product-bestselling-inner woocommerce">
                    <?php
                    $args_query = array(
                        'post_type' => 'product',
                        'post_status' => 'publish',
                        'posts_per_page' => 4,
						'post__in' => $choose_product_upsell,
						'orderby' => 'rand'
                    );
                    $product_query = new WP_Query($args_query);
                    if ($product_query->have_posts()) {
                        echo '<div class="product-bestselling-list"><div class="row">';
                        while ($product_query->have_posts()) {
                            $product_query->the_post();
                            global $product;
                            wc_get_template_part('content-product');
                        }
                        wp_reset_postdata();
                        echo '</div></div>';
                    }
                    ?>
                </div>
</div>
<?php endif; ?>
	
	
		<div class="cart-collaterals">
			<?php
			/**
			 * Cart collaterals hook.
			 *
			 * @hooked woocommerce_cross_sell_display
			 * @hooked woocommerce_cart_totals - 10
			 */
			do_action('woocommerce_cart_collaterals');
			?>
		</div>
</section>
<?php do_action('woocommerce_after_cart'); ?>
	</div>

