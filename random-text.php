<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://sarathlal.com
 * @since             1.0.0
 * @package           Random_Text
 *
 * @wordpress-plugin
 * Plugin Name:       Random Text
 * Plugin URI:        https://sarathlal.com
 * Description:       This is a description of the plugin.
 * Version:           1.0.0
 * Author:            Sarathlal N
 * Author URI:        https://sarathlal.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       random-text
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
define( 'RANDOM_TEXT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-random-text-activator.php
 */
function activate_random_text() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-random-text-activator.php';
	Random_Text_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-random-text-deactivator.php
 */
function deactivate_random_text() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-random-text-deactivator.php';
	Random_Text_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_random_text' );
register_deactivation_hook( __FILE__, 'deactivate_random_text' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-random-text.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_random_text() {

	$plugin = new Random_Text();
	$plugin->run();
}
run_random_text();


if (!function_exists('write_log')) {
	function write_log ( $log )  {
		if ( true === WP_DEBUG ) {
			if ( is_array( $log ) || is_object( $log ) ) {
				error_log( print_r( $log, true ) );
			} else {
				error_log( $log );
			}
		}
	}
}