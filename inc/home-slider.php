<?php
// Enqueue Slick Files


// Create HOME Slider
function home_slider_template() { ?>

    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#home-slider').slick({
                cssEase: 'ease-in-out',
                infinite: true,
                arrows:false,
                dots: true,
//                autoplay: true,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1
            });

        });
    </script>

    <div class="home-slider-wrapp">
   <?php $arg = array(
        'post_type'	        => 'testimonials',
        'order'		        => 'ASC',
        'orderby'	        => 'menu_order',
        'posts_per_page'    => -1
    );
    $slider = new WP_Query( $arg );
    if ( $slider->have_posts() ) : ?>

            <div id="home-slider" class="slick-slider">

            <?php while ( $slider->have_posts() ) : $slider->the_post(); ?>

                    <div class="slick-slide">

                        <div class="testimonials-one">

                            <div class="testimonials-one_content">
                                <?php echo the_content(); ?>
                            </div>
                            <span><?php echo the_title(); ?></span>
                            <span><?php echo the_field('team_position'); ?></span>

                        </div>

                    </div>

            <?php endwhile; ?>
            </div>


    <?php endif; wp_reset_query(); ?>
    </div>
<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
    ob_start();
    home_slider_template();
    $slider = ob_get_clean();
    return $slider;
}
add_shortcode( 'slider', 'home_slider_shortcode' );

?>