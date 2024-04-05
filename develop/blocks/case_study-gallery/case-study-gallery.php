<?php
/**
 * Case Study Gallery Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'case_study-gallery';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$case_study_gallery = get_field('case_study_gallery');
?>

<?php if (!empty($case_study_gallery)): ?>
    <section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr($class_name); ?> bg-space-cadet relative">
        <div class="container p-0 md:px-20 slide-up">
            <div class="splide" aria-label="Case Studies Gallery Slider" data-splide='{"type": "slide", "perPage": 1, "perMove": 1, "pagination": true, "arrows": false, "pauseOnHover": true, "autoplay": true}'>
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($case_study_gallery as $image): ?>
                            <li class="splide__slide">
                                <?php 
                                // Using wp_get_attachment_image() to display the image.
                                echo wp_get_attachment_image($image['ID'], 'full', false, array('class' => 'w-full h-auto aspect-square sm:aspect-[7/5] xl:aspect-[7/2] object-cover object-center'));
                                ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>

