<?php 

    $contact_us_grp = get_field('contact_information');

    if( $contact_us_grp ) {
        ?>
            <section class="position-relative theme-padding">
                <div class="container">
                    <div class="row">
                        <?php
                            $contact_details = $contact_us_grp['details'];

                            if($contact_details){
                                foreach($contact_details as $key=>$detail){
                                    ?>
                                        <div class="col">
                                            <div class="contact-card h-100 theme-border-radius card">
                                                <div class="card-body">
                                                <i class="bi bi-<?php echo esc_html($detail['icon']); ?> d-block"></i>
                                                <h2><?php echo esc_html($detail['contact_heading']); ?></h2>
                                                <p class="m-0"><?php echo esc_html($detail['contact_info']); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                        ?>
                    </div>
                </div>
            </section>
        <?php
    }