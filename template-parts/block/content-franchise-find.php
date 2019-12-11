<?php

/**
 * Franchise Find Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'franchise-box-find-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'franchise-box-find';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>

<!--Default Information For Franchise Find Block-->
<?php if( have_rows('default_info','option') ): ?>
    <?php while( have_rows('default_info','option') ): the_row();
        // Get sub field values.
        $titleDefault = get_sub_field('title');
        $contentDefault = get_sub_field('content');
        $formCodeDefault= get_sub_field('code_form');
        ?>
    <?php endwhile; ?>
<?php endif; ?>

<?php
    $title = !empty(get_field('franchise_find_title')) ? get_field('franchise_find_title') : $titleDefault;
    $content= !empty(get_field('franchise_find_content')) ? get_field('franchise_find_content') : $contentDefault;
    $form = !empty(get_field('franchise_find_form')) ? get_field('franchise_find_form') : $formCodeDefault;
?>

    <section id="<?php echo esc_attr($id); ?>" class="franchise-box-find <?php echo esc_attr($className); ?>" >
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-8 franchise-box__left p-0">
                    <div class="franchise-box__left_find">
                        <h2><?php echo $title; ?></h2>
                        <p><?php echo $content; ?></p>
                    </div>
                </div>
                <div class="col-sm col-lg-4 franchise-box__left p-0">
                    <div class="franchise-box__right_form">
                        <?php  echo do_shortcode($form); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php
