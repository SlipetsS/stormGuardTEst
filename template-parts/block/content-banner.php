<?php

/**
 * Banner Block Template.
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
$text = get_field('banner_text') ?: 'Your test here...';
$link = get_field('banner_button_link') ?: 'Link here';
$btnText = get_field('banner_button_text') ?: 'Text for button here';
$image = get_field('banner_image') ?: 295;
?>

<?php if ( $image ) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background: url('<?php echo $image; ?>') no-repeat; background-size: cover; ">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6 colmd-6">
                    <div class="banner-text">
                        <?php echo $text; ?>
                        <a class="btn" href="<?php echo $link; ?>"><?php echo $btnText; ?> <span> > </span></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php
endif; ?>

<?php
