<?php

/**
 * Registers the `ingredient` taxonomy,
 * for use with 'cpt-recipe'.
 */
function ingredient_init() {
	register_taxonomy( 'ingredient', [ 'cpt-recipe' ], [
		'hierarchical'          => false,
		'public'                => true,
		'show_in_nav_menus'     => true,
		'show_ui'               => true,
		'show_admin_column'     => false,
		'query_var'             => true,
		'rewrite'               => true,
		'capabilities'          => [
			'manage_terms' => 'edit_posts',
			'edit_terms'   => 'edit_posts',
			'delete_terms' => 'edit_posts',
			'assign_terms' => 'edit_posts',
		],
		'labels'                => [
			'name'                       => __( 'Ingredients', 'YOUR-TEXTDOMAIN' ),
			'singular_name'              => _x( 'Ingredient', 'taxonomy general name', 'YOUR-TEXTDOMAIN' ),
			'search_items'               => __( 'Search Ingredients', 'YOUR-TEXTDOMAIN' ),
			'popular_items'              => __( 'Popular Ingredients', 'YOUR-TEXTDOMAIN' ),
			'all_items'                  => __( 'All Ingredients', 'YOUR-TEXTDOMAIN' ),
			'parent_item'                => __( 'Parent Ingredient', 'YOUR-TEXTDOMAIN' ),
			'parent_item_colon'          => __( 'Parent Ingredient:', 'YOUR-TEXTDOMAIN' ),
			'edit_item'                  => __( 'Edit Ingredient', 'YOUR-TEXTDOMAIN' ),
			'update_item'                => __( 'Update Ingredient', 'YOUR-TEXTDOMAIN' ),
			'view_item'                  => __( 'View Ingredient', 'YOUR-TEXTDOMAIN' ),
			'add_new_item'               => __( 'Add New Ingredient', 'YOUR-TEXTDOMAIN' ),
			'new_item_name'              => __( 'New Ingredient', 'YOUR-TEXTDOMAIN' ),
			'separate_items_with_commas' => __( 'Separate ingredients with commas', 'YOUR-TEXTDOMAIN' ),
			'add_or_remove_items'        => __( 'Add or remove ingredients', 'YOUR-TEXTDOMAIN' ),
			'choose_from_most_used'      => __( 'Choose from the most used ingredients', 'YOUR-TEXTDOMAIN' ),
			'not_found'                  => __( 'No ingredients found.', 'YOUR-TEXTDOMAIN' ),
			'no_terms'                   => __( 'No ingredients', 'YOUR-TEXTDOMAIN' ),
			'menu_name'                  => __( 'Ingredients', 'YOUR-TEXTDOMAIN' ),
			'items_list_navigation'      => __( 'Ingredients list navigation', 'YOUR-TEXTDOMAIN' ),
			'items_list'                 => __( 'Ingredients list', 'YOUR-TEXTDOMAIN' ),
			'most_used'                  => _x( 'Most Used', 'ingredient', 'YOUR-TEXTDOMAIN' ),
			'back_to_items'              => __( '&larr; Back to Ingredients', 'YOUR-TEXTDOMAIN' ),
		],
		'show_in_rest'          => true,
		'rest_base'             => 'ingredients',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	] );

}

add_action( 'init', 'ingredient_init' );

/**
 * Sets the post updated messages for the `ingredient` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `ingredient` taxonomy.
 */
function ingredient_updated_messages( $messages ) {

	$messages['ingredient'] = [
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Ingredient added.', 'YOUR-TEXTDOMAIN' ),
		2 => __( 'Ingredient deleted.', 'YOUR-TEXTDOMAIN' ),
		3 => __( 'Ingredient updated.', 'YOUR-TEXTDOMAIN' ),
		4 => __( 'Ingredient not added.', 'YOUR-TEXTDOMAIN' ),
		5 => __( 'Ingredient not updated.', 'YOUR-TEXTDOMAIN' ),
		6 => __( 'Ingredients deleted.', 'YOUR-TEXTDOMAIN' ),
	];

	return $messages;
}

add_filter( 'term_updated_messages', 'ingredient_updated_messages' );
