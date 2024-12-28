<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://yukyhendiawan.com
 * @since      1.0.0
 *
 * @package    Disable_Widgets_Block
 * @subpackage Disable_Widgets_Block/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Disable_Widgets_Block
 * @subpackage Disable_Widgets_Block/admin
 * @author     Yuky Hendiawan <yukyhendiawan1998@gmail.com>
 */
class Disable_Widgets_Block_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Enqueue admin-specific styles and scripts for the 'disable-widgets-block-settings' admin page.
	 *
	 * @param string $hook The current admin page hook.
	 */
	public function enqueue_admin( $hook ) {

		// Check if the current admin page is 'disable-widgets-block-settings' (top-level menu page).
		if ( 'toplevel_page_disable-widgets-block-settings' === $hook ) {
			// Enqueue the admin CSS file.
			wp_enqueue_style( 'disable-widgets-block-style', DISABLE_WIDGETS_BLOCK_DIR_URL . '/assets/css/admin-menu.min.css', array(), '1.0.0' );

			// Enqueue the admin JavaScript file with jQuery as a dependency.
			wp_enqueue_script( 'disable-widgets-blockock-script', DISABLE_WIDGETS_BLOCK_DIR_URL . '/assets/js/admin-menu.min.js', array(), '1.0.0', true );
		}
	}

	/**
	 * Clear admin notices on specific plugin pages.
	 *
	 * This function removes all admin notices when the user is on either
	 * the "disable-widgets-blockock-settings" or "disable-widgets-block" page within the admin area.
	 *
	 * @global string $plugin_page The current plugin page slug.
	 */
	public function disable_admin_notices() {
		global $plugin_page;

		// Check if the user is in the admin area.
		if ( is_admin() ) {
			// If the current page is either "disable-widgets-block-settings" or "disable-widgets-block".
			if ( 'disable-widgets-block-settings' === $plugin_page ) {
				// Remove all admin notices for these specific pages.
				remove_all_actions( 'admin_notices' );
			}
		}
	}

	/**
	 * Registers the top-level admin menu page and adds a submenu page for 'About'.
	 *
	 * This function uses the WordPress add_menu_page() and add_submenu_page() functions to create
	 * the necessary admin menu structure. It also sets up the callback functions for
	 * the top-level and submenu pages.
	 *
	 * @return void
	 */
	public function admin_menu_page() {
		add_menu_page(
			__( 'Disable Widgets', 'disable-widgets-block' ), // Page title.
			__( 'Disable Widgets', 'disable-widgets-block' ), // Menu title.
			'manage_options', // Capability required.
			'disable-widgets-block-settings', // Menu slug.
			array( $this, 'template_for_information_menu' ), // Callback function.			
			'dashicons-admin-customizer' // Icon URL.
		);
	}	

	/**
	 * Loads the template for the 'Information' menu page in the plugin.
	 *
	 * This function constructs the path to the template file located
	 * in the plugin directory and includes it if it exists.
	 */
	public function template_for_information_menu() {
		// Define the path to the template file.
		$template_path = DISABLE_WIDGETS_BLOCK_DIR_PATH . 'admin/templates/information.php';

		// Check if the template file exists.
		if ( file_exists( $template_path ) ) {
			// Include the template file if it exists.
			include $template_path;
		}
	}	

	/**
	 * Returns false.
	 * 
	 * Useful for returning false to filters easily.
	 *
	 * @see __return_true()
	 * 
	 * @return false False.
	 */
	public function disable_widgets_block() {
		return false;
	} 

}
