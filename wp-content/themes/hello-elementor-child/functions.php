<?php
/**
 * Theme functions and definitions
 *
 * @package PluginDevs
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'HELLO_ELEMENTOR_CHILD_VERSION', '1.0.24' );

/**
 * After Setup Theme Hook
 */
function pd_hello_child_setup_theme() {
	//Add Theme Supports.
	add_theme_support('menus');
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );

	//Add Image Sizes
	add_image_size( 'small-thumb', 60, 60, true );
	add_image_size( 'front-page-thumbnails', 328, 197,true );
	add_image_size('image_small', 400, 400, false);
	add_image_size('image_large', 700, 700, false); 
	add_image_size( 'single-page-thumbnails', 1140, 428,true );
}
add_action( 'after_setup_theme', 'pd_hello_child_setup_theme' );


/**
 * Loads Styles and Scripts
 */
function pd_hello_child_enqueue() {
	$parent_style = 'hello-elementor';

	//Enqueue Styles.
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('fontello', get_stylesheet_directory_uri() . '/assets/css/fontello.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('fontello-embedded', get_stylesheet_directory_uri() . '/assets/css/fontello-embedded.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('owlcarousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.min.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('font-awesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.min.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_dequeue_style( 'hello-elementor' );
	wp_enqueue_style('child_theme_style', get_stylesheet_uri(), array(),HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	
	wp_enqueue_style('back-compat-css', get_stylesheet_directory_uri() . '/style-back-compat.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/css/custom.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	wp_enqueue_style('child_theme_old_style', get_stylesheet_directory_uri() . '/assets/css/customizer.css', array( 'child_theme_style' ), HELLO_ELEMENTOR_CHILD_VERSION, 'all');

	// Dequeue Parent Theme JS
	wp_dequeue_script( 'hello-theme-frontend' );
	//Enqueue Scripts.
	wp_enqueue_script('jquery');
	wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, false);
	wp_enqueue_script('packery-js', 'https://unpkg.com/packery@2/dist/packery.pkgd.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, false);
	wp_enqueue_script('jquerycounterup', get_stylesheet_directory_uri() . '/assets/js/jquery.counterup.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('fontawesome', get_stylesheet_directory_uri() . '/assets/js/fontawesome.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('bootstrap', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('owlcarousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('custom2', get_stylesheet_directory_uri() . '/assets/js/custom2.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_register_script('googleapis','https://maps.googleapis.com/maps/api/js?key=AIzaSyA_Agsvf36du-7l_mp8iu1a-rXoKcWfs2I', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	//wp_enqueue_script('googleapis');
	wp_enqueue_script('form-custom-lib', 'https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('form-custom', get_stylesheet_directory_uri() . '/form-custom.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), HELLO_ELEMENTOR_CHILD_VERSION, true);
}
	add_action( 'wp_enqueue_scripts', 'pd_hello_child_enqueue' );


/**
 * Register nav Menus
 */
function pd_hello_child_menus() {
	$locations = array(
		'top-menu' => __('Top Menu', 'thechillbrothers'),
		'samrt-thermostat-installation' => __( 'Smart Thermostat Installation', 'thechillbrothers' ),
		'extra-menu' => __( 'Extra Menu', 'thechillbrothers' ),
		'cooling-service-menu' => __( 'Cooling Service Menu', 'thechillbrothers' ),
		'cooling-service-menu-two' => __( 'Cooling Service Menu Two', 'thechillbrothers' ),
		'heating-service-menu' => __( 'Heating Service Menu', 'thechillbrothers' ),
		'quick-menu-one' => __( 'Quick Link Menu One', 'thechillbrothers' ),
		'quick-menu-two' => __( 'Quick Link Menu Two', 'thechillbrothers' ),
		'quick-menu-three' => __( 'Quick Link Menu Three', 'thechillbrothers' ),
		'footer-service-area-menu' => __( 'Footer Service Area Menu', 'thechillbrothers' ),
		'footer-bottom-menu-one' => __( 'Footer Bottom Menu One', 'thechillbrothers' ),
		'footer-bottom-menu-two' => __( 'Footer Bottom Menu Two', 'thechillbrothers' ),
	);
	register_nav_menus( $locations );
}
add_action( 'after_setup_theme', 'pd_hello_child_menus' );

add_filter( 'gform_form_args', 'no_ajax_on_all_forms', 10, 1);
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );

/**
 * Modify and add attribute to the Script tag
 */
add_filter( 'script_loader_tag', function ( $tag, $handle ) {
	if ( 'google-recaptcha' !== $handle ){
		return $tag;
	}
	return str_replace( ' src', ' async defer src', $tag );
}, 10, 2 );

/**
 * ShortCode to Display Latest Posts
 */
function latest_post() {
    $args = array(
        'posts_per_page' => 6, /* how many post you need to display */
        'offset' => 0,
        'orderby' => 'post_date',
        'order' => 'DESC',
        'post_type' => 'post', /* your post type name */
        'post_status' => 'publish'
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(60,60) ); ?><?php the_title(); ?></a>
            <?php
        endwhile;
    endif;   
}
add_shortcode('lastest-post', 'latest_post');

/**
 * Carbon FIelds get value  wrapper function
 */
function pd_hello_child_carbon_get_theme_option( $option_name ) {
	if( function_exists( 'carbon_get_theme_option' ) ) {
		return carbon_get_theme_option( $option_name );
	}
}

/**
 * Hide TinyMce for Specific Page Templates
 */
function pd_hello_child_hide_tinyeditor_wp() {
// Not really necessary, but just in case
	if( !isset( $_GET['post'] ) )
		return;

	$template_file = get_post_meta( $_GET['post'] , '_wp_page_template', true );

	if( 'template-blog.php' === $template_file ){ // edit the template name
		remove_post_type_support('page', 'editor');
	}
}
add_action( 'load-page.php', 'pd_hello_child_hide_tinyeditor_wp' );

add_filter( 'hello_elementor_page_title', '__return_false' );
add_filter( 'hello_elementor_enqueue_style', '__return_false' );
add_filter( 'hello_elementor_enqueue_theme_style', '__return_false' );

/**
 * Include Files.
 */
require_once get_stylesheet_directory() . '/inc/carbon-fields.php';
require_once get_stylesheet_directory() . '/inc/ajax.php';
require_once get_stylesheet_directory() . '/inc/class-wp-bootstrap-navwalker.php';
require_once get_stylesheet_directory() . '/inc/elementor.php';