<?php

/**
 * -------------------------------------------
 * Get Shipping Method by User Location
 * -------------------------------------------
 */

use function Avifinfo\read;

add_action('wp_ajax_wpboilerplate_get_shipping_info', 'wpboilerplate_get_shipping_info');
add_action('wp_ajax_nopriv_wpboilerplate_get_shipping_info', 'wpboilerplate_get_shipping_info'); // Allow non-logged-in users

function wpboilerplate_get_shipping_info()
{
    if (!isset($_POST['latitude']) || !isset($_POST['longitude'])) {
        wp_send_json_error(['message' => 'Invalid location data']);
    }

    $latitude = sanitize_text_field($_POST['latitude']);
    $longitude = sanitize_text_field($_POST['longitude']);

    // Use OpenStreetMap API (or Google Maps API if you have a key)
    $geo_api_url = "https://nominatim.openstreetmap.org/reverse?format=json&accept-language=en&lat={$latitude}&lon={$longitude}";
    $response = wp_remote_get($geo_api_url);

    if (is_wp_error($response)) {
        wp_send_json_error(['message' => 'Failed to fetch location data']);
    }

    $location_data = json_decode(wp_remote_retrieve_body($response), true);

    if (empty($location_data)) {
        wp_send_json_error(['message' => 'Invalid location response']);
    }

    $country  = $location_data['address']['country_code'] ?? '';
    $state    = $location_data['address']['state'] ?? '';
    $postcode = $location_data['address']['postcode'] ?? '';
    $city     = $location_data['address']['city'] ?? '';

    // Get WooCommerce shipping methods
    $shipping_methods = get_shipping_methods_for_location(strtoupper($country), $state, $postcode, $city);

    $shipping_info = [];

    if (!empty($shipping_methods)) {
        foreach ($shipping_methods as $key => $method) {
            $shipping_info[$method->method_id] = $method->label;
        }
    }

    wp_send_json_success($shipping_info);
}

function get_shipping_methods_for_location($country, $state = '', $postcode = '', $city = '')
{
    $package = array(
        'destination' => array(
            'country'  => $country,
            'state'    => $state,
            'postcode' => $postcode,
            'city' => $city
        ),
        'contents'    => WC()->cart->get_cart(), // Simulating cart items
    );

    // If WC()->shipping is available
    if (WC()->shipping) {
        // Get shipping rates
        $shipping_methods = WC()->shipping()->calculate_shipping_for_package($package);

        if (!empty($shipping_methods['rates'])) {
            return $shipping_methods['rates'];
        }
    }
}
