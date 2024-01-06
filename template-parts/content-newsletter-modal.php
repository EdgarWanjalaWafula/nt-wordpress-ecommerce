<?php

$sale_modal = get_field('offer_sale');

if (sizeof($sale_modal['enable_offer_sale']) > 0) {
    ?>
    <!-- Modal Body -->
    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
    <div class="modal fade" id="offer-modal" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered rounded-0 border-0" role="document">
            <div class="modal-content border-0 rounded-0">
                <div class="newsletter-container">
                    <a href="<?php echo esc_attr($sale_modal['direct_to']['url']); ?>">
                        <?php
                            newman_theme_img($sale_modal['pop_up_image'], 'full', 'img-fluid');
                        ?>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php
}

return;