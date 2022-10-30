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
	public function set(array $page)
	{
		$this->page = $page;

		return $this;
	}

	/**
	 * @return void
	 */
	public function add() {
		add_menu_page(
			$this->page['page_title'],
			$this->page['menu_title'],
			$this->page['capability'],
			$this->page['menu_slug'],
			$this->page['callback'],
			$this->page['icon_url'],
			$this->page['position'] );
	}
}