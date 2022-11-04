<?php


namespace Todo_It\Services;

use Todo_It\Helpers\Page;
use Todo_It\Helpers\Template;

class PluginPages
{
	private object $pageHelper;

	private array $todoIt;

	private array $todoList;

	private array $options;

	private function todoItPageArgs()
	{
		$this->todoIt = [
			'page_title' => __( 'Todo It' ),
			'menu_title' => __( 'Todo It' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'todoit',
			'callback'   => function () {},
			'icon_url'   => 'dashicons-yes-alt',
			'position'   => 25,
		];
	}

	private function todoListPageArgs()
	{
		$this->todoList = [
			'parent_slug' => 'todoit',
			'page_title' => __( 'Todo List' ),
			'menu_title' => __( 'Todo List' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'todoit',
			'callback'   => function () {
				Template::loadTemplate('admin');
			},
			'position'   => 1,
		];
	}

	private function optionsPageArgs()
	{
		$this->options = [
			'parent_slug' => 'todoit',
			'page_title' => __( 'Options' ),
			'menu_title' => __( 'Options' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'todoit_options_page',
			'callback'   => function () {
				Template::loadTemplate('options/general.php');
			},
			'position'   => 2,
		];
	}

	public function addPages() {
		$this->todoItPageArgs();
		$this->todoListPageArgs();
		$this->optionsPageArgs();

		$this->pageHelper = new Page();
		$this->pageHelper->set($this->todoIt)->addPage();
		$this->pageHelper->set($this->todoList)->addSubPage();
		$this->pageHelper->set($this->options)->addSubPage();
	}

	public function bodyClasses ( $classes ) {
		if ( Page::inPluginsPage() ) {
			$classes .= ' todoit-plugin-page';
		}

		return $classes;
	}

	public function register() {
		add_action('admin_menu', [$this, 'addPages']);
		add_filter( 'admin_body_class', [$this, 'bodyClasses']);
	}
}