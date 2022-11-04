<?php


namespace Todo_It\Callbacks;


class GeneralOptions
{
	public static function generalFeatures() : void
	{
//		update_option( 'todoit_options', array('general_features' => 'basic') );
		$value = get_option('todoit_options')['general_features'];
		echo "<label'><input ". ($value == 'basic' ? 'checked' : '') ." type='radio' value='basic' name='todoit_options[general_features]' /> Basic</label>";
		echo "<div class='o-spacer o-spacer--2x'></div>";
		echo "<label class='disabled'><input ". ($value == 'pro' ? 'checked' : '') ." disabled type='radio' value='pro' name='todoit_options[general_features]' /> Professional (Coming soon)</label>";
	}
}