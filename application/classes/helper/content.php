<?php defined('SYSPATH') or die('No direct script access');

class Helper_Content {
	
	// public $short_codes, $replace_these;
		
	public static function setup($content)
	{
		$content_config = Kohana::$config->load('content');
		
		$replace_these = array_keys($content_config['short_codes']);
				
		$content = str_replace($replace_these, $content_config['short_codes'], $content);
		return $content;
	}
	
}