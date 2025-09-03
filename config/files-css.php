<?php

$css_files = array(
    array(
        'handle' => 'animate',
        'src' => WPBOILERPLATE_CSS . '/animate.css',
        'deps' => array(),
    ),
    array(
        'handle' => 'bootstrap',
        'src' => WPBOILERPLATE_CSS . '/bootstrap.min.css',
        'deps' => array(),
    ),
    array(
        'handle' => 'jquery-ui',
        'src' => '//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css',
        'deps' => array('bootstrap'),
    ),
    array(
        'handle' => 'wpboilerplate-main-style',
        'src' => WPBOILERPLATE_CSS . '/main-style' . $css_ext,
        'deps' => array(),
    ),
    array(
        'handle' => 'wpboilerplate-mega-menu-style',
        'src' => WPBOILERPLATE_CSS . '/mega-menu' . $css_ext,
        'deps' => array(),
    ),
    array(
        'handle' => 'wpboilerplate-responsive',
        'src' => WPBOILERPLATE_CSS . '/responsive' . $css_ext,
        'deps' => array(),
    ),
);

if (class_exists('WooCommerce')) {
    $css_files[] = array(
        'handle' => 'wpboilerplate-woocommerce-style',
        'src' => WPBOILERPLATE_CSS . '/woocommerce-style' . $css_ext,
        'deps' => array(),
    );

    $css_files[] = array(
        'handle' => 'wpboilerplate-woocommerce-responsive',
        'src' => WPBOILERPLATE_CSS . '/woocommerce-responsive' . $css_ext,
        'deps' => array(),
    );
}

return $css_files;
