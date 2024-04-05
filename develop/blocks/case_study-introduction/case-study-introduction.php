<?php
/**
 * Case Study Introduction Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$logo = get_field('intro_logo');
$intro = get_field('intro_introduction') ?: 'Your intro here...';

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'case_study-introduction';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

$case_study_gallery = get_field('case_study_gallery');
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="svg-container z-40 absolute top-0 left-0 w-full -translate-y-2/3 hidden sm:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" preserveAspectRatio="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.630371L0 146H1441V1.388C1176.44 48.5654 906.309 69.8536 634.284 63.9789C420.385 59.3596 208.373 38.0116 0 0.630371Z" fill="#242140"/>
        </svg>
    </div>
    <div class="container text-ghost-white grid md:grid-cols-2 gap-y-8 md:gap-y-10 gap-x-24 items-center justify-center">
        <div class="col flex justify-center fade-in-left">
            <?php if($logo): ?>
                <?php if ($logo): ?>
                    <?php echo wp_get_attachment_image($logo['ID'], 'full', false, array('class' => 'w-ful h-auto object-cover')); ?>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <div class="col wysiwyg fade-in-right">          
            <?php if($intro): ?>
                <?php echo $intro; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


