<?php
/**
 * Video Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$content = get_field('video_text_content');
$url = get_field('video_url');
$label = get_field('video_button_label');
$link = get_field('video_button_link');

preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $url, $matches);
        $video_id = $matches[0] ?? '';
// List of thumbnail resolutions to try, in order of preference
$thumbnail_resolutions = ['maxresdefault.jpg', 'hqdefault.jpg', 'mqdefault.jpg', 'sddefault.jpg', 'default.jpg'];


$thumbnail_url = '';
foreach ($thumbnail_resolutions as $resolution) {
    $test_url = 'https://img.youtube.com/vi/' . $video_id . '/' . $resolution;
    if (thumbnail_exists($test_url)) {
        $thumbnail_url = $test_url;
        break;
    }
}

function thumbnail_exists($url) {
    $headers = get_headers($url);
    return strpos($headers[0], '200 OK') ? true : false;
}

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'video';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="container text-ghost-white flex flex-col gap-y-8 md:gap-y-10 gap-x-12 lg:flex-row lg:pl-8 items-start">
        <div class="col lg:w-2/3"> 
        <?php  
        echo '<div class="youtube-thumbnail-wrapper relative cursor-pointer w-full rounded-lg slide-up" data-videoid="' . esc_attr($video_id) . '">
                <img src="' . esc_url($thumbnail_url) . '" alt="YouTube Video Thumbnail" class="w-full h-auto yt-thumbnail rounded-lg">
                <div class="play-icon absolute top-1/2 left-0 transform  -translate-y-1/2 z-40 flex flex-col items-center w-full">
                    '. file_get_contents(locate_template('assets/img/video/play-button.svg')) .'
                   
                </div>
                <div class="absolute inset-0 bg-videoGradient opacity-80 z-30 mix-blend-normal">            
                </div>
            </div>';
        ?>
        </div>
        <div class="col lg:max-w-[290px] wysiwyg sticky top-[90px] slide-up ">
            <?php if ($content): 
                echo $content; 
            endif; 
            if($label && $link): ?>
                <a href="<?php echo esc_url($link['url']); ?>" class="px-6 py-2 bg-turquoise rounded-[20px] justify-center items-center inline-flex text-base font-bold leading-none text-space-cadet transition-all duration-300 ease-in-out relative overflow-hidden z-10 gap-x-2">
                    <?php echo esc_html($label); ?>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M10 6H6C4.89543 6 4 6.89543 4 8V18C4 19.1046 4.89543 20 6 20H16C17.1046 20 18 19.1046 18 18V14M14 4H20M20 4V10M20 4L10 14" stroke="#242140" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            <?php endif; ?>
        </div>
    </div>
</section>







