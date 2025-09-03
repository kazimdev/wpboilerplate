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
			return class_exists('WPBoilerplate_Helper_Functions') ? WPBoilerplate_Helper_Functions::getInstance() : false;
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