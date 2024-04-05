<?php
/**
 * Testimonial Block template.
 *
 * @param array $block The block settings and attributes.
 */


 $background_type = get_field('testimonial_background_type');
// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section class="bg-[#242140] bg-opacity-60 relative">
    <div class="background-container absolute top-0 left-0 w-full h-full object-cover bg-[#242140]">
    <?php if ($background_type == 'video'): ?>
            <?php $video = get_field('testimonial_background_video'); ?>
            <?php if ($video): ?>
                <video class="absolute top-0 left-0 min-w-full h-full object-cover opacity-60" autoplay loop muted playsinline webkit-playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
        <?php elseif ($background_type == 'image'): ?>
            <?php $image = get_field('testimonial_background_image'); ?>
            <?php if ($image): ?>
                <div class="w-full h-full" style="background-image: url('<?php echo esc_url($image['url']); ?>'); background-size: cover; background-position: center;"></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>

    <div class="container flex flex-col items-center justify-center h-full z-40 relative lg:pt-28 lg:pb-20 slide-up">
        <img class="w-14 h-14 mb-11 lg:w-20 lg:h-20 lg:mb-28" src="<?php echo get_template_directory_uri(); ?>/assets/img/testimonial/quote.svg" alt="quotation-icon"/>
        <div id="testimonial-splide" class="splide w-full" data-splide='{"type": "loop", "perPage": 1, "perMove": 1, "pagination": false, "arrows": true, "pauseOnHover": true, "autoplay": true}'>
            <div class="splide__track w-[80%] max-w-[838px] mx-auto">
                <ul class="splide__list">
                    <?php if (have_rows('testimonial')): ?>
                        <?php while (have_rows('testimonial')): the_row(); ?>
                            <?php 
                                $testimonial_text = get_sub_field('testimonial_text'); 
                                $testimonial_client = get_sub_field('testimonial_client');
                                $testimonial_relationship = get_sub_field('testimonial_relationship');
                                ?>
                            <li class="splide__slide">
                                <h2 class="heading-two text-center">"<?php echo esc_html($testimonial_text); ?>"</h2>
                                <p class="text-center mt-6 lg:mt-14 text-base font-bold"><?php echo esc_html($testimonial_client); ?><span class="ml-2 font-normal"><?php echo esc_html($testimonial_relationship); ?></span></p>
                            </li>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div id="splide-pagination" class="custom-pagination mt-20 lg:mt-40"></div>
        </div> 
    </div>
</section>
