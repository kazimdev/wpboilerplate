<?php

/**
 * Description tab
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/description.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.0.0
 */

defined('ABSPATH') || exit;

global $post;

$heading = apply_filters('woocommerce_delivery_return_heading', __('Delivery & Returns', 'woocommerce'));

if ($heading) :
	echo '<h2> ' . esc_html($heading) . ' </h2>';
endif;

// Get the custom field values
$specifications = get_post_meta($post->ID, '_product_specifications', true);
$delivery_returns = get_post_meta($post->ID, '_delivery_returns', true);

// Display Delivery & Returns Section
if ($delivery_returns) {
	echo '<div class="product-delivery-returns">';
	echo wpautop($delivery_returns);
	echo '</div>';
}
