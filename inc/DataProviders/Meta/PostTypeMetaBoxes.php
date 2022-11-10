<?php

namespace Todo_It\DataProviders\Meta;

class PostTypeMetaBoxes
{
	public static function getData()
	{
		return [
			[
				'id' => 'todo-post-metabox',
				'title' => __('Todo Options', 'todo-it'),
				'callback' => 'Todo_It\\Callbacks\\MetaBoxesCallbacks::todoItMetaBox',
				'screens' => ['todoit-post']
			]
		];
	}
}