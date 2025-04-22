<?php

/**
 * Post Meta Functions
 * @package wpboilerplate
 * @since 1.0.0
 */

$wpboilerplate = wpboilerplate();
$post_meta = WPBoilerplate_Group_Fields_Value::post_meta('blog_post');
?>
<div class="post-meta-wrap">
    <ul class="post-meta">
        <?php if ($post_meta['posted_by']): ?>
            <li><?php $wpboilerplate->posted_by(); ?></li>
        <?php endif; ?>
        <li>
            <?php
            $wpboilerplate->posted_on();
            ?>
        </li>
        <li>
            <?php
            $wpboilerplate->comment_count();
            ?>
        </li>
    </ul>
    <?php

    if (shortcode_exists('wpboilerplate_post_share') && $post_meta['posted_share']) {
        echo do_shortcode('[wpboilerplate_post_share]');
    }
    ?>
</div>