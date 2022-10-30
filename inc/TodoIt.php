<?php


namespace Todo_It;

use Todo_It\Activate;
use Todo_It\BaseClass;
use Todo_It\Deactivate;
use Todo_It\Helpers\page;
use Todo_It\Helpers\Template;

class TodoIt extends BaseClass
{

	public static function get_services()
	{
		return [
			Services\PluginPages::class,
			Services\SettingsLink::class,
			Services\Assets::class
		];
	}

	public static function register_services()
	{
		$services = self::get_services();

		foreach ( $services as $class ) {
			$service = self::instantiate( $class );


			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

	public static function instantiate( $class )
	{
		return new $class;
	}

	function register()
	{

	}

	function settingsLink( $links )
	{
		$settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
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