<?php
/**
 * What Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('what_title') ?: 'Your title here...';
$content = get_field('what_content') ?: 'Your content here...';
$img = get_field('what_image');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'what';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="svg-container z-40 absolute top-0 left-0 w-full -translate-y-2/3 hidden sm:block">
        <svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" preserveAspectRatio="none">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0.630371L0 146H1441V1.388C1176.44 48.5654 906.309 69.8536 634.284 63.9789C420.385 59.3596 208.373 38.0116 0 0.630371Z" fill="#242140"/>
        </svg>
    </div>
    <div class="container text-ghost-white pt-12 pb-0 flex flex-col gap-y-8 md:gap-y-10 gap-x-12 lg:flex-row lg:pl-8 items-center">
        <div class="col flex flex-col gap-y-8 lg:order-2 lg:w-1/3 lg:max-w-[290px] lg:mb-6">
            <h2 class="heading-two slide-up "><?php echo esc_html($title); ?></h2>
            <div class="slide-up"><?php echo $content; ?></div>
            <div class="slide-up">
                <a href="https://mindhamok-demo.youcanbook.me/"  target="_blank"  class="popup-link btn-purple">Book a demo</a>
            </div>
        </div>
        <div class="col lg:order-1 lg:w-2/3">   
            <?php if ($img): ?>
                <?php echo wp_get_attachment_image($img['ID'], 'full', false, ['class' => 'w-full h-full object-cover fade-in-right']); ?>
            <?php endif; ?>
        </div>
    </div>
</section>







