<?php

use FluentForm\Framework\Support\Arr;

class WPBoilerplate_Ajax_Filters
{
    use WPBoilerplateSingleTone;
    use WPBoilerplateFunctions;

    public function __construct()
    {
        add_action("wp_ajax_wpboilerplate_filter_products", array($this, "filter_products"));
        add_action("wp_ajax_nopriv_wpboilerplate_filter_products", array($this, "filter_products"));
    }

    function filter_products()
    {
        $in_stock =  isset($_REQUEST['in_stock']) ? $_REQUEST['in_stock'] : false;
        $out_stock =  isset($_REQUEST['out_stock']) ? $_REQUEST['out_stock'] : false;

        $new =  isset($_REQUEST['new']) ? $_REQUEST['new'] : false;
        $offer =  isset($_REQUEST['offer']) ? $_REQUEST['offer'] : false;
        $popular =  isset($_REQUEST['popular']) ? $_REQUEST['popular'] : false;

        $min_price =  isset($_REQUEST['min_price']) ? floatval($_REQUEST['min_price']) : 0;
        $max_price =  isset($_REQUEST['max_price']) ? floatval($_REQUEST['max_price']) : 999999999999;

        // Attributes
        $color =  isset($_REQUEST['color']) ? sanitize_title($_REQUEST['color']) : '';
        $size =  isset($_REQUEST['size']) ? (array) $_REQUEST['size'] : [];
        $pack_size =  isset($_REQUEST['pack_size']) ? (array) $_REQUEST['pack_size'] : [];
        $brand =  isset($_REQUEST['brand']) ? (array) $_REQUEST['brand'] : [];

        $posts_per_page = intval(get_option('woocommerce_catalog_rows', 2)) * intval(get_option('woocommerce_catalog_columns', 4));
        $paged = isset($_REQUEST['paged']) ? intval($_REQUEST['paged']) : 1;

        $meta_query = [];
        // $meta_query = array('relation' => 'OR'); // OR Logic
        $tax_query = array('relation' => 'AND'); // AND Logic for attributes
        $price_query = [];

        $current_url = isset($_REQUEST['current_url']) ? $_REQUEST['current_url'] : '';
        $category = $this->get_woo_category_from_url($current_url);

        if (!empty($category)) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $category['id'],
            );
        }

        // Filter by Color attribute
        // if (!empty($color)) {
        //     $tax_query[] = array(
        //         'taxonomy' => 'pa_color', // WooCommerce color attribute
        //         'field'    => 'slug',
        //         'terms'    => $color,
        //     );
        // }

        if (!empty($color)) {
            $tax_query[] = array(
                'taxonomy' => 'pa_colour', // WooCommerce color attribute
                'field'    => 'slug',
                'terms'    => $color,
            );
        }

        // Filter by Size attribute
        if (!empty($size)) {
            $tax_query[] = array(
                'taxonomy' => 'pa_size', // WooCommerce size attribute
                'field'    => 'slug',
                'terms'    => $size,
                'operator' => 'IN',
            );
        }

        // Filter by Pack-Size attribute
        if (!empty($pack_size)) {
            $tax_query[] = array(
                'taxonomy' => 'pa_pack-size', // WooCommerce pack-size attribute
                'field'    => 'slug',
                'terms'    => $pack_size,
                'operator' => 'IN',
            );
        }

        // if (!empty($pack_size)) {
        //     $tax_query[] = array(
        //         'taxonomy' => 'pack-size', // WooCommerce pack-size attribute
        //         'field'    => 'slug',
        //         'terms'    => $pack_size,
        //         'operator' => 'IN',
        //     );
        // }

        // Filter by Brand attribute
        if (!empty($brand)) {
            $tax_query[] = array(
                'taxonomy' => 'pa_brand', // WooCommerce brand attribute
                'field'    => 'slug',
                'terms'    => $brand,
                'operator' => 'IN',
            );
        }

        if ($new) {
            // Filter products added in the last 30 days
            $date_query = array(
                array(
                    'after' => '30 days ago',
                    'column' => 'post_date'
                ),
            );
        }

        if ($popular) {
            // Filter by best-selling products
            $meta_query[] = array(
                'key'     => 'total_sales',
                'value'   => 0,
                'compare' => '>',
                'type'    => 'NUMERIC',
            );
        }

        if ($offer) {
            // Filter products that are on sale
            $meta_query[] = array(
                'key'     => '_sale_price',
                'value'   => '',
                'compare' => '!=',
            );
        }

        if (!empty($in_stock) && empty($out_stock)) {
            $meta_query[] = array(
                'key'     => '_stock_status',
                'value'   => 'instock',
                'compare' => '='
            );
        }

        if (empty($in_stock) && !empty($out_stock)) {
            $meta_query[] = array(
                'key'     => '_stock_status',
                'value'   => 'outofstock',
                'compare' => '='
            );
        }

        // Filter products by price range (min price to max price)
        $price_query[] = array(
            'key'     => '_price',
            'value'   => array($min_price, $max_price),
            'compare' => 'BETWEEN',
            'type'    => 'NUMERIC',
        );

        // Final query arguments
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => $posts_per_page,
            'paged'          => $paged,
            'meta_query'     => array_merge(array('relation' => 'AND'), array($meta_query, $price_query)),
            'tax_query'      => $tax_query,
            'date_query'     => isset($date_query) ? $date_query : array(),
        );


        // Sort By
        $sort_by = isset($_REQUEST['sort_by']) ? sanitize_text_field($_REQUEST['sort_by']) : '';
        $orderby = 'date';
        $order = 'DESC';

        // Sorting by Price (Low to High or High to Low)
        if ('price_low_to_high' == $sort_by) {
            $args['meta_key'] = '_price';
            $orderby = 'meta_value_num';
            $order = 'ASC';
        } elseif ('price_high_to_low' == $sort_by) {
            $args['meta_key'] = '_price';
            $orderby = 'meta_value_num';
            $order = 'DESC';
        } else if ('popularity' == $sort_by) {
            $args['meta_key'] = 'total_sales';
            $orderby = 'meta_value_num';
            $order = 'DESC';
        }

        // Add sorting to query args
        $args['orderby'] = $orderby;
        $args['order'] = $order;

        $query = new WP_Query($args);

        $product_html = '';

        $showing_items = 0;

        ob_start(); // Start output buffering

        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                wc_get_template_part('content', 'product'); // Load WooCommerce product template

                $showing_items++;
            }
        } else {
            echo '<p>No products found.</p>';
        }

        $product_html = ob_get_clean();

        // Add pagination
        $prevIcon = '<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.833 6H1.16634M1.16634 6L6.16634 11M1.16634 6L6.16634 1" stroke="#2D3139" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
        $nextIcon = '<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.16699 6H12.8337M12.8337 6L7.83366 11M12.8337 6L7.83366 1" stroke="#2D3139" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

        $pagination = '<ul class="page-numbers">';

        $paginate_links = paginate_links(array(
            'format'    => '?paged=%#%',
            'current'   => $paged,
            'total'     => $query->max_num_pages,
            'prev_text' => $prevIcon . ' Prev',
            'next_text' => 'Next ' . $nextIcon,
            'type'      => 'array', // Output links as array
        ));

        if (!empty($paginate_links)) {
            foreach ($paginate_links as $link) {
                $pagination .= '<li>' . $link . '</li>';
            }
        }

        $pagination .= '</ul>';

        wp_reset_postdata();

        wp_send_json(
            array(
                'products' => $product_html,
                'showing_items' => $showing_items, //$query->found_posts,
                'pagination' => $pagination
            )
        );
    }
}

if (class_exists('WPBoilerplate_Ajax_Filters')) {
    WPBoilerplate_Ajax_Filters::getInstance();
}
