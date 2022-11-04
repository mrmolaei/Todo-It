<?php

use Todo_It\Helpers\Section;

class test_section extends WP_UnitTestCase
{
	protected object $section;

	/**
	 * @dataProvider provideSectionData
	 */
	public function testSetSection( $input )
	{
		$this->section = new Section();

		$setSectionReturnValue = $this->section->setSection( $input );

		self::assertSameSets( $this->section->section, $input );
		$this->assertInstanceOf( 'Todo_It\Helpers\Section', $setSectionReturnValue );
	}

	/**
	 * @dataProvider provideSectionData
	 */
	public function testRegisterSection( $input )
	{
		$this->section = new Section();
		$this->section->setSection( $input );
		$this->section->registerSection();
		$this->expectNotToPerformAssertions();
	}

	public function provideSectionData()
	{
		return [
			[
				'real_world_data' => [
					'id'       => 'ui_type',
					'title'    => 'Use Basic or Professional Features ',
					'callback' => function () {
					},
					'page'     => 'todoit_options_page',
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
					'args'     => array()
				]
			]
		];
	}
}