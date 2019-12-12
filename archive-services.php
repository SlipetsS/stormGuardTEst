<?php
/**
 * Archive Services
 *
 * Standard loop for the front-page
 */
get_header(); ?>
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
                                <a href="<?php echo get_term_link($term->slug, 'services_category');?>"><img src="<?php echo $image; ?>" alt=""/></a>
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


            </div>
    </div>
<?php
get_sidebar();
get_footer();
