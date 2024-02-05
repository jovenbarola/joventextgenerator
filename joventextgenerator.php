<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.jbarola.net
 * @since             1.0.0
 * @package           Joventextgenerator
 *
 * @wordpress-plugin
 * Plugin Name:       joven text generator
 * Plugin URI:        https://wp-plugins.jbarola.net
 * Description:       This is only sample text generator I made to showcase my knowledge about Wordpress Plugin development
 * Version:           1.0.0
 * Author:            Joven A. Barola
 * Author URI:        https://www.jbarola.net/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       joventextgenerator
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
define( 'JOVENTEXTGENERATOR_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-joventextgenerator-activator.php
 */
function activate_joventextgenerator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-joventextgenerator-activator.php';
	Joventextgenerator_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-joventextgenerator-deactivator.php
 */
function deactivate_joventextgenerator() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-joventextgenerator-deactivator.php';
	Joventextgenerator_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_joventextgenerator' );
register_deactivation_hook( __FILE__, 'deactivate_joventextgenerator' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-joventextgenerator.php';

// Your main plugin file might include the action hook as well
add_action('plugins_loaded', 'run_joventextgenerator');

// Hook into the admin_menu action hook
add_action('admin_menu', 'joven_custom_menu');


// Function to create the custom menu
function joven_custom_menu() {
    // Parameters for add_menu_page function
    // add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position);

    add_menu_page(
        'Joven Generate Text - Lorem Ipsum',      // Page Title
        'Joven Generate Text - Lorem Ipsum',         // Menu Title
        'manage_options',      // Capability (who can access this menu)
        'joven_loremipsum_page_slug', // Menu Slug (should be unique)
        'joven_loremipsum_page',      // Callback function to display content
        'dashicons-buddicons-buddypress-logo', // Icon URL or dashicon class
        20                     // Position in the menu
    );
}

// Callback function to display content for the custom page
function joven_loremipsum_page() {
    // Your page content goes here
	$html = file_get_contents(plugin_dir_url(__FILE__) . 'web/loremipsum.php');
    echo $html;
}

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_joventextgenerator() {

	$plugin = new Joventextgenerator();
	$plugin->run();

}
run_joventextgenerator();
