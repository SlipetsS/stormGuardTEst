<?php

/**
 * Get Started Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title = get_field('get_started_title') ?: 'Your test here...';
$content = get_field('get_started_content') ?: 'Link here';

?>

<?php if ( $image ) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background: url('<?php echo $image; ?>') no-repeat; ">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-6">
                    <div class="banner-text">
                        <?php echo $title; ?>
                        <?php echo $content; ?>

                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
endif; ?>


<?php

