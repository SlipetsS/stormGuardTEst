<?php
/**
 * Template part for displaying page content in services page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>


<div class="container">
    <div class="row">
        <div class="col-sm-12 col-lg-12">
                <article class="clearfix" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="entry-content">
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
</div>
<div class="container">
    <div class="row our-services">
        <div class="line"></div>
        <div class="col-sm-12 col-lg-12">
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
                        $current_term = get_term_by('slug', $sub_category->slug, 'services_category');
                        ?>

                        <?php if ($image): ?>
                            <a href="<?php echo get_term_link($term->slug, 'services_category'); ?>">
                                <img src="<?php echo($image['sizes']['service-thumbnail']); ?>"/>
                            </a>
                        <?php endif; ?>

                        <h5> <?php echo $sub_category->name; ?></h5>
                        <p><?php echo $current_term->description; ?></p>
                    </div>
                </div>

            <?php
            endforeach;

        endforeach; ?>

        <div class="col-sm col-lg-12">
            <div class="padd-30"></div>
        </div>
    </div>

</div>



