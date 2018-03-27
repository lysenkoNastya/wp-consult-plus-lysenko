<?php
        add_action( 'init', 'industry_register' );
        add_action( 'init', 'testimonials_register' );
/**
 * Register a book post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function industry_register() {
	$labels = array(
		'name'               => _x( 'Industry', 'post type general name', 'understrap' ),
        'singular_name'      => _x( 'Industry number', 'post type singular name', 'understrap' ),
        'menu_name'          => _x( 'Industry', 'admin menu', 'understrap' ),
        'name_admin_bar'     => _x( 'Industry', 'add new on admin bar', 'understrap' ),
        'add_new'            => _x( 'Add New Industry member', 'Team member', 'understrap' ),
        'add_new_item'       => __( 'Add New Industry member', 'understrap' ),
        'new_item'           => __( 'New Industry member', 'understrap' ),
        'edit_item'          => __( 'Edit Industry member', 'understrap' ),
        'view_item'          => __( 'View Industry member', 'understrap' ),
        'all_items'          => __( 'All Industry members', 'understrap' ),
        'search_items'       => __( 'Search Industry members', 'understrap' ),
        'parent_item_colon'  => __( 'Parent Industry member:', 'understrap' ),
        'not_found'          => __( 'No Industry members found.', 'understrap' ),
        'not_found_in_trash' => __( 'No Industry members found in Trash.', 'understrap' )
        );

        $args = array(
        'labels'             => $labels,
        'description'        => __( 'This is a team list of the members', 'understrap' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'industry' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'search')
        );

        register_post_type('industry', $args );
        }

function testimonials_register() {
	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'understrap' ),
        'singular_name'      => _x( 'Testimonials number', 'post type singular name', 'understrap' ),
        'menu_name'          => _x( 'Testimonials', 'admin menu', 'understrap' ),
        'name_admin_bar'     => _x( 'Testimonials', 'add new on admin bar', 'understrap' ),
        'add_new'            => _x( 'Add New Testimonials member', 'Team member', 'understrap' ),
        'add_new_item'       => __( 'Add New Testimonials member', 'understrap' ),
        'new_item'           => __( 'New Testimonials member', 'understrap' ),
        'edit_item'          => __( 'Edit Testimonials member', 'understrap' ),
        'view_item'          => __( 'View Testimonials member', 'understrap' ),
        'all_items'          => __( 'All Testimonials members', 'understrap' ),
        'search_items'       => __( 'Search Testimonials members', 'understrap' ),
        'parent_item_colon'  => __( 'Parent Testimonials member:', 'understrap' ),
        'not_found'          => __( 'No Testimonials members found.', 'understrap' ),
        'not_found_in_trash' => __( 'No Testimonials members found in Trash.', 'understrap' )
        );

        $args = array(
        'labels'             => $labels,
        'description'        => __( 'This is a team list of the members', 'understrap' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'testimonials' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => true,
        'supports'           => array( 'title', 'thumbnail', 'editor', 'position')
        );

        register_post_type('testimonials', $args );
        }


function create_post_type() {
  register_post_type( 'acme_product',
    array(
      'labels' => array(
        'name' => __( 'Products' ),
        'singular_name' => __( 'Product' )
      ),
      'public' => true,
      'has_archive' => true,
    )
  );
}
add_action( 'init', 'create_post_type' );