<?php
/**
 * Case Studies Block template.
 *
 * @param array $block The block settings and attributes.
 */


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'case_studies';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?= $anchor; ?> class="bg-[#2A2649] <?= esc_attr($class_name); ?>">
    <div class="container">
        <div class="flex items-center justify-center lg:justify-between mb-9 lg:mb-14 slide-down hidden">
            <h2 class="text-white text-2xl font-bold flex flex-col lg:flex-row gap-y-4 text-center">Organisations already using mindhamok</h2>
            <a href="<?= home_url(); ?>/case-studies" class="btn-purple hidden lg:block">View all case studies</a>
        </div>

        <div id="case_studies-slider" class="splide slide-up hidden" aria-label="Case Studies Slider" data-splide='{"type": "slide", "perPage": 3, "perMove": 1, "pagination": false, "gap": "40px", "arrows": true, "pauseOnHover": true, "autoplay": false, "breakpoints": {"768": {"perPage": 1}, "1200": {"perPage": 2}}}'>
            <div class="splide__track w-[98%] mx-auto">
                <ul class="splide__list">
                    <?php
                    $args = array(
                        'post_type' => 'case_studies',
                        'posts_per_page' => -1,
                    );

                    $case_studies = new WP_Query($args);

                    if ($case_studies->have_posts()) : while ($case_studies->have_posts()) : $case_studies->the_post();
                        $image_id = get_post_thumbnail_id(get_the_ID());
                        ?>

                        
                        <li class="splide__slide">
                            <a href="<?php the_permalink(); ?>" class='case_studies'>
                                <div class="relative overflow-hidden group">
                                    <?php if ($image_id): ?>
                                        <?php echo wp_get_attachment_image($image_id, 'full', false, array('class' => 'aspect-[7/5] w-full object-cover rounded-lg')); ?>
                                    <?php endif; ?>
                                    <div class="overlay absolute inset-0 opacity-0 bg-opacity-90 px-4 py-3 group-hover:opacity-100  flex flex-col gap-y-10 justify-center items-center transition-opacity duration-300 ease-in-out bg-[#242140] z-40">
                                        <h2 class="heading-two text-[24px]"><?php the_title(); ?></h2>
                                        <div class="flex">
                                            <a href="<?php the_permalink(); ?>" class="btn-purple relative">View Case study</a>
                                        </div>
                                    </div>
                                </div>
                                <h4 class="heading-four text-center mt-9 lg:hidden"><?php the_title(); ?></h4>                        
                            </a>
                        </li>
                    <?php
                    endwhile; wp_reset_postdata(); endif;
                    ?>
                </ul>
            </div>
        </div>
        <div class="flex justify-center mt-7 lg:hidden hidden">
            <a href="<?= home_url(); ?>/case-studies" class="btn-purple">View all case studies</a>
        </div>
        <hr class="gradient-border-line bg-counterGradient h-[1px] border-none my-16 hidden"/>

        <div id="case_studies-logos-slider" class="splide slide-up" aria-label="Case Studies Logos Slider" data-splide='{"type": "loop", "perPage": 4, "perMove": 1, "pagination": false, "gap": "100px", "arrows": true, "pauseOnHover": true, "autoplay": true, "breakpoints": {"520": {"perPage": 1}, "768": {"perPage": 2}, "1024": {"perPage": 3}}}'>
            <div class="splide__track w-[98%] mx-auto">
                <ul class="splide__list">
                    <?php if( have_rows('case_studies_logos') ): ?>
                        <?php while( have_rows('case_studies_logos') ): the_row(); 
                            $logoImage = get_sub_field('case_studies_logo');
                            $is_link = get_sub_field('logo_is_link');
                            $logo_link = get_sub_field('logo_link');

                            if( $logoImage ): ?>
                                <li class="splide__slide flex justify-center items-center">
                                    <?php if( $is_link && $logo_link ): // Check if is linked and link is not empty ?>
                                        <a href="<?= esc_url($logo_link['url']); ?>" target="_blank"> <!-- Wrap image in a link if conditions are met -->
                                    <?php endif; ?>
                                    <img src="<?= esc_url($logoImage['url']); ?>" alt="<?= esc_attr($logoImage['alt']); ?>" class="max-w-full h-auto"/>
                                    <?php if( $is_link && $logo_link ): ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section>




