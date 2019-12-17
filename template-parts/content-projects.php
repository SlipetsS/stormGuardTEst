<?php
/**
 * Template part for displaying page content in content-projects.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storm
 */

?>

<div class="col-sm-12 col-lg-4 col-md-4">
     <div class="list-posts_one">
        <div class="date">
            <?php
            $post_date_month = get_the_date( 'M' );
            $post_date_day = get_the_date( 'd' );?>
            <span><?php echo $post_date_month; ?></span>
            <span class="day"><?php  echo $post_date_day;?></span>
        </div>
        <?php  the_post_thumbnail( 'category-thumbnail', array( 'class' => 'alignleft' ) ); ?>
        <div class="list-posts_text">
            <h6><?php echo the_title();?></h6>
            <p><?php echo get_excerpt(); ?></p>
        </div>
        <div class="author">BY <?php the_author(); ?></div>
    </div>
</div>






