<div class="page-header position-relative d-flex align-items-center">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-md-12 h-100">
                <div class="position-relative h-100">
                    <?php

                    if (has_post_thumbnail()):
                        the_post_thumbnail(
                            'full position-absolute h-100 w-100 theme-obj-fit',
                            array(
                                'alt' => the_title_attribute(
                                    array(
                                        'echo' => false,
                                    )
                                ),
                            )
                        );
                    endif;
                    ?>
                    <h1 class="section-header">
                        <?php echo esc_html(get_the_title()); ?>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</div>