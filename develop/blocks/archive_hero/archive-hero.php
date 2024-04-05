<?php
/**
 * Archive Hero Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$background_type = get_field('ah_background_type');
$featured_post = get_field('featured_post');


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'archive_hero';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet min-h-screen relative">
    <div class="background-container absolute top-0 left-0 w-full h-full opacity-40 object-cover mix-blend-multiply greyscale">
        <?php if ($background_type == 'video'): ?>
            <?php $video = get_field('ah_background_video'); ?>
            <?php if ($video): ?>
                <video class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 min-w-full min-h-full object-cover" autoplay loop muted playsinline webkit-playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
        <?php elseif ($background_type == 'image'): ?>
            <?php $image = get_field('ah_background_image'); ?>
            <?php if ($image): ?>
                <div class="w-full h-full" style="background-image: url('<?php echo esc_url($image['url']); ?>'); background-size: cover; background-position: center;"></div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    <div class="container pt-28 flex flex-col justify-center h-full z-10 relative min-h-screen max-w-5xl mx-auto"> 
        <?php if( $featured_post === "workshop" ): 
            $featured_workshop = get_field('featured_workshop');
            $counsellor = get_field('workshop_counsellor', $featured_workshop->ID);
            $zoom_link = get_field('workshop_zoom_link', $featured_workshop->ID); 
            $workshop_schedule = get_field('workshop_schedule', $featured_workshop->ID);
            $workshop_excerpt = get_field('workshop_excerpt', $featured_workshop->ID);
            $date_time = null;
            $next_on = "";

            if($workshop_schedule === 'date') {

                $date_time = get_field('workshop_date_&_time', $featured_workshop->ID); 
                $next_on = $date_time . " BST";

            } else {
                $next_on = "Coming Soon";
            }
            ?>
            <div class="flex flex-col gap-y-6 lg:gap-y-8 max-w-[400px]">
                
                <p class="uppercase text-turquoise font-bold">Featured Workshop</p>

                <div class="flex gap-x-2 text-sm justify-start flex-wrap items-start">
                    <p class="font-medium"><span class="text-turquoise">Next on: </span><?php echo esc_html($next_on); ?></p>
                    <?php if($workshop_schedule === 'date') : ?>
                        <p class="font-normal tracking-[-0.28px]" data-date-time="<?php echo esc_attr($date_time); ?>">Starts in <span class="days-until"></span> days</p>
                    <?php endif ?>
                </div>

                <h2 class="heading-two leading-[1.4]">
                    <?php echo esc_html( $featured_workshop->post_title ); ?>
                </h2>

                <?php if ($counsellor): ?>
                    <div class="flex items-center gap-x-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
                            <path d="M16 7.02954C16 9.23868 14.2091 11.0295 12 11.0295C9.79086 11.0295 8 9.23868 8 7.02954C8 4.8204 9.79086 3.02954 12 3.02954C14.2091 3.02954 16 4.8204 16 7.02954Z" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 14.0295C8.13401 14.0295 5 17.1635 5 21.0295H19C19 17.1635 15.866 14.0295 12 14.0295Z" stroke="#45E8C9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <p class="text-sm tracking-[-0.28px] font-normal">With mindhamok counsellor <?php echo esc_html($counsellor); ?></p>
                    </div>
                <?php endif; ?>
                
                <?php if($workshop_excerpt): ?>
                    <p><?php echo esc_html($workshop_excerpt); ?></p>
                <?php endif; ?>

                <!-- Optionally, add a link to the post -->
                <?php if($zoom_link): ?>
                    <div class="flex">
                        <a href="<?php echo $zoom_link['url']; ?>" class="btn-purple relative" target="_blank">Register Now</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php elseif( $featured_post === "case_study" ):
             $featured_case_study = get_field('featured_case_study');
             $cs_excerpt = get_field('case_study_excerpt', $featured_case_study->ID);
              ?>
            ?>
            <div class="flex flex-col gap-y-6 lg:gap-y-8 max-w-[400px]">
                
                <p class="uppercase text-turquoise font-bold">Featured Case Study</p>

                <h2 class="heading-two leading-[1.4]">
                    <?php echo esc_html( $featured_case_study->post_title ); ?>
                </h2>
                
                <?php if($cs_excerpt): ?>
                    <p><?php echo esc_html($cs_excerpt); ?></p>
                <?php endif; ?>

                <!-- Optionally, add a link to the post -->
                <div class="flex">
                    <a href="<?php echo get_permalink($featured_case_study->ID); ?>" class="btn-purple relative">Read More</a>
                </div>

            </div>
        <?php endif; ?>
    </div>
</section>


