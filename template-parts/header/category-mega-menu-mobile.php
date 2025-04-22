<?php

?>
<nav class="mega-menu">
    <div class="header">
        Categories
        <span class="close"><svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M11 1L1 11M1 1L11 11" stroke="#4D5462" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg></span>
    </div>
    <ul class="top-level-menu">
        <?php
        $args = array(
            'taxonomy' => 'product_cat',
            'hide_empty' => true,
            'parent' => 0
        );

        $product_categories = get_terms($args);

        foreach ($product_categories as $category) {
            $category_image = get_category_image_url($category->term_id);

            // Get subcategories
            $sub_args = array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
                'parent' => $category->term_id
            );

            $sub_categories = get_terms($sub_args);

            $menu_item_classes =  (!empty($sub_categories)) ? "menu-item menu-item-has-children" : "menu-item";
        ?>

            <li class="<?php echo $menu_item_classes; ?>">
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
                            <?php
                            foreach ($sub_categories as $index => $sub_category) {
                            ?>
                                <a href="<?php echo get_term_link($sub_category); ?>" class="sub-category-link">
                                    <?php echo $sub_category->name; ?>
                                </a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </li>
        <?php
        }
        ?>
    </ul>
</nav>