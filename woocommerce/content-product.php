<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if (! is_a($product, WC_Product::class) ||  ! $product->is_visible()) {
	return;
}

?>

<div <?php wc_product_class('product-card', $product); ?>>
	<div class="product-image">
		<?php if ($product->is_in_stock()) : ?>
			<span class="stock-status">In Stock</span>
		<?php else : ?>
			<span class="stock-status out-of-stock">Out of Stock</span>
		<?php endif; ?>
		<a href="<?php echo esc_url($product->get_permalink()); ?>">
			<img src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>"
				alt="<?php echo esc_attr($product->get_name()); ?>">
		</a>
	</div>
	<div class="product-info">
		<div class="product-title-price">
			<?php if ($product->is_in_stock()) : ?>
				<span class="stock-status">In Stock</span>
			<?php else : ?>
				<span class="stock-status out-of-stock">Out of Stock</span>
			<?php endif; ?>

			<h3 class="product-title">
				<a href="<?php echo esc_url($product->get_permalink()); ?>">
					<?php echo esc_html(wpboilerplate_truncate_text_smart($product->get_name(), 50)); ?>
				</a>
			</h3>

			<div class="product-price">
				<span class="sale-price"><?php echo $product->get_price_html(); ?></span>
			</div>
		</div>

		<?php if ($product->is_in_stock() && $product->is_type('simple')) : ?>
			<form class="add-to-cart-form" method="post"
				action="<?php echo esc_url(home_url('/?add-to-cart=' . $product->get_id())); ?>">
				<button type="button" class="add-to-cart-button ajax-add-to-cart"
					data-product_id="<?php echo esc_attr($product->get_id()); ?>">
					Add to Cart
				</button>
				<span class="added-message" style="display:none;">Added!</span>
			</form>
		<?php endif; ?>

		<?php if ($product->is_in_stock() && $product->is_type('variable')) : ?>
			<a href="<?php echo esc_url($product->get_permalink()); ?>" class="add-to-cart-button">
				Select Options
			</a>
		<?php endif; ?>
	</div>
</div>