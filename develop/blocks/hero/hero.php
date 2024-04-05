<?php
/**
 * Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('hero_title') ?: 'Your title here...';
$background_type = get_field('background_type');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-[#302B5F] h-screen min-h-screen relative">
    <div class="background-container absolute top-0 left-0 w-full h-full opacity-60 object-cover mix-blend-multiply greyscale">
        <?php if ($background_type == 'video'): ?>
            <?php $video = get_field('hero_background_video'); ?>
            <?php if ($video): ?>
                <video class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-full min-h-full object-cover" autoplay loop muted playsinline webkit-playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
        <?php elseif ($background_type == 'image'): ?>
            <?php $image = get_field('hero_background_image'); ?>
            <?php if ($image): ?>
                <div class="w-full h-full" style="background-image: url('<?php echo esc_url($image['url']); ?>'); background-size: cover; background-position: center;"></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container flex flex-col items-center justify-center h-full">  
        <!-- Text Content -->
        <div class="heading-one text-center text-white max-w-[1013px] z-10 relative slide-up">
            <?php if ($title): ?>
                <?php echo do_shortcode($title); ?>
            <?php endif; ?>
        </div>
        <div class="scroll-to-next cursor-pointer mt-[7vh] md:hidden z-40">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <path d="M19 14L12 21M12 21L5 14M12 21L12 3" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
</section>


