<?php
/**
 * Archive Case Studies Block template.
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
$class_name = 'archive-case_studies';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= $anchor; ?> class="bg-space-cadet relative <?= esc_attr($class_name); ?>">
    <div class="svg-container z-40 absolute top-0 left-0 w-full -translate-y-2/3 hidden sm:block">  
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" preserveAspectRatio="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.630371L0 146H1441V1.388C1176.44 48.5654 906.309 69.8536 634.284 63.9789C420.385 59.3596 208.373 38.0116 0 0.630371Z" fill="#242140"/>
        </svg>
    </div>
    <div class="container">
        <div id="workshop-grid" class="slide-up grid md:grid-cols-2 gap-x-10 gap-y-16 max-w-5xl mx-auto">
           
            <?php
            $args = array(
                'post_type' => 'case_studies',
                'posts_per_page' => -1,
            );

            $case_studies = new WP_Query($args);

            if ($case_studies->have_posts()) : while ($case_studies->have_posts()) : $case_studies->the_post();
                $image_id = get_post_thumbnail_id(get_the_ID());
                
                
                $case_study_excerpt  = get_field('case_study_excerpt', get_the_ID());
                
                ?>
                    
                <a href="<?php the_permalink(); ?>" class='post-item case_studies flex flex-col gap-y-6' id="<?php the_ID(); ?>">
                    <div class="relative overflow-hidden group">
                        <?php if ($image_id): ?>
                            <?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'aspect-[7/5] w-full object-cover rounded-lg')); ?>
                        <?php endif; ?>
                    </div>
                    <div class="flex flex-col gap-y-3 text-center md:text-left">

                        <h4 class="heading-four leading-[1.4] w-3/4 md:w-full mx-auto "><?= get_the_title(); ?></h4>

                        <?php if ($case_study_excerpt): ?>
                            <p><?php echo esc_html($case_study_excerpt); ?></p>
                        <?php endif; ?>
                    </div>
                </a>
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



