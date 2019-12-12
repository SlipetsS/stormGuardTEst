<?php
/*
 * Template Name: Home Template
 */
get_header(); ?>


    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part( 'template-parts/content-home', 'page' );

                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

    <section  class="franchise-box-find" >
        <div class="container">
            <div class="row">
                <!--Default Information For Franchise Find Block-->
                <?php if( have_rows('franchise_find_box','option') ): ?>
                    <?php while( have_rows('franchise_find_box','option') ): the_row();


                        // Get sub field values.
                        $titleDefault = get_sub_field('franchise_find_title','option');
                        $contentDefault = get_sub_field('franchise_find_content','option');
                        $formCodeDefault= get_sub_field('franchise_find_form','option');
                        ?>
                    <?php endwhile; ?>
                <?php endif; ?>


                <div class="col-sm col-lg-8 franchise-box__left p-0">
                    <div class="franchise-box__left_find">
                        <h2><?php echo $titleDefault; ?></h2>
                        <p><?php echo $contentDefault; ?></p>
                    </div>
                </div>
                <div class="col-sm col-lg-4 franchise-box__left p-0">
                    <div class="franchise-box__right_form">
                        <?php  echo do_shortcode($formCodeDefault); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row our-services">
            <div class="col-sm col-lg-12">
                <div class="content-info">
                    <h3><?php echo the_field('services_box_title'); ?></h3>
                    <p><?php echo the_field('services_box_content'); ?> </p>
                </div>
            </div>
            <?php
            $post_args = array( 'post_type' => 'services','order' => 'ASC', 'posts_per_page' => 8 );
            $post_query = new WP_Query( $post_args );

            if ( $post_query->have_posts() ) :
                while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                    <div class="col-sm col-lg-4">
                        <div class="service-one">
                          <a href="<?php echo get_permalink(); ?>"><?php  if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?></a>
                            <h5><?php echo the_title(); ?></h5>
                            <p><?php echo the_content(); ?></p>
                        </div>
                    </div>


                    <?php wp_reset_postdata(); ?>

                <?php endwhile; // ending while loop ?>
            <?php else:  ?>

                <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
            <?php endif; // ending condition ?>
            <div class="col-sm col-lg-12">
                <div class="btns-box">
                    <a class="btn-yellow" href="<?php echo get_post_type_archive_link( 'services' ); ?>">View All Services</a>
                </div>
            </div>

        </div>

    </div>

    <div class="container">
        <div class="row started-box">
            <div class="col-sm col-lg-12">
                <div class="content-info">
                    <h3><?php echo the_field('get_started_title','option'); ?></h3>
                    <p> <?php echo the_field('get_started_content','option'); ?>
                    </p>
                </div>
            </div>

            <?php if( have_rows('blocks_info','option') ): ?>
                <?php while( have_rows('blocks_info','option') ): the_row();

                    $title = get_sub_field('title_info_block');
                    $image = get_sub_field('image_info_block');
                    $link = get_sub_field('page_link_info_block');

                    // Use variables below ?>
                    <div class="col-sm col-lg-4">
                        <div class="started-box-one">
                            <img src="<?php echo $image; ?>" />
                            <div class="started-box-one_link">
                                <h5> <a href="<?php echo $link; ?>">
                                        <?php echo $title; ?>
                                    </a>
                                </h5>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </div>


    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-12">
                   <h3><?php echo the_field('testimonials_title','option'); ?></h3>
                 </div>
                <div class="col-sm col-lg-12">
                    <?php home_slider_template(); ?>
                </div>
            </div>
        </div>
    </section>


<section class="latest-posts">
    <div class="container">
        <div class="row">
            <div class="col-sm col-lg-12">
                <h3><?php echo the_field('latest_news_title','option'); ?></h3>
            </div>

            <?php
            $post_args = array( 'post_type' => 'post','order' => 'ASC', 'posts_per_page' => 3 );
            $post_query = new WP_Query( $post_args );

            if ( $post_query->have_posts() ) :
                while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

                    <div class="col-sm col-lg-4">
                        <div class="latest-posts_one">
                            <div class="date">
                                <?php
                                $post_date_month = get_the_date( 'M' );
                                $post_date_day = get_the_date( 'd' );?>
                                <span><?php echo $post_date_month; ?></span>
                                <span class="day"><?php  echo $post_date_day;?></span>
                            </div>
                            <?php  the_post_thumbnail(); ?>
                            <div class="latest-posts_text">
                                <h6><?php echo the_title();?></h6>
                                <p><?php echo get_excerpt(); ?></p>
                            </div>
                            <div class="author">BY <?php the_author(); ?></div>
                        </div>
                    </div>

                    <?php wp_reset_postdata(); ?>

                <?php endwhile; // ending while loop ?>
            <?php else:  ?>
                <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
            <?php endif; // ending condition ?>

            <div class="col-sm col-lg-12">
                <div class="btns-box">
                    <a class="btn-yellow" href="<?php echo get_post_type_archive_link( 'post' ); ?>">View More News</a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
get_footer();