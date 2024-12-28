<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://yukyhendiawan.com
 * @since      1.0.0
 *
 * @package    Disable_Widgets_Block
 * @subpackage Disable_Widgets_Block/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Disable_Widgets_Block
 * @subpackage Disable_Widgets_Block/includes
 * @author     Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 */
class Disable_Widgets_Block_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'disable-widgets-block',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
