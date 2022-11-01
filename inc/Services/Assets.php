<?php


namespace Todo_It\Services;


use Todo_It\BaseClass;

class Assets extends BaseClass
{
	public function adminAssets()
	{
		wp_enqueue_script( 'todo-it-admin-scripts', $this->plugin_url . 'assets/js/scripts.js' );
		wp_enqueue_style( 'todo-it-admin-styles', $this->plugin_url . 'assets/css/main.css' );

		add_action( 'admin_head', [ $this, 'customizedUI' ] );
	}

	public function customizedUI()
	{
		echo "<style>
					:root {
						--todo-it-primary-color: #7c33ff;
						--todo-it-secondary-color: #4ec69b;
					}
				</style>";
	}

	public function register()
	{
		add_action( 'admin_enqueue_scripts', [ $this, 'adminAssets' ] );
	}
}