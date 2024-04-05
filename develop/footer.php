<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mindhamok
 */

 $title = get_field('question_title', 'option');
 $content = get_field('question_content', 'option');
 $background_type = get_field('question_background_type', 'option');

$address = get_field('footer_address', 'option');
$vat = get_field('footer_vat_number', 'option');

?>


<section class= "bg-space-cadet relative">
    <div class="background-container absolute top-0 left-0 w-full h-full opacity-40 object-cover mix-blend-multiply greyscale">
        <?php if ($background_type == 'video'): ?>
            <?php $video = get_field('question_background_video', 'option'); ?>
            <?php if ($video): ?>
                <video class="absolute top-0 left-0 min-w-full h-full object-cover" autoplay loop muted playsinline webkit-playsinline>
                    <source src="<?php echo esc_url($video['url']); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
                    Your browser does not support the video tag.
                </video>
            <?php endif; ?>
        <?php elseif ($background_type == 'image'): ?>
            <?php $image = get_field('question_background_image', 'option'); ?>
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

	<footer id="colophon" class="site-footer bg-space-cadet relative">
		<div class="svg-container z-30 absolute top-0 left-0 w-full -translate-y-[5vw] hidden sm:block">
			<svg xmlns="http://www.w3.org/2000/svg" width="100%" viewBox="0 0 1440 146" fill="none">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M1440 64.396V449H0V63.9638C198.629 28.3347 400.14 7.4248 602.931 1.64968C884.226 -6.36106 1164.69 14.8425 1440 64.396Z" fill="#242140"/>
			</svg>
		</div>

		<div class="container grid lg:grid-cols-[auto,1fr,auto] gap-y-12 z-40 items-start gap-x-12 text-center lg:text-left relative">
			<div class="footer-left flex flex-col gap-y-7">
				<div class="site-branding w-[177px] flex justify-center lg:justify-start w-full">
					<a href="<?php echo home_url(); ?>">
						<img class="w-full" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.svg" alt="<?php echo bloginfo('name'); ?>" />
					</a>
				</div>
				<?php if( $address ): ?>
					<p class="address text-sm">
						<?php echo nl2br($address); ?>
					</p>
				<?php endif; ?>
				<?php if( $vat ): ?>
					<p class="vat-number text-sm">
						<?php echo $vat; ?>
					</p>
				<?php endif; ?>
			</div>
			
			<div class="flex flex-col gap-y-6">
				<div class="footer-center flex justify-around items-center flex-wrap gap-y-6 gap-x-4">
					<?php if( have_rows('footer_logos', 'option') ): ?>
						<?php while( have_rows('footer_logos', 'option') ): the_row(); 
							$logoImage = get_sub_field('footer_logo');
							if( $logoImage ): ?>
								<img class="max-h-[95px] w-auto" src="<?php echo esc_url($logoImage['url']); ?>" alt="<?php echo esc_attr($logoImage['alt']); ?>" />
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
				<a class="max-w-[300px] mx-auto"href="https://uk.trustpilot.com/review/mindhamok.com" target="_blank">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/trustpilot.png" alt="Trustpilot" />	
				</a>
			</div>

			<div class="footer-right flex flex-col gap-y-7">
				<h4 class="heading-four leading-none">Stay up to date</h4>
				<div class="flex gap-x-3 justify-center lg:justify-start">
       				<?php $facebook_link = get_field('facebook_link', 'option'); ?>
					<?php if( $facebook_link ): ?>
						<a href="<?php echo esc_url($facebook_link['url']); ?>" target="<?php echo esc_attr($facebook_link['target']); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/FB.svg" alt="Facebook" />
						</a>
					<?php endif; ?>

					<?php $instagram_link = get_field('instagram_link', 'option'); ?>
					<?php if( $instagram_link ): ?>
						<a href="<?php echo esc_url($instagram_link['url']); ?>" target="<?php echo esc_attr($instagram_link['target']); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/IG.svg" alt="Instagram" />
						</a>
					<?php endif; ?>

					<?php $linkedin_link = get_field('linkedin_link', 'option'); ?>
					<?php if( $linkedin_link ): ?>
						<a href="<?php echo esc_url($linkedin_link['url']); ?>" target="<?php echo esc_attr($linkedin_link['target']); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/img/footer/LI.svg" alt="LinkedIn" />
						</a>
					<?php endif; ?>
				</div>
				<?php $newsletter_link = get_field('newsletter_link', 'option'); ?>
				<?php if( $newsletter_link ): ?>
					<div>
						<a href="<?php echo $newsletter_link['url']; ?>" class="btn-purple" target="_blank">Newsletter</a>
					</div>
				<?php endif; ?>
			</div>

		</div>

		<div class="container py-2 bg-[#211E3A] flex items-center justify-center lg:justify-between flex-wrap">
			<p class="text-sm">Copyright <?php echo date('Y'); ?> mindhamok Ltd.</p>
			<p class="text-sm">Site by <a href="https://www.greenwich-design.co.uk/" target="_blank">Greenwich Design</a></p>
		</div>

	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<a href="https://mindhamok-demo.youcanbook.me/"  target="_blank" class="fixed bottom-0 left-0 right-0 bg-purple px-4 py-3 justify-center items-center gap-2.5 inline-flex sm:hidden z-40">
	<p class="text-base font-bold text-ghost-white">Book a FREE demo</p>
	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25" fill="none">
		<path d="M17 8.5L21 12.5M21 12.5L17 16.5M21 12.5L3 12.5" stroke="#F7F7FB" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
	</svg>
</a>


<?php include 'template-parts/popup.php'; ?>


<div id="lightbox" class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-space-cadet bg-opacity-95">
	<!-- Close button outside the video container -->
	<span class="absolute top-32 right-4 text-white text-4xl font-bold cursor-pointer z-60 lightbox-close">&times;</span>

	<div class="relative w-full max-w-[90vw]" style="padding-top: 56.25%;">
		<iframe id="lightbox-video" class="absolute top-0 left-0 w-full h-full z-50" allowfullscreen></iframe>
	</div>
</div>

</body>
</html>
