<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://wordpress.org/incredibledeveloperr/
 * @since             1.0.3
 * @package           Msg91_By_Vasim_Shaikh
 *
 * @wordpress-plugin
 * Plugin Name:       msg91 by vasim shaikh
 * Plugin URI:        
 * Description:       If you’ve ever wanted to add text messaging functionality to your website or app, MSG91 is one of the best solutions on the market.
 * Version:           1.0.3
 * Author:            Vasim Shaikh
 * Author URI:        https://wordpress.org/incredibledeveloperr/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       msg91-by-vasim-shaikh
 * Domain Path:       /languages
 * Tested up to:      5.5.3
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.2 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'MSG91_BY_VASIM_SHAIKH_VERSION', '1.0.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-msg91-by-vasim-shaikh-activator.php
 */
function activate_msg91_by_vasim_shaikh() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-msg91-by-vasim-shaikh-activator.php';
	Msg91_By_Vasim_Shaikh_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-msg91-by-vasim-shaikh-deactivator.php
 */
function deactivate_msg91_by_vasim_shaikh() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-msg91-by-vasim-shaikh-deactivator.php';
	Msg91_By_Vasim_Shaikh_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_msg91_by_vasim_shaikh' );
register_deactivation_hook( __FILE__, 'deactivate_msg91_by_vasim_shaikh' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-msg91-by-vasim-shaikh.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.2
 */
function run_msg91_by_vasim_shaikh() {

	$plugin = new Msg91_By_Vasim_Shaikh();
	$plugin->run();

}
run_msg91_by_vasim_shaikh();
