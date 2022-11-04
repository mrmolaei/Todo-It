<?php

namespace Todo_It\DataProviders\Options;

class Sections
{
	public static function getData(): array
	{
		return [
			[
				'id'       => 'general_section',
				'title'    => 'General Options',
				'callback' => array(),
				'page'     => 'todoit_options_page',
				'args'     => array()
			],
		];
	}
}