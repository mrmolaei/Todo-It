<?php


namespace Todo_It;

use Todo_It\Activate;
use Todo_It\Deactivate;
use Todo_It\Helpers\Template;

class TodoIt
{
	public $plugin;

	function __construct()
	{
		$this->plugin = plugin_basename( __FILE__);
	}

	function register()
	{
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

		add_action( 'admin_menu', array( $this, 'addAdminPages' ) );

		add_filter( "plugin_action_links_$this->plugin", array( $this , 'settingsLink' ) );
	}

	function settingsLink( $links )
	{
		$settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}

	function addAdminPages()
	{
		add_menu_page( __( 'Todo It', 'my-plugin' ), __( 'Todo It', 'my-plugin' ), 'manage_options', 'my_plugin', array(
			$this,
			'adminIndex'
		), 'dashicons-yes-alt', null );
	}

	function adminIndex()
	{
		Template::loadTemplate('admin');
	}

	function enqueue()
	{
		wp_enqueue_style( 'my-plugin-handler-style', plugins_url( '/assets/mystyles.css', __FILE__ ) );
	}

	function activate() {
		Activate::activate();
	}

	function deactivate() {
		Deactivate::deactivate();
	}
}