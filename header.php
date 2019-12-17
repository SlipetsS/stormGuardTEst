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
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header">
        <!--Header Top Line Block Start-->
        <div class="top-header-box">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 col-md-4">
                        <div class="custom-line">
                            <?php
                            $link = get_field('header_top_link','option');
                            if( $link ):
                                $link_url = $link['url'];
                                $link_title = $link['title'];
                                $link_target = $link['target'] ? $link['target'] : '_self';
                                ?>
                                <a  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                            <?php endif; ?>

                            </div>
                    </div>
                    <div class="col-sm-12 col-lg-8 col-md-8">
                        <div class="custom-menu">
                            <?php wp_nav_menu( [ 'menu' => 'Top Line Menu' ] ); ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--Header Top Line Block End-->

        <div class="site-info">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-lg-3 col-md-3">
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
                    <div class="col-sm-12 col-lg-9 col-md-9">
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
        <!--Banner Block Start-->
            <?php if( !is_front_page() ){ ?>

                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="banner-page" style="background: url('<?php the_post_thumbnail_url(); ?>') no-repeat; background-size: cover; background-position: center;">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt=""/>
                    </div>
                <?php else: ?>
                    <div class="banner-page" style="background: url('<?php echo the_field('banner_image_default','option'); ?>') no-repeat;background-size: cover; background-position: center;">
                        <img src="<?php echo the_field('banner_image_default','option'); ?>" alt=""/>
                    </div>
                <?php endif;
            } ?>
        <!--Banner Block End-->

        <!--Breadcrumbs Block Start-->
        <?php if( !is_front_page() ){ ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12 col-md-12">
                    <?php the_breadcrumb(); ?>
                </div>
            </div>
        </div>
       <?php  } ?>
        <!--Breadcrumbs Block End-->

