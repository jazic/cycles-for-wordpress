<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             3.0
 * @package           Cycles
 *
 * @wordpress-plugin
 * Plugin Name:       Cycles 
 * Plugin URI:        https://demo.cycleshq.com/
 * Description:       The WordPress plugin will help users install  the script so they don’t have to mess with any code
 * Version:           3.0
 * Author:            Pawan Vir
 * Author URI:        https://demo.cycleshq.com/ 
 * Text Domain:       cycles
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
$plugin = plugin_basename(__FILE__); 
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cycles-activator.php
 */
function activate_cycles() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cycles-activator.php';
	Cycles_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cycles-deactivator.php
 */
function deactivate_cycles() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cycles-deactivator.php';
	Cycles_Deactivator::deactivate();
}

/**
 * The code that runs during plugin settings.
 * This action is documented in includes/class-cycles-deactivator.php
 */
 
function cycles_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=cycles">Settings</a>'; 
  array_push($links, $settings_link); 
  return $links; 
}

add_filter("plugin_action_links_$plugin", 'cycles_settings_link');

register_activation_hook( __FILE__, 'activate_cycles' );
register_deactivation_hook( __FILE__, 'deactivate_cycles' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cycles.php'; 

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cycles() {

	$plugin = new Cycles();
	$plugin->run();

}
run_cycles();