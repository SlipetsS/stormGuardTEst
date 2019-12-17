<?php
/**
 * Archive Projects
 *
 * Standard loop for the front-page
 */
get_header(); ?>
<section class="list-posts">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content', get_post_type());

                endwhile; ?>
                <div class="col-sm-12 col-lg-12">
                    <?php the_posts_pagination(array(
                        'end_size' => 2,
                    )); ?>
                </div>

            <?php else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div>
    </div>
</section>
<?php
get_sidebar();
get_footer();
