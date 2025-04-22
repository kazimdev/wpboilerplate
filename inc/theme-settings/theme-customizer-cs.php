<?php

/*
 * Theme Customize Options
 * @package wpboilerplate
 * @since 1.0.0
 * */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {
    $prefix = 'wpboilerplate';

    CSF::createCustomizeOptions($prefix . '_customize_options');
    /*-------------------------------------
        ** Theme Main panel
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('WPBoilerplate Options', 'wpboilerplate'),
        'id' => 'wpboilerplate_main_panel',
        'priority' => 11,
    ));


    /*-------------------------------------
        ** Theme Main Color
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('01. Main Color', 'wpboilerplate'),
        'priority' => 10,
        'parent' => 'wpboilerplate_main_panel',
        'fields' => array(
            array(
                'id' => 'main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Main Color One', 'wpboilerplate'),
                'default' => '#884DF8',
                'desc' => esc_html__('This is theme primary color one, means it will affect most of elements that have default color of our theme primary color', 'wpboilerplate')
            ),
            array(
                'id' => 'secondary_color',
                'type' => 'color',
                'title' => esc_html__('Theme Secondary Color', 'wpboilerplate'),
                'default' => '#276A55',
                'desc' => esc_html__('This is theme secondary color, means it\'ll affect most of elements that have default color of our theme secondary color', 'wpboilerplate')
            ),
            array(
                'id' => 'heading_color',
                'type' => 'color',
                'title' => esc_html__('Theme Heading Color', 'wpboilerplate'),
                'default' => '#1B0832',
                'desc' => esc_html__('This is theme heading color, means it\'ll affect all of heading tag like, h1,h2,h3,h4,h5,h6', 'wpboilerplate')
            ),
            array(
                'id' => 'paragraph_color',
                'type' => 'color',
                'title' => esc_html__('Theme Paragraph Color', 'wpboilerplate'),
                'default' => '#2D3139',
                'desc' => esc_html__('This is theme paragraph color, means it\'ll affect all of body/paragraph tag like, p,li,a etc', 'wpboilerplate')
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Header Options
    -------------------------------------*/

    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('02. Header One Options', 'wpboilerplate'),
        'parent' => 'wpboilerplate_main_panel',
        'priority' => 11,
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Nav Bar Options', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'header_01_nav_bar_bg_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Background Color', 'wpboilerplate'),
                'default' => 'transparent'
            ),
            array(
                'id' => 'header_01_nav_bar_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Text Color', 'wpboilerplate'),
                'default' => ''
            ),
            array(
                'id' => 'header_01_nav_bar_hover_color',
                'type' => 'color',
                'title' => esc_html__('Nav Bar Hover Text Color', 'wpboilerplate'),
                'default' => '#884DF8'
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Options', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'header_01_dropdown_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Background Color', 'wpboilerplate'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_01_dropdown_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Text Color', 'wpboilerplate'),
                'default' => '#276A55'
            ),
            array(
                'id' => 'header_01_dropdown_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Border Color', 'wpboilerplate'),
                'default' => '#276A55'
            ),
            array(
                'id' => 'header_01_dropdown_hover_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Text Color', 'wpboilerplate'),
                'default' => '#fff'
            ),
            array(
                'id' => 'header_01_dropdown_hover_bg_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Hover Background Color', 'wpboilerplate'),
                'default' => '#276A55'
            ),
        )
    ));
    /*-------------------------------------
          ** Theme Sidebar Options
      -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('05. Sidebar', 'wpboilerplate'),
        'priority' => 13,
        'parent' => 'wpboilerplate_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Sidebar Options', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'sidebar_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Title Color', 'wpboilerplate'),
                'default' => '#276A55'
            ),
            array(
                'id' => 'sidebar_widget_title_bottom_border_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Border Color', 'wpboilerplate'),
                'default' => '#884DF8'
            ),
            array(
                'id' => 'sidebar_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Sidebar Widget Text Color', 'wpboilerplate'),
                'default' => '#2D3139'
            ),
        )
    ));
    /*-------------------------------------
        ** Theme Footer One Options
    -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
        'title' => esc_html__('06. Footer One', 'wpboilerplate'),
        'priority' => 14,
        'parent' => 'wpboilerplate_main_panel',
        'fields' => array(
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Options', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'footer_area_bg_color',
                'type' => 'color',
                'title' => esc_html__('Footer Background Color', 'wpboilerplate'),
                'default' => '#000000',
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer Widget Options', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'footer_widget_title_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Title Color', 'wpboilerplate'),
                'default' => '#276A55'
            ),
            array(
                'id' => 'footer_widget_text_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Color', 'wpboilerplate'),
                'default' => '#2D3139'
            ),
            array(
                'id' => 'footer_widget_text_hover_color',
                'type' => 'color',
                'title' => esc_html__('Footer Widget Text Hover Color', 'wpboilerplate'),
                'default' => '#884DF8'
            ),
        )
    ));
}//endif