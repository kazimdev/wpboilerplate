<?php

add_shortcode('wpboilerplate_user_based_recommender', 'wpboilerplate_generate_user_based_recommender');
function wpboilerplate_generate_user_based_recommender()
{
    $product_ids = wpboilerplate_get_luigisbox_recommendations();

    ob_start();
    if (!empty($product_ids)) {
        echo '<div class="luigis-box-recomended products">';

        foreach ($product_ids as $id) {
            $product = wc_get_product($id);

            // $post_object = get_post($id);
            // setup_postdata($GLOBALS['post'] = $post_object);

            // wc_get_template_part('content', 'product');
?>
            <div <?php wc_product_class('product-card', $product); ?>>
                <div class="product-image">
                    <?php if ($product->is_in_stock()) : ?>
                        <span class="stock-status">In Stock</span>
                    <?php else : ?>
                        <span class="stock-status out-of-stock">Out of Stock</span>
                    <?php endif; ?>
                    <a href="<?php echo esc_url($product->get_permalink()); ?>">
                        <img src="<?php echo esc_url(wp_get_attachment_url($product->get_image_id())); ?>"
                            alt="<?php echo esc_attr($product->get_name()); ?>">
                    </a>
                </div>
                <div class="product-info">
                    <div class="product-title-price">
                        <?php if ($product->is_in_stock()) : ?>
                            <span class="stock-status">In Stock</span>
                        <?php else : ?>
                            <span class="stock-status out-of-stock">Out of Stock</span>
                        <?php endif; ?>
                        <h3 class="product-title">
                            <a href="<?php echo esc_url($product->get_permalink()); ?>">
                                <?php echo esc_html(wpboilerplate_truncate_text_smart($product->get_name(), 50)); ?>
                            </a>
                        </h3>

                        <div class="product-price">
                            <span class="sale-price"><?php echo $product->get_price_html(); ?></span>
                        </div>
                    </div>

                    <?php if ($product->is_in_stock() && $product->is_type('simple')) : ?>
                        <form class="add-to-cart-form" method="post"
                            action="<?php echo esc_url(home_url('/?add-to-cart=' . $product->get_id())); ?>">
                            <button type="button" class="add-to-cart-button ajax-add-to-cart"
                                data-product_id="<?php echo esc_attr($product->get_id()); ?>">
                                Add to Cart
                            </button>
                            <span class="added-message" style="display:none;">Added!</span>
                        </form>
                    <?php endif; ?>

                    <?php if ($product->is_in_stock() && $product->is_type('variable')) : ?>
                        <a href="<?php echo esc_url($product->get_permalink()); ?>" class="add-to-cart-button">
                            Select Options
                        </a>
                    <?php endif; ?>
                </div>
            </div>
<?php
        }

        echo '</div>'; // .luigis-box-recomended
    }

    $output = ob_get_clean();

    return $output;
}

function wpboilerplate_get_luigisbox_recommendations($recommend_type = 'user_conversion_based')
{
    $api_key = '7aca7efc3b1e63372911e2a8390eab895743fef7f0f3debfbbab95aef3cd1c5d'; // Replace with your API key
    $endpoint = 'https://live.luigisbox.com/v1/recommend?tracker_id=580793-730969';

    $user_id = isset($_COOKIE['_lb']) ? $_COOKIE['_lb'] : get_current_user_id(); // '7471866697531330000'

    $body =  '[ { "user_id" : "' . $user_id . '", "size": 5, "item_ids" : [] , "recommendation_type" : "' . $recommend_type . '", "recommender_client_identifier": "' . $recommend_type . '", "recommendation_context":  {}, "hit_fields" : ["url"] } ]';

    $args = [
        'body'    => $body,

        'headers' => [
            'Content-Type' => 'application/json;charset=utf-8',
        ],

        'method'  => 'POST',
    ];

    $response = wp_remote_post($endpoint, $args);

    if (is_wp_error($response)) {
        return false;
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    // Get WooCommerce product IDs
    $product_ids = wpboilerplate_get_product_ids_from_urls($data[0]['hits']);

    return $product_ids;
}

function wpboilerplate_get_product_ids_from_urls($products)
{
    $product_ids = [];

    foreach ($products as $product) {
        if (!empty($product['url'])) {
            // Extract the product slug from the URL
            $slug = basename($product['url']);

            $product_obj = get_page_by_path($slug, OBJECT, 'product');
            if ($product_obj) {
                $product_ids[] = $product_obj->ID;
            }
        }
    }

    return $product_ids;
}
