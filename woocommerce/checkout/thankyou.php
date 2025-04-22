<?php

/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 *
 * @var WC_Order $order
 */

defined('ABSPATH') || exit;
?>

<div class="wpboilerplate-checkout-steps">
	<div class="cart-icon">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.5 24C0.5 10.7452 11.2452 0 24.5 0C37.7548 0 48.5 10.7452 48.5 24C48.5 37.2548 37.7548 48 24.5 48C11.2452 48 0.5 37.2548 0.5 24Z" fill="#5608AE" />
			<path d="M17.5 24L22.5 29L32.5 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Shopping Cart</p>
	</div>
	<div class="bar-icon">
		<svg width="153" height="4" viewBox="0 0 153 4" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2556_28712)">
				<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="#C6D2DB" />
				<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="#5608AE" />
			</g>
			<defs>
				<clipPath id="clip0_2556_28712">
					<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="white" />
				</clipPath>
			</defs>
		</svg>
	</div>
	<div class="checkout-icon">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.5 24C0.5 10.7452 11.2452 0 24.5 0C37.7548 0 48.5 10.7452 48.5 24C48.5 37.2548 37.7548 48 24.5 48C11.2452 48 0.5 37.2548 0.5 24Z" fill="#5608AE" />
			<path d="M17.5 24L22.5 29L32.5 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Checkout</p>
	</div>
	<div class="bar-icon">
		<svg width="153" height="4" viewBox="0 0 153 4" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2556_28712)">
				<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="#C6D2DB" />
				<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="#5608AE" />
			</g>
			<defs>
				<clipPath id="clip0_2556_28712">
					<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H150.5C151.605 0 152.5 0.895431 152.5 2C152.5 3.10457 151.605 4 150.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="white" />
				</clipPath>
			</defs>
		</svg>
	</div>

	<div class="order-placed-icon">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.5 24C0.5 10.7452 11.2452 0 24.5 0C37.7548 0 48.5 10.7452 48.5 24C48.5 37.2548 37.7548 48 24.5 48C11.2452 48 0.5 37.2548 0.5 24Z" fill="#5608AE" />
			<path d="M17.5 24L22.5 29L32.5 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Complete Order</p>
	</div>
</div>

<div class="woocommerce-order">

	<?php
	if ($order) :

		do_action('woocommerce_before_thankyou', $order->get_id());
	?>

		<?php if ($order->has_status('failed')) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e('Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'woocommerce'); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url($order->get_checkout_payment_url()); ?>" class="button pay"><?php esc_html_e('Pay', 'woocommerce'); ?></a>
				<?php if (is_user_logged_in()) : ?>
					<a href="<?php echo esc_url(wc_get_page_permalink('myaccount')); ?>" class="button pay"><?php esc_html_e('My account', 'woocommerce'); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<?php wc_get_template('checkout/order-received.php', array('order' => $order)); ?>

			<ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details">

				<li class="woocommerce-order-overview__order order">
					<?php esc_html_e('Order number:', 'woocommerce'); ?>
					<strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<li class="woocommerce-order-overview__date date">
					<?php esc_html_e('Date:', 'woocommerce'); ?>
					<strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
					<li class="woocommerce-order-overview__email email">
						<?php esc_html_e('Email:', 'woocommerce'); ?>
						<strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
								?></strong>
					</li>
				<?php endif; ?>

				<li class="woocommerce-order-overview__total total">
					<?php esc_html_e('Total:', 'woocommerce'); ?>
					<strong><?php echo $order->get_formatted_order_total(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?></strong>
				</li>

				<?php if ($order->get_payment_method_title()) : ?>
					<li class="woocommerce-order-overview__payment-method method">
						<?php esc_html_e('Payment method:', 'woocommerce'); ?>
						<strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
					</li>
				<?php endif; ?>

			</ul>

		<?php endif; ?>

		<?php do_action('woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id()); ?>
		<?php do_action('woocommerce_thankyou', $order->get_id()); ?>

	<?php else : ?>

		<?php wc_get_template('checkout/order-received.php', array('order' => false)); ?>

	<?php endif; ?>

</div>