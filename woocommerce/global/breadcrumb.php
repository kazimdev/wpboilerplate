<?php

/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if (! defined('ABSPATH')) {
	exit;
}

if (! empty($breadcrumb)) {
	$delimiter = '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 11L6.5 6L1.5 1" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

	echo $wrap_before;

	foreach ($breadcrumb as $key => $crumb) {

		echo $before;

		if (! empty($crumb[1]) && sizeof($breadcrumb) !== $key + 1) {
			echo '<a href="' . esc_url($crumb[1]) . '">' . esc_html($crumb[0]) . '</a>';
		} else {
			echo esc_html($crumb[0]);
		}

		echo $after;

		if (sizeof($breadcrumb) !== $key + 1) {
			echo $delimiter;
		}
	}

	echo $wrap_after;
}
