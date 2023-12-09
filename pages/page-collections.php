<?php

/**
 * Show all shop categories/collections. 
 */

$tax = 'product_cat';
$terms = get_terms($tax, array(
    'orderby' => 'id',
    'order' => 'ASC',
    'hide_empty' => 1,
)
);

if (count($terms) > 0):
    ?>
    <div class="collection theme-padding">
        <div class="container">
            <div class="row">
            <?php
        foreach ($terms as $key => $term):
            $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
            $cat_img = wp_get_attachment_image_url($thumbnail_id ? $thumbnail_id : '84', 'category-thumbnail');
            ?>
                <a class="d-block text-white position-relative col-md-6 collection-col" href="<?php echo get_term_link($term); ?>">
                    <div class="position-relative d-flex align-items-center justify-content-center h-100 w-100">
                        <img class="position-absolute w-100 h-100 theme-obj-fit" src="<?php echo $cat_img; ?>"
                            alt="Newman Tacticals">
                        <h1 class="heading position-relative higher-z-index  m-0 section-heading">
                            <?php echo $term->name; ?>
                        </h1>
                    </div>
                </a>
        <?php
        endforeach;
        ?>
            </div>
        </div>
    </div>
    <?php
endif;

wp_reset_postdata();
?>