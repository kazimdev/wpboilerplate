<?php

class WPBoilerplate_Generate_Filters
{
    use WPBoilerplateSingleTone;
    use WPBoilerplateFunctions;

    public function __construct()
    {
        add_shortcode('wpboilerplate_filter_product_availability', array($this, 'generate_availability_filter'));

        add_shortcode('wpboilerplate_filter_product_price', array($this, 'generate_price_filter'));

        add_shortcode('wpboilerplate_filter_product_type', array($this, 'generate_type_filter'));

        add_shortcode('wpboilerplate_filter_product_attrs', array($this, 'generate_product_attrs'));
    }

    function generate_availability_filter()
    {
        $category = $this->get_woo_category_from_url();
?>
        <h2 class="wp-block-heading">Filters

            <a href="<?php echo $this->get_current_url(); ?>" class="clear-all">Clear all</a>

            <span class="close hide-on-desktop hide-on-tablet"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 1L1 11M1 1L11 11" stroke="#4D5462" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg></span>
        </h2>

        <div class="selected-filters">

        </div>

        <div class="stock-filter wpboilerplate-filter-box">
            <h4>Product Availability</h4>
            <p>
                <label for="in_stock">In Stock <span>(<span class="count"><?php echo $this->get_instock_product_count($category['id']); ?></span>)</span>
                    <input type="checkbox" name="in_stock" id="in_stock"> <span class="checkmark"></span>
                </label>
            </p>

            <p>
                <label for="stock_out">Stock Out <span>(<span class="count"><?php echo $this->get_outofstock_product_count($category['id']); ?></span>)</span>
                    <input type="checkbox" name="stock_out" id="stock_out"> <span class="checkmark"></span>
                </label>
            </p>
        </div>
    <?php
    }

    function generate_price_filter()
    {
    ?>
        <div class="price-filter wpboilerplate-filter-box">
            <h4>Price</h4>
            <div class="price-range-block">
                <div class="price-filter-inputs">
                    <span>£<input type="number" min="0" max="999" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" /></span> - <span>£<input type="number" min="0" max="1000" oninput="validity.valid||(value='1000');" id="max_price" class="price-range-field" /></span>
                </div>

                <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
            </div>
        </div>

    <?php
    }

    function generate_type_filter()
    {
        $category = $this->get_woo_category_from_url();
    ?>
        <div class="type-filter wpboilerplate-filter-box">
            <h4>Type</h4>
            <p>
                <label for="filter_new">New <span>(<span class="count"><?php echo $this->get_new_products_count($category['id']); ?></span>)</span>
                    <input type="checkbox" name="filter_new" id="filter_new"> <span class="checkmark"></span>
                </label>
            </p>

            <p>
                <label for="filter_offer">Offer <span>(<span class="count"><?php echo $this->get_offer_products_count($category['id']); ?></span>)</span>
                    <input type="checkbox" name="filter_offer" id="filter_offer"> <span class="checkmark"></span>
                </label>
            </p>
            <p>
                <label for="filter_popular">Popular <span>(<span class="count"><?php echo $this->get_popular_products_count($category['id']); ?></span>)</span>
                    <input type="checkbox" name="filter_popular" id="filter_popular"> <span class="checkmark"></span>
                </label>
            </p>
        </div>
<?php
    }

    /**
     * Shortcode for product attributes for a category
     */
    function generate_product_attrs($atts)
    {
        $category = $this->get_woo_category_from_url();

        $attributes = $this->get_product_attrs_by_category($category['id'], include_variations: true, include_custom: false);

        if (isset($attributes['error'])) {
            return '<p>' . esc_html($attributes['error']) . '</p>';
        }

        if (empty($attributes)) {
            return '';
        }

        $output = '';

        $output .= '<div class="category-attributes">';

        if (!empty($attributes)) {
            foreach ($attributes as $attribute) {
                if (!empty($attribute['values'])) {
                    $attr_slug = sanitize_title($attribute['label']);

                    $output .= '<div class="wpboilerplate-filter-box ' . $attr_slug  . '-filter">';
                    $output .= '<h4>' . esc_html(ucwords(str_replace('-', ' ', $attribute['label']))) . '</h4>';

                    if ('color' == $attr_slug || 'colour' == $attr_slug) {
                        if (!empty($attribute['values'])) {
                            $output .= '<ul class="attribute-values">';
                            foreach ($attribute['values'] as $value) {
                                $output .= '<li><span class="color" style="background:' . $this->get_attr_color_code(strtolower($value), $attr_slug) . '"></span>' . esc_html($value) . '</li>';
                            }
                            $output .= '</ul>';
                        }
                    } else {
                        if (!empty($attribute['values'])) {
                            $output .= '<div class="attribute-values">';
                            foreach ($attribute['values'] as $value) {
                                $output .= '<p> <label for="' . $attr_slug  . '_' . sanitize_title($value) . '"> <input type="checkbox" name="' . $attr_slug  . '_' . sanitize_title($value)  . '" id="' . $attr_slug  . '_' . sanitize_title($value) . '" value="' . sanitize_title($value) . '"> ' . esc_html($value) . ' <span class="checkmark"></span></label>  </p>';
                            }
                            $output .= '</div>';
                        }
                    }

                    $output .= '</div>';
                }
            }
        }

        $output .= '</div>';

        return $output;
    }


    /**
     * Get all product attributes used in a specific category
     */
    function get_product_attrs_by_category($category, $include_variations = true, $include_custom = true)
    {
        // Initialize results array
        $attributes = array();

        // Determine if category is ID or slug
        if (is_numeric($category)) {
            $term = get_term($category, 'product_cat');
            $category_id = $category;
        } else {
            $term = get_term_by('slug', $category, 'product_cat');
            $category_id = $term ? $term->term_id : 0;
        }

        // Check if category exists
        if (!$term || is_wp_error($term)) {
            return array('error' => 'Category not found');
        }

        // Query products in the category
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $category_id,
                    'include_children' => true,
                ),
            ),
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) {
            while ($products->have_posts()) {
                $products->the_post();
                $product_id = get_the_ID();
                $product = wc_get_product($product_id);

                // Skip if not a valid product
                if (!$product) {
                    continue;
                }

                // Get global product attributes (from product_attributes taxonomy)
                $product_attributes = $product->get_attributes();

                foreach ($product_attributes as $attribute_name => $attribute) {
                    if ('pack-size' != $attribute_name && 'pa_pack-size' != $attribute_name  && 'pa_color' != $attribute_name && 'pa_colour' != $attribute_name && 'pa_brand' != $attribute_name && 'pa_size' != $attribute_name && 'pa_material' != $attribute_name) {
                        continue;
                    }

                    // Skip if it's a variation attribute and we don't want variation attributes
                    if (!$include_variations && $attribute->get_variation()) {
                        continue;
                    }

                    // Skip if it's a custom attribute and we don't want custom attributes
                    if (!$include_custom && !$attribute->is_taxonomy()) {
                        continue;
                    }

                    $attribute_label = wc_attribute_label($attribute_name);

                    // Initialize attribute in results if not already there
                    if (!isset($attributes[$attribute_name])) {
                        $attributes[$attribute_name] = array(
                            'label' => $attribute_label,
                            'name'  => $attribute_name,
                            'is_taxonomy' => $attribute->is_taxonomy(),
                            'values' => array(),
                            'products' => array(),
                        );
                    }

                    // Add this product to the list of products using this attribute
                    if (!in_array($product_id, $attributes[$attribute_name]['products'])) {
                        $attributes[$attribute_name]['products'][] = $product_id;
                    }

                    // Get attribute values
                    if ($attribute->is_taxonomy()) {
                        // For taxonomy-based attributes
                        $attribute_values = $product->get_attribute($attribute_name);

                        $attribute_values = explode(', ', $attribute_values);

                        foreach ($attribute_values as $value) {
                            if (!empty($value) && !in_array($value, $attributes[$attribute_name]['values'])) {
                                $attributes[$attribute_name]['values'][] = $value;
                            }
                        }
                    } else {
                        // For custom product attributes
                        $attribute_value = $product->get_attribute($attribute_name);
                        $custom_values = explode(', ', $attribute_value);

                        foreach ($custom_values as $value) {
                            if (!empty($value) && !in_array($value, $attributes[$attribute_name]['values'])) {
                                $attributes[$attribute_name]['values'][] = $value;
                            }
                        }
                    }
                }
            }

            // Reset post data
            wp_reset_postdata();
        }

        // Add count of products for each attribute
        foreach ($attributes as $key => $attribute) {
            $attributes[$key]['product_count'] = count($attribute['products']);
        }

        return $attributes;
    }
}

if (class_exists('WPBoilerplate_Generate_Filters')) {
    WPBoilerplate_Generate_Filters::getInstance();
}
