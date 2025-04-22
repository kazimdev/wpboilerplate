<?php

// Add this to your theme's functions.php
function get_category_image_url($category_id)
{
    $thumbnail_id = get_term_meta($category_id, 'thumbnail_id', true);
    return wp_get_attachment_url($thumbnail_id);
}

$dropdown_icon = '<svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1.5L6 6.5L11 1.5" stroke="#4D5462" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>';
?>

<nav class="mega-menu desktop">
    <ul class="top-level-menu">
        <?php
        $args = array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent' => 0
        );

        $product_categories = get_terms($args);

        if (!empty($product_categories)) {

            foreach ($product_categories as $category) {
                $category_image = get_category_image_url($category->term_id);

                // Get subcategories
                $sub_args = array(
                    'taxonomy' => 'product_cat',
                    'hide_empty' => true,
                    'parent' => $category->term_id
                );

                $sub_categories = get_terms($sub_args);
        ?>

                <li class="menu-item">
                    <a href="<?php echo get_term_link($category); ?>">
                        <?php
                        echo $category->name;

                        if (!empty($sub_categories)) {
                            echo $dropdown_icon;
                        }
                        ?></a>

                    <?php if (!empty($sub_categories)): ?>
                        <div class="mega-menu-content">
                            <div class="subcategories-wrapper">
                                <div class="subcategories-columns">
                                    <?php
                                    $chunks = array_chunk($sub_categories,  ceil(count($sub_categories) / 2));
                                    $firstHalf = isset($chunks[0]) ? $chunks[0] : [];
                                    $secondHalf = isset($chunks[1]) ? $chunks[1] : [];

                                    echo '<div class="subcategory-column">';
                                    foreach ($firstHalf as $index => $sub_category) {
                                    ?>
                                        <a href="<?php echo get_term_link($sub_category); ?>" class="sub-category-link">
                                            <?php echo $sub_category->name; ?>
                                        </a>
                                    <?php
                                    }
                                    echo '</div>';

                                    echo '<div class="subcategory-column">';
                                    foreach ($secondHalf as $index => $sub_category) {
                                    ?>
                                        <a href="<?php echo get_term_link($sub_category); ?>" class="sub-category-link">
                                            <?php echo $sub_category->name; ?>
                                        </a>
                                    <?php
                                    }
                                    echo '</div>';
                                    ?>
                                </div>
                            </div>

                            <div class="category-image">
                                <?php if ($category_image): ?>
                                    <img src="<?php echo $category_image; ?>" alt="<?php echo $category->name; ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </li>
        <?php
            }
        }
        ?>
    </ul>

    <div class="mega-menu-content-holder">
        Testing
    </div>
</nav>