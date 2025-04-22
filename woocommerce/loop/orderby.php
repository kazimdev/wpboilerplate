<?php

/**
 * Show options for ordering
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/orderby.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.6.0
 */

if (! defined('ABSPATH')) {
	exit;
}
?>
<div class="wpboilerplate-woo-header-right">
	<div class="wpboilerplate-filter-button hide-on-desktop hide-on-tablet">
		<button class="button filter-button"><svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M7 2.5C7 2.89782 7.15804 3.27936 7.43934 3.56066C7.72064 3.84196 8.10218 4 8.5 4C8.89782 4 9.27936 3.84196 9.56066 3.56066C9.84196 3.27936 10 2.89782 10 2.5M7 2.5C7 2.10218 7.15804 1.72064 7.43934 1.43934C7.72064 1.15804 8.10218 1 8.5 1C8.89782 1 9.27936 1.15804 9.56066 1.43934C9.84196 1.72064 10 2.10218 10 2.5M7 2.5H1M10 2.5H13M2.5 7C2.5 7.39782 2.65804 7.77936 2.93934 8.06066C3.22064 8.34196 3.60218 8.5 4 8.5C4.39782 8.5 4.77936 8.34196 5.06066 8.06066C5.34196 7.77936 5.5 7.39782 5.5 7M2.5 7C2.5 6.60218 2.65804 6.22064 2.93934 5.93934C3.22064 5.65804 3.60218 5.5 4 5.5C4.39782 5.5 4.77936 5.65804 5.06066 5.93934C5.34196 6.22064 5.5 6.60218 5.5 7M2.5 7H1M5.5 7H13M9.25 11.5C9.25 11.8978 9.40804 12.2794 9.68934 12.5607C9.97064 12.842 10.3522 13 10.75 13C11.1478 13 11.5294 12.842 11.8107 12.5607C12.092 12.2794 12.25 11.8978 12.25 11.5M9.25 11.5C9.25 11.1022 9.40804 10.7206 9.68934 10.4393C9.97064 10.158 10.3522 10 10.75 10C11.1478 10 11.5294 10.158 11.8107 10.4393C12.092 10.7206 12.25 11.1022 12.25 11.5M9.25 11.5H1M12.25 11.5H13" stroke="#1B0832" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg> Filter</button>
	</div>
	<div class="wpboilerplate-layout-view">
		<div class="grid-view">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4 6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4H8C8.53043 4 9.03914 4.21071 9.41421 4.58579C9.78929 4.96086 10 5.46957 10 6V7C10 7.53043 9.78929 8.03914 9.41421 8.41421C9.03914 8.78929 8.53043 9 8 9H6C5.46957 9 4.96086 8.78929 4.58579 8.41421C4.21071 8.03914 4 7.53043 4 7V6Z" stroke="#1B0832" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M4 15C4 14.4696 4.21071 13.9609 4.58579 13.5858C4.96086 13.2107 5.46957 13 6 13H8C8.53043 13 9.03914 13.2107 9.41421 13.5858C9.78929 13.9609 10 14.4696 10 15V18C10 18.5304 9.78929 19.0391 9.41421 19.4142C9.03914 19.7893 8.53043 20 8 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V15Z" stroke="#1B0832" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M14 6C14 5.46957 14.2107 4.96086 14.5858 4.58579C14.9609 4.21071 15.4696 4 16 4H18C18.5304 4 19.0391 4.21071 19.4142 4.58579C19.7893 4.96086 20 5.46957 20 6V9C20 9.53043 19.7893 10.0391 19.4142 10.4142C19.0391 10.7893 18.5304 11 18 11H16C15.4696 11 14.9609 10.7893 14.5858 10.4142C14.2107 10.0391 14 9.53043 14 9V6Z" stroke="#1B0832" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M14 17C14 16.4696 14.2107 15.9609 14.5858 15.5858C14.9609 15.2107 15.4696 15 16 15H18C18.5304 15 19.0391 15.2107 19.4142 15.5858C19.7893 15.9609 20 16.4696 20 17V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H16C15.4696 20 14.9609 19.7893 14.5858 19.4142C14.2107 19.0391 14 18.5304 14 18V17Z" stroke="#1B0832" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>

		</div>
		<div class="list-view">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M4 6C4 5.46957 4.21071 4.96086 4.58579 4.58579C4.96086 4.21071 5.46957 4 6 4H18C18.5304 4 19.0391 4.21071 19.4142 4.58579C19.7893 4.96086 20 5.46957 20 6V8C20 8.53043 19.7893 9.03914 19.4142 9.41421C19.0391 9.78929 18.5304 10 18 10H6C5.46957 10 4.96086 9.78929 4.58579 9.41421C4.21071 9.03914 4 8.53043 4 8V6Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
				<path d="M4 16C4 15.4696 4.21071 14.9609 4.58579 14.5858C4.96086 14.2107 5.46957 14 6 14H18C18.5304 14 19.0391 14.2107 19.4142 14.5858C19.7893 14.9609 20 15.4696 20 16V18C20 18.5304 19.7893 19.0391 19.4142 19.4142C19.0391 19.7893 18.5304 20 18 20H6C5.46957 20 4.96086 19.7893 4.58579 19.4142C4.21071 19.0391 4 18.5304 4 18V16Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
			</svg>
		</div>
	</div>

	<!-- <form class="woocommerce-ordering" method="get"> -->
	<select name="wpboilerplate_orderby" class="wpboilerplate-orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
		<option value="" selected>Sort By</option>
		<option value="popularity">Popularity</option>
		<option value="price_low_to_high">Price: low to high</option>
		<option value="price_high_to_low">Price: high to low</option>

		<?php // foreach ($catalog_orderby_options as $id => $name) : 
		?>
		<!-- <option value="<?php // echo esc_attr($id); 
							?>" <?php // selected($orderby, $id); 
								?>><?php // echo esc_html($name); 
									?></option> -->
		<?php // endforeach; 
		?>

	</select>

	<!-- <input type="hidden" name="paged" value="1" /> -->

	<?php // wc_query_string_form_fields(null, array('orderby', 'submit', 'paged', 'product-page')); 
	?>
	<!-- </form> -->
</div>