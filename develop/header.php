<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mindhamok
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/preloader' ); ?>

<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'mindhamok' ); ?></a>

	<header id="masthead" class="site-header bg-transparent py-4 text-white fixed top-0 left-0 right-0 z-50">
	<div id="gradient-background" class="absolute inset-0 bg-navGradient opacity-0 z-10"></div>
		<div class="container py-0 items-center grid grid-cols-2 lg:grid-cols-[auto,1fr,auto,auto] gap-x-6">
		
		<div class="site-branding w-[160px] xl:w-[240px] z-50">
			<a href="<?php echo home_url(); ?>">
            	<img id="white-logo" class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php echo bloginfo('name'); ?>" />
				<img id="gradient-logo" class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo-gradient.svg" alt="<?php echo bloginfo('name'); ?>" />
			</a>
		</div><!-- .site-branding -->
		
		<div class="nav-center items-center gap-x-4 xl:gap-x-12 hidden lg:flex justify-center z-20">
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'menu_id'        => 'header-menu',
						'menu_class'     => 'flex items-center gap-x-12 text-base leading-none font-bold text-ghost-white',
					)
				);
				?>
			</nav><!-- #site-navigation -->	
			
			
		</div>

		<a href="https://mindhamok.com/" id="student-toggle" class="text-[#68649b] text-sm leading-none uppercase hidden lg:block mr-16 font-bold z-20">For Students</a>

		<div class="nav-right flex justify-end">
			<a href="https://mindhamok-demo.youcanbook.me/"  target="_blank" id="demo-button" data-title="Book a demo" class="popup-link cursor-pointer px-6 py-3 bg-buttonGradient rounded-[20px] justify-center items-center group hidden lg:block z-20 relative overflow-hidden">
				<p id="demo-text" class="text-ghost-white text-base font-bold leading-none bg-clip-text z-20 relative">Book a FREE demo</p>
			</a>
			<div id="hamburger" data-navtoggle class="mobile-menu-icon lg:hidden z-50">
				<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 26 26" fill="none">
					<path id="top-line" d="M4.33337 6.5L21.6667 6.5" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path id="middle-line" d="M4.33337 13H21.6667" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
					<path id="bottom-line" d="M4.33337 19.5H21.6667" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
			</div>
		</div>


		<div id="curtain-menu" class="curtain-menu invisible fixed inset-0 z-40 opacity-0 transition-[opacity,visibility] duration-300">
			<div class="curtain-menu-content absolute top-0 right-0 h-full w-full bg-space-cadet grid place-items-center transition-transform duration-300 ease-in-out translate-x-full">
				<div>
					<?php
					// Get the main WordPress menu
					wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'menu_id'        => 'header-menu',
					'menu_class' => 'text-lg leading-none font-bold text-ghost-white flex flex-col gap-y-4 items-center justify-center h-full w-full text-center',
					));
					?>
					<a href="https://mindhamok.com/" id="student-toggle" class="text-[#68649b] text-sm leading-none uppercase font-bold z-20 text-center mt-4 flex justify-center w-full">For Students</a>
					<a href="https://mindhamok-demo.youcanbook.me/"  target="_blank"  data-title="Book a demo" id="mobile-demo-button" class="popup-link cursor-pointer px-6 py-3 bg-buttonGradient rounded-[20px] justify-center items-center group flex mt-6">
						<p id="demo-text" class="text-ghost-white text-base font-bold leading-none bg-clip-text">Book a FREE demo</p>
					</a>
				</div>
			</div>
		</div>
		</div>

	</header><!-- #masthead -->



