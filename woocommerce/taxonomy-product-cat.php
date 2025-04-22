<?php

/**
 * The Template for displaying products in a product category. Simply includes the archive template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/taxonomy-product-cat.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     4.7.0
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

get_header('shop');

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */

do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');

echo '<div class="wpboilerplate-product-cat row">';

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
if (is_product_category()) {
	$category = get_queried_object();

	$category_id = isset($category->term_id) ? $category->term_id : 0;

	$args = array(
		'post_type' => 'product',
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'product_cat',
				'field'    => 'term_id',
				'terms'    => $category_id,
				'include_children' => false,
			),
		),
		'fields' => 'ids', // Optimize query for counting
	);

	$query = new WP_Query($args);
	$product_count = $query->post_count;

	// Check if category has products
	if ($category->count > 0) {
?>
		<div class="col-md-3 wpboilerplate-woo-sidebar-overlay">
			<div class="wpboilerplate-woo-sidebar">
				<?php
				if (is_active_sidebar('product-sidebar')) {
					dynamic_sidebar('product-sidebar');
				}
				?>

				<div class="clear-filters hide-on-desktop hide-on-tablet">
					<span class="close apply-filter">Apply</span>

					<a href="<?php echo wpboilerplate_get_current_url(); ?>" class="clear-all">Clear all</a>
				</div>
			</div>
		</div>
<?php
		echo '<div class="col-md-9">';
	}
}


if (woocommerce_product_loop()) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action('woocommerce_before_shop_loop');

	woocommerce_product_loop_start();

	if (wc_get_loop_prop('total')) {
		while (have_posts()) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');
		}
	}

	woocommerce_product_loop_end();

	echo "<div class='category-break'></div>";

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action('woocommerce_after_shop_loop');
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

if (is_product_category()) {
	if ($category->count > 0) {
		echo '</div>'; // .col-md-9
	}
}

echo '</div>'; // .wpboilerplate-product-cat

get_footer('shop');
