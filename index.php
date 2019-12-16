<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

get_header();
?>

<section class="latest-posts">
    <div class="container">
        <div class="row">

            <?php
            $post_args = array('post_type' => 'post', 'order' => 'ASC', 'posts_per_page' => -1);
            $post_query = new WP_Query($post_args);

            if ($post_query->have_posts()) :
                while ($post_query->have_posts()) : $post_query->the_post(); ?>

                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="latest-posts_one">
                            <div class="date">
                                <?php
                                $post_date_month = get_the_date( 'M' );
                                $post_date_day = get_the_date( 'd' );?>
                                <span><?php echo $post_date_month; ?></span>
                                <span class="day"><?php  echo $post_date_day;?></span>
                            </div>
                            <?php  the_post_thumbnail( 'category-thumbnail', array( 'class' => 'alignleft' ) ); ?>
                            <div class="latest-posts_text">
                                <h6><?php echo the_title();?></h6>
                                <p><?php echo get_excerpt(); ?></p>
                            </div>
                            <div class="author">BY <?php the_author(); ?></div>
                        </div>
                    </div>

                    <?php wp_reset_postdata(); ?>

                <?php endwhile; // ending while loop
                ?>
            <?php else:
                get_template_part('template-parts/content', 'none'); ?>
            <?php endif; // ending condition ?>

        </div>
    </div>
    </section>
<?php
get_sidebar();
get_footer();
