<?php

/**
 * Theme functions & definitations
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package wpboilerplate
 */

/**
 * Define Theme Folder Path & URL Constant
 * @package wpboilerplate
 * @since 2.0.1
 */

define('WPBOILERPLATE_THEME_ROOT', get_template_directory());
define('WPBOILERPLATE_THEME_ROOT_URL', get_template_directory_uri());
define('WPBOILERPLATE_INC', WPBOILERPLATE_THEME_ROOT . '/inc');
define('WPBOILERPLATE_THEME_SETTINGS', WPBOILERPLATE_INC . '/theme-settings');
define('WPBOILERPLATE_THEME_SETTINGS_IMAGES', WPBOILERPLATE_THEME_ROOT_URL . '/inc/theme-settings/images');
define('WPBOILERPLATE_TGMA', WPBOILERPLATE_INC . '/plugins/tgma');
define('WPBOILERPLATE_DYNAMIC_STYLESHEETS', WPBOILERPLATE_INC . '/theme-stylesheets');
define('WPBOILERPLATE_CSS', WPBOILERPLATE_THEME_ROOT_URL . '/assets/css');
define('WPBOILERPLATE_JS', WPBOILERPLATE_THEME_ROOT_URL . '/assets/js');
define('WPBOILERPLATE_ASSETS', WPBOILERPLATE_THEME_ROOT_URL . '/assets');
define('WPBOILERPLATE_DEV', true);


/**
 * Theme Initial File
 * @package wpboilerplate
 * @since 1.0.0
 */
if (file_exists(WPBOILERPLATE_INC . '/theme-init.php')) {
	require_once WPBOILERPLATE_INC . '/theme-init.php';
}


/**
 * Codester Framework Functions
 * @package wpboilerplate
 * @since 1.0.0
 */
if (file_exists(WPBOILERPLATE_INC . '/theme-cs-function.php')) {
	require_once WPBOILERPLATE_INC . '/theme-cs-function.php';
}


/**
 * Theme Helpers Functions
 * @package wpboilerplate
 * @since 1.0.0
 */
if (file_exists(WPBOILERPLATE_INC . '/theme-helper-functions.php')) {

	require_once WPBOILERPLATE_INC . '/theme-helper-functions.php';
	if (!function_exists('wpboilerplate')) {
		function wpboilerplate()
		{
			return class_exists('WPBoilerplate_Helper_Functions') ? new WPBoilerplate_Helper_Functions() : false;
		}
	}
}
/**
 * Nav menu fallback function
 * @since 1.0.0
 */
if (is_user_logged_in()) {
	function wpboilerplate_theme_fallback_menu()
	{
		get_template_part('template-parts/default', 'menu');
	}
}
add_filter('big_image_size_threshold', '__return_false');

function add_custom_product_data_fields()
{
	// Add Delivery & Returns Field
	echo '<div class="options_group">';
	echo '<h2>' . __('Delivery & Returns', 'your-text-domain') . '</h2>';
	wp_editor(
		get_post_meta(get_the_ID(), '_delivery_returns', true),
		'_product_delivery_returns',
		array(
			'textarea_name' => '_delivery_returns',
			'textarea_rows' => 10,
			'media_buttons' => true,
		)
	);
	echo '</div>';
}
add_action('woocommerce_product_options_general_product_data', 'add_custom_product_data_fields');

function save_custom_product_data_fields($post_id)
{
	// Save Delivery & Returns Field
	if (isset($_POST['_delivery_returns'])) {
		update_post_meta($post_id, '_delivery_returns', wp_kses_post($_POST['_delivery_returns']));
	}
}
add_action('woocommerce_process_product_meta', 'save_custom_product_data_fields');

if (! function_exists('woocommerce_product_delivery_returns_tab')) {
	function woocommerce_product_delivery_returns_tab()
	{
		wc_get_template('single-product/tabs/delivery-return.php');
	}
}

// Product Delivery Time
add_action('woocommerce_product_options_general_product_data', 'add_delivery_time_field');
function add_delivery_time_field()
{
	woocommerce_wp_text_input(array(
		'id' => '_delivery_time',
		'label' => __('Approximate Delivery Time (in days)', 'woocommerce'),
		'placeholder' => 'e.g., 2',
		'desc_tip' => true,
		'description' => __('Specify the delivery time (in days) for the product.', 'woocommerce'),
	));
}

// Save the delivery time field
add_action('woocommerce_process_product_meta', 'save_delivery_time_field');
function save_delivery_time_field($post_id)
{
	$delivery_time = sanitize_text_field($_POST['_delivery_time']);
	if (!empty($delivery_time)) {
		update_post_meta($post_id, '_delivery_time', $delivery_time);
	}
}


//Add to Cart
function get_wishlist_count_ajax()
{
	if (is_plugin_active('yith-woocommerce-wishlist/init.php')) {
		wp_send_json(['count' => yith_wcwl_count_products()]);
	}
}
add_action('wp_ajax_get_wishlist_count', 'get_wishlist_count_ajax');
add_action('wp_ajax_nopriv_get_wishlist_count', 'get_wishlist_count_ajax');

function enqueue_custom_scripts()
{
	wp_enqueue_script('ajax-js', get_template_directory_uri() . '/assets/js/ajax.js', array('jquery'), null, true);
	wp_localize_script('ajax-js', 'wc_add_to_cart_params', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');


function custom_ajax_add_to_cart()
{
	$product_id = absint($_POST['product_id']);

	if (!$product_id) {
		wp_send_json_error(['message' => 'Invalid product']);
	}

	$added = WC()->cart->add_to_cart($product_id);

	if ($added) {
		wp_send_json_success(['message' => 'Product added successfully']);
	} else {
		wp_send_json_error(['message' => 'Could not add product']);
	}
}
add_action('wp_ajax_custom_ajax_add_to_cart', 'custom_ajax_add_to_cart');
add_action('wp_ajax_nopriv_custom_ajax_add_to_cart', 'custom_ajax_add_to_cart');


function get_cart_count_ajax()
{
	if (is_plugin_active('woocommerce/woocommerce.php')) {
		wp_send_json(['count' => WC()->cart->get_cart_contents_count()]);
	}
}
add_action('wp_ajax_get_cart_count', 'get_cart_count_ajax');
add_action('wp_ajax_nopriv_get_cart_count', 'get_cart_count_ajax');


function wpboilerplate_has_child_categories($category_id)
{
	$children = get_terms([
		'taxonomy' => 'product_cat',
		'parent' => $category_id,
		'hide_empty' => false // Set to true if you want to hide empty categories
	]);

	return !empty($children) && !is_wp_error($children);
}

function wpboilerplate_get_business_day($days_to_add = 2)
{
	$date = new DateTime();
	$added_days = 0;

	while ($added_days < $days_to_add) {
		$date->modify('+1 day');
		$day_of_week = $date->format('N'); // 6 = Saturday, 7 = Sunday

		if ($day_of_week < 6) {
			$added_days++;
		}
	}

	return $date->format("D d M");
}

if (!function_exists('wpboilerplate_truncate_text_smart')) {
	function wpboilerplate_truncate_text_smart($text, $limit = 50)
	{
		if (strlen($text) > $limit) {
			return substr($text, 0, strrpos(substr($text, 0, $limit), ' ')) . '...';
		}
		return $text;
	}
}


if (!function_exists('wpboilerplate_get_current_url')) {
	function wpboilerplate_get_current_url()
	{
		$current_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		return $current_url;
	}
}
