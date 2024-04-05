<?php
/**
 * Counters Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'counters';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

?>

<?php if( have_rows('counters') ): ?>
    <section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr($class_name); ?> bg-space-cadet relative">
        <div class="container flex flex-wrap justify-center gap-16 lg:justify-between slide-up">
            
            <?php while( have_rows('counters') ) : the_row();
               $number = get_sub_field('counter_number');
               $label = get_sub_field('counter_label');                          
            ?>
                <div class="flex flex-col gap-y-3 items-center min-w-20 side-up">
                    <div class="heading-one leading-none text-[48px] counter bg-counterGradient bg-clip-text text-transparent inline" data-target="<?php echo $number; ?>">0</div>
                    <p class="font-bold"><?php echo $label; ?></p>
                </div>
                            
            <?php endwhile; ?>
                  
        </div>
    </section>
<?php endif; ?>

