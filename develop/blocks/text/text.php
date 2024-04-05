<?php
/**
 * Text Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$col1 = get_field('text_col1') ?: 'Column One Content here...';
$col2 = get_field('text_col2') ?: 'Column Two Content here...';

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
    $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'text';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}
?>

<section <?php echo esc_attr( $anchor ); ?> class="<?php echo esc_attr( $class_name ); ?> bg-space-cadet relative">
    <div class="container text-ghost-white grid md:grid-cols-2 gap-y-8 md:gap-y-10 gap-x-24">
        <div class="col wysiwyg fade-in-left">
            <?php echo $col1; ?>
        </div>
        <div class="col wysiwyg fade-in-right">          
            <?php echo $col2; ?>
        </div>
    </div>
</section>







