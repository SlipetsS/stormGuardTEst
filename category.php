<?php
/**
 * The template for displaying category archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>
<div class="container">
        <div class="row our-services">
            <div class="col-sm col-lg-12">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <?php if (have_posts()) : ?>



                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part('template-parts/content', get_post_type());

                            endwhile;

                            the_posts_navigation();

                        else :

                            get_template_part('template-parts/content', 'none');

                        endif;
                        ?>

                    </main>
                    <!-- #main -->
                </div>
                <!-- #primary -->
            </div>
        </div>
    </div>
<?php
get_sidebar();
get_footer();

