<?php

$hero_img = get_field('hero_image_grp');
$shop_banner_grid = get_field('banner_grid');
$about_newman = get_field('about_newman');
$discover_main_product = get_field('discover_main_product');
$shop_cta = get_field('shop_cta');
$tax = 'product_cat';
$home_terms = get_terms(
    $tax,
    array(
        'orderby' => 'id',
        'order' => 'ASC',
        'hide_empty' => 1,
    )
);
$gallery_showcase = get_field('gallery_with_slider');

if ($hero_img['hero_heading'] !== '') {
    ?>
    <section class="position-relative hero-section d-flex align-items-end">
        <?php
        newman_theme_img($hero_img['hero_image'], 'banner-image', 'position-absolute w-100 h-100 theme-obj-fit');
        ?>

        <div class="container position-relative higher-z-index">
            <div class="row">
                <div class="col-md-6 text-white">
                    <div class="glass-effect">
                        <h1>
                            <?php echo esc_html($hero_img['hero_heading']); ?>
                        </h1>
                        <p class="text-white">
                            <?php echo esc_html($hero_img['hero_section_description']); ?>
                        </p>
                        <div>
                            <a class="theme-button text-white rounded-0 border-0"
                                href="<?php echo esc_html(home_url('product-category/footwear/')); ?>">shop
                                footwear <i class="bi bi-arrow-right"></i></a>
                            <a class="theme-button text-dark rounded-0 border-0"
                                href="<?php echo esc_html(home_url('shop')); ?>">shop all</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}



if ($home_terms):
    ?>
    <section class="banner-grid position-relative">
        <div class="container-fluid">
            <div class="row category-grids">
                <?php
                foreach ($home_terms as $key => $term):
                    $thumbnail_id = get_term_meta($term->term_id, 'thumbnail_id', true);
                    $cat_img = wp_get_attachment_image_url($thumbnail_id ? $thumbnail_id : '84', 'full');
                    ?>
                    <div class="col-md-3<?php //echo $key == 0 ? 'col-md-8' : 'col-md-4'; ?>">
                        <a href="<?php echo get_term_link($term); ?>"
                            class="grid-card overflow-hidden position-relative d-flex align-items-center justify-content-center">
                            <img class="position-absolute h-100 w-100 theme-obj-fit" src="<?php echo $cat_img; ?>"
                                alt="Newman Tacticals">
                            <div class="grid-body position-relative text-center text-white higher-z-index">
                                <h1 class="m-0">
                                    <?php echo esc_html($term->name); ?>
                                </h1>
                                <button class="btn text-uppercase p-0 rounded-0 border-0 text-white">
                                    <?php echo esc_html('Shop ' . $term->name); ?>
                                </button>
                            </div>
                        </a>
                    </div>
                    <?php
                endforeach;
                ?>
            </div>
            <!-- Featured products -->
            <div class="featured-products">
                <div class="row">
                    <div class="col-md-8 offset-2 text-center">
                        <span class="products-featured text-center d-block section-tag text-uppercase">Featured
                            products</span>
                        <h1 class="section-heading">
                            <?php echo esc_html('Choose your weapon. Shop now'); ?>
                        </h1>
                    </div>
                    <?php echo do_shortcode('[products limit="4" columns="2" visibility="featured"]'); ?>
                </div>
            </div>
        </div>
    </section>

    <?php
    $offer_sale = get_field('offer_sale');

    if (sizeof($offer_sale['enable_offer_sale']) > 0) {
        ?>
        <section class="offer-sale position-relative">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bg-sale d-flex align-items-center justify-content-center text-white">
                            <h1 class="section-heading m-0">
                                <?php echo esc_html($offer_sale['offer_sale_heading']); ?>
                            </h1>
                            <span class="">
                                <?php echo esc_html($offer_sale['offer_sale_content']); ?>
                            </span>
                            <a href="<?php echo esc_attr($offer_sale['direct_to']['url']); ?>"
                                class="theme-button text-white border-0">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
?>
<?php
endif;

if ($about_newman):
    $about_bg = $about_newman['background_image'];
    $about_heading = $about_newman['section_heading'];
    $about_verbiage = $about_newman['section_description'];
    ?>
    <section class="about-newman position-relative parralax-window" data-parallax="scroll"
        data-image-src="<?php echo esc_attr($about_bg); ?>">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-5 text-white">
                    <div class="about-us-box">
                        <h1 class="section-heading">
                            <?php echo esc_html($about_heading); ?>
                        </h1>
                        <div class="text-white">
                            <?php echo $about_verbiage; ?>
                        </div>
                        <div>
                            <a class="theme-button text-white" href="<?php echo esc_html(home_url('about')); ?>">Discover
                                more <i class="bi bi-arrow-right"></i></a>
                            <a class="theme-button text-white border-0"
                                href="<?php echo esc_html(home_url('contact')); ?>">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
?>

<section class="all-products position-relative theme-padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 offset-4 text-center">
                <h1 class="section-heading">
                    <?php echo esc_html('all Products'); ?>
                </h1>
            </div>
            <?php echo do_shortcode('[recent_products]'); ?>
        </div>
    </div>
</section>
<?php

if ($gallery_showcase):
    ?>
    <section class="gallery-showcase full-width overflow-hidden">
        <div class="container-fluid p-0">
            <div class="row g-0">
                <div class="col-lg-8 first-col">
                    <div class="row g-0">
                        <div class="col-lg-6">
                            <div class="banner-carousel theme-carousel owl-theme owl-carousel">
                                <?php
                                foreach ($gallery_showcase as $key => $image):
                                    echo newman_theme_img($image, 'full', 'gallery-showcase-image theme-obj-fit ');

                                    if ($key === 2):
                                        echo '</div></div>';
                                        echo '<div class="col-lg-6">';
                                    endif;

                                    if ($key === 3):
                                        echo '</div>';
                                        echo '<div class="col-lg-12">';
                                    endif;

                                    if ($key === 4):
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<div class="col-lg-4">';
                                        echo '<div class="banner-carousel theme-carousel owl-theme owl-carousel">';
                                    endif;
                                endforeach;

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
endif;
?>