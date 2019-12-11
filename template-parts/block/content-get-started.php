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
$id = 'get-started-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'get-started';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

    // Load values and assign defaults.
    $text = get_field('title') ?: 'Your title here...';
    $content= get_field('content') ?: 'Content here';
    $repeater= get_field('blocks_info') ?: 'Repeater here';


    ?>

<?php if ( $image ) : ?>
    <div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" style="background: url('<?php echo $image; ?>') no-repeat; ">
        <div class="container">

            <div class="row started-box">
                <div class="col-sm col-lg-12">

                    <h3><?php echo $text; ?></h3>
                    <p><?php echo $content; ?></p>


                    <div class="content-info">
                        <h3>Ready To Get Started?</h3>
                        <p> Damage to your home or business from a storm?</p><p> Looking to replace your old roof or siding? Get Started below!
                        </p>
                    </div>
                </div>
                <div class="col-sm col-lg-4">
                    <div class="started-box-one">
                        <img src="./images/img1.jpg" alt=""/>
                        <div class="started-box-one_link">
                            <h5> <a href="">
                                    Residantial
                                </a></h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-lg-4">
                    <div class="started-box-one">
                        <img src="./images/img1.jpg" alt=""/>
                        <div class="started-box-one_link">
                            <h5>  <a href="">Commercial </a>  </h5>
                        </div>
                    </div>
                </div>
                <div class="col-sm col-lg-4">
                    <div class="started-box-one">
                        <img src="./images/img1.jpg" alt=""/>
                        <div class="started-box-one_link">
                            <h5><a href="">
                                    Insurance
                                </a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<?php
endif; ?>


<?php
