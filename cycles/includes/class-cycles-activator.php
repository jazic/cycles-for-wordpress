<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Cycles
 * @subpackage Cycles/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Cycles
 * @subpackage Cycles/includes
 * @author     Your Name <email@example.com>
 */
class Cycles_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Plugin Details
        /* $this->plugin               = new stdClass;
        $this->plugin->name         = 'custom-plugin'; // Plugin Folder
        $this->plugin->displayName  = 'Add custom scripts'; // Plugin Name
		
		// Hooks
		add_action('admin_init', array(&$this, 'registerSettings'));
        add_action('admin_menu', array(&$this, 'adminPanelsAndMetaBoxes')); */
		  
		//add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		
		add_action('admin_menu', 'create_theme_easy_admin_menu');
	}
	function create_theme_easy_admin_menu() {
		add_options_page('Easy Admin Menu', 'Easy Admin Menu', 'administrator', 'easy_admin_menu_plugin', 'build_easy_admin_menu','dashicons-wordpress');
	}

	function admin_menu() {
		add_options_page(
			'Page Title',
			'Circle Tree Login',
			'manage_options',
			'options_page_slug',
			array(
				$this,
				'settings_page'
			)
		);
	}

	function  settings_page() {
		echo 'This is the page content';
	}	 
		//add_action( 'admin_menu', 'wporg_custom_admin_menu' );

 
	function wporg_custom_admin_menu() {
		add_options_page( 
			'My Options',
			'My Plugin',
			'manage_options',
			'my-plugin.php',
			'my_plugin_page'
		);
	}

	/**
    * Register the plugin settings panel
    */
    function adminPanelsAndMetaBoxes() {
    	add_submenu_page('options-general.php', $this->plugin->displayName, $this->plugin->displayName, 'manage_options', $this->plugin->name, array(&$this, 'adminPanel'));
	}
	
	/**
	* Register Settings
	*/
	function registerSettings() {
		register_setting($this->plugin->name, 'ihaf_insert_header', 'trim');
		register_setting($this->plugin->name, 'ihaf_insert_footer', 'trim');
	}

	
	/**
	* Register Settings
	*/
	function api_settings_options_page() { 
		update_option('toggleHeader', 'testing123');
	}

}
