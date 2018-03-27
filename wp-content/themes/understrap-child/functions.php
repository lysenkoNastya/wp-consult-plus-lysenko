<?php
function understrap_remove_scripts() {
    wp_dequeue_style( 'understrap-styles' );
    wp_deregister_style( 'understrap-styles' );

    wp_dequeue_script( 'understrap-scripts' );
    wp_deregister_script( 'understrap-scripts' );

    // Removes the parent themes stylesheet and scripts from inc/enqueue.php
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {

	// Get the theme data
	$the_theme = wp_get_theme();
    wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . '/css/child-theme.min.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'slick-style', get_stylesheet_directory_uri() . '/libs/slick/slick.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_style( 'slick-theme-style', get_stylesheet_directory_uri() . '/libs/slick/slick-theme.css', array(), $the_theme->get( 'Version' ) );
    wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'popper-scripts', get_template_directory_uri() . '/js/popper.min.js', array(), false);
    wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . '/js/child-theme.min.js', array(), $the_theme->get( 'Version' ), true );
    wp_enqueue_script( 'slick-scripts', get_stylesheet_directory_uri() . '/libs/slick/slick.min.js', array(), $the_theme->get( 'Version' ), true );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
};


// Removes the parent themes widgets from inc/widgets.php
function remove_widgets(){

unregister_sidebar( 'right-sidebar' );
unregister_sidebar( 'left-sidebar' );
unregister_sidebar( 'hero' );
unregister_sidebar( 'statichero' );
unregister_sidebar( 'footerfull' );

}
add_action( 'widgets_init', 'remove_widgets', 11 );


//Include child-theme widgets.php
require_once('inc/widgets.php');

//Include child-theme cpt.php
require_once('inc/cpt.php');

//Include child-theme customizer.php
require_once('inc/customizer.php');

//Include child-theme taxonomy.php
require_once('inc/taxonomy.php');

//Include child-theme setup.php
require_once('inc/setup.php');

//Include child-theme pagination.php
require_once('inc/pagination.php');

//Include child-theme extras.php
require_once('inc/extras.php');

