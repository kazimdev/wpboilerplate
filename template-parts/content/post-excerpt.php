<?php

/**
 * Theme Post excerpt Template
 * @package wpboilerplate
 * @since 1.0.0
 */

$wpboilerplate = wpboilerplate();
$post_meta = WPBoilerplate_Group_Fields_Value::post_meta('blog_post');
$excerpt_length = !empty($post_meta['excerpt_length']) ? $post_meta['excerpt_length'] : 55;
$readmore_text = !empty($post_meta['readmore_btn_text']) ? $post_meta['readmore_btn_text'] : esc_html__('Read More', 'wpboilerplate');


WPBoilerplate_Excerpt($excerpt_length);
?>
<div class="blog-bottom">
	<?php
	if ($post_meta['readmore_btn']) {
		printf('<div class="btn-wrap"><a href="%1$s" class="read-btn">%2$s<i class="fas fa-arrow-right ml-2"></i></a></div>', esc_url(get_the_permalink()), esc_html($readmore_text));
	}
	?>
</div>