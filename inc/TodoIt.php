<?php


namespace Todo_It;

use Todo_It\Activate;
use Todo_It\Deactivate;
use Todo_It\Helpers\Template;
use Todo_It\Helpers\page;

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
		$option_page = new Page();
		$option_page_params = array(
			'page_title' => __( 'Todo It' ),
			'menu_title' => __( 'Todo It' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'todo_it',
			'callback'   => function () {
				echo "<h1>Todo It</h1>";
			},
			'icon_url'   => 'dashicons-yes-alt',
			'position'   => null,
		);
		$option_subpage_params = array(
			'page_title' => __( 'Settings' ),
			'menu_title' => __( 'Settings' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'todo_it_settings',
			'callback'   => function () {
				echo "<h1>Settings</h1>";
			},
			'position'   => null,
			'parent_slug' => 'todo_it'
		);

		$option_page->set($option_page_params)->addPage()->set($option_subpage_params)->addSubPage();
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