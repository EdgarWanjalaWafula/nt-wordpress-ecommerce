<section class="theme-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <?php 
                    if(has_post_thumbnail()){
                        the_post_thumbnail();
                    }
                ?>
            </div>
            <div class="col">
                <?php echo get_the_content(); ?>
                <?php echo do_shortcode('[contact-form-7 id="6099921" title="Bulk orders form"]'); ?>
            </div>
        </div>
    </div>
</section>