<?php


namespace Todo_It;


class BaseClass
{
	public $plugin_path;
	public $plugin_url;
	public $plugin;

	public function __construct() {
		$this->plugin_path = plugin_dir_path(dirname(__FILE__, 1));
		$this->plugin_url = plugin_dir_url(dirname(__FILE__ , 1));
		$this->plugin = plugin_basename(dirname(__FILE__, 2)) . '/todo-it.php';
	}
}