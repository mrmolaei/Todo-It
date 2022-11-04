<?php


namespace Todo_It\Callbacks;


class GeneralOptions
{
	public static function generalFeatures() : void
	{
//		update_option( 'todoit_options', array('general_features' => 'basic') );
		$value = get_option('todoit_options')['general_features'];
		echo "<div class='o-row'>";
		echo "<label class='o-col o-col--1/2'><input ". ($value == 'basic' ? 'checked' : '') ." type='radio' value='basic' name='todoit_options[general_features]' /> Basic</label>";
		echo "<label class='o-col o-col--1/2'><input ". ($value == 'pro' ? 'checked' : '') ." type='radio' value='pro' name='todoit_options[general_features]' /> Professional</label>";
		echo "</div>";
	}
}