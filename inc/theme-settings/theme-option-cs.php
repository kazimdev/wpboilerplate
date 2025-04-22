<?php

/**
 * Theme Options
 * @package wpboilerplate
 * @since 1.0.0
 */

if (! defined('ABSPATH')) {
	exit(); // exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {

	$allowed_html = wpboilerplate()->kses_allowed_html(array('mark'));
	$prefix       = 'wpboilerplate';
	// Create options
	CSF::createOptions($prefix . '_theme_options', array(
		'menu_title'         => esc_html__('Theme Options', 'wpboilerplate'),
		'menu_slug'          => 'wpboilerplate_theme_options',
		'menu_parent'        => 'wpboilerplate_theme_options',
		'menu_type'          => 'submenu',
		'footer_credit'      => ' ',
		'menu_icon'          => 'fa fa-filter',
		'show_footer'        => false,
		'enqueue_webfont'    => false,
		'show_search'        => true,
		'show_reset_all'     => true,
		'show_reset_section' => true,
		'show_all_options'   => false,
		'theme'              => 'dark',
		'framework_title'    => wpboilerplate()->get_theme_info('name')
	));

	/*-------------------------------------------------------
		** General  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('General', 'wpboilerplate'),
		'id'    => 'general_options',
		'icon'  => 'fas fa-cogs',
	));
	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Preloader & SVG Enable', 'wpboilerplate'),
		'id'     => 'theme_general_preloader_options',
		'icon'   => 'fa fa-spinner',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Preloader ON / OFF', 'wpboilerplate'),
			),
			array(
				'id'      => 'enable_preloader',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Preloader', 'wpboilerplate'),
				'desc'    => esc_html__('If you want to enable or disable preloader you can set ( YES / NO )', 'wpboilerplate'),
				'default' => true,
			),
			array(
				'id'         => 'enable_custom_preloader',
				'type'       => 'switcher',
				'title'      => esc_html__('Add Custom Preloader ?', 'wpboilerplate'),
				'desc'       => esc_html__('If you want to add custom image for preloader you can set ( YES / NO )', 'wpboilerplate'),
				'default'    => false,
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'         => 'add_preloader_image',
				'type'       => 'media',
				'title'      => esc_html__('Add Custom Image', 'wpboilerplate'),
				'desc'       => esc_html__('Add the custom image for preloader.', 'wpboilerplate'),
				'library'    => 'image',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|', 'true|true'),
			),
			array(
				'id'         => 'preloader_style',
				'type'       => 'image_select',
				'class'      => 'preloader_section',
				'title'      => esc_html__('Select Preloader Style', 'wpboilerplate'),
				'desc'       => esc_html__('You can set specific preloader style in every page form here.', 'wpboilerplate'),
				'options'    => array(
					'style_3'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_3.png',
					'style_4'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_horizontal.gif',
					'style_5'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.gif',
					'style_6'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_spinner.svg',
					'style_7'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_square_circle.gif',
					'style_8'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loader_wave.gif',
					'style_9'  => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/loeader_square.gif',
					'style_10' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/wave_preloader.svg',
					'style_11' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/ajax_loader.svg',
					'style_12' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/audio.svg',
					'style_13' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/ball_triangle.svg',
					'style_14' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/bars.svg',
					'style_15' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/circle_pulse_rings.svg',
					'style_16' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/circle_tail_spin.svg',
					'style_17' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/circles.svg',
					'style_18' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/flip_circle.svg',
					'style_19' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/grid.svg',
					'style_20' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/heart.svg',
					'style_21' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/hearts_group.svg',
					'style_22' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/wpboilerplate.svg',
					'style_23' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/road_cross.svg',
					'style_24' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/round_circle.svg',
					'style_25' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/round_pulse.svg',
					'style_26' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/simple_spainer.svg',
					'style_27' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/spinner.svg',
					'style_28' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/spinning_circles.svg',
					'style_29' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/loader/three_dots.svg',
				),
				'default'    => 'style_22',
				'dependency' => array('enable_preloader|enable_custom_preloader', '==|==', 'true|false'),
			),
			array(
				'type'       => 'subheading',
				'content'    => esc_html__('Preloader Background & Color', 'wpboilerplate'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'                    => 'preloader_bg',
				'type'                  => 'background',
				'title'                 => esc_html__('Preloader Background', 'wpboilerplate'),
				'subtitle'              => esc_html__('Set the preloader background.', 'wpboilerplate'),
				'desc'                  => esc_html__('Set the preloader background color, image, transparent image and gradient color. If you set only first color field it will be a simple solid color for background and if set 2nd color field too it will be set a gradient color and if you set a image it will be set a background image.', 'wpboilerplate'),
				'background_image'      => true,
				'background_position'   => true,
				'background_repeat'     => true,
				'background_attachment' => true,
				'background_size'       => true,
				'background_gradient'   => true,
				'background_origin'     => true,
				'background_clip'       => true,
				'background_blend_mode' => true,
				'output'                => '.preloader',
				'default'               => array(
					'background-color'    => '#ffffff',
					'background-size'     => 'cover',
					'background-position' => 'center center',
					'background-repeat'   => 'repeat',
				),
				'dependency'            => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'         => 'preloader_text_color',
				'type'       => 'color',
				'title'      => esc_html__('Preloader Text Color', 'wpboilerplate'),
				'desc'       => esc_html__('Set the preloader text color', 'wpboilerplate'),
				'default'    => '#438FF9',
				'output'     => array('.wpboilerplate-preeloader', '.preloader-spinner'),
				'dependency' => array('enable_preloader', '==', 'true'),
			),
			array(
				'id'      => 'enable_svg_upload',
				'type'    => 'switcher',
				'title'   => esc_html__('Enable Svg Upload ?', 'wpboilerplate'),
				'desc'    => esc_html__('If you want to enable or disable svg upload you can set ( YES / NO )', 'wpboilerplate'),
				'default' => false,
			),
		)
	));

	/*-------------------------------------------------------
		   ** Typography  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'typography',
		'title'  => esc_html__('Typography', 'wpboilerplate'),
		'icon'   => 'fas fa-text-height',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Body Font Options', 'wpboilerplate') . '</h3>',
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'wpboilerplate'),
				'id'             => '_body_font',
				'default'        => array(
					'font-family' => 'inter',
					'font-size'   => '16',
					'line-height' => '26',
					'unit'        => 'px',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'line_height'    => false,
				'desc'           => wp_kses(__('you can set <mark>font</mark> for all html tags (if not use different heading font)', 'wpboilerplate'), $allowed_html),
			),
			array(
				'id'       => 'body_font_variant',
				'type'     => 'select',
				'title'    => esc_html__('Load Font Variant', 'wpboilerplate'),
				'multiple' => true,
				'chosen'   => true,
				'options'  => array(
					'300' => esc_html__('Light 300', 'wpboilerplate'),
					'400' => esc_html__('Regular 400', 'wpboilerplate'),
					'500' => esc_html__('Medium 500', 'wpboilerplate'),
					'600' => esc_html__('Semi Bold 600', 'wpboilerplate'),
					'700' => esc_html__('Bold 700', 'wpboilerplate'),
					'800' => esc_html__('Extra Bold 800', 'wpboilerplate'),
				),
				'default'  => array('400', '500', '700')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Heading Font Options', 'wpboilerplate') . '</h3>',
			),
			array(
				'type'    => 'switcher',
				'id'      => 'heading_font_enable',
				'title'   => esc_html__('Heading Font', 'wpboilerplate'),
				'desc'    => wp_kses(__('you can set <mark>yes</mark> to select different heading font', 'wpboilerplate'), $allowed_html),
				'default' => true
			),
			array(
				'type'           => 'typography',
				'title'          => esc_html__('Typography', 'wpboilerplate'),
				'id'             => 'heading_font',
				'default'        => array(
					'font-family' => 'inter',
					'type'        => 'google',
				),
				'color'          => false,
				'subset'         => false,
				'text_align'     => false,
				'text_transform' => false,
				'letter_spacing' => false,
				'font_size'      => false,
				'line_height'    => false,
				'desc'           => wp_kses(__('you can set <mark>font</mark> for  for heading tag .eg: h1,h2mh3,h4,h5,h6', 'wpboilerplate'), $allowed_html),
				'dependency'     => array('heading_font_enable', '==', 'true')
			),
			array(
				'id'         => 'heading_font_variant',
				'type'       => 'select',
				'title'      => esc_html__('Load Font Variant', 'wpboilerplate'),
				'multiple'   => true,
				'chosen'     => true,
				'options'    => array(
					'300' => esc_html__('Light 300', 'wpboilerplate'),
					'400' => esc_html__('Regular 400', 'wpboilerplate'),
					'500' => esc_html__('Medium 500', 'wpboilerplate'),
					'600' => esc_html__('Semi Bold 600', 'wpboilerplate'),
					'700' => esc_html__('Bold 700', 'wpboilerplate'),
					'800' => esc_html__('Extra Bold 800', 'wpboilerplate'),
				),
				'default'    => array('400', '500', '600', '700', '800'),
				'dependency' => array('heading_font_enable', '==', 'true')
			),
		)
	));

	/* Preloader */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Back To Top', 'wpboilerplate'),
		'id'     => 'theme_general_back_top_options',
		'icon'   => 'fa fa-arrow-up',
		'parent' => 'general_options',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Back Top Options', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'back_top_enable',
				'title'   => esc_html__('Back Top', 'wpboilerplate'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide back to top', 'wpboilerplate'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'back_top_icon',
				'title'      => esc_html__('Back Top Icon', 'wpboilerplate'),
				'type'       => 'icon',
				'default'    => 'fa fa-angle-up',
				'desc'       => wp_kses(__('you can set <mark>icon</mark> for back to top.', 'wpboilerplate'), $allowed_html),
				'dependency' => array('back_top_enable', '==', 'true')
			),
		)
	));

	/*----------------------------------
		Header & Footer Style
	-----------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Set Header & Footer Type', 'wpboilerplate'),
		'id'     => 'header_footer_style_options',
		'icon'   => 'eicon-banner',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Header Style', 'wpboilerplate'),
			),
			array(
				'id'      => 'navbar_type',
				'title'   => esc_html__('Navbar Type', 'wpboilerplate'),
				'type'    => 'image_select',
				'options' => array(
					'' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/header/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>navbar type</mark> it will show in every page except you select specific navbar type form page settings.', 'wpboilerplate'), $allowed_html),
			),
			array(
				'type'    => 'subheading',
				'content' => esc_html__('Global Footer Style', 'wpboilerplate'),
			),
			array(
				'id'      => 'footer_type',
				'title'   => esc_html__('Footer Type', 'wpboilerplate'),
				'type'    => 'image_select',
				'options' => array(
					'' => WPBOILERPLATE_THEME_SETTINGS_IMAGES . '/footer/01.png'
				),
				'default' => '',
				'desc'    => wp_kses(__('you can set <mark>footer type</mark> it will show in every page except you select specific navbar type form page settings.', 'wpboilerplate'), $allowed_html),
			),
		)
	));

	/*-------------------------------------------------------
	   ** Entire Site Header  Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'headers_settings',
		'title' => esc_html__('Headers', 'wpboilerplate'),
		'icon'  => 'fa fa-home'
	));
	/* Header Style 01 */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Header One', 'wpboilerplate'),
		'id'     => 'theme_header_one_options',
		'icon'   => 'fa fa-image',
		'parent' => 'headers_settings',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Logo Options', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'header_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'wpboilerplate'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'wpboilerplate'), $allowed_html),
			)
		)
	));

	/* Breadcrumb */
	CSF::createSection($prefix . '_theme_options', array(
		'title'  => esc_html__('Breadcrumb', 'wpboilerplate'),
		'id'     => 'breadcrumb_options',
		'icon'   => ' eicon-product-breadcrumbs',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Stock Title Options', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_stock_title',
				'type'    => 'text',
				'title'   => esc_html__('Chang Breadcrumb Stock Title', 'wpboilerplate'),
				'default' => esc_html__('WPBOILERPLATE', 'wpboilerplate'),
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Breadcrumb Options', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'breadcrumb_enable',
				'title'   => esc_html__('Breadcrumb', 'wpboilerplate'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'wpboilerplate'), $allowed_html),
				'default' => true,
			),
			array(
				'id'               => 'breadcrumb_bg',
				'title'            => esc_html__('Background Image', 'wpboilerplate'),
				'type'             => 'background',
				'desc'             => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'wpboilerplate'), $allowed_html),
				'default'          => array(
					'background-size'     => 'cover',
					'background-position' => 'center bottom',
					'background-repeat'   => 'no-repeat',
				),
				'background_color' => false,
				'dependency'       => array('breadcrumb_enable', '==', 'true')
			),
			array(
				'id'         => 'breadcrumb_bg_color',
				'title'      => esc_html__('Breadcrumb Background Color', 'wpboilerplate'),
				'type'       => 'color',
				'default'    => 'rgba(232,0,0, 0.6);',
				'desc'       => wp_kses(__('you can set <mark>overlay color</mark> for Breadcrumb background image', 'wpboilerplate'), $allowed_html),
				'dependency' => array('breadcrumb_enable', '==', 'true')
			),
		)
	));


	/*-------------------------------------------------------
		   ** Footer  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'title' => esc_html__('Footer', 'wpboilerplate'),
		'id'    => 'footer_options',
		'icon'  => ' eicon-footer',

	));

	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'footer_options',
		'id'     => 'footer_one_options',
		'title'  => esc_html__('Footer One', 'wpboilerplate'),
		'icon'   => 'fa fa-list-ul',
		'fields' => array(
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Settings', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'footer_one_logo',
				'type'    => 'media',
				'title'   => esc_html__('Logo', 'wpboilerplate'),
				'library' => 'image',
				'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'wpboilerplate'), $allowed_html),
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Social Item Settings', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'footer_social_icon',
				'type'    => 'switcher',
				'title'   => esc_html__('FOLLOW US', 'wpboilerplate'),
				'default' => true,
				'desc'    => wp_kses(__('you can <mark> show/hide</mark> navbar button of header two', 'wpboilerplate'), $allowed_html),
			),
			array(
				'id'         => 'footer_social_title',
				'type'       => 'text',
				'dependency' => array('footer_social_icon', '==', 'true'),
				'title'      => esc_html__('Footer Menu Title', 'wpboilerplate'),
				'default'    => esc_html__('Social Media', 'wpboilerplate'),
			),
			array(
				'id'         => 'footer_social_repeater',
				'type'       => 'repeater',
				'title'      => esc_html__('Social Item Repeater', 'wpboilerplate'),
				'dependency' => array('footer_social_icon', '==', 'true'),
				'fields'     => array(
					array(
						'id'      => 'footer_social_icon_item_icon',
						'type'    => 'media',
						'title'   => esc_html__('Logo', 'wpboilerplate'),
						'library' => 'image',
						'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'wpboilerplate'), $allowed_html),
					),
					array(
						'id'      => 'footer_social_icon_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Social URL', 'wpboilerplate'),
						'default' => '#'
					),
				)
			),
			array(
				'id'      => 'footer_one_downloadable_menu_item_title',
				'type'    => 'text',
				'title'   => esc_html__('Footer Customer Service Menu Title', 'wpboilerplate'),
				'default' => esc_html__('CUSTOMER SERVICE', 'wpboilerplate'),
			),
			array(
				'id'     => 'footer_downloadable_menu_repeater',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Customer Service Menu Repeater', 'wpboilerplate'),
				'fields' => array(
					array(
						'id'      => 'footer_downloadable_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Customer Service Menu Title', 'wpboilerplate'),
						'default' => esc_html__('Home', 'wpboilerplate'),
					),
					array(
						'id'      => 'footer_downloadable_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'wpboilerplate'),
						'default' => '#'
					),
				)
			),
			array(
				'id'      => 'footer_one_company_menu_item_title',
				'type'    => 'text',
				'title'   => esc_html__('Footer Company Menu Widget Title', 'wpboilerplate'),
				'default' => esc_html__('CONTACT INFO', 'wpboilerplate'),
			),
			array(
				'id'     => 'footer_company_menu_repeater',
				'type'   => 'repeater',
				'title'  => esc_html__('Footer Contact Info Repeater', 'wpboilerplate'),
				'fields' => array(
					array(
						'id'      => 'footer_contact_item_icon',
						'type'    => 'media',
						'title'   => esc_html__('Icon/Image', 'wpboilerplate'),
						'library' => 'image',
						'desc'    => wp_kses(__('you can upload <mark> logo</mark> here it will overwrite customizer uploaded logo', 'wpboilerplate'), $allowed_html),
					),
					array(
						'id'      => 'footer_company_menu_item_title',
						'type'    => 'text',
						'title'   => esc_html__('Footer Menu Title', 'wpboilerplate'),
						'default' => esc_html__('Home', 'wpboilerplate'),
					),
					array(
						'id'      => 'footer_company_menu_item_url',
						'type'    => 'text',
						'title'   => esc_html__('Menu URL', 'wpboilerplate'),
						'default' => '#'
					),
				)
			),
			array(
				'id'      => 'footer_one_quick_links_menu_item_title',
				'type'    => 'text',
				'title'   => esc_html__('Footer Subscribe Newsletter Widget Title', 'wpboilerplate'),
				'default' => esc_html__('SUBSCRIBE NEWSLETTER', 'wpboilerplate'),
			),
			array(
				'id'      => 'footer_quick_links_description',
				'type'    => 'text',
				'title'   => esc_html__('Footer Subscribe Newsletter Description', 'wpboilerplate'),
				'default' => esc_html__('Get all the latest information on Events, Sales and Offers.', 'wpboilerplate'),
			),
			array(
				'id'      => 'footer_newsletter_shortcode',
				'type'    => 'textarea',
				'title'   => esc_html__('Newsletter Shortcode', 'wpboilerplate'),
				'default' => ''
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Settings One', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'footer_one_spacing',
				'title'   => esc_html__('Footer Spacing', 'wpboilerplate'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to set footer spacing', 'wpboilerplate'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'footer_one_top_spacing',
				'title'      => esc_html__('Footer Top Spacing', 'wpboilerplate'),
				'type'       => 'slider',
				'desc'       => wp_kses(__('you can set <mark>padding</mark> for footer top', 'wpboilerplate'), $allowed_html),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 100,
				'dependency' => array('footer_one_spacing', '==', 'true')
			),
			array(
				'id'         => 'footer_one_bottom_spacing',
				'title'      => esc_html__('Footer Bottom Spacing', 'wpboilerplate'),
				'type'       => 'slider',
				'desc'       => wp_kses(__('you can set <mark>padding</mark> for footer bottom', 'wpboilerplate'), $allowed_html),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 0,
				'dependency' => array('footer_one_spacing', '==', 'true')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('Footer Copyright Area Options', 'wpboilerplate') . '</h3>'
			),
			array(
				'id'      => 'copyright_one_area_spacing',
				'title'   => esc_html__('Copyright Area Spacing', 'wpboilerplate'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to set copyright area spacing', 'wpboilerplate'), $allowed_html),
				'default' => true,
			),
			array(
				'id'    => 'copyright_text',
				'title' => esc_html__('Copyright Area Text', 'wpboilerplate'),
				'type'  => 'textarea',
				'desc'  => wp_kses(__('use  <mark>{copy}</mark> for copyright symbol, use <mark>{year}</mark> for current year, ', 'wpboilerplate'), $allowed_html)
			),
			array(
				'id'         => 'copyright_one_area_top_spacing',
				'title'      => esc_html__('Copyright Area Top Spacing', 'wpboilerplate'),
				'type'       => 'slider',
				'desc'       => wp_kses(__('you can set <mark>padding</mark> for copyright area top', 'wpboilerplate'), $allowed_html),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 60,
				'dependency' => array('copyright_one_area_spacing', '==', 'true')
			),
			array(
				'id'         => 'copyright_one_area_bottom_spacing',
				'title'      => esc_html__('Copyright Area Bottom Spacing', 'wpboilerplate'),
				'type'       => 'slider',
				'desc'       => wp_kses(__('you can set <mark>padding</mark> for copyright area bottom', 'wpboilerplate'), $allowed_html),
				'min'        => 0,
				'max'        => 500,
				'step'       => 1,
				'unit'       => 'px',
				'default'    => 60,
				'dependency' => array('copyright_one_area_spacing', '==', 'true')
			),
		)
	));


	/*-------------------------------------------------------
		  ** Blog  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'blog_settings',
		'title' => esc_html__('Blog Settings', 'wpboilerplate'),
		'icon'  => 'fa fa-book'
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_post_options',
		'title'  => esc_html__('Blog Post', 'wpboilerplate'),
		'icon'   => 'fa fa-list-ul',
		'fields' => WPBoilerplate_Group_Fields::post_meta('blog_post', esc_html__('Blog Page', 'wpboilerplate'))
	));
	CSF::createSection($prefix . '_theme_options', array(
		'parent' => 'blog_settings',
		'id'     => 'blog_single_post_options',
		'title'  => esc_html__('Single Post', 'wpboilerplate'),
		'icon'   => 'fa fa-list-alt',
		'fields' => WPBoilerplate_Group_Fields::post_meta('blog_single_post', esc_html__('Blog Single Page', 'wpboilerplate'))
	));


	/*-------------------------------------------------------
		  ** Pages & templates Options
   --------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'    => 'pages_and_template',
		'title' => esc_html__('Pages Settings', 'wpboilerplate'),
		'icon'  => 'fa fa-files-o'
	));
	/*  404 page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => '404_page',
		'title'  => esc_html__('404 Page', 'wpboilerplate'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-exclamation-triangle',
		'fields' => array(
			array(
				'id'      => 'error_bg_switch',
				'title'   => esc_html__('404 Image Enable', 'wpboilerplate'),
				'type'    => 'switcher',
				'desc'    => wp_kses(__('you can set <mark>Yes / No</mark> to show/hide breadcrumb', 'wpboilerplate'), $allowed_html),
				'default' => true,
			),
			array(
				'id'         => 'error_bg',
				'title'      => esc_html__('404 Image', 'wpboilerplate'),
				'type'       => 'media',
				'desc'       => wp_kses(__('you can set <mark>background</mark> for breadcrumb', 'wpboilerplate'), $allowed_html),
				'dependency' => array('error_bg_switch', '==', 'true')
			),
			array(
				'type'    => 'subheading',
				'content' => '<h3>' . esc_html__('404 Page Options', 'wpboilerplate') . '</h3>',
			),
			array(
				'id'      => '404_bg_color',
				'type'    => 'color',
				'title'   => esc_html__('Page Background Color', 'wpboilerplate'),
				'default' => '#ffffff'
			),
			array(
				'id'         => '404_title',
				'title'      => esc_html__('Title', 'wpboilerplate'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>title</mark> of 404 page', 'wpboilerplate'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Sorry! The Page Not Found', 'wpboilerplate'))
			),
			array(
				'id'         => '404_paragraph',
				'title'      => esc_html__('Paragraph', 'wpboilerplate'),
				'type'       => 'textarea',
				'info'       => wp_kses(__('you can change <mark>paragraph</mark> of 404 page', 'wpboilerplate'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('Oops! The page you are looking for does not exit. it might been moved or deleted.', 'wpboilerplate'))
			),
			array(
				'id'         => '404_button_text',
				'title'      => esc_html__('Button Text', 'wpboilerplate'),
				'type'       => 'text',
				'info'       => wp_kses(__('you can change <mark>button text</mark> of 404 page', 'wpboilerplate'), $allowed_html),
				'attributes' => array('placeholder' => esc_html__('back to home', 'wpboilerplate'))
			),
			array(
				'id'      => '404_spacing_top',
				'title'   => esc_html__('Page Spacing Top', 'wpboilerplate'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Top</mark> for page content area.', 'wpboilerplate'), $allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
			array(
				'id'      => '404_spacing_bottom',
				'title'   => esc_html__('Page Spacing Bottom', 'wpboilerplate'),
				'type'    => 'slider',
				'desc'    => wp_kses(__('you can set <mark>Padding Bottom</mark> for page content area.', 'wpboilerplate'), $allowed_html),
				'min'     => 0,
				'max'     => 500,
				'step'    => 1,
				'unit'    => 'px',
				'default' => 120,
			),
		)
	));

	/*  blog page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'blog_page',
		'title'  => esc_html__('Blog Page', 'wpboilerplate'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => WPBoilerplate_Group_Fields::page_layout_options(esc_html__('Blog', 'wpboilerplate'), 'blog')
	));
	/*  blog single page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'blog_single_page',
		'title'  => esc_html__('Blog Single Page', 'wpboilerplate'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-indent',
		'fields' => WPBoilerplate_Group_Fields::page_layout_options(esc_html__('Blog Single', 'wpboilerplate'), 'blog_single')
	));
	/*  archive page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'archive_page',
		'title'  => esc_html__('Archive Page', 'wpboilerplate'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-archive',
		'fields' => WPBoilerplate_Group_Fields::page_layout_options(esc_html__('Archive', 'wpboilerplate'), 'archive')
	));
	/*  search page options */
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'search_page',
		'title'  => esc_html__('Search Page', 'wpboilerplate'),
		'parent' => 'pages_and_template',
		'icon'   => 'fa fa-search',
		'fields' => WPBoilerplate_Group_Fields::page_layout_options(esc_html__('Search', 'wpboilerplate'), 'search')
	));

	/*-------------------------------------------------------
		   ** Backup  Options
	--------------------------------------------------------*/
	CSF::createSection($prefix . '_theme_options', array(
		'id'     => 'backup',
		'title'  => esc_html__('Import / Export', 'wpboilerplate'),
		'icon'   => 'eicon-export-kit',
		'fields' => array(
			array(
				'type'    => 'notice',
				'style'   => 'warning',
				'content' => esc_html__('You can save your current options. Download a Backup and Import.', 'wpboilerplate'),
			),
			array(
				'type'  => 'backup',
				'title' => esc_html__('Backup & Import', 'wpboilerplate')
			)
		)
	));
}
