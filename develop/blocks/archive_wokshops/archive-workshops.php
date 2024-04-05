<?php
/**
 * Archive Workshops Block template.
 *
 * @param array $block The block settings and attributes.
 */

$currentDateTime = new DateTime(); 

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'archive-workshops';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="bg-space-cadet relative <?php echo esc_attr($class_name); ?>">
    <div class="svg-container z-40 absolute top-0 left-0 w-full -translate-y-2/3 hidden sm:block">  
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" preserveAspectRatio="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.630371L0 146H1441V1.388C1176.44 48.5654 906.309 69.8536 634.284 63.9789C420.385 59.3596 208.373 38.0116 0 0.630371Z" fill="#242140"/>
        </svg>
    </div>
    <div class="container">
        <div id="workshop-grid" class="slide-up grid md:grid-cols-2 gap-x-10 gap-y-16 max-w-5xl mx-auto">
           
            <?php
            $args = array(
                'post_type' => 'workshop',
                'posts_per_page' => -1,
            );

            $workshops = new WP_Query($args);

            if ($workshops->have_posts()) : while ($workshops->have_posts()) : $workshops->the_post();
                $image_id = get_post_thumbnail_id(get_the_ID());
                
                $counsellor = get_field('workshop_counsellor', get_the_ID());
                $zoom_link = get_field('workshop_zoom_link', get_the_ID()); 
                $workshop_schedule = get_field('workshop_schedule', get_the_ID());
                $workshop_excerpt = get_field('workshop_excerpt', get_the_ID());
                $date_time = null;
                
                $next_on = "";

                if($workshop_schedule === 'date') {

                    $date_time = get_field('workshop_date_&_time', get_the_ID()); 
                    $workshop_dt_object = DateTime::createFromFormat('F j, Y g:i a', $date_time);
                
                    if ($workshop_dt_object < $currentDateTime) {
                        continue; // Skip the rest of this iteration and move to the next post
                    }
                    $next_on = $date_time . " BST";

                } else {
                    $next_on = "Coming Soon";
                }

                // Get categories
                $categories = get_the_terms(get_the_ID(), 'category');
                $category_names = [];
                if (!empty($categories) && !is_wp_error($categories)) {
                    foreach ($categories as $category) {
                        $category_names[] = $category->name;
                    }
                }
                $categories_list = join(", ", $category_names);
                ?>
                    
                <div class='post-item workshop flex flex-col gap-y-6'>
                    <div class="relative overflow-hidden group">
                        <?php if ($image_id): ?>
                            <?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'aspect-[7/5] w-full object-cover rounded-lg')); ?>
                        <?php endif; ?>
                            <div class="categories absolute left-0 right-0 bottom-0 px-4 pb-4 lg:pb-5 bg-turquoise text-center z-30 rounded-b-lg">
                                <div class="svg-container z-20 absolute top-0 left-0 w-full -translate-y-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" fill="none">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M1440 64.396V449H0V63.9638C198.629 28.3347 400.14 7.4248 602.931 1.64968C884.226 -6.36106 1164.69 14.8425 1440 64.396Z" fill="#45E8C9"/>
                                    </svg>
                                </div>
                                <p class="text-xs font-normal text-space-cadet uppercase z-30 relative">Mindhamok Workshop series</p>
                                <p class="text-base text-space-cadet font-bold z-30 relative"><?= get_the_title(); ?></p>
                            </div>
                        <?php if($zoom_link): ?>
                            <div class="overlay absolute inset-0 opacity-0 bg-opacity-90 px-4 py-3 group-hover:opacity-100  flex justify-center items-center transition-opacity duration-300 ease-in-out bg-[#242140] z-40">
                                <div class="flex">
                                    <a href="<?php echo $zoom_link['url']; ?>" class="btn-purple relative" target="_blank">Register Now</a>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-col gap-y-3 text-center md:text-left">
                        
                        <div class="flex gap-x-2 text-sm justify-center md:justify-start flex-wrap min-h-12 2xl:min-h-0 items-start">
                            <p class="font-medium"><span class="text-turquoise">Next on: </span><?php echo esc_html($next_on); ?></p>
                            <?php if($workshop_schedule === 'date') : ?>
                                <p class="font-normal tracking-[-0.28px]" data-date-time="<?php echo esc_attr($date_time); ?>">Starts in <span class="days-until"></span> days</p>
                            <?php endif ?>
                        </div>     

                        <h4 class="heading-four text-[1.3rem] leading-[1.4] w-3/4 md:w-full mx-auto "><?= get_the_title(); ?></h4>
                    
                       

                        <?php if ($workshop_excerpt): ?>
                            <p><?php echo esc_html($workshop_excerpt); ?></p>
                        <?php endif; ?>

                        <?php if ($counsellor): ?>
                            <div class="flex items-center gap-x-2 justify-center md:justify-start">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                                    <path d="M16 7.02954C16 9.23868 14.2091 11.0295 12 11.0295C9.79086 11.0295 8 9.23868 8 7.02954C8 4.8204 9.79086 3.02954 12 3.02954C14.2091 3.02954 16 4.8204 16 7.02954Z" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 14.0295C8.13401 14.0295 5 17.1635 5 21.0295H19C19 17.1635 15.866 14.0295 12 14.0295Z" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <p class="text-sm tracking-[-0.28px] font-normal">With mindhamok counsellor <?php echo esc_html($counsellor); ?></p>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php
            endwhile; wp_reset_postdata(); endif;
            ?>
        </div>
        <div id="load-more" class="w-full flex items-center justify-center gap-x-2 py-3 border-2 border-ghost-white rounded-md mt-20 cursor-pointer max-w-5xl mx-auto">
            <p class="font-bold">Load more</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                <path d="M12 6.5V12.5M12 12.5V18.5M12 12.5H18M12 12.5L6 12.5" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</section>



