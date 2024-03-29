<?php
/**
 * The template for displaying taxonomy-services pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

get_header();
?>

    <div class="container">
        <div class="row">

            <?php $arg = array(
                'post_type'	    => 'services',
                'order'		    => 'ASC',
                'orderby'	    => 'menu_order',
                'posts_per_page'    => -1,
                'tax_query' => array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'services_category',
                        'field' => 'slug',
                        'terms' => array( 'window', 'paint' ),
                        'include_children' => true,
                        'operator' => 'IN'
                    ),
                )

            );
            $the_query = new WP_Query( $arg );
            if ( $the_query->have_posts() ) : ?>

                    <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        ?>
                        <div class="col-sm-12 col-lg-12 col-md-12">
                            <div class="content-page clearfix">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

            <?php endif; wp_reset_query(); ?>

            <div class="col-sm-12 col-lg-12">
                <?php the_posts_pagination(array(
                    'end_size' => 2,
                )); ?>
            </div>

        </div>
    </div>


    <div class="container">
        <div class="row our-services">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="content-info">
                    <h3><?php echo the_field('services_box_title','option'); ?></h3>
                    <p><?php echo the_field('services_box_content','option'); ?> </p>
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

            foreach ( $categories as $category ) :


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

                <?php foreach ( $sub_categories as $sub_category ) : ?>
                <div class="col-sm-12 col-lg-4 col-md-4">
                    <div class="service-one">

                        <?php
                        $term = get_term_by('slug', $sub_category->slug, 'services_category');
                        $image = get_field('icon_category', $term);
                        $current_term = get_term_by( 'slug', $sub_category->slug , 'services_category' );
                        ?>

                        <?php if( $image ): ?>
                            <a href="<?php echo get_term_link($term->slug, 'services_category')?>">
                                <img src="<?php echo($image['sizes']['service-thumbnail']); ?>" />
                            </a>
                        <?php endif; ?>
                        <h5> <?php echo $sub_category->name; ?></h5>
                        <p><?php echo $current_term->description; ?></p>
                    </div>
                </div>

            <?php endforeach;

            endforeach; ?>

        </div>
    </div>

    <div class="container">
        <div class="row started-box">
            <div class="col-sm-12 col-lg-12">
                <div class="content-info">
                    <h3><?php echo the_field('get_started_title','option'); ?></h3>
                    <p> <?php echo the_field('get_started_content','option'); ?> </p>
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
<?php
get_sidebar();
get_footer();
