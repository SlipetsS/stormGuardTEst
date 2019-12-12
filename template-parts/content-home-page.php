<?php
/**
 * Template part for displaying page content in template-home.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>



    <article class="clearfix" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
            <?php
            the_content();

            wp_link_pages(array(
                'before' => '<div class="page-links">' . esc_html__('Pages:', 'storm'),
                'after' => '</div>',
            ));
            ?>

        </div>
        <!-- .entry-content -->

    </article>
    <!-- #post-<?php the_ID(); ?> -->




