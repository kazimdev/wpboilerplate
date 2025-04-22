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
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_cart'); ?>

<div class="wpboilerplate-checkout-steps">
	<div class="cart-icon">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1 24C1 11.0213 11.5213 0.5 24.5 0.5C37.4787 0.5 48 11.0213 48 24C48 36.9787 37.4787 47.5 24.5 47.5C11.5213 47.5 1 36.9787 1 24Z" fill="#F4EEFF" />
			<path d="M1 24C1 11.0213 11.5213 0.5 24.5 0.5C37.4787 0.5 48 11.0213 48 24C48 36.9787 37.4787 47.5 24.5 47.5C11.5213 47.5 1 36.9787 1 24Z" stroke="#420885" />
			<path d="M30 27C30.663 27 31.2989 27.2634 31.7678 27.7322C32.2366 28.2011 32.5 28.837 32.5 29.5C32.5 30.163 32.2366 30.7989 31.7678 31.2678C31.2989 31.7366 30.663 32 30 32C29.337 32 28.7011 31.7366 28.2322 31.2678C27.7634 30.7989 27.5 30.163 27.5 29.5C27.5 28.837 27.7634 28.2011 28.2322 27.7322C28.7011 27.2634 29.337 27 30 27ZM30 27L33.5 20H18.5V31C18.5002 31.2107 18.5669 31.4159 18.6906 31.5864C18.8144 31.7569 18.9888 31.884 19.189 31.9495C19.3892 32.015 19.605 32.0156 19.8056 31.9513C20.0062 31.8869 20.1813 31.7608 20.306 31.591L24 26.5V26.555M30 27L22.9 26.253C22.1757 26.1769 21.4859 25.9045 20.9051 25.4651C20.3243 25.0258 19.8744 24.4362 19.604 23.76L16.751 16.63C16.677 16.4443 16.5491 16.2849 16.3836 16.1726C16.2182 16.0603 16.0229 16.0002 15.823 16H14.5" stroke="#420885" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Shopping Cart</p>
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
	<div class="checkout-icon">
		<svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M0.5 24C0.5 11.0213 11.0213 0.5 24 0.5C36.9787 0.5 47.5 11.0213 47.5 24C47.5 36.9787 36.9787 47.5 24 47.5C11.0213 47.5 0.5 36.9787 0.5 24Z" stroke="#AEBCCB" />
			<path d="M15 22H33M19 27H19.01M23 27H25M15 20C15 19.2044 15.3161 18.4413 15.8787 17.8787C16.4413 17.3161 17.2044 17 18 17H30C30.7956 17 31.5587 17.3161 32.1213 17.8787C32.6839 18.4413 33 19.2044 33 20V28C33 28.7956 32.6839 29.5587 32.1213 30.1213C31.5587 30.6839 30.7956 31 30 31H18C17.2044 31 16.4413 30.6839 15.8787 30.1213C15.3161 29.5587 15 28.7956 15 28V20Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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

	<div class="order-placed-icon">
		<svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M1 24C1 11.0213 11.5213 0.5 24.5 0.5C37.4787 0.5 48 11.0213 48 24C48 36.9787 37.4787 47.5 24.5 47.5C11.5213 47.5 1 36.9787 1 24Z" stroke="#AEBCCB" />
			<path d="M21.5 19H27.5M21.5 23H27.5M21.5 27H25.5M17.5 17C17.5 16.4696 17.7107 15.9609 18.0858 15.5858C18.4609 15.2107 18.9696 15 19.5 15H29.5C30.0304 15 30.5391 15.2107 30.9142 15.5858C31.2893 15.9609 31.5 16.4696 31.5 17V31C31.5 31.5304 31.2893 32.0391 30.9142 32.4142C30.5391 32.7893 30.0304 33 29.5 33H19.5C18.9696 33 18.4609 32.7893 18.0858 32.4142C17.7107 32.0391 17.5 31.5304 17.5 31V17Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
		</svg>
		<p>Complete Order</p>
	</div>
</div>

<form class="woocommerce-cart-form" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post">
	<div class="row">
		<div class="col-lg-8">
			<?php do_action('woocommerce_before_cart_table'); ?>

			<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
				<thead>
					<tr>
						<th class="product-thumbnail"><span class="screen-reader-text"><?php esc_html_e('Thumbnail image', 'woocommerce'); ?></span></th>
						<th class="product-name"><?php esc_html_e('Product', 'woocommerce'); ?></th>
						<th class="product-price"><?php esc_html_e('Price', 'woocommerce'); ?></th>
						<th class="product-quantity"><?php esc_html_e('Quantity', 'woocommerce'); ?></th>
						<th class="product-subtotal"><?php esc_html_e('Subtotal', 'woocommerce'); ?></th>
						<th class="product-remove"><span class="screen-reader-text"><?php esc_html_e('Remove item', 'woocommerce'); ?></span></th>
					</tr>
				</thead>
				<tbody>
					<?php

					do_action('woocommerce_before_cart_contents');
					$dispatch_now = 0;
					$dispatch_later = 0;

					foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
						$_product   = apply_filters('woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key);
						$product_id = apply_filters('woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key);

						/**
						 * Filter the product name.
						 *
						 * @since 2.1.0
						 * @param string $product_name Name of the product in the cart.
						 * @param array $cart_item The product in the cart.
						 * @param string $cart_item_key Key for the product in the cart.
						 */
						$product_name = apply_filters('woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key);

						if ($_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters('woocommerce_cart_item_visible', true, $cart_item, $cart_item_key)) {
							$product_permalink = apply_filters('woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink($cart_item) : '', $cart_item, $cart_item_key);

							// $badge_id = get_post_meta($product_id, '_yith_wcbm_badge_ids', true); // YITH badge ID

							// $badgeTitle  = get_the_title($badge_id);

							$dispatch_class = 'dispatch-now';

							$delivery_time = intval(get_post_meta($product_id, '_delivery_time', true)); // YITH badge ID

							if (empty($delivery_time) || $delivery_time <= 1) { // !empty($badgeTitle) && str_contains($badgeTitle, '1-2')
								if (!$dispatch_now) {
					?>
									<tr id="cart-dispatch-now" class="<?php echo $dispatch_class; ?> label">
										<th><?php echo 'Dispatch Now'; ?></th>
									</tr>
								<?php
								}
								$dispatch_now++;
							} else if (!empty($delivery_time) && $delivery_time > 1) {
								$dispatch_class = 'dispatch-later';

								if (!$dispatch_later) {
								?>

									<tr id="cart-dispatch-later" class="<?php echo $dispatch_class; ?> label">
										<th><?php echo 'Dispatch Later'; ?></th>
									</tr>
							<?php
								}
								$dispatch_later++;
							}
							?>

							<tr class="woocommerce-cart-form__cart-item <?php echo $dispatch_class . " " .  esc_attr(apply_filters('woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key)); ?>">
								<td class="product-thumbnail">
									<?php
									$thumbnail = apply_filters('woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key);

									if (! $product_permalink) {
										echo $thumbnail; // PHPCS: XSS ok.
									} else {
										printf('<a href="%s">%s</a>', esc_url($product_permalink), $thumbnail); // PHPCS: XSS ok.
									}
									?>
								</td>

								<td class="product-name" data-title="<?php esc_attr_e('Product', 'woocommerce'); ?>">
									<?php
									if (! $product_permalink) {
										echo wp_kses_post($product_name . '&nbsp;');
									} else {
										/**
										 * This filter is documented above.
										 *
										 * @since 2.1.0
										 */
										echo wp_kses_post(apply_filters('woocommerce_cart_item_name', sprintf('<a href="%s">%s</a>', esc_url($product_permalink), $_product->get_name()), $cart_item, $cart_item_key));
									}

									do_action('woocommerce_after_cart_item_name', $cart_item, $cart_item_key);

									// Meta data.
									echo wc_get_formatted_cart_item_data($cart_item); // PHPCS: XSS ok.

									// Backorder notification.
									if ($_product->backorders_require_notification() && $_product->is_on_backorder($cart_item['quantity'])) {
										echo wp_kses_post(apply_filters('woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__('Available on backorder', 'woocommerce') . '</p>', $product_id));
									}
									?>
								</td>

								<td class="product-price" data-title="<?php esc_attr_e('Price', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_price', WC()->cart->get_product_price($_product), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>

								<td class="product-quantity" data-title="<?php esc_attr_e('Quantity', 'woocommerce'); ?>">
									<?php
									if ($_product->is_sold_individually()) {
										$min_quantity = 1;
										$max_quantity = 1;
									} else {
										$min_quantity = 0;
										$max_quantity = $_product->get_max_purchase_quantity();
									}

									$product_quantity = woocommerce_quantity_input(
										array(
											'input_name'   => "cart[{$cart_item_key}][qty]",
											'input_value'  => $cart_item['quantity'],
											'max_value'    => $max_quantity,
											'min_value'    => $min_quantity,
											'product_name' => $product_name,
										),
										$_product,
										false
									);

									echo apply_filters('woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item); // PHPCS: XSS ok.
									?>
								</td>

								<td class="product-subtotal" data-title="<?php esc_attr_e('Subtotal', 'woocommerce'); ?>">
									<?php
									echo apply_filters('woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal($_product, $cart_item['quantity']), $cart_item, $cart_item_key); // PHPCS: XSS ok.
									?>
								</td>

								<td class="product-remove">
									<?php
									$remove_icon = '<svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5H17M7 9V15M11 9V15M2 5L3 17C3 17.5304 3.21071 18.0391 3.58579 18.4142C3.96086 18.7893 4.46957 19 5 19H13C13.5304 19 14.0391 18.7893 14.4142 18.4142C14.7893 18.0391 15 17.5304 15 17L16 5M6 5V2C6 1.73478 6.10536 1.48043 6.29289 1.29289C6.48043 1.10536 6.73478 1 7 1H11C11.2652 1 11.5196 1.10536 11.7071 1.29289C11.8946 1.48043 12 1.73478 12 2V5" stroke="#64748B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

									echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
										'woocommerce_cart_item_remove_link',
										sprintf(
											'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">%s</a>',
											esc_url(wc_get_cart_remove_url($cart_item_key)),
											/* translators: %s is the product name */
											esc_attr(sprintf(__(' Remove %s from cart', 'woocommerce'), wp_strip_all_tags($product_name))),
											esc_attr($product_id),
											esc_attr($_product->get_sku()),
											$remove_icon
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

					<?php do_action('woocommerce_after_cart_contents'); ?>

					<tr class="update-cart">
						<td class="actions">
							<button type="submit" class="button<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>" name="update_cart" value="<?php esc_attr_e('Update cart', 'woocommerce'); ?>"><?php esc_html_e('Update cart', 'woocommerce'); ?></button>

							<?php do_action('woocommerce_cart_actions'); ?>

							<?php wp_nonce_field('woocommerce-cart', 'woocommerce-cart-nonce'); ?>
						</td>
					</tr>
				</tbody>
			</table>
			<?php do_action('woocommerce_after_cart_table'); ?>
		</div>

		<div class="col-lg-4">
			<?php do_action('woocommerce_before_cart_collaterals'); ?>
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
		</div>
	</div>

	<?php
	$line_item_count = count(WC()->cart->get_cart());
	$items_count = WC()->cart->get_cart_contents_count();

	echo "<div class='cart-dispatch-counts'>";
	echo "<p> You have " . $line_item_count . " items in your basket. </p>";
	if (!empty($dispatch_now)) {
		echo "<p>" . $dispatch_now . "  will be <a href='#cart-dispatch-now'>dispatched now</a>. </p>";
	}

	if (!empty($dispatch_later)) {
		echo "<p>" . $dispatch_later . " will be <a href='#cart-dispatch-later'>dispatched later.</a> </p>";
	}

	echo "</div>";
	?>

</form>
<?php do_action('woocommerce_after_cart'); ?>