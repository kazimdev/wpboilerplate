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
            <?php
            $job_single_meta_data = get_post_meta(get_the_ID(), 'wpboilerplate_job_options', true);
            $is_arabic = $job_single_meta_data['set_arabic'];
            $job_type = $job_single_meta_data['job_type'];
            $job_location = $job_single_meta_data['job_location'];
            $job_apply_btn_url = $job_single_meta_data['job_apply_btn_url'];

            $cats = get_the_terms(get_the_ID(), 'job_cat');
            if ($is_arabic) {
                get_template_part('template-parts/header/header', 'style-01');
            } else {
                get_template_part('template-parts/header/header', '');
            } ?>
        </header><!-- #masthead -->
        <?php do_action('wpboilerplate_before_page_content') ?>
        <div id="content" class="site-content">
            <?php
            $page_layout_meta = WPBoilerplate_Group_Fields_Value::page_layout_options('job_single');
            $full_width_class = $page_layout_meta['content_column_class'] === 'col-lg-12' ? ' full-width-content ' : '';
            ?>
            <div id="primary"
                class="content-area job-details-page <?php echo ($is_arabic ? 'arabic' : ''); ?> padding-bottom-120 padding-top-25 ">
                <main id="main" class="site-main">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="col-lg-12">
                                <?php
                                $linkText = $is_arabic ? 'العودة إلى العمل والعمل التطوعي' : 'Back to Career & Volunteering';
                                $linkHref = $is_arabic ? '/ar-job' : '/job';
                                ?>

                                <div class="post-menu-item-list">
                                    <a href="<?php echo $linkHref; ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <g clip-path="url(#clip0_1292_31926)">
                                                <path d="M5 12H19" stroke="#0F0E0E" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <path d="M5 12L11 18" stroke="#0F0E0E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M5 12L11 6" stroke="#0F0E0E" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round" />
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_1292_31926">
                                                    <rect width="24" height="24" fill="white" />
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <?php echo $linkText; ?>
                                    </a>
                                </div>

                                <div class="job-content-wrap">
                                    <?php
                                    if (has_post_thumbnail() && get_post_type() == 'ar_post') {
                                    ?>
                                        <div class="thumbnail">
                                            <?php wpboilerplate()->post_thumbnail('post-thumbnail'); ?>
                                        </div>
                                    <?php } ?>
                                    <?php while (have_posts()) :
                                        the_post();
                                        get_template_part('template-parts/content', 'job-single');
                                    endwhile; // End of the loop.
                                    ?>
                                    <div class="apply-sidebar-content">
                                        <div class="job-type">
                                            <?php echo ($is_arabic ? 'نوع الوظيفة' : 'Job type'); ?>
                                        </div>
                                        <div class="job-type-title"><?php echo esc_html__($job_type, 'wpboilerplate') ?></div>
                                        <div class="job-type">
                                            <?php echo ($is_arabic ? 'الموقع' : 'Location'); ?>
                                        </div>
                                        <div class="job-type-title"><?php echo esc_html__($job_location, 'wpboilerplate') ?></div>
                                        <div class="job-type">
                                            <?php echo ($is_arabic ? 'فئة الوظيفة' : 'Job category'); ?>
                                        </div>
                                        <div class="job-type-title"><?php
                                                                    foreach ($cats as $cat) {
                                                                        echo $cat->name;
                                                                    } ?></div>

                                        <div class="btn-wrap">
                                            <a href="<?php echo esc_url($job_apply_btn_url) ?>"
                                                class="boxed-btn">
                                                <?php echo ($is_arabic ? 'قدم الآن' : 'Apply Now'); ?></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main><!-- #main -->
            </div><!-- #primary -->

        </div><!-- #content -->
        <?php
        if ($is_arabic) {
            get_template_part('template-parts/footer/footer', 'style-01');
        } else {
            get_template_part('template-parts/footer/footer', '');
        } ?>

    </div><!-- #page -->

    <?php wp_footer(); ?>

</body>

</html>