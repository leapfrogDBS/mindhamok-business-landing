<?php
/**
 * Question Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('question_title') ?: 'Your title here...';
$content = get_field('question_content') ?: 'Your content here ...';
$background_type = get_field('question_background_type');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'question';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="background-container absolute top-0 left-0 w-full h-full opacity-40 object-cover mix-blend-multiply greyscale">
        <?php if ($background_type == 'video'): ?>
            <?php $video = get_field('question_background_video'); ?>
            <?php if ($video): ?>
                <video class="absolute top-0 left-0 min-w-full h-full object-cover" autoplay loop muted playsinline webkit-playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
        <?php elseif ($background_type == 'image'): ?>
            <?php $image = get_field('question_background_image'); ?>
            <?php if ($image): ?>
                <div class="w-full h-full" style="background-image: url('<?php echo esc_url($image['url']); ?>'); background-size: cover; background-position: center;"></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container lg:py-32 lg:pb-[14vw] flex flex-col items-center justify-center h-full relative">  
        <!-- Text Content -->
        <div class="flex flex-col gap-y-10 max-w-[400px] slide-down">
            <?php if ($title): ?>
                <h2 class="heading-two text-center"><?php echo $title; ?></h2>
            <?php endif; ?>
            <?php if ($content): ?>
                <div class="text-center "><?php echo $content; ?></div>
            <?php endif; ?>
            <div class="flex justify-center slide-up">
               <a href="#popup" data-fancybox  data-title="Contact us" class="popup-link btn-purple">Contact us</a>
            </div>          
        </div>
    </div>
</section>


