<?php
/**
 * @package Myplygun
 */

namespace Todo_It;


class Deactivate
{
	public static function deactivate() {
		flush_rewrite_rules();
	}
}