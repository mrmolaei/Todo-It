<?php

use Todo_It\Helpers\Field;

class test_field extends WP_UnitTestCase
{
	protected object $field;

	/**
	 * @dataProvider provideFieldData
	 */
	public function testSetField( $input )
	{
		$this->field = new Field();

		$setFieldReturnValue = $this->field->setField( $input );

		self::assertSameSets( $this->field->field, $input );
		$this->assertInstanceOf( 'Todo_It\Helpers\Field', $setFieldReturnValue );
	}

	/**
	 * @dataProvider provideFieldData
	 */
	public function testRegisterField( $input )
	{
		$this->field = new Field();
		$this->field->setField( $input );
		$this->field->registerField();
		$this->expectNotToPerformAssertions();
	}

	public function provideFieldData()
	{
		return [
			[
				'real_world_data' => [
					'id'       => 'ui_type',
					'title'    => 'Use Basic or Professional Features ',
					'callback' => function () {
					},
					'page'     => 'todoit_options_page',
					'section'     => 'general_section',
					'args'     => array()
				]
			],
			[
				'test_data' => [
					'id'       => 'test_id',
					'title'    => 'Title Test',
					'callback' => function () {
					},
					'page'     => 'todoit_options_page',
					'section'     => 'todo_it_section',
					'args'     => array()
				]
			]
		];
	}
}