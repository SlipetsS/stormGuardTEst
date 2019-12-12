<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>

<div class="container">
    <div class="row">
        <div class="col-sm col-lg-12">
            <div class="content-page">
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
</div>

<?php if( get_field('franchise_owner_box_title') ): ?>
    <section class="franchise-box">
        <div class="container">
            <div class="row">
                <div class="col-sm col-lg-8 franchise-box__left">
                    <h2> <?php echo the_field('franchise_owner_box_title'); ?></h2>
                    <p> <?php echo the_field('franchise_owner_box_content'); ?></p>
                </div>
                <div class="col-sm col-lg-4 franchise-box__right">
                    <div class="franchise-box__right_form">
                        <a class="btn" href="<?php echo the_field('franchise_owner_box_link_button'); ?>">  <?php echo the_field('franchise_owner_box_title_button'); ?></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php endif; ?>




