<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package storm
 */

?>

	</div><!-- #content -->






	<footer id="colophon" class="site-footer">
        <div class="footer-aditional">
            <div class="container">
                <div class="row">
                    <div class="col-sm col-lg-6">
                        <?php if (have_rows('contact_box', 'option')): ?>
                            <?php while (have_rows('contact_box', 'option')): the_row();

                                // Get sub field values.
                                $title = get_sub_field('contact_title', 'option');
                                $content = get_sub_field('contact_description', 'option');
                                $form = get_sub_field('code_form', 'option');

                                ?>

                                    <h4><?php echo $title; ?></h4>
                                    <div class="content">
                                        <?php echo $content; ?>
                                    </div>
                                    <?php echo do_shortcode($form) ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="col-sm col-lg-6">


                    </div>
                </div>
            </div>
        </div>
        <div class="footer-line">

            <div class="container">
                <div class="row">
                    <div class="col-sm col-lg-6">
                          <?php echo the_field('copyright','option'); ?>
                    </div>
                    <div class="col-sm col-lg-6">
                          <?php wp_nav_menu( [ 'menu' => 'Footer Menu' ] ); ?>
                    </div>

                </div>
            </div>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
