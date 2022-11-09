<?php

use Todo_It\Helpers\Template;

class testTemplate extends WP_UnitTestCase
{
	/**
	 * @param $name
	 *
	 * @return ReflectionMethod
	 * @throws ReflectionException
	 *
	 * Use this method to get access to protected method.
	 */
	protected static function getMethod( $name )
	{
		$class  = new ReflectionClass( 'Todo_It\\Helpers\\Template' );
		$method = $class->getMethod( $name );
		$method->setAccessible( true );

		return $method;
	}

	/**
	 * Tests checkTemplateName() in Template class
	 */
	public function testCheckTemplateName()
	{
		$check_template_name_method = self::getMethod( 'checkTemplateName' );
		$template_class_instance    = new Template();

		$test_result = $check_template_name_method->invokeArgs( $template_class_instance, array( 'admin' ) );
		$this->assertEquals( "admin.php", $test_result );
	}

	/**
	 * Tests templateExists() in Template class
	 */
	public function testTemplateExists()
	{
		$check_template_name_method = self::getMethod( 'templateExists' );
		$template_class_instance    = new Template();

		$test_result = $check_template_name_method->invokeArgs( $template_class_instance, array( 'admin.php' ) );
		$this->assertTrue( $test_result );
	}
}