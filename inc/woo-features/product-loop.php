<?php

add_filter('woocommerce_breadcrumb_defaults', 'wpboilerplate_woocommerce_breadcrumb_defaults');
function wpboilerplate_woocommerce_breadcrumb_defaults($defaults)
{
    $delimeter = '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 11L6.5 6L1.5 1" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

    $root_nav = 'All Categories';

    if (is_shop()) {
        $root_nav = 'Home';
    }

    return  array(
        'delimiter'   => '&nbsp;&#47;&nbsp;',
        'wrap_before' => '<nav class="woocommerce-breadcrumb" aria-label="Breadcrumb">',
        'wrap_after'  => '</nav>',
        'before'      => '',
        'after'       => '',
        'home'        => $root_nav,
    );
}

// Change the home URL
add_filter('woocommerce_breadcrumb_home_url', 'wpboilerplate_woocommerce_breadcrumb_home_url');
function wpboilerplate_woocommerce_breadcrumb_home_url($url)
{
    if (is_shop()) {
        return $url;
    }

    return home_url('product-category');
}


add_action('pre_get_posts', 'custom_shop_page_display');
function custom_shop_page_display($query)
{
    if (!is_admin() && $query->is_main_query() && is_shop()) {
        $query->set('post_type', 'product');
        $query->set('tax_query', array());  // Clear any taxonomy queries
        return;
    }
}
