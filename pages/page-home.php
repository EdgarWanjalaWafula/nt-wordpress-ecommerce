<?php 

    $shop_banner_grid       = get_field('banner_grid');
    $about_newman           = get_field('about_newman');
    $discover_main_product  = get_field('discover_main_product');
    $shop_cta               = get_field('shop_cta');

    if($shop_banner_grid):
        ?>
            <section class="banner-grid position-relative">
                <div class="container-fluid">
                    <div class="row category-grids">
                        <?php 
                            foreach($shop_banner_grid as $key=>$grid):
                                $heading    = $grid['banner_heading'];
                                $image      = $grid['banner_image'];
                                $link       = $grid['link'];
                                ?>
                                    <div class="<?php echo $key == 0 ? 'col-md-8' : 'col-md-4'; ?>">
                                        <a href="<?php echo esc_attr($link); ?>" class="grid-card overflow-hidden position-relative d-flex align-items-center justify-content-center">
                                            <?php
                                                newman_theme_img($image, 'full', 'position-absolute h-100 w-100 theme-obj-fit')
                                            ?>
                                            <div class="grid-body position-relative text-center text-white higher-z-index">
                                                <h1 class="m-0"><?php echo $heading; ?></h1>
                                                <!-- <span class="">Shop Now</span> -->
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
                                <span class="products-featured text-center d-block">Featured products</span>
                                <h1 class="section-heading">Choose your weapon. Shop now</h1>
                            </div>
                            <?php echo do_shortcode('[products limit="4" columns="2" visibility="featured"]'); ?>
                        </div>
                    </div>
                </div>
            </section>
        <?php
    endif;

    if($about_newman):
        $about_bg           = $about_newman['background_image'];
        $about_heading      = $about_newman['section_heading'];
        $about_verbiage     = $about_newman['section_description'];
        ?>
            <section class="about-newman position-relative parralax-window" data-parallax="scroll" data-image-src="<?php echo esc_attr($about_bg); ?>">
                <div class="container">
                    <div class="row justify-content-end">
                        <div class="col-md-5">
                            <div class="about-us-box">
                                <h1 class="section-heading"><?php echo esc_html($about_heading); ?></h1>
                                <p><?php echo esc_html($about_verbiage); ?></p>
                                <a href="<?php echo esc_html(home_url('about')); ?>">Discover more</a>
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
                    <h1 class="section-heading">Products</h1>
                </div>
                <?php echo do_shortcode('[recent_products]'); ?>
            </div>
        </div>
    </section>

    <?php 

        $banner_collection = get_field('shop_cta'); 

        if($banner_collection):
            $columns = $banner_collection['columns'];
            $heading = $banner_collection['heading'];
            $content = $banner_collection['content'];
            ?>
                <section class="banner-collection position-relative">
                    <div class="container-fluid">
                        <a href="" class="row">
                            <div class="banner-content position-absolute">
                                <h2 class="section-heading text-dark"><?php echo esc_html($heading); ?></h2>
                                <p><?php echo esc_html($content); ?></p>
                                <button class="btn">Order today</button>
                            </div>
                            <?php

                                foreach($columns as $key=>$column):
                                    $column_img = $column['column_image'];
                                    ?>
                                        <div class="col-md-6">
                                            <div class="banner-col position-relative">
                                                <?php
                                                    newman_theme_img($column_img, 'full', 'theme-obj-fit')
                                                ?>
                                            </div>
                                        </div>
                                    <?php
                                endforeach;
                            ?>
                        </a>
                    </div>
                </section>
            <?php
        endif;
