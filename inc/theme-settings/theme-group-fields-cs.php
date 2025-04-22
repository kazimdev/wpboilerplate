<?php

/**
 *Theme Group Fields
 * @package wpboilerplate
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}


if (!class_exists('WPBoilerplate_Group_Fields')) {

    class WPBoilerplate_Group_Fields
    {

        /**
         * $instance
         * @since 1.0.0
         */
        private static $instance;


        /**
         * construct()
         * @since 1.0.0
         */
        public function __construct() {}

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
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout()
        {
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => esc_html__('Page Layouts & Colors Options', 'wpboilerplate'),
                ),
                array(
                    'id' => 'page_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'wpboilerplate'),
                    'options' => array(
                        'default' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/default.png',
                        'left-sidebar' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'right-sidebar' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'blank' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/blank.png',
                    ),
                    'default' => 'default'
                ),
                array(
                    'id' => 'page_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'wpboilerplate'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Background Color', 'wpboilerplate'),
                    'default' => '#ffffff'
                ),
                array(
                    'id' => 'page_content_text_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Content Text Color', 'wpboilerplate'),
                    'default' => '#5f5f5f'
                )

            );

            return $fields;
        }

        /**
         * Page container options
         * @since 1.0.0
         */
        public static function Page_Container_Options($type)
        {
            $fields = array();
            $allowed_html = wpboilerplate()->kses_allowed_html(array('mark'));
            if ('header_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Header, Footer & Breadcrumb Options', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'page_title',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Title', 'wpboilerplate'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page title.', 'wpboilerplate'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'wpboilerplate'),
                        'text_off' => esc_html__('No', 'wpboilerplate'),
                        'default' => true
                    ),
                    array(
                        'id' => 'page_breadcrumb',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Breadcrumb', 'wpboilerplate'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show/hide page breadcrumb.', 'wpboilerplate'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'wpboilerplate'),
                        'text_off' => esc_html__('No', 'wpboilerplate'),
                        'default' => true
                    ),
                    array(
                        'id' => 'navbar_type',
                        'title' => esc_html__('Navbar Type', 'wpboilerplate'),
                        'type' => 'image_select',
                        'options' => array(
                            '' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/header/01.png'
                        ),
                        'default' => '',
                        'desc' => wp_kses(__('you can set <mark>navbar type</mark> transparent type or solid background.', 'wpboilerplate'), $allowed_html),
                    ),
                    array(
                        'id' => 'footer_type',
                        'title' => esc_html__('Footer Type', 'wpboilerplate'),
                        'type' => 'image_select',
                        'options' => array(
                            '' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/footer/01.png'
                        ),
                        'default' => '',
                        'desc' => wp_kses(__('you can set <mark>footer type</mark> transparent type or solid background.', 'wpboilerplate'), $allowed_html),
                    ),

                );
            } elseif ('container_options' == $type) {
                $fields = array(
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Width & Padding Options', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'page_container',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Full Width', 'wpboilerplate'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page container full width.', 'wpboilerplate'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'wpboilerplate'),
                        'text_off' => esc_html__('No', 'wpboilerplate'),
                        'default' => false
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Spacing Options', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'page_spacing_top',
                        'title' => esc_html__('Page Spacing Top', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page container.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'id' => 'page_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page container.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 120,
                    ),
                    array(
                        'type' => 'subheading',
                        'content' => esc_html__('Page Content Spacing Options', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'page_content_spacing',
                        'type' => 'switcher',
                        'title' => esc_html__('Page Content Spacing', 'wpboilerplate'),
                        'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to set page content spacing.', 'wpboilerplate'), $allowed_html),
                        'text_on' => esc_html__('Yes', 'wpboilerplate'),
                        'text_off' => esc_html__('No', 'wpboilerplate'),
                        'default' => false
                    ),
                    array(
                        'id' => 'page_content_spacing_top',
                        'title' => esc_html__('Page Spacing Bottom', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_bottom',
                        'title' => esc_html__('Page Spacing Bottom', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_left',
                        'title' => esc_html__('Page Spacing Left', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Left</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                    array(
                        'id' => 'page_content_spacing_right',
                        'title' => esc_html__('Page Spacing Right', 'wpboilerplate'),
                        'type' => 'slider',
                        'desc' => wp_kses(__('you can set <mark>Padding Right</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                        'min' => 0,
                        'max' => 500,
                        'step' => 1,
                        'unit' => 'px',
                        'default' => 0,
                        'dependency' => array('page_content_spacing', '==', 'true')
                    ),
                );
            }

            return $fields;
        }


        /**
         * Page layout options
         * @since 1.0.0
         */
        public static function page_layout_options($title, $prefix)
        {
            $allowed_html = wpboilerplate()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Page Options', 'wpboilerplate') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_layout',
                    'type' => 'image_select',
                    'title' => esc_html__('Select Page Layout', 'wpboilerplate'),
                    'options' => array(
                        'right-sidebar' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/right-sidebar.png',
                        'left-sidebar' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/left-sidebar.png',
                        'no-sidebar' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/page/no-sidebar.png',
                    ),
                    'default' => 'right-sidebar'
                ),
                array(
                    'id' => $prefix . '_bg_color',
                    'type' => 'color',
                    'title' => esc_html__('Page Background Color', 'wpboilerplate'),
                    'default' => '#fff'
                ),
                array(
                    'id' => $prefix . '_spacing_top',
                    'title' => esc_html__('Page Spacing Top', 'wpboilerplate'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
                array(
                    'id' => $prefix . '_spacing_bottom',
                    'title' => esc_html__('Page Spacing Bottom', 'wpboilerplate'),
                    'type' => 'slider',
                    'desc' => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'wpboilerplate'), $allowed_html),
                    'min' => 0,
                    'max' => 500,
                    'step' => 1,
                    'unit' => 'px',
                    'default' => 120,
                ),
            );

            return $fields;
        }

        /**
         * Post meta
         * @since 1.0.0
         */
        public static function post_meta($prefix, $title)
        {
            $allowed_html = wpboilerplate()->kses_allowed_html(array('mark'));
            $fields = array(
                array(
                    'type' => 'subheading',
                    'content' => '<h3>' . $title . esc_html__(' Post Options', 'wpboilerplate') . '</h3>',
                ),
                array(
                    'id' => $prefix . '_posted_by',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted By', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted by.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                )
            );

            if ('blog_post' == $prefix) {
                $fields[] = array(
                    'id' => $prefix . '_posted_cat',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Read More Button', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide read more button.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_readmore_btn_text',
                    'type' => 'text',
                    'title' => esc_html__('Read More Text', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'wpboilerplate'), $allowed_html),
                    'default' => esc_html__('Read More', 'wpboilerplate'),
                    'dependency' => array($prefix . '_readmore_btn', '==', 'true')
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_more',
                    'type' => 'text',
                    'title' => esc_html__('Excerpt More', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set read more <mark>button text</mark> to button text.', 'wpboilerplate'), $allowed_html),
                    'attributes' => array(
                        'placeholder' => esc_html__('....', 'wpboilerplate')
                    )
                );
                $fields[] = array(
                    'id' => $prefix . '_excerpt_length',
                    'type' => 'select',
                    'options' => array(
                        '25' => esc_html__('Short', 'wpboilerplate'),
                        '55' => esc_html__('Regular', 'wpboilerplate'),
                        '100' => esc_html__('Long', 'wpboilerplate'),
                    ),
                    'title' => esc_html__('Excerpt Length', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark> excerpt length</mark> for post.', 'wpboilerplate'), $allowed_html),
                );
            } elseif ('blog_single_post' == $prefix) {

                $fields[] = array(
                    'id' => $prefix . '_posted_category',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Category', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide posted category.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_tag',
                    'type' => 'switcher',
                    'title' => esc_html__('Posted Tags', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post tags.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_posted_share',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Share', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post share.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_post_navigation',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_next_post_nav_btn',
                    'type' => 'switcher',
                    'title' => esc_html__('Post Navigation With Image', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide post navigation button.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_get_related_post',
                    'type' => 'switcher',
                    'title' => esc_html__('Get Related Post', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide get related post button.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
                $fields[] = array(
                    'id' => $prefix . '_author_bio',
                    'type' => 'switcher',
                    'title' => esc_html__('Author Bio', 'wpboilerplate'),
                    'desc' => wp_kses(__('you can set <mark>ON / OFF</mark> to show / hide author bio button.', 'wpboilerplate'), $allowed_html),
                    'text_on' => esc_html__('Yes', 'wpboilerplate'),
                    'text_off' => esc_html__('No', 'wpboilerplate'),
                    'default' => true
                );
            }

            return $fields;
        }
    } //end class

}//end if
