<?php
/**
 * Uos-blog Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uos-layout
 */

add_action( 'init', 'uos_layout_theme_register_menus' );
add_action( 'widgets_init', 'uos_layout_theme_sidebar_registration' );
add_action( 'wp_enqueue_scripts', 'uos_layout_theme_enqueue_styles' );
add_action( 'wp_enqueue_scripts', 'uos_layout_theme_enqueue_scripts' );

/**
 * @see https://codex.wordpress.org/Custom_Headers
 */
add_theme_support( 'custom-header', array(
	'default-image'          => '', //http://blog.vagrant/wp-content/uploads/2018/08/BSc_Management-Female-Student-1920x689.jpg
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => false,
	'flex-width'             => false,
	'uploads'                => true,
	'random-default'         => false,
	'header-text'            => true,
	'default-text-color'     => '',
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
) );

add_theme_support( 'post-thumbnails' );

/**
 * Load stylesheets
 */
function uos_layout_theme_enqueue_styles() {

	// if used as a child theme, then we will assume it was created with its own enqueue styles function(?)
	if (! is_child_theme()) {
		wp_enqueue_style( 'uos_stylesheet', get_template_directory_uri() . '/style.css' );
	}

	// brand fonts
	// wp_enqueue_style( 'uos_gfonts', '//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' );

	//
	wp_enqueue_style( 'uos_gfonts',  '//fonts.googleapis.com/css?family=Acme|Anton|Gloria+Hallelujah|Indie+Flower|Jua|Kaushan+Script|Lobster|Pacifico|Patrick+Hand|Ultra' );

}

/**
 * Load scripts
 */
function uos_layout_theme_enqueue_scripts() {

    wp_enqueue_script( 'script', get_template_directory_uri() . '/script.js', array(), 1.1, true);

}

/**
 * Register menus
 */
function uos_layout_theme_register_menus() {

	register_nav_menus(
 		array(
 			'main-menu-location' => __( 'Main menu location' ),
 			'top-right-menu-location' => __( 'Top right menu location' ),
 		)
 	);

}

function uos_layout_theme_sidebar_registration() {

	register_sidebar( array(
		'name' 			=> __( 'Sidebar' ),
		'id'			=> 'sidebar',
		'description' 	=> __( 'Widgets in this area will be shown in the sidebar.' ),
		'before_title' 	=> '<h3 class="widget-title">',
		'after_title' 	=> '</h3>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget' 	=> '</div><div class="clear"></div></div>',
	) );

}
