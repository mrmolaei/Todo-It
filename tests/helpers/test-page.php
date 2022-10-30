<?php

use Todo_It\Helpers\Page;

class test_admin_page extends WP_UnitTestCase
{
	public function testSet()
	{
		$pageInstance = new Page;

		$page = array(
			'page_title' => __( 'Test' ),
			'menu_title' => __( 'Test' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'test',
			'callback'   => function () {
			},
			'icon_url'   => 'dashicons-yes-alt',
			'position'   => null
		);
		$pageInstance->set( $page );

		$this->assertSameSets($pageInstance->page, $page, 'The page property didn\'t match with the $page');
	}

	public function testAdd()
	{
		$pageInstance = new Page;
		$page = array(
			'page_title' => __( 'Test' ),
			'menu_title' => __( 'Test' ),
			'capability' => 'manage_options',
			'menu_slug'  => 'test',
			'callback'   => function () {
			},
			'icon_url'   => 'dashicons-yes-alt',
			'position'   => null
		);
		$pageInstance->set( $page );
		$pageInstance->add();
		$isAdminPageExists = menu_page_url( 'test' );
		var_dump( $isAdminPageExists );
		$this->assertNotEmpty( $isAdminPageExists , '- The option page not found.');
	}
}