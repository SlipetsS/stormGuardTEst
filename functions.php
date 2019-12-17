<?php
/**
 * storm functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package storm
 */

if (!function_exists('storm_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function storm_setup() {
        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on storm, use a find and replace
        * to change 'storm' to the name of your theme in all the template files.
        */
        load_theme_textdomain('storm', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
        */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'storm'),
        ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('storm_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'storm_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function storm_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('storm_content_width', 640);
}

add_action('after_setup_theme', 'storm_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function storm_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'storm'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'storm'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'storm_widgets_init');
/**
 * Enqueue scripts and styles for slick slider.
 */
if (is_front_page()) :
function slick_slider_scripts_and_styles() {
    if (is_page_template('template-pages/template-home.php')):
        //Enqueue our slider script
        wp_enqueue_script('slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), '1.5.8', true);
        //Enqueue our slider style
        wp_enqueue_style('slick', get_template_directory_uri() . '/css/slick.css', null, null);
    endif;
}
add_action('wp_enqueue_scripts', 'slick_slider_scripts_and_styles');
endif;

/**
 * Enqueue scripts and styles.
 */
function storm_scripts() {
    wp_enqueue_style('storm-style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css', null, null);

    wp_enqueue_script('storm-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js',  array('jquery'), 'v4.4.1', true);

    if (is_front_page()) :
        wp_enqueue_script('global', get_template_directory_uri() . '/js/global.js',  array('jquery'), '1.0.0', true);
    endif;

    wp_enqueue_script('storm-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'storm_scripts');

/**
 * Run Sick slider on HOME page
 */
include_once(TEMPLATEPATH . '/inc/home-slider.php');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/breadcrumbs-function.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Function for New Blocks ACF
 */
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

    // check function exists
    if (function_exists('acf_register_block')) {

        acf_register_block(array(
            'name' => 'banner',
            'title' => __('Banner Home'),
            'description' => __('A custom banner home block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('banner', 'quote'),
        ));

        acf_register_block(array(
            'name' => 'get started',
            'title' => __('Get Started'),
            'description' => __('A custom Get Started block.'),
            'render_callback' => 'my_acf_block_render_callback',
            'category' => 'formatting',
            'icon' => 'admin-comments',
            'keywords' => array('get-started', 'quote'),
        ));
    }
}

function my_acf_block_render_callback($block) {
    $slug = str_replace('acf/', '', $block['name']);
    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/template-parts/block/content-{$slug}.php"))) {
        include(get_theme_file_path("/template-parts/block/content-{$slug}.php"));
    }
}

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => false
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Header Settings',
        'menu_title' => 'Header',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Default Settings',
        'menu_title' => 'Default',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Home Page Settings',
        'menu_title' => 'Footer Home Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Footer Default Page Settings',
        'menu_title' => 'Footer Default Page',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Find Franchise Settings',
        'menu_title' => 'Find Franchise',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Get Started Settings',
        'menu_title' => 'Get Started',
        'parent_slug' => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Theme Copyright Settings',
        'menu_title' => 'Copyright',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Testimonials Settings',
        'menu_title' => 'Testimonials',
        'parent_slug' => 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Theme Service Info Settings',
        'menu_title' => 'Service Info',
        'parent_slug' => 'theme-general-settings',
    ));
}

/**
 * Post Type Projects
 */
function easytuts_projects_post() {
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name'),
        'add_new' => _x('Add New', 'project'),
        'add_new_item' => __('Add New Projects'),
        'edit_item' => __('Edit Project'),
        'new_item' => __('New Project'),
        'all_items' => __('All Projects'),
        'view_item' => __('View Project'),
        'search_items' => __('Search Project'),
        'not_found' => __('No game found'),
        'not_found_in_trash' => __('No game found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Projects'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds projects and game specific data',
        'public' => true,
        'menu_position' => 4,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('projects', $args);
}

add_action('init', 'easytuts_projects_post');

/**
 * Creating Post Type Services
 */
function easytuts_services_post() {
    $labels = array(
        'name' => _x('Residential', 'post type general name'),
        'singular_name' => _x('Service', 'post type singular name'),
        'add_new' => _x('Add New', 'service'),
        'add_new_item' => __('Add New Services'),
        'edit_item' => __('Edit Service'),
        'new_item' => __('New Service'),
        'all_items' => __('All Services'),
        'view_item' => __('View Service'),
        'search_items' => __('Search Service'),
        'not_found' => __('No service found'),
        'not_found_in_trash' => __('No service found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Services'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds services and service specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('services', $args);
}

add_action('init', 'easytuts_services_post');

/**
 * Creating Taxonomy for CPT Services
 */
function fnc_taxonomies_services() {
    $labels = array(
        'name' => _x('Service Categories', 'taxonomy general name'),
        'singular_name' => _x('Service Category', 'taxonomy singular name'),
        'search_items' => __('Search Service Categories'),
        'all_items' => __('All Service Categories'),
        'parent_item' => __('Parent Service Category'),
        'parent_item_colon' => __('Parent Service Category:'),
        'edit_item' => __('Edit Service Category'),
        'update_item' => __('Update Service Category'),
        'add_new_item' => __('Add New Service Category'),
        'new_item_name' => __('New Service Category'),
        'menu_name' => __('Services Categories'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'services'),
    );
    register_taxonomy('services_category', 'services', $args);
}

add_action('init', 'fnc_taxonomies_services', 0);

/**
 * Creating Post Type Testimonials
 */
function easytuts_testimonials_post() {
    $labels = array(
        'name' => _x('Testimonials', 'post type general name'),
        'singular_name' => _x('Testimonial', 'post type singular name'),
        'add_new' => _x('Add New', 'testimonial'),
        'add_new_item' => __('Add New Testimonials'),
        'edit_item' => __('Edit Testimonial'),
        'new_item' => __('New Testimonial'),
        'all_items' => __('All Testimonials'),
        'view_item' => __('View Testimonial'),
        'search_items' => __('Search Testimonial'),
        'not_found' => __('No service found'),
        'not_found_in_trash' => __('No service found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Testimonials'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds testimonials and testimonial specific data',
        'public' => true,
        'menu_position' => 6,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('testimonials', $args);
}

add_action('init', 'easytuts_testimonials_post');

/**
 *  Function Custom Excerpt
 */
function get_excerpt() {
    $excerpt = get_the_content();
    $excerpt = preg_replace(" ([.*?])", '', $excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, 350);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace('/\s+/', ' ', $excerpt));
    $excerpt = $excerpt . '. <a href="' . get_the_permalink() . '">Read More</a>';
    return $excerpt;
}

/**
 *  Function Cropping Images
 */
function wpdocs_theme_setup() {
    add_image_size('service-thumbnail', 84, 84, true);
    add_image_size('projects-thumbnail', 127, 127, true);
    add_image_size('category-thumbnail', 384, 244, true);
}
add_action('after_setup_theme', 'wpdocs_theme_setup');

/**
 *  Filter Delete Title from Pagination
 */
function fnc_navigation_template( $template, $class ){

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>    
	';
}
add_filter('navigation_markup_template', 'fnc_navigation_template', 10, 2 );