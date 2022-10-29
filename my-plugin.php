<?php
/**
 * @package Myplygun
 */
/*
Plugin name: Todo It
Plugin uri: https://mrmolaei.com/plugins/todo-it
Description: This is my first attempt on writing a custom plugin for the first time.
Version: 1.0.0
Author: MohammadReza Molaei
Author uri: https://mrmolaei.com
License: GPL v2 or later
Text Domain: todo-it
 */

// Security
! defined( 'ABSPATH' ) && die;

if (file_exists( dirname(__FILE__) . '/vendor/autoload.php')) {
	require_once dirname(__FILE__) . '/vendor/autoload.php';
}

use Inc\Activate;
use Inc\Deactivate;

define( 'PLUGIN_CLASS', 'TodoIt' );

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

		add_action( 'admin_menu', array( $this, 'add_admin_pages' ) );

		add_filter( "plugin_action_links_$this->plugin", array( $this , 'settings_link' ) );
	}

	function settings_link( $links )
	{
	 $settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
	 array_push($links, $settings_link);
	 return $links;
	}

	function add_admin_pages()
	{
		add_menu_page( __( 'My Plugin', 'my-plugin' ), __( 'My Plugin', 'my-plugin' ), 'manage_options', 'my_plugin', array(
			$this,
			'admin_index'
		), 'dashicons-store', null );
	}

	function admin_index()
	{
		require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php';
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

if ( class_exists( 'TodoIt' ) ) {
	$my_plugin_instance = new TodoIt();
	$my_plugin_instance->register();
}

register_activation_hook( __FILE__, array( $my_plugin_instance, 'activate' ) );
//
register_deactivation_hook( __FILE__, array( $my_plugin_instance, 'deactivate' ) );
//
//register_uninstall_hook( __FILE__, array( PLUGIN_CLASS, 'uninstall' ) );