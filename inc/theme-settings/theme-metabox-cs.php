<?php

/**
 * Theme Metabox Options
 * @package wpboilerplate
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); // exit if access directly
}

if (class_exists('CSF')) {

    $allowed_html = wpboilerplate()->kses_allowed_html(array('mark'));

    $prefix = 'wpboilerplate';

    /*-------------------------------------
        Post Format Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_post_video_options', array(
        'title' => esc_html__('Video Post Format Options', 'wpboilerplate'),
        'post_type' => 'post',
        'post_formats' => 'video'
    ));
    CSF::createSection($prefix . '_post_video_options', array(
        'fields' => array(
            array(
                'id' => 'video_url',
                'type' => 'text',
                'title' => esc_html__('Enter Video URL', 'wpboilerplate'),
                'desc' => wp_kses(__('enter <mark>video url</mark> to show in frontend', 'wpboilerplate'), $allowed_html)
            )
        )
    ));
    CSF::createMetabox($prefix . '_post_gallery_options', array(
        'title' => esc_html__('Gallery Post Format Options', 'wpboilerplate'),
        'post_type' => 'post',
        'post_formats' => 'gallery'
    ));
    CSF::createSection($prefix . '_post_gallery_options', array(
        'fields' => array(
            array(
                'id' => 'gallery_images',
                'type' => 'gallery',
                'title' => esc_html__('Select Gallery Photos', 'wpboilerplate'),
                'desc' => wp_kses(__('select <mark>gallery photos</mark> to show in frontend', 'wpboilerplate'), $allowed_html)
            )
        )
    ));

    /*-------------------------------------
      Page Container Options
    -------------------------------------*/
    CSF::createMetabox($prefix . '_page_container_options', array(
        'title' => esc_html__('Page Options', 'wpboilerplate'),
        'post_type' => array('page'),
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Layout & Colors', 'wpboilerplate'),
        'icon' => 'fa fa-columns',
        'fields' => WPBoilerplate_Group_Fields::page_layout()
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Header Footer & Breadcrumb', 'wpboilerplate'),
        'icon' => 'fa fa-header',
        'fields' => WPBoilerplate_Group_Fields::Page_Container_Options('header_options')
    ));
    CSF::createSection($prefix . '_page_container_options', array(
        'title' => esc_html__('Width & Padding', 'wpboilerplate'),
        'icon' => 'fa fa-file-o',
        'fields' => WPBoilerplate_Group_Fields::Page_Container_Options('container_options')
    ));
    //	Service Meta Box
    CSF::createMetabox($prefix . '_team_options', array(
        'title' => esc_html__('Team Options', 'wpboilerplate'),
        'post_type' => 'team',
    ));
    CSF::createSection($prefix . '_team_options', array(
        'fields' => array(
            array(
                'id' => 'team_member_designation',
                'type' => 'text',
                'title' => esc_html__('Enter Team Member Designation', 'wpboilerplate'),
                'desc' => wp_kses(__('use <mark>{br}</mark> for break your designation', 'wpboilerplate'), $allowed_html),
                'default' => esc_html__('Managing Partner', 'wpboilerplate'),
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Team Member Social Link', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'team_member_social_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Team Member Social Repeater', 'wpboilerplate'),
                'fields' => array(
                    array(
                        'id' => 'team_member_social_image',
                        'type' => 'media',
                        'title' => esc_html__('Team Member Social Image', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'team_member_social_url',
                        'type' => 'text',
                        'title' => esc_html__('Social Link URL', 'wpboilerplate'),
                        'default' => '#'
                    ),
                )
            ),
            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Team Member Contact List', 'wpboilerplate') . '</h3>'
            ),
            array(
                'id' => 'team_member_contact_repeater',
                'type' => 'repeater',
                'title' => esc_html__('Team Member Contact Repeater', 'wpboilerplate'),
                'fields' => array(
                    array(
                        'id' => 'team_member_contact_image',
                        'type' => 'media',
                        'title' => esc_html__('Team Member Contact Image', 'wpboilerplate'),
                    ),
                    array(
                        'id' => 'team_member_contact_text',
                        'type' => 'text',
                        'title' => esc_html__('Contact Info Text', 'wpboilerplate'),
                        'default' => '#'
                    ),
                )
            ),
        )
    ));
}//endif