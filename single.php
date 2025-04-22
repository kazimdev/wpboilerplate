<?php

/**
 * Blog Single Template
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wpboilerplate
 */

get_header();
$wpboilerplate = wpboilerplate();
$page_layout_meta = WPBoilerplate_Group_Fields_Value::page_layout_options('blog_single');
$full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
if ($wpboilerplate->is_wpboilerplate_core_active()) {
    wpboilerplate_core()->setPostViews(get_the_ID());
}
?>
<div id="primary" class="content-area blog-content-page padding-bottom-120 padding-top-25 <?php echo esc_attr($full_width_class); ?>">
    <main id="main" class="site-main">
        <div class="container custom-container">
            <div class="row">
                <div class="post-menu-item-list"><a href="/ar-blog">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <g clip-path="url(#clip0_47_1631)">
                                <path d="M5 12H19" stroke="#0F0E0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 12L11 18" stroke="#0F0E0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M5 12L11 6" stroke="#0F0E0E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </g>
                            <defs>
                                <clipPath id="clip0_47_1631">
                                    <rect width="24" height="24" fill="white" />
                                </clipPath>
                            </defs>
                        </svg> All Blogs</a>
                </div>
                <?php
                if (has_post_thumbnail() || !empty($post_meta_gallery)):
                    $get_post_format = get_post_format();
                    if ('video' == $get_post_format || 'gallery' == $get_post_format) {
                        get_template_part('template-parts/content/thumbnail', $get_post_format);
                    } else {
                        get_template_part('template-parts/content/thumbnail');
                    }
                endif;
                ?>
                <div class="<?php echo esc_attr($page_layout_meta['content_column_class']); ?>">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/content', 'single');
                    endwhile; // End of the loop.
                    ?>
                </div>
                <?php if ($page_layout_meta['sidebar_enable']): ?>
                    <div class="<?php echo esc_attr($page_layout_meta['sidebar_column_class']); ?>">
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
