<?php

/**
 * Register the user role for the plugin
 *
 * @since    0.0.1
 * @author   Thierry_Charriot@chez.lui
 */

class Role {
	
	public static function add_role_cook() {
		/**
		 * https://developer.wordpress.org/reference/functions/add_role/
		 * add_role( string $role, string $display_name, bool[] $capabilities = array() )
		 * https://wordpress.org/support/article/roles-and-capabilities/#capability-vs-role-table
		 */
		add_role( 'cook', 'Cook',
			[
				/**
				* moderate_comments	Y	Y	Y
				* manage_categories	Y	Y	Y
				* manage_links	Y	Y	Y
				* edit_others_posts	Y	Y	Y
				* edit_pages	Y	Y	Y
				* edit_others_pages	Y	Y	Y
				* edit_published_pages	Y	Y	Y
				* publish_pages	Y	Y	Y
				* delete_pages	Y	Y	Y
				* delete_others_pages	Y	Y	Y
				* delete_published_pages	Y	Y	Y
				* delete_others_posts	Y	Y	Y
				* delete_private_posts	Y	Y	Y
				* edit_private_posts	Y	Y	Y
				* read_private_posts	Y	Y	Y
				* delete_private_pages	Y	Y	Y
				* edit_private_pages	Y	Y	Y
				* read_private_pages	Y	Y	Y
				* edit_published_posts	Y	Y	Y	Y
				* upload_files	Y	Y	Y	Y
				* publish_posts	Y	Y	Y	Y
				* delete_published_posts	Y	Y	Y	Y
				* edit_posts	Y	Y	Y	Y	Y
				* delete_posts	Y	Y	Y	Y
				 */	

				'moderate_comments' => true,
				'manage_categories' => true,
				'manage_links' => true,
				'edit_others_posts' => true,
				'edit_pages' => true,
				'edit_others_pages' => true,	
				'edit_published_pages' => true,
				'publish_pages' => true,
				'delete_pages' => true,
				'delete_others_pages' => true,
				'delete_published_pages' => true,
				'delete_others_posts' => true,
				'delete_private_posts' => true,
				'edit_private_posts' => true,
				'read_private_posts' => true,
				'delete_private_pages' => true,
				'edit_private_pages' => true,
				'read_private_pages' => true,
				'edit_published_posts' => true,
				'upload_files' => true,
				'publish_posts' => true,
				'delete_published_posts' => true,
				'edit_posts' => true,
				'delete_posts' => true,

			]
		);
	}

}