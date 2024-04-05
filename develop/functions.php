<?php
/**
 * mindhamok functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mindhamok
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.6' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function mindhamok_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on mindhamok, use a find and replace
		* to change 'mindhamok' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'mindhamok', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'mindhamok' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'mindhamok_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'mindhamok_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mindhamok_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'mindhamok_content_width', 640 );
}
add_action( 'after_setup_theme', 'mindhamok_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mindhamok_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'mindhamok' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'mindhamok' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'mindhamok_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function mindhamok_scripts() {

    wp_enqueue_style('mindhamok-style', get_template_directory_uri() . '/style.css', '', _S_VERSION);
    wp_enqueue_script('mindhamok-app-js', get_template_directory_uri() . '/scripts/site/app.min.js', array(), _S_VERSION, true);

	/* Splide */
	wp_enqueue_style('splide-css', get_template_directory_uri() . '/assets/css/splide.min.css', '', _S_VERSION);
    wp_enqueue_script('splide-js', get_template_directory_uri() . '/scripts/lib/splide.min.js', array(), _S_VERSION, true);
	wp_enqueue_script('splide-config-js', get_template_directory_uri() . '/scripts/site/splide-config.min.js', array('splide-js'), _S_VERSION, true);

	/*FancyBox*/
	wp_enqueue_style('fancybox-css', get_template_directory_uri().'/assets/css/fancybox.css', '', _S_VERSION);
    wp_enqueue_script('fancybox-js', get_template_directory_uri() . '/scripts/lib/fancybox.min.js', array(), _S_VERSION, true);
    wp_enqueue_script('fancybox-config-js', get_template_directory_uri() . '/scripts/site/fancybox-config.min.js', array( 'fancybox-js' ), _S_VERSION, true);

}
add_action('wp_enqueue_scripts', 'mindhamok_scripts');


/* Make styles available in the block editor */
function mytheme_enqueue_block_editor_assets() {
	wp_enqueue_style('mindhamok-block-editor-style', get_template_directory_uri() . '/style.css', '', _S_VERSION);
}
add_action( 'enqueue_block_editor_assets', 'mytheme_enqueue_block_editor_assets' );

/**
 * Enqueue GSAP and ScrollTrigger
 */
function theme_gsap_script(){
    // The core GSAP library
    wp_enqueue_script( 'gsap-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/gsap.min.js', array(), false, true );
    // ScrollTrigger - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-st', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.3/ScrollTrigger.min.js', array('gsap-js'), false, true );
    // Your animation code file - with gsap.js passed as a dependency
    wp_enqueue_script( 'gsap-js2', get_template_directory_uri() . '/scripts/site/gsap-config.min.js', array('gsap-js'), false, true );
}

add_action( 'wp_enqueue_scripts', 'theme_gsap_script' );

/**
 * Register ACF Blocks
 */
function mytheme_register_all_blocks() {
    $block_directories = glob(get_template_directory() . "/blocks/*", GLOB_ONLYDIR);

    foreach ($block_directories as $block) {
        register_block_type($block);
    }
}
add_action('init', 'mytheme_register_all_blocks');

/* Register Menus */
function mindhamok_register_nav_menus() {
    register_nav_menus(
        array(
            'header-menu' => __('Header Menu', 'mindhamok'), // 'header-menu' is the location slug, and 'Header Menu' is the description.
            'footer-menu' => __('Footer Menu', 'mindhamok')  // Register multiple menus by adding more key-value pairs.
        )
    );
}
add_action('init', 'mindhamok_register_nav_menus');


/* Shortcode for gradient styled text */
function gradient_styled_text_shortcode( $atts, $content = null ) {
    return '<span class="bg-textGradient bg-clip-text text-transparent">' . esc_html($content) . '</span>';
}
add_shortcode('gradient_text', 'gradient_styled_text_shortcode');



/**
 * ACF fields
 */
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
 
function my_acf_json_save_point( $path ) {
    

    // update path
    $path = ABSPATH . '../develop/acf-json';

    // return
    return $path;
}

add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {
    
    // remove original path (optional)
    unset($paths[0]);
    
    
    // append path
    $paths[] = ABSPATH . '../develop/acf-json';
    $paths[] = get_template_directory() . '/acf-json';
    
    
    // return
    return $paths;
    
}


/* Highlight words in content */
function highlight_words($content) {
    // Define the pattern to search for - words within curly braces
    $pattern = '/\{([^\}]*)\}/';
    // Replace matched words with a span that applies the highlighting
    $replacement = '<span class="highlight">$1</span>';
    // Perform the replacement
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}


/* Register Workshop Custom Post Type */
function register_workshop_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Workshops'),
            'singular_name' => __('Workshop')
        ),
        'public' => true,
        'has_archive' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'workshop-events'),
        'show_in_rest' => true, // Enable Gutenberg editor
    );

    register_post_type('workshop', $args);

}
add_action('init', 'register_workshop_post_type');

function add_categories_to_workshops() {
    register_taxonomy_for_object_type('category', 'workshop'); // Adds category taxonomy to workshops
}
add_action('init', 'add_categories_to_workshops');


/* Register Case Studies Custom Post Type */
function register_case_studies_post_type() {
    $args = array(
        'labels' => array(
            'name' => __('Case Studies'),
            'singular_name' => __('Case Study')
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'case_studies'),
        'show_in_rest' => true, // Enable Gutenberg editor
    );

    register_post_type('case_studies', $args);
}
add_action('init', 'register_case_studies_post_type');

function add_categories_to_case_studies() {
    register_taxonomy_for_object_type('category', 'case_studies'); // Adds category taxonomy to case_studiess
}
add_action('init', 'add_categories_to_case_studies');


	/* Add Footer Options to menu */
	if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title'    => 'Footer Options',
			'menu_title'    => 'Footer Options',
			'menu_slug'     => 'footer-options',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));

		acf_add_options_page(array(
			'page_title'    => 'Global Block Settings',
			'menu_title'    => 'Global Block Settings',
			'menu_slug'     => 'global-block-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));
	}


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

