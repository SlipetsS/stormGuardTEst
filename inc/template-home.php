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


                <div class="col-sm-12 col-lg-8 col-md-6 franchise-box__left p-0">
                    <div class="franchise-box__left_find">
                        <h2><?php echo $titleDefault; ?></h2>
                        <p><?php echo $contentDefault; ?></p>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-4 col-md-6 franchise-box__left p-0">
                    <div class="franchise-box__right_form">
                        <?php  echo do_shortcode($formCodeDefault); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row our-services">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="content-info">
                    <h3><?php echo the_field('services_box_title'); ?></h3>
                    <p><?php echo the_field('services_box_content'); ?> </p>
                </div>
            </div>

            <?php
            $args = array(
                'taxonomy' => 'services_category',
                'parent'        => 0,
                'orderby'       => 'name',
                'order'         => 'ASC',
                'hierarchical'  => 1,
                'hide_empty'    => 1,
                'pad_counts'    =>0
            );

            $categories = get_categories( $args );

            foreach ( $categories as $category ){


                $sub_args = array(
                    'taxonomy' => 'services_category',
                    'parent'        => $category->term_id,
                    'orderby'       => 'name',
                    'order'         => 'ASC',
                    'hierarchical'  => 1,
                    'hide_empty'    => 0,
                    'pad_counts'    => 0
                );

                $sub_categories = get_categories( $sub_args ); ?>

                <?php foreach ( $sub_categories as $sub_category ){ ?>
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="service-one">

                            <?php
                            $term = get_term_by('slug', $sub_category->slug, 'services_category');
                            $image = get_field('icon_category', $term);
                            $current_term = get_term_by( 'slug', $sub_category->slug , 'services_category' );
                            ?>

                            <?php if( $image ): ?>
                                <a href="<?php echo get_term_link($term->slug, 'services_category')?>">

                                    <img src="<?php echo $image; ?>" alt=""/></a>
                            <?php endif; ?>

                            <?php echo '<h5>'. $sub_category->name . '</h5>';?>
                            <p><?php
                                echo $current_term->description; ?>
                            </p>
                        </div>
                    </div>

                <?php
                }

            } ?>


            <div class="col-sm-12 col-lg-12">
                <div class="btns-box">
                    <a class="btn-yellow" href="<?php echo get_post_type_archive_link( 'services' ); ?>">View All Services</a>
                </div>
            </div>

        </div>

    </div>

    <div class="container">
        <div class="row started-box">
            <div class="col-sm-12 col-lg-12 col-md-12">
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

                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="started-box-one">
                            <img src="<?php echo($image['sizes']['category-thumbnail']); ?>" />
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
                <div class="col-sm-12 col-lg-12 col-md-12">
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
            <div class="col-sm-12 col-lg-12 col-md-12">
                <h3><?php echo the_field('latest_news_title','option'); ?></h3>
            </div>

            <?php
            $post_args = array( 'post_type' => 'post','order' => 'DESC', 'posts_per_page' => 3 );
            $post_query = new WP_Query( $post_args );

            if ( $post_query->have_posts() ) :
                while ( $post_query->have_posts() ) : $post_query->the_post(); ?>

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

                <?php endwhile; // ending while loop ?>
            <?php else:  ?>
                <p><?php _e( 'Sorry, no game matched your criteria.' ); ?></p>
            <?php endif; // ending condition ?>

            <div class="col-sm-12 col-lg-12 col-md-12">
                <div class="btns-box">
                    <a class="btn-yellow" href="<?php echo get_post_type_archive_link( 'post' ); ?>">View More News</a>
                </div>
            </div>

        </div>
    </div>
</section>
<?php
get_footer();