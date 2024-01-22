<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://thierrycharriot.github.io
 * @since      1.0.0
 *
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Plugin_Mentions
 * @subpackage Plugin_Mentions/includes
 * @author     Thierry Charriot <thierrycharriot@chez.lui>
 */
class Plugin_Mentions_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {

		/**
		 * Delete page on plugin deactivate
		 * @link       https://github.com/thierrycharriot
		 * @since      0.0.1
         * https://developer.wordpress.org/reference/classes/wpdb/
         */
		global $wpdb;

		$get_data = $wpdb->get_row(
			$wpdb->prepare(
				"SELECT ID from " . $wpdb->prefix . "posts WHERE post_name = %s", 'mentions'
			)
		);
		#echo $wpdb->last_guery(); die();
		$page_id = $get_data->ID;
		if ( $page_id > 0 ) {
            // https://developer.wordpress.org/reference/functions/wp_delete_post/
            // wp_delete_post( int $postid, bool $force_delete = false ): WP_Post|false|null
            // Trash or delete a post or page.
			wp_delete_post( $page_id, true );
		}
	}

}
