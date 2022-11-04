<?php


namespace Todo_It\Helpers;


class Form
{

	public function radioInput($fieldName) : string
	{
		$value = get_option($fieldName);

		Template::loadTemplate('fields/radio.php');
	}
}