    <?php
    /**
     * Accordion Block template.
     *
     * @param array $block The block settings and attributes.
     */

   
    // Support custom "anchor" values.
    $anchor = '';
    if (!empty($block['anchor'])) {
        $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $class_name = 'accordion';
    if (!empty($block['className'])) {
        $class_name .= ' ' . $block['className'];
    }
    ?>

    <section class="bg-[#2A2649]">
        <div class="container grid md:grid-cols-2 gap-y-6 gap-x-16 items-start">
            <div class="col">
                <div class="heading flex flex-col xl:flex-row xl:items-center justify-between slide-up">
                    <div class="xl:order-2 flex items-center justify-start gap-x-3">
                    <!-- Text before the toggle -->
                        <span class="text-ghost-white uppercase text-sm">Staff</span>
                        <label
                            for="content-toggle"
                            class=" flex items-center cursor-pointer select-none"
                            >
                            <div class="relative">
                                <input
                                    type="checkbox"
                                    id="content-toggle"
                                    class="peer sr-only"
                                    />
                                <div class="block h-[20px] rounded-full box bg-purple w-[38px]"></div>
                                <div class="absolute flex items-center justify-center w-[14px] h-[14px] transition bg-ghost-white rounded-full dot left-[5px] top-[3px] peer-checked:translate-x-full"></div>
                            </div>
                        </label>
                        <span class="text-ghost-white uppercase text-sm">Students</span>
                    </div>
                    <h2 id="toggle-heading" class="heading-two my-8 xl:my-0 xl:order-1">What staff get</h2> 
                </div>

                <?php if (have_rows('staff_accordion')): ?>
                    <div id="accordion-staff" class="accordion active">
                        <?php while (have_rows('staff_accordion')) : the_row();
                            $label = get_sub_field('accordion_label') ?: 'Default label...';
                            $content = get_sub_field('accordion_content') ?: 'Default content...';
                            ?>
                        <div class="accordion-item">
                            <div class="accordion-title flex items-start justify-start gap-x-4 cursor-pointer">
                                <svg class="shrink-0" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                    <path d="M7.5 10.6L9.16667 12.2666L12.5 8.93331M17.5 10.6C17.5 14.7421 14.1421 18.1 10 18.1C5.85786 18.1 2.5 14.7421 2.5 10.6C2.5 6.45784 5.85786 3.09998 10 3.09998C14.1421 3.09998 17.5 6.45784 17.5 10.6Z" stroke="#F7F7FB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="grow"><?php echo highlight_words($label); ?></p>
                                <svg class="shrink-0 transition-transform duration-300 ease-in-out chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                    <path d="M14.25 7.34998L9 12.6L3.75 7.34998" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                
                            </div>
                            <div class="accordion-content">
                                <p class="mt-4"><?php echo highlight_words($content); ?></p>
                            </div>
                            <hr class="gradient-border-line bg-counterGradient h-[1px] border-none my-5"/>
                        </div>  
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <?php if (have_rows('student_accordion')): ?>
                    <div id="accordion-student" class="accordion">
                        <?php while (have_rows('student_accordion')) : the_row();
                            $label = get_sub_field('accordion_label') ?: 'Default label...';
                            $content = get_sub_field('accordion_content') ?: 'Default content...';
                            ?>
                        <div class="accordion-item">
                            <div class="accordion-title flex items-start justify-start gap-x-4 cursor-pointer">
                                <svg class="shrink-0" xmlns="http://www.w3.org/2000/svg" width="20" height="21" viewBox="0 0 20 21" fill="none">
                                    <path d="M7.5 10.6L9.16667 12.2666L12.5 8.93331M17.5 10.6C17.5 14.7421 14.1421 18.1 10 18.1C5.85786 18.1 2.5 14.7421 2.5 10.6C2.5 6.45784 5.85786 3.09998 10 3.09998C14.1421 3.09998 17.5 6.45784 17.5 10.6Z" stroke="#F7F7FB" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="grow"><?php echo highlight_words($label); ?></p>
                                <svg class="shrink-0 transition-transform duration-300 ease-in-out chevron" xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                                    <path d="M14.25 7.34998L9 12.6L3.75 7.34998" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <div class="accordion-content">
                                <p class="mt-4"><?php echo highlight_words($content); ?></p>
                            </div>
                            <hr class="gradient-border-line bg-counterGradient h-[1px] border-none my-5"/>
                        </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>

                <div>
                    <a href="https://mindhamok-demo.youcanbook.me/"  target="_blank" class="popup-link mt-8 xl:mt-0 btn-purple">Book a demo</a>
                </div>

            </div>
            <div class="col accordion-img-col">
                <?php 
                $img = get_field('accordion_image');
                if ($img): ?>
                    <?php echo wp_get_attachment_image($img['ID'], 'full', false, ['class' => 'w-full h-full  accordion-image fade-in-right']); ?>
                <?php endif; ?>
            </div>
        </div>
    </section>



