<?php

/**
 * Theme Default Header
 * @package wpboilerplate
 * @since 1.0.0
 */

$search_icon = '<svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg"><rect width="32" height="32" rx="16" fill="white"/><path d="M23.5 23.5L18.5 18.5M8.5 14.3333C8.5 15.0994 8.65088 15.8579 8.94404 16.5657C9.23719 17.2734 9.66687 17.9164 10.2085 18.4581C10.7502 18.9998 11.3933 19.4295 12.101 19.7226C12.8087 20.0158 13.5673 20.1667 14.3333 20.1667C15.0994 20.1667 15.8579 20.0158 16.5657 19.7226C17.2734 19.4295 17.9164 18.9998 18.4581 18.4581C18.9998 17.9164 19.4295 17.2734 19.7226 16.5657C20.0158 15.8579 20.1667 15.0994 20.1667 14.3333C20.1667 13.5673 20.0158 12.8087 19.7226 12.101C19.4295 11.3933 18.9998 10.7502 18.4581 10.2085C17.9164 9.66687 17.2734 9.23719 16.5657 8.94404C15.8579 8.65088 15.0994 8.5 14.3333 8.5C13.5673 8.5 12.8087 8.65088 12.101 8.94404C11.3933 9.23719 10.7502 9.66687 10.2085 10.2085C9.66687 10.7502 9.23719 11.3933 8.94404 12.101C8.65088 12.8087 8.5 13.5673 8.5 14.3333Z" stroke="#4D5462" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

$vat_checked = (isset($_COOKIE['exclude_tax']) && $_COOKIE['exclude_tax'] == 'yes') ? 'checked' : '';
?>

<nav class="navbar navbar-area navbar-expand-lg navigation-style-01">
    <div class="container custom-container">
        <div class="responsive-mobile-menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#wpboilerplate_main_menu"
                aria-expanded="false" aria-label="<?php esc_attr__('Toggle navigation', 'wpboilerplate') ?>">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="logo-wrapper">
                <?php
                $header_one_logo = cs_get_option('header_one_logo');
                if (has_custom_logo() && empty($header_one_logo['id'])) {
                    the_custom_logo();
                } elseif (! empty($header_one_logo['id'])) {
                    printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $header_one_logo['url'], $header_one_logo['alt']);
                } else {
                    printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                }
                ?>
            </div>
        </div>

        <div id="wpboilerplate_main_menu">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'menu_class'     => 'navbar-nav',
                'container'      => 'div',
                'container_class' => 'collapse navbar-collapse',
                'container_id' => 'wpboilerplate_main_menu',
            ));
            ?>

            <?php if (!wp_is_mobile()) { ?>
                <form id="wpboilerplate-product-search" class="wpboilerplate-search-box hide-on-mobile">
                    <input type="text" name="product_search" id="product_search" placeholder="Search..." onfocus="WPBoilerplateLBInitSearch()" onkeyup="WPBoilerplateLBInitSearch()">
                    <span><?php echo $search_icon; ?></span>
                </form>
            <?php } ?>

            <div class="wpboilerplate-header-right">
                <?php
                if (is_plugin_active('woocommerce/woocommerce.php')) {
                    if (!wp_is_mobile()) {
                ?>
                        <label class="tax-switch" style="display: flex; align-items: center; cursor: pointer; margin-right: 24px;">
                            Exclude VAT
                            <input type="checkbox" id="tax_toggle"
                                style="margin-right: 5px;" <?php echo $vat_checked; ?>>
                            <span class="slider round"></span>
                        </label>
                    <?php } ?>

                    <!-- Wishlist Button -->
                    <?php if (is_plugin_active('yith-woocommerce-wishlist/init.php')) { ?>
                        <a href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>" class="wishlist-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M16.2201 3.32846C13.9854 1.95769 12.035 2.51009 10.8633 3.39001C10.3828 3.7508 10.1426 3.93119 10.0013 3.93119C9.85997 3.93119 9.6198 3.7508 9.1393 3.39001C7.96765 2.51009 6.01721 1.95769 3.7825 3.32846C0.849693 5.12745 0.186069 11.0624 6.95091 16.0695C8.2394 17.0232 8.88363 17.5 10.0013 17.5C11.119 17.5 11.7632 17.0232 13.0517 16.0695C19.8166 11.0624 19.1529 5.12745 16.2201 3.32846Z" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                            <span class="wishlist-count"><?php echo yith_wcwl_count_products(); ?></span>
                        </a>
                    <?php } ?>

                    <!-- Cart Button -->
                    <a href="<?php echo wc_get_cart_url(); ?>" class="cart-icon">
                        <svg width="45" height="36" viewBox="0 0 45 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M44.1199 7.0763L41.1473 1.93345C40.4582 0.740311 39.1827 0.00488281 37.8096 0.00488281H31.129L40.7822 16.7192L44.1199 10.9334C44.809 9.7403 44.809 8.26945 44.1199 7.0763Z" fill="#884DF8" />
                            <path d="M37.4464 22.4997C38.1356 21.3066 38.1356 19.8357 37.4464 18.6426L27.7984 1.93345C27.1093 0.740311 25.8339 0.00488281 24.4556 0.00488281H17.775L34.1036 28.2854L37.4413 22.4997H37.4464Z" fill="#884DF8" />
                            <path d="M20.7514 35.9994C22.8817 35.9994 24.6086 34.2725 24.6086 32.1423C24.6086 30.0121 22.8817 28.2852 20.7514 28.2852C18.6212 28.2852 16.8943 30.0121 16.8943 32.1423C16.8943 34.2725 18.6212 35.9994 20.7514 35.9994Z" fill="#884DF8" />
                            <path d="M34.1073 35.9994C36.2375 35.9994 37.9644 34.2725 37.9644 32.1423C37.9644 30.0121 36.2375 28.2852 34.1073 28.2852C31.977 28.2852 30.2501 30.0121 30.2501 32.1423C30.2501 34.2725 31.977 35.9994 34.1073 35.9994Z" fill="#884DF8" />
                            <path d="M14.4463 1.92857C13.7571 0.735428 12.4817 0 11.1086 0H4.428H0L4.45885 7.71428H8.8817L20.7565 28.2805L24.0994 22.4948C24.7885 21.3017 24.7885 19.8308 24.0994 18.6377L14.4463 1.92857Z" fill="#884DF8" />
                        </svg>

                        <span class="cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
                    </a>

                    <?php
                    // Check if user is logged in
                    if (is_user_logged_in()) {
                        $user_id            = get_current_user_id();

                        $profile_picture = get_user_meta($user_id, 'profile_picture', true);

                        $avatar_url         = get_avatar_url($user_id);

                        $current_user       = wp_get_current_user();
                        $user_name          = $current_user->display_name;
                        $author_archive_url = get_author_posts_url($user_id);
                    ?>
                        <div class="logged-in-user-wrap">
                            <div class="thumb">
                                <img class="avatar" src="<?php echo empty($profile_picture) ? esc_url($avatar_url) : esc_url($profile_picture); ?>" alt="User Avatar">
                            </div>
                            <div class="logged-in-user-info">
                                <a class="thumb" href="<?php echo home_url('my-account'); ?>">
                                    <img class="avatar" src="<?php echo empty($profile_picture) ? esc_url($avatar_url) : esc_url($profile_picture); ?>" alt="User Avatar">
                                </a>
                                <div class="content">
                                    <div class="logged-in-user-name">
                                        <a href="<?php echo home_url('my-account'); ?>">
                                            <?php echo esc_html($user_name); ?>
                                        </a>
                                    </div>
                                    <div class="user-profile">
                                        <?php if (is_user_logged_in()) { ?>
                                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                                title="<?php _e('My Account', 'woothemes'); ?>"><?php _e('My Account', 'woothemes'); ?></a>
                                        <?php } else { ?>
                                            <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>"
                                                title="<?php _e('Login / Register', 'woothemes'); ?>"><?php _e('Login / Register', 'woothemes'); ?></a>
                                        <?php } ?>
                                    </div>
                                    <a class="log-out-btn"
                                        href="<?php echo wp_logout_url(home_url()); ?>"><?php echo esc_html('Logout') ?></a>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>

                        <div class="btn-wrap">
                            <a href="<?php echo home_url('my-account'); ?>" class="boxed-btn login-btn" tabindex="0">Log in</a>
                        </div>
                <?php }
                } ?>
            </div>

        </div>
    </div>

    <div class="wpboilerplate-mega-menu container custom-container">
        <?php
        if (is_plugin_active('woocommerce/woocommerce.php')) {
            require_once __DIR__ . '/category-mega-menu.php';
        }
        ?>
    </div>

    <div class="wpboilerplate-mega-menu-mobile-overlay">
        <div class="wpboilerplate-mega-menu-mobile">
            <?php
            if (is_plugin_active('woocommerce/woocommerce.php')) {
                require_once __DIR__ . '/category-mega-menu-mobile.php';
            }

            if (wp_is_mobile()) {
            ?>
                <label class="tax-switch" style="display: flex; align-items: center; cursor: pointer; margin-right: 24px;">
                    Exclude VAT
                    <input type="checkbox" id="tax_toggle"
                        style="margin-right: 5px;" <?php echo $vat_checked; ?>>
                    <span class="slider round"></span>
                </label>
            <?php }
            ?>
        </div>
    </div>
</nav>

<?php if (wp_is_mobile()) { ?>
    <form class="wpboilerplate-search-box hide-on-desktop" id="wpboilerplate-product-search">
        <input type="text" name="product_search" id="product_search" placeholder="Search..." />
        <span><?php echo $search_icon; ?></span>
    </form>
<?php } ?>