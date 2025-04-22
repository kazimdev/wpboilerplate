<?php

/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly
}

get_header();

$page_layout_meta = WPBoilerplate_Group_Fields_Value::page_layout_options('product_shop');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
$page_class = is_product() ? 'woocommerce-single-product-page-content-area' : 'woocommerce-page-content-area';
?>

<div class="content-area <?php echo esc_attr($page_class); ?>">
	<div class="container">
		<div class="row">
			<div class="<?php echo esc_attr($page_layout_meta['content_column_class']); ?>">
				<?php
				/**
				 * woocommerce_before_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
				 * @hooked woocommerce_breadcrumb - 20
				 */
				do_action('woocommerce_before_main_content');
				?>

				<?php while (have_posts()) : ?>
					<?php

					the_post();

					wc_get_template_part('content', 'single-product'); ?>

				<?php endwhile; // end of the loop. 
				?>

				<?php
				/**
				 * woocommerce_after_main_content hook.
				 *
				 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
				 */
				do_action('woocommerce_after_main_content');
				?>
			</div>

			<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			// do_action('woocommerce_sidebar');
			if ($page_layout_meta['sidebar_enable']): ?>
				<div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']); ?>">
					<?php
					if (is_active_sidebar('product-sidebar')) {
						dynamic_sidebar('product-sidebar');
					}
					?>
				</div>
			<?php endif;  ?>
		</div>
	</div>
</div><!-- #primary -->
<?php
get_footer();

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
