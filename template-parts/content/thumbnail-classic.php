<?php

/**
 * Post Thumbnail Functions
 * @package wpboilerplate
 * @since 1.0.0
 */

$wpboilerplate = wpboilerplate();
if (has_post_thumbnail()): ?>
    <div class="thumbnail">
        <?php $wpboilerplate->post_thumbnail('post-thumbnail'); ?>
    </div>
<?php endif; ?>