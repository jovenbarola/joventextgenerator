<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.jbarola.net
 * @since      1.0.0
 *
 * @package    Joventextgenerator
 * @subpackage Joventextgenerator/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Joventextgenerator
 * @subpackage Joventextgenerator/includes
 * @author     Joven A. Barola <jovenbarola@gmail.com>
 */
class Joventextgenerator_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'joventextgenerator',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
