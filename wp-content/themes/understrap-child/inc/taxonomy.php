<?php
// hook into the init action and call create_industary_taxonomies when it fires
add_action( 'init', 'create_industry_taxonomies', 0 );


// create two taxonomies, genres and writers for the post type "industry"
function create_industry_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Industry', 'taxonomy general name', 'understrap' ),
		'singular_name'     => _x( 'Industry', 'taxonomy singular name', 'understrap' ),
		'search_items'      => __( 'Search Industry', 'understrap' ),
		'all_items'         => __( 'All Industry', 'understrap' ),
		'parent_item'       => __( 'Parent Industry', 'understrap' ),
		'parent_item_colon' => __( 'Parent Industry:', 'understrap' ),
		'edit_item'         => __( 'Edit Industry', 'understrap' ),
		'update_item'       => __( 'Update Industry', 'understrap' ),
		'add_new_item'      => __( 'Add New Industry', 'understrap' ),
		'new_item_name'     => __( 'New Industry Name', 'understrap' ),
		'menu_name'         => __( 'Industry', 'understrap' ),
	);

	$args = array(
    		'hierarchical'          => false,
    		'labels'                => $labels,
    		'show_ui'               => true,
    		'show_admin_column'     => true,
    		'update_count_callback' => '_update_post_term_count',
    		'query_var'             => true,
    		'rewrite'               => array( 'slug' => 'industry' ),
    	);




	register_taxonomy( 'industry', array( 'industry' ), $args );
}
?>
