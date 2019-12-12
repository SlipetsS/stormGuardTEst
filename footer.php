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

<!------=OR=-------->
<?php if ( is_front_page() ) { ?>

    <div class="footer-aditional main-footer">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-6">
                    <div class="footer-contact">
                        <?php if (have_rows('contact_box', 'option')): ?>
                            <?php while (have_rows('contact_box', 'option')): the_row();

                                // Get sub field values.
                                $title = get_sub_field('contact_title', 'option');
                                $content = get_sub_field('contact_description', 'option');
                                $form = get_sub_field('code_form', 'option');

                                ?>

                                <h4><?php echo $title; ?></h4>
                                <p>
                                    <?php echo $content; ?>
                                </p>

                                <?php echo do_shortcode($form) ?>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm col-lg-6">
                    <div class="footer-projects">
                        <?php if (have_rows('past_projects_box', 'option')): ?>
                            <?php while (have_rows('past_projects_box', 'option')): the_row();

                                // Get sub field values.
                                $title = get_sub_field('title', 'option');
                                $content = get_sub_field('content', 'option');
                                $buttonTitle = get_sub_field('button_title', 'option');

                                ?>

                                <h4><?php echo $title; ?></h4>
                                <p>
                                    <?php echo $content; ?>
                                </p>
                                <div class="footer-projects_list">
                                    <div class="row">

                                        <?php
                                        $post_args = array( 'post_type' => 'projects', 'posts_per_page' => 8 );
                                        $post_query = new WP_Query( $post_args );

                                        if ( $post_query->have_posts() ) :
                                            while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                                                <div class="col-sm col-lg-3">
                                                    <a href="<?php echo get_permalink(); ?>"><?php  if ( has_post_thumbnail() ) {
                                                            the_post_thumbnail( 'projects-thumbnail', array( 'class' => 'alignleft' ) );
                                                        } ?>
                                                    </a>
                                                </div>
                                                <?php wp_reset_postdata(); ?>

                                            <?php endwhile; // ending while loop ?>
                                        <?php else:  ?>

                                            <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
                                        <?php endif; // ending condition ?>
                                    </div>
                                </div>

                                <div class="form-line-btn">
                                    <a class="btn-white" href="<?php echo get_post_type_archive_link( 'projects' ); ?>"><?php echo $buttonTitle ?></a>
                                </div>

                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>

    <div class="footer-aditional">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-6">
                    <div class="footer-contact">
                        <?php if (have_rows('default_contact_box', 'option')): ?>
                            <?php while (have_rows('default_contact_box', 'option')): the_row();

                                // Get sub field values.
                                $title = get_sub_field('contact_title', 'option');
                                $content = get_sub_field('contact_description', 'option');
                                  ?>

                                <h4><?php echo $title; ?></h4>
                                <p>
                                    <?php echo $content; ?>
                                </p>
                                <div class="btns-box">
                                    <?php if( have_rows('buttons','option') ): ?>
                                        <?php while( have_rows('buttons','option') ): the_row();
                                            // Declare variables below
                                            $btnTitle = get_sub_field('button_title');

                                            $btnLink = get_sub_field('button_link');

                                            // Use variables below ?>

                                            <a class="btn-white" href="<?php echo $btnLink; ?>"><?php echo $btnTitle; ?></a>

                                        <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>


                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-sm col-lg-6">
                    <div class="footer-projects">
                        <?php if (have_rows('default_past_projects_box', 'option')): ?>
                            <?php while (have_rows('default_past_projects_box', 'option')): the_row();

                                // Get sub field values.
                                $title = get_sub_field('title', 'option');
                                $content = get_sub_field('content', 'option');
                                 ?>

                                <h4><?php echo $title; ?></h4>
                                <p>
                                    <?php echo $content; ?>
                                </p>
                                <div class="footer-projects_list">
                                    <div class="row">

                                        <?php
                                        $post_args = array( 'post_type' => 'projects', 'posts_per_page' => 8 );
                                        $post_query = new WP_Query( $post_args );

                                        if ( $post_query->have_posts() ) :
                                            while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                                                <div class="col-sm col-lg-3">
                                                    <a href="<?php echo get_permalink(); ?>"><?php  if ( has_post_thumbnail() ) {
                                                            the_post_thumbnail( 'projects-thumbnail', array( 'class' => 'alignleft' ) );
                                                        } ?>
                                                    </a>
                                                </div>
                                                <?php wp_reset_postdata(); ?>

                                            <?php endwhile; // ending while loop ?>
                                        <?php else:  ?>

                                            <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
                                        <?php endif; // ending condition ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>

	<footer id="colophon" class="site-footer">
        <div class="footer-line">
            <div class="container">
                <div class="row">
                    <div class="col-sm col-lg-6">
                          <p><?php echo the_field('copyright','option'); ?></p>
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
