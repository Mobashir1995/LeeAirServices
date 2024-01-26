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
	// add_image_size( 'small-thumb', 60, 60, true );
	// add_image_size( 'front-page-thumbnails', 328, 197,true );
	// add_image_size('image_small', 400, 400, false);
	// add_image_size('image_large', 700, 700, false); 
	// add_image_size( 'single-page-thumbnails', 1140, 428,true );
}
add_action( 'after_setup_theme', 'pd_hello_child_setup_theme' );


/**
 * Loads Styles and Scripts
 */
function pd_hello_child_enqueue() {
	$parent_style = 'hello-elementor';

	//Enqueue Styles.
	wp_dequeue_style( 'hello-elementor' );
	wp_enqueue_style('child_theme_style', get_stylesheet_uri(), array(),HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	
	// wp_enqueue_style('responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');
	// wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/css/custom.css' , array(), HELLO_ELEMENTOR_CHILD_VERSION, 'all');

	// Dequeue Parent Theme JS
	wp_dequeue_script( 'hello-theme-frontend' );
	//Enqueue Scripts.
	wp_enqueue_script('jquery');
	// wp_enqueue_script('custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array(), HELLO_ELEMENTOR_CHILD_VERSION, true);
	// wp_enqueue_script('theme', get_stylesheet_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), HELLO_ELEMENTOR_CHILD_VERSION, true);
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
// add_action( 'after_setup_theme', 'pd_hello_child_menus' );

add_filter( 'gform_form_args', 'no_ajax_on_all_forms', 10, 1);
add_filter( 'jetpack_implode_frontend_css', '__return_false', 99 );


// /**
//  * Carbon FIelds get value  wrapper function
//  */
// function pd_hello_child_carbon_get_theme_option( $option_name ) {
// 	if( function_exists( 'carbon_get_theme_option' ) ) {
// 		return carbon_get_theme_option( $option_name );
// 	}
// }

add_filter( 'hello_elementor_page_title', '__return_false' );
add_filter( 'hello_elementor_enqueue_style', '__return_false' );
add_filter( 'hello_elementor_enqueue_theme_style', '__return_false' );

/**
 * Include Files.
 */
// require_once get_stylesheet_directory() . '/inc/elementor.php';