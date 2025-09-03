<?php

$php_files = array(
    array(
        'file-name' => 'activation',
        'file-path' => WPBOILERPLATE_TGMA
    ),
    array(
        'file-name' => 'singletone',
        'file-path' => WPBOILERPLATE_INC .  '/traits/'
    ),
    array(
        'file-name' => 'functions',
        'file-path' => WPBOILERPLATE_INC .  '/traits/'
    ),
    array(
        'file-name' => 'theme-breadcrumb',
        'file-path' => WPBOILERPLATE_INC
    ),
    array(
        'file-name' => 'theme-excerpt',
        'file-path' => WPBOILERPLATE_INC
    ),
    array(
        'file-name' => 'theme-hook-customize',
        'file-path' => WPBOILERPLATE_INC
    ),
    array(
        'file-name' => 'theme-comments-modifications',
        'file-path' => WPBOILERPLATE_INC
    ),
    array(
        'file-name' => 'customizer',
        'file-path' => WPBOILERPLATE_INC
    ),
    array(
        'file-name' => 'theme-group-fields-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-group-fields-value-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-metabox-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-userprofile-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-shortcode-option-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-customizer-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
    array(
        'file-name' => 'theme-option-cs',
        'file-path' => WPBOILERPLATE_THEME_SETTINGS
    ),
);

if (class_exists('WooCommerce')) {
    $php_files[] = array(
        'file-name' => 'theme-woocommerce-customize',
        'file-path' => WPBOILERPLATE_INC
    );
    $php_files[] = array(
        'file-name' => 'product-loop',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/'
    );
    $php_files[] = array(
        'file-name' => 'woo-features',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/'
    );
    $php_files[] = array(
        'file-name' => 'shipping-methods',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/'
    );
    $php_files[] = array(
        'file-name' => 'luigis-box',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/shortcodes/'
    );
    $php_files[] = array(
        'file-name' => 'generate-filters',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/product-filters/'
    );
    $php_files[] = array(
        'file-name' => 'ajax-filter',
        'file-path' => WPBOILERPLATE_INC . '/woo-features/product-filters/'
    );
}

return $php_files;
