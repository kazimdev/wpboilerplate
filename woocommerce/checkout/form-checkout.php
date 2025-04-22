<?php

/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

if (! defined('ABSPATH')) {
	exit;
}

do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in()) {
	echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
	return;
}

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
		<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.5 24C0.5 11.0213 11.0213 0.5 24 0.5C36.9787 0.5 47.5 11.0213 47.5 24C47.5 36.9787 36.9787 47.5 24 47.5C11.0213 47.5 0.5 36.9787 0.5 24Z" fill="#F4EEFF" />
			<path d="M0.5 24C0.5 11.0213 11.0213 0.5 24 0.5C36.9787 0.5 47.5 11.0213 47.5 24C47.5 36.9787 36.9787 47.5 24 47.5C11.0213 47.5 0.5 36.9787 0.5 24Z" stroke="#420885" />
			<path d="M15 22H33M19 27H19.01M23 27H25M15 20C15 19.2044 15.3161 18.4413 15.8787 17.8787C16.4413 17.3161 17.2044 17 18 17H30C30.7956 17 31.5587 17.3161 32.1213 17.8787C32.6839 18.4413 33 19.2044 33 20V28C33 28.7956 32.6839 29.5587 32.1213 30.1213C31.5587 30.6839 30.7956 31 30 31H18C17.2044 31 16.4413 30.6839 15.8787 30.1213C15.3161 29.5587 15 28.7956 15 28V20Z" stroke="#420885" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Checkout</p>
	</div>
	<div class="bar-icon">
		<svg width="152" height="4" viewBox="0 0 152 4" fill="none" xmlns="http://www.w3.org/2000/svg">
			<g clip-path="url(#clip0_2539_6006)">
				<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H149.5C150.605 0 151.5 0.895431 151.5 2C151.5 3.10457 150.605 4 149.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="#C6D2DB" />
			</g>
			<defs>
				<clipPath id="clip0_2539_6006">
					<path d="M0.5 2C0.5 0.895431 1.39543 0 2.5 0H149.5C150.605 0 151.5 0.895431 151.5 2C151.5 3.10457 150.605 4 149.5 4H2.5C1.39543 4 0.5 3.10457 0.5 2Z" fill="white" />
				</clipPath>
			</defs>
		</svg>
	</div>

	<div class="order-placed">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1 24C1 11.0213 11.5213 0.5 24.5 0.5C37.4787 0.5 48 11.0213 48 24C48 36.9787 37.4787 47.5 24.5 47.5C11.5213 47.5 1 36.9787 1 24Z" stroke="#AEBCCB" />
			<path d="M21.5 19H27.5M21.5 23H27.5M21.5 27H25.5M17.5 17C17.5 16.4696 17.7107 15.9609 18.0858 15.5858C18.4609 15.2107 18.9696 15 19.5 15H29.5C30.0304 15 30.5391 15.2107 30.9142 15.5858C31.2893 15.9609 31.5 16.4696 31.5 17V31C31.5 31.5304 31.2893 32.0391 30.9142 32.4142C30.5391 32.7893 30.0304 33 29.5 33H19.5C18.9696 33 18.4609 32.7893 18.0858 32.4142C17.7107 32.0391 17.5 31.5304 17.5 31V17Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Complete Order</p>
	</div>
</div>


<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data" aria-label="<?php echo esc_attr__('Checkout', 'woocommerce'); ?>">

	<?php if ($checkout->get_checkout_fields()) : ?>

		<?php do_action('woocommerce_checkout_before_customer_details'); ?>

		<div class="col2-set" id="customer_details">
			<div class="checkout-billing">
				<?php do_action('woocommerce_checkout_billing'); ?>
			</div>

			<div class="checkout-shipping">
				<?php do_action('woocommerce_checkout_shipping'); ?>
			</div>
		</div>

		<?php do_action('woocommerce_checkout_after_customer_details'); ?>

	<?php endif; ?>

	<div class="wpboilerplate-order-review">
		<?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

		<h3 id="order_review_heading"><?php esc_html_e('Your order', 'woocommerce'); ?></h3>

		<?php do_action('woocommerce_checkout_before_order_review'); ?>

		<div id="order_review" class="woocommerce-checkout-review-order">
			<?php do_action('woocommerce_checkout_order_review'); ?>
		</div>

		<?php do_action('woocommerce_checkout_after_order_review'); ?>
	</div>

</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>