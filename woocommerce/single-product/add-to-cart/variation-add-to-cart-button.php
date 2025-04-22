<?php

/**
 * Single variation cart button
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined('ABSPATH') || exit;

global $product;


$buy_now_icon = WPBOILERPLATE_ASSETS . '/icons/buy-now.svg';

$cart_icon = WPBOILERPLATE_ASSETS . '/icons/cart-icon.svg';
?>
<hr>
<div class="woocommerce-variation-add-to-cart variations_button">
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
		<button type="submit" name="wpboilerplate_variation_buy_now" value="variation_buy_now" class="single_add_to_cart_button button buy-now  alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"> <img src="<?php echo $buy_now_icon; ?>"> Buy Now </button>

		<button type="submit" class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"> <img src="<?php echo $cart_icon; ?>"> <?php echo esc_html($product->single_add_to_cart_text()); ?></button>
	</div>

	<?php do_action('woocommerce_after_add_to_cart_button'); ?>

	<input type="hidden" name="add-to-cart" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="product_id" value="<?php echo absint($product->get_id()); ?>" />
	<input type="hidden" name="variation_id" class="variation_id" value="0" />
</div>