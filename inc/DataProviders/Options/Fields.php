<?php

namespace Todo_It\DataProviders\Options;

use Todo_It\Helpers\Form;

class Fields
{
	public static function getData(): array
	{
		return [
			[
				'id'       => 'todoit_options',
				'title'    => 'App Features',
				'callback' => 'Todo_It\\Callbacks\\GeneralOptions::generalFeatures',
				'page'     => 'todoit_options_page',
				'section'  => 'general_section',
				'args'     => array()
			],
		];
	}


}