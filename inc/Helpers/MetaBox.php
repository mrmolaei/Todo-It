<?php


namespace Todo_It\Helpers;


class MetaBox
{

	public static function addMetaBox($meta) {
		add_meta_box(
			$meta['id'],
			$meta['title'],
			$meta['callback'],
			(isset($meta['screens']) ? $meta['screens'] : 'todo-post')
		);
	}
}