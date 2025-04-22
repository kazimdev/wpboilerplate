<?php

/**
 * Theme Shortcodes Generator
 * @package wpboilerplate
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
	exit(); //exit if access it directly
}

// Control core classes for avoid errors
if (class_exists('CSF')) {
	$prefix = 'wpboilerplate';
	CSF::createShortcoder($prefix . '_shortcodes', array(
		'button_title'   => esc_html__('Add Shortcode', 'wpboilerplate'),
		'select_title'   => esc_html__('Select a shortcode', 'wpboilerplate'),
		'insert_title'   => esc_html__('Insert Shortcode', 'wpboilerplate')
	));

	/*------------------------------------
		Social Icon Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Social Icons', 'wpboilerplate'),
		'view'      => 'group',
		'shortcode' => 'wpboilerplate_social_icon_wrap',
		'fields' => [
			array(
				'id'      => 'custom_class',
				'type'    => 'text',
				'title'   => esc_html__('Custom Class', 'wpboilerplate'),
			)
		],
		'group_shortcode' => 'wpboilerplate_social_icon',
		'group_fields'    => array(
			array(
				'id'    => 'social_icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'wpboilerplate'),
			),
			array(
				'id'      => 'social_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'wpboilerplate'),
			)
		)
	));

	/*------------------------------------
		Top Menu Options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Top Menu', 'wpboilerplate'),
		'view'      => 'group',
		'shortcode' => 'wpboilerplate_top_menu_wrap',
		'group_shortcode' => 'wpboilerplate_top_menu',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'wpboilerplate'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'wpboilerplate'),
			)
		)
	));

	/*------------------------------------
      Info Menu Options
    -------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Info Menu', 'wpboilerplate'),
		'view'      => 'group',
		'shortcode' => 'wpboilerplate_top_menu_wrap_02',
		'group_shortcode' => 'wpboilerplate_top_menu_02',
		'group_fields'    => array(
			array(
				'id'    => 'top_menu_title_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'wpboilerplate'),
			),
			array(
				'id'    => 'top_menu_text',
				'type'  => 'text',
				'title' => esc_html__('Text', 'wpboilerplate'),
			),
			array(
				'id'      => 'top_menu_link',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'wpboilerplate'),
			)
		)
	));

	/*------------------------------------
		Inline info link options
	-------------------------------------*/
	CSF::createSection($prefix . '_shortcodes', array(
		'title'     => esc_html__('Inline Info Link', 'wpboilerplate'),
		'view'      => 'group',
		'shortcode' => 'wpboilerplate_info_item_wrap',
		'group_shortcode' => 'wpboilerplate_info_link',
		'group_fields'    => array(
			array(
				'id'    => 'icon',
				'type'  => 'icon',
				'title' => esc_html__('Icon', 'wpboilerplate'),
			),
			array(
				'id'      => 'text',
				'type'    => 'text',
				'title'   => esc_html__('Text', 'wpboilerplate'),
			),
			array(
				'id'      => 'url',
				'type'    => 'text',
				'title'   => esc_html__('URL', 'wpboilerplate'),
			)
		)
	));
}
