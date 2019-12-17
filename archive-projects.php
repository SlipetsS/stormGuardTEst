<?php
/**
 * Archive Projects
 *
 * Standard loop for the front-page
 */
get_header(); ?>
    <div class="container">
        <div class="row">
            <?php
            $post_args = array( 'post_type' => 'projects','order' => 'ASC', 'posts_per_page' => -1 );
            $post_query = new WP_Query( $post_args );

            if ( $post_query->have_posts() ) :
                while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <a href="<?php echo get_permalink(); ?>"><?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>
                        <h5><?php echo the_title(); ?></h5>
                        <p><?php echo get_excerpt(); ?></p>
                    </div>

                    <?php wp_reset_postdata(); ?>

                <?php endwhile; // ending while loop ?>
            <?php else:  ?>

                <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
            <?php endif; // ending condition ?>

        </div>
    </div>
<?php
get_sidebar();
get_footer();
