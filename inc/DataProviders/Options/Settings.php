<?php

namespace Todo_It\DataProviders\Options;

use Todo_It\Callbacks\GeneralOptions;

class Settings
{
	public static function getData(): array
	{
		return [
			[
				'option_group' => 'todoit_options',
				'option_name'  => 'todoit_options',
				'callback'     => 'Todo_It\\Helper\\Sanitize\\sanitizeString',
			],
		];
	}
}