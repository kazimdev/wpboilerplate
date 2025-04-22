<?php

/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;

if (! $product->is_purchasable()) {
	return;
}

echo wc_get_stock_html($product); // WPCS: XSS ok.

$buy_now_icon = WPBOILERPLATE_ASSETS . '/icons/buy-now.svg';

$cart_icon = WPBOILERPLATE_ASSETS . '/icons/cart-icon.svg';

if (isset($_POST['wpboilerplate_buy_now'])) {
	wp_redirect(wc_get_checkout_url());
	exit;
}

if ($product->is_in_stock()) : ?>

	<?php do_action('woocommerce_before_add_to_cart_form'); ?>

	<form class="cart" action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>

		<?php
		do_action('woocommerce_before_add_to_cart_quantity');

		echo '<div class="quantity-box"> <span class="qty_label">Select Quantity:</span>';

		echo '<div class="input-wrapper">';
		echo '<span class="decrease_qty">-</span>';

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters('woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product),
				'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
				'input_value' => isset($_POST['quantity']) ? wc_stock_amount(wp_unslash($_POST['quantity'])) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		echo '<span class="increase_qty">+</span>';

		echo "</div>";
		echo "</div>";

		do_action('woocommerce_after_add_to_cart_quantity');
		?>

		<div class="wpboilerplate-add-to-cart">
			<button type="submit" name="wpboilerplate_buy_now" value="buy-now" data-product_id="<?php echo esc_attr($product->get_id()); ?>" class="button single_add_to_cart_button add-to-cart-button buy-now alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"> <img src="<?php echo $buy_now_icon; ?>"> Buy Now </button>

			<button type="submit" data-product_id="<?php echo esc_attr($product->get_id()); ?>" class="single_add_to_cart_button add-to-cart-button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"> <img src="<?php echo $cart_icon; ?>"> <?php echo esc_html($product->single_add_to_cart_text()); ?> </button>
		</div>

		<input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
		<input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />

		<?php do_action('woocommerce_after_add_to_cart_button'); ?>
	</form>

	<?php do_action('woocommerce_after_add_to_cart_form'); ?>

<?php endif; ?>