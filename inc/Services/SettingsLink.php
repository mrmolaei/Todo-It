<?php


namespace Todo_It\Services;

use Todo_It\BaseClass;

class SettingsLink extends BaseClass
{
	public function settingsLink( $links )
	{
		$settings_link = '<a href="admin.php?page=my_plugin">Settings</a>';
		array_push($links, $settings_link);
		return $links;
	}

	public function register()
	{
		add_filter( "plugin_action_links_$this->plugin", array( $this , 'settingsLink' ) );
	}
}