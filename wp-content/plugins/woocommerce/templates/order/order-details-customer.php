<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */
defined('ABSPATH') || exit;
$show_shipping = !wc_ship_to_billing_address_only() && $order->needs_shipping_address();
?>
<section class="woocommerce-customer-details">
	<section class="woocommerce-columns-addresses">
		<div class="woocommerce-column--billing-address woocommerce-billing-fields mb-4">
			<h3 class="woocommerce-column__title"><?php esc_html_e('Billing Information:', 'woocommerce'); ?></h3>
			<div>
				<?php //echo wp_kses_post( $order->get_formatted_billing_address( esc_html__( 'N/A', 'woocommerce' ) ) ); 
				?>
				<?php if ($order->billing_last_name) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--name"><strong>Name:</strong> <?php echo $order->billing_last_name . ' ' . $order->billing_first_name; ?></div>
				<?php endif; ?>
				<?php if ($order->billing_address_1) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--address"><strong>Address:</strong> <?php echo $order->billing_address_1 . ' ' . $order->billing_address_2; ?></div>
				<?php endif; ?>
				<?php if ($order->billing_city) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--city"><strong>City:</strong> <?php echo $order->billing_city; ?></div>
				<?php endif; ?>
				<?php if ($order->billing_state) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--state"><strong>State:</strong> <?php echo $order->billing_state; ?></div>
				<?php endif; ?>
				<?php if ($order->billing_country) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--country"><strong>State:</strong> <?php echo $order->billing_country; ?></div>
				<?php endif; ?>
				<?php if ($order->billing_postcode) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--postcode"><strong>PostCode:</strong> <?php echo $order->billing_postcode; ?></div>
				<?php endif; ?>
				<?php if ($order->get_billing_phone()) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--phone1"><strong>Phone:</strong> <?php echo esc_html($order->get_billing_phone()); ?></div>
				<?php endif; ?>
				<?php if ($order->get_billing_email()) : ?>
					<div class="woocommerce-customer-details-item woocommerce-customer-details--email1"><strong>Email:</strong> <?php echo esc_html($order->get_billing_email()); ?></div>
				<?php endif; ?>
			</div>
		</div>
		<?php if ($show_shipping) : ?>
			<hr>
			<div class="woocommerce-column--shipping-address woocommerce-shipping-fields">
				<h3 class="woocommerce-column__title"><?php esc_html_e('Shipping Information:', 'woocommerce'); ?></h3>
				<div>
					<?php if ($order->shipping_last_name) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--name"><strong>Name:</strong> <?php echo $order->shipping_last_name . ' ' . $order->shipping_first_name; ?></div>
					<?php endif; ?>
					<?php if ($order->shipping_address_1) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--address"><strong>Address:</strong> <?php echo $order->shipping_address_1 . ' ' . $order->shipping_address_2; ?></div>
					<?php endif; ?>
					<?php if ($order->shipping_city) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--city"><strong>City:</strong> <?php echo $order->shipping_city; ?></div>
					<?php endif; ?>
					<?php if ($order->shipping_state) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--state"><strong>State:</strong> <?php echo $order->shipping_state; ?></div>
					<?php endif; ?>
					<?php if ($order->shipping_country) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--country"><strong>State:</strong> <?php echo $order->shipping_country; ?></div>
					<?php endif; ?>
					<?php if ($order->shipping_postcode) : ?>
						<div class="woocommerce-customer-details-item woocommerce-customer-details--postcode"><strong>PostCode:</strong> <?php echo $order->shipping_postcode; ?></div>
					<?php endif; ?>
					<?php //echo wp_kses_post($order->get_formatted_shipping_address(esc_html__('N/A', 'woocommerce'))); 
					?>
					<?php if ($order->get_shipping_phone()) : ?>
						<div class="woocommerce-customer-details--phone"><?php echo esc_html($order->get_shipping_phone()); ?></div>
					<?php endif; ?>
				</div>
			</div><!-- /.col-2 -->
		<?php endif; ?>
	</section><!-- /.col2-set -->
	<?php do_action('woocommerce_order_details_after_customer_details', $order); ?>
</section>