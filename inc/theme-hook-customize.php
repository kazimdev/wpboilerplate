<?php

/**
 * Theme Hooks Customize
 * @package wpboilerplate
 * @since 1.0.0
 */

if (!defined("ABSPATH")) {
    exit(); //exit if access directly
}

if (!class_exists('WPBoilerplate_Customize')) {

    class WPBoilerplate_Customize
    {
        /**
         * $instance
         * @since 1.0.0
         */
        protected static $instance;

        public function __construct()
        {
            //excerpt more
            add_action('excerpt_more', array($this, 'excerpt_more'));

            //preloader
            add_action('wpboilerplate_after_body', array($this, 'preloader'));

            //breadcrumb
            add_action('wpboilerplate_before_page_content', array($this, 'breadcrumb'));

            //back top
            add_action('wpboilerplate_after_body', array($this, 'back_top'));

            //order comment form
            add_filter('comment_form_fields', array($this, 'comment_fields_reorder'));

            // contact form 7
            add_filter('wpcf7_autop_or_not', '__return_false');
        }

        /**
         * getInstance()
         * @since 1.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }
            return self::$instance;
        }

        /**
         * Excerpt More
         * @since 1.0.0
         */
        public function excerpt_more($more)
        {
            $more = cs_get_option('blog_post_excerpt_more');
            return $more;
        }

        /**
         * Breadcrumb
         * @since 1.0.0
         */
        public function breadcrumb()
        {
            $page_id = wpboilerplate()->page_id();
            $check_page = (!is_home() && !is_front_page() && is_singular()) || is_search() || is_author() || is_404() || is_archive() ? true : false;
            $check_home_page = wpboilerplate()->is_home_page();
            $page_header_meta = WPBoilerplate_Group_Fields_Value::page_container('wpboilerplate', 'header_options');
            $header_variant_class = isset($page_header_meta['navbar_type']) ? 'navbar-' . $page_header_meta['navbar_type'] : 'navbar-default';
            $page_breadcrumb_enable = isset($page_header_meta['page_breadcrumb_enable']) && $page_header_meta['page_breadcrumb_enable'] ? $page_header_meta['page_breadcrumb_enable'] : false;
            $breadcrumb_enable = false;
            $header_variant_class .= !empty(cs_get_option('header_two_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-01' ? ' header-style-02-has-topbar ' : '';

            if (!empty(cs_get_option('header_four_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-03' && !empty(cs_get_option('header_four_top_bar_shortcode'))) {
                $header_variant_class .= ' header-style-04-has-topbar ';
            } elseif (!empty(cs_get_option('header_four_top_bar_shortcode')) && $page_header_meta['navbar_type'] == 'style-03' && empty(cs_get_option('header_four_top_bar_shortcode'))) {
                $header_variant_class .= ' header-style-04-no-topbar ';
            }

            if (!$check_home_page && !$check_page) {
                $breadcrumb_enable = true;
            } elseif (!$page_breadcrumb_enable && $check_page) {
                $breadcrumb_enable = true;
            }
            $breadcrumb_enable = !cs_get_switcher_option('breadcrumb_enable') ? false : $breadcrumb_enable;

            if (!$breadcrumb_enable) {
                return;
            }

?>
            <div class="breadcrumb-wrap <?php echo esc_attr($header_variant_class); ?>">
                <div class="container">
                    <div class="breadcrumb-content">
                        <?php

                        $right_arrow = '<svg width="8" height="12" viewBox="0 0 8 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.5 11L6.5 6L1.5 1" stroke="#6F7A93" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';

                        if (is_archive()) {
                            if (class_exists('WooCommerce') && is_shop()) {
                                printf('<h2 class="page-title">%1$s </h2>', str_replace("Archives: ", "", get_the_archive_title()));
                            } else {
                                the_archive_title('<h2 class="page-title">', '</h2>');
                            }
                        } elseif (is_404()) {
                            printf('<h2 class="page-title">%1$s</h2>', esc_html__('Error 404', 'wpboilerplate'));
                        } elseif (is_search()) {
                            printf('<h2 class="page-title">%1$s %2$s</h2>', esc_html__('Search Results for:', 'wpboilerplate'), get_search_query());
                        } elseif (is_singular('post')) {
                            printf('<h2 class="page-title"><a href="%1$s">Home </a>%2$s%3$s </h2>', home_url(), $right_arrow, get_the_title());
                        } elseif (is_singular('page')) {
                            if ($page_header_meta['page_title']) {
                                printf('<h2 class="page-title"><a href="%1$s">Home </a>%2$s%3$s </h2>', home_url(), $right_arrow, get_the_title($page_id));
                            }
                        } else {
                            printf('<h2 class="page-title"><a href="%1$s">Home </a>%2$s%3$s </h2>', home_url(), $right_arrow, get_the_title($page_id));
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php
        }

        /**
         * Preloader
         * @since 1.0.0
         */
        public function preloader()
        {
            $preloader_enable = cs_get_switcher_option('preloader_enable');
            if ('1' == cs_get_option('enable_preloader', true)) {
                get_template_part('template-parts/preloader');
            }
        ?>
        <?php
        }

        /**
         * Back top
         * @since 1.0.0
         */
        public function back_top()
        {
            $back_top_enable = cs_get_switcher_option('back_top_enable');
            $back_top_icon = cs_get_option('back_top_icon') ? cs_get_option('back_top_icon') : 'fas fa-angle-up';
            if (!$back_top_enable) {
                return;
            }
        ?>
            <div class="back-to-top">
                <span class="back-top">🡩</span>
            </div>
<?php
        }

        /**
         * Reorder comments form
         * @since 1.0.0
         */
        public function comment_fields_reorder($fileds)
        {
            $comment_filed = $fileds['comment'];
            unset($fileds['comment']);
            $fileds['comment'] = $comment_filed;

            if (isset($fileds['cookies'])) {
                $comment_cookies = $fileds['cookies'];
                unset($fileds['cookies']);
                $fileds['cookies'] = $comment_cookies;
            }

            return $fileds;
        }
    } //end class

    if (class_exists('WPBoilerplate_Customize')) {
        WPBoilerplate_Customize::getInstance();
    }
}
