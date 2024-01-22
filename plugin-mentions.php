<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://thierrycharriot.github.io
 * @since             1.0.0
 * @package           Plugin_Mentions
 *
 * @wordpress-plugin
 * Plugin Name:       Plugin Mentions
 * Plugin URI:        https://github.com/thierrycharriot
 * Description:       Plugin Mentions. Generates a legal notice page.
 * Version:           1.0.0
 * Author:            Thierry Charriot
 * Author URI:        https://thierrycharriot.github.io
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-mentions
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_MENTIONS_VERSION', '1.0.0' );

// https://developer.wordpress.org/reference/functions/plugin_dir_path/
// plugin_dir_path( string $file )
// Get the filesystem directory path (with trailing slash) for the plugin __FILE__ passed in.
define( 'PLUGIN_MENTIONS_PATH', plugin_dir_path( __FILE__ ) );
// https://developer.wordpress.org/reference/functions/plugin_dir_url/
// plugin_dir_url( string $file )
// Get the URL directory path (with trailing slash) for the plugin __FILE__ passed in.
define( 'PLUGIN_MENTIONS_URL', plugin_dir_url( __FILE__ ) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-plugin-mentions-activator.php
 */
function activate_plugin_mentions() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-mentions-activator.php';
	Plugin_Mentions_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-plugin-mentions-deactivator.php
 */
function deactivate_plugin_mentions() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-plugin-mentions-deactivator.php';
	Plugin_Mentions_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_plugin_mentions' );
register_deactivation_hook( __FILE__, 'deactivate_plugin_mentions' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-plugin-mentions.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_plugin_mentions() {

	$plugin = new Plugin_Mentions();
	$plugin->run();

}
run_plugin_mentions();
