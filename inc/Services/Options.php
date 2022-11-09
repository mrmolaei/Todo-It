<?php


namespace Todo_It\Services;

use Todo_It\Helpers\Field;
use Todo_It\Helpers\Section;
use Todo_It\Helpers\Settings;
use Todo_It\DataProviders\Options as DataProviders;

class Options
{
	protected Field    $fieldHelper;
	protected Section  $sectionHelper;
	protected Settings $settingsHelper;

	public function __construct()
	{
		$this->settingsHelper = new Settings();
		$this->sectionHelper  = new Section();
		$this->fieldHelper    = new Field();
	}

	public function registerSettings()
	{
		$settings = DataProviders\Settings::getData();

		foreach ( $settings as $setting ) {
			$this->settingsHelper->setSetting( $setting );
			$this->settingsHelper->registerSetting();
		}
	}

	public function registerSections()
	{
		$sections = DataProviders\Sections::getData();


		foreach ( $sections as $section ) {
			$this->sectionHelper->setSection( $section );
			$this->sectionHelper->registerSection();
		}
	}

	public function registerFields()
	{
		$fields = DataProviders\Fields::getData();

		foreach ( $fields as $field ) {
			$this->fieldHelper->setField( $field );
			$this->fieldHelper->registerField();
		}
	}

	public function registerOptionsService(): void
	{
		$this->registerSettings();
		$this->registerSections();
		$this->registerFields();
	}

	public function register()
	{
		add_action( 'admin_init', [ $this, 'registerOptionsService' ] );
	}
}