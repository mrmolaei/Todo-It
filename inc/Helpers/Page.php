<?php


namespace Todo_It\Helpers;

/**
 * Class Page
 * @package Todo_It\Helpers
 */
class Page
{
	public array $page;

	/**
	 * @param array $page
	 *
	 * @return $this
	 */
	public function set( array $page )
	{
		$this->page = $page;

		return $this;
	}

	/**
	 * @return $this
	 */
	public function addPage()
	{
		add_menu_page(
			$this->page['page_title'],
			$this->page['menu_title'],
			$this->page['capability'],
			$this->page['menu_slug'],
			$this->page['callback'],
			$this->page['icon_url'],
			$this->page['position'] );

		return $this;
	}

	public function addSubPage()
	{
		add_submenu_page(
			$this->page['parent_slug'],
			$this->page['page_title'],
			$this->page['menu_title'],
			$this->page['capability'],
			$this->page['menu_slug'],
			$this->page['callback'],
			$this->page['position'] );

		return $this;
	}
}