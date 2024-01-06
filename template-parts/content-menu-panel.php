<div id="mobile-menu" class="fixed-menu-panel position-fixed h-100">
    <div>
        <div class="d-flex align-items-center justify-content-between">
            <?php
            the_custom_logo();
            ?>
            <i data-target="mobile-menu" title="Close" class="bi bi-x-lg panel-close"></i>
        </div>

        <div class="mobile-panel-links">
            <?php

            $tax = 'product_cat';
            $terms = get_terms($tax, array(
                'orderby' => 'id',
                'order' => 'ASC',
                'hide_empty' => 1,
            ));

            if (count($terms) > 0):
                ?>
                <div class="shop-categories">
                    <?php
                    foreach ($terms as $key => $term):
                        $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                        $cat_img = wp_get_attachment_image_url($thumbnail_id ? $thumbnail_id : '84', 'category-thumbnail');
                        ?>
                        <div data-animation-offset="<?php echo $key + 1; ?>" class="position-relative shop-menu-category">
                            <a class="d-block text-white" href="<?php echo get_term_link($term); ?>">
                                <img class="position-absolute w-100 h-100 theme-obj-fit theme-border-radius"
                                    src="<?php echo $cat_img; ?>" alt="Newman Tacticals">
                                <h4 class="heading position-relative higher-z-index m-0 d-flex justify-content-between align-items-center">
                                    <?php echo $term->name; ?>
                                    <i class="bi bi-arrow-right"></i>
                                </h4>
                            </a>
                        </div>
                        <?php
                    endforeach;
                    ?>
                </div>
                <?php
            endif;

            wp_reset_postdata();
            ?>

            <nav id="site-navigation" class="mobile-navigation">
                <?php
                wp_nav_menu(
                    array(
                        'menu_id' => 'menu-4',
                        'menu_class' => 'd-flex flex-wrap',
                    )
                );
                ?>
            </nav><!-- #mobile panel nav-navigation -->

            <div class="mobile-social-icons text-center">
                <span>Call us: +254797411971</span>
                <ul class="d-flex justify-content-between mx-auto">
                    <li><a target="_blank" href="https://web.facebook.com/NewmanTactical"><i class="bi bi-facebook"></i></a></li>
                    <li><a target="_blank" href=""><i class="bi bi-twitter"></i></a></li>
                    <li><a target="_blank" href="https://www.instagram.com/newmantactical/"><i class="bi bi-instagram"></i></a></li>
                    <li><a target="_blank" href="https://wa.me/+254797411971"><i class="bi bi-whatsapp"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>