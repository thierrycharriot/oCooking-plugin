<?php

/**
 * Registers the `cpt_recipe` post type.
 */
function cpt_recipe_init() {
	register_post_type(
		'cpt-recipe',
		[
			'labels'                => [
				'name'                  => __( 'Recipes', 'plugin-ocooking' ),
				'singular_name'         => __( 'Recipe', 'plugin-ocooking' ),
				'all_items'             => __( 'All Recipes', 'plugin-ocooking' ),
				'archives'              => __( 'Recipe Archives', 'plugin-ocooking' ),
				'attributes'            => __( 'Recipe Attributes', 'plugin-ocooking' ),
				'insert_into_item'      => __( 'Insert into Recipe', 'plugin-ocooking' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'plugin-ocooking' ),
				'featured_image'        => _x( 'Featured Image', 'cpt-recipe', 'plugin-ocooking' ),
				'set_featured_image'    => _x( 'Set featured image', 'cpt-recipe', 'plugin-ocooking' ),
				'remove_featured_image' => _x( 'Remove featured image', 'cpt-recipe', 'plugin-ocooking' ),
				'use_featured_image'    => _x( 'Use as featured image', 'cpt-recipe', 'plugin-ocooking' ),
				'filter_items_list'     => __( 'Filter Recipes list', 'plugin-ocooking' ),
				'items_list_navigation' => __( 'Recipes list navigation', 'plugin-ocooking' ),
				'items_list'            => __( 'Recipes list', 'plugin-ocooking' ),
				'new_item'              => __( 'New Recipe', 'plugin-ocooking' ),
				'add_new'               => __( 'Add New', 'plugin-ocooking' ),
				'add_new_item'          => __( 'Add New Recipe', 'plugin-ocooking' ),
				'edit_item'             => __( 'Edit Recipe', 'plugin-ocooking' ),
				'view_item'             => __( 'View Recipe', 'plugin-ocooking' ),
				'view_items'            => __( 'View Recipes', 'plugin-ocooking' ),
				'search_items'          => __( 'Search Recipes', 'plugin-ocooking' ),
				'not_found'             => __( 'No Recipes found', 'plugin-ocooking' ),
				'not_found_in_trash'    => __( 'No Recipes found in trash', 'plugin-ocooking' ),
				'parent_item_colon'     => __( 'Parent Recipe:', 'plugin-ocooking' ),
				'menu_name'             => __( 'Recipes', 'plugin-ocooking' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-buddicons-community',
			'show_in_rest'          => true,
			'rest_base'             => 'recipes',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'cpt_recipe_init' );

/**
 * Sets the post updated messages for the `cpt_recipe` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `cpt_recipe` post type.
 */
function cpt_recipe_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['cpt-recipe'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Recipe updated. <a target="_blank" href="%s">View Recipe</a>', 'plugin-ocooking' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'plugin-ocooking' ),
		3  => __( 'Custom field deleted.', 'plugin-ocooking' ),
		4  => __( 'Recipe updated.', 'plugin-ocooking' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Recipe restored to revision from %s', 'plugin-ocooking' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Recipe published. <a href="%s">View Recipe</a>', 'plugin-ocooking' ), esc_url( $permalink ) ),
		7  => __( 'Recipe saved.', 'plugin-ocooking' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Recipe submitted. <a target="_blank" href="%s">Preview Recipe</a>', 'plugin-ocooking' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Recipe scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Recipe</a>', 'plugin-ocooking' ), date_i18n( __( 'M j, Y @ G:i', 'plugin-ocooking' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Recipe draft updated. <a target="_blank" href="%s">Preview Recipe</a>', 'plugin-ocooking' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'cpt_recipe_updated_messages' );

/**
 * Sets the bulk post updated messages for the `cpt_recipe` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `cpt_recipe` post type.
 */
function cpt_recipe_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['cpt-recipe'] = [
		/* translators: %s: Number of Recipes. */
		'updated'   => _n( '%s Recipe updated.', '%s Recipes updated.', $bulk_counts['updated'], 'plugin-ocooking' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Recipe not updated, somebody is editing it.', 'plugin-ocooking' ) :
						/* translators: %s: Number of Recipes. */
						_n( '%s Recipe not updated, somebody is editing it.', '%s Recipes not updated, somebody is editing them.', $bulk_counts['locked'], 'plugin-ocooking' ),
		/* translators: %s: Number of Recipes. */
		'deleted'   => _n( '%s Recipe permanently deleted.', '%s Recipes permanently deleted.', $bulk_counts['deleted'], 'plugin-ocooking' ),
		/* translators: %s: Number of Recipes. */
		'trashed'   => _n( '%s Recipe moved to the Trash.', '%s Recipes moved to the Trash.', $bulk_counts['trashed'], 'plugin-ocooking' ),
		/* translators: %s: Number of Recipes. */
		'untrashed' => _n( '%s Recipe restored from the Trash.', '%s Recipes restored from the Trash.', $bulk_counts['untrashed'], 'plugin-ocooking' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'cpt_recipe_bulk_updated_messages', 10, 2 );
