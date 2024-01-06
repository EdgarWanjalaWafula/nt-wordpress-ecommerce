<?php
/**
 * Custom actions & filters for Woocommerce. 
 * Theme author: Edgar Wanjala
 * Author uri:https://edgarwanjala.co.ke
 */
remove_action('woocommerce_template_loop_product_link_close', 'woocommerce_template_loop_product_link_close', 5);
remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');
remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

add_action('lulea_filter_bar', 'woocommerce_result_count');
add_action('lulea_filter_bar', 'woocommerce_catalog_ordering');
add_action('lulea_after_header', 'custom_page_banner');
add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');
add_action('woocommerce_after_add_to_cart_button', 'newman_checkout_btn');
add_action('woocommerce_before_add_to_cart_quantity', 'newman_add_shoe_size', 1);
add_action('woocommerce_before_add_to_cart_quantity', 'opening_flex_divs', 2);
add_action('woocommerce_product_options_general_product_data', 'newman_add_shoe_sizes');
add_action('woocommerce_process_product_meta', 'newman_save_product_meta');
add_action('woocommerce_before_shop_loop_item_title', 'newman_gallery_image');
add_action('newman_page_header_breadcrumb', 'woocommerce_breadcrumb');

add_filter('woocommerce_single_product_image_zoom_enabled', '__return_false');
add_filter('single_product_archive_thumbnail_size', function ($size) {
    return 'product-thumbnail';
});
add_filter('single_product_archive_thumbnail_size', function ($size) {
    return 'product-thumbnail';
});
add_filter('woocommerce_add_cart_item_data', 'add_shoe_size_to_cart', 10, 2);
add_filter('woocommerce_get_item_data', 'show_shoe_size_on_cart', 10, 2);
add_action('woocommerce_checkout_create_order_line_item', 'shoe_size_line_item_meta', 10, 4);

function data_fetch()
{
    /**
     * Fetch data using Wp query by getting search value from Jquery Ajax. 
     * @param $_POST['keyword']
     */

    $the_query = new WP_Query(
        array(
            'posts_per_page'    => 5,
            's'                 => esc_attr($_POST['keyword']),
            'post_type'         => 'product'
        )
    );

    if ($the_query->have_posts()):
        ?>
        <div class="row">
            <span class="heading found-posts d-block small text-center">We found
                <?php echo $the_query->found_posts; ?> results
            </span>
            <?php
            while ($the_query->have_posts()):
                $the_query->the_post();
                get_template_part('template-parts/content', 'search-result');
            endwhile;

            if ($the_query->found_posts > 4):
                echo "</div></div><div><a href='" . home_url() . "?s=" . esc_attr($_POST['keyword']) . "' class='bg-dark text-white theme-button heading mx-auto d-block more-results'>view more</a>";
            endif;
            wp_reset_postdata();
    else:
        echo '<div class="alert alert-danger mt-4">No result found.</div>';
    endif;

    die();
}

function custom_page_banner()
{
    /**
     * Show custom page banner.
     * @return void
     */

    get_template_part('template-parts/content', 'page-header');
}

function newman_add_shoe_sizes()
{
    /**
     * Add custom text field to General product tab.
     * @param array woocommerce_wp_text_input.
     * @return void
     */
    woocommerce_wp_text_input(
        array(
            'id' => 'newman_shoe_size',
            'label' => __('Shoe Size, separated by , Eg 41,42', 'woocommerce'),
            'placeholder' => 'Enter available shoe sizes',
            'desc_tip' => 'true'
        )
    );
}

function newman_save_product_meta($postid)
/**
 * Save post meta. 
 * @param $postid
 */
{
    $newman_shoe_size_field = $_POST['newman_shoe_size'];

    if (isset($newman_shoe_size_field) && $newman_shoe_size_field !== ''):
        update_post_meta($postid, 'newman_shoe_size', $newman_shoe_size_field);
    endif;
}

function newman_checkout_btn()
{
    $this_product_id = get_the_id();
    $this_product = wc_get_product($this_product_id);
    $checkout_url = wc_get_checkout_url();

    if (is_singular() && $this_product->get_type() == 'simple') {
        echo "</div>";
        echo '<a class="btn w-100 btn-checkout" href="' . $checkout_url . '?add-to-cart=' . $this_product_id . '">Buy it now</a>';
    }
}

function newman_add_shoe_size()
{
    $this_product_id = get_the_id();
    $size_meta = get_post_meta($this_product_id, 'newman_shoe_size', true);
    $sizes = explode(',', $size_meta);

    if (sizeof($sizes) > 1):
        echo '<div>';
        echo '<span><strong>Size:</strong></span>';
        echo '<input type="hidden" name="newman_shoe_size">';
        echo '<ul class="d-flex size-list">';
        foreach ($sizes as $key => $size):
            echo '<li data-size="' . $size . '">' . $size . '</li>';
        endforeach;
        echo '</ul></div>';
    endif;
}

function opening_flex_divs(){
    echo '<div class="d-flex align-items-center quantity-cart">';
}

function add_shoe_size_to_cart($cart_item_data, $product_id)
{
    /**
     * Add shoe size to cart. 
     * @param   [type] $cart_item_data, $product_id
     * @return  $cart_item_data
     */
    if (isset($_REQUEST['newman_shoe_size'])):
        $cart_item_data['newman_shoe_size'] = sanitize_text_field($_REQUEST['newman_shoe_size']);
    endif;

    return $cart_item_data;
}

function show_shoe_size_on_cart($item_data, $cart_item)
{

    if (array_key_exists('newman_shoe_size', $cart_item)):
        $shoe_size_details = $cart_item['newman_shoe_size'];

        $item_data[] = array(
            'key' => 'Selected shoe size',
            'value' => $shoe_size_details
        );
    endif;

    return $item_data;
}

function shoe_size_line_item_meta($item, $cart_item_key, $values, $order)
{

    if (array_key_exists('newman_shoe_size', $values)):
        $item->add_meta_data('Preferred shoe size', $values['newman_shoe_size']);
    endif;
}

function add_flex_div()
{
    var_dump("sds");
}

function newman_gallery_image()
{
    /**
     * Hook first image from the gallery after product thumbnail and show it on hover. 
     * @param $attachment_ids[0]
     */
    global $product;
    $attachment_ids = $product->get_gallery_image_ids();

    if (!empty($attachment_ids)):
        echo '<img class="product-hover-image position-absolute w-100" src="' . wp_get_attachment_image_url($attachment_ids[0], 'product-thumbnail') . '" />';
    endif;
}