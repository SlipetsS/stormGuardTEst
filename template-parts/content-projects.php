<?php
/**
 * Template part for displaying page content in content-projects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <?php  the_post_thumbnail( 'category-thumbnail', array( 'class' => 'alignleft' ) ); ?>
        <h6><?php echo the_title();?></h6>
        <p><?php echo the_content(); ?></p>
       <?php wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'storm'),
            'after' => '</div>',
        ));
        ?>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->




