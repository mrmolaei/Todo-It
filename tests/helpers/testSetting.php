<?php

use Todo_It\Helpers\Settings;

class testSetting extends WP_UnitTestCase
{
	protected object $settings;

	/**
	 * @dataProvider provideSettingData
	 */
	public function testSetSetting( $input )
	{
		$this->settings = new Settings();

		$setSettingReturnValue = $this->settings->setSetting( $input );

		self::assertSameSets( $this->settings->setting, $input );
		$this->assertInstanceOf( 'Todo_It\Helpers\Settings', $setSettingReturnValue );
	}

	/**
	 * @dataProvider provideSettingData
	 */
	public function testRegisterSetting($input)
	{
		$this->settings = new Settings();
		$this->settings->setSetting( $input );
		$this->settings->registerSetting();
		$this->expectNotToPerformAssertions();
	}

	public function provideSettingData()
	{
		return [
			[
				'real_world_data' => [
					'option_group' => 'todoit_options',
					'option_name'  => 'general_settings',
					'callback'         => array()
				]
			],
			[
				'test_data' => [
					'option_group' => 'todoit_options',
					'option_name'  => 'general_settings',
					'callback'         => array()
				]
			]
		];
	}
}