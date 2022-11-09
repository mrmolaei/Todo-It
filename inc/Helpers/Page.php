<?php


namespace Todo_It\Helpers;

use phpDocumentor\Reflection\Types\Boolean;

/**
 * Class Page
 * @package Todo_It\Helpers
 */
class Page
{

	/**
	 * Admin Page Slug
	 *
	 * @var string
	 */
	public static $admin_menu_slug = 'todoit_[slug]_page';


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
			(array_key_exists('callback', $this->page) ? $this->page['callback'] : ''),
			(array_key_exists('callback', $this->page)  ? $this->page['position'] : null) );

		return $this;
	}

	public static function inPage($page)
	{
		global $pagenow;
		return (is_admin() and $pagenow == "admin.php" and isset($_REQUEST['page']) and $_REQUEST['page'] == Page::get_page_slug($page));
	}

	public static function inPluginsPage()
	{
		global $pagenow;
		return (is_admin() and $pagenow == "admin.php" and isset($_REQUEST['page']) and (substr($_REQUEST['page'], 0, 6) == "todoit"));
	}

	/**
	 * Get Menu Slug
	 *
	 * @param $page_slug
	 * @return mixed
	 */
	public static function get_page_slug($page_slug)
	{
		return str_ireplace("[slug]", $page_slug, self::$admin_menu_slug);
	}
}