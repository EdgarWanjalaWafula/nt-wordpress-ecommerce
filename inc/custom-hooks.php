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
add_action('woocommerce_after_add_to_cart_quantity', 'newman_add_shoe_size');
add_action('woocommerce_product_options_general_product_data', 'newman_add_shoe_sizes');
add_action('woocommerce_process_product_meta', 'newman_save_product_meta');

add_filter('woocommerce_single_product_image_zoom_enabled', '__return_false');
add_filter('single_product_archive_thumbnail_size', function ($size) {
    return 'product-thumbnail'; });
add_filter('single_product_archive_thumbnail_size', function ($size) {
    return 'product-thumbnail'; });
add_filter('woocommerce_add_cart_item_data', 'add_shoe_size_to_cart',10,2);

function data_fetch()
{
    /**
     * Fetch data using Wp query by getting search value from Jquery Ajax. 
     * @param $_POST['keyword']
     */

    $the_query = new WP_Query(
        array(
            'posts_per_page' => 5,
            's' => esc_attr($_POST['keyword']),
            'post_type' => 'product'
        )
    );

    if ($the_query->have_posts()):
        ?>
        <div class="row"><span class="heading found-posts d-block small">We found
                <?php echo $the_query->found_posts; ?> results
            </span>
            <?php
            while ($the_query->have_posts()):
                $the_query->the_post();
                wc_get_template_part('content', 'product');
            endwhile;
            wp_reset_postdata();

            echo "</div></div><div><a href='" . home_url() . "?s=" . esc_attr($_POST['keyword']) . "' class='bg-dark text-white theme-button heading mx-auto d-block more-results'>view more</a>";
    else:
        echo '<h3>No Results Found</h3>';
    endif;

    die();
}

function custom_page_banner()
{
    /**
     * Show custom page banner on shop page only. 
     * @return void
     */
    ?>
        <div class="page-banner position-relative">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <img src="<?php echo wp_get_attachment_image_url('261', 'banner-image'); ?>" alt="Newman Tacticals">
                    </div>
                </div>
            </div>
        </div>
        <?php
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
        echo '<a class="btn w-100 rounded-0 border-0 btn-checkout" href="' . $checkout_url . '?add-to-cart=' . $this_product_id . '">Buy it now</a>';
    }
}

function newman_add_shoe_size()
{
    $this_product_id = get_the_id();
    $size_meta = get_post_meta($this_product_id, 'newman_shoe_size', true);
    $sizes = explode(',', $size_meta);

    if (sizeof($sizes) > 1):
        echo '<div><span>Available sizes:</span><input type="hidden" name="newman_shoe_size"><ul class="d-flex size-list">';
        foreach ($sizes as $key => $size):
            echo '<li data-size="' . $size . '">' . $size . '</li>';
        endforeach;
        echo '</ul></div>';
    endif;
}

function add_shoe_size_to_cart($cart_item_data, $product_id){
    var_dump($cart_item_data);
}