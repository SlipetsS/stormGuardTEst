<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package storm
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://use.typekit.net/kfy7ltz.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<header id="masthead" class="site-header">
        <div class="top-header-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm col-lg-4">
                        <div class="custom-line">
                            <a href="<?php echo the_field('header_top_link','option'); ?>"><?php echo the_field('header_top_tiltle','option'); ?></a>
                        </div>
                    </div>
                    <div class="col-sm col-lg-8">
                        <div class="custom-menu">
                            <?php wp_nav_menu( [ 'menu' => 'Top Line Menu' ] ); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm col-lg-3">
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            if ( is_front_page() && is_home() ) :
                                ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php
                            else :
                                ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                            endif;
                            $storm_description = get_bloginfo( 'description', 'display' );
                            if ( $storm_description || is_customize_preview() ) :
                                ?>
                                <p class="site-description"><?php echo $storm_description; /* WPCS: xss ok. */ ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                    </div>
                    <div class="col-sm col-lg-9">
                        <nav id="site-navigation" class="main-navigation">
                            <?php
                            wp_nav_menu( array(
                                'theme_location' => 'menu-1',
                                'menu_id'        => 'primary-menu',
                            ) );
                            ?>
                        </nav><!-- #site-navigation -->
                    </div>
                </div>
            </div>
        </div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">

        <div class="banner-page">

            <?php if( is_front_page() ){

            }
            else {


            if ( has_post_thumbnail() ) :
                the_post_thumbnail();

            else:
                 echo the_field('banner_image_default','option');
            endif;

            } ?>


        </div>


