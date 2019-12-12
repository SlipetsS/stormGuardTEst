<?php
/**
 * Template part for displaying page content in content-projects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>

<div class="container">
    <div class="row">
        <article class="clearfix" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <div class="entry-content">
                <a href="<?php echo get_permalink(); ?>"><?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>
                <h3><?php the_title(); ?></h3>
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
    </div>
</div>






