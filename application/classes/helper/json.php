<?php defined('SYSPATH') or die('No direct script access');

class Helper_Json {
	
	public static function clean_json_value($value)
	{
		
		$value = str_replace(':', '', $value);
		$value = str_replace('"', '', $value);
		return $value;
		
	}
	
}