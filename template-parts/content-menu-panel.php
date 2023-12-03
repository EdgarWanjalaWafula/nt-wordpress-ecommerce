<div id="mobile-menu" class="fixed-menu-panel position-fixed h-100 w-100">  
    <div>
    <div class="d-flex align-items-center justify-content-between">
        <div class="menu-search">
            <input class="form-control" type="text" name="" id="" placeholder="Search for products..">
        </div>
        <span class="material-symbols-sharp close-panel">close</span>
    </div>
    
    <div class="mobile-panel-links">
        <?php 
    
        $tax = 'product_cat';
        $terms = get_terms($tax, array(
            'orderby'    	=> 'id', 
            'order'      	=> 'ASC',
            'hide_empty' 	=> 1, 
        )); 

        if(count($terms) > 0): 
            ?>
                <div class="shop-categories">
                    <?php 
                        foreach($terms as $key=>$term):
                            $thumbnail_id = get_term_meta( $term->term_id, 'thumbnail_id', true );
                            $cat_img = wp_get_attachment_image_url( $thumbnail_id ? $thumbnail_id : '84', 'category-thumbnail');
                            ?>
                                <div data-animation-offset="<?php echo $key+1; ?>" class="position-relative shop-menu-category">
                                    <a class="d-block text-white" href="<?php echo get_term_link($term); ?>">
                                    <img class="position-absolute w-100 h-100 theme-obj-fit" src="<?php echo $cat_img; ?>" alt="Newman Tacticals">
                                        <h4 class="heading position-relative higher-z-index  m-0"><?php echo $term->name; ?></h4>
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
                        'menu_class'     => 'd-flex flex-wrap',
                    )
                );
            ?>
        </nav><!-- #mobile panel nav-navigation -->
    </div>
    </div>
</div>