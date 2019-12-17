<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package storm
 */

get_header();
?>

<div class="container">
    <div class="row">

        <?php
        while (have_posts()) :
            the_post();

            get_template_part('template-parts/content', get_post_type());
        endwhile;
        ?>
    </div>
</div>

<?php
get_sidebar();
get_footer();
