<?php


namespace Todo_It\Helpers;


class Settings
{
	public array $setting;

	/**
	 * @param $setting
	 *
	 * @return $this
	 */
	public function setSetting( array $setting ) : Settings
	{
		$this->setting = $setting;

		return $this;
	}


	public function registerSetting() : void
	{
		register_setting( $this->setting['option_group'], $this->setting['option_name'], $this->setting['args'] );
	}
}