<?php

/**
 * --------------------------------
 * Exclude Tax / Vat
 * --------------------------------
 */
add_action('wp_enqueue_scripts', 'enqueue_tax_toggle_ajax_script');
function enqueue_tax_toggle_ajax_script()
{
    wp_enqueue_script('tax-toggle-ajax', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), null, true);
    wp_localize_script('tax-toggle-ajax', 'taxToggleAjax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce'    => wp_create_nonce('tax_toggle_nonce'),
    ));
}

add_action('wp_ajax_wpboilerplate_toggle_tax', 'handle_tax_toggle_ajax');
add_action('wp_ajax_nopriv_wpboilerplate_toggle_tax', 'handle_tax_toggle_ajax');
function handle_tax_toggle_ajax()
{
    check_ajax_referer('tax_toggle_nonce', 'security');

    $exclude_tax = isset($_POST['exclude_tax']) && $_POST['exclude_tax'] === 'yes' ? 'yes' : 'no';

    // Set a cookie to track the tax toggle state
    setcookie('exclude_tax', $exclude_tax, time() + (86400 * 30), "/"); // 30 days

    wp_send_json_success(array('message' => 'Tax preference updated.'));
}

// Check for the cookie and modify price display accordingly
add_action('init', 'wpboilerplate_setup_tax_display_based_on_cookie');
function wpboilerplate_setup_tax_display_based_on_cookie()
{
    // Check if the exclude_tax cookie is set
    if (isset($_COOKIE['exclude_tax']) && $_COOKIE['exclude_tax'] == 'yes') {
        // Display prices excluding tax
        add_filter('woocommerce_get_price_including_tax', 'wpboilerplate_return_price_excluding_tax', 10, 3);
        add_filter('woocommerce_tax_display_shop', 'wpboilerplate_return_excl_tax');
        add_filter('woocommerce_tax_display_cart', 'wpboilerplate_return_excl_tax');
    }
}

// Make get_price_including_tax return the excluding tax price when needed
function wpboilerplate_return_price_excluding_tax($price, $qty, $product)
{
    return wc_get_price_excluding_tax($product, array('qty' => $qty));
}

// Force WooCommerce to use excl tax mode
function wpboilerplate_return_excl_tax()
{
    return 'excl';
}


/**
 * -----------------------------
 * My Account Page
 * -----------------------------
 */
add_filter('woocommerce_account_menu_items', 'wpboilerplate_woocommerce_account_menu_items');
function wpboilerplate_woocommerce_account_menu_items($items)
{
    $new_items = array(
        'edit-account'    => 'Account Details',
        'orders'         => 'Orders',
        'wishlist'       => 'Wishlist',
        'edit-address'   => 'Addresses',
        'customer-logout' => 'Logout',
    );

    return $new_items;
}

add_action('init', 'custom_add_wishlist_endpoint');
function custom_add_wishlist_endpoint()
{
    add_rewrite_endpoint('wishlist', EP_PAGES);
}

add_action('woocommerce_account_wishlist_endpoint', 'custom_wishlist_content');
function custom_wishlist_content()
{
    echo do_shortcode('[yith_wcwl_wishlist]');
}


/**
 * ---------------------------
 * Profile Picture
 * ---------------------------
 */
// Add profile picture field to account details form
add_action('woocommerce_edit_account_form_start', 'wpboilerplate_add_profile_picture_field');
function wpboilerplate_add_profile_picture_field()
{
    // Get current user
    $user_id = get_current_user_id();

    // Get profile picture URL (if exists)
    $profile_picture = get_user_meta($user_id, 'profile_picture', true);

    // Display the field
?>
    <h3><?php _e('Account Details', 'woocommerce'); ?></h3>

    <div class="woocommerce-profile-picture">
        <div class="profile-picture-preview">
            <?php if ($profile_picture) : ?>
                <img src="<?php echo esc_url($profile_picture); ?>" alt="<?php _e('Profile Picture', 'woocommerce'); ?>" style="max-width: 100px; border-radius: 50%;">
            <?php else : ?>
                <img src="<?php echo esc_url(get_avatar_url($user_id, ['size' => 100])); ?>" alt="<?php _e('Profile Picture', 'woocommerce'); ?>" style="max-width: 100px; border-radius: 50%;">
            <?php endif; ?>
        </div>

        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            <label for="profile_picture"><?php _e('Upload your profile picture. (file must be less than 2MB).', 'woocommerce'); ?></label>
            <input type="file" class="woocommerce-Input" name="profile_picture" id="profile_picture" accept="image/*">

            <?php if ($profile_picture) : ?>
                <a href="<?php echo esc_url(add_query_arg('delete_profile_picture', 'true', wc_get_account_endpoint_url('edit-account'))); ?>" class="button delete" onclick="return confirm('<?php _e('Are you sure you want to delete your profile picture?', 'woocommerce'); ?>');">
                    <?php _e('Delete', 'woocommerce'); ?>
                </a>
            <?php endif; ?>
        </p>
    </div>
    <div class="clear"></div>
<?php
}

// Enable file uploads in the edit account form
add_action('woocommerce_edit_account_form_tag', 'wpboilerplate_add_form_enctype');
function wpboilerplate_add_form_enctype()
{
    echo 'enctype="multipart/form-data"';
}

// Process and save the uploaded profile picture
add_action('woocommerce_save_account_details', 'wpboilerplate_save_profile_picture', 10, 1);
function wpboilerplate_save_profile_picture($user_id)
{
    // Check if a file was uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['size'] > 0) {
        // Check file size (max 2MB)
        if ($_FILES['profile_picture']['size'] > 2000000) {
            wc_add_notice(__('Profile picture is too large. Maximum size is 2MB.', 'woocommerce'), 'error');
            return;
        }

        // Check file type
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($_FILES['profile_picture']['type'], $allowed_types)) {
            wc_add_notice(__('Invalid file type. Please upload a JPEG, PNG or GIF image.', 'woocommerce'), 'error');
            return;
        }

        // Include WordPress media handling functions
        if (!function_exists('wp_handle_upload')) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
        }

        // Handle the upload
        $upload = wp_handle_upload($_FILES['profile_picture'], ['test_form' => false]);

        // Check for upload errors
        if (isset($upload['error'])) {
            wc_add_notice($upload['error'], 'error');
            return;
        }

        // Save the image URL to user meta
        if (isset($upload['url'])) {
            update_user_meta($user_id, 'profile_picture', $upload['url']);
        }
    }
}

// Handle delete request through URL parameter
add_action('template_redirect', 'wpboilerplate_handle_profile_picture_delete');
function wpboilerplate_handle_profile_picture_delete()
{
    if (is_account_page() && !empty($_GET['delete_profile_picture']) && $_GET['delete_profile_picture'] === 'true') {
        $user_id = get_current_user_id();

        if ($user_id > 0) {
            // Delete the profile picture
            delete_user_meta($user_id, 'profile_picture');

            // Add success message
            wc_add_notice(__('Your profile picture has been removed.', 'woocommerce'), 'success');

            // Redirect back to the account page to remove the query parameter
            wp_safe_redirect(wc_get_account_endpoint_url('edit-account'));
            exit;
        }
    }
}

// Shop Page Redirect
add_action('template_redirect', function () {
    $request_uri = $_SERVER['REQUEST_URI'];

    if (strpos($request_uri, '/shop/') !== false) {
        $category_slug = explode('/shop/', $request_uri,)[1];

        wp_safe_redirect(home_url('/product-category/' . $category_slug . '/'), 301);
        exit;
    }
});


// Optional: Display the profile picture in other areas
add_filter('get_avatar', 'wpboilerplate_custom_avatar', 10, 6);
function wpboilerplate_custom_avatar($avatar, $id_or_email, $size, $default, $alt, $args)
{
    // Only process for logged-in user
    if (!is_numeric($id_or_email) && !is_object($id_or_email)) {
        if (is_email($id_or_email)) {
            $user = get_user_by('email', $id_or_email);
            if ($user) {
                $id_or_email = $user->ID;
            }
        } else {
            return $avatar;
        }
    }

    if (is_object($id_or_email) && isset($id_or_email->user_id)) {
        $id_or_email = $id_or_email->user_id;
    }

    if (is_numeric($id_or_email)) {
        $profile_picture = get_user_meta($id_or_email, 'profile_picture', true);
        if ($profile_picture) {
            $avatar = "<img alt='{$alt}' src='{$profile_picture}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' loading='lazy'/>";
        }
    }

    return $avatar;
}



// Search Products excluding tax price
add_action('wp_ajax_wpboilerplate_search_excluding_tax', 'wpboilerplate_search_price_excluding_tax');
add_action('wp_ajax_nopriv_wpboilerplate_search_excluding_tax', 'wpboilerplate_search_price_excluding_tax');

function wpboilerplate_search_price_excluding_tax()
{
    $product_id = isset($_REQUEST['product_id']) ? absint($_REQUEST['product_id']) : 0;

    $product = wc_get_product($product_id);

    $exc_price = wc_get_price_excluding_tax($product);

    wp_send_json($exc_price);
}

add_action('wp_footer', 'wpboilerplate_add_footer_scripts');
function wpboilerplate_add_footer_scripts()
{
?>
    <!-- Luigi's Box Script -->
    <script src="https://cdn.luigisbox.com/search.js" async></script>
    <script>
        // Function to get a specific cookie by name
        function wpboilerplateGetCookie(name) {
            // Add an equals sign to the cookie name for exact matching
            const cookieName = name + "=";
            // Get all cookies as a single string
            const cookieArray = document.cookie.split(';');

            // Loop through the cookies
            for (let i = 0; i < cookieArray.length; i++) {
                let cookie = cookieArray[i];
                // Remove leading spaces
                while (cookie.charAt(0) === ' ') {
                    cookie = cookie.substring(1);
                }
                // If this cookie starts with our target name, return its value
                if (cookie.indexOf(cookieName) === 0) {
                    return cookie.substring(cookieName.length, cookie.length);
                }
            }
            // Return empty string if cookie not found
            return "";
        }

        function WPBoilerplateLBInitSearch() {
            Luigis.Search({
                TrackerId: '580793-730969',
                Locale: 'en',
                Theme: 'boo',
                Size: 9,
                Facets: ['category', 'price_amount'],
                DefaultFilters: {
                    type: 'product'
                },
                PriceFilter: {
                    "symbol": "£"
                },
                QuicksearchTypes: ['category', 'brand'],
                UrlParamName: {
                    QUERY: 'q',
                },
                OnDone: function(query, results, emitAnalyticsEventFn) {
                    results.map(result => {

                        var excludeTax = wpboilerplateGetCookie('exclude_tax');

                        if ('yes' == excludeTax) {
                            var productId = result.attributes.id[0];

                            jQuery.ajax({
                                type: "POST",
                                url: woocommerce_params.ajax_url,
                                data: {
                                    action: "wpboilerplate_search_excluding_tax",
                                    product_id: productId
                                },
                                success: function(res) {
                                    console.log(res);
                                    if (res) {
                                        result.attributes.price_amount = res;
                                    }
                                }
                            });
                        }
                    })
                }
            }, '#product_search', '#search-ui');

            document.querySelector(".search-ui-wrapper").style.display = "block";
        }

        document.getElementById("product_search").addEventListener("input", function() {
            document.getElementById("wpboilerplate-product-search").dispatchEvent(new Event("submit", {
                cancelable: true
            }));

            document.querySelector(".search-ui-wrapper").style.display = "block";

            document.querySelector("header#masthead").style.position = 'fixed';
        });

        document.getElementById("product_search").addEventListener("blur", function() {
            document.querySelector("header#masthead").style.position = 'relative';
        });

        document.getElementById("wpboilerplate-product-search").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent page reload
            document.querySelector(".search-ui-wrapper").style.display = "block";
        });

        document.getElementById("product_search").addEventListener("focus", function(event) {
            event.preventDefault(); // Prevents focus behavior
            document.querySelector(".search-ui-wrapper").style.display = "block";
        }, true);
    </script>
<?php
}
