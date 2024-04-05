<?php
    $previous_post = get_previous_post();
    $next_post = get_next_post();
?>

<section class="case_studies_hero bg-space-cadet relative">
    <div class="background-container absolute top-0 left-0 w-full h-full opacity-40 object-cover mix-blend-multiply greyscale">
        <?php 
        // Use get_the_post_thumbnail_url() to get the URL of the current post's featured image.
        $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full'); 
        if ($featured_image_url): ?>
            <div class="w-full h-full" style="background-image: url('<?php echo esc_url($featured_image_url); ?>'); background-size: cover; background-position: center;"></div>
        <?php endif; ?>
    </div>
    <div class="container py-20 md:py-40 flex items-center justify-between h-full relative"> 
        <div class="arrow-left fade-in-left">
            <?php if ($previous_post): ?>
                <a href="<?php echo get_permalink($previous_post->ID); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M10 19L3 12M3 12L10 5M3 12L21 12" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div> 
        <div class=" slide-up text-center relative flex flex-col gap-y-5">
            <a href="<?php echo home_url('/case-studies'); ?>"><h3 class="heading-four lg:text-[24px] text-turquoise">Case Study</h3></a>
            <h1 class="heading-one"><?php the_title(); ?></h1>
        </div>
        <div class="arrow-right fade-in-right">
            <?php if ($next_post): ?>
                <a href="<?php echo get_permalink($next_post->ID); ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M14 5L21 12M21 12L14 19M21 12L3 12" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>
