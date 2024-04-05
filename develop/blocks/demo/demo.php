<?php
/**
 * Demo Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$title = get_field('demo_title' ,'option');
$content = get_field('demo_content', 'option');


// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'demo';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="container text-ghost-white grid md:grid-cols-2 gap-y-8 md:gap-y-10 gap-x-24 items-center max-w-[1024px]">
        <div class="col svg-col flex justify-center fade-in-left">
            <svg class="max-w-full" xmlns="http://www.w3.org/2000/svg" width="339" height="257" viewBox="0 0 339 257" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M110.526 144.418L109.053 143.576C96.62 136.125 86.2658 125.658 78.9474 113.144C73.13 103.074 70.0455 91.6579 70 80.0275C70 36.1177 114.632 0 169.526 0C224.421 0 269 35.8544 269 80.0275C268.936 93.8974 264.599 107.41 256.579 118.725C249.554 128.795 240.478 137.264 229.947 143.576L228.526 144.418C210.539 154.631 190.209 160 169.526 160C148.843 160 128.514 154.631 110.526 144.418ZM150.105 43.3307C144.383 45.2501 139.039 48.1543 134.316 51.9126C129.956 55.1988 126.388 59.4207 123.874 64.2679C121.36 69.1151 119.965 74.4643 119.789 79.9222C119.823 86.8733 122.011 93.6427 126.053 99.2973C128.264 102.69 130.979 105.726 134.105 108.3C138.816 112.078 144.163 114.984 149.895 116.882C152.941 117.949 156.076 118.742 159.263 119.251C162.587 119.784 165.949 120.048 169.316 120.041C179.211 119.954 188.92 117.344 197.526 112.46C202.616 109.815 207.167 106.244 210.947 101.93C214.389 97.8387 216.887 93.039 218.263 87.8723C218.913 85.236 219.248 82.5321 219.263 79.8169C219.255 77.1013 218.919 74.3966 218.263 71.7615C216.839 66.5078 214.268 61.6351 210.737 57.4934C206.965 53.0868 202.415 49.4105 197.316 46.6476C188.684 42.1272 179.057 39.8462 169.316 40.0138C166.014 40.0873 162.723 40.4218 159.474 41.0141C156.293 41.5312 153.16 42.3059 150.105 43.3307ZM323.639 155.427C329.024 160.44 334.151 165.724 339 171.26V171.419L331.425 180.813C310.828 205.161 285.04 224.554 255.968 237.558C226.896 250.563 195.282 256.846 163.464 255.944C131.646 255.042 100.436 246.978 72.1426 232.348C43.8487 217.717 19.1937 196.894 0 171.419C7.93887 161.828 16.7442 152.994 26.3035 145.029L27.04 145.663L27.4083 145.346C65.3633 179.339 114.169 198.618 165.036 199.711C215.902 200.805 265.487 183.641 304.858 151.31C307.278 149.41 309.645 147.352 311.96 145.293L312.328 145.61C316.221 148.777 319.956 151.996 323.639 155.427Z" fill="url(#paint0_linear_25_3513)"/>
                <defs>
                    <linearGradient id="paint0_linear_25_3513" x1="42" y1="60.5" x2="327.5" y2="214.5" gradientUnits="userSpaceOnUse">
                    <stop id="stop1" stop-color="#46E9C9"/>
                    <stop id="stop1" offset="0.5" stop-color="#2EB7F3"/>
                    <stop id="stop1" offset="1" stop-color="#8A4FFF"/>
                    </linearGradient>
                </defs>
            </svg>
        </div>
        <div class="col flex flex-col gap-y-8 text-center md:text-left fade-in-right">
            <h2 class="heading-two"><?php echo esc_html($title); ?></h2>
            <?php echo $content; ?>
            <div>
                <a href="https://mindhamok-demo.youcanbook.me/"  target="_blank"  class="popup-link btn-purple">Book a demo</a>
            </div>
        </div>
       
    </div>
</section>







