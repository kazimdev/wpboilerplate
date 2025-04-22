<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpboilerplate
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <?php
    do_action('wpboilerplate_after_body');
    $page_container_meta = WPBoilerplate_Group_Fields_Value::page_container('wpboilerplate', 'header_options');
    ?>

    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'wpboilerplate'); ?></a>
        <header id="masthead" class="site-header">
            <?php get_template_part('template-parts/header/header', 'style-01'); ?>
        </header><!-- #masthead -->
        <?php do_action('wpboilerplate_before_page_content') ?>
        <div id="content" class="site-content">
            <?php
            $page_layout_meta = WPBoilerplate_Group_Fields_Value::page_layout_options('ar_post_single');
            $full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
            ?>
            <div id="primary" class="content-area ar_post-details-page padding-bottom-120 padding-top-25 ">
                <main id="main" class="site-main">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="post-menu-item-list"><a href="/blog">

                                    جميع المدونات
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <g clip-path="url(#clip0_650_20418)">
                                            <path d="M19 12H5" stroke="#0F0E0E" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                            <path d="M19 12L13 18" stroke="#0F0E0E" stroke-width="1.5"
                                                stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M19 12L13 6" stroke="#0F0E0E" stroke-width="1.5" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_650_20418">
                                                <rect width="24" height="24" fill="white"
                                                    transform="matrix(-1 0 0 1 24 0)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </a>
                            </div>
                            <?php
                            if (has_post_thumbnail() && get_post_type() == 'ar_post') {
                            ?>
                                <div class="thumbnail">
                                    <?php
                                    wpboilerplate()->post_thumbnail('post-thumbnail');
                                    ?>
                                </div>
                            <?php
                            }
                            ?>


                            <?php if ($page_layout_meta['sidebar_enable']): ?>
                                <div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']); ?>">
                                    <?php
                                    if (is_active_sidebar('ar_post-sidebar')) {
                                        dynamic_sidebar('ar_post-sidebar');
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <div class="<?php echo esc_attr($page_layout_meta['content_column_class']); ?>">
                                <?php
                                while (have_posts()) :
                                    the_post();
                                    get_template_part('template-parts/content', 'ar_post-single');
                                    $ar_post_details_comment = cs_get_option('ar_post_details_comment_enable');
                                    if (!empty($ar_post_details_comment)) {
                                        // If comments are open or we have at least one comment, load up the comment template.
                                        if (comments_open() || get_comments_number() || get_option('thread_comments')) :
                                            comments_template();
                                        endif;
                                    }
                                endwhile; // End of the loop.
                                ?>
                            </div>

                        </div>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- #content -->
        <?php get_template_part('template-parts/footer/footer', 'style-01'); ?>

    </div><!-- #page -->

    <?php wp_footer(); ?>

</body>

</html>