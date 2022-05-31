<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://github.com/thierrycharriot
 * @since      1.0.0
 *
 * @package    Plugin_Ocooking
 * @subpackage Plugin_Ocooking/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Ocooking
 * @subpackage Plugin_Ocooking/includes
 * @author     Thierry Charriot <thierrycharriot@chez.lui>
 */
class Plugin_Ocooking_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		remove_role( 'cook' );
	}

}
