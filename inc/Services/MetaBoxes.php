<?php


namespace Todo_It\Services;

use Todo_It\Helpers\MetaBox;
use Todo_It\DataProviders\Meta\PostTypeMetaBoxes;

class MetaBoxes
{

	public function __construct()
	{
		/*
		 * New post page hooks
		 */

	}

	public function registerMetaBoxes() {
		$metas = PostTypeMetaBoxes::getData();
		foreach ($metas as $meta) {
			MetaBox::addMetaBox($meta);
		}
	}

	public function register() {
		add_action('add_meta_boxes', [$this, 'registerMetaBoxes']);
	}
}