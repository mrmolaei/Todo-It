<?php

use Todo_It\Controllers\PostTypeController;

class testPostTypeController extends WP_UnitTestCase {
	public PostTypeController $postTypeController;

	public function testRegisterPostType()
	{
		$this->postTypeController = new PostTypeController();

		$this->postTypeController->registerPostType();

		$postTypeRegistrationResult = post_type_exists( $this->postTypeController->postTypeName );

		$this->assertTrue( $postTypeRegistrationResult );
	}

	public function testRegister()
	{
		$this->postTypeController = new PostTypeController();

		$this->postTypeController->register();

		$isActionExists = has_action( 'init', [ $this->postTypeController, 'registerPostType' ] );

		$this->assertNotFalse( $isActionExists );
	}
}