<?php


namespace Todo_It\Services;


use Todo_It\BaseClass;

class Assets extends BaseClass
{
	public function adminAssets()
	{
		wp_enqueue_style( 'todo-it-admin-styles', $this->plugin_url . 'assets/css/styles.css');
		wp_enqueue_script( 'todo-it-admin-scripts', $this->plugin_url . 'assets/js/scripts.js');
	}

	public function register()
	{
		add_action( 'admin_enqueue_scripts', [$this, 'adminAssets'] );
	}
}