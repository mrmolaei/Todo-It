<?php
/**
 * @package Myplygun
 */

namespace Todo_It;


class Activate
{
	public static function activate()
	{
		flush_rewrite_rules();
	}
}