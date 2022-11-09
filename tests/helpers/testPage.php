<?php

use Todo_It\Helpers\Page;

class testPage extends WP_UnitTestCase
{
	public array $pages;

	public function setUp() {

		parent::setUp();

		/**
		 * Set the user access to administrator
		 */
		wp_set_current_user( self::factory()->user->create( [
			'role' => 'administrator',
		] ) );

		$this->pages = array(
			'option_page'     => array(
				'page_title'  => __( 'Test' ),
				'menu_title'  => __( 'Test' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'test',
				'callback'    => function () {
				},
				'icon_url'    => 'dashicons-yes-alt',
				'position'    => null,
				'parent_slug' => ''
			),
			'option_subpage' => array(
				'page_title'  => __( 'Test' ),
				'menu_title'  => __( 'Test' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'subpage',
				'callback'    => function () {
				},
				'icon_url'    => 'dashicons-yes-alt',
				'position'    => null,
				'parent_slug' => 'test'
			)
		);
	}

	public function testSet()
	{
		$pageInstance = new Page;
		$pageInstance->set( $this->pages['option_page'] );

		$this->assertSameSets( $pageInstance->page, $this->pages['option_page'], 'The page property didn\'t match with the $page' );
	}

	public function testAdd()
	{
		$pageInstance = new Page();
		$pageInstance->set( $this->pages['option_page'] );
		$pageInstance->addPage();

		$isAdminPageExists = menu_page_url( 'test', false );

		$this->assertNotEmpty( $isAdminPageExists, 'The option page not found.' );
	}

	public function testAddSubPage()
	{
		$pageInstance = new Page();
		$pageInstance->set( $this->pages['option_subpage'] )->addSubPage();

		$isAdminPageExists = menu_page_url( 'subpage', false );

		$this->assertNotEmpty( $isAdminPageExists, 'The option subpage not found.' );
	}
}