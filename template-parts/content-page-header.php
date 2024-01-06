<?php
$page_title = $page_desc = '';
if (is_shop()):
    $shop_id = wc_get_page_id('shop');
    $page_title = get_the_title($shop_id);
elseif (is_tax()):
    $page_title = single_term_title('', false);
else:
    $page_title = get_the_title();
endif;
?>

<div class="page-header position-relative d-flex align-items-center">
    <div class="container-fluid">
        <div class="row justify-content-between align-items-center">
            <div class="col">
                <h1 class="section-header">
                    <?php echo esc_html($page_title); ?>
                </h1>
                <?php
                if (is_tax()):
                    var_dump(strip_tags(get_the_archive_description()));
                endif;
                ?>
            </div>
            <div class="col">
                <?php
                /**
                 * Hook: newman_page_header_breadcrumb
                 * 
                 * @hooked:woocommerce_breadcrumb - 10
                 * 
                 */

                do_action('newman_page_header_breadcrumb');
                ?>
            </div>
        </div>
    </div>
</div>