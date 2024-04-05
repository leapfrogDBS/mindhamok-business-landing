<div id="popup" class="w-full rounded-lg max-w-[780px]" style="display:none;">
    <div class="bg-ghost-white flex flex-col lg:flex-row rounded-lg gap-x-12 relative oveflow-hidden">
        <div class="svg-container absolute top-0 left-0 bottom-0 z-10 hidden lg:block">
            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 213 489" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C3.58172 0 0 3.58173 0 8V143.258V289.06V481C0 485.418 3.58172 489 8 489H149H167.847C195.157 409.069 210.35 325.036 212.684 239.872C214.908 158.7 205.414 77.8741 184.7 0H149H8Z" fill="url(#paint0_linear_201_1197)"/>
                <defs>
                    <linearGradient id="paint0_linear_201_1197" x1="-37" y1="584.112" x2="190.955" y2="-20.444" gradientUnits="userSpaceOnUse">
                        <stop stop-color="#46E9C9"/>
                        <stop offset="0.5" stop-color="#2EB7F3"/>
                        <stop offset="1" stop-color="#8A4FFF"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="lg:self-end z-20 rounded-lg">
            <img class="lg:hidden object-cover w-full bg-cover rounded-lg"  src="<?php echo get_template_directory_uri(); ?>/assets/img/mobile-popup.png" alt="popup-image" style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/Union.jpg)" />
            <img class="hidden lg:block object-cover"  src="<?php echo get_template_directory_uri(); ?>/assets/img/popup-image.png" alt="popup-image"  />
        </div>
        <div class="form flex flex-col gap-y-6 flex-grow p-6 lg:py-12 lg:max-w-[420px]">
            <h2 id="popup-title" class="heading-two text-purple">Book a demo</h2>
            <?php
            // Retrieve the shortcode from the ACF options field
            $contact_form_shortcode = get_field('contact_form_shortcode', 'option');
            
            // Check if the shortcode exists and is not empty
            if (!empty($contact_form_shortcode)) {
                // Execute the shortcode
                echo do_shortcode($contact_form_shortcode);
            }
            ?>
        </div>
    </div>
</div>
