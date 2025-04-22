<?php

/**
 * Theme Footer Widget Template
 * @package wpboilerplate
 * @since 1.0.0
 */
$copyright_text = !empty(cs_get_option('copyright_text')) ? cs_get_option('copyright_text') : esc_html__('© 2023 wpboilerplate | All right reserved ', 'wpboilerplate') . '<a href="' . esc_url('https://themeforest.net/user/themeim/portfolio') . '">' . esc_html__('Themeim', 'wpboilerplate') . '</a>';
$copyright_text = str_replace('{copy}', '&copy;', $copyright_text);
$copyright_text = str_replace('{year}', date('Y'), $copyright_text);
$socialIcon = cs_get_option('footer_social_repeater');
$footer_quick_links_menu_repeater = cs_get_option('footer_quick_links_menu_repeater');
$footer_company_menu = cs_get_option('footer_company_menu_repeater');
$footer_downloadable_menu = cs_get_option('footer_downloadable_menu_repeater');
?>
<div class="footer-section">
    <div class="custom-container container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm   margin-bottom">
                <div class="about-us-widget">
                    <?php
                    $footer_one_logo = cs_get_option('footer_one_logo');
                    if (has_custom_logo() && empty($footer_one_logo['id'])) {
                        the_custom_logo();
                    } elseif (!empty($footer_one_logo['id'])) {
                        printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', esc_url(get_home_url()), $footer_one_logo['url'], $footer_one_logo['alt']);
                    } else {
                        printf('<a class="site-title" href="%1$s">%2$s</a>', esc_url(get_home_url()), esc_html(get_bloginfo('title')));
                    }
                    ?>
                </div>
                <h4 class="widget-headline"> <?php echo cs_get_option('footer_social_title'); ?></h4>
                <ul class="social_share">
                    <?php
                    if (!empty($socialIcon)) :
                        foreach ($socialIcon as $icon) :
                            echo '<li class="single-info-item"><a href=" ' . $icon['footer_social_icon_item_url'] . ' ">
                                                <img src="' . $icon['footer_social_icon_item_icon']['url'] . '" alt="' . $icon['footer_social_icon_item_icon']['alt'] . '"/></a></li>';
                        endforeach;
                    endif;
                    ?>
                </ul>
            </div>
            <div class="col-lg-2 col-md-6 col-sm ">
                <div class="widget_nav_menu">
                    <h4
                        class="widget-headline"> <?php echo cs_get_option('footer_one_downloadable_menu_item_title'); ?></h4>
                    <div class="menu-about-menu-container">
                        <ul class="footer-list">
                            <?php
                            if (!empty($footer_downloadable_menu)) :
                                foreach ($footer_downloadable_menu as $menu) :
                                    echo '<li><a href=" ' . $menu['footer_downloadable_menu_item_url'] . ' ">
                                                ' . $menu['footer_downloadable_menu_item_title'] . '</a></li>';
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm ">
                <div class="widget_nav_menu style-01">
                    <h4
                        class="widget-headline"> <?php echo cs_get_option('footer_one_company_menu_item_title'); ?></h4>
                    <div class="menu-about-menu-container">
                        <ul class="footer-list">
                            <?php
                            if (!empty($footer_company_menu)) :
                                foreach ($footer_company_menu as $menu) :
                                    echo '<li><a href=" ' . $menu['footer_company_menu_item_url'] . ' "><img src="' . $menu['footer_contact_item_icon']['url'] . '" alt="' . $menu['footer_contact_item_icon']['alt'] . '"/>
                                                ' . $menu['footer_company_menu_item_title'] . '</a></li>';
                                endforeach;
                            endif;
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm ">
                <div class="widget_nav_menu">
                    <h4 class="widget-headline">
                        <?php echo cs_get_option('footer_one_quick_links_menu_item_title'); ?>
                    </h4>
                    <p>
                        <?php echo cs_get_option('footer_quick_links_description'); ?>
                    </p>
                    <div>
                        <?php
                        $nl_shortcode = cs_get_option('footer_newsletter_shortcode');;
                        echo do_shortcode($nl_shortcode); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap">
        <div class="container custom-container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-wrap-inner">
                        <div class="copyright-text">
                            <?php
                            echo wp_kses($copyright_text, wpboilerplate()->kses_allowed_html(array('a')));
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>