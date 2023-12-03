<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="newsletter-modal" tabindex="-1" role="dialog"
    aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg rounded-0 border-0" role="document">
        <div class="modal-content border-0 rounded-0">
            <div class="newsletter-container d-flex align-items-center">
                <img src="<?php echo wp_get_attachment_image_url('162', 'full'); ?>" alt="">
                <div class="newsletter-content text-center">
                    <span class="theme-letter-spacing text-uppercase theme-small small">first timer?</span>
                    <h2 class="text-capitalize">be a member</h2>
                    <input type="email" class="form-control rounded-0">
                    <button class="btn w-100 theme-button w-100 border-0 rounded-0 text-white">Subscribe</button>
                    <p class="small">Subscribe to our newsletter and be the first to hear about our new arrivals, special promotions and online exclusives.</p>
                    <ul class="d-flex justify-content-center social w-75 mx-auto">
                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="#"><i class="bi bi-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>