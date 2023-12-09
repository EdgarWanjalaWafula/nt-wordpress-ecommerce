<?php
    global $product;

    // Ensure visibility.
    if (empty($product) || !$product->is_visible()) {
        return;
    }

    $product_id     = $product->get_id();
    $product_link   = $product->get_permalink();
    $product_price  = $product->get_price_html();
    $product_title  = $product->get_title();
    $product_image  = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'thumbnail');
?>
<a href="<?php echo esc_attr($product_link); ?>" class="search-result position-relative">
    <div class="d-flex align-items-center">
        <?php
        if (!empty($product_image)):
            echo '<img src="' . $product_image[0] . '" alt="Newman Tacticals: ' . $product_title . '">';
        else:
            // echo 
        endif;
        ?>
        <div>
            <h2>
                <?php echo esc_html($product_title); ?>
            </h2>
               <?php 
    echo $product_price;
?>  
        </div>
    </div>
</a>